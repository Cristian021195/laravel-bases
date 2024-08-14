<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Post>
 */
class PostFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'title'=>$this->faker->sentence(),//oop faker
            'slug'=>$this->faker->slug(),//url amigable
            'content'=>fake()->text(500),//fn faker
            'category'=>$this->faker->word(),
            'published_at'=>$this->faker->dateTime(),
        ];
    }
}
