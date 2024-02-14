<?php

namespace Database\Seeders;

use App\Models\About;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class AboutSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $json_data = file_get_contents('database/seeders/json_data/about.json');
        $abouts = json_decode($json_data, true);
        About::factory()->createMAny($abouts);
//        About::factory(10)->state(['status' => false])->create();
    }
}
