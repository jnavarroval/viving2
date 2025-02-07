<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;

class ClinicMainCategoriesTableSeeder extends Seeder
{

    /**
     * Auto generated seed file
     *
     * @return void
     */
    public function run()
    {
        

        \DB::table('clinic_main_categories')->delete();
        
        \DB::table('clinic_main_categories')->insert(array (
            0 => 
            array (
                'id' => 1,
                'name' => '{"en":"General Medicine","hi":"सामान्य चिकित्सा","ar":"الطب العام"}',
                'description' => '{"ar":null}',
                'slug' => 'general-medicine-1',
                'is_active' => 1,
                'is_featured' => 0,
                'icon' => NULL,
                'image' => NULL,
                'created_at' => '2024-07-09 14:26:32',
                'updated_at' => '2024-07-09 14:27:23',
                'deleted_at' => NULL,
            ),
            1 => 
            array (
                'id' => 2,
                'name' => '{"en":"Pediatrics","hi":"बाल चिकित्सा","ar":"طب الأطفال"}',
                'description' => '{"ar":null}',
                'slug' => 'pediatrics-2',
                'is_active' => 1,
                'is_featured' => 0,
                'icon' => NULL,
                'image' => NULL,
                'created_at' => '2024-07-09 14:27:09',
                'updated_at' => '2024-07-09 14:27:09',
                'deleted_at' => NULL,
            ),
        ));
        
        
    }
}