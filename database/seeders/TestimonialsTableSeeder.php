<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;

class TestimonialsTableSeeder extends Seeder
{

    /**
     * Auto generated seed file
     *
     * @return void
     */
    public function run()
    {
        

        \DB::table('testimonials')->delete();
        
        \DB::table('testimonials')->insert(array (
            0 => 
            array (
                'id' => 1,
                'name' => 'Ibrahim Arman',
                'description' => 'I Am Very Satisfied with the way of that medications',
                'slug' => 'ibrahim-arman-1',
                'is_active' => 1,
                'sort_order' => NULL,
                'image' => NULL,
                'category' => 'OWNER OF MARKETING AGENCIES',
                'created_at' => '2024-09-20 14:49:42',
                'updated_at' => '2024-09-20 14:49:42',
                'deleted_at' => NULL,
            ),
            1 => 
            array (
                'id' => 2,
                'name' => 'Burhan al-Din',
                'description' => 'Nice Services And Efficient Staff',
                'slug' => 'burhan-al-din-2',
                'is_active' => 1,
                'sort_order' => NULL,
                'image' => NULL,
                'category' => 'Customer',
                'created_at' => '2024-09-20 14:50:10',
                'updated_at' => '2024-09-20 14:50:10',
                'deleted_at' => NULL,
            ),
        ));
        
        
    }
}