@extends('layouts.app')

@section('title', 'EduFun | Popular Articles')

@php
use Illuminate\Support\Str;
@endphp

@section('content')
<section class="container py-5">
    <div class="mb-4">
        <p class="text-uppercase text-muted small fw-semibold mb-1">Popular</p>
        <h1 class="h3 fw-bold">Artikel Populer</h1>
    </div>

    @forelse($popularArticles as $article)
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
                        {{ optional($article->published_at)->format('d M Y') }} &middot; by {{ $article->writer?->name }}
                    </div>
                    <h3 class="h5">{{ $article->title }}</h3>
                    <p class="mb-3">{{ Str::limit($article->summary ?? $article->content, 160) }}</p>
                    <a href="{{ route('articles.show', $article) }}" class="btn btn-dark rounded-pill text-lowercase">read more...</a>
                </div>
            </div>
        </div>
    </article>
    @empty
    <p class="text-muted">Belum ada artikel populer.</p>
    @endforelse

    <div class="d-flex flex-column justify-content-center mt-4">
        {{ $popularArticles->onEachSide(1)->links('pagination::bootstrap-5') }}
    </div>
</section>
@endsection