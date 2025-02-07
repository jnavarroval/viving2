<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;

class DoctorCategoryTableSeeder extends Seeder
{

    /**
     * Auto generated seed file
     *
     * @return void
     */
    public function run()
    {
        

        \DB::table('doctor_category')->delete();
        
        \DB::table('doctor_category')->insert(array (
            0 => 
            array (
                'id' => 1,
                'doctor_category_id' => 2,
                'doctor_id' => 1,
            ),
            1 => 
            array (
                'id' => 4,
                'doctor_category_id' => 3,
                'doctor_id' => 1,
            ),
            2 => 
            array (
                'id' => 5,
                'doctor_category_id' => 4,
                'doctor_id' => 1,
            ),
            3 => 
            array (
                'id' => 6,
                'doctor_category_id' => 2,
                'doctor_id' => 60,
            ),
            4 => 
            array (
                'id' => 10,
                'doctor_category_id' => 12,
                'doctor_id' => 66,
            ),
            5 => 
            array (
                'id' => 14,
                'doctor_category_id' => 12,
                'doctor_id' => 62,
            ),
            6 => 
            array (
                'id' => 15,
                'doctor_category_id' => 12,
                'doctor_id' => 61,
            ),
            7 => 
            array (
                'id' => 16,
                'doctor_category_id' => 11,
                'doctor_id' => 64,
            ),
            8 => 
            array (
                'id' => 17,
                'doctor_category_id' => 6,
                'doctor_id' => 63,
            ),
            9 => 
            array (
                'id' => 18,
                'doctor_category_id' => 21,
                'doctor_id' => 65,
            ),
            10 => 
            array (
                'id' => 19,
                'doctor_category_id' => 6,
                'doctor_id' => 69,
            ),
            11 => 
            array (
                'id' => 20,
                'doctor_category_id' => 8,
                'doctor_id' => 69,
            ),
            12 => 
            array (
                'id' => 21,
                'doctor_category_id' => NULL,
                'doctor_id' => 72,
            ),
            13 => 
            array (
                'id' => 22,
                'doctor_category_id' => 11,
                'doctor_id' => 72,
            ),
            14 => 
            array (
                'id' => 23,
                'doctor_category_id' => 20,
                'doctor_id' => 73,
            ),
            15 => 
            array (
                'id' => 24,
                'doctor_category_id' => 7,
                'doctor_id' => 74,
            ),
            16 => 
            array (
                'id' => 25,
                'doctor_category_id' => 19,
                'doctor_id' => 74,
            ),
            17 => 
            array (
                'id' => 26,
                'doctor_category_id' => 6,
                'doctor_id' => 75,
            ),
            18 => 
            array (
                'id' => 27,
                'doctor_category_id' => 15,
                'doctor_id' => 75,
            ),
            19 => 
            array (
                'id' => 28,
                'doctor_category_id' => 14,
                'doctor_id' => 76,
            ),
            20 => 
            array (
                'id' => 29,
                'doctor_category_id' => 15,
                'doctor_id' => 77,
            ),
            21 => 
            array (
                'id' => 30,
                'doctor_category_id' => 23,
                'doctor_id' => 77,
            ),
            22 => 
            array (
                'id' => 31,
                'doctor_category_id' => 25,
                'doctor_id' => 78,
            ),
            23 => 
            array (
                'id' => 32,
                'doctor_category_id' => 27,
                'doctor_id' => 79,
            ),
            24 => 
            array (
                'id' => 33,
                'doctor_category_id' => 29,
                'doctor_id' => 80,
            ),
            25 => 
            array (
                'id' => 34,
                'doctor_category_id' => 26,
                'doctor_id' => 81,
            ),
            26 => 
            array (
                'id' => 35,
                'doctor_category_id' => 17,
                'doctor_id' => 82,
            ),
            27 => 
            array (
                'id' => 36,
                'doctor_category_id' => 2,
                'doctor_id' => 83,
            ),
            28 => 
            array (
                'id' => 37,
                'doctor_category_id' => 12,
                'doctor_id' => 83,
            ),
            29 => 
            array (
                'id' => 38,
                'doctor_category_id' => 2,
                'doctor_id' => 85,
            ),
            30 => 
            array (
                'id' => 39,
                'doctor_category_id' => 11,
                'doctor_id' => 85,
            ),
            31 => 
            array (
                'id' => 40,
                'doctor_category_id' => 12,
                'doctor_id' => 85,
            ),
            32 => 
            array (
                'id' => 41,
                'doctor_category_id' => 3,
                'doctor_id' => 85,
            ),
            33 => 
            array (
                'id' => 42,
                'doctor_category_id' => 4,
                'doctor_id' => 85,
            ),
            34 => 
            array (
                'id' => 43,
                'doctor_category_id' => 9,
                'doctor_id' => 85,
            ),
            35 => 
            array (
                'id' => 44,
                'doctor_category_id' => 10,
                'doctor_id' => 85,
            ),
            36 => 
            array (
                'id' => 45,
                'doctor_category_id' => 2,
                'doctor_id' => 88,
            ),
            37 => 
            array (
                'id' => 46,
                'doctor_category_id' => 2,
                'doctor_id' => 89,
            ),
        ));
        
        
    }
}