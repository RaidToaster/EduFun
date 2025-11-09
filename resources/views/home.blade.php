@extends('layouts.app')

@section('content')
    <section class="hero mb-5">
        <div class="row g-0 align-items-center">
            <div class="col-lg-6 p-5">
                <p class="text-uppercase text-primary mb-2 fw-semibold">Belajar lebih seru</p>
                <h1 class="fw-bold mb-3">Kuasai Data Science dan Network Security bersama EduFun</h1>
                <p class="text-secondary mb-4">Temukan materi terkurasi, artikel terbaru, dan insight dari para pengajar pilihan untuk membantu perjalanan akademikmu.</p>
                <div class="d-flex gap-3">
                    <a href="#articles" class="btn btn-primary btn-lg btn-pill px-4">Jelajahi Materi</a>
                    <a href="#popular" class="btn btn-outline-dark btn-lg btn-pill px-4">Lihat Popular Page</a>
                </div>
            </div>
            <div class="col-lg-6">
                <img src="https://images.unsplash.com/photo-1503676260728-1c00da094a0b?auto=format&fit=crop&w=1600&q=80" alt="EduFun students">
            </div>
        </div>
    </section>

    <section id="categories" class="mb-5">
        <div class="d-flex justify-content-between align-items-center mb-4">
            <div>
                <p class="text-uppercase text-primary fw-semibold mb-1">Kategori unggulan</p>
                <h2 class="fw-bold">Jalur pembelajaran untuk NIM ganjil</h2>
            </div>
            <a href="#popular" class="btn btn-outline-primary btn-pill px-4">Lihat semua</a>
        </div>
        <div class="row g-4">
            @foreach ($categories as $category)
                <div class="col-md-6">
                    <div class="p-4 bg-white rounded-4 shadow-sm h-100">
                        <div class="d-flex align-items-center mb-3">
                            <div class="rounded-circle bg-primary-subtle text-primary fw-semibold d-flex align-items-center justify-content-center me-3" style="width:56px;height:56px;">
                                {{ strtoupper(substr($category['name'], 0, 2)) }}
                            </div>
                            <div>
                                <h4 class="mb-1">{{ $category['name'] }}</h4>
                                <p class="mb-0 text-secondary">{{ $category['description'] }}</p>
                            </div>
                        </div>
                    </div>
                </div>
            @endforeach
        </div>
    </section>

    <section id="articles" class="mb-5">
        <p class="text-uppercase text-primary fw-semibold mb-1">Artikel terbaru</p>
        <h2 class="fw-bold mb-4">Update minggu ini</h2>
        <div class="d-flex flex-column gap-4">
            @foreach ($articles as $article)
                <div class="article-card d-flex flex-column flex-md-row align-items-start gap-4">
                    <img src="{{ $article['image'] }}" class="article-thumb" alt="{{ $article['title'] }}">
                    <div class="flex-grow-1">
                        <h4 class="mb-2">{{ $article['title'] }}</h4>
                        <p class="text-secondary mb-3">{{ $article['date'] }} | by {{ $article['author'] }}</p>
                        <p class="mb-4">{{ $article['summary'] }}</p>
                        <a href="#popular" class="btn btn-dark btn-pill px-4">read more...</a>
                    </div>
                </div>
            @endforeach
        </div>
    </section>

    <section id="writers" class="mb-5">
        <div class="row g-4 align-items-center">
            <div class="col-lg-5">
                <p class="text-uppercase text-primary fw-semibold mb-1">Writers</p>
                <h2 class="fw-bold mb-3">Belajar langsung dari praktisi</h2>
                <p class="text-secondary">Setiap artikel ditulis oleh mentor dan dosen berpengalaman di bidangnya sehingga kamu mendapatkan insight aplikasi nyata.</p>
            </div>
            <div class="col-lg-7">
                <div class="bg-white rounded-4 shadow-sm p-4">
                    <div class="row g-4">
                        <div class="col-6">
                            <div class="p-3 border rounded-4 h-100">
                                <h5 class="mb-1">Bia</h5>
                                <p class="text-secondary mb-0">Machine Learning Specialist</p>
                            </div>
                        </div>
                        <div class="col-6">
                            <div class="p-3 border rounded-4 h-100">
                                <h5 class="mb-1">Sabrina</h5>
                                <p class="text-secondary mb-0">HCI Researcher</p>
                            </div>
                        </div>
                        <div class="col-6">
                            <div class="p-3 border rounded-4 h-100">
                                <h5 class="mb-1">Rafi</h5>
                                <p class="text-secondary mb-0">Network Security Analyst</p>
                            </div>
                        </div>
                        <div class="col-6">
                            <div class="p-3 border rounded-4 h-100">
                                <h5 class="mb-1">Naya</h5>
                                <p class="text-secondary mb-0">Data Engineer</p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <section id="about" class="mb-5">
        <div class="bg-dark text-white rounded-4 p-5">
            <div class="row align-items-center">
                <div class="col-lg-8">
                    <p class="text-uppercase text-primary fw-semibold mb-2">About EduFun</p>
                    <h2 class="fw-bold mb-3 text-white">Platform pembelajaran yang fokus pada pengalaman mahasiswa</h2>
                    <p class="mb-0">EduFun menggabungkan modul praktis, studi kasus terkini, dan materi audiovisual untuk membantu mahasiswa memahami konsep Data Science dan Network Security tanpa merasa kewalahan.</p>
                </div>
                <div class="col-lg-4 text-lg-end mt-4 mt-lg-0">
                    <a href="#popular" class="btn btn-light btn-pill px-4">Jelajahi selengkapnya</a>
                </div>
            </div>
        </div>
    </section>

    <section id="popular">
        <div class="d-flex justify-content-between align-items-center mb-4">
            <div>
                <p class="text-uppercase text-primary fw-semibold mb-1">Popular Page</p>
                <h2 class="fw-bold mb-0">Artikel terfavorit pekan ini</h2>
            </div>
            <div class="d-flex gap-2">
                <span class="badge rounded-pill text-bg-dark px-3 py-2">Page 1</span>
                <span class="badge rounded-pill text-bg-light px-3 py-2 border">Page 2</span>
            </div>
        </div>
        <div class="row g-4">
            <div class="col-md-4">
                <div class="p-4 bg-white rounded-4 shadow-sm h-100">
                    <p class="text-secondary mb-1">Data Science</p>
                    <h4 class="mb-2">AI Strategy 101</h4>
                    <p class="mb-4 text-secondary">Langkah strategis merancang solusi AI untuk industri jasa dan manufaktur.</p>
                    <a href="#" class="btn btn-outline-dark btn-pill px-4">Selengkapnya</a>
                </div>
            </div>
            <div class="col-md-4">
                <div class="p-4 bg-white rounded-4 shadow-sm h-100">
                    <p class="text-secondary mb-1">Network Security</p>
                    <h4 class="mb-2">Zero Trust Basics</h4>
                    <p class="mb-4 text-secondary">Memahami prinsip zero trust sebagai pondasi arsitektur keamanan modern.</p>
                    <a href="#" class="btn btn-outline-dark btn-pill px-4">Selengkapnya</a>
                </div>
            </div>
            <div class="col-md-4">
                <div class="p-4 bg-white rounded-4 shadow-sm h-100">
                    <p class="text-secondary mb-1">Data Science</p>
                    <h4 class="mb-2">Responsible AI</h4>
                    <p class="mb-4 text-secondary">Menjelaskan cara menjaga etika dan fairness saat membangun model machine learning.</p>
                    <a href="#" class="btn btn-outline-dark btn-pill px-4">Selengkapnya</a>
                </div>
            </div>
        </div>
    </section>
@endsection
