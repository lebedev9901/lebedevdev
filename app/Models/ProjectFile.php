<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class ProjectFile extends Model
{
     protected $fillable = [
        'project_id',
        'type',
        'path',
        'name',
        'sort_order',
    ];
}
