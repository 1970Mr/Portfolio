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
        Home::factory()->create([
            'title' => 'رسول مرشدی هستم',
            'sub_title' => 'توسعه دهنده سایت',
            'description' => 'من یک طراح وب و توسعه دهنده مقدماتی تونسی هستم و در ساخت تجربه های دوستانه و تمیز و کاربر پسند تمرکز دارم ، من علاقه زیادی به ساخت نرم افزار عالی دارم که زندگی اطرافیانم را بهبود می بخشد.',
            'photo' => [
                'name' => 'person.jpg',
                'relative_path' => 'seeder/blog/person.jpg',
                'mobile' => [
                    'name' => 'person-mobile.jpg',
                    'relative_path' => 'seeder/blog/mobile/person-mobile.jpg',
                ],
            ],
            'status' => true,
        ]);

        Home::factory(10)->state(['status' => false])->create();
    }
}
