<?php

namespace Tests\Unit;

use Tests\TestCase;
use App\Models\Story;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class StoryModelTest extends TestCase
{
    use RefreshDatabase;

    public function test_story_belongs_to_genre(): void
    {
        // ここにテストコードを追加する

        // ① Storyのインスタンスを作る
        $story = Story::factory()->create();

        // ② story->genre()がBelongsToのインスタンスであることを確認する
        $this->assertInstanceOf(BelongsTo::class, $story->genre());
    }
}