<!doctype html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>{{ $title ?? 'Admin Panel' }} | RS Orange Tech</title>
    <link rel="preconnect" href="https://fonts.bunny.net">
    <link href="https://fonts.bunny.net/css?family=instrument-sans:400,500,600,700,800" rel="stylesheet">
    <link rel="stylesheet" href="{{ asset('css/admin.css') }}">
</head>
<body>
    <div class="admin-shell">
        <aside class="sidebar">
            <a class="admin-brand" href="{{ route('admin.dashboard') }}">
                <span>RS</span>
                <strong>Admin</strong>
            </a>
            <nav class="admin-nav">
                <a class="{{ request()->routeIs('admin.dashboard') ? 'active' : '' }}" href="{{ route('admin.dashboard') }}">Dashboard</a>
                @foreach (config('admin.resources') as $slug => $item)
                    <a class="{{ request()->routeIs('admin.'.$slug) ? 'active' : '' }}" href="{{ route('admin.'.$slug) }}">{{ $item['title'] }}</a>
                @endforeach
            </nav>
            <a class="view-site" href="{{ route('home') }}">View Website</a>
        </aside>

        <div class="admin-main">
            <header class="admin-topbar">
                <div>
                    <p class="crumb">Admin Panel</p>
                    <h1>{{ $heading ?? 'Dashboard' }}</h1>
                </div>
                <div class="admin-user">
                    <span>{{ strtoupper(substr(auth()->user()->name, 0, 1).substr(strrchr(auth()->user()->name, ' ') ?: auth()->user()->name, 1, 1)) }}</span>
                    <div>
                        <strong>{{ auth()->user()->name }}</strong>
                        <small>{{ ucfirst(auth()->user()->role) }}</small>
                    </div>
                    <form method="POST" action="{{ route('admin.logout') }}">
                        @csrf
                        <button class="logout-button" type="submit">Logout</button>
                    </form>
                </div>
            </header>

            @yield('content')
        </div>
    </div>
</body>
</html>
