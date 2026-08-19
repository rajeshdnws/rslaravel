@extends('site.layout')

@section('content')
<section class="page-hero">
    <div>
        <p class="eyebrow">Our Technologies</p>
        <h1>Modern Tools for Practical Digital Products</h1>
        <p>From enterprise e-commerce and Laravel applications to mobile apps, AI workflows and cloud-native deployment, we pick the stack that fits the job.</p>
    </div>
    <img src="{{ asset('site-assets/custom.png') }}" alt="Technology stack">
</section>

<section class="section">
    <div class="grid">
        @foreach ($technologies as $technology)
            <article class="card">
                <h3>{{ $technology }}</h3>
                <p>Architecture, implementation, optimization and support for production-ready business systems.</p>
            </article>
        @endforeach
    </div>
</section>
@endsection
