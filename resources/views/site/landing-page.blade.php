@php
    $settings = cache()->remember('site_settings_contact', 86400, function () {
        return \App\Models\SiteSetting::whereIn('key', ['phone', 'contact_email', 'office_address'])->pluck('value', 'key')->toArray();
    });
    $phone = $settings['phone'] ?? '+91 73035 36474';
    $email = $settings['contact_email'] ?? 'info@rsorangetech.com';
    $phoneClean = preg_replace('/[^0-9+]/', '', $phone);
    $waLink = "https://wa.me/" . preg_replace('/[^0-9]/', '', $phone) . "?text=" . urlencode("Hello RS Orange Tech! I'm interested in discussing a custom web/software development project.");
    
    $title = "Custom Web & Software Development Company | RS Orange Tech";
    $description = "Build scalable web applications, custom software, SaaS, CRM, ERP and Laravel solutions with RS Orange Tech. Get a free project consultation.";
    $canonicalUrl = route('lp.web-software');
@endphp
<!DOCTYPE html>
<html lang="en" class="scroll-smooth">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    
    <title>{{ $title }}</title>
    <meta name="description" content="{{ $description }}">
    <link rel="canonical" href="{{ $canonicalUrl }}">
    
    <!-- Open Graph / Social Meta -->
    <meta property="og:type" content="website">
    <meta property="og:title" content="{{ $title }}">
    <meta property="og:description" content="{{ $description }}">
    <meta property="og:url" content="{{ $canonicalUrl }}">
    <meta property="og:image" content="{{ asset('site-assets/banner1.webp') }}">
    <meta name="twitter:card" content="summary_large_image">
    <meta name="twitter:title" content="{{ $title }}">
    <meta name="twitter:description" content="{{ $description }}">
    <meta name="twitter:image" content="{{ asset('site-assets/banner1.webp') }}">
    <meta name="robots" content="index, follow">

    <!-- Favicon -->
    <link rel="icon" type="image/x-icon" href="{{ asset('favicon.ico') }}">
    <link rel="icon" type="image/png" sizes="96x96" href="{{ asset('favicon-96x96.png') }}">
    <link rel="icon" type="image/svg+xml" href="{{ asset('favicon.svg') }}">

    <!-- Google Fonts -->
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Plus+Jakarta+Sans:wght@300;400;500;600;700;800&family=JetBrains+Mono:wght@400;500;600&display=swap" rel="stylesheet">

    <!-- Stylesheet -->
    <link rel="stylesheet" href="{{ asset('css/landing-page.css') }}?v=1.20">

    <!-- Schema.org JSON-LD Structured Data -->
    <script type="application/ld+json">
    {
        "@@context": "https://schema.org",
        "@@graph": [
            {
                "@@type": "ProfessionalService",
                "@@id": "{{ $canonicalUrl }}#organization",
                "name": "RS Orange Tech",
                "url": "{{ $canonicalUrl }}",
                "logo": "{{ asset('rslogo.png') }}",
                "image": "{{ asset('site-assets/banner1.webp') }}",
                "description": "{{ $description }}",
                "telephone": "{{ $phone }}",
                "email": "{{ $email }}",
                "address": {
                    "@@type": "PostalAddress",
                    "streetAddress": "B-125, Sector 63",
                    "addressLocality": "Noida",
                    "addressRegion": "Uttar Pradesh",
                    "postalCode": "201301",
                    "addressCountry": "IN"
                },
                "priceRange": "$$",
                "areaServed": ["IN", "US", "GB", "AU", "CA", "AE"]
            },
            {
                "@@type": "FAQPage",
                "mainEntity": [
                    {
                        "@@type": "Question",
                        "name": "How much does custom software development cost?",
                        "acceptedAnswer": {
                            "@@type": "Answer",
                            "text": "Project cost depends on the features, complexity, integrations, technology and development scope. After understanding your requirements, we provide a transparent proposal with clear milestones and pricing."
                        }
                    },
                    {
                        "@@type": "Question",
                        "name": "How long does development take?",
                        "acceptedAnswer": {
                            "@@type": "Answer",
                            "text": "A typical MVP or focused web application takes 2 to 4 weeks. Larger custom systems, multi-tenant SaaS, or complex integrations require 6 to 12 weeks with weekly demo sprints."
                        }
                    },
                    {
                        "@@type": "Question",
                        "name": "Do you work with international clients?",
                        "acceptedAnswer": {
                            "@@type": "Answer",
                            "text": "We work with businesses across India and international markets including the USA, UK, Australia, Canada and UAE."
                        }
                    },
                    {
                        "@@type": "Question",
                        "name": "Can you sign an NDA?",
                        "acceptedAnswer": {
                            "@@type": "Answer",
                            "text": "Absolutely. We sign standard Non-Disclosure Agreements (NDAs) prior to reviewing any project briefs, proprietary wireframes, or existing codebase. Your intellectual property remains 100% yours."
                        }
                    }
                ]
            }
        ]
    }
    </script>
</head>
<body>

    <!-- 1. Minimal Header (Zero-distraction conversion header) -->
    <header class="lp-header" id="top">
        <div class="container lp-header-inner">
            <a href="{{ route('home') }}" class="lp-brand" title="RS Orange Tech Home">
                <img src="{{ asset('rslogo.png') }}" alt="RS Orange Tech Logo">
            </a>

            <div class="lp-header-actions">
                <a href="tel:{{ $phoneClean }}" class="lp-call-link" title="Call our engineering team" data-track-event="phone_click">
                    <span class="status-dot"></span>
                    <span>Call Us: {{ $phone }}</span>
                </a>
                
                <a href="{{ $waLink }}" target="_blank" rel="noopener noreferrer" class="lp-wa-btn" data-track-event="whatsapp_click">
                    <svg width="18" height="18" viewBox="0 0 24 24" fill="currentColor"><path d="M.057 24l1.687-6.163c-1.041-1.804-1.588-3.849-1.587-5.946.003-6.556 5.338-11.891 11.893-11.891 3.181.001 6.167 1.24 8.413 3.488 2.245 2.248 3.481 5.236 3.48 8.414-.003 6.557-5.338 11.892-11.893 11.892-1.99-.001-3.951-.5-5.688-1.448l-5.705 1.654zm6.597-3.807c1.676.995 3.276 1.591 5.392 1.592 5.448 0 9.886-4.434 9.889-9.885.002-5.462-4.415-9.89-9.881-9.892-5.452 0-9.887 4.434-9.889 9.884-.001 2.225.651 3.891 1.746 5.634l-.999 3.648 3.742-.981zm11.387-5.464c-.074-.124-.272-.198-.57-.347-.297-.149-1.758-.868-2.031-.967-.272-.099-.47-.149-.669.149-.198.297-.768.967-.941 1.165-.173.198-.347.223-.644.074-.297-.149-1.255-.462-2.39-1.475-.883-.788-1.48-1.761-1.653-2.059-.173-.297-.018-.458.13-.606.134-.133.297-.347.446-.521.151-.172.2-.296.3-.495.099-.198.05-.372-.025-.521-.075-.148-.669-1.611-.916-2.206-.242-.579-.487-.501-.669-.51l-.57-.01c-.198 0-.52.074-.792.372s-1.04 1.016-1.04 2.479 1.065 2.876 1.213 3.074c.149.198 2.095 3.2 5.076 4.487.709.306 1.263.489 1.694.626.712.226 1.36.194 1.872.118.571-.085 1.758-.719 2.006-1.413.248-.695.248-1.29.173-1.414z"/></svg>
                    <span>WhatsApp</span>
                </a>

                <a href="#consultation-form" class="btn btn-primary btn-sm" data-track-event="consultation_click">
                    Get Free Consultation
                </a>
            </div>
        </div>
    </header>

    <!-- 2. Hero Section -->
    <section class="lp-hero">
        <div class="container lp-hero-grid">
            <div class="lp-hero-content">
                <div class="badge-pill">
                    ⚡ Experienced Technology Partner
                </div>

                <h1 class="lp-hero-h1">
                    Custom Web & Software Development for <span class="gradient-text">Growing Businesses</span>
                </h1>

                <p class="lp-hero-sub">
                    Build scalable web applications, SaaS platforms, CRM, ERP and custom software with an experienced development team.
                </p>

                <div class="lp-hero-ctas">
                    <a href="#consultation-form" class="btn btn-primary btn-lg" data-track-event="consultation_click">
                        <span>Get Free Consultation</span>
                        <svg width="20" height="20" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2.5" stroke-linecap="round" stroke-linejoin="round"><line x1="5" y1="12" x2="19" y2="12"></line><polyline points="12 5 19 12 12 19"></polyline></svg>
                    </a>
                    <a href="{{ $waLink }}" target="_blank" rel="noopener noreferrer" class="btn btn-secondary btn-lg" data-track-event="whatsapp_click">
                        <svg width="20" height="20" viewBox="0 0 24 24" fill="currentColor"><path d="M.057 24l1.687-6.163c-1.041-1.804-1.588-3.849-1.587-5.946.003-6.556 5.338-11.891 11.893-11.891 3.181.001 6.167 1.24 8.413 3.488 2.245 2.248 3.481 5.236 3.48 8.414-.003 6.557-5.338 11.892-11.893 11.892-1.99-.001-3.951-.5-5.688-1.448l-5.705 1.654zm6.597-3.807c1.676.995 3.276 1.591 5.392 1.592 5.448 0 9.886-4.434 9.889-9.885.002-5.462-4.415-9.89-9.881-9.892-5.452 0-9.887 4.434-9.889 9.884-.001 2.225.651 3.891 1.746 5.634l-.999 3.648 3.742-.981zm11.387-5.464c-.074-.124-.272-.198-.57-.347-.297-.149-1.758-.868-2.031-.967-.272-.099-.47-.149-.669.149-.198.297-.768.967-.941 1.165-.173.198-.347.223-.644.074-.297-.149-1.255-.462-2.39-1.475-.883-.788-1.48-1.761-1.653-2.059-.173-.297-.018-.458.13-.606.134-.133.297-.347.446-.521.151-.172.2-.296.3-.495.099-.198.05-.372-.025-.521-.075-.148-.669-1.611-.916-2.206-.242-.579-.487-.501-.669-.51l-.57-.01c-.198 0-.52.074-.792.372s-1.04 1.016-1.04 2.479 1.065 2.876 1.213 3.074c.149.198 2.095 3.2 5.076 4.487.709.306 1.263.489 1.694.626.712.226 1.36.194 1.872.118.571-.085 1.758-.719 2.006-1.413.248-.695.248-1.29.173-1.414z"/></svg>
                        <span>WhatsApp Us</span>
                    </a>
                </div>

                <div class="hero-reassurance-note">
                    <svg width="15" height="15" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2.5"><circle cx="12" cy="12" r="10"></circle><polyline points="12 6 12 12 14 14"></polyline></svg>
                    <span>Free consultation • No obligation • Confidential discussion</span>
                </div>

                <div class="lp-hero-trust-row">
                    <div class="trust-check-item">
                        <svg width="18" height="18" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="3" stroke-linecap="round" stroke-linejoin="round"><polyline points="20 6 9 17 4 12"></polyline></svg>
                        <span>9+ Years Experience</span>
                    </div>
                    <div class="trust-check-item">
                        <svg width="18" height="18" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="3" stroke-linecap="round" stroke-linejoin="round"><polyline points="20 6 9 17 4 12"></polyline></svg>
                        <span>500+ Projects Delivered</span>
                    </div>
                    <div class="trust-check-item">
                        <svg width="18" height="18" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="3" stroke-linecap="round" stroke-linejoin="round"><polyline points="20 6 9 17 4 12"></polyline></svg>
                        <span>200+ Clients</span>
                    </div>
                    <div class="trust-check-item">
                        <svg width="18" height="18" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="3" stroke-linecap="round" stroke-linejoin="round"><polyline points="20 6 9 17 4 12"></polyline></svg>
                        <span>Global Clients</span>
                    </div>
                </div>
            </div>

            <!-- Right Visual: Engineering Architecture & Code Showcase -->
            <div class="hero-visual-card">
                <div class="visual-window-bar">
                    <div class="window-dots">
                        <div class="window-dot dot-red"></div>
                        <div class="window-dot dot-yellow"></div>
                        <div class="window-dot dot-green"></div>
                    </div>
                    <div class="window-title">RS-ORANGE // ARCHITECTURE</div>
                    <div style="font-size:0.75rem; color:#4ade80; font-weight:600;">● Active Stack</div>
                </div>

                <div class="architecture-blocks-grid">
                    <div class="arch-box">
                        <div class="arch-label">Core Engine</div>
                        <div class="arch-val">Laravel 11 / Node.js</div>
                    </div>
                    <div class="arch-box">
                        <div class="arch-label">Frontend & UI</div>
                        <div class="arch-val">React / Next.js / Blade</div>
                    </div>
                    <div class="arch-box">
                        <div class="arch-label">Database & Cache</div>
                        <div class="arch-val">PostgreSQL / MySQL / Redis</div>
                    </div>
                    <div class="arch-box">
                        <div class="arch-label">Cloud Deployment</div>
                        <div class="arch-val">AWS / Docker / CI/CD</div>
                    </div>
                </div>

                <div class="code-snippet-box">
                    <span class="token-comment">// Custom Business Application Architecture</span><br>
                    <span class="token-keyword">class</span> <span class="token-class">EnterpriseSystem</span> <span class="token-keyword">implements</span> <span class="token-class">ScalablePlatform</span> {<br>
                    &nbsp;&nbsp;<span class="token-keyword">public function</span> <span class="token-func">buildSolution</span>(BusinessReq $req): <span class="token-class">Deployment</span> {<br>
                    &nbsp;&nbsp;&nbsp;&nbsp;<span class="token-keyword">return</span> $this-&gt;<span class="token-func">engineer</span>([<br>
                    &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<span class="token-str">'architecture'</span> =&gt; <span class="token-str">'Modular MVC / REST APIs'</span>,<br>
                    &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<span class="token-str">'security'</span> =&gt; <span class="token-str">'OWASP Standard / Data Encryption'</span>,<br>
                    &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<span class="token-str">'scalability'</span> =&gt; <span class="token-str">'Multi-Tenant & High-Concurrency'</span><br>
                    &nbsp;&nbsp;&nbsp;&nbsp;]);<br>
                    &nbsp;&nbsp;}<br>
                    }
                </div>

                <div class="visual-badges-strip">
                    <span class="visual-tech-tag">⚡ Production Ready</span>
                    <span class="visual-tech-tag">🛡️ Secure & Tested</span>
                    <span class="visual-tech-tag">🚀 Quality Focused</span>
                    <span class="visual-tech-tag">🔒 Strict NDA</span>
                    <span class="visual-tech-tag">🤖 AI Automation</span>
                </div>
            </div>
        </div>
    </section>

    <!-- 3. Above-the-Fold Conversion Strip -->
    <section class="lp-quick-convert-strip">
        <div class="container quick-convert-inner">
            <div class="quick-convert-text">
                <strong>Have a project idea?</strong>
                <span>Talk directly with our development team about your requirements, technology options and estimated approach.</span>
            </div>
            <a href="#consultation-form" class="btn btn-primary btn-sm" data-track-event="consultation_click">
                <span>Book Free Consultation →</span>
            </a>
        </div>
    </section>

    <!-- 4. Trust Bar & Key Stats -->
    <section class="lp-trust-bar">
        <div class="container">
            <div class="stats-grid">
                <div class="stat-item">
                    <div class="stat-number">9+</div>
                    <div class="stat-title">Years Experience</div>
                    <div class="stat-desc">Proven technology expertise</div>
                </div>
                <div class="stat-item">
                    <div class="stat-number">500+</div>
                    <div class="stat-title">Projects Delivered</div>
                    <div class="stat-desc">Web apps, SaaS & custom software</div>
                </div>
                <div class="stat-item">
                    <div class="stat-number">200+</div>
                    <div class="stat-title">Clients</div>
                    <div class="stat-desc">Startups, SMEs & enterprises</div>
                </div>
                <div class="stat-item">
                    <div class="stat-number">Global</div>
                    <div class="stat-title">Client Reach</div>
                    <div class="stat-desc">India, USA, UK, Australia, UAE & Canada</div>
                </div>
            </div>
        </div>
    </section>

    <!-- 5. Problem → Solution Section -->
    <section class="lp-problem-solution" id="solutions">
        <div class="container">
            <div class="section-header">
                <div class="badge-pill">Technology Partnership</div>
                <h2>More Than Just Development — A Technology Partner</h2>
                <p>We help businesses overcome critical engineering roadblocks with reliable, scalable, and business-focused software solutions.</p>
            </div>

            <div class="problem-solution-grid">
                <!-- Card 1 -->
                <div class="ps-card">
                    <div class="ps-challenge-block">
                        <div class="ps-challenge-tag">Client Challenge</div>
                        <div class="ps-challenge-title">Unclear Technical Requirements</div>
                    </div>
                    <div class="ps-solution-block">
                        <div class="ps-solution-tag">RS Orange Tech Solution</div>
                        <div class="ps-solution-title">Technical Discovery & Architecture</div>
                        <p class="ps-solution-desc">We translate your business ideas into clear functional wireframes, technical scope, and database schema before writing a line of code.</p>
                    </div>
                </div>

                <!-- Card 2 -->
                <div class="ps-card">
                    <div class="ps-challenge-block">
                        <div class="ps-challenge-tag">Client Challenge</div>
                        <div class="ps-challenge-title">Outdated Legacy Systems</div>
                    </div>
                    <div class="ps-solution-block">
                        <div class="ps-solution-tag">RS Orange Tech Solution</div>
                        <div class="ps-solution-title">Modernization & Re-Architecture</div>
                        <p class="ps-solution-desc">Migrate monolithic, slow applications to modern Laravel, Node.js, and React architecture with zero data loss or business downtime.</p>
                    </div>
                </div>

                <!-- Card 3 -->
                <div class="ps-card">
                    <div class="ps-challenge-block">
                        <div class="ps-challenge-tag">Client Challenge</div>
                        <div class="ps-challenge-title">Manual Business Processes</div>
                    </div>
                    <div class="ps-solution-block">
                        <div class="ps-solution-tag">RS Orange Tech Solution</div>
                        <div class="ps-solution-title">Custom Software & CRM/ERP</div>
                        <p class="ps-solution-desc">Eliminate spreadsheet chaos with centralized portals, automated workflows, and role-based operational dashboards.</p>
                    </div>
                </div>

                <!-- Card 4 -->
                <div class="ps-card">
                    <div class="ps-challenge-block">
                        <div class="ps-challenge-tag">Client Challenge</div>
                        <div class="ps-challenge-title">Disconnected Tools & Systems</div>
                    </div>
                    <div class="ps-solution-block">
                        <div class="ps-solution-tag">RS Orange Tech Solution</div>
                        <div class="ps-solution-title">API & System Integration</div>
                        <p class="ps-solution-desc">Connect payment gateways, CRMs, ERPs, accounting software, and AI models into a unified, synchronized ecosystem.</p>
                    </div>
                </div>

                <!-- Card 5 -->
                <div class="ps-card">
                    <div class="ps-challenge-block">
                        <div class="ps-challenge-tag">Client Challenge</div>
                        <div class="ps-challenge-title">Fast-Growing Product Scaling</div>
                    </div>
                    <div class="ps-solution-block">
                        <div class="ps-solution-tag">RS Orange Tech Solution</div>
                        <div class="ps-solution-title">Scalable Architecture</div>
                        <p class="ps-solution-desc">Database indexing, Redis caching, microservices, and cloud deployment on AWS/Docker to handle increasing user concurrency.</p>
                    </div>
                </div>

                <!-- Card 6 -->
                <div class="ps-card">
                    <div class="ps-challenge-block">
                        <div class="ps-challenge-tag">Client Challenge</div>
                        <div class="ps-challenge-title">Post-Launch Uncertainty</div>
                    </div>
                    <div class="ps-solution-block">
                        <div class="ps-solution-tag">RS Orange Tech Solution</div>
                        <div class="ps-solution-title">Long-Term Tech Partnership</div>
                        <p class="ps-solution-desc">Proactive maintenance, continuous feature rollouts, security monitoring, and dedicated developer support as your business scales.</p>
                    </div>
                </div>
            </div>

            <!-- Micro CTA Prompt -->
            <div class="section-micro-cta">
                <div>
                    <h4>Have an existing application that needs improvement?</h4>
                    <p>Our senior architects can audit your current codebase and suggest a roadmap.</p>
                </div>
                <a href="#consultation-form" class="btn btn-secondary btn-sm" data-track-event="consultation_click">
                    <span>Discuss Your Project →</span>
                </a>
            </div>
        </div>
    </section>

    <!-- 6. Services Section -->
    <section class="lp-services" id="services">
        <div class="container">
            <div class="section-header">
                <div class="badge-pill">What We Can Build</div>
                <h2>Custom Web & Software Development Services</h2>
                <p>Purpose-built software engineering tailored to your business model, operational workflows, and growth targets.</p>
            </div>

            <div class="services-grid">
                <!-- Service 1 -->
                <div class="service-card">
                    <div>
                        <div class="service-icon-wrap">
                            <svg width="26" height="26" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><rect x="2" y="3" width="20" height="14" rx="2" ry="2"></rect><line x1="8" y1="21" x2="16" y2="21"></line><line x1="12" y1="17" x2="12" y2="21"></line></svg>
                        </div>
                        <h3>Custom Web Development</h3>
                        <p>Business websites and powerful web applications built around your exact commercial requirements and user personas.</p>
                    </div>
                    <a href="#consultation-form" class="card-cta-link" onclick="preselectService('Web Application')" data-track-event="service_select">
                        <span>Get Consultation</span>
                        <svg width="15" height="15" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2.5"><line x1="5" y1="12" x2="19" y2="12"></line><polyline points="12 5 19 12 12 19"></polyline></svg>
                    </a>
                </div>

                <!-- Service 2 -->
                <div class="service-card">
                    <div>
                        <div class="service-icon-wrap">
                            <svg width="26" height="26" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><polyline points="16 18 22 12 16 6"></polyline><polyline points="8 6 2 12 8 18"></polyline></svg>
                        </div>
                        <h3>Laravel Development</h3>
                        <p>Scalable Laravel applications, RESTful APIs, enterprise web backends, and robust MVC platforms built with clean code standards.</p>
                    </div>
                    <a href="#consultation-form" class="card-cta-link" onclick="preselectService('Laravel Application')" data-track-event="service_select">
                        <span>Get Consultation</span>
                        <svg width="15" height="15" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2.5"><line x1="5" y1="12" x2="19" y2="12"></line><polyline points="12 5 19 12 12 19"></polyline></svg>
                    </a>
                </div>

                <!-- Service 3 -->
                <div class="service-card">
                    <div>
                        <div class="service-icon-wrap">
                            <svg width="26" height="26" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><path d="M14 2H6a2 2 0 0 0-2 2v16a2 2 0 0 0 2 2h12a2 2 0 0 0 2-2V8z"></path><polyline points="14 2 14 8 20 8"></polyline><line x1="16" y1="13" x2="8" y2="13"></line><line x1="16" y1="17" x2="8" y2="17"></line><polyline points="10 9 9 9 8 9"></polyline></svg>
                        </div>
                        <h3>Custom Software</h3>
                        <p>Purpose-built internal software, operations portals, and automation systems engineered around your unique company workflows.</p>
                    </div>
                    <a href="#consultation-form" class="card-cta-link" onclick="preselectService('Custom Software')" data-track-event="service_select">
                        <span>Get Consultation</span>
                        <svg width="15" height="15" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2.5"><line x1="5" y1="12" x2="19" y2="12"></line><polyline points="12 5 19 12 12 19"></polyline></svg>
                    </a>
                </div>

                <!-- Service 4 -->
                <div class="service-card">
                    <div>
                        <div class="service-icon-wrap">
                            <svg width="26" height="26" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><path d="M17 21v-2a4 4 0 0 0-4-4H5a4 4 0 0 0-4 4v2"></path><circle cx="9" cy="7" r="4"></circle><path d="M23 21v-2a4 4 0 0 0-3-3.87"></path><path d="M16 3.13a4 4 0 0 1 0 7.75"></path></svg>
                        </div>
                        <h3>CRM / ERP</h3>
                        <p>Centralize customer data, sales pipelines, inventory, billing, and organizational processes into one secure, intuitive portal.</p>
                    </div>
                    <a href="#consultation-form" class="card-cta-link" onclick="preselectService('CRM / ERP')" data-track-event="service_select">
                        <span>Get Consultation</span>
                        <svg width="15" height="15" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2.5"><line x1="5" y1="12" x2="19" y2="12"></line><polyline points="12 5 19 12 12 19"></polyline></svg>
                    </a>
                </div>

                <!-- Service 5 -->
                <div class="service-card">
                    <div>
                        <div class="service-icon-wrap">
                            <svg width="26" height="26" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><polygon points="12 2 2 7 12 12 22 7 12 2"></polygon><polyline points="2 17 12 22 22 17"></polyline><polyline points="2 12 12 17 22 12"></polyline></svg>
                        </div>
                        <h3>SaaS Development</h3>
                        <p>Build and scale multi-tenant SaaS products from initial MVP roadmap to enterprise-ready production platforms with subscription billing.</p>
                    </div>
                    <a href="#consultation-form" class="card-cta-link" onclick="preselectService('SaaS')" data-track-event="service_select">
                        <span>Get Consultation</span>
                        <svg width="15" height="15" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2.5"><line x1="5" y1="12" x2="19" y2="12"></line><polyline points="12 5 19 12 12 19"></polyline></svg>
                    </a>
                </div>

                <!-- Service 6 -->
                <div class="service-card">
                    <div>
                        <div class="service-icon-wrap">
                            <svg width="26" height="26" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><circle cx="9" cy="21" r="1"></circle><circle cx="20" cy="21" r="1"></circle><path d="M1 1h4l2.68 13.39a2 2 0 0 0 2 1.61h9.72a2 2 0 0 0 2-1.61L23 6H6"></path></svg>
                        </div>
                        <h3>E-commerce</h3>
                        <p>Custom, scalable e-commerce platforms with fast checkout, payment gateway integrations, catalog sync, and ERP connectivity.</p>
                    </div>
                    <a href="#consultation-form" class="card-cta-link" onclick="preselectService('E-commerce')" data-track-event="service_select">
                        <span>Get Consultation</span>
                        <svg width="15" height="15" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2.5"><line x1="5" y1="12" x2="19" y2="12"></line><polyline points="12 5 19 12 12 19"></polyline></svg>
                    </a>
                </div>

                <!-- Service 7 -->
                <div class="service-card">
                    <div>
                        <div class="service-icon-wrap">
                            <svg width="26" height="26" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><path d="M21 16V8a2 2 0 0 0-1-1.73l-7-4a2 2 0 0 0-2 0l-7 4A2 2 0 0 0 3 8v8a2 2 0 0 0 1 1.73l7 4a2 2 0 0 0 2 0l7-4A2 2 0 0 0 21 16z"></path><polyline points="3.27 6.96 12 12.01 20.73 6.96"></polyline><line x1="12" y1="22.08" x2="12" y2="12"></line></svg>
                        </div>
                        <h3>AI Development</h3>
                        <p>Incorporate OpenAI & Claude LLMs, intelligent automated assistants, document parsing, and predictive business features into your platform.</p>
                    </div>
                    <a href="#consultation-form" class="card-cta-link" onclick="preselectService('AI Application')" data-track-event="service_select">
                        <span>Get Consultation</span>
                        <svg width="15" height="15" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2.5"><line x1="5" y1="12" x2="19" y2="12"></line><polyline points="12 5 19 12 12 19"></polyline></svg>
                    </a>
                </div>

                <!-- Service 8 -->
                <div class="service-card">
                    <div>
                        <div class="service-icon-wrap">
                            <svg width="26" height="26" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><line x1="16.5" y1="9.4" x2="7.5" y2="4.21"></line><path d="M21 16V8a2 2 0 0 0-1-1.73l-7-4a2 2 0 0 0-2 0l-7 4A2 2 0 0 0 3 8v8a2 2 0 0 0 1 1.73l7 4a2 2 0 0 0 2 0l7-4A2 2 0 0 0 21 16z"></path><polyline points="3.27 6.96 12 12.01 20.73 6.96"></polyline><line x1="12" y1="22.08" x2="12" y2="12"></line></svg>
                        </div>
                        <h3>API / System Integration</h3>
                        <p>Connect applications, payment gateways, accounting systems, marketing software, and legacy databases into one frictionless pipeline.</p>
                    </div>
                    <a href="#consultation-form" class="card-cta-link" onclick="preselectService('Custom Software')" data-track-event="service_select">
                        <span>Get Consultation</span>
                        <svg width="15" height="15" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2.5"><line x1="5" y1="12" x2="19" y2="12"></line><polyline points="12 5 19 12 12 19"></polyline></svg>
                    </a>
                </div>
            </div>

            <!-- Micro CTA Prompt -->
            <div class="section-micro-cta">
                <div>
                    <h4>Not sure which technology or architecture you need?</h4>
                    <p>Talk directly with our development team to explore options suited to your budget and timeline.</p>
                </div>
                <a href="#consultation-form" class="btn btn-primary btn-sm" data-track-event="consultation_click">
                    <span>Talk to Our Team →</span>
                </a>
            </div>
        </div>
    </section>

    <!-- 7. Technology Authority -->
    <section class="lp-tech-stack">
        <div class="container">
            <div class="section-header">
                <div class="badge-pill">Enterprise Stack</div>
                <h2>Modern Technology. Built for Scale.</h2>
                <p>We build on stable, open, enterprise-grade frameworks designed for performance, high security, and long-term maintainability.</p>
            </div>

            <div class="tech-categories-strip">
                <div class="tech-row-wrap">
                    <div class="tech-cat-label">Backend & APIs:</div>
                    <div class="tech-tags-group">
                        <span class="tech-pill">⚡ Laravel (PHP)</span>
                        <span class="tech-pill">🟢 Node.js / Express</span>
                        <span class="tech-pill">🐍 Python / Django</span>
                        <span class="tech-pill">🔌 REST & GraphQL APIs</span>
                    </div>
                </div>

                <div class="tech-row-wrap">
                    <div class="tech-cat-label">Frontend & Web:</div>
                    <div class="tech-tags-group">
                        <span class="tech-pill">⚛️ React.js</span>
                        <span class="tech-pill">▲ Next.js</span>
                        <span class="tech-pill">💚 Vue.js</span>
                        <span class="tech-pill">🎨 Tailwind CSS</span>
                        <span class="tech-pill">📱 Flutter</span>
                    </div>
                </div>

                <div class="tech-row-wrap">
                    <div class="tech-cat-label">Database & Cloud:</div>
                    <div class="tech-tags-group">
                        <span class="tech-pill">🐬 MySQL</span>
                        <span class="tech-pill">🐘 PostgreSQL</span>
                        <span class="tech-pill">⚡ Redis Caching</span>
                        <span class="tech-pill">☁️ AWS (EC2 / S3 / RDS)</span>
                        <span class="tech-pill">🐳 Docker</span>
                    </div>
                </div>

                <div class="tech-row-wrap">
                    <div class="tech-cat-label">AI & Commerce:</div>
                    <div class="tech-tags-group">
                        <span class="tech-pill">🤖 OpenAI & Claude API</span>
                        <span class="tech-pill">🛍️ Magento 2 / Adobe Commerce</span>
                        <span class="tech-pill">🛒 Shopify</span>
                        <span class="tech-pill">💳 Stripe / Razorpay</span>
                    </div>
                </div>
            </div>

            <div class="tech-philosophy-note">
                <strong>Our Technology Philosophy:</strong> We select technology based on your product requirements, scalability, security and long-term maintainability.
            </div>
        </div>
    </section>

    <!-- 8. Case Studies (Conversion-Oriented: Problem → Solution → Tech) -->
    <section class="lp-portfolio" id="portfolio">
        <div class="container">
            <div class="section-header">
                <div class="badge-pill">Real Case Studies</div>
                <h2>Projects We've Built</h2>
                <p>Explore real-world software, SaaS platforms, and custom web applications delivered by our engineering team.</p>
            </div>

            <div class="portfolio-grid">
                <!-- Case Study 1: WaBizFlow -->
                <article class="project-card">
                    <div class="project-img-box">
                        <img src="{{ asset('site-assets/wabizflow.png') }}" alt="WaBizFlow SaaS & CRM Platform by RS Orange Tech" loading="lazy">
                        <div class="project-category-badge">B2B SaaS Platform</div>
                    </div>
                    <div class="project-details">
                        <div class="project-meta-row">Industry: B2B CRM & Marketing Automation</div>
                        <h3 class="project-title">WaBizFlow</h3>
                        <div class="project-breakdown-list">
                            <div><strong>Challenge:</strong> Multi-channel customer communication was fragmented, manual, and unscalable for sales teams.</div>
                            <div><strong>Solution:</strong> Engineered a full-featured B2B SaaS platform with WhatsApp messaging automation, contact sync, and recurring billing.</div>
                        </div>
                        <div class="project-tech-pills">
                            <span class="p-tech-pill">Laravel</span>
                            <span class="p-tech-pill">SaaS Multi-Tenant</span>
                            <span class="p-tech-pill">WhatsApp API</span>
                            <span class="p-tech-pill">MySQL</span>
                        </div>
                        <div class="project-action">
                            <a href="#consultation-form" onclick="preselectService('SaaS')" data-track-event="case_study_click">Request Similar Project →</a>
                        </div>
                    </div>
                </article>

                <!-- Case Study 2: VidyaPilot -->
                <article class="project-card">
                    <div class="project-img-box">
                        <img src="{{ asset('site-assets/vidyapilot-landing.png') }}" alt="VidyaPilot EdTech & AI Learning Platform" loading="lazy">
                        <div class="project-category-badge">AI EdTech Platform</div>
                    </div>
                    <div class="project-details">
                        <div class="project-meta-row">Industry: EdTech & Online Learning</div>
                        <h3 class="project-title">VidyaPilot</h3>
                        <div class="project-breakdown-list">
                            <div><strong>Challenge:</strong> Needed an intuitive portal capable of delivering timed Olympiad tests with automated AI evaluation.</div>
                            <div><strong>Solution:</strong> Developed an interactive student testing platform with real-time analytics, mock exams, and parent scorecards.</div>
                        </div>
                        <div class="project-tech-pills">
                            <span class="p-tech-pill">Laravel</span>
                            <span class="p-tech-pill">AI Automation</span>
                            <span class="p-tech-pill">Analytics</span>
                            <span class="p-tech-pill">Livewire</span>
                        </div>
                        <div class="project-action">
                            <a href="#consultation-form" onclick="preselectService('AI Application')" data-track-event="case_study_click">Request Similar Project →</a>
                        </div>
                    </div>
                </article>

                <!-- Case Study 3: Jyoti Pilot Portal -->
                <article class="project-card">
                    <div class="project-img-box">
                        <img src="{{ asset('site-assets/design.png') }}" alt="Jyoti Pilot Portal by RS Orange Tech" loading="lazy">
                        <div class="project-category-badge">Custom Web Application</div>
                    </div>
                    <div class="project-details">
                        <div class="project-meta-row">Industry: Media & High-Traffic Web</div>
                        <h3 class="project-title">Jyoti Pilot Portal</h3>
                        <div class="project-breakdown-list">
                            <div><strong>Challenge:</strong> Heavy spike traffic caused slow load times and content delivery lag on existing setup.</div>
                            <div><strong>Solution:</strong> Re-architected with custom Laravel backend, optimized database caching, and responsive frontend UI.</div>
                        </div>
                        <div class="project-tech-pills">
                            <span class="p-tech-pill">Laravel</span>
                            <span class="p-tech-pill">Tailwind CSS</span>
                            <span class="p-tech-pill">Redis</span>
                            <span class="p-tech-pill">Speed Optimized</span>
                        </div>
                        <div class="project-action">
                            <a href="#consultation-form" onclick="preselectService('Laravel Application')" data-track-event="case_study_click">Request Similar Project →</a>
                        </div>
                    </div>
                </article>

                <!-- Case Study 4: Prime Breaks -->
                <article class="project-card">
                    <div class="project-img-box">
                        <img src="{{ asset('site-assets/prime-breaks.png') }}" alt="Prime Breaks Travel Platform" loading="lazy">
                        <div class="project-category-badge">Booking & Travel Platform</div>
                    </div>
                    <div class="project-details">
                        <div class="project-meta-row">Industry: Travel & Hospitality</div>
                        <h3 class="project-title">Prime Breaks</h3>
                        <div class="project-breakdown-list">
                            <div><strong>Challenge:</strong> Complex holiday package discovery that struggled with lead drop-offs on mobile devices.</div>
                            <div><strong>Solution:</strong> Built a conversion-focused discovery portal with search-first package discovery and automated inquiry dispatch.</div>
                        </div>
                        <div class="project-tech-pills">
                            <span class="p-tech-pill">Custom Web UX</span>
                            <span class="p-tech-pill">Inquiry Engine</span>
                            <span class="p-tech-pill">Mobile-First</span>
                        </div>
                        <div class="project-action">
                            <a href="#consultation-form" onclick="preselectService('Web Application')" data-track-event="case_study_click">Request Similar Project →</a>
                        </div>
                    </div>
                </article>

                <!-- Case Study 5: Desi Run Rush -->
                <article class="project-card">
                    <div class="project-img-box">
                        <img src="{{ asset('site-assets/desi-run-rush.png') }}" alt="Desi Run Rush Showcase" loading="lazy">
                        <div class="project-category-badge">Product Showcase UX</div>
                    </div>
                    <div class="project-details">
                        <div class="project-meta-row">Industry: Gaming & Mobile Product</div>
                        <h3 class="project-title">Desi Run Rush</h3>
                        <div class="project-breakdown-list">
                            <div><strong>Challenge:</strong> Needed an ultra-fast, visually bold promotional landing experience for mobile app store downloads.</div>
                            <div><strong>Solution:</strong> Engineered an optimized responsive product page achieving sub-1.2 second load times and direct app store routing.</div>
                        </div>
                        <div class="project-tech-pills">
                            <span class="p-tech-pill">Speed Architecture</span>
                            <span class="p-tech-pill">Landing UX</span>
                            <span class="p-tech-pill">High Conversion</span>
                        </div>
                        <div class="project-action">
                            <a href="#consultation-form" onclick="preselectService('Website')" data-track-event="case_study_click">Request Similar Project →</a>
                        </div>
                    </div>
                </article>

                <!-- Case Study 6: Little Steps -->
                <article class="project-card">
                    <div class="project-img-box">
                        <img src="{{ asset('site-assets/little-steps.png') }}" alt="Little Steps Web Platform" loading="lazy">
                        <div class="project-category-badge">Education & Portal</div>
                    </div>
                    <div class="project-details">
                        <div class="project-meta-row">Industry: Education & Institution</div>
                        <h3 class="project-title">Little Steps</h3>
                        <div class="project-breakdown-list">
                            <div><strong>Challenge:</strong> Outdated administrative communication and manual student admission processing.</div>
                            <div><strong>Solution:</strong> Developed a responsive web platform with integrated parent portal communication and digital admission forms.</div>
                        </div>
                        <div class="project-tech-pills">
                            <span class="p-tech-pill">Custom CMS</span>
                            <span class="p-tech-pill">Parent Portal</span>
                            <span class="p-tech-pill">Responsive</span>
                        </div>
                        <div class="project-action">
                            <a href="#consultation-form" onclick="preselectService('Website')" data-track-event="case_study_click">Request Similar Project →</a>
                        </div>
                    </div>
                </article>
            </div>

            <!-- Micro CTA Prompt -->
            <div class="section-micro-cta">
                <div>
                    <h4>Have a similar project in mind?</h4>
                    <p>Discuss your scope, tech stack, and deliverable milestones with our development team.</p>
                </div>
                <a href="#consultation-form" class="btn btn-primary btn-sm" data-track-event="consultation_click">
                    <span>Discuss Your Project →</span>
                </a>
            </div>
        </div>
    </section>

    <!-- 9. Why RS Orange Tech -->
    <section class="lp-why-us">
        <div class="container">
            <div class="section-header dark">
                <div class="badge-pill badge-pill-dark">Why Choose Us</div>
                <h2>Why Businesses Work With RS Orange Tech</h2>
                <p>We combine commercial understanding with senior engineering rigor to deliver lasting business value.</p>
            </div>

            <div class="why-us-grid">
                <div class="why-card">
                    <div class="why-icon">
                        <svg width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"><polyline points="16 18 22 12 16 6"></polyline><polyline points="8 6 2 12 8 18"></polyline></svg>
                    </div>
                    <h3>Experienced Team</h3>
                    <p>9+ years of development experience building web applications, SaaS, and custom software systems.</p>
                </div>

                <div class="why-card">
                    <div class="why-icon">
                        <svg width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"><path d="M17 21v-2a4 4 0 0 0-4-4H5a4 4 0 0 0-4 4v2"></path><circle cx="9" cy="7" r="4"></circle><path d="M23 21v-2a4 4 0 0 0-3-3.87"></path><path d="M16 3.13a4 4 0 0 1 0 7.75"></path></svg>
                    </div>
                    <h3>Business-Focused Development</h3>
                    <p>We understand your business model, customer workflows, and requirements before selecting the technical solution.</p>
                </div>

                <div class="why-card">
                    <div class="why-icon">
                        <svg width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"><polygon points="12 2 2 7 12 12 22 7 12 2"></polygon><polyline points="2 17 12 22 22 17"></polyline><polyline points="2 12 12 17 22 12"></polyline></svg>
                    </div>
                    <h3>Modern Technology</h3>
                    <p>Modern frameworks, cloud infrastructure, Docker, PostgreSQL, and proven development practices.</p>
                </div>

                <div class="why-card">
                    <div class="why-icon">
                        <svg width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"><polygon points="12 2 2 7 12 12 22 7 12 2"></polygon><polyline points="2 17 12 22 22 17"></polyline><polyline points="2 12 12 17 22 12"></polyline></svg>
                    </div>
                    <h3>Scalable Architecture</h3>
                    <p>Built with future growth, high concurrency, and long-term maintainability in mind.</p>
                </div>

                <div class="why-card">
                    <div class="why-icon">
                        <svg width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"><circle cx="12" cy="12" r="10"></circle><polyline points="12 6 12 12 14 14"></polyline></svg>
                    </div>
                    <h3>Transparent Process</h3>
                    <p>Clear milestone roadmaps, sprint demos, direct developer communication, and complete project visibility.</p>
                </div>

                <div class="why-card">
                    <div class="why-icon">
                        <svg width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"><path d="M20.84 4.61a5.5 5.5 0 0 0-7.78 0L12 5.67l-1.06-1.06a5.5 5.5 0 0 0-7.78 7.78l1.06 1.06L12 21.23l7.78-7.78 1.06-1.06a5.5 5.5 0 0 0 0-7.78z"></path></svg>
                    </div>
                    <h3>Long-Term Support</h3>
                    <p>Maintenance, improvements, security patches, and continued technical support after launch.</p>
                </div>
            </div>
        </div>
    </section>

    <!-- 10. Development Process Timeline -->
    <section class="lp-process">
        <div class="container">
            <div class="section-header">
                <div class="badge-pill">Structured Delivery</div>
                <h2>From Idea to Production Launch</h2>
                <p>A structured, milestone-driven development process designed for transparency and reliable execution.</p>
            </div>

            <div class="process-steps-grid">
                <div class="process-step-box">
                    <span class="step-num">01</span>
                    <h4>Discover</h4>
                    <p>Understand business requirements, user journeys, and technical scope.</p>
                </div>

                <div class="process-step-box">
                    <span class="step-num">02</span>
                    <h4>Plan</h4>
                    <p>Define database schema, system architecture, and milestone roadmap.</p>
                </div>

                <div class="process-step-box">
                    <span class="step-num">03</span>
                    <h4>Design</h4>
                    <p>Create intuitive UI wireframes, prototypes, and responsive product flows.</p>
                </div>

                <div class="process-step-box">
                    <span class="step-num">04</span>
                    <h4>Develop</h4>
                    <p>Build using appropriate modern stacks (Laravel, React, Node.js, Python).</p>
                </div>

                <div class="process-step-box">
                    <span class="step-num">05</span>
                    <h4>Test</h4>
                    <p>Quality assurance, security audits, load tests, and cross-browser review.</p>
                </div>

                <div class="process-step-box">
                    <span class="step-num">06</span>
                    <h4>Launch</h4>
                    <p>Deploy to production servers (AWS/Docker), configure monitoring, and support.</p>
                </div>
            </div>

            <div style="text-align: center; margin-top: 40px;">
                <a href="#consultation-form" class="btn btn-primary btn-lg" data-track-event="consultation_click">
                    <span>Discuss Your Project →</span>
                </a>
            </div>
        </div>
    </section>

    <!-- 11. Social Proof & Testimonials -->
    <section class="lp-testimonials">
        <div class="container">
            <div class="section-header dark">
                <div class="badge-pill badge-pill-dark">Client Feedback</div>
                <h2>What Founders & Businesses Say</h2>
                <p>Hear from clients who partnered with our development team to build their digital products.</p>
            </div>

            <div class="testimonials-grid">
                <div class="testimonial-card">
                    <div>
                        <div class="testimonial-stars">★★★★★</div>
                        <p class="testimonial-quote">"RS Orange Tech built our custom Laravel web platform from scratch. Their team understood our business logic immediately and delivered clean, scalable code ahead of our deadline."</p>
                    </div>
                    <div class="client-info-row">
                        <div class="client-avatar">JP</div>
                        <div class="client-meta">
                            <h5>Jyoti Pilot</h5>
                            <p>Founder & Brand Director</p>
                        </div>
                    </div>
                </div>

                <div class="testimonial-card">
                    <div>
                        <div class="testimonial-stars">★★★★★</div>
                        <p class="testimonial-quote">"We needed a technical team to develop our SaaS CRM and WhatsApp automation workflows. RS Orange Tech proved to be the most reliable and transparent technology partner we've worked with."</p>
                    </div>
                    <div class="client-info-row">
                        <div class="client-avatar">WB</div>
                        <div class="client-meta">
                            <h5>WaBizFlow Team</h5>
                            <p>B2B SaaS Automation</p>
                        </div>
                    </div>
                </div>

                <div class="testimonial-card">
                    <div>
                        <div class="testimonial-stars">★★★★★</div>
                        <p class="testimonial-quote">"The engineering quality and responsiveness are top tier. They handled our EdTech platform's complex student analytics and AI tutor integration with complete professionalism."</p>
                    </div>
                    <div class="client-info-row">
                        <div class="client-avatar">VP</div>
                        <div class="client-meta">
                            <h5>VidyaPilot Education</h5>
                            <p>EdTech Platform Founder</p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <!-- 12. Lead Qualification Section (Conversion Form) -->
    <section class="lp-form-section" id="consultation-form">
        <div class="container">
            <div class="form-card-container">
                <div class="form-header">
                    <div class="badge-pill">Free Consultation & Quote</div>
                    <h2>Tell Us About Your Project</h2>
                    <p>Share a few details and our team will contact you to discuss the right solution.</p>
                </div>

                @if (isset($errors) && $errors->any())
                    <div class="alert-box alert-error">
                        <svg width="22" height="22" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"><circle cx="12" cy="12" r="10"></circle><line x1="12" y1="8" x2="12" y2="12"></line><line x1="12" y1="16" x2="12.01" y2="16"></line></svg>
                        <div>
                            <strong>Please check your form inputs:</strong>
                            <ul style="margin-left: 20px; font-weight: 400; font-size: 0.9rem;">
                                @foreach ($errors->all() as $error)
                                    <li>{{ $error }}</li>
                                @endforeach
                            </ul>
                        </div>
                    </div>
                @endif

                <form action="{{ route('lp.web-software.submit') }}" method="POST" id="lead_qualification_form" data-track-event="form_submit">
                    @csrf
                    <!-- Honeypot anti-spam -->
                    <input type="text" name="my_custom_country_verify" style="display:none !important;" tabindex="-1" autocomplete="off">

                    <div class="lead-form-grid">
                        <!-- Step 1: Basic Info (Required Fields) -->
                        <div class="form-group">
                            <label for="form_name" class="form-label">Full Name <span class="req">*</span></label>
                            <input type="text" id="form_name" name="name" class="form-input" placeholder="e.g. John Doe" value="{{ old('name') }}" required data-track-field="name">
                        </div>

                        <div class="form-group">
                            <label for="form_email" class="form-label">Business Email <span class="req">*</span></label>
                            <input type="email" id="form_email" name="email" class="form-input" placeholder="e.g. john@company.com" value="{{ old('email') }}" required data-track-field="email">
                        </div>

                        <div class="form-group">
                            <label for="form_phone" class="form-label">Phone / WhatsApp <span class="req">*</span></label>
                            <input type="tel" id="form_phone" name="phone" class="form-input" placeholder="e.g. +91 98765 43210" value="{{ old('phone') }}" required data-track-field="phone">
                        </div>

                        <div class="form-group">
                            <label for="form_company" class="form-label">Company Name</label>
                            <input type="text" id="form_company" name="company" class="form-input" placeholder="e.g. Acme Innovations" value="{{ old('company') }}">
                        </div>

                        <!-- Step 2: Project Info -->
                        <div class="form-group full-width">
                            <label for="form_service" class="form-label">What do you want to build? <span class="req">*</span></label>
                            <select id="form_service" name="service" class="form-select" required>
                                <option value="" disabled {{ old('service') ? '' : 'selected' }}>-- Select Solution Type --</option>
                                <option value="Website" {{ old('service') == 'Website' ? 'selected' : '' }}>Website (Business / Brand Website)</option>
                                <option value="Web Application" {{ old('service') == 'Web Application' ? 'selected' : '' }}>Web Application (Custom Web App / Portal)</option>
                                <option value="Laravel Application" {{ old('service') == 'Laravel Application' ? 'selected' : '' }}>Laravel Application (Custom Backend, APIs, MVC)</option>
                                <option value="CRM / ERP" {{ old('service') == 'CRM / ERP' ? 'selected' : '' }}>CRM / ERP (Customer & Operations Management)</option>
                                <option value="SaaS" {{ old('service') == 'SaaS' ? 'selected' : '' }}>SaaS Platform (Multi-Tenant Software Product)</option>
                                <option value="E-commerce" {{ old('service') == 'E-commerce' ? 'selected' : '' }}>E-commerce (Custom Store / Shopify / Magento)</option>
                                <option value="Mobile App" {{ old('service') == 'Mobile App' ? 'selected' : '' }}>Mobile App (Flutter / iOS / Android)</option>
                                <option value="Custom Software" {{ old('service') == 'Custom Software' ? 'selected' : '' }}>Custom Software (Purpose-Built Business Tool)</option>
                                <option value="AI Application" {{ old('service') == 'AI Application' ? 'selected' : '' }}>AI Application (OpenAI / Claude / Smart Automation)</option>
                                <option value="API / Integration" {{ old('service') == 'API / Integration' ? 'selected' : '' }}>API & System Integration</option>
                                <option value="Other" {{ old('service') == 'Other' ? 'selected' : '' }}>Other / Multi-Service Project</option>
                            </select>
                        </div>

                        <!-- Estimated Budget (Optional) -->
                        <div class="form-group full-width">
                            <label class="form-label">Estimated Budget</label>
                            <div class="pill-selection-grid">
                                @php
                                    $budgets = [
                                        'Under ₹50K',
                                        '₹50K–₹1L',
                                        '₹1L–₹3L',
                                        '₹3L–₹5L',
                                        '₹5L+',
                                        'Not Sure'
                                    ];
                                @endphp
                                @foreach ($budgets as $b)
                                    <label class="pill-label">
                                        <input type="radio" name="budget" value="{{ $b }}" {{ old('budget') == $b ? 'checked' : '' }}>
                                        <span class="pill-box">{{ $b }}</span>
                                    </label>
                                @endforeach
                            </div>
                        </div>

                        <!-- Project Timeline (Optional) -->
                        <div class="form-group full-width">
                            <label class="form-label">Project Timeline</label>
                            <div class="pill-selection-grid">
                                @php
                                    $timelines = [
                                        'ASAP',
                                        'Within 1 Month',
                                        '1–3 Months',
                                        '3–6 Months',
                                        'Not Decided'
                                    ];
                                @endphp
                                @foreach ($timelines as $t)
                                    <label class="pill-label">
                                        <input type="radio" name="timeline" value="{{ $t }}" {{ old('timeline') == $t ? 'checked' : '' }}>
                                        <span class="pill-box">{{ $t }}</span>
                                    </label>
                                @endforeach
                            </div>
                        </div>

                        <!-- Project Requirements (Optional) -->
                        <div class="form-group full-width">
                            <label for="form_message" class="form-label">Project Requirements</label>
                            <textarea id="form_message" name="message" rows="4" class="form-textarea" placeholder="Briefly describe your goals, required features, or any systems you need to connect...">{{ old('message') }}</textarea>
                        </div>

                        <!-- Submit CTA -->
                        <div class="form-group full-width" style="margin-top: 6px;">
                            <button type="submit" class="btn btn-primary btn-lg" id="submit_btn" style="width: 100%; font-size: 1.12rem;">
                                <span id="submit_btn_text">Get Free Consultation</span>
                                <svg width="20" height="20" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2.5"><line x1="5" y1="12" x2="19" y2="12"></line><polyline points="12 5 19 12 12 19"></polyline></svg>
                            </button>
                        </div>
                    </div>

                    <div class="privacy-reassurance">
                        <svg width="18" height="18" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2.5"><path d="M12 22s8-4 8-10V5l-8-3-8 3v7c0 6 8 10 8 10z"></path></svg>
                        <span>🔒 Your information is confidential. We never share your project details with third parties.</span>
                    </div>
                </form>
            </div>
        </div>
    </section>

    <!-- 13. FAQ Section -->
    <section class="lp-faq" id="faq">
        <div class="container">
            <div class="section-header">
                <div class="badge-pill">Common Questions</div>
                <h2>Frequently Asked Questions</h2>
                <p>Straightforward answers to the most common questions about partnering with RS Orange Tech.</p>
            </div>

            <div class="faq-accordion">
                <!-- FAQ 1: Pricing -->
                <details class="faq-item" open>
                    <summary class="faq-summary">
                        <span>How much does custom software development cost?</span>
                        <svg class="faq-icon-arrow" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2.5"><polyline points="6 9 12 15 18 9"></polyline></svg>
                    </summary>
                    <div class="faq-content">
                        Project cost depends on the features, complexity, integrations, technology and development scope. After understanding your requirements, we provide a transparent proposal with clear milestones and pricing.
                    </div>
                </details>

                <!-- FAQ 2: Timeline -->
                <details class="faq-item">
                    <summary class="faq-summary">
                        <span>How long does development take?</span>
                        <svg class="faq-icon-arrow" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2.5"><polyline points="6 9 12 15 18 9"></polyline></svg>
                    </summary>
                    <div class="faq-content">
                        A typical MVP or focused web application takes 2 to 4 weeks. Larger custom systems, multi-tenant SaaS, or complex integrations require 6 to 12 weeks with weekly demo sprints.
                    </div>
                </details>

                <!-- FAQ 3: Global Clients -->
                <details class="faq-item">
                    <summary class="faq-summary">
                        <span>Do you work with international clients?</span>
                        <svg class="faq-icon-arrow" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2.5"><polyline points="6 9 12 15 18 9"></polyline></svg>
                    </summary>
                    <div class="faq-content">
                        We work with businesses across India and international markets including the USA, UK, Australia, Canada and UAE.
                    </div>
                </details>

                <!-- FAQ 4: NDA -->
                <details class="faq-item">
                    <summary class="faq-summary">
                        <span>Can you sign an NDA?</span>
                        <svg class="faq-icon-arrow" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2.5"><polyline points="6 9 12 15 18 9"></polyline></svg>
                    </summary>
                    <div class="faq-content">
                        Absolutely. We sign standard Non-Disclosure Agreements (NDAs) prior to reviewing any project briefs, proprietary wireframes, or existing codebase. Your intellectual property remains 100% yours.
                    </div>
                </details>

                <!-- FAQ 5: Existing Applications -->
                <details class="faq-item">
                    <summary class="faq-summary">
                        <span>Can you work with an existing application?</span>
                        <svg class="faq-icon-arrow" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2.5"><polyline points="6 9 12 15 18 9"></polyline></svg>
                    </summary>
                    <div class="faq-content">
                        Yes. We frequently take over existing web applications to resolve performance bugs, refactor legacy code, add new features, or optimize database queries.
                    </div>
                </details>

                <!-- FAQ 6: Maintenance -->
                <details class="faq-item">
                    <summary class="faq-summary">
                        <span>Do you provide ongoing maintenance?</span>
                        <svg class="faq-icon-arrow" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2.5"><polyline points="6 9 12 15 18 9"></polyline></svg>
                    </summary>
                    <div class="faq-content">
                        Yes. We provide post-launch maintenance, security patches, database backups, performance monitoring, and continued feature additions under flexible SLA agreements.
                    </div>
                </details>

                <!-- FAQ 7: MVP -->
                <details class="faq-item">
                    <summary class="faq-summary">
                        <span>Can you build an MVP?</span>
                        <svg class="faq-icon-arrow" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2.5"><polyline points="6 9 12 15 18 9"></polyline></svg>
                    </summary>
                    <div class="faq-content">
                        Yes. We specialize in rapid MVP development for founders and startups — prioritizing core commercial features to validate product-market fit quickly without excessive upfront capital.
                    </div>
                </details>

                <!-- FAQ 8: APIs -->
                <details class="faq-item">
                    <summary class="faq-summary">
                        <span>Can you integrate APIs?</span>
                        <svg class="faq-icon-arrow" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2.5"><polyline points="6 9 12 15 18 9"></polyline></svg>
                    </summary>
                    <div class="faq-content">
                        Yes. We build custom API connectors for Stripe, PayPal, Razorpay, Twilio, WhatsApp API, Salesforce, HubSpot, QuickBooks, OpenAI, Claude, and proprietary business ERPs.
                    </div>
                </details>

                <!-- FAQ 9: Existing Development Team -->
                <details class="faq-item">
                    <summary class="faq-summary">
                        <span>Can you work with an existing development team?</span>
                        <svg class="faq-icon-arrow" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2.5"><polyline points="6 9 12 15 18 9"></polyline></svg>
                    </summary>
                    <div class="faq-content">
                        Yes. Our engineers seamlessly integrate into your existing Git workflows, Jira boards, and Slack/Teams workspaces as an extended backend, frontend, or full-stack unit.
                    </div>
                </details>
            </div>
        </div>
    </section>

    <!-- 14. Final Conversion CTA -->
    <section class="lp-final-cta">
        <div class="container final-cta-content">
            <div class="badge-pill badge-pill-dark">Ready to Build?</div>
            <h2>Ready to Build Your Next Digital Product?</h2>
            <p>Tell us what you're building. Our team will help you understand the technical approach and next steps.</p>

            <div class="final-cta-actions">
                <a href="#consultation-form" class="btn btn-primary btn-lg" data-track-event="consultation_click">
                    <span>Get Free Consultation</span>
                    <svg width="20" height="20" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2.5"><line x1="5" y1="12" x2="19" y2="12"></line><polyline points="12 5 19 12 12 19"></polyline></svg>
                </a>
                <a href="{{ $waLink }}" target="_blank" rel="noopener noreferrer" class="btn btn-ghost-dark btn-lg" data-track-event="whatsapp_click">
                    <svg width="20" height="20" viewBox="0 0 24 24" fill="currentColor"><path d="M.057 24l1.687-6.163c-1.041-1.804-1.588-3.849-1.587-5.946.003-6.556 5.338-11.891 11.893-11.891 3.181.001 6.167 1.24 8.413 3.488 2.245 2.248 3.481 5.236 3.48 8.414-.003 6.557-5.338 11.892-11.893 11.892-1.99-.001-3.951-.5-5.688-1.448l-5.705 1.654zm6.597-3.807c1.676.995 3.276 1.591 5.392 1.592 5.448 0 9.886-4.434 9.889-9.885.002-5.462-4.415-9.89-9.881-9.892-5.452 0-9.887 4.434-9.889 9.884-.001 2.225.651 3.891 1.746 5.634l-.999 3.648 3.742-.981zm11.387-5.464c-.074-.124-.272-.198-.57-.347-.297-.149-1.758-.868-2.031-.967-.272-.099-.47-.149-.669.149-.198.297-.768.967-.941 1.165-.173.198-.347.223-.644.074-.297-.149-1.255-.462-2.39-1.475-.883-.788-1.48-1.761-1.653-2.059-.173-.297-.018-.458.13-.606.134-.133.297-.347.446-.521.151-.172.2-.296.3-.495.099-.198.05-.372-.025-.521-.075-.148-.669-1.611-.916-2.206-.242-.579-.487-.501-.669-.51l-.57-.01c-.198 0-.52.074-.792.372s-1.04 1.016-1.04 2.479 1.065 2.876 1.213 3.074c.149.198 2.095 3.2 5.076 4.487.709.306 1.263.489 1.694.626.712.226 1.36.194 1.872.118.571-.085 1.758-.719 2.006-1.413.248-.695.248-1.29.173-1.414z"/></svg>
                    <span>WhatsApp Us</span>
                </a>
            </div>

            <div class="cta-guarantee-row">
                <span>✓ No obligation</span>
                <span>✓ Confidential discussion</span>
                <span>✓ Experienced development team</span>
            </div>
        </div>
    </section>

    <!-- 15. Minimal Footer -->
    <footer class="lp-footer">
        <div class="container">
            <div class="lp-footer-grid">
                <div class="footer-logo-block">
                    <img src="{{ asset('rslogo.png') }}" alt="RS Orange Tech">
                    <p>Custom Web & Software Development for Growing Businesses.</p>
                </div>

                <div class="footer-services-list">
                    <a href="#services">Custom Web</a>
                    <a href="#services">Laravel</a>
                    <a href="#services">Custom Software</a>
                    <a href="#services">CRM / ERP</a>
                    <a href="#services">SaaS</a>
                    <a href="#services">AI Applications</a>
                </div>
            </div>

            <div class="footer-bottom-row">
                <p>&copy; {{ date('Y') }} RS Orange Tech. All rights reserved. B-125, Sector 63, Noida, Uttar Pradesh 201301.</p>
                <div class="footer-legal-links">
                    <a href="{{ route('privacy') }}" target="_blank">Privacy Policy</a>
                    <a href="{{ route('terms') }}" target="_blank">Terms & Conditions</a>
                    <a href="mailto:{{ $email }}">{{ $email }}</a>
                </div>
            </div>
        </div>
    </footer>

    <!-- 16. Mobile Sticky CTA Bar (3 Action Buttons) -->
    <div class="mobile-sticky-bar">
        <div class="mobile-sticky-inner">
            <a href="{{ $waLink }}" target="_blank" rel="noopener noreferrer" class="lp-wa-btn" style="justify-content: center; padding: 10px 8px; font-size: 0.82rem;" data-track-event="whatsapp_click">
                <svg width="15" height="15" viewBox="0 0 24 24" fill="currentColor"><path d="M.057 24l1.687-6.163c-1.041-1.804-1.588-3.849-1.587-5.946.003-6.556 5.338-11.891 11.893-11.891 3.181.001 6.167 1.24 8.413 3.488 2.245 2.248 3.481 5.236 3.48 8.414-.003 6.557-5.338 11.892-11.893 11.892-1.99-.001-3.951-.5-5.688-1.448l-5.705 1.654zm6.597-3.807c1.676.995 3.276 1.591 5.392 1.592 5.448 0 9.886-4.434 9.889-9.885.002-5.462-4.415-9.89-9.881-9.892-5.452 0-9.887 4.434-9.889 9.884-.001 2.225.651 3.891 1.746 5.634l-.999 3.648 3.742-.981zm11.387-5.464c-.074-.124-.272-.198-.57-.347-.297-.149-1.758-.868-2.031-.967-.272-.099-.47-.149-.669.149-.198.297-.768.967-.941 1.165-.173.198-.347.223-.644.074-.297-.149-1.255-.462-2.39-1.475-.883-.788-1.48-1.761-1.653-2.059-.173-.297-.018-.458.13-.606.134-.133.297-.347.446-.521.151-.172.2-.296.3-.495.099-.198.05-.372-.025-.521-.075-.148-.669-1.611-.916-2.206-.242-.579-.487-.501-.669-.51l-.57-.01c-.198 0-.52.074-.792.372s-1.04 1.016-1.04 2.479 1.065 2.876 1.213 3.074c.149.198 2.095 3.2 5.076 4.487.709.306 1.263.489 1.694.626.712.226 1.36.194 1.872.118.571-.085 1.758-.719 2.006-1.413.248-.695.248-1.29.173-1.414z"/></svg>
                <span>WhatsApp</span>
            </a>
            <a href="tel:{{ $phoneClean }}" class="btn btn-secondary btn-sm" style="padding: 10px 8px; font-size: 0.82rem;" data-track-event="phone_click">
                <svg width="14" height="14" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2.5"><path d="M22 16.92v3a2 2 0 0 1-2.18 2 19.79 19.79 0 0 1-8.63-3.07 19.5 19.5 0 0 1-6-6 19.79 19.79 0 0 1-3.07-8.67A2 2 0 0 1 4.11 2h3a2 2 0 0 1 2 1.72 12.84 12.84 0 0 0 .7 2.81 2 2 0 0 1-.45 2.11L8.09 9.91a16 16 0 0 0 6 6l1.27-1.27a2 2 0 0 1 2.11-.45 12.84 12.84 0 0 0 2.81.7A2 2 0 0 1 22 16.92z"></path></svg>
                <span>Call</span>
            </a>
            <a href="#consultation-form" class="btn btn-primary btn-sm" style="padding: 10px 10px; font-size: 0.82rem;" data-track-event="consultation_click">
                <span>Consultation</span>
                <svg width="13" height="13" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2.5"><line x1="5" y1="12" x2="19" y2="12"></line><polyline points="12 5 19 12 12 19"></polyline></svg>
            </a>
        </div>
    </div>

    <!-- Scripts: Service Preselection & Conversion Tracking -->
    <script>
        function preselectService(serviceValue) {
            const selectEl = document.getElementById('form_service');
            if (selectEl) {
                for (let i = 0; i < selectEl.options.length; i++) {
                    if (selectEl.options[i].value === serviceValue || selectEl.options[i].text.includes(serviceValue)) {
                        selectEl.selectedIndex = i;
                        break;
                    }
                }
            }
        }

        // Conversion Tracking & UX improvements
        document.addEventListener('DOMContentLoaded', function() {
            window.dataLayer = window.dataLayer || [];

            // Track CTA clicks
            document.querySelectorAll('[data-track-event]').forEach(function(el) {
                el.addEventListener('click', function() {
                    const eventName = el.getAttribute('data-track-event');
                    window.dataLayer.push({
                        'event': eventName,
                        'event_category': 'Landing Page CTA',
                        'event_label': el.textContent.trim() || el.getAttribute('href')
                    });
                });
            });

            // Form interaction tracking & UX loading indicator
            const leadForm = document.getElementById('lead_qualification_form');
            if (leadForm) {
                let formStarted = false;
                leadForm.addEventListener('input', function() {
                    if (!formStarted) {
                        formStarted = true;
                        window.dataLayer.push({
                            'event': 'form_start',
                            'event_category': 'Lead Form',
                            'form_id': 'lead_qualification_form'
                        });
                    }
                }, { once: true });

                leadForm.addEventListener('submit', function() {
                    const submitBtn = document.getElementById('submit_btn');
                    const submitBtnText = document.getElementById('submit_btn_text');
                    if (submitBtn && submitBtnText) {
                        submitBtn.disabled = true;
                        submitBtnText.textContent = 'Submitting Details...';
                        submitBtn.style.opacity = '0.8';
                        submitBtn.style.cursor = 'wait';
                    }
                    window.dataLayer.push({
                        'event': 'form_submit',
                        'event_category': 'Lead Form'
                    });
                });
            }
        });
    </script>
</body>
</html>
