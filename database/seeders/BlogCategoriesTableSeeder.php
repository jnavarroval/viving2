<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;

class BlogCategoriesTableSeeder extends Seeder
{

    /**
     * Auto generated seed file
     *
     * @return void
     */
    public function run()
    {
        

        \DB::table('blog_categories')->delete();
        
        \DB::table('blog_categories')->insert(array (
            0 => 
            array (
                'id' => 1,
                'name' => '{"en":"Tips for maintaining overall health","hi":"Tips for maintaining overall health","ar":"Tips for maintaining overall health"}',
                'description' => '{"ar":null}',
                'slug' => 'tips-for-maintaining-overall-health-1',
                'is_active' => 1,
                'sort_order' => NULL,
                'image' => NULL,
                'created_at' => '2024-07-25 17:19:57',
                'updated_at' => '2024-07-25 17:20:03',
                'deleted_at' => NULL,
            ),
            1 => 
            array (
                'id' => 2,
                'name' => '{"en":"Medical News and Updates","hi":"Medical News and Updates","ar":"Medical News and Updates"}',
                'description' => '{"ar":null}',
                'slug' => 'medical-news-and-updates-2',
                'is_active' => 1,
                'sort_order' => NULL,
                'image' => NULL,
                'created_at' => '2024-07-25 17:20:23',
                'updated_at' => '2024-07-25 17:20:23',
                'deleted_at' => NULL,
            ),
            2 => 
            array (
                'id' => 3,
                'name' => '{"en":"Mental Health","hi":"Mental Health","ar":"Mental Health"}',
                'description' => '{"ar":null}',
                'slug' => 'mental-health-3',
                'is_active' => 1,
                'sort_order' => NULL,
                'image' => NULL,
                'created_at' => '2024-07-25 17:20:54',
                'updated_at' => '2024-07-25 17:20:54',
                'deleted_at' => NULL,
            ),
            3 => 
            array (
                'id' => 4,
                'name' => '{"en":"Pediatrics","hi":"Pediatrics","ar":"Pediatrics"}',
                'description' => '{"ar":null}',
                'slug' => 'pediatrics-4',
                'is_active' => 1,
                'sort_order' => NULL,
                'image' => NULL,
                'created_at' => '2024-07-25 17:21:16',
                'updated_at' => '2024-07-25 17:21:16',
                'deleted_at' => NULL,
            ),
        ));
        
        
    }
}