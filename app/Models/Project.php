<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Project extends Model
{
    protected $fillable = [
        'title',
        'slug',
        'subtitle',
        'short_description',
        'description',
        'image',
        'link',
        'status',
        'technologies',
        'sort_order',
    ];

    protected $casts = [
        'technologies' => 'array',
    ];

    public function getStatusLabelAttribute(): string
    {
        return match ($this->status) {
            'in_progress' => 'В разработке',
            'in_work' => 'В постоянной работе',
            'support' => 'На поддержке',
            'completed' => 'Завершён',
            default => 'Завершён',
        };
    }

    public function files()
    {
        return $this->hasMany(ProjectFile::class);
    }

    public function images()
    {
        return $this->hasMany(ProjectFile::class)->where('type', 'image');
    }

    public function documents()
    {
        return $this->hasMany(ProjectFile::class)->where('type', 'document');
    }
}
