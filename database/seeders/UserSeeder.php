<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        \App\Models\User::create([
            'name' => config('admin.name'),
            'email' => config('admin.email'),
            'password' => config('admin.password'),
        ]);

        // \App\Models\User::factory(10)->create();
    }
}
