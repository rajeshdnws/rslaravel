@extends('site.layout')

@section('content')
<section class="page-hero compact">
    <div>
        <p class="eyebrow">WordPress Import</p>
        <h1>Imported Website Content</h1>
        <p>Published posts, pages, and custom content from <code>public/rstech.sql</code>.</p>
    </div>
</section>

<section class="section grid">
    @forelse ($items as $item)
        <article class="card">
            <span>{{ ucfirst($item->post_type) }}</span>
            <h2>{{ $item->post_title }}</h2>
            <p>{{ app(\App\Http\Controllers\WordPressContentController::class)->excerpt($item) }}</p>
            <a href="{{ route('wordpress.show', $item->post_name) }}">View content</a>
        </article>
    @empty
        <article class="card">
            <span>Import needed</span>
            <h2>No WordPress rows found</h2>
            <p>Run <code>php artisan migrate</code> to import the SQL dump into Laravel.</p>
        </article>
    @endforelse
</section>

@if ($items->hasPages())
    <section class="section pagination-wrap">
        {{ $items->links() }}
    </section>
@endif
@endsection
