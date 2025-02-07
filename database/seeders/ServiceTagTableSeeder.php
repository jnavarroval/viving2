<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;

class ServiceTagTableSeeder extends Seeder
{

    /**
     * Auto generated seed file
     *
     * @return void
     */
    public function run()
    {
        

        \DB::table('service_tag')->delete();
        
        \DB::table('service_tag')->insert(array (
            0 => 
            array (
                'id' => 1,
                'service_id' => 2,
                'tag_id' => 1,
            ),
            1 => 
            array (
                'id' => 2,
                'service_id' => 3,
                'tag_id' => 1,
            ),
            2 => 
            array (
                'id' => 3,
                'service_id' => 4,
                'tag_id' => 1,
            ),
            3 => 
            array (
                'id' => 4,
                'service_id' => 5,
                'tag_id' => 1,
            ),
            4 => 
            array (
                'id' => 5,
                'service_id' => 6,
                'tag_id' => 2,
            ),
            5 => 
            array (
                'id' => 6,
                'service_id' => 7,
                'tag_id' => 1,
            ),
            6 => 
            array (
                'id' => 7,
                'service_id' => 8,
                'tag_id' => 4,
            ),
            7 => 
            array (
                'id' => 8,
                'service_id' => 9,
                'tag_id' => 4,
            ),
            8 => 
            array (
                'id' => 9,
                'service_id' => 10,
                'tag_id' => 4,
            ),
            9 => 
            array (
                'id' => 10,
                'service_id' => 11,
                'tag_id' => 1,
            ),
            10 => 
            array (
                'id' => 11,
                'service_id' => 12,
                'tag_id' => 4,
            ),
            11 => 
            array (
                'id' => 12,
                'service_id' => 13,
                'tag_id' => 2,
            ),
            12 => 
            array (
                'id' => 13,
                'service_id' => 14,
                'tag_id' => 3,
            ),
            13 => 
            array (
                'id' => 14,
                'service_id' => 15,
                'tag_id' => 2,
            ),
            14 => 
            array (
                'id' => 15,
                'service_id' => 16,
                'tag_id' => 1,
            ),
            15 => 
            array (
                'id' => 16,
                'service_id' => 17,
                'tag_id' => 1,
            ),
            16 => 
            array (
                'id' => 17,
                'service_id' => 18,
                'tag_id' => 2,
            ),
        ));
        
        
    }
}