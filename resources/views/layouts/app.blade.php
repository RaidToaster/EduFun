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
                <ul class="navbar-nav align-items-lg-center">
                    <li class="nav-item">
                        <a class="nav-link {{ request()->routeIs('home') ? 'active fw-semibold' : '' }}" href="{{ route('home') }}">Home</a>
                    </li>
                    <li class="nav-item dropdown">
                        <a class="nav-link dropdown-toggle {{ request()->routeIs('categories.*') ? 'active fw-semibold' : '' }}"
                           href="{{ route('categories.index') }}" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                            Category
                        </a>
                        <ul class="dropdown-menu">
                            <li>
                                <a class="dropdown-item fw-semibold" href="{{ route('categories.index') }}">All Categories</a>
                            </li>
                            <li><hr class="dropdown-divider"></li>
                            @forelse(($navCategories ?? collect()) as $category)
                                <li>
                                    <a class="dropdown-item" href="{{ route('categories.show', $category) }}">{{ $category->name }}</a>
                                </li>
                            @empty
                                <li><span class="dropdown-item text-muted">No categories yet</span></li>
                            @endforelse
                        </ul>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="{{ route('home') }}#writers">Writers</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="{{ route('home') }}#about">About Us</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="{{ route('home') }}#popular">Popular</a>
                    </li>
                </ul>
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
