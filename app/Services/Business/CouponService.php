<?php

namespace App\Services\Business;

use App\Models\Business\Coupon;
use InvalidArgumentException;

class CouponService
{
    /**
     * Find and validate a coupon code.
     */
    public function validateCoupon(string $code, float $subtotal): ?Coupon
    {
        $normalizedCode = strtoupper(trim($code));
        $coupon = Coupon::where('code', $normalizedCode)->first();

        if (!$coupon) {
            throw new InvalidArgumentException("Invalid coupon code '{$code}'.");
        }

        if (!$coupon->isValidForAmount($subtotal)) {
            if (!$coupon->is_active) {
                throw new InvalidArgumentException("Coupon '{$code}' is inactive.");
            }
            if ($coupon->expires_at && now()->gt($coupon->expires_at)) {
                throw new InvalidArgumentException("Coupon '{$code}' has expired.");
            }
            if ($coupon->usage_limit !== null && $coupon->used_count >= $coupon->usage_limit) {
                throw new InvalidArgumentException("Coupon '{$code}' has reached its maximum usage limit.");
            }
            if ($subtotal < (float) $coupon->min_order_value) {
                throw new InvalidArgumentException("Coupon '{$code}' requires a minimum cart value of ₹" . number_format($coupon->min_order_value, 2) . ".");
            }
            throw new InvalidArgumentException("Coupon '{$code}' cannot be applied to this order.");
        }

        return $coupon;
    }

    /**
     * Calculate discount amount for a given coupon and subtotal.
     */
    public function calculateDiscount(Coupon $coupon, float $subtotal): float
    {
        return $coupon->calculateDiscount($subtotal);
    }

    /**
     * Increment coupon usage count upon successful order.
     */
    public function recordUsage(Coupon $coupon): void
    {
        $coupon->increment('used_count');
    }
}
