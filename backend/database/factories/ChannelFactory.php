<?php

namespace Database\Factories;

use App\Models\Channel;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Channel>
 */
class ChannelFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var class-string<\Illuminate\Database\Eloquent\Model>
     */
    protected $model = Channel::class;


    public function definition()
    {
        return [
            'user_id' => $this->faker->numberBetween(1, 10),
            'name' => $this->faker->name,
            'description' => $this->faker->text,
            'members_count' => $this->faker->numberBetween(1, 100),
            'image' => $this->faker->image,
            'avatar' => $this->faker->image,
        ];
    }
}
