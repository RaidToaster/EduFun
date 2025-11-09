<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;

class Writer extends Model
{
    /** @use HasFactory<\Database\Factories\WriterFactory> */
    use HasFactory;

    protected $fillable = [
        'name',
        'role',
        'bio',
    ];

    public function articles(): HasMany
    {
        return $this->hasMany(Article::class);
    }
}
