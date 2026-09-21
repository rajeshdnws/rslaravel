<?php

namespace App\Http\Controllers;

use App\Mail\LeadConfirmation;
use App\Mail\LeadNotification;
use App\Models\Lead;
use App\Models\SiteSetting;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\Mail;
use Illuminate\View\View;

class ProductController extends Controller
{
    /**
     * Display the RS Inventory – Solo product landing and interactive demo page.
     */
    public function inventorySolo(): View
    {
        $settings = cache()->remember('site_settings_contact', 86400, function () {
            return SiteSetting::whereIn('key', ['phone', 'contact_email', 'office_address'])->pluck('value', 'key')->toArray();
        });

        $phone = $settings['phone'] ?? '+91 73035 36474';
        $email = $settings['contact_email'] ?? 'info@rsorangetech.com';

        return view('site.products.rs-inventory-solo', [
            'title' => 'RS Inventory – Solo | Retail Inventory & Billing Software',
            'description' => 'Discover RS Inventory – Solo by RS ORANGE TECH, a retail inventory and billing management solution designed to help businesses organize products, manage stock, and handle everyday sales operations.',
            'phone' => $phone,
            'email' => $email,
            'canonicalUrl' => url('/products/rs-inventory-solo'),
        ]);
    }

    /**
     * Handle the RS Inventory – Solo demo request form submission.
     */
    public function inventorySoloSubmit(Request $request): RedirectResponse
    {
        // Anti-spam honeypot verification
        if ($request->filled('my_custom_country_verify')) {
            return back()->with('status', 'Thank you for your interest in RS Inventory – Solo. Our team will review your request and contact you.');
        }

        $name = (string) $request->input('name');
        $businessName = (string) $request->input('business_name');
        $requirements = (string) $request->input('additional_requirements');

        // Filter known spam payloads
        if (
            str_contains($name, 'MichaeleresY') || 
            stripos($businessName, 'Jackpot') !== false || 
            stripos($requirements, 'Jackpot') !== false
        ) {
            return back()->with('status', 'Thank you for your interest in RS Inventory – Solo. Our team will review your request and contact you.');
        }

        $validated = $request->validate([
            'name' => ['required', 'string', 'max:120'],
            'business_name' => ['required', 'string', 'max:160'],
            'email' => ['required', 'email', 'max:160'],
            'phone' => ['required', 'string', 'max:40'],
            'business_type' => ['required', 'string', 'max:100'],
            'billing_counters' => ['required', 'string', 'max:60'],
            'features_of_interest' => ['nullable', 'array'],
            'features_of_interest.*' => ['string', 'max:100'],
            'contact_method' => ['required', 'string', 'in:Email,Phone Call,WhatsApp'],
            'additional_requirements' => ['nullable', 'string', 'max:2000'],
        ], [
            'name.required' => 'Please enter your full name.',
            'business_name.required' => 'Please provide your business or store name.',
            'email.required' => 'Please provide a valid email address.',
            'email.email' => 'Please enter a valid email format.',
            'phone.required' => 'Please provide your phone or WhatsApp number.',
            'business_type.required' => 'Please select your retail business type.',
            'billing_counters.required' => 'Please specify the number of billing computers.',
            'contact_method.required' => 'Please select your preferred contact method.',
        ]);

        $features = !empty($validated['features_of_interest']) 
            ? implode(', ', $validated['features_of_interest']) 
            : 'General retail functionality';

        $fullMessage = "Product: RS Inventory – Solo\n"
            . "Business / Store Name: " . $validated['business_name'] . "\n"
            . "Business Type: " . $validated['business_type'] . "\n"
            . "Billing Counters / PCs: " . $validated['billing_counters'] . "\n"
            . "Preferred Contact: " . $validated['contact_method'] . "\n"
            . "Features of Interest: " . $features . "\n\n"
            . "Additional Requirements:\n" . ($validated['additional_requirements'] ?: 'No additional notes provided.');

        $lead = Lead::create([
            'type' => 'demo_request',
            'name' => $validated['name'],
            'email' => $validated['email'],
            'phone' => $validated['phone'],
            'company' => $validated['business_name'],
            'subject_or_service' => 'RS Inventory – Solo Demo (' . $validated['business_type'] . ')',
            'contact_method' => $validated['contact_method'],
            'message' => $fullMessage,
            'reference_page' => $request->headers->get('referer') ?: url('/products/rs-inventory-solo'),
        ]);

        defer(function () use ($lead) {
            try {
                $adminEmail = env('MAIL_RECEIVER', SiteSetting::where('key', 'contact_email')->value('value') ?? 'info@rsorangetech.com');
                Mail::to($adminEmail)->send(new LeadNotification($lead));
                Mail::to($lead->email)->send(new LeadConfirmation($lead));
            } catch (\Throwable $e) {
                Log::warning('Failed sending RS Inventory – Solo demo request notification: ' . $e->getMessage());
            }
        });

        return back()
            ->with('status', 'Thank you for your interest in RS Inventory – Solo. Our team will review your request and contact you.')
            ->withFragment('demo-request');
    }

    /**
     * Display the RS Inventory – LAN product landing and multi-terminal demo page.
     */
    public function inventoryLan(): View
    {
        $settings = cache()->remember('site_settings_contact', 86400, function () {
            return SiteSetting::whereIn('key', ['phone', 'contact_email', 'office_address'])->pluck('value', 'key')->toArray();
        });

        $phone = $settings['phone'] ?? '+91 73035 36474';
        $email = $settings['contact_email'] ?? 'info@rsorangetech.com';

        return view('site.products.rs-inventory-lan', [
            'title' => 'RS Inventory – LAN | Multi-Computer Inventory & Billing Software',
            'description' => 'Explore RS Inventory – LAN by RS ORANGE TECH, a retail inventory and billing solution designed for businesses that need shared inventory and billing operations across connected computers.',
            'phone' => $phone,
            'email' => $email,
            'canonicalUrl' => url('/products/rs-inventory-lan'),
        ]);
    }

    /**
     * Handle the RS Inventory – LAN demo inquiry form submission.
     */
    public function inventoryLanSubmit(Request $request): RedirectResponse
    {
        // Anti-spam honeypot verification
        if ($request->filled('my_custom_country_verify')) {
            return back()->with('status', 'Thank you for your interest in RS Inventory – LAN. Our team will review your requirements and contact you.');
        }

        $name = (string) $request->input('name');
        $businessName = (string) $request->input('business_name');
        $requirements = (string) $request->input('additional_requirements');

        // Filter known spam payloads
        if (
            str_contains($name, 'MichaeleresY') || 
            stripos($businessName, 'Jackpot') !== false || 
            stripos($requirements, 'Jackpot') !== false
        ) {
            return back()->with('status', 'Thank you for your interest in RS Inventory – LAN. Our team will review your requirements and contact you.');
        }

        $validated = $request->validate([
            'name' => ['required', 'string', 'max:120'],
            'business_name' => ['required', 'string', 'max:160'],
            'email' => ['required', 'email', 'max:160'],
            'phone' => ['required', 'string', 'max:40'],
            'business_type' => ['required', 'string', 'max:100'],
            'billing_computers' => ['required', 'string', 'max:60'],
            'store_locations' => ['required', 'string', 'max:60'],
            'current_software' => ['nullable', 'string', 'max:120'],
            'required_features' => ['nullable', 'array'],
            'required_features.*' => ['string', 'max:100'],
            'contact_method' => ['required', 'string', 'in:WhatsApp,Phone Call,Email'],
            'additional_requirements' => ['nullable', 'string', 'max:2000'],
        ], [
            'name.required' => 'Please enter your full name.',
            'business_name.required' => 'Please provide your business or store name.',
            'email.required' => 'Please provide a valid email address.',
            'email.email' => 'Please enter a valid email format.',
            'phone.required' => 'Please provide your phone or WhatsApp contact number.',
            'business_type.required' => 'Please select your retail business category.',
            'billing_computers.required' => 'Please specify the number of billing computers / counters.',
            'store_locations.required' => 'Please select your number of store locations.',
            'contact_method.required' => 'Please select your preferred contact method.',
        ]);

        $features = !empty($validated['required_features']) 
            ? implode(', ', $validated['required_features']) 
            : 'Standard multi-terminal retail setup';

        $fullMessage = "Product: RS Inventory – LAN (Multi-Computer Edition)\n"
            . "Business / Store Name: " . $validated['business_name'] . "\n"
            . "Business Type: " . $validated['business_type'] . "\n"
            . "Billing Counters / PCs: " . $validated['billing_computers'] . "\n"
            . "Store Outlets / Locations: " . $validated['store_locations'] . "\n"
            . "Current Inventory System: " . ($validated['current_software'] ?: 'Not specified') . "\n"
            . "Preferred Contact: " . $validated['contact_method'] . "\n"
            . "Required LAN Features: " . $features . "\n\n"
            . "Additional Requirements & Store Architecture Notes:\n" . ($validated['additional_requirements'] ?: 'No additional notes provided.');

        $lead = Lead::create([
            'type' => 'lan_demo_request',
            'name' => $validated['name'],
            'email' => $validated['email'],
            'phone' => $validated['phone'],
            'company' => $validated['business_name'],
            'subject_or_service' => 'RS Inventory – LAN Demo (' . $validated['billing_computers'] . ')',
            'contact_method' => $validated['contact_method'],
            'message' => $fullMessage,
            'reference_page' => $request->headers->get('referer') ?: url('/products/rs-inventory-lan'),
        ]);

        defer(function () use ($lead) {
            try {
                $adminEmail = env('MAIL_RECEIVER', SiteSetting::where('key', 'contact_email')->value('value') ?? 'info@rsorangetech.com');
                Mail::to($adminEmail)->send(new LeadNotification($lead));
                Mail::to($lead->email)->send(new LeadConfirmation($lead));
            } catch (\Throwable $e) {
                Log::warning('Failed sending RS Inventory – LAN demo request notification: ' . $e->getMessage());
            }
        });

        return back()
            ->with('status', 'Thank you for your interest in RS Inventory – LAN. Our team will review your requirements and contact you.')
            ->withFragment('demo-request');
    }

    /**
     * Display the RS Inventory – Business product landing and enterprise multi-location sandbox page.
     */
    public function inventoryBusiness(): View
    {
        $settings = cache()->remember('site_settings_contact', 86400, function () {
            return SiteSetting::whereIn('key', ['phone', 'contact_email', 'office_address'])->pluck('value', 'key')->toArray();
        });

        $phone = $settings['phone'] ?? '+91 73035 36474';
        $email = $settings['contact_email'] ?? 'info@rsorangetech.com';

        return view('site.products.rs-inventory-business', [
            'title' => 'RS Inventory – Business | Enterprise Retail & Multi-Branch Management Software',
            'description' => 'Explore RS Inventory – Business by RS ORANGE TECH. An enterprise retail management solution integrating multi-location inventory, purchasing, POS billing, customer loyalty, and business analytics.',
            'phone' => $phone,
            'email' => $email,
            'canonicalUrl' => url('/products/rs-inventory-business'),
        ]);
    }

    /**
     * Handle the RS Inventory – Business demo and corporate inquiry form submission.
     */
    public function inventoryBusinessSubmit(Request $request): RedirectResponse
    {
        // Anti-spam honeypot verification
        if ($request->filled('my_custom_country_verify')) {
            return back()->with('status', 'Thank you for your interest in RS Inventory – Business. Our team will review your requirements and contact you.');
        }

        $name = (string) $request->input('name');
        $businessName = (string) $request->input('business_name');
        $requirements = (string) $request->input('additional_requirements');

        // Filter known spam payloads
        if (
            str_contains($name, 'MichaeleresY') || 
            stripos($businessName, 'Jackpot') !== false || 
            stripos($requirements, 'Jackpot') !== false
        ) {
            return back()->with('status', 'Thank you for your interest in RS Inventory – Business. Our team will review your requirements and contact you.');
        }

        $validated = $request->validate([
            'name' => ['required', 'string', 'max:120'],
            'business_name' => ['required', 'string', 'max:160'],
            'email' => ['required', 'email', 'max:160'],
            'phone' => ['required', 'string', 'max:40'],
            'business_type' => ['required', 'string', 'max:100'],
            'store_outlets' => ['required', 'string', 'max:60'],
            'billing_terminals' => ['required', 'string', 'max:60'],
            'annual_turnover' => ['nullable', 'string', 'max:60'],
            'required_modules' => ['nullable', 'array'],
            'required_modules.*' => ['string', 'max:100'],
            'contact_method' => ['required', 'string', 'in:WhatsApp,Phone Call,Email'],
            'additional_requirements' => ['nullable', 'string', 'max:2000'],
        ], [
            'name.required' => 'Please enter your full name.',
            'business_name.required' => 'Please provide your company or business name.',
            'email.required' => 'Please provide a valid corporate or work email address.',
            'email.email' => 'Please enter a valid email format.',
            'phone.required' => 'Please provide your direct contact or WhatsApp phone number.',
            'business_type.required' => 'Please select your industry or retail category.',
            'store_outlets.required' => 'Please specify the number of retail stores or branch outlets.',
            'billing_terminals.required' => 'Please select the estimated total billing counters.',
            'contact_method.required' => 'Please select your preferred communication channel.',
        ]);

        $modules = !empty($validated['required_modules']) 
            ? implode(', ', $validated['required_modules']) 
            : 'Comprehensive Enterprise Suite';

        $fullMessage = "Product: RS Inventory – Business (Enterprise Edition)\n"
            . "Company / Brand: " . $validated['business_name'] . "\n"
            . "Industry / Category: " . $validated['business_type'] . "\n"
            . "Number of Outlets / Branches: " . $validated['store_outlets'] . "\n"
            . "Total Billing Terminals: " . $validated['billing_terminals'] . "\n"
            . "Approximate Turnover: " . ($validated['annual_turnover'] ?: 'Not disclosed') . "\n"
            . "Preferred Communication: " . $validated['contact_method'] . "\n"
            . "Required Enterprise Modules: " . $modules . "\n\n"
            . "Operational Requirements & Architecture Notes:\n" . ($validated['additional_requirements'] ?: 'No additional notes provided.');

        $lead = Lead::create([
            'type' => 'business_demo_request',
            'name' => $validated['name'],
            'email' => $validated['email'],
            'phone' => $validated['phone'],
            'company' => $validated['business_name'],
            'subject_or_service' => 'RS Inventory – Business Demo (' . $validated['store_outlets'] . ')',
            'contact_method' => $validated['contact_method'],
            'message' => $fullMessage,
            'reference_page' => $request->headers->get('referer') ?: url('/products/rs-inventory-business'),
        ]);

        defer(function () use ($lead) {
            try {
                $adminEmail = env('MAIL_RECEIVER', SiteSetting::where('key', 'contact_email')->value('value') ?? 'info@rsorangetech.com');
                Mail::to($adminEmail)->send(new LeadNotification($lead));
                Mail::to($lead->email)->send(new LeadConfirmation($lead));
            } catch (\Throwable $e) {
                Log::warning('Failed sending RS Inventory – Business demo request notification: ' . $e->getMessage());
            }
        });

        return back()
            ->with('status', 'Thank you for your interest in RS Inventory – Business. An enterprise software specialist will review your requirements and contact you.')
            ->withFragment('demo-request');
    }
}
