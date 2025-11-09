@extends('layouts.app')

@section('title', $article->title . ' | EduFun')

@section('content')
    <section class="container py-5">
        <div class="mb-4">
            <a href="{{ route('categories.show', $article->category) }}" class="text-decoration-none small text-muted">
                &larr; {{ $article->category?->name }}
            </a>
        </div>
        <div class="card border-0 shadow-sm rounded-4 overflow-hidden">
            @if($article->thumbnail_url)
                <img src="{{ $article->thumbnail_url }}" alt="{{ $article->title }}" class="img-fluid w-100 object-fit-cover" style="max-height: 420px;">
            @endif
            <div class="card-body p-4 p-lg-5">
                <p class="text-uppercase text-muted small fw-semibold mb-2">{{ $article->category?->name }}</p>
                <h1 class="h3 fw-bold">{{ $article->title }}</h1>
                <div class="text-muted small mb-4">
                    {{ optional($article->published_at)->format('d M Y') }} &middot; by {{ $article->writer?->name }}
                </div>
                <p class="mb-4">{{ $article->summary }}</p>
                <article class="text-secondary lh-lg">
                    {!! nl2br(e($article->content)) !!}
                </article>
            </div>
        </div>
    </section>
@endsection
