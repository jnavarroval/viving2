<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;

class DoctorTagTableSeeder extends Seeder
{

    /**
     * Auto generated seed file
     *
     * @return void
     */
    public function run()
    {
        

        \DB::table('doctor_tag')->delete();
        
        \DB::table('doctor_tag')->insert(array (
            0 => 
            array (
                'id' => 1,
                'doctor_id' => 64,
                'tag_id' => 1,
            ),
            1 => 
            array (
                'id' => 2,
                'doctor_id' => 63,
                'tag_id' => 1,
            ),
            2 => 
            array (
                'id' => 3,
                'doctor_id' => 65,
                'tag_id' => 1,
            ),
            3 => 
            array (
                'id' => 4,
                'doctor_id' => 69,
                'tag_id' => 1,
            ),
            4 => 
            array (
                'id' => 5,
                'doctor_id' => 72,
                'tag_id' => 1,
            ),
            5 => 
            array (
                'id' => 6,
                'doctor_id' => 73,
                'tag_id' => 2,
            ),
            6 => 
            array (
                'id' => 7,
                'doctor_id' => 74,
                'tag_id' => 3,
            ),
            7 => 
            array (
                'id' => 8,
                'doctor_id' => 75,
                'tag_id' => 2,
            ),
            8 => 
            array (
                'id' => 9,
                'doctor_id' => 76,
                'tag_id' => 4,
            ),
            9 => 
            array (
                'id' => 10,
                'doctor_id' => 77,
                'tag_id' => 3,
            ),
            10 => 
            array (
                'id' => 11,
                'doctor_id' => 78,
                'tag_id' => 3,
            ),
            11 => 
            array (
                'id' => 12,
                'doctor_id' => 79,
                'tag_id' => 4,
            ),
            12 => 
            array (
                'id' => 13,
                'doctor_id' => 80,
                'tag_id' => 4,
            ),
            13 => 
            array (
                'id' => 14,
                'doctor_id' => 81,
                'tag_id' => 2,
            ),
            14 => 
            array (
                'id' => 15,
                'doctor_id' => 83,
                'tag_id' => 2,
            ),
            15 => 
            array (
                'id' => 16,
                'doctor_id' => 83,
                'tag_id' => 4,
            ),
            16 => 
            array (
                'id' => 17,
                'doctor_id' => 85,
                'tag_id' => 1,
            ),
            17 => 
            array (
                'id' => 18,
                'doctor_id' => 85,
                'tag_id' => 2,
            ),
            18 => 
            array (
                'id' => 19,
                'doctor_id' => 85,
                'tag_id' => 3,
            ),
            19 => 
            array (
                'id' => 20,
                'doctor_id' => 88,
                'tag_id' => 2,
            ),
            20 => 
            array (
                'id' => 21,
                'doctor_id' => 88,
                'tag_id' => 3,
            ),
            21 => 
            array (
                'id' => 22,
                'doctor_id' => 88,
                'tag_id' => 4,
            ),
        ));
        
        
    }
}