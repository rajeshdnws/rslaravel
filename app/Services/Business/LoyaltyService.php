<?php

namespace App\Services\Business;

use App\Models\Business\BusinessCustomer;
use App\Models\Business\LoyaltyLedger;
use Illuminate\Support\Facades\DB;
use InvalidArgumentException;

class LoyaltyService
{
    /**
     * Ratio of points earned per rupee spent (e.g. 1 point for every ₹100 spent)
     */
    protected float $earnRatePerRupee = 0.01; // 1% spend back in points

    /**
     * Value of 1 point in INR for redemption (e.g. 1 point = ₹1)
     */
    protected float $rupeesPerPoint = 1.00;

    /**
     * Calculate points that can be earned for a given spend.
     */
    public function calculatePointsEarned(float $spend): int
    {
        return (int) floor($spend * $this->earnRatePerRupee);
    }

    /**
     * Calculate discount value for redeemed points.
     */
    public function calculatePointsValue(int $points): float
    {
        return round($points * $this->rupeesPerPoint, 2);
    }

    /**
     * Redeem customer wallet points against an order.
     */
    public function redeemPoints(
        BusinessCustomer $customer,
        int $points,
        ?string $referenceType = null,
        ?int $referenceId = null,
        ?string $description = null
    ): float {
        if ($points <= 0) {
            return 0.00;
        }

        if ($customer->wallet_balance_points < $points) {
            throw new InvalidArgumentException("Customer only has {$customer->wallet_balance_points} points available; cannot redeem {$points} points.");
        }

        return DB::transaction(function () use ($customer, $points, $referenceType, $referenceId, $description) {
            $customer->wallet_balance_points -= $points;
            $customer->save();

            LoyaltyLedger::create([
                'customer_id' => $customer->id,
                'type' => 'redeemed',
                'points' => -$points,
                'balance_after' => $customer->wallet_balance_points,
                'reference_type' => $referenceType,
                'reference_id' => $referenceId,
                'description' => $description ?? "Redeemed {$points} points",
            ]);

            return $this->calculatePointsValue($points);
        });
    }

    /**
     * Award loyalty points to a customer for a completed sale.
     */
    public function awardPoints(
        BusinessCustomer $customer,
        float $netSpend,
        ?string $referenceType = null,
        ?int $referenceId = null
    ): int {
        $points = $this->calculatePointsEarned($netSpend);

        if ($points <= 0) {
            return 0;
        }

        return DB::transaction(function () use ($customer, $points, $netSpend, $referenceType, $referenceId) {
            $customer->wallet_balance_points += $points;
            $customer->total_spend += $netSpend;

            // Automatically upgrade tier based on cumulative spend
            if ($customer->total_spend >= 75000) {
                $customer->tier = 'Platinum';
            } elseif ($customer->total_spend >= 25000) {
                $customer->tier = 'Gold';
            } else {
                $customer->tier = 'Silver';
            }

            $customer->save();

            LoyaltyLedger::create([
                'customer_id' => $customer->id,
                'type' => 'earned',
                'points' => $points,
                'balance_after' => $customer->wallet_balance_points,
                'reference_type' => $referenceType,
                'reference_id' => $referenceId,
                'description' => "Earned {$points} points on spend of ₹" . number_format($netSpend, 2),
            ]);

            return $points;
        });
    }
}
