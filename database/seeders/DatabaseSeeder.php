<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;

use App\Models\About;
use App\Models\Home;
use App\Models\Skill;
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

        // About::factory()->create([
        //     'name' => 'رسول',
        //     'family' => 'مرشدی',
        //     'age' => '23',
        //     'country' => 'ایران',
        //     'job' => 'طراح و توسعه دهنده سایت',
        //     'address' => 'خوزستان، اهواز',
        //     'phone_number' => '+989387908594',
        //     'email' => 'rasoolmorshedi10@gmail.com',
        //     'github' => [
        //         'username' => 'github-1970',
        //         'url' => 'https://github.com/github-1970'
        //     ],
        //     'language' => 'فارسی، بختیاری (لری)',
        //     'experiences' => '3',
        //     'projects' => '26',
        //     'awards' => '0',
        //     'status' => '1',
        // ]);

        // Skill::factory(10)->state(['status' => 0])->create();

        // Skill::factory(15)->sequence(
        //     [
        //         'name' => 'php',
        //         'value' => 90,
        //         'category' => 'programming',
        //         'status' => 1,
        //     ],
        //     [
        //         'name' => 'laravel',
        //         'value' => 90,
        //         'category' => 'programming',
        //         'status' => 1,
        //     ],
        //     [
        //         'name' => 'html',
        //         'value' => 90,
        //         'category' => 'programming',
        //         'status' => 1,
        //     ],
        //     [
        //         'name' => 'css',
        //         'value' => 90,
        //         'category' => 'programming',
        //         'status' => 1,
        //     ],
        //     [
        //         'name' => 'js',
        //         'value' => 80,
        //         'category' => 'programming',
        //         'status' => 1,
        //     ],
        //     [
        //         'name' => 'bootstrap',
        //         'value' => 90,
        //         'category' => 'programming',
        //         'status' => 1,
        //     ],
        //     [
        //         'name' => 'tailwind',
        //         'value' => 50,
        //         'category' => 'programming',
        //         'status' => 1,
        //     ],
        //     [
        //         'name' => 'wordpress',
        //         'value' => 70,
        //         'category' => 'programming',
        //         'status' => 1,
        //     ],
        //     [
        //         'name' => 'seo',
        //         'value' => 40,
        //         'category' => 'seo',
        //         'status' => 1,
        //     ],
        //     [
        //         'name' => 'seo content',
        //         'value' => 80,
        //         'category' => 'seo',
        //         'status' => 1,
        //     ],
        //     [
        //         'name' => 'security programming',
        //         'value' => 70,
        //         'category' => 'security',
        //         'status' => 1,
        //     ],
        //     [
        //         'name' => 'security programming',
        //         'value' => 70,
        //         'category' => 'security',
        //         'status' => 1,
        //     ],
        //     [
        //         'name' => 'web application penetration testing',
        //         'value' => 50,
        //         'category' => 'security',
        //         'status' => 1,
        //     ],
        //     [
        //         'name' => 'docker',
        //         'value' => 50,
        //         'category' => 'devops',
        //         'status' => 1,
        //     ],
        //     [
        //         'name' => 'git',
        //         'value' => 90,
        //         'category' => 'devops',
        //         'status' => 1,
        //     ],
        // )->create();
    }
}
