<?php

namespace Tests\Feature;

use Illuminate\Foundation\Testing\RefreshDatabase;
use Tests\TestCase;

class RoutingTest extends TestCase
{
    public function test_example(): void
    {
        $response = $this->get('/');
        $response->assertStatus(200);
    }

    // ↓ここに追加してくださいな
    public function test_stories_index_returns_200(): void
    {
        $response = $this-> get('/stories');
        $response->assertStatus(200);
    }

    public function test_stories_create_returns_200(): void
    {
        $response = $this->get('/stories/create');
        $response->assertStatus(200);
    }
}