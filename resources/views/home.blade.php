@extends('layouts.app')

@section('title', 'EduFun | Home')

@php
use Illuminate\Support\Str;
$heroImage = 'https://images.unsplash.com/photo-1503676260728-1c00da094a0b?auto=format&fit=crop&w=1600&q=80';
@endphp

@section('content')
<section class="container py-5" id="home">
    <div class="card border-0 shadow-sm rounded-4 overflow-hidden">
        <div class="row g-0 align-items-center">
            <div class="col-lg-6">
                <img src="{{ $heroImage }}" alt="Hero cover" class="img-fluid w-100 h-100 object-fit-cover">
            </div>
            <div class="col-lg-6">
                <div class="card-body p-4 p-lg-5">
                    <p class="text-uppercase text-muted fw-semibold small mb-2">Latest Highlight</p>
                    <h1 class="h2 fw-bold">{{ $heroArticle?->title ?? 'Belajar IT secara interaktif bersama EduFun' }}</h1>
                    <p class="mb-4">
                        {{ $heroArticle?->summary
                                ? Str::limit($heroArticle->summary, 180)
                                : 'Platform belajar mandiri untuk mahasiswa IT dengan artikel yang ditulis oleh praktisi dan dosen pilihan.' }}
                    </p>
                    @if($heroArticle)
                    <div class="d-flex flex-wrap gap-3 text-muted small">
                        <span>{{ optional($heroArticle->published_at)->format('d M Y') }}</span>
                        <span>by {{ $heroArticle->writer->name }}</span>
                    </div>
                    @else
                    <span class="text-muted small">Artikel terbaru akan tampil di sini.</span>
                    @endif
                </div>
            </div>
        </div>
    </div>
</section>

<section class="container pb-5" id="category">
    <div class="mb-4">
        <p class="text-uppercase text-muted fw-semibold small mb-1">Latest Articles</p>
        <h2 class="h3 fw-bold">Baca Materi Terbaru</h2>
    </div>
    @forelse($latestArticles as $article)
    <article class="card border-0 rounded-4 shadow-sm mb-4">
        <div class="row g-0 align-items-center">
            <div class="col-md-4">
                <img
                    src="{{ $article->thumbnail_url ?? 'https://images.unsplash.com/photo-1523050854058-8df90110c9f1?auto=format&fit=crop&w=700&q=80' }}"
                    alt="{{ $article->title }}"
                    class="img-fluid w-100 h-100 object-fit-cover rounded-start-4 rounded-end-md-0">
            </div>
            <div class="col-md-8">
                <div class="card-body">
                    <div class="text-muted small mb-2">
                        {{ optional($article->published_at)->format('d M Y') }} &middot;
                        {{ $article->writer?->name }} &middot; {{ $article->category?->name }}
                    </div>
                            <h3 class="h5">{{ $article->title }}</h3>
                            <p class="mb-3">{{ Str::limit($article->summary ?? $article->content, 150) }}</p>
                            <a href="{{ route('articles.show', $article) }}" class="btn btn-dark rounded-pill text-lowercase">read more...</a>
                </div>
            </div>
        </div>
    </article>
    @empty
    <p class="text-muted">Belum ada artikel yang tersedia.</p>
    @endforelse
</section>

<section class="container pb-5" id="category-list">
    <div class="mb-4">
        <p class="text-uppercase text-muted fw-semibold small mb-1">Category</p>
        <h2 class="h3 fw-bold">Bidang Pembelajaran</h2>
        <p class="text-muted mb-0">Fokus pada Data Science dan Network Security sesuai requirement.</p>
    </div>
    <div class="row row-cols-1 row-cols-md-2 g-4">
        @forelse($categories as $category)
        <div class="col">
            <div class="card h-100 border-0 shadow-sm {{ $loop->odd ? 'text-bg-primary' : 'bg-white' }}">
                <div class="card-body">
                    <p class="text-uppercase fw-semibold small mb-2">{{ $category->name }}</p>
                    <h3 class="h5">{{ $category->name }}</h3>
                    <p class="mb-0">{{ Str::limit($category->description, 140) }}</p>
                </div>
            </div>
        </div>
        @empty
        <p class="text-muted">Belum ada kategori yang tersedia.</p>
        @endforelse
    </div>
</section>

<section class="bg-white py-5" id="writers">
    <div class="container">
        <div class="mb-4">
            <p class="text-uppercase text-muted fw-semibold small mb-1">Writers</p>
            <h2 class="h3 fw-bold">Tim Penulis</h2>
        </div>
        <div class="row row-cols-1 row-cols-md-3 g-4">
            @forelse($featuredWriters as $writer)
            <div class="col">
                <div class="card border-0 shadow-sm h-100">
                    <div class="card-body">
                        <div class="d-inline-flex align-items-center justify-content-center bg-primary bg-opacity-10 text-primary fw-semibold rounded-3 mb-3 px-3 py-2">
                            {{ Str::of($writer->name ?? 'WR')->substr(0, 2)->upper() }}
                        </div>
                        <h4 class="h5 mb-1">{{ $writer->name }}</h4>
                        <p class="text-muted small mb-2">{{ $writer->role }}</p>
                        <p class="mb-3">{{ Str::limit($writer->bio, 120) }}</p>
                        <span class="badge text-bg-dark">{{ $writer->articles_count }} Artikel</span>
                    </div>
                </div>
            </div>
            @empty
            <p class="text-muted">Penulis belum tersedia.</p>
            @endforelse
        </div>
    </div>
</section>

<section class="container py-5" id="popular">
    <div class="mb-4">
        <p class="text-uppercase text-muted fw-semibold small mb-1">Popular</p>
        <h2 class="h3 fw-bold">Artikel Populer</h2>
    </div>
    <div class="row row-cols-1 row-cols-md-3 g-4">
        @forelse($popularArticles as $article)
        <div class="col">
            <div class="card border-0 shadow-sm h-100">
                <div class="card-body">
                    <p class="text-uppercase text-muted small fw-semibold mb-1">{{ $article->category?->name }}</p>
                    <h3 class="h5">{{ $article->title }}</h3>
                            <p>{{ Str::limit($article->summary ?? $article->content, 130) }}</p>
                            <div class="text-muted small">
                                {{ optional($article->published_at)->format('d M Y') }} &middot; {{ $article->writer?->name }}
                            </div>
                            <a href="{{ route('articles.show', $article) }}" class="btn btn-link p-0 mt-2 text-decoration-none">read more...</a>
                </div>
            </div>
        </div>
        @empty
        <p class="text-muted">Belum ada artikel populer.</p>
        @endforelse
    </div>
</section>

<section class="container pb-5" id="about">
    <div class="card text-bg-dark border-0 rounded-4">
        <div class="card-body p-4 p-lg-5">
            <div class="row g-4 align-items-center">
                <div class="col-lg-8">
                    <p class="text-uppercase text-white-50 fw-semibold small mb-2">About Us</p>
                    <h2 class="h3 fw-bold text-white">EduFun - Belajar IT Lebih Menyenangkan</h2>
                    <p class="mb-0">
                        EduFun adalah platform berbagi ilmu untuk mahasiswa yang ingin memahami Data Science
                        dan Network Security. Semua materi dikurasi oleh pengajar dan praktisi agar tetap relevan
                        dengan perkembangan teknologi terbaru.
                    </p>
                </div>
                <div class="col-lg-4 text-lg-end">
                    <a href="#category" class="btn btn-outline-light rounded-pill px-4">Jelajahi Materi</a>
                </div>
            </div>
        </div>
    </div>
</section>
@endsection
