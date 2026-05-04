<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Genre extends Model
{
    protected $fillable = ['name'];

    public function templates()
    {
        return $this->hasMany(Template::class);
    }

    public function stories()
    {
        return $this->hasMany(Story::class);
    }
}