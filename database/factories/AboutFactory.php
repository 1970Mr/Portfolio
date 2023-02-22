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
            'name' => 'test',
            'family' => 'test',
            'age' => 'test',
            'country' => 'test',
            'job' => 'test',
            'address' => 'test',
            'phone_number' => 'test',
            'email' => 'test',
            'github' => 'test',
            'language' => 'test',
            'experiences' => 'test',
            'projects' => 'test',
            'awards' => 'test',
        ];
    }
}
