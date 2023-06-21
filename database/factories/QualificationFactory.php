<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Qualification>
 */
class QualificationFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition()
    {
        $types = ['experience', 'education'];
        return [
            'period' => fake()->date('Y'),
            'title' => fake()->title(),
            'descriptions' => fake()->text(30),
            'type' => $types[array_rand($types)],
            'status' => rand(0,1),
        ];
    }
}
