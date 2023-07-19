<?php

namespace Database\Factories;

use App\Models\Blog;
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
        Blog::count() > 0 && Blog::truncate();

        return [
            'title' => trim(fake()->text(10), '.'),
            'text' => fake()->text(1000),
            'author' => fake()->name(),
            'keywords' => trim(fake()->text(8), '.') . ', ' . trim(fake()->text(8), '.'),
            'photo' => [
                'name' => fake()->name(),
                'relative_path' => fake()->imageUrl()
            ],
            'status' => 0,
        ];
    }
}
