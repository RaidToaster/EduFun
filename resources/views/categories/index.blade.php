@extends('layouts.app')

@section('title', 'EduFun | Categories')

@php
    use Illuminate\Support\Str;
    $heroImage = 'https://images.unsplash.com/photo-1503676260728-1c00da094a0b?auto=format&fit=crop&w=1600&q=80';
@endphp

@section('content')
    <section class="container py-5">
        <div class="card border-0 shadow-sm rounded-4 overflow-hidden">
            <div class="row g-0 align-items-center">
                <div class="col-lg-6">
                    <img src="{{ $heroImage }}" alt="Students collaborating" class="img-fluid w-100 h-100 object-fit-cover">
                </div>
                <div class="col-lg-6">
                    <div class="card-body p-4 p-lg-5">
                        <p class="text-uppercase text-muted small fw-semibold mb-2">Category Focus</p>
                        <h1 class="h2 fw-bold mb-3">Bangun Karier IT lewat Data Science & Network Security</h1>
                        <p class="mb-0 text-muted">
                            Pilih kategori untuk melihat mata kuliah favorit lengkap dengan ringkasan materi dan penulisnya.
                            Semua konten sudah dikurasi sehingga siap membantu persiapan tugas maupun ujian.
                        </p>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <section class="container pb-5">
        <div class="mb-4">
            <p class="text-uppercase text-muted small fw-semibold mb-1">Available Categories</p>
            <h2 class="h3 fw-bold mb-0">Materi sesuai bidang yang kamu pilih</h2>
        </div>

        @forelse($categories as $category)
            <div class="card border-0 shadow-sm rounded-4 mb-4">
                <div class="card-body p-4">
                    <div class="d-flex flex-column flex-lg-row justify-content-between gap-3">
                        <div>
                            <p class="text-uppercase text-muted small fw-semibold mb-1">{{ $category->name }}</p>
                            <h3 class="h4">{{ $category->name }}</h3>
                            <p class="text-muted mb-3">{{ Str::limit($category->description, 200) }}</p>
                            <span class="badge text-bg-dark">{{ $category->articles->count() }} Artikel</span>
                        </div>
                        <div class="flex-grow-1">
                            <div class="row g-3">
                                @forelse($category->articles as $article)
                                    <div class="col-12 col-md-6">
                                        <div class="border rounded-4 h-100 p-3">
                                            <p class="text-uppercase text-muted small fw-semibold mb-1">
                                                {{ optional($article->published_at)->format('d M Y') }}
                                            </p>
                                            <h4 class="h6">{{ $article->title }}</h4>
                                            <p class="small text-muted mb-3">{{ Str::limit($article->summary ?? $article->content, 90) }}</p>
                                            <div class="d-flex justify-content-between align-items-center small text-muted">
                                                <span>by {{ $article->writer?->name }}</span>
                                                <a href="#" class="btn btn-sm btn-outline-dark rounded-pill">read more</a>
                                            </div>
                                        </div>
                                    </div>
                                @empty
                                    <div class="col">
                                        <p class="text-muted">Belum ada artikel di kategori ini.</p>
                                    </div>
                                @endforelse
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        @empty
            <p class="text-muted">Kategori belum tersedia.</p>
        @endforelse
    </section>
@endsection
