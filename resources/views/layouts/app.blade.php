<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>@yield('title', 'EduFun')</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css">
    @stack('styles')
</head>
<body class="bg-light">
<div class="d-flex flex-column min-vh-100">
    <header class="bg-white border-bottom sticky-top">
        <nav class="navbar navbar-expand-lg navbar-light py-3 container">
            <a class="navbar-brand fw-semibold fs-4" href="{{ route('home') }}">
                EduFun
            </a>
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#mainNav"
                    aria-controls="mainNav" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse justify-content-end" id="mainNav">
                <div class="navbar-nav">
                    <a class="nav-link {{ request()->routeIs('home') ? 'active fw-semibold' : '' }}" href="{{ route('home') }}">Home</a>
                    <a class="nav-link {{ request()->routeIs('categories.*') ? 'active fw-semibold' : '' }}" href="{{ route('categories.index') }}">Category</a>
                    <a class="nav-link" href="{{ route('home') }}#writers">Writers</a>
                    <a class="nav-link" href="{{ route('home') }}#about">About Us</a>
                    <a class="nav-link" href="{{ route('home') }}#popular">Popular</a>
                </div>
            </div>
        </nav>
    </header>

    <main class="flex-grow-1">
        @yield('content')
    </main>

    <footer class="bg-dark text-white py-4">
        <div class="container text-center small">
            &copy; EduFun {{ now()->year }} | Web Programming | Kevin Pramudya Mahardika | 2702369541
        </div>
    </footer>
</div>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>
@stack('scripts')
</body>
</html>
