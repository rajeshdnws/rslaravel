@php
    $title = "Agency Development Partner | White-Label Web Development | RS Orange Tech";
    $description = "RS Orange Tech provides white-label web, software, e-commerce, mobile and AI development for digital agencies. Extend your team without hiring more developers.";
    $keywords = "agency development partner, white-label web development, white-label development company, development partner for agencies, outsourced web development for agencies, agency development services, dedicated development team, software development partner, web development outsourcing";
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
            '@type' => 'WebPage',
            '@id' => route('agency-partners') . '#webpage',
            'url' => route('agency-partners'),
            'name' => 'Agency Development Partner & White-Label Web Development',
            'isPartOf' => [
                '@type' => 'WebSite',
                '@id' => route('home') . '#website',
                'url' => route('home'),
                'name' => 'RS Orange Tech'
            ],
            'description' => 'White-label web, mobile, e-commerce and AI development partners for digital agencies and SaaS platforms.'
        ]
    ]
], JSON_UNESCAPED_SLASHES | JSON_PRETTY_PRINT) !!}
</script>
<style>
    html {
        scroll-behavior: smooth;
    }
</style>
@endpush

@section('content')
<!-- Section 1: Hero Section -->
<section class="agency-hero">
    <div class="agency-hero-copy">
        <p class="eyebrow">Your On-Demand Development Partner</p>
        <h1>Your Development Team Behind the Scenes</h1>
        <p class="hero-subheadline">White-Label Web & Software Development for Digital Agencies</p>
        <p class="hero-description">Scale your agency without expanding your in-house engineering team. RS Orange Tech provides flexible development support for websites, web applications, e-commerce, mobile apps, AI solutions and custom software.</p>
        
        <div class="actions">
            <a class="button primary hero-button" href="#partnership-form">Become a Partner</a>
            <a class="button premium-ghost hero-button" href="#partnership-form">Discuss a Project</a>
        </div>
        
        <p class="trust-bullets">
            <span>• Flexible engagement</span>
            <span>• White-label collaboration</span>
            <span>• NDA-friendly</span>
            <span>• Long-term partnerships</span>
        </p>
    </div>

    <!-- Section 2: Hero Visual (Agency -> RS -> Client Pipeline) -->
    <div class="agency-hero-visual">
        <div class="pipeline-card">
            <div class="pipeline-step step-agency">
                <span class="step-icon">🏢</span>
                <h4>Your Agency</h4>
                <p>Strategy / Design / Account Management</p>
            </div>
            
            <div class="pipeline-connector">
                <span class="connector-arrow">➔</span>
                <span class="connector-label">White-Label</span>
            </div>

            <div class="pipeline-step step-rs">
                <span class="step-icon">⚙️</span>
                <h4>RS Orange Tech</h4>
                <p>Engineering / QA / Deployment / Support</p>
            </div>

            <div class="pipeline-connector">
                <span class="connector-arrow">➔</span>
                <span class="connector-label">Delivery</span>
            </div>

            <div class="pipeline-step step-client">
                <span class="step-icon">👤</span>
                <h4>Your Client</h4>
                <p>Final Scale & High-Performance Product</p>
            </div>
        </div>
    </div>
</section>

<!-- Section 3: The Core Message -->
<section class="core-message-section">
    <div class="core-message-container">
        <div class="section-head text-center">
            <p class="eyebrow">HOW WE WORK</p>
            <h2>You Sell. We Build. You Stay in Control.</h2>
            <p class="section-subtext">Your agency doesn't need to hire another developer every time a new project arrives. RS Orange Tech can work as an extension of your existing team, providing the technical expertise needed to deliver projects on time and under your brand.</p>
        </div>

        <div class="core-message-grid">
            <div class="core-card">
                <div class="core-card-num">01</div>
                <h3>You Bring the Business</h3>
                <p>Your agency handles sales, client relationships, strategy, branding, project management, and design asset creation.</p>
            </div>
            
            <div class="core-card">
                <div class="core-card-num">02</div>
                <h3>We Handle the Technology</h3>
                <p>RS Orange Tech handles frontend & backend development, APIs, database engineering, e-commerce, AI integrations, QA, and deployment.</p>
            </div>

            <div class="core-card">
                <div class="core-card-num">03</div>
                <h3>You Deliver the Project</h3>
                <p>Your agency maintains full client ownership, communication, brand relationship, project direction, and long-term client value.</p>
            </div>
        </div>
    </div>
</section>

<!-- Section 4: Why Agencies Partner With Us -->
<section class="why-agencies-section">
    <div class="why-agencies-container">
        <div class="section-head text-center">
            <p class="eyebrow">PARTNERSHIP BENEFITS</p>
            <h2>Expand Your Delivery Capacity Without Expanding Your Payroll</h2>
        </div>

        <div class="why-agencies-grid">
            <div class="benefit-card">
                <div class="benefit-icon">📈</div>
                <h3>Take on More Projects</h3>
                <p>Accept new technical projects even when your internal development team is fully at capacity or when you lack in-house resources.</p>
            </div>

            <div class="benefit-card">
                <div class="benefit-icon">👥</div>
                <h3>Access Experienced Developers</h3>
                <p>Get immediate, qualified engineers without going through a long, expensive, and risky hiring process.</p>
            </div>

            <div class="benefit-card">
                <div class="benefit-icon">🛠️</div>
                <h3>Work With Your Existing Stack</h3>
                <p>You don't have to adjust your client's needs. We adapt to the exact technology stack required by your specific project briefs.</p>
            </div>

            <div class="benefit-card">
                <div class="benefit-icon">🔒</div>
                <h3>White-Label Collaboration</h3>
                <p>We work behind the scenes. No direct client contact or public portfolio claims, keeping your brand front and center.</p>
            </div>

            <div class="benefit-card">
                <div class="benefit-icon">💼</div>
                <h3>Flexible Engagement</h3>
                <p>Use our team for single project scopes, add a dedicated developer to your team, or secure ongoing technical retainers.</p>
            </div>

            <div class="benefit-card">
                <div class="benefit-icon">🤝</div>
                <h3>Long-Term Technical Support</h3>
                <p>Enjoy stable continuity. We support you with maintenance, bug fixing, upgrades, and future feature launches.</p>
            </div>
        </div>
    </div>
</section>

<!-- Section 5: Services For Agencies -->
<section class="agency-services-section">
    <div class="agency-services-container">
        <div class="section-head text-center">
            <p class="eyebrow">SERVICES</p>
            <h2>Development Services Your Agency Can Outsource to Us</h2>
            <p class="section-subtext">Outsource specific development components or complete end-to-end engineering tasks.</p>
        </div>

        <div class="agency-services-grid">
            <div class="as-card">
                <h3>Web Development</h3>
                <ul>
                    <li>Business websites & landing pages</li>
                    <li>SaaS platforms & portals</li>
                    <li>Custom client dashboards</li>
                    <li>Admin back-offices & workflows</li>
                </ul>
            </div>

            <div class="as-card">
                <h3>E-commerce</h3>
                <ul>
                    <li>WooCommerce & WordPress e-shops</li>
                    <li>Shopify customizations & APIs</li>
                    <li>Magento / Adobe Commerce platforms</li>
                    <li>Custom multi-gateway checkouts</li>
                </ul>
            </div>

            <div class="as-card">
                <h3>Custom Software</h3>
                <ul>
                    <li>Business workflow software</li>
                    <li>CRM & ERP configurations</li>
                    <li>Internal business tools</li>
                    <li>Database migrations & scripts</li>
                </ul>
            </div>

            <div class="as-card">
                <h3>Mobile Development</h3>
                <ul>
                    <li>iOS & Android native apps</li>
                    <li>Flutter cross-platform apps</li>
                    <li>React Native mobile applications</li>
                    <li>REST API-connected app builds</li>
                </ul>
            </div>

            <div class="as-card">
                <h3>AI Development</h3>
                <ul>
                    <li>LLM integrations (OpenAI, Claude, Gemini)</li>
                    <li>Smart AI chatbots & virtual assistants</li>
                    <li>Workflows & data automation tools</li>
                    <li>Vector database & search setups</li>
                </ul>
            </div>

            <div class="as-card">
                <h3>API & Integrations</h3>
                <ul>
                    <li>Custom API integrations & middleware</li>
                    <li>CRM, ERP, and payment connections</li>
                    <li>Headless CMS connectors</li>
                    <li>Automated webhooks & synchronization</li>
                </ul>
            </div>

            <div class="as-card">
                <h3>Maintenance & Support</h3>
                <ul>
                    <li>Emergency bug fixing & security updates</li>
                    <li>Performance caching & speed audits</li>
                    <li>Server monitoring & platform updates</li>
                    <li>Retainer-based ongoing updates</li>
                </ul>
            </div>
        </div>
    </div>
</section>

<!-- Section 6: Technology Flexibility -->
<section class="tech-home premium-tech">
    <div class="tech-section-head">
        <p class="eyebrow">COMPATIBILITY</p>
        <h2>We Work With Your Technology Stack</h2>
        <p>Already have a project specification or an existing codebase? That's fine. Our engineers can work with your existing technology stack instead of forcing you into a specific platform.</p>
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
                <span>HTML/CSS/JavaScript</span>
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
                <span>Magento</span>
                <span>Adobe Commerce</span>
            </div>
        </div>
        
        <div class="tech-category">
            <h3>AI</h3>
            <div class="tech-grid">
                <span>OpenAI</span>
                <span>Claude</span>
                <span>Gemini</span>
                <span>LangChain</span>
            </div>
        </div>
        
        <div class="tech-category">
            <h3>Cloud / DevOps</h3>
            <div class="tech-grid">
                <span>AWS</span>
                <span>Docker</span>
                <span>Kubernetes</span>
                <span>Cloudflare</span>
            </div>
        </div>
    </div>
</section>

<!-- Section 7: Our AI-Assisted Development Approach -->
<section class="ai-development-block">
    <div class="ai-development-container">
        <div class="ai-block-copy">
            <p class="eyebrow">MODERN DEVELOPMENT</p>
            <h2>Modern Development. Human Engineering.</h2>
            <p>Our engineers use modern AI-assisted development tools to accelerate research, coding, debugging, testing and documentation. AI helps our team move faster, while architecture, security, code quality and final engineering decisions remain under experienced human oversight.</p>
        </div>
        <div class="ai-block-badge" aria-hidden="true">
            <div class="ai-badge-circle">
                <span>AI</span>
                <div class="ai-badge-orbit"></div>
            </div>
        </div>
    </div>
</section>

<!-- Section 8: How the Partnership Works -->
<section class="partnership-timeline-section">
    <div class="partnership-timeline-container">
        <div class="section-head text-center">
            <p class="eyebrow">ROADMAP</p>
            <h2>How the Partnership Works</h2>
            <p class="section-subtext">A simple, transparent onboarding workflow from intake to release.</p>
        </div>

        <div class="timeline-wrapper">
            <div class="timeline-line" aria-hidden="true"></div>
            <div class="timeline-steps">
                <div class="timeline-step-item">
                    <span class="step-num">01</span>
                    <h4>Share Requirements</h4>
                    <p>Send project scope, designs (Figma), spec sheets, or requirements.</p>
                </div>
                <div class="timeline-step-item">
                    <span class="step-num">02</span>
                    <h4>Technical Review</h4>
                    <p>Our engineering team evaluates complexity, stack, and delivery schedule.</p>
                </div>
                <div class="timeline-step-item">
                    <span class="step-num">03</span>
                    <h4>Scope & Plan</h4>
                    <p>We align on milestones, developers, delivery dates, and expectations.</p>
                </div>
                <div class="timeline-step-item">
                    <span class="step-num">04</span>
                    <h4>Develop & QA</h4>
                    <p>We build, code, perform code-reviews, and test cross-device functionality.</p>
                </div>
                <div class="timeline-step-item">
                    <span class="step-num">05</span>
                    <h4>Deploy & Deliver</h4>
                    <p>You review the build and deliver the final product to your client.</p>
                </div>
            </div>
        </div>
    </div>
</section>

<!-- Section 9: Engagement Models -->
<section class="engagement-models-section">
    <div class="engagement-models-container">
        <div class="section-head text-center">
            <p class="eyebrow">ENGAGEMENT MODELS</p>
            <h2>Choose the Partnership Model That Fits Your Agency</h2>
        </div>

        <div class="engagement-grid">
            <div class="engagement-card">
                <h3>Project-Based</h3>
                <p class="model-badge">Fixed Scope</p>
                <p class="engagement-desc">Best for fixed-scope builds, landing pages, website migrations, and e-commerce setups with clear deliverables.</p>
                <a class="button premium-ghost font-sm" href="#partnership-form">Discuss a Project</a>
            </div>

            <div class="engagement-card">
                <h3>Dedicated Developer</h3>
                <p class="model-badge">Hourly / Month</p>
                <p class="engagement-desc">Add an experienced PHP, Laravel, React or Shopify developer directly to your Slack/Jira team for capacity overflow.</p>
                <a class="button premium-ghost font-sm" href="#partnership-form">Request Developer</a>
            </div>

            <div class="engagement-card">
                <h3>Dedicated Team</h3>
                <p class="model-badge">Full Engineering</p>
                <p class="engagement-desc">Deploy a cross-functional development team comprising frontend, backend, QA, and DevOps specialists.</p>
                <a class="button premium-ghost font-sm" href="#partnership-form">Build a Team</a>
            </div>

            <div class="engagement-card">
                <h3>Ongoing Retainer</h3>
                <p class="model-badge">Monthly Maintenance</p>
                <p class="engagement-desc">Get ongoing development retainers for legacy application updates, monthly bug checks, and SEO updates.</p>
                <a class="button premium-ghost font-sm" href="#partnership-form">Become a Partner</a>
            </div>
        </div>
    </div>
</section>

<!-- Section 10: White-Label Workflow -->
<section class="white-label-workflow-section">
    <div class="wl-workflow-container">
        <div class="section-head text-center">
            <p class="eyebrow">BEHIND THE SCENES</p>
            <h2>Your Brand. Your Client. Your Relationship.</h2>
            <p class="section-subtext">We operate as a quiet, behind-the-scenes technical team. All communication, deliverables, and platforms remain securely under your banner.</p>
        </div>

        <div class="workflow-flow-diagram">
            <div class="flow-step">
                <span class="flow-num">1</span>
                <p>Agency receives the client request</p>
            </div>
            <div class="flow-connector" aria-hidden="true">➔</div>
            <div class="flow-step">
                <span class="flow-num">2</span>
                <p>Agency sends technical specs to us</p>
            </div>
            <div class="flow-connector" aria-hidden="true">➔</div>
            <div class="flow-step">
                <span class="flow-num">3</span>
                <p>RS Orange Tech handles the engineering</p>
            </div>
            <div class="flow-connector" aria-hidden="true">➔</div>
            <div class="flow-step">
                <span class="flow-num">4</span>
                <p>Agency manages client approvals</p>
            </div>
            <div class="flow-connector" aria-hidden="true">➔</div>
            <div class="flow-step">
                <span class="flow-num">5</span>
                <p>Completed product delivered to client</p>
            </div>
        </div>
    </div>
</section>

<!-- Section 11: Who We Work With -->
<section class="who-we-work-with">
    <div class="www-container">
        <div class="section-head text-center">
            <p class="eyebrow">COMPATIBLE PARTNERS</p>
            <h2>Built for Agencies of Different Sizes</h2>
        </div>

        <div class="www-grid">
            <div class="www-card">
                <h3>Freelancers & Small Agencies</h3>
                <p>When you have design and client management handled, but need a reliable developer to write clean backend code, build custom databases, or configure APIs.</p>
            </div>

            <div class="www-card">
                <h3>Growing Agencies</h3>
                <p>When project volume is increasing faster than your internal capacity. We step in immediately to help execute and deliver without hiring delay risks.</p>
            </div>

            <div class="www-card">
                <h3>Established Agencies</h3>
                <p>When you require specialized expertise in PHP, Laravel, Shopify, custom software integrations, or AI workflows without expanding your permanent head count.</p>
            </div>
        </div>
    </div>
</section>

<!-- Section 12: What You Can Send Us -->
<section class="onboarding-scope-section">
    <div class="onboarding-scope-container">
        <div class="section-head text-center">
            <p class="eyebrow">EASY ONBOARDING</p>
            <h2>Have a Project Already? Send Us What You Have.</h2>
            <p class="section-subtext">You don't need a perfectly prepared specification. Send whatever you have and we'll help identify the technical requirements.</p>
        </div>

        <div class="scope-grid">
            <div class="scope-item">Figma designs</div>
            <div class="scope-item">Wireframes & Mockups</div>
            <div class="scope-item">Existing codebase links</div>
            <div class="scope-item">Client project briefs</div>
            <div class="scope-item">Legacy site URLs</div>
            <div class="scope-item">Technical specifications</div>
            <div class="scope-item">API documentation</div>
            <div class="scope-item">Feature wishlists</div>
        </div>

        <div class="text-center" style="margin-top: 40px;">
            <a class="button primary" href="#partnership-form">Send Project Details</a>
        </div>
    </div>
</section>

<!-- Section 13: Case Studies -->
<section class="live-portfolio-section" id="portfolio" aria-labelledby="portfolio-heading">
    <div class="live-portfolio-head">
        <p class="eyebrow">PORTFOLIO</p>
        <h2 id="portfolio-heading">Projects We've Built</h2>
        <p>A selection of web applications, platforms, and commerce systems delivered by our technical team.</p>
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
</section>

<!-- Section 14: Trust / Credibility bar -->
<section class="trust-bar-section">
    <div class="trust-bar-container">
        <div class="trust-bar-intro">
            <h3>Verified Engineering Output</h3>
            <p>Our systems adapt to your standard agency workflow, code guidelines, and delivery model.</p>
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

<!-- Section 15: FAQ Section -->
<section class="faq-container-section">
    <div class="faq-inner-container">
        <div class="section-head text-center">
            <p class="eyebrow">QUESTIONS & ANSWERS</p>
            <h2>Frequently Asked Questions</h2>
        </div>

        <div class="faq-list-block">
            <article class="faq-item">
                <h3>Do you work with agencies as a white-label development partner?</h3>
                <p>Yes. We operate as a quiet technical back-office. All code, files, and deployment pipelines remain under your brand, and we sign an NDA before reviewing any codebase or specs.</p>
            </article>

            <article class="faq-item">
                <h3>Can you work with our existing developers?</h3>
                <p>Yes. Our developers can integrate with your team's Slack, Jira, GitHub/GitLab, or project management boards, serving as a clean extension of your engineering department.</p>
            </article>

            <article class="faq-item">
                <h3>Can you work with an existing codebase?</h3>
                <p>Yes, subject to a technical review. We'll audit the code, dependencies, structure, and outstanding issues to establish a safe maintenance or expansion plan.</p>
            </article>

            <article class="faq-item">
                <h3>Can you work with our client's technology stack?</h3>
                <p>Yes, provided it falls within our core stack (Laravel, PHP, Node, React, Vue, WooCommerce, Shopify, Mobile App platforms, and Cloud setups). We do not claim support for stacks outside our expertise.</p>
            </article>

            <article class="faq-item">
                <h3>Do you sign NDAs?</h3>
                <p>Yes. We sign standard Non-Disclosure Agreements (NDAs) to protect your agency, your intellectual property, and your client relationships before project specs are shared.</p>
            </article>

            <article class="faq-item">
                <h3>Can we start with a small project?</h3>
                <p>Absolutely. We encourage agencies to start with a smaller, fixed-scope website or feature build to test our communication, code quality, and delivery speed.</p>
            </article>

            <article class="faq-item">
                <h3>Do you provide dedicated developers?</h3>
                <p>Yes. You can add a dedicated backend (Laravel/PHP), frontend (React/Vue), or full-stack developer to your team on a monthly retainer basis.</p>
            </article>

            <article class="faq-item">
                <h3>Can you work directly with our project manager/designer?</h3>
                <p>Yes. Our engineers work directly with your project managers, designers, or product owners. We can report status updates directly to them inside your workspace.</p>
            </article>

            <article class="faq-item">
                <h3>Can you provide ongoing maintenance?</h3>
                <p>Yes. We offer retainer packages covering regular updates, server monitoring, bug fixing, and continuous development support after project delivery.</p>
            </article>

            <article class="faq-item">
                <h3>Which countries do you work with?</h3>
                <p>We work internationally, supporting digital agencies across North America, Europe, Australia, India, and the Delhi NCR region.</p>
            </article>
        </div>
    </div>
</section>

<!-- Section 16: Partnership Request Form -->
<section class="partnership-form-section" id="partnership-form">
    <div class="partnership-form-container">
        <div class="section-head text-center">
            <p class="eyebrow">START THE CONVERSATION</p>
            <h2>Let's Talk About Your Next Project</h2>
            <p class="section-subtext">Tell us a little about your agency and what kind of development support you're looking for.</p>
        </div>

        @if(session('status'))
            <div class="alert-success-notification">
                <span class="alert-icon">✓</span>
                <p>{{ session('status') }}</p>
            </div>
        @endif

        @if($errors->any())
            <div class="alert-error-notification">
                <span class="alert-icon">⚠</span>
                <div>
                    <strong>Please resolve the following issues:</strong>
                    <ul>
                        @foreach($errors->all() as $error)
                            <li>{{ $error }}</li>
                        @endforeach
                    </ul>
                </div>
            </div>
        @endif

        <form class="b2b-partnership-form" method="POST" action="{{ route('agency-partners.submit') }}">
            @csrf
            <!-- Anti-spam honeypot -->
            <input type="text" name="my_custom_country_verify" style="display:none !important;" tabindex="-1" autocomplete="off">

            <div class="form-row">
                <div class="form-group">
                    <label for="form-name">Your Name <span class="required">*</span></label>
                    <input type="text" id="form-name" name="name" value="{{ old('name') }}" placeholder="e.g. John Doe" required>
                </div>
                
                <div class="form-group">
                    <label for="form-agency">Agency Name <span class="required">*</span></label>
                    <input type="text" id="form-agency" name="agency_name" value="{{ old('agency_name') }}" placeholder="e.g. Pixel Agency" required>
                </div>
            </div>

            <div class="form-row">
                <div class="form-group">
                    <label for="form-email">Work Email <span class="required">*</span></label>
                    <input type="email" id="form-email" name="email" value="{{ old('email') }}" placeholder="e.g. john@agency.com" required>
                </div>
                
                <div class="form-group">
                    <label for="form-phone">Phone / WhatsApp</label>
                    <input type="text" id="form-phone" name="phone" value="{{ old('phone') }}" placeholder="e.g. +1 555 123 4567">
                </div>
            </div>

            <div class="form-row">
                <div class="form-group">
                    <label for="form-website">Agency Website</label>
                    <input type="url" id="form-website" name="website" value="{{ old('website') }}" placeholder="e.g. https://agency.com">
                </div>
                
                <div class="form-group">
                    <label for="form-country">Country</label>
                    <input type="text" id="form-country" name="country" value="{{ old('country') }}" placeholder="e.g. United States">
                </div>
            </div>

            <!-- Services Required Multi-select -->
            <div class="form-group full-width">
                <label>Services Required <span class="required">*</span> <span class="label-hint">(Select all that apply)</span></label>
                <div class="checkbox-grid">
                    @php
                        $availableServices = [
                            'Web Development',
                            'E-commerce',
                            'Custom Software',
                            'Mobile App',
                            'AI Development',
                            'API Integration',
                            'Maintenance',
                            'Dedicated Developer',
                            'Dedicated Team',
                            'Other'
                        ];
                        $oldServices = old('services') ?? [];
                    @endphp
                    @foreach($availableServices as $service)
                        <label class="checkbox-item">
                            <input type="checkbox" name="services[]" value="{{ $service }}" @checked(in_array($service, $oldServices))>
                            <span>{{ $service }}</span>
                        </label>
                    @endforeach
                </div>
            </div>

            <div class="form-row">
                <!-- Estimated Project Type -->
                <div class="form-group">
                    <label for="form-project-type">Estimated Project Size</label>
                    <select id="form-project-type" name="project_type">
                        <option value="" @selected(old('project_type') == '')>-- Select size --</option>
                        <option value="Small Project" @selected(old('project_type') == 'Small Project')>Small Project</option>
                        <option value="Medium Project" @selected(old('project_type') == 'Medium Project')>Medium Project</option>
                        <option value="Large Project" @selected(old('project_type') == 'Large Project')>Large Project</option>
                        <option value="Ongoing Development" @selected(old('project_type') == 'Ongoing Development')>Ongoing Development</option>
                        <option value="Not Sure Yet" @selected(old('project_type') == 'Not Sure Yet')>Not Sure Yet</option>
                    </select>
                </div>

                <!-- Preferred Engagement -->
                <div class="form-group">
                    <label for="form-engagement">Preferred Engagement</label>
                    <select id="form-engagement" name="engagement">
                        <option value="" @selected(old('engagement') == '')>-- Select model --</option>
                        <option value="Project-Based" @selected(old('engagement') == 'Project-Based')>Project-Based</option>
                        <option value="Dedicated Developer" @selected(old('engagement') == 'Dedicated Developer')>Dedicated Developer</option>
                        <option value="Dedicated Team" @selected(old('engagement') == 'Dedicated Team')>Dedicated Team</option>
                        <option value="Monthly Partnership" @selected(old('engagement') == 'Monthly Partnership')>Monthly Partnership</option>
                        <option value="Not Sure" @selected(old('engagement') == 'Not Sure')>Not Sure</option>
                    </select>
                </div>
            </div>

            <!-- Project Details -->
            <div class="form-group full-width">
                <label for="form-message">Project Details / Requirements <span class="required">*</span></label>
                <textarea id="form-message" name="message" rows="6" placeholder="Describe the project scope, technical requirements, timeline, Figma designs, or codebase details you'd like us to review..." required>{{ old('message') }}</textarea>
            </div>

            <div class="form-submit full-width">
                <button type="submit" class="button primary">Start the Conversation <span>→</span></button>
            </div>
        </form>
    </div>
</section>

<!-- Section 17: Final CTA -->
<section class="premium-cta">
    <div>
        <p class="eyebrow">READY TO ADD CAPACITY?</p>
        <h2>Ready to Add More Development Capacity?</h2>
        <p>Let's build a partnership that helps your agency take on more projects, deliver faster and grow without unnecessary hiring overhead.</p>
    </div>
    <div class="cta-actions">
        <a class="button primary" href="#partnership-form">Become a Partner</a>
        <a class="button premium-ghost" href="#partnership-form">Discuss a Project</a>
    </div>
</section>
@endsection
