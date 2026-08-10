<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Project extends Model
{
    protected $fillable = [
        'title',
        'slug',
        'summary',
        'description',
        'tech_stack',
        'live_url',
        'github_url',
        'status',
        'featured',
        'sort_order',
    ];

    protected $casts = [
        'tech_stack' => 'array',
        'featured' => 'boolean',
    ];

}