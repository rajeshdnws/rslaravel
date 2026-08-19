@extends('site.layout')

@section('content')
<article class="wp-article">
    <p class="eyebrow">{{ ucfirst($post->post_type) }}</p>
    <h1>{{ $post->post_title }}</h1>
    <p class="wp-meta">Imported from WordPress ID {{ $post->ID }} · {{ \Illuminate\Support\Carbon::parse($post->post_date)->format('F j, Y') }}</p>

    <div class="wp-content">
        {!! $content !!}
    </div>
</article>
@endsection
