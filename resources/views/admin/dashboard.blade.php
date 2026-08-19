@extends('admin.layout', ['heading' => 'Dashboard', 'title' => 'Dashboard'])

@section('content')
<section class="metric-grid">
    @foreach ($resources as $slug => $section)
        @php($count = $section['model']::count())
        <article class="metric-card">
            <p>{{ $section['title'] }}</p>
            <strong>{{ $count }}</strong>
            <span>{{ $count === 1 ? 'record' : 'records' }} in MySQL</span>
        </article>
    @endforeach
</section>

<section class="admin-grid">
    <article class="panel wide">
        <div class="panel-head">
            <div>
                <h2>Content Management</h2>
                <p>All admin sections now read from and save to MySQL tables.</p>
            </div>
            <a class="admin-button" href="{{ route('admin.pages.create') }}">Create Page</a>
        </div>
        <div class="module-grid">
            @foreach ($resources as $slug => $section)
                <a class="module-card" href="{{ route('admin.'.$slug) }}">
                    <span>{{ strtoupper(substr($section['title'], 0, 2)) }}</span>
                    <strong>{{ $section['title'] }}</strong>
                    <small>{{ $section['description'] }}</small>
                </a>
            @endforeach
        </div>
    </article>

    <article class="panel">
        <div class="panel-head">
            <div>
                <h2>Next Actions</h2>
                <p>Suggested setup steps.</p>
            </div>
        </div>
        <div class="activity-list">
            <div>
                <strong>Create your first admin user</strong>
                <span>Add a user with administrator role.</span>
            </div>
            <div>
                <strong>Add SEO entries</strong>
                <span>Store title and description for public URLs.</span>
            </div>
            <div>
                <strong>Publish pages and posts</strong>
                <span>Use status fields to control content readiness.</span>
            </div>
        </div>
    </article>
</section>
@endsection
