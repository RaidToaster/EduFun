<?php

namespace App\Http\Controllers;

use App\Models\Writer;
use Illuminate\Contracts\View\View;

class WriterController extends Controller
{
    public function index(): View
    {
        $writers = Writer::withCount('articles')
            ->orderBy('name')
            ->get();

        return view('writers.index', [
            'writers' => $writers,
        ]);
    }

    public function show(Writer $writer): View
    {
        $writer->load(['articles' => function ($query) {
            $query->with('category')->latest('published_at');
        }]);

        return view('writers.show', [
            'writer' => $writer,
        ]);
    }
}
