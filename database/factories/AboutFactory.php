<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\About>
 */
class AboutFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition()
    {
        return [
            'name' => fake()->name(),
            'family' => fake()->lastName(),
            'age' => fake()->numberBetween(10, 50),
            'country' => fake()->country(),
            'job' => fake()->jobTitle(),
            'address' => fake()->address(),
            'phone_number' => fake()->phoneNumber(),
            'email' => fake()->email(),
            'github' => [
                'username' => fake()->name(),
                'url' => fake()->url()
            ],
            'language' => fake()->languageCode(),
            'experiences' => fake()->numberBetween(1, 10),
            'projects' => fake()->numberBetween(10, 100),
            'awards' => fake()->numberBetween(0, 10),
            'status' => fake()->numberBetween(0, 1),
        ];
    }
}
