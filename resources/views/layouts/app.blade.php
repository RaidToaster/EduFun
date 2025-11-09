<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>EduFun</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Plus+Jakarta+Sans:wght@400;500;600;700&display=swap" rel="stylesheet">
    <style>
        body {
            font-family: 'Plus Jakarta Sans', sans-serif;
            background-color: #f8fafb;
        }
        .navbar-brand span {
            font-weight: 700;
        }
        .nav-link.active {
            color: #0d6efd !important;
        }
        .hero {
            background: linear-gradient(135deg, #eaf6ff 0%, #ffffff 100%);
            border-radius: 24px;
            overflow: hidden;
        }
        .hero img {
            object-fit: cover;
            height: 360px;
            width: 100%;
        }
        .article-card {
            border-radius: 20px;
            background-color: #ffffff;
            padding: 20px;
            box-shadow: 0 12px 30px rgba(15, 23, 42, 0.08);
        }
        .article-thumb {
            border-radius: 18px;
            height: 140px;
            width: 260px;
            object-fit: cover;
        }
        .btn-pill {
            border-radius: 999px;
        }
        footer {
            font-size: 0.9rem;
        }
    </style>
</head>
<body>
    <nav class="navbar navbar-expand-lg bg-white border-bottom py-3">
        <div class="container">
            <a class="navbar-brand text-uppercase" href="/">
                <span>EduFun</span>
            </a>
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse justify-content-end" id="navbarNav">
                <ul class="navbar-nav gap-3">
                    @isset($navigation)
                        @foreach ($navigation as $item)
                            <li class="nav-item">
                                <a class="nav-link {{ $item['active'] ? 'active fw-semibold' : '' }}" href="{{ $item['url'] }}">{{ $item['label'] }}</a>
                            </li>
                        @endforeach
                    @endisset
                </ul>
            </div>
        </div>
    </nav>
    <main class="container py-5">
        @yield('content')
    </main>
    <footer class="py-4 text-center text-muted">
        © EduFun 2024 | Web Programming | Kevin Pramudya Mahardika | 2702369541
    </footer>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
