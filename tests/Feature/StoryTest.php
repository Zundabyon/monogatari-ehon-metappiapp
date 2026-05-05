<?php

namespace Tests\Feature;

use Tests\TestCase;
use App\Models\Genre;
use App\Models\Story;
use Illuminate\Foundation\Testing\RefreshDatabase;

class StoryTest extends TestCase
{
    use RefreshDatabase;

    public function test_story_can_be_created(): void
    {
        // ① テスト用のGenreを作成
        $genre = Genre::factory()->create();

        // ② POSTリクエストを送信
        $response = $this->post('/stories', [
            'hero'     => 'はちわれ',
            'friend'   => 'ちいかわ',
            'enemy'    => 'でかつよ',
            'key_item' => 'おまじない',
            'genre_id' => $genre->id,
        ]);

        // ③ DBに保存されたか確認
        $this->assertDatabaseHas('stories', [
            'hero'     => 'はちわれ',
            'friend'   => 'ちいかわ',
            'enemy'    => 'でかつよ',
            'key_item' => 'おまじない',
            'genre_id' => $genre->id,
        ]);
    }
        public function test_story_can_be_liked(): void
    {
        // ① テスト用のStoryを作成（likesは0）
        $story = Story::factory()->create();

        // ② POSTリクエストを送信
        $this->post("/stories/{$story->id}/like");

        // ③ likesが1になっているか確認
        $this->assertDatabaseHas('stories', [
            'id'    => $story->id,
            'likes' => 1,
        ]);
    }

}
