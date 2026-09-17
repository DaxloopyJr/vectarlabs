<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class TeamMember extends Model
{
    protected $fillable = ['slug', 'name', 'role', 'bio', 'photo_url', 'email', 'phone', 'website', 'linkedin', 'twitter', 'github', 'sort_order', 'published'];

    protected $casts = ['published' => 'boolean'];

    public function scopePublished($query)
    {
        return $query->where('published', true)->orderBy('sort_order');
    }

    public function initials(): string
    {
        return strtoupper(collect(explode(' ', $this->name))->map(fn ($p) => $p[0] ?? '')->take(2)->implode(''));
    }
}
