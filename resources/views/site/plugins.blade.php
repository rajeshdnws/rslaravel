@extends('site.layout')

@section('content')
<section class="page-hero">
    <div>
        <p class="eyebrow">Plugins</p>
        <h1>WordPress Plugin URLs Preserved in Laravel</h1>
        <p>The old Gallery Plugin and AI Website Fixer paths now point here, so existing frontend links keep working while the site runs on Laravel.</p>
    </div>
    <img src="{{ asset('site-assets/rs_gallery.png') }}" alt="RS Orange Tech plugins">
</section>
<section class="section grid">
    <article class="card">
        <h2>Gallery Plugin</h2>
        <p>Portfolio and image gallery presentation can be rebuilt as native Laravel modules.</p>
    </article>
    <article class="card">
        <h2>AI Website Fixer</h2>
        <p>Automation and support tooling can be migrated from WordPress plugin logic into Laravel services.</p>
    </article>
</section>
@endsection
