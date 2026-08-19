@extends('site.layout')

@section('content')
<section class="page-hero">
    <div>
        <p class="eyebrow">{{ $title }}</p>
        <h1>{{ $heading }}</h1>
        <p>{{ $intro }}</p>
    </div>
    <img src="{{ asset('site-assets/'.$image) }}" alt="{{ $title }}">
</section>

<section class="section prose">
    @foreach ($sections as [$sectionTitle, $body])
        <article>
            <h2>{{ $sectionTitle }}</h2>
            <p>{{ $body }}</p>
        </article>
    @endforeach
</section>
@endsection
