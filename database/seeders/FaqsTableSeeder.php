<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;

class FaqsTableSeeder extends Seeder
{

    /**
     * Auto generated seed file
     *
     * @return void
     */
    public function run()
    {
        

        \DB::table('faqs')->delete();
        
        \DB::table('faqs')->insert(array (
            0 => 
            array (
                'id' => 1,
                'faq_category_id' => 1,
                'name' => '{"en":"How long does a typical consultation last?","hi":"सामान्य परामर्श कितनी देर तक चलता है?","ar":"كم تستغرق الاستشارة النموذجية؟"}',
                'description' => '{"en":"<p>A typical consultation lasts between 30 minutes to an hour, depending on the complexity of your medical issue.</p>","hi":"<p>एक सामान्य परामर्श 30 मिनट से एक घंटे तक चलता है, जो आपकी चिकित्सा समस्या की जटिलता पर निर्भर करता है।</p>","ar":"<p>تستغرق الاستشارة النموذجية ما بين 30 دقيقة إلى ساعة، حسب تعقيد مشكلتك الطبية.</p>"}',
                'slug' => 'how-long-does-a-typical-consultation-last-1',
                'is_active' => 1,
                'sort_order' => NULL,
                'image' => NULL,
                'created_at' => '2024-07-24 17:47:27',
                'updated_at' => '2024-07-24 17:47:27',
                'deleted_at' => NULL,
            ),
            1 => 
            array (
                'id' => 2,
                'faq_category_id' => 1,
                'name' => '{"en":"How can I book an appointment?","hi":"मैं अपॉइंटमेंट कैसे बुक कर सकता हूँ?","ar":"كيف يمكنني حجز موعد؟"}',
                'description' => '{"en":"<p>You can book an appointment online through our website, via our mobile app, or by calling our office.</p>","hi":"<p>आप हमारी वेबसाइट, हमारे मोबाइल ऐप, या हमारे कार्यालय को कॉल करके अपॉइंटमेंट बुक कर सकते हैं।</p>","ar":"<p>يمكنك حجز موعد عبر الإنترنت من خلال موقعنا الإلكتروني، أو عبر تطبيقنا على الهاتف المحمول، أو بالاتصال بمكتبن</p>"}',
                'slug' => 'how-can-i-book-an-appointment-2',
                'is_active' => 1,
                'sort_order' => NULL,
                'image' => NULL,
                'created_at' => '2024-07-24 17:49:17',
                'updated_at' => '2024-07-24 17:49:17',
                'deleted_at' => NULL,
            ),
            2 => 
            array (
                'id' => 3,
                'faq_category_id' => 1,
                'name' => '{"en":"What are the visiting hours for the clinic?","hi":"क्लिनिक में आने का समय क्या है?","ar":"ما هي ساعات الزيارة للعيادة؟"}',
                'description' => '{"en":"<p>Our clinicvisiting hours are from 5pm to 10pm, Monday through Friday. Weekend hours may vary. Please check our website or call us at [phone number] for the most up-to-date information.</p>","hi":"<p>हमारे क्लिनिक में आने का समय सोमवार से शुक्रवार तक शाम 5 बजे से रात 10 बजे तक है। सप्ताहांत के समय में बदलाव हो सकता है। कृपया हमारी वेबसाइट देखें या सबसे ताज़ा जानकारी के लिए हमें [फ़ोन नंबर] पर कॉल करें।</p>","ar":"<p>ساعات الزيارة في عيادتنا من الساعة 5 مساءً حتى 10 مساءً، من الاثنين إلى الجمعة. قد تختلف ساعات العمل خلال عطلة نهاية الأسبوع. يرجى مراجعة موقعنا الإلكتروني أو الاتصال بنا على [رقم الهاتف] للحصول على أحدث المعلومات.</p>"}',
                'slug' => 'what-are-the-visiting-hours-for-the-clinic-3',
                'is_active' => 1,
                'sort_order' => NULL,
                'image' => NULL,
                'created_at' => '2024-07-26 18:18:36',
                'updated_at' => '2024-10-04 16:34:02',
                'deleted_at' => NULL,
            ),
            3 => 
            array (
                'id' => 4,
                'faq_category_id' => 1,
                'name' => '{"en":"Can I access my medical records online?","hi":"क्या मैं अपने मेडिकल रिकॉर्ड ऑनलाइन देख सकता हूँ?","ar":"هل يمكنني الوصول إلى سجلاتي الطبية عبر الإنترنت؟"}',
                'description' => '{"en":"<p>Yes, you can access your medical records online through our patient portal. Please log in link to patient portal or contact our support team for assistance.</p>","hi":"<p>हां, आप हमारे मरीज पोर्टल के माध्यम से अपने मेडिकल रिकॉर्ड ऑनलाइन एक्सेस कर सकते हैं। कृपया मरीज पोर्टल के लिंक पर लॉग इन करें या सहायता के लिए हमारी सहायता टीम से संपर्क करें।</p>","ar":"<p>نعم، يمكنك الوصول إلى سجلاتك الطبية عبر الإنترنت من خلال بوابة المرضى الخاصة بنا. يرجى تسجيل الدخول عبر رابط بوابة المرضى أو الاتصال بفريق الدعم الخاص بنا للحصول على المساعدة.</p>"}',
                'slug' => 'can-i-access-my-medical-records-online-4',
                'is_active' => 1,
                'sort_order' => NULL,
                'image' => NULL,
                'created_at' => '2024-07-26 18:19:08',
                'updated_at' => '2024-10-04 16:33:01',
                'deleted_at' => NULL,
            ),
            4 => 
            array (
                'id' => 5,
                'faq_category_id' => 1,
                'name' => '{"en":"What insurance plans do you accept?","hi":"आप कौन सी बीमा योजनाएं स्वीकार करते हैं?","ar":"ما هي خطط التأمين التي تقبلونها؟"}',
                'description' => '{"en":"<p>We accept a wide range of insurance plans, including [list major insurance providers]. For a complete list of accepted insurance plans, please visit our insurance information page [link to insurance information page] or call our billing department at [phone number].</p>","hi":"<p>हम कई तरह की बीमा योजनाओं को स्वीकार करते हैं, जिनमें [प्रमुख बीमा प्रदाताओं की सूची] शामिल है। स्वीकृत बीमा योजनाओं की पूरी सूची के लिए, कृपया हमारे बीमा जानकारी पृष्ठ [बीमा जानकारी पृष्ठ से लिंक] पर जाएँ या हमारे बिलिंग विभाग को [फ़ोन नंबर] पर कॉल करें।</p>","ar":"<p>نحن نقبل مجموعة واسعة من خطط التأمين، بما في ذلك [قائمة مقدمي التأمين الرئيسيين]. للحصول على قائمة كاملة بخطط التأمين المقبولة، يرجى زيارة صفحة معلومات التأمين الخاصة بنا [رابط إلى صفحة معلومات التأمين] أو الاتصال بقسم الفواتير لدينا على [رقم الهاتف].</p>"}',
                'slug' => 'what-insurance-plans-do-you-accept-5',
                'is_active' => 1,
                'sort_order' => NULL,
                'image' => NULL,
                'created_at' => '2024-07-26 18:20:05',
                'updated_at' => '2024-10-04 16:36:02',
                'deleted_at' => NULL,
            ),
        ));
        
        
    }
}