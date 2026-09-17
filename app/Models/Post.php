<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Post extends Model
{
    protected $fillable = ['title', 'excerpt', 'body', 'tag', 'cover_style', 'published'];

    protected $casts = ['published' => 'boolean'];

    public function scopePublished($query)
    {
        return $query->where('published', true)->latest();
    }
}
