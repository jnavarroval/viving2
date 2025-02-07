<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;

class WalletsTableSeeder extends Seeder
{

    /**
     * Auto generated seed file
     *
     * @return void
     */
    public function run()
    {
        

        \DB::table('wallets')->delete();
        
        \DB::table('wallets')->insert(array (
            0 => 
            array (
                'id' => 1,
                'holder_type' => 'App\\Models\\User',
                'holder_id' => 3,
                'name' => 'Default Wallet',
                'slug' => 'default',
                'uuid' => '19a31063-37cc-4ace-975a-d3ea44c99e13',
                'description' => NULL,
                'meta' => '[]',
                'balance' => '130',
                'decimal_places' => 2,
                'created_at' => '2024-09-03 15:51:30',
                'updated_at' => '2024-10-07 18:16:35',
            ),
            1 => 
            array (
                'id' => 2,
                'holder_type' => 'App\\Models\\User',
                'holder_id' => 113,
                'name' => 'Default Wallet',
                'slug' => 'default',
                'uuid' => '58508ba5-dfab-4c4a-a6c3-f5bc6a238eda',
                'description' => NULL,
                'meta' => '[]',
                'balance' => '20',
                'decimal_places' => 2,
                'created_at' => '2024-09-03 18:37:33',
                'updated_at' => '2024-10-01 18:03:09',
            ),
            2 => 
            array (
                'id' => 3,
                'holder_type' => 'App\\Models\\User',
                'holder_id' => 145,
                'name' => 'Default Wallet',
                'slug' => 'default',
                'uuid' => '88f858f6-be0a-493f-bb9d-e63303be8205',
                'description' => NULL,
                'meta' => '[]',
                'balance' => '0',
                'decimal_places' => 2,
                'created_at' => '2024-09-16 15:24:27',
                'updated_at' => '2024-09-16 15:24:27',
            ),
            3 => 
            array (
                'id' => 4,
                'holder_type' => 'App\\Models\\User',
                'holder_id' => 157,
                'name' => 'Default Wallet',
                'slug' => 'default',
                'uuid' => 'adfc2f29-1853-444e-9108-1bf6b8d5f553',
                'description' => NULL,
                'meta' => '[]',
                'balance' => '0',
                'decimal_places' => 2,
                'created_at' => '2024-09-26 11:43:11',
                'updated_at' => '2024-09-26 11:43:11',
            ),
            4 => 
            array (
                'id' => 5,
                'holder_type' => 'App\\Models\\User',
                'holder_id' => 120,
                'name' => 'Default Wallet',
                'slug' => 'default',
                'uuid' => 'ea38b8fc-b05b-474c-b09d-f2fd1746eafe',
                'description' => NULL,
                'meta' => '[]',
                'balance' => '3561',
                'decimal_places' => 2,
                'created_at' => '2024-09-26 14:40:01',
                'updated_at' => '2024-10-05 21:53:28',
            ),
            5 => 
            array (
                'id' => 6,
                'holder_type' => 'App\\Models\\User',
                'holder_id' => 125,
                'name' => 'Default Wallet',
                'slug' => 'default',
                'uuid' => '1e22b303-2055-418f-ac6b-41be1d8ff18f',
                'description' => NULL,
                'meta' => '[]',
                'balance' => '32',
                'decimal_places' => 2,
                'created_at' => '2024-09-26 18:43:12',
                'updated_at' => '2024-09-26 18:43:12',
            ),
            6 => 
            array (
                'id' => 7,
                'holder_type' => 'App\\Models\\User',
                'holder_id' => 127,
                'name' => 'Default Wallet',
                'slug' => 'default',
                'uuid' => '6022eaf2-585d-43ec-a0fe-6ce11f927772',
                'description' => NULL,
                'meta' => '[]',
                'balance' => '234',
                'decimal_places' => 2,
                'created_at' => '2024-09-26 18:54:24',
                'updated_at' => '2024-09-26 18:54:24',
            ),
            7 => 
            array (
                'id' => 8,
                'holder_type' => 'App\\Models\\User',
                'holder_id' => 161,
                'name' => 'Default Wallet',
                'slug' => 'default',
                'uuid' => '4ac7c253-4a8a-4dcc-a4c3-d5148687ae7f',
                'description' => NULL,
                'meta' => '[]',
                'balance' => '10',
                'decimal_places' => 2,
                'created_at' => '2024-09-27 15:07:35',
                'updated_at' => '2024-10-03 15:22:24',
            ),
            8 => 
            array (
                'id' => 9,
                'holder_type' => 'App\\Models\\User',
                'holder_id' => 160,
                'name' => 'Default Wallet',
                'slug' => 'default',
                'uuid' => '3adbc319-ad81-430a-be48-47b28032bed6',
                'description' => NULL,
                'meta' => '[]',
                'balance' => '120',
                'decimal_places' => 2,
                'created_at' => '2024-09-27 15:43:46',
                'updated_at' => '2024-09-27 19:08:34',
            ),
            9 => 
            array (
                'id' => 10,
                'holder_type' => 'App\\Models\\User',
                'holder_id' => 163,
                'name' => 'Default Wallet',
                'slug' => 'default',
                'uuid' => '21f8149b-540e-423a-8cb4-f8b3cf6bc4f1',
                'description' => NULL,
                'meta' => '[]',
                'balance' => '0',
                'decimal_places' => 2,
                'created_at' => '2024-10-01 15:04:54',
                'updated_at' => '2024-10-01 15:04:54',
            ),
            10 => 
            array (
                'id' => 11,
                'holder_type' => 'App\\Models\\User',
                'holder_id' => 112,
                'name' => 'Default Wallet',
                'slug' => 'default',
                'uuid' => 'e742b8d8-9ec4-4569-972e-c25994bd7ac7',
                'description' => NULL,
                'meta' => '[]',
                'balance' => '0',
                'decimal_places' => 2,
                'created_at' => '2024-10-02 17:39:26',
                'updated_at' => '2024-10-02 17:39:26',
            ),
            11 => 
            array (
                'id' => 12,
                'holder_type' => 'App\\Models\\User',
                'holder_id' => 165,
                'name' => 'Default Wallet',
                'slug' => 'default',
                'uuid' => '8b048065-b852-4a94-8616-822f1fb80952',
                'description' => NULL,
                'meta' => '[]',
                'balance' => '50',
                'decimal_places' => 2,
                'created_at' => '2024-10-03 18:03:04',
                'updated_at' => '2024-10-03 18:10:08',
            ),
            12 => 
            array (
                'id' => 13,
                'holder_type' => 'App\\Models\\User',
                'holder_id' => 167,
                'name' => 'Default Wallet',
                'slug' => 'default',
                'uuid' => 'b0a4ba56-0f3d-445e-b208-50c906590e7b',
                'description' => NULL,
                'meta' => '[]',
                'balance' => '3424',
                'decimal_places' => 2,
                'created_at' => '2024-10-05 21:02:50',
                'updated_at' => '2024-10-05 21:09:16',
            ),
            13 => 
            array (
                'id' => 14,
                'holder_type' => 'App\\Models\\User',
                'holder_id' => 168,
                'name' => 'Default Wallet',
                'slug' => 'default',
                'uuid' => 'c23c4f30-f60f-4f20-bb2e-b44447ac43dc',
                'description' => NULL,
                'meta' => '[]',
                'balance' => '20',
                'decimal_places' => 2,
                'created_at' => '2024-10-07 12:12:25',
                'updated_at' => '2024-10-07 12:18:29',
            ),
            14 => 
            array (
                'id' => 15,
                'holder_type' => 'App\\Models\\User',
                'holder_id' => 169,
                'name' => 'Default Wallet',
                'slug' => 'default',
                'uuid' => '49cd7e3a-6e6e-4a73-979c-784ef7ce29cb',
                'description' => NULL,
                'meta' => '[]',
                'balance' => '0',
                'decimal_places' => 2,
                'created_at' => '2024-10-07 13:01:05',
                'updated_at' => '2024-10-07 13:01:05',
            ),
            15 => 
            array (
                'id' => 16,
                'holder_type' => 'App\\Models\\User',
                'holder_id' => 172,
                'name' => 'Default Wallet',
                'slug' => 'default',
                'uuid' => '7c5345c8-70b0-42eb-be27-ca61c9720b7f',
                'description' => NULL,
                'meta' => '[]',
                'balance' => '0',
                'decimal_places' => 2,
                'created_at' => '2024-10-07 17:57:00',
                'updated_at' => '2024-10-07 17:57:00',
            ),
        ));
        
        
    }
}