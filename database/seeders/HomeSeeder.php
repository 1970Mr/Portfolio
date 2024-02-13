<?php

namespace Database\Seeders;

use App\Models\Home;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class HomeSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $json_data = file_get_contents('database/seeders/json_data/home.json');
        $homes = json_decode($json_data, true);
        Home::factory()->createMany($homes);
        Home::factory(10)->state(['status' => false])->create();
    }
}
