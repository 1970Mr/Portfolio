<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Home>
 */
class HomeFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition()
    {
        $imagePath = fake()->filePath();
        $imagePathMobile = fake()->filePath();
        return [
            'title' => fake()->name(),
            'sub_title' => fake()->userName(),
            'description' => fake()->text(200),
            'photo' => [
                'name' => basename($imagePath),
                'relative_path' => $imagePath,
                'mobile' => [
                    'name' => basename($imagePathMobile),
                    'relative_path' => $imagePathMobile,
                ]
            ],
            'status' => array_rand([true, false]),
        ];
    }
}
