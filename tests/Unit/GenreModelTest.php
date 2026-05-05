<?php

namespace Tests\Unit;

use Tests\TestCase;
use App\Models\Genre;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Database\Eloquent\Relations\HasMany;

class GenreModelTest extends TestCase
{
    use RefreshDatabase;

    public function test_genre_has_many_stories(): void
    {
        $genre = Genre::factory()->create();
        $this->assertInstanceOf(HasMany::class, $genre->stories());
    }

    // ↓ここに追加しますわ✨
    public function test_genre_has_many_templates(): void
    {
        $genre = Genre::factory()->create();
        $this->assertInstanceOf(HasMany::class, $genre->templates());
    }
}