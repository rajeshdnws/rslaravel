@extends('site.layout')

@push('head')
<style>
    .service-detail-hero {
        background: radial-gradient(circle at top right, #0f172a 0%, #020617 100%);
        padding: 120px 20px 80px;
        color: #fff;
        position: relative;
        overflow: hidden;
        margin-top: -80px;
    }
    .service-detail-hero::before {
        content: '';
        position: absolute;
        top: -20%;
        right: -10%;
        width: 800px;
        height: 800px;
        background: radial-gradient(circle, rgba(255,107,26,0.15) 0%, transparent 60%);
        pointer-events: none;
    }
    .service-detail-container {
        max-width: 1200px;
        margin: 0 auto;
        position: relative;
        z-index: 10;
        display: grid;
        grid-template-columns: 1fr 1fr;
        gap: 60px;
        align-items: center;
    }
    @media (max-width: 992px) {
        .service-detail-container {
            grid-template-columns: 1fr;
            text-align: center;
        }
    }
    .sd-eyebrow {
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
    .service-detail-hero h1 {
        font-size: 52px;
        font-weight: 800;
        line-height: 1.1;
        margin-bottom: 24px;
        color: #ffffff;
    }
    .service-detail-hero p.sd-excerpt {
        font-size: 20px;
        color: #94a3b8;
        line-height: 1.6;
        margin-bottom: 40px;
    }
    .sd-hero-actions {
        display: flex;
        gap: 16px;
        flex-wrap: wrap;
    }
    @media (max-width: 992px) {
        .sd-hero-actions {
            justify-content: center;
        }
    }
    .sd-hero-visual {
        background: rgba(255,255,255,0.03);
        border: 1px solid rgba(255,255,255,0.08);
        border-radius: 32px;
        padding: 40px;
        display: flex;
        align-items: center;
        justify-content: center;
        box-shadow: 0 20px 40px rgba(0,0,0,0.2);
        backdrop-filter: blur(10px);
    }
    .sd-hero-visual svg {
        width: 120px;
        height: 120px;
        color: #ff6b1a;
        opacity: 0.9;
    }

    /* Content Area */
    .sd-content-section {
        background: #f8fafc;
        padding: 80px 20px;
    }
    .sd-content-wrapper {
        max-width: 1000px;
        margin: 0 auto;
        background: #ffffff;
        border-radius: 24px;
        padding: 60px;
        box-shadow: 0 10px 30px rgba(0,0,0,0.03);
        border: 1px solid rgba(15,23,42,0.05);
    }
    @media (max-width: 768px) {
        .sd-content-wrapper {
            padding: 30px 20px;
        }
    }
    
    .sd-content {
        font-size: 18px;
        line-height: 1.8;
        color: #475569;
    }
    /* Fix DB formatting */
    .sd-content .row {
        display: block !important;
        margin: 0 !important;
    }
    .sd-content [class*="col-"] {
        width: 100% !important;
        max-width: 100% !important;
        flex: none !important;
        border: none !important;
        padding: 0 !important;
        margin: 0 !important;
    }
    .sd-content h2, .sd-content h3, .sd-content h4 {
        color: #0f172a;
        font-weight: 800;
        margin-top: 40px;
        margin-bottom: 20px;
    }
    .sd-content h2 { font-size: 32px; }
    .sd-content h3 { font-size: 26px; }
    .sd-content ul {
        padding-left: 20px;
        margin-bottom: 24px;
    }
    .sd-content li {
        margin-bottom: 12px;
        position: relative;
    }
    .sd-content li::marker {
        color: #ff6b1a;
        font-weight: bold;
    }
</style>
@endpush

@section('content')
<section class="service-detail-hero">
    <div class="service-detail-container">
        <div>
            <span class="sd-eyebrow">Premium Service</span>
            <h1>{{ $page->title }}</h1>
            @if ($page->excerpt)
                <p class="sd-excerpt">{{ $page->excerpt }}</p>
            @endif
            <div class="sd-hero-actions">
                <a href="{{ route('quote') }}" class="button primary">Request a Quote</a>
                <a href="{{ route('portfolio') }}" class="button" style="background: rgba(255,255,255,0.1); border-color: rgba(255,255,255,0.2); color: #fff;">View Our Work</a>
            </div>
        </div>
        <div class="sd-hero-visual">
            <svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round">
                <polygon points="12 2 2 7 12 12 22 7 12 2"></polygon>
                <polyline points="2 17 12 22 22 17"></polyline>
                <polyline points="2 12 12 17 22 12"></polyline>
            </svg>
        </div>
    </div>
</section>

<section class="sd-content-section">
    <div class="sd-content-wrapper">
        <div class="sd-content">
            {!! $content !!}
        </div>
    </div>
</section>

@include('site.partials.lead-cta')
@endsection
