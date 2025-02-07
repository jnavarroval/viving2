<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;

class ClinicCategoriesTableSeeder extends Seeder
{

    /**
     * Auto generated seed file
     *
     * @return void
     */
    public function run()
    {
        

        \DB::table('clinic_categories')->delete();
        
        \DB::table('clinic_categories')->insert(array (
            0 => 
            array (
                'id' => 1,
                'name' => '{"en":"World health care","hi":"test","ar":"test"}',
                'description' => '{"en":"<p>test</p>","hi":"<p>test</p>","ar":"<p>test</p>"}',
                'slug' => 'world-health-care-1',
                'is_active' => 1,
                'is_featured' => 0,
                'icon' => NULL,
                'image' => NULL,
                'parent_category_id' => 2,
                'created_at' => '2024-07-24 17:37:06',
                'updated_at' => '2024-07-25 19:15:19',
                'deleted_at' => NULL,
            ),
            1 => 
            array (
                'id' => 2,
                'name' => '{"en":"WHO","hi":"पारिस्थितिकी","ar":"علم ال"}',
                'description' => '{"ar":null}',
                'slug' => 'who-2',
                'is_active' => 1,
                'is_featured' => 0,
                'icon' => NULL,
                'image' => NULL,
                'parent_category_id' => 2,
                'created_at' => '2024-09-25 13:21:04',
                'updated_at' => '2024-09-25 13:21:16',
                'deleted_at' => NULL,
            ),
            2 => 
            array (
                'id' => 3,
                'name' => '{"en":"Ecology","hi":"कृत्रिम बुद्धिमत्ता","ar":"مسابقة معلومات"}',
                'description' => '{"ar":null}',
                'slug' => 'ecology-3',
                'is_active' => 1,
                'is_featured' => 0,
                'icon' => NULL,
                'image' => NULL,
                'parent_category_id' => 1,
                'created_at' => '2024-09-25 13:21:36',
                'updated_at' => '2024-09-25 13:21:36',
                'deleted_at' => NULL,
            ),
        ));
        
        
    }
}