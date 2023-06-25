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
        About::factory()->create([
            'name' => 'رسول',
            'family' => 'مرشدی',
            'age' => '23',
            'country' => 'ایران',
            'job' => 'طراح و توسعه دهنده سایت',
            'address' => 'خوزستان، اهواز',
            'phone_number' => '+989387908594',
            'email' => 'rasoolmorshedi10@gmail.com',
            'github' => [
                'username' => 'github-1970',
                'url' => 'https://github.com/github-1970'
            ],
            'language' => 'فارسی، بختیاری (لری)',
            'experiences' => '3',
            'projects' => '26',
            'awards' => '0',
            'status' => '1',
        ]);

        About::factory(10)->state(['status' => false])->create();
    }
}
