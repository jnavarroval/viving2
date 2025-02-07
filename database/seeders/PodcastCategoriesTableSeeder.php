<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;

class PodcastCategoriesTableSeeder extends Seeder
{

    /**
     * Auto generated seed file
     *
     * @return void
     */
    public function run()
    {
        

        \DB::table('podcast_categories')->delete();
        
        
        
    }
}