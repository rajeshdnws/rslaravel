<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class PortfolioProject extends Model
{
    protected $fillable = [
        'title',
        'slug',
        'category',
        'client',
        'role',
        'image',
        'excerpt',
        'description',
        'tech_stack',
        'url',
        'featured',
        'status',
        'sort_order',
    ];

    protected function casts(): array
    {
        return [
            'featured' => 'boolean',
            'sort_order' => 'integer',
        ];
    }

    protected static function booted(): void
    {
        static::saved(function (PortfolioProject $project) {
            \App\Models\Page::updateOrCreate(
                ['slug' => '/'.trim($project->slug, '/').'/'],
                [
                    'title' => $project->title,
                    'template' => 'portfolio-detail',
                    'status' => $project->status,
                    'excerpt' => $project->excerpt,
                    'content' => $project->description,
                    'meta_title' => $project->title . ' | Portfolio | RS Orange Tech',
                    'meta_description' => \Illuminate\Support\Str::limit(strip_tags((string) ($project->excerpt ?: $project->description)), 160),
                ]
            );
        });

        static::deleted(function (PortfolioProject $project) {
            \App\Models\Page::where('slug', '/'.trim($project->slug, '/').'/')->delete();
        });
    }
}
