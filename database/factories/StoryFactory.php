<?php
namespace Database\Factories;
use App\Models\Genre;
use App\Models\Story;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends Factory<Story>
 */
class StoryFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'hero'     => $this->faker->name(),
            'friend'   => $this->faker->name(),
            'enemy'    => $this->faker->name(),
            'key_item' => $this->faker->word(),
            'genre_id' => Genre::factory(),
        ];
    }
}
