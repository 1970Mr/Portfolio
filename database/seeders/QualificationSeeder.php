<?php

namespace Database\Seeders;

use App\Models\Qualification;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class QualificationSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $json_data = file_get_contents('database/seeders/json_data/qualifications.json');
        $qualifications = json_decode($json_data, true);
        Qualification::factory()->createMany($qualifications);
//        Qualification::factory(10)->state(['status' => 0])->create();
    }
}
