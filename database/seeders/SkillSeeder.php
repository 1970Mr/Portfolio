<?php

namespace Database\Seeders;

use App\Models\Skill;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class SkillSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $json_data = file_get_contents('database/seeders/json_data/skills.json');
        $skills = json_decode($json_data, true);
        Skill::factory()->createMany($skills);
        Skill::factory(10)->state(['status' => false])->create();
    }
}
