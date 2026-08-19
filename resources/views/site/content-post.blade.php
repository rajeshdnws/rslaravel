@extends('site.layout')

@push('head')
<style>
    :root {
        --post-primary: #ff6b1a;
        --post-primary-hover: #e85a0c;
        --post-dark: #0f172a;
        --post-text: #334155;
        --post-muted: #64748b;
        --post-bg: #f8fafc;
        --post-surface: #ffffff;
    }

    /* Reading Progress Bar */
    .reading-progress-container {
        position: fixed;
        top: 0;
        left: 0;
        width: 100%;
        height: 4px;
        background: transparent;
        z-index: 1000;
        pointer-events: none;
    }
    .reading-progress-bar {
        height: 100%;
        background: linear-gradient(90deg, #ff6b1a, #ff8c42);
        width: 0%;
        transition: width 0.1s ease-out;
    }

    /* Hero Section */
    .post-hero {
        background: radial-gradient(circle at top right, #1e293b 0%, #0f172a 100%);
        padding: 140px 20px 100px;
        text-align: center;
        color: #ffffff;
        position: relative;
        margin-top: -80px; /* pull up behind transparent header if applicable */
        overflow: hidden;
    }
    .post-hero::before {
        content: '';
        position: absolute;
        top: -30%;
        left: 50%;
        transform: translateX(-50%);
        width: 800px;
        height: 800px;
        background: radial-gradient(circle, rgba(255,107,26,0.15) 0%, transparent 60%);
        pointer-events: none;
    }
    .post-hero-inner {
        max-width: 1000px;
        margin: 0 auto;
        position: relative;
        z-index: 2;
    }
    .post-category-badge {
        display: inline-flex;
        align-items: center;
        padding: 6px 16px;
        background: rgba(255, 107, 26, 0.1);
        border: 1px solid rgba(255, 107, 26, 0.3);
        border-radius: 100px;
        color: #ff8c42;
        font-size: 13px;
        font-weight: 700;
        text-transform: uppercase;
        letter-spacing: 0.1em;
        margin-bottom: 24px;
        transition: all 0.3s ease;
    }
    .post-category-badge:hover {
        background: rgba(255, 107, 26, 0.2);
    }
    .post-hero h1 {
        font-size: 48px;
        font-weight: 800;
        line-height: 1.2;
        margin-bottom: 32px;
        letter-spacing: -0.02em;
        background: linear-gradient(to right, #ffffff, #cbd5e1);
        -webkit-background-clip: text;
        -webkit-text-fill-color: transparent;
    }
    @media (max-width: 768px) {
        .post-hero h1 {
            font-size: 36px;
        }
    }
    .post-meta-strip {
        display: flex;
        align-items: center;
        justify-content: center;
        gap: 20px;
        font-size: 15px;
        color: #94a3b8;
    }
    .post-meta-author {
        display: flex;
        align-items: center;
        gap: 12px;
    }
    .post-meta-avatar {
        width: 40px;
        height: 40px;
        border-radius: 50%;
        background: linear-gradient(135deg, #334155, #1e293b);
        display: flex;
        align-items: center;
        justify-content: center;
        color: #fff;
        font-weight: 700;
        border: 2px solid #334155;
    }
    .post-meta-date {
        display: flex;
        align-items: center;
        gap: 6px;
    }

    /* Post Content Layout */
    .post-layout {
        background: var(--post-bg);
        padding: 80px 20px;
    }
    .post-container {
        max-width: 1000px;
        margin: 0 auto;
        background: var(--post-surface);
        border-radius: 24px;
        padding: 60px;
        box-shadow: 0 20px 40px rgba(0,0,0,0.03);
        position: relative;
        margin-top: -60px;
        z-index: 10;
        border: 1px solid rgba(15,23,42,0.05);
    }
    @media (max-width: 768px) {
        .post-container {
            padding: 30px 20px;
            border-radius: 16px;
        }
    }

    /* Typography & Content Styles */
    .wp-content {
        font-size: 18px;
        line-height: 1.8;
        color: var(--post-text);
        font-family: inherit;
    }
    .wp-content p {
        margin-bottom: 1.8em;
    }
    .wp-content p:first-of-type::first-letter {
        float: left;
        font-size: 4.5em;
        line-height: 0.8;
        padding-right: 12px;
        padding-top: 4px;
        font-weight: 800;
        color: var(--post-primary);
    }
    .wp-content h2 {
        font-size: 32px;
        font-weight: 800;
        color: var(--post-dark);
        margin: 2em 0 1em;
        line-height: 1.3;
        letter-spacing: -0.01em;
    }
    .wp-content h3 {
        font-size: 24px;
        font-weight: 700;
        color: var(--post-dark);
        margin: 1.5em 0 0.8em;
    }
    .wp-content a {
        color: var(--post-primary);
        text-decoration: underline;
        text-decoration-color: rgba(255,107,26,0.3);
        text-decoration-thickness: 2px;
        text-underline-offset: 4px;
        transition: all 0.3s ease;
    }
    .wp-content a:hover {
        color: var(--post-primary-hover);
        text-decoration-color: var(--post-primary-hover);
    }
    .wp-content ul, .wp-content ol {
        margin-bottom: 1.8em;
        padding-left: 20px;
    }
    .wp-content li {
        margin-bottom: 0.8em;
        position: relative;
    }
    .wp-content ul li::marker {
        color: var(--post-primary);
    }
    .wp-content blockquote {
        margin: 2.5em 0;
        padding: 30px;
        background: rgba(255, 107, 26, 0.05);
        border-left: 4px solid var(--post-primary);
        border-radius: 0 16px 16px 0;
        font-size: 20px;
        font-style: italic;
        color: var(--post-dark);
        line-height: 1.6;
    }
    .wp-content img {
        max-width: 100%;
        height: auto;
        border-radius: 16px;
        margin: 2em 0;
        box-shadow: 0 10px 30px rgba(0,0,0,0.05);
    }
    .wp-content pre {
        background: #1e293b;
        color: #f8fafc;
        padding: 20px;
        border-radius: 12px;
        overflow-x: auto;
        margin: 2em 0;
        font-size: 15px;
    }
    .wp-content code {
        background: rgba(15,23,42,0.05);
        padding: 2px 6px;
        border-radius: 4px;
        color: #e30a17;
        font-size: 0.9em;
    }
    .wp-content pre code {
        background: transparent;
        padding: 0;
        color: inherit;
    }

    /* Footer / Back link */
    .post-footer {
        margin-top: 60px;
        padding-top: 30px;
        border-top: 1px solid #e2e8f0;
        display: flex;
        justify-content: space-between;
        align-items: center;
    }
    .back-to-blog {
        display: inline-flex;
        align-items: center;
        gap: 8px;
        color: var(--post-muted);
        font-weight: 600;
        text-decoration: none;
        transition: color 0.3s ease;
    }
    .back-to-blog:hover {
        color: var(--post-primary);
    }
    .share-buttons {
        display: flex;
        gap: 12px;
    }
    .share-btn {
        width: 36px;
        height: 36px;
        border-radius: 50%;
        background: var(--post-bg);
        display: flex;
        align-items: center;
        justify-content: center;
        color: var(--post-muted);
        transition: all 0.3s ease;
    }
    .share-btn:hover {
        background: var(--post-primary);
        color: #fff;
        transform: translateY(-2px);
    }
</style>
@endpush

@section('content')
<div class="reading-progress-container">
    <div class="reading-progress-bar" id="readingProgress"></div>
</div>

<article class="post-wrapper">
    <header class="post-hero">
        <div class="post-hero-inner">
            <span class="post-category-badge">{{ $post->category?->name ?? 'Blog' }}</span>
            <h1>{{ $post->title }}</h1>
            
            <div class="post-meta-strip">
                <div class="post-meta-author">
                    <div class="post-meta-avatar">
                        {{ strtoupper(substr($post->author ?? 'RS', 0, 2)) }}
                    </div>
                    <span>{{ $post->author ?? 'RS Orange Tech' }}</span>
                </div>
                
                @if ($post->published_at)
                <div class="post-meta-date">
                    <svg width="16" height="16" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><rect x="3" y="4" width="18" height="18" rx="2" ry="2"></rect><line x1="16" y1="2" x2="16" y2="6"></line><line x1="8" y1="2" x2="8" y2="6"></line><line x1="3" y1="10" x2="21" y2="10"></line></svg>
                    {{ $post->published_at->format('M j, Y') }}
                </div>
                @endif
                
                <div class="post-meta-time">
                    <svg width="16" height="16" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" style="display:inline;vertical-align:text-bottom;margin-right:4px;"><circle cx="12" cy="12" r="10"></circle><polyline points="12 6 12 12 16 14"></polyline></svg>
                    {{ max(1, ceil(str_word_count(strip_tags($content)) / 200)) }} min read
                </div>
            </div>
        </div>
    </header>

    <div class="post-layout">
        <div class="post-container">
            <div class="wp-content" id="postContent">
                {!! $content !!}
            </div>
            
            <footer class="post-footer">
                <a href="{{ route('blog') }}" class="back-to-blog">
                    <svg width="18" height="18" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><line x1="19" y1="12" x2="5" y2="12"></line><polyline points="12 19 5 12 12 5"></polyline></svg>
                    Back to Articles
                </a>
                
                <div class="share-buttons">
                    <a href="https://twitter.com/intent/tweet?text={{ urlencode($post->title) }}&url={{ urlencode(request()->url()) }}" target="_blank" class="share-btn" aria-label="Share on Twitter">
                        <svg width="16" height="16" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><path d="M23 3a10.9 10.9 0 0 1-3.14 1.53 4.48 4.48 0 0 0-7.86 3v1A10.66 10.66 0 0 1 3 4s-4 9 5 13a11.64 11.64 0 0 1-7 2c9 5 20 0 20-11.5a4.5 4.5 0 0 0-.08-.83A7.72 7.72 0 0 0 23 3z"></path></svg>
                    </a>
                    <a href="https://www.linkedin.com/shareArticle?mini=true&url={{ urlencode(request()->url()) }}&title={{ urlencode($post->title) }}" target="_blank" class="share-btn" aria-label="Share on LinkedIn">
                        <svg width="16" height="16" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><path d="M16 8a6 6 0 0 1 6 6v7h-4v-7a2 2 0 0 0-2-2 2 2 0 0 0-2 2v7h-4v-7a6 6 0 0 1 6-6z"></path><rect x="2" y="9" width="4" height="12"></rect><circle cx="4" cy="4" r="2"></circle></svg>
                    </a>
                </div>
            </footer>
        </div>
    </div>
</article>
@endsection

@push('scripts')
<script>
    document.addEventListener('DOMContentLoaded', function() {
        const progressBar = document.getElementById('readingProgress');
        const postContainer = document.getElementById('postContent');
        
        if (progressBar && postContainer) {
            window.addEventListener('scroll', function() {
                const scrollPos = window.scrollY;
                const postTop = postContainer.offsetTop;
                const postHeight = postContainer.clientHeight;
                const windowHeight = window.innerHeight;
                
                let progress = 0;
                
                if (scrollPos > postTop) {
                    progress = ((scrollPos - postTop) / (postHeight - windowHeight + 100)) * 100;
                    progress = Math.min(100, Math.max(0, progress));
                }
                
                progressBar.style.width = progress + '%';
            });
        }
    });
</script>
@endpush
