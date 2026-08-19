@extends('site.layout')

@push('head')
<style>
    .tech-detail-hero {
        background: #020617;
        padding: 140px 20px 100px;
        position: relative;
        overflow: hidden;
        margin-top: -80px;
        border-bottom: 1px solid rgba(255,255,255,0.05);
    }
    .tech-grid-bg {
        position: absolute;
        inset: 0;
        background-image: 
            linear-gradient(rgba(255, 255, 255, 0.03) 1px, transparent 1px),
            linear-gradient(90deg, rgba(255, 255, 255, 0.03) 1px, transparent 1px);
        background-size: 50px 50px;
        opacity: 0.3;
        pointer-events: none;
    }
    .tech-hero-glow {
        position: absolute;
        top: 0;
        left: 50%;
        transform: translateX(-50%);
        width: 600px;
        height: 600px;
        background: radial-gradient(circle, rgba(255,107,26,0.15) 0%, transparent 70%);
        pointer-events: none;
    }
    .tech-detail-container {
        max-width: 900px;
        margin: 0 auto;
        text-align: center;
        position: relative;
        z-index: 10;
    }
    .td-eyebrow {
        font-family: monospace;
        display: inline-block;
        padding: 8px 20px;
        background: rgba(255, 107, 26, 0.1);
        border: 1px solid rgba(255, 107, 26, 0.2);
        color: #ff8c42;
        font-size: 14px;
        letter-spacing: 0.05em;
        margin-bottom: 24px;
    }
    .tech-detail-hero h1 {
        font-size: 56px;
        font-weight: 800;
        color: #ffffff;
        margin-bottom: 24px;
        line-height: 1.1;
    }
    .tech-detail-hero p {
        font-size: 20px;
        color: #94a3b8;
        line-height: 1.6;
    }

    .td-content-section {
        background: #0f172a;
        padding: 80px 20px;
    }
    .td-content-wrapper {
        max-width: 900px;
        margin: 0 auto;
        background: rgba(255,255,255,0.02);
        border: 1px solid rgba(255,255,255,0.05);
        border-radius: 24px;
        padding: 60px;
        backdrop-filter: blur(20px);
    }
    @media (max-width: 768px) {
        .td-content-wrapper {
            padding: 30px 20px;
        }
        .tech-detail-hero h1 {
            font-size: 40px;
        }
    }
    .td-content {
        color: #cbd5e1;
        font-size: 18px;
        line-height: 1.8;
    }
    .td-content h2, .td-content h3 {
        color: #ffffff;
        font-weight: 700;
        margin-top: 40px;
        margin-bottom: 20px;
    }
    .td-content h2 { font-size: 32px; }
    .td-content h3 { font-size: 24px; }
    .td-content a {
        color: #ff8c42;
        text-decoration: none;
    }
    .td-content a:hover {
        text-decoration: underline;
    }
    .td-content ul {
        padding-left: 20px;
        margin-bottom: 24px;
    }
    .td-content li {
        margin-bottom: 12px;
    }
    .td-content li::marker {
        color: #ff6b1a;
    }
    /* Fix DB formatting */
    .td-content .row {
        display: block !important;
        margin: 0 !important;
    }
    .td-content [class*="col-"] {
        width: 100% !important;
        max-width: 100% !important;
        flex: none !important;
        border: none !important;
        padding: 0 !important;
        margin: 0 !important;
    }
    .td-content .shadow {
        box-shadow: none !important;
        background: none !important;
        padding: 0 !important;
    }
</style>
@endpush

@section('content')
<section class="tech-detail-hero">
    <div class="tech-grid-bg"></div>
    <div class="tech-hero-glow"></div>
    <div class="tech-detail-container">
        <span class="td-eyebrow">&lt; TechnologyStack /&gt;</span>
        <h1>{{ $page->title }}</h1>
        @if ($page->excerpt)
            <p>{{ $page->excerpt }}</p>
        @endif
    </div>
</section>

<section class="td-content-section">
    <div class="td-content-wrapper">
        <div class="td-content">
            {!! $content !!}
        </div>
    </div>
</section>

@include('site.partials.lead-cta')
@endsection
