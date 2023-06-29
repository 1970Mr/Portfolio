<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Blog>
 */
class BlogFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition()
    {
        return [
            'title' => fake()->title(),
            'text' => fake()->text(500),
            'author' => fake()->name(),
            'keywords' => fake()->text(15),
            'photo' => [
                'name' => fake()->name(),
                'relative_path' => fake()->imageUrl()
            ],
            'status' => 0,
        ];
    }
}
