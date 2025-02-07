<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;

class DoctorExperiencesTableSeeder extends Seeder
{

    /**
     * Auto generated seed file
     *
     * @return void
     */
    public function run()
    {
        

        \DB::table('doctor_experiences')->delete();
        
        \DB::table('doctor_experiences')->insert(array (
            0 => 
            array (
                'id' => 1,
                'doctor_id' => 1,
                'company' => 'Virtual Hospital, Landon',
                'description' => '<p>Virtual Hospital, Landon</p>',
                'from' => '2024-06-01 21:58:00',
                'to' => '2024-07-24 21:58:00',
                'image' => '/files/doctor_experiences/1721822442virtual-hospital.jpg',
                'is_active' => 1,
                'created_at' => '2024-07-24 17:00:42',
                'updated_at' => '2024-07-24 17:00:42',
                'deleted_at' => NULL,
            ),
            1 => 
            array (
                'id' => 2,
                'doctor_id' => 64,
                'company' => 'World Pharma',
                'description' => '<p>At World Pharma, Jonathan was part of a collaborative and supportive team. His colleagues were not just co-workers but mentors who guided him through the complexities of the pharmaceutical industry. The company provided him with numerous opportunities to learn and grow, including access to cutting-edge research and development projects.</p>',
                'from' => '2020-03-22 17:03:00',
                'to' => '2024-04-03 08:12:00',
                'image' => NULL,
                'is_active' => 1,
                'created_at' => '2024-08-28 15:33:07',
                'updated_at' => '2024-08-28 15:33:07',
                'deleted_at' => NULL,
            ),
            2 => 
            array (
                'id' => 3,
                'doctor_id' => 76,
                'company' => 'EWRWQWQWEWQ',
                'description' => '<p>ADASDAS</p>',
                'from' => '2024-10-10 05:00:00',
                'to' => '2024-10-13 05:00:00',
                'image' => '/files/doctor_experiences/1728306780istockphoto-1360469508-612x612.jpg',
                'is_active' => 1,
                'created_at' => '2024-10-07 18:13:00',
                'updated_at' => '2024-10-07 18:13:25',
                'deleted_at' => '2024-10-07 18:13:25',
            ),
        ));
        
        
    }
}