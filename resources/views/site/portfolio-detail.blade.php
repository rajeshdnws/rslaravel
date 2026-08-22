@extends('site.layout')

@push('head')
<style>
    /* Premium Portfolio Detail Styling */
    .portfolio-detail-hero {
        position: relative;
        padding: 180px 20px 100px;
        background: #020617; /* Slate 950 */
        color: #fff;
        overflow: hidden;
        margin-top: -80px; /* Offset for topbar */
        display: flex;
        align-items: center;
        justify-content: center;
    }
    
    .portfolio-detail-hero::before {
        content: '';
        position: absolute;
        top: 0;
        left: 0;
        right: 0;
        bottom: 0;
        background: radial-gradient(circle at 70% 30%, rgba(255, 107, 26, 0.15) 0%, transparent 50%),
                    radial-gradient(circle at 30% 70%, rgba(15, 23, 42, 0.8) 0%, #020617 100%);
        z-index: 1;
    }

    .hero-content {
        position: relative;
        z-index: 2;
        max-width: 1000px;
        width: 100%;
        text-align: center;
    }

    .category-badge {
        display: inline-block;
        padding: 8px 20px;
        background: rgba(255, 107, 26, 0.1);
        border: 1px solid rgba(255, 107, 26, 0.2);
        border-radius: 100px;
        color: #ff8c42;
        font-size: 14px;
        font-weight: 700;
        text-transform: uppercase;
        letter-spacing: 0.15em;
        margin-bottom: 30px;
        backdrop-filter: blur(10px);
    }

    .project-title {
        font-size: clamp(40px, 6vw, 72px);
        font-weight: 800;
        line-height: 1.1;
        margin-bottom: 24px;
        background: linear-gradient(135deg, #ffffff 0%, #cbd5e1 100%);
        -webkit-background-clip: text;
        -webkit-text-fill-color: transparent;
        letter-spacing: -0.02em;
    }

    .project-subtitle {
        font-size: clamp(18px, 2vw, 24px);
        color: #94a3b8;
        max-width: 800px;
        margin: 0 auto;
        line-height: 1.6;
    }

    .project-meta-bar {
        position: relative;
        z-index: 2;
        max-width: 1000px;
        margin: -50px auto 60px;
        background: rgba(255, 255, 255, 0.95);
        backdrop-filter: blur(20px);
        border-radius: 24px;
        padding: 40px;
        display: flex;
        flex-wrap: wrap;
        gap: 40px;
        justify-content: space-between;
        box-shadow: 0 20px 40px rgba(0, 0, 0, 0.05);
        border: 1px solid rgba(15, 23, 42, 0.05);
    }

    .meta-item {
        flex: 1;
        min-width: 150px;
    }

    .meta-label {
        font-size: 13px;
        color: #64748b;
        text-transform: uppercase;
        font-weight: 700;
        letter-spacing: 0.1em;
        margin-bottom: 8px;
        display: block;
    }

    .meta-value {
        font-size: 18px;
        color: #0f172a;
        font-weight: 600;
    }

    .meta-value a {
        color: #ff6b1a;
        text-decoration: none;
        position: relative;
        display: inline-block;
    }

    .meta-value a::after {
        content: '';
        position: absolute;
        width: 100%;
        height: 2px;
        bottom: -2px;
        left: 0;
        background-color: #ff6b1a;
        transform: scaleX(0);
        transform-origin: bottom right;
        transition: transform 0.3s ease-out;
    }

    .meta-value a:hover::after {
        transform: scaleX(1);
        transform-origin: bottom left;
    }

    /* Main Content Area */
    .project-content-wrapper {
        max-width: 1200px;
        margin: 0 auto;
        padding: 0 20px 100px;
    }

    .project-featured-image {
        width: 100%;
        border-radius: 32px;
        overflow: hidden;
        margin-bottom: 80px;
        box-shadow: 0 30px 60px rgba(0, 0, 0, 0.08);
        background: #f8fafc;
        position: relative;
    }

    .project-featured-image img {
        width: 100%;
        height: auto;
        display: block;
        transition: transform 0.7s ease;
    }
    
    .project-featured-image:hover img {
        transform: scale(1.02);
    }

    .content-grid {
        display: grid;
        grid-template-columns: 2fr 1fr;
        gap: 60px;
    }

    .content-block h2 {
        font-size: 36px;
        font-weight: 800;
        color: #0f172a;
        margin-bottom: 30px;
        position: relative;
        padding-left: 20px;
    }

    .content-block h2::before {
        content: '';
        position: absolute;
        left: 0;
        top: 5px;
        bottom: 5px;
        width: 4px;
        background: linear-gradient(180deg, #ff6b1a, #ff8c42);
        border-radius: 4px;
    }

    .content-block p {
        font-size: 18px;
        line-height: 1.8;
        color: #475569;
        margin-bottom: 24px;
    }

    .tech-stack-card {
        background: #f8fafc;
        border-radius: 24px;
        padding: 40px;
        border: 1px solid rgba(15, 23, 42, 0.05);
    }

    .tech-stack-card h3 {
        font-size: 24px;
        font-weight: 700;
        color: #0f172a;
        margin-bottom: 24px;
    }

    .tech-tags {
        display: flex;
        flex-wrap: wrap;
        gap: 12px;
    }

    .tech-tags span {
        padding: 8px 16px;
        background: #ffffff;
        border: 1px solid rgba(15, 23, 42, 0.1);
        border-radius: 100px;
        font-size: 14px;
        font-weight: 600;
        color: #334155;
        transition: all 0.3s ease;
        box-shadow: 0 2px 5px rgba(0,0,0,0.02);
    }

    .tech-tags span:hover {
        background: #ff6b1a;
        color: #fff;
        border-color: #ff6b1a;
        transform: translateY(-2px);
        box-shadow: 0 5px 15px rgba(255, 107, 26, 0.2);
    }

    /* Gallery Section */
    .project-gallery {
        margin-top: 80px;
        display: grid;
        grid-template-columns: repeat(2, 1fr);
        gap: 30px;
    }

    .gallery-item {
        border-radius: 24px;
        overflow: hidden;
        position: relative;
        box-shadow: 0 10px 30px rgba(0,0,0,0.05);
    }

    .gallery-item.full-width {
        grid-column: 1 / -1;
    }

    .gallery-item img {
        width: 100%;
        height: 100%;
        object-fit: cover;
        display: block;
        transition: transform 0.5s ease;
    }

    .gallery-item:hover img {
        transform: scale(1.05);
    }
    
    .gallery-overlay {
        position: absolute;
        inset: 0;
        background: linear-gradient(to top, rgba(15,23,42,0.8), transparent);
        opacity: 0;
        transition: opacity 0.3s ease;
        display: flex;
        align-items: flex-end;
        padding: 30px;
    }
    
    .gallery-item:hover .gallery-overlay {
        opacity: 1;
    }
    
    .gallery-overlay span {
        color: #fff;
        font-weight: 600;
        font-size: 18px;
        transform: translateY(20px);
        transition: transform 0.3s ease 0.1s;
    }
    
    .gallery-item:hover .gallery-overlay span {
        transform: translateY(0);
    }

    /* Next Project CTA */
    .next-project-cta {
        margin-top: 100px;
        padding: 80px 20px;
        background: #0f172a;
        border-radius: 32px;
        text-align: center;
        color: #fff;
        position: relative;
        overflow: hidden;
    }

    .next-project-cta::before {
        content: '';
        position: absolute;
        top: 0;
        right: 0;
        width: 300px;
        height: 300px;
        background: radial-gradient(circle, rgba(255,107,26,0.2) 0%, transparent 70%);
    }

    .next-project-cta h3 {
        font-size: 20px;
        color: #94a3b8;
        font-weight: 600;
        margin-bottom: 16px;
        text-transform: uppercase;
        letter-spacing: 0.1em;
    }

    .next-project-cta h2 {
        font-size: 48px;
        font-weight: 800;
        margin-bottom: 40px;
    }

    .btn-primary {
        display: inline-flex;
        align-items: center;
        gap: 12px;
        padding: 18px 40px;
        background: linear-gradient(135deg, #ff6b1a 0%, #ff8c42 100%);
        color: #fff;
        font-size: 16px;
        font-weight: 700;
        text-decoration: none;
        border-radius: 100px;
        box-shadow: 0 10px 30px rgba(255, 107, 26, 0.3);
        transition: all 0.3s cubic-bezier(0.175, 0.885, 0.32, 1.275);
    }

    .btn-primary:hover {
        transform: translateY(-5px);
        box-shadow: 0 15px 40px rgba(255, 107, 26, 0.4);
    }

    @media (max-width: 992px) {
        .content-grid {
            grid-template-columns: 1fr;
        }
        .project-meta-bar {
            margin: -30px 20px 40px;
            padding: 30px;
            gap: 24px;
        }
    }

    @media (max-width: 768px) {
        .portfolio-detail-hero {
            padding: 140px 20px 80px;
        }
        .project-title {
            font-size: 36px;
        }
        .project-gallery {
            grid-template-columns: 1fr;
        }
    }
</style>
@endpush

@section('content')

@php
    // If $project is passed from PublicContentController::portfolioShow (PortfolioProject model)
    if (isset($project) && $project instanceof \App\Models\PortfolioProject) {
        $mappedProject = (object)[
            'title' => $project->title,
            'category' => $project->category ?? 'Web Development',
            'subtitle' => $project->excerpt ?: 'A premium digital experience built for performance.',
            'client' => 'Client Project',
            'date' => $project->created_at ? $project->created_at->format('F Y') : date('F Y'),
            'role' => 'Full-Stack Development',
            'link' => $project->url,
            'tech' => $project->tech_stack ? array_map('trim', explode(',', $project->tech_stack)) : ['Laravel', 'Tailwind CSS'],
            'image' => $project->image ?: 'banner1.webp',
            'overview' => $project->description ?: 'Detailed project overview coming soon.',
            'challenge' => null,
            'solution' => null,
        ];
        $project = $mappedProject;
    }
    // Use the dynamic $page object from the CMS if available
    elseif (isset($page) && !isset($project)) {
        $project = (object)[
            'title' => $page->title,
            'category' => 'Web Development',
            'subtitle' => $page->excerpt ?: 'A complete digital transformation project focused on performance and user experience.',
            'client' => $page->title === 'Jyoti Pilot Official Website' ? 'Jyoti Pilot' : 'Global Client',
            'date' => $page->created_at ? $page->created_at->format('F Y') : date('F Y'),
            'role' => 'Full-Stack Development, UI/UX',
            'link' => $page->title === 'Jyoti Pilot Official Website' ? 'https://jyotipilot.com' : 'https://example.com',
            'tech' => ['Laravel', 'Livewire', 'Tailwind CSS', 'MySQL'],
            'image' => 'banner1.webp',
            'overview' => $page->content ?: 'Our client needed a modern, scalable solution that could handle high traffic volumes and provide a seamless experience across all devices.',
            'challenge' => 'The main challenge was creating a highly accessible platform that loads instantly, even on slower mobile networks, while maintaining a premium aesthetic.',
            'solution' => 'We chose Laravel for its robust backend capabilities and implemented a clean, responsive frontend. Aggressive caching and optimized asset delivery ensured lightning-fast load times.',
        ];
    } elseif (!isset($project)) {
        // Fallback Dummy Data
        $project = (object)[
            'title' => 'E-Commerce Replatforming',
            'category' => 'Web Development',
            'subtitle' => 'A complete overhaul of a legacy e-commerce system.',
            'client' => 'Global Retail Brand',
            'date' => 'October 2025',
            'role' => 'Full-Stack Development, UI/UX',
            'link' => 'https://example.com',
            'tech' => ['Laravel', 'Vue.js', 'Tailwind CSS', 'MySQL', 'Redis', 'AWS'],
            'image' => 'banner1.webp',
            'overview' => 'Our client was struggling with a slow legacy platform.',
            'challenge' => 'Migrating years of data without downtime.',
            'solution' => 'We utilized headless architecture for flexibility.',
        ];
    }
@endphp

<section class="portfolio-detail-hero">
    <div class="hero-content">
        <span class="category-badge">{{ $project->category }}</span>
        <h1 class="project-title">{{ $project->title }}</h1>
        <p class="project-subtitle">{{ $project->subtitle }}</p>
    </div>
</section>

<div class="project-meta-bar">
    <div class="meta-item">
        <span class="meta-label">Client</span>
        <span class="meta-value">{{ $project->client }}</span>
    </div>
    <div class="meta-item">
        <span class="meta-label">Date</span>
        <span class="meta-value">{{ $project->date }}</span>
    </div>
    <div class="meta-item">
        <span class="meta-label">Role</span>
        <span class="meta-value">{{ $project->role }}</span>
    </div>
    <div class="meta-item">
        <span class="meta-label">Live Link</span>
        <span class="meta-value">
            @if(isset($project->link))
                <a href="{{ $project->link }}" target="_blank" rel="noopener noreferrer">Visit Website ↗</a>
            @else
                N/A
            @endif
        </span>
    </div>
</div>

<div class="project-content-wrapper">
    
    <div class="project-featured-image">
        <!-- Using a placeholder/existing asset -->
        <img src="{{ asset('site-assets/' . ($project->image ?? 'banner1.webp')) }}" alt="{{ $project->title }}">
    </div>

    <div class="content-grid">
        <div class="content-main">
            <div class="content-block">
                <h2>Project Overview</h2>
                <p>{!! nl2br(e($project->overview)) !!}</p>
            </div>
            
            @if(!empty($project->challenge))
            <div class="content-block" style="margin-top: 60px;">
                <h2>The Challenge</h2>
                <p>{!! nl2br(e($project->challenge)) !!}</p>
            </div>
            @endif
            
            @if(!empty($project->solution))
            <div class="content-block" style="margin-top: 60px;">
                <h2>Our Solution</h2>
                <p>{!! nl2br(e($project->solution)) !!}</p>
            </div>
            @endif

            <div class="project-gallery">
                <div class="gallery-item full-width">
                    <img src="{{ asset('site-assets/design.png') }}" alt="Gallery Image 1" onerror="this.src='https://placehold.co/1200x600/f8fafc/cbd5e1?text=Project+Showcase'">
                    <div class="gallery-overlay">
                        <span>Homepage Interface</span>
                    </div>
                </div>
                <div class="gallery-item">
                    <img src="{{ asset('site-assets/banner1.webp') }}" alt="Gallery Image 2" onerror="this.src='https://placehold.co/600x600/f8fafc/cbd5e1?text=Detail'">
                    <div class="gallery-overlay">
                        <span>Mobile Responsiveness</span>
                    </div>
                </div>
                <div class="gallery-item">
                    <img src="{{ asset('site-assets/banner1.webp') }}" alt="Gallery Image 3" onerror="this.src='https://placehold.co/600x600/f8fafc/cbd5e1?text=Detail'">
                    <div class="gallery-overlay">
                        <span>Dashboard Analytics</span>
                    </div>
                </div>
            </div>
        </div>

        <div class="content-sidebar">
            <div class="tech-stack-card sticky" style="top: 100px;">
                <h3>Technologies Used</h3>
                <div class="tech-tags">
                    @foreach($project->tech as $tech)
                        <span>{{ $tech }}</span>
                    @endforeach
                </div>
            </div>
        </div>
    </div>

    <div class="next-project-cta">
        <h3>Ready for your next project?</h3>
        <h2>Let's build something extraordinary together.</h2>
        <a href="{{ route('quote') }}" class="btn-primary">
            Start a Conversation
            <svg width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><line x1="5" y1="12" x2="19" y2="12"></line><polyline points="12 5 19 12 12 19"></polyline></svg>
        </a>
    </div>

</div>

@endsection
