<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;

class ArchiveCategoriesTableSeeder extends Seeder
{

    /**
     * Auto generated seed file
     *
     * @return void
     */
    public function run()
    {
        

        \DB::table('archive_categories')->delete();
        
        \DB::table('archive_categories')->insert(array (
            0 => 
            array (
                'id' => 1,
                'name' => '{"en":"HEalth","hi":"sdasdgas","ar":"gsdags"}',
                'description' => '{"en":"<p>asdg</p>","hi":"<p>sdagsa</p>","ar":"<p>asdg</p>"}',
                'slug' => 'health-1',
                'is_active' => 1,
                'sort_order' => NULL,
                'image' => NULL,
                'created_at' => '2024-09-18 17:49:44',
                'updated_at' => '2024-09-18 17:49:44',
                'deleted_at' => NULL,
            ),
            1 => 
            array (
                'id' => 2,
                'name' => '{"en":"Pure","hi":"dsfsd","ar":"asdg"}',
                'description' => '{"en":"<p>sdag</p>","hi":"<p>asdgas</p>","ar":"<p>sdags</p>"}',
                'slug' => 'pure-2',
                'is_active' => 1,
                'sort_order' => NULL,
                'image' => NULL,
                'created_at' => '2024-09-18 17:50:01',
                'updated_at' => '2024-09-18 17:50:01',
                'deleted_at' => NULL,
            ),
        ));
        
        
    }
}