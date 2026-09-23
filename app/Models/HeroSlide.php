<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class HeroSlide extends Model
{
    protected $fillable = ['eyebrow', 'title1', 'title2', 'title3', 'subtitle', 'button_text', 'button_url', 'image_url', 'chips', 'sort_order', 'published'];

    protected $casts = ['published' => 'boolean'];

    public function scopePublished($query)
    {
        return $query->where('published', true)->orderBy('sort_order');
    }

    public function chipList(): array
    {
        return array_values(array_filter(array_map('trim', explode(',', (string) $this->chips))));
    }
}
