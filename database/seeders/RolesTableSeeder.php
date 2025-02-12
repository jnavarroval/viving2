<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;

class RolesTableSeeder extends Seeder
{

    /**
     * Auto generated seed file
     *
     * @return void
     */
    public function run()
    {
        

        \DB::table('roles')->delete();
        
        \DB::table('roles')->insert(array (
            0 => 
            array (
                'id' => 9,
                'name' => 'SuperAdmin',
                'description' => 'Super Admin',
                'icon' => 'ok',
                'role_code' => 'super_admin',
                'is_active' => 1,
                'created_at' => '2023-01-04 23:13:02',
                'updated_at' => NULL,
                'deleted_at' => NULL,
            ),
            1 => 
            array (
                'id' => 11,
                'name' => 'Admin',
                'description' => 'Admin',
                'icon' => 'ok',
                'role_code' => 'admin',
                'is_active' => 1,
                'created_at' => '2023-01-04 23:13:02',
                'updated_at' => NULL,
                'deleted_at' => NULL,
            ),
            2 => 
            array (
                'id' => 12,
                'name' => 'Doctor',
                'description' => 'doctor',
                'icon' => 'ok',
                'role_code' => 'doctor',
                'is_active' => 1,
                'created_at' => '2023-01-04 23:13:02',
                'updated_at' => NULL,
                'deleted_at' => NULL,
            ),
            3 => 
            array (
                'id' => 13,
                'name' => 'Patient',
                'description' => 'patient',
                'icon' => 'ok',
                'role_code' => 'patient',
                'is_active' => 1,
                'created_at' => '2023-01-04 23:13:02',
                'updated_at' => NULL,
                'deleted_at' => NULL,
            ),
            4 => 
            array (
                'id' => 14,
                'name' => 'Clinic',
                'description' => 'clinic',
                'icon' => 'ok',
                'role_code' => 'clinic',
                'is_active' => 1,
                'created_at' => '2023-01-05 03:13:02',
                'updated_at' => NULL,
                'deleted_at' => NULL,
            ),
        ));
        
        
    }
}