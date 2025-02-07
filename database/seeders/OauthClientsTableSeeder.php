<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;

class OauthClientsTableSeeder extends Seeder
{

    /**
     * Auto generated seed file
     *
     * @return void
     */
    public function run()
    {
        

        \DB::table('oauth_clients')->delete();
        
        \DB::table('oauth_clients')->insert(array (
            0 => 
            array (
                'id' => 1,
                'user_id' => NULL,
                'name' => 'Global Healing Network Personal Access Client',
                'secret' => 'g4d2I88QogIAoKrck1vobzPopUDEnEXawy82vuBj',
                'provider' => NULL,
                'redirect' => 'http://localhost',
                'personal_access_client' => 1,
                'password_client' => 0,
                'revoked' => 0,
                'created_at' => '2023-03-27 17:51:11',
                'updated_at' => '2023-03-27 17:51:11',
            ),
            1 => 
            array (
                'id' => 2,
                'user_id' => NULL,
                'name' => 'Global Healing Network Password Grant Client',
                'secret' => 'e52LYY9p3PWHNhemnHcivx5Y1Nfo27EzdZlZyAcj',
                'provider' => 'users',
                'redirect' => 'http://localhost',
                'personal_access_client' => 0,
                'password_client' => 1,
                'revoked' => 0,
                'created_at' => '2023-03-27 17:51:11',
                'updated_at' => '2023-03-27 17:51:11',
            ),
            2 => 
            array (
                'id' => 3,
                'user_id' => NULL,
                'name' => 'Doctor Consultation Personal Access Client',
                'secret' => 'PzbRsLXDA4PWiA5Qd5pw2kNorrunJJjUntw1so8E',
                'provider' => NULL,
                'redirect' => 'http://localhost',
                'personal_access_client' => 1,
                'password_client' => 0,
                'revoked' => 0,
                'created_at' => '2023-04-29 15:55:56',
                'updated_at' => '2023-04-29 15:55:56',
            ),
            3 => 
            array (
                'id' => 4,
                'user_id' => NULL,
                'name' => 'Doctor Consultation Password Grant Client',
                'secret' => 'VJUvJ5W6Ib3Wdgvotko66hukb75h10SsFD8IGQEJ',
                'provider' => 'users',
                'redirect' => 'http://localhost',
                'personal_access_client' => 0,
                'password_client' => 1,
                'revoked' => 0,
                'created_at' => '2023-04-29 15:55:56',
                'updated_at' => '2023-04-29 15:55:56',
            ),
            4 => 
            array (
                'id' => 5,
                'user_id' => NULL,
                'name' => 'Health Consultant Personal Access Client',
                'secret' => 'HKuMmLLzYparbfErbsksyEJCFqWv7vtYtAhQA41T',
                'provider' => NULL,
                'redirect' => 'http://localhost',
                'personal_access_client' => 1,
                'password_client' => 0,
                'revoked' => 0,
                'created_at' => '2024-07-11 18:27:41',
                'updated_at' => '2024-07-11 18:27:41',
            ),
            5 => 
            array (
                'id' => 6,
                'user_id' => NULL,
                'name' => 'Health Consultant Password Grant Client',
                'secret' => 'XmFfHjdIbs3296Fb6c9NmY6nBqAyPsfpxOwtg5YV',
                'provider' => 'users',
                'redirect' => 'http://localhost',
                'personal_access_client' => 0,
                'password_client' => 1,
                'revoked' => 0,
                'created_at' => '2024-07-11 18:27:41',
                'updated_at' => '2024-07-11 18:27:41',
            ),
        ));
        
        
    }
}