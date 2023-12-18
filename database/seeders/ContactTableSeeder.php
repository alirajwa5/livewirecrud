<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use DB;

class ContactTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $contacts = [
            ['name' => 'Stewie Griffin'],
            ['name' => 'Brian Griffin'],
            ['name' => 'Lois Griffin'],
            ['name' => 'Peter Griffin'],
            ['name' => 'Meg Griffin'],
        ];

        // Now, let's insert them into the database.
        DB::table('contacts')->insert($contacts);
    }
}
