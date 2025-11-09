<?php

namespace App\Http\Controllers;

class HomeController extends Controller
{
    public function index()
    {
        $navigation = [
            ['label' => 'Home', 'url' => '/', 'active' => true],
            ['label' => 'Category', 'url' => '#categories', 'active' => false],
            ['label' => 'Writers', 'url' => '#writers', 'active' => false],
            ['label' => 'About Us', 'url' => '#about', 'active' => false],
            ['label' => 'Popular', 'url' => '#popular', 'active' => false],
        ];

        $categories = [
            ['name' => 'Data Science', 'description' => 'Pelajari machine learning, AI, dan big data untuk memecahkan masalah nyata.'],
            ['name' => 'Network Security', 'description' => 'Fokus pada keamanan jaringan modern, enkripsi, dan mitigasi serangan.'],
        ];

        $articles = [
            [
                'title' => 'Machine Learning',
                'date' => '14 May 2024',
                'author' => 'Bia',
                'summary' => 'Di tengah pesatnya perkembangan teknologi kecerdasan buatan atau artificial intelligence (AI)...',
                'image' => 'https://images.unsplash.com/photo-1503676260728-1c00da094a0b?auto=format&fit=crop&w=600&q=80',
            ],
            [
                'title' => 'Human and Computer Interaction',
                'date' => '14 May 2024',
                'author' => 'Sabrina',
                'summary' => 'Human-Computer Interaction atau HCI adalah studi tentang bagaimana manusia berinteraksi dengan...',
                'image' => 'https://images.unsplash.com/photo-1522071820081-009f0129c71c?auto=format&fit=crop&w=600&q=80',
            ],
            [
                'title' => 'Network Threat Intelligence',
                'date' => '14 May 2024',
                'author' => 'Rafi',
                'summary' => 'Memahami ancaman jaringan modern membantu tim menjaga kerahasiaan dan integritas data...',
                'image' => 'https://images.unsplash.com/photo-1517433456452-f9633a875f6f?auto=format&fit=crop&w=600&q=80',
            ],
        ];

        return view('home', compact('navigation', 'categories', 'articles'));
    }
}
