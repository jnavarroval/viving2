<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;

class PodcastTagTableSeeder extends Seeder
{

    /**
     * Auto generated seed file
     *
     * @return void
     */
    public function run()
    {
        

        \DB::table('podcast_tag')->delete();
        
        \DB::table('podcast_tag')->insert(array (
            0 => 
            array (
                'id' => 3,
                'podcast_id' => 3,
                'tag_id' => 1,
            ),
            1 => 
            array (
                'id' => 4,
                'podcast_id' => 4,
                'tag_id' => 3,
            ),
            2 => 
            array (
                'id' => 5,
                'podcast_id' => 5,
                'tag_id' => 1,
            ),
            3 => 
            array (
                'id' => 6,
                'podcast_id' => 6,
                'tag_id' => 1,
            ),
            4 => 
            array (
                'id' => 7,
                'podcast_id' => 7,
                'tag_id' => 4,
            ),
            5 => 
            array (
                'id' => 8,
                'podcast_id' => 8,
                'tag_id' => 4,
            ),
            6 => 
            array (
                'id' => 9,
                'podcast_id' => 9,
                'tag_id' => 5,
            ),
            7 => 
            array (
                'id' => 10,
                'podcast_id' => 10,
                'tag_id' => 4,
            ),
            8 => 
            array (
                'id' => 11,
                'podcast_id' => 11,
                'tag_id' => 1,
            ),
            9 => 
            array (
                'id' => 15,
                'podcast_id' => 15,
                'tag_id' => 3,
            ),
            10 => 
            array (
                'id' => 16,
                'podcast_id' => 16,
                'tag_id' => 1,
            ),
            11 => 
            array (
                'id' => 17,
                'podcast_id' => 17,
                'tag_id' => 2,
            ),
            12 => 
            array (
                'id' => 18,
                'podcast_id' => 18,
                'tag_id' => 4,
            ),
            13 => 
            array (
                'id' => 19,
                'podcast_id' => 19,
                'tag_id' => 5,
            ),
            14 => 
            array (
                'id' => 20,
                'podcast_id' => 20,
                'tag_id' => 1,
            ),
            15 => 
            array (
                'id' => 21,
                'podcast_id' => 21,
                'tag_id' => 4,
            ),
            16 => 
            array (
                'id' => 25,
                'podcast_id' => 25,
                'tag_id' => 5,
            ),
            17 => 
            array (
                'id' => 26,
                'podcast_id' => 26,
                'tag_id' => 2,
            ),
            18 => 
            array (
                'id' => 27,
                'podcast_id' => 27,
                'tag_id' => 5,
            ),
            19 => 
            array (
                'id' => 28,
                'podcast_id' => 28,
                'tag_id' => 1,
            ),
            20 => 
            array (
                'id' => 29,
                'podcast_id' => 29,
                'tag_id' => 1,
            ),
            21 => 
            array (
                'id' => 30,
                'podcast_id' => 30,
                'tag_id' => 3,
            ),
            22 => 
            array (
                'id' => 31,
                'podcast_id' => 31,
                'tag_id' => 1,
            ),
            23 => 
            array (
                'id' => 32,
                'podcast_id' => 32,
                'tag_id' => 1,
            ),
            24 => 
            array (
                'id' => 33,
                'podcast_id' => 33,
                'tag_id' => 3,
            ),
            25 => 
            array (
                'id' => 34,
                'podcast_id' => 34,
                'tag_id' => 5,
            ),
            26 => 
            array (
                'id' => 35,
                'podcast_id' => 35,
                'tag_id' => 5,
            ),
            27 => 
            array (
                'id' => 36,
                'podcast_id' => 36,
                'tag_id' => 3,
            ),
            28 => 
            array (
                'id' => 37,
                'podcast_id' => 37,
                'tag_id' => 4,
            ),
            29 => 
            array (
                'id' => 38,
                'podcast_id' => 38,
                'tag_id' => 4,
            ),
            30 => 
            array (
                'id' => 39,
                'podcast_id' => 39,
                'tag_id' => 1,
            ),
            31 => 
            array (
                'id' => 40,
                'podcast_id' => 40,
                'tag_id' => 2,
            ),
            32 => 
            array (
                'id' => 41,
                'podcast_id' => 41,
                'tag_id' => 4,
            ),
            33 => 
            array (
                'id' => 42,
                'podcast_id' => 42,
                'tag_id' => 4,
            ),
            34 => 
            array (
                'id' => 43,
                'podcast_id' => 43,
                'tag_id' => 1,
            ),
            35 => 
            array (
                'id' => 44,
                'podcast_id' => 44,
                'tag_id' => 3,
            ),
            36 => 
            array (
                'id' => 45,
                'podcast_id' => 45,
                'tag_id' => 2,
            ),
            37 => 
            array (
                'id' => 46,
                'podcast_id' => 46,
                'tag_id' => 4,
            ),
            38 => 
            array (
                'id' => 47,
                'podcast_id' => 47,
                'tag_id' => 4,
            ),
            39 => 
            array (
                'id' => 48,
                'podcast_id' => 48,
                'tag_id' => 3,
            ),
            40 => 
            array (
                'id' => 49,
                'podcast_id' => 49,
                'tag_id' => 3,
            ),
            41 => 
            array (
                'id' => 50,
                'podcast_id' => 50,
                'tag_id' => 3,
            ),
            42 => 
            array (
                'id' => 51,
                'podcast_id' => 51,
                'tag_id' => 4,
            ),
            43 => 
            array (
                'id' => 52,
                'podcast_id' => 52,
                'tag_id' => 3,
            ),
            44 => 
            array (
                'id' => 53,
                'podcast_id' => 53,
                'tag_id' => 1,
            ),
            45 => 
            array (
                'id' => 54,
                'podcast_id' => 54,
                'tag_id' => 5,
            ),
            46 => 
            array (
                'id' => 55,
                'podcast_id' => 1,
                'tag_id' => 2,
            ),
            47 => 
            array (
                'id' => 56,
                'podcast_id' => 55,
                'tag_id' => 3,
            ),
            48 => 
            array (
                'id' => 57,
                'podcast_id' => 56,
                'tag_id' => 2,
            ),
            49 => 
            array (
                'id' => 58,
                'podcast_id' => 57,
                'tag_id' => 4,
            ),
            50 => 
            array (
                'id' => 59,
                'podcast_id' => 58,
                'tag_id' => 4,
            ),
            51 => 
            array (
                'id' => 60,
                'podcast_id' => 59,
                'tag_id' => 3,
            ),
            52 => 
            array (
                'id' => 61,
                'podcast_id' => 60,
                'tag_id' => 2,
            ),
            53 => 
            array (
                'id' => 62,
                'podcast_id' => 61,
                'tag_id' => 5,
            ),
            54 => 
            array (
                'id' => 63,
                'podcast_id' => 62,
                'tag_id' => 3,
            ),
            55 => 
            array (
                'id' => 64,
                'podcast_id' => 63,
                'tag_id' => 5,
            ),
            56 => 
            array (
                'id' => 65,
                'podcast_id' => 64,
                'tag_id' => 3,
            ),
            57 => 
            array (
                'id' => 66,
                'podcast_id' => 65,
                'tag_id' => 2,
            ),
            58 => 
            array (
                'id' => 67,
                'podcast_id' => 66,
                'tag_id' => 3,
            ),
            59 => 
            array (
                'id' => 68,
                'podcast_id' => 67,
                'tag_id' => 4,
            ),
            60 => 
            array (
                'id' => 69,
                'podcast_id' => 68,
                'tag_id' => 4,
            ),
            61 => 
            array (
                'id' => 70,
                'podcast_id' => 69,
                'tag_id' => 2,
            ),
            62 => 
            array (
                'id' => 71,
                'podcast_id' => 70,
                'tag_id' => 2,
            ),
            63 => 
            array (
                'id' => 72,
                'podcast_id' => 70,
                'tag_id' => 4,
            ),
            64 => 
            array (
                'id' => 73,
                'podcast_id' => 71,
                'tag_id' => 4,
            ),
            65 => 
            array (
                'id' => 74,
                'podcast_id' => 72,
                'tag_id' => 3,
            ),
            66 => 
            array (
                'id' => 75,
                'podcast_id' => 3,
                'tag_id' => 5,
            ),
            67 => 
            array (
                'id' => 76,
                'podcast_id' => 2,
                'tag_id' => 5,
            ),
            68 => 
            array (
                'id' => 77,
                'podcast_id' => 24,
                'tag_id' => 2,
            ),
            69 => 
            array (
                'id' => 78,
                'podcast_id' => 23,
                'tag_id' => 4,
            ),
            70 => 
            array (
                'id' => 79,
                'podcast_id' => 22,
                'tag_id' => 5,
            ),
            71 => 
            array (
                'id' => 80,
                'podcast_id' => 15,
                'tag_id' => 5,
            ),
            72 => 
            array (
                'id' => 81,
                'podcast_id' => 14,
                'tag_id' => 1,
            ),
            73 => 
            array (
                'id' => 83,
                'podcast_id' => 13,
                'tag_id' => 5,
            ),
            74 => 
            array (
                'id' => 84,
                'podcast_id' => 12,
                'tag_id' => 3,
            ),
            75 => 
            array (
                'id' => 85,
                'podcast_id' => 12,
                'tag_id' => 1,
            ),
            76 => 
            array (
                'id' => 86,
                'podcast_id' => 12,
                'tag_id' => 2,
            ),
            77 => 
            array (
                'id' => 87,
                'podcast_id' => 12,
                'tag_id' => 4,
            ),
            78 => 
            array (
                'id' => 88,
                'podcast_id' => 12,
                'tag_id' => 5,
            ),
            79 => 
            array (
                'id' => 89,
                'podcast_id' => 11,
                'tag_id' => 2,
            ),
            80 => 
            array (
                'id' => 90,
                'podcast_id' => 11,
                'tag_id' => 3,
            ),
            81 => 
            array (
                'id' => 91,
                'podcast_id' => 11,
                'tag_id' => 4,
            ),
            82 => 
            array (
                'id' => 92,
                'podcast_id' => 11,
                'tag_id' => 5,
            ),
            83 => 
            array (
                'id' => 93,
                'podcast_id' => 10,
                'tag_id' => 1,
            ),
            84 => 
            array (
                'id' => 94,
                'podcast_id' => 10,
                'tag_id' => 2,
            ),
            85 => 
            array (
                'id' => 95,
                'podcast_id' => 10,
                'tag_id' => 3,
            ),
            86 => 
            array (
                'id' => 96,
                'podcast_id' => 10,
                'tag_id' => 5,
            ),
            87 => 
            array (
                'id' => 97,
                'podcast_id' => 6,
                'tag_id' => 2,
            ),
            88 => 
            array (
                'id' => 98,
                'podcast_id' => 6,
                'tag_id' => 3,
            ),
            89 => 
            array (
                'id' => 99,
                'podcast_id' => 6,
                'tag_id' => 4,
            ),
            90 => 
            array (
                'id' => 100,
                'podcast_id' => 6,
                'tag_id' => 5,
            ),
            91 => 
            array (
                'id' => 101,
                'podcast_id' => 5,
                'tag_id' => 2,
            ),
            92 => 
            array (
                'id' => 102,
                'podcast_id' => 5,
                'tag_id' => 3,
            ),
            93 => 
            array (
                'id' => 103,
                'podcast_id' => 5,
                'tag_id' => 4,
            ),
            94 => 
            array (
                'id' => 104,
                'podcast_id' => 5,
                'tag_id' => 5,
            ),
            95 => 
            array (
                'id' => 105,
                'podcast_id' => 1,
                'tag_id' => 1,
            ),
            96 => 
            array (
                'id' => 106,
                'podcast_id' => 1,
                'tag_id' => 3,
            ),
            97 => 
            array (
                'id' => 107,
                'podcast_id' => 1,
                'tag_id' => 4,
            ),
            98 => 
            array (
                'id' => 108,
                'podcast_id' => 1,
                'tag_id' => 5,
            ),
            99 => 
            array (
                'id' => 109,
                'podcast_id' => 73,
                'tag_id' => 2,
            ),
        ));
        \DB::table('podcast_tag')->insert(array (
            0 => 
            array (
                'id' => 110,
                'podcast_id' => 73,
                'tag_id' => 3,
            ),
            1 => 
            array (
                'id' => 111,
                'podcast_id' => 73,
                'tag_id' => 5,
            ),
            2 => 
            array (
                'id' => 112,
                'podcast_id' => 73,
                'tag_id' => 4,
            ),
            3 => 
            array (
                'id' => 113,
                'podcast_id' => 73,
                'tag_id' => 1,
            ),
            4 => 
            array (
                'id' => 114,
                'podcast_id' => 74,
                'tag_id' => 2,
            ),
        ));
        
        
    }
}