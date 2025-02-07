<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;

class WithdrawRequestsTableSeeder extends Seeder
{

    /**
     * Auto generated seed file
     *
     * @return void
     */
    public function run()
    {
        

        \DB::table('withdraw_requests')->delete();
        
        \DB::table('withdraw_requests')->insert(array (
            0 => 
            array (
                'id' => 1,
                'user_id' => 3,
                'amount' => 50,
                'account_holder' => 'Sophia John',
                'account_number' => '421442154845121',
                'bank' => 'MCB',
                'additional_note' => 'Recieve my payment',
                'status' => 'pending',
                'rejected_reason' => NULL,
                'created_at' => '2024-09-23 16:20:52',
                'updated_at' => '2024-09-23 16:20:52',
            ),
        ));
        
        
    }
}