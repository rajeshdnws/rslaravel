<!doctype html>
@php
    $settings = cache()->remember('site_settings_contact', 86400, function () {
        return \App\Models\SiteSetting::whereIn('key', ['phone', 'contact_email', 'office_address'])->pluck('value', 'key')->toArray();
    });
    $phone = $settings['phone'] ?? '+91 73035 36474';
    $email = $settings['contact_email'] ?? 'info@rsorangetech.com';
    $address = $settings['office_address'] ?? 'B-125, Sector 63, Noida, Gautam Buddha Nagar, Uttar Pradesh 201301';
    
    $phoneLink = preg_replace('/[^0-9+]/', '', $phone);
    $inlineAddress = strip_tags(str_replace(['<br>', '<br/>', '<br />'], ', ', $address));
@endphp
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <title>{{ $title ?? 'RS Orange Tech | Web, App & Software Solutions' }}</title>
    <link rel="icon" type="image/x-icon" href="{{ asset('favicon.ico') }}">
    <link rel="icon" type="image/png" sizes="96x96" href="{{ asset('favicon-96x96.png') }}">
    <link rel="icon" type="image/svg+xml" href="{{ asset('favicon.svg') }}">
    <meta name="description" content="{{ $description ?? 'RS Orange Tech builds affordable web solutions, Laravel apps, e-commerce platforms, mobile apps and AI automation for growing businesses.' }}">
    <link rel="canonical" href="{{ url()->current() }}">
    <meta property="og:type" content="website">
    <meta property="og:title" content="{{ $title ?? 'RS Orange Tech | Web, App & Software Solutions' }}">
    <meta property="og:description" content="{{ $description ?? 'RS Orange Tech builds affordable web solutions, Laravel apps, e-commerce platforms, mobile apps and AI automation for growing businesses.' }}">
    <meta property="og:url" content="{{ url()->current() }}">
    <meta property="og:image" content="{{ asset('site-assets/banner1.webp') }}">
    <meta name="twitter:card" content="summary_large_image">
    <meta name="twitter:title" content="{{ $title ?? 'RS Orange Tech | Web, App & Software Solutions' }}">
    <meta name="twitter:description" content="{{ $description ?? 'RS Orange Tech builds affordable web solutions, Laravel apps, e-commerce platforms, mobile apps and AI automation for growing businesses.' }}">
    <meta name="twitter:image" content="{{ asset('site-assets/banner1.webp') }}">
    <meta name="robots" content="index, follow, max-image-preview:large, max-snippet:-1, max-video-preview:-1">
    <link rel="preconnect" href="https://fonts.bunny.net">
    <link href="https://fonts.bunny.net/css?family=instrument-sans:400,500,600,700,800" rel="stylesheet">
    <link rel="stylesheet" href="{{ asset('css/site.css') }}?v=1.03">
    @stack('head')
    
    @if (config('services.google.analytics_id'))
        <!-- Google tag (gtag.js) -->
        <script async src="https://www.googletagmanager.com/gtag/js?id={{ config('services.google.analytics_id') }}"></script>
        <script>
            window.dataLayer = window.dataLayer || [];
            function gtag(){dataLayer.push(arguments);}
            gtag('js', new Date());

            gtag('config', '{{ config('services.google.analytics_id') }}');
        </script>
    @endif
</head>
<body>
    <header class="topbar">
        <div class="topline">
            <div class="topline-inner">
                <div class="top-contact">
                    <span>Location</span>
                    <a href="tel:{{ $phoneLink }}">{{ $phone }}</a>
                    <a href="mailto:{{ $email }}">{{ $email }}</a>
                </div>
                <div class="top-social" aria-label="Social links">
                    <a href="#">f</a>
                    <a href="#">x</a>
                    <a href="#">ig</a>
                    <a href="https://www.linkedin.com/company/rsorangetech" target="_blank" rel="noopener noreferrer">in</a>
                </div>
            </div>
        </div>
    </header>
    <nav class="nav">
        <a class="brand" href="{{ route('home') }}">
            <img src="{{ asset('rslogo.png') }}" alt="RS Orange Tech">
        </a>
        <button class="nav-toggle" type="button" aria-controls="site-navlinks" aria-expanded="false" aria-label="Open navigation">
            <span></span>
            <span></span>
            <span></span>
        </button>
        <div class="navlinks" id="site-navlinks">
            <a href="{{ route('home') }}">Home</a>
            <a href="{{ route('services') }}">Services</a>
            <a href="/agency-partners">For Agencies</a>
            <a href="{{ route('portfolio') }}">Portfolio</a>
            <a href="{{ route('technologies') }}">Technologies</a>
            <a href="{{ route('about') }}">About Us</a>
            <a href="{{ route('contact') }}">Contact Us</a>
            <div class="nav-dropdown">
                <a class="dropdown-toggle" href="{{ route('plugins') }}" aria-haspopup="true" aria-expanded="false">Plugins</a>
                <div class="dropdown-menu">
                    <a href="{{ route('pages.show', 'rs-gallery') }}">Gallery Plugin</a>
                    <a href="{{ route('pages.show', 'ai-website-fixer-auto-repair-seo-optimizer') }}">AI Website Fixer</a>
                </div>
            </div>
            <a class="quote-link" href="{{ route('quote') }}">Get a Quote</a>
        </div>
    </nav>

    @if (session('status'))
        <div class="notice">{{ session('status') }}</div>
    @endif

    <main>
        @yield('content')
    </main>

    <footer class="footer">
        <div class="footer-about">
            <a class="footer-brand" href="{{ route('home') }}">
                <img src="{{ asset('rslogo.png') }}" alt="RS Orange Tech">
            </a>
            <p>We deliver smart, scalable and affordable web solutions that help businesses grow online.</p>
            <div class="footer-social">
                <a href="#">f</a>
                <a href="#">x</a>
                <a href="#">ig</a>
                <a href="https://www.linkedin.com/company/rsorangetech" target="_blank" rel="noopener noreferrer">in</a>
            </div>
        </div>
        <div class="footer-address">
            <h3>Address</h3>
            <p><span>●</span>{{ $inlineAddress }}</p>
            <p><span>●</span><a href="tel:{{ $phoneLink }}">{{ $phone }}</a></p>
            <p><span>●</span><a href="mailto:{{ $email }}">{{ $email }}</a></p>
        </div>
        <div class="footer-links">
            <h3>Quick Links</h3>
            <a href="{{ route('about') }}">About Us</a>
            <a href="{{ route('our-approach') }}">Our Approach</a>
            <a href="{{ route('services') }}">Services</a>
            <a href="{{ route('blog') }}">Blog</a>
            <a href="{{ route('privacy') }}">Privacy Policy</a>
            <a href="{{ route('terms') }}">Terms & Conditions</a>
        </div>
        <form class="newsletter" method="post" action="{{ route('newsletter') }}">
            @csrf
            <h3>Newsletter</h3>
            <p>Subscribe to our newsletter to get the latest news, updates and offers delivered straight to your inbox.</p>
            <input name="email" type="email" placeholder="Your email address" required>
            <input name="name" type="text" placeholder="Your name">
            <button type="submit">Subscribe Now <span>→</span></button>
        </form>
    </footer>
    <div class="copyright">© 2026 <span>RS Orange Tech</span> | All Rights Reserved.</div>
    <script>
        const navToggle = document.querySelector('.nav-toggle');
        const navLinks = document.querySelector('#site-navlinks');

        if (navToggle && navLinks) {
            navToggle.addEventListener('click', () => {
                const isOpen = navToggle.getAttribute('aria-expanded') === 'true';
                navToggle.setAttribute('aria-expanded', String(!isOpen));
                navToggle.setAttribute('aria-label', isOpen ? 'Open navigation' : 'Close navigation');
                navLinks.classList.toggle('is-open', !isOpen);
            });

            navLinks.querySelectorAll('a').forEach((link) => {
                link.addEventListener('click', () => {
                    navToggle.setAttribute('aria-expanded', 'false');
                    navToggle.setAttribute('aria-label', 'Open navigation');
                    navLinks.classList.remove('is-open');
                });
            });
        }
    </script>
    @stack('scripts')
    @include('site.partials.chatbot')
</body>
</html>
