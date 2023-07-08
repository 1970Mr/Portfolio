<?php

namespace Database\Factories;

use App\Models\Portfolio;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Portfolio>
 */
class PortfolioFactory extends Factory
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
            'project_type' => fake()->text(30),
            'customer' => fake()->name(),
            'link' => fake()->url(),
            'technology' => fake()->text(20),
            'featured_image' => [
                'name' => fake()->name(),
                'relative_path' => fake()->imageUrl(),
            ],
            'media_type' => Portfolio::$mediaTypes[0],
            'media' => null,
            'status' => 0,
        ];
    }
}
