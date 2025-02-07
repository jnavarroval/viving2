<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;

class AppointmentMedicinesTableSeeder extends Seeder
{

    /**
     * Auto generated seed file
     *
     * @return void
     */
    public function run()
    {
        

        \DB::table('appointment_medicines')->delete();
        
        \DB::table('appointment_medicines')->insert(array (
            0 => 
            array (
                'id' => 1,
                'name' => 'asd',
                'dosage' => 'asd',
                'frequency' => 'asdasd',
                'created_at' => '2024-08-23 11:17:13',
                'updated_at' => '2024-08-23 11:58:52',
                'deleted_at' => '2024-08-23 11:58:52',
                'booked_appointment_id' => 33,
            ),
            1 => 
            array (
                'id' => 2,
                'name' => 'asda',
                'dosage' => 'asdas',
                'frequency' => 'dasdasd',
                'created_at' => '2024-08-23 11:29:37',
                'updated_at' => '2024-08-23 11:59:24',
                'deleted_at' => '2024-08-23 11:59:24',
                'booked_appointment_id' => 33,
            ),
            2 => 
            array (
                'id' => 3,
                'name' => 'adsf',
                'dosage' => 'adsf',
                'frequency' => 'adsf',
                'created_at' => '2024-08-23 11:59:10',
                'updated_at' => '2024-08-23 12:01:02',
                'deleted_at' => '2024-08-23 12:01:02',
                'booked_appointment_id' => 33,
            ),
            3 => 
            array (
                'id' => 4,
                'name' => 'sdf',
                'dosage' => 'adsf',
                'frequency' => 'dsf',
                'created_at' => '2024-08-23 12:02:00',
                'updated_at' => '2024-08-23 12:08:24',
                'deleted_at' => '2024-08-23 12:08:24',
                'booked_appointment_id' => 33,
            ),
            4 => 
            array (
                'id' => 5,
                'name' => 'sdf',
                'dosage' => 'adsfdsf',
                'frequency' => 'dsfdsf',
                'created_at' => '2024-08-23 12:02:11',
                'updated_at' => '2024-08-23 12:05:33',
                'deleted_at' => '2024-08-23 12:05:33',
                'booked_appointment_id' => 33,
            ),
            5 => 
            array (
                'id' => 6,
                'name' => 'asd',
                'dosage' => 'asd',
                'frequency' => 'asd',
                'created_at' => '2024-08-23 12:05:30',
                'updated_at' => '2024-08-23 12:08:25',
                'deleted_at' => '2024-08-23 12:08:25',
                'booked_appointment_id' => 33,
            ),
            6 => 
            array (
                'id' => 7,
                'name' => 'asda',
                'dosage' => 'sdasd',
                'frequency' => 'asdasd',
                'created_at' => '2024-08-23 12:08:21',
                'updated_at' => '2024-08-23 12:08:27',
                'deleted_at' => '2024-08-23 12:08:27',
                'booked_appointment_id' => 33,
            ),
            7 => 
            array (
                'id' => 8,
                'name' => 'asdaasda',
                'dosage' => 'sdasdsd',
                'frequency' => 'asdasdasd',
                'created_at' => '2024-08-23 12:08:32',
                'updated_at' => '2024-08-23 12:08:32',
                'deleted_at' => NULL,
                'booked_appointment_id' => 33,
            ),
            8 => 
            array (
                'id' => 9,
                'name' => 'asd',
                'dosage' => 'asda',
                'frequency' => 'sdasd',
                'created_at' => '2024-08-23 12:09:05',
                'updated_at' => '2024-08-23 12:09:05',
                'deleted_at' => NULL,
                'booked_appointment_id' => 33,
            ),
            9 => 
            array (
                'id' => 10,
                'name' => 'asd',
                'dosage' => 'asdasdasd',
                'frequency' => 'asdasdasd',
                'created_at' => '2024-08-23 12:12:21',
                'updated_at' => '2024-08-23 12:12:21',
                'deleted_at' => NULL,
                'booked_appointment_id' => 33,
            ),
            10 => 
            array (
                'id' => 11,
                'name' => 'asd',
                'dosage' => 'asd',
                'frequency' => 'asd',
                'created_at' => '2024-08-26 09:29:16',
                'updated_at' => '2024-10-01 18:57:11',
                'deleted_at' => '2024-10-01 18:57:11',
                'booked_appointment_id' => 43,
            ),
            11 => 
            array (
                'id' => 12,
                'name' => 'asd',
                'dosage' => 'asd',
                'frequency' => 'asd',
                'created_at' => '2024-08-26 09:29:20',
                'updated_at' => '2024-10-01 18:57:18',
                'deleted_at' => '2024-10-01 18:57:18',
                'booked_appointment_id' => 43,
            ),
            12 => 
            array (
                'id' => 13,
                'name' => 'asdasd',
                'dosage' => 'aSD',
                'frequency' => 'ASDas',
                'created_at' => '2024-08-26 12:14:16',
                'updated_at' => '2024-08-26 12:14:16',
                'deleted_at' => NULL,
                'booked_appointment_id' => 44,
            ),
            13 => 
            array (
                'id' => 14,
                'name' => 'aSD',
                'dosage' => 'daSD',
                'frequency' => 'asdaSD',
                'created_at' => '2024-08-26 12:14:23',
                'updated_at' => '2024-08-26 12:14:23',
                'deleted_at' => NULL,
                'booked_appointment_id' => 44,
            ),
            14 => 
            array (
                'id' => 15,
                'name' => 'panadol',
                'dosage' => '3',
                'frequency' => '4',
                'created_at' => '2024-08-26 13:49:41',
                'updated_at' => '2024-08-26 13:49:52',
                'deleted_at' => '2024-08-26 13:49:52',
                'booked_appointment_id' => 11,
            ),
            15 => 
            array (
                'id' => 16,
                'name' => 'Nims',
                'dosage' => '1 Tablet',
                'frequency' => 'every 4 hours',
                'created_at' => '2024-08-26 13:50:28',
                'updated_at' => '2024-08-26 13:50:28',
                'deleted_at' => NULL,
                'booked_appointment_id' => 11,
            ),
            16 => 
            array (
                'id' => 17,
                'name' => 'SZDxas',
                'dosage' => 'sdaasd',
                'frequency' => 'sadas',
                'created_at' => '2024-09-20 15:45:27',
                'updated_at' => '2024-09-20 15:45:27',
                'deleted_at' => NULL,
                'booked_appointment_id' => 1,
            ),
            17 => 
            array (
                'id' => 18,
                'name' => 'panadol',
                'dosage' => '3 doages',
                'frequency' => '4 tablet',
                'created_at' => '2024-09-26 14:02:43',
                'updated_at' => '2024-09-26 14:02:43',
                'deleted_at' => NULL,
                'booked_appointment_id' => 29,
            ),
            18 => 
            array (
                'id' => 19,
                'name' => 'entox p',
                'dosage' => '2 doasge',
                'frequency' => '2 tablets',
                'created_at' => '2024-09-26 14:12:02',
                'updated_at' => '2024-09-26 14:12:02',
                'deleted_at' => NULL,
                'booked_appointment_id' => 29,
            ),
            19 => 
            array (
                'id' => 20,
                'name' => 'Lecord',
                'dosage' => '4 dosage',
                'frequency' => '4 tablets',
                'created_at' => '2024-09-26 14:12:18',
                'updated_at' => '2024-09-26 14:12:18',
                'deleted_at' => NULL,
                'booked_appointment_id' => 29,
            ),
            20 => 
            array (
                'id' => 21,
                'name' => 'flagyl',
                'dosage' => '2 dosages',
                'frequency' => '4 tablets',
                'created_at' => '2024-09-26 14:39:26',
                'updated_at' => '2024-09-26 14:39:26',
                'deleted_at' => NULL,
                'booked_appointment_id' => 30,
            ),
            21 => 
            array (
                'id' => 22,
                'name' => 'entox p',
                'dosage' => '4 dosages',
                'frequency' => '5 tablets',
                'created_at' => '2024-09-26 14:39:48',
                'updated_at' => '2024-09-26 14:39:48',
                'deleted_at' => NULL,
                'booked_appointment_id' => 30,
            ),
            22 => 
            array (
                'id' => 23,
                'name' => 'Panadol',
                'dosage' => '4 Dosages',
                'frequency' => '4 tablets',
                'created_at' => '2024-09-26 18:42:19',
                'updated_at' => '2024-09-26 18:42:19',
                'deleted_at' => NULL,
                'booked_appointment_id' => 31,
            ),
            23 => 
            array (
                'id' => 24,
                'name' => 'NIms',
                'dosage' => '5 dosages',
                'frequency' => '3 tablets',
                'created_at' => '2024-09-26 18:42:38',
                'updated_at' => '2024-09-26 18:42:38',
                'deleted_at' => NULL,
                'booked_appointment_id' => 31,
            ),
            24 => 
            array (
                'id' => 25,
                'name' => 'Caricef',
                'dosage' => '3 dosage',
                'frequency' => '3 tables',
                'created_at' => '2024-09-26 18:43:02',
                'updated_at' => '2024-09-26 18:43:02',
                'deleted_at' => NULL,
                'booked_appointment_id' => 31,
            ),
            25 => 
            array (
                'id' => 26,
                'name' => 'lecord',
                'dosage' => '4 dosages',
                'frequency' => '2 tablets',
                'created_at' => '2024-09-26 18:53:27',
                'updated_at' => '2024-09-26 18:53:27',
                'deleted_at' => NULL,
                'booked_appointment_id' => 32,
            ),
            26 => 
            array (
                'id' => 27,
                'name' => 'nims',
                'dosage' => '4 dosages',
                'frequency' => '3 tablets',
                'created_at' => '2024-09-26 18:53:49',
                'updated_at' => '2024-09-26 18:53:49',
                'deleted_at' => NULL,
                'booked_appointment_id' => 32,
            ),
            27 => 
            array (
                'id' => 28,
                'name' => 'Entox p',
                'dosage' => '5 dosages',
                'frequency' => '4 tablets',
                'created_at' => '2024-09-26 18:54:06',
                'updated_at' => '2024-09-26 18:54:06',
                'deleted_at' => NULL,
                'booked_appointment_id' => 32,
            ),
            28 => 
            array (
                'id' => 29,
                'name' => 'asdefr',
                'dosage' => 'qwe',
                'frequency' => 'qwe',
                'created_at' => '2024-09-27 19:33:28',
                'updated_at' => '2024-09-27 19:33:28',
                'deleted_at' => NULL,
                'booked_appointment_id' => 39,
            ),
            29 => 
            array (
                'id' => 30,
                'name' => 'e312',
                'dosage' => '12312',
                'frequency' => '12312',
                'created_at' => '2024-10-01 15:11:48',
                'updated_at' => '2024-10-01 15:11:48',
                'deleted_at' => NULL,
                'booked_appointment_id' => 38,
            ),
            30 => 
            array (
                'id' => 31,
                'name' => '345',
                'dosage' => '3425',
                'frequency' => '234',
                'created_at' => '2024-10-01 15:12:19',
                'updated_at' => '2024-10-01 15:12:19',
                'deleted_at' => NULL,
                'booked_appointment_id' => 38,
            ),
            31 => 
            array (
                'id' => 32,
                'name' => 'asd',
                'dosage' => 'asd',
                'frequency' => 'asd',
                'created_at' => '2024-10-01 18:48:34',
                'updated_at' => '2024-10-01 18:48:34',
                'deleted_at' => NULL,
                'booked_appointment_id' => 43,
            ),
            32 => 
            array (
                'id' => 33,
                'name' => 'asd',
                'dosage' => 'asd',
                'frequency' => 'asd',
                'created_at' => '2024-10-01 18:48:45',
                'updated_at' => '2024-10-01 18:48:45',
                'deleted_at' => NULL,
                'booked_appointment_id' => 43,
            ),
            33 => 
            array (
                'id' => 34,
                'name' => 'asd',
                'dosage' => 'asd',
                'frequency' => 'asdasd',
                'created_at' => '2024-10-01 18:49:10',
                'updated_at' => '2024-10-01 18:49:10',
                'deleted_at' => NULL,
                'booked_appointment_id' => 43,
            ),
            34 => 
            array (
                'id' => 35,
                'name' => 'nims',
                'dosage' => '1',
                'frequency' => 'weekly',
                'created_at' => '2024-10-01 18:59:00',
                'updated_at' => '2024-10-01 18:59:18',
                'deleted_at' => '2024-10-01 18:59:18',
                'booked_appointment_id' => 42,
            ),
        ));
        
        
    }
}