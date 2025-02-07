<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;

class DoctorLanguageTableSeeder extends Seeder
{

    /**
     * Auto generated seed file
     *
     * @return void
     */
    public function run()
    {
        

        \DB::table('doctor_language')->delete();
        
        \DB::table('doctor_language')->insert(array (
            0 => 
            array (
                'id' => 1,
                'doctor_id' => 60,
                'all_language_id' => 1,
            ),
            1 => 
            array (
                'id' => 2,
                'doctor_id' => 62,
                'all_language_id' => 1,
            ),
            2 => 
            array (
                'id' => 3,
                'doctor_id' => 66,
                'all_language_id' => 1,
            ),
            3 => 
            array (
                'id' => 4,
                'doctor_id' => 63,
                'all_language_id' => 1,
            ),
            4 => 
            array (
                'id' => 5,
                'doctor_id' => 64,
                'all_language_id' => 1,
            ),
            5 => 
            array (
                'id' => 6,
                'doctor_id' => 65,
                'all_language_id' => 1,
            ),
            6 => 
            array (
                'id' => 7,
                'doctor_id' => 69,
                'all_language_id' => 1,
            ),
            7 => 
            array (
                'id' => 8,
                'doctor_id' => 72,
                'all_language_id' => 1,
            ),
            8 => 
            array (
                'id' => 9,
                'doctor_id' => 73,
                'all_language_id' => 1,
            ),
            9 => 
            array (
                'id' => 10,
                'doctor_id' => 74,
                'all_language_id' => 1,
            ),
            10 => 
            array (
                'id' => 11,
                'doctor_id' => 75,
                'all_language_id' => 1,
            ),
            11 => 
            array (
                'id' => 12,
                'doctor_id' => 76,
                'all_language_id' => 1,
            ),
            12 => 
            array (
                'id' => 13,
                'doctor_id' => 77,
                'all_language_id' => 1,
            ),
            13 => 
            array (
                'id' => 14,
                'doctor_id' => 83,
                'all_language_id' => 1,
            ),
            14 => 
            array (
                'id' => 15,
                'doctor_id' => 85,
                'all_language_id' => 1,
            ),
            15 => 
            array (
                'id' => 16,
                'doctor_id' => 88,
                'all_language_id' => 1,
            ),
        ));
        
        
    }
}