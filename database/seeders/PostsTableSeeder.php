<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;

class PostsTableSeeder extends Seeder
{

    /**
     * Auto generated seed file
     *
     * @return void
     */
    public function run()
    {
        

        \DB::table('posts')->delete();
        
        \DB::table('posts')->insert(array (
            0 => 
            array (
                'id' => 1,
                'doctor_id' => NULL,
                'clinic_id' => NULL,
                'blog_category_id' => 2,
                'name' => '{"en":"General Health and Wellness","hi":"सामान्य स्वास्थ्य और कल्याण","ar":"الصحة العامة والرفاهية"}',
                'description' => '{"en":"<p>Lorem Ipsum has been the industry&#39;s standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book.</p>","hi":"<p>Lorem Ipsum has been the industry&#39;s standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book.</p>","ar":"<p>Lorem Ipsum has been the industry&#39;s standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book.</p>"}',
                'slug' => 'general-health-and-wellness-1',
                'is_active' => 1,
                'is_featured' => 0,
                'image' => NULL,
                'created_at' => '2024-07-25 18:06:36',
                'updated_at' => '2024-07-25 18:06:36',
                'deleted_at' => NULL,
            ),
        ));
        \DB::table('posts')->insert(array (
            0 => 
            array (
                'id' => 2,
                'doctor_id' => NULL,
                'clinic_id' => NULL,
                'blog_category_id' => 2,
                'name' => '{"en":"General Health and Wellness","hi":"सामान्य स्वास्थ्य और कल्याण","ar":"الصحة العامة والرفاهية"}',
                'description' => '{"en":"<p>Lorem Ipsum has been the industry&#39;s standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book.</p>","hi":"<p>Lorem Ipsum has been the industry&#39;s standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book.</p>","ar":"<p>Lorem Ipsum has been the industry&#39;s standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book.</p>"}',
                'slug' => 'general-health-and-wellness-2',
                'is_active' => 1,
                'is_featured' => 0,
                'image' => NULL,
                'created_at' => '2024-07-25 18:06:37',
                'updated_at' => '2024-07-25 18:06:37',
                'deleted_at' => NULL,
            ),
        ));
        \DB::table('posts')->insert(array (
            0 => 
            array (
                'id' => 3,
                'doctor_id' => NULL,
                'clinic_id' => NULL,
                'blog_category_id' => 1,
                'name' => '{"en":"Medical News and Updates","hi":"चिकित्सा समाचार और अपडेट्स","ar":"أخبار وتحديثات طبية"}',
                'description' => '{"en":"<p>Lorem Ipsum has been the industry&#39;s standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book.</p>","hi":"<p>Lorem Ipsum has been the industry&#39;s standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book.</p>","ar":"<p>Lorem Ipsum has been the industry&#39;s standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book.</p>"}',
                'slug' => 'medical-news-and-updates-3',
                'is_active' => 1,
                'is_featured' => 0,
                'image' => '/images/posts/66a24ed87abb3.png',
                'created_at' => '2024-07-25 18:10:48',
                'updated_at' => '2024-07-25 18:10:48',
                'deleted_at' => NULL,
            ),
        ));
        \DB::table('posts')->insert(array (
            0 => 
            array (
                'id' => 4,
                'doctor_id' => 1,
                'clinic_id' => NULL,
                'blog_category_id' => 4,
                'name' => '{"en":"Health Data Management","hi":"चिकित्सा समाचार और अपडेट्स","ar":"أخبار وتحديثات طبية"}',
                'description' => '{"en":"<p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Praesent facilisis ante ut purus eleifend vehicula. Cras vel diam elit. Nullam scelerisque, nisi sed dignissim vehicula, sapien lacus fringilla urna, at rhoncus ex lorem vitae magna. Nam fermentum, purus sed consequat vulputate, lorem sapien dictum lorem, vitae euismod augue risus non mi. In hac habitasse platea dictumst. Donec a orci mauris. Pellentesque nec sem libero. Vestibulum fringilla neque ut est efficitur aliquet. Nulla facilisi. Fusce et ligula vitae lorem cursus aliquam. Aliquam a erat a mi bibendum molestie. Phasellus ut ex a justo dignissim scelerisque sit amet sed libero. Duis egestas, mi non dapibus hendrerit, libero nunc tincidunt orci, in dignissim ex mi a augue. Donec sed nulla in elit gravida venenatis et non augue. Pellentesque et libero quis lorem convallis viverra. Etiam fermentum sapien turpis, vel posuere velit varius ut.</p>","hi":"<p>लोरेम इप्सम डोलर सिट अमेट, कॉन्सेकट्यूर एडिपिसिंग एलीट. प्रेज़ेंट फसिलिसिस अंते उत पुरुस एलीफेंड व्हीकुला. क्रास वेल डायम एलीट. नुल्लम स्केलरिस्क, निसी सेड डिग्निस्सिम व्हीकुला, सैपियन लकुस फ्रिंजिल्ला उरना, एट रोंकस एक्स लोरेम विटे माग्ना. नाम फेर्मेंटुम, पुरुस सेड कंसक्वाट वुल्पुटेट, लोरेम सैपियन डिक्टम लोरेम, विटे एयूसमोड औगुए रीसस नॉन मी. इन हक हबितास्से प्लाटेआ डिक्टुमस्ट. डोनेक अ ओर्की मौरिस. पेल्लेंटेस्के नेक सेम लिबरो. वेस्टिबुलम फ्रिंजिल्ला नेकुए उत एस्ट एफिकितुर अलिक्वेट. नुल्ला फासिलिसि. फ्यूस्के एट लिगुला विटे लोरेम कर्सस अलिक्वाम. आलिक्वाम अ एराट अ मि बिबेंडम मोलस्टिये. फासेल्लस उत एक्स अ जस्टो डिग्निस्सिम स्केलरिस्क सिट अमेट सेड लिबरो. डुइस एगेस्टास, मि नॉन डापिबुस हेंड्रेरिट, लिबरो नुंक टिन्सीडुंट ऑर्की, इन डिग्निस्सिम एक्स मि अ औगुए. डोनेक सेड नुल्ला इन एलीट ग्राविडा विनेनेटिस एट नॉन औगुए.</p>","ar":"<p>لوريم إيبسوم دولور سيت أميت، كونسكتتور أديبيسينغ إليت. بريسنت فاسيليسيس أنتي أوت بوروس إليفند فيكولا. كراس فيل ديام إليت. نولام سكيلريسكي، نيسي سيد ديغنيسيم فيكولا، سابين لاكوس فرنجيلا أورنا، أت رونكوس إكس لوريم فيتاي ماجنا. نام فيرمينتوم، بوروس سيد كونسكووت فولووتات، لوريم سابين ديكتوم لوريم، فيتاي إويسمود أوغي ريسوس نون مي. إن هاك هابيتاس بلاتيا ديكتومست. دونيك أ أوركي موريس. بيلينتسكي نيك سيم ليبيرو. فيستيبيولوم فرنجيلا نيكوي أوت إيست إفيكيتور أليكويت. نولا فاسيليسي. فوسكي إت ليجولا فيتاي لوريم كورسوس أليكوام. أليكوام أ إيرات أ مي بيبندم مولستيي. فاسيليس أوت إكس أ جوستو ديغنيسيم سكيلريسكي سيت أميت سيد ليبيرو. دويس إيغيتاس، مي نون دابيبوس هندريريت، ليبيرو ننك تنسيدونت أوركي، إن ديغنيسيم إكس مي أ أوغ</p>"}',
                'slug' => 'health-data-management-4',
                'is_active' => 1,
                'is_featured' => 0,
                'image' => '/images/doctor_posts/66ebceb20219a.png',
                'created_at' => '2024-07-25 18:12:48',
                'updated_at' => '2024-09-19 12:11:46',
                'deleted_at' => NULL,
            ),
        ));
        \DB::table('posts')->insert(array (
            0 => 
            array (
                'id' => 5,
                'doctor_id' => 1,
                'clinic_id' => NULL,
                'blog_category_id' => 1,
                'name' => '{"en":"MedGadget","hi":"औद्योगिक डिज़ाइन","ar":"التصميم الصناعي"}',
                'description' => '{"en":"<p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Praesent facilisis ante ut purus eleifend vehicula. Cras vel diam elit. Nullam scelerisque, nisi sed dignissim vehicula, sapien lacus fringilla urna, at rhoncus ex lorem vitae magna. Nam fermentum, purus sed consequat vulputate, lorem sapien dictum lorem, vitae euismod augue risus non mi. In hac habitasse platea dictumst. Donec a orci mauris. Pellentesque nec sem libero. Vestibulum fringilla neque ut est efficitur aliquet. Nulla facilisi. Fusce et ligula vitae lorem cursus aliquam. Aliquam a erat a mi bibendum molestie. Phasellus ut ex a justo dignissim scelerisque sit amet sed libero. Duis egestas, mi non dapibus hendrerit, libero nunc tincidunt orci, in dignissim ex mi a augue. Donec sed nulla in elit gravida venenatis et non augue. Pellentesque et libero quis lorem convallis viverra. Etiam fermentum sapien turpis, vel posuere velit varius ut.</p>","hi":"<p>लोरेम इप्सम डोलर सिट अमेट, कॉन्सेकट्यूर एडिपिसिंग एलीट. प्रेज़ेंट फसिलिसिस अंते उत पुरुस एलीफेंड व्हीकुला. क्रास वेल डायम एलीट. नुल्लम स्केलरिस्क, निसी सेड डिग्निस्सिम व्हीकुला, सैपियन लकुस फ्रिंजिल्ला उरना, एट रोंकस एक्स लोरेम विटे माग्ना. नाम फेर्मेंटुम, पुरुस सेड कंसक्वाट वुल्पुटेट, लोरेम सैपियन डिक्टम लोरेम, विटे एयूसमोड औगुए रीसस नॉन मी. इन हक हबितास्से प्लाटेआ डिक्टुमस्ट. डोनेक अ ओर्की मौरिस. पेल्लेंटेस्के नेक सेम लिबरो. वेस्टिबुलम फ्रिंजिल्ला नेकुए उत एस्ट एफिकितुर अलिक्वेट. नुल्ला फासिलिसि. फ्यूस्के एट लिगुला विटे लोरेम कर्सस अलिक्वाम. आलिक्वाम अ एराट अ मि बिबेंडम मोलस्टिये. फासेल्लस उत एक्स अ जस्टो डिग्निस्सिम स्केलरिस्क सिट अमेट सेड लिबरो. डुइस एगेस्टास, मि नॉन डापिबुस हेंड्रेरिट, लिबरो नुंक टिन्सीडुंट ऑर्की, इन डिग्निस्सिम एक्स मि अ औगुए. डोनेक सेड नुल्ला इन एलीट ग्राविडा विनेनेटिस एट नॉन औगुए.</p>","ar":"<p>لوريم إيبسوم دولور سيت أميت، كونسكتتور أديبيسينغ إليت. بريسنت فاسيليسيس أنتي أوت بوروس إليفند فيكولا. كراس فيل ديام إليت. نولام سكيلريسكي، نيسي سيد ديغنيسيم فيكولا، سابين لاكوس فرنجيلا أورنا، أت رونكوس إكس لوريم فيتاي ماجنا. نام فيرمينتوم، بوروس سيد كونسكووت فولووتات، لوريم سابين ديكتوم لوريم، فيتاي إويسمود أوغي ريسوس نون مي. إن هاك هابيتاس بلاتيا ديكتومست. دونيك أ أوركي موريس. بيلينتسكي نيك سيم ليبيرو. فيستيبيولوم فرنجيلا نيكوي أوت إيست إفيكيتور أليكويت. نولا فاسيليسي. فوسكي إت ليجولا فيتاي لوريم كورسوس أليكوام. أليكوام أ إيرات أ مي بيبندم مولستيي. فاسيليس أوت إكس أ جوستو ديغنيسيم سكيلريسكي سيت أميت سيد ليبيرو. دويس إيغيتاس، مي نون دابيبوس هندريريت، ليبيرو ننك تنسيدونت أوركي، إن ديغنيسيم إكس مي أ أوغ</p>"}',
                'slug' => 'medgadget-5',
                'is_active' => 1,
                'is_featured' => 0,
                'image' => '/images/doctor_posts/66ebcdf953b03.png',
                'created_at' => '2024-07-25 18:13:30',
                'updated_at' => '2024-09-19 12:08:41',
                'deleted_at' => NULL,
            ),
        ));
        \DB::table('posts')->insert(array (
            0 => 
            array (
                'id' => 6,
                'doctor_id' => 1,
                'clinic_id' => NULL,
                'blog_category_id' => 2,
                'name' => '{"en":"Healthcare IT Leaders","hi":"क्विज़ प्रतियोगिता","ar":"الذكاء الاصطناعي"}',
                'description' => '{"en":"<p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Praesent facilisis ante ut purus eleifend vehicula. Cras vel diam elit. Nullam scelerisque, nisi sed dignissim vehicula, sapien lacus fringilla urna, at rhoncus ex lorem vitae magna. Nam fermentum, purus sed consequat vulputate, lorem sapien dictum lorem, vitae euismod augue risus non mi. In hac habitasse platea dictumst. Donec a orci mauris. Pellentesque nec sem libero. Vestibulum fringilla neque ut est efficitur aliquet. Nulla facilisi. Fusce et ligula vitae lorem cursus aliquam. Aliquam a erat a mi bibendum molestie. Phasellus ut ex a justo dignissim scelerisque sit amet sed libero. Duis egestas, mi non dapibus hendrerit, libero nunc tincidunt orci, in dignissim ex mi a augue. Donec sed nulla in elit gravida venenatis et non augue. Pellentesque et libero quis lorem convallis viverra. Etiam fermentum sapien turpis, vel posuere velit varius ut.</p>","hi":"<p>लोरेम इप्सम डोलर सिट अमेट, कॉन्सेकट्यूर एडिपिसिंग एलीट. प्रेज़ेंट फसिलिसिस अंते उत पुरुस एलीफेंड व्हीकुला. क्रास वेल डायम एलीट. नुल्लम स्केलरिस्क, निसी सेड डिग्निस्सिम व्हीकुला, सैपियन लकुस फ्रिंजिल्ला उरना, एट रोंकस एक्स लोरेम विटे माग्ना. नाम फेर्मेंटुम, पुरुस सेड कंसक्वाट वुल्पुटेट, लोरेम सैपियन डिक्टम लोरेम, विटे एयूसमोड औगुए रीसस नॉन मी. इन हक हबितास्से प्लाटेआ डिक्टुमस्ट. डोनेक अ ओर्की मौरिस. पेल्लेंटेस्के नेक सेम लिबरो. वेस्टिबुलम फ्रिंजिल्ला नेकुए उत एस्ट एफिकितुर अलिक्वेट. नुल्ला फासिलिसि. फ्यूस्के एट लिगुला विटे लोरेम कर्सस अलिक्वाम. आलिक्वाम अ एराट अ मि बिबेंडम मोलस्टिये. फासेल्लस उत एक्स अ जस्टो डिग्निस्सिम स्केलरिस्क सिट अमेट सेड लिबरो. डुइस एगेस्टास, मि नॉन डापिबुस हेंड्रेरिट, लिबरो नुंक टिन्सीडुंट ऑर्की, इन डिग्निस्सिम एक्स मि अ औगुए. डोनेक सेड नुल्ला इन एलीट ग्राविडा विनेनेटिस एट नॉन औगुए.</p>","ar":"<p>لوريم إيبسوم دولور سيت أميت، كونسكتتور أديبيسينغ إليت. بريسنت فاسيليسيس أنتي أوت بوروس إليفند فيكولا. كراس فيل ديام إليت. نولام سكيلريسكي، نيسي سيد ديغنيسيم فيكولا، سابين لاكوس فرنجيلا أورنا، أت رونكوس إكس لوريم فيتاي ماجنا. نام فيرمينتوم، بوروس سيد كونسكووت فولووتات، لوريم سابين ديكتوم لوريم، فيتاي إويسمود أوغي ريسوس نون مي. إن هاك هابيتاس بلاتيا ديكتومست. دونيك أ أوركي موريس. بيلينتسكي نيك سيم ليبيرو. فيستيبيولوم فرنجيلا نيكوي أوت إيست إفيكيتور أليكويت. نولا فاسيليسي. فوسكي إت ليجولا فيتاي لوريم كورسوس أليكوام. أليكوام أ إيرات أ مي بيبندم مولستيي. فاسيليس أوت إكس أ جوستو ديغنيسيم سكيلريسكي سيت أميت سيد ليبيرو. دويس إيغيتاس، مي نون دابيبوس هندريريت، ليبيرو ننك تنسيدونت أوركي، إن ديغنيسيم إكس مي أ أوغ</p>"}',
                'slug' => 'healthcare-it-leaders-6',
                'is_active' => 1,
                'is_featured' => 0,
                'image' => '/images/doctor_posts/66ebcf0c65282.png',
                'created_at' => '2024-09-19 12:13:16',
                'updated_at' => '2024-09-19 12:13:16',
                'deleted_at' => NULL,
            ),
        ));
        \DB::table('posts')->insert(array (
            0 => 
            array (
                'id' => 7,
                'doctor_id' => 60,
                'clinic_id' => NULL,
                'blog_category_id' => 1,
                'name' => '{"en":"HealthSystemCIO","hi":"औद्योगिक डिज़ाइन","ar":"فعالية الخطاب التعليمي"}',
                'description' => '{"en":"<p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Praesent facilisis ante ut purus eleifend vehicula. Cras vel diam elit. Nullam scelerisque, nisi sed dignissim vehicula, sapien lacus fringilla urna, at rhoncus ex lorem vitae magna. Nam fermentum, purus sed consequat vulputate, lorem sapien dictum lorem, vitae euismod augue risus non mi. In hac habitasse platea dictumst. Donec a orci mauris. Pellentesque nec sem libero. Vestibulum fringilla neque ut est efficitur aliquet. Nulla facilisi. Fusce et ligula vitae lorem cursus aliquam. Aliquam a erat a mi bibendum molestie. Phasellus ut ex a justo dignissim scelerisque sit amet sed libero. Duis egestas, mi non dapibus hendrerit, libero nunc tincidunt orci, in dignissim ex mi a augue. Donec sed nulla in elit gravida venenatis et non augue. Pellentesque et libero quis lorem convallis viverra. Etiam fermentum sapien turpis, vel posuere velit varius ut.</p>","hi":"<p>लोरेम इप्सम डोलर सिट अमेट, कॉन्सेकट्यूर एडिपिसिंग एलीट. प्रेज़ेंट फसिलिसिस अंते उत पुरुस एलीफेंड व्हीकुला. क्रास वेल डायम एलीट. नुल्लम स्केलरिस्क, निसी सेड डिग्निस्सिम व्हीकुला, सैपियन लकुस फ्रिंजिल्ला उरना, एट रोंकस एक्स लोरेम विटे माग्ना. नाम फेर्मेंटुम, पुरुस सेड कंसक्वाट वुल्पुटेट, लोरेम सैपियन डिक्टम लोरेम, विटे एयूसमोड औगुए रीसस नॉन मी. इन हक हबितास्से प्लाटेआ डिक्टुमस्ट. डोनेक अ ओर्की मौरिस. पेल्लेंटेस्के नेक सेम लिबरो. वेस्टिबुलम फ्रिंजिल्ला नेकुए उत एस्ट एफिकितुर अलिक्वेट. नुल्ला फासिलिसि. फ्यूस्के एट लिगुला विटे लोरेम कर्सस अलिक्वाम. आलिक्वाम अ एराट अ मि बिबेंडम मोलस्टिये. फासेल्लस उत एक्स अ जस्टो डिग्निस्सिम स्केलरिस्क सिट अमेट सेड लिबरो. डुइस एगेस्टास, मि नॉन डापिबुस हेंड्रेरिट, लिबरो नुंक टिन्सीडुंट ऑर्की, इन डिग्निस्सिम एक्स मि अ औगुए. डोनेक सेड नुल्ला इन एलीट ग्राविडा विनेनेटिस एट नॉन औगुए.</p>","ar":"<p>لوريم إيبسوم دولور سيت أميت، كونسكتتور أديبيسينغ إليت. بريسنت فاسيليسيس أنتي أوت بوروس إليفند فيكولا. كراس فيل ديام إليت. نولام سكيلريسكي، نيسي سيد ديغنيسيم فيكولا، سابين لاكوس فرنجيلا أورنا، أت رونكوس إكس لوريم فيتاي ماجنا. نام فيرمينتوم، بوروس سيد كونسكووت فولووتات، لوريم سابين ديكتوم لوريم، فيتاي إويسمود أوغي ريسوس نون مي. إن هاك هابيتاس بلاتيا ديكتومست. دونيك أ أوركي موريس. بيلينتسكي نيك سيم ليبيرو. فيستيبيولوم فرنجيلا نيكوي أوت إيست إفيكيتور أليكويت. نولا فاسيليسي. فوسكي إت ليجولا فيتاي لوريم كورسوس أليكوام. أليكوام أ إيرات أ مي بيبندم مولستيي. فاسيليس أوت إكس أ جوستو ديغنيسيم سكيلريسكي سيت أميت سيد ليبيرو. دويس إيغيتاس، مي نون دابيبوس هندريريت، ليبيرو ننك تنسيدونت أوركي، إن ديغنيسيم إكس مي أ أوغ</p>"}',
                'slug' => 'healthsystemcio-7',
                'is_active' => 1,
                'is_featured' => 0,
                'image' => '/images/doctor_posts/66ebcf94bf469.png',
                'created_at' => '2024-09-19 12:15:32',
                'updated_at' => '2024-09-24 17:26:27',
                'deleted_at' => NULL,
            ),
        ));
        \DB::table('posts')->insert(array (
            0 => 
            array (
                'id' => 8,
                'doctor_id' => 60,
                'clinic_id' => NULL,
                'blog_category_id' => 3,
                'name' => '{"en":"The Healthcare Blog","hi":"क्विज़ प्रतियोगिता","ar":"مسابقة معلومات"}',
                'description' => '{"en":"<p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Praesent facilisis ante ut purus eleifend vehicula. Cras vel diam elit. Nullam scelerisque, nisi sed dignissim vehicula, sapien lacus fringilla urna, at rhoncus ex lorem vitae magna. Nam fermentum, purus sed consequat vulputate, lorem sapien dictum lorem, vitae euismod augue risus non mi. In hac habitasse platea dictumst. Donec a orci mauris. Pellentesque nec sem libero. Vestibulum fringilla neque ut est efficitur aliquet. Nulla facilisi. Fusce et ligula vitae lorem cursus aliquam. Aliquam a erat a mi bibendum molestie. Phasellus ut ex a justo dignissim scelerisque sit amet sed libero. Duis egestas, mi non dapibus hendrerit, libero nunc tincidunt orci, in dignissim ex mi a augue. Donec sed nulla in elit gravida venenatis et non augue. Pellentesque et libero quis lorem convallis viverra. Etiam fermentum sapien turpis, vel posuere velit varius ut.</p>","hi":"<p>लोरेम इप्सम डोलर सिट अमेट, कॉन्सेकट्यूर एडिपिसिंग एलीट. प्रेज़ेंट फसिलिसिस अंते उत पुरुस एलीफेंड व्हीकुला. क्रास वेल डायम एलीट. नुल्लम स्केलरिस्क, निसी सेड डिग्निस्सिम व्हीकुला, सैपियन लकुस फ्रिंजिल्ला उरना, एट रोंकस एक्स लोरेम विटे माग्ना. नाम फेर्मेंटुम, पुरुस सेड कंसक्वाट वुल्पुटेट, लोरेम सैपियन डिक्टम लोरेम, विटे एयूसमोड औगुए रीसस नॉन मी. इन हक हबितास्से प्लाटेआ डिक्टुमस्ट. डोनेक अ ओर्की मौरिस. पेल्लेंटेस्के नेक सेम लिबरो. वेस्टिबुलम फ्रिंजिल्ला नेकुए उत एस्ट एफिकितुर अलिक्वेट. नुल्ला फासिलिसि. फ्यूस्के एट लिगुला विटे लोरेम कर्सस अलिक्वाम. आलिक्वाम अ एराट अ मि बिबेंडम मोलस्टिये. फासेल्लस उत एक्स अ जस्टो डिग्निस्सिम स्केलरिस्क सिट अमेट सेड लिबरो. डुइस एगेस्टास, मि नॉन डापिबुस हेंड्रेरिट, लिबरो नुंक टिन्सीडुंट ऑर्की, इन डिग्निस्सिम एक्स मि अ औगुए. डोनेक सेड नुल्ला इन एलीट ग्राविडा विनेनेटिस एट नॉन औगुए.</p>","ar":"<p>لوريم إيبسوم دولور سيت أميت، كونسكتتور أديبيسينغ إليت. بريسنت فاسيليسيس أنتي أوت بوروس إليفند فيكولا. كراس فيل ديام إليت. نولام سكيلريسكي، نيسي سيد ديغنيسيم فيكولا، سابين لاكوس فرنجيلا أورنا، أت رونكوس إكس لوريم فيتاي ماجنا. نام فيرمينتوم، بوروس سيد كونسكووت فولووتات، لوريم سابين ديكتوم لوريم، فيتاي إويسمود أوغي ريسوس نون مي. إن هاك هابيتاس بلاتيا ديكتومست. دونيك أ أوركي موريس. بيلينتسكي نيك سيم ليبيرو. فيستيبيولوم فرنجيلا نيكوي أوت إيست إفيكيتور أليكويت. نولا فاسيليسي. فوسكي إت ليجولا فيتاي لوريم كورسوس أليكوام. أليكوام أ إيرات أ مي بيبندم مولستيي. فاسيليس أوت إكس أ جوستو ديغنيسيم سكيلريسكي سيت أميت سيد ليبيرو. دويس إيغيتاس، مي نون دابيبوس هندريريت، ليبيرو ننك تنسيدونت أوركي، إن ديغنيسيم إكس مي أ أوغ</p>"}',
                'slug' => 'the-healthcare-blog-8',
                'is_active' => 1,
                'is_featured' => 0,
                'image' => '/images/doctor_posts/66ebd013bb09e.png',
                'created_at' => '2024-09-19 12:17:39',
                'updated_at' => '2024-09-24 17:26:20',
                'deleted_at' => NULL,
            ),
        ));
        \DB::table('posts')->insert(array (
            0 => 
            array (
                'id' => 9,
                'doctor_id' => 60,
                'clinic_id' => NULL,
                'blog_category_id' => 4,
                'name' => '{"en":"Health Information Systems Blog","hi":"सामान्य बुद्धि शिक्षा ब्लॉग","ar":"مدونة التعليم بالمنطق السليم"}',
                'description' => '{"en":"<p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Praesent facilisis ante ut purus eleifend vehicula. Cras vel diam elit. Nullam scelerisque, nisi sed dignissim vehicula, sapien lacus fringilla urna, at rhoncus ex lorem vitae magna. Nam fermentum, purus sed consequat vulputate, lorem sapien dictum lorem, vitae euismod augue risus non mi. In hac habitasse platea dictumst. Donec a orci mauris. Pellentesque nec sem libero. Vestibulum fringilla neque ut est efficitur aliquet. Nulla facilisi. Fusce et ligula vitae lorem cursus aliquam. Aliquam a erat a mi bibendum molestie. Phasellus ut ex a justo dignissim scelerisque sit amet sed libero. Duis egestas, mi non dapibus hendrerit, libero nunc tincidunt orci, in dignissim ex mi a augue. Donec sed nulla in elit gravida venenatis et non augue. Pellentesque et libero quis lorem convallis viverra. Etiam fermentum sapien turpis, vel posuere velit varius ut.</p>","hi":"<p>लोरेम इप्सम डोलर सिट अमेट, कॉन्सेकट्यूर एडिपिसिंग एलीट. प्रेज़ेंट फसिलिसिस अंते उत पुरुस एलीफेंड व्हीकुला. क्रास वेल डायम एलीट. नुल्लम स्केलरिस्क, निसी सेड डिग्निस्सिम व्हीकुला, सैपियन लकुस फ्रिंजिल्ला उरना, एट रोंकस एक्स लोरेम विटे माग्ना. नाम फेर्मेंटुम, पुरुस सेड कंसक्वाट वुल्पुटेट, लोरेम सैपियन डिक्टम लोरेम, विटे एयूसमोड औगुए रीसस नॉन मी. इन हक हबितास्से प्लाटेआ डिक्टुमस्ट. डोनेक अ ओर्की मौरिस. पेल्लेंटेस्के नेक सेम लिबरो. वेस्टिबुलम फ्रिंजिल्ला नेकुए उत एस्ट एफिकितुर अलिक्वेट. नुल्ला फासिलिसि. फ्यूस्के एट लिगुला विटे लोरेम कर्सस अलिक्वाम. आलिक्वाम अ एराट अ मि बिबेंडम मोलस्टिये. फासेल्लस उत एक्स अ जस्टो डिग्निस्सिम स्केलरिस्क सिट अमेट सेड लिबरो. डुइस एगेस्टास, मि नॉन डापिबुस हेंड्रेरिट, लिबरो नुंक टिन्सीडुंट ऑर्की, इन डिग्निस्सिम एक्स मि अ औगुए. डोनेक सेड नुल्ला इन एलीट ग्राविडा विनेनेटिस एट नॉन औगुए.</p>","ar":"<p>لوريم إيبسوم دولور سيت أميت، كونسكتتور أديبيسينغ إليت. بريسنت فاسيليسيس أنتي أوت بوروس إليفند فيكولا. كراس فيل ديام إليت. نولام سكيلريسكي، نيسي سيد ديغنيسيم فيكولا، سابين لاكوس فرنجيلا أورنا، أت رونكوس إكس لوريم فيتاي ماجنا. نام فيرمينتوم، بوروس سيد كونسكووت فولووتات، لوريم سابين ديكتوم لوريم، فيتاي إويسمود أوغي ريسوس نون مي. إن هاك هابيتاس بلاتيا ديكتومست. دونيك أ أوركي موريس. بيلينتسكي نيك سيم ليبيرو. فيستيبيولوم فرنجيلا نيكوي أوت إيست إفيكيتور أليكويت. نولا فاسيليسي. فوسكي إت ليجولا فيتاي لوريم كورسوس أليكوام. أليكوام أ إيرات أ مي بيبندم مولستيي. فاسيليس أوت إكس أ جوستو ديغنيسيم سكيلريسكي سيت أميت سيد ليبيرو. دويس إيغيتاس، مي نون دابيبوس هندريريت، ليبيرو ننك تنسيدونت أوركي، إن ديغنيسيم إكس مي أ أوغ</p>"}',
                'slug' => 'health-information-systems-blog-9',
                'is_active' => 1,
                'is_featured' => 0,
                'image' => '/images/doctor_posts/66ebd08608435.png',
                'created_at' => '2024-09-19 12:19:34',
                'updated_at' => '2024-09-24 17:26:14',
                'deleted_at' => NULL,
            ),
        ));
        \DB::table('posts')->insert(array (
            0 => 
            array (
                'id' => 10,
                'doctor_id' => 62,
                'clinic_id' => NULL,
                'blog_category_id' => 2,
                'name' => '{"en":"HealthCatalyst Blog","hi":"कृत्रिम बुद्धिमत्ता","ar":"علم البيئة"}',
                'description' => '{"en":"<p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Praesent facilisis ante ut purus eleifend vehicula. Cras vel diam elit. Nullam scelerisque, nisi sed dignissim vehicula, sapien lacus fringilla urna, at rhoncus ex lorem vitae magna. Nam fermentum, purus sed consequat vulputate, lorem sapien dictum lorem, vitae euismod augue risus non mi. In hac habitasse platea dictumst. Donec a orci mauris. Pellentesque nec sem libero. Vestibulum fringilla neque ut est efficitur aliquet. Nulla facilisi. Fusce et ligula vitae lorem cursus aliquam. Aliquam a erat a mi bibendum molestie. Phasellus ut ex a justo dignissim scelerisque sit amet sed libero. Duis egestas, mi non dapibus hendrerit, libero nunc tincidunt orci, in dignissim ex mi a augue. Donec sed nulla in elit gravida venenatis et non augue. Pellentesque et libero quis lorem convallis viverra. Etiam fermentum sapien turpis, vel posuere velit varius ut.</p>","hi":"<p>लोरेम इप्सम डोलर सिट अमेट, कॉन्सेकट्यूर एडिपिसिंग एलीट. प्रेज़ेंट फसिलिसिस अंते उत पुरुस एलीफेंड व्हीकुला. क्रास वेल डायम एलीट. नुल्लम स्केलरिस्क, निसी सेड डिग्निस्सिम व्हीकुला, सैपियन लकुस फ्रिंजिल्ला उरना, एट रोंकस एक्स लोरेम विटे माग्ना. नाम फेर्मेंटुम, पुरुस सेड कंसक्वाट वुल्पुटेट, लोरेम सैपियन डिक्टम लोरेम, विटे एयूसमोड औगुए रीसस नॉन मी. इन हक हबितास्से प्लाटेआ डिक्टुमस्ट. डोनेक अ ओर्की मौरिस. पेल्लेंटेस्के नेक सेम लिबरो. वेस्टिबुलम फ्रिंजिल्ला नेकुए उत एस्ट एफिकितुर अलिक्वेट. नुल्ला फासिलिसि. फ्यूस्के एट लिगुला विटे लोरेम कर्सस अलिक्वाम. आलिक्वाम अ एराट अ मि बिबेंडम मोलस्टिये. फासेल्लस उत एक्स अ जस्टो डिग्निस्सिम स्केलरिस्क सिट अमेट सेड लिबरो. डुइस एगेस्टास, मि नॉन डापिबुस हेंड्रेरिट, लिबरो नुंक टिन्सीडुंट ऑर्की, इन डिग्निस्सिम एक्स मि अ औगुए. डोनेक सेड नुल्ला इन एलीट ग्राविडा विनेनेटिस एट नॉन औगुए.</p>","ar":"<p>لوريم إيبسوم دولور سيت أميت، كونسكتتور أديبيسينغ إليت. بريسنت فاسيليسيس أنتي أوت بوروس إليفند فيكولا. كراس فيل ديام إليت. نولام سكيلريسكي، نيسي سيد ديغنيسيم فيكولا، سابين لاكوس فرنجيلا أورنا، أت رونكوس إكس لوريم فيتاي ماجنا. نام فيرمينتوم، بوروس سيد كونسكووت فولووتات، لوريم سابين ديكتوم لوريم، فيتاي إويسمود أوغي ريسوس نون مي. إن هاك هابيتاس بلاتيا ديكتومست. دونيك أ أوركي موريس. بيلينتسكي نيك سيم ليبيرو. فيستيبيولوم فرنجيلا نيكوي أوت إيست إفيكيتور أليكويت. نولا فاسيليسي. فوسكي إت ليجولا فيتاي لوريم كورسوس أليكوام. أليكوام أ إيرات أ مي بيبندم مولستيي. فاسيليس أوت إكس أ جوستو ديغنيسيم سكيلريسكي سيت أميت سيد ليبيرو. دويس إيغيتاس، مي نون دابيبوس هندريريت، ليبيرو ننك تنسيدونت أوركي، إن ديغنيسيم إكس مي أ أوغ</p>"}',
                'slug' => 'healthcatalyst-blog-10',
                'is_active' => 1,
                'is_featured' => 0,
                'image' => '/images/doctor_posts/66ebd0e6ab698.png',
                'created_at' => '2024-09-19 12:21:10',
                'updated_at' => '2024-09-19 12:21:10',
                'deleted_at' => NULL,
            ),
        ));
        \DB::table('posts')->insert(array (
            0 => 
            array (
                'id' => 11,
                'doctor_id' => 62,
                'clinic_id' => NULL,
                'blog_category_id' => 3,
                'name' => '{"en":"Epic Systems Blog","hi":"औद्योगिक डिज़ाइन","ar":"التصميم الصناعي"}',
                'description' => '{"en":"<p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Praesent facilisis ante ut purus eleifend vehicula. Cras vel diam elit. Nullam scelerisque, nisi sed dignissim vehicula, sapien lacus fringilla urna, at rhoncus ex lorem vitae magna. Nam fermentum, purus sed consequat vulputate, lorem sapien dictum lorem, vitae euismod augue risus non mi. In hac habitasse platea dictumst. Donec a orci mauris. Pellentesque nec sem libero. Vestibulum fringilla neque ut est efficitur aliquet. Nulla facilisi. Fusce et ligula vitae lorem cursus aliquam. Aliquam a erat a mi bibendum molestie. Phasellus ut ex a justo dignissim scelerisque sit amet sed libero. Duis egestas, mi non dapibus hendrerit, libero nunc tincidunt orci, in dignissim ex mi a augue. Donec sed nulla in elit gravida venenatis et non augue. Pellentesque et libero quis lorem convallis viverra. Etiam fermentum sapien turpis, vel posuere velit varius ut.</p>","hi":"<p>लोरेम इप्सम डोलर सिट अमेट, कॉन्सेकट्यूर एडिपिसिंग एलीट. प्रेज़ेंट फसिलिसिस अंते उत पुरुस एलीफेंड व्हीकुला. क्रास वेल डायम एलीट. नुल्लम स्केलरिस्क, निसी सेड डिग्निस्सिम व्हीकुला, सैपियन लकुस फ्रिंजिल्ला उरना, एट रोंकस एक्स लोरेम विटे माग्ना. नाम फेर्मेंटुम, पुरुस सेड कंसक्वाट वुल्पुटेट, लोरेम सैपियन डिक्टम लोरेम, विटे एयूसमोड औगुए रीसस नॉन मी. इन हक हबितास्से प्लाटेआ डिक्टुमस्ट. डोनेक अ ओर्की मौरिस. पेल्लेंटेस्के नेक सेम लिबरो. वेस्टिबुलम फ्रिंजिल्ला नेकुए उत एस्ट एफिकितुर अलिक्वेट. नुल्ला फासिलिसि. फ्यूस्के एट लिगुला विटे लोरेम कर्सस अलिक्वाम. आलिक्वाम अ एराट अ मि बिबेंडम मोलस्टिये. फासेल्लस उत एक्स अ जस्टो डिग्निस्सिम स्केलरिस्क सिट अमेट सेड लिबरो. डुइस एगेस्टास, मि नॉन डापिबुस हेंड्रेरिट, लिबरो नुंक टिन्सीडुंट ऑर्की, इन डिग्निस्सिम एक्स मि अ औगुए. डोनेक सेड नुल्ला इन एलीट ग्राविडा विनेनेटिस एट नॉन औगुए.</p>","ar":"<p>لوريم إيبسوم دولور سيت أميت، كونسكتتور أديبيسينغ إليت. بريسنت فاسيليسيس أنتي أوت بوروس إليفند فيكولا. كراس فيل ديام إليت. نولام سكيلريسكي، نيسي سيد ديغنيسيم فيكولا، سابين لاكوس فرنجيلا أورنا، أت رونكوس إكس لوريم فيتاي ماجنا. نام فيرمينتوم، بوروس سيد كونسكووت فولووتات، لوريم سابين ديكتوم لوريم، فيتاي إويسمود أوغي ريسوس نون مي. إن هاك هابيتاس بلاتيا ديكتومست. دونيك أ أوركي موريس. بيلينتسكي نيك سيم ليبيرو. فيستيبيولوم فرنجيلا نيكوي أوت إيست إفيكيتور أليكويت. نولا فاسيليسي. فوسكي إت ليجولا فيتاي لوريم كورسوس أليكوام. أليكوام أ إيرات أ مي بيبندم مولستيي. فاسيليس أوت إكس أ جوستو ديغنيسيم سكيلريسكي سيت أميت سيد ليبيرو. دويس إيغيتاس، مي نون دابيبوس هندريريت، ليبيرو ننك تنسيدونت أوركي، إن ديغنيسيم إكس مي أ أوغ</p>"}',
                'slug' => 'epic-systems-blog-11',
                'is_active' => 1,
                'is_featured' => 0,
                'image' => '/images/doctor_posts/66ebd199215b7.png',
                'created_at' => '2024-09-19 12:24:09',
                'updated_at' => '2024-09-19 12:24:09',
                'deleted_at' => NULL,
            ),
        ));
        \DB::table('posts')->insert(array (
            0 => 
            array (
                'id' => 12,
                'doctor_id' => 62,
                'clinic_id' => NULL,
                'blog_category_id' => 2,
                'name' => '{"en":"EHR Intelligence","hi":"क्विज़ प्रतियोगिता","ar":"مسابقة معلومات"}',
                'description' => '{"en":"<p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Praesent facilisis ante ut purus eleifend vehicula. Cras vel diam elit. Nullam scelerisque, nisi sed dignissim vehicula, sapien lacus fringilla urna, at rhoncus ex lorem vitae magna. Nam fermentum, purus sed consequat vulputate, lorem sapien dictum lorem, vitae euismod augue risus non mi. In hac habitasse platea dictumst. Donec a orci mauris. Pellentesque nec sem libero. Vestibulum fringilla neque ut est efficitur aliquet. Nulla facilisi. Fusce et ligula vitae lorem cursus aliquam. Aliquam a erat a mi bibendum molestie. Phasellus ut ex a justo dignissim scelerisque sit amet sed libero. Duis egestas, mi non dapibus hendrerit, libero nunc tincidunt orci, in dignissim ex mi a augue. Donec sed nulla in elit gravida venenatis et non augue. Pellentesque et libero quis lorem convallis viverra. Etiam fermentum sapien turpis, vel posuere velit varius ut.</p>","hi":"<p>लोरेम इप्सम डोलर सिट अमेट, कॉन्सेकट्यूर एडिपिसिंग एलीट. प्रेज़ेंट फसिलिसिस अंते उत पुरुस एलीफेंड व्हीकुला. क्रास वेल डायम एलीट. नुल्लम स्केलरिस्क, निसी सेड डिग्निस्सिम व्हीकुला, सैपियन लकुस फ्रिंजिल्ला उरना, एट रोंकस एक्स लोरेम विटे माग्ना. नाम फेर्मेंटुम, पुरुस सेड कंसक्वाट वुल्पुटेट, लोरेम सैपियन डिक्टम लोरेम, विटे एयूसमोड औगुए रीसस नॉन मी. इन हक हबितास्से प्लाटेआ डिक्टुमस्ट. डोनेक अ ओर्की मौरिस. पेल्लेंटेस्के नेक सेम लिबरो. वेस्टिबुलम फ्रिंजिल्ला नेकुए उत एस्ट एफिकितुर अलिक्वेट. नुल्ला फासिलिसि. फ्यूस्के एट लिगुला विटे लोरेम कर्सस अलिक्वाम. आलिक्वाम अ एराट अ मि बिबेंडम मोलस्टिये. फासेल्लस उत एक्स अ जस्टो डिग्निस्सिम स्केलरिस्क सिट अमेट सेड लिबरो. डुइस एगेस्टास, मि नॉन डापिबुस हेंड्रेरिट, लिबरो नुंक टिन्सीडुंट ऑर्की, इन डिग्निस्सिम एक्स मि अ औगुए. डोनेक सेड नुल्ला इन एलीट ग्राविडा विनेनेटिस एट नॉन औगुए.</p>","ar":"<p>لوريم إيبسوم دولور سيت أميت، كونسكتتور أديبيسينغ إليت. بريسنت فاسيليسيس أنتي أوت بوروس إليفند فيكولا. كراس فيل ديام إليت. نولام سكيلريسكي، نيسي سيد ديغنيسيم فيكولا، سابين لاكوس فرنجيلا أورنا، أت رونكوس إكس لوريم فيتاي ماجنا. نام فيرمينتوم، بوروس سيد كونسكووت فولووتات، لوريم سابين ديكتوم لوريم، فيتاي إويسمود أوغي ريسوس نون مي. إن هاك هابيتاس بلاتيا ديكتومست. دونيك أ أوركي موريس. بيلينتسكي نيك سيم ليبيرو. فيستيبيولوم فرنجيلا نيكوي أوت إيست إفيكيتور أليكويت. نولا فاسيليسي. فوسكي إت ليجولا فيتاي لوريم كورسوس أليكوام. أليكوام أ إيرات أ مي بيبندم مولستيي. فاسيليس أوت إكس أ جوستو ديغنيسيم سكيلريسكي سيت أميت سيد ليبيرو. دويس إيغيتاس، مي نون دابيبوس هندريريت، ليبيرو ننك تنسيدونت أوركي، إن ديغنيسيم إكس مي أ أوغ</p>"}',
                'slug' => 'ehr-intelligence-12',
                'is_active' => 1,
                'is_featured' => 0,
                'image' => '/images/doctor_posts/66ebd20cd92e8.png',
                'created_at' => '2024-09-19 12:26:04',
                'updated_at' => '2024-09-19 12:26:04',
                'deleted_at' => NULL,
            ),
        ));
        \DB::table('posts')->insert(array (
            0 => 
            array (
                'id' => 13,
                'doctor_id' => 63,
                'clinic_id' => NULL,
                'blog_category_id' => 3,
                'name' => '{"en":"ONC Health IT Blog","hi":"क्विज़ प्रतियोगिता","ar":"الذكاء الاصطناعي"}',
                'description' => '{"en":"<p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Praesent facilisis ante ut purus eleifend vehicula. Cras vel diam elit. Nullam scelerisque, nisi sed dignissim vehicula, sapien lacus fringilla urna, at rhoncus ex lorem vitae magna. Nam fermentum, purus sed consequat vulputate, lorem sapien dictum lorem, vitae euismod augue risus non mi. In hac habitasse platea dictumst. Donec a orci mauris. Pellentesque nec sem libero. Vestibulum fringilla neque ut est efficitur aliquet. Nulla facilisi. Fusce et ligula vitae lorem cursus aliquam. Aliquam a erat a mi bibendum molestie. Phasellus ut ex a justo dignissim scelerisque sit amet sed libero. Duis egestas, mi non dapibus hendrerit, libero nunc tincidunt orci, in dignissim ex mi a augue. Donec sed nulla in elit gravida venenatis et non augue. Pellentesque et libero quis lorem convallis viverra. Etiam fermentum sapien turpis, vel posuere velit varius ut.</p>","hi":"<p>लोरेम इप्सम डोलर सिट अमेट, कॉन्सेकट्यूर एडिपिसिंग एलीट. प्रेज़ेंट फसिलिसिस अंते उत पुरुस एलीफेंड व्हीकुला. क्रास वेल डायम एलीट. नुल्लम स्केलरिस्क, निसी सेड डिग्निस्सिम व्हीकुला, सैपियन लकुस फ्रिंजिल्ला उरना, एट रोंकस एक्स लोरेम विटे माग्ना. नाम फेर्मेंटुम, पुरुस सेड कंसक्वाट वुल्पुटेट, लोरेम सैपियन डिक्टम लोरेम, विटे एयूसमोड औगुए रीसस नॉन मी. इन हक हबितास्से प्लाटेआ डिक्टुमस्ट. डोनेक अ ओर्की मौरिस. पेल्लेंटेस्के नेक सेम लिबरो. वेस्टिबुलम फ्रिंजिल्ला नेकुए उत एस्ट एफिकितुर अलिक्वेट. नुल्ला फासिलिसि. फ्यूस्के एट लिगुला विटे लोरेम कर्सस अलिक्वाम. आलिक्वाम अ एराट अ मि बिबेंडम मोलस्टिये. फासेल्लस उत एक्स अ जस्टो डिग्निस्सिम स्केलरिस्क सिट अमेट सेड लिबरो. डुइस एगेस्टास, मि नॉन डापिबुस हेंड्रेरिट, लिबरो नुंक टिन्सीडुंट ऑर्की, इन डिग्निस्सिम एक्स मि अ औगुए. डोनेक सेड नुल्ला इन एलीट ग्राविडा विनेनेटिस एट नॉन औगुए.</p>","ar":"<p>لوريم إيبسوم دولور سيت أميت، كونسكتتور أديبيسينغ إليت. بريسنت فاسيليسيس أنتي أوت بوروس إليفند فيكولا. كراس فيل ديام إليت. نولام سكيلريسكي، نيسي سيد ديغنيسيم فيكولا، سابين لاكوس فرنجيلا أورنا، أت رونكوس إكس لوريم فيتاي ماجنا. نام فيرمينتوم، بوروس سيد كونسكووت فولووتات، لوريم سابين ديكتوم لوريم، فيتاي إويسمود أوغي ريسوس نون مي. إن هاك هابيتاس بلاتيا ديكتومست. دونيك أ أوركي موريس. بيلينتسكي نيك سيم ليبيرو. فيستيبيولوم فرنجيلا نيكوي أوت إيست إفيكيتور أليكويت. نولا فاسيليسي. فوسكي إت ليجولا فيتاي لوريم كورسوس أليكوام. أليكوام أ إيرات أ مي بيبندم مولستيي. فاسيليس أوت إكس أ جوستو ديغنيسيم سكيلريسكي سيت أميت سيد ليبيرو. دويس إيغيتاس، مي نون دابيبوس هندريريت، ليبيرو ننك تنسيدونت أوركي، إن ديغنيسيم إكس مي أ أوغ</p>"}',
                'slug' => 'onc-health-it-blog-13',
                'is_active' => 1,
                'is_featured' => 0,
                'image' => '/images/doctor_posts/66ebd25e8756f.png',
                'created_at' => '2024-09-19 12:27:26',
                'updated_at' => '2024-09-24 17:24:08',
                'deleted_at' => NULL,
            ),
        ));
        \DB::table('posts')->insert(array (
            0 => 
            array (
                'id' => 14,
                'doctor_id' => 63,
                'clinic_id' => NULL,
                'blog_category_id' => 2,
                'name' => '{"en":"Digital Health","hi":"औद्योगिक डिज़ाइन","ar":"مسابقة معلومات"}',
                'description' => '{"en":"<p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Praesent facilisis ante ut purus eleifend vehicula. Cras vel diam elit. Nullam scelerisque, nisi sed dignissim vehicula, sapien lacus fringilla urna, at rhoncus ex lorem vitae magna. Nam fermentum, purus sed consequat vulputate, lorem sapien dictum lorem, vitae euismod augue risus non mi. In hac habitasse platea dictumst. Donec a orci mauris. Pellentesque nec sem libero. Vestibulum fringilla neque ut est efficitur aliquet. Nulla facilisi. Fusce et ligula vitae lorem cursus aliquam. Aliquam a erat a mi bibendum molestie. Phasellus ut ex a justo dignissim scelerisque sit amet sed libero. Duis egestas, mi non dapibus hendrerit, libero nunc tincidunt orci, in dignissim ex mi a augue. Donec sed nulla in elit gravida venenatis et non augue. Pellentesque et libero quis lorem convallis viverra. Etiam fermentum sapien turpis, vel posuere velit varius ut.</p>","hi":"<p>लोरेम इप्सम डोलर सिट अमेट, कॉन्सेकट्यूर एडिपिसिंग एलीट. प्रेज़ेंट फसिलिसिस अंते उत पुरुस एलीफेंड व्हीकुला. क्रास वेल डायम एलीट. नुल्लम स्केलरिस्क, निसी सेड डिग्निस्सिम व्हीकुला, सैपियन लकुस फ्रिंजिल्ला उरना, एट रोंकस एक्स लोरेम विटे माग्ना. नाम फेर्मेंटुम, पुरुस सेड कंसक्वाट वुल्पुटेट, लोरेम सैपियन डिक्टम लोरेम, विटे एयूसमोड औगुए रीसस नॉन मी. इन हक हबितास्से प्लाटेआ डिक्टुमस्ट. डोनेक अ ओर्की मौरिस. पेल्लेंटेस्के नेक सेम लिबरो. वेस्टिबुलम फ्रिंजिल्ला नेकुए उत एस्ट एफिकितुर अलिक्वेट. नुल्ला फासिलिसि. फ्यूस्के एट लिगुला विटे लोरेम कर्सस अलिक्वाम. आलिक्वाम अ एराट अ मि बिबेंडम मोलस्टिये. फासेल्लस उत एक्स अ जस्टो डिग्निस्सिम स्केलरिस्क सिट अमेट सेड लिबरो. डुइस एगेस्टास, मि नॉन डापिबुस हेंड्रेरिट, लिबरो नुंक टिन्सीडुंट ऑर्की, इन डिग्निस्सिम एक्स मि अ औगुए. डोनेक सेड नुल्ला इन एलीट ग्राविडा विनेनेटिस एट नॉन औगुए.</p>","ar":"<p>لوريم إيبسوم دولور سيت أميت، كونسكتتور أديبيسينغ إليت. بريسنت فاسيليسيس أنتي أوت بوروس إليفند فيكولا. كراس فيل ديام إليت. نولام سكيلريسكي، نيسي سيد ديغنيسيم فيكولا، سابين لاكوس فرنجيلا أورنا، أت رونكوس إكس لوريم فيتاي ماجنا. نام فيرمينتوم، بوروس سيد كونسكووت فولووتات، لوريم سابين ديكتوم لوريم، فيتاي إويسمود أوغي ريسوس نون مي. إن هاك هابيتاس بلاتيا ديكتومست. دونيك أ أوركي موريس. بيلينتسكي نيك سيم ليبيرو. فيستيبيولوم فرنجيلا نيكوي أوت إيست إفيكيتور أليكويت. نولا فاسيليسي. فوسكي إت ليجولا فيتاي لوريم كورسوس أليكوام. أليكوام أ إيرات أ مي بيبندم مولستيي. فاسيليس أوت إكس أ جوستو ديغنيسيم سكيلريسكي سيت أميت سيد ليبيرو. دويس إيغيتاس، مي نون دابيبوس هندريريت، ليبيرو ننك تنسيدونت أوركي، إن ديغنيسيم إكس مي أ أوغ</p>"}',
                'slug' => 'digital-health-14',
                'is_active' => 1,
                'is_featured' => 0,
                'image' => '/images/doctor_posts/66ebd2a6ccd3e.png',
                'created_at' => '2024-09-19 12:28:38',
                'updated_at' => '2024-09-24 17:24:02',
                'deleted_at' => NULL,
            ),
        ));
        \DB::table('posts')->insert(array (
            0 => 
            array (
                'id' => 15,
                'doctor_id' => 63,
                'clinic_id' => NULL,
                'blog_category_id' => 3,
                'name' => '{"en":"Health Affairs Blog","hi":"क्विज़ प्रतियोगिता","ar":"فعالية الخطاب التعليمي"}',
                'description' => '{"en":"<p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Praesent facilisis ante ut purus eleifend vehicula. Cras vel diam elit. Nullam scelerisque, nisi sed dignissim vehicula, sapien lacus fringilla urna, at rhoncus ex lorem vitae magna. Nam fermentum, purus sed consequat vulputate, lorem sapien dictum lorem, vitae euismod augue risus non mi. In hac habitasse platea dictumst. Donec a orci mauris. Pellentesque nec sem libero. Vestibulum fringilla neque ut est efficitur aliquet. Nulla facilisi. Fusce et ligula vitae lorem cursus aliquam. Aliquam a erat a mi bibendum molestie. Phasellus ut ex a justo dignissim scelerisque sit amet sed libero. Duis egestas, mi non dapibus hendrerit, libero nunc tincidunt orci, in dignissim ex mi a augue. Donec sed nulla in elit gravida venenatis et non augue. Pellentesque et libero quis lorem convallis viverra. Etiam fermentum sapien turpis, vel posuere velit varius ut.</p>","hi":"<p>लोरेम इप्सम डोलर सिट अमेट, कॉन्सेकट्यूर एडिपिसिंग एलीट. प्रेज़ेंट फसिलिसिस अंते उत पुरुस एलीफेंड व्हीकुला. क्रास वेल डायम एलीट. नुल्लम स्केलरिस्क, निसी सेड डिग्निस्सिम व्हीकुला, सैपियन लकुस फ्रिंजिल्ला उरना, एट रोंकस एक्स लोरेम विटे माग्ना. नाम फेर्मेंटुम, पुरुस सेड कंसक्वाट वुल्पुटेट, लोरेम सैपियन डिक्टम लोरेम, विटे एयूसमोड औगुए रीसस नॉन मी. इन हक हबितास्से प्लाटेआ डिक्टुमस्ट. डोनेक अ ओर्की मौरिस. पेल्लेंटेस्के नेक सेम लिबरो. वेस्टिबुलम फ्रिंजिल्ला नेकुए उत एस्ट एफिकितुर अलिक्वेट. नुल्ला फासिलिसि. फ्यूस्के एट लिगुला विटे लोरेम कर्सस अलिक्वाम. आलिक्वाम अ एराट अ मि बिबेंडम मोलस्टिये. फासेल्लस उत एक्स अ जस्टो डिग्निस्सिम स्केलरिस्क सिट अमेट सेड लिबरो. डुइस एगेस्टास, मि नॉन डापिबुस हेंड्रेरिट, लिबरो नुंक टिन्सीडुंट ऑर्की, इन डिग्निस्सिम एक्स मि अ औगुए. डोनेक सेड नुल्ला इन एलीट ग्राविडा विनेनेटिस एट नॉन औगुए.</p>","ar":"<p>لوريم إيبسوم دولور سيت أميت، كونسكتتور أديبيسينغ إليت. بريسنت فاسيليسيس أنتي أوت بوروس إليفند فيكولا. كراس فيل ديام إليت. نولام سكيلريسكي، نيسي سيد ديغنيسيم فيكولا، سابين لاكوس فرنجيلا أورنا، أت رونكوس إكس لوريم فيتاي ماجنا. نام فيرمينتوم، بوروس سيد كونسكووت فولووتات، لوريم سابين ديكتوم لوريم، فيتاي إويسمود أوغي ريسوس نون مي. إن هاك هابيتاس بلاتيا ديكتومست. دونيك أ أوركي موريس. بيلينتسكي نيك سيم ليبيرو. فيستيبيولوم فرنجيلا نيكوي أوت إيست إفيكيتور أليكويت. نولا فاسيليسي. فوسكي إت ليجولا فيتاي لوريم كورسوس أليكوام. أليكوام أ إيرات أ مي بيبندم مولستيي. فاسيليس أوت إكس أ جوستو ديغنيسيم سكيلريسكي سيت أميت سيد ليبيرو. دويس إيغيتاس، مي نون دابيبوس هندريريت، ليبيرو ننك تنسيدونت أوركي، إن ديغنيسيم إكس مي أ أوغ</p>"}',
                'slug' => 'health-affairs-blog-15',
                'is_active' => 1,
                'is_featured' => 0,
                'image' => '/images/doctor_posts/66ebd2fc37680.png',
                'created_at' => '2024-09-19 12:30:04',
                'updated_at' => '2024-09-24 17:23:55',
                'deleted_at' => NULL,
            ),
        ));
        \DB::table('posts')->insert(array (
            0 => 
            array (
                'id' => 16,
                'doctor_id' => 64,
                'clinic_id' => NULL,
                'blog_category_id' => 1,
                'name' => '{"en":"EMR & HIPAA","hi":"क्विज़ प्रतियोगिता","ar":"علم البيئة"}',
                'description' => '{"en":"<p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Praesent facilisis ante ut purus eleifend vehicula. Cras vel diam elit. Nullam scelerisque, nisi sed dignissim vehicula, sapien lacus fringilla urna, at rhoncus ex lorem vitae magna. Nam fermentum, purus sed consequat vulputate, lorem sapien dictum lorem, vitae euismod augue risus non mi. In hac habitasse platea dictumst. Donec a orci mauris. Pellentesque nec sem libero. Vestibulum fringilla neque ut est efficitur aliquet. Nulla facilisi. Fusce et ligula vitae lorem cursus aliquam. Aliquam a erat a mi bibendum molestie. Phasellus ut ex a justo dignissim scelerisque sit amet sed libero. Duis egestas, mi non dapibus hendrerit, libero nunc tincidunt orci, in dignissim ex mi a augue. Donec sed nulla in elit gravida venenatis et non augue. Pellentesque et libero quis lorem convallis viverra. Etiam fermentum sapien turpis, vel posuere velit varius ut.</p>","hi":"<p>लोरेम इप्सम डोलर सिट अमेट, कॉन्सेकट्यूर एडिपिसिंग एलीट. प्रेज़ेंट फसिलिसिस अंते उत पुरुस एलीफेंड व्हीकुला. क्रास वेल डायम एलीट. नुल्लम स्केलरिस्क, निसी सेड डिग्निस्सिम व्हीकुला, सैपियन लकुस फ्रिंजिल्ला उरना, एट रोंकस एक्स लोरेम विटे माग्ना. नाम फेर्मेंटुम, पुरुस सेड कंसक्वाट वुल्पुटेट, लोरेम सैपियन डिक्टम लोरेम, विटे एयूसमोड औगुए रीसस नॉन मी. इन हक हबितास्से प्लाटेआ डिक्टुमस्ट. डोनेक अ ओर्की मौरिस. पेल्लेंटेस्के नेक सेम लिबरो. वेस्टिबुलम फ्रिंजिल्ला नेकुए उत एस्ट एफिकितुर अलिक्वेट. नुल्ला फासिलिसि. फ्यूस्के एट लिगुला विटे लोरेम कर्सस अलिक्वाम. आलिक्वाम अ एराट अ मि बिबेंडम मोलस्टिये. फासेल्लस उत एक्स अ जस्टो डिग्निस्सिम स्केलरिस्क सिट अमेट सेड लिबरो. डुइस एगेस्टास, मि नॉन डापिबुस हेंड्रेरिट, लिबरो नुंक टिन्सीडुंट ऑर्की, इन डिग्निस्सिम एक्स मि अ औगुए. डोनेक सेड नुल्ला इन एलीट ग्राविडा विनेनेटिस एट नॉन औगुए.</p>","ar":"<p>لوريم إيبسوم دولور سيت أميت، كونسكتتور أديبيسينغ إليت. بريسنت فاسيليسيس أنتي أوت بوروس إليفند فيكولا. كراس فيل ديام إليت. نولام سكيلريسكي، نيسي سيد ديغنيسيم فيكولا، سابين لاكوس فرنجيلا أورنا، أت رونكوس إكس لوريم فيتاي ماجنا. نام فيرمينتوم، بوروس سيد كونسكووت فولووتات، لوريم سابين ديكتوم لوريم، فيتاي إويسمود أوغي ريسوس نون مي. إن هاك هابيتاس بلاتيا ديكتومست. دونيك أ أوركي موريس. بيلينتسكي نيك سيم ليبيرو. فيستيبيولوم فرنجيلا نيكوي أوت إيست إفيكيتور أليكويت. نولا فاسيليسي. فوسكي إت ليجولا فيتاي لوريم كورسوس أليكوام. أليكوام أ إيرات أ مي بيبندم مولستيي. فاسيليس أوت إكس أ جوستو ديغنيسيم سكيلريسكي سيت أميت سيد ليبيرو. دويس إيغيتاس، مي نون دابيبوس هندريريت، ليبيرو ننك تنسيدونت أوركي، إن ديغنيسيم إكس مي أ أوغ</p>"}',
                'slug' => 'emr-hipaa-16',
                'is_active' => 1,
                'is_featured' => 0,
                'image' => '/images/doctor_posts/66ebd37731954.png',
                'created_at' => '2024-09-19 12:32:07',
                'updated_at' => '2024-09-19 12:32:07',
                'deleted_at' => NULL,
            ),
        ));
        \DB::table('posts')->insert(array (
            0 => 
            array (
                'id' => 17,
                'doctor_id' => 64,
                'clinic_id' => NULL,
                'blog_category_id' => 1,
                'name' => '{"en":"Cerner Blog","hi":"पारिस्थितिकी","ar":"فعالية الخطاب التعليمي"}',
                'description' => '{"en":"<p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Praesent facilisis ante ut purus eleifend vehicula. Cras vel diam elit. Nullam scelerisque, nisi sed dignissim vehicula, sapien lacus fringilla urna, at rhoncus ex lorem vitae magna. Nam fermentum, purus sed consequat vulputate, lorem sapien dictum lorem, vitae euismod augue risus non mi. In hac habitasse platea dictumst. Donec a orci mauris. Pellentesque nec sem libero. Vestibulum fringilla neque ut est efficitur aliquet. Nulla facilisi. Fusce et ligula vitae lorem cursus aliquam. Aliquam a erat a mi bibendum molestie. Phasellus ut ex a justo dignissim scelerisque sit amet sed libero. Duis egestas, mi non dapibus hendrerit, libero nunc tincidunt orci, in dignissim ex mi a augue. Donec sed nulla in elit gravida venenatis et non augue. Pellentesque et libero quis lorem convallis viverra. Etiam fermentum sapien turpis, vel posuere velit varius ut.</p>","hi":"<p>लोरेम इप्सम डोलर सिट अमेट, कॉन्सेकट्यूर एडिपिसिंग एलीट. प्रेज़ेंट फसिलिसिस अंते उत पुरुस एलीफेंड व्हीकुला. क्रास वेल डायम एलीट. नुल्लम स्केलरिस्क, निसी सेड डिग्निस्सिम व्हीकुला, सैपियन लकुस फ्रिंजिल्ला उरना, एट रोंकस एक्स लोरेम विटे माग्ना. नाम फेर्मेंटुम, पुरुस सेड कंसक्वाट वुल्पुटेट, लोरेम सैपियन डिक्टम लोरेम, विटे एयूसमोड औगुए रीसस नॉन मी. इन हक हबितास्से प्लाटेआ डिक्टुमस्ट. डोनेक अ ओर्की मौरिस. पेल्लेंटेस्के नेक सेम लिबरो. वेस्टिबुलम फ्रिंजिल्ला नेकुए उत एस्ट एफिकितुर अलिक्वेट. नुल्ला फासिलिसि. फ्यूस्के एट लिगुला विटे लोरेम कर्सस अलिक्वाम. आलिक्वाम अ एराट अ मि बिबेंडम मोलस्टिये. फासेल्लस उत एक्स अ जस्टो डिग्निस्सिम स्केलरिस्क सिट अमेट सेड लिबरो. डुइस एगेस्टास, मि नॉन डापिबुस हेंड्रेरिट, लिबरो नुंक टिन्सीडुंट ऑर्की, इन डिग्निस्सिम एक्स मि अ औगुए. डोनेक सेड नुल्ला इन एलीट ग्राविडा विनेनेटिस एट नॉन औगुए.</p>","ar":"<p>لوريم إيبسوم دولور سيت أميت، كونسكتتور أديبيسينغ إليت. بريسنت فاسيليسيس أنتي أوت بوروس إليفند فيكولا. كراس فيل ديام إليت. نولام سكيلريسكي، نيسي سيد ديغنيسيم فيكولا، سابين لاكوس فرنجيلا أورنا، أت رونكوس إكس لوريم فيتاي ماجنا. نام فيرمينتوم، بوروس سيد كونسكووت فولووتات، لوريم سابين ديكتوم لوريم، فيتاي إويسمود أوغي ريسوس نون مي. إن هاك هابيتاس بلاتيا ديكتومست. دونيك أ أوركي موريس. بيلينتسكي نيك سيم ليبيرو. فيستيبيولوم فرنجيلا نيكوي أوت إيست إفيكيتور أليكويت. نولا فاسيليسي. فوسكي إت ليجولا فيتاي لوريم كورسوس أليكوام. أليكوام أ إيرات أ مي بيبندم مولستيي. فاسيليس أوت إكس أ جوستو ديغنيسيم سكيلريسكي سيت أميت سيد ليبيرو. دويس إيغيتاس، مي نون دابيبوس هندريريت، ليبيرو ننك تنسيدونت أوركي، إن ديغنيسيم إكس مي أ أوغ</p>"}',
                'slug' => 'cerner-blog-17',
                'is_active' => 1,
                'is_featured' => 0,
                'image' => '/images/doctor_posts/66ebd3d60e1ca.png',
                'created_at' => '2024-09-19 12:33:42',
                'updated_at' => '2024-09-19 12:33:42',
                'deleted_at' => NULL,
            ),
        ));
        \DB::table('posts')->insert(array (
            0 => 
            array (
                'id' => 18,
                'doctor_id' => 64,
                'clinic_id' => NULL,
                'blog_category_id' => 3,
                'name' => '{"en":"MobiHealthNews","hi":"सामान्य बुद्धि शिक्षा ब्लॉग","ar":"مسابقة معلومات"}',
                'description' => '{"en":"<p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Praesent facilisis ante ut purus eleifend vehicula. Cras vel diam elit. Nullam scelerisque, nisi sed dignissim vehicula, sapien lacus fringilla urna, at rhoncus ex lorem vitae magna. Nam fermentum, purus sed consequat vulputate, lorem sapien dictum lorem, vitae euismod augue risus non mi. In hac habitasse platea dictumst. Donec a orci mauris. Pellentesque nec sem libero. Vestibulum fringilla neque ut est efficitur aliquet. Nulla facilisi. Fusce et ligula vitae lorem cursus aliquam. Aliquam a erat a mi bibendum molestie. Phasellus ut ex a justo dignissim scelerisque sit amet sed libero. Duis egestas, mi non dapibus hendrerit, libero nunc tincidunt orci, in dignissim ex mi a augue. Donec sed nulla in elit gravida venenatis et non augue. Pellentesque et libero quis lorem convallis viverra. Etiam fermentum sapien turpis, vel posuere velit varius ut.</p>","hi":"<p>लोरेम इप्सम डोलर सिट अमेट, कॉन्सेकट्यूर एडिपिसिंग एलीट. प्रेज़ेंट फसिलिसिस अंते उत पुरुस एलीफेंड व्हीकुला. क्रास वेल डायम एलीट. नुल्लम स्केलरिस्क, निसी सेड डिग्निस्सिम व्हीकुला, सैपियन लकुस फ्रिंजिल्ला उरना, एट रोंकस एक्स लोरेम विटे माग्ना. नाम फेर्मेंटुम, पुरुस सेड कंसक्वाट वुल्पुटेट, लोरेम सैपियन डिक्टम लोरेम, विटे एयूसमोड औगुए रीसस नॉन मी. इन हक हबितास्से प्लाटेआ डिक्टुमस्ट. डोनेक अ ओर्की मौरिस. पेल्लेंटेस्के नेक सेम लिबरो. वेस्टिबुलम फ्रिंजिल्ला नेकुए उत एस्ट एफिकितुर अलिक्वेट. नुल्ला फासिलिसि. फ्यूस्के एट लिगुला विटे लोरेम कर्सस अलिक्वाम. आलिक्वाम अ एराट अ मि बिबेंडम मोलस्टिये. फासेल्लस उत एक्स अ जस्टो डिग्निस्सिम स्केलरिस्क सिट अमेट सेड लिबरो. डुइस एगेस्टास, मि नॉन डापिबुस हेंड्रेरिट, लिबरो नुंक टिन्सीडुंट ऑर्की, इन डिग्निस्सिम एक्स मि अ औगुए. डोनेक सेड नुल्ला इन एलीट ग्राविडा विनेनेटिस एट नॉन औगुए.</p>","ar":"<p>لوريم إيبسوم دولور سيت أميت، كونسكتتور أديبيسينغ إليت. بريسنت فاسيليسيس أنتي أوت بوروس إليفند فيكولا. كراس فيل ديام إليت. نولام سكيلريسكي، نيسي سيد ديغنيسيم فيكولا، سابين لاكوس فرنجيلا أورنا، أت رونكوس إكس لوريم فيتاي ماجنا. نام فيرمينتوم، بوروس سيد كونسكووت فولووتات، لوريم سابين ديكتوم لوريم، فيتاي إويسمود أوغي ريسوس نون مي. إن هاك هابيتاس بلاتيا ديكتومست. دونيك أ أوركي موريس. بيلينتسكي نيك سيم ليبيرو. فيستيبيولوم فرنجيلا نيكوي أوت إيست إفيكيتور أليكويت. نولا فاسيليسي. فوسكي إت ليجولا فيتاي لوريم كورسوس أليكوام. أليكوام أ إيرات أ مي بيبندم مولستيي. فاسيليس أوت إكس أ جوستو ديغنيسيم سكيلريسكي سيت أميت سيد ليبيرو. دويس إيغيتاس، مي نون دابيبوس هندريريت، ليبيرو ننك تنسيدونت أوركي، إن ديغنيسيم إكس مي أ أوغ</p>"}',
                'slug' => 'mobihealthnews-18',
                'is_active' => 1,
                'is_featured' => 0,
                'image' => '/images/doctor_posts/66ebd45658c15.png',
                'created_at' => '2024-09-19 12:35:50',
                'updated_at' => '2024-09-19 12:35:50',
                'deleted_at' => NULL,
            ),
        ));
        \DB::table('posts')->insert(array (
            0 => 
            array (
                'id' => 19,
                'doctor_id' => 65,
                'clinic_id' => NULL,
                'blog_category_id' => 2,
                'name' => '{"en":"Health Data Management","hi":"क्विज़ प्रतियोगिता","ar":"فعالية الخطاب التعليمي"}',
                'description' => '{"en":"<p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Praesent facilisis ante ut purus eleifend vehicula. Cras vel diam elit. Nullam scelerisque, nisi sed dignissim vehicula, sapien lacus fringilla urna, at rhoncus ex lorem vitae magna. Nam fermentum, purus sed consequat vulputate, lorem sapien dictum lorem, vitae euismod augue risus non mi. In hac habitasse platea dictumst. Donec a orci mauris. Pellentesque nec sem libero. Vestibulum fringilla neque ut est efficitur aliquet. Nulla facilisi. Fusce et ligula vitae lorem cursus aliquam. Aliquam a erat a mi bibendum molestie. Phasellus ut ex a justo dignissim scelerisque sit amet sed libero. Duis egestas, mi non dapibus hendrerit, libero nunc tincidunt orci, in dignissim ex mi a augue. Donec sed nulla in elit gravida venenatis et non augue. Pellentesque et libero quis lorem convallis viverra. Etiam fermentum sapien turpis, vel posuere velit varius ut.</p>","hi":"<p>लोरेम इप्सम डोलर सिट अमेट, कॉन्सेकट्यूर एडिपिसिंग एलीट. प्रेज़ेंट फसिलिसिस अंते उत पुरुस एलीफेंड व्हीकुला. क्रास वेल डायम एलीट. नुल्लम स्केलरिस्क, निसी सेड डिग्निस्सिम व्हीकुला, सैपियन लकुस फ्रिंजिल्ला उरना, एट रोंकस एक्स लोरेम विटे माग्ना. नाम फेर्मेंटुम, पुरुस सेड कंसक्वाट वुल्पुटेट, लोरेम सैपियन डिक्टम लोरेम, विटे एयूसमोड औगुए रीसस नॉन मी. इन हक हबितास्से प्लाटेआ डिक्टुमस्ट. डोनेक अ ओर्की मौरिस. पेल्लेंटेस्के नेक सेम लिबरो. वेस्टिबुलम फ्रिंजिल्ला नेकुए उत एस्ट एफिकितुर अलिक्वेट. नुल्ला फासिलिसि. फ्यूस्के एट लिगुला विटे लोरेम कर्सस अलिक्वाम. आलिक्वाम अ एराट अ मि बिबेंडम मोलस्टिये. फासेल्लस उत एक्स अ जस्टो डिग्निस्सिम स्केलरिस्क सिट अमेट सेड लिबरो. डुइस एगेस्टास, मि नॉन डापिबुस हेंड्रेरिट, लिबरो नुंक टिन्सीडुंट ऑर्की, इन डिग्निस्सिम एक्स मि अ औगुए. डोनेक सेड नुल्ला इन एलीट ग्राविडा विनेनेटिस एट नॉन औगुए.</p>","ar":"<p>لوريم إيبسوم دولور سيت أميت، كونسكتتور أديبيسينغ إليت. بريسنت فاسيليسيس أنتي أوت بوروس إليفند فيكولا. كراس فيل ديام إليت. نولام سكيلريسكي، نيسي سيد ديغنيسيم فيكولا، سابين لاكوس فرنجيلا أورنا، أت رونكوس إكس لوريم فيتاي ماجنا. نام فيرمينتوم، بوروس سيد كونسكووت فولووتات، لوريم سابين ديكتوم لوريم، فيتاي إويسمود أوغي ريسوس نون مي. إن هاك هابيتاس بلاتيا ديكتومست. دونيك أ أوركي موريس. بيلينتسكي نيك سيم ليبيرو. فيستيبيولوم فرنجيلا نيكوي أوت إيست إفيكيتور أليكويت. نولا فاسيليسي. فوسكي إت ليجولا فيتاي لوريم كورسوس أليكوام. أليكوام أ إيرات أ مي بيبندم مولستيي. فاسيليس أوت إكس أ جوستو ديغنيسيم سكيلريسكي سيت أميت سيد ليبيرو. دويس إيغيتاس، مي نون دابيبوس هندريريت، ليبيرو ننك تنسيدونت أوركي، إن ديغنيسيم إكس مي أ أوغ</p>"}',
                'slug' => 'health-data-management-19',
                'is_active' => 1,
                'is_featured' => 0,
                'image' => '/images/doctor_posts/66ebd4b6678ca.png',
                'created_at' => '2024-09-19 12:37:26',
                'updated_at' => '2024-09-19 12:37:26',
                'deleted_at' => NULL,
            ),
        ));
        \DB::table('posts')->insert(array (
            0 => 
            array (
                'id' => 20,
                'doctor_id' => 65,
                'clinic_id' => NULL,
                'blog_category_id' => 4,
                'name' => '{"en":"Healthcare IT Leaders","hi":"औद्योगिक डिज़ाइन","ar":"التصميم الصناعي"}',
                'description' => '{"en":"<p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Praesent facilisis ante ut purus eleifend vehicula. Cras vel diam elit. Nullam scelerisque, nisi sed dignissim vehicula, sapien lacus fringilla urna, at rhoncus ex lorem vitae magna. Nam fermentum, purus sed consequat vulputate, lorem sapien dictum lorem, vitae euismod augue risus non mi. In hac habitasse platea dictumst. Donec a orci mauris. Pellentesque nec sem libero. Vestibulum fringilla neque ut est efficitur aliquet. Nulla facilisi. Fusce et ligula vitae lorem cursus aliquam. Aliquam a erat a mi bibendum molestie. Phasellus ut ex a justo dignissim scelerisque sit amet sed libero. Duis egestas, mi non dapibus hendrerit, libero nunc tincidunt orci, in dignissim ex mi a augue. Donec sed nulla in elit gravida venenatis et non augue. Pellentesque et libero quis lorem convallis viverra. Etiam fermentum sapien turpis, vel posuere velit varius ut.</p>","hi":"<p>लोरेम इप्सम डोलर सिट अमेट, कॉन्सेकट्यूर एडिपिसिंग एलीट. प्रेज़ेंट फसिलिसिस अंते उत पुरुस एलीफेंड व्हीकुला. क्रास वेल डायम एलीट. नुल्लम स्केलरिस्क, निसी सेड डिग्निस्सिम व्हीकुला, सैपियन लकुस फ्रिंजिल्ला उरना, एट रोंकस एक्स लोरेम विटे माग्ना. नाम फेर्मेंटुम, पुरुस सेड कंसक्वाट वुल्पुटेट, लोरेम सैपियन डिक्टम लोरेम, विटे एयूसमोड औगुए रीसस नॉन मी. इन हक हबितास्से प्लाटेआ डिक्टुमस्ट. डोनेक अ ओर्की मौरिस. पेल्लेंटेस्के नेक सेम लिबरो. वेस्टिबुलम फ्रिंजिल्ला नेकुए उत एस्ट एफिकितुर अलिक्वेट. नुल्ला फासिलिसि. फ्यूस्के एट लिगुला विटे लोरेम कर्सस अलिक्वाम. आलिक्वाम अ एराट अ मि बिबेंडम मोलस्टिये. फासेल्लस उत एक्स अ जस्टो डिग्निस्सिम स्केलरिस्क सिट अमेट सेड लिबरो. डुइस एगेस्टास, मि नॉन डापिबुस हेंड्रेरिट, लिबरो नुंक टिन्सीडुंट ऑर्की, इन डिग्निस्सिम एक्स मि अ औगुए. डोनेक सेड नुल्ला इन एलीट ग्राविडा विनेनेटिस एट नॉन औगुए.</p>","ar":"<p>لوريم إيبسوم دولور سيت أميت، كونسكتتور أديبيسينغ إليت. بريسنت فاسيليسيس أنتي أوت بوروس إليفند فيكولا. كراس فيل ديام إليت. نولام سكيلريسكي، نيسي سيد ديغنيسيم فيكولا، سابين لاكوس فرنجيلا أورنا، أت رونكوس إكس لوريم فيتاي ماجنا. نام فيرمينتوم، بوروس سيد كونسكووت فولووتات، لوريم سابين ديكتوم لوريم، فيتاي إويسمود أوغي ريسوس نون مي. إن هاك هابيتاس بلاتيا ديكتومست. دونيك أ أوركي موريس. بيلينتسكي نيك سيم ليبيرو. فيستيبيولوم فرنجيلا نيكوي أوت إيست إفيكيتور أليكويت. نولا فاسيليسي. فوسكي إت ليجولا فيتاي لوريم كورسوس أليكوام. أليكوام أ إيرات أ مي بيبندم مولستيي. فاسيليس أوت إكس أ جوستو ديغنيسيم سكيلريسكي سيت أميت سيد ليبيرو. دويس إيغيتاس، مي نون دابيبوس هندريريت، ليبيرو ننك تنسيدونت أوركي، إن ديغنيسيم إكس مي أ أوغ</p>"}',
                'slug' => 'healthcare-it-leaders-20',
                'is_active' => 1,
                'is_featured' => 0,
                'image' => '/images/doctor_posts/66ebd4dfaab48.png',
                'created_at' => '2024-09-19 12:38:07',
                'updated_at' => '2024-09-19 12:38:07',
                'deleted_at' => NULL,
            ),
        ));
        \DB::table('posts')->insert(array (
            0 => 
            array (
                'id' => 21,
                'doctor_id' => 65,
                'clinic_id' => NULL,
                'blog_category_id' => 2,
                'name' => '{"en":"MedGadget","hi":"क्विज़ प्रतियोगिता","ar":"علم البيئة"}',
                'description' => '{"en":"<p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Praesent facilisis ante ut purus eleifend vehicula. Cras vel diam elit. Nullam scelerisque, nisi sed dignissim vehicula, sapien lacus fringilla urna, at rhoncus ex lorem vitae magna. Nam fermentum, purus sed consequat vulputate, lorem sapien dictum lorem, vitae euismod augue risus non mi. In hac habitasse platea dictumst. Donec a orci mauris. Pellentesque nec sem libero. Vestibulum fringilla neque ut est efficitur aliquet. Nulla facilisi. Fusce et ligula vitae lorem cursus aliquam. Aliquam a erat a mi bibendum molestie. Phasellus ut ex a justo dignissim scelerisque sit amet sed libero. Duis egestas, mi non dapibus hendrerit, libero nunc tincidunt orci, in dignissim ex mi a augue. Donec sed nulla in elit gravida venenatis et non augue. Pellentesque et libero quis lorem convallis viverra. Etiam fermentum sapien turpis, vel posuere velit varius ut.</p>","hi":"<p>लोरेम इप्सम डोलर सिट अमेट, कॉन्सेकट्यूर एडिपिसिंग एलीट. प्रेज़ेंट फसिलिसिस अंते उत पुरुस एलीफेंड व्हीकुला. क्रास वेल डायम एलीट. नुल्लम स्केलरिस्क, निसी सेड डिग्निस्सिम व्हीकुला, सैपियन लकुस फ्रिंजिल्ला उरना, एट रोंकस एक्स लोरेम विटे माग्ना. नाम फेर्मेंटुम, पुरुस सेड कंसक्वाट वुल्पुटेट, लोरेम सैपियन डिक्टम लोरेम, विटे एयूसमोड औगुए रीसस नॉन मी. इन हक हबितास्से प्लाटेआ डिक्टुमस्ट. डोनेक अ ओर्की मौरिस. पेल्लेंटेस्के नेक सेम लिबरो. वेस्टिबुलम फ्रिंजिल्ला नेकुए उत एस्ट एफिकितुर अलिक्वेट. नुल्ला फासिलिसि. फ्यूस्के एट लिगुला विटे लोरेम कर्सस अलिक्वाम. आलिक्वाम अ एराट अ मि बिबेंडम मोलस्टिये. फासेल्लस उत एक्स अ जस्टो डिग्निस्सिम स्केलरिस्क सिट अमेट सेड लिबरो. डुइस एगेस्टास, मि नॉन डापिबुस हेंड्रेरिट, लिबरो नुंक टिन्सीडुंट ऑर्की, इन डिग्निस्सिम एक्स मि अ औगुए. डोनेक सेड नुल्ला इन एलीट ग्राविडा विनेनेटिस एट नॉन औगुए.</p>","ar":"<p>لوريم إيبسوم دولور سيت أميت، كونسكتتور أديبيسينغ إليت. بريسنت فاسيليسيس أنتي أوت بوروس إليفند فيكولا. كراس فيل ديام إليت. نولام سكيلريسكي، نيسي سيد ديغنيسيم فيكولا، سابين لاكوس فرنجيلا أورنا، أت رونكوس إكس لوريم فيتاي ماجنا. نام فيرمينتوم، بوروس سيد كونسكووت فولووتات، لوريم سابين ديكتوم لوريم، فيتاي إويسمود أوغي ريسوس نون مي. إن هاك هابيتاس بلاتيا ديكتومست. دونيك أ أوركي موريس. بيلينتسكي نيك سيم ليبيرو. فيستيبيولوم فرنجيلا نيكوي أوت إيست إفيكيتور أليكويت. نولا فاسيليسي. فوسكي إت ليجولا فيتاي لوريم كورسوس أليكوام. أليكوام أ إيرات أ مي بيبندم مولستيي. فاسيليس أوت إكس أ جوستو ديغنيسيم سكيلريسكي سيت أميت سيد ليبيرو. دويس إيغيتاس، مي نون دابيبوس هندريريت، ليبيرو ننك تنسيدونت أوركي، إن ديغنيسيم إكس مي أ أوغ</p>"}',
                'slug' => 'medgadget-21',
                'is_active' => 1,
                'is_featured' => 0,
                'image' => '/images/doctor_posts/66ebd50406148.png',
                'created_at' => '2024-09-19 12:38:44',
                'updated_at' => '2024-09-19 12:38:44',
                'deleted_at' => NULL,
            ),
        ));
        \DB::table('posts')->insert(array (
            0 => 
            array (
                'id' => 22,
                'doctor_id' => 66,
                'clinic_id' => NULL,
                'blog_category_id' => 2,
                'name' => '{"en":"Health Information Systems Blog","hi":"औद्योगिक डिज़ाइन","ar":"مدونة التعليم بالمنطق السليم"}',
                'description' => '{"en":"<p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Praesent facilisis ante ut purus eleifend vehicula. Cras vel diam elit. Nullam scelerisque, nisi sed dignissim vehicula, sapien lacus fringilla urna, at rhoncus ex lorem vitae magna. Nam fermentum, purus sed consequat vulputate, lorem sapien dictum lorem, vitae euismod augue risus non mi. In hac habitasse platea dictumst. Donec a orci mauris. Pellentesque nec sem libero. Vestibulum fringilla neque ut est efficitur aliquet. Nulla facilisi. Fusce et ligula vitae lorem cursus aliquam. Aliquam a erat a mi bibendum molestie. Phasellus ut ex a justo dignissim scelerisque sit amet sed libero. Duis egestas, mi non dapibus hendrerit, libero nunc tincidunt orci, in dignissim ex mi a augue. Donec sed nulla in elit gravida venenatis et non augue. Pellentesque et libero quis lorem convallis viverra. Etiam fermentum sapien turpis, vel posuere velit varius ut.</p>","hi":"<p>लोरेम इप्सम डोलर सिट अमेट, कॉन्सेकट्यूर एडिपिसिंग एलीट. प्रेज़ेंट फसिलिसिस अंते उत पुरुस एलीफेंड व्हीकुला. क्रास वेल डायम एलीट. नुल्लम स्केलरिस्क, निसी सेड डिग्निस्सिम व्हीकुला, सैपियन लकुस फ्रिंजिल्ला उरना, एट रोंकस एक्स लोरेम विटे माग्ना. नाम फेर्मेंटुम, पुरुस सेड कंसक्वाट वुल्पुटेट, लोरेम सैपियन डिक्टम लोरेम, विटे एयूसमोड औगुए रीसस नॉन मी. इन हक हबितास्से प्लाटेआ डिक्टुमस्ट. डोनेक अ ओर्की मौरिस. पेल्लेंटेस्के नेक सेम लिबरो. वेस्टिबुलम फ्रिंजिल्ला नेकुए उत एस्ट एफिकितुर अलिक्वेट. नुल्ला फासिलिसि. फ्यूस्के एट लिगुला विटे लोरेम कर्सस अलिक्वाम. आलिक्वाम अ एराट अ मि बिबेंडम मोलस्टिये. फासेल्लस उत एक्स अ जस्टो डिग्निस्सिम स्केलरिस्क सिट अमेट सेड लिबरो. डुइस एगेस्टास, मि नॉन डापिबुस हेंड्रेरिट, लिबरो नुंक टिन्सीडुंट ऑर्की, इन डिग्निस्सिम एक्स मि अ औगुए. डोनेक सेड नुल्ला इन एलीट ग्राविडा विनेनेटिस एट नॉन औगुए.</p>","ar":"<p>لوريم إيبسوم دولور سيت أميت، كونسكتتور أديبيسينغ إليت. بريسنت فاسيليسيس أنتي أوت بوروس إليفند فيكولا. كراس فيل ديام إليت. نولام سكيلريسكي، نيسي سيد ديغنيسيم فيكولا، سابين لاكوس فرنجيلا أورنا، أت رونكوس إكس لوريم فيتاي ماجنا. نام فيرمينتوم، بوروس سيد كونسكووت فولووتات، لوريم سابين ديكتوم لوريم، فيتاي إويسمود أوغي ريسوس نون مي. إن هاك هابيتاس بلاتيا ديكتومست. دونيك أ أوركي موريس. بيلينتسكي نيك سيم ليبيرو. فيستيبيولوم فرنجيلا نيكوي أوت إيست إفيكيتور أليكويت. نولا فاسيليسي. فوسكي إت ليجولا فيتاي لوريم كورسوس أليكوام. أليكوام أ إيرات أ مي بيبندم مولستيي. فاسيليس أوت إكس أ جوستو ديغنيسيم سكيلريسكي سيت أميت سيد ليبيرو. دويس إيغيتاس، مي نون دابيبوس هندريريت، ليبيرو ننك تنسيدونت أوركي، إن ديغنيسيم إكس مي أ أوغ</p>"}',
                'slug' => 'health-information-systems-blog-22',
                'is_active' => 1,
                'is_featured' => 0,
                'image' => '/images/doctor_posts/66ebd53922f5a.png',
                'created_at' => '2024-09-19 12:39:37',
                'updated_at' => '2024-09-19 12:39:37',
                'deleted_at' => NULL,
            ),
        ));
        \DB::table('posts')->insert(array (
            0 => 
            array (
                'id' => 23,
                'doctor_id' => 66,
                'clinic_id' => NULL,
                'blog_category_id' => 3,
                'name' => '{"en":"HealthSystemCIO","hi":"क्विज़ प्रतियोगिता","ar":"مسابقة معلومات"}',
                'description' => '{"en":"<p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Praesent facilisis ante ut purus eleifend vehicula. Cras vel diam elit. Nullam scelerisque, nisi sed dignissim vehicula, sapien lacus fringilla urna, at rhoncus ex lorem vitae magna. Nam fermentum, purus sed consequat vulputate, lorem sapien dictum lorem, vitae euismod augue risus non mi. In hac habitasse platea dictumst. Donec a orci mauris. Pellentesque nec sem libero. Vestibulum fringilla neque ut est efficitur aliquet. Nulla facilisi. Fusce et ligula vitae lorem cursus aliquam. Aliquam a erat a mi bibendum molestie. Phasellus ut ex a justo dignissim scelerisque sit amet sed libero. Duis egestas, mi non dapibus hendrerit, libero nunc tincidunt orci, in dignissim ex mi a augue. Donec sed nulla in elit gravida venenatis et non augue. Pellentesque et libero quis lorem convallis viverra. Etiam fermentum sapien turpis, vel posuere velit varius ut.</p>","hi":"<p>लोरेम इप्सम डोलर सिट अमेट, कॉन्सेकट्यूर एडिपिसिंग एलीट. प्रेज़ेंट फसिलिसिस अंते उत पुरुस एलीफेंड व्हीकुला. क्रास वेल डायम एलीट. नुल्लम स्केलरिस्क, निसी सेड डिग्निस्सिम व्हीकुला, सैपियन लकुस फ्रिंजिल्ला उरना, एट रोंकस एक्स लोरेम विटे माग्ना. नाम फेर्मेंटुम, पुरुस सेड कंसक्वाट वुल्पुटेट, लोरेम सैपियन डिक्टम लोरेम, विटे एयूसमोड औगुए रीसस नॉन मी. इन हक हबितास्से प्लाटेआ डिक्टुमस्ट. डोनेक अ ओर्की मौरिस. पेल्लेंटेस्के नेक सेम लिबरो. वेस्टिबुलम फ्रिंजिल्ला नेकुए उत एस्ट एफिकितुर अलिक्वेट. नुल्ला फासिलिसि. फ्यूस्के एट लिगुला विटे लोरेम कर्सस अलिक्वाम. आलिक्वाम अ एराट अ मि बिबेंडम मोलस्टिये. फासेल्लस उत एक्स अ जस्टो डिग्निस्सिम स्केलरिस्क सिट अमेट सेड लिबरो. डुइस एगेस्टास, मि नॉन डापिबुस हेंड्रेरिट, लिबरो नुंक टिन्सीडुंट ऑर्की, इन डिग्निस्सिम एक्स मि अ औगुए. डोनेक सेड नुल्ला इन एलीट ग्राविडा विनेनेटिस एट नॉन औगुए.</p>","ar":"<p>لوريم إيبسوم دولور سيت أميت، كونسكتتور أديبيسينغ إليت. بريسنت فاسيليسيس أنتي أوت بوروس إليفند فيكولا. كراس فيل ديام إليت. نولام سكيلريسكي، نيسي سيد ديغنيسيم فيكولا، سابين لاكوس فرنجيلا أورنا، أت رونكوس إكس لوريم فيتاي ماجنا. نام فيرمينتوم، بوروس سيد كونسكووت فولووتات، لوريم سابين ديكتوم لوريم، فيتاي إويسمود أوغي ريسوس نون مي. إن هاك هابيتاس بلاتيا ديكتومست. دونيك أ أوركي موريس. بيلينتسكي نيك سيم ليبيرو. فيستيبيولوم فرنجيلا نيكوي أوت إيست إفيكيتور أليكويت. نولا فاسيليسي. فوسكي إت ليجولا فيتاي لوريم كورسوس أليكوام. أليكوام أ إيرات أ مي بيبندم مولستيي. فاسيليس أوت إكس أ جوستو ديغنيسيم سكيلريسكي سيت أميت سيد ليبيرو. دويس إيغيتاس، مي نون دابيبوس هندريريت، ليبيرو ننك تنسيدونت أوركي، إن ديغنيسيم إكس مي أ أوغ</p>"}',
                'slug' => 'healthsystemcio-23',
                'is_active' => 1,
                'is_featured' => 0,
                'image' => '/images/doctor_posts/66ebd55fcd14e.png',
                'created_at' => '2024-09-19 12:40:15',
                'updated_at' => '2024-09-19 12:40:15',
                'deleted_at' => NULL,
            ),
        ));
        \DB::table('posts')->insert(array (
            0 => 
            array (
                'id' => 24,
                'doctor_id' => 66,
                'clinic_id' => NULL,
                'blog_category_id' => 1,
                'name' => '{"en":"The Healthcare Blog","hi":"क्विज़ प्रतियोगिता","ar":"الذكاء الاصطناعي"}',
                'description' => '{"en":"<p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Praesent facilisis ante ut purus eleifend vehicula. Cras vel diam elit. Nullam scelerisque, nisi sed dignissim vehicula, sapien lacus fringilla urna, at rhoncus ex lorem vitae magna. Nam fermentum, purus sed consequat vulputate, lorem sapien dictum lorem, vitae euismod augue risus non mi. In hac habitasse platea dictumst. Donec a orci mauris. Pellentesque nec sem libero. Vestibulum fringilla neque ut est efficitur aliquet. Nulla facilisi. Fusce et ligula vitae lorem cursus aliquam. Aliquam a erat a mi bibendum molestie. Phasellus ut ex a justo dignissim scelerisque sit amet sed libero. Duis egestas, mi non dapibus hendrerit, libero nunc tincidunt orci, in dignissim ex mi a augue. Donec sed nulla in elit gravida venenatis et non augue. Pellentesque et libero quis lorem convallis viverra. Etiam fermentum sapien turpis, vel posuere velit varius ut.</p>","hi":"<p>लोरेम इप्सम डोलर सिट अमेट, कॉन्सेकट्यूर एडिपिसिंग एलीट. प्रेज़ेंट फसिलिसिस अंते उत पुरुस एलीफेंड व्हीकुला. क्रास वेल डायम एलीट. नुल्लम स्केलरिस्क, निसी सेड डिग्निस्सिम व्हीकुला, सैपियन लकुस फ्रिंजिल्ला उरना, एट रोंकस एक्स लोरेम विटे माग्ना. नाम फेर्मेंटुम, पुरुस सेड कंसक्वाट वुल्पुटेट, लोरेम सैपियन डिक्टम लोरेम, विटे एयूसमोड औगुए रीसस नॉन मी. इन हक हबितास्से प्लाटेआ डिक्टुमस्ट. डोनेक अ ओर्की मौरिस. पेल्लेंटेस्के नेक सेम लिबरो. वेस्टिबुलम फ्रिंजिल्ला नेकुए उत एस्ट एफिकितुर अलिक्वेट. नुल्ला फासिलिसि. फ्यूस्के एट लिगुला विटे लोरेम कर्सस अलिक्वाम. आलिक्वाम अ एराट अ मि बिबेंडम मोलस्टिये. फासेल्लस उत एक्स अ जस्टो डिग्निस्सिम स्केलरिस्क सिट अमेट सेड लिबरो. डुइस एगेस्टास, मि नॉन डापिबुस हेंड्रेरिट, लिबरो नुंक टिन्सीडुंट ऑर्की, इन डिग्निस्सिम एक्स मि अ औगुए. डोनेक सेड नुल्ला इन एलीट ग्राविडा विनेनेटिस एट नॉन औगुए.</p>","ar":"<p>لوريم إيبسوم دولور سيت أميت، كونسكتتور أديبيسينغ إليت. بريسنت فاسيليسيس أنتي أوت بوروس إليفند فيكولا. كراس فيل ديام إليت. نولام سكيلريسكي، نيسي سيد ديغنيسيم فيكولا، سابين لاكوس فرنجيلا أورنا، أت رونكوس إكس لوريم فيتاي ماجنا. نام فيرمينتوم، بوروس سيد كونسكووت فولووتات، لوريم سابين ديكتوم لوريم، فيتاي إويسمود أوغي ريسوس نون مي. إن هاك هابيتاس بلاتيا ديكتومست. دونيك أ أوركي موريس. بيلينتسكي نيك سيم ليبيرو. فيستيبيولوم فرنجيلا نيكوي أوت إيست إفيكيتور أليكويت. نولا فاسيليسي. فوسكي إت ليجولا فيتاي لوريم كورسوس أليكوام. أليكوام أ إيرات أ مي بيبندم مولستيي. فاسيليس أوت إكس أ جوستو ديغنيسيم سكيلريسكي سيت أميت سيد ليبيرو. دويس إيغيتاس، مي نون دابيبوس هندريريت، ليبيرو ننك تنسيدونت أوركي، إن ديغنيسيم إكس مي أ أوغ</p>"}',
                'slug' => 'the-healthcare-blog-24',
                'is_active' => 1,
                'is_featured' => 0,
                'image' => '/images/doctor_posts/66ebd584835bb.png',
                'created_at' => '2024-09-19 12:40:52',
                'updated_at' => '2024-09-19 12:40:52',
                'deleted_at' => NULL,
            ),
        ));
        \DB::table('posts')->insert(array (
            0 => 
            array (
                'id' => 25,
                'doctor_id' => 72,
                'clinic_id' => NULL,
                'blog_category_id' => 1,
                'name' => '{"en":"EHR Intelligence","hi":"औद्योगिक डिज़ाइन","ar":"مدونة التعليم بالمنطق السليم"}',
                'description' => '{"en":"<p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Praesent facilisis ante ut purus eleifend vehicula. Cras vel diam elit. Nullam scelerisque, nisi sed dignissim vehicula, sapien lacus fringilla urna, at rhoncus ex lorem vitae magna. Nam fermentum, purus sed consequat vulputate, lorem sapien dictum lorem, vitae euismod augue risus non mi. In hac habitasse platea dictumst. Donec a orci mauris. Pellentesque nec sem libero. Vestibulum fringilla neque ut est efficitur aliquet. Nulla facilisi. Fusce et ligula vitae lorem cursus aliquam. Aliquam a erat a mi bibendum molestie. Phasellus ut ex a justo dignissim scelerisque sit amet sed libero. Duis egestas, mi non dapibus hendrerit, libero nunc tincidunt orci, in dignissim ex mi a augue. Donec sed nulla in elit gravida venenatis et non augue. Pellentesque et libero quis lorem convallis viverra. Etiam fermentum sapien turpis, vel posuere velit varius ut.</p>","hi":"<p>लोरेम इप्सम डोलर सिट अमेट, कॉन्सेकट्यूर एडिपिसिंग एलीट. प्रेज़ेंट फसिलिसिस अंते उत पुरुस एलीफेंड व्हीकुला. क्रास वेल डायम एलीट. नुल्लम स्केलरिस्क, निसी सेड डिग्निस्सिम व्हीकुला, सैपियन लकुस फ्रिंजिल्ला उरना, एट रोंकस एक्स लोरेम विटे माग्ना. नाम फेर्मेंटुम, पुरुस सेड कंसक्वाट वुल्पुटेट, लोरेम सैपियन डिक्टम लोरेम, विटे एयूसमोड औगुए रीसस नॉन मी. इन हक हबितास्से प्लाटेआ डिक्टुमस्ट. डोनेक अ ओर्की मौरिस. पेल्लेंटेस्के नेक सेम लिबरो. वेस्टिबुलम फ्रिंजिल्ला नेकुए उत एस्ट एफिकितुर अलिक्वेट. नुल्ला फासिलिसि. फ्यूस्के एट लिगुला विटे लोरेम कर्सस अलिक्वाम. आलिक्वाम अ एराट अ मि बिबेंडम मोलस्टिये. फासेल्लस उत एक्स अ जस्टो डिग्निस्सिम स्केलरिस्क सिट अमेट सेड लिबरो. डुइस एगेस्टास, मि नॉन डापिबुस हेंड्रेरिट, लिबरो नुंक टिन्सीडुंट ऑर्की, इन डिग्निस्सिम एक्स मि अ औगुए. डोनेक सेड नुल्ला इन एलीट ग्राविडा विनेनेटिस एट नॉन औगुए.</p>","ar":"<p>لوريم إيبسوم دولور سيت أميت، كونسكتتور أديبيسينغ إليت. بريسنت فاسيليسيس أنتي أوت بوروس إليفند فيكولا. كراس فيل ديام إليت. نولام سكيلريسكي، نيسي سيد ديغنيسيم فيكولا، سابين لاكوس فرنجيلا أورنا، أت رونكوس إكس لوريم فيتاي ماجنا. نام فيرمينتوم، بوروس سيد كونسكووت فولووتات، لوريم سابين ديكتوم لوريم، فيتاي إويسمود أوغي ريسوس نون مي. إن هاك هابيتاس بلاتيا ديكتومست. دونيك أ أوركي موريس. بيلينتسكي نيك سيم ليبيرو. فيستيبيولوم فرنجيلا نيكوي أوت إيست إفيكيتور أليكويت. نولا فاسيليسي. فوسكي إت ليجولا فيتاي لوريم كورسوس أليكوام. أليكوام أ إيرات أ مي بيبندم مولستيي. فاسيليس أوت إكس أ جوستو ديغنيسيم سكيلريسكي سيت أميت سيد ليبيرو. دويس إيغيتاس، مي نون دابيبوس هندريريت، ليبيرو ننك تنسيدونت أوركي، إن ديغنيسيم إكس مي أ أوغ</p>"}',
                'slug' => 'ehr-intelligence-25',
                'is_active' => 1,
                'is_featured' => 0,
                'image' => '/images/doctor_posts/66ebd5c44cd96.png',
                'created_at' => '2024-09-19 12:41:56',
                'updated_at' => '2024-09-19 12:41:56',
                'deleted_at' => NULL,
            ),
        ));
        \DB::table('posts')->insert(array (
            0 => 
            array (
                'id' => 26,
                'doctor_id' => 72,
                'clinic_id' => NULL,
                'blog_category_id' => 2,
                'name' => '{"en":"Epic Systems Blog","hi":"कृत्रिम बुद्धिमत्ता","ar":"فعالية الخطاب التعليمي"}',
                'description' => '{"en":"<p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Praesent facilisis ante ut purus eleifend vehicula. Cras vel diam elit. Nullam scelerisque, nisi sed dignissim vehicula, sapien lacus fringilla urna, at rhoncus ex lorem vitae magna. Nam fermentum, purus sed consequat vulputate, lorem sapien dictum lorem, vitae euismod augue risus non mi. In hac habitasse platea dictumst. Donec a orci mauris. Pellentesque nec sem libero. Vestibulum fringilla neque ut est efficitur aliquet. Nulla facilisi. Fusce et ligula vitae lorem cursus aliquam. Aliquam a erat a mi bibendum molestie. Phasellus ut ex a justo dignissim scelerisque sit amet sed libero. Duis egestas, mi non dapibus hendrerit, libero nunc tincidunt orci, in dignissim ex mi a augue. Donec sed nulla in elit gravida venenatis et non augue. Pellentesque et libero quis lorem convallis viverra. Etiam fermentum sapien turpis, vel posuere velit varius ut.</p>","hi":"<p>लोरेम इप्सम डोलर सिट अमेट, कॉन्सेकट्यूर एडिपिसिंग एलीट. प्रेज़ेंट फसिलिसिस अंते उत पुरुस एलीफेंड व्हीकुला. क्रास वेल डायम एलीट. नुल्लम स्केलरिस्क, निसी सेड डिग्निस्सिम व्हीकुला, सैपियन लकुस फ्रिंजिल्ला उरना, एट रोंकस एक्स लोरेम विटे माग्ना. नाम फेर्मेंटुम, पुरुस सेड कंसक्वाट वुल्पुटेट, लोरेम सैपियन डिक्टम लोरेम, विटे एयूसमोड औगुए रीसस नॉन मी. इन हक हबितास्से प्लाटेआ डिक्टुमस्ट. डोनेक अ ओर्की मौरिस. पेल्लेंटेस्के नेक सेम लिबरो. वेस्टिबुलम फ्रिंजिल्ला नेकुए उत एस्ट एफिकितुर अलिक्वेट. नुल्ला फासिलिसि. फ्यूस्के एट लिगुला विटे लोरेम कर्सस अलिक्वाम. आलिक्वाम अ एराट अ मि बिबेंडम मोलस्टिये. फासेल्लस उत एक्स अ जस्टो डिग्निस्सिम स्केलरिस्क सिट अमेट सेड लिबरो. डुइस एगेस्टास, मि नॉन डापिबुस हेंड्रेरिट, लिबरो नुंक टिन्सीडुंट ऑर्की, इन डिग्निस्सिम एक्स मि अ औगुए. डोनेक सेड नुल्ला इन एलीट ग्राविडा विनेनेटिस एट नॉन औगुए.</p>","ar":"<p>لوريم إيبسوم دولور سيت أميت، كونسكتتور أديبيسينغ إليت. بريسنت فاسيليسيس أنتي أوت بوروس إليفند فيكولا. كراس فيل ديام إليت. نولام سكيلريسكي، نيسي سيد ديغنيسيم فيكولا، سابين لاكوس فرنجيلا أورنا، أت رونكوس إكس لوريم فيتاي ماجنا. نام فيرمينتوم، بوروس سيد كونسكووت فولووتات، لوريم سابين ديكتوم لوريم، فيتاي إويسمود أوغي ريسوس نون مي. إن هاك هابيتاس بلاتيا ديكتومست. دونيك أ أوركي موريس. بيلينتسكي نيك سيم ليبيرو. فيستيبيولوم فرنجيلا نيكوي أوت إيست إفيكيتور أليكويت. نولا فاسيليسي. فوسكي إت ليجولا فيتاي لوريم كورسوس أليكوام. أليكوام أ إيرات أ مي بيبندم مولستيي. فاسيليس أوت إكس أ جوستو ديغنيسيم سكيلريسكي سيت أميت سيد ليبيرو. دويس إيغيتاس، مي نون دابيبوس هندريريت، ليبيرو ننك تنسيدونت أوركي، إن ديغنيسيم إكس مي أ أوغ</p>"}',
                'slug' => 'epic-systems-blog-26',
                'is_active' => 1,
                'is_featured' => 0,
                'image' => '/images/doctor_posts/66ebd5f5912a7.png',
                'created_at' => '2024-09-19 12:42:45',
                'updated_at' => '2024-09-19 12:42:45',
                'deleted_at' => NULL,
            ),
        ));
        \DB::table('posts')->insert(array (
            0 => 
            array (
                'id' => 27,
                'doctor_id' => 72,
                'clinic_id' => NULL,
                'blog_category_id' => 4,
                'name' => '{"en":"HealthCatalyst Blog","hi":"क्विज़ प्रतियोगिता","ar":"مسابقة معلومات"}',
                'description' => '{"en":"<p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Praesent facilisis ante ut purus eleifend vehicula. Cras vel diam elit. Nullam scelerisque, nisi sed dignissim vehicula, sapien lacus fringilla urna, at rhoncus ex lorem vitae magna. Nam fermentum, purus sed consequat vulputate, lorem sapien dictum lorem, vitae euismod augue risus non mi. In hac habitasse platea dictumst. Donec a orci mauris. Pellentesque nec sem libero. Vestibulum fringilla neque ut est efficitur aliquet. Nulla facilisi. Fusce et ligula vitae lorem cursus aliquam. Aliquam a erat a mi bibendum molestie. Phasellus ut ex a justo dignissim scelerisque sit amet sed libero. Duis egestas, mi non dapibus hendrerit, libero nunc tincidunt orci, in dignissim ex mi a augue. Donec sed nulla in elit gravida venenatis et non augue. Pellentesque et libero quis lorem convallis viverra. Etiam fermentum sapien turpis, vel posuere velit varius ut.</p>","hi":"<p>लोरेम इप्सम डोलर सिट अमेट, कॉन्सेकट्यूर एडिपिसिंग एलीट. प्रेज़ेंट फसिलिसिस अंते उत पुरुस एलीफेंड व्हीकुला. क्रास वेल डायम एलीट. नुल्लम स्केलरिस्क, निसी सेड डिग्निस्सिम व्हीकुला, सैपियन लकुस फ्रिंजिल्ला उरना, एट रोंकस एक्स लोरेम विटे माग्ना. नाम फेर्मेंटुम, पुरुस सेड कंसक्वाट वुल्पुटेट, लोरेम सैपियन डिक्टम लोरेम, विटे एयूसमोड औगुए रीसस नॉन मी. इन हक हबितास्से प्लाटेआ डिक्टुमस्ट. डोनेक अ ओर्की मौरिस. पेल्लेंटेस्के नेक सेम लिबरो. वेस्टिबुलम फ्रिंजिल्ला नेकुए उत एस्ट एफिकितुर अलिक्वेट. नुल्ला फासिलिसि. फ्यूस्के एट लिगुला विटे लोरेम कर्सस अलिक्वाम. आलिक्वाम अ एराट अ मि बिबेंडम मोलस्टिये. फासेल्लस उत एक्स अ जस्टो डिग्निस्सिम स्केलरिस्क सिट अमेट सेड लिबरो. डुइस एगेस्टास, मि नॉन डापिबुस हेंड्रेरिट, लिबरो नुंक टिन्सीडुंट ऑर्की, इन डिग्निस्सिम एक्स मि अ औगुए. डोनेक सेड नुल्ला इन एलीट ग्राविडा विनेनेटिस एट नॉन औगुए.</p>","ar":"<p>لوريم إيبسوم دولور سيت أميت، كونسكتتور أديبيسينغ إليت. بريسنت فاسيليسيس أنتي أوت بوروس إليفند فيكولا. كراس فيل ديام إليت. نولام سكيلريسكي، نيسي سيد ديغنيسيم فيكولا، سابين لاكوس فرنجيلا أورنا، أت رونكوس إكس لوريم فيتاي ماجنا. نام فيرمينتوم، بوروس سيد كونسكووت فولووتات، لوريم سابين ديكتوم لوريم، فيتاي إويسمود أوغي ريسوس نون مي. إن هاك هابيتاس بلاتيا ديكتومست. دونيك أ أوركي موريس. بيلينتسكي نيك سيم ليبيرو. فيستيبيولوم فرنجيلا نيكوي أوت إيست إفيكيتور أليكويت. نولا فاسيليسي. فوسكي إت ليجولا فيتاي لوريم كورسوس أليكوام. أليكوام أ إيرات أ مي بيبندم مولستيي. فاسيليس أوت إكس أ جوستو ديغنيسيم سكيلريسكي سيت أميت سيد ليبيرو. دويس إيغيتاس، مي نون دابيبوس هندريريت، ليبيرو ننك تنسيدونت أوركي، إن ديغنيسيم إكس مي أ أوغ</p>"}',
                'slug' => 'healthcatalyst-blog-27',
                'is_active' => 1,
                'is_featured' => 0,
                'image' => '/images/doctor_posts/66ebd62ae890d.png',
                'created_at' => '2024-09-19 12:43:38',
                'updated_at' => '2024-09-19 12:43:38',
                'deleted_at' => NULL,
            ),
        ));
        \DB::table('posts')->insert(array (
            0 => 
            array (
                'id' => 28,
                'doctor_id' => 73,
                'clinic_id' => NULL,
                'blog_category_id' => 1,
                'name' => '{"en":"Digital Health","hi":"क्विज़ प्रतियोगिता","ar":"الذكاء الاصطناعي"}',
                'description' => '{"en":"<p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Praesent facilisis ante ut purus eleifend vehicula. Cras vel diam elit. Nullam scelerisque, nisi sed dignissim vehicula, sapien lacus fringilla urna, at rhoncus ex lorem vitae magna. Nam fermentum, purus sed consequat vulputate, lorem sapien dictum lorem, vitae euismod augue risus non mi. In hac habitasse platea dictumst. Donec a orci mauris. Pellentesque nec sem libero. Vestibulum fringilla neque ut est efficitur aliquet. Nulla facilisi. Fusce et ligula vitae lorem cursus aliquam. Aliquam a erat a mi bibendum molestie. Phasellus ut ex a justo dignissim scelerisque sit amet sed libero. Duis egestas, mi non dapibus hendrerit, libero nunc tincidunt orci, in dignissim ex mi a augue. Donec sed nulla in elit gravida venenatis et non augue. Pellentesque et libero quis lorem convallis viverra. Etiam fermentum sapien turpis, vel posuere velit varius ut.</p>","hi":"<p>लोरेम इप्सम डोलर सिट अमेट, कॉन्सेकट्यूर एडिपिसिंग एलीट. प्रेज़ेंट फसिलिसिस अंते उत पुरुस एलीफेंड व्हीकुला. क्रास वेल डायम एलीट. नुल्लम स्केलरिस्क, निसी सेड डिग्निस्सिम व्हीकुला, सैपियन लकुस फ्रिंजिल्ला उरना, एट रोंकस एक्स लोरेम विटे माग्ना. नाम फेर्मेंटुम, पुरुस सेड कंसक्वाट वुल्पुटेट, लोरेम सैपियन डिक्टम लोरेम, विटे एयूसमोड औगुए रीसस नॉन मी. इन हक हबितास्से प्लाटेआ डिक्टुमस्ट. डोनेक अ ओर्की मौरिस. पेल्लेंटेस्के नेक सेम लिबरो. वेस्टिबुलम फ्रिंजिल्ला नेकुए उत एस्ट एफिकितुर अलिक्वेट. नुल्ला फासिलिसि. फ्यूस्के एट लिगुला विटे लोरेम कर्सस अलिक्वाम. आलिक्वाम अ एराट अ मि बिबेंडम मोलस्टिये. फासेल्लस उत एक्स अ जस्टो डिग्निस्सिम स्केलरिस्क सिट अमेट सेड लिबरो. डुइस एगेस्टास, मि नॉन डापिबुस हेंड्रेरिट, लिबरो नुंक टिन्सीडुंट ऑर्की, इन डिग्निस्सिम एक्स मि अ औगुए. डोनेक सेड नुल्ला इन एलीट ग्राविडा विनेनेटिस एट नॉन औगुए.</p>","ar":"<p>لوريم إيبسوم دولور سيت أميت، كونسكتتور أديبيسينغ إليت. بريسنت فاسيليسيس أنتي أوت بوروس إليفند فيكولا. كراس فيل ديام إليت. نولام سكيلريسكي، نيسي سيد ديغنيسيم فيكولا، سابين لاكوس فرنجيلا أورنا، أت رونكوس إكس لوريم فيتاي ماجنا. نام فيرمينتوم، بوروس سيد كونسكووت فولووتات، لوريم سابين ديكتوم لوريم، فيتاي إويسمود أوغي ريسوس نون مي. إن هاك هابيتاس بلاتيا ديكتومست. دونيك أ أوركي موريس. بيلينتسكي نيك سيم ليبيرو. فيستيبيولوم فرنجيلا نيكوي أوت إيست إفيكيتور أليكويت. نولا فاسيليسي. فوسكي إت ليجولا فيتاي لوريم كورسوس أليكوام. أليكوام أ إيرات أ مي بيبندم مولستيي. فاسيليس أوت إكس أ جوستو ديغنيسيم سكيلريسكي سيت أميت سيد ليبيرو. دويس إيغيتاس، مي نون دابيبوس هندريريت، ليبيرو ننك تنسيدونت أوركي، إن ديغنيسيم إكس مي أ أوغ</p>"}',
                'slug' => 'digital-health-28',
                'is_active' => 1,
                'is_featured' => 0,
                'image' => '/images/doctor_posts/66ebd678e0b7a.png',
                'created_at' => '2024-09-19 12:44:56',
                'updated_at' => '2024-09-19 12:44:56',
                'deleted_at' => NULL,
            ),
        ));
        \DB::table('posts')->insert(array (
            0 => 
            array (
                'id' => 29,
                'doctor_id' => 73,
                'clinic_id' => NULL,
                'blog_category_id' => 2,
                'name' => '{"en":"Health Affairs Blog","hi":"क्विज़ प्रतियोगिता","ar":"مسابقة معلومات"}',
                'description' => '{"en":"<p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Praesent facilisis ante ut purus eleifend vehicula. Cras vel diam elit. Nullam scelerisque, nisi sed dignissim vehicula, sapien lacus fringilla urna, at rhoncus ex lorem vitae magna. Nam fermentum, purus sed consequat vulputate, lorem sapien dictum lorem, vitae euismod augue risus non mi. In hac habitasse platea dictumst. Donec a orci mauris. Pellentesque nec sem libero. Vestibulum fringilla neque ut est efficitur aliquet. Nulla facilisi. Fusce et ligula vitae lorem cursus aliquam. Aliquam a erat a mi bibendum molestie. Phasellus ut ex a justo dignissim scelerisque sit amet sed libero. Duis egestas, mi non dapibus hendrerit, libero nunc tincidunt orci, in dignissim ex mi a augue. Donec sed nulla in elit gravida venenatis et non augue. Pellentesque et libero quis lorem convallis viverra. Etiam fermentum sapien turpis, vel posuere velit varius ut.</p>","hi":"<p>लोरेम इप्सम डोलर सिट अमेट, कॉन्सेकट्यूर एडिपिसिंग एलीट. प्रेज़ेंट फसिलिसिस अंते उत पुरुस एलीफेंड व्हीकुला. क्रास वेल डायम एलीट. नुल्लम स्केलरिस्क, निसी सेड डिग्निस्सिम व्हीकुला, सैपियन लकुस फ्रिंजिल्ला उरना, एट रोंकस एक्स लोरेम विटे माग्ना. नाम फेर्मेंटुम, पुरुस सेड कंसक्वाट वुल्पुटेट, लोरेम सैपियन डिक्टम लोरेम, विटे एयूसमोड औगुए रीसस नॉन मी. इन हक हबितास्से प्लाटेआ डिक्टुमस्ट. डोनेक अ ओर्की मौरिस. पेल्लेंटेस्के नेक सेम लिबरो. वेस्टिबुलम फ्रिंजिल्ला नेकुए उत एस्ट एफिकितुर अलिक्वेट. नुल्ला फासिलिसि. फ्यूस्के एट लिगुला विटे लोरेम कर्सस अलिक्वाम. आलिक्वाम अ एराट अ मि बिबेंडम मोलस्टिये. फासेल्लस उत एक्स अ जस्टो डिग्निस्सिम स्केलरिस्क सिट अमेट सेड लिबरो. डुइस एगेस्टास, मि नॉन डापिबुस हेंड्रेरिट, लिबरो नुंक टिन्सीडुंट ऑर्की, इन डिग्निस्सिम एक्स मि अ औगुए. डोनेक सेड नुल्ला इन एलीट ग्राविडा विनेनेटिस एट नॉन औगुए.</p>","ar":"<p>لوريم إيبسوم دولور سيت أميت، كونسكتتور أديبيسينغ إليت. بريسنت فاسيليسيس أنتي أوت بوروس إليفند فيكولا. كراس فيل ديام إليت. نولام سكيلريسكي، نيسي سيد ديغنيسيم فيكولا، سابين لاكوس فرنجيلا أورنا، أت رونكوس إكس لوريم فيتاي ماجنا. نام فيرمينتوم، بوروس سيد كونسكووت فولووتات، لوريم سابين ديكتوم لوريم، فيتاي إويسمود أوغي ريسوس نون مي. إن هاك هابيتاس بلاتيا ديكتومست. دونيك أ أوركي موريس. بيلينتسكي نيك سيم ليبيرو. فيستيبيولوم فرنجيلا نيكوي أوت إيست إفيكيتور أليكويت. نولا فاسيليسي. فوسكي إت ليجولا فيتاي لوريم كورسوس أليكوام. أليكوام أ إيرات أ مي بيبندم مولستيي. فاسيليس أوت إكس أ جوستو ديغنيسيم سكيلريسكي سيت أميت سيد ليبيرو. دويس إيغيتاس، مي نون دابيبوس هندريريت، ليبيرو ننك تنسيدونت أوركي، إن ديغنيسيم إكس مي أ أوغ</p>"}',
                'slug' => 'health-affairs-blog-29',
                'is_active' => 1,
                'is_featured' => 0,
                'image' => '/images/doctor_posts/66ebd6a732150.png',
                'created_at' => '2024-09-19 12:45:43',
                'updated_at' => '2024-09-19 12:45:43',
                'deleted_at' => NULL,
            ),
        ));
        \DB::table('posts')->insert(array (
            0 => 
            array (
                'id' => 30,
                'doctor_id' => 73,
                'clinic_id' => NULL,
                'blog_category_id' => 2,
                'name' => '{"en":"ONC Health IT Blog","hi":"क्विज़ प्रतियोगिता","ar":"فعالية الخطاب التعليمي"}',
                'description' => '{"en":"<p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Praesent facilisis ante ut purus eleifend vehicula. Cras vel diam elit. Nullam scelerisque, nisi sed dignissim vehicula, sapien lacus fringilla urna, at rhoncus ex lorem vitae magna. Nam fermentum, purus sed consequat vulputate, lorem sapien dictum lorem, vitae euismod augue risus non mi. In hac habitasse platea dictumst. Donec a orci mauris. Pellentesque nec sem libero. Vestibulum fringilla neque ut est efficitur aliquet. Nulla facilisi. Fusce et ligula vitae lorem cursus aliquam. Aliquam a erat a mi bibendum molestie. Phasellus ut ex a justo dignissim scelerisque sit amet sed libero. Duis egestas, mi non dapibus hendrerit, libero nunc tincidunt orci, in dignissim ex mi a augue. Donec sed nulla in elit gravida venenatis et non augue. Pellentesque et libero quis lorem convallis viverra. Etiam fermentum sapien turpis, vel posuere velit varius ut.</p>","hi":"<p>लोरेम इप्सम डोलर सिट अमेट, कॉन्सेकट्यूर एडिपिसिंग एलीट. प्रेज़ेंट फसिलिसिस अंते उत पुरुस एलीफेंड व्हीकुला. क्रास वेल डायम एलीट. नुल्लम स्केलरिस्क, निसी सेड डिग्निस्सिम व्हीकुला, सैपियन लकुस फ्रिंजिल्ला उरना, एट रोंकस एक्स लोरेम विटे माग्ना. नाम फेर्मेंटुम, पुरुस सेड कंसक्वाट वुल्पुटेट, लोरेम सैपियन डिक्टम लोरेम, विटे एयूसमोड औगुए रीसस नॉन मी. इन हक हबितास्से प्लाटेआ डिक्टुमस्ट. डोनेक अ ओर्की मौरिस. पेल्लेंटेस्के नेक सेम लिबरो. वेस्टिबुलम फ्रिंजिल्ला नेकुए उत एस्ट एफिकितुर अलिक्वेट. नुल्ला फासिलिसि. फ्यूस्के एट लिगुला विटे लोरेम कर्सस अलिक्वाम. आलिक्वाम अ एराट अ मि बिबेंडम मोलस्टिये. फासेल्लस उत एक्स अ जस्टो डिग्निस्सिम स्केलरिस्क सिट अमेट सेड लिबरो. डुइस एगेस्टास, मि नॉन डापिबुस हेंड्रेरिट, लिबरो नुंक टिन्सीडुंट ऑर्की, इन डिग्निस्सिम एक्स मि अ औगुए. डोनेक सेड नुल्ला इन एलीट ग्राविडा विनेनेटिस एट नॉन औगुए.</p>","ar":"<p>لوريم إيبسوم دولور سيت أميت، كونسكتتور أديبيسينغ إليت. بريسنت فاسيليسيس أنتي أوت بوروس إليفند فيكولا. كراس فيل ديام إليت. نولام سكيلريسكي، نيسي سيد ديغنيسيم فيكولا، سابين لاكوس فرنجيلا أورنا، أت رونكوس إكس لوريم فيتاي ماجنا. نام فيرمينتوم، بوروس سيد كونسكووت فولووتات، لوريم سابين ديكتوم لوريم، فيتاي إويسمود أوغي ريسوس نون مي. إن هاك هابيتاس بلاتيا ديكتومست. دونيك أ أوركي موريس. بيلينتسكي نيك سيم ليبيرو. فيستيبيولوم فرنجيلا نيكوي أوت إيست إفيكيتور أليكويت. نولا فاسيليسي. فوسكي إت ليجولا فيتاي لوريم كورسوس أليكوام. أليكوام أ إيرات أ مي بيبندم مولستيي. فاسيليس أوت إكس أ جوستو ديغنيسيم سكيلريسكي سيت أميت سيد ليبيرو. دويس إيغيتاس، مي نون دابيبوس هندريريت، ليبيرو ننك تنسيدونت أوركي، إن ديغنيسيم إكس مي أ أوغ</p>"}',
                'slug' => 'onc-health-it-blog-30',
                'is_active' => 1,
                'is_featured' => 0,
                'image' => '/images/doctor_posts/66ebd6cca2f2f.png',
                'created_at' => '2024-09-19 12:46:20',
                'updated_at' => '2024-09-19 12:46:20',
                'deleted_at' => NULL,
            ),
        ));
        \DB::table('posts')->insert(array (
            0 => 
            array (
                'id' => 31,
                'doctor_id' => 74,
                'clinic_id' => NULL,
                'blog_category_id' => 3,
                'name' => '{"en":"Cerner Blog","hi":"पारिस्थितिकी","ar":"علم البيئة"}',
                'description' => '{"en":"<p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Praesent facilisis ante ut purus eleifend vehicula. Cras vel diam elit. Nullam scelerisque, nisi sed dignissim vehicula, sapien lacus fringilla urna, at rhoncus ex lorem vitae magna. Nam fermentum, purus sed consequat vulputate, lorem sapien dictum lorem, vitae euismod augue risus non mi. In hac habitasse platea dictumst. Donec a orci mauris. Pellentesque nec sem libero. Vestibulum fringilla neque ut est efficitur aliquet. Nulla facilisi. Fusce et ligula vitae lorem cursus aliquam. Aliquam a erat a mi bibendum molestie. Phasellus ut ex a justo dignissim scelerisque sit amet sed libero. Duis egestas, mi non dapibus hendrerit, libero nunc tincidunt orci, in dignissim ex mi a augue. Donec sed nulla in elit gravida venenatis et non augue. Pellentesque et libero quis lorem convallis viverra. Etiam fermentum sapien turpis, vel posuere velit varius ut.</p>","hi":"<p>लोरेम इप्सम डोलर सिट अमेट, कॉन्सेकट्यूर एडिपिसिंग एलीट. प्रेज़ेंट फसिलिसिस अंते उत पुरुस एलीफेंड व्हीकुला. क्रास वेल डायम एलीट. नुल्लम स्केलरिस्क, निसी सेड डिग्निस्सिम व्हीकुला, सैपियन लकुस फ्रिंजिल्ला उरना, एट रोंकस एक्स लोरेम विटे माग्ना. नाम फेर्मेंटुम, पुरुस सेड कंसक्वाट वुल्पुटेट, लोरेम सैपियन डिक्टम लोरेम, विटे एयूसमोड औगुए रीसस नॉन मी. इन हक हबितास्से प्लाटेआ डिक्टुमस्ट. डोनेक अ ओर्की मौरिस. पेल्लेंटेस्के नेक सेम लिबरो. वेस्टिबुलम फ्रिंजिल्ला नेकुए उत एस्ट एफिकितुर अलिक्वेट. नुल्ला फासिलिसि. फ्यूस्के एट लिगुला विटे लोरेम कर्सस अलिक्वाम. आलिक्वाम अ एराट अ मि बिबेंडम मोलस्टिये. फासेल्लस उत एक्स अ जस्टो डिग्निस्सिम स्केलरिस्क सिट अमेट सेड लिबरो. डुइस एगेस्टास, मि नॉन डापिबुस हेंड्रेरिट, लिबरो नुंक टिन्सीडुंट ऑर्की, इन डिग्निस्सिम एक्स मि अ औगुए. डोनेक सेड नुल्ला इन एलीट ग्राविडा विनेनेटिस एट नॉन औगुए.</p>","ar":"<p>لوريم إيبسوم دولور سيت أميت، كونسكتتور أديبيسينغ إليت. بريسنت فاسيليسيس أنتي أوت بوروس إليفند فيكولا. كراس فيل ديام إليت. نولام سكيلريسكي، نيسي سيد ديغنيسيم فيكولا، سابين لاكوس فرنجيلا أورنا، أت رونكوس إكس لوريم فيتاي ماجنا. نام فيرمينتوم، بوروس سيد كونسكووت فولووتات، لوريم سابين ديكتوم لوريم، فيتاي إويسمود أوغي ريسوس نون مي. إن هاك هابيتاس بلاتيا ديكتومست. دونيك أ أوركي موريس. بيلينتسكي نيك سيم ليبيرو. فيستيبيولوم فرنجيلا نيكوي أوت إيست إفيكيتور أليكويت. نولا فاسيليسي. فوسكي إت ليجولا فيتاي لوريم كورسوس أليكوام. أليكوام أ إيرات أ مي بيبندم مولستيي. فاسيليس أوت إكس أ جوستو ديغنيسيم سكيلريسكي سيت أميت سيد ليبيرو. دويس إيغيتاس، مي نون دابيبوس هندريريت، ليبيرو ننك تنسيدونت أوركي، إن ديغنيسيم إكس مي أ أوغ</p>"}',
                'slug' => 'cerner-blog-31',
                'is_active' => 1,
                'is_featured' => 0,
                'image' => '/images/doctor_posts/66ebd72b1b6b8.png',
                'created_at' => '2024-09-19 12:47:55',
                'updated_at' => '2024-09-19 12:47:55',
                'deleted_at' => NULL,
            ),
        ));
        \DB::table('posts')->insert(array (
            0 => 
            array (
                'id' => 32,
                'doctor_id' => 74,
                'clinic_id' => NULL,
                'blog_category_id' => 4,
                'name' => '{"en":"EMR & HIPAA","hi":"क्विज़ प्रतियोगिता","ar":"الذكاء الاصطناعي"}',
                'description' => '{"en":"<p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Praesent facilisis ante ut purus eleifend vehicula. Cras vel diam elit. Nullam scelerisque, nisi sed dignissim vehicula, sapien lacus fringilla urna, at rhoncus ex lorem vitae magna. Nam fermentum, purus sed consequat vulputate, lorem sapien dictum lorem, vitae euismod augue risus non mi. In hac habitasse platea dictumst. Donec a orci mauris. Pellentesque nec sem libero. Vestibulum fringilla neque ut est efficitur aliquet. Nulla facilisi. Fusce et ligula vitae lorem cursus aliquam. Aliquam a erat a mi bibendum molestie. Phasellus ut ex a justo dignissim scelerisque sit amet sed libero. Duis egestas, mi non dapibus hendrerit, libero nunc tincidunt orci, in dignissim ex mi a augue. Donec sed nulla in elit gravida venenatis et non augue. Pellentesque et libero quis lorem convallis viverra. Etiam fermentum sapien turpis, vel posuere velit varius ut.</p>","hi":"<p>लोरेम इप्सम डोलर सिट अमेट, कॉन्सेकट्यूर एडिपिसिंग एलीट. प्रेज़ेंट फसिलिसिस अंते उत पुरुस एलीफेंड व्हीकुला. क्रास वेल डायम एलीट. नुल्लम स्केलरिस्क, निसी सेड डिग्निस्सिम व्हीकुला, सैपियन लकुस फ्रिंजिल्ला उरना, एट रोंकस एक्स लोरेम विटे माग्ना. नाम फेर्मेंटुम, पुरुस सेड कंसक्वाट वुल्पुटेट, लोरेम सैपियन डिक्टम लोरेम, विटे एयूसमोड औगुए रीसस नॉन मी. इन हक हबितास्से प्लाटेआ डिक्टुमस्ट. डोनेक अ ओर्की मौरिस. पेल्लेंटेस्के नेक सेम लिबरो. वेस्टिबुलम फ्रिंजिल्ला नेकुए उत एस्ट एफिकितुर अलिक्वेट. नुल्ला फासिलिसि. फ्यूस्के एट लिगुला विटे लोरेम कर्सस अलिक्वाम. आलिक्वाम अ एराट अ मि बिबेंडम मोलस्टिये. फासेल्लस उत एक्स अ जस्टो डिग्निस्सिम स्केलरिस्क सिट अमेट सेड लिबरो. डुइस एगेस्टास, मि नॉन डापिबुस हेंड्रेरिट, लिबरो नुंक टिन्सीडुंट ऑर्की, इन डिग्निस्सिम एक्स मि अ औगुए. डोनेक सेड नुल्ला इन एलीट ग्राविडा विनेनेटिस एट नॉन औगुए.</p>","ar":"<p>لوريم إيبسوم دولور سيت أميت، كونسكتتور أديبيسينغ إليت. بريسنت فاسيليسيس أنتي أوت بوروس إليفند فيكولا. كراس فيل ديام إليت. نولام سكيلريسكي، نيسي سيد ديغنيسيم فيكولا، سابين لاكوس فرنجيلا أورنا، أت رونكوس إكس لوريم فيتاي ماجنا. نام فيرمينتوم، بوروس سيد كونسكووت فولووتات، لوريم سابين ديكتوم لوريم، فيتاي إويسمود أوغي ريسوس نون مي. إن هاك هابيتاس بلاتيا ديكتومست. دونيك أ أوركي موريس. بيلينتسكي نيك سيم ليبيرو. فيستيبيولوم فرنجيلا نيكوي أوت إيست إفيكيتور أليكويت. نولا فاسيليسي. فوسكي إت ليجولا فيتاي لوريم كورسوس أليكوام. أليكوام أ إيرات أ مي بيبندم مولستيي. فاسيليس أوت إكس أ جوستو ديغنيسيم سكيلريسكي سيت أميت سيد ليبيرو. دويس إيغيتاس، مي نون دابيبوس هندريريت، ليبيرو ننك تنسيدونت أوركي، إن ديغنيسيم إكس مي أ أوغ</p>"}',
                'slug' => 'emr-hipaa-32',
                'is_active' => 1,
                'is_featured' => 0,
                'image' => '/images/doctor_posts/66ebd758c0598.png',
                'created_at' => '2024-09-19 12:48:40',
                'updated_at' => '2024-09-19 12:48:40',
                'deleted_at' => NULL,
            ),
        ));
        \DB::table('posts')->insert(array (
            0 => 
            array (
                'id' => 33,
                'doctor_id' => 74,
                'clinic_id' => NULL,
                'blog_category_id' => 1,
                'name' => '{"en":"MobiHealthNews","hi":"सामान्य बुद्धि शिक्षा ब्लॉग","ar":"مسابقة معلومات"}',
                'description' => '{"en":"<p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Praesent facilisis ante ut purus eleifend vehicula. Cras vel diam elit. Nullam scelerisque, nisi sed dignissim vehicula, sapien lacus fringilla urna, at rhoncus ex lorem vitae magna. Nam fermentum, purus sed consequat vulputate, lorem sapien dictum lorem, vitae euismod augue risus non mi. In hac habitasse platea dictumst. Donec a orci mauris. Pellentesque nec sem libero. Vestibulum fringilla neque ut est efficitur aliquet. Nulla facilisi. Fusce et ligula vitae lorem cursus aliquam. Aliquam a erat a mi bibendum molestie. Phasellus ut ex a justo dignissim scelerisque sit amet sed libero. Duis egestas, mi non dapibus hendrerit, libero nunc tincidunt orci, in dignissim ex mi a augue. Donec sed nulla in elit gravida venenatis et non augue. Pellentesque et libero quis lorem convallis viverra. Etiam fermentum sapien turpis, vel posuere velit varius ut.</p>","hi":"<p>लोरेम इप्सम डोलर सिट अमेट, कॉन्सेकट्यूर एडिपिसिंग एलीट. प्रेज़ेंट फसिलिसिस अंते उत पुरुस एलीफेंड व्हीकुला. क्रास वेल डायम एलीट. नुल्लम स्केलरिस्क, निसी सेड डिग्निस्सिम व्हीकुला, सैपियन लकुस फ्रिंजिल्ला उरना, एट रोंकस एक्स लोरेम विटे माग्ना. नाम फेर्मेंटुम, पुरुस सेड कंसक्वाट वुल्पुटेट, लोरेम सैपियन डिक्टम लोरेम, विटे एयूसमोड औगुए रीसस नॉन मी. इन हक हबितास्से प्लाटेआ डिक्टुमस्ट. डोनेक अ ओर्की मौरिस. पेल्लेंटेस्के नेक सेम लिबरो. वेस्टिबुलम फ्रिंजिल्ला नेकुए उत एस्ट एफिकितुर अलिक्वेट. नुल्ला फासिलिसि. फ्यूस्के एट लिगुला विटे लोरेम कर्सस अलिक्वाम. आलिक्वाम अ एराट अ मि बिबेंडम मोलस्टिये. फासेल्लस उत एक्स अ जस्टो डिग्निस्सिम स्केलरिस्क सिट अमेट सेड लिबरो. डुइस एगेस्टास, मि नॉन डापिबुस हेंड्रेरिट, लिबरो नुंक टिन्सीडुंट ऑर्की, इन डिग्निस्सिम एक्स मि अ औगुए. डोनेक सेड नुल्ला इन एलीट ग्राविडा विनेनेटिस एट नॉन औगुए.</p>","ar":"<p>لوريم إيبسوم دولور سيت أميت، كونسكتتور أديبيسينغ إليت. بريسنت فاسيليسيس أنتي أوت بوروس إليفند فيكولا. كراس فيل ديام إليت. نولام سكيلريسكي، نيسي سيد ديغنيسيم فيكولا، سابين لاكوس فرنجيلا أورنا، أت رونكوس إكس لوريم فيتاي ماجنا. نام فيرمينتوم، بوروس سيد كونسكووت فولووتات، لوريم سابين ديكتوم لوريم، فيتاي إويسمود أوغي ريسوس نون مي. إن هاك هابيتاس بلاتيا ديكتومست. دونيك أ أوركي موريس. بيلينتسكي نيك سيم ليبيرو. فيستيبيولوم فرنجيلا نيكوي أوت إيست إفيكيتور أليكويت. نولا فاسيليسي. فوسكي إت ليجولا فيتاي لوريم كورسوس أليكوام. أليكوام أ إيرات أ مي بيبندم مولستيي. فاسيليس أوت إكس أ جوستو ديغنيسيم سكيلريسكي سيت أميت سيد ليبيرو. دويس إيغيتاس، مي نون دابيبوس هندريريت، ليبيرو ننك تنسيدونت أوركي، إن ديغنيسيم إكس مي أ أوغ</p>"}',
                'slug' => 'mobihealthnews-33',
                'is_active' => 1,
                'is_featured' => 0,
                'image' => '/images/doctor_posts/66ebd796bcdcc.png',
                'created_at' => '2024-09-19 12:49:42',
                'updated_at' => '2024-09-19 12:49:42',
                'deleted_at' => NULL,
            ),
        ));
        \DB::table('posts')->insert(array (
            0 => 
            array (
                'id' => 34,
                'doctor_id' => 75,
                'clinic_id' => NULL,
                'blog_category_id' => 2,
                'name' => '{"en":"Health Data Management","hi":"औद्योगिक डिज़ाइन","ar":"مدونة التعليم بالمنطق السليم"}',
                'description' => '{"en":"<p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Praesent facilisis ante ut purus eleifend vehicula. Cras vel diam elit. Nullam scelerisque, nisi sed dignissim vehicula, sapien lacus fringilla urna, at rhoncus ex lorem vitae magna. Nam fermentum, purus sed consequat vulputate, lorem sapien dictum lorem, vitae euismod augue risus non mi. In hac habitasse platea dictumst. Donec a orci mauris. Pellentesque nec sem libero. Vestibulum fringilla neque ut est efficitur aliquet. Nulla facilisi. Fusce et ligula vitae lorem cursus aliquam. Aliquam a erat a mi bibendum molestie. Phasellus ut ex a justo dignissim scelerisque sit amet sed libero. Duis egestas, mi non dapibus hendrerit, libero nunc tincidunt orci, in dignissim ex mi a augue. Donec sed nulla in elit gravida venenatis et non augue. Pellentesque et libero quis lorem convallis viverra. Etiam fermentum sapien turpis, vel posuere velit varius ut.</p>","hi":"<p>लोरेम इप्सम डोलर सिट अमेट, कॉन्सेकट्यूर एडिपिसिंग एलीट. प्रेज़ेंट फसिलिसिस अंते उत पुरुस एलीफेंड व्हीकुला. क्रास वेल डायम एलीट. नुल्लम स्केलरिस्क, निसी सेड डिग्निस्सिम व्हीकुला, सैपियन लकुस फ्रिंजिल्ला उरना, एट रोंकस एक्स लोरेम विटे माग्ना. नाम फेर्मेंटुम, पुरुस सेड कंसक्वाट वुल्पुटेट, लोरेम सैपियन डिक्टम लोरेम, विटे एयूसमोड औगुए रीसस नॉन मी. इन हक हबितास्से प्लाटेआ डिक्टुमस्ट. डोनेक अ ओर्की मौरिस. पेल्लेंटेस्के नेक सेम लिबरो. वेस्टिबुलम फ्रिंजिल्ला नेकुए उत एस्ट एफिकितुर अलिक्वेट. नुल्ला फासिलिसि. फ्यूस्के एट लिगुला विटे लोरेम कर्सस अलिक्वाम. आलिक्वाम अ एराट अ मि बिबेंडम मोलस्टिये. फासेल्लस उत एक्स अ जस्टो डिग्निस्सिम स्केलरिस्क सिट अमेट सेड लिबरो. डुइस एगेस्टास, मि नॉन डापिबुस हेंड्रेरिट, लिबरो नुंक टिन्सीडुंट ऑर्की, इन डिग्निस्सिम एक्स मि अ औगुए. डोनेक सेड नुल्ला इन एलीट ग्राविडा विनेनेटिस एट नॉन औगुए.</p>","ar":"<p>لوريم إيبسوم دولور سيت أميت، كونسكتتور أديبيسينغ إليت. بريسنت فاسيليسيس أنتي أوت بوروس إليفند فيكولا. كراس فيل ديام إليت. نولام سكيلريسكي، نيسي سيد ديغنيسيم فيكولا، سابين لاكوس فرنجيلا أورنا، أت رونكوس إكس لوريم فيتاي ماجنا. نام فيرمينتوم، بوروس سيد كونسكووت فولووتات، لوريم سابين ديكتوم لوريم، فيتاي إويسمود أوغي ريسوس نون مي. إن هاك هابيتاس بلاتيا ديكتومست. دونيك أ أوركي موريس. بيلينتسكي نيك سيم ليبيرو. فيستيبيولوم فرنجيلا نيكوي أوت إيست إفيكيتور أليكويت. نولا فاسيليسي. فوسكي إت ليجولا فيتاي لوريم كورسوس أليكوام. أليكوام أ إيرات أ مي بيبندم مولستيي. فاسيليس أوت إكس أ جوستو ديغنيسيم سكيلريسكي سيت أميت سيد ليبيرو. دويس إيغيتاس، مي نون دابيبوس هندريريت، ليبيرو ننك تنسيدونت أوركي، إن ديغنيسيم إكس مي أ أوغ</p>"}',
                'slug' => 'health-data-management-34',
                'is_active' => 1,
                'is_featured' => 0,
                'image' => '/images/doctor_posts/66ebd7dbdea74.png',
                'created_at' => '2024-09-19 12:50:51',
                'updated_at' => '2024-09-19 12:50:51',
                'deleted_at' => NULL,
            ),
        ));
        \DB::table('posts')->insert(array (
            0 => 
            array (
                'id' => 35,
                'doctor_id' => 75,
                'clinic_id' => NULL,
                'blog_category_id' => 3,
                'name' => '{"en":"Healthcare IT Leaders","hi":"कृत्रिम बुद्धिमत्ता","ar":"الذكاء الاصطناعي"}',
                'description' => '{"en":"<p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Praesent facilisis ante ut purus eleifend vehicula. Cras vel diam elit. Nullam scelerisque, nisi sed dignissim vehicula, sapien lacus fringilla urna, at rhoncus ex lorem vitae magna. Nam fermentum, purus sed consequat vulputate, lorem sapien dictum lorem, vitae euismod augue risus non mi. In hac habitasse platea dictumst. Donec a orci mauris. Pellentesque nec sem libero. Vestibulum fringilla neque ut est efficitur aliquet. Nulla facilisi. Fusce et ligula vitae lorem cursus aliquam. Aliquam a erat a mi bibendum molestie. Phasellus ut ex a justo dignissim scelerisque sit amet sed libero. Duis egestas, mi non dapibus hendrerit, libero nunc tincidunt orci, in dignissim ex mi a augue. Donec sed nulla in elit gravida venenatis et non augue. Pellentesque et libero quis lorem convallis viverra. Etiam fermentum sapien turpis, vel posuere velit varius ut.</p>","hi":"<p>लोरेम इप्सम डोलर सिट अमेट, कॉन्सेकट्यूर एडिपिसिंग एलीट. प्रेज़ेंट फसिलिसिस अंते उत पुरुस एलीफेंड व्हीकुला. क्रास वेल डायम एलीट. नुल्लम स्केलरिस्क, निसी सेड डिग्निस्सिम व्हीकुला, सैपियन लकुस फ्रिंजिल्ला उरना, एट रोंकस एक्स लोरेम विटे माग्ना. नाम फेर्मेंटुम, पुरुस सेड कंसक्वाट वुल्पुटेट, लोरेम सैपियन डिक्टम लोरेम, विटे एयूसमोड औगुए रीसस नॉन मी. इन हक हबितास्से प्लाटेआ डिक्टुमस्ट. डोनेक अ ओर्की मौरिस. पेल्लेंटेस्के नेक सेम लिबरो. वेस्टिबुलम फ्रिंजिल्ला नेकुए उत एस्ट एफिकितुर अलिक्वेट. नुल्ला फासिलिसि. फ्यूस्के एट लिगुला विटे लोरेम कर्सस अलिक्वाम. आलिक्वाम अ एराट अ मि बिबेंडम मोलस्टिये. फासेल्लस उत एक्स अ जस्टो डिग्निस्सिम स्केलरिस्क सिट अमेट सेड लिबरो. डुइस एगेस्टास, मि नॉन डापिबुस हेंड्रेरिट, लिबरो नुंक टिन्सीडुंट ऑर्की, इन डिग्निस्सिम एक्स मि अ औगुए. डोनेक सेड नुल्ला इन एलीट ग्राविडा विनेनेटिस एट नॉन औगुए.</p>","ar":"<p>لوريم إيبسوم دولور سيت أميت، كونسكتتور أديبيسينغ إليت. بريسنت فاسيليسيس أنتي أوت بوروس إليفند فيكولا. كراس فيل ديام إليت. نولام سكيلريسكي، نيسي سيد ديغنيسيم فيكولا، سابين لاكوس فرنجيلا أورنا، أت رونكوس إكس لوريم فيتاي ماجنا. نام فيرمينتوم، بوروس سيد كونسكووت فولووتات، لوريم سابين ديكتوم لوريم، فيتاي إويسمود أوغي ريسوس نون مي. إن هاك هابيتاس بلاتيا ديكتومست. دونيك أ أوركي موريس. بيلينتسكي نيك سيم ليبيرو. فيستيبيولوم فرنجيلا نيكوي أوت إيست إفيكيتور أليكويت. نولا فاسيليسي. فوسكي إت ليجولا فيتاي لوريم كورسوس أليكوام. أليكوام أ إيرات أ مي بيبندم مولستيي. فاسيليس أوت إكس أ جوستو ديغنيسيم سكيلريسكي سيت أميت سيد ليبيرو. دويس إيغيتاس، مي نون دابيبوس هندريريت، ليبيرو ننك تنسيدونت أوركي، إن ديغنيسيم إكس مي أ أوغ</p>"}',
                'slug' => 'healthcare-it-leaders-35',
                'is_active' => 1,
                'is_featured' => 0,
                'image' => '/images/doctor_posts/66ebd8034aeb3.png',
                'created_at' => '2024-09-19 12:51:31',
                'updated_at' => '2024-09-19 12:51:31',
                'deleted_at' => NULL,
            ),
        ));
        \DB::table('posts')->insert(array (
            0 => 
            array (
                'id' => 36,
                'doctor_id' => 75,
                'clinic_id' => NULL,
                'blog_category_id' => 3,
                'name' => '{"en":"MedGadget","hi":"पारिस्थितिकी","ar":"علم البيئة"}',
                'description' => '{"en":"<p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Praesent facilisis ante ut purus eleifend vehicula. Cras vel diam elit. Nullam scelerisque, nisi sed dignissim vehicula, sapien lacus fringilla urna, at rhoncus ex lorem vitae magna. Nam fermentum, purus sed consequat vulputate, lorem sapien dictum lorem, vitae euismod augue risus non mi. In hac habitasse platea dictumst. Donec a orci mauris. Pellentesque nec sem libero. Vestibulum fringilla neque ut est efficitur aliquet. Nulla facilisi. Fusce et ligula vitae lorem cursus aliquam. Aliquam a erat a mi bibendum molestie. Phasellus ut ex a justo dignissim scelerisque sit amet sed libero. Duis egestas, mi non dapibus hendrerit, libero nunc tincidunt orci, in dignissim ex mi a augue. Donec sed nulla in elit gravida venenatis et non augue. Pellentesque et libero quis lorem convallis viverra. Etiam fermentum sapien turpis, vel posuere velit varius ut.</p>","hi":"<p>लोरेम इप्सम डोलर सिट अमेट, कॉन्सेकट्यूर एडिपिसिंग एलीट. प्रेज़ेंट फसिलिसिस अंते उत पुरुस एलीफेंड व्हीकुला. क्रास वेल डायम एलीट. नुल्लम स्केलरिस्क, निसी सेड डिग्निस्सिम व्हीकुला, सैपियन लकुस फ्रिंजिल्ला उरना, एट रोंकस एक्स लोरेम विटे माग्ना. नाम फेर्मेंटुम, पुरुस सेड कंसक्वाट वुल्पुटेट, लोरेम सैपियन डिक्टम लोरेम, विटे एयूसमोड औगुए रीसस नॉन मी. इन हक हबितास्से प्लाटेआ डिक्टुमस्ट. डोनेक अ ओर्की मौरिस. पेल्लेंटेस्के नेक सेम लिबरो. वेस्टिबुलम फ्रिंजिल्ला नेकुए उत एस्ट एफिकितुर अलिक्वेट. नुल्ला फासिलिसि. फ्यूस्के एट लिगुला विटे लोरेम कर्सस अलिक्वाम. आलिक्वाम अ एराट अ मि बिबेंडम मोलस्टिये. फासेल्लस उत एक्स अ जस्टो डिग्निस्सिम स्केलरिस्क सिट अमेट सेड लिबरो. डुइस एगेस्टास, मि नॉन डापिबुस हेंड्रेरिट, लिबरो नुंक टिन्सीडुंट ऑर्की, इन डिग्निस्सिम एक्स मि अ औगुए. डोनेक सेड नुल्ला इन एलीट ग्राविडा विनेनेटिस एट नॉन औगुए.</p>","ar":"<p>لوريم إيبسوم دولور سيت أميت، كونسكتتور أديبيسينغ إليت. بريسنت فاسيليسيس أنتي أوت بوروس إليفند فيكولا. كراس فيل ديام إليت. نولام سكيلريسكي، نيسي سيد ديغنيسيم فيكولا، سابين لاكوس فرنجيلا أورنا، أت رونكوس إكس لوريم فيتاي ماجنا. نام فيرمينتوم، بوروس سيد كونسكووت فولووتات، لوريم سابين ديكتوم لوريم، فيتاي إويسمود أوغي ريسوس نون مي. إن هاك هابيتاس بلاتيا ديكتومست. دونيك أ أوركي موريس. بيلينتسكي نيك سيم ليبيرو. فيستيبيولوم فرنجيلا نيكوي أوت إيست إفيكيتور أليكويت. نولا فاسيليسي. فوسكي إت ليجولا فيتاي لوريم كورسوس أليكوام. أليكوام أ إيرات أ مي بيبندم مولستيي. فاسيليس أوت إكس أ جوستو ديغنيسيم سكيلريسكي سيت أميت سيد ليبيرو. دويس إيغيتاس، مي نون دابيبوس هندريريت، ليبيرو ننك تنسيدونت أوركي، إن ديغنيسيم إكس مي أ أوغ</p>"}',
                'slug' => 'medgadget-36',
                'is_active' => 1,
                'is_featured' => 0,
                'image' => '/images/doctor_posts/66ebd845bf432.png',
                'created_at' => '2024-09-19 12:52:37',
                'updated_at' => '2024-09-19 12:52:37',
                'deleted_at' => NULL,
            ),
        ));
        \DB::table('posts')->insert(array (
            0 => 
            array (
                'id' => 37,
                'doctor_id' => 76,
                'clinic_id' => NULL,
                'blog_category_id' => 2,
                'name' => '{"en":"Health Information Systems Blog","hi":"सामान्य बुद्धि शिक्षा ब्लॉग","ar":"مدونة التعليم بالمنطق السليم"}',
                'description' => '{"en":"<p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Praesent facilisis ante ut purus eleifend vehicula. Cras vel diam elit. Nullam scelerisque, nisi sed dignissim vehicula, sapien lacus fringilla urna, at rhoncus ex lorem vitae magna. Nam fermentum, purus sed consequat vulputate, lorem sapien dictum lorem, vitae euismod augue risus non mi. In hac habitasse platea dictumst. Donec a orci mauris. Pellentesque nec sem libero. Vestibulum fringilla neque ut est efficitur aliquet. Nulla facilisi. Fusce et ligula vitae lorem cursus aliquam. Aliquam a erat a mi bibendum molestie. Phasellus ut ex a justo dignissim scelerisque sit amet sed libero. Duis egestas, mi non dapibus hendrerit, libero nunc tincidunt orci, in dignissim ex mi a augue. Donec sed nulla in elit gravida venenatis et non augue. Pellentesque et libero quis lorem convallis viverra. Etiam fermentum sapien turpis, vel posuere velit varius ut.</p>","hi":"<p>लोरेम इप्सम डोलर सिट अमेट, कॉन्सेकट्यूर एडिपिसिंग एलीट. प्रेज़ेंट फसिलिसिस अंते उत पुरुस एलीफेंड व्हीकुला. क्रास वेल डायम एलीट. नुल्लम स्केलरिस्क, निसी सेड डिग्निस्सिम व्हीकुला, सैपियन लकुस फ्रिंजिल्ला उरना, एट रोंकस एक्स लोरेम विटे माग्ना. नाम फेर्मेंटुम, पुरुस सेड कंसक्वाट वुल्पुटेट, लोरेम सैपियन डिक्टम लोरेम, विटे एयूसमोड औगुए रीसस नॉन मी. इन हक हबितास्से प्लाटेआ डिक्टुमस्ट. डोनेक अ ओर्की मौरिस. पेल्लेंटेस्के नेक सेम लिबरो. वेस्टिबुलम फ्रिंजिल्ला नेकुए उत एस्ट एफिकितुर अलिक्वेट. नुल्ला फासिलिसि. फ्यूस्के एट लिगुला विटे लोरेम कर्सस अलिक्वाम. आलिक्वाम अ एराट अ मि बिबेंडम मोलस्टिये. फासेल्लस उत एक्स अ जस्टो डिग्निस्सिम स्केलरिस्क सिट अमेट सेड लिबरो. डुइस एगेस्टास, मि नॉन डापिबुस हेंड्रेरिट, लिबरो नुंक टिन्सीडुंट ऑर्की, इन डिग्निस्सिम एक्स मि अ औगुए. डोनेक सेड नुल्ला इन एलीट ग्राविडा विनेनेटिस एट नॉन औगुए.</p>","ar":"<p>لوريم إيبسوم دولور سيت أميت، كونسكتتور أديبيسينغ إليت. بريسنت فاسيليسيس أنتي أوت بوروس إليفند فيكولا. كراس فيل ديام إليت. نولام سكيلريسكي، نيسي سيد ديغنيسيم فيكولا، سابين لاكوس فرنجيلا أورنا، أت رونكوس إكس لوريم فيتاي ماجنا. نام فيرمينتوم، بوروس سيد كونسكووت فولووتات، لوريم سابين ديكتوم لوريم، فيتاي إويسمود أوغي ريسوس نون مي. إن هاك هابيتاس بلاتيا ديكتومست. دونيك أ أوركي موريس. بيلينتسكي نيك سيم ليبيرو. فيستيبيولوم فرنجيلا نيكوي أوت إيست إفيكيتور أليكويت. نولا فاسيليسي. فوسكي إت ليجولا فيتاي لوريم كورسوس أليكوام. أليكوام أ إيرات أ مي بيبندم مولستيي. فاسيليس أوت إكس أ جوستو ديغنيسيم سكيلريسكي سيت أميت سيد ليبيرو. دويس إيغيتاس، مي نون دابيبوس هندريريت، ليبيرو ننك تنسيدونت أوركي، إن ديغنيسيم إكس مي أ أوغ</p>"}',
                'slug' => 'health-information-systems-blog-37',
                'is_active' => 1,
                'is_featured' => 0,
                'image' => '/images/doctor_posts/66ebd8b8b40b2.png',
                'created_at' => '2024-09-19 12:54:32',
                'updated_at' => '2024-09-19 12:54:32',
                'deleted_at' => NULL,
            ),
        ));
        \DB::table('posts')->insert(array (
            0 => 
            array (
                'id' => 38,
                'doctor_id' => 76,
                'clinic_id' => NULL,
                'blog_category_id' => 2,
                'name' => '{"en":"HealthSystemCIO","hi":"कृत्रिम बुद्धिमत्ता","ar":"الذكاء الاصطناعي"}',
                'description' => '{"en":"<p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Praesent facilisis ante ut purus eleifend vehicula. Cras vel diam elit. Nullam scelerisque, nisi sed dignissim vehicula, sapien lacus fringilla urna, at rhoncus ex lorem vitae magna. Nam fermentum, purus sed consequat vulputate, lorem sapien dictum lorem, vitae euismod augue risus non mi. In hac habitasse platea dictumst. Donec a orci mauris. Pellentesque nec sem libero. Vestibulum fringilla neque ut est efficitur aliquet. Nulla facilisi. Fusce et ligula vitae lorem cursus aliquam. Aliquam a erat a mi bibendum molestie. Phasellus ut ex a justo dignissim scelerisque sit amet sed libero. Duis egestas, mi non dapibus hendrerit, libero nunc tincidunt orci, in dignissim ex mi a augue. Donec sed nulla in elit gravida venenatis et non augue. Pellentesque et libero quis lorem convallis viverra. Etiam fermentum sapien turpis, vel posuere velit varius ut.</p>","hi":"<p>लोरेम इप्सम डोलर सिट अमेट, कॉन्सेकट्यूर एडिपिसिंग एलीट. प्रेज़ेंट फसिलिसिस अंते उत पुरुस एलीफेंड व्हीकुला. क्रास वेल डायम एलीट. नुल्लम स्केलरिस्क, निसी सेड डिग्निस्सिम व्हीकुला, सैपियन लकुस फ्रिंजिल्ला उरना, एट रोंकस एक्स लोरेम विटे माग्ना. नाम फेर्मेंटुम, पुरुस सेड कंसक्वाट वुल्पुटेट, लोरेम सैपियन डिक्टम लोरेम, विटे एयूसमोड औगुए रीसस नॉन मी. इन हक हबितास्से प्लाटेआ डिक्टुमस्ट. डोनेक अ ओर्की मौरिस. पेल्लेंटेस्के नेक सेम लिबरो. वेस्टिबुलम फ्रिंजिल्ला नेकुए उत एस्ट एफिकितुर अलिक्वेट. नुल्ला फासिलिसि. फ्यूस्के एट लिगुला विटे लोरेम कर्सस अलिक्वाम. आलिक्वाम अ एराट अ मि बिबेंडम मोलस्टिये. फासेल्लस उत एक्स अ जस्टो डिग्निस्सिम स्केलरिस्क सिट अमेट सेड लिबरो. डुइस एगेस्टास, मि नॉन डापिबुस हेंड्रेरिट, लिबरो नुंक टिन्सीडुंट ऑर्की, इन डिग्निस्सिम एक्स मि अ औगुए. डोनेक सेड नुल्ला इन एलीट ग्राविडा विनेनेटिस एट नॉन औगुए.</p>","ar":"<p>لوريم إيبسوم دولور سيت أميت، كونسكتتور أديبيسينغ إليت. بريسنت فاسيليسيس أنتي أوت بوروس إليفند فيكولا. كراس فيل ديام إليت. نولام سكيلريسكي، نيسي سيد ديغنيسيم فيكولا، سابين لاكوس فرنجيلا أورنا، أت رونكوس إكس لوريم فيتاي ماجنا. نام فيرمينتوم، بوروس سيد كونسكووت فولووتات، لوريم سابين ديكتوم لوريم، فيتاي إويسمود أوغي ريسوس نون مي. إن هاك هابيتاس بلاتيا ديكتومست. دونيك أ أوركي موريس. بيلينتسكي نيك سيم ليبيرو. فيستيبيولوم فرنجيلا نيكوي أوت إيست إفيكيتور أليكويت. نولا فاسيليسي. فوسكي إت ليجولا فيتاي لوريم كورسوس أليكوام. أليكوام أ إيرات أ مي بيبندم مولستيي. فاسيليس أوت إكس أ جوستو ديغنيسيم سكيلريسكي سيت أميت سيد ليبيرو. دويس إيغيتاس، مي نون دابيبوس هندريريت، ليبيرو ننك تنسيدونت أوركي، إن ديغنيسيم إكس مي أ أوغ</p>"}',
                'slug' => 'healthsystemcio-38',
                'is_active' => 1,
                'is_featured' => 0,
                'image' => '/images/doctor_posts/66ebd8ebee580.png',
                'created_at' => '2024-09-19 12:55:23',
                'updated_at' => '2024-09-19 12:55:23',
                'deleted_at' => NULL,
            ),
        ));
        \DB::table('posts')->insert(array (
            0 => 
            array (
                'id' => 39,
                'doctor_id' => 76,
                'clinic_id' => NULL,
                'blog_category_id' => 1,
                'name' => '{"en":"The Healthcare Blog","hi":"कृत्रिम बुद्धिमत्ता","ar":"التصميم الصناعي"}',
                'description' => '{"en":"<p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Praesent facilisis ante ut purus eleifend vehicula. Cras vel diam elit. Nullam scelerisque, nisi sed dignissim vehicula, sapien lacus fringilla urna, at rhoncus ex lorem vitae magna. Nam fermentum, purus sed consequat vulputate, lorem sapien dictum lorem, vitae euismod augue risus non mi. In hac habitasse platea dictumst. Donec a orci mauris. Pellentesque nec sem libero. Vestibulum fringilla neque ut est efficitur aliquet. Nulla facilisi. Fusce et ligula vitae lorem cursus aliquam. Aliquam a erat a mi bibendum molestie. Phasellus ut ex a justo dignissim scelerisque sit amet sed libero. Duis egestas, mi non dapibus hendrerit, libero nunc tincidunt orci, in dignissim ex mi a augue. Donec sed nulla in elit gravida venenatis et non augue. Pellentesque et libero quis lorem convallis viverra. Etiam fermentum sapien turpis, vel posuere velit varius ut.</p>","hi":"<p>लोरेम इप्सम डोलर सिट अमेट, कॉन्सेकट्यूर एडिपिसिंग एलीट. प्रेज़ेंट फसिलिसिस अंते उत पुरुस एलीफेंड व्हीकुला. क्रास वेल डायम एलीट. नुल्लम स्केलरिस्क, निसी सेड डिग्निस्सिम व्हीकुला, सैपियन लकुस फ्रिंजिल्ला उरना, एट रोंकस एक्स लोरेम विटे माग्ना. नाम फेर्मेंटुम, पुरुस सेड कंसक्वाट वुल्पुटेट, लोरेम सैपियन डिक्टम लोरेम, विटे एयूसमोड औगुए रीसस नॉन मी. इन हक हबितास्से प्लाटेआ डिक्टुमस्ट. डोनेक अ ओर्की मौरिस. पेल्लेंटेस्के नेक सेम लिबरो. वेस्टिबुलम फ्रिंजिल्ला नेकुए उत एस्ट एफिकितुर अलिक्वेट. नुल्ला फासिलिसि. फ्यूस्के एट लिगुला विटे लोरेम कर्सस अलिक्वाम. आलिक्वाम अ एराट अ मि बिबेंडम मोलस्टिये. फासेल्लस उत एक्स अ जस्टो डिग्निस्सिम स्केलरिस्क सिट अमेट सेड लिबरो. डुइस एगेस्टास, मि नॉन डापिबुस हेंड्रेरिट, लिबरो नुंक टिन्सीडुंट ऑर्की, इन डिग्निस्सिम एक्स मि अ औगुए. डोनेक सेड नुल्ला इन एलीट ग्राविडा विनेनेटिस एट नॉन औगुए.</p>","ar":"<p>لوريم إيبسوم دولور سيت أميت، كونسكتتور أديبيسينغ إليت. بريسنت فاسيليسيس أنتي أوت بوروس إليفند فيكولا. كراس فيل ديام إليت. نولام سكيلريسكي، نيسي سيد ديغنيسيم فيكولا، سابين لاكوس فرنجيلا أورنا، أت رونكوس إكس لوريم فيتاي ماجنا. نام فيرمينتوم، بوروس سيد كونسكووت فولووتات، لوريم سابين ديكتوم لوريم، فيتاي إويسمود أوغي ريسوس نون مي. إن هاك هابيتاس بلاتيا ديكتومست. دونيك أ أوركي موريس. بيلينتسكي نيك سيم ليبيرو. فيستيبيولوم فرنجيلا نيكوي أوت إيست إفيكيتور أليكويت. نولا فاسيليسي. فوسكي إت ليجولا فيتاي لوريم كورسوس أليكوام. أليكوام أ إيرات أ مي بيبندم مولستيي. فاسيليس أوت إكس أ جوستو ديغنيسيم سكيلريسكي سيت أميت سيد ليبيرو. دويس إيغيتاس، مي نون دابيبوس هندريريت، ليبيرو ننك تنسيدونت أوركي، إن ديغنيسيم إكس مي أ أوغ</p>"}',
                'slug' => 'the-healthcare-blog-39',
                'is_active' => 1,
                'is_featured' => 0,
                'image' => '/images/doctor_posts/66ebd91377e5f.png',
                'created_at' => '2024-09-19 12:56:03',
                'updated_at' => '2024-09-19 12:56:03',
                'deleted_at' => NULL,
            ),
        ));
        \DB::table('posts')->insert(array (
            0 => 
            array (
                'id' => 40,
                'doctor_id' => 77,
                'clinic_id' => NULL,
                'blog_category_id' => 2,
                'name' => '{"en":"EHR Intelligence","hi":"क्विज़ प्रतियोगिता","ar":"فعالية الخطاب التعليمي"}',
                'description' => '{"en":"<p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Praesent facilisis ante ut purus eleifend vehicula. Cras vel diam elit. Nullam scelerisque, nisi sed dignissim vehicula, sapien lacus fringilla urna, at rhoncus ex lorem vitae magna. Nam fermentum, purus sed consequat vulputate, lorem sapien dictum lorem, vitae euismod augue risus non mi. In hac habitasse platea dictumst. Donec a orci mauris. Pellentesque nec sem libero. Vestibulum fringilla neque ut est efficitur aliquet. Nulla facilisi. Fusce et ligula vitae lorem cursus aliquam. Aliquam a erat a mi bibendum molestie. Phasellus ut ex a justo dignissim scelerisque sit amet sed libero. Duis egestas, mi non dapibus hendrerit, libero nunc tincidunt orci, in dignissim ex mi a augue. Donec sed nulla in elit gravida venenatis et non augue. Pellentesque et libero quis lorem convallis viverra. Etiam fermentum sapien turpis, vel posuere velit varius ut.</p>","hi":"<p>लोरेम इप्सम डोलर सिट अमेट, कॉन्सेकट्यूर एडिपिसिंग एलीट. प्रेज़ेंट फसिलिसिस अंते उत पुरुस एलीफेंड व्हीकुला. क्रास वेल डायम एलीट. नुल्लम स्केलरिस्क, निसी सेड डिग्निस्सिम व्हीकुला, सैपियन लकुस फ्रिंजिल्ला उरना, एट रोंकस एक्स लोरेम विटे माग्ना. नाम फेर्मेंटुम, पुरुस सेड कंसक्वाट वुल्पुटेट, लोरेम सैपियन डिक्टम लोरेम, विटे एयूसमोड औगुए रीसस नॉन मी. इन हक हबितास्से प्लाटेआ डिक्टुमस्ट. डोनेक अ ओर्की मौरिस. पेल्लेंटेस्के नेक सेम लिबरो. वेस्टिबुलम फ्रिंजिल्ला नेकुए उत एस्ट एफिकितुर अलिक्वेट. नुल्ला फासिलिसि. फ्यूस्के एट लिगुला विटे लोरेम कर्सस अलिक्वाम. आलिक्वाम अ एराट अ मि बिबेंडम मोलस्टिये. फासेल्लस उत एक्स अ जस्टो डिग्निस्सिम स्केलरिस्क सिट अमेट सेड लिबरो. डुइस एगेस्टास, मि नॉन डापिबुस हेंड्रेरिट, लिबरो नुंक टिन्सीडुंट ऑर्की, इन डिग्निस्सिम एक्स मि अ औगुए. डोनेक सेड नुल्ला इन एलीट ग्राविडा विनेनेटिस एट नॉन औगुए.</p>","ar":"<p>لوريم إيبسوم دولور سيت أميت، كونسكتتور أديبيسينغ إليت. بريسنت فاسيليسيس أنتي أوت بوروس إليفند فيكولا. كراس فيل ديام إليت. نولام سكيلريسكي، نيسي سيد ديغنيسيم فيكولا، سابين لاكوس فرنجيلا أورنا، أت رونكوس إكس لوريم فيتاي ماجنا. نام فيرمينتوم، بوروس سيد كونسكووت فولووتات، لوريم سابين ديكتوم لوريم، فيتاي إويسمود أوغي ريسوس نون مي. إن هاك هابيتاس بلاتيا ديكتومست. دونيك أ أوركي موريس. بيلينتسكي نيك سيم ليبيرو. فيستيبيولوم فرنجيلا نيكوي أوت إيست إفيكيتور أليكويت. نولا فاسيليسي. فوسكي إت ليجولا فيتاي لوريم كورسوس أليكوام. أليكوام أ إيرات أ مي بيبندم مولستيي. فاسيليس أوت إكس أ جوستو ديغنيسيم سكيلريسكي سيت أميت سيد ليبيرو. دويس إيغيتاس، مي نون دابيبوس هندريريت، ليبيرو ننك تنسيدونت أوركي، إن ديغنيسيم إكس مي أ أوغ</p>"}',
                'slug' => 'ehr-intelligence-40',
                'is_active' => 1,
                'is_featured' => 0,
                'image' => '/images/doctor_posts/66ebd950ac0e4.png',
                'created_at' => '2024-09-19 12:57:04',
                'updated_at' => '2024-09-19 12:57:04',
                'deleted_at' => NULL,
            ),
        ));
        \DB::table('posts')->insert(array (
            0 => 
            array (
                'id' => 41,
                'doctor_id' => 77,
                'clinic_id' => NULL,
                'blog_category_id' => 2,
                'name' => '{"en":"Epic Systems Blog","hi":"शैक्षिक भाषण समारोह","ar":"الذكاء الاصطناعي"}',
                'description' => '{"en":"<p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Praesent facilisis ante ut purus eleifend vehicula. Cras vel diam elit. Nullam scelerisque, nisi sed dignissim vehicula, sapien lacus fringilla urna, at rhoncus ex lorem vitae magna. Nam fermentum, purus sed consequat vulputate, lorem sapien dictum lorem, vitae euismod augue risus non mi. In hac habitasse platea dictumst. Donec a orci mauris. Pellentesque nec sem libero. Vestibulum fringilla neque ut est efficitur aliquet. Nulla facilisi. Fusce et ligula vitae lorem cursus aliquam. Aliquam a erat a mi bibendum molestie. Phasellus ut ex a justo dignissim scelerisque sit amet sed libero. Duis egestas, mi non dapibus hendrerit, libero nunc tincidunt orci, in dignissim ex mi a augue. Donec sed nulla in elit gravida venenatis et non augue. Pellentesque et libero quis lorem convallis viverra. Etiam fermentum sapien turpis, vel posuere velit varius ut.</p>","hi":"<p>लोरेम इप्सम डोलर सिट अमेट, कॉन्सेकट्यूर एडिपिसिंग एलीट. प्रेज़ेंट फसिलिसिस अंते उत पुरुस एलीफेंड व्हीकुला. क्रास वेल डायम एलीट. नुल्लम स्केलरिस्क, निसी सेड डिग्निस्सिम व्हीकुला, सैपियन लकुस फ्रिंजिल्ला उरना, एट रोंकस एक्स लोरेम विटे माग्ना. नाम फेर्मेंटुम, पुरुस सेड कंसक्वाट वुल्पुटेट, लोरेम सैपियन डिक्टम लोरेम, विटे एयूसमोड औगुए रीसस नॉन मी. इन हक हबितास्से प्लाटेआ डिक्टुमस्ट. डोनेक अ ओर्की मौरिस. पेल्लेंटेस्के नेक सेम लिबरो. वेस्टिबुलम फ्रिंजिल्ला नेकुए उत एस्ट एफिकितुर अलिक्वेट. नुल्ला फासिलिसि. फ्यूस्के एट लिगुला विटे लोरेम कर्सस अलिक्वाम. आलिक्वाम अ एराट अ मि बिबेंडम मोलस्टिये. फासेल्लस उत एक्स अ जस्टो डिग्निस्सिम स्केलरिस्क सिट अमेट सेड लिबरो. डुइस एगेस्टास, मि नॉन डापिबुस हेंड्रेरिट, लिबरो नुंक टिन्सीडुंट ऑर्की, इन डिग्निस्सिम एक्स मि अ औगुए. डोनेक सेड नुल्ला इन एलीट ग्राविडा विनेनेटिस एट नॉन औगुए.</p>","ar":"<p>لوريم إيبسوم دولور سيت أميت، كونسكتتور أديبيسينغ إليت. بريسنت فاسيليسيس أنتي أوت بوروس إليفند فيكولا. كراس فيل ديام إليت. نولام سكيلريسكي، نيسي سيد ديغنيسيم فيكولا، سابين لاكوس فرنجيلا أورنا، أت رونكوس إكس لوريم فيتاي ماجنا. نام فيرمينتوم، بوروس سيد كونسكووت فولووتات، لوريم سابين ديكتوم لوريم، فيتاي إويسمود أوغي ريسوس نون مي. إن هاك هابيتاس بلاتيا ديكتومست. دونيك أ أوركي موريس. بيلينتسكي نيك سيم ليبيرو. فيستيبيولوم فرنجيلا نيكوي أوت إيست إفيكيتور أليكويت. نولا فاسيليسي. فوسكي إت ليجولا فيتاي لوريم كورسوس أليكوام. أليكوام أ إيرات أ مي بيبندم مولستيي. فاسيليس أوت إكس أ جوستو ديغنيسيم سكيلريسكي سيت أميت سيد ليبيرو. دويس إيغيتاس، مي نون دابيبوس هندريريت، ليبيرو ننك تنسيدونت أوركي، إن ديغنيسيم إكس مي أ أوغ</p>"}',
                'slug' => 'epic-systems-blog-41',
                'is_active' => 1,
                'is_featured' => 0,
                'image' => '/images/doctor_posts/66ebd97bce533.png',
                'created_at' => '2024-09-19 12:57:47',
                'updated_at' => '2024-09-19 12:57:47',
                'deleted_at' => NULL,
            ),
        ));
        \DB::table('posts')->insert(array (
            0 => 
            array (
                'id' => 42,
                'doctor_id' => 77,
                'clinic_id' => NULL,
                'blog_category_id' => 3,
                'name' => '{"en":"HealthCatalyst Blog","hi":"कृत्रिम बुद्धिमत्ता","ar":"علم البيئة"}',
                'description' => '{"en":"<p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Praesent facilisis ante ut purus eleifend vehicula. Cras vel diam elit. Nullam scelerisque, nisi sed dignissim vehicula, sapien lacus fringilla urna, at rhoncus ex lorem vitae magna. Nam fermentum, purus sed consequat vulputate, lorem sapien dictum lorem, vitae euismod augue risus non mi. In hac habitasse platea dictumst. Donec a orci mauris. Pellentesque nec sem libero. Vestibulum fringilla neque ut est efficitur aliquet. Nulla facilisi. Fusce et ligula vitae lorem cursus aliquam. Aliquam a erat a mi bibendum molestie. Phasellus ut ex a justo dignissim scelerisque sit amet sed libero. Duis egestas, mi non dapibus hendrerit, libero nunc tincidunt orci, in dignissim ex mi a augue. Donec sed nulla in elit gravida venenatis et non augue. Pellentesque et libero quis lorem convallis viverra. Etiam fermentum sapien turpis, vel posuere velit varius ut.</p>","hi":"<p>लोरेम इप्सम डोलर सिट अमेट, कॉन्सेकट्यूर एडिपिसिंग एलीट. प्रेज़ेंट फसिलिसिस अंते उत पुरुस एलीफेंड व्हीकुला. क्रास वेल डायम एलीट. नुल्लम स्केलरिस्क, निसी सेड डिग्निस्सिम व्हीकुला, सैपियन लकुस फ्रिंजिल्ला उरना, एट रोंकस एक्स लोरेम विटे माग्ना. नाम फेर्मेंटुम, पुरुस सेड कंसक्वाट वुल्पुटेट, लोरेम सैपियन डिक्टम लोरेम, विटे एयूसमोड औगुए रीसस नॉन मी. इन हक हबितास्से प्लाटेआ डिक्टुमस्ट. डोनेक अ ओर्की मौरिस. पेल्लेंटेस्के नेक सेम लिबरो. वेस्टिबुलम फ्रिंजिल्ला नेकुए उत एस्ट एफिकितुर अलिक्वेट. नुल्ला फासिलिसि. फ्यूस्के एट लिगुला विटे लोरेम कर्सस अलिक्वाम. आलिक्वाम अ एराट अ मि बिबेंडम मोलस्टिये. फासेल्लस उत एक्स अ जस्टो डिग्निस्सिम स्केलरिस्क सिट अमेट सेड लिबरो. डुइस एगेस्टास, मि नॉन डापिबुस हेंड्रेरिट, लिबरो नुंक टिन्सीडुंट ऑर्की, इन डिग्निस्सिम एक्स मि अ औगुए. डोनेक सेड नुल्ला इन एलीट ग्राविडा विनेनेटिस एट नॉन औगुए.</p>","ar":"<p>لوريم إيبسوم دولور سيت أميت، كونسكتتور أديبيسينغ إليت. بريسنت فاسيليسيس أنتي أوت بوروس إليفند فيكولا. كراس فيل ديام إليت. نولام سكيلريسكي، نيسي سيد ديغنيسيم فيكولا، سابين لاكوس فرنجيلا أورنا، أت رونكوس إكس لوريم فيتاي ماجنا. نام فيرمينتوم، بوروس سيد كونسكووت فولووتات، لوريم سابين ديكتوم لوريم، فيتاي إويسمود أوغي ريسوس نون مي. إن هاك هابيتاس بلاتيا ديكتومست. دونيك أ أوركي موريس. بيلينتسكي نيك سيم ليبيرو. فيستيبيولوم فرنجيلا نيكوي أوت إيست إفيكيتور أليكويت. نولا فاسيليسي. فوسكي إت ليجولا فيتاي لوريم كورسوس أليكوام. أليكوام أ إيرات أ مي بيبندم مولستيي. فاسيليس أوت إكس أ جوستو ديغنيسيم سكيلريسكي سيت أميت سيد ليبيرو. دويس إيغيتاس، مي نون دابيبوس هندريريت، ليبيرو ننك تنسيدونت أوركي، إن ديغنيسيم إكس مي أ أوغ</p>"}',
                'slug' => 'healthcatalyst-blog-42',
                'is_active' => 1,
                'is_featured' => 0,
                'image' => '/images/doctor_posts/66ebd9bb0027f.png',
                'created_at' => '2024-09-19 12:58:51',
                'updated_at' => '2024-09-19 12:58:51',
                'deleted_at' => NULL,
            ),
        ));
        \DB::table('posts')->insert(array (
            0 => 
            array (
                'id' => 43,
                'doctor_id' => 78,
                'clinic_id' => NULL,
                'blog_category_id' => 2,
                'name' => '{"en":"Digital Health","hi":"पारिस्थितिकी","ar":"علم البيئة"}',
                'description' => '{"en":"<p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Praesent facilisis ante ut purus eleifend vehicula. Cras vel diam elit. Nullam scelerisque, nisi sed dignissim vehicula, sapien lacus fringilla urna, at rhoncus ex lorem vitae magna. Nam fermentum, purus sed consequat vulputate, lorem sapien dictum lorem, vitae euismod augue risus non mi. In hac habitasse platea dictumst. Donec a orci mauris. Pellentesque nec sem libero. Vestibulum fringilla neque ut est efficitur aliquet. Nulla facilisi. Fusce et ligula vitae lorem cursus aliquam. Aliquam a erat a mi bibendum molestie. Phasellus ut ex a justo dignissim scelerisque sit amet sed libero. Duis egestas, mi non dapibus hendrerit, libero nunc tincidunt orci, in dignissim ex mi a augue. Donec sed nulla in elit gravida venenatis et non augue. Pellentesque et libero quis lorem convallis viverra. Etiam fermentum sapien turpis, vel posuere velit varius ut.</p>","hi":"<p>लोरेम इप्सम डोलर सिट अमेट, कॉन्सेकट्यूर एडिपिसिंग एलीट. प्रेज़ेंट फसिलिसिस अंते उत पुरुस एलीफेंड व्हीकुला. क्रास वेल डायम एलीट. नुल्लम स्केलरिस्क, निसी सेड डिग्निस्सिम व्हीकुला, सैपियन लकुस फ्रिंजिल्ला उरना, एट रोंकस एक्स लोरेम विटे माग्ना. नाम फेर्मेंटुम, पुरुस सेड कंसक्वाट वुल्पुटेट, लोरेम सैपियन डिक्टम लोरेम, विटे एयूसमोड औगुए रीसस नॉन मी. इन हक हबितास्से प्लाटेआ डिक्टुमस्ट. डोनेक अ ओर्की मौरिस. पेल्लेंटेस्के नेक सेम लिबरो. वेस्टिबुलम फ्रिंजिल्ला नेकुए उत एस्ट एफिकितुर अलिक्वेट. नुल्ला फासिलिसि. फ्यूस्के एट लिगुला विटे लोरेम कर्सस अलिक्वाम. आलिक्वाम अ एराट अ मि बिबेंडम मोलस्टिये. फासेल्लस उत एक्स अ जस्टो डिग्निस्सिम स्केलरिस्क सिट अमेट सेड लिबरो. डुइस एगेस्टास, मि नॉन डापिबुस हेंड्रेरिट, लिबरो नुंक टिन्सीडुंट ऑर्की, इन डिग्निस्सिम एक्स मि अ औगुए. डोनेक सेड नुल्ला इन एलीट ग्राविडा विनेनेटिस एट नॉन औगुए.</p>","ar":"<p>لوريم إيبسوم دولور سيت أميت، كونسكتتور أديبيسينغ إليت. بريسنت فاسيليسيس أنتي أوت بوروس إليفند فيكولا. كراس فيل ديام إليت. نولام سكيلريسكي، نيسي سيد ديغنيسيم فيكولا، سابين لاكوس فرنجيلا أورنا، أت رونكوس إكس لوريم فيتاي ماجنا. نام فيرمينتوم، بوروس سيد كونسكووت فولووتات، لوريم سابين ديكتوم لوريم، فيتاي إويسمود أوغي ريسوس نون مي. إن هاك هابيتاس بلاتيا ديكتومست. دونيك أ أوركي موريس. بيلينتسكي نيك سيم ليبيرو. فيستيبيولوم فرنجيلا نيكوي أوت إيست إفيكيتور أليكويت. نولا فاسيليسي. فوسكي إت ليجولا فيتاي لوريم كورسوس أليكوام. أليكوام أ إيرات أ مي بيبندم مولستيي. فاسيليس أوت إكس أ جوستو ديغنيسيم سكيلريسكي سيت أميت سيد ليبيرو. دويس إيغيتاس، مي نون دابيبوس هندريريت، ليبيرو ننك تنسيدونت أوركي، إن ديغنيسيم إكس مي أ أوغ</p>"}',
                'slug' => 'digital-health-43',
                'is_active' => 1,
                'is_featured' => 0,
                'image' => '/images/doctor_posts/66ebda5790174.png',
                'created_at' => '2024-09-19 13:01:27',
                'updated_at' => '2024-09-19 13:01:27',
                'deleted_at' => NULL,
            ),
        ));
        \DB::table('posts')->insert(array (
            0 => 
            array (
                'id' => 44,
                'doctor_id' => 78,
                'clinic_id' => NULL,
                'blog_category_id' => 1,
                'name' => '{"en":"Health Affairs Blog","hi":"क्विज़ प्रतियोगिता","ar":"التصميم الصناعي"}',
                'description' => '{"en":"<p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Praesent facilisis ante ut purus eleifend vehicula. Cras vel diam elit. Nullam scelerisque, nisi sed dignissim vehicula, sapien lacus fringilla urna, at rhoncus ex lorem vitae magna. Nam fermentum, purus sed consequat vulputate, lorem sapien dictum lorem, vitae euismod augue risus non mi. In hac habitasse platea dictumst. Donec a orci mauris. Pellentesque nec sem libero. Vestibulum fringilla neque ut est efficitur aliquet. Nulla facilisi. Fusce et ligula vitae lorem cursus aliquam. Aliquam a erat a mi bibendum molestie. Phasellus ut ex a justo dignissim scelerisque sit amet sed libero. Duis egestas, mi non dapibus hendrerit, libero nunc tincidunt orci, in dignissim ex mi a augue. Donec sed nulla in elit gravida venenatis et non augue. Pellentesque et libero quis lorem convallis viverra. Etiam fermentum sapien turpis, vel posuere velit varius ut.</p>","hi":"<p>लोरेम इप्सम डोलर सिट अमेट, कॉन्सेकट्यूर एडिपिसिंग एलीट. प्रेज़ेंट फसिलिसिस अंते उत पुरुस एलीफेंड व्हीकुला. क्रास वेल डायम एलीट. नुल्लम स्केलरिस्क, निसी सेड डिग्निस्सिम व्हीकुला, सैपियन लकुस फ्रिंजिल्ला उरना, एट रोंकस एक्स लोरेम विटे माग्ना. नाम फेर्मेंटुम, पुरुस सेड कंसक्वाट वुल्पुटेट, लोरेम सैपियन डिक्टम लोरेम, विटे एयूसमोड औगुए रीसस नॉन मी. इन हक हबितास्से प्लाटेआ डिक्टुमस्ट. डोनेक अ ओर्की मौरिस. पेल्लेंटेस्के नेक सेम लिबरो. वेस्टिबुलम फ्रिंजिल्ला नेकुए उत एस्ट एफिकितुर अलिक्वेट. नुल्ला फासिलिसि. फ्यूस्के एट लिगुला विटे लोरेम कर्सस अलिक्वाम. आलिक्वाम अ एराट अ मि बिबेंडम मोलस्टिये. फासेल्लस उत एक्स अ जस्टो डिग्निस्सिम स्केलरिस्क सिट अमेट सेड लिबरो. डुइस एगेस्टास, मि नॉन डापिबुस हेंड्रेरिट, लिबरो नुंक टिन्सीडुंट ऑर्की, इन डिग्निस्सिम एक्स मि अ औगुए. डोनेक सेड नुल्ला इन एलीट ग्राविडा विनेनेटिस एट नॉन औगुए.</p>","ar":"<p>لوريم إيبسوم دولور سيت أميت، كونسكتتور أديبيسينغ إليت. بريسنت فاسيليسيس أنتي أوت بوروس إليفند فيكولا. كراس فيل ديام إليت. نولام سكيلريسكي، نيسي سيد ديغنيسيم فيكولا، سابين لاكوس فرنجيلا أورنا، أت رونكوس إكس لوريم فيتاي ماجنا. نام فيرمينتوم، بوروس سيد كونسكووت فولووتات، لوريم سابين ديكتوم لوريم، فيتاي إويسمود أوغي ريسوس نون مي. إن هاك هابيتاس بلاتيا ديكتومست. دونيك أ أوركي موريس. بيلينتسكي نيك سيم ليبيرو. فيستيبيولوم فرنجيلا نيكوي أوت إيست إفيكيتور أليكويت. نولا فاسيليسي. فوسكي إت ليجولا فيتاي لوريم كورسوس أليكوام. أليكوام أ إيرات أ مي بيبندم مولستيي. فاسيليس أوت إكس أ جوستو ديغنيسيم سكيلريسكي سيت أميت سيد ليبيرو. دويس إيغيتاس، مي نون دابيبوس هندريريت، ليبيرو ننك تنسيدونت أوركي، إن ديغنيسيم إكس مي أ أوغ</p>"}',
                'slug' => 'health-affairs-blog-44',
                'is_active' => 1,
                'is_featured' => 0,
                'image' => '/images/doctor_posts/66ebda969b4f6.png',
                'created_at' => '2024-09-19 13:02:30',
                'updated_at' => '2024-09-19 13:02:30',
                'deleted_at' => NULL,
            ),
        ));
        \DB::table('posts')->insert(array (
            0 => 
            array (
                'id' => 45,
                'doctor_id' => 78,
                'clinic_id' => NULL,
                'blog_category_id' => 2,
                'name' => '{"en":"ONC Health IT Blog","hi":"क्विज़ प्रतियोगिता","ar":"التصميم الصناعي"}',
                'description' => '{"en":"<p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Praesent facilisis ante ut purus eleifend vehicula. Cras vel diam elit. Nullam scelerisque, nisi sed dignissim vehicula, sapien lacus fringilla urna, at rhoncus ex lorem vitae magna. Nam fermentum, purus sed consequat vulputate, lorem sapien dictum lorem, vitae euismod augue risus non mi. In hac habitasse platea dictumst. Donec a orci mauris. Pellentesque nec sem libero. Vestibulum fringilla neque ut est efficitur aliquet. Nulla facilisi. Fusce et ligula vitae lorem cursus aliquam. Aliquam a erat a mi bibendum molestie. Phasellus ut ex a justo dignissim scelerisque sit amet sed libero. Duis egestas, mi non dapibus hendrerit, libero nunc tincidunt orci, in dignissim ex mi a augue. Donec sed nulla in elit gravida venenatis et non augue. Pellentesque et libero quis lorem convallis viverra. Etiam fermentum sapien turpis, vel posuere velit varius ut.</p>","hi":"<p>लोरेम इप्सम डोलर सिट अमेट, कॉन्सेकट्यूर एडिपिसिंग एलीट. प्रेज़ेंट फसिलिसिस अंते उत पुरुस एलीफेंड व्हीकुला. क्रास वेल डायम एलीट. नुल्लम स्केलरिस्क, निसी सेड डिग्निस्सिम व्हीकुला, सैपियन लकुस फ्रिंजिल्ला उरना, एट रोंकस एक्स लोरेम विटे माग्ना. नाम फेर्मेंटुम, पुरुस सेड कंसक्वाट वुल्पुटेट, लोरेम सैपियन डिक्टम लोरेम, विटे एयूसमोड औगुए रीसस नॉन मी. इन हक हबितास्से प्लाटेआ डिक्टुमस्ट. डोनेक अ ओर्की मौरिस. पेल्लेंटेस्के नेक सेम लिबरो. वेस्टिबुलम फ्रिंजिल्ला नेकुए उत एस्ट एफिकितुर अलिक्वेट. नुल्ला फासिलिसि. फ्यूस्के एट लिगुला विटे लोरेम कर्सस अलिक्वाम. आलिक्वाम अ एराट अ मि बिबेंडम मोलस्टिये. फासेल्लस उत एक्स अ जस्टो डिग्निस्सिम स्केलरिस्क सिट अमेट सेड लिबरो. डुइस एगेस्टास, मि नॉन डापिबुस हेंड्रेरिट, लिबरो नुंक टिन्सीडुंट ऑर्की, इन डिग्निस्सिम एक्स मि अ औगुए. डोनेक सेड नुल्ला इन एलीट ग्राविडा विनेनेटिस एट नॉन औगुए.</p>","ar":"<p>لوريم إيبسوم دولور سيت أميت، كونسكتتور أديبيسينغ إليت. بريسنت فاسيليسيس أنتي أوت بوروس إليفند فيكولا. كراس فيل ديام إليت. نولام سكيلريسكي، نيسي سيد ديغنيسيم فيكولا، سابين لاكوس فرنجيلا أورنا، أت رونكوس إكس لوريم فيتاي ماجنا. نام فيرمينتوم، بوروس سيد كونسكووت فولووتات، لوريم سابين ديكتوم لوريم، فيتاي إويسمود أوغي ريسوس نون مي. إن هاك هابيتاس بلاتيا ديكتومست. دونيك أ أوركي موريس. بيلينتسكي نيك سيم ليبيرو. فيستيبيولوم فرنجيلا نيكوي أوت إيست إفيكيتور أليكويت. نولا فاسيليسي. فوسكي إت ليجولا فيتاي لوريم كورسوس أليكوام. أليكوام أ إيرات أ مي بيبندم مولستيي. فاسيليس أوت إكس أ جوستو ديغنيسيم سكيلريسكي سيت أميت سيد ليبيرو. دويس إيغيتاس، مي نون دابيبوس هندريريت، ليبيرو ننك تنسيدونت أوركي، إن ديغنيسيم إكس مي أ أوغ</p>"}',
                'slug' => 'onc-health-it-blog-45',
                'is_active' => 1,
                'is_featured' => 0,
                'image' => '/images/doctor_posts/66ebdabb6f75a.png',
                'created_at' => '2024-09-19 13:03:07',
                'updated_at' => '2024-09-19 13:03:07',
                'deleted_at' => NULL,
            ),
        ));
        \DB::table('posts')->insert(array (
            0 => 
            array (
                'id' => 46,
                'doctor_id' => 79,
                'clinic_id' => NULL,
                'blog_category_id' => 2,
                'name' => '{"en":"Cerner Blog","hi":"शैक्षिक भाषण समारोह","ar":"مدونة التعليم بالمنطق السليم"}',
                'description' => '{"en":"<p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Praesent facilisis ante ut purus eleifend vehicula. Cras vel diam elit. Nullam scelerisque, nisi sed dignissim vehicula, sapien lacus fringilla urna, at rhoncus ex lorem vitae magna. Nam fermentum, purus sed consequat vulputate, lorem sapien dictum lorem, vitae euismod augue risus non mi. In hac habitasse platea dictumst. Donec a orci mauris. Pellentesque nec sem libero. Vestibulum fringilla neque ut est efficitur aliquet. Nulla facilisi. Fusce et ligula vitae lorem cursus aliquam. Aliquam a erat a mi bibendum molestie. Phasellus ut ex a justo dignissim scelerisque sit amet sed libero. Duis egestas, mi non dapibus hendrerit, libero nunc tincidunt orci, in dignissim ex mi a augue. Donec sed nulla in elit gravida venenatis et non augue. Pellentesque et libero quis lorem convallis viverra. Etiam fermentum sapien turpis, vel posuere velit varius ut.</p>","hi":"<p>लोरेम इप्सम डोलर सिट अमेट, कॉन्सेकट्यूर एडिपिसिंग एलीट. प्रेज़ेंट फसिलिसिस अंते उत पुरुस एलीफेंड व्हीकुला. क्रास वेल डायम एलीट. नुल्लम स्केलरिस्क, निसी सेड डिग्निस्सिम व्हीकुला, सैपियन लकुस फ्रिंजिल्ला उरना, एट रोंकस एक्स लोरेम विटे माग्ना. नाम फेर्मेंटुम, पुरुस सेड कंसक्वाट वुल्पुटेट, लोरेम सैपियन डिक्टम लोरेम, विटे एयूसमोड औगुए रीसस नॉन मी. इन हक हबितास्से प्लाटेआ डिक्टुमस्ट. डोनेक अ ओर्की मौरिस. पेल्लेंटेस्के नेक सेम लिबरो. वेस्टिबुलम फ्रिंजिल्ला नेकुए उत एस्ट एफिकितुर अलिक्वेट. नुल्ला फासिलिसि. फ्यूस्के एट लिगुला विटे लोरेम कर्सस अलिक्वाम. आलिक्वाम अ एराट अ मि बिबेंडम मोलस्टिये. फासेल्लस उत एक्स अ जस्टो डिग्निस्सिम स्केलरिस्क सिट अमेट सेड लिबरो. डुइस एगेस्टास, मि नॉन डापिबुस हेंड्रेरिट, लिबरो नुंक टिन्सीडुंट ऑर्की, इन डिग्निस्सिम एक्स मि अ औगुए. डोनेक सेड नुल्ला इन एलीट ग्राविडा विनेनेटिस एट नॉन औगुए.</p>","ar":"<p>لوريم إيبسوم دولور سيت أميت، كونسكتتور أديبيسينغ إليت. بريسنت فاسيليسيس أنتي أوت بوروس إليفند فيكولا. كراس فيل ديام إليت. نولام سكيلريسكي، نيسي سيد ديغنيسيم فيكولا، سابين لاكوس فرنجيلا أورنا، أت رونكوس إكس لوريم فيتاي ماجنا. نام فيرمينتوم، بوروس سيد كونسكووت فولووتات، لوريم سابين ديكتوم لوريم، فيتاي إويسمود أوغي ريسوس نون مي. إن هاك هابيتاس بلاتيا ديكتومست. دونيك أ أوركي موريس. بيلينتسكي نيك سيم ليبيرو. فيستيبيولوم فرنجيلا نيكوي أوت إيست إفيكيتور أليكويت. نولا فاسيليسي. فوسكي إت ليجولا فيتاي لوريم كورسوس أليكوام. أليكوام أ إيرات أ مي بيبندم مولستيي. فاسيليس أوت إكس أ جوستو ديغنيسيم سكيلريسكي سيت أميت سيد ليبيرو. دويس إيغيتاس، مي نون دابيبوس هندريريت، ليبيرو ننك تنسيدونت أوركي، إن ديغنيسيم إكس مي أ أوغ</p>"}',
                'slug' => 'cerner-blog-46',
                'is_active' => 1,
                'is_featured' => 0,
                'image' => '/images/doctor_posts/66ebdb057add3.png',
                'created_at' => '2024-09-19 13:04:21',
                'updated_at' => '2024-09-19 13:04:21',
                'deleted_at' => NULL,
            ),
        ));
        \DB::table('posts')->insert(array (
            0 => 
            array (
                'id' => 47,
                'doctor_id' => 79,
                'clinic_id' => NULL,
                'blog_category_id' => 3,
                'name' => '{"en":"EMR & HIPAA","hi":"शैक्षिक भाषण समारोह","ar":"مسابقة معلومات"}',
                'description' => '{"en":"<p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Praesent facilisis ante ut purus eleifend vehicula. Cras vel diam elit. Nullam scelerisque, nisi sed dignissim vehicula, sapien lacus fringilla urna, at rhoncus ex lorem vitae magna. Nam fermentum, purus sed consequat vulputate, lorem sapien dictum lorem, vitae euismod augue risus non mi. In hac habitasse platea dictumst. Donec a orci mauris. Pellentesque nec sem libero. Vestibulum fringilla neque ut est efficitur aliquet. Nulla facilisi. Fusce et ligula vitae lorem cursus aliquam. Aliquam a erat a mi bibendum molestie. Phasellus ut ex a justo dignissim scelerisque sit amet sed libero. Duis egestas, mi non dapibus hendrerit, libero nunc tincidunt orci, in dignissim ex mi a augue. Donec sed nulla in elit gravida venenatis et non augue. Pellentesque et libero quis lorem convallis viverra. Etiam fermentum sapien turpis, vel posuere velit varius ut.</p>","hi":"<p>लोरेम इप्सम डोलर सिट अमेट, कॉन्सेकट्यूर एडिपिसिंग एलीट. प्रेज़ेंट फसिलिसिस अंते उत पुरुस एलीफेंड व्हीकुला. क्रास वेल डायम एलीट. नुल्लम स्केलरिस्क, निसी सेड डिग्निस्सिम व्हीकुला, सैपियन लकुस फ्रिंजिल्ला उरना, एट रोंकस एक्स लोरेम विटे माग्ना. नाम फेर्मेंटुम, पुरुस सेड कंसक्वाट वुल्पुटेट, लोरेम सैपियन डिक्टम लोरेम, विटे एयूसमोड औगुए रीसस नॉन मी. इन हक हबितास्से प्लाटेआ डिक्टुमस्ट. डोनेक अ ओर्की मौरिस. पेल्लेंटेस्के नेक सेम लिबरो. वेस्टिबुलम फ्रिंजिल्ला नेकुए उत एस्ट एफिकितुर अलिक्वेट. नुल्ला फासिलिसि. फ्यूस्के एट लिगुला विटे लोरेम कर्सस अलिक्वाम. आलिक्वाम अ एराट अ मि बिबेंडम मोलस्टिये. फासेल्लस उत एक्स अ जस्टो डिग्निस्सिम स्केलरिस्क सिट अमेट सेड लिबरो. डुइस एगेस्टास, मि नॉन डापिबुस हेंड्रेरिट, लिबरो नुंक टिन्सीडुंट ऑर्की, इन डिग्निस्सिम एक्स मि अ औगुए. डोनेक सेड नुल्ला इन एलीट ग्राविडा विनेनेटिस एट नॉन औगुए.</p>","ar":"<p>لوريم إيبسوم دولور سيت أميت، كونسكتتور أديبيسينغ إليت. بريسنت فاسيليسيس أنتي أوت بوروس إليفند فيكولا. كراس فيل ديام إليت. نولام سكيلريسكي، نيسي سيد ديغنيسيم فيكولا، سابين لاكوس فرنجيلا أورنا، أت رونكوس إكس لوريم فيتاي ماجنا. نام فيرمينتوم، بوروس سيد كونسكووت فولووتات، لوريم سابين ديكتوم لوريم، فيتاي إويسمود أوغي ريسوس نون مي. إن هاك هابيتاس بلاتيا ديكتومست. دونيك أ أوركي موريس. بيلينتسكي نيك سيم ليبيرو. فيستيبيولوم فرنجيلا نيكوي أوت إيست إفيكيتور أليكويت. نولا فاسيليسي. فوسكي إت ليجولا فيتاي لوريم كورسوس أليكوام. أليكوام أ إيرات أ مي بيبندم مولستيي. فاسيليس أوت إكس أ جوستو ديغنيسيم سكيلريسكي سيت أميت سيد ليبيرو. دويس إيغيتاس، مي نون دابيبوس هندريريت، ليبيرو ننك تنسيدونت أوركي، إن ديغنيسيم إكس مي أ أوغ</p>"}',
                'slug' => 'emr-hipaa-47',
                'is_active' => 1,
                'is_featured' => 0,
                'image' => '/images/doctor_posts/66ebdb44602a6.png',
                'created_at' => '2024-09-19 13:05:24',
                'updated_at' => '2024-09-19 13:05:24',
                'deleted_at' => NULL,
            ),
        ));
        \DB::table('posts')->insert(array (
            0 => 
            array (
                'id' => 48,
                'doctor_id' => 79,
                'clinic_id' => NULL,
                'blog_category_id' => 4,
                'name' => '{"en":"MobiHealthNews","hi":"औद्योगिक डिज़ाइन","ar":"التصميم الصناعي"}',
                'description' => '{"en":"<p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Praesent facilisis ante ut purus eleifend vehicula. Cras vel diam elit. Nullam scelerisque, nisi sed dignissim vehicula, sapien lacus fringilla urna, at rhoncus ex lorem vitae magna. Nam fermentum, purus sed consequat vulputate, lorem sapien dictum lorem, vitae euismod augue risus non mi. In hac habitasse platea dictumst. Donec a orci mauris. Pellentesque nec sem libero. Vestibulum fringilla neque ut est efficitur aliquet. Nulla facilisi. Fusce et ligula vitae lorem cursus aliquam. Aliquam a erat a mi bibendum molestie. Phasellus ut ex a justo dignissim scelerisque sit amet sed libero. Duis egestas, mi non dapibus hendrerit, libero nunc tincidunt orci, in dignissim ex mi a augue. Donec sed nulla in elit gravida venenatis et non augue. Pellentesque et libero quis lorem convallis viverra. Etiam fermentum sapien turpis, vel posuere velit varius ut.</p>","hi":"<p>लोरेम इप्सम डोलर सिट अमेट, कॉन्सेकट्यूर एडिपिसिंग एलीट. प्रेज़ेंट फसिलिसिस अंते उत पुरुस एलीफेंड व्हीकुला. क्रास वेल डायम एलीट. नुल्लम स्केलरिस्क, निसी सेड डिग्निस्सिम व्हीकुला, सैपियन लकुस फ्रिंजिल्ला उरना, एट रोंकस एक्स लोरेम विटे माग्ना. नाम फेर्मेंटुम, पुरुस सेड कंसक्वाट वुल्पुटेट, लोरेम सैपियन डिक्टम लोरेम, विटे एयूसमोड औगुए रीसस नॉन मी. इन हक हबितास्से प्लाटेआ डिक्टुमस्ट. डोनेक अ ओर्की मौरिस. पेल्लेंटेस्के नेक सेम लिबरो. वेस्टिबुलम फ्रिंजिल्ला नेकुए उत एस्ट एफिकितुर अलिक्वेट. नुल्ला फासिलिसि. फ्यूस्के एट लिगुला विटे लोरेम कर्सस अलिक्वाम. आलिक्वाम अ एराट अ मि बिबेंडम मोलस्टिये. फासेल्लस उत एक्स अ जस्टो डिग्निस्सिम स्केलरिस्क सिट अमेट सेड लिबरो. डुइस एगेस्टास, मि नॉन डापिबुस हेंड्रेरिट, लिबरो नुंक टिन्सीडुंट ऑर्की, इन डिग्निस्सिम एक्स मि अ औगुए. डोनेक सेड नुल्ला इन एलीट ग्राविडा विनेनेटिस एट नॉन औगुए.</p>","ar":"<p>لوريم إيبسوم دولور سيت أميت، كونسكتتور أديبيسينغ إليت. بريسنت فاسيليسيس أنتي أوت بوروس إليفند فيكولا. كراس فيل ديام إليت. نولام سكيلريسكي، نيسي سيد ديغنيسيم فيكولا، سابين لاكوس فرنجيلا أورنا، أت رونكوس إكس لوريم فيتاي ماجنا. نام فيرمينتوم، بوروس سيد كونسكووت فولووتات، لوريم سابين ديكتوم لوريم، فيتاي إويسمود أوغي ريسوس نون مي. إن هاك هابيتاس بلاتيا ديكتومست. دونيك أ أوركي موريس. بيلينتسكي نيك سيم ليبيرو. فيستيبيولوم فرنجيلا نيكوي أوت إيست إفيكيتور أليكويت. نولا فاسيليسي. فوسكي إت ليجولا فيتاي لوريم كورسوس أليكوام. أليكوام أ إيرات أ مي بيبندم مولستيي. فاسيليس أوت إكس أ جوستو ديغنيسيم سكيلريسكي سيت أميت سيد ليبيرو. دويس إيغيتاس، مي نون دابيبوس هندريريت، ليبيرو ننك تنسيدونت أوركي، إن ديغنيسيم إكس مي أ أوغ</p>"}',
                'slug' => 'mobihealthnews-48',
                'is_active' => 1,
                'is_featured' => 0,
                'image' => '/images/doctor_posts/66ebdb697eb83.png',
                'created_at' => '2024-09-19 13:06:01',
                'updated_at' => '2024-09-19 13:06:01',
                'deleted_at' => NULL,
            ),
        ));
        \DB::table('posts')->insert(array (
            0 => 
            array (
                'id' => 49,
                'doctor_id' => 80,
                'clinic_id' => NULL,
                'blog_category_id' => 2,
                'name' => '{"en":"Health Data Management","hi":"सामान्य बुद्धि शिक्षा ब्लॉग","ar":"فعالية الخطاب التعليمي"}',
                'description' => '{"en":"<p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Praesent facilisis ante ut purus eleifend vehicula. Cras vel diam elit. Nullam scelerisque, nisi sed dignissim vehicula, sapien lacus fringilla urna, at rhoncus ex lorem vitae magna. Nam fermentum, purus sed consequat vulputate, lorem sapien dictum lorem, vitae euismod augue risus non mi. In hac habitasse platea dictumst. Donec a orci mauris. Pellentesque nec sem libero. Vestibulum fringilla neque ut est efficitur aliquet. Nulla facilisi. Fusce et ligula vitae lorem cursus aliquam. Aliquam a erat a mi bibendum molestie. Phasellus ut ex a justo dignissim scelerisque sit amet sed libero. Duis egestas, mi non dapibus hendrerit, libero nunc tincidunt orci, in dignissim ex mi a augue. Donec sed nulla in elit gravida venenatis et non augue. Pellentesque et libero quis lorem convallis viverra. Etiam fermentum sapien turpis, vel posuere velit varius ut.</p>","hi":"<p>लोरेम इप्सम डोलर सिट अमेट, कॉन्सेकट्यूर एडिपिसिंग एलीट. प्रेज़ेंट फसिलिसिस अंते उत पुरुस एलीफेंड व्हीकुला. क्रास वेल डायम एलीट. नुल्लम स्केलरिस्क, निसी सेड डिग्निस्सिम व्हीकुला, सैपियन लकुस फ्रिंजिल्ला उरना, एट रोंकस एक्स लोरेम विटे माग्ना. नाम फेर्मेंटुम, पुरुस सेड कंसक्वाट वुल्पुटेट, लोरेम सैपियन डिक्टम लोरेम, विटे एयूसमोड औगुए रीसस नॉन मी. इन हक हबितास्से प्लाटेआ डिक्टुमस्ट. डोनेक अ ओर्की मौरिस. पेल्लेंटेस्के नेक सेम लिबरो. वेस्टिबुलम फ्रिंजिल्ला नेकुए उत एस्ट एफिकितुर अलिक्वेट. नुल्ला फासिलिसि. फ्यूस्के एट लिगुला विटे लोरेम कर्सस अलिक्वाम. आलिक्वाम अ एराट अ मि बिबेंडम मोलस्टिये. फासेल्लस उत एक्स अ जस्टो डिग्निस्सिम स्केलरिस्क सिट अमेट सेड लिबरो. डुइस एगेस्टास, मि नॉन डापिबुस हेंड्रेरिट, लिबरो नुंक टिन्सीडुंट ऑर्की, इन डिग्निस्सिम एक्स मि अ औगुए. डोनेक सेड नुल्ला इन एलीट ग्राविडा विनेनेटिस एट नॉन औगुए.</p>","ar":"<p>لوريم إيبسوم دولور سيت أميت، كونسكتتور أديبيسينغ إليت. بريسنت فاسيليسيس أنتي أوت بوروس إليفند فيكولا. كراس فيل ديام إليت. نولام سكيلريسكي، نيسي سيد ديغنيسيم فيكولا، سابين لاكوس فرنجيلا أورنا، أت رونكوس إكس لوريم فيتاي ماجنا. نام فيرمينتوم، بوروس سيد كونسكووت فولووتات، لوريم سابين ديكتوم لوريم، فيتاي إويسمود أوغي ريسوس نون مي. إن هاك هابيتاس بلاتيا ديكتومست. دونيك أ أوركي موريس. بيلينتسكي نيك سيم ليبيرو. فيستيبيولوم فرنجيلا نيكوي أوت إيست إفيكيتور أليكويت. نولا فاسيليسي. فوسكي إت ليجولا فيتاي لوريم كورسوس أليكوام. أليكوام أ إيرات أ مي بيبندم مولستيي. فاسيليس أوت إكس أ جوستو ديغنيسيم سكيلريسكي سيت أميت سيد ليبيرو. دويس إيغيتاس، مي نون دابيبوس هندريريت، ليبيرو ننك تنسيدونت أوركي، إن ديغنيسيم إكس مي أ أوغ</p>"}',
                'slug' => 'health-data-management-49',
                'is_active' => 1,
                'is_featured' => 0,
                'image' => '/images/doctor_posts/66ebdba05248d.png',
                'created_at' => '2024-09-19 13:06:56',
                'updated_at' => '2024-09-19 13:06:56',
                'deleted_at' => NULL,
            ),
        ));
        \DB::table('posts')->insert(array (
            0 => 
            array (
                'id' => 50,
                'doctor_id' => 80,
                'clinic_id' => NULL,
                'blog_category_id' => 4,
                'name' => '{"en":"Healthcare IT Leaders","hi":"औद्योगिक डिज़ाइन","ar":"التصميم الصناعي"}',
                'description' => '{"en":"<p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Praesent facilisis ante ut purus eleifend vehicula. Cras vel diam elit. Nullam scelerisque, nisi sed dignissim vehicula, sapien lacus fringilla urna, at rhoncus ex lorem vitae magna. Nam fermentum, purus sed consequat vulputate, lorem sapien dictum lorem, vitae euismod augue risus non mi. In hac habitasse platea dictumst. Donec a orci mauris. Pellentesque nec sem libero. Vestibulum fringilla neque ut est efficitur aliquet. Nulla facilisi. Fusce et ligula vitae lorem cursus aliquam. Aliquam a erat a mi bibendum molestie. Phasellus ut ex a justo dignissim scelerisque sit amet sed libero. Duis egestas, mi non dapibus hendrerit, libero nunc tincidunt orci, in dignissim ex mi a augue. Donec sed nulla in elit gravida venenatis et non augue. Pellentesque et libero quis lorem convallis viverra. Etiam fermentum sapien turpis, vel posuere velit varius ut.</p>","hi":"<p>लोरेम इप्सम डोलर सिट अमेट, कॉन्सेकट्यूर एडिपिसिंग एलीट. प्रेज़ेंट फसिलिसिस अंते उत पुरुस एलीफेंड व्हीकुला. क्रास वेल डायम एलीट. नुल्लम स्केलरिस्क, निसी सेड डिग्निस्सिम व्हीकुला, सैपियन लकुस फ्रिंजिल्ला उरना, एट रोंकस एक्स लोरेम विटे माग्ना. नाम फेर्मेंटुम, पुरुस सेड कंसक्वाट वुल्पुटेट, लोरेम सैपियन डिक्टम लोरेम, विटे एयूसमोड औगुए रीसस नॉन मी. इन हक हबितास्से प्लाटेआ डिक्टुमस्ट. डोनेक अ ओर्की मौरिस. पेल्लेंटेस्के नेक सेम लिबरो. वेस्टिबुलम फ्रिंजिल्ला नेकुए उत एस्ट एफिकितुर अलिक्वेट. नुल्ला फासिलिसि. फ्यूस्के एट लिगुला विटे लोरेम कर्सस अलिक्वाम. आलिक्वाम अ एराट अ मि बिबेंडम मोलस्टिये. फासेल्लस उत एक्स अ जस्टो डिग्निस्सिम स्केलरिस्क सिट अमेट सेड लिबरो. डुइस एगेस्टास, मि नॉन डापिबुस हेंड्रेरिट, लिबरो नुंक टिन्सीडुंट ऑर्की, इन डिग्निस्सिम एक्स मि अ औगुए. डोनेक सेड नुल्ला इन एलीट ग्राविडा विनेनेटिस एट नॉन औगुए.</p>","ar":"<p>لوريم إيبسوم دولور سيت أميت، كونسكتتور أديبيسينغ إليت. بريسنت فاسيليسيس أنتي أوت بوروس إليفند فيكولا. كراس فيل ديام إليت. نولام سكيلريسكي، نيسي سيد ديغنيسيم فيكولا، سابين لاكوس فرنجيلا أورنا، أت رونكوس إكس لوريم فيتاي ماجنا. نام فيرمينتوم، بوروس سيد كونسكووت فولووتات، لوريم سابين ديكتوم لوريم، فيتاي إويسمود أوغي ريسوس نون مي. إن هاك هابيتاس بلاتيا ديكتومست. دونيك أ أوركي موريس. بيلينتسكي نيك سيم ليبيرو. فيستيبيولوم فرنجيلا نيكوي أوت إيست إفيكيتور أليكويت. نولا فاسيليسي. فوسكي إت ليجولا فيتاي لوريم كورسوس أليكوام. أليكوام أ إيرات أ مي بيبندم مولستيي. فاسيليس أوت إكس أ جوستو ديغنيسيم سكيلريسكي سيت أميت سيد ليبيرو. دويس إيغيتاس، مي نون دابيبوس هندريريت، ليبيرو ننك تنسيدونت أوركي، إن ديغنيسيم إكس مي أ أوغ</p>"}',
                'slug' => 'healthcare-it-leaders-50',
                'is_active' => 1,
                'is_featured' => 0,
                'image' => '/images/doctor_posts/66ebdbf1a722e.png',
                'created_at' => '2024-09-19 13:08:17',
                'updated_at' => '2024-09-19 13:08:17',
                'deleted_at' => NULL,
            ),
        ));
        \DB::table('posts')->insert(array (
            0 => 
            array (
                'id' => 51,
                'doctor_id' => 80,
                'clinic_id' => NULL,
                'blog_category_id' => 2,
                'name' => '{"en":"MedGadget","hi":"पारिस्थितिकी","ar":"علم البيئة"}',
                'description' => '{"en":"<p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Praesent facilisis ante ut purus eleifend vehicula. Cras vel diam elit. Nullam scelerisque, nisi sed dignissim vehicula, sapien lacus fringilla urna, at rhoncus ex lorem vitae magna. Nam fermentum, purus sed consequat vulputate, lorem sapien dictum lorem, vitae euismod augue risus non mi. In hac habitasse platea dictumst. Donec a orci mauris. Pellentesque nec sem libero. Vestibulum fringilla neque ut est efficitur aliquet. Nulla facilisi. Fusce et ligula vitae lorem cursus aliquam. Aliquam a erat a mi bibendum molestie. Phasellus ut ex a justo dignissim scelerisque sit amet sed libero. Duis egestas, mi non dapibus hendrerit, libero nunc tincidunt orci, in dignissim ex mi a augue. Donec sed nulla in elit gravida venenatis et non augue. Pellentesque et libero quis lorem convallis viverra. Etiam fermentum sapien turpis, vel posuere velit varius ut.</p>","hi":"<p>लोरेम इप्सम डोलर सिट अमेट, कॉन्सेकट्यूर एडिपिसिंग एलीट. प्रेज़ेंट फसिलिसिस अंते उत पुरुस एलीफेंड व्हीकुला. क्रास वेल डायम एलीट. नुल्लम स्केलरिस्क, निसी सेड डिग्निस्सिम व्हीकुला, सैपियन लकुस फ्रिंजिल्ला उरना, एट रोंकस एक्स लोरेम विटे माग्ना. नाम फेर्मेंटुम, पुरुस सेड कंसक्वाट वुल्पुटेट, लोरेम सैपियन डिक्टम लोरेम, विटे एयूसमोड औगुए रीसस नॉन मी. इन हक हबितास्से प्लाटेआ डिक्टुमस्ट. डोनेक अ ओर्की मौरिस. पेल्लेंटेस्के नेक सेम लिबरो. वेस्टिबुलम फ्रिंजिल्ला नेकुए उत एस्ट एफिकितुर अलिक्वेट. नुल्ला फासिलिसि. फ्यूस्के एट लिगुला विटे लोरेम कर्सस अलिक्वाम. आलिक्वाम अ एराट अ मि बिबेंडम मोलस्टिये. फासेल्लस उत एक्स अ जस्टो डिग्निस्सिम स्केलरिस्क सिट अमेट सेड लिबरो. डुइस एगेस्टास, मि नॉन डापिबुस हेंड्रेरिट, लिबरो नुंक टिन्सीडुंट ऑर्की, इन डिग्निस्सिम एक्स मि अ औगुए. डोनेक सेड नुल्ला इन एलीट ग्राविडा विनेनेटिस एट नॉन औगुए.</p>","ar":"<p>لوريم إيبسوم دولور سيت أميت، كونسكتتور أديبيسينغ إليت. بريسنت فاسيليسيس أنتي أوت بوروس إليفند فيكولا. كراس فيل ديام إليت. نولام سكيلريسكي، نيسي سيد ديغنيسيم فيكولا، سابين لاكوس فرنجيلا أورنا، أت رونكوس إكس لوريم فيتاي ماجنا. نام فيرمينتوم، بوروس سيد كونسكووت فولووتات، لوريم سابين ديكتوم لوريم، فيتاي إويسمود أوغي ريسوس نون مي. إن هاك هابيتاس بلاتيا ديكتومست. دونيك أ أوركي موريس. بيلينتسكي نيك سيم ليبيرو. فيستيبيولوم فرنجيلا نيكوي أوت إيست إفيكيتور أليكويت. نولا فاسيليسي. فوسكي إت ليجولا فيتاي لوريم كورسوس أليكوام. أليكوام أ إيرات أ مي بيبندم مولستيي. فاسيليس أوت إكس أ جوستو ديغنيسيم سكيلريسكي سيت أميت سيد ليبيرو. دويس إيغيتاس، مي نون دابيبوس هندريريت، ليبيرو ننك تنسيدونت أوركي، إن ديغنيسيم إكس مي أ أوغ</p>"}',
                'slug' => 'medgadget-51',
                'is_active' => 1,
                'is_featured' => 0,
                'image' => '/images/doctor_posts/66ebdc1ee9e64.png',
                'created_at' => '2024-09-19 13:09:02',
                'updated_at' => '2024-09-19 13:09:02',
                'deleted_at' => NULL,
            ),
        ));
        \DB::table('posts')->insert(array (
            0 => 
            array (
                'id' => 52,
                'doctor_id' => 81,
                'clinic_id' => NULL,
                'blog_category_id' => 2,
                'name' => '{"en":"Health Information Systems Blog","hi":"औद्योगिक डिज़ाइन","ar":"الذكاء الاصطناعي"}',
                'description' => '{"en":"<p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Praesent facilisis ante ut purus eleifend vehicula. Cras vel diam elit. Nullam scelerisque, nisi sed dignissim vehicula, sapien lacus fringilla urna, at rhoncus ex lorem vitae magna. Nam fermentum, purus sed consequat vulputate, lorem sapien dictum lorem, vitae euismod augue risus non mi. In hac habitasse platea dictumst. Donec a orci mauris. Pellentesque nec sem libero. Vestibulum fringilla neque ut est efficitur aliquet. Nulla facilisi. Fusce et ligula vitae lorem cursus aliquam. Aliquam a erat a mi bibendum molestie. Phasellus ut ex a justo dignissim scelerisque sit amet sed libero. Duis egestas, mi non dapibus hendrerit, libero nunc tincidunt orci, in dignissim ex mi a augue. Donec sed nulla in elit gravida venenatis et non augue. Pellentesque et libero quis lorem convallis viverra. Etiam fermentum sapien turpis, vel posuere velit varius ut.</p>","hi":"<p>लोरेम इप्सम डोलर सिट अमेट, कॉन्सेकट्यूर एडिपिसिंग एलीट. प्रेज़ेंट फसिलिसिस अंते उत पुरुस एलीफेंड व्हीकुला. क्रास वेल डायम एलीट. नुल्लम स्केलरिस्क, निसी सेड डिग्निस्सिम व्हीकुला, सैपियन लकुस फ्रिंजिल्ला उरना, एट रोंकस एक्स लोरेम विटे माग्ना. नाम फेर्मेंटुम, पुरुस सेड कंसक्वाट वुल्पुटेट, लोरेम सैपियन डिक्टम लोरेम, विटे एयूसमोड औगुए रीसस नॉन मी. इन हक हबितास्से प्लाटेआ डिक्टुमस्ट. डोनेक अ ओर्की मौरिस. पेल्लेंटेस्के नेक सेम लिबरो. वेस्टिबुलम फ्रिंजिल्ला नेकुए उत एस्ट एफिकितुर अलिक्वेट. नुल्ला फासिलिसि. फ्यूस्के एट लिगुला विटे लोरेम कर्सस अलिक्वाम. आलिक्वाम अ एराट अ मि बिबेंडम मोलस्टिये. फासेल्लस उत एक्स अ जस्टो डिग्निस्सिम स्केलरिस्क सिट अमेट सेड लिबरो. डुइस एगेस्टास, मि नॉन डापिबुस हेंड्रेरिट, लिबरो नुंक टिन्सीडुंट ऑर्की, इन डिग्निस्सिम एक्स मि अ औगुए. डोनेक सेड नुल्ला इन एलीट ग्राविडा विनेनेटिस एट नॉन औगुए.</p>","ar":"<p>لوريم إيبسوم دولور سيت أميت، كونسكتتور أديبيسينغ إليت. بريسنت فاسيليسيس أنتي أوت بوروس إليفند فيكولا. كراس فيل ديام إليت. نولام سكيلريسكي، نيسي سيد ديغنيسيم فيكولا، سابين لاكوس فرنجيلا أورنا، أت رونكوس إكس لوريم فيتاي ماجنا. نام فيرمينتوم، بوروس سيد كونسكووت فولووتات، لوريم سابين ديكتوم لوريم، فيتاي إويسمود أوغي ريسوس نون مي. إن هاك هابيتاس بلاتيا ديكتومست. دونيك أ أوركي موريس. بيلينتسكي نيك سيم ليبيرو. فيستيبيولوم فرنجيلا نيكوي أوت إيست إفيكيتور أليكويت. نولا فاسيليسي. فوسكي إت ليجولا فيتاي لوريم كورسوس أليكوام. أليكوام أ إيرات أ مي بيبندم مولستيي. فاسيليس أوت إكس أ جوستو ديغنيسيم سكيلريسكي سيت أميت سيد ليبيرو. دويس إيغيتاس، مي نون دابيبوس هندريريت، ليبيرو ننك تنسيدونت أوركي، إن ديغنيسيم إكس مي أ أوغ</p>"}',
                'slug' => 'health-information-systems-blog-52',
                'is_active' => 1,
                'is_featured' => 0,
                'image' => '/images/doctor_posts/66ebdc6a251fa.png',
                'created_at' => '2024-09-19 13:10:18',
                'updated_at' => '2024-09-19 13:10:18',
                'deleted_at' => NULL,
            ),
        ));
        \DB::table('posts')->insert(array (
            0 => 
            array (
                'id' => 53,
                'doctor_id' => 81,
                'clinic_id' => NULL,
                'blog_category_id' => 4,
                'name' => '{"en":"HealthSystemCIO","hi":"क्विज़ प्रतियोगिता","ar":"التصميم الصناعي"}',
                'description' => '{"en":"<p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Praesent facilisis ante ut purus eleifend vehicula. Cras vel diam elit. Nullam scelerisque, nisi sed dignissim vehicula, sapien lacus fringilla urna, at rhoncus ex lorem vitae magna. Nam fermentum, purus sed consequat vulputate, lorem sapien dictum lorem, vitae euismod augue risus non mi. In hac habitasse platea dictumst. Donec a orci mauris. Pellentesque nec sem libero. Vestibulum fringilla neque ut est efficitur aliquet. Nulla facilisi. Fusce et ligula vitae lorem cursus aliquam. Aliquam a erat a mi bibendum molestie. Phasellus ut ex a justo dignissim scelerisque sit amet sed libero. Duis egestas, mi non dapibus hendrerit, libero nunc tincidunt orci, in dignissim ex mi a augue. Donec sed nulla in elit gravida venenatis et non augue. Pellentesque et libero quis lorem convallis viverra. Etiam fermentum sapien turpis, vel posuere velit varius ut.</p>","hi":"<p>लोरेम इप्सम डोलर सिट अमेट, कॉन्सेकट्यूर एडिपिसिंग एलीट. प्रेज़ेंट फसिलिसिस अंते उत पुरुस एलीफेंड व्हीकुला. क्रास वेल डायम एलीट. नुल्लम स्केलरिस्क, निसी सेड डिग्निस्सिम व्हीकुला, सैपियन लकुस फ्रिंजिल्ला उरना, एट रोंकस एक्स लोरेम विटे माग्ना. नाम फेर्मेंटुम, पुरुस सेड कंसक्वाट वुल्पुटेट, लोरेम सैपियन डिक्टम लोरेम, विटे एयूसमोड औगुए रीसस नॉन मी. इन हक हबितास्से प्लाटेआ डिक्टुमस्ट. डोनेक अ ओर्की मौरिस. पेल्लेंटेस्के नेक सेम लिबरो. वेस्टिबुलम फ्रिंजिल्ला नेकुए उत एस्ट एफिकितुर अलिक्वेट. नुल्ला फासिलिसि. फ्यूस्के एट लिगुला विटे लोरेम कर्सस अलिक्वाम. आलिक्वाम अ एराट अ मि बिबेंडम मोलस्टिये. फासेल्लस उत एक्स अ जस्टो डिग्निस्सिम स्केलरिस्क सिट अमेट सेड लिबरो. डुइस एगेस्टास, मि नॉन डापिबुस हेंड्रेरिट, लिबरो नुंक टिन्सीडुंट ऑर्की, इन डिग्निस्सिम एक्स मि अ औगुए. डोनेक सेड नुल्ला इन एलीट ग्राविडा विनेनेटिस एट नॉन औगुए.</p>","ar":"<p>لوريم إيبسوم دولور سيت أميت، كونسكتتور أديبيسينغ إليت. بريسنت فاسيليسيس أنتي أوت بوروس إليفند فيكولا. كراس فيل ديام إليت. نولام سكيلريسكي، نيسي سيد ديغنيسيم فيكولا، سابين لاكوس فرنجيلا أورنا، أت رونكوس إكس لوريم فيتاي ماجنا. نام فيرمينتوم، بوروس سيد كونسكووت فولووتات، لوريم سابين ديكتوم لوريم، فيتاي إويسمود أوغي ريسوس نون مي. إن هاك هابيتاس بلاتيا ديكتومست. دونيك أ أوركي موريس. بيلينتسكي نيك سيم ليبيرو. فيستيبيولوم فرنجيلا نيكوي أوت إيست إفيكيتور أليكويت. نولا فاسيليسي. فوسكي إت ليجولا فيتاي لوريم كورسوس أليكوام. أليكوام أ إيرات أ مي بيبندم مولستيي. فاسيليس أوت إكس أ جوستو ديغنيسيم سكيلريسكي سيت أميت سيد ليبيرو. دويس إيغيتاس، مي نون دابيبوس هندريريت، ليبيرو ننك تنسيدونت أوركي، إن ديغنيسيم إكس مي أ أوغ</p>"}',
                'slug' => 'healthsystemcio-53',
                'is_active' => 1,
                'is_featured' => 0,
                'image' => '/images/doctor_posts/66ebdc95ef311.png',
                'created_at' => '2024-09-19 13:11:01',
                'updated_at' => '2024-09-19 13:11:01',
                'deleted_at' => NULL,
            ),
        ));
        \DB::table('posts')->insert(array (
            0 => 
            array (
                'id' => 54,
                'doctor_id' => 81,
                'clinic_id' => NULL,
                'blog_category_id' => 1,
                'name' => '{"en":"The Healthcare Blog","hi":"क्विज़ प्रतियोगिता","ar":"مسابقة معلومات"}',
                'description' => '{"en":"<p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Praesent facilisis ante ut purus eleifend vehicula. Cras vel diam elit. Nullam scelerisque, nisi sed dignissim vehicula, sapien lacus fringilla urna, at rhoncus ex lorem vitae magna. Nam fermentum, purus sed consequat vulputate, lorem sapien dictum lorem, vitae euismod augue risus non mi. In hac habitasse platea dictumst. Donec a orci mauris. Pellentesque nec sem libero. Vestibulum fringilla neque ut est efficitur aliquet. Nulla facilisi. Fusce et ligula vitae lorem cursus aliquam. Aliquam a erat a mi bibendum molestie. Phasellus ut ex a justo dignissim scelerisque sit amet sed libero. Duis egestas, mi non dapibus hendrerit, libero nunc tincidunt orci, in dignissim ex mi a augue. Donec sed nulla in elit gravida venenatis et non augue. Pellentesque et libero quis lorem convallis viverra. Etiam fermentum sapien turpis, vel posuere velit varius ut.</p>","hi":"<p>लोरेम इप्सम डोलर सिट अमेट, कॉन्सेकट्यूर एडिपिसिंग एलीट. प्रेज़ेंट फसिलिसिस अंते उत पुरुस एलीफेंड व्हीकुला. क्रास वेल डायम एलीट. नुल्लम स्केलरिस्क, निसी सेड डिग्निस्सिम व्हीकुला, सैपियन लकुस फ्रिंजिल्ला उरना, एट रोंकस एक्स लोरेम विटे माग्ना. नाम फेर्मेंटुम, पुरुस सेड कंसक्वाट वुल्पुटेट, लोरेम सैपियन डिक्टम लोरेम, विटे एयूसमोड औगुए रीसस नॉन मी. इन हक हबितास्से प्लाटेआ डिक्टुमस्ट. डोनेक अ ओर्की मौरिस. पेल्लेंटेस्के नेक सेम लिबरो. वेस्टिबुलम फ्रिंजिल्ला नेकुए उत एस्ट एफिकितुर अलिक्वेट. नुल्ला फासिलिसि. फ्यूस्के एट लिगुला विटे लोरेम कर्सस अलिक्वाम. आलिक्वाम अ एराट अ मि बिबेंडम मोलस्टिये. फासेल्लस उत एक्स अ जस्टो डिग्निस्सिम स्केलरिस्क सिट अमेट सेड लिबरो. डुइस एगेस्टास, मि नॉन डापिबुस हेंड्रेरिट, लिबरो नुंक टिन्सीडुंट ऑर्की, इन डिग्निस्सिम एक्स मि अ औगुए. डोनेक सेड नुल्ला इन एलीट ग्राविडा विनेनेटिस एट नॉन औगुए.</p>","ar":"<p>لوريم إيبسوم دولور سيت أميت، كونسكتتور أديبيسينغ إليت. بريسنت فاسيليسيس أنتي أوت بوروس إليفند فيكولا. كراس فيل ديام إليت. نولام سكيلريسكي، نيسي سيد ديغنيسيم فيكولا، سابين لاكوس فرنجيلا أورنا، أت رونكوس إكس لوريم فيتاي ماجنا. نام فيرمينتوم، بوروس سيد كونسكووت فولووتات، لوريم سابين ديكتوم لوريم، فيتاي إويسمود أوغي ريسوس نون مي. إن هاك هابيتاس بلاتيا ديكتومست. دونيك أ أوركي موريس. بيلينتسكي نيك سيم ليبيرو. فيستيبيولوم فرنجيلا نيكوي أوت إيست إفيكيتور أليكويت. نولا فاسيليسي. فوسكي إت ليجولا فيتاي لوريم كورسوس أليكوام. أليكوام أ إيرات أ مي بيبندم مولستيي. فاسيليس أوت إكس أ جوستو ديغنيسيم سكيلريسكي سيت أميت سيد ليبيرو. دويس إيغيتاس، مي نون دابيبوس هندريريت، ليبيرو ننك تنسيدونت أوركي، إن ديغنيسيم إكس مي أ أوغ</p>"}',
                'slug' => 'the-healthcare-blog-54',
                'is_active' => 1,
                'is_featured' => 0,
                'image' => '/images/doctor_posts/66ebdcb80dc75.png',
                'created_at' => '2024-09-19 13:11:36',
                'updated_at' => '2024-09-19 13:11:36',
                'deleted_at' => NULL,
            ),
        ));
        \DB::table('posts')->insert(array (
            0 => 
            array (
                'id' => 55,
                'doctor_id' => 82,
                'clinic_id' => NULL,
                'blog_category_id' => 2,
                'name' => '{"en":"EHR Intelligence","hi":"पारिस्थितिकी","ar":"مدونة التعليم بالمنطق السليم"}',
                'description' => '{"en":"<p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Praesent facilisis ante ut purus eleifend vehicula. Cras vel diam elit. Nullam scelerisque, nisi sed dignissim vehicula, sapien lacus fringilla urna, at rhoncus ex lorem vitae magna. Nam fermentum, purus sed consequat vulputate, lorem sapien dictum lorem, vitae euismod augue risus non mi. In hac habitasse platea dictumst. Donec a orci mauris. Pellentesque nec sem libero. Vestibulum fringilla neque ut est efficitur aliquet. Nulla facilisi. Fusce et ligula vitae lorem cursus aliquam. Aliquam a erat a mi bibendum molestie. Phasellus ut ex a justo dignissim scelerisque sit amet sed libero. Duis egestas, mi non dapibus hendrerit, libero nunc tincidunt orci, in dignissim ex mi a augue. Donec sed nulla in elit gravida venenatis et non augue. Pellentesque et libero quis lorem convallis viverra. Etiam fermentum sapien turpis, vel posuere velit varius ut.</p>","hi":"<p>लोरेम इप्सम डोलर सिट अमेट, कॉन्सेकट्यूर एडिपिसिंग एलीट. प्रेज़ेंट फसिलिसिस अंते उत पुरुस एलीफेंड व्हीकुला. क्रास वेल डायम एलीट. नुल्लम स्केलरिस्क, निसी सेड डिग्निस्सिम व्हीकुला, सैपियन लकुस फ्रिंजिल्ला उरना, एट रोंकस एक्स लोरेम विटे माग्ना. नाम फेर्मेंटुम, पुरुस सेड कंसक्वाट वुल्पुटेट, लोरेम सैपियन डिक्टम लोरेम, विटे एयूसमोड औगुए रीसस नॉन मी. इन हक हबितास्से प्लाटेआ डिक्टुमस्ट. डोनेक अ ओर्की मौरिस. पेल्लेंटेस्के नेक सेम लिबरो. वेस्टिबुलम फ्रिंजिल्ला नेकुए उत एस्ट एफिकितुर अलिक्वेट. नुल्ला फासिलिसि. फ्यूस्के एट लिगुला विटे लोरेम कर्सस अलिक्वाम. आलिक्वाम अ एराट अ मि बिबेंडम मोलस्टिये. फासेल्लस उत एक्स अ जस्टो डिग्निस्सिम स्केलरिस्क सिट अमेट सेड लिबरो. डुइस एगेस्टास, मि नॉन डापिबुस हेंड्रेरिट, लिबरो नुंक टिन्सीडुंट ऑर्की, इन डिग्निस्सिम एक्स मि अ औगुए. डोनेक सेड नुल्ला इन एलीट ग्राविडा विनेनेटिस एट नॉन औगुए.</p>","ar":"<p>لوريم إيبسوم دولور سيت أميت، كونسكتتور أديبيسينغ إليت. بريسنت فاسيليسيس أنتي أوت بوروس إليفند فيكولا. كراس فيل ديام إليت. نولام سكيلريسكي، نيسي سيد ديغنيسيم فيكولا، سابين لاكوس فرنجيلا أورنا، أت رونكوس إكس لوريم فيتاي ماجنا. نام فيرمينتوم، بوروس سيد كونسكووت فولووتات، لوريم سابين ديكتوم لوريم، فيتاي إويسمود أوغي ريسوس نون مي. إن هاك هابيتاس بلاتيا ديكتومست. دونيك أ أوركي موريس. بيلينتسكي نيك سيم ليبيرو. فيستيبيولوم فرنجيلا نيكوي أوت إيست إفيكيتور أليكويت. نولا فاسيليسي. فوسكي إت ليجولا فيتاي لوريم كورسوس أليكوام. أليكوام أ إيرات أ مي بيبندم مولستيي. فاسيليس أوت إكس أ جوستو ديغنيسيم سكيلريسكي سيت أميت سيد ليبيرو. دويس إيغيتاس، مي نون دابيبوس هندريريت، ليبيرو ننك تنسيدونت أوركي، إن ديغنيسيم إكس مي أ أوغ</p>"}',
                'slug' => 'ehr-intelligence-55',
                'is_active' => 1,
                'is_featured' => 0,
                'image' => '/images/doctor_posts/66ebdcf5cce64.png',
                'created_at' => '2024-09-19 13:12:37',
                'updated_at' => '2024-09-19 13:12:37',
                'deleted_at' => NULL,
            ),
        ));
        \DB::table('posts')->insert(array (
            0 => 
            array (
                'id' => 56,
                'doctor_id' => 82,
                'clinic_id' => NULL,
                'blog_category_id' => 2,
                'name' => '{"en":"Epic Systems Blog","hi":"क्विज़ प्रतियोगिता","ar":"مسابقة معلومات"}',
                'description' => '{"en":"<p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Praesent facilisis ante ut purus eleifend vehicula. Cras vel diam elit. Nullam scelerisque, nisi sed dignissim vehicula, sapien lacus fringilla urna, at rhoncus ex lorem vitae magna. Nam fermentum, purus sed consequat vulputate, lorem sapien dictum lorem, vitae euismod augue risus non mi. In hac habitasse platea dictumst. Donec a orci mauris. Pellentesque nec sem libero. Vestibulum fringilla neque ut est efficitur aliquet. Nulla facilisi. Fusce et ligula vitae lorem cursus aliquam. Aliquam a erat a mi bibendum molestie. Phasellus ut ex a justo dignissim scelerisque sit amet sed libero. Duis egestas, mi non dapibus hendrerit, libero nunc tincidunt orci, in dignissim ex mi a augue. Donec sed nulla in elit gravida venenatis et non augue. Pellentesque et libero quis lorem convallis viverra. Etiam fermentum sapien turpis, vel posuere velit varius ut.</p>","hi":"<p>लोरेम इप्सम डोलर सिट अमेट, कॉन्सेकट्यूर एडिपिसिंग एलीट. प्रेज़ेंट फसिलिसिस अंते उत पुरुस एलीफेंड व्हीकुला. क्रास वेल डायम एलीट. नुल्लम स्केलरिस्क, निसी सेड डिग्निस्सिम व्हीकुला, सैपियन लकुस फ्रिंजिल्ला उरना, एट रोंकस एक्स लोरेम विटे माग्ना. नाम फेर्मेंटुम, पुरुस सेड कंसक्वाट वुल्पुटेट, लोरेम सैपियन डिक्टम लोरेम, विटे एयूसमोड औगुए रीसस नॉन मी. इन हक हबितास्से प्लाटेआ डिक्टुमस्ट. डोनेक अ ओर्की मौरिस. पेल्लेंटेस्के नेक सेम लिबरो. वेस्टिबुलम फ्रिंजिल्ला नेकुए उत एस्ट एफिकितुर अलिक्वेट. नुल्ला फासिलिसि. फ्यूस्के एट लिगुला विटे लोरेम कर्सस अलिक्वाम. आलिक्वाम अ एराट अ मि बिबेंडम मोलस्टिये. फासेल्लस उत एक्स अ जस्टो डिग्निस्सिम स्केलरिस्क सिट अमेट सेड लिबरो. डुइस एगेस्टास, मि नॉन डापिबुस हेंड्रेरिट, लिबरो नुंक टिन्सीडुंट ऑर्की, इन डिग्निस्सिम एक्स मि अ औगुए. डोनेक सेड नुल्ला इन एलीट ग्राविडा विनेनेटिस एट नॉन औगुए.</p>","ar":"<p>لوريم إيبسوم دولور سيت أميت، كونسكتتور أديبيسينغ إليت. بريسنت فاسيليسيس أنتي أوت بوروس إليفند فيكولا. كراس فيل ديام إليت. نولام سكيلريسكي، نيسي سيد ديغنيسيم فيكولا، سابين لاكوس فرنجيلا أورنا، أت رونكوس إكس لوريم فيتاي ماجنا. نام فيرمينتوم، بوروس سيد كونسكووت فولووتات، لوريم سابين ديكتوم لوريم، فيتاي إويسمود أوغي ريسوس نون مي. إن هاك هابيتاس بلاتيا ديكتومست. دونيك أ أوركي موريس. بيلينتسكي نيك سيم ليبيرو. فيستيبيولوم فرنجيلا نيكوي أوت إيست إفيكيتور أليكويت. نولا فاسيليسي. فوسكي إت ليجولا فيتاي لوريم كورسوس أليكوام. أليكوام أ إيرات أ مي بيبندم مولستيي. فاسيليس أوت إكس أ جوستو ديغنيسيم سكيلريسكي سيت أميت سيد ليبيرو. دويس إيغيتاس، مي نون دابيبوس هندريريت، ليبيرو ننك تنسيدونت أوركي، إن ديغنيسيم إكس مي أ أوغ</p>"}',
                'slug' => 'epic-systems-blog-56',
                'is_active' => 1,
                'is_featured' => 0,
                'image' => '/images/doctor_posts/66ebdd6b7b53f.png',
                'created_at' => '2024-09-19 13:14:35',
                'updated_at' => '2024-09-19 13:14:35',
                'deleted_at' => NULL,
            ),
        ));
        \DB::table('posts')->insert(array (
            0 => 
            array (
                'id' => 57,
                'doctor_id' => 82,
                'clinic_id' => NULL,
                'blog_category_id' => 1,
                'name' => '{"en":"HealthCatalyst Blog","hi":"क्विज़ प्रतियोगिता","ar":"مسابقة معلومات"}',
                'description' => '{"en":"<p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Praesent facilisis ante ut purus eleifend vehicula. Cras vel diam elit. Nullam scelerisque, nisi sed dignissim vehicula, sapien lacus fringilla urna, at rhoncus ex lorem vitae magna. Nam fermentum, purus sed consequat vulputate, lorem sapien dictum lorem, vitae euismod augue risus non mi. In hac habitasse platea dictumst. Donec a orci mauris. Pellentesque nec sem libero. Vestibulum fringilla neque ut est efficitur aliquet. Nulla facilisi. Fusce et ligula vitae lorem cursus aliquam. Aliquam a erat a mi bibendum molestie. Phasellus ut ex a justo dignissim scelerisque sit amet sed libero. Duis egestas, mi non dapibus hendrerit, libero nunc tincidunt orci, in dignissim ex mi a augue. Donec sed nulla in elit gravida venenatis et non augue. Pellentesque et libero quis lorem convallis viverra. Etiam fermentum sapien turpis, vel posuere velit varius ut.</p>","hi":"<p>लोरेम इप्सम डोलर सिट अमेट, कॉन्सेकट्यूर एडिपिसिंग एलीट. प्रेज़ेंट फसिलिसिस अंते उत पुरुस एलीफेंड व्हीकुला. क्रास वेल डायम एलीट. नुल्लम स्केलरिस्क, निसी सेड डिग्निस्सिम व्हीकुला, सैपियन लकुस फ्रिंजिल्ला उरना, एट रोंकस एक्स लोरेम विटे माग्ना. नाम फेर्मेंटुम, पुरुस सेड कंसक्वाट वुल्पुटेट, लोरेम सैपियन डिक्टम लोरेम, विटे एयूसमोड औगुए रीसस नॉन मी. इन हक हबितास्से प्लाटेआ डिक्टुमस्ट. डोनेक अ ओर्की मौरिस. पेल्लेंटेस्के नेक सेम लिबरो. वेस्टिबुलम फ्रिंजिल्ला नेकुए उत एस्ट एफिकितुर अलिक्वेट. नुल्ला फासिलिसि. फ्यूस्के एट लिगुला विटे लोरेम कर्सस अलिक्वाम. आलिक्वाम अ एराट अ मि बिबेंडम मोलस्टिये. फासेल्लस उत एक्स अ जस्टो डिग्निस्सिम स्केलरिस्क सिट अमेट सेड लिबरो. डुइस एगेस्टास, मि नॉन डापिबुस हेंड्रेरिट, लिबरो नुंक टिन्सीडुंट ऑर्की, इन डिग्निस्सिम एक्स मि अ औगुए. डोनेक सेड नुल्ला इन एलीट ग्राविडा विनेनेटिस एट नॉन औगुए.</p>","ar":"<p>لوريم إيبسوم دولور سيت أميت، كونسكتتور أديبيسينغ إليت. بريسنت فاسيليسيس أنتي أوت بوروس إليفند فيكولا. كراس فيل ديام إليت. نولام سكيلريسكي، نيسي سيد ديغنيسيم فيكولا، سابين لاكوس فرنجيلا أورنا، أت رونكوس إكس لوريم فيتاي ماجنا. نام فيرمينتوم، بوروس سيد كونسكووت فولووتات، لوريم سابين ديكتوم لوريم، فيتاي إويسمود أوغي ريسوس نون مي. إن هاك هابيتاس بلاتيا ديكتومست. دونيك أ أوركي موريس. بيلينتسكي نيك سيم ليبيرو. فيستيبيولوم فرنجيلا نيكوي أوت إيست إفيكيتور أليكويت. نولا فاسيليسي. فوسكي إت ليجولا فيتاي لوريم كورسوس أليكوام. أليكوام أ إيرات أ مي بيبندم مولستيي. فاسيليس أوت إكس أ جوستو ديغنيسيم سكيلريسكي سيت أميت سيد ليبيرو. دويس إيغيتاس، مي نون دابيبوس هندريريت، ليبيرو ننك تنسيدونت أوركي، إن ديغنيسيم إكس مي أ أوغ</p>"}',
                'slug' => 'healthcatalyst-blog-57',
                'is_active' => 1,
                'is_featured' => 0,
                'image' => '/images/doctor_posts/66ebdd9a22a4d.png',
                'created_at' => '2024-09-19 13:15:22',
                'updated_at' => '2024-09-19 13:15:22',
                'deleted_at' => NULL,
            ),
        ));
        \DB::table('posts')->insert(array (
            0 => 
            array (
                'id' => 58,
                'doctor_id' => NULL,
                'clinic_id' => 21,
                'blog_category_id' => 2,
                'name' => '{"en":"Health Data Management","hi":"क्विज़ प्रतियोगिता","ar":"مسابقة معلومات"}',
                'description' => '{"en":"<p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Praesent facilisis ante ut purus eleifend vehicula. Cras vel diam elit. Nullam scelerisque, nisi sed dignissim vehicula, sapien lacus fringilla urna, at rhoncus ex lorem vitae magna. Nam fermentum, purus sed consequat vulputate, lorem sapien dictum lorem, vitae euismod augue risus non mi. In hac habitasse platea dictumst. Donec a orci mauris. Pellentesque nec sem libero. Vestibulum fringilla neque ut est efficitur aliquet. Nulla facilisi. Fusce et ligula vitae lorem cursus aliquam. Aliquam a erat a mi bibendum molestie. Phasellus ut ex a justo dignissim scelerisque sit amet sed libero. Duis egestas, mi non dapibus hendrerit, libero nunc tincidunt orci, in dignissim ex mi a augue. Donec sed nulla in elit gravida venenatis et non augue. Pellentesque et libero quis lorem convallis viverra. Etiam fermentum sapien turpis, vel posuere velit varius ut.</p>","hi":"<p>लोरेम इप्सम डोलर सिट अमेट, कॉन्सेकट्यूर एडिपिसिंग एलीट. प्रेज़ेंट फसिलिसिस अंते उत पुरुस एलीफेंड व्हीकुला. क्रास वेल डायम एलीट. नुल्लम स्केलरिस्क, निसी सेड डिग्निस्सिम व्हीकुला, सैपियन लकुस फ्रिंजिल्ला उरना, एट रोंकस एक्स लोरेम विटे माग्ना. नाम फेर्मेंटुम, पुरुस सेड कंसक्वाट वुल्पुटेट, लोरेम सैपियन डिक्टम लोरेम, विटे एयूसमोड औगुए रीसस नॉन मी. इन हक हबितास्से प्लाटेआ डिक्टुमस्ट. डोनेक अ ओर्की मौरिस. पेल्लेंटेस्के नेक सेम लिबरो. वेस्टिबुलम फ्रिंजिल्ला नेकुए उत एस्ट एफिकितुर अलिक्वेट. नुल्ला फासिलिसि. फ्यूस्के एट लिगुला विटे लोरेम कर्सस अलिक्वाम. आलिक्वाम अ एराट अ मि बिबेंडम मोलस्टिये. फासेल्लस उत एक्स अ जस्टो डिग्निस्सिम स्केलरिस्क सिट अमेट सेड लिबरो. डुइस एगेस्टास, मि नॉन डापिबुस हेंड्रेरिट, लिबरो नुंक टिन्सीडुंट ऑर्की, इन डिग्निस्सिम एक्स मि अ औगुए. डोनेक सेड नुल्ला इन एलीट ग्राविडा विनेनेटिस एट नॉन औगुए.</p>","ar":"<p>لوريم إيبسوم دولور سيت أميت، كونسكتتور أديبيسينغ إليت. بريسنت فاسيليسيس أنتي أوت بوروس إليفند فيكولا. كراس فيل ديام إليت. نولام سكيلريسكي، نيسي سيد ديغنيسيم فيكولا، سابين لاكوس فرنجيلا أورنا، أت رونكوس إكس لوريم فيتاي ماجنا. نام فيرمينتوم، بوروس سيد كونسكووت فولووتات، لوريم سابين ديكتوم لوريم، فيتاي إويسمود أوغي ريسوس نون مي. إن هاك هابيتاس بلاتيا ديكتومست. دونيك أ أوركي موريس. بيلينتسكي نيك سيم ليبيرو. فيستيبيولوم فرنجيلا نيكوي أوت إيست إفيكيتور أليكويت. نولا فاسيليسي. فوسكي إت ليجولا فيتاي لوريم كورسوس أليكوام. أليكوام أ إيرات أ مي بيبندم مولستيي. فاسيليس أوت إكس أ جوستو ديغنيسيم سكيلريسكي سيت أميت سيد ليبيرو. دويس إيغيتاس، مي نون دابيبوس هندريريت، ليبيرو ننك تنسيدونت أوركي، إن ديغنيسيم إكس مي أ أوغ</p>"}',
                'slug' => 'health-data-management-58',
                'is_active' => 1,
                'is_featured' => 0,
                'image' => '/images/clinic_posts/66ec02d72fdde.png',
                'created_at' => '2024-09-19 15:54:15',
                'updated_at' => '2024-09-19 15:54:15',
                'deleted_at' => NULL,
            ),
        ));
        \DB::table('posts')->insert(array (
            0 => 
            array (
                'id' => 59,
                'doctor_id' => NULL,
                'clinic_id' => 21,
                'blog_category_id' => 3,
                'name' => '{"en":"Healthcare IT Leaders","hi":"कृत्रिम बुद्धिमत्ता","ar":"مسابقة معلومات"}',
                'description' => '{"en":"<p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Praesent facilisis ante ut purus eleifend vehicula. Cras vel diam elit. Nullam scelerisque, nisi sed dignissim vehicula, sapien lacus fringilla urna, at rhoncus ex lorem vitae magna. Nam fermentum, purus sed consequat vulputate, lorem sapien dictum lorem, vitae euismod augue risus non mi. In hac habitasse platea dictumst. Donec a orci mauris. Pellentesque nec sem libero. Vestibulum fringilla neque ut est efficitur aliquet. Nulla facilisi. Fusce et ligula vitae lorem cursus aliquam. Aliquam a erat a mi bibendum molestie. Phasellus ut ex a justo dignissim scelerisque sit amet sed libero. Duis egestas, mi non dapibus hendrerit, libero nunc tincidunt orci, in dignissim ex mi a augue. Donec sed nulla in elit gravida venenatis et non augue. Pellentesque et libero quis lorem convallis viverra. Etiam fermentum sapien turpis, vel posuere velit varius ut.</p>","hi":"<p>लोरेम इप्सम डोलर सिट अमेट, कॉन्सेकट्यूर एडिपिसिंग एलीट. प्रेज़ेंट फसिलिसिस अंते उत पुरुस एलीफेंड व्हीकुला. क्रास वेल डायम एलीट. नुल्लम स्केलरिस्क, निसी सेड डिग्निस्सिम व्हीकुला, सैपियन लकुस फ्रिंजिल्ला उरना, एट रोंकस एक्स लोरेम विटे माग्ना. नाम फेर्मेंटुम, पुरुस सेड कंसक्वाट वुल्पुटेट, लोरेम सैपियन डिक्टम लोरेम, विटे एयूसमोड औगुए रीसस नॉन मी. इन हक हबितास्से प्लाटेआ डिक्टुमस्ट. डोनेक अ ओर्की मौरिस. पेल्लेंटेस्के नेक सेम लिबरो. वेस्टिबुलम फ्रिंजिल्ला नेकुए उत एस्ट एफिकितुर अलिक्वेट. नुल्ला फासिलिसि. फ्यूस्के एट लिगुला विटे लोरेम कर्सस अलिक्वाम. आलिक्वाम अ एराट अ मि बिबेंडम मोलस्टिये. फासेल्लस उत एक्स अ जस्टो डिग्निस्सिम स्केलरिस्क सिट अमेट सेड लिबरो. डुइस एगेस्टास, मि नॉन डापिबुस हेंड्रेरिट, लिबरो नुंक टिन्सीडुंट ऑर्की, इन डिग्निस्सिम एक्स मि अ औगुए. डोनेक सेड नुल्ला इन एलीट ग्राविडा विनेनेटिस एट नॉन औगुए.</p>","ar":"<p>لوريم إيبسوم دولور سيت أميت، كونسكتتور أديبيسينغ إليت. بريسنت فاسيليسيس أنتي أوت بوروس إليفند فيكولا. كراس فيل ديام إليت. نولام سكيلريسكي، نيسي سيد ديغنيسيم فيكولا، سابين لاكوس فرنجيلا أورنا، أت رونكوس إكس لوريم فيتاي ماجنا. نام فيرمينتوم، بوروس سيد كونسكووت فولووتات، لوريم سابين ديكتوم لوريم، فيتاي إويسمود أوغي ريسوس نون مي. إن هاك هابيتاس بلاتيا ديكتومست. دونيك أ أوركي موريس. بيلينتسكي نيك سيم ليبيرو. فيستيبيولوم فرنجيلا نيكوي أوت إيست إفيكيتور أليكويت. نولا فاسيليسي. فوسكي إت ليجولا فيتاي لوريم كورسوس أليكوام. أليكوام أ إيرات أ مي بيبندم مولستيي. فاسيليس أوت إكس أ جوستو ديغنيسيم سكيلريسكي سيت أميت سيد ليبيرو. دويس إيغيتاس، مي نون دابيبوس هندريريت، ليبيرو ننك تنسيدونت أوركي، إن ديغنيسيم إكس مي أ أوغ</p>"}',
                'slug' => 'healthcare-it-leaders-59',
                'is_active' => 1,
                'is_featured' => 0,
                'image' => '/images/clinic_posts/66ec0303bafb4.png',
                'created_at' => '2024-09-19 15:54:59',
                'updated_at' => '2024-09-19 15:54:59',
                'deleted_at' => NULL,
            ),
        ));
        \DB::table('posts')->insert(array (
            0 => 
            array (
                'id' => 60,
                'doctor_id' => NULL,
                'clinic_id' => 21,
                'blog_category_id' => 3,
                'name' => '{"en":"MedGadget","hi":"पारिस्थितिकी","ar":"علم البيئة"}',
                'description' => '{"en":"<p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Praesent facilisis ante ut purus eleifend vehicula. Cras vel diam elit. Nullam scelerisque, nisi sed dignissim vehicula, sapien lacus fringilla urna, at rhoncus ex lorem vitae magna. Nam fermentum, purus sed consequat vulputate, lorem sapien dictum lorem, vitae euismod augue risus non mi. In hac habitasse platea dictumst. Donec a orci mauris. Pellentesque nec sem libero. Vestibulum fringilla neque ut est efficitur aliquet. Nulla facilisi. Fusce et ligula vitae lorem cursus aliquam. Aliquam a erat a mi bibendum molestie. Phasellus ut ex a justo dignissim scelerisque sit amet sed libero. Duis egestas, mi non dapibus hendrerit, libero nunc tincidunt orci, in dignissim ex mi a augue. Donec sed nulla in elit gravida venenatis et non augue. Pellentesque et libero quis lorem convallis viverra. Etiam fermentum sapien turpis, vel posuere velit varius ut.</p>","hi":"<p>लोरेम इप्सम डोलर सिट अमेट, कॉन्सेकट्यूर एडिपिसिंग एलीट. प्रेज़ेंट फसिलिसिस अंते उत पुरुस एलीफेंड व्हीकुला. क्रास वेल डायम एलीट. नुल्लम स्केलरिस्क, निसी सेड डिग्निस्सिम व्हीकुला, सैपियन लकुस फ्रिंजिल्ला उरना, एट रोंकस एक्स लोरेम विटे माग्ना. नाम फेर्मेंटुम, पुरुस सेड कंसक्वाट वुल्पुटेट, लोरेम सैपियन डिक्टम लोरेम, विटे एयूसमोड औगुए रीसस नॉन मी. इन हक हबितास्से प्लाटेआ डिक्टुमस्ट. डोनेक अ ओर्की मौरिस. पेल्लेंटेस्के नेक सेम लिबरो. वेस्टिबुलम फ्रिंजिल्ला नेकुए उत एस्ट एफिकितुर अलिक्वेट. नुल्ला फासिलिसि. फ्यूस्के एट लिगुला विटे लोरेम कर्सस अलिक्वाम. आलिक्वाम अ एराट अ मि बिबेंडम मोलस्टिये. फासेल्लस उत एक्स अ जस्टो डिग्निस्सिम स्केलरिस्क सिट अमेट सेड लिबरो. डुइस एगेस्टास, मि नॉन डापिबुस हेंड्रेरिट, लिबरो नुंक टिन्सीडुंट ऑर्की, इन डिग्निस्सिम एक्स मि अ औगुए. डोनेक सेड नुल्ला इन एलीट ग्राविडा विनेनेटिस एट नॉन औगुए.</p>","ar":"<p>لوريم إيبسوم دولور سيت أميت، كونسكتتور أديبيسينغ إليت. بريسنت فاسيليسيس أنتي أوت بوروس إليفند فيكولا. كراس فيل ديام إليت. نولام سكيلريسكي، نيسي سيد ديغنيسيم فيكولا، سابين لاكوس فرنجيلا أورنا، أت رونكوس إكس لوريم فيتاي ماجنا. نام فيرمينتوم، بوروس سيد كونسكووت فولووتات، لوريم سابين ديكتوم لوريم، فيتاي إويسمود أوغي ريسوس نون مي. إن هاك هابيتاس بلاتيا ديكتومست. دونيك أ أوركي موريس. بيلينتسكي نيك سيم ليبيرو. فيستيبيولوم فرنجيلا نيكوي أوت إيست إفيكيتور أليكويت. نولا فاسيليسي. فوسكي إت ليجولا فيتاي لوريم كورسوس أليكوام. أليكوام أ إيرات أ مي بيبندم مولستيي. فاسيليس أوت إكس أ جوستو ديغنيسيم سكيلريسكي سيت أميت سيد ليبيرو. دويس إيغيتاس، مي نون دابيبوس هندريريت، ليبيرو ننك تنسيدونت أوركي، إن ديغنيسيم إكس مي أ أوغ</p>"}',
                'slug' => 'medgadget-60',
                'is_active' => 1,
                'is_featured' => 0,
                'image' => '/images/clinic_posts/66ec033334fbd.png',
                'created_at' => '2024-09-19 15:55:47',
                'updated_at' => '2024-09-19 15:55:47',
                'deleted_at' => NULL,
            ),
        ));
        \DB::table('posts')->insert(array (
            0 => 
            array (
                'id' => 61,
                'doctor_id' => NULL,
                'clinic_id' => 22,
                'blog_category_id' => 2,
                'name' => '{"en":"Health Information Systems Blog","hi":"क्विज़ प्रतियोगिता","ar":"مسابقة معلومات"}',
                'description' => '{"en":"<p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Praesent facilisis ante ut purus eleifend vehicula. Cras vel diam elit. Nullam scelerisque, nisi sed dignissim vehicula, sapien lacus fringilla urna, at rhoncus ex lorem vitae magna. Nam fermentum, purus sed consequat vulputate, lorem sapien dictum lorem, vitae euismod augue risus non mi. In hac habitasse platea dictumst. Donec a orci mauris. Pellentesque nec sem libero. Vestibulum fringilla neque ut est efficitur aliquet. Nulla facilisi. Fusce et ligula vitae lorem cursus aliquam. Aliquam a erat a mi bibendum molestie. Phasellus ut ex a justo dignissim scelerisque sit amet sed libero. Duis egestas, mi non dapibus hendrerit, libero nunc tincidunt orci, in dignissim ex mi a augue. Donec sed nulla in elit gravida venenatis et non augue. Pellentesque et libero quis lorem convallis viverra. Etiam fermentum sapien turpis, vel posuere velit varius ut.</p>","hi":"<p>लोरेम इप्सम डोलर सिट अमेट, कॉन्सेकट्यूर एडिपिसिंग एलीट. प्रेज़ेंट फसिलिसिस अंते उत पुरुस एलीफेंड व्हीकुला. क्रास वेल डायम एलीट. नुल्लम स्केलरिस्क, निसी सेड डिग्निस्सिम व्हीकुला, सैपियन लकुस फ्रिंजिल्ला उरना, एट रोंकस एक्स लोरेम विटे माग्ना. नाम फेर्मेंटुम, पुरुस सेड कंसक्वाट वुल्पुटेट, लोरेम सैपियन डिक्टम लोरेम, विटे एयूसमोड औगुए रीसस नॉन मी. इन हक हबितास्से प्लाटेआ डिक्टुमस्ट. डोनेक अ ओर्की मौरिस. पेल्लेंटेस्के नेक सेम लिबरो. वेस्टिबुलम फ्रिंजिल्ला नेकुए उत एस्ट एफिकितुर अलिक्वेट. नुल्ला फासिलिसि. फ्यूस्के एट लिगुला विटे लोरेम कर्सस अलिक्वाम. आलिक्वाम अ एराट अ मि बिबेंडम मोलस्टिये. फासेल्लस उत एक्स अ जस्टो डिग्निस्सिम स्केलरिस्क सिट अमेट सेड लिबरो. डुइस एगेस्टास, मि नॉन डापिबुस हेंड्रेरिट, लिबरो नुंक टिन्सीडुंट ऑर्की, इन डिग्निस्सिम एक्स मि अ औगुए. डोनेक सेड नुल्ला इन एलीट ग्राविडा विनेनेटिस एट नॉन औगुए.</p>","ar":"<p>لوريم إيبسوم دولور سيت أميت، كونسكتتور أديبيسينغ إليت. بريسنت فاسيليسيس أنتي أوت بوروس إليفند فيكولا. كراس فيل ديام إليت. نولام سكيلريسكي، نيسي سيد ديغنيسيم فيكولا، سابين لاكوس فرنجيلا أورنا، أت رونكوس إكس لوريم فيتاي ماجنا. نام فيرمينتوم، بوروس سيد كونسكووت فولووتات، لوريم سابين ديكتوم لوريم، فيتاي إويسمود أوغي ريسوس نون مي. إن هاك هابيتاس بلاتيا ديكتومست. دونيك أ أوركي موريس. بيلينتسكي نيك سيم ليبيرو. فيستيبيولوم فرنجيلا نيكوي أوت إيست إفيكيتور أليكويت. نولا فاسيليسي. فوسكي إت ليجولا فيتاي لوريم كورسوس أليكوام. أليكوام أ إيرات أ مي بيبندم مولستيي. فاسيليس أوت إكس أ جوستو ديغنيسيم سكيلريسكي سيت أميت سيد ليبيرو. دويس إيغيتاس، مي نون دابيبوس هندريريت، ليبيرو ننك تنسيدونت أوركي، إن ديغنيسيم إكس مي أ أوغ</p>"}',
                'slug' => 'health-information-systems-blog-61',
                'is_active' => 1,
                'is_featured' => 0,
                'image' => '/images/clinic_posts/66ec0673b6447.png',
                'created_at' => '2024-09-19 16:09:39',
                'updated_at' => '2024-09-19 16:09:39',
                'deleted_at' => NULL,
            ),
        ));
        \DB::table('posts')->insert(array (
            0 => 
            array (
                'id' => 62,
                'doctor_id' => NULL,
                'clinic_id' => 22,
                'blog_category_id' => 3,
                'name' => '{"en":"HealthSystemCIO","hi":"क्विज़ प्रतियोगिता","ar":"فعالية الخطاب التعليمي"}',
                'description' => '{"en":"<p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Praesent facilisis ante ut purus eleifend vehicula. Cras vel diam elit. Nullam scelerisque, nisi sed dignissim vehicula, sapien lacus fringilla urna, at rhoncus ex lorem vitae magna. Nam fermentum, purus sed consequat vulputate, lorem sapien dictum lorem, vitae euismod augue risus non mi. In hac habitasse platea dictumst. Donec a orci mauris. Pellentesque nec sem libero. Vestibulum fringilla neque ut est efficitur aliquet. Nulla facilisi. Fusce et ligula vitae lorem cursus aliquam. Aliquam a erat a mi bibendum molestie. Phasellus ut ex a justo dignissim scelerisque sit amet sed libero. Duis egestas, mi non dapibus hendrerit, libero nunc tincidunt orci, in dignissim ex mi a augue. Donec sed nulla in elit gravida venenatis et non augue. Pellentesque et libero quis lorem convallis viverra. Etiam fermentum sapien turpis, vel posuere velit varius ut.</p>","hi":"<p>लोरेम इप्सम डोलर सिट अमेट, कॉन्सेकट्यूर एडिपिसिंग एलीट. प्रेज़ेंट फसिलिसिस अंते उत पुरुस एलीफेंड व्हीकुला. क्रास वेल डायम एलीट. नुल्लम स्केलरिस्क, निसी सेड डिग्निस्सिम व्हीकुला, सैपियन लकुस फ्रिंजिल्ला उरना, एट रोंकस एक्स लोरेम विटे माग्ना. नाम फेर्मेंटुम, पुरुस सेड कंसक्वाट वुल्पुटेट, लोरेम सैपियन डिक्टम लोरेम, विटे एयूसमोड औगुए रीसस नॉन मी. इन हक हबितास्से प्लाटेआ डिक्टुमस्ट. डोनेक अ ओर्की मौरिस. पेल्लेंटेस्के नेक सेम लिबरो. वेस्टिबुलम फ्रिंजिल्ला नेकुए उत एस्ट एफिकितुर अलिक्वेट. नुल्ला फासिलिसि. फ्यूस्के एट लिगुला विटे लोरेम कर्सस अलिक्वाम. आलिक्वाम अ एराट अ मि बिबेंडम मोलस्टिये. फासेल्लस उत एक्स अ जस्टो डिग्निस्सिम स्केलरिस्क सिट अमेट सेड लिबरो. डुइस एगेस्टास, मि नॉन डापिबुस हेंड्रेरिट, लिबरो नुंक टिन्सीडुंट ऑर्की, इन डिग्निस्सिम एक्स मि अ औगुए. डोनेक सेड नुल्ला इन एलीट ग्राविडा विनेनेटिस एट नॉन औगुए.</p>","ar":"<p>لوريم إيبسوم دولور سيت أميت، كونسكتتور أديبيسينغ إليت. بريسنت فاسيليسيس أنتي أوت بوروس إليفند فيكولا. كراس فيل ديام إليت. نولام سكيلريسكي، نيسي سيد ديغنيسيم فيكولا، سابين لاكوس فرنجيلا أورنا، أت رونكوس إكس لوريم فيتاي ماجنا. نام فيرمينتوم، بوروس سيد كونسكووت فولووتات، لوريم سابين ديكتوم لوريم، فيتاي إويسمود أوغي ريسوس نون مي. إن هاك هابيتاس بلاتيا ديكتومست. دونيك أ أوركي موريس. بيلينتسكي نيك سيم ليبيرو. فيستيبيولوم فرنجيلا نيكوي أوت إيست إفيكيتور أليكويت. نولا فاسيليسي. فوسكي إت ليجولا فيتاي لوريم كورسوس أليكوام. أليكوام أ إيرات أ مي بيبندم مولستيي. فاسيليس أوت إكس أ جوستو ديغنيسيم سكيلريسكي سيت أميت سيد ليبيرو. دويس إيغيتاس، مي نون دابيبوس هندريريت، ليبيرو ننك تنسيدونت أوركي، إن ديغنيسيم إكس مي أ أوغ</p>"}',
                'slug' => 'healthsystemcio-62',
                'is_active' => 1,
                'is_featured' => 0,
                'image' => '/images/clinic_posts/66ec06d116ec0.png',
                'created_at' => '2024-09-19 16:11:13',
                'updated_at' => '2024-09-19 16:11:13',
                'deleted_at' => NULL,
            ),
        ));
        \DB::table('posts')->insert(array (
            0 => 
            array (
                'id' => 63,
                'doctor_id' => NULL,
                'clinic_id' => 22,
                'blog_category_id' => 4,
                'name' => '{"en":"The Healthcare Blog","hi":"कृत्रिम बुद्धिमत्ता","ar":"الذكاء الاصطناعي"}',
                'description' => '{"en":"<p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Praesent facilisis ante ut purus eleifend vehicula. Cras vel diam elit. Nullam scelerisque, nisi sed dignissim vehicula, sapien lacus fringilla urna, at rhoncus ex lorem vitae magna. Nam fermentum, purus sed consequat vulputate, lorem sapien dictum lorem, vitae euismod augue risus non mi. In hac habitasse platea dictumst. Donec a orci mauris. Pellentesque nec sem libero. Vestibulum fringilla neque ut est efficitur aliquet. Nulla facilisi. Fusce et ligula vitae lorem cursus aliquam. Aliquam a erat a mi bibendum molestie. Phasellus ut ex a justo dignissim scelerisque sit amet sed libero. Duis egestas, mi non dapibus hendrerit, libero nunc tincidunt orci, in dignissim ex mi a augue. Donec sed nulla in elit gravida venenatis et non augue. Pellentesque et libero quis lorem convallis viverra. Etiam fermentum sapien turpis, vel posuere velit varius ut.</p>","hi":"<p>लोरेम इप्सम डोलर सिट अमेट, कॉन्सेकट्यूर एडिपिसिंग एलीट. प्रेज़ेंट फसिलिसिस अंते उत पुरुस एलीफेंड व्हीकुला. क्रास वेल डायम एलीट. नुल्लम स्केलरिस्क, निसी सेड डिग्निस्सिम व्हीकुला, सैपियन लकुस फ्रिंजिल्ला उरना, एट रोंकस एक्स लोरेम विटे माग्ना. नाम फेर्मेंटुम, पुरुस सेड कंसक्वाट वुल्पुटेट, लोरेम सैपियन डिक्टम लोरेम, विटे एयूसमोड औगुए रीसस नॉन मी. इन हक हबितास्से प्लाटेआ डिक्टुमस्ट. डोनेक अ ओर्की मौरिस. पेल्लेंटेस्के नेक सेम लिबरो. वेस्टिबुलम फ्रिंजिल्ला नेकुए उत एस्ट एफिकितुर अलिक्वेट. नुल्ला फासिलिसि. फ्यूस्के एट लिगुला विटे लोरेम कर्सस अलिक्वाम. आलिक्वाम अ एराट अ मि बिबेंडम मोलस्टिये. फासेल्लस उत एक्स अ जस्टो डिग्निस्सिम स्केलरिस्क सिट अमेट सेड लिबरो. डुइस एगेस्टास, मि नॉन डापिबुस हेंड्रेरिट, लिबरो नुंक टिन्सीडुंट ऑर्की, इन डिग्निस्सिम एक्स मि अ औगुए. डोनेक सेड नुल्ला इन एलीट ग्राविडा विनेनेटिस एट नॉन औगुए.</p>","ar":"<p>لوريم إيبسوم دولور سيت أميت، كونسكتتور أديبيسينغ إليت. بريسنت فاسيليسيس أنتي أوت بوروس إليفند فيكولا. كراس فيل ديام إليت. نولام سكيلريسكي، نيسي سيد ديغنيسيم فيكولا، سابين لاكوس فرنجيلا أورنا، أت رونكوس إكس لوريم فيتاي ماجنا. نام فيرمينتوم، بوروس سيد كونسكووت فولووتات، لوريم سابين ديكتوم لوريم، فيتاي إويسمود أوغي ريسوس نون مي. إن هاك هابيتاس بلاتيا ديكتومست. دونيك أ أوركي موريس. بيلينتسكي نيك سيم ليبيرو. فيستيبيولوم فرنجيلا نيكوي أوت إيست إفيكيتور أليكويت. نولا فاسيليسي. فوسكي إت ليجولا فيتاي لوريم كورسوس أليكوام. أليكوام أ إيرات أ مي بيبندم مولستيي. فاسيليس أوت إكس أ جوستو ديغنيسيم سكيلريسكي سيت أميت سيد ليبيرو. دويس إيغيتاس، مي نون دابيبوس هندريريت، ليبيرو ننك تنسيدونت أوركي، إن ديغنيسيم إكس مي أ أوغ</p>"}',
                'slug' => 'the-healthcare-blog-63',
                'is_active' => 1,
                'is_featured' => 0,
                'image' => '/images/clinic_posts/66ec06f676dad.png',
                'created_at' => '2024-09-19 16:11:50',
                'updated_at' => '2024-09-19 16:11:50',
                'deleted_at' => NULL,
            ),
        ));
        \DB::table('posts')->insert(array (
            0 => 
            array (
                'id' => 64,
                'doctor_id' => NULL,
                'clinic_id' => 23,
                'blog_category_id' => 3,
                'name' => '{"en":"EHR Intelligence","hi":"क्विज़ प्रतियोगिता","ar":"مسابقة معلومات"}',
                'description' => '{"en":"<p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Praesent facilisis ante ut purus eleifend vehicula. Cras vel diam elit. Nullam scelerisque, nisi sed dignissim vehicula, sapien lacus fringilla urna, at rhoncus ex lorem vitae magna. Nam fermentum, purus sed consequat vulputate, lorem sapien dictum lorem, vitae euismod augue risus non mi. In hac habitasse platea dictumst. Donec a orci mauris. Pellentesque nec sem libero. Vestibulum fringilla neque ut est efficitur aliquet. Nulla facilisi. Fusce et ligula vitae lorem cursus aliquam. Aliquam a erat a mi bibendum molestie. Phasellus ut ex a justo dignissim scelerisque sit amet sed libero. Duis egestas, mi non dapibus hendrerit, libero nunc tincidunt orci, in dignissim ex mi a augue. Donec sed nulla in elit gravida venenatis et non augue. Pellentesque et libero quis lorem convallis viverra. Etiam fermentum sapien turpis, vel posuere velit varius ut.</p>","hi":"<p>लोरेम इप्सम डोलर सिट अमेट, कॉन्सेकट्यूर एडिपिसिंग एलीट. प्रेज़ेंट फसिलिसिस अंते उत पुरुस एलीफेंड व्हीकुला. क्रास वेल डायम एलीट. नुल्लम स्केलरिस्क, निसी सेड डिग्निस्सिम व्हीकुला, सैपियन लकुस फ्रिंजिल्ला उरना, एट रोंकस एक्स लोरेम विटे माग्ना. नाम फेर्मेंटुम, पुरुस सेड कंसक्वाट वुल्पुटेट, लोरेम सैपियन डिक्टम लोरेम, विटे एयूसमोड औगुए रीसस नॉन मी. इन हक हबितास्से प्लाटेआ डिक्टुमस्ट. डोनेक अ ओर्की मौरिस. पेल्लेंटेस्के नेक सेम लिबरो. वेस्टिबुलम फ्रिंजिल्ला नेकुए उत एस्ट एफिकितुर अलिक्वेट. नुल्ला फासिलिसि. फ्यूस्के एट लिगुला विटे लोरेम कर्सस अलिक्वाम. आलिक्वाम अ एराट अ मि बिबेंडम मोलस्टिये. फासेल्लस उत एक्स अ जस्टो डिग्निस्सिम स्केलरिस्क सिट अमेट सेड लिबरो. डुइस एगेस्टास, मि नॉन डापिबुस हेंड्रेरिट, लिबरो नुंक टिन्सीडुंट ऑर्की, इन डिग्निस्सिम एक्स मि अ औगुए. डोनेक सेड नुल्ला इन एलीट ग्राविडा विनेनेटिस एट नॉन औगुए.</p>","ar":"<p>لوريم إيبسوم دولور سيت أميت، كونسكتتور أديبيسينغ إليت. بريسنت فاسيليسيس أنتي أوت بوروس إليفند فيكولا. كراس فيل ديام إليت. نولام سكيلريسكي، نيسي سيد ديغنيسيم فيكولا، سابين لاكوس فرنجيلا أورنا، أت رونكوس إكس لوريم فيتاي ماجنا. نام فيرمينتوم، بوروس سيد كونسكووت فولووتات، لوريم سابين ديكتوم لوريم، فيتاي إويسمود أوغي ريسوس نون مي. إن هاك هابيتاس بلاتيا ديكتومست. دونيك أ أوركي موريس. بيلينتسكي نيك سيم ليبيرو. فيستيبيولوم فرنجيلا نيكوي أوت إيست إفيكيتور أليكويت. نولا فاسيليسي. فوسكي إت ليجولا فيتاي لوريم كورسوس أليكوام. أليكوام أ إيرات أ مي بيبندم مولستيي. فاسيليس أوت إكس أ جوستو ديغنيسيم سكيلريسكي سيت أميت سيد ليبيرو. دويس إيغيتاس، مي نون دابيبوس هندريريت، ليبيرو ننك تنسيدونت أوركي، إن ديغنيسيم إكس مي أ أوغ</p>"}',
                'slug' => 'ehr-intelligence-64',
                'is_active' => 1,
                'is_featured' => 0,
                'image' => '/images/clinic_posts/66ec09df75a9c.png',
                'created_at' => '2024-09-19 16:24:15',
                'updated_at' => '2024-09-19 16:24:15',
                'deleted_at' => NULL,
            ),
        ));
        \DB::table('posts')->insert(array (
            0 => 
            array (
                'id' => 65,
                'doctor_id' => NULL,
                'clinic_id' => 23,
                'blog_category_id' => 3,
                'name' => '{"en":"Epic Systems Blog","hi":"कृत्रिम बुद्धिमत्ता","ar":"الذكاء الاصطناعي"}',
                'description' => '{"en":"<p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Praesent facilisis ante ut purus eleifend vehicula. Cras vel diam elit. Nullam scelerisque, nisi sed dignissim vehicula, sapien lacus fringilla urna, at rhoncus ex lorem vitae magna. Nam fermentum, purus sed consequat vulputate, lorem sapien dictum lorem, vitae euismod augue risus non mi. In hac habitasse platea dictumst. Donec a orci mauris. Pellentesque nec sem libero. Vestibulum fringilla neque ut est efficitur aliquet. Nulla facilisi. Fusce et ligula vitae lorem cursus aliquam. Aliquam a erat a mi bibendum molestie. Phasellus ut ex a justo dignissim scelerisque sit amet sed libero. Duis egestas, mi non dapibus hendrerit, libero nunc tincidunt orci, in dignissim ex mi a augue. Donec sed nulla in elit gravida venenatis et non augue. Pellentesque et libero quis lorem convallis viverra. Etiam fermentum sapien turpis, vel posuere velit varius ut.</p>","hi":"<p>लोरेम इप्सम डोलर सिट अमेट, कॉन्सेकट्यूर एडिपिसिंग एलीट. प्रेज़ेंट फसिलिसिस अंते उत पुरुस एलीफेंड व्हीकुला. क्रास वेल डायम एलीट. नुल्लम स्केलरिस्क, निसी सेड डिग्निस्सिम व्हीकुला, सैपियन लकुस फ्रिंजिल्ला उरना, एट रोंकस एक्स लोरेम विटे माग्ना. नाम फेर्मेंटुम, पुरुस सेड कंसक्वाट वुल्पुटेट, लोरेम सैपियन डिक्टम लोरेम, विटे एयूसमोड औगुए रीसस नॉन मी. इन हक हबितास्से प्लाटेआ डिक्टुमस्ट. डोनेक अ ओर्की मौरिस. पेल्लेंटेस्के नेक सेम लिबरो. वेस्टिबुलम फ्रिंजिल्ला नेकुए उत एस्ट एफिकितुर अलिक्वेट. नुल्ला फासिलिसि. फ्यूस्के एट लिगुला विटे लोरेम कर्सस अलिक्वाम. आलिक्वाम अ एराट अ मि बिबेंडम मोलस्टिये. फासेल्लस उत एक्स अ जस्टो डिग्निस्सिम स्केलरिस्क सिट अमेट सेड लिबरो. डुइस एगेस्टास, मि नॉन डापिबुस हेंड्रेरिट, लिबरो नुंक टिन्सीडुंट ऑर्की, इन डिग्निस्सिम एक्स मि अ औगुए. डोनेक सेड नुल्ला इन एलीट ग्राविडा विनेनेटिस एट नॉन औगुए.</p>","ar":"<p>لوريم إيبسوم دولور سيت أميت، كونسكتتور أديبيسينغ إليت. بريسنت فاسيليسيس أنتي أوت بوروس إليفند فيكولا. كراس فيل ديام إليت. نولام سكيلريسكي، نيسي سيد ديغنيسيم فيكولا، سابين لاكوس فرنجيلا أورنا، أت رونكوس إكس لوريم فيتاي ماجنا. نام فيرمينتوم، بوروس سيد كونسكووت فولووتات، لوريم سابين ديكتوم لوريم، فيتاي إويسمود أوغي ريسوس نون مي. إن هاك هابيتاس بلاتيا ديكتومست. دونيك أ أوركي موريس. بيلينتسكي نيك سيم ليبيرو. فيستيبيولوم فرنجيلا نيكوي أوت إيست إفيكيتور أليكويت. نولا فاسيليسي. فوسكي إت ليجولا فيتاي لوريم كورسوس أليكوام. أليكوام أ إيرات أ مي بيبندم مولستيي. فاسيليس أوت إكس أ جوستو ديغنيسيم سكيلريسكي سيت أميت سيد ليبيرو. دويس إيغيتاس، مي نون دابيبوس هندريريت، ليبيرو ننك تنسيدونت أوركي، إن ديغنيسيم إكس مي أ أوغ</p>"}',
                'slug' => 'epic-systems-blog-65',
                'is_active' => 1,
                'is_featured' => 0,
                'image' => '/images/clinic_posts/66ec0a24a5660.png',
                'created_at' => '2024-09-19 16:25:24',
                'updated_at' => '2024-09-19 16:25:24',
                'deleted_at' => NULL,
            ),
        ));
        \DB::table('posts')->insert(array (
            0 => 
            array (
                'id' => 66,
                'doctor_id' => NULL,
                'clinic_id' => 23,
                'blog_category_id' => 3,
                'name' => '{"en":"HealthCatalyst Blog","hi":"क्विज़ प्रतियोगिता","ar":"مسابقة معلومات"}',
                'description' => '{"en":"<p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Praesent facilisis ante ut purus eleifend vehicula. Cras vel diam elit. Nullam scelerisque, nisi sed dignissim vehicula, sapien lacus fringilla urna, at rhoncus ex lorem vitae magna. Nam fermentum, purus sed consequat vulputate, lorem sapien dictum lorem, vitae euismod augue risus non mi. In hac habitasse platea dictumst. Donec a orci mauris. Pellentesque nec sem libero. Vestibulum fringilla neque ut est efficitur aliquet. Nulla facilisi. Fusce et ligula vitae lorem cursus aliquam. Aliquam a erat a mi bibendum molestie. Phasellus ut ex a justo dignissim scelerisque sit amet sed libero. Duis egestas, mi non dapibus hendrerit, libero nunc tincidunt orci, in dignissim ex mi a augue. Donec sed nulla in elit gravida venenatis et non augue. Pellentesque et libero quis lorem convallis viverra. Etiam fermentum sapien turpis, vel posuere velit varius ut.</p>","hi":"<p>लोरेम इप्सम डोलर सिट अमेट, कॉन्सेकट्यूर एडिपिसिंग एलीट. प्रेज़ेंट फसिलिसिस अंते उत पुरुस एलीफेंड व्हीकुला. क्रास वेल डायम एलीट. नुल्लम स्केलरिस्क, निसी सेड डिग्निस्सिम व्हीकुला, सैपियन लकुस फ्रिंजिल्ला उरना, एट रोंकस एक्स लोरेम विटे माग्ना. नाम फेर्मेंटुम, पुरुस सेड कंसक्वाट वुल्पुटेट, लोरेम सैपियन डिक्टम लोरेम, विटे एयूसमोड औगुए रीसस नॉन मी. इन हक हबितास्से प्लाटेआ डिक्टुमस्ट. डोनेक अ ओर्की मौरिस. पेल्लेंटेस्के नेक सेम लिबरो. वेस्टिबुलम फ्रिंजिल्ला नेकुए उत एस्ट एफिकितुर अलिक्वेट. नुल्ला फासिलिसि. फ्यूस्के एट लिगुला विटे लोरेम कर्सस अलिक्वाम. आलिक्वाम अ एराट अ मि बिबेंडम मोलस्टिये. फासेल्लस उत एक्स अ जस्टो डिग्निस्सिम स्केलरिस्क सिट अमेट सेड लिबरो. डुइस एगेस्टास, मि नॉन डापिबुस हेंड्रेरिट, लिबरो नुंक टिन्सीडुंट ऑर्की, इन डिग्निस्सिम एक्स मि अ औगुए. डोनेक सेड नुल्ला इन एलीट ग्राविडा विनेनेटिस एट नॉन औगुए.</p>","ar":"<p>لوريم إيبسوم دولور سيت أميت، كونسكتتور أديبيسينغ إليت. بريسنت فاسيليسيس أنتي أوت بوروس إليفند فيكولا. كراس فيل ديام إليت. نولام سكيلريسكي، نيسي سيد ديغنيسيم فيكولا، سابين لاكوس فرنجيلا أورنا، أت رونكوس إكس لوريم فيتاي ماجنا. نام فيرمينتوم، بوروس سيد كونسكووت فولووتات، لوريم سابين ديكتوم لوريم، فيتاي إويسمود أوغي ريسوس نون مي. إن هاك هابيتاس بلاتيا ديكتومست. دونيك أ أوركي موريس. بيلينتسكي نيك سيم ليبيرو. فيستيبيولوم فرنجيلا نيكوي أوت إيست إفيكيتور أليكويت. نولا فاسيليسي. فوسكي إت ليجولا فيتاي لوريم كورسوس أليكوام. أليكوام أ إيرات أ مي بيبندم مولستيي. فاسيليس أوت إكس أ جوستو ديغنيسيم سكيلريسكي سيت أميت سيد ليبيرو. دويس إيغيتاس، مي نون دابيبوس هندريريت، ليبيرو ننك تنسيدونت أوركي، إن ديغنيسيم إكس مي أ أوغ</p>"}',
                'slug' => 'healthcatalyst-blog-66',
                'is_active' => 1,
                'is_featured' => 0,
                'image' => '/images/clinic_posts/66ec0b5e6e078.png',
                'created_at' => '2024-09-19 16:30:38',
                'updated_at' => '2024-09-19 16:30:38',
                'deleted_at' => NULL,
            ),
        ));
        \DB::table('posts')->insert(array (
            0 => 
            array (
                'id' => 67,
                'doctor_id' => NULL,
                'clinic_id' => 28,
                'blog_category_id' => 2,
                'name' => '{"en":"Cerner Blog","hi":"पारिस्थितिकी","ar":"فعالية الخطاب التعليمي"}',
                'description' => '{"en":"<p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Praesent facilisis ante ut purus eleifend vehicula. Cras vel diam elit. Nullam scelerisque, nisi sed dignissim vehicula, sapien lacus fringilla urna, at rhoncus ex lorem vitae magna. Nam fermentum, purus sed consequat vulputate, lorem sapien dictum lorem, vitae euismod augue risus non mi. In hac habitasse platea dictumst. Donec a orci mauris. Pellentesque nec sem libero. Vestibulum fringilla neque ut est efficitur aliquet. Nulla facilisi. Fusce et ligula vitae lorem cursus aliquam. Aliquam a erat a mi bibendum molestie. Phasellus ut ex a justo dignissim scelerisque sit amet sed libero. Duis egestas, mi non dapibus hendrerit, libero nunc tincidunt orci, in dignissim ex mi a augue. Donec sed nulla in elit gravida venenatis et non augue. Pellentesque et libero quis lorem convallis viverra. Etiam fermentum sapien turpis, vel posuere velit varius ut.</p>","hi":"<p>लोरेम इप्सम डोलर सिट अमेट, कॉन्सेकट्यूर एडिपिसिंग एलीट. प्रेज़ेंट फसिलिसिस अंते उत पुरुस एलीफेंड व्हीकुला. क्रास वेल डायम एलीट. नुल्लम स्केलरिस्क, निसी सेड डिग्निस्सिम व्हीकुला, सैपियन लकुस फ्रिंजिल्ला उरना, एट रोंकस एक्स लोरेम विटे माग्ना. नाम फेर्मेंटुम, पुरुस सेड कंसक्वाट वुल्पुटेट, लोरेम सैपियन डिक्टम लोरेम, विटे एयूसमोड औगुए रीसस नॉन मी. इन हक हबितास्से प्लाटेआ डिक्टुमस्ट. डोनेक अ ओर्की मौरिस. पेल्लेंटेस्के नेक सेम लिबरो. वेस्टिबुलम फ्रिंजिल्ला नेकुए उत एस्ट एफिकितुर अलिक्वेट. नुल्ला फासिलिसि. फ्यूस्के एट लिगुला विटे लोरेम कर्सस अलिक्वाम. आलिक्वाम अ एराट अ मि बिबेंडम मोलस्टिये. फासेल्लस उत एक्स अ जस्टो डिग्निस्सिम स्केलरिस्क सिट अमेट सेड लिबरो. डुइस एगेस्टास, मि नॉन डापिबुस हेंड्रेरिट, लिबरो नुंक टिन्सीडुंट ऑर्की, इन डिग्निस्सिम एक्स मि अ औगुए. डोनेक सेड नुल्ला इन एलीट ग्राविडा विनेनेटिस एट नॉन औगुए.</p>","ar":"<p>لوريم إيبسوم دولور سيت أميت، كونسكتتور أديبيسينغ إليت. بريسنت فاسيليسيس أنتي أوت بوروس إليفند فيكولا. كراس فيل ديام إليت. نولام سكيلريسكي، نيسي سيد ديغنيسيم فيكولا، سابين لاكوس فرنجيلا أورنا، أت رونكوس إكس لوريم فيتاي ماجنا. نام فيرمينتوم، بوروس سيد كونسكووت فولووتات، لوريم سابين ديكتوم لوريم، فيتاي إويسمود أوغي ريسوس نون مي. إن هاك هابيتاس بلاتيا ديكتومست. دونيك أ أوركي موريس. بيلينتسكي نيك سيم ليبيرو. فيستيبيولوم فرنجيلا نيكوي أوت إيست إفيكيتور أليكويت. نولا فاسيليسي. فوسكي إت ليجولا فيتاي لوريم كورسوس أليكوام. أليكوام أ إيرات أ مي بيبندم مولستيي. فاسيليس أوت إكس أ جوستو ديغنيسيم سكيلريسكي سيت أميت سيد ليبيرو. دويس إيغيتاس، مي نون دابيبوس هندريريت، ليبيرو ننك تنسيدونت أوركي، إن ديغنيسيم إكس مي أ أوغ</p>"}',
                'slug' => 'cerner-blog-67',
                'is_active' => 1,
                'is_featured' => 0,
                'image' => '/images/clinic_posts/66f25dc2bd008.png',
                'created_at' => '2024-09-24 11:35:46',
                'updated_at' => '2024-09-24 11:35:46',
                'deleted_at' => NULL,
            ),
        ));
        \DB::table('posts')->insert(array (
            0 => 
            array (
                'id' => 68,
                'doctor_id' => NULL,
                'clinic_id' => 28,
                'blog_category_id' => 1,
                'name' => '{"en":"EMR & HIPAA","hi":"क्विज़ प्रतियोगिता","ar":"علم البيئة"}',
                'description' => '{"en":"<p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Praesent facilisis ante ut purus eleifend vehicula. Cras vel diam elit. Nullam scelerisque, nisi sed dignissim vehicula, sapien lacus fringilla urna, at rhoncus ex lorem vitae magna. Nam fermentum, purus sed consequat vulputate, lorem sapien dictum lorem, vitae euismod augue risus non mi. In hac habitasse platea dictumst. Donec a orci mauris. Pellentesque nec sem libero. Vestibulum fringilla neque ut est efficitur aliquet. Nulla facilisi. Fusce et ligula vitae lorem cursus aliquam. Aliquam a erat a mi bibendum molestie. Phasellus ut ex a justo dignissim scelerisque sit amet sed libero. Duis egestas, mi non dapibus hendrerit, libero nunc tincidunt orci, in dignissim ex mi a augue. Donec sed nulla in elit gravida venenatis et non augue. Pellentesque et libero quis lorem convallis viverra. Etiam fermentum sapien turpis, vel posuere velit varius ut.</p>","hi":"<p>लोरेम इप्सम डोलर सिट अमेट, कॉन्सेकट्यूर एडिपिसिंग एलीट. प्रेज़ेंट फसिलिसिस अंते उत पुरुस एलीफेंड व्हीकुला. क्रास वेल डायम एलीट. नुल्लम स्केलरिस्क, निसी सेड डिग्निस्सिम व्हीकुला, सैपियन लकुस फ्रिंजिल्ला उरना, एट रोंकस एक्स लोरेम विटे माग्ना. नाम फेर्मेंटुम, पुरुस सेड कंसक्वाट वुल्पुटेट, लोरेम सैपियन डिक्टम लोरेम, विटे एयूसमोड औगुए रीसस नॉन मी. इन हक हबितास्से प्लाटेआ डिक्टुमस्ट. डोनेक अ ओर्की मौरिस. पेल्लेंटेस्के नेक सेम लिबरो. वेस्टिबुलम फ्रिंजिल्ला नेकुए उत एस्ट एफिकितुर अलिक्वेट. नुल्ला फासिलिसि. फ्यूस्के एट लिगुला विटे लोरेम कर्सस अलिक्वाम. आलिक्वाम अ एराट अ मि बिबेंडम मोलस्टिये. फासेल्लस उत एक्स अ जस्टो डिग्निस्सिम स्केलरिस्क सिट अमेट सेड लिबरो. डुइस एगेस्टास, मि नॉन डापिबुस हेंड्रेरिट, लिबरो नुंक टिन्सीडुंट ऑर्की, इन डिग्निस्सिम एक्स मि अ औगुए. डोनेक सेड नुल्ला इन एलीट ग्राविडा विनेनेटिस एट नॉन औगुए.</p>","ar":"<p>لوريم إيبسوم دولور سيت أميت، كونسكتتور أديبيسينغ إليت. بريسنت فاسيليسيس أنتي أوت بوروس إليفند فيكولا. كراس فيل ديام إليت. نولام سكيلريسكي، نيسي سيد ديغنيسيم فيكولا، سابين لاكوس فرنجيلا أورنا، أت رونكوس إكس لوريم فيتاي ماجنا. نام فيرمينتوم، بوروس سيد كونسكووت فولووتات، لوريم سابين ديكتوم لوريم، فيتاي إويسمود أوغي ريسوس نون مي. إن هاك هابيتاس بلاتيا ديكتومست. دونيك أ أوركي موريس. بيلينتسكي نيك سيم ليبيرو. فيستيبيولوم فرنجيلا نيكوي أوت إيست إفيكيتور أليكويت. نولا فاسيليسي. فوسكي إت ليجولا فيتاي لوريم كورسوس أليكوام. أليكوام أ إيرات أ مي بيبندم مولستيي. فاسيليس أوت إكس أ جوستو ديغنيسيم سكيلريسكي سيت أميت سيد ليبيرو. دويس إيغيتاس، مي نون دابيبوس هندريريت، ليبيرو ننك تنسيدونت أوركي، إن ديغنيسيم إكس مي أ أوغ</p>"}',
                'slug' => 'emr-hipaa-68',
                'is_active' => 1,
                'is_featured' => 0,
                'image' => '/images/clinic_posts/66f25e0ea47e7.png',
                'created_at' => '2024-09-24 11:37:02',
                'updated_at' => '2024-09-24 11:37:02',
                'deleted_at' => NULL,
            ),
        ));
        \DB::table('posts')->insert(array (
            0 => 
            array (
                'id' => 69,
                'doctor_id' => NULL,
                'clinic_id' => 28,
                'blog_category_id' => 4,
                'name' => '{"en":"MobiHealthNews","hi":"सामान्य बुद्धि शिक्षा ब्लॉग","ar":"مسابقة معلومات"}',
                'description' => '{"en":"<p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Praesent facilisis ante ut purus eleifend vehicula. Cras vel diam elit. Nullam scelerisque, nisi sed dignissim vehicula, sapien lacus fringilla urna, at rhoncus ex lorem vitae magna. Nam fermentum, purus sed consequat vulputate, lorem sapien dictum lorem, vitae euismod augue risus non mi. In hac habitasse platea dictumst. Donec a orci mauris. Pellentesque nec sem libero. Vestibulum fringilla neque ut est efficitur aliquet. Nulla facilisi. Fusce et ligula vitae lorem cursus aliquam. Aliquam a erat a mi bibendum molestie. Phasellus ut ex a justo dignissim scelerisque sit amet sed libero. Duis egestas, mi non dapibus hendrerit, libero nunc tincidunt orci, in dignissim ex mi a augue. Donec sed nulla in elit gravida venenatis et non augue. Pellentesque et libero quis lorem convallis viverra. Etiam fermentum sapien turpis, vel posuere velit varius ut.</p>","hi":"<p>लोरेम इप्सम डोलर सिट अमेट, कॉन्सेकट्यूर एडिपिसिंग एलीट. प्रेज़ेंट फसिलिसिस अंते उत पुरुस एलीफेंड व्हीकुला. क्रास वेल डायम एलीट. नुल्लम स्केलरिस्क, निसी सेड डिग्निस्सिम व्हीकुला, सैपियन लकुस फ्रिंजिल्ला उरना, एट रोंकस एक्स लोरेम विटे माग्ना. नाम फेर्मेंटुम, पुरुस सेड कंसक्वाट वुल्पुटेट, लोरेम सैपियन डिक्टम लोरेम, विटे एयूसमोड औगुए रीसस नॉन मी. इन हक हबितास्से प्लाटेआ डिक्टुमस्ट. डोनेक अ ओर्की मौरिस. पेल्लेंटेस्के नेक सेम लिबरो. वेस्टिबुलम फ्रिंजिल्ला नेकुए उत एस्ट एफिकितुर अलिक्वेट. नुल्ला फासिलिसि. फ्यूस्के एट लिगुला विटे लोरेम कर्सस अलिक्वाम. आलिक्वाम अ एराट अ मि बिबेंडम मोलस्टिये. फासेल्लस उत एक्स अ जस्टो डिग्निस्सिम स्केलरिस्क सिट अमेट सेड लिबरो. डुइस एगेस्टास, मि नॉन डापिबुस हेंड्रेरिट, लिबरो नुंक टिन्सीडुंट ऑर्की, इन डिग्निस्सिम एक्स मि अ औगुए. डोनेक सेड नुल्ला इन एलीट ग्राविडा विनेनेटिस एट नॉन औगुए.</p>","ar":"<p>لوريم إيبسوم دولور سيت أميت، كونسكتتور أديبيسينغ إليت. بريسنت فاسيليسيس أنتي أوت بوروس إليفند فيكولا. كراس فيل ديام إليت. نولام سكيلريسكي، نيسي سيد ديغنيسيم فيكولا، سابين لاكوس فرنجيلا أورنا، أت رونكوس إكس لوريم فيتاي ماجنا. نام فيرمينتوم، بوروس سيد كونسكووت فولووتات، لوريم سابين ديكتوم لوريم، فيتاي إويسمود أوغي ريسوس نون مي. إن هاك هابيتاس بلاتيا ديكتومست. دونيك أ أوركي موريس. بيلينتسكي نيك سيم ليبيرو. فيستيبيولوم فرنجيلا نيكوي أوت إيست إفيكيتور أليكويت. نولا فاسيليسي. فوسكي إت ليجولا فيتاي لوريم كورسوس أليكوام. أليكوام أ إيرات أ مي بيبندم مولستيي. فاسيليس أوت إكس أ جوستو ديغنيسيم سكيلريسكي سيت أميت سيد ليبيرو. دويس إيغيتاس، مي نون دابيبوس هندريريت، ليبيرو ننك تنسيدونت أوركي، إن ديغنيسيم إكس مي أ أوغ</p>"}',
                'slug' => 'mobihealthnews-69',
                'is_active' => 1,
                'is_featured' => 0,
                'image' => '/images/clinic_posts/66f25e562711e.png',
                'created_at' => '2024-09-24 11:38:14',
                'updated_at' => '2024-09-24 11:38:14',
                'deleted_at' => NULL,
            ),
        ));
        \DB::table('posts')->insert(array (
            0 => 
            array (
                'id' => 70,
                'doctor_id' => NULL,
                'clinic_id' => 29,
                'blog_category_id' => 3,
                'name' => '{"en":"EHR Intelligence","hi":"पारिस्थितिकी","ar":"علم البيئة"}',
                'description' => '{"en":"<p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Praesent facilisis ante ut purus eleifend vehicula. Cras vel diam elit. Nullam scelerisque, nisi sed dignissim vehicula, sapien lacus fringilla urna, at rhoncus ex lorem vitae magna. Nam fermentum, purus sed consequat vulputate, lorem sapien dictum lorem, vitae euismod augue risus non mi. In hac habitasse platea dictumst. Donec a orci mauris. Pellentesque nec sem libero. Vestibulum fringilla neque ut est efficitur aliquet. Nulla facilisi. Fusce et ligula vitae lorem cursus aliquam. Aliquam a erat a mi bibendum molestie. Phasellus ut ex a justo dignissim scelerisque sit amet sed libero. Duis egestas, mi non dapibus hendrerit, libero nunc tincidunt orci, in dignissim ex mi a augue. Donec sed nulla in elit gravida venenatis et non augue. Pellentesque et libero quis lorem convallis viverra. Etiam fermentum sapien turpis, vel posuere velit varius ut.</p>","hi":"<p>लोरेम इप्सम डोलर सिट अमेट, कॉन्सेकट्यूर एडिपिसिंग एलीट. प्रेज़ेंट फसिलिसिस अंते उत पुरुस एलीफेंड व्हीकुला. क्रास वेल डायम एलीट. नुल्लम स्केलरिस्क, निसी सेड डिग्निस्सिम व्हीकुला, सैपियन लकुस फ्रिंजिल्ला उरना, एट रोंकस एक्स लोरेम विटे माग्ना. नाम फेर्मेंटुम, पुरुस सेड कंसक्वाट वुल्पुटेट, लोरेम सैपियन डिक्टम लोरेम, विटे एयूसमोड औगुए रीसस नॉन मी. इन हक हबितास्से प्लाटेआ डिक्टुमस्ट. डोनेक अ ओर्की मौरिस. पेल्लेंटेस्के नेक सेम लिबरो. वेस्टिबुलम फ्रिंजिल्ला नेकुए उत एस्ट एफिकितुर अलिक्वेट. नुल्ला फासिलिसि. फ्यूस्के एट लिगुला विटे लोरेम कर्सस अलिक्वाम. आलिक्वाम अ एराट अ मि बिबेंडम मोलस्टिये. फासेल्लस उत एक्स अ जस्टो डिग्निस्सिम स्केलरिस्क सिट अमेट सेड लिबरो. डुइस एगेस्टास, मि नॉन डापिबुस हेंड्रेरिट, लिबरो नुंक टिन्सीडुंट ऑर्की, इन डिग्निस्सिम एक्स मि अ औगुए. डोनेक सेड नुल्ला इन एलीट ग्राविडा विनेनेटिस एट नॉन औगुए.</p>","ar":"<p>لوريم إيبسوم دولور سيت أميت، كونسكتتور أديبيسينغ إليت. بريسنت فاسيليسيس أنتي أوت بوروس إليفند فيكولا. كراس فيل ديام إليت. نولام سكيلريسكي، نيسي سيد ديغنيسيم فيكولا، سابين لاكوس فرنجيلا أورنا، أت رونكوس إكس لوريم فيتاي ماجنا. نام فيرمينتوم، بوروس سيد كونسكووت فولووتات، لوريم سابين ديكتوم لوريم، فيتاي إويسمود أوغي ريسوس نون مي. إن هاك هابيتاس بلاتيا ديكتومست. دونيك أ أوركي موريس. بيلينتسكي نيك سيم ليبيرو. فيستيبيولوم فرنجيلا نيكوي أوت إيست إفيكيتور أليكويت. نولا فاسيليسي. فوسكي إت ليجولا فيتاي لوريم كورسوس أليكوام. أليكوام أ إيرات أ مي بيبندم مولستيي. فاسيليس أوت إكس أ جوستو ديغنيسيم سكيلريسكي سيت أميت سيد ليبيرو. دويس إيغيتاس، مي نون دابيبوس هندريريت، ليبيرو ننك تنسيدونت أوركي، إن ديغنيسيم إكس مي أ أوغ</p>"}',
                'slug' => 'ehr-intelligence-70',
                'is_active' => 1,
                'is_featured' => 0,
                'image' => '/images/clinic_posts/66f260ee49cc6.png',
                'created_at' => '2024-09-24 11:49:18',
                'updated_at' => '2024-09-24 11:49:18',
                'deleted_at' => NULL,
            ),
        ));
        \DB::table('posts')->insert(array (
            0 => 
            array (
                'id' => 71,
                'doctor_id' => NULL,
                'clinic_id' => 29,
                'blog_category_id' => 1,
                'name' => '{"en":"Epic Systems Blog","hi":"क्विज़ प्रतियोगिता","ar":"مسابقة معلومات"}',
                'description' => '{"en":"<p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Praesent facilisis ante ut purus eleifend vehicula. Cras vel diam elit. Nullam scelerisque, nisi sed dignissim vehicula, sapien lacus fringilla urna, at rhoncus ex lorem vitae magna. Nam fermentum, purus sed consequat vulputate, lorem sapien dictum lorem, vitae euismod augue risus non mi. In hac habitasse platea dictumst. Donec a orci mauris. Pellentesque nec sem libero. Vestibulum fringilla neque ut est efficitur aliquet. Nulla facilisi. Fusce et ligula vitae lorem cursus aliquam. Aliquam a erat a mi bibendum molestie. Phasellus ut ex a justo dignissim scelerisque sit amet sed libero. Duis egestas, mi non dapibus hendrerit, libero nunc tincidunt orci, in dignissim ex mi a augue. Donec sed nulla in elit gravida venenatis et non augue. Pellentesque et libero quis lorem convallis viverra. Etiam fermentum sapien turpis, vel posuere velit varius ut.</p>","hi":"<p>लोरेम इप्सम डोलर सिट अमेट, कॉन्सेकट्यूर एडिपिसिंग एलीट. प्रेज़ेंट फसिलिसिस अंते उत पुरुस एलीफेंड व्हीकुला. क्रास वेल डायम एलीट. नुल्लम स्केलरिस्क, निसी सेड डिग्निस्सिम व्हीकुला, सैपियन लकुस फ्रिंजिल्ला उरना, एट रोंकस एक्स लोरेम विटे माग्ना. नाम फेर्मेंटुम, पुरुस सेड कंसक्वाट वुल्पुटेट, लोरेम सैपियन डिक्टम लोरेम, विटे एयूसमोड औगुए रीसस नॉन मी. इन हक हबितास्से प्लाटेआ डिक्टुमस्ट. डोनेक अ ओर्की मौरिस. पेल्लेंटेस्के नेक सेम लिबरो. वेस्टिबुलम फ्रिंजिल्ला नेकुए उत एस्ट एफिकितुर अलिक्वेट. नुल्ला फासिलिसि. फ्यूस्के एट लिगुला विटे लोरेम कर्सस अलिक्वाम. आलिक्वाम अ एराट अ मि बिबेंडम मोलस्टिये. फासेल्लस उत एक्स अ जस्टो डिग्निस्सिम स्केलरिस्क सिट अमेट सेड लिबरो. डुइस एगेस्टास, मि नॉन डापिबुस हेंड्रेरिट, लिबरो नुंक टिन्सीडुंट ऑर्की, इन डिग्निस्सिम एक्स मि अ औगुए. डोनेक सेड नुल्ला इन एलीट ग्राविडा विनेनेटिस एट नॉन औगुए.</p>","ar":"<p>لوريم إيبسوم دولور سيت أميت، كونسكتتور أديبيسينغ إليت. بريسنت فاسيليسيس أنتي أوت بوروس إليفند فيكولا. كراس فيل ديام إليت. نولام سكيلريسكي، نيسي سيد ديغنيسيم فيكولا، سابين لاكوس فرنجيلا أورنا، أت رونكوس إكس لوريم فيتاي ماجنا. نام فيرمينتوم، بوروس سيد كونسكووت فولووتات، لوريم سابين ديكتوم لوريم، فيتاي إويسمود أوغي ريسوس نون مي. إن هاك هابيتاس بلاتيا ديكتومست. دونيك أ أوركي موريس. بيلينتسكي نيك سيم ليبيرو. فيستيبيولوم فرنجيلا نيكوي أوت إيست إفيكيتور أليكويت. نولا فاسيليسي. فوسكي إت ليجولا فيتاي لوريم كورسوس أليكوام. أليكوام أ إيرات أ مي بيبندم مولستيي. فاسيليس أوت إكس أ جوستو ديغنيسيم سكيلريسكي سيت أميت سيد ليبيرو. دويس إيغيتاس، مي نون دابيبوس هندريريت، ليبيرو ننك تنسيدونت أوركي، إن ديغنيسيم إكس مي أ أوغ</p>"}',
                'slug' => 'epic-systems-blog-71',
                'is_active' => 1,
                'is_featured' => 0,
                'image' => '/images/clinic_posts/66f26119ccb36.png',
                'created_at' => '2024-09-24 11:50:01',
                'updated_at' => '2024-09-24 11:50:01',
                'deleted_at' => NULL,
            ),
        ));
        \DB::table('posts')->insert(array (
            0 => 
            array (
                'id' => 72,
                'doctor_id' => NULL,
                'clinic_id' => 29,
                'blog_category_id' => 3,
                'name' => '{"en":"HealthCatalyst Blog","hi":"क्विज़ प्रतियोगिता","ar":"مسابقة معلومات"}',
                'description' => '{"en":"<p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Praesent facilisis ante ut purus eleifend vehicula. Cras vel diam elit. Nullam scelerisque, nisi sed dignissim vehicula, sapien lacus fringilla urna, at rhoncus ex lorem vitae magna. Nam fermentum, purus sed consequat vulputate, lorem sapien dictum lorem, vitae euismod augue risus non mi. In hac habitasse platea dictumst. Donec a orci mauris. Pellentesque nec sem libero. Vestibulum fringilla neque ut est efficitur aliquet. Nulla facilisi. Fusce et ligula vitae lorem cursus aliquam. Aliquam a erat a mi bibendum molestie. Phasellus ut ex a justo dignissim scelerisque sit amet sed libero. Duis egestas, mi non dapibus hendrerit, libero nunc tincidunt orci, in dignissim ex mi a augue. Donec sed nulla in elit gravida venenatis et non augue. Pellentesque et libero quis lorem convallis viverra. Etiam fermentum sapien turpis, vel posuere velit varius ut.</p>","hi":"<p>लोरेम इप्सम डोलर सिट अमेट, कॉन्सेकट्यूर एडिपिसिंग एलीट. प्रेज़ेंट फसिलिसिस अंते उत पुरुस एलीफेंड व्हीकुला. क्रास वेल डायम एलीट. नुल्लम स्केलरिस्क, निसी सेड डिग्निस्सिम व्हीकुला, सैपियन लकुस फ्रिंजिल्ला उरना, एट रोंकस एक्स लोरेम विटे माग्ना. नाम फेर्मेंटुम, पुरुस सेड कंसक्वाट वुल्पुटेट, लोरेम सैपियन डिक्टम लोरेम, विटे एयूसमोड औगुए रीसस नॉन मी. इन हक हबितास्से प्लाटेआ डिक्टुमस्ट. डोनेक अ ओर्की मौरिस. पेल्लेंटेस्के नेक सेम लिबरो. वेस्टिबुलम फ्रिंजिल्ला नेकुए उत एस्ट एफिकितुर अलिक्वेट. नुल्ला फासिलिसि. फ्यूस्के एट लिगुला विटे लोरेम कर्सस अलिक्वाम. आलिक्वाम अ एराट अ मि बिबेंडम मोलस्टिये. फासेल्लस उत एक्स अ जस्टो डिग्निस्सिम स्केलरिस्क सिट अमेट सेड लिबरो. डुइस एगेस्टास, मि नॉन डापिबुस हेंड्रेरिट, लिबरो नुंक टिन्सीडुंट ऑर्की, इन डिग्निस्सिम एक्स मि अ औगुए. डोनेक सेड नुल्ला इन एलीट ग्राविडा विनेनेटिस एट नॉन औगुए.</p>","ar":"<p>لوريم إيبسوم دولور سيت أميت، كونسكتتور أديبيسينغ إليت. بريسنت فاسيليسيس أنتي أوت بوروس إليفند فيكولا. كراس فيل ديام إليت. نولام سكيلريسكي، نيسي سيد ديغنيسيم فيكولا، سابين لاكوس فرنجيلا أورنا، أت رونكوس إكس لوريم فيتاي ماجنا. نام فيرمينتوم، بوروس سيد كونسكووت فولووتات، لوريم سابين ديكتوم لوريم، فيتاي إويسمود أوغي ريسوس نون مي. إن هاك هابيتاس بلاتيا ديكتومست. دونيك أ أوركي موريس. بيلينتسكي نيك سيم ليبيرو. فيستيبيولوم فرنجيلا نيكوي أوت إيست إفيكيتور أليكويت. نولا فاسيليسي. فوسكي إت ليجولا فيتاي لوريم كورسوس أليكوام. أليكوام أ إيرات أ مي بيبندم مولستيي. فاسيليس أوت إكس أ جوستو ديغنيسيم سكيلريسكي سيت أميت سيد ليبيرو. دويس إيغيتاس، مي نون دابيبوس هندريريت، ليبيرو ننك تنسيدونت أوركي، إن ديغنيسيم إكس مي أ أوغ</p>"}',
                'slug' => 'healthcatalyst-blog-72',
                'is_active' => 1,
                'is_featured' => 0,
                'image' => '/images/clinic_posts/66f2614e80eed.png',
                'created_at' => '2024-09-24 11:50:54',
                'updated_at' => '2024-09-24 11:50:54',
                'deleted_at' => NULL,
            ),
        ));
        \DB::table('posts')->insert(array (
            0 => 
            array (
                'id' => 73,
                'doctor_id' => NULL,
                'clinic_id' => 30,
                'blog_category_id' => 3,
                'name' => '{"en":"Health Data Management","hi":"क्विज़ प्रतियोगिता","ar":"الذكاء الاصطناعي"}',
                'description' => '{"en":"<p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Praesent facilisis ante ut purus eleifend vehicula. Cras vel diam elit. Nullam scelerisque, nisi sed dignissim vehicula, sapien lacus fringilla urna, at rhoncus ex lorem vitae magna. Nam fermentum, purus sed consequat vulputate, lorem sapien dictum lorem, vitae euismod augue risus non mi. In hac habitasse platea dictumst. Donec a orci mauris. Pellentesque nec sem libero. Vestibulum fringilla neque ut est efficitur aliquet. Nulla facilisi. Fusce et ligula vitae lorem cursus aliquam. Aliquam a erat a mi bibendum molestie. Phasellus ut ex a justo dignissim scelerisque sit amet sed libero. Duis egestas, mi non dapibus hendrerit, libero nunc tincidunt orci, in dignissim ex mi a augue. Donec sed nulla in elit gravida venenatis et non augue. Pellentesque et libero quis lorem convallis viverra. Etiam fermentum sapien turpis, vel posuere velit varius ut.</p>","hi":"<p>लोरेम इप्सम डोलर सिट अमेट, कॉन्सेकट्यूर एडिपिसिंग एलीट. प्रेज़ेंट फसिलिसिस अंते उत पुरुस एलीफेंड व्हीकुला. क्रास वेल डायम एलीट. नुल्लम स्केलरिस्क, निसी सेड डिग्निस्सिम व्हीकुला, सैपियन लकुस फ्रिंजिल्ला उरना, एट रोंकस एक्स लोरेम विटे माग्ना. नाम फेर्मेंटुम, पुरुस सेड कंसक्वाट वुल्पुटेट, लोरेम सैपियन डिक्टम लोरेम, विटे एयूसमोड औगुए रीसस नॉन मी. इन हक हबितास्से प्लाटेआ डिक्टुमस्ट. डोनेक अ ओर्की मौरिस. पेल्लेंटेस्के नेक सेम लिबरो. वेस्टिबुलम फ्रिंजिल्ला नेकुए उत एस्ट एफिकितुर अलिक्वेट. नुल्ला फासिलिसि. फ्यूस्के एट लिगुला विटे लोरेम कर्सस अलिक्वाम. आलिक्वाम अ एराट अ मि बिबेंडम मोलस्टिये. फासेल्लस उत एक्स अ जस्टो डिग्निस्सिम स्केलरिस्क सिट अमेट सेड लिबरो. डुइस एगेस्टास, मि नॉन डापिबुस हेंड्रेरिट, लिबरो नुंक टिन्सीडुंट ऑर्की, इन डिग्निस्सिम एक्स मि अ औगुए. डोनेक सेड नुल्ला इन एलीट ग्राविडा विनेनेटिस एट नॉन औगुए.</p>","ar":"<p>لوريم إيبسوم دولور سيت أميت، كونسكتتور أديبيسينغ إليت. بريسنت فاسيليسيس أنتي أوت بوروس إليفند فيكولا. كراس فيل ديام إليت. نولام سكيلريسكي، نيسي سيد ديغنيسيم فيكولا، سابين لاكوس فرنجيلا أورنا، أت رونكوس إكس لوريم فيتاي ماجنا. نام فيرمينتوم، بوروس سيد كونسكووت فولووتات، لوريم سابين ديكتوم لوريم، فيتاي إويسمود أوغي ريسوس نون مي. إن هاك هابيتاس بلاتيا ديكتومست. دونيك أ أوركي موريس. بيلينتسكي نيك سيم ليبيرو. فيستيبيولوم فرنجيلا نيكوي أوت إيست إفيكيتور أليكويت. نولا فاسيليسي. فوسكي إت ليجولا فيتاي لوريم كورسوس أليكوام. أليكوام أ إيرات أ مي بيبندم مولستيي. فاسيليس أوت إكس أ جوستو ديغنيسيم سكيلريسكي سيت أميت سيد ليبيرو. دويس إيغيتاس، مي نون دابيبوس هندريريت، ليبيرو ننك تنسيدونت أوركي، إن ديغنيسيم إكس مي أ أوغ</p>"}',
                'slug' => 'health-data-management-73',
                'is_active' => 1,
                'is_featured' => 0,
                'image' => '/images/clinic_posts/66f2641782978.png',
                'created_at' => '2024-09-24 12:02:47',
                'updated_at' => '2024-09-24 12:02:47',
                'deleted_at' => NULL,
            ),
        ));
        \DB::table('posts')->insert(array (
            0 => 
            array (
                'id' => 74,
                'doctor_id' => NULL,
                'clinic_id' => 30,
                'blog_category_id' => 1,
                'name' => '{"en":"Healthcare IT Leaders","hi":"शैक्षिक भाषण समारोह","ar":"فعالية الخطاب التعليمي"}',
                'description' => '{"en":"<p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Praesent facilisis ante ut purus eleifend vehicula. Cras vel diam elit. Nullam scelerisque, nisi sed dignissim vehicula, sapien lacus fringilla urna, at rhoncus ex lorem vitae magna. Nam fermentum, purus sed consequat vulputate, lorem sapien dictum lorem, vitae euismod augue risus non mi. In hac habitasse platea dictumst. Donec a orci mauris. Pellentesque nec sem libero. Vestibulum fringilla neque ut est efficitur aliquet. Nulla facilisi. Fusce et ligula vitae lorem cursus aliquam. Aliquam a erat a mi bibendum molestie. Phasellus ut ex a justo dignissim scelerisque sit amet sed libero. Duis egestas, mi non dapibus hendrerit, libero nunc tincidunt orci, in dignissim ex mi a augue. Donec sed nulla in elit gravida venenatis et non augue. Pellentesque et libero quis lorem convallis viverra. Etiam fermentum sapien turpis, vel posuere velit varius ut.</p>","hi":"<p>लोरेम इप्सम डोलर सिट अमेट, कॉन्सेकट्यूर एडिपिसिंग एलीट. प्रेज़ेंट फसिलिसिस अंते उत पुरुस एलीफेंड व्हीकुला. क्रास वेल डायम एलीट. नुल्लम स्केलरिस्क, निसी सेड डिग्निस्सिम व्हीकुला, सैपियन लकुस फ्रिंजिल्ला उरना, एट रोंकस एक्स लोरेम विटे माग्ना. नाम फेर्मेंटुम, पुरुस सेड कंसक्वाट वुल्पुटेट, लोरेम सैपियन डिक्टम लोरेम, विटे एयूसमोड औगुए रीसस नॉन मी. इन हक हबितास्से प्लाटेआ डिक्टुमस्ट. डोनेक अ ओर्की मौरिस. पेल्लेंटेस्के नेक सेम लिबरो. वेस्टिबुलम फ्रिंजिल्ला नेकुए उत एस्ट एफिकितुर अलिक्वेट. नुल्ला फासिलिसि. फ्यूस्के एट लिगुला विटे लोरेम कर्सस अलिक्वाम. आलिक्वाम अ एराट अ मि बिबेंडम मोलस्टिये. फासेल्लस उत एक्स अ जस्टो डिग्निस्सिम स्केलरिस्क सिट अमेट सेड लिबरो. डुइस एगेस्टास, मि नॉन डापिबुस हेंड्रेरिट, लिबरो नुंक टिन्सीडुंट ऑर्की, इन डिग्निस्सिम एक्स मि अ औगुए. डोनेक सेड नुल्ला इन एलीट ग्राविडा विनेनेटिस एट नॉन औगुए.</p>","ar":"<p>لوريم إيبسوم دولور سيت أميت، كونسكتتور أديبيسينغ إليت. بريسنت فاسيليسيس أنتي أوت بوروس إليفند فيكولا. كراس فيل ديام إليت. نولام سكيلريسكي، نيسي سيد ديغنيسيم فيكولا، سابين لاكوس فرنجيلا أورنا، أت رونكوس إكس لوريم فيتاي ماجنا. نام فيرمينتوم، بوروس سيد كونسكووت فولووتات، لوريم سابين ديكتوم لوريم، فيتاي إويسمود أوغي ريسوس نون مي. إن هاك هابيتاس بلاتيا ديكتومست. دونيك أ أوركي موريس. بيلينتسكي نيك سيم ليبيرو. فيستيبيولوم فرنجيلا نيكوي أوت إيست إفيكيتور أليكويت. نولا فاسيليسي. فوسكي إت ليجولا فيتاي لوريم كورسوس أليكوام. أليكوام أ إيرات أ مي بيبندم مولستيي. فاسيليس أوت إكس أ جوستو ديغنيسيم سكيلريسكي سيت أميت سيد ليبيرو. دويس إيغيتاس، مي نون دابيبوس هندريريت، ليبيرو ننك تنسيدونت أوركي، إن ديغنيسيم إكس مي أ أوغ</p>"}',
                'slug' => 'healthcare-it-leaders-74',
                'is_active' => 1,
                'is_featured' => 0,
                'image' => '/images/clinic_posts/66f26444190ab.png',
                'created_at' => '2024-09-24 12:03:32',
                'updated_at' => '2024-09-24 12:03:32',
                'deleted_at' => NULL,
            ),
        ));
        \DB::table('posts')->insert(array (
            0 => 
            array (
                'id' => 75,
                'doctor_id' => NULL,
                'clinic_id' => 30,
                'blog_category_id' => 2,
                'name' => '{"en":"MedGadget","hi":"पारिस्थितिकी","ar":"علم البيئة"}',
                'description' => '{"en":"<p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Praesent facilisis ante ut purus eleifend vehicula. Cras vel diam elit. Nullam scelerisque, nisi sed dignissim vehicula, sapien lacus fringilla urna, at rhoncus ex lorem vitae magna. Nam fermentum, purus sed consequat vulputate, lorem sapien dictum lorem, vitae euismod augue risus non mi. In hac habitasse platea dictumst. Donec a orci mauris. Pellentesque nec sem libero. Vestibulum fringilla neque ut est efficitur aliquet. Nulla facilisi. Fusce et ligula vitae lorem cursus aliquam. Aliquam a erat a mi bibendum molestie. Phasellus ut ex a justo dignissim scelerisque sit amet sed libero. Duis egestas, mi non dapibus hendrerit, libero nunc tincidunt orci, in dignissim ex mi a augue. Donec sed nulla in elit gravida venenatis et non augue. Pellentesque et libero quis lorem convallis viverra. Etiam fermentum sapien turpis, vel posuere velit varius ut.</p>","hi":"<p>लोरेम इप्सम डोलर सिट अमेट, कॉन्सेकट्यूर एडिपिसिंग एलीट. प्रेज़ेंट फसिलिसिस अंते उत पुरुस एलीफेंड व्हीकुला. क्रास वेल डायम एलीट. नुल्लम स्केलरिस्क, निसी सेड डिग्निस्सिम व्हीकुला, सैपियन लकुस फ्रिंजिल्ला उरना, एट रोंकस एक्स लोरेम विटे माग्ना. नाम फेर्मेंटुम, पुरुस सेड कंसक्वाट वुल्पुटेट, लोरेम सैपियन डिक्टम लोरेम, विटे एयूसमोड औगुए रीसस नॉन मी. इन हक हबितास्से प्लाटेआ डिक्टुमस्ट. डोनेक अ ओर्की मौरिस. पेल्लेंटेस्के नेक सेम लिबरो. वेस्टिबुलम फ्रिंजिल्ला नेकुए उत एस्ट एफिकितुर अलिक्वेट. नुल्ला फासिलिसि. फ्यूस्के एट लिगुला विटे लोरेम कर्सस अलिक्वाम. आलिक्वाम अ एराट अ मि बिबेंडम मोलस्टिये. फासेल्लस उत एक्स अ जस्टो डिग्निस्सिम स्केलरिस्क सिट अमेट सेड लिबरो. डुइस एगेस्टास, मि नॉन डापिबुस हेंड्रेरिट, लिबरो नुंक टिन्सीडुंट ऑर्की, इन डिग्निस्सिम एक्स मि अ औगुए. डोनेक सेड नुल्ला इन एलीट ग्राविडा विनेनेटिस एट नॉन औगुए.</p>","ar":"<p>لوريم إيبسوم دولور سيت أميت، كونسكتتور أديبيسينغ إليت. بريسنت فاسيليسيس أنتي أوت بوروس إليفند فيكولا. كراس فيل ديام إليت. نولام سكيلريسكي، نيسي سيد ديغنيسيم فيكولا، سابين لاكوس فرنجيلا أورنا، أت رونكوس إكس لوريم فيتاي ماجنا. نام فيرمينتوم، بوروس سيد كونسكووت فولووتات، لوريم سابين ديكتوم لوريم، فيتاي إويسمود أوغي ريسوس نون مي. إن هاك هابيتاس بلاتيا ديكتومست. دونيك أ أوركي موريس. بيلينتسكي نيك سيم ليبيرو. فيستيبيولوم فرنجيلا نيكوي أوت إيست إفيكيتور أليكويت. نولا فاسيليسي. فوسكي إت ليجولا فيتاي لوريم كورسوس أليكوام. أليكوام أ إيرات أ مي بيبندم مولستيي. فاسيليس أوت إكس أ جوستو ديغنيسيم سكيلريسكي سيت أميت سيد ليبيرو. دويس إيغيتاس، مي نون دابيبوس هندريريت، ليبيرو ننك تنسيدونت أوركي، إن ديغنيسيم إكس مي أ أوغ</p>"}',
                'slug' => 'medgadget-75',
                'is_active' => 1,
                'is_featured' => 0,
                'image' => '/images/clinic_posts/66f2646c332a3.png',
                'created_at' => '2024-09-24 12:04:12',
                'updated_at' => '2024-09-24 12:04:12',
                'deleted_at' => NULL,
            ),
        ));
        \DB::table('posts')->insert(array (
            0 => 
            array (
                'id' => 76,
                'doctor_id' => 83,
                'clinic_id' => NULL,
                'blog_category_id' => 2,
                'name' => '{"en":"fd","hi":"dfgd","ar":"dgfgdf"}',
                'description' => '{"en":"erfdg","hi":"fgdf","ar":"gdfgdf"}',
                'slug' => 'fd-76',
                'is_active' => 1,
                'is_featured' => 0,
                'image' => '/images/doctor_posts/66f513e80711a.png',
                'created_at' => '2024-09-26 12:57:28',
                'updated_at' => '2024-09-26 12:57:28',
                'deleted_at' => NULL,
            ),
        ));
        
        
    }
}