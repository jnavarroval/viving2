<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;

class DoctorPaymentsHistoryTableSeeder extends Seeder
{

    /**
     * Auto generated seed file
     *
     * @return void
     */
    public function run()
    {
        

        \DB::table('doctor_payments_history')->delete();
        
        
        
    }
}