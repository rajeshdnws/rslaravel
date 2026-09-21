<?php

namespace Tests\Feature;

use App\Models\Lead;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Support\Facades\Mail;
use Tests\TestCase;

class BusinessProductPageTest extends TestCase
{
    use RefreshDatabase;

    public function test_business_product_page_returns_200_and_renders_content(): void
    {
        $response = $this->get('/products/rs-inventory-business');

        $response->assertStatus(200);
        $response->assertSee('RS Inventory');
        $response->assertSee('Multi-Branch Logistics');
        $response->assertSee('Centralized Inventory');
        $response->assertSee('Multi-Location Transfers');
        $response->assertSee('Request an Enterprise Demo');
    }

    public function test_business_demo_inquiry_fails_validation_with_missing_fields(): void
    {
        $response = $this->from('/products/rs-inventory-business')->post('/products/rs-inventory-business', [
            'name' => '',
            'business_name' => '',
            'email' => 'not-an-email',
            'phone' => '',
            'business_type' => '',
            'store_outlets' => '',
            'billing_terminals' => '',
            'contact_method' => '',
        ]);

        $response->assertRedirect('/products/rs-inventory-business');
        $response->assertSessionHasErrors([
            'name',
            'business_name',
            'email',
            'phone',
            'business_type',
            'store_outlets',
            'billing_terminals',
            'contact_method',
        ]);
    }

    public function test_business_demo_inquiry_succeeds_and_creates_lead(): void
    {
        Mail::fake();

        $formData = [
            'name' => 'Aditya Singhania',
            'business_name' => 'Metro Retail Chain Pvt Ltd',
            'email' => 'aditya@metroretail.in',
            'phone' => '+91 98201 55678',
            'business_type' => 'Multi-Store Supermarket Chain',
            'store_outlets' => '4 - 10 Outlets',
            'billing_terminals' => '6 - 15 Terminals',
            'annual_turnover' => '₹5 Cr - ₹25 Crore',
            'contact_method' => 'WhatsApp',
            'required_modules' => [
                'Multi-Location Transfers',
                'Purchasing & GRN',
                'Customer Loyalty Points',
                'Promotional Coupon Engine',
            ],
            'additional_requirements' => 'Evaluating enterprise inventory solutions for our 6 retail outlets in Mumbai.',
        ];

        $response = $this->from('/products/rs-inventory-business')->post('/products/rs-inventory-business', $formData);

        $response->assertRedirect('/products/rs-inventory-business#demo-request');
        $response->assertSessionHasNoErrors();
        $response->assertSessionHas('status');

        $this->assertDatabaseHas('leads', [
            'type' => 'business_demo_request',
            'name' => 'Aditya Singhania',
            'email' => 'aditya@metroretail.in',
            'company' => 'Metro Retail Chain Pvt Ltd',
            'subject_or_service' => 'RS Inventory – Business Demo (4 - 10 Outlets)',
            'contact_method' => 'WhatsApp',
        ]);

        $lead = Lead::where('email', 'aditya@metroretail.in')->first();
        $this->assertNotNull($lead);
        $this->assertStringContainsString('Number of Outlets / Branches: 4 - 10 Outlets', $lead->message);
        $this->assertStringContainsString('Total Billing Terminals: 6 - 15 Terminals', $lead->message);
        $this->assertStringContainsString('Multi-Location Transfers', $lead->message);
        $this->assertStringContainsString('Customer Loyalty Points', $lead->message);
        $this->assertStringContainsString('Evaluating enterprise inventory solutions', $lead->message);
    }

    public function test_business_demo_inquiry_traps_honeypot_spam(): void
    {
        Mail::fake();

        $response = $this->from('/products/rs-inventory-business')->post('/products/rs-inventory-business', [
            'name' => 'Spam Bot',
            'business_name' => 'Spam Corp',
            'email' => 'bot@spammer.com',
            'phone' => '1234567890',
            'business_type' => 'Multi-Store Supermarket Chain',
            'store_outlets' => '1 - 3 Outlets',
            'billing_terminals' => '2 - 5 Terminals',
            'contact_method' => 'Email',
            'my_custom_country_verify' => 'I am a malicious automated bot',
        ]);

        $response->assertRedirect('/products/rs-inventory-business');
        $this->assertDatabaseMissing('leads', [
            'email' => 'bot@spammer.com',
        ]);
    }
}
