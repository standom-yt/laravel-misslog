<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;
use App\Models\Blog;

class BlogFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            'user_id' => $this->faker->randomNumber(1),
            'title' => $this->faker->word,
            'content_a' => $this->faker->realText,
            'content_b' => $this->faker->realText,
            'content_c' => $this->faker->realText,
        ];
    }
}
