<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;

class PostTagTableSeeder extends Seeder
{

    /**
     * Auto generated seed file
     *
     * @return void
     */
    public function run()
    {
        

        \DB::table('post_tag')->delete();
        
        \DB::table('post_tag')->insert(array (
            0 => 
            array (
                'id' => 1,
                'post_id' => 15,
                'tag_id' => 1,
            ),
            1 => 
            array (
                'id' => 2,
                'post_id' => 15,
                'tag_id' => 2,
            ),
            2 => 
            array (
                'id' => 3,
                'post_id' => 15,
                'tag_id' => 3,
            ),
            3 => 
            array (
                'id' => 4,
                'post_id' => 15,
                'tag_id' => 4,
            ),
            4 => 
            array (
                'id' => 5,
                'post_id' => 14,
                'tag_id' => 1,
            ),
            5 => 
            array (
                'id' => 6,
                'post_id' => 14,
                'tag_id' => 2,
            ),
            6 => 
            array (
                'id' => 7,
                'post_id' => 14,
                'tag_id' => 3,
            ),
            7 => 
            array (
                'id' => 8,
                'post_id' => 14,
                'tag_id' => 4,
            ),
            8 => 
            array (
                'id' => 9,
                'post_id' => 14,
                'tag_id' => 5,
            ),
            9 => 
            array (
                'id' => 10,
                'post_id' => 13,
                'tag_id' => 1,
            ),
            10 => 
            array (
                'id' => 11,
                'post_id' => 13,
                'tag_id' => 2,
            ),
            11 => 
            array (
                'id' => 12,
                'post_id' => 13,
                'tag_id' => 3,
            ),
            12 => 
            array (
                'id' => 13,
                'post_id' => 13,
                'tag_id' => 4,
            ),
            13 => 
            array (
                'id' => 14,
                'post_id' => 13,
                'tag_id' => 5,
            ),
            14 => 
            array (
                'id' => 15,
                'post_id' => 9,
                'tag_id' => 1,
            ),
            15 => 
            array (
                'id' => 16,
                'post_id' => 9,
                'tag_id' => 2,
            ),
            16 => 
            array (
                'id' => 17,
                'post_id' => 9,
                'tag_id' => 3,
            ),
            17 => 
            array (
                'id' => 18,
                'post_id' => 9,
                'tag_id' => 4,
            ),
            18 => 
            array (
                'id' => 19,
                'post_id' => 8,
                'tag_id' => 2,
            ),
            19 => 
            array (
                'id' => 20,
                'post_id' => 8,
                'tag_id' => 3,
            ),
            20 => 
            array (
                'id' => 21,
                'post_id' => 8,
                'tag_id' => 4,
            ),
            21 => 
            array (
                'id' => 22,
                'post_id' => 8,
                'tag_id' => 5,
            ),
            22 => 
            array (
                'id' => 23,
                'post_id' => 7,
                'tag_id' => 1,
            ),
            23 => 
            array (
                'id' => 24,
                'post_id' => 7,
                'tag_id' => 2,
            ),
            24 => 
            array (
                'id' => 25,
                'post_id' => 7,
                'tag_id' => 3,
            ),
            25 => 
            array (
                'id' => 26,
                'post_id' => 7,
                'tag_id' => 4,
            ),
            26 => 
            array (
                'id' => 27,
                'post_id' => 7,
                'tag_id' => 5,
            ),
            27 => 
            array (
                'id' => 28,
                'post_id' => 76,
                'tag_id' => 3,
            ),
        ));
        
        
    }
}