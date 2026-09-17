<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class ServiceCard extends Model
{
    protected $fillable = ['service_id', 'icon', 'title', 'body', 'sort_order'];

    public function service(): BelongsTo
    {
        return $this->belongsTo(Service::class);
    }
}
