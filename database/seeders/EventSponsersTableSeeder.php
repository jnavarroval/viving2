<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;

class EventSponsersTableSeeder extends Seeder
{

    /**
     * Auto generated seed file
     *
     * @return void
     */
    public function run()
    {
        

        \DB::table('event_sponsers')->delete();
        
        \DB::table('event_sponsers')->insert(array (
            0 => 
            array (
                'id' => 3,
                'event_id' => 3,
                'name' => 'legal',
                'image' => '/files/event_sponsers/1721893733sponsor-label-collection_23-2148745934.jpg',
                'created_at' => '2024-07-25 12:48:53',
                'updated_at' => '2024-07-25 12:48:53',
                'deleted_at' => NULL,
            ),
            1 => 
            array (
                'id' => 4,
                'event_id' => 4,
                'name' => 'legal',
                'image' => '/files/event_sponsers/1721894056sponsor-label-collection_23-2148745934.jpg',
                'created_at' => '2024-07-25 12:54:16',
                'updated_at' => '2024-07-26 19:24:16',
                'deleted_at' => '2024-07-26 19:24:16',
            ),
            2 => 
            array (
                'id' => 5,
                'event_id' => 4,
                'name' => 'legal',
                'image' => '/files/event_sponsers/1722003856images.jfif',
                'created_at' => '2024-07-26 19:24:16',
                'updated_at' => '2024-07-26 19:24:16',
                'deleted_at' => NULL,
            ),
            3 => 
            array (
                'id' => 6,
                'event_id' => 5,
                'name' => 'legal',
                'image' => '/files/event_sponsers/1725278310event-management-logos-20.jpg',
                'created_at' => '2024-09-02 16:58:30',
                'updated_at' => '2024-09-24 16:41:39',
                'deleted_at' => '2024-09-24 16:41:39',
            ),
            4 => 
            array (
                'id' => 7,
                'event_id' => 6,
                'name' => 'logo',
                'image' => '/files/event_sponsers/1725278518event-management-logos-20.jpg',
                'created_at' => '2024-09-02 17:01:58',
                'updated_at' => '2024-09-02 17:58:51',
                'deleted_at' => '2024-09-02 17:58:51',
            ),
            5 => 
            array (
                'id' => 8,
                'event_id' => 7,
                'name' => 'logo',
                'image' => '/files/event_sponsers/1725279306event-management-logos-20.jpg',
                'created_at' => '2024-09-02 17:15:06',
                'updated_at' => '2024-09-02 17:59:26',
                'deleted_at' => '2024-09-02 17:59:26',
            ),
            6 => 
            array (
                'id' => 9,
                'event_id' => 8,
                'name' => 'legal',
                'image' => '/files/event_sponsers/1725279435istockphoto-1248714799-612x612.jpg',
                'created_at' => '2024-09-02 17:17:15',
                'updated_at' => '2024-09-02 17:59:44',
                'deleted_at' => '2024-09-02 17:59:44',
            ),
            7 => 
            array (
                'id' => 10,
                'event_id' => 9,
                'name' => 'legal',
                'image' => '/files/event_sponsers/1725281730istockphoto-1270585339-612x612.jpg',
                'created_at' => '2024-09-02 17:55:30',
                'updated_at' => '2024-09-02 17:58:04',
                'deleted_at' => '2024-09-02 17:58:04',
            ),
            8 => 
            array (
                'id' => 11,
                'event_id' => 9,
                'name' => 'legal',
                'image' => '/files/event_sponsers/1725281884istockphoto-1270585339-612x612.jpg',
                'created_at' => '2024-09-02 17:58:04',
                'updated_at' => '2024-09-02 17:58:04',
                'deleted_at' => NULL,
            ),
            9 => 
            array (
                'id' => 12,
                'event_id' => 6,
                'name' => 'logo',
                'image' => '/files/event_sponsers/1725281931event-management-logos-20.jpg',
                'created_at' => '2024-09-02 17:58:51',
                'updated_at' => '2024-09-24 16:39:27',
                'deleted_at' => '2024-09-24 16:39:27',
            ),
            10 => 
            array (
                'id' => 13,
                'event_id' => 7,
                'name' => 'logo',
                'image' => '/files/event_sponsers/1725281966event-management-logos-20.jpg',
                'created_at' => '2024-09-02 17:59:26',
                'updated_at' => '2024-09-24 17:25:52',
                'deleted_at' => '2024-09-24 17:25:52',
            ),
            11 => 
            array (
                'id' => 14,
                'event_id' => 8,
                'name' => 'legal',
                'image' => '/files/event_sponsers/1725281984event-management-logos-20.jpg',
                'created_at' => '2024-09-02 17:59:44',
                'updated_at' => '2024-09-24 17:25:44',
                'deleted_at' => '2024-09-24 17:25:44',
            ),
            12 => 
            array (
                'id' => 15,
                'event_id' => 10,
                'name' => 'logo',
                'image' => '/files/event_sponsers/1726656731evendor-s-event-management-logo-54C3C9BA20-seeklogo.com.png',
                'created_at' => '2024-09-18 15:52:11',
                'updated_at' => '2024-09-24 16:41:12',
                'deleted_at' => '2024-09-24 16:41:12',
            ),
            13 => 
            array (
                'id' => 16,
                'event_id' => 10,
                'name' => 'uniliver',
                'image' => '/files/event_sponsers/1726656731event-management-logos-20.jpg',
                'created_at' => '2024-09-18 15:52:11',
                'updated_at' => '2024-09-24 16:41:12',
                'deleted_at' => '2024-09-24 16:41:12',
            ),
            14 => 
            array (
                'id' => 17,
                'event_id' => 10,
                'name' => 'logo',
                'image' => '/files/event_sponsers/1726656731png-clipart-winnipeg-transit-logo-management-business-sponsorship-text-service-thumbnail-removebg-preview.png',
                'created_at' => '2024-09-18 15:52:11',
                'updated_at' => '2024-09-24 16:41:12',
                'deleted_at' => '2024-09-24 16:41:12',
            ),
            15 => 
            array (
                'id' => 18,
                'event_id' => 11,
                'name' => 'legal',
                'image' => '/files/event_sponsers/1726657086evendor-s-event-management-logo-54C3C9BA20-seeklogo.com.png',
                'created_at' => '2024-09-18 15:58:06',
                'updated_at' => '2024-09-24 17:25:36',
                'deleted_at' => '2024-09-24 17:25:36',
            ),
            16 => 
            array (
                'id' => 19,
                'event_id' => 11,
                'name' => 'uniliver',
                'image' => '/files/event_sponsers/1726657086event-management-logos-20.jpg',
                'created_at' => '2024-09-18 15:58:06',
                'updated_at' => '2024-09-24 17:25:36',
                'deleted_at' => '2024-09-24 17:25:36',
            ),
            17 => 
            array (
                'id' => 20,
                'event_id' => 11,
                'name' => 'logo',
                'image' => '/files/event_sponsers/1726657086png-clipart-winnipeg-transit-logo-management-business-sponsorship-text-service-thumbnail-removebg-preview.png',
                'created_at' => '2024-09-18 15:58:06',
                'updated_at' => '2024-09-24 17:25:36',
                'deleted_at' => '2024-09-24 17:25:36',
            ),
            18 => 
            array (
                'id' => 21,
                'event_id' => 12,
                'name' => 'legal',
                'image' => '/files/event_sponsers/1726657264evendor-s-event-management-logo-54C3C9BA20-seeklogo.com.png',
                'created_at' => '2024-09-18 16:01:04',
                'updated_at' => '2024-09-18 16:01:04',
                'deleted_at' => NULL,
            ),
            19 => 
            array (
                'id' => 22,
                'event_id' => 12,
                'name' => 'uniliver',
                'image' => '/files/event_sponsers/1726657264event-management-logos-20.jpg',
                'created_at' => '2024-09-18 16:01:04',
                'updated_at' => '2024-09-18 16:01:04',
                'deleted_at' => NULL,
            ),
            20 => 
            array (
                'id' => 23,
                'event_id' => 12,
                'name' => 'logo',
                'image' => '/files/event_sponsers/1726657264png-clipart-winnipeg-transit-logo-management-business-sponsorship-text-service-thumbnail-removebg-preview.png',
                'created_at' => '2024-09-18 16:01:04',
                'updated_at' => '2024-09-18 16:01:04',
                'deleted_at' => NULL,
            ),
            21 => 
            array (
                'id' => 24,
                'event_id' => 13,
                'name' => 'legal',
                'image' => '/files/event_sponsers/1726657386evendor-s-event-management-logo-54C3C9BA20-seeklogo.com.png',
                'created_at' => '2024-09-18 16:03:06',
                'updated_at' => '2024-09-18 16:03:06',
                'deleted_at' => NULL,
            ),
            22 => 
            array (
                'id' => 25,
                'event_id' => 13,
                'name' => 'uniliver',
                'image' => '/files/event_sponsers/1726657386event-management-logos-20.jpg',
                'created_at' => '2024-09-18 16:03:06',
                'updated_at' => '2024-09-18 16:03:06',
                'deleted_at' => NULL,
            ),
            23 => 
            array (
                'id' => 26,
                'event_id' => 13,
                'name' => 'logo',
                'image' => '/files/event_sponsers/1726657386png-clipart-winnipeg-transit-logo-management-business-sponsorship-text-service-thumbnail-removebg-preview.png',
                'created_at' => '2024-09-18 16:03:06',
                'updated_at' => '2024-09-18 16:03:06',
                'deleted_at' => NULL,
            ),
            24 => 
            array (
                'id' => 27,
                'event_id' => 14,
                'name' => 'legal',
                'image' => '/files/event_sponsers/1726657490evendor-s-event-management-logo-54C3C9BA20-seeklogo.com.png',
                'created_at' => '2024-09-18 16:04:50',
                'updated_at' => '2024-09-18 16:04:50',
                'deleted_at' => NULL,
            ),
            25 => 
            array (
                'id' => 28,
                'event_id' => 14,
                'name' => 'uniliver',
                'image' => '/files/event_sponsers/1726657490png-clipart-winnipeg-transit-logo-management-business-sponsorship-text-service-thumbnail-removebg-preview.png',
                'created_at' => '2024-09-18 16:04:50',
                'updated_at' => '2024-09-18 16:04:50',
                'deleted_at' => NULL,
            ),
            26 => 
            array (
                'id' => 29,
                'event_id' => 14,
                'name' => 'logo',
                'image' => '/files/event_sponsers/1726657490event-management-logos-20.jpg',
                'created_at' => '2024-09-18 16:04:50',
                'updated_at' => '2024-09-18 16:04:50',
                'deleted_at' => NULL,
            ),
            27 => 
            array (
                'id' => 30,
                'event_id' => 15,
                'name' => 'legal',
                'image' => '/files/event_sponsers/1726657603evendor-s-event-management-logo-54C3C9BA20-seeklogo.com.png',
                'created_at' => '2024-09-18 16:06:43',
                'updated_at' => '2024-09-24 17:22:46',
                'deleted_at' => '2024-09-24 17:22:46',
            ),
            28 => 
            array (
                'id' => 31,
                'event_id' => 15,
                'name' => 'uniliver',
                'image' => '/files/event_sponsers/1726657603png-clipart-winnipeg-transit-logo-management-business-sponsorship-text-service-thumbnail-removebg-preview.png',
                'created_at' => '2024-09-18 16:06:43',
                'updated_at' => '2024-09-24 17:22:46',
                'deleted_at' => '2024-09-24 17:22:46',
            ),
            29 => 
            array (
                'id' => 32,
                'event_id' => 15,
                'name' => 'logo',
                'image' => '/files/event_sponsers/1726657603event-management-logos-20.jpg',
                'created_at' => '2024-09-18 16:06:43',
                'updated_at' => '2024-09-24 17:22:46',
                'deleted_at' => '2024-09-24 17:22:46',
            ),
            30 => 
            array (
                'id' => 33,
                'event_id' => 17,
                'name' => 'BankAlfla',
                'image' => '/files/event_sponsers/1726657787evendor-s-event-management-logo-54C3C9BA20-seeklogo.com.png',
                'created_at' => '2024-09-18 16:09:47',
                'updated_at' => '2024-09-24 17:22:36',
                'deleted_at' => '2024-09-24 17:22:36',
            ),
            31 => 
            array (
                'id' => 34,
                'event_id' => 17,
                'name' => 'uniliver',
                'image' => '/files/event_sponsers/1726657787event-management-logos-20.jpg',
                'created_at' => '2024-09-18 16:09:47',
                'updated_at' => '2024-09-24 17:22:36',
                'deleted_at' => '2024-09-24 17:22:36',
            ),
            32 => 
            array (
                'id' => 35,
                'event_id' => 17,
                'name' => 'logo',
                'image' => '/files/event_sponsers/1726657787png-clipart-winnipeg-transit-logo-management-business-sponsorship-text-service-thumbnail-removebg-preview.png',
                'created_at' => '2024-09-18 16:09:47',
                'updated_at' => '2024-09-24 17:22:36',
                'deleted_at' => '2024-09-24 17:22:36',
            ),
            33 => 
            array (
                'id' => 36,
                'event_id' => 18,
                'name' => 'legal',
                'image' => '/files/event_sponsers/1726657899event-management-logos-20.jpg',
                'created_at' => '2024-09-18 16:11:39',
                'updated_at' => '2024-09-24 17:22:18',
                'deleted_at' => '2024-09-24 17:22:18',
            ),
            34 => 
            array (
                'id' => 37,
                'event_id' => 18,
                'name' => 'uniliver',
                'image' => '/files/event_sponsers/1726657899evendor-s-event-management-logo-54C3C9BA20-seeklogo.com.png',
                'created_at' => '2024-09-18 16:11:39',
                'updated_at' => '2024-09-24 17:22:18',
                'deleted_at' => '2024-09-24 17:22:18',
            ),
            35 => 
            array (
                'id' => 38,
                'event_id' => 18,
                'name' => 'logo',
                'image' => '/files/event_sponsers/1726657899png-clipart-winnipeg-transit-logo-management-business-sponsorship-text-service-thumbnail-removebg-preview.png',
                'created_at' => '2024-09-18 16:11:39',
                'updated_at' => '2024-09-24 17:22:18',
                'deleted_at' => '2024-09-24 17:22:18',
            ),
            36 => 
            array (
                'id' => 39,
                'event_id' => 19,
                'name' => 'legal',
                'image' => '/files/event_sponsers/1726658046event-management-logos-20.jpg',
                'created_at' => '2024-09-18 16:14:06',
                'updated_at' => '2024-09-18 16:14:06',
                'deleted_at' => NULL,
            ),
            37 => 
            array (
                'id' => 40,
                'event_id' => 19,
                'name' => 'uniliver',
                'image' => '/files/event_sponsers/1726658046evendor-s-event-management-logo-54C3C9BA20-seeklogo.com.png',
                'created_at' => '2024-09-18 16:14:06',
                'updated_at' => '2024-09-18 16:14:06',
                'deleted_at' => NULL,
            ),
            38 => 
            array (
                'id' => 41,
                'event_id' => 19,
                'name' => 'asd',
                'image' => '/files/event_sponsers/1726658046png-clipart-winnipeg-transit-logo-management-business-sponsorship-text-service-thumbnail-removebg-preview.png',
                'created_at' => '2024-09-18 16:14:06',
                'updated_at' => '2024-09-18 16:14:06',
                'deleted_at' => NULL,
            ),
            39 => 
            array (
                'id' => 42,
                'event_id' => 20,
                'name' => 'legal',
                'image' => '/files/event_sponsers/1726658154event-management-logos-20.jpg',
                'created_at' => '2024-09-18 16:15:54',
                'updated_at' => '2024-09-18 16:15:54',
                'deleted_at' => NULL,
            ),
            40 => 
            array (
                'id' => 43,
                'event_id' => 20,
                'name' => 'uniliver',
                'image' => '/files/event_sponsers/1726658154png-clipart-winnipeg-transit-logo-management-business-sponsorship-text-service-thumbnail-removebg-preview.png',
                'created_at' => '2024-09-18 16:15:54',
                'updated_at' => '2024-09-18 16:15:54',
                'deleted_at' => NULL,
            ),
            41 => 
            array (
                'id' => 44,
                'event_id' => 20,
                'name' => 'logo',
                'image' => '/files/event_sponsers/1726658154evendor-s-event-management-logo-54C3C9BA20-seeklogo.com.png',
                'created_at' => '2024-09-18 16:15:54',
                'updated_at' => '2024-09-18 16:15:54',
                'deleted_at' => NULL,
            ),
            42 => 
            array (
                'id' => 45,
                'event_id' => 21,
                'name' => 'as',
                'image' => '/files/event_sponsers/1726658256event-management-logos-20.jpg',
                'created_at' => '2024-09-18 16:17:36',
                'updated_at' => '2024-09-18 16:17:36',
                'deleted_at' => NULL,
            ),
            43 => 
            array (
                'id' => 46,
                'event_id' => 21,
                'name' => 'asfa',
                'image' => '/files/event_sponsers/1726658256evendor-s-event-management-logo-54C3C9BA20-seeklogo.com.png',
                'created_at' => '2024-09-18 16:17:36',
                'updated_at' => '2024-09-18 16:17:36',
                'deleted_at' => NULL,
            ),
            44 => 
            array (
                'id' => 47,
                'event_id' => 21,
                'name' => 'saf',
                'image' => '/files/event_sponsers/1726658256png-clipart-winnipeg-transit-logo-management-business-sponsorship-text-service-thumbnail-removebg-preview.png',
                'created_at' => '2024-09-18 16:17:36',
                'updated_at' => '2024-09-18 16:17:36',
                'deleted_at' => NULL,
            ),
            45 => 
            array (
                'id' => 48,
                'event_id' => 22,
                'name' => 'df',
                'image' => '/files/event_sponsers/1726658387event-management-logos-20.jpg',
                'created_at' => '2024-09-18 16:19:47',
                'updated_at' => '2024-09-18 16:19:47',
                'deleted_at' => NULL,
            ),
            46 => 
            array (
                'id' => 49,
                'event_id' => 22,
                'name' => 'gsd',
                'image' => '/files/event_sponsers/1726658387evendor-s-event-management-logo-54C3C9BA20-seeklogo.com.png',
                'created_at' => '2024-09-18 16:19:47',
                'updated_at' => '2024-09-18 16:19:47',
                'deleted_at' => NULL,
            ),
            47 => 
            array (
                'id' => 50,
                'event_id' => 22,
                'name' => 'sdf',
                'image' => '/files/event_sponsers/1726658387png-clipart-winnipeg-transit-logo-management-business-sponsorship-text-service-thumbnail-removebg-preview.png',
                'created_at' => '2024-09-18 16:19:47',
                'updated_at' => '2024-09-18 16:19:47',
                'deleted_at' => NULL,
            ),
            48 => 
            array (
                'id' => 51,
                'event_id' => 23,
                'name' => 'asf',
                'image' => '/files/event_sponsers/1726658505event-management-logos-20.jpg',
                'created_at' => '2024-09-18 16:21:45',
                'updated_at' => '2024-09-18 16:21:45',
                'deleted_at' => NULL,
            ),
            49 => 
            array (
                'id' => 52,
                'event_id' => 23,
                'name' => 'gds',
                'image' => '/files/event_sponsers/1726658505evendor-s-event-management-logo-54C3C9BA20-seeklogo.com.png',
                'created_at' => '2024-09-18 16:21:45',
                'updated_at' => '2024-09-18 16:21:45',
                'deleted_at' => NULL,
            ),
            50 => 
            array (
                'id' => 53,
                'event_id' => 23,
                'name' => 'dsf',
                'image' => '/files/event_sponsers/1726658505png-clipart-winnipeg-transit-logo-management-business-sponsorship-text-service-thumbnail-removebg-preview.png',
                'created_at' => '2024-09-18 16:21:45',
                'updated_at' => '2024-09-18 16:21:45',
                'deleted_at' => NULL,
            ),
            51 => 
            array (
                'id' => 54,
                'event_id' => 24,
                'name' => 'legal',
                'image' => '/files/event_sponsers/1726658914event-management-logos-20.jpg',
                'created_at' => '2024-09-18 16:28:34',
                'updated_at' => '2024-09-18 16:28:34',
                'deleted_at' => NULL,
            ),
            52 => 
            array (
                'id' => 55,
                'event_id' => 24,
                'name' => 'asfa',
                'image' => '/files/event_sponsers/1726658914evendor-s-event-management-logo-54C3C9BA20-seeklogo.com.png',
                'created_at' => '2024-09-18 16:28:34',
                'updated_at' => '2024-09-18 16:28:34',
                'deleted_at' => NULL,
            ),
            53 => 
            array (
                'id' => 56,
                'event_id' => 24,
                'name' => 'saf',
                'image' => '/files/event_sponsers/1726658914png-clipart-winnipeg-transit-logo-management-business-sponsorship-text-service-thumbnail-removebg-preview.png',
                'created_at' => '2024-09-18 16:28:34',
                'updated_at' => '2024-09-18 16:28:34',
                'deleted_at' => NULL,
            ),
            54 => 
            array (
                'id' => 57,
                'event_id' => 25,
                'name' => 'legal',
                'image' => '/files/event_sponsers/1726659106event-management-logos-20.jpg',
                'created_at' => '2024-09-18 16:31:46',
                'updated_at' => '2024-09-18 16:31:46',
                'deleted_at' => NULL,
            ),
            55 => 
            array (
                'id' => 58,
                'event_id' => 25,
                'name' => 'uniliver',
                'image' => '/files/event_sponsers/1726659106evendor-s-event-management-logo-54C3C9BA20-seeklogo.com.png',
                'created_at' => '2024-09-18 16:31:46',
                'updated_at' => '2024-09-18 16:31:46',
                'deleted_at' => NULL,
            ),
            56 => 
            array (
                'id' => 59,
                'event_id' => 25,
                'name' => 'logo',
                'image' => '/files/event_sponsers/1726659106png-clipart-winnipeg-transit-logo-management-business-sponsorship-text-service-thumbnail-removebg-preview.png',
                'created_at' => '2024-09-18 16:31:46',
                'updated_at' => '2024-09-18 16:31:46',
                'deleted_at' => NULL,
            ),
            57 => 
            array (
                'id' => 60,
                'event_id' => 26,
                'name' => 'legal',
                'image' => '/files/event_sponsers/1726659195event-management-logos-20.jpg',
                'created_at' => '2024-09-18 16:33:15',
                'updated_at' => '2024-09-18 16:33:15',
                'deleted_at' => NULL,
            ),
            58 => 
            array (
                'id' => 61,
                'event_id' => 26,
                'name' => 'asfa',
                'image' => '/files/event_sponsers/1726659195evendor-s-event-management-logo-54C3C9BA20-seeklogo.com.png',
                'created_at' => '2024-09-18 16:33:15',
                'updated_at' => '2024-09-18 16:33:15',
                'deleted_at' => NULL,
            ),
            59 => 
            array (
                'id' => 62,
                'event_id' => 26,
                'name' => 'saf',
                'image' => '/files/event_sponsers/1726659195png-clipart-winnipeg-transit-logo-management-business-sponsorship-text-service-thumbnail-removebg-preview.png',
                'created_at' => '2024-09-18 16:33:15',
                'updated_at' => '2024-09-18 16:33:15',
                'deleted_at' => NULL,
            ),
            60 => 
            array (
                'id' => 63,
                'event_id' => 27,
                'name' => 'logo',
                'image' => '/files/event_sponsers/1726659295event-management-logos-20.jpg',
                'created_at' => '2024-09-18 16:34:55',
                'updated_at' => '2024-09-18 16:34:55',
                'deleted_at' => NULL,
            ),
            61 => 
            array (
                'id' => 64,
                'event_id' => 27,
                'name' => 'asfa',
                'image' => '/files/event_sponsers/1726659295evendor-s-event-management-logo-54C3C9BA20-seeklogo.com.png',
                'created_at' => '2024-09-18 16:34:55',
                'updated_at' => '2024-09-18 16:34:55',
                'deleted_at' => NULL,
            ),
            62 => 
            array (
                'id' => 65,
                'event_id' => 27,
                'name' => 'saf',
                'image' => '/files/event_sponsers/1726659295png-clipart-winnipeg-transit-logo-management-business-sponsorship-text-service-thumbnail-removebg-preview.png',
                'created_at' => '2024-09-18 16:34:55',
                'updated_at' => '2024-09-18 16:34:55',
                'deleted_at' => NULL,
            ),
            63 => 
            array (
                'id' => 66,
                'event_id' => 28,
                'name' => 'sad',
                'image' => '/files/event_sponsers/1726659507event-management-logos-20.jpg',
                'created_at' => '2024-09-18 16:38:27',
                'updated_at' => '2024-09-18 16:38:27',
                'deleted_at' => NULL,
            ),
            64 => 
            array (
                'id' => 67,
                'event_id' => 28,
                'name' => 'sadasd',
                'image' => '/files/event_sponsers/1726659507evendor-s-event-management-logo-54C3C9BA20-seeklogo.com.png',
                'created_at' => '2024-09-18 16:38:27',
                'updated_at' => '2024-09-18 16:38:27',
                'deleted_at' => NULL,
            ),
            65 => 
            array (
                'id' => 68,
                'event_id' => 28,
                'name' => 'asf',
                'image' => '/files/event_sponsers/1726659507png-clipart-winnipeg-transit-logo-management-business-sponsorship-text-service-thumbnail-removebg-preview.png',
                'created_at' => '2024-09-18 16:38:27',
                'updated_at' => '2024-09-18 16:38:27',
                'deleted_at' => NULL,
            ),
            66 => 
            array (
                'id' => 69,
                'event_id' => 29,
                'name' => 'xcas',
                'image' => '/files/event_sponsers/1726659601event-management-logos-20.jpg',
                'created_at' => '2024-09-18 16:40:01',
                'updated_at' => '2024-09-18 16:40:01',
                'deleted_at' => NULL,
            ),
            67 => 
            array (
                'id' => 70,
                'event_id' => 29,
                'name' => 'dasa',
                'image' => '/files/event_sponsers/1726659601evendor-s-event-management-logo-54C3C9BA20-seeklogo.com.png',
                'created_at' => '2024-09-18 16:40:01',
                'updated_at' => '2024-09-18 16:40:01',
                'deleted_at' => NULL,
            ),
            68 => 
            array (
                'id' => 71,
                'event_id' => 29,
                'name' => 'assad',
                'image' => '/files/event_sponsers/1726659601png-clipart-winnipeg-transit-logo-management-business-sponsorship-text-service-thumbnail-removebg-preview.png',
                'created_at' => '2024-09-18 16:40:01',
                'updated_at' => '2024-09-18 16:40:01',
                'deleted_at' => NULL,
            ),
            69 => 
            array (
                'id' => 72,
                'event_id' => 30,
                'name' => 'sdf',
                'image' => '/files/event_sponsers/1726659671event-management-logos-20.jpg',
                'created_at' => '2024-09-18 16:41:11',
                'updated_at' => '2024-09-18 16:41:11',
                'deleted_at' => NULL,
            ),
            70 => 
            array (
                'id' => 73,
                'event_id' => 30,
                'name' => 'dsfsdf',
                'image' => '/files/event_sponsers/1726659671evendor-s-event-management-logo-54C3C9BA20-seeklogo.com.png',
                'created_at' => '2024-09-18 16:41:11',
                'updated_at' => '2024-09-18 16:41:11',
                'deleted_at' => NULL,
            ),
            71 => 
            array (
                'id' => 74,
                'event_id' => 30,
                'name' => 'sd',
                'image' => '/files/event_sponsers/1726659671png-clipart-winnipeg-transit-logo-management-business-sponsorship-text-service-thumbnail-removebg-preview.png',
                'created_at' => '2024-09-18 16:41:11',
                'updated_at' => '2024-09-18 16:41:11',
                'deleted_at' => NULL,
            ),
            72 => 
            array (
                'id' => 75,
                'event_id' => 31,
                'name' => 'asdas',
                'image' => '/files/event_sponsers/1726659760evendor-s-event-management-logo-54C3C9BA20-seeklogo.com.png',
                'created_at' => '2024-09-18 16:42:40',
                'updated_at' => '2024-09-18 16:42:40',
                'deleted_at' => NULL,
            ),
            73 => 
            array (
                'id' => 76,
                'event_id' => 31,
                'name' => 'sadasd',
                'image' => '/files/event_sponsers/1726659760event-management-logos-20.jpg',
                'created_at' => '2024-09-18 16:42:40',
                'updated_at' => '2024-09-18 16:42:40',
                'deleted_at' => NULL,
            ),
            74 => 
            array (
                'id' => 77,
                'event_id' => 31,
                'name' => 'asd',
                'image' => '/files/event_sponsers/1726659760png-clipart-winnipeg-transit-logo-management-business-sponsorship-text-service-thumbnail-removebg-preview.png',
                'created_at' => '2024-09-18 16:42:40',
                'updated_at' => '2024-09-18 16:42:40',
                'deleted_at' => NULL,
            ),
            75 => 
            array (
                'id' => 78,
                'event_id' => 32,
                'name' => 'asd',
                'image' => '/files/event_sponsers/1726659833event-management-logos-20.jpg',
                'created_at' => '2024-09-18 16:43:53',
                'updated_at' => '2024-09-18 16:44:29',
                'deleted_at' => '2024-09-18 16:44:29',
            ),
            76 => 
            array (
                'id' => 79,
                'event_id' => 32,
                'name' => 'safasf',
                'image' => '/files/event_sponsers/1726659833evendor-s-event-management-logo-54C3C9BA20-seeklogo.com.png',
                'created_at' => '2024-09-18 16:43:53',
                'updated_at' => '2024-09-18 16:44:29',
                'deleted_at' => '2024-09-18 16:44:29',
            ),
            77 => 
            array (
                'id' => 80,
                'event_id' => 32,
                'name' => 'asfasf',
                'image' => '/files/event_sponsers/1726659833png-clipart-winnipeg-transit-logo-management-business-sponsorship-text-service-thumbnail-removebg-preview.png',
                'created_at' => '2024-09-18 16:43:53',
                'updated_at' => '2024-09-18 16:44:29',
                'deleted_at' => '2024-09-18 16:44:29',
            ),
            78 => 
            array (
                'id' => 81,
                'event_id' => 32,
                'name' => 'asd',
                'image' => '/files/event_sponsers/1726659869evendor-s-event-management-logo-54C3C9BA20-seeklogo.com.png',
                'created_at' => '2024-09-18 16:44:29',
                'updated_at' => '2024-09-18 16:44:29',
                'deleted_at' => NULL,
            ),
            79 => 
            array (
                'id' => 82,
                'event_id' => 32,
                'name' => 'safasf',
                'image' => '/files/event_sponsers/1726659869event-management-logos-20.jpg',
                'created_at' => '2024-09-18 16:44:29',
                'updated_at' => '2024-09-18 16:44:29',
                'deleted_at' => NULL,
            ),
            80 => 
            array (
                'id' => 83,
                'event_id' => 32,
                'name' => 'asfasf',
                'image' => '/files/event_sponsers/1726659869png-clipart-winnipeg-transit-logo-management-business-sponsorship-text-service-thumbnail-removebg-preview.png',
                'created_at' => '2024-09-18 16:44:29',
                'updated_at' => '2024-09-18 16:44:29',
                'deleted_at' => NULL,
            ),
            81 => 
            array (
                'id' => 84,
                'event_id' => 33,
                'name' => 'afa',
                'image' => '/files/event_sponsers/1726659976evendor-s-event-management-logo-54C3C9BA20-seeklogo.com.png',
                'created_at' => '2024-09-18 16:46:16',
                'updated_at' => '2024-09-18 16:46:16',
                'deleted_at' => NULL,
            ),
            82 => 
            array (
                'id' => 85,
                'event_id' => 33,
                'name' => 'fadfsd',
                'image' => '/files/event_sponsers/1726659976event-management-logos-20.jpg',
                'created_at' => '2024-09-18 16:46:16',
                'updated_at' => '2024-09-18 16:46:16',
                'deleted_at' => NULL,
            ),
            83 => 
            array (
                'id' => 86,
                'event_id' => 33,
                'name' => 'gsd',
                'image' => '/files/event_sponsers/1726659976png-clipart-winnipeg-transit-logo-management-business-sponsorship-text-service-thumbnail-removebg-preview.png',
                'created_at' => '2024-09-18 16:46:16',
                'updated_at' => '2024-09-18 16:46:16',
                'deleted_at' => NULL,
            ),
            84 => 
            array (
                'id' => 87,
                'event_id' => 34,
                'name' => 'saasasf',
                'image' => '/files/event_sponsers/1726660113event-management-logos-20.jpg',
                'created_at' => '2024-09-18 16:48:33',
                'updated_at' => '2024-09-18 16:48:33',
                'deleted_at' => NULL,
            ),
            85 => 
            array (
                'id' => 88,
                'event_id' => 34,
                'name' => 'safasfasfas',
                'image' => '/files/event_sponsers/1726660113evendor-s-event-management-logo-54C3C9BA20-seeklogo.com.png',
                'created_at' => '2024-09-18 16:48:33',
                'updated_at' => '2024-09-18 16:48:33',
                'deleted_at' => NULL,
            ),
            86 => 
            array (
                'id' => 89,
                'event_id' => 34,
                'name' => 'fsafasf',
                'image' => '/files/event_sponsers/1726660113png-clipart-winnipeg-transit-logo-management-business-sponsorship-text-service-thumbnail-removebg-preview.png',
                'created_at' => '2024-09-18 16:48:33',
                'updated_at' => '2024-09-18 16:48:33',
                'deleted_at' => NULL,
            ),
            87 => 
            array (
                'id' => 90,
                'event_id' => 35,
                'name' => 'sd',
                'image' => '/files/event_sponsers/1726660724event-management-logos-20.jpg',
                'created_at' => '2024-09-18 16:58:44',
                'updated_at' => '2024-09-18 16:58:44',
                'deleted_at' => NULL,
            ),
            88 => 
            array (
                'id' => 91,
                'event_id' => 35,
                'name' => 'asdasa',
                'image' => '/files/event_sponsers/1726660724evendor-s-event-management-logo-54C3C9BA20-seeklogo.com.png',
                'created_at' => '2024-09-18 16:58:44',
                'updated_at' => '2024-09-18 16:58:44',
                'deleted_at' => NULL,
            ),
            89 => 
            array (
                'id' => 92,
                'event_id' => 35,
                'name' => 'sfas',
                'image' => '/files/event_sponsers/1726660724png-clipart-winnipeg-transit-logo-management-business-sponsorship-text-service-thumbnail-removebg-preview.png',
                'created_at' => '2024-09-18 16:58:44',
                'updated_at' => '2024-09-18 16:58:44',
                'deleted_at' => NULL,
            ),
            90 => 
            array (
                'id' => 93,
                'event_id' => 36,
                'name' => 'sfasf',
                'image' => '/files/event_sponsers/1726660794evendor-s-event-management-logo-54C3C9BA20-seeklogo.com.png',
                'created_at' => '2024-09-18 16:59:54',
                'updated_at' => '2024-09-18 16:59:54',
                'deleted_at' => NULL,
            ),
            91 => 
            array (
                'id' => 94,
                'event_id' => 36,
                'name' => 'asfasf',
                'image' => '/files/event_sponsers/1726660794event-management-logos-20.jpg',
                'created_at' => '2024-09-18 16:59:54',
                'updated_at' => '2024-09-18 16:59:54',
                'deleted_at' => NULL,
            ),
            92 => 
            array (
                'id' => 95,
                'event_id' => 36,
                'name' => 'asf',
                'image' => '/files/event_sponsers/1726660794png-clipart-winnipeg-transit-logo-management-business-sponsorship-text-service-thumbnail-removebg-preview.png',
                'created_at' => '2024-09-18 16:59:54',
                'updated_at' => '2024-09-18 16:59:54',
                'deleted_at' => NULL,
            ),
            93 => 
            array (
                'id' => 96,
                'event_id' => 37,
                'name' => 'legal',
                'image' => '/files/event_sponsers/1726660942event-management-logos-20.jpg',
                'created_at' => '2024-09-18 17:02:22',
                'updated_at' => '2024-09-18 17:02:22',
                'deleted_at' => NULL,
            ),
            94 => 
            array (
                'id' => 97,
                'event_id' => 37,
                'name' => 'gsd',
                'image' => '/files/event_sponsers/1726660942evendor-s-event-management-logo-54C3C9BA20-seeklogo.com.png',
                'created_at' => '2024-09-18 17:02:22',
                'updated_at' => '2024-09-18 17:02:22',
                'deleted_at' => NULL,
            ),
            95 => 
            array (
                'id' => 98,
                'event_id' => 37,
                'name' => 'asd',
                'image' => '/files/event_sponsers/1726660942png-clipart-winnipeg-transit-logo-management-business-sponsorship-text-service-thumbnail-removebg-preview.png',
                'created_at' => '2024-09-18 17:02:22',
                'updated_at' => '2024-09-18 17:02:22',
                'deleted_at' => NULL,
            ),
            96 => 
            array (
                'id' => 99,
                'event_id' => 38,
                'name' => 'legalsdas',
                'image' => '/files/event_sponsers/1726661004event-management-logos-20.jpg',
                'created_at' => '2024-09-18 17:03:24',
                'updated_at' => '2024-09-18 17:03:24',
                'deleted_at' => NULL,
            ),
            97 => 
            array (
                'id' => 100,
                'event_id' => 38,
                'name' => 'sadasd',
                'image' => '/files/event_sponsers/1726661004evendor-s-event-management-logo-54C3C9BA20-seeklogo.com.png',
                'created_at' => '2024-09-18 17:03:24',
                'updated_at' => '2024-09-18 17:03:24',
                'deleted_at' => NULL,
            ),
            98 => 
            array (
                'id' => 101,
                'event_id' => 38,
                'name' => 'asdas',
                'image' => '/files/event_sponsers/1726661004png-clipart-winnipeg-transit-logo-management-business-sponsorship-text-service-thumbnail-removebg-preview.png',
                'created_at' => '2024-09-18 17:03:24',
                'updated_at' => '2024-09-18 17:03:24',
                'deleted_at' => NULL,
            ),
            99 => 
            array (
                'id' => 102,
                'event_id' => 39,
                'name' => 'legal',
                'image' => '/files/event_sponsers/1726661069evendor-s-event-management-logo-54C3C9BA20-seeklogo.com.png',
                'created_at' => '2024-09-18 17:04:29',
                'updated_at' => '2024-09-18 17:04:29',
                'deleted_at' => NULL,
            ),
        ));
        \DB::table('event_sponsers')->insert(array (
            0 => 
            array (
                'id' => 103,
                'event_id' => 39,
                'name' => 'dasa',
                'image' => '/files/event_sponsers/1726661069event-management-logos-20.jpg',
                'created_at' => '2024-09-18 17:04:29',
                'updated_at' => '2024-09-18 17:04:29',
                'deleted_at' => NULL,
            ),
            1 => 
            array (
                'id' => 104,
                'event_id' => 39,
                'name' => 'asd',
                'image' => '/files/event_sponsers/1726661069png-clipart-winnipeg-transit-logo-management-business-sponsorship-text-service-thumbnail-removebg-preview.png',
                'created_at' => '2024-09-18 17:04:29',
                'updated_at' => '2024-09-18 17:04:29',
                'deleted_at' => NULL,
            ),
            2 => 
            array (
                'id' => 105,
                'event_id' => 40,
                'name' => 'asaf',
                'image' => '/files/event_sponsers/1726661181evendor-s-event-management-logo-54C3C9BA20-seeklogo.com.png',
                'created_at' => '2024-09-18 17:06:21',
                'updated_at' => '2024-09-18 17:06:21',
                'deleted_at' => NULL,
            ),
            3 => 
            array (
                'id' => 106,
                'event_id' => 40,
                'name' => 'asfasf',
                'image' => '/files/event_sponsers/1726661181event-management-logos-20.jpg',
                'created_at' => '2024-09-18 17:06:21',
                'updated_at' => '2024-09-18 17:06:21',
                'deleted_at' => NULL,
            ),
            4 => 
            array (
                'id' => 107,
                'event_id' => 40,
                'name' => 'asf',
                'image' => '/files/event_sponsers/1726661181png-clipart-winnipeg-transit-logo-management-business-sponsorship-text-service-thumbnail-removebg-preview.png',
                'created_at' => '2024-09-18 17:06:21',
                'updated_at' => '2024-09-18 17:06:21',
                'deleted_at' => NULL,
            ),
            5 => 
            array (
                'id' => 108,
                'event_id' => 41,
                'name' => 'logo',
                'image' => '/files/event_sponsers/1726661275evendor-s-event-management-logo-54C3C9BA20-seeklogo.com.png',
                'created_at' => '2024-09-18 17:07:55',
                'updated_at' => '2024-09-18 17:07:55',
                'deleted_at' => NULL,
            ),
            6 => 
            array (
                'id' => 109,
                'event_id' => 41,
                'name' => 'gsd',
                'image' => '/files/event_sponsers/1726661275event-management-logos-20.jpg',
                'created_at' => '2024-09-18 17:07:55',
                'updated_at' => '2024-09-18 17:07:55',
                'deleted_at' => NULL,
            ),
            7 => 
            array (
                'id' => 110,
                'event_id' => 41,
                'name' => 'saf',
                'image' => '/files/event_sponsers/1726661275png-clipart-winnipeg-transit-logo-management-business-sponsorship-text-service-thumbnail-removebg-preview.png',
                'created_at' => '2024-09-18 17:07:55',
                'updated_at' => '2024-09-18 17:07:55',
                'deleted_at' => NULL,
            ),
            8 => 
            array (
                'id' => 111,
                'event_id' => 42,
                'name' => 'legal',
                'image' => '/files/event_sponsers/1726661355evendor-s-event-management-logo-54C3C9BA20-seeklogo.com.png',
                'created_at' => '2024-09-18 17:09:15',
                'updated_at' => '2024-09-18 17:09:15',
                'deleted_at' => NULL,
            ),
            9 => 
            array (
                'id' => 112,
                'event_id' => 42,
                'name' => 'sadasd',
                'image' => '/files/event_sponsers/1726661355event-management-logos-20.jpg',
                'created_at' => '2024-09-18 17:09:15',
                'updated_at' => '2024-09-18 17:09:15',
                'deleted_at' => NULL,
            ),
            10 => 
            array (
                'id' => 113,
                'event_id' => 42,
                'name' => 'asf',
                'image' => '/files/event_sponsers/1726661355png-clipart-winnipeg-transit-logo-management-business-sponsorship-text-service-thumbnail-removebg-preview.png',
                'created_at' => '2024-09-18 17:09:15',
                'updated_at' => '2024-09-18 17:09:15',
                'deleted_at' => NULL,
            ),
            11 => 
            array (
                'id' => 114,
                'event_id' => 43,
                'name' => 'asf',
                'image' => '/files/event_sponsers/1726661497evendor-s-event-management-logo-54C3C9BA20-seeklogo.com.png',
                'created_at' => '2024-09-18 17:11:37',
                'updated_at' => '2024-09-18 17:11:37',
                'deleted_at' => NULL,
            ),
            12 => 
            array (
                'id' => 115,
                'event_id' => 43,
                'name' => 'afasfa',
                'image' => '/files/event_sponsers/1726661497event-management-logos-20.jpg',
                'created_at' => '2024-09-18 17:11:37',
                'updated_at' => '2024-09-18 17:11:37',
                'deleted_at' => NULL,
            ),
            13 => 
            array (
                'id' => 116,
                'event_id' => 43,
                'name' => 'sfas',
                'image' => '/files/event_sponsers/1726661497png-clipart-winnipeg-transit-logo-management-business-sponsorship-text-service-thumbnail-removebg-preview.png',
                'created_at' => '2024-09-18 17:11:37',
                'updated_at' => '2024-09-18 17:11:37',
                'deleted_at' => NULL,
            ),
            14 => 
            array (
                'id' => 117,
                'event_id' => 44,
                'name' => 'sada',
                'image' => '/files/event_sponsers/1726661577evendor-s-event-management-logo-54C3C9BA20-seeklogo.com.png',
                'created_at' => '2024-09-18 17:12:57',
                'updated_at' => '2024-09-18 17:12:57',
                'deleted_at' => NULL,
            ),
            15 => 
            array (
                'id' => 118,
                'event_id' => 44,
                'name' => 'sdsaf',
                'image' => '/files/event_sponsers/1726661577event-management-logos-20.jpg',
                'created_at' => '2024-09-18 17:12:57',
                'updated_at' => '2024-09-18 17:12:57',
                'deleted_at' => NULL,
            ),
            16 => 
            array (
                'id' => 119,
                'event_id' => 44,
                'name' => 'sfasfas',
                'image' => '/files/event_sponsers/1726661577png-clipart-winnipeg-transit-logo-management-business-sponsorship-text-service-thumbnail-removebg-preview.png',
                'created_at' => '2024-09-18 17:12:57',
                'updated_at' => '2024-09-18 17:12:57',
                'deleted_at' => NULL,
            ),
            17 => 
            array (
                'id' => 120,
                'event_id' => 45,
                'name' => 'asd',
                'image' => '/files/event_sponsers/1726661665evendor-s-event-management-logo-54C3C9BA20-seeklogo.com.png',
                'created_at' => '2024-09-18 17:14:25',
                'updated_at' => '2024-09-18 17:14:25',
                'deleted_at' => NULL,
            ),
            18 => 
            array (
                'id' => 121,
                'event_id' => 45,
                'name' => 'fasssaf',
                'image' => '/files/event_sponsers/1726661665event-management-logos-20.jpg',
                'created_at' => '2024-09-18 17:14:25',
                'updated_at' => '2024-09-18 17:14:25',
                'deleted_at' => NULL,
            ),
            19 => 
            array (
                'id' => 122,
                'event_id' => 45,
                'name' => 'asfas',
                'image' => '/files/event_sponsers/1726661665png-clipart-winnipeg-transit-logo-management-business-sponsorship-text-service-thumbnail-removebg-preview.png',
                'created_at' => '2024-09-18 17:14:25',
                'updated_at' => '2024-09-18 17:14:25',
                'deleted_at' => NULL,
            ),
            20 => 
            array (
                'id' => 123,
                'event_id' => 46,
                'name' => 'as',
                'image' => '/files/event_sponsers/1726661794evendor-s-event-management-logo-54C3C9BA20-seeklogo.com.png',
                'created_at' => '2024-09-18 17:16:34',
                'updated_at' => '2024-09-18 17:16:34',
                'deleted_at' => NULL,
            ),
            21 => 
            array (
                'id' => 124,
                'event_id' => 46,
                'name' => 'asdasfa',
                'image' => '/files/event_sponsers/1726661794event-management-logos-20.jpg',
                'created_at' => '2024-09-18 17:16:34',
                'updated_at' => '2024-09-18 17:16:34',
                'deleted_at' => NULL,
            ),
            22 => 
            array (
                'id' => 125,
                'event_id' => 46,
                'name' => 'sfsa',
                'image' => '/files/event_sponsers/1726661794png-clipart-winnipeg-transit-logo-management-business-sponsorship-text-service-thumbnail-removebg-preview.png',
                'created_at' => '2024-09-18 17:16:34',
                'updated_at' => '2024-09-18 17:16:34',
                'deleted_at' => NULL,
            ),
            23 => 
            array (
                'id' => 126,
                'event_id' => 47,
                'name' => 'sf',
                'image' => '/files/event_sponsers/1726661873evendor-s-event-management-logo-54C3C9BA20-seeklogo.com.png',
                'created_at' => '2024-09-18 17:17:53',
                'updated_at' => '2024-09-18 17:17:53',
                'deleted_at' => NULL,
            ),
            24 => 
            array (
                'id' => 127,
                'event_id' => 47,
                'name' => 'ssfsf',
                'image' => '/files/event_sponsers/1726661873event-management-logos-20.jpg',
                'created_at' => '2024-09-18 17:17:53',
                'updated_at' => '2024-09-18 17:17:53',
                'deleted_at' => NULL,
            ),
            25 => 
            array (
                'id' => 128,
                'event_id' => 47,
                'name' => 'sf',
                'image' => '/files/event_sponsers/1726661873png-clipart-winnipeg-transit-logo-management-business-sponsorship-text-service-thumbnail-removebg-preview.png',
                'created_at' => '2024-09-18 17:17:53',
                'updated_at' => '2024-09-18 17:17:53',
                'deleted_at' => NULL,
            ),
            26 => 
            array (
                'id' => 129,
                'event_id' => 48,
                'name' => 'legal',
                'image' => '/files/event_sponsers/1726661960evendor-s-event-management-logo-54C3C9BA20-seeklogo.com.png',
                'created_at' => '2024-09-18 17:19:20',
                'updated_at' => '2024-09-18 17:19:20',
                'deleted_at' => NULL,
            ),
            27 => 
            array (
                'id' => 130,
                'event_id' => 48,
                'name' => 'gsd',
                'image' => '/files/event_sponsers/1726661960event-management-logos-20.jpg',
                'created_at' => '2024-09-18 17:19:20',
                'updated_at' => '2024-09-18 17:19:20',
                'deleted_at' => NULL,
            ),
            28 => 
            array (
                'id' => 131,
                'event_id' => 48,
                'name' => 'saf',
                'image' => '/files/event_sponsers/1726661960png-clipart-winnipeg-transit-logo-management-business-sponsorship-text-service-thumbnail-removebg-preview.png',
                'created_at' => '2024-09-18 17:19:20',
                'updated_at' => '2024-09-18 17:19:20',
                'deleted_at' => NULL,
            ),
            29 => 
            array (
                'id' => 132,
                'event_id' => 49,
                'name' => 'asf',
                'image' => '/files/event_sponsers/1726662046event-management-logos-20.jpg',
                'created_at' => '2024-09-18 17:20:46',
                'updated_at' => '2024-09-18 17:20:46',
                'deleted_at' => NULL,
            ),
            30 => 
            array (
                'id' => 133,
                'event_id' => 49,
                'name' => 'asfasf',
                'image' => '/files/event_sponsers/1726662046evendor-s-event-management-logo-54C3C9BA20-seeklogo.com.png',
                'created_at' => '2024-09-18 17:20:46',
                'updated_at' => '2024-09-18 17:20:46',
                'deleted_at' => NULL,
            ),
            31 => 
            array (
                'id' => 134,
                'event_id' => 49,
                'name' => 'asfa',
                'image' => '/files/event_sponsers/1726662046png-clipart-winnipeg-transit-logo-management-business-sponsorship-text-service-thumbnail-removebg-preview.png',
                'created_at' => '2024-09-18 17:20:46',
                'updated_at' => '2024-09-18 17:20:46',
                'deleted_at' => NULL,
            ),
            32 => 
            array (
                'id' => 135,
                'event_id' => 50,
                'name' => 'asfa',
                'image' => '/files/event_sponsers/1726662118evendor-s-event-management-logo-54C3C9BA20-seeklogo.com.png',
                'created_at' => '2024-09-18 17:21:58',
                'updated_at' => '2024-09-18 17:21:58',
                'deleted_at' => NULL,
            ),
            33 => 
            array (
                'id' => 136,
                'event_id' => 50,
                'name' => 'sfasfa',
                'image' => '/files/event_sponsers/1726662118event-management-logos-20.jpg',
                'created_at' => '2024-09-18 17:21:58',
                'updated_at' => '2024-09-18 17:21:58',
                'deleted_at' => NULL,
            ),
            34 => 
            array (
                'id' => 137,
                'event_id' => 50,
                'name' => 'sfsa',
                'image' => '/files/event_sponsers/1726662118png-clipart-winnipeg-transit-logo-management-business-sponsorship-text-service-thumbnail-removebg-preview.png',
                'created_at' => '2024-09-18 17:21:58',
                'updated_at' => '2024-09-18 17:21:58',
                'deleted_at' => NULL,
            ),
            35 => 
            array (
                'id' => 138,
                'event_id' => 51,
                'name' => 'as',
                'image' => '/files/event_sponsers/1726662194evendor-s-event-management-logo-54C3C9BA20-seeklogo.com.png',
                'created_at' => '2024-09-18 17:23:14',
                'updated_at' => '2024-09-18 17:23:14',
                'deleted_at' => NULL,
            ),
            36 => 
            array (
                'id' => 139,
                'event_id' => 51,
                'name' => 'asfasf',
                'image' => '/files/event_sponsers/1726662194event-management-logos-20.jpg',
                'created_at' => '2024-09-18 17:23:14',
                'updated_at' => '2024-09-18 17:23:14',
                'deleted_at' => NULL,
            ),
            37 => 
            array (
                'id' => 140,
                'event_id' => 51,
                'name' => 'asf',
                'image' => '/files/event_sponsers/1726662194png-clipart-winnipeg-transit-logo-management-business-sponsorship-text-service-thumbnail-removebg-preview.png',
                'created_at' => '2024-09-18 17:23:14',
                'updated_at' => '2024-09-18 17:23:14',
                'deleted_at' => NULL,
            ),
            38 => 
            array (
                'id' => 141,
                'event_id' => 52,
                'name' => 'asf',
                'image' => '/files/event_sponsers/1726662311evendor-s-event-management-logo-54C3C9BA20-seeklogo.com.png',
                'created_at' => '2024-09-18 17:25:11',
                'updated_at' => '2024-09-18 17:25:11',
                'deleted_at' => NULL,
            ),
            39 => 
            array (
                'id' => 142,
                'event_id' => 52,
                'name' => 'asfa',
                'image' => '/files/event_sponsers/1726662311event-management-logos-20.jpg',
                'created_at' => '2024-09-18 17:25:11',
                'updated_at' => '2024-09-18 17:25:11',
                'deleted_at' => NULL,
            ),
            40 => 
            array (
                'id' => 143,
                'event_id' => 52,
                'name' => 'gasgas',
                'image' => '/files/event_sponsers/1726662311png-clipart-winnipeg-transit-logo-management-business-sponsorship-text-service-thumbnail-removebg-preview.png',
                'created_at' => '2024-09-18 17:25:11',
                'updated_at' => '2024-09-18 17:25:11',
                'deleted_at' => NULL,
            ),
            41 => 
            array (
                'id' => 144,
                'event_id' => 53,
                'name' => 'dgsg',
                'image' => '/files/event_sponsers/1726662374evendor-s-event-management-logo-54C3C9BA20-seeklogo.com.png',
                'created_at' => '2024-09-18 17:26:14',
                'updated_at' => '2024-09-18 17:26:14',
                'deleted_at' => NULL,
            ),
            42 => 
            array (
                'id' => 145,
                'event_id' => 53,
                'name' => 'sdgs',
                'image' => '/files/event_sponsers/1726662374event-management-logos-20.jpg',
                'created_at' => '2024-09-18 17:26:14',
                'updated_at' => '2024-09-18 17:26:14',
                'deleted_at' => NULL,
            ),
            43 => 
            array (
                'id' => 146,
                'event_id' => 53,
                'name' => 'sdgsdg',
                'image' => '/files/event_sponsers/1726662374png-clipart-winnipeg-transit-logo-management-business-sponsorship-text-service-thumbnail-removebg-preview.png',
                'created_at' => '2024-09-18 17:26:14',
                'updated_at' => '2024-09-18 17:26:14',
                'deleted_at' => NULL,
            ),
            44 => 
            array (
                'id' => 147,
                'event_id' => 54,
                'name' => 'legal',
                'image' => '/files/event_sponsers/1726662449event-management-logos-20.jpg',
                'created_at' => '2024-09-18 17:27:29',
                'updated_at' => '2024-09-18 17:27:29',
                'deleted_at' => NULL,
            ),
            45 => 
            array (
                'id' => 148,
                'event_id' => 54,
                'name' => 'sdf',
                'image' => '/files/event_sponsers/1726662449evendor-s-event-management-logo-54C3C9BA20-seeklogo.com.png',
                'created_at' => '2024-09-18 17:27:29',
                'updated_at' => '2024-09-18 17:27:29',
                'deleted_at' => NULL,
            ),
            46 => 
            array (
                'id' => 149,
                'event_id' => 54,
                'name' => 'sdfsdf',
                'image' => '/files/event_sponsers/1726662449png-clipart-winnipeg-transit-logo-management-business-sponsorship-text-service-thumbnail-removebg-preview.png',
                'created_at' => '2024-09-18 17:27:29',
                'updated_at' => '2024-09-18 17:27:29',
                'deleted_at' => NULL,
            ),
            47 => 
            array (
                'id' => 150,
                'event_id' => 55,
                'name' => 'as',
                'image' => '/files/event_sponsers/1726662561evendor-s-event-management-logo-54C3C9BA20-seeklogo.com.png',
                'created_at' => '2024-09-18 17:29:21',
                'updated_at' => '2024-09-18 17:29:21',
                'deleted_at' => NULL,
            ),
            48 => 
            array (
                'id' => 151,
                'event_id' => 55,
                'name' => 'asfasf',
                'image' => '/files/event_sponsers/1726662561event-management-logos-20.jpg',
                'created_at' => '2024-09-18 17:29:21',
                'updated_at' => '2024-09-18 17:29:21',
                'deleted_at' => NULL,
            ),
            49 => 
            array (
                'id' => 152,
                'event_id' => 55,
                'name' => 'saf',
                'image' => '/files/event_sponsers/1726662561png-clipart-winnipeg-transit-logo-management-business-sponsorship-text-service-thumbnail-removebg-preview.png',
                'created_at' => '2024-09-18 17:29:21',
                'updated_at' => '2024-09-18 17:29:21',
                'deleted_at' => NULL,
            ),
            50 => 
            array (
                'id' => 153,
                'event_id' => 56,
                'name' => 's',
                'image' => '/files/event_sponsers/1726662682event-management-logos-20.jpg',
                'created_at' => '2024-09-18 17:31:22',
                'updated_at' => '2024-09-18 17:31:22',
                'deleted_at' => NULL,
            ),
            51 => 
            array (
                'id' => 154,
                'event_id' => 56,
                'name' => 'ags',
                'image' => '/files/event_sponsers/1726662682evendor-s-event-management-logo-54C3C9BA20-seeklogo.com.png',
                'created_at' => '2024-09-18 17:31:22',
                'updated_at' => '2024-09-18 17:31:22',
                'deleted_at' => NULL,
            ),
            52 => 
            array (
                'id' => 155,
                'event_id' => 56,
                'name' => 'ag',
                'image' => '/files/event_sponsers/1726662682png-clipart-winnipeg-transit-logo-management-business-sponsorship-text-service-thumbnail-removebg-preview.png',
                'created_at' => '2024-09-18 17:31:22',
                'updated_at' => '2024-09-18 17:31:22',
                'deleted_at' => NULL,
            ),
            53 => 
            array (
                'id' => 156,
                'event_id' => 57,
                'name' => 'zxc',
                'image' => '/files/event_sponsers/1726662770event-management-logos-20.jpg',
                'created_at' => '2024-09-18 17:32:50',
                'updated_at' => '2024-09-18 17:32:50',
                'deleted_at' => NULL,
            ),
            54 => 
            array (
                'id' => 157,
                'event_id' => 57,
                'name' => 'adsfasf',
                'image' => '/files/event_sponsers/1726662770evendor-s-event-management-logo-54C3C9BA20-seeklogo.com.png',
                'created_at' => '2024-09-18 17:32:50',
                'updated_at' => '2024-09-18 17:32:50',
                'deleted_at' => NULL,
            ),
            55 => 
            array (
                'id' => 158,
                'event_id' => 57,
                'name' => 'asfasf',
                'image' => '/files/event_sponsers/1726662770png-clipart-winnipeg-transit-logo-management-business-sponsorship-text-service-thumbnail-removebg-preview.png',
                'created_at' => '2024-09-18 17:32:50',
                'updated_at' => '2024-09-18 17:32:50',
                'deleted_at' => NULL,
            ),
            56 => 
            array (
                'id' => 159,
                'event_id' => 58,
                'name' => 'fdssasd',
                'image' => '/files/event_sponsers/1726662919event-management-logos-20.jpg',
                'created_at' => '2024-09-18 17:35:19',
                'updated_at' => '2024-09-18 17:35:19',
                'deleted_at' => NULL,
            ),
            57 => 
            array (
                'id' => 160,
                'event_id' => 58,
                'name' => 'sdafsda',
                'image' => '/files/event_sponsers/1726662919evendor-s-event-management-logo-54C3C9BA20-seeklogo.com.png',
                'created_at' => '2024-09-18 17:35:19',
                'updated_at' => '2024-09-18 17:35:19',
                'deleted_at' => NULL,
            ),
            58 => 
            array (
                'id' => 161,
                'event_id' => 58,
                'name' => 'sdafasd',
                'image' => '/files/event_sponsers/1726662919png-clipart-winnipeg-transit-logo-management-business-sponsorship-text-service-thumbnail-removebg-preview.png',
                'created_at' => '2024-09-18 17:35:19',
                'updated_at' => '2024-09-18 17:35:19',
                'deleted_at' => NULL,
            ),
            59 => 
            array (
                'id' => 162,
                'event_id' => 59,
                'name' => 'asf',
                'image' => '/files/event_sponsers/1726663006event-management-logos-20.jpg',
                'created_at' => '2024-09-18 17:36:46',
                'updated_at' => '2024-09-18 17:36:46',
                'deleted_at' => NULL,
            ),
            60 => 
            array (
                'id' => 163,
                'event_id' => 59,
                'name' => 'saf',
                'image' => '/files/event_sponsers/1726663006evendor-s-event-management-logo-54C3C9BA20-seeklogo.com.png',
                'created_at' => '2024-09-18 17:36:46',
                'updated_at' => '2024-09-18 17:36:46',
                'deleted_at' => NULL,
            ),
            61 => 
            array (
                'id' => 164,
                'event_id' => 59,
                'name' => 'asf',
                'image' => '/files/event_sponsers/1726663006png-clipart-winnipeg-transit-logo-management-business-sponsorship-text-service-thumbnail-removebg-preview.png',
                'created_at' => '2024-09-18 17:36:46',
                'updated_at' => '2024-09-18 17:36:46',
                'deleted_at' => NULL,
            ),
            62 => 
            array (
                'id' => 165,
                'event_id' => 60,
                'name' => 'sa',
                'image' => '/files/event_sponsers/1726663111event-management-logos-20.jpg',
                'created_at' => '2024-09-18 17:38:31',
                'updated_at' => '2024-09-18 17:38:31',
                'deleted_at' => NULL,
            ),
            63 => 
            array (
                'id' => 166,
                'event_id' => 60,
                'name' => 'asfasf',
                'image' => '/files/event_sponsers/1726663111evendor-s-event-management-logo-54C3C9BA20-seeklogo.com.png',
                'created_at' => '2024-09-18 17:38:31',
                'updated_at' => '2024-09-18 17:38:31',
                'deleted_at' => NULL,
            ),
            64 => 
            array (
                'id' => 167,
                'event_id' => 60,
                'name' => 'asfas',
                'image' => '/files/event_sponsers/1726663111png-clipart-winnipeg-transit-logo-management-business-sponsorship-text-service-thumbnail-removebg-preview.png',
                'created_at' => '2024-09-18 17:38:31',
                'updated_at' => '2024-09-18 17:38:31',
                'deleted_at' => NULL,
            ),
            65 => 
            array (
                'id' => 168,
                'event_id' => 61,
                'name' => 'sa',
                'image' => '/files/event_sponsers/1726743459evendor-s-event-management-logo-54C3C9BA20-seeklogo.com.png',
                'created_at' => '2024-09-19 15:57:39',
                'updated_at' => '2024-09-19 15:57:39',
                'deleted_at' => NULL,
            ),
            66 => 
            array (
                'id' => 169,
                'event_id' => 61,
                'name' => 'saff',
                'image' => '/files/event_sponsers/1726743459event-management-logos-20.jpg',
                'created_at' => '2024-09-19 15:57:39',
                'updated_at' => '2024-09-19 15:57:39',
                'deleted_at' => NULL,
            ),
            67 => 
            array (
                'id' => 170,
                'event_id' => 61,
                'name' => 'fs',
                'image' => '/files/event_sponsers/1726743459png-clipart-winnipeg-transit-logo-management-business-sponsorship-text-service-thumbnail-removebg-preview.png',
                'created_at' => '2024-09-19 15:57:39',
                'updated_at' => '2024-09-19 15:57:39',
                'deleted_at' => NULL,
            ),
            68 => 
            array (
                'id' => 171,
                'event_id' => 62,
                'name' => 'legal',
                'image' => '/files/event_sponsers/1726743566evendor-s-event-management-logo-54C3C9BA20-seeklogo.com.png',
                'created_at' => '2024-09-19 15:59:26',
                'updated_at' => '2024-09-19 15:59:26',
                'deleted_at' => NULL,
            ),
            69 => 
            array (
                'id' => 172,
                'event_id' => 62,
                'name' => 'sadasd',
                'image' => '/files/event_sponsers/1726743566event-management-logos-20.jpg',
                'created_at' => '2024-09-19 15:59:26',
                'updated_at' => '2024-09-19 15:59:26',
                'deleted_at' => NULL,
            ),
            70 => 
            array (
                'id' => 173,
                'event_id' => 62,
                'name' => 'asf',
                'image' => '/files/event_sponsers/1726743566png-clipart-winnipeg-transit-logo-management-business-sponsorship-text-service-thumbnail-removebg-preview.png',
                'created_at' => '2024-09-19 15:59:26',
                'updated_at' => '2024-09-19 15:59:26',
                'deleted_at' => NULL,
            ),
            71 => 
            array (
                'id' => 174,
                'event_id' => 63,
                'name' => 'legal',
                'image' => '/files/event_sponsers/1726743671evendor-s-event-management-logo-54C3C9BA20-seeklogo.com.png',
                'created_at' => '2024-09-19 16:01:11',
                'updated_at' => '2024-09-19 16:01:11',
                'deleted_at' => NULL,
            ),
            72 => 
            array (
                'id' => 175,
                'event_id' => 63,
                'name' => 'asfasf',
                'image' => '/files/event_sponsers/1726743671event-management-logos-20.jpg',
                'created_at' => '2024-09-19 16:01:11',
                'updated_at' => '2024-09-19 16:01:11',
                'deleted_at' => NULL,
            ),
            73 => 
            array (
                'id' => 176,
                'event_id' => 63,
                'name' => 'logo',
                'image' => '/files/event_sponsers/1726743671png-clipart-winnipeg-transit-logo-management-business-sponsorship-text-service-thumbnail-removebg-preview.png',
                'created_at' => '2024-09-19 16:01:11',
                'updated_at' => '2024-09-19 16:01:11',
                'deleted_at' => NULL,
            ),
            74 => 
            array (
                'id' => 177,
                'event_id' => 64,
                'name' => 'legal',
                'image' => '/files/event_sponsers/1726743742event-management-logos-20.jpg',
                'created_at' => '2024-09-19 16:02:22',
                'updated_at' => '2024-09-20 17:37:22',
                'deleted_at' => '2024-09-20 17:37:22',
            ),
            75 => 
            array (
                'id' => 178,
                'event_id' => 64,
                'name' => 'gsd',
                'image' => '/files/event_sponsers/1726743742evendor-s-event-management-logo-54C3C9BA20-seeklogo.com.png',
                'created_at' => '2024-09-19 16:02:22',
                'updated_at' => '2024-09-20 17:37:22',
                'deleted_at' => '2024-09-20 17:37:22',
            ),
            76 => 
            array (
                'id' => 179,
                'event_id' => 64,
                'name' => 'asfasf',
                'image' => '/files/event_sponsers/1726743742png-clipart-winnipeg-transit-logo-management-business-sponsorship-text-service-thumbnail-removebg-preview.png',
                'created_at' => '2024-09-19 16:02:22',
                'updated_at' => '2024-09-20 17:37:22',
                'deleted_at' => '2024-09-20 17:37:22',
            ),
            77 => 
            array (
                'id' => 180,
                'event_id' => 65,
                'name' => 'legal',
                'image' => '/files/event_sponsers/1726744429evendor-s-event-management-logo-54C3C9BA20-seeklogo.com.png',
                'created_at' => '2024-09-19 16:13:49',
                'updated_at' => '2024-09-19 16:13:49',
                'deleted_at' => NULL,
            ),
            78 => 
            array (
                'id' => 181,
                'event_id' => 65,
                'name' => 'asdf',
                'image' => '/files/event_sponsers/1726744429event-management-logos-20.jpg',
                'created_at' => '2024-09-19 16:13:49',
                'updated_at' => '2024-09-19 16:13:49',
                'deleted_at' => NULL,
            ),
            79 => 
            array (
                'id' => 182,
                'event_id' => 65,
                'name' => 'asdf',
                'image' => '/files/event_sponsers/1726744429png-clipart-winnipeg-transit-logo-management-business-sponsorship-text-service-thumbnail-removebg-preview.png',
                'created_at' => '2024-09-19 16:13:49',
                'updated_at' => '2024-09-19 16:13:49',
                'deleted_at' => NULL,
            ),
            80 => 
            array (
                'id' => 183,
                'event_id' => 66,
                'name' => 'sad',
                'image' => '/files/event_sponsers/1726744540evendor-s-event-management-logo-54C3C9BA20-seeklogo.com.png',
                'created_at' => '2024-09-19 16:15:40',
                'updated_at' => '2024-09-19 16:15:40',
                'deleted_at' => NULL,
            ),
            81 => 
            array (
                'id' => 184,
                'event_id' => 66,
                'name' => 'asfasf',
                'image' => '/files/event_sponsers/1726744540event-management-logos-20.jpg',
                'created_at' => '2024-09-19 16:15:40',
                'updated_at' => '2024-09-19 16:15:40',
                'deleted_at' => NULL,
            ),
            82 => 
            array (
                'id' => 185,
                'event_id' => 66,
                'name' => 'asf',
                'image' => '/files/event_sponsers/1726744540png-clipart-winnipeg-transit-logo-management-business-sponsorship-text-service-thumbnail-removebg-preview.png',
                'created_at' => '2024-09-19 16:15:40',
                'updated_at' => '2024-09-19 16:15:40',
                'deleted_at' => NULL,
            ),
            83 => 
            array (
                'id' => 186,
                'event_id' => 67,
                'name' => 'fdsg',
                'image' => '/files/event_sponsers/1726744624evendor-s-event-management-logo-54C3C9BA20-seeklogo.com.png',
                'created_at' => '2024-09-19 16:17:04',
                'updated_at' => '2024-09-19 16:17:04',
                'deleted_at' => NULL,
            ),
            84 => 
            array (
                'id' => 187,
                'event_id' => 67,
                'name' => 'sadgsd',
                'image' => '/files/event_sponsers/1726744624event-management-logos-20.jpg',
                'created_at' => '2024-09-19 16:17:04',
                'updated_at' => '2024-09-19 16:17:04',
                'deleted_at' => NULL,
            ),
            85 => 
            array (
                'id' => 188,
                'event_id' => 67,
                'name' => 'gsdg',
                'image' => '/files/event_sponsers/1726744624png-clipart-winnipeg-transit-logo-management-business-sponsorship-text-service-thumbnail-removebg-preview.png',
                'created_at' => '2024-09-19 16:17:04',
                'updated_at' => '2024-09-19 16:17:04',
                'deleted_at' => NULL,
            ),
            86 => 
            array (
                'id' => 189,
                'event_id' => 68,
                'name' => 'sdf',
                'image' => '/files/event_sponsers/1726745699evendor-s-event-management-logo-54C3C9BA20-seeklogo.com.png',
                'created_at' => '2024-09-19 16:34:59',
                'updated_at' => '2024-09-19 16:34:59',
                'deleted_at' => NULL,
            ),
            87 => 
            array (
                'id' => 190,
                'event_id' => 68,
                'name' => 'afsdaf',
                'image' => '/files/event_sponsers/1726745699event-management-logos-20.jpg',
                'created_at' => '2024-09-19 16:34:59',
                'updated_at' => '2024-09-19 16:34:59',
                'deleted_at' => NULL,
            ),
            88 => 
            array (
                'id' => 191,
                'event_id' => 68,
                'name' => 'adfasd',
                'image' => '/files/event_sponsers/1726745699png-clipart-winnipeg-transit-logo-management-business-sponsorship-text-service-thumbnail-removebg-preview.png',
                'created_at' => '2024-09-19 16:34:59',
                'updated_at' => '2024-09-19 16:34:59',
                'deleted_at' => NULL,
            ),
            89 => 
            array (
                'id' => 192,
                'event_id' => 69,
                'name' => 'er',
                'image' => '/files/event_sponsers/1726745797evendor-s-event-management-logo-54C3C9BA20-seeklogo.com.png',
                'created_at' => '2024-09-19 16:36:37',
                'updated_at' => '2024-09-19 16:36:37',
                'deleted_at' => NULL,
            ),
            90 => 
            array (
                'id' => 193,
                'event_id' => 69,
                'name' => 'sdds',
                'image' => '/files/event_sponsers/1726745797event-management-logos-20.jpg',
                'created_at' => '2024-09-19 16:36:37',
                'updated_at' => '2024-09-19 16:36:37',
                'deleted_at' => NULL,
            ),
            91 => 
            array (
                'id' => 194,
                'event_id' => 69,
                'name' => 'sdsdds',
                'image' => '/files/event_sponsers/1726745797png-clipart-winnipeg-transit-logo-management-business-sponsorship-text-service-thumbnail-removebg-preview.png',
                'created_at' => '2024-09-19 16:36:37',
                'updated_at' => '2024-09-19 16:36:37',
                'deleted_at' => NULL,
            ),
            92 => 
            array (
                'id' => 195,
                'event_id' => 64,
                'name' => 'legal',
                'image' => '/files/event_sponsers/1726835842evendor-s-event-management-logo-54C3C9BA20-seeklogo.com.png',
                'created_at' => '2024-09-20 17:37:22',
                'updated_at' => '2024-09-20 17:37:22',
                'deleted_at' => NULL,
            ),
            93 => 
            array (
                'id' => 196,
                'event_id' => 64,
                'name' => 'gsd',
                'image' => '/files/event_sponsers/1726835842event-management-logos-20.jpg',
                'created_at' => '2024-09-20 17:37:22',
                'updated_at' => '2024-09-20 17:37:22',
                'deleted_at' => NULL,
            ),
            94 => 
            array (
                'id' => 197,
                'event_id' => 64,
                'name' => 'asfasf',
                'image' => '/files/event_sponsers/1726835842png-clipart-winnipeg-transit-logo-management-business-sponsorship-text-service-thumbnail-removebg-preview.png',
                'created_at' => '2024-09-20 17:37:22',
                'updated_at' => '2024-09-20 17:37:22',
                'deleted_at' => NULL,
            ),
            95 => 
            array (
                'id' => 198,
                'event_id' => 70,
                'name' => 'as',
                'image' => '/files/event_sponsers/1726837292evendor-s-event-management-logo-54C3C9BA20-seeklogo.com.png',
                'created_at' => '2024-09-20 18:01:32',
                'updated_at' => '2024-09-20 18:01:32',
                'deleted_at' => NULL,
            ),
            96 => 
            array (
                'id' => 199,
                'event_id' => 70,
                'name' => 'asdas',
                'image' => '/files/event_sponsers/1726837292event-management-logos-20.jpg',
                'created_at' => '2024-09-20 18:01:32',
                'updated_at' => '2024-09-20 18:01:32',
                'deleted_at' => NULL,
            ),
            97 => 
            array (
                'id' => 200,
                'event_id' => 70,
                'name' => 'asdsa',
                'image' => '/files/event_sponsers/1726837292png-clipart-winnipeg-transit-logo-management-business-sponsorship-text-service-thumbnail-removebg-preview.png',
                'created_at' => '2024-09-20 18:01:32',
                'updated_at' => '2024-09-20 18:01:32',
                'deleted_at' => NULL,
            ),
            98 => 
            array (
                'id' => 201,
                'event_id' => 71,
                'name' => 'logo',
                'image' => '/files/event_sponsers/1726837757evendor-s-event-management-logo-54C3C9BA20-seeklogo.com.png',
                'created_at' => '2024-09-20 18:09:17',
                'updated_at' => '2024-09-20 18:09:17',
                'deleted_at' => NULL,
            ),
            99 => 
            array (
                'id' => 202,
                'event_id' => 71,
                'name' => 'sada',
                'image' => '/files/event_sponsers/1726837757event-management-logos-20.jpg',
                'created_at' => '2024-09-20 18:09:17',
                'updated_at' => '2024-09-20 18:09:17',
                'deleted_at' => NULL,
            ),
        ));
        \DB::table('event_sponsers')->insert(array (
            0 => 
            array (
                'id' => 203,
                'event_id' => 71,
                'name' => 'asdasd',
                'image' => '/files/event_sponsers/1726837757png-clipart-winnipeg-transit-logo-management-business-sponsorship-text-service-thumbnail-removebg-preview.png',
                'created_at' => '2024-09-20 18:09:17',
                'updated_at' => '2024-09-20 18:09:17',
                'deleted_at' => NULL,
            ),
            1 => 
            array (
                'id' => 204,
                'event_id' => 72,
                'name' => 'werw',
                'image' => '/files/event_sponsers/1727160056evendor-s-event-management-logo-54C3C9BA20-seeklogo.com.png',
                'created_at' => '2024-09-24 11:40:56',
                'updated_at' => '2024-09-24 11:40:56',
                'deleted_at' => NULL,
            ),
            2 => 
            array (
                'id' => 205,
                'event_id' => 72,
                'name' => 'rwerwe',
                'image' => '/files/event_sponsers/1727160056event-management-logos-20.jpg',
                'created_at' => '2024-09-24 11:40:56',
                'updated_at' => '2024-09-24 11:40:56',
                'deleted_at' => NULL,
            ),
            3 => 
            array (
                'id' => 206,
                'event_id' => 72,
                'name' => 'rwerwer',
                'image' => '/files/event_sponsers/1727160056png-clipart-winnipeg-transit-logo-management-business-sponsorship-text-service-thumbnail-removebg-preview.png',
                'created_at' => '2024-09-24 11:40:56',
                'updated_at' => '2024-09-24 11:40:56',
                'deleted_at' => NULL,
            ),
            4 => 
            array (
                'id' => 207,
                'event_id' => 73,
                'name' => 'dsf',
                'image' => '/files/event_sponsers/1727160161event-management-logos-20.jpg',
                'created_at' => '2024-09-24 11:42:41',
                'updated_at' => '2024-09-24 11:42:41',
                'deleted_at' => NULL,
            ),
            5 => 
            array (
                'id' => 208,
                'event_id' => 73,
                'name' => 'sdfsdsdf',
                'image' => '/files/event_sponsers/1727160161evendor-s-event-management-logo-54C3C9BA20-seeklogo.com.png',
                'created_at' => '2024-09-24 11:42:41',
                'updated_at' => '2024-09-24 11:42:41',
                'deleted_at' => NULL,
            ),
            6 => 
            array (
                'id' => 209,
                'event_id' => 73,
                'name' => 'sdfsdfsd',
                'image' => '/files/event_sponsers/1727160161png-clipart-winnipeg-transit-logo-management-business-sponsorship-text-service-thumbnail-removebg-preview.png',
                'created_at' => '2024-09-24 11:42:41',
                'updated_at' => '2024-09-24 11:42:41',
                'deleted_at' => NULL,
            ),
            7 => 
            array (
                'id' => 210,
                'event_id' => 74,
                'name' => 'dafa',
                'image' => '/files/event_sponsers/1727160823evendor-s-event-management-logo-54C3C9BA20-seeklogo.com.png',
                'created_at' => '2024-09-24 11:53:43',
                'updated_at' => '2024-09-24 11:53:43',
                'deleted_at' => NULL,
            ),
            8 => 
            array (
                'id' => 211,
                'event_id' => 74,
                'name' => 'sasfas',
                'image' => '/files/event_sponsers/1727160823event-management-logos-20.jpg',
                'created_at' => '2024-09-24 11:53:43',
                'updated_at' => '2024-09-24 11:53:43',
                'deleted_at' => NULL,
            ),
            9 => 
            array (
                'id' => 212,
                'event_id' => 74,
                'name' => 'fasfafs',
                'image' => '/files/event_sponsers/1727160823png-clipart-winnipeg-transit-logo-management-business-sponsorship-text-service-thumbnail-removebg-preview.png',
                'created_at' => '2024-09-24 11:53:43',
                'updated_at' => '2024-09-24 11:53:43',
                'deleted_at' => NULL,
            ),
            10 => 
            array (
                'id' => 213,
                'event_id' => 75,
                'name' => 'asa',
                'image' => '/files/event_sponsers/1727160918evendor-s-event-management-logo-54C3C9BA20-seeklogo.com.png',
                'created_at' => '2024-09-24 11:55:18',
                'updated_at' => '2024-09-24 11:55:18',
                'deleted_at' => NULL,
            ),
            11 => 
            array (
                'id' => 214,
                'event_id' => 75,
                'name' => 'ssdafas',
                'image' => '/files/event_sponsers/1727160918event-management-logos-20.jpg',
                'created_at' => '2024-09-24 11:55:18',
                'updated_at' => '2024-09-24 11:55:18',
                'deleted_at' => NULL,
            ),
            12 => 
            array (
                'id' => 215,
                'event_id' => 75,
                'name' => 'fasf',
                'image' => '/files/event_sponsers/1727160918png-clipart-winnipeg-transit-logo-management-business-sponsorship-text-service-thumbnail-removebg-preview.png',
                'created_at' => '2024-09-24 11:55:18',
                'updated_at' => '2024-09-24 11:55:18',
                'deleted_at' => NULL,
            ),
            13 => 
            array (
                'id' => 216,
                'event_id' => 76,
                'name' => 'sadas',
                'image' => '/files/event_sponsers/1727160985evendor-s-event-management-logo-54C3C9BA20-seeklogo.com.png',
                'created_at' => '2024-09-24 11:56:25',
                'updated_at' => '2024-09-24 11:56:25',
                'deleted_at' => NULL,
            ),
            14 => 
            array (
                'id' => 217,
                'event_id' => 76,
                'name' => 'fas',
                'image' => '/files/event_sponsers/1727160985event-management-logos-20.jpg',
                'created_at' => '2024-09-24 11:56:25',
                'updated_at' => '2024-09-24 11:56:25',
                'deleted_at' => NULL,
            ),
            15 => 
            array (
                'id' => 218,
                'event_id' => 76,
                'name' => 'fasfasf',
                'image' => '/files/event_sponsers/1727160985png-clipart-winnipeg-transit-logo-management-business-sponsorship-text-service-thumbnail-removebg-preview.png',
                'created_at' => '2024-09-24 11:56:25',
                'updated_at' => '2024-09-24 11:56:25',
                'deleted_at' => NULL,
            ),
            16 => 
            array (
                'id' => 219,
                'event_id' => 77,
                'name' => 'safasf',
                'image' => '/files/event_sponsers/1727161698event-management-logos-20.jpg',
                'created_at' => '2024-09-24 12:08:18',
                'updated_at' => '2024-09-24 12:08:18',
                'deleted_at' => NULL,
            ),
            17 => 
            array (
                'id' => 220,
                'event_id' => 77,
                'name' => 'aasfas',
                'image' => '/files/event_sponsers/1727161698evendor-s-event-management-logo-54C3C9BA20-seeklogo.com.png',
                'created_at' => '2024-09-24 12:08:18',
                'updated_at' => '2024-09-24 12:08:18',
                'deleted_at' => NULL,
            ),
            18 => 
            array (
                'id' => 221,
                'event_id' => 77,
                'name' => 'fasfas',
                'image' => '/files/event_sponsers/1727161698png-clipart-winnipeg-transit-logo-management-business-sponsorship-text-service-thumbnail-removebg-preview.png',
                'created_at' => '2024-09-24 12:08:18',
                'updated_at' => '2024-09-24 12:08:18',
                'deleted_at' => NULL,
            ),
            19 => 
            array (
                'id' => 222,
                'event_id' => 78,
                'name' => 'asdas',
                'image' => '/files/event_sponsers/1727161861event-management-logos-20.jpg',
                'created_at' => '2024-09-24 12:11:01',
                'updated_at' => '2024-09-24 12:11:01',
                'deleted_at' => NULL,
            ),
            20 => 
            array (
                'id' => 223,
                'event_id' => 78,
                'name' => 'afsfas',
                'image' => '/files/event_sponsers/1727161861evendor-s-event-management-logo-54C3C9BA20-seeklogo.com.png',
                'created_at' => '2024-09-24 12:11:01',
                'updated_at' => '2024-09-24 12:11:01',
                'deleted_at' => NULL,
            ),
            21 => 
            array (
                'id' => 224,
                'event_id' => 78,
                'name' => 'fasfasf',
                'image' => '/files/event_sponsers/1727161861png-clipart-winnipeg-transit-logo-management-business-sponsorship-text-service-thumbnail-removebg-preview.png',
                'created_at' => '2024-09-24 12:11:01',
                'updated_at' => '2024-09-24 12:11:01',
                'deleted_at' => NULL,
            ),
            22 => 
            array (
                'id' => 227,
                'event_id' => 80,
                'name' => 'sdgsdgs',
                'image' => '/files/event_sponsers/1727162041evendor-s-event-management-logo-54C3C9BA20-seeklogo.com.png',
                'created_at' => '2024-09-24 12:14:01',
                'updated_at' => '2024-09-24 12:14:01',
                'deleted_at' => NULL,
            ),
            23 => 
            array (
                'id' => 228,
                'event_id' => 80,
                'name' => 'dgsdgs',
                'image' => '/files/event_sponsers/1727162041event-management-logos-20.jpg',
                'created_at' => '2024-09-24 12:14:01',
                'updated_at' => '2024-09-24 12:14:01',
                'deleted_at' => NULL,
            ),
            24 => 
            array (
                'id' => 229,
                'event_id' => 80,
                'name' => 'dgsdgsdg',
                'image' => '/files/event_sponsers/1727162041png-clipart-winnipeg-transit-logo-management-business-sponsorship-text-service-thumbnail-removebg-preview.png',
                'created_at' => '2024-09-24 12:14:01',
                'updated_at' => '2024-09-24 12:14:01',
                'deleted_at' => NULL,
            ),
            25 => 
            array (
                'id' => 230,
                'event_id' => 6,
                'name' => 'logo',
                'image' => '/files/event_sponsers/1725281931event-management-logos-20.jpg',
                'created_at' => '2024-09-24 16:39:27',
                'updated_at' => '2024-09-24 16:40:44',
                'deleted_at' => '2024-09-24 16:40:44',
            ),
            26 => 
            array (
                'id' => 231,
                'event_id' => 6,
                'name' => 'fsdfsdf',
                'image' => NULL,
                'created_at' => '2024-09-24 16:39:27',
                'updated_at' => '2024-09-24 16:40:44',
                'deleted_at' => '2024-09-24 16:40:44',
            ),
            27 => 
            array (
                'id' => 232,
                'event_id' => 6,
                'name' => 'sdfsdfs',
                'image' => NULL,
                'created_at' => '2024-09-24 16:39:27',
                'updated_at' => '2024-09-24 16:40:44',
                'deleted_at' => '2024-09-24 16:40:44',
            ),
            28 => 
            array (
                'id' => 233,
                'event_id' => 6,
                'name' => 'logo',
                'image' => '/files/event_sponsers/1727178044event-management-logos-20.jpg',
                'created_at' => '2024-09-24 16:40:44',
                'updated_at' => '2024-09-24 16:40:44',
                'deleted_at' => NULL,
            ),
            29 => 
            array (
                'id' => 234,
                'event_id' => 6,
                'name' => 'fsdfsdf',
                'image' => '/files/event_sponsers/1727178044evendor-s-event-management-logo-54C3C9BA20-seeklogo.com.png',
                'created_at' => '2024-09-24 16:40:44',
                'updated_at' => '2024-09-24 16:40:44',
                'deleted_at' => NULL,
            ),
            30 => 
            array (
                'id' => 235,
                'event_id' => 6,
                'name' => 'sdfsdfs',
                'image' => '/files/event_sponsers/1727178044png-clipart-winnipeg-transit-logo-management-business-sponsorship-text-service-thumbnail-removebg-preview.png',
                'created_at' => '2024-09-24 16:40:44',
                'updated_at' => '2024-09-24 16:40:44',
                'deleted_at' => NULL,
            ),
            31 => 
            array (
                'id' => 236,
                'event_id' => 10,
                'name' => 'logo',
                'image' => '/files/event_sponsers/1727178072evendor-s-event-management-logo-54C3C9BA20-seeklogo.com.png',
                'created_at' => '2024-09-24 16:41:12',
                'updated_at' => '2024-09-24 16:41:12',
                'deleted_at' => NULL,
            ),
            32 => 
            array (
                'id' => 237,
                'event_id' => 10,
                'name' => 'uniliver',
                'image' => '/files/event_sponsers/1727178072event-management-logos-20.jpg',
                'created_at' => '2024-09-24 16:41:12',
                'updated_at' => '2024-09-24 16:41:12',
                'deleted_at' => NULL,
            ),
            33 => 
            array (
                'id' => 238,
                'event_id' => 10,
                'name' => 'logo',
                'image' => '/files/event_sponsers/1727178072png-clipart-winnipeg-transit-logo-management-business-sponsorship-text-service-thumbnail-removebg-preview.png',
                'created_at' => '2024-09-24 16:41:12',
                'updated_at' => '2024-09-24 16:41:12',
                'deleted_at' => NULL,
            ),
            34 => 
            array (
                'id' => 239,
                'event_id' => 5,
                'name' => 'legal',
                'image' => '/files/event_sponsers/1727178099evendor-s-event-management-logo-54C3C9BA20-seeklogo.com.png',
                'created_at' => '2024-09-24 16:41:39',
                'updated_at' => '2024-09-24 16:41:39',
                'deleted_at' => NULL,
            ),
            35 => 
            array (
                'id' => 240,
                'event_id' => 5,
                'name' => 'sdfsd',
                'image' => '/files/event_sponsers/1727178099event-management-logos-20.jpg',
                'created_at' => '2024-09-24 16:41:39',
                'updated_at' => '2024-09-24 16:41:39',
                'deleted_at' => NULL,
            ),
            36 => 
            array (
                'id' => 241,
                'event_id' => 5,
                'name' => 'sdfsdfsd',
                'image' => '/files/event_sponsers/1727178099png-clipart-winnipeg-transit-logo-management-business-sponsorship-text-service-thumbnail-removebg-preview.png',
                'created_at' => '2024-09-24 16:41:39',
                'updated_at' => '2024-09-24 16:41:39',
                'deleted_at' => NULL,
            ),
            37 => 
            array (
                'id' => 242,
                'event_id' => 18,
                'name' => 'legal',
                'image' => '/files/event_sponsers/1726657899event-management-logos-20.jpg',
                'created_at' => '2024-09-24 17:22:18',
                'updated_at' => '2024-09-24 17:22:18',
                'deleted_at' => NULL,
            ),
            38 => 
            array (
                'id' => 243,
                'event_id' => 18,
                'name' => 'uniliver',
                'image' => '/files/event_sponsers/1726657899evendor-s-event-management-logo-54C3C9BA20-seeklogo.com.png',
                'created_at' => '2024-09-24 17:22:18',
                'updated_at' => '2024-09-24 17:22:18',
                'deleted_at' => NULL,
            ),
            39 => 
            array (
                'id' => 244,
                'event_id' => 18,
                'name' => 'logo',
                'image' => '/files/event_sponsers/1726657899png-clipart-winnipeg-transit-logo-management-business-sponsorship-text-service-thumbnail-removebg-preview.png',
                'created_at' => '2024-09-24 17:22:18',
                'updated_at' => '2024-09-24 17:22:18',
                'deleted_at' => NULL,
            ),
            40 => 
            array (
                'id' => 245,
                'event_id' => 17,
                'name' => 'BankAlfla',
                'image' => '/files/event_sponsers/1726657787evendor-s-event-management-logo-54C3C9BA20-seeklogo.com.png',
                'created_at' => '2024-09-24 17:22:36',
                'updated_at' => '2024-09-24 17:22:36',
                'deleted_at' => NULL,
            ),
            41 => 
            array (
                'id' => 246,
                'event_id' => 17,
                'name' => 'uniliver',
                'image' => '/files/event_sponsers/1726657787event-management-logos-20.jpg',
                'created_at' => '2024-09-24 17:22:36',
                'updated_at' => '2024-09-24 17:22:36',
                'deleted_at' => NULL,
            ),
            42 => 
            array (
                'id' => 247,
                'event_id' => 17,
                'name' => 'logo',
                'image' => '/files/event_sponsers/1726657787png-clipart-winnipeg-transit-logo-management-business-sponsorship-text-service-thumbnail-removebg-preview.png',
                'created_at' => '2024-09-24 17:22:36',
                'updated_at' => '2024-09-24 17:22:36',
                'deleted_at' => NULL,
            ),
            43 => 
            array (
                'id' => 248,
                'event_id' => 15,
                'name' => 'legal',
                'image' => '/files/event_sponsers/1726657603evendor-s-event-management-logo-54C3C9BA20-seeklogo.com.png',
                'created_at' => '2024-09-24 17:22:46',
                'updated_at' => '2024-09-24 17:22:46',
                'deleted_at' => NULL,
            ),
            44 => 
            array (
                'id' => 249,
                'event_id' => 15,
                'name' => 'uniliver',
                'image' => '/files/event_sponsers/1726657603png-clipart-winnipeg-transit-logo-management-business-sponsorship-text-service-thumbnail-removebg-preview.png',
                'created_at' => '2024-09-24 17:22:46',
                'updated_at' => '2024-09-24 17:22:46',
                'deleted_at' => NULL,
            ),
            45 => 
            array (
                'id' => 250,
                'event_id' => 15,
                'name' => 'logo',
                'image' => '/files/event_sponsers/1726657603event-management-logos-20.jpg',
                'created_at' => '2024-09-24 17:22:46',
                'updated_at' => '2024-09-24 17:22:46',
                'deleted_at' => NULL,
            ),
            46 => 
            array (
                'id' => 251,
                'event_id' => 11,
                'name' => 'legal',
                'image' => '/files/event_sponsers/1726657086evendor-s-event-management-logo-54C3C9BA20-seeklogo.com.png',
                'created_at' => '2024-09-24 17:25:36',
                'updated_at' => '2024-09-24 17:25:36',
                'deleted_at' => NULL,
            ),
            47 => 
            array (
                'id' => 252,
                'event_id' => 11,
                'name' => 'uniliver',
                'image' => '/files/event_sponsers/1726657086event-management-logos-20.jpg',
                'created_at' => '2024-09-24 17:25:36',
                'updated_at' => '2024-09-24 17:25:36',
                'deleted_at' => NULL,
            ),
            48 => 
            array (
                'id' => 253,
                'event_id' => 11,
                'name' => 'logo',
                'image' => '/files/event_sponsers/1726657086png-clipart-winnipeg-transit-logo-management-business-sponsorship-text-service-thumbnail-removebg-preview.png',
                'created_at' => '2024-09-24 17:25:36',
                'updated_at' => '2024-09-24 17:25:36',
                'deleted_at' => NULL,
            ),
            49 => 
            array (
                'id' => 254,
                'event_id' => 8,
                'name' => 'legal',
                'image' => '/files/event_sponsers/1725281984event-management-logos-20.jpg',
                'created_at' => '2024-09-24 17:25:44',
                'updated_at' => '2024-09-24 17:25:44',
                'deleted_at' => NULL,
            ),
            50 => 
            array (
                'id' => 255,
                'event_id' => 7,
                'name' => 'logo',
                'image' => '/files/event_sponsers/1725281966event-management-logos-20.jpg',
                'created_at' => '2024-09-24 17:25:52',
                'updated_at' => '2024-09-24 17:25:52',
                'deleted_at' => NULL,
            ),
            51 => 
            array (
                'id' => 256,
                'event_id' => 81,
                'name' => 'dgsdf',
                'image' => NULL,
                'created_at' => '2024-09-26 12:33:40',
                'updated_at' => '2024-09-26 12:33:40',
                'deleted_at' => NULL,
            ),
        ));
        
        
    }
}