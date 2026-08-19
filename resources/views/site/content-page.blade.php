@extends('site.layout')

@section('content')
<article class="wp-article">
    <p class="eyebrow">{{ ucfirst($page->template) }} Page</p>
    <h1>{{ $page->title }}</h1>
    @if ($page->excerpt)
        <p class="wp-meta">{{ $page->excerpt }}</p>
    @endif

    <div class="wp-content">
        {!! $content !!}
    </div>
</article>
@endsection
