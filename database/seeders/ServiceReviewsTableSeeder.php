<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;

class ServiceReviewsTableSeeder extends Seeder
{

    /**
     * Auto generated seed file
     *
     * @return void
     */
    public function run()
    {
        

        \DB::table('service_reviews')->delete();
        
        \DB::table('service_reviews')->insert(array (
            0 => 
            array (
                'id' => 1,
                'booked_service_id' => 20,
                'service_id' => 3,
                'patient_id' => 69,
                'doctor_id' => 1,
                'clinic_id' => NULL,
                'rating' => 3.0,
                'experience' => 0.0,
                'communication' => 0.0,
                'service' => 0.0,
                'comment' => 'asas',
                'is_active' => 1,
                'is_approved' => 0,
                'is_featured' => 0,
                'created_at' => '2024-10-07 18:25:16',
                'updated_at' => '2024-10-07 18:25:16',
                'deleted_at' => NULL,
            ),
        ));
        
        
    }
}