<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Story extends Model
{
    use HasFactory;

    protected $fillable = [
        'hero',
        'friend',
        'enemy',
        'key_item',
        'genre_id',
    ];

    public function genre()
    {
        return $this->belongsTo(Genre::class);
    }
}