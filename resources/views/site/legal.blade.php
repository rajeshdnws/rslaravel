@extends('site.layout')

@push('head')
<style>
    .legal-hero {
        background: #f8fafc;
        padding: 100px 20px 60px;
        text-align: center;
        border-bottom: 1px solid #e2e8f0;
    }
    .legal-eyebrow {
        display: inline-block;
        padding: 6px 16px;
        background: rgba(15, 23, 42, 0.05);
        border: 1px solid rgba(15, 23, 42, 0.1);
        border-radius: 100px;
        color: #475569;
        font-size: 14px;
        font-weight: 700;
        text-transform: uppercase;
        letter-spacing: 0.1em;
        margin-bottom: 24px;
    }
    .legal-hero h1 {
        font-size: 48px;
        font-weight: 800;
        color: #0f172a;
        margin-bottom: 24px;
        line-height: 1.2;
    }
    .legal-hero p {
        font-size: 18px;
        color: #64748b;
        max-width: 600px;
        margin: 0 auto;
    }
    .legal-content-wrapper {
        max-width: 1000px;
        margin: 60px auto 100px;
        padding: 0 40px;
        background: #fff;
        border: none;
    }
    .legal-content {
        font-size: 17px;
        line-height: 1.8;
        color: #334155;
    }
    .legal-content h2 {
        font-size: 28px;
        font-weight: 700;
        color: #0f172a;
        margin: 48px 0 24px;
        padding-bottom: 12px;
        border-bottom: 1px solid #f1f5f9;
    }
    .legal-content h3 {
        font-size: 22px;
        font-weight: 600;
        color: #1e293b;
        margin: 32px 0 16px;
    }
    .legal-content p {
        margin-bottom: 20px;
    }
    .legal-content ul {
        margin: 0 0 24px 0;
        padding-left: 24px;
    }
    .legal-content li {
        margin-bottom: 12px;
    }
    .legal-content a {
        color: #ff6b1a;
        text-decoration: none;
        font-weight: 500;
    }
    .legal-content a:hover {
        text-decoration: underline;
    }
    
    /* Override hardcoded DB styles */
    .legal-content .row {
        display: block !important;
        margin: 0 !important;
    }
    .legal-content [class*="col-"] {
        width: 100% !important;
        max-width: 100% !important;
        flex: none !important;
        border: none !important;
        padding: 0 !important;
        margin: 0 !important;
    }
    .legal-content .shadow {
        box-shadow: none !important;
        padding: 0 !important;
    }

    .last-updated {
        display: inline-flex;
        align-items: center;
        gap: 8px;
        margin-top: 32px;
        padding: 12px 20px;
        background: #f1f5f9;
        border-radius: 8px;
        font-size: 14px;
        color: #64748b;
        font-weight: 600;
    }
    
    @media (max-width: 768px) {
        .legal-hero {
            padding: 80px 20px 40px;
        }
        .legal-hero h1 {
            font-size: 36px;
        }
        .legal-content h2 {
            font-size: 24px;
        }
    }
</style>
@endpush

@section('content')
<section class="legal-hero">
    <span class="legal-eyebrow">Legal Document</span>
    <h1>{{ $page->title }}</h1>
    @if ($page->excerpt)
        <p>{{ $page->excerpt }}</p>
    @endif
    
    <div class="last-updated">
        <svg width="16" height="16" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><circle cx="12" cy="12" r="10"></circle><polyline points="12 6 12 12 16 14"></polyline></svg>
        Last Updated: {{ $page->updated_at->format('F j, Y') }}
    </div>
</section>

<div class="legal-content-wrapper">
    <div class="legal-content">
        {!! $content !!}
    </div>
</div>
@endsection
