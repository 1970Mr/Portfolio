<?php

namespace Database\Seeders;

use App\Models\Portfolio;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class PortfolioSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Portfolio::factory()->createMany([
            [
                'title' => 'سایت portfolio',
                'project_type' => 'طراحی و توسعه سایت',
                'customer' => 'خودم',
                'link' => 'rasmor.ir',
                'technology' => 'php, laravel',
                'media_type' => Portfolio::$mediaTypes[0],
                'media' => [
                    'media_type' => Portfolio::$mediaTypes[0],
                    'image' => [
                        'name' => fake()->name(),
                        'relative_path' => fake()->imageUrl(),
                    ],
                ],
                'status' => true,
            ],
            [
                'title' => 'سایت خبری mohebnews',
                'project_type' => 'طراحی سایت',
                'customer' => 'یکی از آشنایان',
                'link' => 'mohebnews.com',
                'technology' => 'wordpress',
                'media_type' => Portfolio::$mediaTypes[0],
                'media' => [
                    'media_type' => Portfolio::$mediaTypes[0],
                    'image' => [
                        'name' => fake()->name(),
                        'relative_path' => fake()->imageUrl(),
                    ],
                ],
                'status' => true,
            ]
        ]);

        Portfolio::factory(10)->state(['status' => false])->create();
    }
}
