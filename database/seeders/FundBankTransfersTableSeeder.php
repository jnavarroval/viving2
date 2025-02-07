<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;

class FundBankTransfersTableSeeder extends Seeder
{

    /**
     * Auto generated seed file
     *
     * @return void
     */
    public function run()
    {
        

        \DB::table('fund_bank_transfers')->delete();
        
        \DB::table('fund_bank_transfers')->insert(array (
            0 => 
            array (
                'id' => 1,
                'bank_account_id' => 1,
                'fund_id' => NULL,
                'date' => NULL,
                'attachment' => NULL,
                'is_fund' => 0,
                'created_at' => '2024-05-11 09:56:59',
                'updated_at' => '2024-05-11 09:56:59',
                'deleted_at' => NULL,
            ),
            1 => 
            array (
                'id' => 2,
                'bank_account_id' => 1,
                'fund_id' => 237,
                'date' => NULL,
                'attachment' => NULL,
                'is_fund' => 0,
                'created_at' => '2024-05-11 10:05:20',
                'updated_at' => '2024-05-11 10:05:20',
                'deleted_at' => NULL,
            ),
            2 => 
            array (
                'id' => 3,
                'bank_account_id' => 3,
                'fund_id' => 237,
                'date' => NULL,
                'attachment' => NULL,
                'is_fund' => 0,
                'created_at' => '2024-05-11 10:06:09',
                'updated_at' => '2024-05-11 10:06:09',
                'deleted_at' => NULL,
            ),
            3 => 
            array (
                'id' => 4,
                'bank_account_id' => 3,
                'fund_id' => 237,
                'date' => NULL,
                'attachment' => '/private/var/folders/ck/2t30ht_s2374bknm0d14v3vr0000gn/T/phpfTqexs',
                'is_fund' => 0,
                'created_at' => '2024-05-11 10:09:24',
                'updated_at' => '2024-05-11 10:09:24',
                'deleted_at' => NULL,
            ),
            4 => 
            array (
                'id' => 5,
                'bank_account_id' => 3,
                'fund_id' => 237,
                'date' => '2024-05-11 10:10:38',
                'attachment' => '/private/var/folders/ck/2t30ht_s2374bknm0d14v3vr0000gn/T/phpUjhqfa',
                'is_fund' => 0,
                'created_at' => '2024-05-11 10:10:38',
                'updated_at' => '2024-05-11 10:10:38',
                'deleted_at' => NULL,
            ),
            5 => 
            array (
                'id' => 6,
                'bank_account_id' => 3,
                'fund_id' => 301,
                'date' => NULL,
            'attachment' => '/files/bank_transactions/1718272430footer (1).png',
                'is_fund' => 0,
                'created_at' => '2024-06-13 09:53:50',
                'updated_at' => '2024-06-13 09:53:50',
                'deleted_at' => NULL,
            ),
            6 => 
            array (
                'id' => 7,
                'bank_account_id' => 3,
                'fund_id' => 302,
                'date' => NULL,
                'attachment' => '/files/bank_transactions/1718279236ray-so-export.png',
                'is_fund' => 0,
                'created_at' => '2024-06-13 11:47:16',
                'updated_at' => '2024-06-13 11:47:16',
                'deleted_at' => NULL,
            ),
            7 => 
            array (
                'id' => 8,
                'bank_account_id' => 1,
                'fund_id' => 310,
                'date' => NULL,
            'attachment' => '/files/bank_transactions/1720423343tutorhub (1).png',
                'is_fund' => 0,
                'created_at' => '2024-07-08 07:22:23',
                'updated_at' => '2024-07-08 07:22:23',
                'deleted_at' => NULL,
            ),
            8 => 
            array (
                'id' => 9,
                'bank_account_id' => 3,
                'fund_id' => 311,
                'date' => NULL,
            'attachment' => '/files/bank_transactions/1720423426footer (1).png',
                'is_fund' => 0,
                'created_at' => '2024-07-08 07:23:46',
                'updated_at' => '2024-07-08 07:23:46',
                'deleted_at' => NULL,
            ),
            9 => 
            array (
                'id' => 10,
                'bank_account_id' => 1,
                'fund_id' => 4,
                'date' => NULL,
                'attachment' => '/files/bank_transactions/1722493587john-doe-md-san-francisco-ca.jpg',
                'is_fund' => 0,
                'created_at' => '2024-08-01 06:26:27',
                'updated_at' => '2024-08-01 06:26:27',
                'deleted_at' => NULL,
            ),
            10 => 
            array (
                'id' => 11,
                'bank_account_id' => 1,
                'fund_id' => 3,
                'date' => NULL,
                'attachment' => '/files/bank_transactions/172499916836800.jpg',
                'is_fund' => 0,
                'created_at' => '2024-08-30 11:26:08',
                'updated_at' => '2024-08-30 11:26:08',
                'deleted_at' => NULL,
            ),
            11 => 
            array (
                'id' => 12,
                'bank_account_id' => 1,
                'fund_id' => 8,
                'date' => NULL,
            'attachment' => '/files/bank_transactions/1726214438Simulator Screenshot - iPad Air (5th generation) - 2024-09-11 at 14.11.55.png',
                'is_fund' => 0,
                'created_at' => '2024-09-13 13:00:38',
                'updated_at' => '2024-09-13 13:00:38',
                'deleted_at' => NULL,
            ),
            12 => 
            array (
                'id' => 13,
                'bank_account_id' => 3,
                'fund_id' => 9,
                'date' => NULL,
                'attachment' => NULL,
                'is_fund' => 0,
                'created_at' => '2024-09-13 13:04:43',
                'updated_at' => '2024-09-13 13:04:43',
                'deleted_at' => NULL,
            ),
            13 => 
            array (
                'id' => 14,
                'bank_account_id' => 3,
                'fund_id' => 26,
                'date' => NULL,
                'attachment' => NULL,
                'is_fund' => 0,
                'created_at' => '2024-09-23 16:13:31',
                'updated_at' => '2024-09-23 16:13:31',
                'deleted_at' => NULL,
            ),
            14 => 
            array (
                'id' => 15,
                'bank_account_id' => 3,
                'fund_id' => 28,
                'date' => NULL,
                'attachment' => NULL,
                'is_fund' => 0,
                'created_at' => '2024-09-25 16:23:11',
                'updated_at' => '2024-09-25 16:23:11',
                'deleted_at' => NULL,
            ),
            15 => 
            array (
                'id' => 16,
                'bank_account_id' => 3,
                'fund_id' => 41,
                'date' => NULL,
                'attachment' => '/files/bank_transactions/1727434152Screenshot 2024-08-27 at 3.56.45 PM.png',
                'is_fund' => 1,
                'created_at' => '2024-09-27 15:49:12',
                'updated_at' => '2024-09-27 15:49:12',
                'deleted_at' => NULL,
            ),
            16 => 
            array (
                'id' => 17,
                'bank_account_id' => NULL,
                'fund_id' => 44,
                'date' => NULL,
                'attachment' => '/files/bank_transactions/1727445343Screenshot 2024-09-27 at 6.23.14 PM.png',
                'is_fund' => 0,
                'created_at' => '2024-09-27 18:55:43',
                'updated_at' => '2024-09-27 18:55:43',
                'deleted_at' => NULL,
            ),
            17 => 
            array (
                'id' => 18,
                'bank_account_id' => 1,
                'fund_id' => 46,
                'date' => NULL,
                'attachment' => '/files/bank_transactions/1727445779Screenshot 2024-09-16 at 1.41.42 PM.png',
                'is_fund' => 0,
                'created_at' => '2024-09-27 19:02:59',
                'updated_at' => '2024-09-27 19:02:59',
                'deleted_at' => NULL,
            ),
            18 => 
            array (
                'id' => 19,
                'bank_account_id' => 1,
                'fund_id' => 47,
                'date' => NULL,
                'attachment' => '/files/bank_transactions/1727447106Screenshot 2024-09-27 at 6.23.14 PM.png',
                'is_fund' => 0,
                'created_at' => '2024-09-27 19:25:06',
                'updated_at' => '2024-09-27 19:25:06',
                'deleted_at' => NULL,
            ),
            19 => 
            array (
                'id' => 20,
                'bank_account_id' => 1,
                'fund_id' => 54,
                'date' => NULL,
                'attachment' => '/files/bank_transactions/1727776084Screenshot from 2024-10-01 13-46-05.png',
                'is_fund' => 1,
                'created_at' => '2024-10-01 14:48:04',
                'updated_at' => '2024-10-01 14:48:04',
                'deleted_at' => NULL,
            ),
            20 => 
            array (
                'id' => 21,
                'bank_account_id' => 1,
                'fund_id' => 57,
                'date' => NULL,
                'attachment' => NULL,
                'is_fund' => 1,
                'created_at' => '2024-10-01 18:04:29',
                'updated_at' => '2024-10-01 18:04:29',
                'deleted_at' => NULL,
            ),
            21 => 
            array (
                'id' => 22,
                'bank_account_id' => 1,
                'fund_id' => 58,
                'date' => NULL,
                'attachment' => NULL,
                'is_fund' => 0,
                'created_at' => '2024-10-01 19:17:59',
                'updated_at' => '2024-10-01 19:17:59',
                'deleted_at' => NULL,
            ),
            22 => 
            array (
                'id' => 23,
                'bank_account_id' => 3,
                'fund_id' => 66,
                'date' => NULL,
                'attachment' => NULL,
                'is_fund' => 0,
                'created_at' => '2024-10-03 15:52:46',
                'updated_at' => '2024-10-03 15:52:46',
                'deleted_at' => NULL,
            ),
            23 => 
            array (
                'id' => 24,
                'bank_account_id' => 1,
                'fund_id' => 71,
                'date' => NULL,
            'attachment' => '/files/bank_transactions/1727961350tutorhub (2).png',
                'is_fund' => 0,
                'created_at' => '2024-10-03 18:15:50',
                'updated_at' => '2024-10-03 18:15:50',
                'deleted_at' => NULL,
            ),
            24 => 
            array (
                'id' => 25,
                'bank_account_id' => NULL,
                'fund_id' => 72,
                'date' => NULL,
                'attachment' => NULL,
                'is_fund' => 0,
                'created_at' => '2024-10-04 14:41:24',
                'updated_at' => '2024-10-04 14:41:24',
                'deleted_at' => NULL,
            ),
            25 => 
            array (
                'id' => 26,
                'bank_account_id' => NULL,
                'fund_id' => 74,
                'date' => NULL,
                'attachment' => NULL,
                'is_fund' => 0,
                'created_at' => '2024-10-04 17:50:02',
                'updated_at' => '2024-10-04 17:50:02',
                'deleted_at' => NULL,
            ),
            26 => 
            array (
                'id' => 27,
                'bank_account_id' => NULL,
                'fund_id' => 75,
                'date' => NULL,
                'attachment' => NULL,
                'is_fund' => 0,
                'created_at' => '2024-10-04 18:22:16',
                'updated_at' => '2024-10-04 18:22:16',
                'deleted_at' => NULL,
            ),
            27 => 
            array (
                'id' => 28,
                'bank_account_id' => 3,
                'fund_id' => 76,
                'date' => NULL,
                'attachment' => NULL,
                'is_fund' => 0,
                'created_at' => '2024-10-04 18:27:29',
                'updated_at' => '2024-10-04 18:27:29',
                'deleted_at' => NULL,
            ),
            28 => 
            array (
                'id' => 29,
                'bank_account_id' => 3,
                'fund_id' => 77,
                'date' => NULL,
                'attachment' => NULL,
                'is_fund' => 0,
                'created_at' => '2024-10-04 18:57:15',
                'updated_at' => '2024-10-04 18:57:15',
                'deleted_at' => NULL,
            ),
            29 => 
            array (
                'id' => 30,
                'bank_account_id' => 3,
                'fund_id' => 78,
                'date' => NULL,
                'attachment' => NULL,
                'is_fund' => 0,
                'created_at' => '2024-10-04 18:58:04',
                'updated_at' => '2024-10-04 18:58:04',
                'deleted_at' => NULL,
            ),
            30 => 
            array (
                'id' => 31,
                'bank_account_id' => 3,
                'fund_id' => 79,
                'date' => NULL,
                'attachment' => NULL,
                'is_fund' => 0,
                'created_at' => '2024-10-04 18:59:00',
                'updated_at' => '2024-10-04 18:59:00',
                'deleted_at' => NULL,
            ),
            31 => 
            array (
                'id' => 32,
                'bank_account_id' => 1,
                'fund_id' => 81,
                'date' => NULL,
                'attachment' => '/files/bank_transactions/1728144277Screenshot from 2024-09-14 14-58-23.png',
                'is_fund' => 0,
                'created_at' => '2024-10-05 21:04:37',
                'updated_at' => '2024-10-05 21:04:37',
                'deleted_at' => NULL,
            ),
            32 => 
            array (
                'id' => 33,
                'bank_account_id' => 1,
                'fund_id' => 85,
                'date' => NULL,
                'attachment' => NULL,
                'is_fund' => 1,
                'created_at' => '2024-10-07 12:14:26',
                'updated_at' => '2024-10-07 12:14:26',
                'deleted_at' => NULL,
            ),
            33 => 
            array (
                'id' => 34,
                'bank_account_id' => 1,
                'fund_id' => 86,
                'date' => NULL,
                'attachment' => NULL,
                'is_fund' => 0,
                'created_at' => '2024-10-07 12:16:35',
                'updated_at' => '2024-10-07 12:16:35',
                'deleted_at' => NULL,
            ),
            34 => 
            array (
                'id' => 35,
                'bank_account_id' => 3,
                'fund_id' => 91,
                'date' => NULL,
                'attachment' => NULL,
                'is_fund' => 0,
                'created_at' => '2024-10-07 17:56:57',
                'updated_at' => '2024-10-07 17:56:57',
                'deleted_at' => NULL,
            ),
            35 => 
            array (
                'id' => 36,
                'bank_account_id' => 3,
                'fund_id' => 91,
                'date' => NULL,
                'attachment' => NULL,
                'is_fund' => 0,
                'created_at' => '2024-10-07 18:25:01',
                'updated_at' => '2024-10-07 18:25:01',
                'deleted_at' => NULL,
            ),
            36 => 
            array (
                'id' => 37,
                'bank_account_id' => 3,
                'fund_id' => 91,
                'date' => NULL,
                'attachment' => NULL,
                'is_fund' => 0,
                'created_at' => '2024-10-07 18:25:30',
                'updated_at' => '2024-10-07 18:25:30',
                'deleted_at' => NULL,
            ),
            37 => 
            array (
                'id' => 38,
                'bank_account_id' => 3,
                'fund_id' => 91,
                'date' => NULL,
                'attachment' => NULL,
                'is_fund' => 0,
                'created_at' => '2024-10-07 18:25:53',
                'updated_at' => '2024-10-07 18:25:53',
                'deleted_at' => NULL,
            ),
        ));
        
        
    }
}