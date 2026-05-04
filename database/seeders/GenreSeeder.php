<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Genre;

class GenreSeeder extends Seeder
{
    public function run(): void
    {
    $genres = [
        ['name' => 'Adventure'],
        ['name' => 'Magic'],
        ['name' => 'Sentai'],
        ['name' => 'Animal'],
        ['name' => 'Space'],
        ['name' => 'Ninja'],
        ['name' => 'Princess'],
        ['name' => 'Detective'],
        ['name' => 'Sports'],
        ['name' => 'Folktale'],
        ['name' => 'Police'],
        ['name' => 'Firefighter'],
        ['name' => 'Dinosaur'],
        ['name' => 'Pirate'],
        ['name' => 'Robot'],
    ];
        foreach ($genres as $genre) {
            Genre::create($genre);
        }
    }
}