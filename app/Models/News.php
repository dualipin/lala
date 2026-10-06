<?php

namespace App\Models;

use Database\Factories\NewsFactory;
use Illuminate\Database\Eloquent\Attributes\Fillable;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

/**
 * Comunicados, lanzamientos y noticias institucionales de Grupo LALA.
 */
#[Fillable(['title', 'slug', 'category', 'excerpt', 'content', 'image_url', 'read_time', 'is_featured', 'published_at'])]
class News extends Model
{
    /** @use HasFactory<NewsFactory> */
    use HasFactory;

    protected function casts(): array
    {
        return [
            'is_featured' => 'boolean',
            'published_at' => 'datetime',
        ];
    }
}
