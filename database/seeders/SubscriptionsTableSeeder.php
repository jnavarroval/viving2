<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;

class SubscriptionsTableSeeder extends Seeder
{

    /**
     * Auto generated seed file
     *
     * @return void
     */
    public function run()
    {
        

        \DB::table('subscriptions')->delete();
        
        \DB::table('subscriptions')->insert(array (
            0 => 
            array (
                'id' => 1,
                'doctor_id' => 36,
                'clinic_id' => NULL,
                'name' => 'gold-53',
                'stripe_id' => 'sub_1OCJMbHTAHWwyrB6XJufH18Q',
                'stripe_status' => 'active',
                'stripe_price' => 'price_1MkPGfHTAHWwyrB6thyCbJXk',
                'quantity' => 1,
                'trial_ends_at' => NULL,
                'ends_at' => NULL,
                'created_at' => '2023-11-14 14:56:57',
                'updated_at' => '2023-11-14 14:56:59',
            ),
            1 => 
            array (
                'id' => 2,
                'doctor_id' => 36,
                'clinic_id' => NULL,
                'name' => 'gold-53',
                'stripe_id' => 'sub_1OCJwKHTAHWwyrB6GuBRoFPJ',
                'stripe_status' => 'active',
                'stripe_price' => 'price_1MkPGfHTAHWwyrB6thyCbJXk',
                'quantity' => 1,
                'trial_ends_at' => NULL,
                'ends_at' => NULL,
                'created_at' => '2023-11-14 15:33:53',
                'updated_at' => '2023-11-14 15:33:55',
            ),
            2 => 
            array (
                'id' => 3,
                'doctor_id' => 42,
                'clinic_id' => NULL,
                'name' => 'gold-53',
                'stripe_id' => 'sub_1OFaowHTAHWwyrB66HZxZsvu',
                'stripe_status' => 'active',
                'stripe_price' => 'price_1MkPGfHTAHWwyrB6thyCbJXk',
                'quantity' => 1,
                'trial_ends_at' => NULL,
                'ends_at' => NULL,
                'created_at' => '2023-11-23 16:11:47',
                'updated_at' => '2023-11-23 16:11:49',
            ),
            3 => 
            array (
                'id' => 4,
                'doctor_id' => 46,
                'clinic_id' => NULL,
                'name' => 'gold-53',
                'stripe_id' => 'sub_1OFdsPHTAHWwyrB6XtpJiDjI',
                'stripe_status' => 'active',
                'stripe_price' => 'price_1MkPGfHTAHWwyrB6thyCbJXk',
                'quantity' => 1,
                'trial_ends_at' => NULL,
                'ends_at' => NULL,
                'created_at' => '2023-11-23 19:27:33',
                'updated_at' => '2023-11-23 19:27:35',
            ),
            4 => 
            array (
                'id' => 5,
                'doctor_id' => 47,
                'clinic_id' => NULL,
                'name' => 'gold-53',
                'stripe_id' => 'sub_1OFkmmHTAHWwyrB6nRSwefde',
                'stripe_status' => 'active',
                'stripe_price' => 'price_1MkPGfHTAHWwyrB6thyCbJXk',
                'quantity' => 1,
                'trial_ends_at' => NULL,
                'ends_at' => NULL,
                'created_at' => '2023-11-24 02:50:13',
                'updated_at' => '2023-11-24 02:50:15',
            ),
            5 => 
            array (
                'id' => 6,
                'doctor_id' => 68,
                'clinic_id' => NULL,
                'name' => 'diamond-53',
                'stripe_id' => 'sub_1PJwjKHTAHWwyrB6oeKyDP7N',
                'stripe_status' => 'active',
                'stripe_price' => 'price_1MkPGfHTAHWwyrB6thyCbJXk',
                'quantity' => 1,
                'trial_ends_at' => NULL,
                'ends_at' => NULL,
                'created_at' => '2024-05-24 16:56:15',
                'updated_at' => '2024-05-24 16:56:17',
            ),
            6 => 
            array (
                'id' => 7,
                'doctor_id' => 70,
                'clinic_id' => NULL,
                'name' => 'diamond-53',
                'stripe_id' => 'sub_1POc2gHTAHWwyrB6mLFlDdQN',
                'stripe_status' => 'active',
                'stripe_price' => 'price_1MkPGfHTAHWwyrB6thyCbJXk',
                'quantity' => 1,
                'trial_ends_at' => NULL,
                'ends_at' => NULL,
                'created_at' => '2024-06-06 13:51:31',
                'updated_at' => '2024-06-06 13:51:33',
            ),
        ));
        
        
    }
}