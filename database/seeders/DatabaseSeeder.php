<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;

use App\Models\Home;
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
        // \App\Models\User::factory(10)->create();

        // \App\Models\User::factory()->create([
        //     'name' => 'Test User',
        //     'email' => 'test@example.com',
        // ]);

        // Home::factory()->create([
        //     'title' => 'من رسول مرشدی هستم',
        //     'sub_title' => 'توسعه دهنده سایت',
        //     'description' => 'من یک طراح وب و توسعه دهنده مقدماتی تونسی هستم و در ساخت تجربه های دوستانه و تمیز و کاربر پسند تمرکز دارم ، من علاقه زیادی به ساخت نرم افزار عالی دارم که زندگی اطرافیانم را بهبود می بخشد.',
        //     'photo' => [
        //         'name' => 'person.jpg',
        //         'relative_path' => 'images/home/person.jpg',
        //         'mobile' => [
        //             'name' => 'person-mobile.jpg',
        //             'relative_path' => 'images/home/person-mobile.jpg',
        //         ],
        //     ],
        //     'status' => false,
        // ]);
    }
}
