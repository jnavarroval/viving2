<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;

class ClinicTagTableSeeder extends Seeder
{

    /**
     * Auto generated seed file
     *
     * @return void
     */
    public function run()
    {
        

        \DB::table('clinic_tag')->delete();
        
        \DB::table('clinic_tag')->insert(array (
            0 => 
            array (
                'id' => 1,
                'clinic_id' => 27,
                'tag_id' => 1,
            ),
            1 => 
            array (
                'id' => 2,
                'clinic_id' => 28,
                'tag_id' => 2,
            ),
            2 => 
            array (
                'id' => 3,
                'clinic_id' => 29,
                'tag_id' => 2,
            ),
            3 => 
            array (
                'id' => 4,
                'clinic_id' => 30,
                'tag_id' => 2,
            ),
            4 => 
            array (
                'id' => 5,
                'clinic_id' => 24,
                'tag_id' => 2,
            ),
            5 => 
            array (
                'id' => 6,
                'clinic_id' => 25,
                'tag_id' => 3,
            ),
            6 => 
            array (
                'id' => 7,
                'clinic_id' => 22,
                'tag_id' => 4,
            ),
            7 => 
            array (
                'id' => 8,
                'clinic_id' => 21,
                'tag_id' => 4,
            ),
            8 => 
            array (
                'id' => 9,
                'clinic_id' => 32,
                'tag_id' => 2,
            ),
        ));
        
        
    }
}