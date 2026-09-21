<?php

namespace Tests\Feature;

use App\Models\Lead;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Support\Facades\Mail;
use Tests\TestCase;

class SoloAndLanProductPageTest extends TestCase
{
    use RefreshDatabase;

    public function test_solo_product_page_renders_with_coupons_and_loyalty_features(): void
    {
        $response = $this->get('/products/rs-inventory-solo');

        $response->assertStatus(200);
        $response->assertSee('Customer Loyalty Wallet');
        $response->assertSee('Promotional Coupon Engine');
        $response->assertSee('solo-coupon-section');
        $response->assertSee('solo-loyalty-section');
        $response->assertSee('SAVE10');
        $response->assertSee('FLAT100');
        $response->assertSee('soloCustomerSelect');
    }

    public function test_lan_product_page_renders_with_network_coupons_and_loyalty_features(): void
    {
        $response = $this->get('/products/rs-inventory-lan');

        $response->assertStatus(200);
        $response->assertSee('Networked Loyalty Wallet');
        $response->assertSee('Store-Wide Coupon Engine');
        $response->assertSee('tab-lan-loyalty-coupons');
        $response->assertSee('lanHostCustomerWalletBody');
        $response->assertSee('c1CustomerSelect');
        $response->assertSee('c2CustomerSelect');
        $response->assertSee('lanReceiptModal');
    }

    public function test_solo_demo_inquiry_with_coupons_and_loyalty_creates_lead(): void
    {
        Mail::fake();

        $formData = [
            'name' => 'Vikram Malhotra',
            'business_name' => 'Malhotra Menswear',
            'email' => 'vikram@malhotramens.in',
            'phone' => '+91 98200 11223',
            'business_type' => 'Apparel & Fashion Boutique',
            'billing_counters' => '1 Counter (Single PC)',
            'features_of_interest' => [
                'POS Billing & Invoicing',
                'Coupons & Loyalty Points',
            ],
            'contact_method' => 'WhatsApp',
            'additional_requirements' => 'Interested in customer loyalty points and festival discount coupons for single-counter setup.',
        ];

        $response = $this->post('/products/rs-inventory-solo', $formData);

        $response->assertSessionHasNoErrors();
        $response->assertSessionHas('status');

        $this->assertDatabaseHas('leads', [
            'email' => 'vikram@malhotramens.in',
            'company' => 'Malhotra Menswear',
        ]);

        $lead = Lead::where('email', 'vikram@malhotramens.in')->first();
        $this->assertNotNull($lead);
        $this->assertStringContainsString('Coupons & Loyalty Points', $lead->message);
    }

    public function test_lan_demo_inquiry_with_networked_coupons_and_loyalty_creates_lead(): void
    {
        Mail::fake();

        $formData = [
            'name' => 'Deepak Chopra',
            'business_name' => 'Grand Supermart & Provisions',
            'email' => 'deepak@grandmart.in',
            'phone' => '+91 98112 33445',
            'business_type' => 'Supermarket / Grocery Mart',
            'billing_computers' => '3 - 5 Counters (Multi-Counter)',
            'store_locations' => '1 Single Store Location',
            'current_software' => 'Tally Prime',
            'required_features' => [
                'Shared Live Stock',
                'Multi-Terminal Billing',
                'Promotional Coupon Engine',
                'Customer Loyalty Points Wallet',
            ],
            'contact_method' => 'WhatsApp',
            'additional_requirements' => 'Need LAN point redemption synced between 3 checkouts.',
        ];

        $response = $this->post('/products/rs-inventory-lan', $formData);

        $response->assertSessionHasNoErrors();
        $response->assertSessionHas('status');

        $this->assertDatabaseHas('leads', [
            'email' => 'deepak@grandmart.in',
            'company' => 'Grand Supermart & Provisions',
        ]);

        $lead = Lead::where('email', 'deepak@grandmart.in')->first();
        $this->assertNotNull($lead);
        $this->assertStringContainsString('Promotional Coupon Engine', $lead->message);
        $this->assertStringContainsString('Customer Loyalty Points Wallet', $lead->message);
    }
}
