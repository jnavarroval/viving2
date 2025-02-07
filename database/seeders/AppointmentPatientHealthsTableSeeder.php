<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;

class AppointmentPatientHealthsTableSeeder extends Seeder
{

    /**
     * Auto generated seed file
     *
     * @return void
     */
    public function run()
    {
        

        \DB::table('appointment_patient_healths')->delete();
        
        
        
    }
}