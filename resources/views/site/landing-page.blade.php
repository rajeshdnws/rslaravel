@php
    $settings = cache()->remember('site_settings_contact', 86400, function () {
        return \App\Models\SiteSetting::whereIn('key', ['phone', 'contact_email', 'office_address'])->pluck('value', 'key')->toArray();
    });
    $phone = $settings['phone'] ?? '+91 73035 36474';
    $email = $settings['contact_email'] ?? 'info@rsorangetech.com';
    $phoneClean = preg_replace('/[^0-9+]/', '', $phone);
    $waLink = "https://wa.me/" . preg_replace('/[^0-9]/', '', $phone) . "?text=" . urlencode("Hello RS Orange Tech! I'm interested in discussing a custom web/software development project.");
    
    $title = "Custom Web & Software Development Company | RS Orange Tech";
    $description = "Looking for an experienced technology partner? RS Orange Tech builds custom web applications, Laravel systems, CRM/ERP, SaaS platforms, and AI-powered solutions for high-growth businesses.";
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

    <!-- External Stylesheet -->
    <link rel="stylesheet" href="{{ asset('css/landing-page.css') }}?v=1.01">

    <!-- Schema.org JSON-LD -->
    <script type="application/ld+json">
    {
        "@@context": "https://schema.org",
        "@type": "ProfessionalService",
        "name": "RS Orange Tech",
        "url": "{{ $canonicalUrl }}",
        "logo": "{{ asset('rslogo.png') }}",
        "image": "{{ asset('site-assets/banner1.webp') }}",
        "description": "{{ $description }}",
        "telephone": "{{ $phone }}",
        "email": "{{ $email }}",
        "address": {
            "@type": "PostalAddress",
            "streetAddress": "B-125, Sector 63",
            "addressLocality": "Noida",
            "addressRegion": "Uttar Pradesh",
            "postalCode": "201301",
            "addressCountry": "IN"
        },
        "priceRange": "$$",
        "areaServed": ["IN", "US", "GB", "AU", "CA", "AE"]
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
                <a href="tel:{{ $phoneClean }}" class="lp-call-link" title="Call our engineering team">
                    <span class="status-dot"></span>
                    <span>Call Us: {{ $phone }}</span>
                </a>
                
                <a href="{{ $waLink }}" target="_blank" rel="noopener noreferrer" class="lp-wa-btn">
                    <svg width="18" height="18" viewBox="0 0 24 24" fill="currentColor"><path d="M.057 24l1.687-6.163c-1.041-1.804-1.588-3.849-1.587-5.946.003-6.556 5.338-11.891 11.893-11.891 3.181.001 6.167 1.24 8.413 3.488 2.245 2.248 3.481 5.236 3.48 8.414-.003 6.557-5.338 11.892-11.893 11.892-1.99-.001-3.951-.5-5.688-1.448l-5.705 1.654zm6.597-3.807c1.676.995 3.276 1.591 5.392 1.592 5.448 0 9.886-4.434 9.889-9.885.002-5.462-4.415-9.89-9.881-9.892-5.452 0-9.887 4.434-9.889 9.884-.001 2.225.651 3.891 1.746 5.634l-.999 3.648 3.742-.981zm11.387-5.464c-.074-.124-.272-.198-.57-.347-.297-.149-1.758-.868-2.031-.967-.272-.099-.47-.149-.669.149-.198.297-.768.967-.941 1.165-.173.198-.347.223-.644.074-.297-.149-1.255-.462-2.39-1.475-.883-.788-1.48-1.761-1.653-2.059-.173-.297-.018-.458.13-.606.134-.133.297-.347.446-.521.151-.172.2-.296.3-.495.099-.198.05-.372-.025-.521-.075-.148-.669-1.611-.916-2.206-.242-.579-.487-.501-.669-.51l-.57-.01c-.198 0-.52.074-.792.372s-1.04 1.016-1.04 2.479 1.065 2.876 1.213 3.074c.149.198 2.095 3.2 5.076 4.487.709.306 1.263.489 1.694.626.712.226 1.36.194 1.872.118.571-.085 1.758-.719 2.006-1.413.248-.695.248-1.29.173-1.414z"/></svg>
                    WhatsApp
                </a>

                <a href="#consultation-form" class="btn btn-primary btn-sm">
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
                    Build Powerful Web & Software Solutions That <span class="gradient-text">Grow Your Business</span>
                </h1>

                <p class="lp-hero-sub">
                    From custom web applications and Laravel development to CRM, SaaS, and AI-powered solutions — RS Orange Tech helps businesses turn ideas into scalable, secure digital products.
                </p>

                <div class="lp-hero-ctas">
                    <a href="#consultation-form" class="btn btn-primary btn-lg">
                        <span>Get a Free Consultation</span>
                        <svg width="20" height="20" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2.5" stroke-linecap="round" stroke-linejoin="round"><line x1="5" y1="12" x2="19" y2="12"></line><polyline points="12 5 19 12 12 19"></polyline></svg>
                    </a>
                    <a href="tel:{{ $phoneClean }}" class="btn btn-secondary btn-lg">
                        <svg width="20" height="20" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><path d="M22 16.92v3a2 2 0 0 1-2.18 2 19.79 19.79 0 0 1-8.63-3.07 19.5 19.5 0 0 1-6-6 19.79 19.79 0 0 1-3.07-8.67A2 2 0 0 1 4.11 2h3a2 2 0 0 1 2 1.72 12.84 12.84 0 0 0 .7 2.81 2 2 0 0 1-.45 2.11L8.09 9.91a16 16 0 0 0 6 6l1.27-1.27a2 2 0 0 1 2.11-.45 12.84 12.84 0 0 0 2.81.7A2 2 0 0 1 22 16.92z"></path></svg>
                        <span>Discuss Your Project</span>
                    </a>
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
                        <span>200+ Clients Worldwide</span>
                    </div>
                </div>
            </div>

            <!-- Right Visual: Interactive Tech / Dashboard Representation -->
            <div class="hero-visual-card">
                <div class="visual-window-bar">
                    <div class="window-dots">
                        <div class="window-dot dot-red"></div>
                        <div class="window-dot dot-yellow"></div>
                        <div class="window-dot dot-green"></div>
                    </div>
                    <div class="window-title">RS-ENGINEERING // PRODUCTION</div>
                    <div style="font-size:0.75rem; color:#4ade80; font-weight:600;">● Active Architecture</div>
                </div>

                <div class="dashboard-metric-grid">
                    <div class="metric-box">
                        <div class="metric-label">API Throughput</div>
                        <div class="metric-val">99.98% <span class="metric-trend">↑ SLA</span></div>
                    </div>
                    <div class="metric-box">
                        <div class="metric-label">Code Quality</div>
                        <div class="metric-val">Grade A+ <span class="metric-trend">100% QA</span></div>
                    </div>
                </div>

                <div class="code-snippet-box">
                    <span class="token-comment">// Custom Software &amp; SaaS Architecture</span><br>
                    <span class="token-keyword">class</span> <span class="token-class">EnterpriseApplication</span> <span class="token-keyword">implements</span> <span class="token-class">ScalableSystem</span> {<br>
                    &nbsp;&nbsp;<span class="token-keyword">public function</span> <span class="token-func">buildSolution</span>(Requirement $req): <span class="token-class">Deployment</span> {<br>
                    &nbsp;&nbsp;&nbsp;&nbsp;<span class="token-keyword">return</span> $this-&gt;<span class="token-func">engineer</span>([<br>
                    &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<span class="token-str">'framework'</span> =&gt; <span class="token-str">'Laravel 11 / React'</span>,<br>
                    &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<span class="token-str">'database'</span> =&gt; <span class="token-str">'PostgreSQL / Redis'</span>,<br>
                    &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<span class="token-str">'security'</span> =&gt; <span class="token-str">'Enterprise Encryption / OWASP'</span><br>
                    &nbsp;&nbsp;&nbsp;&nbsp;]);<br>
                    &nbsp;&nbsp;}<br>
                    }
                </div>

                <div class="visual-badges-strip">
                    <span class="visual-tech-tag">⚡ Laravel</span>
                    <span class="visual-tech-tag">⚛ React & Next.js</span>
                    <span class="visual-tech-tag">🚀 SaaS Multi-Tenant</span>
                    <span class="visual-tech-tag">🛡️ 100% NDA</span>
                    <span class="visual-tech-tag">🤖 AI Automation</span>
                </div>
            </div>
        </div>
    </section>

    <!-- 3. Trust Bar & Key Stats -->
    <section class="lp-trust-bar">
        <div class="container">
            <div class="stats-grid">
                <div class="stat-item">
                    <div class="stat-number">9+</div>
                    <div class="stat-title">Years Experience</div>
                    <div class="stat-desc">Proven tech excellence</div>
                </div>
                <div class="stat-item">
                    <div class="stat-number">500+</div>
                    <div class="stat-title">Projects Delivered</div>
                    <div class="stat-desc">Web apps, SaaS, &amp; software</div>
                </div>
                <div class="stat-item">
                    <div class="stat-number">200+</div>
                    <div class="stat-title">Happy Clients</div>
                    <div class="stat-desc">Startups to enterprise brands</div>
                </div>
                <div class="stat-item">
                    <div class="stat-number">Global</div>
                    <div class="stat-title">Client Base</div>
                    <div class="stat-desc">USA, UK, Australia, India, UAE</div>
                </div>
            </div>
        </div>
    </section>

    <!-- 4. Problem / Solution Comparison -->
    <section class="lp-problem-solution">
        <div class="container">
            <div class="section-header">
                <div class="badge-pill">End-To-End Delivery</div>
                <h2>Need a Technology Partner, Not Just a Developer?</h2>
                <p>Most development projects fail not because of coding mistakes, but due to poor architecture, lack of business understanding, and no post-launch commitment.</p>
            </div>

            <div class="comparison-wrapper">
                <div class="comparison-card bad">
                    <div class="card-top-tag bad">The Typical Freelancer Dilemma</div>
                    <h3>Freelancers &amp; Low-Cost Agencies</h3>
                    <ul class="comparison-list bad">
                        <li>
                            <span class="icon">✕</span>
                            <span><strong>Just delivers raw code</strong> without understanding your business model or growth strategy.</span>
                        </li>
                        <li>
                            <span class="icon">✕</span>
                            <span><strong>Fragile architecture</strong> that crashes when traffic increases or database scales.</span>
                        </li>
                        <li>
                            <span class="icon">✕</span>
                            <span><strong>Hidden bugs &amp; poor security</strong> with no automated testing or code auditing.</span>
                        </li>
                        <li>
                            <span class="icon">✕</span>
                            <span><strong>Disappears after launch</strong>, leaving you stranded with unmaintained code.</span>
                        </li>
                    </ul>
                </div>

                <div class="comparison-card good">
                    <div class="card-top-tag good">The RS Orange Tech Advantage</div>
                    <h3>Your Dedicated Technology Partner</h3>
                    <ul class="comparison-list good">
                        <li>
                            <span class="icon">✓</span>
                            <span><strong>Understand your business requirements</strong> and craft tailored technical solutions.</span>
                        </li>
                        <li>
                            <span class="icon">✓</span>
                            <span><strong>Plan the right technology architecture</strong> built for speed, high concurrency, and scalability.</span>
                        </li>
                        <li>
                            <span class="icon">✓</span>
                            <span><strong>Design user-friendly, high-converting interfaces</strong> with seamless UX across all devices.</span>
                        </li>
                        <li>
                            <span class="icon">✓</span>
                            <span><strong>Develop robust applications</strong> with clean, documented, and maintainable codebase.</span>
                        </li>
                        <li>
                            <span class="icon">✓</span>
                            <span><strong>Integrate APIs and third-party systems</strong> (Payments, CRMs, ERPs, AI models, SMS/Email).</span>
                        </li>
                        <li>
                            <span class="icon">✓</span>
                            <span><strong>Thorough QA testing, secure deployment</strong> and proactive long-term technical support.</span>
                        </li>
                    </ul>
                </div>
            </div>
        </div>
    </section>

    <!-- 5. Services Section -->
    <section class="lp-services" id="services">
        <div class="container">
            <div class="section-header">
                <div class="badge-pill">Core Specializations</div>
                <h2>What Can We Build for You?</h2>
                <p>Custom software engineering tailored to your business goals, operational workflows, and budget.</p>
            </div>

            <div class="services-grid">
                <!-- Service 1 -->
                <div class="service-card">
                    <div>
                        <div class="service-icon-wrap">
                            <svg width="28" height="28" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><rect x="2" y="3" width="20" height="14" rx="2" ry="2"></rect><line x1="8" y1="21" x2="16" y2="21"></line><line x1="12" y1="17" x2="12" y2="21"></line></svg>
                        </div>
                        <h3>Custom Web Development</h3>
                        <p>Scalable websites and high-performance web applications tailored to your precise business needs and workflows.</p>
                    </div>
                    <a href="#consultation-form" class="card-cta-link" onclick="preselectService('Web Application')">
                        <span>Get Consultation</span>
                        <svg width="16" height="16" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2.5"><line x1="5" y1="12" x2="19" y2="12"></line><polyline points="12 5 19 12 12 19"></polyline></svg>
                    </a>
                </div>

                <!-- Service 2 -->
                <div class="service-card">
                    <div>
                        <div class="service-icon-wrap">
                            <svg width="28" height="28" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><polyline points="16 18 22 12 16 6"></polyline><polyline points="8 6 2 12 8 18"></polyline></svg>
                        </div>
                        <h3>Laravel Development</h3>
                        <p>Secure, enterprise-grade, and scalable Laravel applications built with industry-best practices by experienced PHP architects.</p>
                    </div>
                    <a href="#consultation-form" class="card-cta-link" onclick="preselectService('Laravel Application')">
                        <span>Get Consultation</span>
                        <svg width="16" height="16" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2.5"><line x1="5" y1="12" x2="19" y2="12"></line><polyline points="12 5 19 12 12 19"></polyline></svg>
                    </a>
                </div>

                <!-- Service 3 -->
                <div class="service-card">
                    <div>
                        <div class="service-icon-wrap">
                            <svg width="28" height="28" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><path d="M14 2H6a2 2 0 0 0-2 2v16a2 2 0 0 0 2 2h12a2 2 0 0 0 2-2V8z"></path><polyline points="14 2 14 8 20 8"></polyline><line x1="16" y1="13" x2="8" y2="13"></line><line x1="16" y1="17" x2="8" y2="17"></line><polyline points="10 9 9 9 8 9"></polyline></svg>
                        </div>
                        <h3>Custom Software</h3>
                        <p>Bespoke business software, internal management tools, and custom platforms engineered around your company's exact operational needs.</p>
                    </div>
                    <a href="#consultation-form" class="card-cta-link" onclick="preselectService('Custom Software')">
                        <span>Get Consultation</span>
                        <svg width="16" height="16" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2.5"><line x1="5" y1="12" x2="19" y2="12"></line><polyline points="12 5 19 12 12 19"></polyline></svg>
                    </a>
                </div>

                <!-- Service 4 -->
                <div class="service-card">
                    <div>
                        <div class="service-icon-wrap">
                            <svg width="28" height="28" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><path d="M17 21v-2a4 4 0 0 0-4-4H5a4 4 0 0 0-4 4v2"></path><circle cx="9" cy="7" r="4"></circle><path d="M23 21v-2a4 4 0 0 0-3-3.87"></path><path d="M16 3.13a4 4 0 0 1 0 7.75"></path></svg>
                        </div>
                        <h3>CRM &amp; ERP Development</h3>
                        <p>Centralize customer relationship records, sales pipelines, inventory, billing, and core business processes into one unified portal.</p>
                    </div>
                    <a href="#consultation-form" class="card-cta-link" onclick="preselectService('CRM / ERP')">
                        <span>Get Consultation</span>
                        <svg width="16" height="16" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2.5"><line x1="5" y1="12" x2="19" y2="12"></line><polyline points="12 5 19 12 12 19"></polyline></svg>
                    </a>
                </div>

                <!-- Service 5 -->
                <div class="service-card">
                    <div>
                        <div class="service-icon-wrap">
                            <svg width="28" height="28" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><polygon points="12 2 2 7 12 12 22 7 12 2"></polygon><polyline points="2 17 12 22 22 17"></polyline><polyline points="2 12 12 17 22 12"></polyline></svg>
                        </div>
                        <h3>SaaS Development</h3>
                        <p>Build scalable multi-tenant SaaS products from initial MVP roadmap to enterprise-ready production platforms with recurring billing.</p>
                    </div>
                    <a href="#consultation-form" class="card-cta-link" onclick="preselectService('SaaS')">
                        <span>Get Consultation</span>
                        <svg width="16" height="16" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2.5"><line x1="5" y1="12" x2="19" y2="12"></line><polyline points="12 5 19 12 12 19"></polyline></svg>
                    </a>
                </div>

                <!-- Service 6 -->
                <div class="service-card">
                    <div>
                        <div class="service-icon-wrap">
                            <svg width="28" height="28" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><circle cx="9" cy="21" r="1"></circle><circle cx="20" cy="21" r="1"></circle><path d="M1 1h4l2.68 13.39a2 2 0 0 0 2 1.61h9.72a2 2 0 0 0 2-1.61L23 6H6"></path></svg>
                        </div>
                        <h3>E-commerce Solutions</h3>
                        <p>High-performance online stores with custom functionality, multi-gateway checkouts, ERP synchronization, and fast cart load times.</p>
                    </div>
                    <a href="#consultation-form" class="card-cta-link" onclick="preselectService('E-commerce')">
                        <span>Get Consultation</span>
                        <svg width="16" height="16" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2.5"><line x1="5" y1="12" x2="19" y2="12"></line><polyline points="12 5 19 12 12 19"></polyline></svg>
                    </a>
                </div>

                <!-- Service 7 -->
                <div class="service-card">
                    <div>
                        <div class="service-icon-wrap">
                            <svg width="28" height="28" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><path d="M21 16V8a2 2 0 0 0-1-1.73l-7-4a2 2 0 0 0-2 0l-7 4A2 2 0 0 0 3 8v8a2 2 0 0 0 1 1.73l7 4a2 2 0 0 0 2 0l7-4A2 2 0 0 0 21 16z"></path><polyline points="3.27 6.96 12 12.01 20.73 6.96"></polyline><line x1="12" y1="22.08" x2="12" y2="12"></line></svg>
                        </div>
                        <h3>AI Development &amp; Automation</h3>
                        <p>Integrate AI LLM models (OpenAI, Claude), smart automation workflows, intelligent customer bots, and predictive business features.</p>
                    </div>
                    <a href="#consultation-form" class="card-cta-link" onclick="preselectService('AI Application')">
                        <span>Get Consultation</span>
                        <svg width="16" height="16" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2.5"><line x1="5" y1="12" x2="19" y2="12"></line><polyline points="12 5 19 12 12 19"></polyline></svg>
                    </a>
                </div>

                <!-- Service 8 -->
                <div class="service-card">
                    <div>
                        <div class="service-icon-wrap">
                            <svg width="28" height="28" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><line x1="16.5" y1="9.4" x2="7.5" y2="4.21"></line><path d="M21 16V8a2 2 0 0 0-1-1.73l-7-4a2 2 0 0 0-2 0l-7 4A2 2 0 0 0 3 8v8a2 2 0 0 0 1 1.73l7 4a2 2 0 0 0 2 0l7-4A2 2 0 0 0 21 16z"></path><polyline points="3.27 6.96 12 12.01 20.73 6.96"></polyline><line x1="12" y1="22.08" x2="12" y2="12"></line></svg>
                        </div>
                        <h3>API &amp; System Integration</h3>
                        <p>Connect your existing software platforms, payment gateways, accounting systems, and third-party APIs into a frictionless ecosystem.</p>
                    </div>
                    <a href="#consultation-form" class="card-cta-link" onclick="preselectService('Custom Software')">
                        <span>Get Consultation</span>
                        <svg width="16" height="16" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2.5"><line x1="5" y1="12" x2="19" y2="12"></line><polyline points="12 5 19 12 12 19"></polyline></svg>
                    </a>
                </div>
            </div>
        </div>
    </section>

    <!-- 6. Why RS Orange Tech -->
    <section class="lp-why-us">
        <div class="container">
            <div class="section-header dark">
                <div class="badge-pill badge-pill-dark">Why Choose Us</div>
                <h2>Why Businesses Choose RS Orange Tech</h2>
                <p>We combine deep engineering rigor with transparent communication to deliver long-term business value.</p>
            </div>

            <div class="why-us-grid">
                <div class="why-card">
                    <div class="why-icon">
                        <svg width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"><path d="M17 21v-2a4 4 0 0 0-4-4H5a4 4 0 0 0-4 4v2"></path><circle cx="9" cy="7" r="4"></circle><path d="M23 21v-2a4 4 0 0 0-3-3.87"></path><path d="M16 3.13a4 4 0 0 1 0 7.75"></path></svg>
                    </div>
                    <h3>Experienced Team</h3>
                    <p>Work directly with senior developers and technical architects with 9+ years of hands-on software engineering experience.</p>
                </div>

                <div class="why-card">
                    <div class="why-icon">
                        <svg width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"><polyline points="16 18 22 12 16 6"></polyline><polyline points="8 6 2 12 8 18"></polyline></svg>
                    </div>
                    <h3>Modern Technology</h3>
                    <p>Laravel, React, Node.js, Next.js, Python, Flutter, PostgreSQL, Docker, AWS, and modern AI development frameworks.</p>
                </div>

                <div class="why-card">
                    <div class="why-icon">
                        <svg width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"><polygon points="12 2 2 7 12 12 22 7 12 2"></polygon><polyline points="2 17 12 22 22 17"></polyline><polyline points="2 12 12 17 22 12"></polyline></svg>
                    </div>
                    <h3>Scalable Architecture</h3>
                    <p>Designed from day one to handle heavy transaction volumes, enterprise growth, and rapid feature additions without rebuilds.</p>
                </div>

                <div class="why-card">
                    <div class="why-icon">
                        <svg width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"><circle cx="12" cy="12" r="10"></circle><polyline points="12 6 12 12 14 14"></polyline></svg>
                    </div>
                    <h3>Transparent Process</h3>
                    <p>Clear milestone roadmaps, weekly demos, direct developer communication, and complete visibility into project progress.</p>
                </div>

                <div class="why-card">
                    <div class="why-icon">
                        <svg width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"><rect x="3" y="11" width="18" height="11" rx="2" ry="2"></rect><path d="M7 11V7a5 5 0 0 1 10 0v4"></path></svg>
                    </div>
                    <h3>Secure Development</h3>
                    <p>Strict OWASP security practices, data encryption, strict NDA compliance, and total intellectual property ownership for clients.</p>
                </div>

                <div class="why-card">
                    <div class="why-icon">
                        <svg width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"><path d="M20.84 4.61a5.5 5.5 0 0 0-7.78 0L12 5.67l-1.06-1.06a5.5 5.5 0 0 0-7.78 7.78l1.06 1.06L12 21.23l7.78-7.78 1.06-1.06a5.5 5.5 0 0 0 0-7.78z"></path></svg>
                    </div>
                    <h3>Long-Term Partnership</h3>
                    <p>We don't abandon you after deployment. We provide ongoing maintenance, feature updates, and dedicated SLA technical support.</p>
                </div>
            </div>
        </div>
    </section>

    <!-- 7. Technology Stack Showcase -->
    <section class="lp-tech-stack">
        <div class="container">
            <div class="section-header">
                <div class="badge-pill">Enterprise Stack</div>
                <h2>Built With Modern Technology</h2>
                <p>We engineer reliable solutions using the world's most stable, scalable, and high-performance software frameworks.</p>
            </div>

            <div class="tech-categories-strip">
                <div class="tech-row-wrap">
                    <div class="tech-cat-label">Backend &amp; APIs:</div>
                    <div class="tech-tags-group">
                        <span class="tech-pill">⚡ Laravel (PHP)</span>
                        <span class="tech-pill">🟢 Node.js / Express</span>
                        <span class="tech-pill">🐍 Python / Django</span>
                        <span class="tech-pill">🔌 REST &amp; GraphQL APIs</span>
                    </div>
                </div>

                <div class="tech-row-wrap">
                    <div class="tech-cat-label">Frontend &amp; Web:</div>
                    <div class="tech-tags-group">
                        <span class="tech-pill">⚛️ React.js</span>
                        <span class="tech-pill">▲ Next.js</span>
                        <span class="tech-pill">💚 Vue.js</span>
                        <span class="tech-pill">🎨 Tailwind CSS</span>
                        <span class="tech-pill">📱 Flutter (Mobile)</span>
                    </div>
                </div>

                <div class="tech-row-wrap">
                    <div class="tech-cat-label">Database &amp; Cloud:</div>
                    <div class="tech-tags-group">
                        <span class="tech-pill">🐬 MySQL</span>
                        <span class="tech-pill">🐘 PostgreSQL</span>
                        <span class="tech-pill">⚡ Redis Caching</span>
                        <span class="tech-pill">☁️ AWS (EC2/S3/RDS)</span>
                        <span class="tech-pill">🐳 Docker</span>
                    </div>
                </div>

                <div class="tech-row-wrap">
                    <div class="tech-cat-label">AI &amp; Commerce:</div>
                    <div class="tech-tags-group">
                        <span class="tech-pill">🤖 OpenAI &amp; Claude API</span>
                        <span class="tech-pill">🛍️ Magento 2 / Adobe Commerce</span>
                        <span class="tech-pill">🛒 Shopify</span>
                        <span class="tech-pill">💳 Stripe / Razorpay</span>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <!-- 8. Portfolio / Case Studies -->
    <section class="lp-portfolio" id="portfolio">
        <div class="container">
            <div class="section-header">
                <div class="badge-pill">Real Case Studies</div>
                <h2>Projects We've Built</h2>
                <p>Explore real-world software, SaaS products, and custom web applications delivered by our engineering team.</p>
            </div>

            <div class="portfolio-grid">
                <!-- Project 1: WaBizFlow -->
                <article class="project-card">
                    <div class="project-img-box">
                        <img src="{{ asset('site-assets/wabizflow.png') }}" alt="WaBizFlow SaaS &amp; CRM Platform by RS Orange Tech" loading="lazy">
                        <div class="project-category-badge">SaaS &amp; CRM Automation</div>
                    </div>
                    <div class="project-details">
                        <h3 class="project-title">WaBizFlow</h3>
                        <p class="project-desc">A full-featured B2B SaaS interface for customer relationship management, WhatsApp messaging automation, invoicing, and subscription billing.</p>
                        <div class="project-tech-pills">
                            <span class="p-tech-pill">Laravel</span>
                            <span class="p-tech-pill">SaaS Multi-Tenant</span>
                            <span class="p-tech-pill">CRM</span>
                            <span class="p-tech-pill">WhatsApp API</span>
                        </div>
                        <div class="project-action">
                            <a href="#consultation-form" onclick="preselectService('SaaS')">Request Similar Project →</a>
                        </div>
                    </div>
                </article>

                <!-- Project 2: VidyaPilot -->
                <article class="project-card">
                    <div class="project-img-box">
                        <img src="{{ asset('site-assets/vidyapilot-landing.png') }}" alt="VidyaPilot EdTech &amp; AI Learning Platform" loading="lazy">
                        <div class="project-category-badge">AI EdTech Platform</div>
                    </div>
                    <div class="project-details">
                        <h3 class="project-title">VidyaPilot</h3>
                        <p class="project-desc">AI-powered Olympiad education and learning management platform with real-time student analytics, mock tests, and smart progress reporting.</p>
                        <div class="project-tech-pills">
                            <span class="p-tech-pill">Laravel</span>
                            <span class="p-tech-pill">AI Integration</span>
                            <span class="p-tech-pill">EdTech</span>
                            <span class="p-tech-pill">Analytics</span>
                        </div>
                        <div class="project-action">
                            <a href="#consultation-form" onclick="preselectService('AI Application')">Request Similar Project →</a>
                        </div>
                    </div>
                </article>

                <!-- Project 3: Jyoti Pilot Portal -->
                <article class="project-card">
                    <div class="project-img-box">
                        <img src="{{ asset('site-assets/design.png') }}" alt="Jyoti Pilot Official Portal &amp; Platform" loading="lazy">
                        <div class="project-category-badge">Custom Web Application</div>
                    </div>
                    <div class="project-details">
                        <h3 class="project-title">Jyoti Pilot Portal</h3>
                        <p class="project-desc">High-concurrency dynamic web application and media portal engineered for high traffic, fast response times, and rich content distribution.</p>
                        <div class="project-tech-pills">
                            <span class="p-tech-pill">Laravel</span>
                            <span class="p-tech-pill">Livewire</span>
                            <span class="p-tech-pill">Tailwind CSS</span>
                            <span class="p-tech-pill">Performance</span>
                        </div>
                        <div class="project-action">
                            <a href="#consultation-form" onclick="preselectService('Laravel Application')">Request Similar Project →</a>
                        </div>
                    </div>
                </article>

                <!-- Project 4: Prime Breaks -->
                <article class="project-card">
                    <div class="project-img-box">
                        <img src="{{ asset('site-assets/prime-breaks.png') }}" alt="Prime Breaks Travel Platform" loading="lazy">
                        <div class="project-category-badge">Booking &amp; Travel Platform</div>
                    </div>
                    <div class="project-details">
                        <h3 class="project-title">Prime Breaks</h3>
                        <p class="project-desc">Destination discovery and booking platform with conversion-focused UX, search-first layout, and automated inquiry distribution engine.</p>
                        <div class="project-tech-pills">
                            <span class="p-tech-pill">Custom Web UX</span>
                            <span class="p-tech-pill">Booking Engine</span>
                            <span class="p-tech-pill">Search UI</span>
                        </div>
                        <div class="project-action">
                            <a href="#consultation-form" onclick="preselectService('Web Application')">Request Similar Project →</a>
                        </div>
                    </div>
                </article>

                <!-- Project 5: Desi Run Rush -->
                <article class="project-card">
                    <div class="project-img-box">
                        <img src="{{ asset('site-assets/desi-run-rush.png') }}" alt="Desi Run Rush Product Showcase" loading="lazy">
                        <div class="project-category-badge">Product Showcase UX</div>
                    </div>
                    <div class="project-details">
                        <h3 class="project-title">Desi Run Rush</h3>
                        <p class="project-desc">High-energy product landing experience featuring bold visuals, app store redirection architecture, and optimized page speed under 1.2 seconds.</p>
                        <div class="project-tech-pills">
                            <span class="p-tech-pill">Speed Optimization</span>
                            <span class="p-tech-pill">Landing Page UX</span>
                            <span class="p-tech-pill">Mobile-First</span>
                        </div>
                        <div class="project-action">
                            <a href="#consultation-form" onclick="preselectService('Website')">Request Similar Project →</a>
                        </div>
                    </div>
                </article>

                <!-- Project 6: Little Steps -->
                <article class="project-card">
                    <div class="project-img-box">
                        <img src="{{ asset('site-assets/little-steps.png') }}" alt="Little Steps Institutional Web Platform" loading="lazy">
                        <div class="project-category-badge">Education &amp; Portal</div>
                    </div>
                    <div class="project-details">
                        <h3 class="project-title">Little Steps</h3>
                        <p class="project-desc">Clean, responsive educational institution web platform with parent portal integration, event tracking, and intuitive admission inquiry capture.</p>
                        <div class="project-tech-pills">
                            <span class="p-tech-pill">CMS</span>
                            <span class="p-tech-pill">Inquiry Engine</span>
                            <span class="p-tech-pill">Responsive</span>
                        </div>
                        <div class="project-action">
                            <a href="#consultation-form" onclick="preselectService('Website')">Request Similar Project →</a>
                        </div>
                    </div>
                </article>
            </div>
        </div>
    </section>

    <!-- 9. 6-Step Development Process -->
    <section class="lp-process">
        <div class="container">
            <div class="section-header">
                <div class="badge-pill">Structured Delivery</div>
                <h2>From Idea to Launch</h2>
                <p>A predictable, milestone-driven software development methodology that guarantees quality and on-time delivery.</p>
            </div>

            <div class="process-steps-grid">
                <div class="process-step-box">
                    <span class="step-num">STEP 01</span>
                    <h4>Discover</h4>
                    <p>Understand your business objectives, workflows, user personas, and technical constraints.</p>
                </div>

                <div class="process-step-box">
                    <span class="step-num">STEP 02</span>
                    <h4>Plan</h4>
                    <p>Define database schema, system architecture, API specifications, and delivery milestones.</p>
                </div>

                <div class="process-step-box">
                    <span class="step-num">STEP 03</span>
                    <h4>Design</h4>
                    <p>Create intuitive, user-friendly UI wireframes, prototypes, and responsive interface design.</p>
                </div>

                <div class="process-step-box">
                    <span class="step-num">STEP 04</span>
                    <h4>Develop</h4>
                    <p>Write clean, tested, and secure code using modern stacks (Laravel, React, Node.js, Python).</p>
                </div>

                <div class="process-step-box">
                    <span class="step-num">STEP 05</span>
                    <h4>Test</h4>
                    <p>Comprehensive QA, unit tests, cross-browser audits, load tests, and OWASP security review.</p>
                </div>

                <div class="process-step-box">
                    <span class="step-num">STEP 06</span>
                    <h4>Launch</h4>
                    <p>Deploy to production servers (AWS/Docker), configure monitoring, and provide SLA support.</p>
                </div>
            </div>
        </div>
    </section>

    <!-- 10. Social Proof & Testimonials -->
    <section class="lp-testimonials">
        <div class="container">
            <div class="section-header dark">
                <div class="badge-pill badge-pill-dark">Client Feedback</div>
                <h2>What Our Clients Say</h2>
                <p>Hear how our engineering team helped founders and businesses build high-impact digital products.</p>
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
                            <p>Founder &amp; Brand Director</p>
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

    <!-- 11. Lead Qualification Section (Conversion Form) -->
    <section class="lp-form-section" id="consultation-form">
        <div class="container">
            <div class="form-card-container">
                <div class="form-header">
                    <div class="badge-pill">Free Consultation &amp; Quote</div>
                    <h2>Tell Us About Your Project</h2>
                    <p>Share a few details and our senior technical team will get back to you within 24 hours with architecture advice and a tailored project proposal.</p>
                </div>

                @if (session('status'))
                    <div class="alert-box alert-success">
                        <svg width="22" height="22" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2.5"><polyline points="20 6 9 17 4 12"></polyline></svg>
                        <span>{{ session('status') }}</span>
                    </div>
                @endif

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

                <form action="{{ route('lp.web-software.submit') }}" method="POST">
                    @csrf
                    <!-- Honeypot anti-spam -->
                    <input type="text" name="my_custom_country_verify" style="display:none !important;" tabindex="-1" autocomplete="off">

                    <div class="lead-form-grid">
                        <!-- Full Name -->
                        <div class="form-group">
                            <label for="form_name" class="form-label">Full Name <span class="req">*</span></label>
                            <input type="text" id="form_name" name="name" class="form-input" placeholder="e.g. John Doe" value="{{ old('name') }}" required>
                        </div>

                        <!-- Business Email -->
                        <div class="form-group">
                            <label for="form_email" class="form-label">Business Email <span class="req">*</span></label>
                            <input type="email" id="form_email" name="email" class="form-input" placeholder="e.g. john@company.com" value="{{ old('email') }}" required>
                        </div>

                        <!-- Phone Number -->
                        <div class="form-group">
                            <label for="form_phone" class="form-label">Phone Number / WhatsApp <span class="req">*</span></label>
                            <input type="tel" id="form_phone" name="phone" class="form-input" placeholder="e.g. +91 98765 43210" value="{{ old('phone') }}" required>
                        </div>

                        <!-- Company Name -->
                        <div class="form-group">
                            <label for="form_company" class="form-label">Company / Organization Name</label>
                            <input type="text" id="form_company" name="company" class="form-input" placeholder="e.g. Acme Innovations" value="{{ old('company') }}">
                        </div>

                        <!-- What Do You Want to Build? -->
                        <div class="form-group full-width">
                            <label for="form_service" class="form-label">What Do You Want to Build? <span class="req">*</span></label>
                            <select id="form_service" name="service" class="form-select" required>
                                <option value="" disabled {{ old('service') ? '' : 'selected' }}>-- Select Solution Type --</option>
                                <option value="Website" {{ old('service') == 'Website' ? 'selected' : '' }}>Website (Business / Brand / High-Converting Landing Page)</option>
                                <option value="Web Application" {{ old('service') == 'Web Application' ? 'selected' : '' }}>Web Application (Custom Web App / Portal)</option>
                                <option value="Laravel Application" {{ old('service') == 'Laravel Application' ? 'selected' : '' }}>Laravel Application (Custom Backend, APIs, MVC)</option>
                                <option value="CRM / ERP" {{ old('service') == 'CRM / ERP' ? 'selected' : '' }}>CRM / ERP (Customer &amp; Operations Management)</option>
                                <option value="SaaS" {{ old('service') == 'SaaS' ? 'selected' : '' }}>SaaS Platform (Multi-Tenant Software Product)</option>
                                <option value="E-commerce" {{ old('service') == 'E-commerce' ? 'selected' : '' }}>E-commerce Store (Shopify / Magento / Custom)</option>
                                <option value="Mobile App" {{ old('service') == 'Mobile App' ? 'selected' : '' }}>Mobile App (Flutter / React Native / iOS / Android)</option>
                                <option value="Custom Software" {{ old('service') == 'Custom Software' ? 'selected' : '' }}>Custom Software (Enterprise Business Tool)</option>
                                <option value="AI Application" {{ old('service') == 'AI Application' ? 'selected' : '' }}>AI Application (OpenAI / Claude / Smart Automation)</option>
                                <option value="Other" {{ old('service') == 'Other' ? 'selected' : '' }}>Other / Multi-Service Project</option>
                            </select>
                        </div>

                        <!-- Estimated Budget -->
                        <div class="form-group full-width">
                            <label class="form-label">Estimated Budget</label>
                            <div class="pill-selection-grid">
                                @php
                                    $budgets = [
                                        'Under ₹50,000',
                                        '₹50,000 – ₹1,00,000',
                                        '₹1,00,000 – ₹3,00,000',
                                        '₹3,00,000 – ₹5,00,000',
                                        '₹5,00,000+',
                                        'Not Sure'
                                    ];
                                @endphp
                                @foreach ($budgets as $b)
                                    <label class="pill-label">
                                        <input type="radio" name="budget" value="{{ $b }}" {{ (old('budget') == $b || (!old('budget') && $loop->first)) ? 'checked' : '' }}>
                                        <span class="pill-box">{{ $b }}</span>
                                    </label>
                                @endforeach
                            </div>
                        </div>

                        <!-- Project Timeline -->
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
                                        <input type="radio" name="timeline" value="{{ $t }}" {{ (old('timeline') == $t || (!old('timeline') && $loop->first)) ? 'checked' : '' }}>
                                        <span class="pill-box">{{ $t }}</span>
                                    </label>
                                @endforeach
                            </div>
                        </div>

                        <!-- Project Requirements -->
                        <div class="form-group full-width">
                            <label for="form_message" class="form-label">Project Requirements / Brief <span class="req">*</span></label>
                            <textarea id="form_message" name="message" rows="5" class="form-textarea" placeholder="Tell us briefly about your goals, features needed, target audience, or any existing systems you want to connect..." required>{{ old('message') }}</textarea>
                        </div>

                        <!-- Submit CTA -->
                        <div class="form-group full-width" style="margin-top: 8px;">
                            <button type="submit" class="btn btn-primary btn-lg" style="width: 100%; font-size: 1.15rem;">
                                <span>Get My Free Consultation &amp; Quote</span>
                                <svg width="20" height="20" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2.5"><line x1="5" y1="12" x2="19" y2="12"></line><polyline points="12 5 19 12 12 19"></polyline></svg>
                            </button>
                        </div>
                    </div>

                    <div class="privacy-reassurance">
                        <svg width="18" height="18" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2.5"><path d="M12 22s8-4 8-10V5l-8-3-8 3v7c0 6 8 10 8 10z"></path></svg>
                        <span>Your information is strictly confidential. We never share your project details with third parties. NDA available upon request.</span>
                    </div>
                </form>
            </div>
        </div>
    </section>

    <!-- 12. FAQ Section -->
    <section class="lp-faq" id="faq">
        <div class="container">
            <div class="section-header">
                <div class="badge-pill">Common Questions</div>
                <h2>Frequently Asked Questions</h2>
                <p>Everything you need to know before partnering with RS Orange Tech.</p>
            </div>

            <div class="faq-accordion">
                <!-- FAQ 1 -->
                <details class="faq-item" open>
                    <summary class="faq-summary">
                        <span>How much does custom software development cost?</span>
                        <svg class="faq-icon-arrow" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2.5"><polyline points="6 9 12 15 18 9"></polyline></svg>
                    </summary>
                    <div class="faq-content">
                        Project costs depend on feature complexity, tech stack, integrations, and timeline. Small focused web apps start under ₹50,000, while comprehensive custom SaaS or ERP platforms range between ₹1,00,000 to ₹5,00,000+. We provide fixed-price quotes with transparent milestone schedules.
                    </div>
                </details>

                <!-- FAQ 2 -->
                <details class="faq-item">
                    <summary class="faq-summary">
                        <span>How long does a web application take to develop?</span>
                        <svg class="faq-icon-arrow" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2.5"><polyline points="6 9 12 15 18 9"></polyline></svg>
                    </summary>
                    <div class="faq-content">
                        A typical MVP or focused web application takes 2 to 4 weeks. Larger custom systems, multi-tenant SaaS, or complex ERP platforms take 6 to 12 weeks. We work in agile sprints with functional weekly demos.
                    </div>
                </details>

                <!-- FAQ 3 -->
                <details class="faq-item">
                    <summary class="faq-summary">
                        <span>Do you work with international clients?</span>
                        <svg class="faq-icon-arrow" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2.5"><polyline points="6 9 12 15 18 9"></polyline></svg>
                    </summary>
                    <div class="faq-content">
                        Yes! Over 60% of our clients are based in the United States, United Kingdom, Australia, Canada, and the UAE. We accommodate international time zones and maintain clear asynchronous and live communication channels.
                    </div>
                </details>

                <!-- FAQ 4 -->
                <details class="faq-item">
                    <summary class="faq-summary">
                        <span>Can you sign an NDA?</span>
                        <svg class="faq-icon-arrow" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2.5"><polyline points="6 9 12 15 18 9"></polyline></svg>
                    </summary>
                    <div class="faq-content">
                        Absolutely. We sign standard Non-Disclosure Agreements (NDAs) prior to reviewing any project briefs, proprietary wireframes, or existing codebase. Your intellectual property remains 100% yours.
                    </div>
                </details>

                <!-- FAQ 5 -->
                <details class="faq-item">
                    <summary class="faq-summary">
                        <span>Do you provide ongoing maintenance?</span>
                        <svg class="faq-icon-arrow" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2.5"><polyline points="6 9 12 15 18 9"></polyline></svg>
                    </summary>
                    <div class="faq-content">
                        Yes. We provide comprehensive post-launch SLA support, including security patching, server monitoring, database backups, performance optimization, and continuous feature additions.
                    </div>
                </details>

                <!-- FAQ 6 -->
                <details class="faq-item">
                    <summary class="faq-summary">
                        <span>Can you work with an existing development team?</span>
                        <svg class="faq-icon-arrow" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2.5"><polyline points="6 9 12 15 18 9"></polyline></svg>
                    </summary>
                    <div class="faq-content">
                        Yes. Our engineers easily integrate into your existing Git workflows, Jira/Trello boards, and Slack/Teams workspaces as an extended backend, frontend, or full-stack engineering unit.
                    </div>
                </details>

                <!-- FAQ 7 -->
                <details class="faq-item">
                    <summary class="faq-summary">
                        <span>Do you provide dedicated Laravel developers?</span>
                        <svg class="faq-icon-arrow" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2.5"><polyline points="6 9 12 15 18 9"></polyline></svg>
                    </summary>
                    <div class="faq-content">
                        Yes. You can hire experienced Laravel engineers and full-stack developers on flexible monthly retainers or dedicated full-time models.
                    </div>
                </details>

                <!-- FAQ 8 -->
                <details class="faq-item">
                    <summary class="faq-summary">
                        <span>Can you develop an MVP?</span>
                        <svg class="faq-icon-arrow" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2.5"><polyline points="6 9 12 15 18 9"></polyline></svg>
                    </summary>
                    <div class="faq-content">
                        Yes. We specialize in rapid MVP engineering for startups and founders — helping you validate product-market fit, onboard early adopters, and secure funding without wasting capital.
                    </div>
                </details>

                <!-- FAQ 9 -->
                <details class="faq-item">
                    <summary class="faq-summary">
                        <span>Can you integrate APIs and third-party systems?</span>
                        <svg class="faq-icon-arrow" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2.5"><polyline points="6 9 12 15 18 9"></polyline></svg>
                    </summary>
                    <div class="faq-content">
                        Yes. We build custom API connectors for Stripe, PayPal, Razorpay, Twilio, Salesforce, HubSpot, QuickBooks, OpenAI, Claude, Google Cloud, and bespoke legacy backends.
                    </div>
                </details>
            </div>
        </div>
    </section>

    <!-- 13. Final Conversion CTA -->
    <section class="lp-final-cta">
        <div class="container final-cta-content">
            <div class="badge-pill badge-pill-dark">Ready to Build?</div>
            <h2>Have a Project in Mind? Let's Build It.</h2>
            <p>Talk to our senior engineering team and discover the right technology architecture and execution strategy for your business.</p>

            <div class="final-cta-actions">
                <a href="#consultation-form" class="btn btn-primary btn-lg">
                    <span>Get a Free Consultation</span>
                    <svg width="20" height="20" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2.5"><line x1="5" y1="12" x2="19" y2="12"></line><polyline points="12 5 19 12 12 19"></polyline></svg>
                </a>
                <a href="tel:{{ $phoneClean }}" class="btn btn-ghost-dark btn-lg">
                    <svg width="20" height="20" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"><path d="M22 16.92v3a2 2 0 0 1-2.18 2 19.79 19.79 0 0 1-8.63-3.07 19.5 19.5 0 0 1-6-6 19.79 19.79 0 0 1-3.07-8.67A2 2 0 0 1 4.11 2h3a2 2 0 0 1 2 1.72 12.84 12.84 0 0 0 .7 2.81 2 2 0 0 1-.45 2.11L8.09 9.91a16 16 0 0 0 6 6l1.27-1.27a2 2 0 0 1 2.11-.45 12.84 12.84 0 0 0 2.81.7A2 2 0 0 1 22 16.92z"></path></svg>
                    <span>Call Us: {{ $phone }}</span>
                </a>
            </div>

            <div class="cta-guarantee-row">
                <span>✓ No obligation</span>
                <span>✓ Confidential discussion</span>
                <span>✓ Experienced development team</span>
                <span>✓ Direct engineer consultation</span>
            </div>
        </div>
    </section>

    <!-- 14. Minimal Footer -->
    <footer class="lp-footer">
        <div class="container">
            <div class="lp-footer-grid">
                <div class="footer-logo-block">
                    <img src="{{ asset('rslogo.png') }}" alt="RS Orange Tech">
                    <p>Your Experienced Technology Partner for Custom Web &amp; Software Development.</p>
                </div>

                <div class="footer-services-list">
                    <a href="#services">Web Development</a>
                    <a href="#services">Custom Software</a>
                    <a href="#services">Laravel Development</a>
                    <a href="#services">CRM / ERP</a>
                    <a href="#services">SaaS Development</a>
                    <a href="#services">AI Development</a>
                </div>
            </div>

            <div class="footer-bottom-row">
                <p>&copy; {{ date('Y') }} RS Orange Tech. All rights reserved. B-125, Sector 63, Noida, Uttar Pradesh 201301.</p>
                <div class="footer-legal-links">
                    <a href="{{ route('privacy') }}" target="_blank">Privacy Policy</a>
                    <a href="{{ route('terms') }}" target="_blank">Terms &amp; Conditions</a>
                    <a href="mailto:{{ $email }}">{{ $email }}</a>
                </div>
            </div>
        </div>
    </footer>

    <!-- 15. Mobile Sticky Bottom Bar -->
    <div class="mobile-sticky-bar">
        <div class="mobile-sticky-inner">
            <a href="tel:{{ $phoneClean }}" class="btn btn-secondary btn-sm" style="padding: 10px 12px; font-size: 0.85rem;">
                <svg width="16" height="16" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2.5"><path d="M22 16.92v3a2 2 0 0 1-2.18 2 19.79 19.79 0 0 1-8.63-3.07 19.5 19.5 0 0 1-6-6 19.79 19.79 0 0 1-3.07-8.67A2 2 0 0 1 4.11 2h3a2 2 0 0 1 2 1.72 12.84 12.84 0 0 0 .7 2.81 2 2 0 0 1-.45 2.11L8.09 9.91a16 16 0 0 0 6 6l1.27-1.27a2 2 0 0 1 2.11-.45 12.84 12.84 0 0 0 2.81.7A2 2 0 0 1 22 16.92z"></path></svg>
                <span>Call Us</span>
            </a>
            <a href="#consultation-form" class="btn btn-primary btn-sm" style="padding: 10px 14px; font-size: 0.85rem;">
                <span>Free Consultation</span>
                <svg width="14" height="14" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2.5"><line x1="5" y1="12" x2="19" y2="12"></line><polyline points="12 5 19 12 12 19"></polyline></svg>
            </a>
        </div>
    </div>

    <!-- Interactive Script for Service Preselection -->
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
    </script>
</body>
</html>
