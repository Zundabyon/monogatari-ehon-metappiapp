<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Template extends Model
{
    protected $fillable = [
        'genre_id',
        'intro_template',
        'develop_template',
        'conversion_template',
        'ending_template',
    ];

    public function genre()
    {
        return $this->belongsTo(Genre::class);
    }
}