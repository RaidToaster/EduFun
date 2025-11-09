<?php

namespace App\Http\Controllers;

use App\Models\Category;
use Illuminate\Contracts\View\View;

class CategoryController extends Controller
{
    public function index(): View
    {
        $categories = Category::with(['articles' => function ($query) {
            $query->latest('published_at')->take(3);
        }])->orderBy('name')->get();

        return view('categories.index', [
            'categories' => $categories,
        ]);
    }
}
