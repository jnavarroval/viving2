<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;

class MedicalTestsTableSeeder extends Seeder
{

    /**
     * Auto generated seed file
     *
     * @return void
     */
    public function run()
    {
        

        \DB::table('medical_tests')->delete();
        
        
        
    }
}