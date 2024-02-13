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
        $json_data = file_get_contents('database/seeders/json_data/portfolio.json');
        $portfolios = json_decode($json_data, true);
        Portfolio::factory()->createMany($portfolios);
        Portfolio::factory(10)->state(['status' => false])->create();
    }
}
