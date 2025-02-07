<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;

class AppointmentTestTableSeeder extends Seeder
{

    /**
     * Auto generated seed file
     *
     * @return void
     */
    public function run()
    {
        

        \DB::table('appointment_test')->delete();
        
        \DB::table('appointment_test')->insert(array (
            0 => 
            array (
                'id' => 1,
                'appointment_id' => 16,
                'test_id' => 2,
            ),
            1 => 
            array (
                'id' => 2,
                'appointment_id' => 16,
                'test_id' => 3,
            ),
            2 => 
            array (
                'id' => 3,
                'appointment_id' => 16,
                'test_id' => 4,
            ),
            3 => 
            array (
                'id' => 4,
                'appointment_id' => 17,
                'test_id' => 2,
            ),
            4 => 
            array (
                'id' => 5,
                'appointment_id' => 17,
                'test_id' => 1,
            ),
            5 => 
            array (
                'id' => 6,
                'appointment_id' => 17,
                'test_id' => 3,
            ),
            6 => 
            array (
                'id' => 7,
                'appointment_id' => 17,
                'test_id' => 4,
            ),
            7 => 
            array (
                'id' => 8,
                'appointment_id' => 18,
                'test_id' => 2,
            ),
            8 => 
            array (
                'id' => 9,
                'appointment_id' => 18,
                'test_id' => 1,
            ),
            9 => 
            array (
                'id' => 10,
                'appointment_id' => 18,
                'test_id' => 3,
            ),
            10 => 
            array (
                'id' => 11,
                'appointment_id' => 18,
                'test_id' => 4,
            ),
            11 => 
            array (
                'id' => 12,
                'appointment_id' => 19,
                'test_id' => 1,
            ),
            12 => 
            array (
                'id' => 13,
                'appointment_id' => 19,
                'test_id' => 2,
            ),
            13 => 
            array (
                'id' => 14,
                'appointment_id' => 19,
                'test_id' => 3,
            ),
            14 => 
            array (
                'id' => 15,
                'appointment_id' => 20,
                'test_id' => 1,
            ),
            15 => 
            array (
                'id' => 16,
                'appointment_id' => 20,
                'test_id' => 2,
            ),
            16 => 
            array (
                'id' => 17,
                'appointment_id' => 20,
                'test_id' => 3,
            ),
            17 => 
            array (
                'id' => 18,
                'appointment_id' => 21,
                'test_id' => 1,
            ),
            18 => 
            array (
                'id' => 19,
                'appointment_id' => 21,
                'test_id' => 2,
            ),
            19 => 
            array (
                'id' => 20,
                'appointment_id' => 21,
                'test_id' => 3,
            ),
            20 => 
            array (
                'id' => 21,
                'appointment_id' => 22,
                'test_id' => 1,
            ),
            21 => 
            array (
                'id' => 22,
                'appointment_id' => 22,
                'test_id' => 2,
            ),
            22 => 
            array (
                'id' => 23,
                'appointment_id' => 22,
                'test_id' => 3,
            ),
            23 => 
            array (
                'id' => 24,
                'appointment_id' => 23,
                'test_id' => 1,
            ),
            24 => 
            array (
                'id' => 25,
                'appointment_id' => 23,
                'test_id' => 2,
            ),
            25 => 
            array (
                'id' => 27,
                'appointment_id' => 26,
                'test_id' => 1,
            ),
            26 => 
            array (
                'id' => 28,
                'appointment_id' => 26,
                'test_id' => 2,
            ),
            27 => 
            array (
                'id' => 29,
                'appointment_id' => 26,
                'test_id' => 3,
            ),
            28 => 
            array (
                'id' => 30,
                'appointment_id' => 1,
                'test_id' => 1,
            ),
            29 => 
            array (
                'id' => 31,
                'appointment_id' => 1,
                'test_id' => 2,
            ),
            30 => 
            array (
                'id' => 32,
                'appointment_id' => 1,
                'test_id' => 3,
            ),
            31 => 
            array (
                'id' => 33,
                'appointment_id' => 1,
                'test_id' => 1,
            ),
            32 => 
            array (
                'id' => 34,
                'appointment_id' => 1,
                'test_id' => 2,
            ),
            33 => 
            array (
                'id' => 35,
                'appointment_id' => 1,
                'test_id' => 3,
            ),
            34 => 
            array (
                'id' => 36,
                'appointment_id' => 30,
                'test_id' => 1,
            ),
            35 => 
            array (
                'id' => 39,
                'appointment_id' => 43,
                'test_id' => 1,
            ),
            36 => 
            array (
                'id' => 40,
                'appointment_id' => 43,
                'test_id' => 2,
            ),
            37 => 
            array (
                'id' => 41,
                'appointment_id' => 43,
                'test_id' => 3,
            ),
            38 => 
            array (
                'id' => 42,
                'appointment_id' => 43,
                'test_id' => 4,
            ),
            39 => 
            array (
                'id' => 43,
                'appointment_id' => 44,
                'test_id' => 1,
            ),
            40 => 
            array (
                'id' => 44,
                'appointment_id' => 44,
                'test_id' => 2,
            ),
            41 => 
            array (
                'id' => 51,
                'appointment_id' => 29,
                'test_id' => 4,
            ),
            42 => 
            array (
                'id' => 52,
                'appointment_id' => 31,
                'test_id' => 1,
            ),
            43 => 
            array (
                'id' => 53,
                'appointment_id' => 31,
                'test_id' => 3,
            ),
            44 => 
            array (
                'id' => 54,
                'appointment_id' => 31,
                'test_id' => 2,
            ),
            45 => 
            array (
                'id' => 55,
                'appointment_id' => 31,
                'test_id' => 4,
            ),
            46 => 
            array (
                'id' => 56,
                'appointment_id' => 31,
                'test_id' => 5,
            ),
            47 => 
            array (
                'id' => 57,
                'appointment_id' => 32,
                'test_id' => 1,
            ),
            48 => 
            array (
                'id' => 58,
                'appointment_id' => 32,
                'test_id' => 2,
            ),
            49 => 
            array (
                'id' => 59,
                'appointment_id' => 32,
                'test_id' => 3,
            ),
            50 => 
            array (
                'id' => 60,
                'appointment_id' => 39,
                'test_id' => 1,
            ),
            51 => 
            array (
                'id' => 61,
                'appointment_id' => 39,
                'test_id' => 2,
            ),
            52 => 
            array (
                'id' => 62,
                'appointment_id' => 39,
                'test_id' => 5,
            ),
        ));
        
        
    }
}