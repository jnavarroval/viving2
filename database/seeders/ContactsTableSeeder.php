<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;

class ContactsTableSeeder extends Seeder
{

    /**
     * Auto generated seed file
     *
     * @return void
     */
    public function run()
    {
        

        \DB::table('contacts')->delete();
        
        \DB::table('contacts')->insert(array (
            0 => 
            array (
                'id' => 1,
                'name' => 'Aibert',
                'email' => 'aibert@gmail.com',
                'phone' => '0315648421564',
                'message' => 'Can U recieve a message and',
                'created_at' => '2024-09-20 15:19:30',
                'updated_at' => '2024-09-20 15:19:30',
                'deleted_at' => NULL,
            ),
            1 => 
            array (
                'id' => 2,
                'name' => 'Hameed',
                'email' => 'Hameed@gmail.com',
                'phone' => '5645445644564',
                'message' => 'Hey how i reach my query',
                'created_at' => '2024-09-20 15:20:38',
                'updated_at' => '2024-09-20 15:20:38',
                'deleted_at' => NULL,
            ),
        ));
        
        
    }
}