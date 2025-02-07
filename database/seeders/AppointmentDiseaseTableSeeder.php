<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;

class AppointmentDiseaseTableSeeder extends Seeder
{

    /**
     * Auto generated seed file
     *
     * @return void
     */
    public function run()
    {
        

        \DB::table('appointment_disease')->delete();
        
        \DB::table('appointment_disease')->insert(array (
            0 => 
            array (
                'id' => 1,
                'appointment_id' => 25,
                'disease_id' => 1,
            ),
            1 => 
            array (
                'id' => 2,
                'appointment_id' => 25,
                'disease_id' => 2,
            ),
            2 => 
            array (
                'id' => 3,
                'appointment_id' => 1,
                'disease_id' => 1,
            ),
            3 => 
            array (
                'id' => 4,
                'appointment_id' => 1,
                'disease_id' => 2,
            ),
            4 => 
            array (
                'id' => 5,
                'appointment_id' => 28,
                'disease_id' => 1,
            ),
            5 => 
            array (
                'id' => 6,
                'appointment_id' => 28,
                'disease_id' => 2,
            ),
            6 => 
            array (
                'id' => 11,
                'appointment_id' => 31,
                'disease_id' => 1,
            ),
            7 => 
            array (
                'id' => 12,
                'appointment_id' => 31,
                'disease_id' => 2,
            ),
            8 => 
            array (
                'id' => 13,
                'appointment_id' => 32,
                'disease_id' => 1,
            ),
            9 => 
            array (
                'id' => 14,
                'appointment_id' => 35,
                'disease_id' => 2,
            ),
            10 => 
            array (
                'id' => 15,
                'appointment_id' => 35,
                'disease_id' => 1,
            ),
            11 => 
            array (
                'id' => 16,
                'appointment_id' => 33,
                'disease_id' => 1,
            ),
            12 => 
            array (
                'id' => 17,
                'appointment_id' => 33,
                'disease_id' => 2,
            ),
            13 => 
            array (
                'id' => 18,
                'appointment_id' => 43,
                'disease_id' => 1,
            ),
            14 => 
            array (
                'id' => 19,
                'appointment_id' => 43,
                'disease_id' => 2,
            ),
            15 => 
            array (
                'id' => 20,
                'appointment_id' => 44,
                'disease_id' => 1,
            ),
            16 => 
            array (
                'id' => 21,
                'appointment_id' => 44,
                'disease_id' => 2,
            ),
            17 => 
            array (
                'id' => 22,
                'appointment_id' => 23,
                'disease_id' => 1,
            ),
            18 => 
            array (
                'id' => 23,
                'appointment_id' => 23,
                'disease_id' => 2,
            ),
            19 => 
            array (
                'id' => 27,
                'appointment_id' => 29,
                'disease_id' => 5,
            ),
            20 => 
            array (
                'id' => 28,
                'appointment_id' => 30,
                'disease_id' => 3,
            ),
            21 => 
            array (
                'id' => 29,
                'appointment_id' => 31,
                'disease_id' => 3,
            ),
            22 => 
            array (
                'id' => 30,
                'appointment_id' => 31,
                'disease_id' => 4,
            ),
            23 => 
            array (
                'id' => 31,
                'appointment_id' => 31,
                'disease_id' => 5,
            ),
            24 => 
            array (
                'id' => 32,
                'appointment_id' => 32,
                'disease_id' => 2,
            ),
            25 => 
            array (
                'id' => 33,
                'appointment_id' => 32,
                'disease_id' => 3,
            ),
            26 => 
            array (
                'id' => 34,
                'appointment_id' => 32,
                'disease_id' => 4,
            ),
            27 => 
            array (
                'id' => 35,
                'appointment_id' => 32,
                'disease_id' => 5,
            ),
            28 => 
            array (
                'id' => 36,
                'appointment_id' => 39,
                'disease_id' => 1,
            ),
            29 => 
            array (
                'id' => 39,
                'appointment_id' => 39,
                'disease_id' => 2,
            ),
            30 => 
            array (
                'id' => 40,
                'appointment_id' => 39,
                'disease_id' => 5,
            ),
        ));
        
        
    }
}