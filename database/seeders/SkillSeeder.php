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
        Skill::factory()->createMany([
            [
                'name' => 'php',
                'value' => 90,
                'category' => 'programming',
                'status' => 1,
            ],
            [
                'name' => 'laravel',
                'value' => 90,
                'category' => 'programming',
                'status' => 1,
            ],
            [
                'name' => 'html',
                'value' => 90,
                'category' => 'programming',
                'status' => 1,
            ],
            [
                'name' => 'css',
                'value' => 90,
                'category' => 'programming',
                'status' => 1,
            ],
            [
                'name' => 'js',
                'value' => 80,
                'category' => 'programming',
                'status' => 1,
            ],
            [
                'name' => 'bootstrap',
                'value' => 90,
                'category' => 'programming',
                'status' => 1,
            ],
            [
                'name' => 'tailwind',
                'value' => 50,
                'category' => 'programming',
                'status' => 1,
            ],
            [
                'name' => 'wordpress',
                'value' => 70,
                'category' => 'programming',
                'status' => 1,
            ],
            [
                'name' => 'seo',
                'value' => 40,
                'category' => 'seo',
                'status' => 1,
            ],
            [
                'name' => 'seo content',
                'value' => 80,
                'category' => 'seo',
                'status' => 1,
            ],
            [
                'name' => 'security programming',
                'value' => 70,
                'category' => 'security',
                'status' => 1,
            ],
            [
                'name' => 'web application penetration testing',
                'value' => 50,
                'category' => 'security',
                'status' => 1,
            ],
            [
                'name' => 'docker',
                'value' => 50,
                'category' => 'devops',
                'status' => 1,
            ],
            [
                'name' => 'git',
                'value' => 90,
                'category' => 'devops',
                'status' => 1,
            ],
        ]);

        Skill::factory(10)->state(['status' => false])->create();
    }
}
