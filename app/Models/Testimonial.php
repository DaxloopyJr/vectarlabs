<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Testimonial extends Model
{
    protected $fillable = ['author', 'role', 'quote', 'photo_url', 'sort_order', 'published'];

    protected $casts = ['published' => 'boolean'];

    public function scopePublished($query)
    {
        return $query->where('published', true)->orderBy('sort_order');
    }

    public function initials(): string
    {
        return strtoupper(collect(explode(' ', $this->author))->map(fn ($p) => $p[0] ?? '')->take(2)->implode(''));
    }
}
