<?php

namespace Tests\Feature;

use App\Models\Lead;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Tests\TestCase;

class SpamPreventionTest extends TestCase
{
    use RefreshDatabase;

    public function test_contact_submission_succeeds_when_honeypot_is_empty(): void
    {
        $response = $this->post('/contact-us/', [
            'name' => 'Jane Doe',
            'email' => 'jane@example.com',
            'phone' => '1234567890',
            'subject' => 'Inquiry',
            'message' => 'Hello, I want to discuss a project.',
            'my_custom_country_verify' => '',
        ]);

        $response->assertRedirect();
        $this->assertDatabaseHas('leads', [
            'type' => 'contact',
            'name' => 'Jane Doe',
            'email' => 'jane@example.com',
        ]);
    }

    public function test_contact_submission_silently_ignores_when_honeypot_is_filled(): void
    {
        $response = $this->post('/contact-us/', [
            'name' => 'Spammer Bot',
            'email' => 'spammer@bot.com',
            'phone' => '1234567890',
            'subject' => 'Spam Subject',
            'message' => 'Spam message content.',
            'my_custom_country_verify' => 'some_bot_value',
        ]);

        // Should return redirect (back) with status message to deceive the bot
        $response->assertRedirect();
        
        // But should NOT save to the database
        $this->assertDatabaseMissing('leads', [
            'email' => 'spammer@bot.com',
        ]);
    }

    public function test_quote_submission_succeeds_when_honeypot_is_empty(): void
    {
        $response = $this->post('/quote-requests/', [
            'name' => 'John Client',
            'email' => 'john@client.com',
            'message' => 'This is a genuine quote request.',
            'my_custom_country_verify' => '',
        ]);

        $response->assertRedirect();
        $this->assertDatabaseHas('leads', [
            'type' => 'quote',
            'name' => 'John Client',
            'email' => 'john@client.com',
        ]);
    }

    public function test_quote_submission_silently_ignores_when_honeypot_is_filled(): void
    {
        $response = $this->post('/quote-requests/', [
            'name' => 'Spam Bot Client',
            'email' => 'spambot@client.com',
            'message' => 'Spam client message.',
            'my_custom_country_verify' => 'filled_value',
        ]);

        $response->assertRedirect();
        $this->assertDatabaseMissing('leads', [
            'email' => 'spambot@client.com',
        ]);
    }

    public function test_contact_submission_blocked_when_name_is_michaeleresy(): void
    {
        $response = $this->post('/contact-us/', [
            'name' => 'MichaeleresY',
            'email' => 'spam@example.com',
            'phone' => '1234567890',
            'subject' => 'Inquiry',
            'message' => 'Hello, I want to discuss a project.',
            'my_custom_country_verify' => '',
        ]);

        $response->assertRedirect();
        $this->assertDatabaseMissing('leads', [
            'email' => 'spam@example.com',
        ]);
    }

    public function test_contact_submission_blocked_when_subject_contains_jackpot(): void
    {
        $response = $this->post('/contact-us/', [
            'name' => 'John Client',
            'email' => 'spam2@example.com',
            'phone' => '1234567890',
            'subject' => 'The $30,000,000 Jackpot Is a Moment of Magic',
            'message' => 'Hello, I want to discuss a project.',
            'my_custom_country_verify' => '',
        ]);

        $response->assertRedirect();
        $this->assertDatabaseMissing('leads', [
            'email' => 'spam2@example.com',
        ]);
    }

    public function test_contact_submission_blocked_when_message_contains_jackpot_case_insensitive(): void
    {
        $response = $this->post('/contact-us/', [
            'name' => 'John Client',
            'email' => 'spam3@example.com',
            'phone' => '1234567890',
            'subject' => 'Inquiry',
            'message' => 'I have won a JaCkPoT recently.',
            'my_custom_country_verify' => '',
        ]);

        $response->assertRedirect();
        $this->assertDatabaseMissing('leads', [
            'email' => 'spam3@example.com',
        ]);
    }
}
