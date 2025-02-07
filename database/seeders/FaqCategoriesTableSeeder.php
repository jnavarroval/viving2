<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;

class FaqCategoriesTableSeeder extends Seeder
{

    /**
     * Auto generated seed file
     *
     * @return void
     */
    public function run()
    {
        

        \DB::table('faq_categories')->delete();
        
        \DB::table('faq_categories')->insert(array (
            0 => 
            array (
                'id' => 1,
                'name' => '{"en":"General Consultation","hi":"सामान्य परामर्श","ar":"الاستشارة العامة"}',
                'description' => '{"en":"<p>Answers to common questions about the consultation process, what to expect during a visit, and how to prepare for your appointment with a medical consultant.</p>","hi":"<p>परामर्श प्रक्रिया, यात्रा के दौरान क्या उम्मीद करें, और चिकित्सा सलाहकार के साथ अपनी नियुक्ति की तैयारी कैसे करें, इसके बारे में सामान्य प्रश्नों के उत्तर।</p>","ar":"<p>إجابات على الأسئلة الشائعة حول عملية الاستشارة، وما يمكن توقعه أثناء الزيارة، وكيفية التحضير لموعدك مع المستشار الطبي.</p>"}',
                'slug' => 'general-consultation-1',
                'is_active' => 1,
                'sort_order' => NULL,
                'image' => '/images/faq_categories/66a0f76cc9d37.png',
                'created_at' => '2024-07-24 17:45:32',
                'updated_at' => '2024-07-24 17:45:32',
                'deleted_at' => NULL,
            ),
        ));
        
        
    }
}