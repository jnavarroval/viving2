<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;

class EventTagTableSeeder extends Seeder
{

    /**
     * Auto generated seed file
     *
     * @return void
     */
    public function run()
    {
        

        \DB::table('event_tag')->delete();
        
        \DB::table('event_tag')->insert(array (
            0 => 
            array (
                'id' => 1,
                'event_id' => 3,
                'tag_id' => 1,
            ),
            1 => 
            array (
                'id' => 9,
                'event_id' => 11,
                'tag_id' => 4,
            ),
            2 => 
            array (
                'id' => 10,
                'event_id' => 12,
                'tag_id' => 1,
            ),
            3 => 
            array (
                'id' => 11,
                'event_id' => 13,
                'tag_id' => 5,
            ),
            4 => 
            array (
                'id' => 12,
                'event_id' => 14,
                'tag_id' => 2,
            ),
            5 => 
            array (
                'id' => 13,
                'event_id' => 15,
                'tag_id' => 2,
            ),
            6 => 
            array (
                'id' => 14,
                'event_id' => 17,
                'tag_id' => 1,
            ),
            7 => 
            array (
                'id' => 15,
                'event_id' => 18,
                'tag_id' => 1,
            ),
            8 => 
            array (
                'id' => 16,
                'event_id' => 19,
                'tag_id' => 1,
            ),
            9 => 
            array (
                'id' => 17,
                'event_id' => 20,
                'tag_id' => 1,
            ),
            10 => 
            array (
                'id' => 18,
                'event_id' => 21,
                'tag_id' => 1,
            ),
            11 => 
            array (
                'id' => 19,
                'event_id' => 22,
                'tag_id' => 1,
            ),
            12 => 
            array (
                'id' => 20,
                'event_id' => 23,
                'tag_id' => 2,
            ),
            13 => 
            array (
                'id' => 21,
                'event_id' => 24,
                'tag_id' => 3,
            ),
            14 => 
            array (
                'id' => 22,
                'event_id' => 25,
                'tag_id' => 1,
            ),
            15 => 
            array (
                'id' => 23,
                'event_id' => 26,
                'tag_id' => 3,
            ),
            16 => 
            array (
                'id' => 24,
                'event_id' => 27,
                'tag_id' => 4,
            ),
            17 => 
            array (
                'id' => 25,
                'event_id' => 28,
                'tag_id' => 3,
            ),
            18 => 
            array (
                'id' => 26,
                'event_id' => 29,
                'tag_id' => 2,
            ),
            19 => 
            array (
                'id' => 27,
                'event_id' => 30,
                'tag_id' => 1,
            ),
            20 => 
            array (
                'id' => 28,
                'event_id' => 31,
                'tag_id' => 5,
            ),
            21 => 
            array (
                'id' => 30,
                'event_id' => 33,
                'tag_id' => 5,
            ),
            22 => 
            array (
                'id' => 31,
                'event_id' => 34,
                'tag_id' => 2,
            ),
            23 => 
            array (
                'id' => 32,
                'event_id' => 35,
                'tag_id' => 4,
            ),
            24 => 
            array (
                'id' => 33,
                'event_id' => 36,
                'tag_id' => 2,
            ),
            25 => 
            array (
                'id' => 34,
                'event_id' => 37,
                'tag_id' => 1,
            ),
            26 => 
            array (
                'id' => 35,
                'event_id' => 38,
                'tag_id' => 1,
            ),
            27 => 
            array (
                'id' => 36,
                'event_id' => 39,
                'tag_id' => 3,
            ),
            28 => 
            array (
                'id' => 37,
                'event_id' => 40,
                'tag_id' => 2,
            ),
            29 => 
            array (
                'id' => 38,
                'event_id' => 41,
                'tag_id' => 3,
            ),
            30 => 
            array (
                'id' => 39,
                'event_id' => 42,
                'tag_id' => 4,
            ),
            31 => 
            array (
                'id' => 40,
                'event_id' => 43,
                'tag_id' => 3,
            ),
            32 => 
            array (
                'id' => 41,
                'event_id' => 44,
                'tag_id' => 4,
            ),
            33 => 
            array (
                'id' => 42,
                'event_id' => 45,
                'tag_id' => 4,
            ),
            34 => 
            array (
                'id' => 43,
                'event_id' => 46,
                'tag_id' => 3,
            ),
            35 => 
            array (
                'id' => 44,
                'event_id' => 47,
                'tag_id' => 1,
            ),
            36 => 
            array (
                'id' => 45,
                'event_id' => 48,
                'tag_id' => 2,
            ),
            37 => 
            array (
                'id' => 46,
                'event_id' => 49,
                'tag_id' => 2,
            ),
            38 => 
            array (
                'id' => 47,
                'event_id' => 50,
                'tag_id' => 4,
            ),
            39 => 
            array (
                'id' => 48,
                'event_id' => 51,
                'tag_id' => 5,
            ),
            40 => 
            array (
                'id' => 49,
                'event_id' => 52,
                'tag_id' => 3,
            ),
            41 => 
            array (
                'id' => 50,
                'event_id' => 53,
                'tag_id' => 1,
            ),
            42 => 
            array (
                'id' => 51,
                'event_id' => 55,
                'tag_id' => 2,
            ),
            43 => 
            array (
                'id' => 52,
                'event_id' => 56,
                'tag_id' => 4,
            ),
            44 => 
            array (
                'id' => 53,
                'event_id' => 57,
                'tag_id' => 5,
            ),
            45 => 
            array (
                'id' => 54,
                'event_id' => 58,
                'tag_id' => 1,
            ),
            46 => 
            array (
                'id' => 55,
                'event_id' => 59,
                'tag_id' => 1,
            ),
            47 => 
            array (
                'id' => 56,
                'event_id' => 60,
                'tag_id' => 2,
            ),
            48 => 
            array (
                'id' => 57,
                'event_id' => 61,
                'tag_id' => 4,
            ),
            49 => 
            array (
                'id' => 58,
                'event_id' => 62,
                'tag_id' => 1,
            ),
            50 => 
            array (
                'id' => 59,
                'event_id' => 63,
                'tag_id' => 1,
            ),
            51 => 
            array (
                'id' => 61,
                'event_id' => 65,
                'tag_id' => 5,
            ),
            52 => 
            array (
                'id' => 62,
                'event_id' => 66,
                'tag_id' => 2,
            ),
            53 => 
            array (
                'id' => 63,
                'event_id' => 67,
                'tag_id' => 1,
            ),
            54 => 
            array (
                'id' => 64,
                'event_id' => 68,
                'tag_id' => 5,
            ),
            55 => 
            array (
                'id' => 65,
                'event_id' => 69,
                'tag_id' => 5,
            ),
            56 => 
            array (
                'id' => 66,
                'event_id' => 70,
                'tag_id' => 2,
            ),
            57 => 
            array (
                'id' => 67,
                'event_id' => 71,
                'tag_id' => 2,
            ),
            58 => 
            array (
                'id' => 68,
                'event_id' => 72,
                'tag_id' => 5,
            ),
            59 => 
            array (
                'id' => 69,
                'event_id' => 73,
                'tag_id' => 3,
            ),
            60 => 
            array (
                'id' => 70,
                'event_id' => 74,
                'tag_id' => 1,
            ),
            61 => 
            array (
                'id' => 71,
                'event_id' => 75,
                'tag_id' => 5,
            ),
            62 => 
            array (
                'id' => 72,
                'event_id' => 76,
                'tag_id' => 5,
            ),
            63 => 
            array (
                'id' => 73,
                'event_id' => 77,
                'tag_id' => 1,
            ),
            64 => 
            array (
                'id' => 74,
                'event_id' => 78,
                'tag_id' => 2,
            ),
            65 => 
            array (
                'id' => 75,
                'event_id' => 80,
                'tag_id' => 1,
            ),
            66 => 
            array (
                'id' => 76,
                'event_id' => 18,
                'tag_id' => 2,
            ),
            67 => 
            array (
                'id' => 77,
                'event_id' => 18,
                'tag_id' => 3,
            ),
            68 => 
            array (
                'id' => 78,
                'event_id' => 18,
                'tag_id' => 4,
            ),
            69 => 
            array (
                'id' => 79,
                'event_id' => 18,
                'tag_id' => 5,
            ),
            70 => 
            array (
                'id' => 80,
                'event_id' => 17,
                'tag_id' => 3,
            ),
            71 => 
            array (
                'id' => 81,
                'event_id' => 17,
                'tag_id' => 2,
            ),
            72 => 
            array (
                'id' => 82,
                'event_id' => 17,
                'tag_id' => 4,
            ),
            73 => 
            array (
                'id' => 83,
                'event_id' => 17,
                'tag_id' => 5,
            ),
            74 => 
            array (
                'id' => 84,
                'event_id' => 15,
                'tag_id' => 1,
            ),
            75 => 
            array (
                'id' => 85,
                'event_id' => 15,
                'tag_id' => 3,
            ),
            76 => 
            array (
                'id' => 86,
                'event_id' => 15,
                'tag_id' => 4,
            ),
            77 => 
            array (
                'id' => 87,
                'event_id' => 15,
                'tag_id' => 5,
            ),
            78 => 
            array (
                'id' => 88,
                'event_id' => 11,
                'tag_id' => 1,
            ),
            79 => 
            array (
                'id' => 89,
                'event_id' => 11,
                'tag_id' => 2,
            ),
            80 => 
            array (
                'id' => 90,
                'event_id' => 11,
                'tag_id' => 3,
            ),
            81 => 
            array (
                'id' => 91,
                'event_id' => 11,
                'tag_id' => 5,
            ),
            82 => 
            array (
                'id' => 92,
                'event_id' => 8,
                'tag_id' => 1,
            ),
            83 => 
            array (
                'id' => 93,
                'event_id' => 8,
                'tag_id' => 2,
            ),
            84 => 
            array (
                'id' => 94,
                'event_id' => 8,
                'tag_id' => 3,
            ),
            85 => 
            array (
                'id' => 95,
                'event_id' => 8,
                'tag_id' => 4,
            ),
            86 => 
            array (
                'id' => 96,
                'event_id' => 8,
                'tag_id' => 5,
            ),
            87 => 
            array (
                'id' => 97,
                'event_id' => 7,
                'tag_id' => 1,
            ),
            88 => 
            array (
                'id' => 98,
                'event_id' => 7,
                'tag_id' => 2,
            ),
            89 => 
            array (
                'id' => 99,
                'event_id' => 7,
                'tag_id' => 3,
            ),
            90 => 
            array (
                'id' => 100,
                'event_id' => 7,
                'tag_id' => 4,
            ),
            91 => 
            array (
                'id' => 101,
                'event_id' => 7,
                'tag_id' => 5,
            ),
            92 => 
            array (
                'id' => 102,
                'event_id' => 81,
                'tag_id' => 2,
            ),
            93 => 
            array (
                'id' => 103,
                'event_id' => 82,
                'tag_id' => 2,
            ),
            94 => 
            array (
                'id' => 104,
                'event_id' => 83,
                'tag_id' => 2,
            ),
        ));
        
        
    }
}