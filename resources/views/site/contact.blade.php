@extends('site.layout')

@php
    $settings = cache()->remember('site_settings_contact', 86400, function () {
        return \App\Models\SiteSetting::whereIn('key', ['phone', 'contact_email', 'office_address'])->pluck('value', 'key')->toArray();
    });
    $phone = $settings['phone'] ?? '+91 73035 36474';
    $email = $settings['contact_email'] ?? 'info@rsorangetech.com';
    $address = $settings['office_address'] ?? 'B-125, Sector 63,<br>Noida, Gautam Buddha Nagar,<br>Uttar Pradesh 201301';
    
    $phoneLink = preg_replace('/[^0-9+]/', '', $phone);
@endphp

@push('head')
<style>
    .contact-page-hero {
        background: radial-gradient(circle at top center, #0f172a 0%, #020617 100%);
        padding: 120px 20px 80px;
        text-align: center;
        color: #fff;
        position: relative;
        overflow: hidden;
        margin-top: -80px;
    }
    .contact-page-hero::before {
        content: '';
        position: absolute;
        top: -50%;
        left: 50%;
        transform: translateX(-50%);
        width: 1000px;
        height: 1000px;
        background: radial-gradient(circle, rgba(255,107,26,0.15) 0%, transparent 60%);
        pointer-events: none;
    }
    .contact-eyebrow {
        display: inline-block;
        padding: 6px 16px;
        background: rgba(255, 107, 26, 0.1);
        border: 1px solid rgba(255, 107, 26, 0.3);
        border-radius: 100px;
        color: #ff8c42;
        font-size: 14px;
        font-weight: 700;
        text-transform: uppercase;
        letter-spacing: 0.1em;
        margin-bottom: 24px;
    }
    .contact-page-hero h1 {
        font-size: 56px;
        font-weight: 800;
        line-height: 1.1;
        margin-bottom: 24px;
        background: linear-gradient(to right, #ffffff, #94a3b8);
        -webkit-background-clip: text;
        -webkit-text-fill-color: transparent;
    }
    .contact-page-hero p {
        font-size: 20px;
        color: #94a3b8;
        max-width: 700px;
        margin: 0 auto;
        line-height: 1.6;
    }

    .contact-content-section {
        padding: 80px 20px;
        background: #f8fafc;
    }
    .contact-grid {
        max-width: 1200px;
        margin: 0 auto;
        display: grid;
        grid-template-columns: 1fr 1.5fr;
        gap: 60px;
        align-items: flex-start;
    }
    @media (max-width: 992px) {
        .contact-grid {
            grid-template-columns: 1fr;
        }
    }

    /* Contact Info Card */
    .contact-info-card {
        background: #0f172a;
        border-radius: 24px;
        padding: 50px;
        color: #fff;
        position: relative;
        overflow: hidden;
        box-shadow: 0 20px 40px rgba(0,0,0,0.1);
    }
    .contact-info-card::after {
        content: '';
        position: absolute;
        bottom: -50px;
        right: -50px;
        width: 300px;
        height: 300px;
        background: radial-gradient(circle, rgba(255,107,26,0.15) 0%, transparent 60%);
        border-radius: 50%;
        pointer-events: none;
    }
    .contact-info-card h2 {
        font-size: 32px;
        font-weight: 800;
        margin-bottom: 12px;
    }
    .contact-info-card p.subtitle {
        color: #94a3b8;
        font-size: 16px;
        margin-bottom: 40px;
        line-height: 1.6;
    }
    .contact-detail-item {
        display: flex;
        align-items: flex-start;
        gap: 16px;
        margin-bottom: 30px;
    }
    .contact-detail-item svg {
        color: #ff6b1a;
        flex-shrink: 0;
        margin-top: 4px;
    }
    .contact-detail-text h4 {
        font-size: 18px;
        font-weight: 700;
        margin-bottom: 4px;
    }
    .contact-detail-text p {
        color: #cbd5e1;
        font-size: 15px;
        line-height: 1.6;
    }
    .contact-detail-text a {
        color: #cbd5e1;
        text-decoration: none;
        transition: color 0.3s ease;
    }
    .contact-detail-text a:hover {
        color: #ff8c42;
    }

    /* Simple Form */
    .simple-contact-form {
        background: #ffffff;
        border-radius: 24px;
        padding: 50px;
        box-shadow: 0 10px 30px rgba(0,0,0,0.03);
        border: 1px solid rgba(15,23,42,0.05);
    }
    .simple-contact-form h3 {
        font-size: 28px;
        font-weight: 800;
        color: #0f172a;
        margin-bottom: 30px;
    }
    .form-group {
        margin-bottom: 24px;
    }
    .form-group label {
        display: block;
        font-size: 14px;
        font-weight: 700;
        color: #1e293b;
        margin-bottom: 8px;
    }
    .form-group input, .form-group textarea {
        width: 100%;
        padding: 16px 20px;
        border: 1px solid #e2e8f0;
        border-radius: 12px;
        background: #f8fafc;
        font-size: 16px;
        color: #0f172a;
        transition: all 0.3s ease;
    }
    .form-group input:focus, .form-group textarea:focus {
        outline: none;
        border-color: #ff8c42;
        background: #fff;
        box-shadow: 0 0 0 4px rgba(255, 107, 26, 0.1);
    }
    .submit-btn {
        display: inline-flex;
        align-items: center;
        gap: 8px;
        padding: 16px 40px;
        background: linear-gradient(135deg, #ff6b1a 0%, #ff8c42 100%);
        color: #fff;
        font-size: 16px;
        font-weight: 700;
        text-decoration: none;
        border-radius: 100px;
        border: none;
        cursor: pointer;
        box-shadow: 0 10px 30px rgba(255, 107, 26, 0.3);
        transition: all 0.3s ease;
    }
    .submit-btn:hover {
        transform: translateY(-3px);
        box-shadow: 0 15px 40px rgba(255, 107, 26, 0.4);
    }
    
    .form-success {
        background: rgba(16, 185, 129, 0.1);
        border: 1px solid rgba(16, 185, 129, 0.2);
        color: #059669;
        padding: 16px 20px;
        border-radius: 12px;
        margin-bottom: 24px;
        font-weight: 500;
    }
    .iti { width: 100%; display: block; }
    .iti__flag-container { border-radius: 12px 0 0 12px; }
    .iti__selected-flag { border-radius: 12px 0 0 12px !important; }
</style>
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/intl-tel-input/17.0.8/css/intlTelInput.css"/>
@endpush

@section('content')
<section class="contact-page-hero">
    <span class="contact-eyebrow">Get in Touch</span>
    <h1>Let’s Start a Conversation</h1>
    <p>Have a question, need technical support, or want to discuss a partnership? Send us a message and we'll reply promptly.</p>
</section>

<section class="contact-content-section">
    <div class="contact-grid">
        
        <!-- Left: Contact Details -->
        <div class="contact-info-card">
            <h2>RS Orange Tech</h2>
            <p class="subtitle">Innovation Beyond Limits. We build digital products that perform, scale, and convert.</p>
            
            <div class="contact-detail-item">
                <svg width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><path d="M22 16.92v3a2 2 0 0 1-2.18 2 19.79 19.79 0 0 1-8.63-3.07 19.5 19.5 0 0 1-6-6 19.79 19.79 0 0 1-3.07-8.67A2 2 0 0 1 4.11 2h3a2 2 0 0 1 2 1.72 12.84 12.84 0 0 0 .7 2.81 2 2 0 0 1-.45 2.11L8.09 9.91a16 16 0 0 0 6 6l1.27-1.27a2 2 0 0 1 2.11-.45 12.84 12.84 0 0 0 2.81.7A2 2 0 0 1 22 16.92z"></path></svg>
                <div class="contact-detail-text">
                    <h4>Phone</h4>
                    <p><a href="tel:{{ $phoneLink }}">{{ $phone }}</a></p>
                </div>
            </div>
            
            <div class="contact-detail-item">
                <svg width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><path d="M4 4h16c1.1 0 2 .9 2 2v12c0 1.1-.9 2-2 2H4c-1.1 0-2-.9-2-2V6c0-1.1.9-2 2-2z"></path><polyline points="22,6 12,13 2,6"></polyline></svg>
                <div class="contact-detail-text">
                    <h4>Email</h4>
                    <p><a href="mailto:{{ $email }}">{{ $email }}</a></p>
                </div>
            </div>
            
            <div class="contact-detail-item">
                <svg width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><path d="M21 10c0 7-9 13-9 13s-9-6-9-13a9 9 0 0 1 18 0z"></path><circle cx="12" cy="10" r="3"></circle></svg>
                <div class="contact-detail-text">
                    <h4>Office Address</h4>
                    <p>{!! $address !!}</p>
                </div>
            </div>
        </div>

        <!-- Right: Simple Form -->
        <div class="simple-contact-form">
            <h3>Send us a Message</h3>
            
            @if (session('status'))
                <div class="form-success">
                    {{ session('status') }}
                </div>
            @endif
            
            <form action="{{ route('contact.submit') }}" method="POST">
                @csrf
                <div class="form-group">
                    <label for="name">Full Name <span style="color: #ef4444;">*</span></label>
                    <input type="text" id="name" name="name" required placeholder="John Doe" value="{{ old('name') }}">
                </div>
                
                <div class="form-group">
                    <label for="email">Email Address <span style="color: #ef4444;">*</span></label>
                    <input type="email" id="email" name="email" required placeholder="john@example.com" value="{{ old('email') }}">
                </div>
                
                <div class="form-group">
                    <label for="phone">Phone Number <span style="color: #ef4444;">*</span></label>
                    <input type="tel" id="phone" name="phone" required value="{{ old('phone') }}">
                </div>
                
                <div class="form-group">
                    <label for="subject">Subject</label>
                    <input type="text" id="subject" name="subject" placeholder="How can we help you?" value="{{ old('subject') }}">
                </div>
                
                <div class="form-group">
                    <label for="message">Message <span style="color: #ef4444;">*</span></label>
                    <textarea id="message" name="message" rows="4" required placeholder="Write your message here...">{{ old('message') }}</textarea>
                </div>
                
                <button type="submit" class="submit-btn">
                    Send Message
                    <svg width="20" height="20" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><line x1="22" y1="2" x2="11" y2="13"></line><polygon points="22 2 15 22 11 13 2 9 22 2"></polygon></svg>
                </button>
            </form>
        </div>
        
    </div>
</section>
@endsection

@push('scripts')
<script src="https://cdnjs.cloudflare.com/ajax/libs/intl-tel-input/17.0.8/js/intlTelInput.min.js"></script>
<script>
    document.addEventListener("DOMContentLoaded", function() {
        const phoneInputField = document.querySelector("#phone");
        const phoneInput = window.intlTelInput(phoneInputField, {
            utilsScript: "https://cdnjs.cloudflare.com/ajax/libs/intl-tel-input/17.0.8/js/utils.js",
            initialCountry: "auto",
            geoIpLookup: function(success, failure) {
                fetch("https://ipapi.co/json")
                  .then(function(res) { return res.json(); })
                  .then(function(data) { success(data.country_code); })
                  .catch(function() { success("us"); });
            }
        });

        const form = document.querySelector(".simple-contact-form form");
        form.addEventListener("submit", function() {
            if (phoneInput.isValidNumber()) {
                phoneInputField.value = phoneInput.getNumber();
            }
        });
    });
</script>
@endpush
