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
                'featured_image' => [
                    'name' => 'portfolio.jpg',
                    'relative_path' => 'seeder/images/portfolio/portfolio.jpg'
                ],
                'media_type' => Portfolio::$mediaTypes[0],
                'media' => null,
                'status' => true,
            ],
            [
                'title' => 'سایت خبری mohebnews',
                'project_type' => 'طراحی سایت',
                'customer' => 'یکی از آشنایان',
                'link' => 'mohebnews.com',
                'technology' => 'wordpress',
                'featured_image' => [
                    'name' => 'portfolio2.jpg',
                    'relative_path' => 'seeder/images/portfolio/portfolio2.jpg'
                ],
                'media_type' => Portfolio::$mediaTypes[0],
                'media' => null,
                'status' => true,
            ]
        ]);

        Portfolio::factory(10)->state(['status' => false])->create();
    }
}
