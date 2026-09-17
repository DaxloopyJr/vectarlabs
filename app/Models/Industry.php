<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Industry extends Model
{
    protected $fillable = ['slug', 'name', 'icon', 'tagline', 'summary', 'description', 'offerings', 'sort_order', 'published'];

    protected $casts = ['published' => 'boolean'];

    public function scopePublished($query)
    {
        return $query->where('published', true)->orderBy('sort_order');
    }

    public function offeringList(): array
    {
        return array_values(array_filter(array_map('trim', preg_split('/\r?\n/', (string) $this->offerings))));
    }

    public function paragraphs(): array
    {
        return array_values(array_filter(array_map('trim', preg_split('/\n+/', (string) $this->description))));
    }

    /** Bootstrap icon name for the stored icon key. */
    public function iconClass(): string
    {
        return [
            'graduation' => 'bi-mortarboard',
            'sprout' => 'bi-flower1',
            'briefcase' => 'bi-briefcase',
            'banknote' => 'bi-cash-stack',
            'heart' => 'bi-heart-pulse',
            'globe' => 'bi-globe2',
            'code' => 'bi-code-slash',
            'cloud' => 'bi-cloud',
            'shield' => 'bi-shield-lock',
            'database' => 'bi-database',
        ][$this->icon] ?? 'bi-briefcase';
    }
}
