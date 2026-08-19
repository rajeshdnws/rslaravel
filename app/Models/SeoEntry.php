<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class SeoEntry extends Model
{
    protected $fillable = ['url', 'title', 'description', 'indexing', 'status'];
}
