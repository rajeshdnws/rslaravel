@extends('site.layout')

@push('head')
<style>
    :root {
        --blog-primary: #ff6b1a;
        --blog-primary-hover: #e85a0c;
        --blog-dark: #0f172a;
        --blog-text: #334155;
        --blog-muted: #64748b;
        --blog-bg: #f8fafc;
        --blog-surface: #ffffff;
    }

    .blog-hero {
        background: radial-gradient(circle at top center, #1e293b 0%, #0f172a 100%);
        padding: 140px 20px 80px;
        text-align: center;
        color: #ffffff;
        position: relative;
        overflow: hidden;
        margin-top: -80px;
    }
    .blog-hero::before {
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
    .blog-eyebrow {
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
    .blog-hero h1 {
        font-size: 56px;
        font-weight: 800;
        line-height: 1.1;
        margin-bottom: 24px;
        background: linear-gradient(to right, #ffffff, #94a3b8);
        -webkit-background-clip: text;
        -webkit-text-fill-color: transparent;
        position: relative;
        z-index: 2;
    }
    .blog-hero p {
        font-size: 20px;
        color: #cbd5e1;
        max-width: 600px;
        margin: 0 auto;
        line-height: 1.6;
        position: relative;
        z-index: 2;
    }

    .blog-grid-section {
        padding: 80px 20px;
        background: var(--blog-bg);
    }
    .blog-grid {
        max-width: 1200px;
        margin: 0 auto;
        display: grid;
        grid-template-columns: repeat(auto-fill, minmax(340px, 1fr));
        gap: 40px;
    }

    .blog-card {
        background: var(--blog-surface);
        border-radius: 20px;
        overflow: hidden;
        border: 1px solid rgba(15,23,42,0.05);
        box-shadow: 0 10px 30px rgba(0,0,0,0.03);
        transition: all 0.4s cubic-bezier(0.16, 1, 0.3, 1);
        display: flex;
        flex-direction: column;
        text-decoration: none;
        height: 100%;
    }
    .blog-card:hover {
        transform: translateY(-8px);
        box-shadow: 0 20px 40px rgba(0,0,0,0.08);
        border-color: rgba(255,107,26,0.2);
    }

    .blog-card-content {
        padding: 32px;
        display: flex;
        flex-direction: column;
        flex-grow: 1;
    }

    .blog-card-category {
        display: inline-block;
        font-size: 13px;
        font-weight: 700;
        color: var(--blog-primary);
        text-transform: uppercase;
        letter-spacing: 0.05em;
        margin-bottom: 16px;
    }

    .blog-card h2 {
        font-size: 24px;
        font-weight: 800;
        color: var(--blog-dark);
        line-height: 1.3;
        margin-bottom: 16px;
        transition: color 0.3s ease;
    }
    .blog-card:hover h2 {
        color: var(--blog-primary);
    }

    .blog-card p {
        font-size: 16px;
        color: var(--blog-muted);
        line-height: 1.6;
        margin-bottom: 24px;
        flex-grow: 1;
    }

    .blog-card-footer {
        display: flex;
        align-items: center;
        justify-content: space-between;
        margin-top: auto;
        padding-top: 20px;
        border-top: 1px solid #f1f5f9;
    }

    .blog-author-info {
        display: flex;
        align-items: center;
        gap: 10px;
    }
    .blog-author-avatar {
        width: 32px;
        height: 32px;
        border-radius: 50%;
        background: #e2e8f0;
        display: flex;
        align-items: center;
        justify-content: center;
        font-size: 12px;
        font-weight: 700;
        color: var(--blog-dark);
    }
    .blog-author-name {
        font-size: 14px;
        font-weight: 600;
        color: var(--blog-dark);
    }

    .blog-read-more {
        font-size: 14px;
        font-weight: 700;
        color: var(--blog-primary);
        display: flex;
        align-items: center;
        gap: 4px;
        transition: gap 0.3s ease;
    }
    .blog-card:hover .blog-read-more {
        gap: 8px;
    }

    /* Empty State */
    .blog-empty {
        text-align: center;
        padding: 100px 20px;
        background: var(--blog-surface);
        border-radius: 24px;
        max-width: 600px;
        margin: 0 auto;
        border: 1px dashed #cbd5e1;
    }
    .blog-empty h2 {
        font-size: 24px;
        color: var(--blog-dark);
        margin-bottom: 12px;
    }

    /* Pagination Styling */
    .pagination-wrap {
        display: flex;
        justify-content: center;
        padding: 0 20px 80px;
        background: var(--blog-bg);
    }
    .pagination-wrap nav {
        background: #fff;
        padding: 8px;
        border-radius: 100px;
        box-shadow: 0 10px 20px rgba(0,0,0,0.03);
    }
    .pagination-wrap .page-link, .pagination-wrap .page-item span {
        display: inline-flex;
        align-items: center;
        justify-content: center;
        min-width: 40px;
        height: 40px;
        padding: 0 12px;
        border-radius: 100px;
        font-weight: 600;
        color: var(--blog-text);
        margin: 0 4px;
        transition: all 0.3s ease;
        border: none;
        background: transparent;
    }
    .pagination-wrap .page-item.active .page-link {
        background: var(--blog-primary);
        color: #fff;
    }
    .pagination-wrap .page-link:hover:not(.active) {
        background: #f1f5f9;
        color: var(--blog-primary);
    }
</style>
@endpush

@section('content')
<section class="blog-hero">
    <span class="blog-eyebrow">Our Insights</span>
    <h1>Digital Growth & Engineering</h1>
    <p>Discover actionable insights, technical guides, and strategies for better websites, applications, and digital business.</p>
</section>

<section class="blog-grid-section">
    <div class="blog-grid">
        @forelse ($posts as $post)
            <a href="{{ route('blog.show', $post->slug) }}" class="blog-card">
                <div class="blog-card-content">
                    <span class="blog-card-category">{{ $post->category?->name ?? 'Technology' }}</span>
                    <h2>{{ $post->title }}</h2>
                    <p>{{ \Illuminate\Support\Str::limit(trim(preg_replace('/\s+/', ' ', strip_tags($post->excerpt ?: $post->content))), 140) }}</p>
                    
                    <div class="blog-card-footer">
                        <div class="blog-author-info">
                            <div class="blog-author-avatar">
                                {{ strtoupper(substr($post->author ?? 'RS', 0, 2)) }}
                            </div>
                            <span class="blog-author-name">{{ $post->author ?? 'RS Orange Tech' }}</span>
                        </div>
                        <span class="blog-read-more">Read <svg width="16" height="16" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><line x1="5" y1="12" x2="19" y2="12"></line><polyline points="12 5 19 12 12 19"></polyline></svg></span>
                    </div>
                </div>
            </a>
        @empty
            <div style="grid-column: 1 / -1;">
                <div class="blog-empty">
                    <svg width="48" height="48" viewBox="0 0 24 24" fill="none" stroke="#cbd5e1" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round" style="margin-bottom:20px;"><path d="M14 2H6a2 2 0 0 0-2 2v16a2 2 0 0 0 2 2h12a2 2 0 0 0 2-2V8z"></path><polyline points="14 2 14 8 20 8"></polyline><line x1="16" y1="13" x2="8" y2="13"></line><line x1="16" y1="17" x2="8" y2="17"></line><polyline points="10 9 9 9 8 9"></polyline></svg>
                    <h2>No published posts yet</h2>
                    <p style="color:var(--blog-muted);">Stay tuned! We're preparing some great content for you.</p>
                </div>
            </div>
        @endforelse
    </div>
</section>

@if ($posts->hasPages())
    <section class="pagination-wrap">
        {{ $posts->links() }}
    </section>
@endif
@endsection
