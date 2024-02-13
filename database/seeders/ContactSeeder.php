<?php

namespace Database\Seeders;

use App\Models\Contact;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class ContactSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $json_data = file_get_contents('database/seeders/json_data/contact.json');
        $contacts = json_decode($json_data, true);
        Contact::factory()->createMany($contacts);
        Contact::factory(10)->create();
    }
}
