<!doctype html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Admin Login | RS Orange Tech</title>
    <link rel="preconnect" href="https://fonts.bunny.net">
    <link href="https://fonts.bunny.net/css?family=instrument-sans:400,500,600,700,800" rel="stylesheet">
    <link rel="stylesheet" href="{{ asset('css/admin.css') }}">
</head>
<body class="admin-login-page">
    <main class="login-shell">
        <section class="login-panel">
            <a class="admin-brand login-brand" href="{{ route('home') }}">
                <span>RS</span>
                <strong>Admin</strong>
            </a>

            <div class="login-heading">
                <p class="crumb">Backend Access</p>
                <h1>Admin Login</h1>
            </div>

            @if ($errors->any())
                <div class="admin-alert">
                    {{ $errors->first() }}
                </div>
            @endif

            <form class="login-form" method="POST" action="{{ route('admin.login.store') }}">
                @csrf
                <label>
                    Email
                    <input type="email" name="email" value="{{ old('email') }}" autocomplete="email" required autofocus>
                </label>

                <label>
                    Password
                    <input type="password" name="password" autocomplete="current-password" required>
                </label>

                <label class="remember-row">
                    <input type="checkbox" name="remember" value="1">
                    <span>Remember me</span>
                </label>

                <button class="admin-button" type="submit">Login</button>
            </form>
        </section>
    </main>
</body>
</html>
