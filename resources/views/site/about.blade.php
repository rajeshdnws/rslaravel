@extends('site.layout')

@push('head')
<style>
    .about-page-hero {
        background: radial-gradient(circle at center, #0f172a 0%, #020617 100%);
        padding: 140px 20px 100px;
        text-align: center;
        color: #fff;
        position: relative;
        overflow: hidden;
        margin-top: -80px;
    }
    .about-page-hero::before {
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
    .about-page-hero h1 {
        font-size: 64px;
        font-weight: 800;
        margin-bottom: 24px;
        background: linear-gradient(to right, #ffffff, #cbd5e1);
        -webkit-background-clip: text;
        -webkit-text-fill-color: transparent;
    }
    .about-page-hero p {
        font-size: 22px;
        color: #94a3b8;
        max-width: 800px;
        margin: 0 auto;
        line-height: 1.6;
    }

    .about-content-section {
        padding: 100px 20px;
        background: #f8fafc;
    }
    .about-content-wrapper {
        max-width: 1000px;
        margin: 0 auto;
    }

    /* DB Content Styling */
    .about-grid {
        display: grid;
        grid-template-columns: 1fr 1fr;
        gap: 40px;
        margin-bottom: 60px;
    }
    @media (max-width: 768px) {
        .about-grid {
            grid-template-columns: 1fr;
        }
    }
    .about-card {
        background: #ffffff;
        border-radius: 20px;
        padding: 40px;
        box-shadow: 0 10px 30px rgba(0,0,0,0.04);
        border: 1px solid rgba(15,23,42,0.05);
        transition: transform 0.3s ease;
    }
    .about-card:hover {
        transform: translateY(-5px);
    }
    .about-card h3 {
        font-size: 24px;
        font-weight: 800;
        color: #0f172a;
        margin-bottom: 16px;
        display: flex;
        align-items: center;
        gap: 12px;
    }
    .about-card h3::before {
        content: '';
        display: block;
        width: 12px;
        height: 12px;
        border-radius: 50%;
        background: #ff6b1a;
    }
    .about-card p {
        font-size: 16px;
        color: #475569;
        line-height: 1.8;
    }

    .premium-list {
        list-style: none;
        padding: 0;
        margin-bottom: 60px;
    }
    .premium-list li {
        position: relative;
        padding-left: 32px;
        margin-bottom: 16px;
        font-size: 18px;
        color: #334155;
        line-height: 1.6;
    }
    .premium-list li::before {
        content: '✓';
        position: absolute;
        left: 0;
        top: 2px;
        color: #ff6b1a;
        font-weight: 800;
        font-size: 18px;
    }
    
    .stats-grid {
        display: grid;
        grid-template-columns: repeat(4, 1fr);
        gap: 30px;
        margin-top: 20px;
    }
    @media (max-width: 992px) {
        .stats-grid {
            grid-template-columns: repeat(2, 1fr);
        }
    }
    .stat-item {
        background: #0f172a;
        border-radius: 20px;
        padding: 40px 20px;
        text-align: center;
        color: #fff;
        position: relative;
        overflow: hidden;
    }
    .stat-item::after {
        content: '';
        position: absolute;
        bottom: -20px;
        right: -20px;
        width: 100px;
        height: 100px;
        background: radial-gradient(circle, rgba(255,107,26,0.2) 0%, transparent 70%);
        border-radius: 50%;
    }
    .stat-item h4 {
        font-size: 48px;
        font-weight: 800;
        margin-bottom: 8px;
        color: #ff8c42;
    }
    .stat-item p {
        font-size: 16px;
        color: #cbd5e1;
        font-weight: 600;
        text-transform: uppercase;
        letter-spacing: 0.05em;
    }

    .about-content-wrapper h2 {
        font-size: 36px;
        font-weight: 800;
        color: #0f172a;
    }
</style>
@endpush

@section('content')
<section class="about-page-hero">
    <h1>{{ $page->title }}</h1>
    @if ($page->excerpt)
        <p>{{ $page->excerpt }}</p>
    @endif
</section>

<section class="about-content-section">
    <div class="about-content-wrapper">
        {!! $content !!}
    </div>
</section>

@include('site.partials.lead-cta')
@endsection
