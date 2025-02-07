<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;

class ServiceCategoriesTableSeeder extends Seeder
{

    /**
     * Auto generated seed file
     *
     * @return void
     */
    public function run()
    {
        

        \DB::table('service_categories')->delete();
        
        \DB::table('service_categories')->insert(array (
            0 => 
            array (
                'id' => 1,
                'name' => '{"en":"Gynecology and Obstetrics","hi":"स्त्री रोग और प्रसूति विज्ञान","ar":"أمراض النساء والتوليد"}',
                'description' => '{"en":"<p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Praesent facilisis ante ut purus eleifend vehicula. Cras vel diam elit. Nullam scelerisque, nisi sed dignissim vehicula, sapien lacus fringilla urna, at rhoncus ex lorem vitae magna. Nam fermentum, purus sed consequat vulputate, lorem sapien dictum lorem, vitae euismod augue risus non mi. In hac habitasse platea dictumst. Donec a orci mauris. Pellentesque nec sem libero. Vestibulum fringilla neque ut est efficitur aliquet. Nulla facilisi. Fusce et ligula vitae lorem cursus aliquam. Aliquam a erat a mi bibendum molestie. Phasellus ut ex a justo dignissim scelerisque sit amet sed libero. Duis egestas, mi non dapibus hendrerit, libero nunc tincidunt orci, in dignissim ex mi a augue. Donec sed nulla in elit gravida venenatis et non augue. Pellentesque et libero quis lorem convallis viverra. Etiam fermentum sapien turpis, vel posuere velit varius ut.</p>","hi":"<p>लोरेम इप्सम डोलर सिट अमेट, कॉन्सेकट्यूर एडिपिसिंग एलीट. प्रेज़ेंट फसिलिसिस अंते उत पुरुस एलीफेंड व्हीकुला. क्रास वेल डायम एलीट. नुल्लम स्केलरिस्क, निसी सेड डिग्निस्सिम व्हीकुला, सैपियन लकुस फ्रिंजिल्ला उरना, एट रोंकस एक्स लोरेम विटे माग्ना. नाम फेर्मेंटुम, पुरुस सेड कंसक्वाट वुल्पुटेट, लोरेम सैपियन डिक्टम लोरेम, विटे एयूसमोड औगुए रीसस नॉन मी. इन हक हबितास्से प्लाटेआ डिक्टुमस्ट. डोनेक अ ओर्की मौरिस. पेल्लेंटेस्के नेक सेम लिबरो. वेस्टिबुलम फ्रिंजिल्ला नेकुए उत एस्ट एफिकितुर अलिक्वेट. नुल्ला फासिलिसि. फ्यूस्के एट लिगुला विटे लोरेम कर्सस अलिक्वाम. आलिक्वाम अ एराट अ मि बिबेंडम मोलस्टिये. फासेल्लस उत एक्स अ जस्टो डिग्निस्सिम स्केलरिस्क सिट अमेट सेड लिबरो. डुइस एगेस्टास, मि नॉन डापिबुस हेंड्रेरिट, लिबरो नुंक टिन्सीडुंट ऑर्की, इन डिग्निस्सिम एक्स मि अ औगुए. डोनेक सेड नुल्ला इन एलीट ग्राविडा विनेनेटिस एट नॉन औगुए.</p>","ar":"<p>لوريم إيبسوم دولور سيت أميت، كونسكتتور أديبيسينغ إليت. بريسنت فاسيليسيس أنتي أوت بوروس إليفند فيكولا. كراس فيل ديام إليت. نولام سكيلريسكي، نيسي سيد ديغنيسيم فيكولا، سابين لاكوس فرنجيلا أورنا، أت رونكوس إكس لوريم فيتاي ماجنا. نام فيرمينتوم، بوروس سيد كونسكووت فولووتات، لوريم سابين ديكتوم لوريم، فيتاي إويسمود أوغي ريسوس نون مي. إن هاك هابيتاس بلاتيا ديكتومست. دونيك أ أوركي موريس. بيلينتسكي نيك سيم ليبيرو. فيستيبيولوم فرنجيلا نيكوي أوت إيست إفيكيتور أليكويت. نولا فاسيليسي. فوسكي إت ليجولا فيتاي لوريم كورسوس أليكوام. أليكوام أ إيرات أ مي بيبندم مولستيي. فاسيليس أوت إكس أ جوستو ديغنيسيم سكيلريسكي سيت أميت سيد ليبيرو. دويس إيغيتاس، مي نون دابيبوس هندريريت، ليبيرو ننك تنسيدونت أوركي، إن ديغنيسيم إكس مي أ أوغ</p>"}',
                'slug' => 'gynecology-and-obstetrics-1',
                'is_active' => 1,
                'sort_order' => NULL,
                'image' => '/images/service_categories/66f2736d1cae1.png',
                'created_at' => '2024-07-09 14:39:31',
                'updated_at' => '2024-09-24 13:08:13',
                'deleted_at' => NULL,
            ),
            1 => 
            array (
                'id' => 2,
                'name' => '{"en":"General Medicine","hi":"सामान्य चिकित्सा","ar":"الطب العام"}',
                'description' => '{"en":"<p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Praesent facilisis ante ut purus eleifend vehicula. Cras vel diam elit. Nullam scelerisque, nisi sed dignissim vehicula, sapien lacus fringilla urna, at rhoncus ex lorem vitae magna. Nam fermentum, purus sed consequat vulputate, lorem sapien dictum lorem, vitae euismod augue risus non mi. In hac habitasse platea dictumst. Donec a orci mauris. Pellentesque nec sem libero. Vestibulum fringilla neque ut est efficitur aliquet. Nulla facilisi. Fusce et ligula vitae lorem cursus aliquam. Aliquam a erat a mi bibendum molestie. Phasellus ut ex a justo dignissim scelerisque sit amet sed libero. Duis egestas, mi non dapibus hendrerit, libero nunc tincidunt orci, in dignissim ex mi a augue. Donec sed nulla in elit gravida venenatis et non augue. Pellentesque et libero quis lorem convallis viverra. Etiam fermentum sapien turpis, vel posuere velit varius ut.</p>","hi":"<p>लोरेम इप्सम डोलर सिट अमेट, कॉन्सेकट्यूर एडिपिसिंग एलीट. प्रेज़ेंट फसिलिसिस अंते उत पुरुस एलीफेंड व्हीकुला. क्रास वेल डायम एलीट. नुल्लम स्केलरिस्क, निसी सेड डिग्निस्सिम व्हीकुला, सैपियन लकुस फ्रिंजिल्ला उरना, एट रोंकस एक्स लोरेम विटे माग्ना. नाम फेर्मेंटुम, पुरुस सेड कंसक्वाट वुल्पुटेट, लोरेम सैपियन डिक्टम लोरेम, विटे एयूसमोड औगुए रीसस नॉन मी. इन हक हबितास्से प्लाटेआ डिक्टुमस्ट. डोनेक अ ओर्की मौरिस. पेल्लेंटेस्के नेक सेम लिबरो. वेस्टिबुलम फ्रिंजिल्ला नेकुए उत एस्ट एफिकितुर अलिक्वेट. नुल्ला फासिलिसि. फ्यूस्के एट लिगुला विटे लोरेम कर्सस अलिक्वाम. आलिक्वाम अ एराट अ मि बिबेंडम मोलस्टिये. फासेल्लस उत एक्स अ जस्टो डिग्निस्सिम स्केलरिस्क सिट अमेट सेड लिबरो. डुइस एगेस्टास, मि नॉन डापिबुस हेंड्रेरिट, लिबरो नुंक टिन्सीडुंट ऑर्की, इन डिग्निस्सिम एक्स मि अ औगुए. डोनेक सेड नुल्ला इन एलीट ग्राविडा विनेनेटिस एट नॉन औगुए.</p>","ar":"<p>لوريم إيبسوم دولور سيت أميت، كونسكتتور أديبيسينغ إليت. بريسنت فاسيليسيس أنتي أوت بوروس إليفند فيكولا. كراس فيل ديام إليت. نولام سكيلريسكي، نيسي سيد ديغنيسيم فيكولا، سابين لاكوس فرنجيلا أورنا، أت رونكوس إكس لوريم فيتاي ماجنا. نام فيرمينتوم، بوروس سيد كونسكووت فولووتات، لوريم سابين ديكتوم لوريم، فيتاي إويسمود أوغي ريسوس نون مي. إن هاك هابيتاس بلاتيا ديكتومست. دونيك أ أوركي موريس. بيلينتسكي نيك سيم ليبيرو. فيستيبيولوم فرنجيلا نيكوي أوت إيست إفيكيتور أليكويت. نولا فاسيليسي. فوسكي إت ليجولا فيتاي لوريم كورسوس أليكوام. أليكوام أ إيرات أ مي بيبندم مولستيي. فاسيليس أوت إكس أ جوستو ديغنيسيم سكيلريسكي سيت أميت سيد ليبيرو. دويس إيغيتاس، مي نون دابيبوس هندريريت، ليبيرو ننك تنسيدونت أوركي، إن ديغنيسيم إكس مي أ أوغ</p>"}',
                'slug' => 'general-medicine-2',
                'is_active' => 1,
                'sort_order' => NULL,
                'image' => '/images/service_categories/66f273467bb29.png',
                'created_at' => '2024-07-09 14:40:07',
                'updated_at' => '2024-09-24 13:07:34',
                'deleted_at' => NULL,
            ),
            2 => 
            array (
                'id' => 3,
                'name' => '{"en":"Dermatology","hi":"त्वचा रोग विज्ञान","ar":"الأمراض الجلدية"}',
                'description' => '{"en":"<p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Praesent facilisis ante ut purus eleifend vehicula. Cras vel diam elit. Nullam scelerisque, nisi sed dignissim vehicula, sapien lacus fringilla urna, at rhoncus ex lorem vitae magna. Nam fermentum, purus sed consequat vulputate, lorem sapien dictum lorem, vitae euismod augue risus non mi. In hac habitasse platea dictumst. Donec a orci mauris. Pellentesque nec sem libero. Vestibulum fringilla neque ut est efficitur aliquet. Nulla facilisi. Fusce et ligula vitae lorem cursus aliquam. Aliquam a erat a mi bibendum molestie. Phasellus ut ex a justo dignissim scelerisque sit amet sed libero. Duis egestas, mi non dapibus hendrerit, libero nunc tincidunt orci, in dignissim ex mi a augue. Donec sed nulla in elit gravida venenatis et non augue. Pellentesque et libero quis lorem convallis viverra. Etiam fermentum sapien turpis, vel posuere velit varius ut.</p>","hi":"<p>लोरेम इप्सम डोलर सिट अमेट, कॉन्सेकट्यूर एडिपिसिंग एलीट. प्रेज़ेंट फसिलिसिस अंते उत पुरुस एलीफेंड व्हीकुला. क्रास वेल डायम एलीट. नुल्लम स्केलरिस्क, निसी सेड डिग्निस्सिम व्हीकुला, सैपियन लकुस फ्रिंजिल्ला उरना, एट रोंकस एक्स लोरेम विटे माग्ना. नाम फेर्मेंटुम, पुरुस सेड कंसक्वाट वुल्पुटेट, लोरेम सैपियन डिक्टम लोरेम, विटे एयूसमोड औगुए रीसस नॉन मी. इन हक हबितास्से प्लाटेआ डिक्टुमस्ट. डोनेक अ ओर्की मौरिस. पेल्लेंटेस्के नेक सेम लिबरो. वेस्टिबुलम फ्रिंजिल्ला नेकुए उत एस्ट एफिकितुर अलिक्वेट. नुल्ला फासिलिसि. फ्यूस्के एट लिगुला विटे लोरेम कर्सस अलिक्वाम. आलिक्वाम अ एराट अ मि बिबेंडम मोलस्टिये. फासेल्लस उत एक्स अ जस्टो डिग्निस्सिम स्केलरिस्क सिट अमेट सेड लिबरो. डुइस एगेस्टास, मि नॉन डापिबुस हेंड्रेरिट, लिबरो नुंक टिन्सीडुंट ऑर्की, इन डिग्निस्सिम एक्स मि अ औगुए. डोनेक सेड नुल्ला इन एलीट ग्राविडा विनेनेटिस एट नॉन औगुए.</p>","ar":"<p>لوريم إيبسوم دولور سيت أميت، كونسكتتور أديبيسينغ إليت. بريسنت فاسيليسيس أنتي أوت بوروس إليفند فيكولا. كراس فيل ديام إليت. نولام سكيلريسكي، نيسي سيد ديغنيسيم فيكولا، سابين لاكوس فرنجيلا أورنا، أت رونكوس إكس لوريم فيتاي ماجنا. نام فيرمينتوم، بوروس سيد كونسكووت فولووتات، لوريم سابين ديكتوم لوريم، فيتاي إويسمود أوغي ريسوس نون مي. إن هاك هابيتاس بلاتيا ديكتومست. دونيك أ أوركي موريس. بيلينتسكي نيك سيم ليبيرو. فيستيبيولوم فرنجيلا نيكوي أوت إيست إفيكيتور أليكويت. نولا فاسيليسي. فوسكي إت ليجولا فيتاي لوريم كورسوس أليكوام. أليكوام أ إيرات أ مي بيبندم مولستيي. فاسيليس أوت إكس أ جوستو ديغنيسيم سكيلريسكي سيت أميت سيد ليبيرو. دويس إيغيتاس، مي نون دابيبوس هندريريت، ليبيرو ننك تنسيدونت أوركي، إن ديغنيسيم إكس مي أ أوغ</p>"}',
                'slug' => 'dermatology-3',
                'is_active' => 1,
                'sort_order' => NULL,
                'image' => '/images/service_categories/66f2732a6b450.png',
                'created_at' => '2024-07-09 14:41:30',
                'updated_at' => '2024-09-24 13:07:06',
                'deleted_at' => NULL,
            ),
        ));
        
        
    }
}