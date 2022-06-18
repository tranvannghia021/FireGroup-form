<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class ContactsSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $faker = \Faker\Factory::create();
        DB::table('contacts')->insert([
            'name' => $faker->firstName,
            'address' =>$faker->address,
            'phone' => $faker->phoneNumber,
            'dateofbirth' => "2002-06-18", 
        
        ]);
    }
}
