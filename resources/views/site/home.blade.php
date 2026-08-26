@php
    $title = "Web Development, AI & Ecommerce Solutions Company in Noida | RS Orange Tech";
    $description = "RS Orange Tech provides web development, ecommerce, mobile app, AI and custom software solutions for businesses in Noida, Delhi NCR and worldwide.";
    $keywords = "web development company, mobile app development, Laravel development, custom software development, UI/UX design, SEO services, ecommerce development, AI automation";
@endphp
@extends('site.layout')

@push('head')
<meta name="keywords" content="{{ $keywords }}">
<meta name="author" content="RS Orange Tech">
<meta property="og:site_name" content="RS Orange Tech">
<script type="application/ld+json">
{!! json_encode([
    '@context' => 'https://schema.org',
    '@graph' => [
        [
            '@type' => 'ProfessionalService',
            'name' => 'RS Orange Tech',
            'url' => route('home'),
            'logo' => asset('rslogo.png'),
            'image' => asset('site-assets/banner1.webp'),
            'description' => 'Premium web development and mobile app development agency offering Custom Web Development, Laravel Solutions, UI/UX Design, and AI Automation services.',
            'email' => 'info@rsorangetech.com',
            'telephone' => '+91 73035 36474',
            'priceRange' => '$$',
            'address' => [
                '@type' => 'PostalAddress',
                'streetAddress' => 'B-125, Sector 63',
                'addressLocality' => 'Noida',
                'addressRegion' => 'Uttar Pradesh',
                'postalCode' => '201301',
                'addressCountry' => 'IN',
            ],
            'contactPoint' => [
                '@type' => 'ContactPoint',
                'telephone' => '+91 73035 36474',
                'contactType' => 'customer service',
                'areaServed' => ['US', 'GB', 'CA', 'AU', 'IN'],
                'availableLanguage' => ['English', 'Hindi']
            ],
            'sameAs' => [
                'https://www.linkedin.com/company/rsorangetech',
                'https://www.facebook.com/rsorangetech',
                'https://twitter.com/rsorangetech',
                'https://www.instagram.com/rsorangetech'
            ]
        ],
        [
            '@type' => 'WebSite',
            '@id' => route('home') . '#website',
            'url' => route('home'),
            'name' => 'RS Orange Tech',
            'description' => 'Premium Web, App & Software Development Company',
            'publisher' => [
                '@type' => 'Organization',
                'name' => 'RS Orange Tech',
                'logo' => [
                    '@type' => 'ImageObject',
                    'url' => asset('rslogo.png')
                ]
            ]
        ]
    ]
], JSON_UNESCAPED_SLASHES | JSON_PRETTY_PRINT) !!}
</script>
@endpush

@push('scripts')
<script>
    const portfolioTrack = document.querySelector('[data-portfolio-track]');
    const portfolioPrev = document.querySelector('[data-portfolio-prev]');
    const portfolioNext = document.querySelector('[data-portfolio-next]');

    if (portfolioTrack && portfolioPrev && portfolioNext) {
        const getScrollAmount = () => {
            const card = portfolioTrack.querySelector('.live-portfolio-card');
            return card ? card.offsetWidth + 30 : portfolioTrack.clientWidth;
        };

        portfolioPrev.addEventListener('click', () => {
            portfolioTrack.scrollBy({ left: -getScrollAmount(), behavior: 'smooth' });
        });

        portfolioNext.addEventListener('click', () => {
            portfolioTrack.scrollBy({ left: getScrollAmount(), behavior: 'smooth' });
        });
    }
</script>
@endpush

@section('content')
<section class="premium-hero">
    <div class="premium-hero-copy">
        <p class="eyebrow">Premium Web, App & AI Development Agency</p>
        <h1>Web Development, AI & <span class="highlight-orange">Custom Software</span> Solutions</h1>
        <p>RS Orange Tech is a full-stack digital agency specializing in premium web development, ecommerce platforms, mobile applications, AI automation, and custom software solutions.</p>
        <div class="actions">
            <a class="button primary hero-button" href="{{ route('quote') }}">Start a Project <span aria-hidden="true">-&gt;</span></a>
            <a class="button premium-ghost hero-button" href="{{ route('portfolio') }}">View Our Work <span aria-hidden="true">-&gt;</span></a>
        </div>
        <div class="hero-features" aria-label="Company capabilities">
            <div class="hero-feature-item">
                <div class="feature-icon">🚀</div>
                <strong>Modern Solutions</strong>
                <span>Built for Growth</span>
            </div>
            <div class="hero-feature-item">
                <div class="feature-icon">🔒</div>
                <strong>Secure & Scalable</strong>
                <span>Future ready</span>
            </div>
            <div class="hero-feature-item">
                <div class="feature-icon">⚡</div>
                <strong>On-Time Delivery</strong>
                <span>We Promise</span>
            </div>
            <div class="hero-feature-item">
                <div class="feature-icon">💬</div>
                <strong>24/7 Support</strong>
                <span>We're Here</span>
            </div>
        </div>
    </div>
    <div class="premium-hero-panel" aria-label="RS Orange Tech capabilities">
        <!-- Device Mockup Container -->
        <div class="hero-device-mockup">
            <div class="hero-orbit" aria-hidden="true"></div>
            <div class="hero-dotted hero-dotted-top" aria-hidden="true"></div>
            <div class="hero-dotted hero-dotted-bottom" aria-hidden="true"></div>
            <div class="hero-cube hero-cube-one" aria-hidden="true"></div>
            <div class="hero-cube hero-cube-two" aria-hidden="true"></div>
            <div class="hero-sphere" aria-hidden="true"></div>
            <div class="hero-paper-plane" aria-hidden="true"></div>
            <!-- Floating Cards Around Device -->
            <div class="floating-card floating-card-1">
                <div class="card-icon">
                    <svg width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><rect x="3" y="11" width="18" height="10" rx="2"></rect><circle cx="12" cy="5" r="2"></circle><path d="M12 7v4"></path><line x1="8" y1="16" x2="8" y2="16"></line><line x1="16" y1="16" x2="16" y2="16"></line></svg>
                </div>
                <span class="card-label">AI Automation</span>
                <p>Smart solutions to automate and scale your business.</p>
            </div>

            <div class="floating-card floating-card-2">
                <div class="card-icon">
                    <svg width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><polyline points="16 18 22 12 16 6"></polyline><polyline points="8 6 2 12 8 18"></polyline></svg>
                </div>
                <span class="card-label">Web Development</span>
                <p>Fast, secure and high-performing websites.</p>
            </div>

            <div class="floating-card floating-card-3">
                <div class="card-icon">
                    <svg width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><rect x="5" y="2" width="14" height="20" rx="2" ry="2"></rect><line x1="12" y1="18" x2="12.01" y2="18"></line></svg>
                </div>
                <span class="card-label">Mobile Apps</span>
                <p>Engaging apps for Android and iOS platforms.</p>
            </div>

            <div class="floating-card floating-card-4">
                <div class="card-icon">
                    <svg width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><circle cx="9" cy="21" r="1"></circle><circle cx="20" cy="21" r="1"></circle><path d="M1 1h4l2.68 13.39a2 2 0 0 0 2 1.61h9.72a2 2 0 0 0 2-1.61L23 6H6"></path></svg>
                </div>
                <span class="card-label">E-Commerce</span>
                <p>Conversion-focused stores that sell more.</p>
            </div>

            <!-- Central Device Screen -->
            <div class="device-screen">
                <div class="screen-content">
                    <div class="screen-header">Driving Digital Success for Leading Brands</div>
                    <div class="screen-text">Premium development services that help businesses grow</div>
                    <div class="screen-button">Get Started</div>
                </div>
            </div>
            <div class="hero-phone" aria-hidden="true">
                <div class="phone-notch"></div>
                <div class="phone-brand">RS</div>
                <h3>Empowering Business with Technology</h3>
                <p>Mobile-first experiences built to convert.</p>
                <span>Get Started</span>
                <div class="phone-tabs">
                    <i></i><i></i><i></i><i></i>
                </div>
            </div>
        </div>
    </div>
</section>

<section class="brand-strip" aria-label="Primary services">
    <a href="{{ route('pages.show', 'ecommerce-development') }}"><span>E-Commerce Development</span></a>
    <a href="{{ route('pages.show', 'laravel-development') }}"><span>Laravel Applications</span></a>
    <a href="{{ route('pages.show', 'mobile-app-development') }}"><span>Mobile Apps</span></a>
    <a href="{{ route('pages.show', 'ai-automation') }}"><span>AI Automation</span></a>
</section>

<section class="what-we-do-section" id="what-we-do">
    <div class="what-we-do-shell">
        <div class="what-copy">
            <p class="eyebrow">What We Do</p>
            <h2>Digital products that look <span>premium</span> and work hard behind the scenes.</h2>
            <p>RS Orange Tech helps founders, SMEs and established teams turn business ideas into reliable digital systems. Every build is planned for SEO, speed, security, responsive design and easy day-to-day management.</p>
            <p>From a first business website to a custom web application, we focus on clear user journeys, clean code, measurable performance and long-term maintainability.</p>
            <div class="what-actions">
                <a class="button primary" href="{{ route('quote') }}">Get a Free Quote <span aria-hidden="true">→</span></a>
                <a class="what-text-link" href="{{ route('our-approach') }}">Discover Our Approach <span aria-hidden="true">→</span></a>
                <a class="what-text-link" href="{{ route('services') }}">Explore Services <span aria-hidden="true">→</span></a>
            </div>

        </div>

        <!-- Feature Cards Right Panel -->
        <div class="what-features-right-panel">
            
            <!-- Top Grid (4 cards) -->
            <div class="what-features-top-grid">
                <div class="what-feature-card-tall what-feature-1">
                    <div class="feature-card-icon">
                        <svg width="28" height="28" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><circle cx="9" cy="21" r="1"></circle><circle cx="20" cy="21" r="1"></circle><path d="M1 1h4l2.68 13.39a2 2 0 0 0 2 1.61h9.72a2 2 0 0 0 2-1.61L23 6H6"></path></svg>
                    </div>
                    <h3>E-Commerce Development</h3>
                    <p>High-performance online stores that convert visitors into loyal customers.</p>
                    <span class="feature-badge feature-badge-1">01</span>
                </div>
                
                <div class="what-feature-card-tall what-feature-2">
                    <div class="feature-card-icon">
                        <svg width="28" height="28" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><polyline points="16 18 22 12 16 6"></polyline><polyline points="8 6 2 12 8 18"></polyline></svg>
                    </div>
                    <h3>Laravel Applications</h3>
                    <p>Robust, scalable and secure web applications built with Laravel.</p>
                    <span class="feature-badge feature-badge-2">02</span>
                </div>
                
                <div class="what-feature-card-tall what-feature-3">
                    <div class="feature-card-icon">
                        <svg width="28" height="28" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><rect x="5" y="2" width="14" height="20" rx="2" ry="2"></rect><line x1="12" y1="18" x2="12.01" y2="18"></line></svg>
                    </div>
                    <h3>Mobile Apps</h3>
                    <p>Feature-rich mobile apps for iOS and Android platforms.</p>
                    <span class="feature-badge feature-badge-3">03</span>
                </div>
                
                <div class="what-feature-card-tall what-feature-4">
                    <div class="feature-card-icon">
                        <svg width="28" height="28" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><rect x="3" y="11" width="18" height="10" rx="2"></rect><circle cx="12" cy="5" r="2"></circle><path d="M12 7v4"></path><line x1="8" y1="16" x2="8" y2="16"></line><line x1="16" y1="16" x2="16" y2="16"></line></svg>
                    </div>
                    <h3>AI Automation</h3>
                    <p>AI-powered automation that saves time and boosts efficiency.</p>
                    <span class="feature-badge feature-badge-4">04</span>
                </div>
            </div>
            
            <!-- Middle Grid (6 cards) -->
            <div class="what-features-middle-grid">
                <div class="what-feature-card-wide what-feature-5">
                    <div class="feature-card-icon">
                        <svg width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><circle cx="12" cy="12" r="10"></circle><line x1="2" y1="12" x2="22" y2="12"></line><path d="M12 2a15.3 15.3 0 0 1 4 10 15.3 15.3 0 0 1-4 10 15.3 15.3 0 0 1-4-10 15.3 15.3 0 0 1 4-10z"></path></svg>
                    </div>
                    <div class="feature-card-content">
                        <h3>Custom Web Development</h3>
                        <p>Tailored websites and web applications built to fit your unique business needs.</p>
                    </div>
                </div>

                <div class="what-feature-card-wide what-feature-6">
                    <div class="feature-card-icon">
                        <svg width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><circle cx="13.5" cy="6.5" r=".5"></circle><circle cx="17.5" cy="10.5" r=".5"></circle><circle cx="8.5" cy="7.5" r=".5"></circle><circle cx="6.5" cy="12.5" r=".5"></circle><path d="M12 2C6.5 2 2 6.5 2 12s4.5 10 10 10c.926 0 1.648-.746 1.648-1.688 0-.437-.18-.835-.437-1.125-.29-.289-.438-.652-.438-1.125a1.64 1.64 0 0 1 1.668-1.668h1.996c3.051 0 5.555-2.503 5.555-5.554C21.965 6.012 17.461 2 12 2z"></path></svg>
                    </div>
                    <div class="feature-card-content">
                        <h3>UI/UX Design</h3>
                        <p>Modern, intuitive designs and conversion-focused designs that enhance user experience.</p>
                    </div>
                </div>

                <div class="what-feature-card-wide what-feature-7">
                    <div class="feature-card-icon">
                        <svg width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><path d="M12 22s8-4 8-10V5l-8-3-8 3v7c0 6 8 10 8 10z"></path></svg>
                    </div>
                    <div class="feature-card-content">
                        <h3>CMS Development</h3>
                        <p>Easy-to-manage CMS solutions like WordPress for complete content control.</p>
                    </div>
                </div>

                <div class="what-feature-card-wide what-feature-8">
                    <div class="feature-card-icon">
                        <svg width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><polyline points="23 6 13.5 15.5 8.5 10.5 1 18"></polyline><polyline points="17 6 23 6 23 12"></polyline></svg>
                    </div>
                    <div class="feature-card-content">
                        <h3>SEO & Digital Growth</h3>
                        <p>SEO-friendly structure and digital strategies to help you rank higher and grow faster.</p>
                    </div>
                </div>

                <div class="what-feature-card-wide what-feature-9">
                    <div class="feature-card-icon">
                        <svg width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><circle cx="12" cy="12" r="3"></circle><path d="M19.4 15a1.65 1.65 0 0 0 .33 1.82l.06.06a2 2 0 0 1 0 2.83 2 2 0 0 1-2.83 0l-.06-.06a1.65 1.65 0 0 0-1.82-.33 1.65 1.65 0 0 0-1 1.51V21a2 2 0 0 1-2 2 2 2 0 0 1-2-2v-.09A1.65 1.65 0 0 0 9 19.4a1.65 1.65 0 0 0-1.82.33l-.06.06a2 2 0 0 1-2.83 0 2 2 0 0 1 0-2.83l.06-.06a1.65 1.65 0 0 0 .33-1.82 1.65 1.65 0 0 0-1.51-1H3a2 2 0 0 1-2-2 2 2 0 0 1 2-2h.09A1.65 1.65 0 0 0 4.6 9a1.65 1.65 0 0 0-.33-1.82l-.06-.06a2 2 0 0 1 0-2.83 2 2 0 0 1 2.83 0l.06.06a1.65 1.65 0 0 0 1.82.33H9a1.65 1.65 0 0 0 1-1.51V3a2 2 0 0 1 2-2 2 2 0 0 1 2 2v.09a1.65 1.65 0 0 0 1 1.51 1.65 1.65 0 0 0 1.82-.33l.06-.06a2 2 0 0 1 2.83 0 2 2 0 0 1 0 2.83l-.06.06a1.65 1.65 0 0 0-.33 1.82V9a1.65 1.65 0 0 0 1.51 1H21a2 2 0 0 1 2 2 2 2 0 0 1-2 2h-.09a1.65 1.65 0 0 0-1.51 1z"></path></svg>
                    </div>
                    <div class="feature-card-content">
                        <h3>Website Maintenance</h3>
                        <p>Ongoing support, updates and monitoring to keep your website fast and secure.</p>
                    </div>
                </div>

                <div class="what-feature-card-wide what-feature-10">
                    <div class="feature-card-icon">
                        <svg width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><path d="M18 10h-1.26A8 8 0 1 0 9 20h9a5 5 0 0 0 0-10z"></path></svg>
                    </div>
                    <div class="feature-card-content">
                        <h3>Hosting & Deployment</h3>
                        <p>Reliable hosting and seamless deployment for maximum uptime and performance.</p>
                    </div>
                </div>
            </div>

            <!-- Bottom Tech Strip -->
            <div class="what-technologies-strip">
                <h3>Technologies We Use</h3>
                <div class="tech-strip-icons">
                    <div class="tech-item">
                        <img src="https://cdn.jsdelivr.net/gh/devicons/devicon@latest/icons/laravel/laravel-original.svg" alt="Laravel" width="32" height="32" />
                        <span>Laravel</span>
                    </div>
                    <div class="tech-item">
                        <img src="https://cdn.jsdelivr.net/gh/devicons/devicon@latest/icons/vuejs/vuejs-original.svg" alt="Vue.js" width="32" height="32" />
                        <span>Vue.js</span>
                    </div>
                    <div class="tech-item">
                        <img src="https://cdn.jsdelivr.net/gh/devicons/devicon@latest/icons/react/react-original.svg" alt="React" width="32" height="32" />
                        <span>React</span>
                    </div>
                    <div class="tech-item">
                        <img src="https://cdn.jsdelivr.net/gh/devicons/devicon@latest/icons/nextjs/nextjs-original.svg" alt="Next.js" width="32" height="32" />
                        <span>Next.js</span>
                    </div>
                    <div class="tech-item">
                        <img src="https://cdn.jsdelivr.net/gh/devicons/devicon@latest/icons/tailwindcss/tailwindcss-original.svg" alt="Tailwind CSS" width="32" height="32" />
                        <span>Tailwind CSS</span>
                    </div>
                    <div class="tech-item">
                        <img src="https://cdn.jsdelivr.net/gh/devicons/devicon@latest/icons/nodejs/nodejs-original.svg" alt="Node.js" width="32" height="32" />
                        <span>Node.js</span>
                    </div>
                    <div class="tech-item">
                        <img src="https://cdn.jsdelivr.net/gh/devicons/devicon@latest/icons/mysql/mysql-original-wordmark.svg" alt="MySQL" width="32" height="32" />
                        <span>MySQL</span>
                    </div>
                    <div class="tech-item">
                        <img src="https://cdn.jsdelivr.net/gh/devicons/devicon@latest/icons/amazonwebservices/amazonwebservices-original-wordmark.svg" alt="AWS" width="32" height="32" />
                        <span>AWS</span>
                    </div>
                    <div class="tech-item">
                        <img src="https://cdn.jsdelivr.net/gh/devicons/devicon@latest/icons/docker/docker-original.svg" alt="Docker" width="32" height="32" />
                        <span>Docker</span>
                    </div>
                </div>
            </div>
            
        </div>
    </div>
</section>

<section class="home-services-section">
    <div class="home-services-container">
        <!-- Premium Header -->
        <div class="home-services-header">
            <p class="eyebrow">OUR SERVICES</p>
            <h2>Solutions That Drive Your Business Forward</h2>
            <p class="services-subtitle">Powerful, scalable and result-driven services to help your business grow in the digital era.</p>
        </div>

        <!-- Services Grid -->
        <div class="home-services-grid">
            @foreach ($services as $service)
                @php
                    $serviceTitle = is_object($service) ? ($service->title ?? 'Service') : ($service['title'] ?? 'Service');
                    $serviceBody = is_object($service)
                        ? ($service->excerpt ?: $service->content ?: 'Learn more about this service.')
                        : ($service['body'] ?? 'Learn more about this service.');
                    $serviceSlug = is_object($service) ? trim((string) ($service->slug ?? ''), '/') : null;
                    $serviceLink = $serviceSlug ? route('pages.show', $serviceSlug) : route('services');
                    $serviceNumber = str_pad($loop->iteration, 2, '0', STR_PAD_LEFT);
                @endphp
                <article class="home-service-card" data-service-number="{{ $serviceNumber }}">
                    <div class="service-card-badge">{{ $serviceNumber }}</div>
                    
                    <div class="service-card-icon">
                        <svg class="service-icon-svg" viewBox="0 0 48 48" fill="none">
                            @switch($loop->iteration)
                                @case(1)
                                    <circle cx="24" cy="24" r="20" stroke="currentColor" stroke-width="1.5"/>
                                    <path d="M20 18h8v8h-8v-8M20 28h8v4h-8v-4" stroke="currentColor" stroke-width="1.5" stroke-linecap="round"/>
                                    @break
                                @case(2)
                                    <circle cx="24" cy="24" r="20" stroke="currentColor" stroke-width="1.5"/>
                                    <path d="M18 22v-2c0-1 1-2 2-2h8c1 0 2 1 2 2v2M18 22h12m-10 0v6c0 1 1 2 2 2h4c1 0 2-1 2-2v-6" stroke="currentColor" stroke-width="1.5" stroke-linecap="round"/>
                                    @break
                                @case(3)
                                    <circle cx="24" cy="24" r="20" stroke="currentColor" stroke-width="1.5"/>
                                    <path d="M22 18h4v12h-4v-12M18 28h12M24 18c-3 0-6 3-6 6" stroke="currentColor" stroke-width="1.5" stroke-linecap="round"/>
                                    @break
                                @case(4)
                                    <circle cx="24" cy="24" r="20" stroke="currentColor" stroke-width="1.5"/>
                                    <path d="M18 20h12v8H18v-8M20 18v-2h8v2" stroke="currentColor" stroke-width="1.5" stroke-linecap="round"/>
                                    @break
                                @case(5)
                                    <circle cx="24" cy="24" r="20" stroke="currentColor" stroke-width="1.5"/>
                                    <path d="M20 30h8v-1.5c0-1 1-2 2-2h-12c1 0 2 1 2 2V30M22 18c-1 0-2 1-2 2s1 2 2 2 2-1 2-2-1-2-2-2" stroke="currentColor" stroke-width="1.5" stroke-linecap="round"/>
                                    @break
                                @case(6)
                                    <circle cx="24" cy="24" r="20" stroke="currentColor" stroke-width="1.5"/>
                                    <path d="M22 20h4v10h-4v-10M18 28h12M24 18l4 4-4 4" stroke="currentColor" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round"/>
                                    @break
                                @case(7)
                                    <circle cx="24" cy="24" r="20" stroke="currentColor" stroke-width="1.5"/>
                                    <path d="M18 28h12M24 20c1.5 0 2.5 1 2.5 2.5s-1 2.5-2.5 2.5-2.5-1-2.5-2.5 1-2.5 2.5-2.5" stroke="currentColor" stroke-width="1.5" stroke-linecap="round"/>
                                    @break
                                @case(8)
                                    <circle cx="24" cy="24" r="20" stroke="currentColor" stroke-width="1.5"/>
                                    <path d="M20 20h8c1 0 2 1 2 2v6c0 1-1 2-2 2h-8c-1 0-2-1-2-2v-6c0-1 1-2 2-2" stroke="currentColor" stroke-width="1.5" stroke-linecap="round"/>
                                    @break
                                @case(9)
                                    <circle cx="24" cy="24" r="20" stroke="currentColor" stroke-width="1.5"/>
                                    <path d="M18 22h12v6H18v-6M24 18l2 2-2 2" stroke="currentColor" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round"/>
                                    @break
                            @endswitch
                        </svg>
                    </div>
                    
                    <h3 class="service-card-title">{{ $serviceTitle }}</h3>
                    
                    <p class="service-card-description">{{ \Illuminate\Support\Str::limit(strip_tags($serviceBody), 140) }}</p>
                    
                    <a href="{{ $serviceLink }}" class="service-card-link">
                        Learn more
                        <span class="link-arrow">→</span>
                    </a>
                </article>
            @endforeach
        </div>
    </div>
</section>

<section class="premium-why-section">
    <!-- Left: Image with floating stat card -->
    <div class="why-media-container">
        <div class="why-image-wrapper">
            <div class="why-bg-element"></div>
            <img src="{{ asset('site-assets/about-2.webp') }}" alt="RS Orange Tech team planning a premium web development project" class="why-image">
        </div>
        <div class="why-floating-card">
            <div class="floating-card-header">9+ Years</div>
            <div class="floating-card-text">Building digital experiences</div>
        </div>
    </div>

    <!-- Right: Content and features -->
    <div class="why-content-container">
        <div class="why-header">
            <p class="eyebrow">Why RS Orange Tech</p>
            <h2>One focused team. <span class="highlight-orange">Built around your growth.</span></h2>
            <p class="why-description">We combine strategy, design and engineering to build digital products that attract customers, convert leads and support long-term business growth.</p>
        </div>

        <!-- Feature rows -->
        <div class="why-features">
            <div class="why-feature-row">
                <div class="feature-number">01</div>
                <div class="feature-content">
                    <h3 class="feature-title">Discovery-led planning</h3>
                    <p class="feature-description">Clear goals, user journeys, SEO targets and technical requirements before development begins.</p>
                </div>
            </div>

            <div class="why-feature-row">
                <div class="feature-number">02</div>
                <div class="feature-content">
                    <h3 class="feature-title">Performance-first engineering</h3>
                    <p class="feature-description">Fast, responsive and scalable experiences built with clean architecture and modern technology.</p>
                </div>
            </div>

            <div class="why-feature-row">
                <div class="feature-number">03</div>
                <div class="feature-content">
                    <h3 class="feature-title">Long-term partnership</h3>
                    <p class="feature-description">Ongoing maintenance, security, optimization and improvements after launch.</p>
                </div>
            </div>
        </div>

        <!-- Tech indicators -->
        <div class="why-tech-indicators">
            <span class="tech-label">Built For</span>
            <div class="tech-pills">
                <span class="tech-pill">Web</span>
                <span class="tech-pill">E-commerce</span>
                <span class="tech-pill">Laravel</span>
                <span class="tech-pill">WordPress</span>
                <span class="tech-pill">Mobile</span>
                <span class="tech-pill">Cloud</span>
            </div>
        </div>

        <!-- CTA -->
        <div class="why-cta">
            <a href="{{ route('quote') }}" class="why-cta-link">
                Let's build something better
                <span class="cta-arrow">→</span>
            </a>
        </div>
    </div>
</section>

<section class="premium-process modern-process-section">
    <div class="process-container">
        <div class="process-header">
            <p class="eyebrow">Our Process</p>
            <h2>From idea to launch without guesswork.</h2>
            <p class="process-subtitle">A streamlined, transparent approach to bringing your digital vision to life.</p>
        </div>
        
        <div class="process-steps-wrapper">
            <div class="process-path-line"></div>
            <div class="process-grid-enhanced">
                <!-- Step 1 -->
                <article class="process-card-premium group">
                    <div class="process-card-inner">
                        <div class="process-icon-container">
                            <span class="process-step-number">01</span>
                            <div class="process-icon bg-orange-glow">
                                <svg width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><circle cx="11" cy="11" r="8"></circle><line x1="21" y1="21" x2="16.65" y2="16.65"></line></svg>
                            </div>
                        </div>
                        <h3 class="process-title">Discover</h3>
                        <p class="process-desc">We dive deep into your audience, competitors, and goals to map out core workflows and technical requirements.</p>
                        <div class="process-card-bg-number">1</div>
                    </div>
                </article>
                
                <!-- Step 2 -->
                <article class="process-card-premium group">
                    <div class="process-card-inner">
                        <div class="process-icon-container">
                            <span class="process-step-number">02</span>
                            <div class="process-icon bg-blue-glow">
                                <svg width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><path d="M12 19l7-7 3 3-7 7-3-3z"></path><path d="M18 13l-1.5-7.5L2 2l3.5 14.5L13 18l5-5z"></path><path d="M2 2l7.586 7.586"></path><circle cx="11" cy="11" r="2"></circle></svg>
                            </div>
                        </div>
                        <h3 class="process-title">Design</h3>
                        <p class="process-desc">We craft clean, conversion-focused wireframes and vibrant UI/UX layouts tailored for your target audience.</p>
                        <div class="process-card-bg-number">2</div>
                    </div>
                </article>
                
                <!-- Step 3 -->
                <article class="process-card-premium group">
                    <div class="process-card-inner">
                        <div class="process-icon-container">
                            <span class="process-step-number">03</span>
                            <div class="process-icon bg-green-glow">
                                <svg width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><polyline points="16 18 22 12 16 6"></polyline><polyline points="8 6 2 12 8 18"></polyline></svg>
                            </div>
                        </div>
                        <h3 class="process-title">Develop</h3>
                        <p class="process-desc">We build robust, secure, and scalable features using the most effective technology stack for your project.</p>
                        <div class="process-card-bg-number">3</div>
                    </div>
                </article>
                
                <!-- Step 4 -->
                <article class="process-card-premium group">
                    <div class="process-card-inner">
                        <div class="process-icon-container">
                            <span class="process-step-number">04</span>
                            <div class="process-icon bg-purple-glow">
                                <svg width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><path d="M13 2L3 14h9l-1 8 10-12h-9l1-8z"></path></svg>
                            </div>
                        </div>
                        <h3 class="process-title">Grow</h3>
                        <p class="process-desc">We continuously optimize for SEO, load performance, and user experience to ensure sustained business growth.</p>
                        <div class="process-card-bg-number">4</div>
                    </div>
                </article>
            </div>
        </div>
    </div>
</section>

<section class="tech-home premium-tech">
    <div class="tech-section-head">
        <p class="eyebrow">Technology Stack</p>
        <h2>Built with proven tools, not short-term shortcuts.</h2>
        <p>We choose technology around your business model, budget, timeline and future growth. Our team has expertise across modern frameworks, backend systems, databases, cloud platforms, AI/ML tools, mobile frameworks, CMS platforms, commerce systems, design tools and security solutions. Whether you need a simple website or a complex AI-powered application, we have the right stack for your project.</p>
        <a class="button primary" href="{{ route('technologies') }}">Explore Full Technology Guide</a>
    </div>
    <div class="tech-categories">
        <div class="tech-category">
            <h3>CMS & E-Commerce</h3>
            <div class="tech-grid">
                <span>Adobe Commerce Magento</span>
                <span>Shopify</span>
                <span>WooCommerce</span>
                <span>Joomla</span>
                <span>Drupal</span>
                <span>BigCommerce</span>
                <span>OpenCart</span>
                <span>Headless CMS</span>
            </div>
        </div>
        
        <div class="tech-category">
            <h3>Backend & Frameworks</h3>
            <div class="tech-grid">
                <span>Laravel</span>
                <span>Node.js</span>
                <span>PHP</span>
                <span>Django</span>
                <span>Flask</span>
                <span>Go</span>
                <span>Spring Boot</span>
                <span>Java</span>
            </div>
        </div>
        
        <div class="tech-category">
            <h3>Frontend & Frameworks</h3>
            <div class="tech-grid">
                <span>React.js</span>
                <span>Angular.js</span>
                <span>Next.js</span>
                <span>Nest.js</span>
                <span>JavaScript</span>
                <span>Bootstrap</span>
                <span>CSS</span>
                <span>Tailwind CSS</span>
            </div>
        </div>
        
        <div class="tech-category">
            <h3>Mobile Development</h3>
            <div class="tech-grid">
                <span>React Native</span>
                <span>Flutter</span>
                <span>Dart</span>
                <span>Swift</span>
                <span>Kotlin</span>
                <span>Native Android</span>
            </div>
        </div>
        
        <div class="tech-category">
            <h3>AI & Automation</h3>
            <div class="tech-grid">
                <span>Agentic AI</span>
                <span>OpenAI/GPT-4</span>
                <span>Claude API</span>
                <span>Hugging Face</span>
                <span>LangChain</span>
            </div>
        </div>
        
        <div class="tech-category">
            <h3>Cloud & DevOps</h3>
            <div class="tech-grid">
                <span>Docker</span>
                <span>Kubernetes</span>
                <span>AWS</span>
                <span>CI/CD Pipelines</span>
                <span>GitHub Actions</span>             
                <span>Cloudflare</span>
            </div>
        </div>
    </div>
</section>

<section class="live-portfolio-section" id="portfolio" aria-labelledby="portfolio-heading">
    <div class="live-portfolio-head">
        <p class="eyebrow">Portfolio</p>
        <h2 id="portfolio-heading">Featured <span>Projects</span></h2>
        <p>Real websites, SaaS platforms, education products and campaign pages crafted for better visibility, engagement and conversion.</p>
    </div>
    <div class="live-portfolio-wrap">
        <button class="live-portfolio-nav live-portfolio-prev" type="button" aria-label="Previous project" data-portfolio-prev>&lsaquo;</button>
        <div class="live-portfolio-track" data-portfolio-track>
        @foreach ($projects as $project)
            @php
                $projectImage = is_object($project) ? ($project->image ?? 'design.png') : ($project['image'] ?? 'design.png');
                $projectTitle = is_object($project) ? ($project->title ?? 'Project') : ($project['title'] ?? 'Project');
                $projectCategory = is_object($project) ? ($project->category ?? 'Case Study') : ($project['category'] ?? 'Case Study');
                $projectBody = is_object($project) ? ($project->excerpt ?? ($project->body ?? 'Project details coming soon.')) : ($project['excerpt'] ?? ($project['body'] ?? 'Project details coming soon.'));
                $projectSlug = is_object($project) && isset($project->slug) ? $project->slug : \Illuminate\Support\Str::slug($projectTitle);
                $projectUrl = route('portfolio.show', ['slug' => $projectSlug]);
                $projectTech = is_object($project) ? (explode(',', $project->tech_stack ?? '') ?: []) : ($project['tech'] ?? []);
            @endphp
            <article class="live-portfolio-card">
                <div class="live-portfolio-image">
                    <img src="{{ asset('site-assets/'.$projectImage) }}" alt="{{ $projectTitle }} project screenshot by RS Orange Tech">
                    <div class="corner-accents"></div>
                    @if ($projectTech)
                        <div class="tech-overlay">
                            <h3>Technologies Used</h3>
                            <div class="tech-tags">
                                @foreach (array_slice($projectTech, 0, 4) as $tech)
                                    <span>{{ trim($tech) }}</span>
                                @endforeach
                            </div>
                        </div>
                    @endif
                </div>
                <div class="live-portfolio-content">
                    <span>{{ $projectCategory }}</span>
                    <h3>{{ $projectTitle }}</h3>
                    <p>{{ $projectBody }}</p>
                    <a href="{{ $projectUrl }}">Explore Case Study <span aria-hidden="true">-&gt;</span></a>
                </div>
            </article>
        @endforeach
        </div>
        <button class="live-portfolio-nav live-portfolio-next" type="button" aria-label="Next project" data-portfolio-next>&rsaquo;</button>
    </div>
    <div style="text-align: center; margin-top: 40px;">
        <a class="button premium-ghost" href="{{ route('portfolio') }}">View All Portfolio <span aria-hidden="true">-&gt;</span></a>
    </div>
</section>

<section class="premium-faq" aria-labelledby="faq-heading">
    <div>
        <p class="eyebrow">FAQ</p>
        <h2 id="faq-heading">Questions businesses ask before starting.</h2>
    </div>
    <div class="faq-list">
        <article>
            <h3>Can you redesign an existing website?</h3>
            <p>Yes. We can audit your current website, improve structure, design, speed, SEO basics and conversion flow while preserving important content and URLs.</p>
        </article>
        <article>
            <h3>Do you build custom Laravel applications?</h3>
            <p>Yes. We build dashboards, portals, CRMs, booking tools, internal systems and customer-facing web applications with Laravel.</p>
        </article>
        <article>
            <h3>Will the website be SEO friendly?</h3>
            <p>Yes. We plan semantic content, meta tags, responsive layouts, performance improvements and crawl-friendly structure from the start.</p>
        </article>
    </div>
</section>

<section class="trusted-section">
    <div class="trusted-container">
        <h3>Trusted by 200+ Businesses Worldwide</h3>
        <div class="trusted-logos">
            <div class="logo-placeholder">KANTAR</div>
            <div class="logo-placeholder">UIBOX</div>
            <div class="logo-placeholder">TASTY</div>
            <div class="logo-placeholder">DigitalOcean</div>
            <div class="logo-placeholder">microlink</div>
        </div>
        <div class="trusted-stats">
            <div class="stat-item">
                <div class="stat-number">200+</div>
                <div class="stat-label">Happy Clients</div>
            </div>
            <div class="stat-item">
                <div class="stat-number">500+</div>
                <div class="stat-label">Projects Delivered</div>
            </div>
            <div class="stat-item">
                <div class="stat-number">9+</div>
                <div class="stat-label">Years Industry Exp.</div>
            </div>
            <div class="stat-item">
                <div class="stat-number">24/7</div>
                <div class="stat-label">Support</div>
            </div>
        </div>
    </div>
</section>

<section class="premium-cta">
    <div>
        <p class="eyebrow">Ready to Build?</p>
        <h2>Tell us what you want to launch next.</h2>
        <p>Share your idea, website issue or software requirement. We will help you define the right solution and a practical build plan.</p>
    </div>
    <a class="button primary" href="{{ route('quote') }}">Request a Quote</a>
</section>
@endsection
