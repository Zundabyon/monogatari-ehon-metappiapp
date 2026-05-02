<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Story extends Model
{
    protected $fillable = [
        'title',
        'author',
        'intro',
        'develop',
        'conversion',
        'ending',
    ];
}
