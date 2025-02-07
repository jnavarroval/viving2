<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;

class ArchiveTagTableSeeder extends Seeder
{

    /**
     * Auto generated seed file
     *
     * @return void
     */
    public function run()
    {
        

        \DB::table('archive_tag')->delete();
        
        \DB::table('archive_tag')->insert(array (
            0 => 
            array (
                'id' => 1,
                'archive_id' => 73,
                'tag_id' => 2,
            ),
        ));
        
        
    }
}