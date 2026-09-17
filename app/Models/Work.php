<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Work extends Model
{
    protected $fillable = ['slug', 'title', 'client', 'category', 'industry', 'year', 'summary', 'description', 'tags', 'image_url', 'featured', 'sort_order', 'published'];

    protected $casts = ['published' => 'boolean', 'featured' => 'boolean'];

    public function scopePublished($query)
    {
        return $query->where('published', true)->orderBy('sort_order');
    }

    public function tagList(): array
    {
        return array_values(array_filter(array_map('trim', explode(',', (string) $this->tags))));
    }

    public function paragraphs(): array
    {
        return array_values(array_filter(array_map('trim', preg_split('/\n+/', (string) $this->description))));
    }
}
