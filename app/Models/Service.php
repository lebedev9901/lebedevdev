<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Service extends Model
{
    protected $fillable = [
        'title',
        'subtitle',
        'slug',
        'short_description',
        'description',
        'advantages',
        'stages',
        'icon',
        'status',
        'sort_order',
        'meta_title',
        'meta_description',
    ];

    protected $casts = [
        'advantages' => 'array',
        'stages' => 'array',
    ];

    public function getStatusLabelAttribute(): string
    {
        return match ($this->status) {
            'active' => 'Активна',
            'hidden' => 'Скрыта',
            default => 'Активна',
        };
    }
}
