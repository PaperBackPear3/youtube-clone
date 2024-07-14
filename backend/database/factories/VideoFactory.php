<?php

namespace Database\Factories;

use App\Models\Channel;
use App\Models\Video;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Video>
 */
class VideoFactory extends Factory
{

    protected $model = Video::class;
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'title' => $this->faker->slug,
            'description' => $this->faker->text,
            'channel_id' => Channel::all()->random()->id,
            'views_count' => $this->faker->numberBetween(1, 1000),
            'likes_count' => $this->faker->numberBetween(1, 1000),
            'dislikes_count' => $this->faker->numberBetween(1, 1000),
            'comments_count' => $this->faker->numberBetween(1, 1000),
            'length' => $this->faker->numberBetween(1, 10000),
            'thumbnail' => $this->faker->image,
            'video_path' => $this->faker->image,
        ];
    }
}
