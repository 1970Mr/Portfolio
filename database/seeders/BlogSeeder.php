<?php

namespace Database\Seeders;

use App\Models\Blog;
use Illuminate\Database\Seeder;

class BlogSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Blog::factory(10)->create([
            'photo' => [
                'name' => 'blog.jpg',
                'relative_path' => 'seeder/images/blog/blog.jpg',
            ],
            'status' => true
        ]);
    }
}
