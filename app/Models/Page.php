<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Page extends Model
{
    protected $fillable = ['title', 'slug', 'template', 'status', 'excerpt', 'content', 'meta_title', 'meta_description'];
}
