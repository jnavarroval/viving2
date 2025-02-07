<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;

class ClinicLanguageTableSeeder extends Seeder
{

    /**
     * Auto generated seed file
     *
     * @return void
     */
    public function run()
    {
        

        \DB::table('clinic_language')->delete();
        
        \DB::table('clinic_language')->insert(array (
            0 => 
            array (
                'id' => 1,
                'clinic_id' => 22,
                'all_language_id' => 1,
            ),
            1 => 
            array (
                'id' => 2,
                'clinic_id' => 22,
                'all_language_id' => 3,
            ),
            2 => 
            array (
                'id' => 3,
                'clinic_id' => 27,
                'all_language_id' => 1,
            ),
            3 => 
            array (
                'id' => 4,
                'clinic_id' => 29,
                'all_language_id' => 1,
            ),
            4 => 
            array (
                'id' => 5,
                'clinic_id' => 30,
                'all_language_id' => 1,
            ),
            5 => 
            array (
                'id' => 6,
                'clinic_id' => 32,
                'all_language_id' => 3,
            ),
        ));
        
        
    }
}