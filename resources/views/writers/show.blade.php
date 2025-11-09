@extends('layouts.app')

@section('title', $writer->name . ' | EduFun Writers')

@php
    use Illuminate\Support\Str;
@endphp

@section('content')
    <section class="container py-5">
        <div class="card border-0 shadow-sm rounded-4 mb-4">
            <div class="card-body d-flex flex-column flex-md-row align-items-center gap-4">
                <div class="bg-light rounded-circle d-flex justify-content-center align-items-center"
                     style="width: 160px; height: 160px;">
                    <span class="fw-bold fs-1 text-primary">{{ Str::upper(Str::substr($writer->name, 0, 2)) }}</span>
                </div>
                <div>
                    <p class="text-uppercase text-muted small fw-semibold mb-1">Writer</p>
                    <h1 class="h3 fw-bold mb-1">{{ $writer->name }}</h1>
                    <p class="text-muted mb-3">{{ $writer->role }}</p>
                    <p class="mb-0">{{ $writer->bio }}</p>
                </div>
            </div>
        </div>

        <div class="mb-4 d-flex justify-content-between align-items-center">
            <h2 class="h4 fw-bold mb-0">Artikel oleh {{ $writer->name }}</h2>
            <a href="{{ route('writers.index') }}" class="btn btn-outline-dark rounded-pill">Kembali</a>
        </div>

        @forelse($writer->articles as $article)
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
                                {{ optional($article->published_at)->format('d M Y') }} &middot; {{ $article->category?->name }}
                            </div>
                            <h3 class="h5">{{ $article->title }}</h3>
                            <p class="mb-3">{{ Str::limit($article->summary ?? $article->content, 160) }}</p>
                            <a href="{{ route('articles.show', $article) }}" class="btn btn-dark rounded-pill text-lowercase">read more...</a>
                        </div>
                    </div>
                </div>
            </article>
        @empty
            <p class="text-muted">Penulis ini belum memiliki artikel.</p>
        @endforelse
    </section>
@endsection
