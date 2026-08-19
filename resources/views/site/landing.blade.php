@extends('site.layout')

@push('head')
<style>
    .landing-hero {
        background: radial-gradient(circle at center, #0f172a 0%, #020617 100%);
        padding: 160px 20px 120px;
        text-align: center;
        color: #fff;
        position: relative;
        overflow: hidden;
        margin-top: -80px;
    }
    .landing-hero::before {
        content: '';
        position: absolute;
        top: 0;
        left: 50%;
        transform: translateX(-50%);
        width: 1000px;
        height: 1000px;
        background: radial-gradient(circle, rgba(255,107,26,0.15) 0%, transparent 60%);
        pointer-events: none;
    }
    .landing-hero h1 {
        font-size: 64px;
        font-weight: 800;
        max-width: 900px;
        margin: 0 auto 30px;
        line-height: 1.1;
        background: linear-gradient(to right, #ffffff, #cbd5e1);
        -webkit-background-clip: text;
        -webkit-text-fill-color: transparent;
    }
    .landing-hero p {
        font-size: 22px;
        color: #94a3b8;
        max-width: 700px;
        margin: 0 auto 40px;
        line-height: 1.6;
    }
    .landing-actions {
        display: flex;
        justify-content: center;
        gap: 16px;
    }
    .landing-button {
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
    .landing-button:hover {
        transform: translateY(-3px);
        box-shadow: 0 15px 40px rgba(255, 107, 26, 0.4);
    }
    .landing-secondary-button {
        display: inline-block;
        padding: 16px 40px;
        background: rgba(255,255,255,0.05);
        color: #fff;
        font-size: 16px;
        font-weight: 700;
        text-decoration: none;
        border-radius: 100px;
        border: 1px solid rgba(255,255,255,0.1);
        transition: all 0.3s ease;
    }
    .landing-secondary-button:hover {
        background: rgba(255,255,255,0.1);
    }
    
    @media (max-width: 768px) {
        .landing-hero h1 {
            font-size: 42px;
        }
        .landing-actions {
            flex-direction: column;
        }
    }

    .landing-content-section {
        padding: 100px 20px;
        background: #ffffff;
    }
    .landing-content-wrapper {
        max-width: 1000px;
        margin: 0 auto;
    }
    .landing-content {
        font-size: 18px;
        color: #334155;
        line-height: 1.8;
    }
    .landing-content h2, .landing-content h3 {
        color: #0f172a;
        font-weight: 800;
        margin-top: 40px;
        margin-bottom: 20px;
    }
    .landing-content h2 { font-size: 36px; }
    .landing-content h3 { font-size: 28px; }
    
    /* Fix DB formatting */
    .landing-content .row {
        display: block !important;
        margin: 0 !important;
    }
    .landing-content [class*="col-"] {
        width: 100% !important;
        max-width: 100% !important;
        flex: none !important;
        border: none !important;
        padding: 0 !important;
        margin: 0 !important;
    }
</style>
@endpush

@section('content')
<section class="landing-hero">
    <h1>{{ $page->title }}</h1>
    @if ($page->excerpt)
        <p>{{ $page->excerpt }}</p>
    @endif
    <div class="landing-actions">
        <a href="{{ route('quote') }}" class="landing-button">Start Your Project</a>
        <a href="{{ route('portfolio') }}" class="landing-secondary-button">See Our Work</a>
    </div>
</section>

<section class="landing-content-section">
    <div class="landing-content-wrapper">
        <div class="landing-content">
            {!! $content !!}
        </div>
    </div>
</section>

@include('site.partials.lead-cta')
@endsection
