<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;

class AppointmentRatingsTableSeeder extends Seeder
{

    /**
     * Auto generated seed file
     *
     * @return void
     */
    public function run()
    {
        

        \DB::table('appointment_ratings')->delete();
        
        \DB::table('appointment_ratings')->insert(array (
            0 => 
            array (
                'id' => 1,
                'booked_appointment_id' => 59,
                'fromable_id' => 64,
                'fromable_type' => 'App\\Models\\Patient',
                'to_id' => 60,
                'to_type' => 'App\\Models\\Doctor',
                'rating' => 5.0,
                'comment' => 'All OK',
                'created_at' => '2024-10-05 21:53:53',
                'updated_at' => '2024-10-05 21:53:53',
                'deleted_at' => NULL,
            ),
        ));
        
        
    }
}