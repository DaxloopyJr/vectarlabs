<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;

class Service extends Model
{
    protected $fillable = [
        'slug', 'badge', 'title_line1', 'title_line2', 'tagline',
        'list_title', 'list_items', 'stack_label', 'stack_text', 'hero_button_text',
        'overview_title', 'overview_body1', 'overview_body2', 'cards_section_title',
        'cta_title1', 'cta_title2', 'cta_subtitle', 'cta_button_text',
        'summary', 'sort_order', 'published',
    ];

    protected $casts = ['published' => 'boolean'];

    public function cards(): HasMany
    {
        return $this->hasMany(ServiceCard::class)->orderBy('sort_order');
    }

    public function scopePublished($query)
    {
        return $query->where('published', true)->orderBy('sort_order');
    }

    public function listItemsArray(): array
    {
        return array_values(array_filter(array_map('trim', preg_split('/\r?\n/', (string) $this->list_items))));
    }
}
