<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Contact>
 */
class ContactFactory extends Factory
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
            'description' => fake()->text(50),
            'email' => fake()->email(),
            'phone_number' => fake()->phoneNumber(),
            'telegram' => fake()->name(),
            'instagram' => fake()->name(),
            'twitter' => fake()->name(),
            'youtube' => fake()->name(),
            'facebook' => fake()->name(),
            'linkedin' => fake()->name(),
            'github' => fake()->name(),
            'status' => 0,
        ];
    }
}
