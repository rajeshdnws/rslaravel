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

    /* Premium Portfolio Showcase */
    .premium-portfolio-section {
        padding: 80px 20px;
        background: #f8fafc;
    }
    .premium-portfolio-filters {
        display: flex;
        flex-wrap: wrap;
        gap: 16px;
        justify-content: center;
        margin-bottom: 60px;
        max-width: 1200px;
        margin-left: auto;
        margin-right: auto;
    }
    .premium-portfolio-filters span {
        padding: 10px 24px;
        background: #fff;
        border: 1px solid rgba(15,23,42,0.08);
        border-radius: 100px;
        font-size: 15px;
        font-weight: 600;
        color: #64748b;
        cursor: pointer;
        transition: all 0.3s ease;
    }
    .premium-portfolio-filters span:hover {
        background: #ff6b1a;
        color: #fff;
        border-color: #ff6b1a;
        box-shadow: 0 4px 12px rgba(255, 107, 26, 0.3);
    }
    
    .premium-portfolio-grid {
        max-width: 1200px;
        margin: 0 auto;
        display: grid;
        grid-template-columns: repeat(auto-fit, minmax(380px, 1fr));
        gap: 40px;
    }
    
    .premium-portfolio-card {
        background: #ffffff;
        border-radius: 24px;
        overflow: hidden;
        border: 1px solid rgba(15, 23, 42, 0.05);
        box-shadow: 0 10px 30px rgba(0, 0, 0, 0.03);
        transition: all 0.4s cubic-bezier(0.175, 0.885, 0.32, 1.275);
        display: flex;
        flex-direction: column;
    }
    .premium-portfolio-card:hover {
        transform: translateY(-8px);
        box-shadow: 0 20px 40px rgba(0, 0, 0, 0.08);
        border-color: rgba(255, 107, 26, 0.2);
    }
    .portfolio-image-wrapper {
        position: relative;
        width: 100%;
        height: 240px;
        overflow: hidden;
        background: #f1f5f9;
        display: flex;
        align-items: center;
        justify-content: center;
    }
    .portfolio-image-wrapper img {
        width: 100%;
        height: 100%;
        object-fit: cover;
        transition: transform 0.5s ease;
    }
    .premium-portfolio-card:hover .portfolio-image-wrapper img {
        transform: scale(1.05);
    }
    .portfolio-content {
        padding: 32px;
        display: flex;
        flex-direction: column;
        flex-grow: 1;
    }
    .portfolio-category {
        font-size: 13px;
        font-weight: 700;
        color: #ff6b1a;
        text-transform: uppercase;
        letter-spacing: 0.05em;
        margin-bottom: 12px;
    }
    .portfolio-title {
        font-size: 24px;
        font-weight: 800;
        color: #0f172a;
        margin: 0 0 16px;
        line-height: 1.3;
    }
    .portfolio-body {
        font-size: 16px;
        color: #475569;
        line-height: 1.6;
        margin-bottom: 24px;
        flex-grow: 1;
    }
    .portfolio-tags {
        display: flex;
        flex-wrap: wrap;
        gap: 8px;
        margin-bottom: 24px;
    }
    .portfolio-tags span {
        background: rgba(255, 107, 26, 0.08);
        color: #ea580c;
        padding: 4px 12px;
        border-radius: 100px;
        font-size: 13px;
        font-weight: 600;
    }
    .portfolio-cta-link {
        display: inline-flex;
        align-items: center;
        gap: 8px;
        color: #0f172a;
        font-weight: 700;
        font-size: 15px;
        text-decoration: none;
        transition: color 0.3s ease;
    }
    .premium-portfolio-card:hover .portfolio-cta-link {
        color: #ff6b1a;
    }
    .portfolio-cta-link svg {
        transition: transform 0.3s ease;
    }
    .premium-portfolio-card:hover .portfolio-cta-link svg {
        transform: translateX(4px);
    }

    /* Premium Process Section */
    .premium-process-section {
        padding: 100px 20px;
        background: #ffffff;
        border-top: 1px solid rgba(15,23,42,0.05);
    }
    .process-container {
        max-width: 1200px;
        margin: 0 auto;
        display: grid;
        grid-template-columns: repeat(auto-fit, minmax(300px, 1fr));
        gap: 40px;
    }
    .process-step {
        padding: 40px;
        background: #ffffff;
        border-radius: 24px;
        position: relative;
        overflow: hidden;
        border: 1px solid rgba(255, 107, 26, 0.15);
        box-shadow: 0 10px 30px rgba(0, 0, 0, 0.03);
        transition: all 0.4s ease;
    }
    .process-step:hover {
        transform: translateY(-6px);
        box-shadow: 0 15px 40px rgba(255, 107, 26, 0.12);
        border-color: rgba(255, 107, 26, 0.4);
    }
    .process-step::before {
        content: '';
        position: absolute;
        top: 0;
        left: 0;
        width: 6px;
        height: 100%;
        background: linear-gradient(180deg, #ff6b1a, #ff8c42);
        opacity: 1;
    }
    .step-number {
        font-size: 56px;
        font-weight: 800;
        color: rgba(255, 107, 26, 0.8);
        line-height: 1;
        margin-bottom: 20px;
        display: block;
    }
    .process-step h3 {
        font-size: 24px;
        font-weight: 800;
        color: #0f172a;
        margin-bottom: 12px;
    }
    .process-step p {
        font-size: 16px;
        color: #475569;
        line-height: 1.6;
        margin: 0;
    }

    /* Premium CTA Section */
    .premium-cta-section {
        background: #0f172a;
        padding: 100px 20px;
        text-align: center;
    }
    .cta-content {
        max-width: 800px;
        margin: 0 auto;
        background: linear-gradient(135deg, rgba(255,255,255,0.05) 0%, rgba(255,255,255,0.01) 100%);
        border: 1px solid rgba(255,255,255,0.1);
        border-radius: 32px;
        padding: 60px 40px;
        backdrop-filter: blur(20px);
    }
    .cta-headline {
        color: #fff;
        font-size: 36px;
        font-weight: 800;
        margin-bottom: 20px;
    }
    .cta-description {
        color: #94a3b8;
        font-size: 18px;
        margin-bottom: 40px;
    }
    .cta-actions .cta-button {
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
    .cta-actions .cta-button:hover {
        transform: translateY(-3px);
        box-shadow: 0 15px 40px rgba(255, 107, 26, 0.4);
    }

    @media (max-width: 768px) {
        .premium-page-hero {
            padding: 100px 20px 60px;
        }
        .premium-page-hero h1 {
            font-size: 40px;
        }
        .premium-portfolio-grid {
            grid-template-columns: 1fr;
        }
        .cta-content {
            padding: 40px 20px;
        }
    }
</style>
@endpush

@section('content')
<section class="premium-page-hero">
    <span class="hero-eyebrow">Our Work</span>
    <h1>Web, App and Plugin Work Built for <span>Real Business Use</span></h1>
    <p>Selected RS Orange Tech projects across Laravel, WordPress plugins, education dashboards, field tools and conversion-focused websites.</p>
</section>

<section class="premium-portfolio-section">
    <div class="premium-portfolio-filters" aria-label="Portfolio categories">
        <span>All</span>
        <span>Laravel</span>
        <span>Spring Boot</span>
        <span>Node JS</span>
        <span>Next JS</span>
        <span>WordPress Plugins</span>
        <span>Education</span>
        <span>Field Tools</span>
        <span>AI & SEO</span>
    </div>

    <div class="premium-portfolio-grid">
        @forelse ($projects as $project)
            @php
                $projectSlug = is_object($project) && isset($project->slug) ? $project->slug : \Illuminate\Support\Str::slug($project->title ?? 'project');
                $projectUrl = route('portfolio.show', ['slug' => $projectSlug]);
                $projectImage = $project->image ?? 'design.png';
                $projectBody = $project->description ?? $project->excerpt ?? 'Project details coming soon.';
                $projectTech = $project->tech_stack ? explode(',', $project->tech_stack) : [];
                if (empty($projectTech) && isset($project->tech) && is_array($project->tech)) {
                    $projectTech = $project->tech;
                }
            @endphp
            <article class="premium-portfolio-card">
                <a class="portfolio-image-wrapper" href="{{ $projectUrl }}">
                    <img src="{{ asset('site-assets/'.$projectImage) }}" alt="{{ $project->title }}">
                </a>
                <div class="portfolio-content">
                    <span class="portfolio-category">{{ $project->category ?? 'Project' }}</span>
                    <h3 class="portfolio-title">{{ $project->title }}</h3>
                    <p class="portfolio-body">{{ \Illuminate\Support\Str::limit(strip_tags($projectBody), 120) }}</p>
                    
                    @if (!empty($projectTech))
                        <div class="portfolio-tags">
                            @foreach (array_slice($projectTech, 0, 4) as $tech)
                                <span>{{ trim($tech) }}</span>
                            @endforeach
                        </div>
                    @endif
                    
                    <a href="{{ $projectUrl }}" class="portfolio-cta-link">
                        View project details
                        <svg width="20" height="20" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><line x1="5" y1="12" x2="19" y2="12"></line><polyline points="12 5 19 12 12 19"></polyline></svg>
                    </a>
                </div>
            </article>
        @empty
            <p style="grid-column: 1/-1; text-align: center; color: #64748b; font-size: 18px;">No portfolio projects have been published yet.</p>
        @endforelse
    </div>
</section>

<section class="premium-process-section">
    <div class="process-container">
        <div class="process-step">
            <span class="step-number">01</span>
            <h3>Discover</h3>
            <p>We clarify the goal, audience, content and technical scope before design begins.</p>
        </div>
        <div class="process-step">
            <span class="step-number">02</span>
            <h3>Build</h3>
            <p>Interfaces, admin tools and frontend pages are created with clean Laravel-friendly structure.</p>
        </div>
        <div class="process-step">
            <span class="step-number">03</span>
            <h3>Improve</h3>
            <p>We refine performance, SEO, responsiveness and the details users feel during real use.</p>
        </div>
    </div>
</section>

<section class="premium-cta-section">
    <div class="cta-content">
        <h2 class="cta-headline">Have an idea?</h2>
        <p class="cta-description">Let's turn it into a clear, useful digital product.</p>
        <div class="cta-actions">
            <a href="{{ route('quote') }}" class="cta-button">
                Get a Quote
            </a>
        </div>
    </div>
</section>
@endsection
