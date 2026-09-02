@php
    $settings = cache()->remember('site_settings_contact', 86400, function () {
        return \App\Models\SiteSetting::whereIn('key', ['phone', 'contact_email', 'office_address'])->pluck('value', 'key')->toArray();
    });
    $phone = $settings['phone'] ?? '+91 73035 36474';
    $email = $settings['contact_email'] ?? 'info@rsorangetech.com';
    $phoneClean = preg_replace('/[^0-9+]/', '', $phone);
    $waLink = "https://wa.me/" . preg_replace('/[^0-9]/', '', $phone) . "?text=" . urlencode("Hello RS Orange Tech! I just submitted a project inquiry on your website.");
@endphp
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Thank You — We've Received Your Project Details | RS Orange Tech</title>
    <meta name="description" content="Thank you for contacting RS Orange Tech. Our team will review your requirements and contact you shortly.">
    <meta name="robots" content="noindex, follow">

    <!-- Favicon -->
    <link rel="icon" type="image/x-icon" href="{{ asset('favicon.ico') }}">
    <link rel="icon" type="image/png" sizes="96x96" href="{{ asset('favicon-96x96.png') }}">
    <link rel="icon" type="image/svg+xml" href="{{ asset('favicon.svg') }}">

    <!-- Google Fonts -->
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Plus+Jakarta+Sans:wght@400;500;600;700;800&family=JetBrains+Mono:wght@500;600&display=swap" rel="stylesheet">

    <!-- Stylesheet -->
    <link rel="stylesheet" href="{{ asset('css/landing-page.css') }}?v=1.20">

    <!-- Google Tag Manager / Conversion Event DataLayer -->
    <script>
        window.dataLayer = window.dataLayer || [];
        window.dataLayer.push({
            'event': 'generate_lead',
            'lead_type': 'google_ads_lp',
            'conversion_value': 1.0
        });
    </script>
</head>
<body style="background: #f8fafc; min-height: 100vh; display: flex; flex-direction: column; justify-content: space-between;">

    <!-- Minimal Header -->
    <header class="lp-header">
        <div class="container lp-header-inner">
            <a href="{{ route('home') }}" class="lp-brand">
                <img src="{{ asset('rslogo.png') }}" alt="RS Orange Tech Logo">
            </a>
            <div class="lp-header-actions">
                <a href="tel:{{ $phoneClean }}" class="lp-call-link" data-track-event="phone_click">
                    <span class="status-dot"></span>
                    <span>Call Us: {{ $phone }}</span>
                </a>
                <a href="{{ $waLink }}" target="_blank" rel="noopener noreferrer" class="lp-wa-btn" data-track-event="whatsapp_click">
                    <svg width="18" height="18" viewBox="0 0 24 24" fill="currentColor"><path d="M.057 24l1.687-6.163c-1.041-1.804-1.588-3.849-1.587-5.946.003-6.556 5.338-11.891 11.893-11.891 3.181.001 6.167 1.24 8.413 3.488 2.245 2.248 3.481 5.236 3.48 8.414-.003 6.557-5.338 11.892-11.893 11.892-1.99-.001-3.951-.5-5.688-1.448l-5.705 1.654zm6.597-3.807c1.676.995 3.276 1.591 5.392 1.592 5.448 0 9.886-4.434 9.889-9.885.002-5.462-4.415-9.89-9.881-9.892-5.452 0-9.887 4.434-9.889 9.884-.001 2.225.651 3.891 1.746 5.634l-.999 3.648 3.742-.981zm11.387-5.464c-.074-.124-.272-.198-.57-.347-.297-.149-1.758-.868-2.031-.967-.272-.099-.47-.149-.669.149-.198.297-.768.967-.941 1.165-.173.198-.347.223-.644.074-.297-.149-1.255-.462-2.39-1.475-.883-.788-1.48-1.761-1.653-2.059-.173-.297-.018-.458.13-.606.134-.133.297-.347.446-.521.151-.172.2-.296.3-.495.099-.198.05-.372-.025-.521-.075-.148-.669-1.611-.916-2.206-.242-.579-.487-.501-.669-.51l-.57-.01c-.198 0-.52.074-.792.372s-1.04 1.016-1.04 2.479 1.065 2.876 1.213 3.074c.149.198 2.095 3.2 5.076 4.487.709.306 1.263.489 1.694.626.712.226 1.36.194 1.872.118.571-.085 1.758-.719 2.006-1.413.248-.695.248-1.29.173-1.414z"/></svg>
                    <span>WhatsApp</span>
                </a>
            </div>
        </div>
    </header>

    <!-- Thank You Content -->
    <main style="padding: 60px 0 80px; flex-grow: 1;">
        <div class="container" style="max-width: 820px;">
            <div style="background: #ffffff; border-radius: var(--radius-xl); padding: 48px 40px; border: 1px solid var(--gray-200); box-shadow: var(--shadow-card); text-align: center;">
                
                <!-- Success Check -->
                <div style="width: 80px; height: 80px; background: #dcfce7; color: #16a34a; border-radius: 50%; display: inline-flex; align-items: center; justify-content: center; margin-bottom: 24px;">
                    <svg width="42" height="42" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2.5" stroke-linecap="round" stroke-linejoin="round"><path d="M22 11.08V12a10 10 0 1 1-5.93-9.14"></path><polyline points="22 4 12 14.01 9 11.01"></polyline></svg>
                </div>

                <div class="badge-pill" style="margin-bottom: 16px;">
                    Inquiry Received Successfully
                </div>

                <h1 style="font-size: clamp(1.85rem, 3.2vw, 2.5rem); font-weight: 800; color: var(--gray-900); margin-bottom: 14px; letter-spacing: -0.02em;">
                    Thank You — We've Received Your Project Details
                </h1>

                <p style="font-size: 1.12rem; color: var(--gray-600); line-height: 1.6; max-width: 620px; margin: 0 auto 36px;">
                    Our team will review your requirements and contact you shortly.
                </p>

                <!-- What Happens Next? 4-Step Roadmap -->
                <div style="text-align: left; background: var(--gray-50); border: 1px solid var(--gray-200); border-radius: var(--radius-lg); padding: 32px 28px; margin-bottom: 36px;">
                    <h3 style="font-size: 1.15rem; font-weight: 800; color: var(--gray-900); margin-bottom: 20px; display: flex; align-items: center; gap: 8px;">
                        <span>📋</span> What Happens Next?
                    </h3>

                    <div style="display: grid; grid-template-columns: repeat(auto-fit, minmax(220px, 1fr)); gap: 18px;">
                        <div style="background: #ffffff; padding: 18px; border-radius: var(--radius-md); border: 1px solid var(--gray-200);">
                            <div style="font-family: var(--font-mono); font-size: 0.8rem; font-weight: 800; color: var(--primary); margin-bottom: 6px;">1. Requirements Review</div>
                            <p style="font-size: 0.88rem; color: var(--gray-600); line-height: 1.45;">We review your project information.</p>
                        </div>

                        <div style="background: #ffffff; padding: 18px; border-radius: var(--radius-md); border: 1px solid var(--gray-200);">
                            <div style="font-family: var(--font-mono); font-size: 0.8rem; font-weight: 800; color: var(--primary); margin-bottom: 6px;">2. Initial Discussion</div>
                            <p style="font-size: 0.88rem; color: var(--gray-600); line-height: 1.45;">Our team contacts you.</p>
                        </div>

                        <div style="background: #ffffff; padding: 18px; border-radius: var(--radius-md); border: 1px solid var(--gray-200);">
                            <div style="font-family: var(--font-mono); font-size: 0.8rem; font-weight: 800; color: var(--primary); margin-bottom: 6px;">3. Technical Discussion</div>
                            <p style="font-size: 0.88rem; color: var(--gray-600); line-height: 1.45;">We understand your requirements and goals.</p>
                        </div>

                        <div style="background: #ffffff; padding: 18px; border-radius: var(--radius-md); border: 1px solid var(--gray-200);">
                            <div style="font-family: var(--font-mono); font-size: 0.8rem; font-weight: 800; color: var(--primary); margin-bottom: 6px;">4. Next Steps</div>
                            <p style="font-size: 0.88rem; color: var(--gray-600); line-height: 1.45;">We recommend the appropriate development approach.</p>
                        </div>
                    </div>
                </div>

                <!-- Immediate Connect Actions -->
                <div style="background: #fff7ed; border: 1px solid #fed7aa; border-radius: var(--radius-md); padding: 20px 24px; display: flex; align-items: center; justify-content: space-between; flex-wrap: wrap; gap: 16px; text-align: left;">
                    <div>
                        <h4 style="font-size: 1rem; font-weight: 700; color: var(--gray-900); margin-bottom: 2px;">Need a Fast Response?</h4>
                        <p style="font-size: 0.88rem; color: var(--gray-600);">Connect directly with our development team.</p>
                    </div>
                    <div style="display: flex; gap: 12px; flex-wrap: wrap;">
                        <a href="{{ $waLink }}" target="_blank" rel="noopener noreferrer" class="lp-wa-btn" style="padding: 10px 18px; font-size: 0.92rem;" data-track-event="whatsapp_click">
                            <span>WhatsApp Us</span>
                        </a>
                        <a href="tel:{{ $phoneClean }}" class="btn btn-secondary btn-sm" style="padding: 10px 18px;" data-track-event="phone_click">
                            <span>Call Us: {{ $phone }}</span>
                        </a>
                    </div>
                </div>

                <div style="margin-top: 32px;">
                    <a href="{{ route('lp.web-software') }}" style="color: var(--gray-600); font-size: 0.92rem; font-weight: 600; text-decoration: underline;">
                        ← Return to Landing Page
                    </a>
                </div>

            </div>
        </div>
    </main>

    <!-- Footer -->
    <footer class="lp-footer" style="padding: 24px 0;">
        <div class="container" style="display: flex; justify-content: space-between; align-items: center; flex-wrap: wrap; gap: 12px; font-size: 0.85rem;">
            <div>&copy; {{ date('Y') }} RS Orange Tech. B-125, Sector 63, Noida, Uttar Pradesh 201301.</div>
            <div><a href="mailto:{{ $email }}" style="color: var(--gray-300);">{{ $email }}</a></div>
        </div>
    </footer>

</body>
</html>
