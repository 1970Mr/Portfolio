<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        $this->call([
            UserSeeder::class,
            HomeSeeder::class,
            AboutSeeder::class,
            SkillSeeder::class,
            QualificationSeeder::class,
            PortfolioSeeder::class,
            ContactSeeder::class,
            BlogSeeder::class,
        ]);
    }
}
