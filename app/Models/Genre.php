<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Genre extends Model
{
    use HasFactory;

    protected $fillable = ['name', 'name_ja'];

    public function templates()
    {
        return $this->hasMany(Template::class);
    }

    public function stories()
    {
        return $this->hasMany(Story::class);
    }
}