@php
    $title = "Web & Software Development Company | RS Orange Tech";
    $description = "RS Orange Tech provides web, mobile, e-commerce, AI and custom software development for businesses and digital agencies. Partner with our experienced development team.";
    $keywords = "web development company, software development company, custom software development, web application development, mobile app development, e-commerce development, AI development, white-label development, agency development partner, dedicated development team";
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
            'description' => 'Premium on-demand technology and development partner for businesses, startups, and digital agencies.',
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
            'description' => 'Your On-Demand Technology Partner',
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
<!-- Hero Section -->
<section class="premium-hero">
    <div class="premium-hero-copy">
        <p class="eyebrow">Your On-Demand Technology Partner</p>
        <h1>Your On-Demand Technology Partner</h1>
        <p class="hero-subheadline">Web, Mobile, E-commerce, AI & Custom Software Development for Businesses and Digital Agencies.</p>
        <p class="hero-subtext">Need more development capacity? We work as your extended engineering team — white-label, flexible, and built around your workflow.</p>
        <div class="actions">
            <a class="button primary hero-button" href="{{ route('quote') }}">Start a Project <span aria-hidden="true">-&gt;</span></a>
            <a class="button premium-ghost hero-button" href="/agency-partners">Partner With Us <span aria-hidden="true">-&gt;</span></a>
        </div>
        <div class="hero-features" aria-label="Company capabilities">
            <div class="hero-feature-item">
                <div class="feature-icon">⚙️</div>
                <strong>Multi-Stack</strong>
                <span>Tailored Tech Stack</span>
            </div>
            <div class="hero-feature-item">
                <div class="feature-icon">🛡️</div>
                <strong>White-Label</strong>
                <span>Quiet Collaboration</span>
            </div>
            <div class="hero-feature-item">
                <div class="feature-icon">⚡</div>
                <strong>Flexible Scale</strong>
                <span>On-Demand Resource</span>
            </div>
            <div class="hero-feature-item">
                <div class="feature-icon">💬</div>
                <strong>Direct Support</strong>
                <span>Technical Oversight</span>
            </div>
        </div>
    </div>
    <div class="premium-hero-panel" aria-label="RS Orange Tech capabilities">
        <div class="hero-device-mockup">
            <div class="hero-orbit" aria-hidden="true"></div>
            <div class="hero-dotted hero-dotted-top" aria-hidden="true"></div>
            <div class="hero-dotted hero-dotted-bottom" aria-hidden="true"></div>
            <div class="hero-cube hero-cube-one" aria-hidden="true"></div>
            <div class="hero-cube hero-cube-two" aria-hidden="true"></div>
            <div class="hero-sphere" aria-hidden="true"></div>
            <div class="hero-paper-plane" aria-hidden="true"></div>
            
            <div class="floating-card floating-card-1">
                <div class="card-icon">
                    <svg width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><rect x="3" y="11" width="18" height="10" rx="2"></rect><circle cx="12" cy="5" r="2"></circle><path d="M12 7v4"></path></svg>
                </div>
                <span class="card-label">Custom Software</span>
                <p>Tailored systems built for your exact business workflows.</p>
            </div>

            <div class="floating-card floating-card-2">
                <div class="card-icon">
                    <svg width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><polyline points="16 18 22 12 16 6"></polyline><polyline points="8 6 2 12 8 18"></polyline></svg>
                </div>
                <span class="card-label">Extended Team</span>
                <p>Scale capacity dynamically behind your agency brand.</p>
            </div>

            <div class="floating-card floating-card-3">
                <div class="card-icon">
                    <svg width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><rect x="5" y="2" width="14" height="20" rx="2" ry="2"></rect><line x1="12" y1="18" x2="12.01" y2="18"></line></svg>
                </div>
                <span class="card-label">Mobile & Web</span>
                <p>Native apps and high-performance frontend interfaces.</p>
            </div>

            <div class="floating-card floating-card-4">
                <div class="card-icon">
                    <svg width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><circle cx="9" cy="21" r="1"></circle><circle cx="20" cy="21" r="1"></circle><path d="M1 1h4l2.68 13.39a2 2 0 0 0 2 1.61h9.72a2 2 0 0 0 2-1.61L23 6H6"></path></svg>
                </div>
                <span class="card-label">Enterprise Commerce</span>
                <p>Magento, Shopify, WooCommerce & headless stacks.</p>
            </div>

            <div class="device-screen">
                <div class="screen-content">
                    <div class="screen-header">You Bring the Project. We Build the Tech.</div>
                    <div class="screen-text">Reliable, white-label engineering partner for agency workflows.</div>
                    <div class="screen-button">Start a Project</div>
                </div>
            </div>
            <div class="hero-phone" aria-hidden="true">
                <div class="phone-notch"></div>
                <div class="phone-brand">RS</div>
                <h3>Extended Development Capacity</h3>
                <p>Professional engineering built around your workflow.</p>
                <span>Partner With Us</span>
                <div class="phone-tabs">
                    <i></i><i></i><i></i><i></i>
                </div>
            </div>
        </div>
    </div>
</section>

<!-- Trust / Credibility Section -->
<section class="trust-bar-section">
    <div class="trust-bar-container">
        <div class="trust-bar-intro">
            <h3>Built for Projects of Every Scale</h3>
            <p>From focused website builds to complex software platforms, our team adapts to the project's requirements, technology stack, and delivery model.</p>
        </div>
        <div class="trust-bar-stats">
            <div class="trust-stat-item">
                <div class="stat-num">500+</div>
                <div class="stat-lbl">Projects Delivered</div>
            </div>
            <div class="trust-stat-item">
                <div class="stat-num">200+</div>
                <div class="stat-lbl">Clients Worldwide</div>
            </div>
            <div class="trust-stat-item">
                <div class="stat-num">9+</div>
                <div class="stat-lbl">Years Industry Exp.</div>
            </div>
        </div>
    </div>
</section>

<!-- Agency Partnership Section -->
<section class="agency-partnership-section">
    <div class="agency-partnership-container">
        <div class="partnership-head">
            <p class="eyebrow">WHITE-LABEL SOLUTIONS</p>
            <h2>Your Clients. Your Brand. Our Development Team.</h2>
            <p class="partnership-sub">Scale your agency without expanding your in-house engineering team. RS Orange Tech works behind the scenes as your white-label development partner.</p>
        </div>
        
        <div class="partnership-grid">
            <div class="partnership-col you-handle-col">
                <div class="col-header">
                    <span class="col-icon">👥</span>
                    <h3>You Handle</h3>
                </div>
                <ul class="col-list">
                    <li><span>✓</span> Client relationships & account management</li>
                    <li><span>✓</span> Sales, proposals & pitches</li>
                    <li><span>✓</span> Strategy & discovery sessions</li>
                    <li><span>✓</span> Branding & creative guidelines</li>
                    <li><span>✓</span> UI/UX designs & assets</li>
                    <li><span>✓</span> Project management & deliverables</li>
                </ul>
            </div>
            
            <div class="partnership-col we-handle-col">
                <div class="col-header">
                    <span class="col-icon">💻</span>
                    <h3>We Handle</h3>
                </div>
                <ul class="col-list">
                    <li><span>✓</span> Frontend development (React, Next.js, HTML/CSS)</li>
                    <li><span>✓</span> Backend development (PHP, Laravel, Node.js)</li>
                    <li><span>✓</span> Custom APIs & headless development</li>
                    <li><span>✓</span> Database design & queries (MySQL, Postgres)</li>
                    <li><span>✓</span> Third-party system integrations</li>
                    <li><span>✓</span> E-commerce builds (Shopify, Magento, WooCommerce)</li>
                    <li><span>✓</span> AI integrations & smart workflows</li>
                    <li><span>✓</span> Quality assurance & cross-device testing</li>
                    <li><span>✓</span> Server setup, deployment & maintenance</li>
                </ul>
            </div>
        </div>

        <div class="partnership-action">
            <a class="button primary" href="/agency-partners">Become a Development Partner <span aria-hidden="true">→</span></a>
            <p class="action-note">NDA and white-label collaboration available.</p>
        </div>
    </div>
</section>

<!-- Services Section -->
<section class="home-services-section">
    <div class="home-services-container">
        <div class="home-services-header">
            <p class="eyebrow">SERVICES</p>
            <h2>Technology Services That Scale With Your Needs</h2>
            <p class="services-subtitle">From simple templates to custom enterprise builds, we support agencies and businesses with reliable engineering.</p>
        </div>

        <div class="home-services-grid">
            @php
                $definedServices = [
                    [
                        'title' => 'Web Development',
                        'desc' => 'Business websites, web applications, portals and custom platforms.',
                        'slug' => 'web-development'
                    ],
                    [
                        'title' => 'E-commerce',
                        'desc' => 'WooCommerce, Shopify, Magento/Adobe Commerce and custom commerce solutions.',
                        'slug' => 'ecommerce-development'
                    ],
                    [
                        'title' => 'Custom Software',
                        'desc' => 'Business applications, SaaS platforms, dashboards, portals and workflow systems.',
                        'slug' => 'custom-software-development'
                    ],
                    [
                        'title' => 'Mobile App Development',
                        'desc' => 'Cross-platform and native mobile applications.',
                        'slug' => 'mobile-app-development'
                    ],
                    [
                        'title' => 'AI Development',
                        'desc' => 'AI integrations, AI-powered applications, automation, chatbots and intelligent workflows.',
                        'slug' => 'ai-automation'
                    ],
                    [
                        'title' => 'API & System Integration',
                        'desc' => 'Payment gateways, third-party APIs, CRM, ERP, communication platforms and custom integrations.',
                        'slug' => 'api-integration'
                    ],
                    [
                        'title' => 'UI/UX & Frontend',
                        'desc' => 'Modern responsive interfaces and frontend development.',
                        'slug' => 'ui-ux-design'
                    ],
                    [
                        'title' => 'Maintenance & Support',
                        'desc' => 'Bug fixing, optimization, upgrades, monitoring and ongoing development.',
                        'slug' => 'website-maintenance'
                    ]
                ];
            @endphp
            @foreach ($definedServices as $index => $item)
                @php
                    $serviceNumber = str_pad($index + 1, 2, '0', STR_PAD_LEFT);
                    // Match with database slug where possible
                    $dbService = $services->first(function($s) use ($item) {
                        $sTitle = is_object($s) ? $s->title : ($s['title'] ?? '');
                        $sSlug = is_object($s) ? $s->slug : ($s['slug'] ?? '');
                        return stripos($sTitle, $item['title']) !== false || stripos($sSlug, $item['slug']) !== false;
                    });
                    $serviceLink = $dbService 
                        ? (is_object($dbService) ? route('pages.show', trim($dbService->slug, '/')) : route('services'))
                        : route('services');
                @endphp
                <article class="home-service-card" data-service-number="{{ $serviceNumber }}">
                    <div class="service-card-badge">{{ $serviceNumber }}</div>
                    
                    <div class="service-card-icon">
                        <svg class="service-icon-svg" viewBox="0 0 48 48" fill="none">
                            <circle cx="24" cy="24" r="20" stroke="currentColor" stroke-width="1.5"/>
                            @switch($index)
                                @case(0)
                                    <path d="M16 18h16v12H16V18zm0 16h16" stroke="currentColor" stroke-width="1.5" stroke-linecap="round"/>
                                    @break
                                @case(1)
                                    <path d="M14 16h6l4 16h10l3-10H18" stroke="currentColor" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round"/>
                                    @break
                                @case(2)
                                    <path d="M18 16h12m-12 6h12M18 28h8" stroke="currentColor" stroke-width="1.5" stroke-linecap="round"/>
                                    @break
                                @case(3)
                                    <rect x="18" y="14" width="12" height="20" rx="2" stroke="currentColor" stroke-width="1.5"/>
                                    <circle cx="24" cy="30" r="1" fill="currentColor"/>
                                    @break
                                @case(4)
                                    <path d="M24 16v16M16 24h16M20 20l8 8m-8 0l8-8" stroke="currentColor" stroke-width="1.5" stroke-linecap="round"/>
                                    @break
                                @case(5)
                                    <path d="M16 20h8v8h-8v-8zm16 0h-4v8h4v-8zm-8 4h4" stroke="currentColor" stroke-width="1.5" stroke-linecap="round"/>
                                    @break
                                @case(6)
                                    <path d="M16 18h16v8H16v-8zm8 8v4" stroke="currentColor" stroke-width="1.5" stroke-linecap="round"/>
                                    @break
                                @case(7)
                                    <path d="M24 14v8m0 8v2M16 24h16" stroke="currentColor" stroke-width="1.5" stroke-linecap="round"/>
                                    @break
                            @endswitch
                        </svg>
                    </div>
                    
                    <h3 class="service-card-title">{{ $item['title'] }}</h3>
                    <p class="service-card-description">{{ $item['desc'] }}</p>
                    
                    <a href="{{ $serviceLink }}" class="service-card-link">
                        Learn more
                        <span class="link-arrow">→</span>
                    </a>
                </article>
            @endforeach
        </div>
    </div>
</section>

<!-- Technology Positioning Grid -->
<section class="tech-home premium-tech">
    <div class="tech-section-head">
        <p class="eyebrow">COMPATIBILITY</p>
        <h2>We Work With Your Technology Stack</h2>
        <p>You don't need to change your technology to work with us. Our engineering team can adapt to your existing stack or recommend the right technology for a new project.</p>
        <a class="button primary" href="{{ route('technologies') }}">Explore Full Technology Guide</a>
    </div>
    <div class="tech-categories">
        <div class="tech-category">
            <h3>Frontend</h3>
            <div class="tech-grid">
                <span>React</span>
                <span>Next.js</span>
                <span>Angular</span>
                <span>Vue</span>
                <span>JavaScript</span>
                <span>Tailwind CSS</span>
            </div>
        </div>
        
        <div class="tech-category">
            <h3>Backend</h3>
            <div class="tech-grid">
                <span>PHP</span>
                <span>Laravel</span>
                <span>Node.js</span>
                <span>Python</span>
                <span>Java</span>
                <span>.NET</span>
            </div>
        </div>
        
        <div class="tech-category">
            <h3>Mobile</h3>
            <div class="tech-grid">
                <span>Flutter</span>
                <span>React Native</span>
                <span>Kotlin</span>
                <span>Swift</span>
            </div>
        </div>
        
        <div class="tech-category">
            <h3>E-commerce</h3>
            <div class="tech-grid">
                <span>WooCommerce</span>
                <span>Shopify</span>
                <span>Magento / Adobe Commerce</span>
            </div>
        </div>
        
        <div class="tech-category">
            <h3>AI Technologies</h3>
            <div class="tech-grid">
                <span>OpenAI API</span>
                <span>Claude API</span>
                <span>Gemini API</span>
                <span>LangChain</span>
            </div>
        </div>
        
        <div class="tech-category">
            <h3>Cloud & DevOps</h3>
            <div class="tech-grid">
                <span>AWS</span>
                <span>Docker</span>
                <span>Kubernetes</span>
                <span>Cloudflare</span>
            </div>
        </div>
    </div>
</section>

<!-- Why RS Orange Tech -->
<section class="why-us-grid-section">
    <div class="why-us-grid-container">
        <div class="why-us-grid-head">
            <p class="eyebrow">PARTNERSHIP BENEFITS</p>
            <h2>Why Agencies and Businesses Partner With Us</h2>
        </div>
        <div class="why-us-cards">
            <!-- Card 1 -->
            <div class="why-us-card">
                <div class="why-card-icon">⚡</div>
                <h3>Flexible Development Capacity</h3>
                <p>Add development resources when your internal team needs additional capacity.</p>
            </div>
            <!-- Card 2 -->
            <div class="why-us-card">
                <div class="why-card-icon">⚙️</div>
                <h3>Multi-Stack Engineering</h3>
                <p>Work with the technology stack your project actually requires.</p>
            </div>
            <!-- Card 3 -->
            <div class="why-us-card">
                <div class="why-card-icon">🛡️</div>
                <h3>White-Label Delivery</h3>
                <p>We can work behind your agency's brand when the engagement requires it.</p>
            </div>
            <!-- Card 4 -->
            <div class="why-us-card">
                <div class="why-card-icon">🧠</div>
                <h3>AI-Assisted Development</h3>
                <p>Experienced engineers use modern AI development tools to accelerate research, coding, testing and delivery while maintaining engineering oversight.</p>
            </div>
            <!-- Card 5 -->
            <div class="why-us-card">
                <div class="why-card-icon">💼</div>
                <h3>Flexible Engagement</h3>
                <p>Project-based development, dedicated developers, dedicated teams or ongoing retainers.</p>
            </div>
            <!-- Card 6 -->
            <div class="why-us-card">
                <div class="why-card-icon">🤝</div>
                <h3>Long-Term Support</h3>
                <p>Continue working with the same technical partner after launch.</p>
            </div>
        </div>
    </div>
</section>

<!-- Selected Work (Portfolio) -->
<section class="live-portfolio-section" id="portfolio" aria-labelledby="portfolio-heading">
    <div class="live-portfolio-head">
        <p class="eyebrow">SELECTED WORK</p>
        <h2 id="portfolio-heading">Featured Engineering Projects</h2>
        <p>A selection of websites, platforms, applications and digital products delivered by RS Orange Tech.</p>
    </div>
    <div class="live-portfolio-wrap">
        <button class="live-portfolio-nav live-portfolio-prev" type="button" aria-label="Previous project" data-portfolio-prev>&lsaquo;</button>
        <div class="live-portfolio-track" data-portfolio-track>
        @foreach ($projects->take(6) as $project)
            @php
                $projectImage = is_object($project) ? ($project->image ?? 'design.png') : ($project['image'] ?? 'design.png');
                $projectTitle = is_object($project) ? ($project->title ?? 'Project') : ($project['title'] ?? 'Project');
                $projectCategory = is_object($project) ? ($project->category ?? 'Case Study') : ($project['category'] ?? 'Case Study');
                $projectBody = is_object($project) ? ($project->excerpt ?? ($project->body ?? 'Project details coming soon.')) : ($project['excerpt'] ?? ($project['body'] ?? 'Project details coming soon.'));
                $projectSlug = is_object($project) && isset($project->slug) ? $project->slug : \Illuminate\Support\Str::slug($projectTitle);
                $projectUrl = route('portfolio.show', ['slug' => $projectSlug]);
                $projectTech = is_object($project) ? (explode(',', $project->tech_stack ?? '') ?: []) : ($project['tech'] ?? []);
                
                // Determine a clean project type based on tech/title
                $projectType = 'Custom Build';
                $techStr = implode(' ', $projectTech);
                if (stripos($techStr, 'Laravel') !== false || stripos($projectTitle, 'WaBizFlow') !== false || stripos($projectTitle, 'VidyaPilot') !== false) {
                    $projectType = 'Laravel Application';
                } elseif (stripos($techStr, 'WordPress') !== false) {
                    $projectType = 'WordPress Site';
                } elseif (stripos($techStr, 'Shopify') !== false) {
                    $projectType = 'E-commerce Store';
                }
            @endphp
            <article class="live-portfolio-card">
                <div class="live-portfolio-image">
                    <img src="{{ asset('site-assets/'.$projectImage) }}" alt="{{ $projectTitle }} screenshot by RS Orange Tech">
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
                    <div class="project-meta-row">
                        <span class="project-tag">{{ $projectCategory }}</span>
                        <span class="project-type">{{ $projectType }}</span>
                    </div>
                    <h3>{{ $projectTitle }}</h3>
                    <p>{{ \Illuminate\Support\Str::limit(strip_tags($projectBody), 140) }}</p>
                    <a href="{{ $projectUrl }}">Explore Case Study <span aria-hidden="true">-&gt;</span></a>
                </div>
            </article>
        @endforeach
        </div>
        <button class="live-portfolio-nav live-portfolio-next" type="button" aria-label="Next project" data-portfolio-next>&rsaquo;</button>
    </div>
    <div style="text-align: center; margin-top: 40px;">
        <a class="button premium-ghost" href="{{ route('portfolio') }}">View All Projects <span aria-hidden="true">→</span></a>
    </div>
</section>

<!-- Development Engagement Models -->
<section class="engagement-models-section">
    <div class="engagement-models-container">
        <div class="engagement-head">
            <p class="eyebrow">ENGAGEMENT MODELS</p>
            <h2>Choose How You Work With Us</h2>
        </div>
        <div class="engagement-grid">
            <!-- Card 1 -->
            <div class="engagement-card">
                <h3>Project-Based</h3>
                <p class="engagement-desc">Best for clearly defined projects and fixed scopes.</p>
            </div>
            <!-- Card 2 -->
            <div class="engagement-card">
                <h3>Dedicated Developer</h3>
                <p class="engagement-desc">Add an experienced developer to your existing team.</p>
            </div>
            <!-- Card 3 -->
            <div class="engagement-card">
                <h3>Dedicated Team</h3>
                <p class="engagement-desc">Use a complete development team for larger projects.</p>
            </div>
            <!-- Card 4 -->
            <div class="engagement-card">
                <h3>Monthly Partnership</h3>
                <p class="engagement-desc">Ongoing development, maintenance and technical support.</p>
            </div>
        </div>
        <div class="engagement-action">
            <a class="button primary" href="{{ route('quote') }}">Discuss Your Requirements <span aria-hidden="true">→</span></a>
        </div>
    </div>
</section>

<!-- Development Process -->
<section class="premium-process modern-process-section">
    <div class="process-container">
        <div class="process-header">
            <p class="eyebrow">Our Process</p>
            <h2>From Idea to Launch Without Guesswork</h2>
            <p class="process-subtitle">A structured, collaborative approach to delivering quality software engineering.</p>
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
                        <p class="process-desc">Understand requirements, goals, users and technical constraints.</p>
                        <div class="process-card-bg-number">1</div>
                    </div>
                </article>
                
                <!-- Step 2 -->
                <article class="process-card-premium group">
                    <div class="process-card-inner">
                        <div class="process-icon-container">
                            <span class="process-step-number">02</span>
                            <div class="process-icon bg-blue-glow">
                                <svg width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><path d="M12 19l7-7 3 3-7 7-3-3z"></path><path d="M18 13l-1.5-7.5L2 2l3.5 14.5L13 18l5-5z"></path></svg>
                            </div>
                        </div>
                        <h3 class="process-title">Plan</h3>
                        <p class="process-desc">Define architecture, technology, scope and delivery milestones.</p>
                        <div class="process-card-bg-number">2</div>
                    </div>
                </article>
                
                <!-- Step 3 -->
                <article class="process-card-premium group">
                    <div class="process-card-inner">
                        <div class="process-icon-container">
                            <span class="process-step-number">03</span>
                            <div class="process-icon bg-green-glow">
                                <svg width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><circle cx="12" cy="12" r="10"></circle><path d="M12 8v8l4 2"></path></svg>
                            </div>
                        </div>
                        <h3 class="process-title">Design</h3>
                        <p class="process-desc">Create the user experience and interface where required.</p>
                        <div class="process-card-bg-number">3</div>
                    </div>
                </article>
                
                <!-- Step 4 -->
                <article class="process-card-premium group">
                    <div class="process-card-inner">
                        <div class="process-icon-container">
                            <span class="process-step-number">04</span>
                            <div class="process-icon bg-purple-glow">
                                <svg width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><polyline points="16 18 22 12 16 6"></polyline><polyline points="8 6 2 12 8 18"></polyline></svg>
                            </div>
                        </div>
                        <h3 class="process-title">Develop</h3>
                        <p class="process-desc">Build frontend, backend, APIs and integrations.</p>
                        <div class="process-card-bg-number">4</div>
                    </div>
                </article>

                <!-- Step 5 -->
                <article class="process-card-premium group">
                    <div class="process-card-inner">
                        <div class="process-icon-container">
                            <span class="process-step-number">05</span>
                            <div class="process-icon bg-red-glow">
                                <svg width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><path d="M22 11.08V12a10 10 0 1 1-5.93-9.14"></path><polyline points="22 4 12 14.01 9 11.01"></polyline></svg>
                            </div>
                        </div>
                        <h3 class="process-title">Test</h3>
                        <p class="process-desc">QA, security checks, performance testing and cross-device testing.</p>
                        <div class="process-card-bg-number">5</div>
                    </div>
                </article>

                <!-- Step 6 -->
                <article class="process-card-premium group">
                    <div class="process-card-inner">
                        <div class="process-icon-container">
                            <span class="process-step-number">06</span>
                            <div class="process-icon bg-gold-glow">
                                <svg width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><path d="M12 2L2 7l10 5 10-5-10-5zM2 17l10 5 10-5M2 12l10 5 10-5"></path></svg>
                            </div>
                        </div>
                        <h3 class="process-title">Launch</h3>
                        <p class="process-desc">Deployment, monitoring and ongoing support.</p>
                        <div class="process-card-bg-number">6</div>
                    </div>
                </article>
            </div>
        </div>
    </div>
</section>

<!-- AI-Assisted Development Section -->
<section class="ai-development-block">
    <div class="ai-development-container">
        <div class="ai-block-copy">
            <p class="eyebrow">MODERN ENGINEERING</p>
            <h2>Modern Engineering. Human Oversight.</h2>
            <p>Our engineers use modern AI-assisted development tools to accelerate research, coding, debugging, testing and documentation — while architecture, security, quality and final decisions remain under experienced engineering oversight.</p>
        </div>
        <div class="ai-block-badge" aria-hidden="true">
            <div class="ai-badge-circle">
                <span>AI</span>
                <div class="ai-badge-orbit"></div>
            </div>
        </div>
    </div>
</section>

<!-- FAQ Section -->
<section class="premium-faq" aria-labelledby="faq-heading">
    <div>
        <p class="eyebrow">FAQ</p>
        <h2 id="faq-heading">Questions businesses ask before starting.</h2>
    </div>
    <div class="faq-list">
        <article>
            <h3>Can you act as a white-label partner?</h3>
            <p>Yes. We regularly work behind agency partners under NDA. Your clients remain yours, and our team functions quietly as your backend technical team.</p>
        </article>
        <article>
            <h3>Do you build custom Laravel applications?</h3>
            <p>Yes. We build dashboards, portals, CRMs, booking tools, internal systems and customer-facing web applications with Laravel.</p>
        </article>
        <article>
            <h3>How do you handle project management?</h3>
            <p>We adapt to your team's workflow. We can integrate with your Slack, Jira, Trello, or Basecamp workspace, or report directly to your project managers.</p>
        </article>
    </div>
</section>

<!-- Final conversion CTA -->
<section class="premium-cta">
    <div>
        <p class="eyebrow">Ready to Build?</p>
        <h2>Have a Project in Mind? Let's Build It.</h2>
        <p>Whether you need a complete development team, additional engineering capacity, or a technical partner for your next project, RS Orange Tech can help.</p>
    </div>
    <div class="cta-actions">
        <a class="button primary" href="{{ route('quote') }}">Start a Project</a>
        <a class="button premium-ghost" href="/agency-partners">Partner With Us</a>
    </div>
</section>
@endsection
