<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class CooperationRequest extends Model
{
    protected $fillable = [
        'name',
        'contact',
        'site_type',
        'design',
        'features',
        'budget',
        'deadline',
        'examples',
        'description',
        'status',
        'tz_file'
    ];

    protected $casts = [
        'features' => 'array',
    ];
}
