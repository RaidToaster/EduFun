<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class Article extends Model
{
    /** @use HasFactory<\Database\Factories\ArticleFactory> */
    use HasFactory;

    protected $fillable = [
        'category_id',
        'writer_id',
        'title',
        'summary',
        'content',
        'thumbnail_url',
        'published_at',
        'is_popular',
        'popular_page',
    ];

    protected $casts = [
        'published_at' => 'date',
        'is_popular' => 'boolean',
    ];

    public function category(): BelongsTo
    {
        return $this->belongsTo(Category::class);
    }

    public function writer(): BelongsTo
    {
        return $this->belongsTo(Writer::class);
    }
}
