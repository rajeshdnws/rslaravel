<?php

namespace Tests\Feature;

use App\Models\Lead;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Support\Facades\Mail;
use Tests\TestCase;

class AgencyPartnershipFormTest extends TestCase
{
    use RefreshDatabase;

    public function test_agency_partners_page_returns_successful_response(): void
    {
        $response = $this->get('/agency-partners/');
        $response->assertStatus(200);
        $response->assertSee('Your Development Team Behind the Scenes');
    }

    public function test_form_submission_fails_validation_with_missing_required_fields(): void
    {
        $response = $this->post('/agency-partners/', [
            'name' => '',
            'agency_name' => '',
            'email' => 'invalid-email',
            'services' => [],
            'message' => ''
        ]);

        $response->assertSessionHasErrors(['name', 'agency_name', 'email', 'services', 'message']);
    }

    public function test_form_submission_succeeds_and_creates_lead_with_correct_type(): void
    {
        Mail::fake();

        $response = $this->post('/agency-partners/', [
            'name' => 'John Doe',
            'agency_name' => 'Pixel Agency',
            'email' => 'john@pixelagency.com',
            'phone' => '1234567890',
            'website' => 'https://pixelagency.com',
            'country' => 'United States',
            'services' => ['Web Development', 'AI Development'],
            'project_type' => 'Medium Project',
            'engagement' => 'Dedicated Team',
            'message' => 'We need backend engineering help on a Laravel portal.'
        ]);

        $response->assertRedirect();
        $response->assertSessionHasNoErrors();
        $response->assertSessionHas('status', 'Thanks. Your partnership inquiry has been received. Our team will contact you shortly.');

        $this->assertDatabaseHas('leads', [
            'type' => 'agency',
            'name' => 'John Doe',
            'email' => 'john@pixelagency.com',
            'company' => 'Pixel Agency',
            'subject_or_service' => 'Web Development, AI Development',
            'budget' => 'Medium Project',
            'timeline' => 'Dedicated Team'
        ]);

        $lead = Lead::where('email', 'john@pixelagency.com')->first();
        $this->assertNotNull($lead);
        $this->assertStringContainsString('Agency Website: https://pixelagency.com', $lead->message);
        $this->assertStringContainsString('Country: United States', $lead->message);
        $this->assertStringContainsString('Project Details:', $lead->message);
        $this->assertStringContainsString('We need backend engineering help on a Laravel portal.', $lead->message);
    }
}
