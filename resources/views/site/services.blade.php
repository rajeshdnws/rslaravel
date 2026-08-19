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
        margin-top: -80px;
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
    .premium-page-hero p {
        font-size: 20px;
        color: #94a3b8;
        max-width: 700px;
        margin: 0 auto;
        line-height: 1.6;
    }
    @media (max-width: 768px) {
        .premium-page-hero {
            padding: 100px 20px 60px;
        }
        .premium-page-hero h1 {
            font-size: 40px;
        }
    }
</style>
@endpush

@section('content')
<section class="premium-page-hero">
    <span class="hero-eyebrow">Services</span>
    <h1>{{ $page?->title ?: 'Our Services' }}</h1>
    <p>{{ $page?->excerpt ?: 'We craft customized, high-performance digital solutions that drive results: e-commerce platforms, AI integrations, business websites, apps, CMS platforms and long-term support.' }}</p>
</section>

<section class="premium-services-section">
    <!-- Premium Section Header -->
    <div class="premium-services-header">
        <div class="services-header-content">
            <p class="services-eyebrow">OUR SERVICES</p>
            <h2 class="services-headline">Technology that turns ambitious ideas into business growth.</h2>
            <p class="services-description">From high-performance websites and applications to scalable digital products, we design and build technology that helps businesses move faster, convert better and grow with confidence.</p>
            <div class="services-meta">
                <span class="meta-badge">6+ Core Services</span>
                <span class="meta-text">End-to-end digital solutions</span>
            </div>
        </div>
    </div>

    <!-- Premium Service Cards Grid -->
    <div class="premium-service-cards">
        @forelse ($services as $service)
            <article class="premium-service-card @if($loop->first) featured-service @endif" data-service-index="{{ $loop->iteration }}">
                @if($loop->first)
                    <div class="service-badge">BUSINESS FAVORITE</div>
                @endif
                
                <div class="service-number">{{ str_pad($loop->iteration, 2, '0', STR_PAD_LEFT) }}</div>
                
                <div class="service-icon-wrapper">
                    <div class="service-icon" data-icon-type="service-{{ $loop->iteration }}"></div>
                </div>
                
                <div class="service-content">
                    <h3 class="service-title">{{ $service->title }}</h3>
                    <p class="service-description">{{ \Illuminate\Support\Str::limit(strip_tags($service->excerpt ?: $service->content), 150) }}</p>
                    <a href="{{ route('pages.show', trim($service->slug, '/')) }}" class="service-cta">
                        Explore service
                        <span class="cta-arrow">→</span>
                    </a>
                </div>
                
                <div class="service-bg-pattern" data-pattern="{{ $loop->iteration }}"></div>
            </article>
        @empty
            <p>No services available at this time.</p>
        @endforelse
    </div>
</section>

<!-- Premium CTA Section -->
<section class="premium-cta-section">
    <div class="cta-content">
        <h2 class="cta-headline">Have a project in mind?</h2>
        <p class="cta-description">Let's turn your idea into a digital product built for performance, scale and long-term growth.</p>
        <div class="cta-actions">
            <a href="{{ route('quote') }}" class="cta-button primary">
                Get a Free Quote
                <span class="button-arrow">→</span>
            </a>
            <a href="{{ route('contact') }}" class="cta-link">Talk to our team</a>
        </div>
    </div>
</section>
@endsection
