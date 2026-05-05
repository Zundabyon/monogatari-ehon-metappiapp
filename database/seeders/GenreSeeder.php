cat > database/seeders/GenreSeeder.php << 'EOF'
<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Genre;

class GenreSeeder extends Seeder
{
    public function run(): void
    {
        $genres = [
            ['name' => 'Adventure',   'name_ja' => 'ぼうけん'],
            ['name' => 'Magic',       'name_ja' => 'まほう'],
            ['name' => 'Sentai',      'name_ja' => 'せんたい'],
            ['name' => 'Animal',      'name_ja' => 'どうぶつ'],
            ['name' => 'Space',       'name_ja' => 'うちゅう'],
            ['name' => 'Ninja',       'name_ja' => 'にんじゃ'],
            ['name' => 'Princess',    'name_ja' => 'おひめさま'],
            ['name' => 'Detective',   'name_ja' => 'かいけつ'],
            ['name' => 'Sports',      'name_ja' => 'スポーツ'],
            ['name' => 'Folktale',    'name_ja' => 'むかしばなし'],
            ['name' => 'Police',      'name_ja' => 'おまわりさん'],
            ['name' => 'Firefighter', 'name_ja' => 'しょうぼうし'],
            ['name' => 'Dinosaur',    'name_ja' => 'きょうりゅう'],
            ['name' => 'Pirate',      'name_ja' => 'かいぞく'],
            ['name' => 'Robot',       'name_ja' => 'ロボット'],
        ];

        foreach ($genres as $genre) {
            Genre::firstOrCreate(
                ['name' => $genre['name']],
                ['name_ja' => $genre['name_ja']]
            );
        }
    }
}