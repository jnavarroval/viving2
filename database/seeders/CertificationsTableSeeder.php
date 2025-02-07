<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;

class CertificationsTableSeeder extends Seeder
{

    /**
     * Auto generated seed file
     *
     * @return void
     */
    public function run()
    {
        

        \DB::table('certifications')->delete();
        
        \DB::table('certifications')->insert(array (
            0 => 
            array (
                'id' => 1,
                'doctor_id' => 63,
                'clinic_id' => NULL,
                'name' => 'World Pharma',
                'description' => '<p>Outstanding performance, dedication, and commitment to excellence at World Pharma.</p>',
                'is_active' => 1,
                'image' => NULL,
                'created_at' => '2024-08-28 15:54:54',
                'updated_at' => '2024-08-28 15:54:54',
                'deleted_at' => NULL,
            ),
            1 => 
            array (
                'id' => 2,
                'doctor_id' => 64,
                'clinic_id' => NULL,
                'name' => 'Medi Health',
                'description' => '<p>Outstanding performance, dedication, and commitment to excellence at [Medi Health].</p>',
                'is_active' => 1,
                'image' => NULL,
                'created_at' => '2024-08-28 15:58:50',
                'updated_at' => '2024-08-28 15:58:59',
                'deleted_at' => NULL,
            ),
            2 => 
            array (
                'id' => 3,
                'doctor_id' => 66,
                'clinic_id' => NULL,
                'name' => 'EVSINC',
                'description' => '<p>Outstanding performance, dedication, and commitment to excellence at [Evsinc].</p>',
                'is_active' => 1,
                'image' => NULL,
                'created_at' => '2024-08-28 16:01:08',
                'updated_at' => '2024-08-28 16:01:14',
                'deleted_at' => NULL,
            ),
            3 => 
            array (
                'id' => 4,
                'doctor_id' => 62,
                'clinic_id' => NULL,
                'name' => 'Medi Care',
                'description' => '<p>Outstanding performance, dedication, and commitment to excellence at [Medi Care].</p>',
                'is_active' => 1,
                'image' => NULL,
                'created_at' => '2024-08-28 16:03:31',
                'updated_at' => '2024-08-28 16:03:31',
                'deleted_at' => NULL,
            ),
            4 => 
            array (
                'id' => 5,
                'doctor_id' => 60,
                'clinic_id' => NULL,
                'name' => 'EVSINC',
                'description' => '<p>Outstanding performance, dedication, and commitment to excellence at [Evsinc].</p>',
                'is_active' => 1,
                'image' => NULL,
                'created_at' => '2024-08-28 16:08:20',
                'updated_at' => '2024-10-07 18:48:40',
                'deleted_at' => NULL,
            ),
            5 => 
            array (
                'id' => 6,
                'doctor_id' => 1,
                'clinic_id' => NULL,
                'name' => 'ret',
                'description' => '<p>aSAd</p>',
                'is_active' => 1,
                'image' => NULL,
                'created_at' => '2024-09-03 15:34:57',
                'updated_at' => '2024-09-18 13:11:02',
                'deleted_at' => '2024-09-18 13:11:02',
            ),
            6 => 
            array (
                'id' => 7,
                'doctor_id' => 1,
                'clinic_id' => NULL,
                'name' => 'MBBS',
                'description' => '<p>MBBSMBBSMBBSMBBS</p>',
                'is_active' => 1,
                'image' => NULL,
                'created_at' => '2024-09-12 16:00:51',
                'updated_at' => '2024-09-12 16:00:51',
                'deleted_at' => NULL,
            ),
            7 => 
            array (
                'id' => 8,
                'doctor_id' => 65,
                'clinic_id' => NULL,
                'name' => 'MBBS',
                'description' => '<p>sdas</p>',
                'is_active' => 1,
                'image' => NULL,
                'created_at' => '2024-09-18 14:26:07',
                'updated_at' => '2024-09-18 14:26:07',
                'deleted_at' => NULL,
            ),
            8 => 
            array (
                'id' => 9,
                'doctor_id' => 73,
                'clinic_id' => NULL,
                'name' => 'MBBS',
                'description' => '<p>saf</p>',
                'is_active' => 1,
                'image' => NULL,
                'created_at' => '2024-09-18 14:39:11',
                'updated_at' => '2024-09-18 14:39:11',
                'deleted_at' => NULL,
            ),
            9 => 
            array (
                'id' => 10,
                'doctor_id' => 74,
                'clinic_id' => NULL,
                'name' => 'Surgeion',
                'description' => '<p>sdaf</p>',
                'is_active' => 1,
                'image' => NULL,
                'created_at' => '2024-09-18 14:43:23',
                'updated_at' => '2024-09-18 14:43:29',
                'deleted_at' => NULL,
            ),
            10 => 
            array (
                'id' => 11,
                'doctor_id' => 75,
                'clinic_id' => NULL,
                'name' => 'CBIS',
                'description' => '<p>fds</p>',
                'is_active' => 1,
                'image' => NULL,
                'created_at' => '2024-09-18 15:06:24',
                'updated_at' => '2024-09-18 15:06:30',
                'deleted_at' => NULL,
            ),
            11 => 
            array (
                'id' => 12,
                'doctor_id' => 76,
                'clinic_id' => NULL,
                'name' => 'MBBS',
                'description' => '<p>gfs</p>',
                'is_active' => 1,
                'image' => NULL,
                'created_at' => '2024-09-18 15:11:50',
                'updated_at' => '2024-09-18 15:11:54',
                'deleted_at' => NULL,
            ),
            12 => 
            array (
                'id' => 13,
                'doctor_id' => 77,
                'clinic_id' => NULL,
                'name' => 'EVSINC',
                'description' => '<p>SDGsd</p>',
                'is_active' => 1,
                'image' => NULL,
                'created_at' => '2024-09-18 15:15:16',
                'updated_at' => '2024-09-18 15:15:21',
                'deleted_at' => NULL,
            ),
            13 => 
            array (
                'id' => 14,
                'doctor_id' => 78,
                'clinic_id' => NULL,
                'name' => 'HCCS',
                'description' => '<p>gsdfse</p>',
                'is_active' => 1,
                'image' => NULL,
                'created_at' => '2024-09-18 15:19:38',
                'updated_at' => '2024-09-18 15:19:42',
                'deleted_at' => NULL,
            ),
            14 => 
            array (
                'id' => 15,
                'doctor_id' => 79,
                'clinic_id' => NULL,
                'name' => 'MHCI',
                'description' => '<p>sdfsd</p>',
                'is_active' => 1,
                'image' => NULL,
                'created_at' => '2024-09-18 15:23:33',
                'updated_at' => '2024-09-18 15:23:42',
                'deleted_at' => NULL,
            ),
            15 => 
            array (
                'id' => 16,
                'doctor_id' => 80,
                'clinic_id' => NULL,
                'name' => 'CCSI',
                'description' => '<p>dasf</p>',
                'is_active' => 1,
                'image' => NULL,
                'created_at' => '2024-09-18 15:28:10',
                'updated_at' => '2024-09-18 15:28:10',
                'deleted_at' => NULL,
            ),
            16 => 
            array (
                'id' => 17,
                'doctor_id' => 81,
                'clinic_id' => NULL,
                'name' => 'Surgeion',
                'description' => '<p>dsgad</p>',
                'is_active' => 1,
                'image' => NULL,
                'created_at' => '2024-09-18 15:33:44',
                'updated_at' => '2024-09-18 15:33:48',
                'deleted_at' => NULL,
            ),
            17 => 
            array (
                'id' => 18,
                'doctor_id' => 82,
                'clinic_id' => NULL,
                'name' => 'MBBS',
                'description' => '<p>gdfsd</p>',
                'is_active' => 1,
                'image' => NULL,
                'created_at' => '2024-09-18 15:37:54',
                'updated_at' => '2024-09-18 15:37:54',
                'deleted_at' => NULL,
            ),
            18 => 
            array (
                'id' => 19,
                'doctor_id' => 72,
                'clinic_id' => NULL,
                'name' => 'Dentist',
                'description' => NULL,
                'is_active' => 1,
                'image' => NULL,
                'created_at' => '2024-09-24 12:29:45',
                'updated_at' => '2024-09-24 12:29:45',
                'deleted_at' => NULL,
            ),
            19 => 
            array (
                'id' => 20,
                'doctor_id' => 83,
                'clinic_id' => NULL,
                'name' => 'edegwet',
                'description' => '<p>ertewrtew</p>',
                'is_active' => 1,
                'image' => '/files/doctor_certifications/1727333376istockphoto-1193849501-612x612.jpg',
                'created_at' => '2024-09-26 11:48:18',
                'updated_at' => '2024-09-26 11:49:36',
                'deleted_at' => NULL,
            ),
            20 => 
            array (
                'id' => 21,
                'doctor_id' => 83,
                'clinic_id' => NULL,
                'name' => 'ujghjfthj',
                'description' => '<p><strong>tyytity</strong></p>',
                'is_active' => 1,
                'image' => NULL,
                'created_at' => '2024-09-26 11:50:06',
                'updated_at' => '2024-09-26 11:50:53',
                'deleted_at' => '2024-09-26 11:50:53',
            ),
            21 => 
            array (
                'id' => 22,
                'doctor_id' => 83,
                'clinic_id' => NULL,
                'name' => 'hhhhhhhhff',
                'description' => '<p>ddsddd</p>',
                'is_active' => 1,
                'image' => '/files/doctor_certifications/1727333509istockphoto-1807678380-612x612.jpg',
                'created_at' => '2024-09-26 11:51:49',
                'updated_at' => '2024-09-26 11:51:49',
                'deleted_at' => NULL,
            ),
            22 => 
            array (
                'id' => 23,
                'doctor_id' => 83,
                'clinic_id' => NULL,
                'name' => 'hhhhfdsd',
                'description' => '<p>jjgg</p>',
                'is_active' => 1,
                'image' => '/files/doctor_certifications/1727333555istockphoto-485502909-612x612.jpg',
                'created_at' => '2024-09-26 11:52:13',
                'updated_at' => '2024-09-26 11:52:35',
                'deleted_at' => NULL,
            ),
            23 => 
            array (
                'id' => 24,
                'doctor_id' => 1,
                'clinic_id' => NULL,
                'name' => 'asasa',
                'description' => '<p>sasaa</p>',
                'is_active' => 0,
                'image' => NULL,
                'created_at' => '2024-10-03 17:57:24',
                'updated_at' => '2024-10-03 17:57:24',
                'deleted_at' => NULL,
            ),
            24 => 
            array (
                'id' => 25,
                'doctor_id' => 1,
                'clinic_id' => NULL,
                'name' => 'fdfdfd',
                'description' => '<p>dfdfd</p>',
                'is_active' => 1,
                'image' => NULL,
                'created_at' => '2024-10-03 17:58:52',
                'updated_at' => '2024-10-03 17:58:52',
                'deleted_at' => NULL,
            ),
            25 => 
            array (
                'id' => 26,
                'doctor_id' => 76,
                'clinic_id' => NULL,
                'name' => 'asS',
                'description' => '<p>ADAdA</p>',
                'is_active' => 1,
                'image' => '/files/doctor_certifications/1728306638istockphoto-1360469508-612x612.jpg',
                'created_at' => '2024-10-07 18:10:38',
                'updated_at' => '2024-10-07 18:10:47',
                'deleted_at' => '2024-10-07 18:10:47',
            ),
            26 => 
            array (
                'id' => 27,
                'doctor_id' => NULL,
                'clinic_id' => 21,
                'name' => 'sadasdsadasd',
                'description' => '<p>sdasdasa</p>',
                'is_active' => 1,
                'image' => NULL,
                'created_at' => '2024-10-07 18:16:59',
                'updated_at' => '2024-10-07 18:17:12',
                'deleted_at' => '2024-10-07 18:17:12',
            ),
        ));
        
        
    }
}