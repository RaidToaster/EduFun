@extends('layouts.app')

@section('title', 'EduFun | Writers')

@section('content')
    <section class="container py-5">
        <div class="text-center mb-5">
            <p class="text-uppercase text-muted small fw-semibold mb-1">Our Team</p>
            <h1 class="h2 fw-bold">Our Writers</h1>
            <p class="text-muted">Kenalan dengan tim penulis EduFun yang siap membagikan pengalaman nyata di dunia IT.</p>
        </div>

        <div class="row row-cols-1 row-cols-md-3 g-4">
            @forelse($writers as $writer)
                <div class="col">
                    <div class="card border-0 shadow-sm h-100 text-center">
                        <div class="card-body">
                            <div class="mx-auto bg-light rounded-circle d-flex justify-content-center align-items-center mb-3"
                                 style="width: 140px; height: 140px;">
                                <span class="fw-bold fs-3 text-primary">{{ strtoupper(Str::substr($writer->name, 0, 2)) }}</span>
                            </div>
                            <h3 class="h5 mb-1">{{ $writer->name }}</h3>
                            <p class="text-muted mb-2">{{ $writer->role }}</p>
                            <p class="small text-secondary">{{ $writer->bio }}</p>
                            <div class="d-flex justify-content-center gap-2">
                                <span class="badge text-bg-dark">{{ $writer->articles_count }} Artikel</span>
                                <a href="{{ route('writers.show', $writer) }}" class="btn btn-sm btn-outline-dark rounded-pill">Lihat Artikel</a>
                            </div>
                        </div>
                    </div>
                </div>
            @empty
                <p class="text-muted text-center">Belum ada penulis yang terdaftar.</p>
            @endforelse
        </div>
    </section>
@endsection
