<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;

class BroadcastCategoriesTableSeeder extends Seeder
{

    /**
     * Auto generated seed file
     *
     * @return void
     */
    public function run()
    {
        

        \DB::table('broadcast_categories')->delete();
        
        \DB::table('broadcast_categories')->insert(array (
            0 => 
            array (
                'id' => 1,
                'name' => '{"en":"Medical Conferences","hi":"चिकित्सा सम्मेलन","ar":"المؤتمرات الطبية"}',
                'description' => '{"ar":null}',
                'slug' => 'medical-conferences-1',
                'is_active' => 1,
                'sort_order' => NULL,
                'image' => NULL,
                'created_at' => '2024-07-09 15:04:27',
                'updated_at' => '2024-07-09 15:04:27',
                'deleted_at' => NULL,
            ),
            1 => 
            array (
                'id' => 2,
                'name' => '{"en":"Medical Seminars","hi":"चिकित्सा संगोष्ठी","ar":"الندوات الطبية"}',
                'description' => '{"ar":null}',
                'slug' => 'medical-seminars-2',
                'is_active' => 1,
                'sort_order' => NULL,
                'image' => NULL,
                'created_at' => '2024-07-09 15:05:01',
                'updated_at' => '2024-07-09 15:05:01',
                'deleted_at' => NULL,
            ),
        ));
        
        
    }
}