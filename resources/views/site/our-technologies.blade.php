@extends('site.layout')

@push('head')
<style>
    /* Premium Page Header */
    .premium-page-hero {
        background: radial-gradient(circle at top center, #0f172a 0%, #020617 100%);
        padding: 120px 20px 80px;
        text-align: center;
        color: #fff;
        position: relative;
        overflow: hidden;
        margin-top: -80px; /* Offset to sit behind transparent nav if needed, or adjust */
    }
    .premium-page-hero::before {
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
    .hero-eyebrow {
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
    .premium-page-hero h1 {
        font-size: 56px;
        font-weight: 800;
        line-height: 1.1;
        margin-bottom: 24px;
        background: linear-gradient(to right, #ffffff, #94a3b8);
        -webkit-background-clip: text;
        -webkit-text-fill-color: transparent;
    }
    .premium-page-hero h1 span {
        background: linear-gradient(135deg, #ff6b1a 0%, #ff8c42 100%);
        -webkit-background-clip: text;
        -webkit-text-fill-color: transparent;
    }
    .premium-page-hero p {
        font-size: 20px;
        color: #94a3b8;
        max-width: 700px;
        margin: 0 auto;
        line-height: 1.6;
    }

    /* Technologies Grid Container */
    .tech-page-content {
        padding: 80px 20px;
        background: #f8fafc;
    }
    .tech-page-grid {
        max-width: 1200px;
        margin: 0 auto;
        display: grid;
        grid-template-columns: repeat(auto-fit, minmax(350px, 1fr));
        gap: 32px;
    }

    /* Premium Category Card */
    .tech-premium-card {
        background: #ffffff;
        border-radius: 24px;
        padding: 40px;
        border: 1px solid rgba(15, 23, 42, 0.05);
        box-shadow: 0 10px 30px rgba(0, 0, 0, 0.03);
        transition: all 0.4s cubic-bezier(0.175, 0.885, 0.32, 1.275);
        position: relative;
        overflow: hidden;
        display: flex;
        flex-direction: column;
    }
    .tech-premium-card::after {
        content: '';
        position: absolute;
        top: 0;
        left: 0;
        width: 100%;
        height: 4px;
        background: linear-gradient(90deg, #ff6b1a, #ff8c42);
        opacity: 0;
        transition: opacity 0.3s ease;
    }
    .tech-premium-card:hover {
        transform: translateY(-8px);
        box-shadow: 0 20px 40px rgba(0, 0, 0, 0.08);
        border-color: rgba(255, 107, 26, 0.2);
    }
    .tech-premium-card:hover::after {
        opacity: 1;
    }

    /* Icon & Title */
    .tech-card-header {
        display: flex;
        align-items: center;
        gap: 20px;
        margin-bottom: 30px;
    }
    .tech-icon-box {
        width: 60px;
        height: 60px;
        background: rgba(255, 107, 26, 0.1);
        border-radius: 16px;
        display: flex;
        align-items: center;
        justify-content: center;
        color: #ff6b1a;
    }
    .tech-card-header h3 {
        font-size: 24px;
        font-weight: 700;
        color: #0f172a;
        margin: 0;
    }

    /* Pills Container */
    .tech-pills-container {
        display: flex;
        flex-wrap: wrap;
        gap: 12px;
        margin-top: auto;
    }
    .tech-pill-item {
        padding: 8px 16px;
        background: #f1f5f9;
        border: 1px solid #e2e8f0;
        border-radius: 100px;
        font-size: 14px;
        font-weight: 600;
        color: #475569;
        transition: all 0.3s ease;
    }
    .tech-premium-card:hover .tech-pill-item {
        background: #ffffff;
        border-color: rgba(255, 107, 26, 0.3);
        color: #0f172a;
    }
    .tech-pill-item:hover {
        background: #ff6b1a !important;
        border-color: #ff6b1a !important;
        color: #ffffff !important;
        transform: translateY(-2px);
        box-shadow: 0 4px 12px rgba(255, 107, 26, 0.3);
    }

    /* CTA Section */
    .tech-cta-section {
        background: #0f172a;
        padding: 80px 20px;
        text-align: center;
    }
    .tech-cta-card {
        max-width: 800px;
        margin: 0 auto;
        background: linear-gradient(135deg, rgba(255,255,255,0.05) 0%, rgba(255,255,255,0.01) 100%);
        border: 1px solid rgba(255,255,255,0.1);
        border-radius: 32px;
        padding: 60px 40px;
        backdrop-filter: blur(20px);
    }
    .tech-cta-card h2 {
        color: #fff;
        font-size: 36px;
        font-weight: 800;
        margin-bottom: 20px;
    }
    .tech-cta-card p {
        color: #94a3b8;
        font-size: 18px;
        margin-bottom: 40px;
    }
    .btn-premium {
        display: inline-block;
        padding: 16px 40px;
        background: linear-gradient(135deg, #ff6b1a 0%, #ff8c42 100%);
        color: #fff;
        font-size: 16px;
        font-weight: 700;
        text-decoration: none;
        border-radius: 100px;
        box-shadow: 0 10px 30px rgba(255, 107, 26, 0.3);
        transition: all 0.3s ease;
    }
    .btn-premium:hover {
        transform: translateY(-3px);
        box-shadow: 0 15px 40px rgba(255, 107, 26, 0.4);
    }

    /* Responsive */
    @media (max-width: 768px) {
        .premium-page-hero {
            padding: 100px 20px 60px;
        }
        .premium-page-hero h1 {
            font-size: 40px;
        }
        .tech-page-grid {
            grid-template-columns: 1fr;
        }
        .tech-cta-card {
            padding: 40px 20px;
        }
    }
</style>
@endpush

@section('content')
<section class="premium-page-hero">
    <span class="hero-eyebrow">Innovation Driven</span>
    <h1>{!! $page?->title ? str_replace('Technology', '<span>Technology</span>', $page->title) : 'Our Premium <span>Technology</span> Stack' !!}</h1>
    <p>{{ $page?->excerpt ?: 'We build scalable, secure, and lightning-fast digital products using the most powerful tools and frameworks available in the modern web ecosystem.' }}</p>
</section>



<section class="tech-page-content">
    <div class="tech-page-grid">
        @forelse($technologies as $tech)
            <a href="{{ route('pages.show', trim($tech->slug, '/')) }}" style="text-decoration: none; color: inherit; display: block;">
                <article class="tech-premium-card">
                    <div class="tech-card-header">
                        <div class="tech-icon-box">
                            <svg width="28" height="28" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><circle cx="12" cy="12" r="10"></circle><circle cx="12" cy="12" r="4"></circle><line x1="21.17" y1="8" x2="12" y2="8"></line><line x1="3.95" y1="6.06" x2="8.54" y2="14"></line><line x1="10.88" y1="21.94" x2="15.46" y2="14"></line></svg>
                        </div>
                        <h3>{{ $tech->title }}</h3>
                    </div>
                    <div class="tech-pills-container">
                        @php
                            $pills = array_filter(array_map('trim', explode(',', strip_tags($tech->excerpt ?: $tech->content))));
                        @endphp
                        @foreach($pills as $pill)
                            <span class="tech-pill-item">{{ $pill }}</span>
                        @endforeach
                    </div>
                </article>
            </a>
        @empty
        
        <!-- Category 1 -->
        <article class="tech-premium-card">
            <div class="tech-card-header">
                <div class="tech-icon-box">
                    <svg width="28" height="28" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><path d="M12 2L2 7l10 5 10-5-10-5z"></path><path d="M2 17l10 5 10-5"></path><path d="M2 12l10 5 10-5"></path></svg>
                </div>
                <h3>Backend & Frameworks</h3>
            </div>
            <div class="tech-pills-container">
                <span class="tech-pill-item">Laravel</span>
                <span class="tech-pill-item">PHP</span>
                <span class="tech-pill-item">Node.js</span>
                <span class="tech-pill-item">Express.js</span>
                <span class="tech-pill-item">Python</span>
                <span class="tech-pill-item">Django</span>
                <span class="tech-pill-item">FastAPI</span>
                <span class="tech-pill-item">Go</span>
            </div>
        </article>

        <!-- Category 2 -->
        <article class="tech-premium-card">
            <div class="tech-card-header">
                <div class="tech-icon-box">
                    <svg width="28" height="28" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><polyline points="16 18 22 12 16 6"></polyline><polyline points="8 6 2 12 8 18"></polyline></svg>
                </div>
                <h3>Frontend & Frameworks</h3>
            </div>
            <div class="tech-pills-container">
                <span class="tech-pill-item">React.js</span>
                <span class="tech-pill-item">Vue.js</span>
                <span class="tech-pill-item">Next.js</span>
                <span class="tech-pill-item">Nuxt.js</span>
                <span class="tech-pill-item">TypeScript</span>
                <span class="tech-pill-item">Tailwind CSS</span>
                <span class="tech-pill-item">SASS/SCSS</span>
                <span class="tech-pill-item">PWA</span>
            </div>
        </article>

        <!-- Category 3 -->
        <article class="tech-premium-card">
            <div class="tech-card-header">
                <div class="tech-icon-box">
                    <svg width="28" height="28" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><rect x="5" y="2" width="14" height="20" rx="2" ry="2"></rect><line x1="12" y1="18" x2="12.01" y2="18"></line></svg>
                </div>
                <h3>Mobile Development</h3>
            </div>
            <div class="tech-pills-container">
                <span class="tech-pill-item">React Native</span>
                <span class="tech-pill-item">Flutter</span>
                <span class="tech-pill-item">Swift</span>
                <span class="tech-pill-item">Kotlin</span>
                <span class="tech-pill-item">Ionic</span>
                <span class="tech-pill-item">Native iOS</span>
                <span class="tech-pill-item">Native Android</span>
            </div>
        </article>

        <!-- Category 4 -->
        <article class="tech-premium-card">
            <div class="tech-card-header">
                <div class="tech-icon-box">
                    <svg width="28" height="28" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><path d="M21 16V8a2 2 0 0 0-1-1.73l-7-4a2 2 0 0 0-2 0l-7 4A2 2 0 0 0 3 8v8a2 2 0 0 0 1 1.73l7 4a2 2 0 0 0 2 0l7-4A2 2 0 0 0 21 16z"></path><polyline points="3.27 6.96 12 12.01 20.73 6.96"></polyline><line x1="12" y1="22.08" x2="12" y2="12"></line></svg>
                </div>
                <h3>Databases & Storage</h3>
            </div>
            <div class="tech-pills-container">
                <span class="tech-pill-item">MySQL</span>
                <span class="tech-pill-item">PostgreSQL</span>
                <span class="tech-pill-item">MongoDB</span>
                <span class="tech-pill-item">Redis</span>
                <span class="tech-pill-item">Firebase</span>
                <span class="tech-pill-item">Elasticsearch</span>
                <span class="tech-pill-item">Supabase</span>
            </div>
        </article>

        <!-- Category 5 -->
        <article class="tech-premium-card">
            <div class="tech-card-header">
                <div class="tech-icon-box">
                    <svg width="28" height="28" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><path d="M12 22s8-4 8-10V5l-8-3-8 3v7c0 6 8 10 8 10z"></path></svg>
                </div>
                <h3>Cloud & DevOps</h3>
            </div>
            <div class="tech-pills-container">
                <span class="tech-pill-item">AWS</span>
                <span class="tech-pill-item">Google Cloud</span>
                <span class="tech-pill-item">Docker</span>
                <span class="tech-pill-item">Kubernetes</span>
                <span class="tech-pill-item">GitHub Actions</span>
                <span class="tech-pill-item">CI/CD</span>
                <span class="tech-pill-item">Nginx</span>
                <span class="tech-pill-item">Cloudflare</span>
            </div>
        </article>

        <!-- Category 6 -->
        <article class="tech-premium-card">
            <div class="tech-card-header">
                <div class="tech-icon-box">
                    <svg width="28" height="28" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><rect x="3" y="11" width="18" height="10" rx="2"></rect><circle cx="12" cy="5" r="2"></circle><path d="M12 7v4"></path><line x1="8" y1="16" x2="8" y2="16"></line><line x1="16" y1="16" x2="16" y2="16"></line></svg>
                </div>
                <h3>AI & Machine Learning</h3>
            </div>
            <div class="tech-pills-container">
                <span class="tech-pill-item">OpenAI API</span>
                <span class="tech-pill-item">Claude API</span>
                <span class="tech-pill-item">LangChain</span>
                <span class="tech-pill-item">TensorFlow</span>
                <span class="tech-pill-item">PyTorch</span>
                <span class="tech-pill-item">Hugging Face</span>
                <span class="tech-pill-item">NLP</span>
            </div>
        </article>
        
        <!-- Category 7 -->
        <article class="tech-premium-card">
            <div class="tech-card-header">
                <div class="tech-icon-box">
                    <svg width="28" height="28" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><circle cx="9" cy="21" r="1"></circle><circle cx="20" cy="21" r="1"></circle><path d="M1 1h4l2.68 13.39a2 2 0 0 0 2 1.61h9.72a2 2 0 0 0 2-1.61L23 6H6"></path></svg>
                </div>
                <h3>CMS & E-Commerce</h3>
            </div>
            <div class="tech-pills-container">
                <span class="tech-pill-item">WordPress</span>
                <span class="tech-pill-item">Shopify</span>
                <span class="tech-pill-item">WooCommerce</span>
                <span class="tech-pill-item">Magento</span>
                <span class="tech-pill-item">Strapi</span>
                <span class="tech-pill-item">Headless CMS</span>
            </div>
        </article>

        <!-- Category 8 -->
        <article class="tech-premium-card">
            <div class="tech-card-header">
                <div class="tech-icon-box">
                    <svg width="28" height="28" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><circle cx="12" cy="12" r="10"></circle><polyline points="12 16 16 12 12 8"></polyline><line x1="8" y1="12" x2="16" y2="12"></line></svg>
                </div>
                <h3>APIs & Integrations</h3>
            </div>
            <div class="tech-pills-container">
                <span class="tech-pill-item">REST APIs</span>
                <span class="tech-pill-item">GraphQL</span>
                <span class="tech-pill-item">WebSockets</span>
                <span class="tech-pill-item">Stripe</span>
                <span class="tech-pill-item">Twilio</span>
                <span class="tech-pill-item">Auth0</span>
            </div>
        </article>

        @endforelse
    </div>
</section>

<section class="tech-cta-section">
    <div class="tech-cta-card">
        <h2>Ready to build something amazing?</h2>
        <p>Let's choose the perfect technology stack for your next big project and bring your vision to life.</p>
        <a href="{{ route('quote') }}" class="btn-premium">Start a Project Today</a>
    </div>
</section>
@endsection
