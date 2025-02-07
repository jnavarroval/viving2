<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;

class ClinicCategoryTableSeeder extends Seeder
{

    /**
     * Auto generated seed file
     *
     * @return void
     */
    public function run()
    {
        

        \DB::table('clinic_category')->delete();
        
        \DB::table('clinic_category')->insert(array (
            0 => 
            array (
                'id' => 4,
                'clinic_category_id' => 1,
                'clinic_id' => 24,
            ),
            1 => 
            array (
                'id' => 5,
                'clinic_category_id' => 1,
                'clinic_id' => 25,
            ),
            2 => 
            array (
                'id' => 6,
                'clinic_category_id' => 1,
                'clinic_id' => 27,
            ),
            3 => 
            array (
                'id' => 7,
                'clinic_category_id' => 1,
                'clinic_id' => 28,
            ),
            4 => 
            array (
                'id' => 9,
                'clinic_category_id' => 1,
                'clinic_id' => 30,
            ),
            5 => 
            array (
                'id' => 10,
                'clinic_category_id' => 3,
                'clinic_id' => 21,
            ),
            6 => 
            array (
                'id' => 12,
                'clinic_category_id' => 3,
                'clinic_id' => 29,
            ),
            7 => 
            array (
                'id' => 13,
                'clinic_category_id' => 1,
                'clinic_id' => 32,
            ),
            8 => 
            array (
                'id' => 14,
                'clinic_category_id' => 1,
                'clinic_id' => 22,
            ),
            9 => 
            array (
                'id' => 15,
                'clinic_category_id' => 2,
                'clinic_id' => 23,
            ),
        ));
        
        
    }
}