<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;

class EventCategoriesTableSeeder extends Seeder
{

    /**
     * Auto generated seed file
     *
     * @return void
     */
    public function run()
    {
        

        \DB::table('event_categories')->delete();
        
        \DB::table('event_categories')->insert(array (
            0 => 
            array (
                'id' => 1,
                'name' => '{"en":"Medical Conferences","hi":"चिकित्सा सम्मेलन","ar":"المؤتمرات الطبية"}',
                'description' => '{"ar":null}',
                'slug' => 'medical-conferences-1',
                'is_active' => 1,
                'sort_order' => NULL,
                'image' => NULL,
                'created_at' => '2024-07-09 15:02:50',
                'updated_at' => '2024-07-09 15:03:43',
                'deleted_at' => NULL,
            ),
            1 => 
            array (
                'id' => 2,
                'name' => '{"en":"Health Fairs","hi":"स्वास्थ्य मेले","ar":"معارض الصحة"}',
                'description' => '{"ar":null}',
                'slug' => 'health-fairs-2',
                'is_active' => 1,
                'sort_order' => NULL,
                'image' => NULL,
                'created_at' => '2024-07-09 15:03:34',
                'updated_at' => '2024-07-09 15:03:34',
                'deleted_at' => NULL,
            ),
        ));
        
        
    }
}