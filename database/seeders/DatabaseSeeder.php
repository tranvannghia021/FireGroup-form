<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use  App\Models\Contacts;


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
       // \App\Models\Contacts::factory(10)->create();
       for($i=0;$i<10 ; $i++){
           $this->call(ContactsSeeder::class);      
       }
    }
}
