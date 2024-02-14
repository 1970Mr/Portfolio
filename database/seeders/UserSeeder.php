<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        if(User::all()->count() >= 1)
            User::truncate();

        User::create([
            'name' => config('admin.name'),
            'local_name' => config('admin.local-name'),
            'email' => config('admin.email'),
            'password' => Hash::make(config('admin.password')),
        ]);

        // \App\Models\User::factory(10)->create();
    }
}
