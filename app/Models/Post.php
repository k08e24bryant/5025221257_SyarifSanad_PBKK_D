<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Post extends Model
{
    use HasFactory;

    // Fields yang bisa diisi
    protected $fillable = ['title', 'author', 'slug', 'body'];

    // Load default relasi dengan author dan category
    protected $with = ['author', 'category'];

    // Relasi ke User sebagai author
    public function author(): BelongsTo
    {
        return $this->belongsTo(User::class, 'author_id');
    }

    // Relasi ke Category
    public function category(): BelongsTo
    {
        return $this->belongsTo(Category::class);
    }

    // Query scope untuk filter berdasarkan search dan category
    public function scopeFilter(Builder $query, array $filters): void
    {
        // Filter berdasarkan pencarian
        $query->when(
            $filters['search'] ?? false,
            fn ($query, $search) =>
                $query->where('title', 'like', '%' . $search . '%')
        );
        
        // Filter berdasarkan kategori
        $query->when(
            $filters['category'] ?? false,
            fn ($query, $category) =>
                $query->whereHas('category', fn ($query) => $query->where('slug', $category))
        );
        $query->when(
            $filters['author'] ?? false,
            fn ($query, $author) =>
                $query->whereHas('author', fn ($query) => $query->where('username', $author))
        );
    }
}
