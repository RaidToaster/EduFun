<?php

namespace App\Http\Controllers;

use App\Models\Article;
use App\Models\Category;
use App\Models\Writer;
use Illuminate\Contracts\View\View;

class ArticleController extends Controller
{
    public function index(): View
    {
        $heroArticle = Article::with(['category', 'writer'])
            ->latest('published_at')
            ->first();

        $latestArticles = Article::with(['category', 'writer'])
            ->latest('published_at')
            ->when(
                $heroArticle,
                fn ($query) => $query->where('id', '!=', $heroArticle->getKey())
            )
            ->take(4)
            ->get();

        $categories = Category::orderBy('name')->get();

        $featuredWriters = Writer::withCount('articles')
            ->orderByDesc('articles_count')
            ->take(3)
            ->get();

        $popularArticles = Article::with(['writer', 'category'])
            ->where('is_popular', true)
            ->orderBy('popular_page')
            ->orderByDesc('published_at')
            ->take(3)
            ->get();

        return view('home', [
            'heroArticle' => $heroArticle,
            'latestArticles' => $latestArticles,
            'categories' => $categories,
            'featuredWriters' => $featuredWriters,
            'popularArticles' => $popularArticles,
        ]);
    }

    public function show(Article $article): View
    {
        $article->load(['writer', 'category']);

        return view('articles.show', [
            'article' => $article,
        ]);
    }
}
