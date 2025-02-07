<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;

class ArchivesTableSeeder extends Seeder
{

    /**
     * Auto generated seed file
     *
     * @return void
     */
    public function run()
    {
        

        \DB::table('archives')->delete();
        
        \DB::table('archives')->insert(array (
            0 => 
            array (
                'id' => 1,
                'doctor_id' => 1,
                'clinic_id' => NULL,
                'archive_category_id' => 1,
                'name' => '{"en":"Anatomy","hi":"औद्योगिक डिज़ाइन","ar":"التصميم الصناعي"}',
                'description' => '{"en":"<p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum. Curabitur pretium tincidunt lacus. Nulla gravida orci a odio. Nullam varius, turpis et commodo pharetra, est eros bibendum elit, nec luctus magna felis sollicitudin mauris. Integer in mauris eu nibh euismod gravida. Duis ac tellus et risus vulputate vehicula. Donec lobortis risus a elit. Etiam tempor. Ut ullamcorper, ligula eu tempor congue, eros est euismod turpis, id tincidunt sapien risus a quam. Maecenas fermentum, sem in pharetra pellentesque.</p>","hi":"<p>लोरेम इप्सम डोलर सिट अमेट, कॉन्सेक्टेचर अडिपिसिंग एलीट. सेड डो ईयूसमोड टेम्पोर इन्सीडिडुंट उत लेबोरे एट डोलोरे मैग्ना एलिक्वा. उत एनीम अद मिनिम वेनिआम, क्विस नोस्त्रुड एक्सर्सिटेशन उल्लाम्को लेबोर्स निसी उत अलीक्विप एक्स ए कोमोडो कोन्सेक्वात. डुइस औटे इरुरे डोलोर इन रेप्रिहेंडेरिट इन वोलुप्टेटे वेलिट एसे सिल्लुम डोलोरे यू फुगिअट नल्ला pariatur. एक्सेप्तेउर सिन्न्त ओककेकाट कपिडटात नोन प्रोइडेंट, सुंट इन कुल्पा क्वि ओफ्फिसिअ डेसेरुंत्त मोल्लिट एनिम इड एस्ट laborum. कुरबीतुर प्रेटियम टिंसिडुंट लाकुस. नुल्ला ग्रविधा ओर्सी अ ओडिओ. नुल्लम वारिउस, turpis एट commodo फेरेत्रा, एस्ट एरोस बिबेंदुम एलीट, नेक luctus magna felis sollicitudin mauris. इंटेगेर इन mauris यू nibh euismod gravida. डुइस अच tellus</p>","ar":"<p>لوريم ايبسوم دولار سيت أميت، كونسكتتور أديبيسشينغ إيليت. سيد دو إيوسيمود تيمبور إنسيديدونت أوت لابوري إت دولوري ماغنا أليكا. أوت إينيم أد مينيم فينيام، كويز نوسترود إكسرسيتاشيون أولامكو لابوريس نيسي أوت أليكويب إكس إيا كومودو كونسيكوات. دويس أوتي إيرور دولور إن ريبرهينديريت إن فولوبتات فيليت إيس سيليم دولور يو فوجيات نولا بارياتور. إكسسيبتور سنت أوككاكات كيوبيدتات نون برويدينت، سونت إن كولبا كي أوفيسيا ديسيريونت مولليت أنيم إد إست لابوروم. كيوريبيتور بريتيوم تينسيدونت لاكوس. نيولا غرافيدا أورسي أ أوديو. نيولام فارياس، توربيس إت كومودو فهرترا، إست إيروس بيبيندوم إيليت، نيك لوكتوس ماغنا فيليس سولليتشيتودين ماوريس. إنتيغر إن ماوريس يو نيبه إيوسيمود غرافيدا. دويس أك تيلوس إت ريزيز فلفوتا فيهيكول</p>"}',
                'slug' => 'anatomy-1',
                'is_active' => 1,
                'is_featured' => 0,
                'image' => '/images/doctor_archives/66eacc49a5922.png',
                'location' => NULL,
                'created_at' => '2024-09-18 17:49:13',
                'updated_at' => '2024-09-18 17:50:20',
                'deleted_at' => NULL,
            ),
        ));
        \DB::table('archives')->insert(array (
            0 => 
            array (
                'id' => 2,
                'doctor_id' => 1,
                'clinic_id' => NULL,
                'archive_category_id' => 2,
                'name' => '{"en":"Biochemistry","hi":"औद्योगिक डिज़ाइन","ar":"التصميم الصناعي"}',
                'description' => '{"en":"<p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum. Curabitur pretium tincidunt lacus. Nulla gravida orci a odio. Nullam varius, turpis et commodo pharetra, est eros bibendum elit, nec luctus magna felis sollicitudin mauris. Integer in mauris eu nibh euismod gravida. Duis ac tellus et risus vulputate vehicula. Donec lobortis risus a elit. Etiam tempor. Ut ullamcorper, ligula eu tempor congue, eros est euismod turpis, id tincidunt sapien risus a quam. Maecenas fermentum, sem in pharetra pellentesque.</p>","hi":"<p>लोरेम इप्सम डोलर सिट अमेट, कॉन्सेक्टेचर अडिपिसिंग एलीट. सेड डो ईयूसमोड टेम्पोर इन्सीडिडुंट उत लेबोरे एट डोलोरे मैग्ना एलिक्वा. उत एनीम अद मिनिम वेनिआम, क्विस नोस्त्रुड एक्सर्सिटेशन उल्लाम्को लेबोर्स निसी उत अलीक्विप एक्स ए कोमोडो कोन्सेक्वात. डुइस औटे इरुरे डोलोर इन रेप्रिहेंडेरिट इन वोलुप्टेटे वेलिट एसे सिल्लुम डोलोरे यू फुगिअट नल्ला pariatur. एक्सेप्तेउर सिन्न्त ओककेकाट कपिडटात नोन प्रोइडेंट, सुंट इन कुल्पा क्वि ओफ्फिसिअ डेसेरुंत्त मोल्लिट एनिम इड एस्ट laborum. कुरबीतुर प्रेटियम टिंसिडुंट लाकुस. नुल्ला ग्रविधा ओर्सी अ ओडिओ. नुल्लम वारिउस, turpis एट commodo फेरेत्रा, एस्ट एरोस बिबेंदुम एलीट, नेक luctus magna felis sollicitudin mauris. इंटेगेर इन mauris यू nibh euismod gravida. डुइस अच tellus</p>","ar":"<p>لوريم ايبسوم دولار سيت أميت، كونسكتتور أديبيسشينغ إيليت. سيد دو إيوسيمود تيمبور إنسيديدونت أوت لابوري إت دولوري ماغنا أليكا. أوت إينيم أد مينيم فينيام، كويز نوسترود إكسرسيتاشيون أولامكو لابوريس نيسي أوت أليكويب إكس إيا كومودو كونسيكوات. دويس أوتي إيرور دولور إن ريبرهينديريت إن فولوبتات فيليت إيس سيليم دولور يو فوجيات نولا بارياتور. إكسسيبتور سنت أوككاكات كيوبيدتات نون برويدينت، سونت إن كولبا كي أوفيسيا ديسيريونت مولليت أنيم إد إست لابوروم. كيوريبيتور بريتيوم تينسيدونت لاكوس. نيولا غرافيدا أورسي أ أوديو. نيولام فارياس، توربيس إت كومودو فهرترا، إست إيروس بيبيندوم إيليت، نيك لوكتوس ماغنا فيليس سولليتشيتودين ماوريس. إنتيغر إن ماوريس يو نيبه إيوسيمود غرافيدا. دويس أك تيلوس إت ريزيز فلفوتا فيهيكول</p>"}',
                'slug' => 'biochemistry-2',
                'is_active' => 1,
                'is_featured' => 0,
                'image' => '/images/doctor_archives/66eaccc8b449f.png',
                'location' => NULL,
                'created_at' => '2024-09-18 17:51:20',
                'updated_at' => '2024-09-18 17:51:20',
                'deleted_at' => NULL,
            ),
        ));
        \DB::table('archives')->insert(array (
            0 => 
            array (
                'id' => 3,
                'doctor_id' => 1,
                'clinic_id' => NULL,
                'archive_category_id' => 2,
                'name' => '{"en":"Pathology","hi":"औद्योगिक डिज़ाइन","ar":"فعالية الخطاب التعليمي"}',
                'description' => '{"en":"<p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum. Curabitur pretium tincidunt lacus. Nulla gravida orci a odio. Nullam varius, turpis et commodo pharetra, est eros bibendum elit, nec luctus magna felis sollicitudin mauris. Integer in mauris eu nibh euismod gravida. Duis ac tellus et risus vulputate vehicula. Donec lobortis risus a elit. Etiam tempor. Ut ullamcorper, ligula eu tempor congue, eros est euismod turpis, id tincidunt sapien risus a quam. Maecenas fermentum, sem in pharetra pellentesque.</p>","hi":"<p>लोरेम इप्सम डोलर सिट अमेट, कॉन्सेक्टेचर अडिपिसिंग एलीट. सेड डो ईयूसमोड टेम्पोर इन्सीडिडुंट उत लेबोरे एट डोलोरे मैग्ना एलिक्वा. उत एनीम अद मिनिम वेनिआम, क्विस नोस्त्रुड एक्सर्सिटेशन उल्लाम्को लेबोर्स निसी उत अलीक्विप एक्स ए कोमोडो कोन्सेक्वात. डुइस औटे इरुरे डोलोर इन रेप्रिहेंडेरिट इन वोलुप्टेटे वेलिट एसे सिल्लुम डोलोरे यू फुगिअट नल्ला pariatur. एक्सेप्तेउर सिन्न्त ओककेकाट कपिडटात नोन प्रोइडेंट, सुंट इन कुल्पा क्वि ओफ्फिसिअ डेसेरुंत्त मोल्लिट एनिम इड एस्ट laborum. कुरबीतुर प्रेटियम टिंसिडुंट लाकुस. नुल्ला ग्रविधा ओर्सी अ ओडिओ. नुल्लम वारिउस, turpis एट commodo फेरेत्रा, एस्ट एरोस बिबेंदुम एलीट, नेक luctus magna felis sollicitudin mauris. इंटेगेर इन mauris यू nibh euismod gravida. डुइस अच tellus</p>","ar":"<p>لوريم ايبسوم دولار سيت أميت، كونسكتتور أديبيسشينغ إيليت. سيد دو إيوسيمود تيمبور إنسيديدونت أوت لابوري إت دولوري ماغنا أليكا. أوت إينيم أد مينيم فينيام، كويز نوسترود إكسرسيتاشيون أولامكو لابوريس نيسي أوت أليكويب إكس إيا كومودو كونسيكوات. دويس أوتي إيرور دولور إن ريبرهينديريت إن فولوبتات فيليت إيس سيليم دولور يو فوجيات نولا بارياتور. إكسسيبتور سنت أوككاكات كيوبيدتات نون برويدينت، سونت إن كولبا كي أوفيسيا ديسيريونت مولليت أنيم إد إست لابوروم. كيوريبيتور بريتيوم تينسيدونت لاكوس. نيولا غرافيدا أورسي أ أوديو. نيولام فارياس، توربيس إت كومودو فهرترا، إست إيروس بيبيندوم إيليت، نيك لوكتوس ماغنا فيليس سولليتشيتودين ماوريس. إنتيغر إن ماوريس يو نيبه إيوسيمود غرافيدا. دويس أك تيلوس إت ريزيز فلفوتا فيهيكول</p>"}',
                'slug' => 'pathology-3',
                'is_active' => 1,
                'is_featured' => 0,
                'image' => '/images/doctor_archives/66eacd529be31.png',
                'location' => NULL,
                'created_at' => '2024-09-18 17:53:38',
                'updated_at' => '2024-09-18 17:53:38',
                'deleted_at' => NULL,
            ),
        ));
        \DB::table('archives')->insert(array (
            0 => 
            array (
                'id' => 4,
                'doctor_id' => 60,
                'clinic_id' => NULL,
                'archive_category_id' => 2,
                'name' => '{"en":"Pharmacology","hi":"औद्योगिक डिज़ाइन","ar":"الذكاء الاصطناعي"}',
                'description' => '{"en":"<p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum. Curabitur pretium tincidunt lacus. Nulla gravida orci a odio. Nullam varius, turpis et commodo pharetra, est eros bibendum elit, nec luctus magna felis sollicitudin mauris. Integer in mauris eu nibh euismod gravida. Duis ac tellus et risus vulputate vehicula. Donec lobortis risus a elit. Etiam tempor. Ut ullamcorper, ligula eu tempor congue, eros est euismod turpis, id tincidunt sapien risus a quam. Maecenas fermentum, sem in pharetra pellentesque.</p>","hi":"<p>लोरेम इप्सम डोलर सिट अमेट, कॉन्सेक्टेचर अडिपिसिंग एलीट. सेड डो ईयूसमोड टेम्पोर इन्सीडिडुंट उत लेबोरे एट डोलोरे मैग्ना एलिक्वा. उत एनीम अद मिनिम वेनिआम, क्विस नोस्त्रुड एक्सर्सिटेशन उल्लाम्को लेबोर्स निसी उत अलीक्विप एक्स ए कोमोडो कोन्सेक्वात. डुइस औटे इरुरे डोलोर इन रेप्रिहेंडेरिट इन वोलुप्टेटे वेलिट एसे सिल्लुम डोलोरे यू फुगिअट नल्ला pariatur. एक्सेप्तेउर सिन्न्त ओककेकाट कपिडटात नोन प्रोइडेंट, सुंट इन कुल्पा क्वि ओफ्फिसिअ डेसेरुंत्त मोल्लिट एनिम इड एस्ट laborum. कुरबीतुर प्रेटियम टिंसिडुंट लाकुस. नुल्ला ग्रविधा ओर्सी अ ओडिओ. नुल्लम वारिउस, turpis एट commodo फेरेत्रा, एस्ट एरोस बिबेंदुम एलीट, नेक luctus magna felis sollicitudin mauris. इंटेगेर इन mauris यू nibh euismod gravida. डुइस अच tellus</p>","ar":"<p>لوريم ايبسوم دولار سيت أميت، كونسكتتور أديبيسشينغ إيليت. سيد دو إيوسيمود تيمبور إنسيديدونت أوت لابوري إت دولوري ماغنا أليكا. أوت إينيم أد مينيم فينيام، كويز نوسترود إكسرسيتاشيون أولامكو لابوريس نيسي أوت أليكويب إكس إيا كومودو كونسيكوات. دويس أوتي إيرور دولور إن ريبرهينديريت إن فولوبتات فيليت إيس سيليم دولور يو فوجيات نولا بارياتور. إكسسيبتور سنت أوككاكات كيوبيدتات نون برويدينت، سونت إن كولبا كي أوفيسيا ديسيريونت مولليت أنيم إد إست لابوروم. كيوريبيتور بريتيوم تينسيدونت لاكوس. نيولا غرافيدا أورسي أ أوديو. نيولام فارياس، توربيس إت كومودو فهرترا، إست إيروس بيبيندوم إيليت، نيك لوكتوس ماغنا فيليس سولليتشيتودين ماوريس. إنتيغر إن ماوريس يو نيبه إيوسيمود غرافيدا. دويس أك تيلوس إت ريزيز فلفوتا فيهيكول</p>"}',
                'slug' => 'pharmacology-4',
                'is_active' => 1,
                'is_featured' => 0,
                'image' => '/images/doctor_archives/66eacdf1e8244.png',
                'location' => NULL,
                'created_at' => '2024-09-18 17:56:17',
                'updated_at' => '2024-09-18 17:56:17',
                'deleted_at' => NULL,
            ),
        ));
        \DB::table('archives')->insert(array (
            0 => 
            array (
                'id' => 5,
                'doctor_id' => 60,
                'clinic_id' => NULL,
                'archive_category_id' => 2,
                'name' => '{"en":"Forensic Medicine","hi":"शैक्षिक भाषण समारोह","ar":"مسابقة معلومات"}',
                'description' => '{"en":"<p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum. Curabitur pretium tincidunt lacus. Nulla gravida orci a odio. Nullam varius, turpis et commodo pharetra, est eros bibendum elit, nec luctus magna felis sollicitudin mauris. Integer in mauris eu nibh euismod gravida. Duis ac tellus et risus vulputate vehicula. Donec lobortis risus a elit. Etiam tempor. Ut ullamcorper, ligula eu tempor congue, eros est euismod turpis, id tincidunt sapien risus a quam. Maecenas fermentum, sem in pharetra pellentesque.</p>","hi":"<p>लोरेम इप्सम डोलर सिट अमेट, कॉन्सेक्टेचर अडिपिसिंग एलीट. सेड डो ईयूसमोड टेम्पोर इन्सीडिडुंट उत लेबोरे एट डोलोरे मैग्ना एलिक्वा. उत एनीम अद मिनिम वेनिआम, क्विस नोस्त्रुड एक्सर्सिटेशन उल्लाम्को लेबोर्स निसी उत अलीक्विप एक्स ए कोमोडो कोन्सेक्वात. डुइस औटे इरुरे डोलोर इन रेप्रिहेंडेरिट इन वोलुप्टेटे वेलिट एसे सिल्लुम डोलोरे यू फुगिअट नल्ला pariatur. एक्सेप्तेउर सिन्न्त ओककेकाट कपिडटात नोन प्रोइडेंट, सुंट इन कुल्पा क्वि ओफ्फिसिअ डेसेरुंत्त मोल्लिट एनिम इड एस्ट laborum. कुरबीतुर प्रेटियम टिंसिडुंट लाकुस. नुल्ला ग्रविधा ओर्सी अ ओडिओ. नुल्लम वारिउस, turpis एट commodo फेरेत्रा, एस्ट एरोस बिबेंदुम एलीट, नेक luctus magna felis sollicitudin mauris. इंटेगेर इन mauris यू nibh euismod gravida. डुइस अच tellus</p>","ar":"<p>لوريم ايبسوم دولار سيت أميت، كونسكتتور أديبيسشينغ إيليت. سيد دو إيوسيمود تيمبور إنسيديدونت أوت لابوري إت دولوري ماغنا أليكا. أوت إينيم أد مينيم فينيام، كويز نوسترود إكسرسيتاشيون أولامكو لابوريس نيسي أوت أليكويب إكس إيا كومودو كونسيكوات. دويس أوتي إيرور دولور إن ريبرهينديريت إن فولوبتات فيليت إيس سيليم دولور يو فوجيات نولا بارياتور. إكسسيبتور سنت أوككاكات كيوبيدتات نون برويدينت، سونت إن كولبا كي أوفيسيا ديسيريونت مولليت أنيم إد إست لابوروم. كيوريبيتور بريتيوم تينسيدونت لاكوس. نيولا غرافيدا أورسي أ أوديو. نيولام فارياس، توربيس إت كومودو فهرترا، إست إيروس بيبيندوم إيليت، نيك لوكتوس ماغنا فيليس سولليتشيتودين ماوريس. إنتيغر إن ماوريس يو نيبه إيوسيمود غرافيدا. دويس أك تيلوس إت ريزيز فلفوتا فيهيكول</p>"}',
                'slug' => 'forensic-medicine-5',
                'is_active' => 1,
                'is_featured' => 0,
                'image' => '/images/doctor_archives/66eace52981e6.png',
                'location' => NULL,
                'created_at' => '2024-09-18 17:57:54',
                'updated_at' => '2024-09-18 17:57:54',
                'deleted_at' => NULL,
            ),
        ));
        \DB::table('archives')->insert(array (
            0 => 
            array (
                'id' => 6,
                'doctor_id' => 60,
                'clinic_id' => NULL,
                'archive_category_id' => 2,
                'name' => '{"en":"General Surgery","hi":"शैक्षिक भाषण समारोह","ar":"علم البيئة"}',
                'description' => '{"en":"<p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum. Curabitur pretium tincidunt lacus. Nulla gravida orci a odio. Nullam varius, turpis et commodo pharetra, est eros bibendum elit, nec luctus magna felis sollicitudin mauris. Integer in mauris eu nibh euismod gravida. Duis ac tellus et risus vulputate vehicula. Donec lobortis risus a elit. Etiam tempor. Ut ullamcorper, ligula eu tempor congue, eros est euismod turpis, id tincidunt sapien risus a quam. Maecenas fermentum, sem in pharetra pellentesque.</p>","hi":"<p>लोरेम इप्सम डोलर सिट अमेट, कॉन्सेक्टेचर अडिपिसिंग एलीट. सेड डो ईयूसमोड टेम्पोर इन्सीडिडुंट उत लेबोरे एट डोलोरे मैग्ना एलिक्वा. उत एनीम अद मिनिम वेनिआम, क्विस नोस्त्रुड एक्सर्सिटेशन उल्लाम्को लेबोर्स निसी उत अलीक्विप एक्स ए कोमोडो कोन्सेक्वात. डुइस औटे इरुरे डोलोर इन रेप्रिहेंडेरिट इन वोलुप्टेटे वेलिट एसे सिल्लुम डोलोरे यू फुगिअट नल्ला pariatur. एक्सेप्तेउर सिन्न्त ओककेकाट कपिडटात नोन प्रोइडेंट, सुंट इन कुल्पा क्वि ओफ्फिसिअ डेसेरुंत्त मोल्लिट एनिम इड एस्ट laborum. कुरबीतुर प्रेटियम टिंसिडुंट लाकुस. नुल्ला ग्रविधा ओर्सी अ ओडिओ. नुल्लम वारिउस, turpis एट commodo फेरेत्रा, एस्ट एरोस बिबेंदुम एलीट, नेक luctus magna felis sollicitudin mauris. इंटेगेर इन mauris यू nibh euismod gravida. डुइस अच tellus</p>","ar":"<p>لوريم ايبسوم دولار سيت أميت، كونسكتتور أديبيسشينغ إيليت. سيد دو إيوسيمود تيمبور إنسيديدونت أوت لابوري إت دولوري ماغنا أليكا. أوت إينيم أد مينيم فينيام، كويز نوسترود إكسرسيتاشيون أولامكو لابوريس نيسي أوت أليكويب إكس إيا كومودو كونسيكوات. دويس أوتي إيرور دولور إن ريبرهينديريت إن فولوبتات فيليت إيس سيليم دولور يو فوجيات نولا بارياتور. إكسسيبتور سنت أوككاكات كيوبيدتات نون برويدينت، سونت إن كولبا كي أوفيسيا ديسيريونت مولليت أنيم إد إست لابوروم. كيوريبيتور بريتيوم تينسيدونت لاكوس. نيولا غرافيدا أورسي أ أوديو. نيولام فارياس، توربيس إت كومودو فهرترا، إست إيروس بيبيندوم إيليت، نيك لوكتوس ماغنا فيليس سولليتشيتودين ماوريس. إنتيغر إن ماوريس يو نيبه إيوسيمود غرافيدا. دويس أك تيلوس إت ريزيز فلفوتا فيهيكول</p>"}',
                'slug' => 'general-surgery-6',
                'is_active' => 1,
                'is_featured' => 0,
                'image' => '/images/doctor_archives/66eaceb380f92.png',
                'location' => NULL,
                'created_at' => '2024-09-18 17:59:31',
                'updated_at' => '2024-09-18 17:59:31',
                'deleted_at' => NULL,
            ),
        ));
        \DB::table('archives')->insert(array (
            0 => 
            array (
                'id' => 7,
                'doctor_id' => 62,
                'clinic_id' => NULL,
                'archive_category_id' => 1,
                'name' => '{"en":"Ophthalmology","hi":"क्विज़ प्रतियोगिता","ar":"التصميم الصناعي"}',
                'description' => '{"en":"<p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum. Curabitur pretium tincidunt lacus. Nulla gravida orci a odio. Nullam varius, turpis et commodo pharetra, est eros bibendum elit, nec luctus magna felis sollicitudin mauris. Integer in mauris eu nibh euismod gravida. Duis ac tellus et risus vulputate vehicula. Donec lobortis risus a elit. Etiam tempor. Ut ullamcorper, ligula eu tempor congue, eros est euismod turpis, id tincidunt sapien risus a quam. Maecenas fermentum, sem in pharetra pellentesque.</p>","hi":"<p>लोरेम इप्सम डोलर सिट अमेट, कॉन्सेक्टेचर अडिपिसिंग एलीट. सेड डो ईयूसमोड टेम्पोर इन्सीडिडुंट उत लेबोरे एट डोलोरे मैग्ना एलिक्वा. उत एनीम अद मिनिम वेनिआम, क्विस नोस्त्रुड एक्सर्सिटेशन उल्लाम्को लेबोर्स निसी उत अलीक्विप एक्स ए कोमोडो कोन्सेक्वात. डुइस औटे इरुरे डोलोर इन रेप्रिहेंडेरिट इन वोलुप्टेटे वेलिट एसे सिल्लुम डोलोरे यू फुगिअट नल्ला pariatur. एक्सेप्तेउर सिन्न्त ओककेकाट कपिडटात नोन प्रोइडेंट, सुंट इन कुल्पा क्वि ओफ्फिसिअ डेसेरुंत्त मोल्लिट एनिम इड एस्ट laborum. कुरबीतुर प्रेटियम टिंसिडुंट लाकुस. नुल्ला ग्रविधा ओर्सी अ ओडिओ. नुल्लम वारिउस, turpis एट commodo फेरेत्रा, एस्ट एरोस बिबेंदुम एलीट, नेक luctus magna felis sollicitudin mauris. इंटेगेर इन mauris यू nibh euismod gravida. डुइस अच tellus</p>","ar":"<p>لوريم ايبسوم دولار سيت أميت، كونسكتتور أديبيسشينغ إيليت. سيد دو إيوسيمود تيمبور إنسيديدونت أوت لابوري إت دولوري ماغنا أليكا. أوت إينيم أد مينيم فينيام، كويز نوسترود إكسرسيتاشيون أولامكو لابوريس نيسي أوت أليكويب إكس إيا كومودو كونسيكوات. دويس أوتي إيرور دولور إن ريبرهينديريت إن فولوبتات فيليت إيس سيليم دولور يو فوجيات نولا بارياتور. إكسسيبتور سنت أوككاكات كيوبيدتات نون برويدينت، سونت إن كولبا كي أوفيسيا ديسيريونت مولليت أنيم إد إست لابوروم. كيوريبيتور بريتيوم تينسيدونت لاكوس. نيولا غرافيدا أورسي أ أوديو. نيولام فارياس، توربيس إت كومودو فهرترا، إست إيروس بيبيندوم إيليت، نيك لوكتوس ماغنا فيليس سولليتشيتودين ماوريس. إنتيغر إن ماوريس يو نيبه إيوسيمود غرافيدا. دويس أك تيلوس إت ريزيز فلفوتا فيهيكول</p>"}',
                'slug' => 'ophthalmology-7',
                'is_active' => 1,
                'is_featured' => 0,
                'image' => '/images/doctor_archives/66eacf1272235.png',
                'location' => NULL,
                'created_at' => '2024-09-18 18:01:06',
                'updated_at' => '2024-09-18 18:01:06',
                'deleted_at' => NULL,
            ),
        ));
        \DB::table('archives')->insert(array (
            0 => 
            array (
                'id' => 8,
                'doctor_id' => 62,
                'clinic_id' => NULL,
                'archive_category_id' => 2,
                'name' => '{"en":"Dermatology","hi":"क्विज़ प्रतियोगिता","ar":"التصميم الصناعي"}',
                'description' => '{"en":"<p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum. Curabitur pretium tincidunt lacus. Nulla gravida orci a odio. Nullam varius, turpis et commodo pharetra, est eros bibendum elit, nec luctus magna felis sollicitudin mauris. Integer in mauris eu nibh euismod gravida. Duis ac tellus et risus vulputate vehicula. Donec lobortis risus a elit. Etiam tempor. Ut ullamcorper, ligula eu tempor congue, eros est euismod turpis, id tincidunt sapien risus a quam. Maecenas fermentum, sem in pharetra pellentesque.</p>","hi":"<p>लोरेम इप्सम डोलर सिट अमेट, कॉन्सेक्टेचर अडिपिसिंग एलीट. सेड डो ईयूसमोड टेम्पोर इन्सीडिडुंट उत लेबोरे एट डोलोरे मैग्ना एलिक्वा. उत एनीम अद मिनिम वेनिआम, क्विस नोस्त्रुड एक्सर्सिटेशन उल्लाम्को लेबोर्स निसी उत अलीक्विप एक्स ए कोमोडो कोन्सेक्वात. डुइस औटे इरुरे डोलोर इन रेप्रिहेंडेरिट इन वोलुप्टेटे वेलिट एसे सिल्लुम डोलोरे यू फुगिअट नल्ला pariatur. एक्सेप्तेउर सिन्न्त ओककेकाट कपिडटात नोन प्रोइडेंट, सुंट इन कुल्पा क्वि ओफ्फिसिअ डेसेरुंत्त मोल्लिट एनिम इड एस्ट laborum. कुरबीतुर प्रेटियम टिंसिडुंट लाकुस. नुल्ला ग्रविधा ओर्सी अ ओडिओ. नुल्लम वारिउस, turpis एट commodo फेरेत्रा, एस्ट एरोस बिबेंदुम एलीट, नेक luctus magna felis sollicitudin mauris. इंटेगेर इन mauris यू nibh euismod gravida. डुइस अच tellus</p>","ar":"<p>لوريم ايبسوم دولار سيت أميت، كونسكتتور أديبيسشينغ إيليت. سيد دو إيوسيمود تيمبور إنسيديدونت أوت لابوري إت دولوري ماغنا أليكا. أوت إينيم أد مينيم فينيام، كويز نوسترود إكسرسيتاشيون أولامكو لابوريس نيسي أوت أليكويب إكس إيا كومودو كونسيكوات. دويس أوتي إيرور دولور إن ريبرهينديريت إن فولوبتات فيليت إيس سيليم دولور يو فوجيات نولا بارياتور. إكسسيبتور سنت أوككاكات كيوبيدتات نون برويدينت، سونت إن كولبا كي أوفيسيا ديسيريونت مولليت أنيم إد إست لابوروم. كيوريبيتور بريتيوم تينسيدونت لاكوس. نيولا غرافيدا أورسي أ أوديو. نيولام فارياس، توربيس إت كومودو فهرترا، إست إيروس بيبيندوم إيليت، نيك لوكتوس ماغنا فيليس سولليتشيتودين ماوريس. إنتيغر إن ماوريس يو نيبه إيوسيمود غرافيدا. دويس أك تيلوس إت ريزيز فلفوتا فيهيكول</p>"}',
                'slug' => 'dermatology-8',
                'is_active' => 1,
                'is_featured' => 0,
                'image' => '/images/doctor_archives/66eacf5ec67be.png',
                'location' => NULL,
                'created_at' => '2024-09-18 18:02:22',
                'updated_at' => '2024-09-18 18:02:22',
                'deleted_at' => NULL,
            ),
        ));
        \DB::table('archives')->insert(array (
            0 => 
            array (
                'id' => 9,
                'doctor_id' => 62,
                'clinic_id' => NULL,
                'archive_category_id' => 1,
                'name' => '{"en":"Anesthesiology","hi":"सामान्य बुद्धि शिक्षा ब्लॉग","ar":"علم البيئة"}',
                'description' => '{"en":"<p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum. Curabitur pretium tincidunt lacus. Nulla gravida orci a odio. Nullam varius, turpis et commodo pharetra, est eros bibendum elit, nec luctus magna felis sollicitudin mauris. Integer in mauris eu nibh euismod gravida. Duis ac tellus et risus vulputate vehicula. Donec lobortis risus a elit. Etiam tempor. Ut ullamcorper, ligula eu tempor congue, eros est euismod turpis, id tincidunt sapien risus a quam. Maecenas fermentum, sem in pharetra pellentesque.</p>","hi":"<p>लोरेम इप्सम डोलर सिट अमेट, कॉन्सेक्टेचर अडिपिसिंग एलीट. सेड डो ईयूसमोड टेम्पोर इन्सीडिडुंट उत लेबोरे एट डोलोरे मैग्ना एलिक्वा. उत एनीम अद मिनिम वेनिआम, क्विस नोस्त्रुड एक्सर्सिटेशन उल्लाम्को लेबोर्स निसी उत अलीक्विप एक्स ए कोमोडो कोन्सेक्वात. डुइस औटे इरुरे डोलोर इन रेप्रिहेंडेरिट इन वोलुप्टेटे वेलिट एसे सिल्लुम डोलोरे यू फुगिअट नल्ला pariatur. एक्सेप्तेउर सिन्न्त ओककेकाट कपिडटात नोन प्रोइडेंट, सुंट इन कुल्पा क्वि ओफ्फिसिअ डेसेरुंत्त मोल्लिट एनिम इड एस्ट laborum. कुरबीतुर प्रेटियम टिंसिडुंट लाकुस. नुल्ला ग्रविधा ओर्सी अ ओडिओ. नुल्लम वारिउस, turpis एट commodo फेरेत्रा, एस्ट एरोस बिबेंदुम एलीट, नेक luctus magna felis sollicitudin mauris. इंटेगेर इन mauris यू nibh euismod gravida. डुइस अच tellus</p>","ar":"<p>لوريم ايبسوم دولار سيت أميت، كونسكتتور أديبيسشينغ إيليت. سيد دو إيوسيمود تيمبور إنسيديدونت أوت لابوري إت دولوري ماغنا أليكا. أوت إينيم أد مينيم فينيام، كويز نوسترود إكسرسيتاشيون أولامكو لابوريس نيسي أوت أليكويب إكس إيا كومودو كونسيكوات. دويس أوتي إيرور دولور إن ريبرهينديريت إن فولوبتات فيليت إيس سيليم دولور يو فوجيات نولا بارياتور. إكسسيبتور سنت أوككاكات كيوبيدتات نون برويدينت، سونت إن كولبا كي أوفيسيا ديسيريونت مولليت أنيم إد إست لابوروم. كيوريبيتور بريتيوم تينسيدونت لاكوس. نيولا غرافيدا أورسي أ أوديو. نيولام فارياس، توربيس إت كومودو فهرترا، إست إيروس بيبيندوم إيليت، نيك لوكتوس ماغنا فيليس سولليتشيتودين ماوريس. إنتيغر إن ماوريس يو نيبه إيوسيمود غرافيدا. دويس أك تيلوس إت ريزيز فلفوتا فيهيكول</p>"}',
                'slug' => 'anesthesiology-9',
                'is_active' => 1,
                'is_featured' => 0,
                'image' => '/images/doctor_archives/66eacf9fd1eca.png',
                'location' => NULL,
                'created_at' => '2024-09-18 18:03:27',
                'updated_at' => '2024-09-18 18:03:27',
                'deleted_at' => NULL,
            ),
        ));
        \DB::table('archives')->insert(array (
            0 => 
            array (
                'id' => 10,
                'doctor_id' => 63,
                'clinic_id' => NULL,
                'archive_category_id' => 2,
                'name' => '{"en":"Endocrinology","hi":"क्विज़ प्रतियोगिता","ar":"الذكاء الاصطناعي"}',
                'description' => '{"en":"<p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum. Curabitur pretium tincidunt lacus. Nulla gravida orci a odio. Nullam varius, turpis et commodo pharetra, est eros bibendum elit, nec luctus magna felis sollicitudin mauris. Integer in mauris eu nibh euismod gravida. Duis ac tellus et risus vulputate vehicula. Donec lobortis risus a elit. Etiam tempor. Ut ullamcorper, ligula eu tempor congue, eros est euismod turpis, id tincidunt sapien risus a quam. Maecenas fermentum, sem in pharetra pellentesque.</p>","hi":"<p>लोरेम इप्सम डोलर सिट अमेट, कॉन्सेक्टेचर अडिपिसिंग एलीट. सेड डो ईयूसमोड टेम्पोर इन्सीडिडुंट उत लेबोरे एट डोलोरे मैग्ना एलिक्वा. उत एनीम अद मिनिम वेनिआम, क्विस नोस्त्रुड एक्सर्सिटेशन उल्लाम्को लेबोर्स निसी उत अलीक्विप एक्स ए कोमोडो कोन्सेक्वात. डुइस औटे इरुरे डोलोर इन रेप्रिहेंडेरिट इन वोलुप्टेटे वेलिट एसे सिल्लुम डोलोरे यू फुगिअट नल्ला pariatur. एक्सेप्तेउर सिन्न्त ओककेकाट कपिडटात नोन प्रोइडेंट, सुंट इन कुल्पा क्वि ओफ्फिसिअ डेसेरुंत्त मोल्लिट एनिम इड एस्ट laborum. कुरबीतुर प्रेटियम टिंसिडुंट लाकुस. नुल्ला ग्रविधा ओर्सी अ ओडिओ. नुल्लम वारिउस, turpis एट commodo फेरेत्रा, एस्ट एरोस बिबेंदुम एलीट, नेक luctus magna felis sollicitudin mauris. इंटेगेर इन mauris यू nibh euismod gravida. डुइस अच tellus</p>","ar":"<p>لوريم ايبسوم دولار سيت أميت، كونسكتتور أديبيسشينغ إيليت. سيد دو إيوسيمود تيمبور إنسيديدونت أوت لابوري إت دولوري ماغنا أليكا. أوت إينيم أد مينيم فينيام، كويز نوسترود إكسرسيتاشيون أولامكو لابوريس نيسي أوت أليكويب إكس إيا كومودو كونسيكوات. دويس أوتي إيرور دولور إن ريبرهينديريت إن فولوبتات فيليت إيس سيليم دولور يو فوجيات نولا بارياتور. إكسسيبتور سنت أوككاكات كيوبيدتات نون برويدينت، سونت إن كولبا كي أوفيسيا ديسيريونت مولليت أنيم إد إست لابوروم. كيوريبيتور بريتيوم تينسيدونت لاكوس. نيولا غرافيدا أورسي أ أوديو. نيولام فارياس، توربيس إت كومودو فهرترا، إست إيروس بيبيندوم إيليت، نيك لوكتوس ماغنا فيليس سولليتشيتودين ماوريس. إنتيغر إن ماوريس يو نيبه إيوسيمود غرافيدا. دويس أك تيلوس إت ريزيز فلفوتا فيهيكول</p>"}',
                'slug' => 'endocrinology-10',
                'is_active' => 1,
                'is_featured' => 0,
                'image' => '/images/doctor_archives/66ead015eb5ee.png',
                'location' => NULL,
                'created_at' => '2024-09-18 18:05:25',
                'updated_at' => '2024-09-18 18:05:25',
                'deleted_at' => NULL,
            ),
        ));
        \DB::table('archives')->insert(array (
            0 => 
            array (
                'id' => 11,
                'doctor_id' => 63,
                'clinic_id' => NULL,
                'archive_category_id' => 1,
                'name' => '{"en":"Cardiothoracic Surgery","hi":"क्विज़ प्रतियोगिता","ar":"التصميم الصناعي"}',
                'description' => '{"en":"<p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum. Curabitur pretium tincidunt lacus. Nulla gravida orci a odio. Nullam varius, turpis et commodo pharetra, est eros bibendum elit, nec luctus magna felis sollicitudin mauris. Integer in mauris eu nibh euismod gravida. Duis ac tellus et risus vulputate vehicula. Donec lobortis risus a elit. Etiam tempor. Ut ullamcorper, ligula eu tempor congue, eros est euismod turpis, id tincidunt sapien risus a quam. Maecenas fermentum, sem in pharetra pellentesque.</p>","hi":"<p>लोरेम इप्सम डोलर सिट अमेट, कॉन्सेक्टेचर अडिपिसिंग एलीट. सेड डो ईयूसमोड टेम्पोर इन्सीडिडुंट उत लेबोरे एट डोलोरे मैग्ना एलिक्वा. उत एनीम अद मिनिम वेनिआम, क्विस नोस्त्रुड एक्सर्सिटेशन उल्लाम्को लेबोर्स निसी उत अलीक्विप एक्स ए कोमोडो कोन्सेक्वात. डुइस औटे इरुरे डोलोर इन रेप्रिहेंडेरिट इन वोलुप्टेटे वेलिट एसे सिल्लुम डोलोरे यू फुगिअट नल्ला pariatur. एक्सेप्तेउर सिन्न्त ओककेकाट कपिडटात नोन प्रोइडेंट, सुंट इन कुल्पा क्वि ओफ्फिसिअ डेसेरुंत्त मोल्लिट एनिम इड एस्ट laborum. कुरबीतुर प्रेटियम टिंसिडुंट लाकुस. नुल्ला ग्रविधा ओर्सी अ ओडिओ. नुल्लम वारिउस, turpis एट commodo फेरेत्रा, एस्ट एरोस बिबेंदुम एलीट, नेक luctus magna felis sollicitudin mauris. इंटेगेर इन mauris यू nibh euismod gravida. डुइस अच tellus</p>","ar":"<p>لوريم ايبسوم دولار سيت أميت، كونسكتتور أديبيسشينغ إيليت. سيد دو إيوسيمود تيمبور إنسيديدونت أوت لابوري إت دولوري ماغنا أليكا. أوت إينيم أد مينيم فينيام، كويز نوسترود إكسرسيتاشيون أولامكو لابوريس نيسي أوت أليكويب إكس إيا كومودو كونسيكوات. دويس أوتي إيرور دولور إن ريبرهينديريت إن فولوبتات فيليت إيس سيليم دولور يو فوجيات نولا بارياتور. إكسسيبتور سنت أوككاكات كيوبيدتات نون برويدينت، سونت إن كولبا كي أوفيسيا ديسيريونت مولليت أنيم إد إست لابوروم. كيوريبيتور بريتيوم تينسيدونت لاكوس. نيولا غرافيدا أورسي أ أوديو. نيولام فارياس، توربيس إت كومودو فهرترا، إست إيروس بيبيندوم إيليت، نيك لوكتوس ماغنا فيليس سولليتشيتودين ماوريس. إنتيغر إن ماوريس يو نيبه إيوسيمود غرافيدا. دويس أك تيلوس إت ريزيز فلفوتا فيهيكول</p>"}',
                'slug' => 'cardiothoracic-surgery-11',
                'is_active' => 1,
                'is_featured' => 0,
                'image' => '/images/doctor_archives/66ead0919f4f4.png',
                'location' => NULL,
                'created_at' => '2024-09-18 18:07:29',
                'updated_at' => '2024-09-18 18:07:29',
                'deleted_at' => NULL,
            ),
        ));
        \DB::table('archives')->insert(array (
            0 => 
            array (
                'id' => 12,
                'doctor_id' => 63,
                'clinic_id' => NULL,
                'archive_category_id' => 2,
                'name' => '{"en":"Trauma Management","hi":"औद्योगिक डिज़ाइन","ar":"مسابقة معلومات"}',
                'description' => '{"en":"<p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum. Curabitur pretium tincidunt lacus. Nulla gravida orci a odio. Nullam varius, turpis et commodo pharetra, est eros bibendum elit, nec luctus magna felis sollicitudin mauris. Integer in mauris eu nibh euismod gravida. Duis ac tellus et risus vulputate vehicula. Donec lobortis risus a elit. Etiam tempor. Ut ullamcorper, ligula eu tempor congue, eros est euismod turpis, id tincidunt sapien risus a quam. Maecenas fermentum, sem in pharetra pellentesque.</p>","hi":"<p>लोरेम इप्सम डोलर सिट अमेट, कॉन्सेक्टेचर अडिपिसिंग एलीट. सेड डो ईयूसमोड टेम्पोर इन्सीडिडुंट उत लेबोरे एट डोलोरे मैग्ना एलिक्वा. उत एनीम अद मिनिम वेनिआम, क्विस नोस्त्रुड एक्सर्सिटेशन उल्लाम्को लेबोर्स निसी उत अलीक्विप एक्स ए कोमोडो कोन्सेक्वात. डुइस औटे इरुरे डोलोर इन रेप्रिहेंडेरिट इन वोलुप्टेटे वेलिट एसे सिल्लुम डोलोरे यू फुगिअट नल्ला pariatur. एक्सेप्तेउर सिन्न्त ओककेकाट कपिडटात नोन प्रोइडेंट, सुंट इन कुल्पा क्वि ओफ्फिसिअ डेसेरुंत्त मोल्लिट एनिम इड एस्ट laborum. कुरबीतुर प्रेटियम टिंसिडुंट लाकुस. नुल्ला ग्रविधा ओर्सी अ ओडिओ. नुल्लम वारिउस, turpis एट commodo फेरेत्रा, एस्ट एरोस बिबेंदुम एलीट, नेक luctus magna felis sollicitudin mauris. इंटेगेर इन mauris यू nibh euismod gravida. डुइस अच tellus</p>","ar":"<p>لوريم ايبسوم دولار سيت أميت، كونسكتتور أديبيسشينغ إيليت. سيد دو إيوسيمود تيمبور إنسيديدونت أوت لابوري إت دولوري ماغنا أليكا. أوت إينيم أد مينيم فينيام، كويز نوسترود إكسرسيتاشيون أولامكو لابوريس نيسي أوت أليكويب إكس إيا كومودو كونسيكوات. دويس أوتي إيرور دولور إن ريبرهينديريت إن فولوبتات فيليت إيس سيليم دولور يو فوجيات نولا بارياتور. إكسسيبتور سنت أوككاكات كيوبيدتات نون برويدينت، سونت إن كولبا كي أوفيسيا ديسيريونت مولليت أنيم إد إست لابوروم. كيوريبيتور بريتيوم تينسيدونت لاكوس. نيولا غرافيدا أورسي أ أوديو. نيولام فارياس، توربيس إت كومودو فهرترا، إست إيروس بيبيندوم إيليت، نيك لوكتوس ماغنا فيليس سولليتشيتودين ماوريس. إنتيغر إن ماوريس يو نيبه إيوسيمود غرافيدا. دويس أك تيلوس إت ريزيز فلفوتا فيهيكول</p>"}',
                'slug' => 'trauma-management-12',
                'is_active' => 1,
                'is_featured' => 0,
                'image' => '/images/doctor_archives/66ead0e745987.png',
                'location' => NULL,
                'created_at' => '2024-09-18 18:08:55',
                'updated_at' => '2024-09-18 18:08:55',
                'deleted_at' => NULL,
            ),
        ));
        \DB::table('archives')->insert(array (
            0 => 
            array (
                'id' => 13,
                'doctor_id' => 64,
                'clinic_id' => NULL,
                'archive_category_id' => 2,
                'name' => '{"en":"Palliative Care","hi":"क्विज़ प्रतियोगिता","ar":"التصميم الصناعي"}',
                'description' => '{"en":"<p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum. Curabitur pretium tincidunt lacus. Nulla gravida orci a odio. Nullam varius, turpis et commodo pharetra, est eros bibendum elit, nec luctus magna felis sollicitudin mauris. Integer in mauris eu nibh euismod gravida. Duis ac tellus et risus vulputate vehicula. Donec lobortis risus a elit. Etiam tempor. Ut ullamcorper, ligula eu tempor congue, eros est euismod turpis, id tincidunt sapien risus a quam. Maecenas fermentum, sem in pharetra pellentesque.</p>","hi":"<p>लोरेम इप्सम डोलर सिट अमेट, कॉन्सेक्टेचर अडिपिसिंग एलीट. सेड डो ईयूसमोड टेम्पोर इन्सीडिडुंट उत लेबोरे एट डोलोरे मैग्ना एलिक्वा. उत एनीम अद मिनिम वेनिआम, क्विस नोस्त्रुड एक्सर्सिटेशन उल्लाम्को लेबोर्स निसी उत अलीक्विप एक्स ए कोमोडो कोन्सेक्वात. डुइस औटे इरुरे डोलोर इन रेप्रिहेंडेरिट इन वोलुप्टेटे वेलिट एसे सिल्लुम डोलोरे यू फुगिअट नल्ला pariatur. एक्सेप्तेउर सिन्न्त ओककेकाट कपिडटात नोन प्रोइडेंट, सुंट इन कुल्पा क्वि ओफ्फिसिअ डेसेरुंत्त मोल्लिट एनिम इड एस्ट laborum. कुरबीतुर प्रेटियम टिंसिडुंट लाकुस. नुल्ला ग्रविधा ओर्सी अ ओडिओ. नुल्लम वारिउस, turpis एट commodo फेरेत्रा, एस्ट एरोस बिबेंदुम एलीट, नेक luctus magna felis sollicitudin mauris. इंटेगेर इन mauris यू nibh euismod gravida. डुइस अच tellus</p>","ar":"<p>لوريم ايبسوم دولار سيت أميت، كونسكتتور أديبيسشينغ إيليت. سيد دو إيوسيمود تيمبور إنسيديدونت أوت لابوري إت دولوري ماغنا أليكا. أوت إينيم أد مينيم فينيام، كويز نوسترود إكسرسيتاشيون أولامكو لابوريس نيسي أوت أليكويب إكس إيا كومودو كونسيكوات. دويس أوتي إيرور دولور إن ريبرهينديريت إن فولوبتات فيليت إيس سيليم دولور يو فوجيات نولا بارياتور. إكسسيبتور سنت أوككاكات كيوبيدتات نون برويدينت، سونت إن كولبا كي أوفيسيا ديسيريونت مولليت أنيم إد إست لابوروم. كيوريبيتور بريتيوم تينسيدونت لاكوس. نيولا غرافيدا أورسي أ أوديو. نيولام فارياس، توربيس إت كومودو فهرترا، إست إيروس بيبيندوم إيليت، نيك لوكتوس ماغنا فيليس سولليتشيتودين ماوريس. إنتيغر إن ماوريس يو نيبه إيوسيمود غرافيدا. دويس أك تيلوس إت ريزيز فلفوتا فيهيكول</p>"}',
                'slug' => 'palliative-care-13',
                'is_active' => 1,
                'is_featured' => 0,
                'image' => '/images/doctor_archives/66ead1529a8d6.png',
                'location' => NULL,
                'created_at' => '2024-09-18 18:10:42',
                'updated_at' => '2024-09-18 18:10:42',
                'deleted_at' => NULL,
            ),
        ));
        \DB::table('archives')->insert(array (
            0 => 
            array (
                'id' => 14,
                'doctor_id' => 64,
                'clinic_id' => NULL,
                'archive_category_id' => 2,
                'name' => '{"en":"Urology","hi":"पारिस्थितिकी","ar":"علم البيئة"}',
                'description' => '{"en":"<p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum. Curabitur pretium tincidunt lacus. Nulla gravida orci a odio. Nullam varius, turpis et commodo pharetra, est eros bibendum elit, nec luctus magna felis sollicitudin mauris. Integer in mauris eu nibh euismod gravida. Duis ac tellus et risus vulputate vehicula. Donec lobortis risus a elit. Etiam tempor. Ut ullamcorper, ligula eu tempor congue, eros est euismod turpis, id tincidunt sapien risus a quam. Maecenas fermentum, sem in pharetra pellentesque.</p>","hi":"<p>लोरेम इप्सम डोलर सिट अमेट, कॉन्सेक्टेचर अडिपिसिंग एलीट. सेड डो ईयूसमोड टेम्पोर इन्सीडिडुंट उत लेबोरे एट डोलोरे मैग्ना एलिक्वा. उत एनीम अद मिनिम वेनिआम, क्विस नोस्त्रुड एक्सर्सिटेशन उल्लाम्को लेबोर्स निसी उत अलीक्विप एक्स ए कोमोडो कोन्सेक्वात. डुइस औटे इरुरे डोलोर इन रेप्रिहेंडेरिट इन वोलुप्टेटे वेलिट एसे सिल्लुम डोलोरे यू फुगिअट नल्ला pariatur. एक्सेप्तेउर सिन्न्त ओककेकाट कपिडटात नोन प्रोइडेंट, सुंट इन कुल्पा क्वि ओफ्फिसिअ डेसेरुंत्त मोल्लिट एनिम इड एस्ट laborum. कुरबीतुर प्रेटियम टिंसिडुंट लाकुस. नुल्ला ग्रविधा ओर्सी अ ओडिओ. नुल्लम वारिउस, turpis एट commodo फेरेत्रा, एस्ट एरोस बिबेंदुम एलीट, नेक luctus magna felis sollicitudin mauris. इंटेगेर इन mauris यू nibh euismod gravida. डुइस अच tellus</p>","ar":"<p>لوريم ايبسوم دولار سيت أميت، كونسكتتور أديبيسشينغ إيليت. سيد دو إيوسيمود تيمبور إنسيديدونت أوت لابوري إت دولوري ماغنا أليكا. أوت إينيم أد مينيم فينيام، كويز نوسترود إكسرسيتاشيون أولامكو لابوريس نيسي أوت أليكويب إكس إيا كومودو كونسيكوات. دويس أوتي إيرور دولور إن ريبرهينديريت إن فولوبتات فيليت إيس سيليم دولور يو فوجيات نولا بارياتور. إكسسيبتور سنت أوككاكات كيوبيدتات نون برويدينت، سونت إن كولبا كي أوفيسيا ديسيريونت مولليت أنيم إد إست لابوروم. كيوريبيتور بريتيوم تينسيدونت لاكوس. نيولا غرافيدا أورسي أ أوديو. نيولام فارياس، توربيس إت كومودو فهرترا، إست إيروس بيبيندوم إيليت، نيك لوكتوس ماغنا فيليس سولليتشيتودين ماوريس. إنتيغر إن ماوريس يو نيبه إيوسيمود غرافيدا. دويس أك تيلوس إت ريزيز فلفوتا فيهيكول</p>"}',
                'slug' => 'urology-14',
                'is_active' => 1,
                'is_featured' => 0,
                'image' => '/images/doctor_archives/66ead1a68a98e.png',
                'location' => NULL,
                'created_at' => '2024-09-18 18:12:06',
                'updated_at' => '2024-09-18 18:12:06',
                'deleted_at' => NULL,
            ),
        ));
        \DB::table('archives')->insert(array (
            0 => 
            array (
                'id' => 15,
                'doctor_id' => 64,
                'clinic_id' => NULL,
                'archive_category_id' => 2,
                'name' => '{"en":"Gastroenterology","hi":"औद्योगिक डिज़ाइन","ar":"الذكاء الاصطناعي"}',
                'description' => '{"en":"<p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum. Curabitur pretium tincidunt lacus. Nulla gravida orci a odio. Nullam varius, turpis et commodo pharetra, est eros bibendum elit, nec luctus magna felis sollicitudin mauris. Integer in mauris eu nibh euismod gravida. Duis ac tellus et risus vulputate vehicula. Donec lobortis risus a elit. Etiam tempor. Ut ullamcorper, ligula eu tempor congue, eros est euismod turpis, id tincidunt sapien risus a quam. Maecenas fermentum, sem in pharetra pellentesque.</p>","hi":"<p>लोरेम इप्सम डोलर सिट अमेट, कॉन्सेक्टेचर अडिपिसिंग एलीट. सेड डो ईयूसमोड टेम्पोर इन्सीडिडुंट उत लेबोरे एट डोलोरे मैग्ना एलिक्वा. उत एनीम अद मिनिम वेनिआम, क्विस नोस्त्रुड एक्सर्सिटेशन उल्लाम्को लेबोर्स निसी उत अलीक्विप एक्स ए कोमोडो कोन्सेक्वात. डुइस औटे इरुरे डोलोर इन रेप्रिहेंडेरिट इन वोलुप्टेटे वेलिट एसे सिल्लुम डोलोरे यू फुगिअट नल्ला pariatur. एक्सेप्तेउर सिन्न्त ओककेकाट कपिडटात नोन प्रोइडेंट, सुंट इन कुल्पा क्वि ओफ्फिसिअ डेसेरुंत्त मोल्लिट एनिम इड एस्ट laborum. कुरबीतुर प्रेटियम टिंसिडुंट लाकुस. नुल्ला ग्रविधा ओर्सी अ ओडिओ. नुल्लम वारिउस, turpis एट commodo फेरेत्रा, एस्ट एरोस बिबेंदुम एलीट, नेक luctus magna felis sollicitudin mauris. इंटेगेर इन mauris यू nibh euismod gravida. डुइस अच tellus</p>","ar":"<p>لوريم ايبسوم دولار سيت أميت، كونسكتتور أديبيسشينغ إيليت. سيد دو إيوسيمود تيمبور إنسيديدونت أوت لابوري إت دولوري ماغنا أليكا. أوت إينيم أد مينيم فينيام، كويز نوسترود إكسرسيتاشيون أولامكو لابوريس نيسي أوت أليكويب إكس إيا كومودو كونسيكوات. دويس أوتي إيرور دولور إن ريبرهينديريت إن فولوبتات فيليت إيس سيليم دولور يو فوجيات نولا بارياتور. إكسسيبتور سنت أوككاكات كيوبيدتات نون برويدينت، سونت إن كولبا كي أوفيسيا ديسيريونت مولليت أنيم إد إست لابوروم. كيوريبيتور بريتيوم تينسيدونت لاكوس. نيولا غرافيدا أورسي أ أوديو. نيولام فارياس، توربيس إت كومودو فهرترا، إست إيروس بيبيندوم إيليت، نيك لوكتوس ماغنا فيليس سولليتشيتودين ماوريس. إنتيغر إن ماوريس يو نيبه إيوسيمود غرافيدا. دويس أك تيلوس إت ريزيز فلفوتا فيهيكول</p>"}',
                'slug' => 'gastroenterology-15',
                'is_active' => 1,
                'is_featured' => 0,
                'image' => '/images/doctor_archives/66ead1fc1e110.png',
                'location' => NULL,
                'created_at' => '2024-09-18 18:13:32',
                'updated_at' => '2024-09-18 18:13:32',
                'deleted_at' => NULL,
            ),
        ));
        \DB::table('archives')->insert(array (
            0 => 
            array (
                'id' => 16,
                'doctor_id' => 65,
                'clinic_id' => NULL,
                'archive_category_id' => 1,
                'name' => '{"en":"Anatomy","hi":"क्विज़ प्रतियोगिता","ar":"مسابقة معلومات"}',
                'description' => '{"en":"<p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum. Curabitur pretium tincidunt lacus. Nulla gravida orci a odio. Nullam varius, turpis et commodo pharetra, est eros bibendum elit, nec luctus magna felis sollicitudin mauris. Integer in mauris eu nibh euismod gravida. Duis ac tellus et risus vulputate vehicula. Donec lobortis risus a elit. Etiam tempor. Ut ullamcorper, ligula eu tempor congue, eros est euismod turpis, id tincidunt sapien risus a quam. Maecenas fermentum, sem in pharetra pellentesque.</p>","hi":"<p>लोरेम इप्सम डोलर सिट अमेट, कॉन्सेक्टेचर अडिपिसिंग एलीट. सेड डो ईयूसमोड टेम्पोर इन्सीडिडुंट उत लेबोरे एट डोलोरे मैग्ना एलिक्वा. उत एनीम अद मिनिम वेनिआम, क्विस नोस्त्रुड एक्सर्सिटेशन उल्लाम्को लेबोर्स निसी उत अलीक्विप एक्स ए कोमोडो कोन्सेक्वात. डुइस औटे इरुरे डोलोर इन रेप्रिहेंडेरिट इन वोलुप्टेटे वेलिट एसे सिल्लुम डोलोरे यू फुगिअट नल्ला pariatur. एक्सेप्तेउर सिन्न्त ओककेकाट कपिडटात नोन प्रोइडेंट, सुंट इन कुल्पा क्वि ओफ्फिसिअ डेसेरुंत्त मोल्लिट एनिम इड एस्ट laborum. कुरबीतुर प्रेटियम टिंसिडुंट लाकुस. नुल्ला ग्रविधा ओर्सी अ ओडिओ. नुल्लम वारिउस, turpis एट commodo फेरेत्रा, एस्ट एरोस बिबेंदुम एलीट, नेक luctus magna felis sollicitudin mauris. इंटेगेर इन mauris यू nibh euismod gravida. डुइस अच tellus</p>","ar":"<p>لوريم ايبسوم دولار سيت أميت، كونسكتتور أديبيسشينغ إيليت. سيد دو إيوسيمود تيمبور إنسيديدونت أوت لابوري إت دولوري ماغنا أليكا. أوت إينيم أد مينيم فينيام، كويز نوسترود إكسرسيتاشيون أولامكو لابوريس نيسي أوت أليكويب إكس إيا كومودو كونسيكوات. دويس أوتي إيرور دولور إن ريبرهينديريت إن فولوبتات فيليت إيس سيليم دولور يو فوجيات نولا بارياتور. إكسسيبتور سنت أوككاكات كيوبيدتات نون برويدينت، سونت إن كولبا كي أوفيسيا ديسيريونت مولليت أنيم إد إست لابوروم. كيوريبيتور بريتيوم تينسيدونت لاكوس. نيولا غرافيدا أورسي أ أوديو. نيولام فارياس، توربيس إت كومودو فهرترا، إست إيروس بيبيندوم إيليت، نيك لوكتوس ماغنا فيليس سولليتشيتودين ماوريس. إنتيغر إن ماوريس يو نيبه إيوسيمود غرافيدا. دويس أك تيلوس إت ريزيز فلفوتا فيهيكول</p>"}',
                'slug' => 'anatomy-16',
                'is_active' => 1,
                'is_featured' => 0,
                'image' => '/images/doctor_archives/66ead2bfb6ac0.png',
                'location' => NULL,
                'created_at' => '2024-09-18 18:16:47',
                'updated_at' => '2024-09-18 18:16:47',
                'deleted_at' => NULL,
            ),
        ));
        \DB::table('archives')->insert(array (
            0 => 
            array (
                'id' => 17,
                'doctor_id' => 65,
                'clinic_id' => NULL,
                'archive_category_id' => 2,
                'name' => '{"en":"Biochemistry","hi":"क्विज़ प्रतियोगिता","ar":"علم البيئة"}',
                'description' => '{"en":"<p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum. Curabitur pretium tincidunt lacus. Nulla gravida orci a odio. Nullam varius, turpis et commodo pharetra, est eros bibendum elit, nec luctus magna felis sollicitudin mauris. Integer in mauris eu nibh euismod gravida. Duis ac tellus et risus vulputate vehicula. Donec lobortis risus a elit. Etiam tempor. Ut ullamcorper, ligula eu tempor congue, eros est euismod turpis, id tincidunt sapien risus a quam. Maecenas fermentum, sem in pharetra pellentesque.</p>","hi":"<p>लोरेम इप्सम डोलर सिट अमेट, कॉन्सेक्टेचर अडिपिसिंग एलीट. सेड डो ईयूसमोड टेम्पोर इन्सीडिडुंट उत लेबोरे एट डोलोरे मैग्ना एलिक्वा. उत एनीम अद मिनिम वेनिआम, क्विस नोस्त्रुड एक्सर्सिटेशन उल्लाम्को लेबोर्स निसी उत अलीक्विप एक्स ए कोमोडो कोन्सेक्वात. डुइस औटे इरुरे डोलोर इन रेप्रिहेंडेरिट इन वोलुप्टेटे वेलिट एसे सिल्लुम डोलोरे यू फुगिअट नल्ला pariatur. एक्सेप्तेउर सिन्न्त ओककेकाट कपिडटात नोन प्रोइडेंट, सुंट इन कुल्पा क्वि ओफ्फिसिअ डेसेरुंत्त मोल्लिट एनिम इड एस्ट laborum. कुरबीतुर प्रेटियम टिंसिडुंट लाकुस. नुल्ला ग्रविधा ओर्सी अ ओडिओ. नुल्लम वारिउस, turpis एट commodo फेरेत्रा, एस्ट एरोस बिबेंदुम एलीट, नेक luctus magna felis sollicitudin mauris. इंटेगेर इन mauris यू nibh euismod gravida. डुइस अच tellus</p>","ar":"<p>لوريم ايبسوم دولار سيت أميت، كونسكتتور أديبيسشينغ إيليت. سيد دو إيوسيمود تيمبور إنسيديدونت أوت لابوري إت دولوري ماغنا أليكا. أوت إينيم أد مينيم فينيام، كويز نوسترود إكسرسيتاشيون أولامكو لابوريس نيسي أوت أليكويب إكس إيا كومودو كونسيكوات. دويس أوتي إيرور دولور إن ريبرهينديريت إن فولوبتات فيليت إيس سيليم دولور يو فوجيات نولا بارياتور. إكسسيبتور سنت أوككاكات كيوبيدتات نون برويدينت، سونت إن كولبا كي أوفيسيا ديسيريونت مولليت أنيم إد إست لابوروم. كيوريبيتور بريتيوم تينسيدونت لاكوس. نيولا غرافيدا أورسي أ أوديو. نيولام فارياس، توربيس إت كومودو فهرترا، إست إيروس بيبيندوم إيليت، نيك لوكتوس ماغنا فيليس سولليتشيتودين ماوريس. إنتيغر إن ماوريس يو نيبه إيوسيمود غرافيدا. دويس أك تيلوس إت ريزيز فلفوتا فيهيكول</p>"}',
                'slug' => 'biochemistry-17',
                'is_active' => 1,
                'is_featured' => 0,
                'image' => '/images/doctor_archives/66ead2f496206.png',
                'location' => NULL,
                'created_at' => '2024-09-18 18:17:40',
                'updated_at' => '2024-09-18 18:17:40',
                'deleted_at' => NULL,
            ),
        ));
        \DB::table('archives')->insert(array (
            0 => 
            array (
                'id' => 18,
                'doctor_id' => 65,
                'clinic_id' => NULL,
                'archive_category_id' => 1,
                'name' => '{"en":"Pathology","hi":"औद्योगिक डिज़ाइन","ar":"الذكاء الاصطناعي"}',
                'description' => '{"en":"<p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum. Curabitur pretium tincidunt lacus. Nulla gravida orci a odio. Nullam varius, turpis et commodo pharetra, est eros bibendum elit, nec luctus magna felis sollicitudin mauris. Integer in mauris eu nibh euismod gravida. Duis ac tellus et risus vulputate vehicula. Donec lobortis risus a elit. Etiam tempor. Ut ullamcorper, ligula eu tempor congue, eros est euismod turpis, id tincidunt sapien risus a quam. Maecenas fermentum, sem in pharetra pellentesque.</p>","hi":"<p>लोरेम इप्सम डोलर सिट अमेट, कॉन्सेक्टेचर अडिपिसिंग एलीट. सेड डो ईयूसमोड टेम्पोर इन्सीडिडुंट उत लेबोरे एट डोलोरे मैग्ना एलिक्वा. उत एनीम अद मिनिम वेनिआम, क्विस नोस्त्रुड एक्सर्सिटेशन उल्लाम्को लेबोर्स निसी उत अलीक्विप एक्स ए कोमोडो कोन्सेक्वात. डुइस औटे इरुरे डोलोर इन रेप्रिहेंडेरिट इन वोलुप्टेटे वेलिट एसे सिल्लुम डोलोरे यू फुगिअट नल्ला pariatur. एक्सेप्तेउर सिन्न्त ओककेकाट कपिडटात नोन प्रोइडेंट, सुंट इन कुल्पा क्वि ओफ्फिसिअ डेसेरुंत्त मोल्लिट एनिम इड एस्ट laborum. कुरबीतुर प्रेटियम टिंसिडुंट लाकुस. नुल्ला ग्रविधा ओर्सी अ ओडिओ. नुल्लम वारिउस, turpis एट commodo फेरेत्रा, एस्ट एरोस बिबेंदुम एलीट, नेक luctus magna felis sollicitudin mauris. इंटेगेर इन mauris यू nibh euismod gravida. डुइस अच tellus</p>","ar":"<p>لوريم ايبسوم دولار سيت أميت، كونسكتتور أديبيسشينغ إيليت. سيد دو إيوسيمود تيمبور إنسيديدونت أوت لابوري إت دولوري ماغنا أليكا. أوت إينيم أد مينيم فينيام، كويز نوسترود إكسرسيتاشيون أولامكو لابوريس نيسي أوت أليكويب إكس إيا كومودو كونسيكوات. دويس أوتي إيرور دولور إن ريبرهينديريت إن فولوبتات فيليت إيس سيليم دولور يو فوجيات نولا بارياتور. إكسسيبتور سنت أوككاكات كيوبيدتات نون برويدينت، سونت إن كولبا كي أوفيسيا ديسيريونت مولليت أنيم إد إست لابوروم. كيوريبيتور بريتيوم تينسيدونت لاكوس. نيولا غرافيدا أورسي أ أوديو. نيولام فارياس، توربيس إت كومودو فهرترا، إست إيروس بيبيندوم إيليت، نيك لوكتوس ماغنا فيليس سولليتشيتودين ماوريس. إنتيغر إن ماوريس يو نيبه إيوسيمود غرافيدا. دويس أك تيلوس إت ريزيز فلفوتا فيهيكول</p>"}',
                'slug' => 'pathology-18',
                'is_active' => 1,
                'is_featured' => 0,
                'image' => '/images/doctor_archives/66ead323bf6f1.png',
                'location' => NULL,
                'created_at' => '2024-09-18 18:18:27',
                'updated_at' => '2024-09-18 18:18:27',
                'deleted_at' => NULL,
            ),
        ));
        \DB::table('archives')->insert(array (
            0 => 
            array (
                'id' => 19,
                'doctor_id' => 66,
                'clinic_id' => NULL,
                'archive_category_id' => 1,
                'name' => '{"en":"Forensic Medicine","hi":"क्विज़ प्रतियोगिता","ar":"الذكاء الاصطناعي"}',
                'description' => '{"en":"<p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum. Curabitur pretium tincidunt lacus. Nulla gravida orci a odio. Nullam varius, turpis et commodo pharetra, est eros bibendum elit, nec luctus magna felis sollicitudin mauris. Integer in mauris eu nibh euismod gravida. Duis ac tellus et risus vulputate vehicula. Donec lobortis risus a elit. Etiam tempor. Ut ullamcorper, ligula eu tempor congue, eros est euismod turpis, id tincidunt sapien risus a quam. Maecenas fermentum, sem in pharetra pellentesque.</p>","hi":"<p>लोरेम इप्सम डोलर सिट अमेट, कॉन्सेक्टेचर अडिपिसिंग एलीट. सेड डो ईयूसमोड टेम्पोर इन्सीडिडुंट उत लेबोरे एट डोलोरे मैग्ना एलिक्वा. उत एनीम अद मिनिम वेनिआम, क्विस नोस्त्रुड एक्सर्सिटेशन उल्लाम्को लेबोर्स निसी उत अलीक्विप एक्स ए कोमोडो कोन्सेक्वात. डुइस औटे इरुरे डोलोर इन रेप्रिहेंडेरिट इन वोलुप्टेटे वेलिट एसे सिल्लुम डोलोरे यू फुगिअट नल्ला pariatur. एक्सेप्तेउर सिन्न्त ओककेकाट कपिडटात नोन प्रोइडेंट, सुंट इन कुल्पा क्वि ओफ्फिसिअ डेसेरुंत्त मोल्लिट एनिम इड एस्ट laborum. कुरबीतुर प्रेटियम टिंसिडुंट लाकुस. नुल्ला ग्रविधा ओर्सी अ ओडिओ. नुल्लम वारिउस, turpis एट commodo फेरेत्रा, एस्ट एरोस बिबेंदुम एलीट, नेक luctus magna felis sollicitudin mauris. इंटेगेर इन mauris यू nibh euismod gravida. डुइस अच tellus</p>","ar":"<p>لوريم ايبسوم دولار سيت أميت، كونسكتتور أديبيسشينغ إيليت. سيد دو إيوسيمود تيمبور إنسيديدونت أوت لابوري إت دولوري ماغنا أليكا. أوت إينيم أد مينيم فينيام، كويز نوسترود إكسرسيتاشيون أولامكو لابوريس نيسي أوت أليكويب إكس إيا كومودو كونسيكوات. دويس أوتي إيرور دولور إن ريبرهينديريت إن فولوبتات فيليت إيس سيليم دولور يو فوجيات نولا بارياتور. إكسسيبتور سنت أوككاكات كيوبيدتات نون برويدينت، سونت إن كولبا كي أوفيسيا ديسيريونت مولليت أنيم إد إست لابوروم. كيوريبيتور بريتيوم تينسيدونت لاكوس. نيولا غرافيدا أورسي أ أوديو. نيولام فارياس، توربيس إت كومودو فهرترا، إست إيروس بيبيندوم إيليت، نيك لوكتوس ماغنا فيليس سولليتشيتودين ماوريس. إنتيغر إن ماوريس يو نيبه إيوسيمود غرافيدا. دويس أك تيلوس إت ريزيز فلفوتا فيهيكول</p>"}',
                'slug' => 'forensic-medicine-19',
                'is_active' => 1,
                'is_featured' => 0,
                'image' => '/images/doctor_archives/66ead36ae09da.png',
                'location' => NULL,
                'created_at' => '2024-09-18 18:19:38',
                'updated_at' => '2024-09-18 18:19:38',
                'deleted_at' => NULL,
            ),
        ));
        \DB::table('archives')->insert(array (
            0 => 
            array (
                'id' => 20,
                'doctor_id' => 66,
                'clinic_id' => NULL,
                'archive_category_id' => 1,
                'name' => '{"en":"General Surgery","hi":"कृत्रिम बुद्धिमत्ता","ar":"مدونة التعليم بالمنطق السليم"}',
                'description' => '{"en":"<p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum. Curabitur pretium tincidunt lacus. Nulla gravida orci a odio. Nullam varius, turpis et commodo pharetra, est eros bibendum elit, nec luctus magna felis sollicitudin mauris. Integer in mauris eu nibh euismod gravida. Duis ac tellus et risus vulputate vehicula. Donec lobortis risus a elit. Etiam tempor. Ut ullamcorper, ligula eu tempor congue, eros est euismod turpis, id tincidunt sapien risus a quam. Maecenas fermentum, sem in pharetra pellentesque.</p>","hi":"<p>लोरेम इप्सम डोलर सिट अमेट, कॉन्सेक्टेचर अडिपिसिंग एलीट. सेड डो ईयूसमोड टेम्पोर इन्सीडिडुंट उत लेबोरे एट डोलोरे मैग्ना एलिक्वा. उत एनीम अद मिनिम वेनिआम, क्विस नोस्त्रुड एक्सर्सिटेशन उल्लाम्को लेबोर्स निसी उत अलीक्विप एक्स ए कोमोडो कोन्सेक्वात. डुइस औटे इरुरे डोलोर इन रेप्रिहेंडेरिट इन वोलुप्टेटे वेलिट एसे सिल्लुम डोलोरे यू फुगिअट नल्ला pariatur. एक्सेप्तेउर सिन्न्त ओककेकाट कपिडटात नोन प्रोइडेंट, सुंट इन कुल्पा क्वि ओफ्फिसिअ डेसेरुंत्त मोल्लिट एनिम इड एस्ट laborum. कुरबीतुर प्रेटियम टिंसिडुंट लाकुस. नुल्ला ग्रविधा ओर्सी अ ओडिओ. नुल्लम वारिउस, turpis एट commodo फेरेत्रा, एस्ट एरोस बिबेंदुम एलीट, नेक luctus magna felis sollicitudin mauris. इंटेगेर इन mauris यू nibh euismod gravida. डुइस अच tellus</p>","ar":"<p>لوريم ايبسوم دولار سيت أميت، كونسكتتور أديبيسشينغ إيليت. سيد دو إيوسيمود تيمبور إنسيديدونت أوت لابوري إت دولوري ماغنا أليكا. أوت إينيم أد مينيم فينيام، كويز نوسترود إكسرسيتاشيون أولامكو لابوريس نيسي أوت أليكويب إكس إيا كومودو كونسيكوات. دويس أوتي إيرور دولور إن ريبرهينديريت إن فولوبتات فيليت إيس سيليم دولور يو فوجيات نولا بارياتور. إكسسيبتور سنت أوككاكات كيوبيدتات نون برويدينت، سونت إن كولبا كي أوفيسيا ديسيريونت مولليت أنيم إد إست لابوروم. كيوريبيتور بريتيوم تينسيدونت لاكوس. نيولا غرافيدا أورسي أ أوديو. نيولام فارياس، توربيس إت كومودو فهرترا، إست إيروس بيبيندوم إيليت، نيك لوكتوس ماغنا فيليس سولليتشيتودين ماوريس. إنتيغر إن ماوريس يو نيبه إيوسيمود غرافيدا. دويس أك تيلوس إت ريزيز فلفوتا فيهيكول</p>"}',
                'slug' => 'general-surgery-20',
                'is_active' => 1,
                'is_featured' => 0,
                'image' => '/images/doctor_archives/66ead3942694f.png',
                'location' => NULL,
                'created_at' => '2024-09-18 18:20:20',
                'updated_at' => '2024-09-18 18:20:20',
                'deleted_at' => NULL,
            ),
        ));
        \DB::table('archives')->insert(array (
            0 => 
            array (
                'id' => 21,
                'doctor_id' => 66,
                'clinic_id' => NULL,
                'archive_category_id' => 1,
                'name' => '{"en":"Pharmacology","hi":"क्विज़ प्रतियोगिता","ar":"فعالية الخطاب التعليمي"}',
                'description' => '{"en":"<p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum. Curabitur pretium tincidunt lacus. Nulla gravida orci a odio. Nullam varius, turpis et commodo pharetra, est eros bibendum elit, nec luctus magna felis sollicitudin mauris. Integer in mauris eu nibh euismod gravida. Duis ac tellus et risus vulputate vehicula. Donec lobortis risus a elit. Etiam tempor. Ut ullamcorper, ligula eu tempor congue, eros est euismod turpis, id tincidunt sapien risus a quam. Maecenas fermentum, sem in pharetra pellentesque.</p>","hi":"<p>लोरेम इप्सम डोलर सिट अमेट, कॉन्सेक्टेचर अडिपिसिंग एलीट. सेड डो ईयूसमोड टेम्पोर इन्सीडिडुंट उत लेबोरे एट डोलोरे मैग्ना एलिक्वा. उत एनीम अद मिनिम वेनिआम, क्विस नोस्त्रुड एक्सर्सिटेशन उल्लाम्को लेबोर्स निसी उत अलीक्विप एक्स ए कोमोडो कोन्सेक्वात. डुइस औटे इरुरे डोलोर इन रेप्रिहेंडेरिट इन वोलुप्टेटे वेलिट एसे सिल्लुम डोलोरे यू फुगिअट नल्ला pariatur. एक्सेप्तेउर सिन्न्त ओककेकाट कपिडटात नोन प्रोइडेंट, सुंट इन कुल्पा क्वि ओफ्फिसिअ डेसेरुंत्त मोल्लिट एनिम इड एस्ट laborum. कुरबीतुर प्रेटियम टिंसिडुंट लाकुस. नुल्ला ग्रविधा ओर्सी अ ओडिओ. नुल्लम वारिउस, turpis एट commodo फेरेत्रा, एस्ट एरोस बिबेंदुम एलीट, नेक luctus magna felis sollicitudin mauris. इंटेगेर इन mauris यू nibh euismod gravida. डुइस अच tellus</p>","ar":"<p>لوريم ايبسوم دولار سيت أميت، كونسكتتور أديبيسشينغ إيليت. سيد دو إيوسيمود تيمبور إنسيديدونت أوت لابوري إت دولوري ماغنا أليكا. أوت إينيم أد مينيم فينيام، كويز نوسترود إكسرسيتاشيون أولامكو لابوريس نيسي أوت أليكويب إكس إيا كومودو كونسيكوات. دويس أوتي إيرور دولور إن ريبرهينديريت إن فولوبتات فيليت إيس سيليم دولور يو فوجيات نولا بارياتور. إكسسيبتور سنت أوككاكات كيوبيدتات نون برويدينت، سونت إن كولبا كي أوفيسيا ديسيريونت مولليت أنيم إد إست لابوروم. كيوريبيتور بريتيوم تينسيدونت لاكوس. نيولا غرافيدا أورسي أ أوديو. نيولام فارياس، توربيس إت كومودو فهرترا، إست إيروس بيبيندوم إيليت، نيك لوكتوس ماغنا فيليس سولليتشيتودين ماوريس. إنتيغر إن ماوريس يو نيبه إيوسيمود غرافيدا. دويس أك تيلوس إت ريزيز فلفوتا فيهيكول</p>"}',
                'slug' => 'pharmacology-21',
                'is_active' => 1,
                'is_featured' => 0,
                'image' => '/images/doctor_archives/66ead3b95d813.png',
                'location' => NULL,
                'created_at' => '2024-09-18 18:20:57',
                'updated_at' => '2024-09-18 18:20:57',
                'deleted_at' => NULL,
            ),
        ));
        \DB::table('archives')->insert(array (
            0 => 
            array (
                'id' => 22,
                'doctor_id' => 72,
                'clinic_id' => NULL,
                'archive_category_id' => 2,
                'name' => '{"en":"Anesthesiology","hi":"क्विज़ प्रतियोगिता","ar":"الذكاء الاصطناعي"}',
                'description' => '{"en":"<p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum. Curabitur pretium tincidunt lacus. Nulla gravida orci a odio. Nullam varius, turpis et commodo pharetra, est eros bibendum elit, nec luctus magna felis sollicitudin mauris. Integer in mauris eu nibh euismod gravida. Duis ac tellus et risus vulputate vehicula. Donec lobortis risus a elit. Etiam tempor. Ut ullamcorper, ligula eu tempor congue, eros est euismod turpis, id tincidunt sapien risus a quam. Maecenas fermentum, sem in pharetra pellentesque.</p>","hi":"<p>लोरेम इप्सम डोलर सिट अमेट, कॉन्सेक्टेचर अडिपिसिंग एलीट. सेड डो ईयूसमोड टेम्पोर इन्सीडिडुंट उत लेबोरे एट डोलोरे मैग्ना एलिक्वा. उत एनीम अद मिनिम वेनिआम, क्विस नोस्त्रुड एक्सर्सिटेशन उल्लाम्को लेबोर्स निसी उत अलीक्विप एक्स ए कोमोडो कोन्सेक्वात. डुइस औटे इरुरे डोलोर इन रेप्रिहेंडेरिट इन वोलुप्टेटे वेलिट एसे सिल्लुम डोलोरे यू फुगिअट नल्ला pariatur. एक्सेप्तेउर सिन्न्त ओककेकाट कपिडटात नोन प्रोइडेंट, सुंट इन कुल्पा क्वि ओफ्फिसिअ डेसेरुंत्त मोल्लिट एनिम इड एस्ट laborum. कुरबीतुर प्रेटियम टिंसिडुंट लाकुस. नुल्ला ग्रविधा ओर्सी अ ओडिओ. नुल्लम वारिउस, turpis एट commodo फेरेत्रा, एस्ट एरोस बिबेंदुम एलीट, नेक luctus magna felis sollicitudin mauris. इंटेगेर इन mauris यू nibh euismod gravida. डुइस अच tellus</p>","ar":"<p>لوريم ايبسوم دولار سيت أميت، كونسكتتور أديبيسشينغ إيليت. سيد دو إيوسيمود تيمبور إنسيديدونت أوت لابوري إت دولوري ماغنا أليكا. أوت إينيم أد مينيم فينيام، كويز نوسترود إكسرسيتاشيون أولامكو لابوريس نيسي أوت أليكويب إكس إيا كومودو كونسيكوات. دويس أوتي إيرور دولور إن ريبرهينديريت إن فولوبتات فيليت إيس سيليم دولور يو فوجيات نولا بارياتور. إكسسيبتور سنت أوككاكات كيوبيدتات نون برويدينت، سونت إن كولبا كي أوفيسيا ديسيريونت مولليت أنيم إد إست لابوروم. كيوريبيتور بريتيوم تينسيدونت لاكوس. نيولا غرافيدا أورسي أ أوديو. نيولام فارياس، توربيس إت كومودو فهرترا، إست إيروس بيبيندوم إيليت، نيك لوكتوس ماغنا فيليس سولليتشيتودين ماوريس. إنتيغر إن ماوريس يو نيبه إيوسيمود غرافيدا. دويس أك تيلوس إت ريزيز فلفوتا فيهيكول</p>"}',
                'slug' => 'anesthesiology-22',
                'is_active' => 1,
                'is_featured' => 0,
                'image' => '/images/doctor_archives/66ead40a49af7.png',
                'location' => NULL,
                'created_at' => '2024-09-18 18:22:18',
                'updated_at' => '2024-09-18 18:22:18',
                'deleted_at' => NULL,
            ),
        ));
        \DB::table('archives')->insert(array (
            0 => 
            array (
                'id' => 23,
                'doctor_id' => 72,
                'clinic_id' => NULL,
                'archive_category_id' => 2,
                'name' => '{"en":"Dermatology","hi":"पारिस्थितिकी","ar":"علم البيئة"}',
                'description' => '{"en":"<p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum. Curabitur pretium tincidunt lacus. Nulla gravida orci a odio. Nullam varius, turpis et commodo pharetra, est eros bibendum elit, nec luctus magna felis sollicitudin mauris. Integer in mauris eu nibh euismod gravida. Duis ac tellus et risus vulputate vehicula. Donec lobortis risus a elit. Etiam tempor. Ut ullamcorper, ligula eu tempor congue, eros est euismod turpis, id tincidunt sapien risus a quam. Maecenas fermentum, sem in pharetra pellentesque.</p>","hi":"<p>लोरेम इप्सम डोलर सिट अमेट, कॉन्सेक्टेचर अडिपिसिंग एलीट. सेड डो ईयूसमोड टेम्पोर इन्सीडिडुंट उत लेबोरे एट डोलोरे मैग्ना एलिक्वा. उत एनीम अद मिनिम वेनिआम, क्विस नोस्त्रुड एक्सर्सिटेशन उल्लाम्को लेबोर्स निसी उत अलीक्विप एक्स ए कोमोडो कोन्सेक्वात. डुइस औटे इरुरे डोलोर इन रेप्रिहेंडेरिट इन वोलुप्टेटे वेलिट एसे सिल्लुम डोलोरे यू फुगिअट नल्ला pariatur. एक्सेप्तेउर सिन्न्त ओककेकाट कपिडटात नोन प्रोइडेंट, सुंट इन कुल्पा क्वि ओफ्फिसिअ डेसेरुंत्त मोल्लिट एनिम इड एस्ट laborum. कुरबीतुर प्रेटियम टिंसिडुंट लाकुस. नुल्ला ग्रविधा ओर्सी अ ओडिओ. नुल्लम वारिउस, turpis एट commodo फेरेत्रा, एस्ट एरोस बिबेंदुम एलीट, नेक luctus magna felis sollicitudin mauris. इंटेगेर इन mauris यू nibh euismod gravida. डुइस अच tellus</p>","ar":"<p>لوريم ايبسوم دولار سيت أميت، كونسكتتور أديبيسشينغ إيليت. سيد دو إيوسيمود تيمبور إنسيديدونت أوت لابوري إت دولوري ماغنا أليكا. أوت إينيم أد مينيم فينيام، كويز نوسترود إكسرسيتاشيون أولامكو لابوريس نيسي أوت أليكويب إكس إيا كومودو كونسيكوات. دويس أوتي إيرور دولور إن ريبرهينديريت إن فولوبتات فيليت إيس سيليم دولور يو فوجيات نولا بارياتور. إكسسيبتور سنت أوككاكات كيوبيدتات نون برويدينت، سونت إن كولبا كي أوفيسيا ديسيريونت مولليت أنيم إد إست لابوروم. كيوريبيتور بريتيوم تينسيدونت لاكوس. نيولا غرافيدا أورسي أ أوديو. نيولام فارياس، توربيس إت كومودو فهرترا، إست إيروس بيبيندوم إيليت، نيك لوكتوس ماغنا فيليس سولليتشيتودين ماوريس. إنتيغر إن ماوريس يو نيبه إيوسيمود غرافيدا. دويس أك تيلوس إت ريزيز فلفوتا فيهيكول</p>"}',
                'slug' => 'dermatology-23',
                'is_active' => 1,
                'is_featured' => 0,
                'image' => '/images/doctor_archives/66ead4353009b.png',
                'location' => NULL,
                'created_at' => '2024-09-18 18:23:01',
                'updated_at' => '2024-09-18 18:23:01',
                'deleted_at' => NULL,
            ),
        ));
        \DB::table('archives')->insert(array (
            0 => 
            array (
                'id' => 24,
                'doctor_id' => 72,
                'clinic_id' => NULL,
                'archive_category_id' => 2,
                'name' => '{"en":"Ophthalmology","hi":"कृत्रिम बुद्धिमत्ता","ar":"مسابقة معلومات"}',
                'description' => '{"en":"<p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum. Curabitur pretium tincidunt lacus. Nulla gravida orci a odio. Nullam varius, turpis et commodo pharetra, est eros bibendum elit, nec luctus magna felis sollicitudin mauris. Integer in mauris eu nibh euismod gravida. Duis ac tellus et risus vulputate vehicula. Donec lobortis risus a elit. Etiam tempor. Ut ullamcorper, ligula eu tempor congue, eros est euismod turpis, id tincidunt sapien risus a quam. Maecenas fermentum, sem in pharetra pellentesque.</p>","hi":"<p>लोरेम इप्सम डोलर सिट अमेट, कॉन्सेक्टेचर अडिपिसिंग एलीट. सेड डो ईयूसमोड टेम्पोर इन्सीडिडुंट उत लेबोरे एट डोलोरे मैग्ना एलिक्वा. उत एनीम अद मिनिम वेनिआम, क्विस नोस्त्रुड एक्सर्सिटेशन उल्लाम्को लेबोर्स निसी उत अलीक्विप एक्स ए कोमोडो कोन्सेक्वात. डुइस औटे इरुरे डोलोर इन रेप्रिहेंडेरिट इन वोलुप्टेटे वेलिट एसे सिल्लुम डोलोरे यू फुगिअट नल्ला pariatur. एक्सेप्तेउर सिन्न्त ओककेकाट कपिडटात नोन प्रोइडेंट, सुंट इन कुल्पा क्वि ओफ्फिसिअ डेसेरुंत्त मोल्लिट एनिम इड एस्ट laborum. कुरबीतुर प्रेटियम टिंसिडुंट लाकुस. नुल्ला ग्रविधा ओर्सी अ ओडिओ. नुल्लम वारिउस, turpis एट commodo फेरेत्रा, एस्ट एरोस बिबेंदुम एलीट, नेक luctus magna felis sollicitudin mauris. इंटेगेर इन mauris यू nibh euismod gravida. डुइस अच tellus</p>","ar":"<p>لوريم ايبسوم دولار سيت أميت، كونسكتتور أديبيسشينغ إيليت. سيد دو إيوسيمود تيمبور إنسيديدونت أوت لابوري إت دولوري ماغنا أليكا. أوت إينيم أد مينيم فينيام، كويز نوسترود إكسرسيتاشيون أولامكو لابوريس نيسي أوت أليكويب إكس إيا كومودو كونسيكوات. دويس أوتي إيرور دولور إن ريبرهينديريت إن فولوبتات فيليت إيس سيليم دولور يو فوجيات نولا بارياتور. إكسسيبتور سنت أوككاكات كيوبيدتات نون برويدينت، سونت إن كولبا كي أوفيسيا ديسيريونت مولليت أنيم إد إست لابوروم. كيوريبيتور بريتيوم تينسيدونت لاكوس. نيولا غرافيدا أورسي أ أوديو. نيولام فارياس، توربيس إت كومودو فهرترا، إست إيروس بيبيندوم إيليت، نيك لوكتوس ماغنا فيليس سولليتشيتودين ماوريس. إنتيغر إن ماوريس يو نيبه إيوسيمود غرافيدا. دويس أك تيلوس إت ريزيز فلفوتا فيهيكول</p>"}',
                'slug' => 'ophthalmology-24',
                'is_active' => 1,
                'is_featured' => 0,
                'image' => '/images/doctor_archives/66ead72d3558a.png',
                'location' => NULL,
                'created_at' => '2024-09-18 18:35:41',
                'updated_at' => '2024-09-18 18:35:41',
                'deleted_at' => NULL,
            ),
        ));
        \DB::table('archives')->insert(array (
            0 => 
            array (
                'id' => 25,
                'doctor_id' => 73,
                'clinic_id' => NULL,
                'archive_category_id' => 2,
                'name' => '{"en":"Cardiothoracic Surgery","hi":"औद्योगिक डिज़ाइन","ar":"التصميم الصناعي"}',
                'description' => '{"en":"<p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum. Curabitur pretium tincidunt lacus. Nulla gravida orci a odio. Nullam varius, turpis et commodo pharetra, est eros bibendum elit, nec luctus magna felis sollicitudin mauris. Integer in mauris eu nibh euismod gravida. Duis ac tellus et risus vulputate vehicula. Donec lobortis risus a elit. Etiam tempor. Ut ullamcorper, ligula eu tempor congue, eros est euismod turpis, id tincidunt sapien risus a quam. Maecenas fermentum, sem in pharetra pellentesque.</p>","hi":"<p>लोरेम इप्सम डोलर सिट अमेट, कॉन्सेक्टेचर अडिपिसिंग एलीट. सेड डो ईयूसमोड टेम्पोर इन्सीडिडुंट उत लेबोरे एट डोलोरे मैग्ना एलिक्वा. उत एनीम अद मिनिम वेनिआम, क्विस नोस्त्रुड एक्सर्सिटेशन उल्लाम्को लेबोर्स निसी उत अलीक्विप एक्स ए कोमोडो कोन्सेक्वात. डुइस औटे इरुरे डोलोर इन रेप्रिहेंडेरिट इन वोलुप्टेटे वेलिट एसे सिल्लुम डोलोरे यू फुगिअट नल्ला pariatur. एक्सेप्तेउर सिन्न्त ओककेकाट कपिडटात नोन प्रोइडेंट, सुंट इन कुल्पा क्वि ओफ्फिसिअ डेसेरुंत्त मोल्लिट एनिम इड एस्ट laborum. कुरबीतुर प्रेटियम टिंसिडुंट लाकुस. नुल्ला ग्रविधा ओर्सी अ ओडिओ. नुल्लम वारिउस, turpis एट commodo फेरेत्रा, एस्ट एरोस बिबेंदुम एलीट, नेक luctus magna felis sollicitudin mauris. इंटेगेर इन mauris यू nibh euismod gravida. डुइस अच tellus</p>","ar":"<p>لوريم ايبسوم دولار سيت أميت، كونسكتتور أديبيسشينغ إيليت. سيد دو إيوسيمود تيمبور إنسيديدونت أوت لابوري إت دولوري ماغنا أليكا. أوت إينيم أد مينيم فينيام، كويز نوسترود إكسرسيتاشيون أولامكو لابوريس نيسي أوت أليكويب إكس إيا كومودو كونسيكوات. دويس أوتي إيرور دولور إن ريبرهينديريت إن فولوبتات فيليت إيس سيليم دولور يو فوجيات نولا بارياتور. إكسسيبتور سنت أوككاكات كيوبيدتات نون برويدينت، سونت إن كولبا كي أوفيسيا ديسيريونت مولليت أنيم إد إست لابوروم. كيوريبيتور بريتيوم تينسيدونت لاكوس. نيولا غرافيدا أورسي أ أوديو. نيولام فارياس، توربيس إت كومودو فهرترا، إست إيروس بيبيندوم إيليت، نيك لوكتوس ماغنا فيليس سولليتشيتودين ماوريس. إنتيغر إن ماوريس يو نيبه إيوسيمود غرافيدا. دويس أك تيلوس إت ريزيز فلفوتا فيهيكول</p>"}',
                'slug' => 'cardiothoracic-surgery-25',
                'is_active' => 1,
                'is_featured' => 0,
                'image' => '/images/doctor_archives/66ead778ebeb2.png',
                'location' => NULL,
                'created_at' => '2024-09-18 18:36:56',
                'updated_at' => '2024-09-18 18:36:56',
                'deleted_at' => NULL,
            ),
        ));
        \DB::table('archives')->insert(array (
            0 => 
            array (
                'id' => 26,
                'doctor_id' => 73,
                'clinic_id' => NULL,
                'archive_category_id' => 2,
                'name' => '{"en":"Endocrinology","hi":"पारिस्थितिकी","ar":"فعالية الخطاب التعليمي"}',
                'description' => '{"en":"<p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum. Curabitur pretium tincidunt lacus. Nulla gravida orci a odio. Nullam varius, turpis et commodo pharetra, est eros bibendum elit, nec luctus magna felis sollicitudin mauris. Integer in mauris eu nibh euismod gravida. Duis ac tellus et risus vulputate vehicula. Donec lobortis risus a elit. Etiam tempor. Ut ullamcorper, ligula eu tempor congue, eros est euismod turpis, id tincidunt sapien risus a quam. Maecenas fermentum, sem in pharetra pellentesque.</p>","hi":"<p>लोरेम इप्सम डोलर सिट अमेट, कॉन्सेक्टेचर अडिपिसिंग एलीट. सेड डो ईयूसमोड टेम्पोर इन्सीडिडुंट उत लेबोरे एट डोलोरे मैग्ना एलिक्वा. उत एनीम अद मिनिम वेनिआम, क्विस नोस्त्रुड एक्सर्सिटेशन उल्लाम्को लेबोर्स निसी उत अलीक्विप एक्स ए कोमोडो कोन्सेक्वात. डुइस औटे इरुरे डोलोर इन रेप्रिहेंडेरिट इन वोलुप्टेटे वेलिट एसे सिल्लुम डोलोरे यू फुगिअट नल्ला pariatur. एक्सेप्तेउर सिन्न्त ओककेकाट कपिडटात नोन प्रोइडेंट, सुंट इन कुल्पा क्वि ओफ्फिसिअ डेसेरुंत्त मोल्लिट एनिम इड एस्ट laborum. कुरबीतुर प्रेटियम टिंसिडुंट लाकुस. नुल्ला ग्रविधा ओर्सी अ ओडिओ. नुल्लम वारिउस, turpis एट commodo फेरेत्रा, एस्ट एरोस बिबेंदुम एलीट, नेक luctus magna felis sollicitudin mauris. इंटेगेर इन mauris यू nibh euismod gravida. डुइस अच tellus</p>","ar":"<p>لوريم ايبسوم دولار سيت أميت، كونسكتتور أديبيسشينغ إيليت. سيد دو إيوسيمود تيمبور إنسيديدونت أوت لابوري إت دولوري ماغنا أليكا. أوت إينيم أد مينيم فينيام، كويز نوسترود إكسرسيتاشيون أولامكو لابوريس نيسي أوت أليكويب إكس إيا كومودو كونسيكوات. دويس أوتي إيرور دولور إن ريبرهينديريت إن فولوبتات فيليت إيس سيليم دولور يو فوجيات نولا بارياتور. إكسسيبتور سنت أوككاكات كيوبيدتات نون برويدينت، سونت إن كولبا كي أوفيسيا ديسيريونت مولليت أنيم إد إست لابوروم. كيوريبيتور بريتيوم تينسيدونت لاكوس. نيولا غرافيدا أورسي أ أوديو. نيولام فارياس، توربيس إت كومودو فهرترا، إست إيروس بيبيندوم إيليت، نيك لوكتوس ماغنا فيليس سولليتشيتودين ماوريس. إنتيغر إن ماوريس يو نيبه إيوسيمود غرافيدا. دويس أك تيلوس إت ريزيز فلفوتا فيهيكول</p>"}',
                'slug' => 'endocrinology-26',
                'is_active' => 1,
                'is_featured' => 0,
                'image' => '/images/doctor_archives/66ead7aa5b2bc.png',
                'location' => NULL,
                'created_at' => '2024-09-18 18:37:46',
                'updated_at' => '2024-09-18 18:37:46',
                'deleted_at' => NULL,
            ),
        ));
        \DB::table('archives')->insert(array (
            0 => 
            array (
                'id' => 27,
                'doctor_id' => 73,
                'clinic_id' => NULL,
                'archive_category_id' => 1,
                'name' => '{"en":"Trauma Management","hi":"शैक्षिक भाषण समारोह","ar":"فعالية الخطاب التعليمي"}',
                'description' => '{"en":"<p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum. Curabitur pretium tincidunt lacus. Nulla gravida orci a odio. Nullam varius, turpis et commodo pharetra, est eros bibendum elit, nec luctus magna felis sollicitudin mauris. Integer in mauris eu nibh euismod gravida. Duis ac tellus et risus vulputate vehicula. Donec lobortis risus a elit. Etiam tempor. Ut ullamcorper, ligula eu tempor congue, eros est euismod turpis, id tincidunt sapien risus a quam. Maecenas fermentum, sem in pharetra pellentesque.</p>","hi":"<p>लोरेम इप्सम डोलर सिट अमेट, कॉन्सेक्टेचर अडिपिसिंग एलीट. सेड डो ईयूसमोड टेम्पोर इन्सीडिडुंट उत लेबोरे एट डोलोरे मैग्ना एलिक्वा. उत एनीम अद मिनिम वेनिआम, क्विस नोस्त्रुड एक्सर्सिटेशन उल्लाम्को लेबोर्स निसी उत अलीक्विप एक्स ए कोमोडो कोन्सेक्वात. डुइस औटे इरुरे डोलोर इन रेप्रिहेंडेरिट इन वोलुप्टेटे वेलिट एसे सिल्लुम डोलोरे यू फुगिअट नल्ला pariatur. एक्सेप्तेउर सिन्न्त ओककेकाट कपिडटात नोन प्रोइडेंट, सुंट इन कुल्पा क्वि ओफ्फिसिअ डेसेरुंत्त मोल्लिट एनिम इड एस्ट laborum. कुरबीतुर प्रेटियम टिंसिडुंट लाकुस. नुल्ला ग्रविधा ओर्सी अ ओडिओ. नुल्लम वारिउस, turpis एट commodo फेरेत्रा, एस्ट एरोस बिबेंदुम एलीट, नेक luctus magna felis sollicitudin mauris. इंटेगेर इन mauris यू nibh euismod gravida. डुइस अच tellus</p>","ar":"<p>لوريم ايبسوم دولار سيت أميت، كونسكتتور أديبيسشينغ إيليت. سيد دو إيوسيمود تيمبور إنسيديدونت أوت لابوري إت دولوري ماغنا أليكا. أوت إينيم أد مينيم فينيام، كويز نوسترود إكسرسيتاشيون أولامكو لابوريس نيسي أوت أليكويب إكس إيا كومودو كونسيكوات. دويس أوتي إيرور دولور إن ريبرهينديريت إن فولوبتات فيليت إيس سيليم دولور يو فوجيات نولا بارياتور. إكسسيبتور سنت أوككاكات كيوبيدتات نون برويدينت، سونت إن كولبا كي أوفيسيا ديسيريونت مولليت أنيم إد إست لابوروم. كيوريبيتور بريتيوم تينسيدونت لاكوس. نيولا غرافيدا أورسي أ أوديو. نيولام فارياس، توربيس إت كومودو فهرترا، إست إيروس بيبيندوم إيليت، نيك لوكتوس ماغنا فيليس سولليتشيتودين ماوريس. إنتيغر إن ماوريس يو نيبه إيوسيمود غرافيدا. دويس أك تيلوس إت ريزيز فلفوتا فيهيكول</p>"}',
                'slug' => 'trauma-management-27',
                'is_active' => 1,
                'is_featured' => 0,
                'image' => '/images/doctor_archives/66ead7d157085.png',
                'location' => NULL,
                'created_at' => '2024-09-18 18:38:25',
                'updated_at' => '2024-09-18 18:38:25',
                'deleted_at' => NULL,
            ),
        ));
        \DB::table('archives')->insert(array (
            0 => 
            array (
                'id' => 28,
                'doctor_id' => 74,
                'clinic_id' => NULL,
                'archive_category_id' => 1,
                'name' => '{"en":"Gastroenterology","hi":"क्विज़ प्रतियोगिता","ar":"التصميم الصناعي"}',
                'description' => '{"en":"<p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum. Curabitur pretium tincidunt lacus. Nulla gravida orci a odio. Nullam varius, turpis et commodo pharetra, est eros bibendum elit, nec luctus magna felis sollicitudin mauris. Integer in mauris eu nibh euismod gravida. Duis ac tellus et risus vulputate vehicula. Donec lobortis risus a elit. Etiam tempor. Ut ullamcorper, ligula eu tempor congue, eros est euismod turpis, id tincidunt sapien risus a quam. Maecenas fermentum, sem in pharetra pellentesque.</p>","hi":"<p>लोरेम इप्सम डोलर सिट अमेट, कॉन्सेक्टेचर अडिपिसिंग एलीट. सेड डो ईयूसमोड टेम्पोर इन्सीडिडुंट उत लेबोरे एट डोलोरे मैग्ना एलिक्वा. उत एनीम अद मिनिम वेनिआम, क्विस नोस्त्रुड एक्सर्सिटेशन उल्लाम्को लेबोर्स निसी उत अलीक्विप एक्स ए कोमोडो कोन्सेक्वात. डुइस औटे इरुरे डोलोर इन रेप्रिहेंडेरिट इन वोलुप्टेटे वेलिट एसे सिल्लुम डोलोरे यू फुगिअट नल्ला pariatur. एक्सेप्तेउर सिन्न्त ओककेकाट कपिडटात नोन प्रोइडेंट, सुंट इन कुल्पा क्वि ओफ्फिसिअ डेसेरुंत्त मोल्लिट एनिम इड एस्ट laborum. कुरबीतुर प्रेटियम टिंसिडुंट लाकुस. नुल्ला ग्रविधा ओर्सी अ ओडिओ. नुल्लम वारिउस, turpis एट commodo फेरेत्रा, एस्ट एरोस बिबेंदुम एलीट, नेक luctus magna felis sollicitudin mauris. इंटेगेर इन mauris यू nibh euismod gravida. डुइस अच tellus</p>","ar":"<p>لوريم ايبسوم دولار سيت أميت، كونسكتتور أديبيسشينغ إيليت. سيد دو إيوسيمود تيمبور إنسيديدونت أوت لابوري إت دولوري ماغنا أليكا. أوت إينيم أد مينيم فينيام، كويز نوسترود إكسرسيتاشيون أولامكو لابوريس نيسي أوت أليكويب إكس إيا كومودو كونسيكوات. دويس أوتي إيرور دولور إن ريبرهينديريت إن فولوبتات فيليت إيس سيليم دولور يو فوجيات نولا بارياتور. إكسسيبتور سنت أوككاكات كيوبيدتات نون برويدينت، سونت إن كولبا كي أوفيسيا ديسيريونت مولليت أنيم إد إست لابوروم. كيوريبيتور بريتيوم تينسيدونت لاكوس. نيولا غرافيدا أورسي أ أوديو. نيولام فارياس، توربيس إت كومودو فهرترا، إست إيروس بيبيندوم إيليت، نيك لوكتوس ماغنا فيليس سولليتشيتودين ماوريس. إنتيغر إن ماوريس يو نيبه إيوسيمود غرافيدا. دويس أك تيلوس إت ريزيز فلفوتا فيهيكول</p>"}',
                'slug' => 'gastroenterology-28',
                'is_active' => 1,
                'is_featured' => 0,
                'image' => '/images/doctor_archives/66ead82103c28.png',
                'location' => NULL,
                'created_at' => '2024-09-18 18:39:45',
                'updated_at' => '2024-09-18 18:39:45',
                'deleted_at' => NULL,
            ),
        ));
        \DB::table('archives')->insert(array (
            0 => 
            array (
                'id' => 29,
                'doctor_id' => 74,
                'clinic_id' => NULL,
                'archive_category_id' => 1,
                'name' => '{"en":"Palliative Care","hi":"क्विज़ प्रतियोगिता","ar":"الذكاء الاصطناعي"}',
                'description' => '{"en":"<p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum. Curabitur pretium tincidunt lacus. Nulla gravida orci a odio. Nullam varius, turpis et commodo pharetra, est eros bibendum elit, nec luctus magna felis sollicitudin mauris. Integer in mauris eu nibh euismod gravida. Duis ac tellus et risus vulputate vehicula. Donec lobortis risus a elit. Etiam tempor. Ut ullamcorper, ligula eu tempor congue, eros est euismod turpis, id tincidunt sapien risus a quam. Maecenas fermentum, sem in pharetra pellentesque.</p>","hi":"<p>लोरेम इप्सम डोलर सिट अमेट, कॉन्सेक्टेचर अडिपिसिंग एलीट. सेड डो ईयूसमोड टेम्पोर इन्सीडिडुंट उत लेबोरे एट डोलोरे मैग्ना एलिक्वा. उत एनीम अद मिनिम वेनिआम, क्विस नोस्त्रुड एक्सर्सिटेशन उल्लाम्को लेबोर्स निसी उत अलीक्विप एक्स ए कोमोडो कोन्सेक्वात. डुइस औटे इरुरे डोलोर इन रेप्रिहेंडेरिट इन वोलुप्टेटे वेलिट एसे सिल्लुम डोलोरे यू फुगिअट नल्ला pariatur. एक्सेप्तेउर सिन्न्त ओककेकाट कपिडटात नोन प्रोइडेंट, सुंट इन कुल्पा क्वि ओफ्फिसिअ डेसेरुंत्त मोल्लिट एनिम इड एस्ट laborum. कुरबीतुर प्रेटियम टिंसिडुंट लाकुस. नुल्ला ग्रविधा ओर्सी अ ओडिओ. नुल्लम वारिउस, turpis एट commodo फेरेत्रा, एस्ट एरोस बिबेंदुम एलीट, नेक luctus magna felis sollicitudin mauris. इंटेगेर इन mauris यू nibh euismod gravida. डुइस अच tellus</p>","ar":"<p>لوريم ايبسوم دولار سيت أميت، كونسكتتور أديبيسشينغ إيليت. سيد دو إيوسيمود تيمبور إنسيديدونت أوت لابوري إت دولوري ماغنا أليكا. أوت إينيم أد مينيم فينيام، كويز نوسترود إكسرسيتاشيون أولامكو لابوريس نيسي أوت أليكويب إكس إيا كومودو كونسيكوات. دويس أوتي إيرور دولور إن ريبرهينديريت إن فولوبتات فيليت إيس سيليم دولور يو فوجيات نولا بارياتور. إكسسيبتور سنت أوككاكات كيوبيدتات نون برويدينت، سونت إن كولبا كي أوفيسيا ديسيريونت مولليت أنيم إد إست لابوروم. كيوريبيتور بريتيوم تينسيدونت لاكوس. نيولا غرافيدا أورسي أ أوديو. نيولام فارياس، توربيس إت كومودو فهرترا، إست إيروس بيبيندوم إيليت، نيك لوكتوس ماغنا فيليس سولليتشيتودين ماوريس. إنتيغر إن ماوريس يو نيبه إيوسيمود غرافيدا. دويس أك تيلوس إت ريزيز فلفوتا فيهيكول</p>"}',
                'slug' => 'palliative-care-29',
                'is_active' => 1,
                'is_featured' => 0,
                'image' => '/images/doctor_archives/66ead852c431b.png',
                'location' => NULL,
                'created_at' => '2024-09-18 18:40:34',
                'updated_at' => '2024-09-18 18:40:34',
                'deleted_at' => NULL,
            ),
        ));
        \DB::table('archives')->insert(array (
            0 => 
            array (
                'id' => 30,
                'doctor_id' => 74,
                'clinic_id' => NULL,
                'archive_category_id' => 2,
                'name' => '{"en":"Urology","hi":"क्विज़ प्रतियोगिता","ar":"علم البيئة"}',
                'description' => '{"en":"<p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum. Curabitur pretium tincidunt lacus. Nulla gravida orci a odio. Nullam varius, turpis et commodo pharetra, est eros bibendum elit, nec luctus magna felis sollicitudin mauris. Integer in mauris eu nibh euismod gravida. Duis ac tellus et risus vulputate vehicula. Donec lobortis risus a elit. Etiam tempor. Ut ullamcorper, ligula eu tempor congue, eros est euismod turpis, id tincidunt sapien risus a quam. Maecenas fermentum, sem in pharetra pellentesque.</p>","hi":"<p>लोरेम इप्सम डोलर सिट अमेट, कॉन्सेक्टेचर अडिपिसिंग एलीट. सेड डो ईयूसमोड टेम्पोर इन्सीडिडुंट उत लेबोरे एट डोलोरे मैग्ना एलिक्वा. उत एनीम अद मिनिम वेनिआम, क्विस नोस्त्रुड एक्सर्सिटेशन उल्लाम्को लेबोर्स निसी उत अलीक्विप एक्स ए कोमोडो कोन्सेक्वात. डुइस औटे इरुरे डोलोर इन रेप्रिहेंडेरिट इन वोलुप्टेटे वेलिट एसे सिल्लुम डोलोरे यू फुगिअट नल्ला pariatur. एक्सेप्तेउर सिन्न्त ओककेकाट कपिडटात नोन प्रोइडेंट, सुंट इन कुल्पा क्वि ओफ्फिसिअ डेसेरुंत्त मोल्लिट एनिम इड एस्ट laborum. कुरबीतुर प्रेटियम टिंसिडुंट लाकुस. नुल्ला ग्रविधा ओर्सी अ ओडिओ. नुल्लम वारिउस, turpis एट commodo फेरेत्रा, एस्ट एरोस बिबेंदुम एलीट, नेक luctus magna felis sollicitudin mauris. इंटेगेर इन mauris यू nibh euismod gravida. डुइस अच tellus</p>","ar":"<p>لوريم ايبسوم دولار سيت أميت، كونسكتتور أديبيسشينغ إيليت. سيد دو إيوسيمود تيمبور إنسيديدونت أوت لابوري إت دولوري ماغنا أليكا. أوت إينيم أد مينيم فينيام، كويز نوسترود إكسرسيتاشيون أولامكو لابوريس نيسي أوت أليكويب إكس إيا كومودو كونسيكوات. دويس أوتي إيرور دولور إن ريبرهينديريت إن فولوبتات فيليت إيس سيليم دولور يو فوجيات نولا بارياتور. إكسسيبتور سنت أوككاكات كيوبيدتات نون برويدينت، سونت إن كولبا كي أوفيسيا ديسيريونت مولليت أنيم إد إست لابوروم. كيوريبيتور بريتيوم تينسيدونت لاكوس. نيولا غرافيدا أورسي أ أوديو. نيولام فارياس، توربيس إت كومودو فهرترا، إست إيروس بيبيندوم إيليت، نيك لوكتوس ماغنا فيليس سولليتشيتودين ماوريس. إنتيغر إن ماوريس يو نيبه إيوسيمود غرافيدا. دويس أك تيلوس إت ريزيز فلفوتا فيهيكول</p>"}',
                'slug' => 'urology-30',
                'is_active' => 1,
                'is_featured' => 0,
                'image' => '/images/doctor_archives/66ead88e34000.png',
                'location' => NULL,
                'created_at' => '2024-09-18 18:41:34',
                'updated_at' => '2024-09-18 18:41:34',
                'deleted_at' => NULL,
            ),
        ));
        \DB::table('archives')->insert(array (
            0 => 
            array (
                'id' => 31,
                'doctor_id' => 75,
                'clinic_id' => NULL,
                'archive_category_id' => 1,
                'name' => '{"en":"Anatomy","hi":"औद्योगिक डिज़ाइन","ar":"مسابقة معلومات"}',
                'description' => '{"en":"<p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum. Curabitur pretium tincidunt lacus. Nulla gravida orci a odio. Nullam varius, turpis et commodo pharetra, est eros bibendum elit, nec luctus magna felis sollicitudin mauris. Integer in mauris eu nibh euismod gravida. Duis ac tellus et risus vulputate vehicula. Donec lobortis risus a elit. Etiam tempor. Ut ullamcorper, ligula eu tempor congue, eros est euismod turpis, id tincidunt sapien risus a quam. Maecenas fermentum, sem in pharetra pellentesque.</p>","hi":"<p>लोरेम इप्सम डोलर सिट अमेट, कॉन्सेक्टेचर अडिपिसिंग एलीट. सेड डो ईयूसमोड टेम्पोर इन्सीडिडुंट उत लेबोरे एट डोलोरे मैग्ना एलिक्वा. उत एनीम अद मिनिम वेनिआम, क्विस नोस्त्रुड एक्सर्सिटेशन उल्लाम्को लेबोर्स निसी उत अलीक्विप एक्स ए कोमोडो कोन्सेक्वात. डुइस औटे इरुरे डोलोर इन रेप्रिहेंडेरिट इन वोलुप्टेटे वेलिट एसे सिल्लुम डोलोरे यू फुगिअट नल्ला pariatur. एक्सेप्तेउर सिन्न्त ओककेकाट कपिडटात नोन प्रोइडेंट, सुंट इन कुल्पा क्वि ओफ्फिसिअ डेसेरुंत्त मोल्लिट एनिम इड एस्ट laborum. कुरबीतुर प्रेटियम टिंसिडुंट लाकुस. नुल्ला ग्रविधा ओर्सी अ ओडिओ. नुल्लम वारिउस, turpis एट commodo फेरेत्रा, एस्ट एरोस बिबेंदुम एलीट, नेक luctus magna felis sollicitudin mauris. इंटेगेर इन mauris यू nibh euismod gravida. डुइस अच tellus</p>","ar":"<p>لوريم ايبسوم دولار سيت أميت، كونسكتتور أديبيسشينغ إيليت. سيد دو إيوسيمود تيمبور إنسيديدونت أوت لابوري إت دولوري ماغنا أليكا. أوت إينيم أد مينيم فينيام، كويز نوسترود إكسرسيتاشيون أولامكو لابوريس نيسي أوت أليكويب إكس إيا كومودو كونسيكوات. دويس أوتي إيرور دولور إن ريبرهينديريت إن فولوبتات فيليت إيس سيليم دولور يو فوجيات نولا بارياتور. إكسسيبتور سنت أوككاكات كيوبيدتات نون برويدينت، سونت إن كولبا كي أوفيسيا ديسيريونت مولليت أنيم إد إست لابوروم. كيوريبيتور بريتيوم تينسيدونت لاكوس. نيولا غرافيدا أورسي أ أوديو. نيولام فارياس، توربيس إت كومودو فهرترا، إست إيروس بيبيندوم إيليت، نيك لوكتوس ماغنا فيليس سولليتشيتودين ماوريس. إنتيغر إن ماوريس يو نيبه إيوسيمود غرافيدا. دويس أك تيلوس إت ريزيز فلفوتا فيهيكول</p>"}',
                'slug' => 'anatomy-31',
                'is_active' => 1,
                'is_featured' => 0,
                'image' => '/images/doctor_archives/66ead8d2b148a.png',
                'location' => NULL,
                'created_at' => '2024-09-18 18:42:42',
                'updated_at' => '2024-09-18 18:42:42',
                'deleted_at' => NULL,
            ),
        ));
        \DB::table('archives')->insert(array (
            0 => 
            array (
                'id' => 32,
                'doctor_id' => 75,
                'clinic_id' => NULL,
                'archive_category_id' => 2,
                'name' => '{"en":"Biochemistry","hi":"क्विज़ प्रतियोगिता","ar":"مسابقة معلومات"}',
                'description' => '{"en":"<p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum. Curabitur pretium tincidunt lacus. Nulla gravida orci a odio. Nullam varius, turpis et commodo pharetra, est eros bibendum elit, nec luctus magna felis sollicitudin mauris. Integer in mauris eu nibh euismod gravida. Duis ac tellus et risus vulputate vehicula. Donec lobortis risus a elit. Etiam tempor. Ut ullamcorper, ligula eu tempor congue, eros est euismod turpis, id tincidunt sapien risus a quam. Maecenas fermentum, sem in pharetra pellentesque.</p>","hi":"<p>लोरेम इप्सम डोलर सिट अमेट, कॉन्सेक्टेचर अडिपिसिंग एलीट. सेड डो ईयूसमोड टेम्पोर इन्सीडिडुंट उत लेबोरे एट डोलोरे मैग्ना एलिक्वा. उत एनीम अद मिनिम वेनिआम, क्विस नोस्त्रुड एक्सर्सिटेशन उल्लाम्को लेबोर्स निसी उत अलीक्विप एक्स ए कोमोडो कोन्सेक्वात. डुइस औटे इरुरे डोलोर इन रेप्रिहेंडेरिट इन वोलुप्टेटे वेलिट एसे सिल्लुम डोलोरे यू फुगिअट नल्ला pariatur. एक्सेप्तेउर सिन्न्त ओककेकाट कपिडटात नोन प्रोइडेंट, सुंट इन कुल्पा क्वि ओफ्फिसिअ डेसेरुंत्त मोल्लिट एनिम इड एस्ट laborum. कुरबीतुर प्रेटियम टिंसिडुंट लाकुस. नुल्ला ग्रविधा ओर्सी अ ओडिओ. नुल्लम वारिउस, turpis एट commodo फेरेत्रा, एस्ट एरोस बिबेंदुम एलीट, नेक luctus magna felis sollicitudin mauris. इंटेगेर इन mauris यू nibh euismod gravida. डुइस अच tellus</p>","ar":"<p>لوريم ايبسوم دولار سيت أميت، كونسكتتور أديبيسشينغ إيليت. سيد دو إيوسيمود تيمبور إنسيديدونت أوت لابوري إت دولوري ماغنا أليكا. أوت إينيم أد مينيم فينيام، كويز نوسترود إكسرسيتاشيون أولامكو لابوريس نيسي أوت أليكويب إكس إيا كومودو كونسيكوات. دويس أوتي إيرور دولور إن ريبرهينديريت إن فولوبتات فيليت إيس سيليم دولور يو فوجيات نولا بارياتور. إكسسيبتور سنت أوككاكات كيوبيدتات نون برويدينت، سونت إن كولبا كي أوفيسيا ديسيريونت مولليت أنيم إد إست لابوروم. كيوريبيتور بريتيوم تينسيدونت لاكوس. نيولا غرافيدا أورسي أ أوديو. نيولام فارياس، توربيس إت كومودو فهرترا، إست إيروس بيبيندوم إيليت، نيك لوكتوس ماغنا فيليس سولليتشيتودين ماوريس. إنتيغر إن ماوريس يو نيبه إيوسيمود غرافيدا. دويس أك تيلوس إت ريزيز فلفوتا فيهيكول</p>"}',
                'slug' => 'biochemistry-32',
                'is_active' => 1,
                'is_featured' => 0,
                'image' => '/images/doctor_archives/66ead9024bfe5.png',
                'location' => NULL,
                'created_at' => '2024-09-18 18:43:30',
                'updated_at' => '2024-09-18 18:43:30',
                'deleted_at' => NULL,
            ),
        ));
        \DB::table('archives')->insert(array (
            0 => 
            array (
                'id' => 33,
                'doctor_id' => 75,
                'clinic_id' => NULL,
                'archive_category_id' => 2,
                'name' => '{"en":"Pathology","hi":"औद्योगिक डिज़ाइन","ar":"علم البيئة"}',
                'description' => '{"en":"<p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum. Curabitur pretium tincidunt lacus. Nulla gravida orci a odio. Nullam varius, turpis et commodo pharetra, est eros bibendum elit, nec luctus magna felis sollicitudin mauris. Integer in mauris eu nibh euismod gravida. Duis ac tellus et risus vulputate vehicula. Donec lobortis risus a elit. Etiam tempor. Ut ullamcorper, ligula eu tempor congue, eros est euismod turpis, id tincidunt sapien risus a quam. Maecenas fermentum, sem in pharetra pellentesque.</p>","hi":"<p>लोरेम इप्सम डोलर सिट अमेट, कॉन्सेक्टेचर अडिपिसिंग एलीट. सेड डो ईयूसमोड टेम्पोर इन्सीडिडुंट उत लेबोरे एट डोलोरे मैग्ना एलिक्वा. उत एनीम अद मिनिम वेनिआम, क्विस नोस्त्रुड एक्सर्सिटेशन उल्लाम्को लेबोर्स निसी उत अलीक्विप एक्स ए कोमोडो कोन्सेक्वात. डुइस औटे इरुरे डोलोर इन रेप्रिहेंडेरिट इन वोलुप्टेटे वेलिट एसे सिल्लुम डोलोरे यू फुगिअट नल्ला pariatur. एक्सेप्तेउर सिन्न्त ओककेकाट कपिडटात नोन प्रोइडेंट, सुंट इन कुल्पा क्वि ओफ्फिसिअ डेसेरुंत्त मोल्लिट एनिम इड एस्ट laborum. कुरबीतुर प्रेटियम टिंसिडुंट लाकुस. नुल्ला ग्रविधा ओर्सी अ ओडिओ. नुल्लम वारिउस, turpis एट commodo फेरेत्रा, एस्ट एरोस बिबेंदुम एलीट, नेक luctus magna felis sollicitudin mauris. इंटेगेर इन mauris यू nibh euismod gravida. डुइस अच tellus</p>","ar":"<p>لوريم ايبسوم دولار سيت أميت، كونسكتتور أديبيسشينغ إيليت. سيد دو إيوسيمود تيمبور إنسيديدونت أوت لابوري إت دولوري ماغنا أليكا. أوت إينيم أد مينيم فينيام، كويز نوسترود إكسرسيتاشيون أولامكو لابوريس نيسي أوت أليكويب إكس إيا كومودو كونسيكوات. دويس أوتي إيرور دولور إن ريبرهينديريت إن فولوبتات فيليت إيس سيليم دولور يو فوجيات نولا بارياتور. إكسسيبتور سنت أوككاكات كيوبيدتات نون برويدينت، سونت إن كولبا كي أوفيسيا ديسيريونت مولليت أنيم إد إست لابوروم. كيوريبيتور بريتيوم تينسيدونت لاكوس. نيولا غرافيدا أورسي أ أوديو. نيولام فارياس، توربيس إت كومودو فهرترا، إست إيروس بيبيندوم إيليت، نيك لوكتوس ماغنا فيليس سولليتشيتودين ماوريس. إنتيغر إن ماوريس يو نيبه إيوسيمود غرافيدا. دويس أك تيلوس إت ريزيز فلفوتا فيهيكول</p>"}',
                'slug' => 'pathology-33',
                'is_active' => 1,
                'is_featured' => 0,
                'image' => '/images/doctor_archives/66ead92dd29c1.png',
                'location' => NULL,
                'created_at' => '2024-09-18 18:44:13',
                'updated_at' => '2024-09-18 18:44:13',
                'deleted_at' => NULL,
            ),
        ));
        \DB::table('archives')->insert(array (
            0 => 
            array (
                'id' => 34,
                'doctor_id' => 76,
                'clinic_id' => NULL,
                'archive_category_id' => 2,
                'name' => '{"en":"Forensic Medicine","hi":"क्विज़ प्रतियोगिता","ar":"مسابقة معلومات"}',
                'description' => '{"en":"<p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum. Curabitur pretium tincidunt lacus. Nulla gravida orci a odio. Nullam varius, turpis et commodo pharetra, est eros bibendum elit, nec luctus magna felis sollicitudin mauris. Integer in mauris eu nibh euismod gravida. Duis ac tellus et risus vulputate vehicula. Donec lobortis risus a elit. Etiam tempor. Ut ullamcorper, ligula eu tempor congue, eros est euismod turpis, id tincidunt sapien risus a quam. Maecenas fermentum, sem in pharetra pellentesque.</p>","hi":"<p>लोरेम इप्सम डोलर सिट अमेट, कॉन्सेक्टेचर अडिपिसिंग एलीट. सेड डो ईयूसमोड टेम्पोर इन्सीडिडुंट उत लेबोरे एट डोलोरे मैग्ना एलिक्वा. उत एनीम अद मिनिम वेनिआम, क्विस नोस्त्रुड एक्सर्सिटेशन उल्लाम्को लेबोर्स निसी उत अलीक्विप एक्स ए कोमोडो कोन्सेक्वात. डुइस औटे इरुरे डोलोर इन रेप्रिहेंडेरिट इन वोलुप्टेटे वेलिट एसे सिल्लुम डोलोरे यू फुगिअट नल्ला pariatur. एक्सेप्तेउर सिन्न्त ओककेकाट कपिडटात नोन प्रोइडेंट, सुंट इन कुल्पा क्वि ओफ्फिसिअ डेसेरुंत्त मोल्लिट एनिम इड एस्ट laborum. कुरबीतुर प्रेटियम टिंसिडुंट लाकुस. नुल्ला ग्रविधा ओर्सी अ ओडिओ. नुल्लम वारिउस, turpis एट commodo फेरेत्रा, एस्ट एरोस बिबेंदुम एलीट, नेक luctus magna felis sollicitudin mauris. इंटेगेर इन mauris यू nibh euismod gravida. डुइस अच tellus</p>","ar":"<p>لوريم ايبسوم دولار سيت أميت، كونسكتتور أديبيسشينغ إيليت. سيد دو إيوسيمود تيمبور إنسيديدونت أوت لابوري إت دولوري ماغنا أليكا. أوت إينيم أد مينيم فينيام، كويز نوسترود إكسرسيتاشيون أولامكو لابوريس نيسي أوت أليكويب إكس إيا كومودو كونسيكوات. دويس أوتي إيرور دولور إن ريبرهينديريت إن فولوبتات فيليت إيس سيليم دولور يو فوجيات نولا بارياتور. إكسسيبتور سنت أوككاكات كيوبيدتات نون برويدينت، سونت إن كولبا كي أوفيسيا ديسيريونت مولليت أنيم إد إست لابوروم. كيوريبيتور بريتيوم تينسيدونت لاكوس. نيولا غرافيدا أورسي أ أوديو. نيولام فارياس، توربيس إت كومودو فهرترا، إست إيروس بيبيندوم إيليت، نيك لوكتوس ماغنا فيليس سولليتشيتودين ماوريس. إنتيغر إن ماوريس يو نيبه إيوسيمود غرافيدا. دويس أك تيلوس إت ريزيز فلفوتا فيهيكول</p>"}',
                'slug' => 'forensic-medicine-34',
                'is_active' => 1,
                'is_featured' => 0,
                'image' => '/images/doctor_archives/66ead98682196.png',
                'location' => NULL,
                'created_at' => '2024-09-18 18:45:42',
                'updated_at' => '2024-09-18 18:45:42',
                'deleted_at' => NULL,
            ),
        ));
        \DB::table('archives')->insert(array (
            0 => 
            array (
                'id' => 35,
                'doctor_id' => 76,
                'clinic_id' => NULL,
                'archive_category_id' => 1,
                'name' => '{"en":"General Surgery","hi":"सामान्य बुद्धि शिक्षा ब्लॉग","ar":"مدونة التعليم بالمنطق السليم"}',
                'description' => '{"en":"<p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum. Curabitur pretium tincidunt lacus. Nulla gravida orci a odio. Nullam varius, turpis et commodo pharetra, est eros bibendum elit, nec luctus magna felis sollicitudin mauris. Integer in mauris eu nibh euismod gravida. Duis ac tellus et risus vulputate vehicula. Donec lobortis risus a elit. Etiam tempor. Ut ullamcorper, ligula eu tempor congue, eros est euismod turpis, id tincidunt sapien risus a quam. Maecenas fermentum, sem in pharetra pellentesque.</p>","hi":"<p>लोरेम इप्सम डोलर सिट अमेट, कॉन्सेक्टेचर अडिपिसिंग एलीट. सेड डो ईयूसमोड टेम्पोर इन्सीडिडुंट उत लेबोरे एट डोलोरे मैग्ना एलिक्वा. उत एनीम अद मिनिम वेनिआम, क्विस नोस्त्रुड एक्सर्सिटेशन उल्लाम्को लेबोर्स निसी उत अलीक्विप एक्स ए कोमोडो कोन्सेक्वात. डुइस औटे इरुरे डोलोर इन रेप्रिहेंडेरिट इन वोलुप्टेटे वेलिट एसे सिल्लुम डोलोरे यू फुगिअट नल्ला pariatur. एक्सेप्तेउर सिन्न्त ओककेकाट कपिडटात नोन प्रोइडेंट, सुंट इन कुल्पा क्वि ओफ्फिसिअ डेसेरुंत्त मोल्लिट एनिम इड एस्ट laborum. कुरबीतुर प्रेटियम टिंसिडुंट लाकुस. नुल्ला ग्रविधा ओर्सी अ ओडिओ. नुल्लम वारिउस, turpis एट commodo फेरेत्रा, एस्ट एरोस बिबेंदुम एलीट, नेक luctus magna felis sollicitudin mauris. इंटेगेर इन mauris यू nibh euismod gravida. डुइस अच tellus</p>","ar":"<p>لوريم ايبسوم دولار سيت أميت، كونسكتتور أديبيسشينغ إيليت. سيد دو إيوسيمود تيمبور إنسيديدونت أوت لابوري إت دولوري ماغنا أليكا. أوت إينيم أد مينيم فينيام، كويز نوسترود إكسرسيتاشيون أولامكو لابوريس نيسي أوت أليكويب إكس إيا كومودو كونسيكوات. دويس أوتي إيرور دولور إن ريبرهينديريت إن فولوبتات فيليت إيس سيليم دولور يو فوجيات نولا بارياتور. إكسسيبتور سنت أوككاكات كيوبيدتات نون برويدينت، سونت إن كولبا كي أوفيسيا ديسيريونت مولليت أنيم إد إست لابوروم. كيوريبيتور بريتيوم تينسيدونت لاكوس. نيولا غرافيدا أورسي أ أوديو. نيولام فارياس، توربيس إت كومودو فهرترا، إست إيروس بيبيندوم إيليت، نيك لوكتوس ماغنا فيليس سولليتشيتودين ماوريس. إنتيغر إن ماوريس يو نيبه إيوسيمود غرافيدا. دويس أك تيلوس إت ريزيز فلفوتا فيهيكول</p>"}',
                'slug' => 'general-surgery-35',
                'is_active' => 1,
                'is_featured' => 0,
                'image' => '/images/doctor_archives/66ead9ac5d091.png',
                'location' => NULL,
                'created_at' => '2024-09-18 18:46:20',
                'updated_at' => '2024-09-18 18:46:20',
                'deleted_at' => NULL,
            ),
        ));
        \DB::table('archives')->insert(array (
            0 => 
            array (
                'id' => 36,
                'doctor_id' => 76,
                'clinic_id' => NULL,
                'archive_category_id' => 2,
                'name' => '{"en":"Pharmacology","hi":"कृत्रिम बुद्धिमत्ता","ar":"فعالية الخطاب التعليمي"}',
                'description' => '{"en":"<p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum. Curabitur pretium tincidunt lacus. Nulla gravida orci a odio. Nullam varius, turpis et commodo pharetra, est eros bibendum elit, nec luctus magna felis sollicitudin mauris. Integer in mauris eu nibh euismod gravida. Duis ac tellus et risus vulputate vehicula. Donec lobortis risus a elit. Etiam tempor. Ut ullamcorper, ligula eu tempor congue, eros est euismod turpis, id tincidunt sapien risus a quam. Maecenas fermentum, sem in pharetra pellentesque.</p>","hi":"<p>लोरेम इप्सम डोलर सिट अमेट, कॉन्सेक्टेचर अडिपिसिंग एलीट. सेड डो ईयूसमोड टेम्पोर इन्सीडिडुंट उत लेबोरे एट डोलोरे मैग्ना एलिक्वा. उत एनीम अद मिनिम वेनिआम, क्विस नोस्त्रुड एक्सर्सिटेशन उल्लाम्को लेबोर्स निसी उत अलीक्विप एक्स ए कोमोडो कोन्सेक्वात. डुइस औटे इरुरे डोलोर इन रेप्रिहेंडेरिट इन वोलुप्टेटे वेलिट एसे सिल्लुम डोलोरे यू फुगिअट नल्ला pariatur. एक्सेप्तेउर सिन्न्त ओककेकाट कपिडटात नोन प्रोइडेंट, सुंट इन कुल्पा क्वि ओफ्फिसिअ डेसेरुंत्त मोल्लिट एनिम इड एस्ट laborum. कुरबीतुर प्रेटियम टिंसिडुंट लाकुस. नुल्ला ग्रविधा ओर्सी अ ओडिओ. नुल्लम वारिउस, turpis एट commodo फेरेत्रा, एस्ट एरोस बिबेंदुम एलीट, नेक luctus magna felis sollicitudin mauris. इंटेगेर इन mauris यू nibh euismod gravida. डुइस अच tellus</p>","ar":"<p>لوريم ايبسوم دولار سيت أميت، كونسكتتور أديبيسشينغ إيليت. سيد دو إيوسيمود تيمبور إنسيديدونت أوت لابوري إت دولوري ماغنا أليكا. أوت إينيم أد مينيم فينيام، كويز نوسترود إكسرسيتاشيون أولامكو لابوريس نيسي أوت أليكويب إكس إيا كومودو كونسيكوات. دويس أوتي إيرور دولور إن ريبرهينديريت إن فولوبتات فيليت إيس سيليم دولور يو فوجيات نولا بارياتور. إكسسيبتور سنت أوككاكات كيوبيدتات نون برويدينت، سونت إن كولبا كي أوفيسيا ديسيريونت مولليت أنيم إد إست لابوروم. كيوريبيتور بريتيوم تينسيدونت لاكوس. نيولا غرافيدا أورسي أ أوديو. نيولام فارياس، توربيس إت كومودو فهرترا، إست إيروس بيبيندوم إيليت، نيك لوكتوس ماغنا فيليس سولليتشيتودين ماوريس. إنتيغر إن ماوريس يو نيبه إيوسيمود غرافيدا. دويس أك تيلوس إت ريزيز فلفوتا فيهيكول</p>"}',
                'slug' => 'pharmacology-36',
                'is_active' => 1,
                'is_featured' => 0,
                'image' => '/images/doctor_archives/66ead9e1a1709.png',
                'location' => NULL,
                'created_at' => '2024-09-18 18:47:13',
                'updated_at' => '2024-09-18 18:47:13',
                'deleted_at' => NULL,
            ),
        ));
        \DB::table('archives')->insert(array (
            0 => 
            array (
                'id' => 37,
                'doctor_id' => 77,
                'clinic_id' => NULL,
                'archive_category_id' => 1,
                'name' => '{"en":"Anesthesiology","hi":"औद्योगिक डिज़ाइन","ar":"فعالية الخطاب التعليمي"}',
                'description' => '{"en":"<p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum. Curabitur pretium tincidunt lacus. Nulla gravida orci a odio. Nullam varius, turpis et commodo pharetra, est eros bibendum elit, nec luctus magna felis sollicitudin mauris. Integer in mauris eu nibh euismod gravida. Duis ac tellus et risus vulputate vehicula. Donec lobortis risus a elit. Etiam tempor. Ut ullamcorper, ligula eu tempor congue, eros est euismod turpis, id tincidunt sapien risus a quam. Maecenas fermentum, sem in pharetra pellentesque.</p>","hi":"<p>लोरेम इप्सम डोलर सिट अमेट, कॉन्सेक्टेचर अडिपिसिंग एलीट. सेड डो ईयूसमोड टेम्पोर इन्सीडिडुंट उत लेबोरे एट डोलोरे मैग्ना एलिक्वा. उत एनीम अद मिनिम वेनिआम, क्विस नोस्त्रुड एक्सर्सिटेशन उल्लाम्को लेबोर्स निसी उत अलीक्विप एक्स ए कोमोडो कोन्सेक्वात. डुइस औटे इरुरे डोलोर इन रेप्रिहेंडेरिट इन वोलुप्टेटे वेलिट एसे सिल्लुम डोलोरे यू फुगिअट नल्ला pariatur. एक्सेप्तेउर सिन्न्त ओककेकाट कपिडटात नोन प्रोइडेंट, सुंट इन कुल्पा क्वि ओफ्फिसिअ डेसेरुंत्त मोल्लिट एनिम इड एस्ट laborum. कुरबीतुर प्रेटियम टिंसिडुंट लाकुस. नुल्ला ग्रविधा ओर्सी अ ओडिओ. नुल्लम वारिउस, turpis एट commodo फेरेत्रा, एस्ट एरोस बिबेंदुम एलीट, नेक luctus magna felis sollicitudin mauris. इंटेगेर इन mauris यू nibh euismod gravida. डुइस अच tellus</p>","ar":"<p>لوريم ايبسوم دولار سيت أميت، كونسكتتور أديبيسشينغ إيليت. سيد دو إيوسيمود تيمبور إنسيديدونت أوت لابوري إت دولوري ماغنا أليكا. أوت إينيم أد مينيم فينيام، كويز نوسترود إكسرسيتاشيون أولامكو لابوريس نيسي أوت أليكويب إكس إيا كومودو كونسيكوات. دويس أوتي إيرور دولور إن ريبرهينديريت إن فولوبتات فيليت إيس سيليم دولور يو فوجيات نولا بارياتور. إكسسيبتور سنت أوككاكات كيوبيدتات نون برويدينت، سونت إن كولبا كي أوفيسيا ديسيريونت مولليت أنيم إد إست لابوروم. كيوريبيتور بريتيوم تينسيدونت لاكوس. نيولا غرافيدا أورسي أ أوديو. نيولام فارياس، توربيس إت كومودو فهرترا، إست إيروس بيبيندوم إيليت، نيك لوكتوس ماغنا فيليس سولليتشيتودين ماوريس. إنتيغر إن ماوريس يو نيبه إيوسيمود غرافيدا. دويس أك تيلوس إت ريزيز فلفوتا فيهيكول</p>"}',
                'slug' => 'anesthesiology-37',
                'is_active' => 1,
                'is_featured' => 0,
                'image' => '/images/doctor_archives/66eada1b2ab2c.png',
                'location' => NULL,
                'created_at' => '2024-09-18 18:48:11',
                'updated_at' => '2024-09-18 18:48:11',
                'deleted_at' => NULL,
            ),
        ));
        \DB::table('archives')->insert(array (
            0 => 
            array (
                'id' => 38,
                'doctor_id' => 77,
                'clinic_id' => NULL,
                'archive_category_id' => 1,
                'name' => '{"en":"Dermatology","hi":"सामान्य बुद्धि शिक्षा ब्लॉग","ar":"علم البيئة"}',
                'description' => '{"en":"<p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum. Curabitur pretium tincidunt lacus. Nulla gravida orci a odio. Nullam varius, turpis et commodo pharetra, est eros bibendum elit, nec luctus magna felis sollicitudin mauris. Integer in mauris eu nibh euismod gravida. Duis ac tellus et risus vulputate vehicula. Donec lobortis risus a elit. Etiam tempor. Ut ullamcorper, ligula eu tempor congue, eros est euismod turpis, id tincidunt sapien risus a quam. Maecenas fermentum, sem in pharetra pellentesque.</p>","hi":"<p>लोरेम इप्सम डोलर सिट अमेट, कॉन्सेक्टेचर अडिपिसिंग एलीट. सेड डो ईयूसमोड टेम्पोर इन्सीडिडुंट उत लेबोरे एट डोलोरे मैग्ना एलिक्वा. उत एनीम अद मिनिम वेनिआम, क्विस नोस्त्रुड एक्सर्सिटेशन उल्लाम्को लेबोर्स निसी उत अलीक्विप एक्स ए कोमोडो कोन्सेक्वात. डुइस औटे इरुरे डोलोर इन रेप्रिहेंडेरिट इन वोलुप्टेटे वेलिट एसे सिल्लुम डोलोरे यू फुगिअट नल्ला pariatur. एक्सेप्तेउर सिन्न्त ओककेकाट कपिडटात नोन प्रोइडेंट, सुंट इन कुल्पा क्वि ओफ्फिसिअ डेसेरुंत्त मोल्लिट एनिम इड एस्ट laborum. कुरबीतुर प्रेटियम टिंसिडुंट लाकुस. नुल्ला ग्रविधा ओर्सी अ ओडिओ. नुल्लम वारिउस, turpis एट commodo फेरेत्रा, एस्ट एरोस बिबेंदुम एलीट, नेक luctus magna felis sollicitudin mauris. इंटेगेर इन mauris यू nibh euismod gravida. डुइस अच tellus</p>","ar":"<p>لوريم ايبسوم دولار سيت أميت، كونسكتتور أديبيسشينغ إيليت. سيد دو إيوسيمود تيمبور إنسيديدونت أوت لابوري إت دولوري ماغنا أليكا. أوت إينيم أد مينيم فينيام، كويز نوسترود إكسرسيتاشيون أولامكو لابوريس نيسي أوت أليكويب إكس إيا كومودو كونسيكوات. دويس أوتي إيرور دولور إن ريبرهينديريت إن فولوبتات فيليت إيس سيليم دولور يو فوجيات نولا بارياتور. إكسسيبتور سنت أوككاكات كيوبيدتات نون برويدينت، سونت إن كولبا كي أوفيسيا ديسيريونت مولليت أنيم إد إست لابوروم. كيوريبيتور بريتيوم تينسيدونت لاكوس. نيولا غرافيدا أورسي أ أوديو. نيولام فارياس، توربيس إت كومودو فهرترا، إست إيروس بيبيندوم إيليت، نيك لوكتوس ماغنا فيليس سولليتشيتودين ماوريس. إنتيغر إن ماوريس يو نيبه إيوسيمود غرافيدا. دويس أك تيلوس إت ريزيز فلفوتا فيهيكول</p>"}',
                'slug' => 'dermatology-38',
                'is_active' => 1,
                'is_featured' => 0,
                'image' => '/images/doctor_archives/66eada3fe69db.png',
                'location' => NULL,
                'created_at' => '2024-09-18 18:48:47',
                'updated_at' => '2024-09-18 18:48:47',
                'deleted_at' => NULL,
            ),
        ));
        \DB::table('archives')->insert(array (
            0 => 
            array (
                'id' => 39,
                'doctor_id' => 77,
                'clinic_id' => NULL,
                'archive_category_id' => 2,
                'name' => '{"en":"Ophthalmology","hi":"शैक्षिक भाषण समारोह","ar":"الذكاء الاصطناعي"}',
                'description' => '{"en":"<p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum. Curabitur pretium tincidunt lacus. Nulla gravida orci a odio. Nullam varius, turpis et commodo pharetra, est eros bibendum elit, nec luctus magna felis sollicitudin mauris. Integer in mauris eu nibh euismod gravida. Duis ac tellus et risus vulputate vehicula. Donec lobortis risus a elit. Etiam tempor. Ut ullamcorper, ligula eu tempor congue, eros est euismod turpis, id tincidunt sapien risus a quam. Maecenas fermentum, sem in pharetra pellentesque.</p>","hi":"<p>लोरेम इप्सम डोलर सिट अमेट, कॉन्सेक्टेचर अडिपिसिंग एलीट. सेड डो ईयूसमोड टेम्पोर इन्सीडिडुंट उत लेबोरे एट डोलोरे मैग्ना एलिक्वा. उत एनीम अद मिनिम वेनिआम, क्विस नोस्त्रुड एक्सर्सिटेशन उल्लाम्को लेबोर्स निसी उत अलीक्विप एक्स ए कोमोडो कोन्सेक्वात. डुइस औटे इरुरे डोलोर इन रेप्रिहेंडेरिट इन वोलुप्टेटे वेलिट एसे सिल्लुम डोलोरे यू फुगिअट नल्ला pariatur. एक्सेप्तेउर सिन्न्त ओककेकाट कपिडटात नोन प्रोइडेंट, सुंट इन कुल्पा क्वि ओफ्फिसिअ डेसेरुंत्त मोल्लिट एनिम इड एस्ट laborum. कुरबीतुर प्रेटियम टिंसिडुंट लाकुस. नुल्ला ग्रविधा ओर्सी अ ओडिओ. नुल्लम वारिउस, turpis एट commodo फेरेत्रा, एस्ट एरोस बिबेंदुम एलीट, नेक luctus magna felis sollicitudin mauris. इंटेगेर इन mauris यू nibh euismod gravida. डुइस अच tellus</p>","ar":"<p>لوريم ايبسوم دولار سيت أميت، كونسكتتور أديبيسشينغ إيليت. سيد دو إيوسيمود تيمبور إنسيديدونت أوت لابوري إت دولوري ماغنا أليكا. أوت إينيم أد مينيم فينيام، كويز نوسترود إكسرسيتاشيون أولامكو لابوريس نيسي أوت أليكويب إكس إيا كومودو كونسيكوات. دويس أوتي إيرور دولور إن ريبرهينديريت إن فولوبتات فيليت إيس سيليم دولور يو فوجيات نولا بارياتور. إكسسيبتور سنت أوككاكات كيوبيدتات نون برويدينت، سونت إن كولبا كي أوفيسيا ديسيريونت مولليت أنيم إد إست لابوروم. كيوريبيتور بريتيوم تينسيدونت لاكوس. نيولا غرافيدا أورسي أ أوديو. نيولام فارياس، توربيس إت كومودو فهرترا، إست إيروس بيبيندوم إيليت، نيك لوكتوس ماغنا فيليس سولليتشيتودين ماوريس. إنتيغر إن ماوريس يو نيبه إيوسيمود غرافيدا. دويس أك تيلوس إت ريزيز فلفوتا فيهيكول</p>"}',
                'slug' => 'ophthalmology-39',
                'is_active' => 1,
                'is_featured' => 0,
                'image' => '/images/doctor_archives/66eada70eb3ad.png',
                'location' => NULL,
                'created_at' => '2024-09-18 18:49:36',
                'updated_at' => '2024-09-18 18:49:36',
                'deleted_at' => NULL,
            ),
        ));
        \DB::table('archives')->insert(array (
            0 => 
            array (
                'id' => 40,
                'doctor_id' => 78,
                'clinic_id' => NULL,
                'archive_category_id' => 1,
                'name' => '{"en":"Cardiothoracic Surgery","hi":"औद्योगिक डिज़ाइन","ar":"مسابقة معلومات"}',
                'description' => '{"en":"<p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum. Curabitur pretium tincidunt lacus. Nulla gravida orci a odio. Nullam varius, turpis et commodo pharetra, est eros bibendum elit, nec luctus magna felis sollicitudin mauris. Integer in mauris eu nibh euismod gravida. Duis ac tellus et risus vulputate vehicula. Donec lobortis risus a elit. Etiam tempor. Ut ullamcorper, ligula eu tempor congue, eros est euismod turpis, id tincidunt sapien risus a quam. Maecenas fermentum, sem in pharetra pellentesque.</p>","hi":"<p>लोरेम इप्सम डोलर सिट अमेट, कॉन्सेक्टेचर अडिपिसिंग एलीट. सेड डो ईयूसमोड टेम्पोर इन्सीडिडुंट उत लेबोरे एट डोलोरे मैग्ना एलिक्वा. उत एनीम अद मिनिम वेनिआम, क्विस नोस्त्रुड एक्सर्सिटेशन उल्लाम्को लेबोर्स निसी उत अलीक्विप एक्स ए कोमोडो कोन्सेक्वात. डुइस औटे इरुरे डोलोर इन रेप्रिहेंडेरिट इन वोलुप्टेटे वेलिट एसे सिल्लुम डोलोरे यू फुगिअट नल्ला pariatur. एक्सेप्तेउर सिन्न्त ओककेकाट कपिडटात नोन प्रोइडेंट, सुंट इन कुल्पा क्वि ओफ्फिसिअ डेसेरुंत्त मोल्लिट एनिम इड एस्ट laborum. कुरबीतुर प्रेटियम टिंसिडुंट लाकुस. नुल्ला ग्रविधा ओर्सी अ ओडिओ. नुल्लम वारिउस, turpis एट commodo फेरेत्रा, एस्ट एरोस बिबेंदुम एलीट, नेक luctus magna felis sollicitudin mauris. इंटेगेर इन mauris यू nibh euismod gravida. डुइस अच tellus</p>","ar":"<p>لوريم ايبسوم دولار سيت أميت، كونسكتتور أديبيسشينغ إيليت. سيد دو إيوسيمود تيمبور إنسيديدونت أوت لابوري إت دولوري ماغنا أليكا. أوت إينيم أد مينيم فينيام، كويز نوسترود إكسرسيتاشيون أولامكو لابوريس نيسي أوت أليكويب إكس إيا كومودو كونسيكوات. دويس أوتي إيرور دولور إن ريبرهينديريت إن فولوبتات فيليت إيس سيليم دولور يو فوجيات نولا بارياتور. إكسسيبتور سنت أوككاكات كيوبيدتات نون برويدينت، سونت إن كولبا كي أوفيسيا ديسيريونت مولليت أنيم إد إست لابوروم. كيوريبيتور بريتيوم تينسيدونت لاكوس. نيولا غرافيدا أورسي أ أوديو. نيولام فارياس، توربيس إت كومودو فهرترا، إست إيروس بيبيندوم إيليت، نيك لوكتوس ماغنا فيليس سولليتشيتودين ماوريس. إنتيغر إن ماوريس يو نيبه إيوسيمود غرافيدا. دويس أك تيلوس إت ريزيز فلفوتا فيهيكول</p>"}',
                'slug' => 'cardiothoracic-surgery-40',
                'is_active' => 1,
                'is_featured' => 0,
                'image' => '/images/doctor_archives/66eadaac3c0a7.png',
                'location' => NULL,
                'created_at' => '2024-09-18 18:50:36',
                'updated_at' => '2024-09-18 18:50:36',
                'deleted_at' => NULL,
            ),
        ));
        \DB::table('archives')->insert(array (
            0 => 
            array (
                'id' => 41,
                'doctor_id' => 78,
                'clinic_id' => NULL,
                'archive_category_id' => 1,
                'name' => '{"en":"Endocrinology","hi":"क्विज़ प्रतियोगिता","ar":"فعالية الخطاب التعليمي"}',
                'description' => '{"en":"<p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum. Curabitur pretium tincidunt lacus. Nulla gravida orci a odio. Nullam varius, turpis et commodo pharetra, est eros bibendum elit, nec luctus magna felis sollicitudin mauris. Integer in mauris eu nibh euismod gravida. Duis ac tellus et risus vulputate vehicula. Donec lobortis risus a elit. Etiam tempor. Ut ullamcorper, ligula eu tempor congue, eros est euismod turpis, id tincidunt sapien risus a quam. Maecenas fermentum, sem in pharetra pellentesque.</p>","hi":"<p>लोरेम इप्सम डोलर सिट अमेट, कॉन्सेक्टेचर अडिपिसिंग एलीट. सेड डो ईयूसमोड टेम्पोर इन्सीडिडुंट उत लेबोरे एट डोलोरे मैग्ना एलिक्वा. उत एनीम अद मिनिम वेनिआम, क्विस नोस्त्रुड एक्सर्सिटेशन उल्लाम्को लेबोर्स निसी उत अलीक्विप एक्स ए कोमोडो कोन्सेक्वात. डुइस औटे इरुरे डोलोर इन रेप्रिहेंडेरिट इन वोलुप्टेटे वेलिट एसे सिल्लुम डोलोरे यू फुगिअट नल्ला pariatur. एक्सेप्तेउर सिन्न्त ओककेकाट कपिडटात नोन प्रोइडेंट, सुंट इन कुल्पा क्वि ओफ्फिसिअ डेसेरुंत्त मोल्लिट एनिम इड एस्ट laborum. कुरबीतुर प्रेटियम टिंसिडुंट लाकुस. नुल्ला ग्रविधा ओर्सी अ ओडिओ. नुल्लम वारिउस, turpis एट commodo फेरेत्रा, एस्ट एरोस बिबेंदुम एलीट, नेक luctus magna felis sollicitudin mauris. इंटेगेर इन mauris यू nibh euismod gravida. डुइस अच tellus</p>","ar":"<p>لوريم ايبسوم دولار سيت أميت، كونسكتتور أديبيسشينغ إيليت. سيد دو إيوسيمود تيمبور إنسيديدونت أوت لابوري إت دولوري ماغنا أليكا. أوت إينيم أد مينيم فينيام، كويز نوسترود إكسرسيتاشيون أولامكو لابوريس نيسي أوت أليكويب إكس إيا كومودو كونسيكوات. دويس أوتي إيرور دولور إن ريبرهينديريت إن فولوبتات فيليت إيس سيليم دولور يو فوجيات نولا بارياتور. إكسسيبتور سنت أوككاكات كيوبيدتات نون برويدينت، سونت إن كولبا كي أوفيسيا ديسيريونت مولليت أنيم إد إست لابوروم. كيوريبيتور بريتيوم تينسيدونت لاكوس. نيولا غرافيدا أورسي أ أوديو. نيولام فارياس، توربيس إت كومودو فهرترا، إست إيروس بيبيندوم إيليت، نيك لوكتوس ماغنا فيليس سولليتشيتودين ماوريس. إنتيغر إن ماوريس يو نيبه إيوسيمود غرافيدا. دويس أك تيلوس إت ريزيز فلفوتا فيهيكول</p>"}',
                'slug' => 'endocrinology-41',
                'is_active' => 1,
                'is_featured' => 0,
                'image' => '/images/doctor_archives/66eadae85d2e1.png',
                'location' => NULL,
                'created_at' => '2024-09-18 18:51:36',
                'updated_at' => '2024-09-18 18:51:36',
                'deleted_at' => NULL,
            ),
        ));
        \DB::table('archives')->insert(array (
            0 => 
            array (
                'id' => 42,
                'doctor_id' => 78,
                'clinic_id' => NULL,
                'archive_category_id' => 1,
                'name' => '{"en":"Trauma Management","hi":"क्विज़ प्रतियोगिता","ar":"مسابقة معلومات"}',
                'description' => '{"en":"<p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum. Curabitur pretium tincidunt lacus. Nulla gravida orci a odio. Nullam varius, turpis et commodo pharetra, est eros bibendum elit, nec luctus magna felis sollicitudin mauris. Integer in mauris eu nibh euismod gravida. Duis ac tellus et risus vulputate vehicula. Donec lobortis risus a elit. Etiam tempor. Ut ullamcorper, ligula eu tempor congue, eros est euismod turpis, id tincidunt sapien risus a quam. Maecenas fermentum, sem in pharetra pellentesque.</p>","hi":"<p>लोरेम इप्सम डोलर सिट अमेट, कॉन्सेक्टेचर अडिपिसिंग एलीट. सेड डो ईयूसमोड टेम्पोर इन्सीडिडुंट उत लेबोरे एट डोलोरे मैग्ना एलिक्वा. उत एनीम अद मिनिम वेनिआम, क्विस नोस्त्रुड एक्सर्सिटेशन उल्लाम्को लेबोर्स निसी उत अलीक्विप एक्स ए कोमोडो कोन्सेक्वात. डुइस औटे इरुरे डोलोर इन रेप्रिहेंडेरिट इन वोलुप्टेटे वेलिट एसे सिल्लुम डोलोरे यू फुगिअट नल्ला pariatur. एक्सेप्तेउर सिन्न्त ओककेकाट कपिडटात नोन प्रोइडेंट, सुंट इन कुल्पा क्वि ओफ्फिसिअ डेसेरुंत्त मोल्लिट एनिम इड एस्ट laborum. कुरबीतुर प्रेटियम टिंसिडुंट लाकुस. नुल्ला ग्रविधा ओर्सी अ ओडिओ. नुल्लम वारिउस, turpis एट commodo फेरेत्रा, एस्ट एरोस बिबेंदुम एलीट, नेक luctus magna felis sollicitudin mauris. इंटेगेर इन mauris यू nibh euismod gravida. डुइस अच tellus</p>","ar":"<p>لوريم ايبسوم دولار سيت أميت، كونسكتتور أديبيسشينغ إيليت. سيد دو إيوسيمود تيمبور إنسيديدونت أوت لابوري إت دولوري ماغنا أليكا. أوت إينيم أد مينيم فينيام، كويز نوسترود إكسرسيتاشيون أولامكو لابوريس نيسي أوت أليكويب إكس إيا كومودو كونسيكوات. دويس أوتي إيرور دولور إن ريبرهينديريت إن فولوبتات فيليت إيس سيليم دولور يو فوجيات نولا بارياتور. إكسسيبتور سنت أوككاكات كيوبيدتات نون برويدينت، سونت إن كولبا كي أوفيسيا ديسيريونت مولليت أنيم إد إست لابوروم. كيوريبيتور بريتيوم تينسيدونت لاكوس. نيولا غرافيدا أورسي أ أوديو. نيولام فارياس، توربيس إت كومودو فهرترا، إست إيروس بيبيندوم إيليت، نيك لوكتوس ماغنا فيليس سولليتشيتودين ماوريس. إنتيغر إن ماوريس يو نيبه إيوسيمود غرافيدا. دويس أك تيلوس إت ريزيز فلفوتا فيهيكول</p>"}',
                'slug' => 'trauma-management-42',
                'is_active' => 1,
                'is_featured' => 0,
                'image' => '/images/doctor_archives/66eadb0e96355.png',
                'location' => NULL,
                'created_at' => '2024-09-18 18:52:14',
                'updated_at' => '2024-09-18 18:52:14',
                'deleted_at' => NULL,
            ),
        ));
        \DB::table('archives')->insert(array (
            0 => 
            array (
                'id' => 43,
                'doctor_id' => 79,
                'clinic_id' => NULL,
                'archive_category_id' => 2,
                'name' => '{"en":"Gastroenterology","hi":"औद्योगिक डिज़ाइन","ar":"فعالية الخطاب التعليمي"}',
                'description' => '{"en":"<p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum. Curabitur pretium tincidunt lacus. Nulla gravida orci a odio. Nullam varius, turpis et commodo pharetra, est eros bibendum elit, nec luctus magna felis sollicitudin mauris. Integer in mauris eu nibh euismod gravida. Duis ac tellus et risus vulputate vehicula. Donec lobortis risus a elit. Etiam tempor. Ut ullamcorper, ligula eu tempor congue, eros est euismod turpis, id tincidunt sapien risus a quam. Maecenas fermentum, sem in pharetra pellentesque.</p>","hi":"<p>लोरेम इप्सम डोलर सिट अमेट, कॉन्सेक्टेचर अडिपिसिंग एलीट. सेड डो ईयूसमोड टेम्पोर इन्सीडिडुंट उत लेबोरे एट डोलोरे मैग्ना एलिक्वा. उत एनीम अद मिनिम वेनिआम, क्विस नोस्त्रुड एक्सर्सिटेशन उल्लाम्को लेबोर्स निसी उत अलीक्विप एक्स ए कोमोडो कोन्सेक्वात. डुइस औटे इरुरे डोलोर इन रेप्रिहेंडेरिट इन वोलुप्टेटे वेलिट एसे सिल्लुम डोलोरे यू फुगिअट नल्ला pariatur. एक्सेप्तेउर सिन्न्त ओककेकाट कपिडटात नोन प्रोइडेंट, सुंट इन कुल्पा क्वि ओफ्फिसिअ डेसेरुंत्त मोल्लिट एनिम इड एस्ट laborum. कुरबीतुर प्रेटियम टिंसिडुंट लाकुस. नुल्ला ग्रविधा ओर्सी अ ओडिओ. नुल्लम वारिउस, turpis एट commodo फेरेत्रा, एस्ट एरोस बिबेंदुम एलीट, नेक luctus magna felis sollicitudin mauris. इंटेगेर इन mauris यू nibh euismod gravida. डुइस अच tellus</p>","ar":"<p>لوريم ايبسوم دولار سيت أميت، كونسكتتور أديبيسشينغ إيليت. سيد دو إيوسيمود تيمبور إنسيديدونت أوت لابوري إت دولوري ماغنا أليكا. أوت إينيم أد مينيم فينيام، كويز نوسترود إكسرسيتاشيون أولامكو لابوريس نيسي أوت أليكويب إكس إيا كومودو كونسيكوات. دويس أوتي إيرور دولور إن ريبرهينديريت إن فولوبتات فيليت إيس سيليم دولور يو فوجيات نولا بارياتور. إكسسيبتور سنت أوككاكات كيوبيدتات نون برويدينت، سونت إن كولبا كي أوفيسيا ديسيريونت مولليت أنيم إد إست لابوروم. كيوريبيتور بريتيوم تينسيدونت لاكوس. نيولا غرافيدا أورسي أ أوديو. نيولام فارياس، توربيس إت كومودو فهرترا، إست إيروس بيبيندوم إيليت، نيك لوكتوس ماغنا فيليس سولليتشيتودين ماوريس. إنتيغر إن ماوريس يو نيبه إيوسيمود غرافيدا. دويس أك تيلوس إت ريزيز فلفوتا فيهيكول</p>"}',
                'slug' => 'gastroenterology-43',
                'is_active' => 1,
                'is_featured' => 0,
                'image' => '/images/doctor_archives/66eadb5eb5fa9.png',
                'location' => NULL,
                'created_at' => '2024-09-18 18:53:34',
                'updated_at' => '2024-09-18 18:53:34',
                'deleted_at' => NULL,
            ),
        ));
        \DB::table('archives')->insert(array (
            0 => 
            array (
                'id' => 44,
                'doctor_id' => 79,
                'clinic_id' => NULL,
                'archive_category_id' => 1,
                'name' => '{"en":"Palliative Care","hi":"क्विज़ प्रतियोगिता","ar":"علم البيئة"}',
                'description' => '{"en":"<p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum. Curabitur pretium tincidunt lacus. Nulla gravida orci a odio. Nullam varius, turpis et commodo pharetra, est eros bibendum elit, nec luctus magna felis sollicitudin mauris. Integer in mauris eu nibh euismod gravida. Duis ac tellus et risus vulputate vehicula. Donec lobortis risus a elit. Etiam tempor. Ut ullamcorper, ligula eu tempor congue, eros est euismod turpis, id tincidunt sapien risus a quam. Maecenas fermentum, sem in pharetra pellentesque.</p>","hi":"<p>लोरेम इप्सम डोलर सिट अमेट, कॉन्सेक्टेचर अडिपिसिंग एलीट. सेड डो ईयूसमोड टेम्पोर इन्सीडिडुंट उत लेबोरे एट डोलोरे मैग्ना एलिक्वा. उत एनीम अद मिनिम वेनिआम, क्विस नोस्त्रुड एक्सर्सिटेशन उल्लाम्को लेबोर्स निसी उत अलीक्विप एक्स ए कोमोडो कोन्सेक्वात. डुइस औटे इरुरे डोलोर इन रेप्रिहेंडेरिट इन वोलुप्टेटे वेलिट एसे सिल्लुम डोलोरे यू फुगिअट नल्ला pariatur. एक्सेप्तेउर सिन्न्त ओककेकाट कपिडटात नोन प्रोइडेंट, सुंट इन कुल्पा क्वि ओफ्फिसिअ डेसेरुंत्त मोल्लिट एनिम इड एस्ट laborum. कुरबीतुर प्रेटियम टिंसिडुंट लाकुस. नुल्ला ग्रविधा ओर्सी अ ओडिओ. नुल्लम वारिउस, turpis एट commodo फेरेत्रा, एस्ट एरोस बिबेंदुम एलीट, नेक luctus magna felis sollicitudin mauris. इंटेगेर इन mauris यू nibh euismod gravida. डुइस अच tellus</p>","ar":"<p>لوريم ايبسوم دولار سيت أميت، كونسكتتور أديبيسشينغ إيليت. سيد دو إيوسيمود تيمبور إنسيديدونت أوت لابوري إت دولوري ماغنا أليكا. أوت إينيم أد مينيم فينيام، كويز نوسترود إكسرسيتاشيون أولامكو لابوريس نيسي أوت أليكويب إكس إيا كومودو كونسيكوات. دويس أوتي إيرور دولور إن ريبرهينديريت إن فولوبتات فيليت إيس سيليم دولور يو فوجيات نولا بارياتور. إكسسيبتور سنت أوككاكات كيوبيدتات نون برويدينت، سونت إن كولبا كي أوفيسيا ديسيريونت مولليت أنيم إد إست لابوروم. كيوريبيتور بريتيوم تينسيدونت لاكوس. نيولا غرافيدا أورسي أ أوديو. نيولام فارياس، توربيس إت كومودو فهرترا، إست إيروس بيبيندوم إيليت، نيك لوكتوس ماغنا فيليس سولليتشيتودين ماوريس. إنتيغر إن ماوريس يو نيبه إيوسيمود غرافيدا. دويس أك تيلوس إت ريزيز فلفوتا فيهيكول</p>"}',
                'slug' => 'palliative-care-44',
                'is_active' => 1,
                'is_featured' => 0,
                'image' => '/images/doctor_archives/66eadb8e41cbf.png',
                'location' => NULL,
                'created_at' => '2024-09-18 18:54:22',
                'updated_at' => '2024-09-18 18:54:22',
                'deleted_at' => NULL,
            ),
        ));
        \DB::table('archives')->insert(array (
            0 => 
            array (
                'id' => 45,
                'doctor_id' => 79,
                'clinic_id' => NULL,
                'archive_category_id' => 2,
                'name' => '{"en":"Urology","hi":"कृत्रिम बुद्धिमत्ता","ar":"مدونة التعليم بالمنطق السليم"}',
                'description' => '{"en":"<p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum. Curabitur pretium tincidunt lacus. Nulla gravida orci a odio. Nullam varius, turpis et commodo pharetra, est eros bibendum elit, nec luctus magna felis sollicitudin mauris. Integer in mauris eu nibh euismod gravida. Duis ac tellus et risus vulputate vehicula. Donec lobortis risus a elit. Etiam tempor. Ut ullamcorper, ligula eu tempor congue, eros est euismod turpis, id tincidunt sapien risus a quam. Maecenas fermentum, sem in pharetra pellentesque.</p>","hi":"<p>लोरेम इप्सम डोलर सिट अमेट, कॉन्सेक्टेचर अडिपिसिंग एलीट. सेड डो ईयूसमोड टेम्पोर इन्सीडिडुंट उत लेबोरे एट डोलोरे मैग्ना एलिक्वा. उत एनीम अद मिनिम वेनिआम, क्विस नोस्त्रुड एक्सर्सिटेशन उल्लाम्को लेबोर्स निसी उत अलीक्विप एक्स ए कोमोडो कोन्सेक्वात. डुइस औटे इरुरे डोलोर इन रेप्रिहेंडेरिट इन वोलुप्टेटे वेलिट एसे सिल्लुम डोलोरे यू फुगिअट नल्ला pariatur. एक्सेप्तेउर सिन्न्त ओककेकाट कपिडटात नोन प्रोइडेंट, सुंट इन कुल्पा क्वि ओफ्फिसिअ डेसेरुंत्त मोल्लिट एनिम इड एस्ट laborum. कुरबीतुर प्रेटियम टिंसिडुंट लाकुस. नुल्ला ग्रविधा ओर्सी अ ओडिओ. नुल्लम वारिउस, turpis एट commodo फेरेत्रा, एस्ट एरोस बिबेंदुम एलीट, नेक luctus magna felis sollicitudin mauris. इंटेगेर इन mauris यू nibh euismod gravida. डुइस अच tellus</p>","ar":"<p>لوريم ايبسوم دولار سيت أميت، كونسكتتور أديبيسشينغ إيليت. سيد دو إيوسيمود تيمبور إنسيديدونت أوت لابوري إت دولوري ماغنا أليكا. أوت إينيم أد مينيم فينيام، كويز نوسترود إكسرسيتاشيون أولامكو لابوريس نيسي أوت أليكويب إكس إيا كومودو كونسيكوات. دويس أوتي إيرور دولور إن ريبرهينديريت إن فولوبتات فيليت إيس سيليم دولور يو فوجيات نولا بارياتور. إكسسيبتور سنت أوككاكات كيوبيدتات نون برويدينت، سونت إن كولبا كي أوفيسيا ديسيريونت مولليت أنيم إد إست لابوروم. كيوريبيتور بريتيوم تينسيدونت لاكوس. نيولا غرافيدا أورسي أ أوديو. نيولام فارياس، توربيس إت كومودو فهرترا، إست إيروس بيبيندوم إيليت، نيك لوكتوس ماغنا فيليس سولليتشيتودين ماوريس. إنتيغر إن ماوريس يو نيبه إيوسيمود غرافيدا. دويس أك تيلوس إت ريزيز فلفوتا فيهيكول</p>"}',
                'slug' => 'urology-45',
                'is_active' => 1,
                'is_featured' => 0,
                'image' => '/images/doctor_archives/66eadbbe8b9fa.png',
                'location' => NULL,
                'created_at' => '2024-09-18 18:55:10',
                'updated_at' => '2024-09-18 18:55:10',
                'deleted_at' => NULL,
            ),
        ));
        \DB::table('archives')->insert(array (
            0 => 
            array (
                'id' => 46,
                'doctor_id' => 80,
                'clinic_id' => NULL,
                'archive_category_id' => 1,
                'name' => '{"en":"Anatomy","hi":"क्विज़ प्रतियोगिता","ar":"مدونة التعليم بالمنطق السليم"}',
                'description' => '{"en":"<p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum. Curabitur pretium tincidunt lacus. Nulla gravida orci a odio. Nullam varius, turpis et commodo pharetra, est eros bibendum elit, nec luctus magna felis sollicitudin mauris. Integer in mauris eu nibh euismod gravida. Duis ac tellus et risus vulputate vehicula. Donec lobortis risus a elit. Etiam tempor. Ut ullamcorper, ligula eu tempor congue, eros est euismod turpis, id tincidunt sapien risus a quam. Maecenas fermentum, sem in pharetra pellentesque.</p>","hi":"<p>लोरेम इप्सम डोलर सिट अमेट, कॉन्सेक्टेचर अडिपिसिंग एलीट. सेड डो ईयूसमोड टेम्पोर इन्सीडिडुंट उत लेबोरे एट डोलोरे मैग्ना एलिक्वा. उत एनीम अद मिनिम वेनिआम, क्विस नोस्त्रुड एक्सर्सिटेशन उल्लाम्को लेबोर्स निसी उत अलीक्विप एक्स ए कोमोडो कोन्सेक्वात. डुइस औटे इरुरे डोलोर इन रेप्रिहेंडेरिट इन वोलुप्टेटे वेलिट एसे सिल्लुम डोलोरे यू फुगिअट नल्ला pariatur. एक्सेप्तेउर सिन्न्त ओककेकाट कपिडटात नोन प्रोइडेंट, सुंट इन कुल्पा क्वि ओफ्फिसिअ डेसेरुंत्त मोल्लिट एनिम इड एस्ट laborum. कुरबीतुर प्रेटियम टिंसिडुंट लाकुस. नुल्ला ग्रविधा ओर्सी अ ओडिओ. नुल्लम वारिउस, turpis एट commodo फेरेत्रा, एस्ट एरोस बिबेंदुम एलीट, नेक luctus magna felis sollicitudin mauris. इंटेगेर इन mauris यू nibh euismod gravida. डुइस अच tellus</p>","ar":"<p>لوريم ايبسوم دولار سيت أميت، كونسكتتور أديبيسشينغ إيليت. سيد دو إيوسيمود تيمبور إنسيديدونت أوت لابوري إت دولوري ماغنا أليكا. أوت إينيم أد مينيم فينيام، كويز نوسترود إكسرسيتاشيون أولامكو لابوريس نيسي أوت أليكويب إكس إيا كومودو كونسيكوات. دويس أوتي إيرور دولور إن ريبرهينديريت إن فولوبتات فيليت إيس سيليم دولور يو فوجيات نولا بارياتور. إكسسيبتور سنت أوككاكات كيوبيدتات نون برويدينت، سونت إن كولبا كي أوفيسيا ديسيريونت مولليت أنيم إد إست لابوروم. كيوريبيتور بريتيوم تينسيدونت لاكوس. نيولا غرافيدا أورسي أ أوديو. نيولام فارياس، توربيس إت كومودو فهرترا، إست إيروس بيبيندوم إيليت، نيك لوكتوس ماغنا فيليس سولليتشيتودين ماوريس. إنتيغر إن ماوريس يو نيبه إيوسيمود غرافيدا. دويس أك تيلوس إت ريزيز فلفوتا فيهيكول</p>"}',
                'slug' => 'anatomy-46',
                'is_active' => 1,
                'is_featured' => 0,
                'image' => '/images/doctor_archives/66eadc00914e1.png',
                'location' => NULL,
                'created_at' => '2024-09-18 18:56:16',
                'updated_at' => '2024-09-18 18:56:16',
                'deleted_at' => NULL,
            ),
        ));
        \DB::table('archives')->insert(array (
            0 => 
            array (
                'id' => 47,
                'doctor_id' => 80,
                'clinic_id' => NULL,
                'archive_category_id' => 1,
                'name' => '{"en":"Biochemistry","hi":"क्विज़ प्रतियोगिता","ar":"علم البيئة"}',
                'description' => '{"en":"<p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum. Curabitur pretium tincidunt lacus. Nulla gravida orci a odio. Nullam varius, turpis et commodo pharetra, est eros bibendum elit, nec luctus magna felis sollicitudin mauris. Integer in mauris eu nibh euismod gravida. Duis ac tellus et risus vulputate vehicula. Donec lobortis risus a elit. Etiam tempor. Ut ullamcorper, ligula eu tempor congue, eros est euismod turpis, id tincidunt sapien risus a quam. Maecenas fermentum, sem in pharetra pellentesque.</p>","hi":"<p>लोरेम इप्सम डोलर सिट अमेट, कॉन्सेक्टेचर अडिपिसिंग एलीट. सेड डो ईयूसमोड टेम्पोर इन्सीडिडुंट उत लेबोरे एट डोलोरे मैग्ना एलिक्वा. उत एनीम अद मिनिम वेनिआम, क्विस नोस्त्रुड एक्सर्सिटेशन उल्लाम्को लेबोर्स निसी उत अलीक्विप एक्स ए कोमोडो कोन्सेक्वात. डुइस औटे इरुरे डोलोर इन रेप्रिहेंडेरिट इन वोलुप्टेटे वेलिट एसे सिल्लुम डोलोरे यू फुगिअट नल्ला pariatur. एक्सेप्तेउर सिन्न्त ओककेकाट कपिडटात नोन प्रोइडेंट, सुंट इन कुल्पा क्वि ओफ्फिसिअ डेसेरुंत्त मोल्लिट एनिम इड एस्ट laborum. कुरबीतुर प्रेटियम टिंसिडुंट लाकुस. नुल्ला ग्रविधा ओर्सी अ ओडिओ. नुल्लम वारिउस, turpis एट commodo फेरेत्रा, एस्ट एरोस बिबेंदुम एलीट, नेक luctus magna felis sollicitudin mauris. इंटेगेर इन mauris यू nibh euismod gravida. डुइस अच tellus</p>","ar":"<p>لوريم ايبسوم دولار سيت أميت، كونسكتتور أديبيسشينغ إيليت. سيد دو إيوسيمود تيمبور إنسيديدونت أوت لابوري إت دولوري ماغنا أليكا. أوت إينيم أد مينيم فينيام، كويز نوسترود إكسرسيتاشيون أولامكو لابوريس نيسي أوت أليكويب إكس إيا كومودو كونسيكوات. دويس أوتي إيرور دولور إن ريبرهينديريت إن فولوبتات فيليت إيس سيليم دولور يو فوجيات نولا بارياتور. إكسسيبتور سنت أوككاكات كيوبيدتات نون برويدينت، سونت إن كولبا كي أوفيسيا ديسيريونت مولليت أنيم إد إست لابوروم. كيوريبيتور بريتيوم تينسيدونت لاكوس. نيولا غرافيدا أورسي أ أوديو. نيولام فارياس، توربيس إت كومودو فهرترا، إست إيروس بيبيندوم إيليت، نيك لوكتوس ماغنا فيليس سولليتشيتودين ماوريس. إنتيغر إن ماوريس يو نيبه إيوسيمود غرافيدا. دويس أك تيلوس إت ريزيز فلفوتا فيهيكول</p>"}',
                'slug' => 'biochemistry-47',
                'is_active' => 1,
                'is_featured' => 0,
                'image' => '/images/doctor_archives/66eadc2fe1c71.png',
                'location' => NULL,
                'created_at' => '2024-09-18 18:57:03',
                'updated_at' => '2024-09-18 18:57:03',
                'deleted_at' => NULL,
            ),
        ));
        \DB::table('archives')->insert(array (
            0 => 
            array (
                'id' => 48,
                'doctor_id' => 80,
                'clinic_id' => NULL,
                'archive_category_id' => 1,
                'name' => '{"en":"Pathology","hi":"औद्योगिक डिज़ाइन","ar":"فعالية الخطاب التعليمي"}',
                'description' => '{"en":"<p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum. Curabitur pretium tincidunt lacus. Nulla gravida orci a odio. Nullam varius, turpis et commodo pharetra, est eros bibendum elit, nec luctus magna felis sollicitudin mauris. Integer in mauris eu nibh euismod gravida. Duis ac tellus et risus vulputate vehicula. Donec lobortis risus a elit. Etiam tempor. Ut ullamcorper, ligula eu tempor congue, eros est euismod turpis, id tincidunt sapien risus a quam. Maecenas fermentum, sem in pharetra pellentesque.</p>","hi":"<p>लोरेम इप्सम डोलर सिट अमेट, कॉन्सेक्टेचर अडिपिसिंग एलीट. सेड डो ईयूसमोड टेम्पोर इन्सीडिडुंट उत लेबोरे एट डोलोरे मैग्ना एलिक्वा. उत एनीम अद मिनिम वेनिआम, क्विस नोस्त्रुड एक्सर्सिटेशन उल्लाम्को लेबोर्स निसी उत अलीक्विप एक्स ए कोमोडो कोन्सेक्वात. डुइस औटे इरुरे डोलोर इन रेप्रिहेंडेरिट इन वोलुप्टेटे वेलिट एसे सिल्लुम डोलोरे यू फुगिअट नल्ला pariatur. एक्सेप्तेउर सिन्न्त ओककेकाट कपिडटात नोन प्रोइडेंट, सुंट इन कुल्पा क्वि ओफ्फिसिअ डेसेरुंत्त मोल्लिट एनिम इड एस्ट laborum. कुरबीतुर प्रेटियम टिंसिडुंट लाकुस. नुल्ला ग्रविधा ओर्सी अ ओडिओ. नुल्लम वारिउस, turpis एट commodo फेरेत्रा, एस्ट एरोस बिबेंदुम एलीट, नेक luctus magna felis sollicitudin mauris. इंटेगेर इन mauris यू nibh euismod gravida. डुइस अच tellus</p>","ar":"<p>لوريم ايبسوم دولار سيت أميت، كونسكتتور أديبيسشينغ إيليت. سيد دو إيوسيمود تيمبور إنسيديدونت أوت لابوري إت دولوري ماغنا أليكا. أوت إينيم أد مينيم فينيام، كويز نوسترود إكسرسيتاشيون أولامكو لابوريس نيسي أوت أليكويب إكس إيا كومودو كونسيكوات. دويس أوتي إيرور دولور إن ريبرهينديريت إن فولوبتات فيليت إيس سيليم دولور يو فوجيات نولا بارياتور. إكسسيبتور سنت أوككاكات كيوبيدتات نون برويدينت، سونت إن كولبا كي أوفيسيا ديسيريونت مولليت أنيم إد إست لابوروم. كيوريبيتور بريتيوم تينسيدونت لاكوس. نيولا غرافيدا أورسي أ أوديو. نيولام فارياس، توربيس إت كومودو فهرترا، إست إيروس بيبيندوم إيليت، نيك لوكتوس ماغنا فيليس سولليتشيتودين ماوريس. إنتيغر إن ماوريس يو نيبه إيوسيمود غرافيدا. دويس أك تيلوس إت ريزيز فلفوتا فيهيكول</p>"}',
                'slug' => 'pathology-48',
                'is_active' => 1,
                'is_featured' => 0,
                'image' => '/images/doctor_archives/66eadc59ec31e.png',
                'location' => NULL,
                'created_at' => '2024-09-18 18:57:45',
                'updated_at' => '2024-09-18 18:57:45',
                'deleted_at' => NULL,
            ),
        ));
        \DB::table('archives')->insert(array (
            0 => 
            array (
                'id' => 49,
                'doctor_id' => 81,
                'clinic_id' => NULL,
                'archive_category_id' => 2,
                'name' => '{"en":"Forensic Medicine","hi":"औद्योगिक डिज़ाइन","ar":"فعالية الخطاب التعليمي"}',
                'description' => '{"en":"<p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum. Curabitur pretium tincidunt lacus. Nulla gravida orci a odio. Nullam varius, turpis et commodo pharetra, est eros bibendum elit, nec luctus magna felis sollicitudin mauris. Integer in mauris eu nibh euismod gravida. Duis ac tellus et risus vulputate vehicula. Donec lobortis risus a elit. Etiam tempor. Ut ullamcorper, ligula eu tempor congue, eros est euismod turpis, id tincidunt sapien risus a quam. Maecenas fermentum, sem in pharetra pellentesque.</p>","hi":"<p>लोरेम इप्सम डोलर सिट अमेट, कॉन्सेक्टेचर अडिपिसिंग एलीट. सेड डो ईयूसमोड टेम्पोर इन्सीडिडुंट उत लेबोरे एट डोलोरे मैग्ना एलिक्वा. उत एनीम अद मिनिम वेनिआम, क्विस नोस्त्रुड एक्सर्सिटेशन उल्लाम्को लेबोर्स निसी उत अलीक्विप एक्स ए कोमोडो कोन्सेक्वात. डुइस औटे इरुरे डोलोर इन रेप्रिहेंडेरिट इन वोलुप्टेटे वेलिट एसे सिल्लुम डोलोरे यू फुगिअट नल्ला pariatur. एक्सेप्तेउर सिन्न्त ओककेकाट कपिडटात नोन प्रोइडेंट, सुंट इन कुल्पा क्वि ओफ्फिसिअ डेसेरुंत्त मोल्लिट एनिम इड एस्ट laborum. कुरबीतुर प्रेटियम टिंसिडुंट लाकुस. नुल्ला ग्रविधा ओर्सी अ ओडिओ. नुल्लम वारिउस, turpis एट commodo फेरेत्रा, एस्ट एरोस बिबेंदुम एलीट, नेक luctus magna felis sollicitudin mauris. इंटेगेर इन mauris यू nibh euismod gravida. डुइस अच tellus</p>","ar":"<p>لوريم ايبسوم دولار سيت أميت، كونسكتتور أديبيسشينغ إيليت. سيد دو إيوسيمود تيمبور إنسيديدونت أوت لابوري إت دولوري ماغنا أليكا. أوت إينيم أد مينيم فينيام، كويز نوسترود إكسرسيتاشيون أولامكو لابوريس نيسي أوت أليكويب إكس إيا كومودو كونسيكوات. دويس أوتي إيرور دولور إن ريبرهينديريت إن فولوبتات فيليت إيس سيليم دولور يو فوجيات نولا بارياتور. إكسسيبتور سنت أوككاكات كيوبيدتات نون برويدينت، سونت إن كولبا كي أوفيسيا ديسيريونت مولليت أنيم إد إست لابوروم. كيوريبيتور بريتيوم تينسيدونت لاكوس. نيولا غرافيدا أورسي أ أوديو. نيولام فارياس، توربيس إت كومودو فهرترا، إست إيروس بيبيندوم إيليت، نيك لوكتوس ماغنا فيليس سولليتشيتودين ماوريس. إنتيغر إن ماوريس يو نيبه إيوسيمود غرافيدا. دويس أك تيلوس إت ريزيز فلفوتا فيهيكول</p>"}',
                'slug' => 'forensic-medicine-49',
                'is_active' => 1,
                'is_featured' => 0,
                'image' => '/images/doctor_archives/66eadcc5c7afa.png',
                'location' => NULL,
                'created_at' => '2024-09-18 18:59:33',
                'updated_at' => '2024-09-18 18:59:33',
                'deleted_at' => NULL,
            ),
        ));
        \DB::table('archives')->insert(array (
            0 => 
            array (
                'id' => 50,
                'doctor_id' => 81,
                'clinic_id' => NULL,
                'archive_category_id' => 2,
                'name' => '{"en":"General Surgery","hi":"कृत्रिम बुद्धिमत्ता","ar":"الذكاء الاصطناعي"}',
                'description' => '{"en":"<p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum. Curabitur pretium tincidunt lacus. Nulla gravida orci a odio. Nullam varius, turpis et commodo pharetra, est eros bibendum elit, nec luctus magna felis sollicitudin mauris. Integer in mauris eu nibh euismod gravida. Duis ac tellus et risus vulputate vehicula. Donec lobortis risus a elit. Etiam tempor. Ut ullamcorper, ligula eu tempor congue, eros est euismod turpis, id tincidunt sapien risus a quam. Maecenas fermentum, sem in pharetra pellentesque.</p>","hi":"<p>लोरेम इप्सम डोलर सिट अमेट, कॉन्सेक्टेचर अडिपिसिंग एलीट. सेड डो ईयूसमोड टेम्पोर इन्सीडिडुंट उत लेबोरे एट डोलोरे मैग्ना एलिक्वा. उत एनीम अद मिनिम वेनिआम, क्विस नोस्त्रुड एक्सर्सिटेशन उल्लाम्को लेबोर्स निसी उत अलीक्विप एक्स ए कोमोडो कोन्सेक्वात. डुइस औटे इरुरे डोलोर इन रेप्रिहेंडेरिट इन वोलुप्टेटे वेलिट एसे सिल्लुम डोलोरे यू फुगिअट नल्ला pariatur. एक्सेप्तेउर सिन्न्त ओककेकाट कपिडटात नोन प्रोइडेंट, सुंट इन कुल्पा क्वि ओफ्फिसिअ डेसेरुंत्त मोल्लिट एनिम इड एस्ट laborum. कुरबीतुर प्रेटियम टिंसिडुंट लाकुस. नुल्ला ग्रविधा ओर्सी अ ओडिओ. नुल्लम वारिउस, turpis एट commodo फेरेत्रा, एस्ट एरोस बिबेंदुम एलीट, नेक luctus magna felis sollicitudin mauris. इंटेगेर इन mauris यू nibh euismod gravida. डुइस अच tellus</p>","ar":"<p>لوريم ايبسوم دولار سيت أميت، كونسكتتور أديبيسشينغ إيليت. سيد دو إيوسيمود تيمبور إنسيديدونت أوت لابوري إت دولوري ماغنا أليكا. أوت إينيم أد مينيم فينيام، كويز نوسترود إكسرسيتاشيون أولامكو لابوريس نيسي أوت أليكويب إكس إيا كومودو كونسيكوات. دويس أوتي إيرور دولور إن ريبرهينديريت إن فولوبتات فيليت إيس سيليم دولور يو فوجيات نولا بارياتور. إكسسيبتور سنت أوككاكات كيوبيدتات نون برويدينت، سونت إن كولبا كي أوفيسيا ديسيريونت مولليت أنيم إد إست لابوروم. كيوريبيتور بريتيوم تينسيدونت لاكوس. نيولا غرافيدا أورسي أ أوديو. نيولام فارياس، توربيس إت كومودو فهرترا، إست إيروس بيبيندوم إيليت، نيك لوكتوس ماغنا فيليس سولليتشيتودين ماوريس. إنتيغر إن ماوريس يو نيبه إيوسيمود غرافيدا. دويس أك تيلوس إت ريزيز فلفوتا فيهيكول</p>"}',
                'slug' => 'general-surgery-50',
                'is_active' => 1,
                'is_featured' => 0,
                'image' => '/images/doctor_archives/66eadcf43ed45.png',
                'location' => NULL,
                'created_at' => '2024-09-18 19:00:20',
                'updated_at' => '2024-09-18 19:00:20',
                'deleted_at' => NULL,
            ),
        ));
        \DB::table('archives')->insert(array (
            0 => 
            array (
                'id' => 51,
                'doctor_id' => 81,
                'clinic_id' => NULL,
                'archive_category_id' => 1,
                'name' => '{"en":"Pharmacology","hi":"औद्योगिक डिज़ाइन","ar":"مسابقة معلومات"}',
                'description' => '{"en":"<p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum. Curabitur pretium tincidunt lacus. Nulla gravida orci a odio. Nullam varius, turpis et commodo pharetra, est eros bibendum elit, nec luctus magna felis sollicitudin mauris. Integer in mauris eu nibh euismod gravida. Duis ac tellus et risus vulputate vehicula. Donec lobortis risus a elit. Etiam tempor. Ut ullamcorper, ligula eu tempor congue, eros est euismod turpis, id tincidunt sapien risus a quam. Maecenas fermentum, sem in pharetra pellentesque.</p>","hi":"<p>लोरेम इप्सम डोलर सिट अमेट, कॉन्सेक्टेचर अडिपिसिंग एलीट. सेड डो ईयूसमोड टेम्पोर इन्सीडिडुंट उत लेबोरे एट डोलोरे मैग्ना एलिक्वा. उत एनीम अद मिनिम वेनिआम, क्विस नोस्त्रुड एक्सर्सिटेशन उल्लाम्को लेबोर्स निसी उत अलीक्विप एक्स ए कोमोडो कोन्सेक्वात. डुइस औटे इरुरे डोलोर इन रेप्रिहेंडेरिट इन वोलुप्टेटे वेलिट एसे सिल्लुम डोलोरे यू फुगिअट नल्ला pariatur. एक्सेप्तेउर सिन्न्त ओककेकाट कपिडटात नोन प्रोइडेंट, सुंट इन कुल्पा क्वि ओफ्फिसिअ डेसेरुंत्त मोल्लिट एनिम इड एस्ट laborum. कुरबीतुर प्रेटियम टिंसिडुंट लाकुस. नुल्ला ग्रविधा ओर्सी अ ओडिओ. नुल्लम वारिउस, turpis एट commodo फेरेत्रा, एस्ट एरोस बिबेंदुम एलीट, नेक luctus magna felis sollicitudin mauris. इंटेगेर इन mauris यू nibh euismod gravida. डुइस अच tellus</p>","ar":"<p>لوريم ايبسوم دولار سيت أميت، كونسكتتور أديبيسشينغ إيليت. سيد دو إيوسيمود تيمبور إنسيديدونت أوت لابوري إت دولوري ماغنا أليكا. أوت إينيم أد مينيم فينيام، كويز نوسترود إكسرسيتاشيون أولامكو لابوريس نيسي أوت أليكويب إكس إيا كومودو كونسيكوات. دويس أوتي إيرور دولور إن ريبرهينديريت إن فولوبتات فيليت إيس سيليم دولور يو فوجيات نولا بارياتور. إكسسيبتور سنت أوككاكات كيوبيدتات نون برويدينت، سونت إن كولبا كي أوفيسيا ديسيريونت مولليت أنيم إد إست لابوروم. كيوريبيتور بريتيوم تينسيدونت لاكوس. نيولا غرافيدا أورسي أ أوديو. نيولام فارياس، توربيس إت كومودو فهرترا، إست إيروس بيبيندوم إيليت، نيك لوكتوس ماغنا فيليس سولليتشيتودين ماوريس. إنتيغر إن ماوريس يو نيبه إيوسيمود غرافيدا. دويس أك تيلوس إت ريزيز فلفوتا فيهيكول</p>"}',
                'slug' => 'pharmacology-51',
                'is_active' => 1,
                'is_featured' => 0,
                'image' => '/images/doctor_archives/66eadd3d66ebd.png',
                'location' => NULL,
                'created_at' => '2024-09-18 19:01:33',
                'updated_at' => '2024-09-18 19:01:33',
                'deleted_at' => NULL,
            ),
        ));
        \DB::table('archives')->insert(array (
            0 => 
            array (
                'id' => 52,
                'doctor_id' => 82,
                'clinic_id' => NULL,
                'archive_category_id' => 1,
                'name' => '{"en":"Cardiothoracic Surgery","hi":"क्विज़ प्रतियोगिता","ar":"الذكاء الاصطناعي"}',
                'description' => '{"en":"<p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum. Curabitur pretium tincidunt lacus. Nulla gravida orci a odio. Nullam varius, turpis et commodo pharetra, est eros bibendum elit, nec luctus magna felis sollicitudin mauris. Integer in mauris eu nibh euismod gravida. Duis ac tellus et risus vulputate vehicula. Donec lobortis risus a elit. Etiam tempor. Ut ullamcorper, ligula eu tempor congue, eros est euismod turpis, id tincidunt sapien risus a quam. Maecenas fermentum, sem in pharetra pellentesque.</p>","hi":"<p>लोरेम इप्सम डोलर सिट अमेट, कॉन्सेक्टेचर अडिपिसिंग एलीट. सेड डो ईयूसमोड टेम्पोर इन्सीडिडुंट उत लेबोरे एट डोलोरे मैग्ना एलिक्वा. उत एनीम अद मिनिम वेनिआम, क्विस नोस्त्रुड एक्सर्सिटेशन उल्लाम्को लेबोर्स निसी उत अलीक्विप एक्स ए कोमोडो कोन्सेक्वात. डुइस औटे इरुरे डोलोर इन रेप्रिहेंडेरिट इन वोलुप्टेटे वेलिट एसे सिल्लुम डोलोरे यू फुगिअट नल्ला pariatur. एक्सेप्तेउर सिन्न्त ओककेकाट कपिडटात नोन प्रोइडेंट, सुंट इन कुल्पा क्वि ओफ्फिसिअ डेसेरुंत्त मोल्लिट एनिम इड एस्ट laborum. कुरबीतुर प्रेटियम टिंसिडुंट लाकुस. नुल्ला ग्रविधा ओर्सी अ ओडिओ. नुल्लम वारिउस, turpis एट commodo फेरेत्रा, एस्ट एरोस बिबेंदुम एलीट, नेक luctus magna felis sollicitudin mauris. इंटेगेर इन mauris यू nibh euismod gravida. डुइस अच tellus</p>","ar":"<p>لوريم ايبسوم دولار سيت أميت، كونسكتتور أديبيسشينغ إيليت. سيد دو إيوسيمود تيمبور إنسيديدونت أوت لابوري إت دولوري ماغنا أليكا. أوت إينيم أد مينيم فينيام، كويز نوسترود إكسرسيتاشيون أولامكو لابوريس نيسي أوت أليكويب إكس إيا كومودو كونسيكوات. دويس أوتي إيرور دولور إن ريبرهينديريت إن فولوبتات فيليت إيس سيليم دولور يو فوجيات نولا بارياتور. إكسسيبتور سنت أوككاكات كيوبيدتات نون برويدينت، سونت إن كولبا كي أوفيسيا ديسيريونت مولليت أنيم إد إست لابوروم. كيوريبيتور بريتيوم تينسيدونت لاكوس. نيولا غرافيدا أورسي أ أوديو. نيولام فارياس، توربيس إت كومودو فهرترا، إست إيروس بيبيندوم إيليت، نيك لوكتوس ماغنا فيليس سولليتشيتودين ماوريس. إنتيغر إن ماوريس يو نيبه إيوسيمود غرافيدا. دويس أك تيلوس إت ريزيز فلفوتا فيهيكول</p>"}',
                'slug' => 'cardiothoracic-surgery-52',
                'is_active' => 1,
                'is_featured' => 0,
                'image' => '/images/doctor_archives/66eadd8152699.png',
                'location' => NULL,
                'created_at' => '2024-09-18 19:02:41',
                'updated_at' => '2024-09-18 19:02:41',
                'deleted_at' => NULL,
            ),
        ));
        \DB::table('archives')->insert(array (
            0 => 
            array (
                'id' => 53,
                'doctor_id' => 82,
                'clinic_id' => NULL,
                'archive_category_id' => 2,
                'name' => '{"en":"Endocrinology","hi":"औद्योगिक डिज़ाइन","ar":"فعالية الخطاب التعليمي"}',
                'description' => '{"en":"<p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum. Curabitur pretium tincidunt lacus. Nulla gravida orci a odio. Nullam varius, turpis et commodo pharetra, est eros bibendum elit, nec luctus magna felis sollicitudin mauris. Integer in mauris eu nibh euismod gravida. Duis ac tellus et risus vulputate vehicula. Donec lobortis risus a elit. Etiam tempor. Ut ullamcorper, ligula eu tempor congue, eros est euismod turpis, id tincidunt sapien risus a quam. Maecenas fermentum, sem in pharetra pellentesque.</p>","hi":"<p>लोरेम इप्सम डोलर सिट अमेट, कॉन्सेक्टेचर अडिपिसिंग एलीट. सेड डो ईयूसमोड टेम्पोर इन्सीडिडुंट उत लेबोरे एट डोलोरे मैग्ना एलिक्वा. उत एनीम अद मिनिम वेनिआम, क्विस नोस्त्रुड एक्सर्सिटेशन उल्लाम्को लेबोर्स निसी उत अलीक्विप एक्स ए कोमोडो कोन्सेक्वात. डुइस औटे इरुरे डोलोर इन रेप्रिहेंडेरिट इन वोलुप्टेटे वेलिट एसे सिल्लुम डोलोरे यू फुगिअट नल्ला pariatur. एक्सेप्तेउर सिन्न्त ओककेकाट कपिडटात नोन प्रोइडेंट, सुंट इन कुल्पा क्वि ओफ्फिसिअ डेसेरुंत्त मोल्लिट एनिम इड एस्ट laborum. कुरबीतुर प्रेटियम टिंसिडुंट लाकुस. नुल्ला ग्रविधा ओर्सी अ ओडिओ. नुल्लम वारिउस, turpis एट commodo फेरेत्रा, एस्ट एरोस बिबेंदुम एलीट, नेक luctus magna felis sollicitudin mauris. इंटेगेर इन mauris यू nibh euismod gravida. डुइस अच tellus</p>","ar":"<p>لوريم ايبسوم دولار سيت أميت، كونسكتتور أديبيسشينغ إيليت. سيد دو إيوسيمود تيمبور إنسيديدونت أوت لابوري إت دولوري ماغنا أليكا. أوت إينيم أد مينيم فينيام، كويز نوسترود إكسرسيتاشيون أولامكو لابوريس نيسي أوت أليكويب إكس إيا كومودو كونسيكوات. دويس أوتي إيرور دولور إن ريبرهينديريت إن فولوبتات فيليت إيس سيليم دولور يو فوجيات نولا بارياتور. إكسسيبتور سنت أوككاكات كيوبيدتات نون برويدينت، سونت إن كولبا كي أوفيسيا ديسيريونت مولليت أنيم إد إست لابوروم. كيوريبيتور بريتيوم تينسيدونت لاكوس. نيولا غرافيدا أورسي أ أوديو. نيولام فارياس، توربيس إت كومودو فهرترا، إست إيروس بيبيندوم إيليت، نيك لوكتوس ماغنا فيليس سولليتشيتودين ماوريس. إنتيغر إن ماوريس يو نيبه إيوسيمود غرافيدا. دويس أك تيلوس إت ريزيز فلفوتا فيهيكول</p>"}',
                'slug' => 'endocrinology-53',
                'is_active' => 1,
                'is_featured' => 0,
                'image' => '/images/doctor_archives/66eaddb1373ed.png',
                'location' => NULL,
                'created_at' => '2024-09-18 19:03:29',
                'updated_at' => '2024-09-18 19:03:29',
                'deleted_at' => NULL,
            ),
        ));
        \DB::table('archives')->insert(array (
            0 => 
            array (
                'id' => 54,
                'doctor_id' => 82,
                'clinic_id' => NULL,
                'archive_category_id' => 1,
                'name' => '{"en":"Trauma Management","hi":"औद्योगिक डिज़ाइन","ar":"مدونة التعليم بالمنطق السليم"}',
                'description' => '{"en":"<p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum. Curabitur pretium tincidunt lacus. Nulla gravida orci a odio. Nullam varius, turpis et commodo pharetra, est eros bibendum elit, nec luctus magna felis sollicitudin mauris. Integer in mauris eu nibh euismod gravida. Duis ac tellus et risus vulputate vehicula. Donec lobortis risus a elit. Etiam tempor. Ut ullamcorper, ligula eu tempor congue, eros est euismod turpis, id tincidunt sapien risus a quam. Maecenas fermentum, sem in pharetra pellentesque.</p>","hi":"<p>लोरेम इप्सम डोलर सिट अमेट, कॉन्सेक्टेचर अडिपिसिंग एलीट. सेड डो ईयूसमोड टेम्पोर इन्सीडिडुंट उत लेबोरे एट डोलोरे मैग्ना एलिक्वा. उत एनीम अद मिनिम वेनिआम, क्विस नोस्त्रुड एक्सर्सिटेशन उल्लाम्को लेबोर्स निसी उत अलीक्विप एक्स ए कोमोडो कोन्सेक्वात. डुइस औटे इरुरे डोलोर इन रेप्रिहेंडेरिट इन वोलुप्टेटे वेलिट एसे सिल्लुम डोलोरे यू फुगिअट नल्ला pariatur. एक्सेप्तेउर सिन्न्त ओककेकाट कपिडटात नोन प्रोइडेंट, सुंट इन कुल्पा क्वि ओफ्फिसिअ डेसेरुंत्त मोल्लिट एनिम इड एस्ट laborum. कुरबीतुर प्रेटियम टिंसिडुंट लाकुस. नुल्ला ग्रविधा ओर्सी अ ओडिओ. नुल्लम वारिउस, turpis एट commodo फेरेत्रा, एस्ट एरोस बिबेंदुम एलीट, नेक luctus magna felis sollicitudin mauris. इंटेगेर इन mauris यू nibh euismod gravida. डुइस अच tellus</p>","ar":"<p>لوريم ايبسوم دولار سيت أميت، كونسكتتور أديبيسشينغ إيليت. سيد دو إيوسيمود تيمبور إنسيديدونت أوت لابوري إت دولوري ماغنا أليكا. أوت إينيم أد مينيم فينيام، كويز نوسترود إكسرسيتاشيون أولامكو لابوريس نيسي أوت أليكويب إكس إيا كومودو كونسيكوات. دويس أوتي إيرور دولور إن ريبرهينديريت إن فولوبتات فيليت إيس سيليم دولور يو فوجيات نولا بارياتور. إكسسيبتور سنت أوككاكات كيوبيدتات نون برويدينت، سونت إن كولبا كي أوفيسيا ديسيريونت مولليت أنيم إد إست لابوروم. كيوريبيتور بريتيوم تينسيدونت لاكوس. نيولا غرافيدا أورسي أ أوديو. نيولام فارياس، توربيس إت كومودو فهرترا، إست إيروس بيبيندوم إيليت، نيك لوكتوس ماغنا فيليس سولليتشيتودين ماوريس. إنتيغر إن ماوريس يو نيبه إيوسيمود غرافيدا. دويس أك تيلوس إت ريزيز فلفوتا فيهيكول</p>"}',
                'slug' => 'trauma-management-54',
                'is_active' => 1,
                'is_featured' => 0,
                'image' => '/images/doctor_archives/66eadde2e9343.png',
                'location' => NULL,
                'created_at' => '2024-09-18 19:04:18',
                'updated_at' => '2024-09-18 19:04:18',
                'deleted_at' => NULL,
            ),
        ));
        \DB::table('archives')->insert(array (
            0 => 
            array (
                'id' => 55,
                'doctor_id' => NULL,
                'clinic_id' => 21,
                'archive_category_id' => 1,
                'name' => '{"en":"Anatomy","hi":"क्विज़ प्रतियोगिता","ar":"مسابقة معلومات"}',
                'description' => '{"en":"<p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Praesent facilisis ante ut purus eleifend vehicula. Cras vel diam elit. Nullam scelerisque, nisi sed dignissim vehicula, sapien lacus fringilla urna, at rhoncus ex lorem vitae magna. Nam fermentum, purus sed consequat vulputate, lorem sapien dictum lorem, vitae euismod augue risus non mi. In hac habitasse platea dictumst. Donec a orci mauris. Pellentesque nec sem libero. Vestibulum fringilla neque ut est efficitur aliquet. Nulla facilisi. Fusce et ligula vitae lorem cursus aliquam. Aliquam a erat a mi bibendum molestie. Phasellus ut ex a justo dignissim scelerisque sit amet sed libero. Duis egestas, mi non dapibus hendrerit, libero nunc tincidunt orci, in dignissim ex mi a augue. Donec sed nulla in elit gravida venenatis et non augue. Pellentesque et libero quis lorem convallis viverra. Etiam fermentum sapien turpis, vel posuere velit varius ut.</p>","hi":"<p>लोरेम इप्सम डोलर सिट अमेट, कॉन्सेकट्यूर एडिपिसिंग एलीट. प्रेज़ेंट फसिलिसिस अंते उत पुरुस एलीफेंड व्हीकुला. क्रास वेल डायम एलीट. नुल्लम स्केलरिस्क, निसी सेड डिग्निस्सिम व्हीकुला, सैपियन लकुस फ्रिंजिल्ला उरना, एट रोंकस एक्स लोरेम विटे माग्ना. नाम फेर्मेंटुम, पुरुस सेड कंसक्वाट वुल्पुटेट, लोरेम सैपियन डिक्टम लोरेम, विटे एयूसमोड औगुए रीसस नॉन मी. इन हक हबितास्से प्लाटेआ डिक्टुमस्ट. डोनेक अ ओर्की मौरिस. पेल्लेंटेस्के नेक सेम लिबरो. वेस्टिबुलम फ्रिंजिल्ला नेकुए उत एस्ट एफिकितुर अलिक्वेट. नुल्ला फासिलिसि. फ्यूस्के एट लिगुला विटे लोरेम कर्सस अलिक्वाम. आलिक्वाम अ एराट अ मि बिबेंडम मोलस्टिये. फासेल्लस उत एक्स अ जस्टो डिग्निस्सिम स्केलरिस्क सिट अमेट सेड लिबरो. डुइस एगेस्टास, मि नॉन डापिबुस हेंड्रेरिट, लिबरो नुंक टिन्सीडुंट ऑर्की, इन डिग्निस्सिम एक्स मि अ औगुए. डोनेक सेड नुल्ला इन एलीट ग्राविडा विनेनेटिस एट नॉन औगुए.</p>","ar":"<p>لوريم إيبسوم دولور سيت أميت، كونسكتتور أديبيسينغ إليت. بريسنت فاسيليسيس أنتي أوت بوروس إليفند فيكولا. كراس فيل ديام إليت. نولام سكيلريسكي، نيسي سيد ديغنيسيم فيكولا، سابين لاكوس فرنجيلا أورنا، أت رونكوس إكس لوريم فيتاي ماجنا. نام فيرمينتوم، بوروس سيد كونسكووت فولووتات، لوريم سابين ديكتوم لوريم، فيتاي إويسمود أوغي ريسوس نون مي. إن هاك هابيتاس بلاتيا ديكتومست. دونيك أ أوركي موريس. بيلينتسكي نيك سيم ليبيرو. فيستيبيولوم فرنجيلا نيكوي أوت إيست إفيكيتور أليكويت. نولا فاسيليسي. فوسكي إت ليجولا فيتاي لوريم كورسوس أليكوام. أليكوام أ إيرات أ مي بيبندم مولستيي. فاسيليس أوت إكس أ جوستو ديغنيسيم سكيلريسكي سيت أميت سيد ليبيرو. دويس إيغيتاس، مي نون دابيبوس هندريريت، ليبيرو ننك تنسيدونت أوركي، إن ديغنيسيم إكس مي أ أوغ</p>"}',
                'slug' => 'anatomy-55',
                'is_active' => 1,
                'is_featured' => 0,
                'image' => '/images/clinic_archives/66ec0569cafe9.png',
                'location' => NULL,
                'created_at' => '2024-09-19 16:05:13',
                'updated_at' => '2024-09-19 16:05:13',
                'deleted_at' => NULL,
            ),
        ));
        \DB::table('archives')->insert(array (
            0 => 
            array (
                'id' => 56,
                'doctor_id' => NULL,
                'clinic_id' => 21,
                'archive_category_id' => 1,
                'name' => '{"en":"Biochemistry","hi":"कृत्रिम बुद्धिमत्ता","ar":"مسابقة معلومات"}',
                'description' => '{"en":"<p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Praesent facilisis ante ut purus eleifend vehicula. Cras vel diam elit. Nullam scelerisque, nisi sed dignissim vehicula, sapien lacus fringilla urna, at rhoncus ex lorem vitae magna. Nam fermentum, purus sed consequat vulputate, lorem sapien dictum lorem, vitae euismod augue risus non mi. In hac habitasse platea dictumst. Donec a orci mauris. Pellentesque nec sem libero. Vestibulum fringilla neque ut est efficitur aliquet. Nulla facilisi. Fusce et ligula vitae lorem cursus aliquam. Aliquam a erat a mi bibendum molestie. Phasellus ut ex a justo dignissim scelerisque sit amet sed libero. Duis egestas, mi non dapibus hendrerit, libero nunc tincidunt orci, in dignissim ex mi a augue. Donec sed nulla in elit gravida venenatis et non augue. Pellentesque et libero quis lorem convallis viverra. Etiam fermentum sapien turpis, vel posuere velit varius ut.</p>","hi":"<p>लोरेम इप्सम डोलर सिट अमेट, कॉन्सेकट्यूर एडिपिसिंग एलीट. प्रेज़ेंट फसिलिसिस अंते उत पुरुस एलीफेंड व्हीकुला. क्रास वेल डायम एलीट. नुल्लम स्केलरिस्क, निसी सेड डिग्निस्सिम व्हीकुला, सैपियन लकुस फ्रिंजिल्ला उरना, एट रोंकस एक्स लोरेम विटे माग्ना. नाम फेर्मेंटुम, पुरुस सेड कंसक्वाट वुल्पुटेट, लोरेम सैपियन डिक्टम लोरेम, विटे एयूसमोड औगुए रीसस नॉन मी. इन हक हबितास्से प्लाटेआ डिक्टुमस्ट. डोनेक अ ओर्की मौरिस. पेल्लेंटेस्के नेक सेम लिबरो. वेस्टिबुलम फ्रिंजिल्ला नेकुए उत एस्ट एफिकितुर अलिक्वेट. नुल्ला फासिलिसि. फ्यूस्के एट लिगुला विटे लोरेम कर्सस अलिक्वाम. आलिक्वाम अ एराट अ मि बिबेंडम मोलस्टिये. फासेल्लस उत एक्स अ जस्टो डिग्निस्सिम स्केलरिस्क सिट अमेट सेड लिबरो. डुइस एगेस्टास, मि नॉन डापिबुस हेंड्रेरिट, लिबरो नुंक टिन्सीडुंट ऑर्की, इन डिग्निस्सिम एक्स मि अ औगुए. डोनेक सेड नुल्ला इन एलीट ग्राविडा विनेनेटिस एट नॉन औगुए.</p>","ar":"<p>لوريم إيبسوم دولور سيت أميت، كونسكتتور أديبيسينغ إليت. بريسنت فاسيليسيس أنتي أوت بوروس إليفند فيكولا. كراس فيل ديام إليت. نولام سكيلريسكي، نيسي سيد ديغنيسيم فيكولا، سابين لاكوس فرنجيلا أورنا، أت رونكوس إكس لوريم فيتاي ماجنا. نام فيرمينتوم، بوروس سيد كونسكووت فولووتات، لوريم سابين ديكتوم لوريم، فيتاي إويسمود أوغي ريسوس نون مي. إن هاك هابيتاس بلاتيا ديكتومست. دونيك أ أوركي موريس. بيلينتسكي نيك سيم ليبيرو. فيستيبيولوم فرنجيلا نيكوي أوت إيست إفيكيتور أليكويت. نولا فاسيليسي. فوسكي إت ليجولا فيتاي لوريم كورسوس أليكوام. أليكوام أ إيرات أ مي بيبندم مولستيي. فاسيليس أوت إكس أ جوستو ديغنيسيم سكيلريسكي سيت أميت سيد ليبيرو. دويس إيغيتاس، مي نون دابيبوس هندريريت، ليبيرو ننك تنسيدونت أوركي، إن ديغنيسيم إكس مي أ أوغ</p>"}',
                'slug' => 'biochemistry-56',
                'is_active' => 1,
                'is_featured' => 0,
                'image' => '/images/clinic_archives/66ec05c7774e4.png',
                'location' => NULL,
                'created_at' => '2024-09-19 16:06:47',
                'updated_at' => '2024-09-19 16:06:47',
                'deleted_at' => NULL,
            ),
        ));
        \DB::table('archives')->insert(array (
            0 => 
            array (
                'id' => 57,
                'doctor_id' => NULL,
                'clinic_id' => 21,
                'archive_category_id' => 2,
                'name' => '{"en":"Pathology","hi":"क्विज़ प्रतियोगिता","ar":"علم البيئة"}',
                'description' => '{"en":"<p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Praesent facilisis ante ut purus eleifend vehicula. Cras vel diam elit. Nullam scelerisque, nisi sed dignissim vehicula, sapien lacus fringilla urna, at rhoncus ex lorem vitae magna. Nam fermentum, purus sed consequat vulputate, lorem sapien dictum lorem, vitae euismod augue risus non mi. In hac habitasse platea dictumst. Donec a orci mauris. Pellentesque nec sem libero. Vestibulum fringilla neque ut est efficitur aliquet. Nulla facilisi. Fusce et ligula vitae lorem cursus aliquam. Aliquam a erat a mi bibendum molestie. Phasellus ut ex a justo dignissim scelerisque sit amet sed libero. Duis egestas, mi non dapibus hendrerit, libero nunc tincidunt orci, in dignissim ex mi a augue. Donec sed nulla in elit gravida venenatis et non augue. Pellentesque et libero quis lorem convallis viverra. Etiam fermentum sapien turpis, vel posuere velit varius ut.</p>","hi":"<p>लोरेम इप्सम डोलर सिट अमेट, कॉन्सेकट्यूर एडिपिसिंग एलीट. प्रेज़ेंट फसिलिसिस अंते उत पुरुस एलीफेंड व्हीकुला. क्रास वेल डायम एलीट. नुल्लम स्केलरिस्क, निसी सेड डिग्निस्सिम व्हीकुला, सैपियन लकुस फ्रिंजिल्ला उरना, एट रोंकस एक्स लोरेम विटे माग्ना. नाम फेर्मेंटुम, पुरुस सेड कंसक्वाट वुल्पुटेट, लोरेम सैपियन डिक्टम लोरेम, विटे एयूसमोड औगुए रीसस नॉन मी. इन हक हबितास्से प्लाटेआ डिक्टुमस्ट. डोनेक अ ओर्की मौरिस. पेल्लेंटेस्के नेक सेम लिबरो. वेस्टिबुलम फ्रिंजिल्ला नेकुए उत एस्ट एफिकितुर अलिक्वेट. नुल्ला फासिलिसि. फ्यूस्के एट लिगुला विटे लोरेम कर्सस अलिक्वाम. आलिक्वाम अ एराट अ मि बिबेंडम मोलस्टिये. फासेल्लस उत एक्स अ जस्टो डिग्निस्सिम स्केलरिस्क सिट अमेट सेड लिबरो. डुइस एगेस्टास, मि नॉन डापिबुस हेंड्रेरिट, लिबरो नुंक टिन्सीडुंट ऑर्की, इन डिग्निस्सिम एक्स मि अ औगुए. डोनेक सेड नुल्ला इन एलीट ग्राविडा विनेनेटिस एट नॉन औगुए.</p>","ar":"<p>لوريم إيبسوم دولور سيت أميت، كونسكتتور أديبيسينغ إليت. بريسنت فاسيليسيس أنتي أوت بوروس إليفند فيكولا. كراس فيل ديام إليت. نولام سكيلريسكي، نيسي سيد ديغنيسيم فيكولا، سابين لاكوس فرنجيلا أورنا، أت رونكوس إكس لوريم فيتاي ماجنا. نام فيرمينتوم، بوروس سيد كونسكووت فولووتات، لوريم سابين ديكتوم لوريم، فيتاي إويسمود أوغي ريسوس نون مي. إن هاك هابيتاس بلاتيا ديكتومست. دونيك أ أوركي موريس. بيلينتسكي نيك سيم ليبيرو. فيستيبيولوم فرنجيلا نيكوي أوت إيست إفيكيتور أليكويت. نولا فاسيليسي. فوسكي إت ليجولا فيتاي لوريم كورسوس أليكوام. أليكوام أ إيرات أ مي بيبندم مولستيي. فاسيليس أوت إكس أ جوستو ديغنيسيم سكيلريسكي سيت أميت سيد ليبيرو. دويس إيغيتاس، مي نون دابيبوس هندريريت، ليبيرو ننك تنسيدونت أوركي، إن ديغنيسيم إكس مي أ أوغ</p>"}',
                'slug' => 'pathology-57',
                'is_active' => 1,
                'is_featured' => 0,
                'image' => '/images/clinic_archives/66ec05f1b37bb.png',
                'location' => NULL,
                'created_at' => '2024-09-19 16:07:29',
                'updated_at' => '2024-09-19 16:07:29',
                'deleted_at' => NULL,
            ),
        ));
        \DB::table('archives')->insert(array (
            0 => 
            array (
                'id' => 58,
                'doctor_id' => NULL,
                'clinic_id' => 22,
                'archive_category_id' => 2,
                'name' => '{"en":"Forensic Medicine","hi":"क्विज़ प्रतियोगिता","ar":"علم البيئة"}',
                'description' => '{"en":"<p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Praesent facilisis ante ut purus eleifend vehicula. Cras vel diam elit. Nullam scelerisque, nisi sed dignissim vehicula, sapien lacus fringilla urna, at rhoncus ex lorem vitae magna. Nam fermentum, purus sed consequat vulputate, lorem sapien dictum lorem, vitae euismod augue risus non mi. In hac habitasse platea dictumst. Donec a orci mauris. Pellentesque nec sem libero. Vestibulum fringilla neque ut est efficitur aliquet. Nulla facilisi. Fusce et ligula vitae lorem cursus aliquam. Aliquam a erat a mi bibendum molestie. Phasellus ut ex a justo dignissim scelerisque sit amet sed libero. Duis egestas, mi non dapibus hendrerit, libero nunc tincidunt orci, in dignissim ex mi a augue. Donec sed nulla in elit gravida venenatis et non augue. Pellentesque et libero quis lorem convallis viverra. Etiam fermentum sapien turpis, vel posuere velit varius ut.</p>","hi":"<p>लोरेम इप्सम डोलर सिट अमेट, कॉन्सेकट्यूर एडिपिसिंग एलीट. प्रेज़ेंट फसिलिसिस अंते उत पुरुस एलीफेंड व्हीकुला. क्रास वेल डायम एलीट. नुल्लम स्केलरिस्क, निसी सेड डिग्निस्सिम व्हीकुला, सैपियन लकुस फ्रिंजिल्ला उरना, एट रोंकस एक्स लोरेम विटे माग्ना. नाम फेर्मेंटुम, पुरुस सेड कंसक्वाट वुल्पुटेट, लोरेम सैपियन डिक्टम लोरेम, विटे एयूसमोड औगुए रीसस नॉन मी. इन हक हबितास्से प्लाटेआ डिक्टुमस्ट. डोनेक अ ओर्की मौरिस. पेल्लेंटेस्के नेक सेम लिबरो. वेस्टिबुलम फ्रिंजिल्ला नेकुए उत एस्ट एफिकितुर अलिक्वेट. नुल्ला फासिलिसि. फ्यूस्के एट लिगुला विटे लोरेम कर्सस अलिक्वाम. आलिक्वाम अ एराट अ मि बिबेंडम मोलस्टिये. फासेल्लस उत एक्स अ जस्टो डिग्निस्सिम स्केलरिस्क सिट अमेट सेड लिबरो. डुइस एगेस्टास, मि नॉन डापिबुस हेंड्रेरिट, लिबरो नुंक टिन्सीडुंट ऑर्की, इन डिग्निस्सिम एक्स मि अ औगुए. डोनेक सेड नुल्ला इन एलीट ग्राविडा विनेनेटिस एट नॉन औगुए.</p>","ar":"<p>لوريم إيبسوم دولور سيت أميت، كونسكتتور أديبيسينغ إليت. بريسنت فاسيليسيس أنتي أوت بوروس إليفند فيكولا. كراس فيل ديام إليت. نولام سكيلريسكي، نيسي سيد ديغنيسيم فيكولا، سابين لاكوس فرنجيلا أورنا، أت رونكوس إكس لوريم فيتاي ماجنا. نام فيرمينتوم، بوروس سيد كونسكووت فولووتات، لوريم سابين ديكتوم لوريم، فيتاي إويسمود أوغي ريسوس نون مي. إن هاك هابيتاس بلاتيا ديكتومست. دونيك أ أوركي موريس. بيلينتسكي نيك سيم ليبيرو. فيستيبيولوم فرنجيلا نيكوي أوت إيست إفيكيتور أليكويت. نولا فاسيليسي. فوسكي إت ليجولا فيتاي لوريم كورسوس أليكوام. أليكوام أ إيرات أ مي بيبندم مولستيي. فاسيليس أوت إكس أ جوستو ديغنيسيم سكيلريسكي سيت أميت سيد ليبيرو. دويس إيغيتاس، مي نون دابيبوس هندريريت، ليبيرو ننك تنسيدونت أوركي، إن ديغنيسيم إكس مي أ أوغ</p>"}',
                'slug' => 'forensic-medicine-58',
                'is_active' => 1,
                'is_featured' => 0,
                'image' => '/images/clinic_archives/66ec088f95123.png',
                'location' => NULL,
                'created_at' => '2024-09-19 16:18:39',
                'updated_at' => '2024-09-19 16:18:39',
                'deleted_at' => NULL,
            ),
        ));
        \DB::table('archives')->insert(array (
            0 => 
            array (
                'id' => 59,
                'doctor_id' => NULL,
                'clinic_id' => 22,
                'archive_category_id' => 1,
                'name' => '{"en":"General Surgery","hi":"औद्योगिक डिज़ाइन","ar":"التصميم الصناعي"}',
                'description' => '{"en":"<p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Praesent facilisis ante ut purus eleifend vehicula. Cras vel diam elit. Nullam scelerisque, nisi sed dignissim vehicula, sapien lacus fringilla urna, at rhoncus ex lorem vitae magna. Nam fermentum, purus sed consequat vulputate, lorem sapien dictum lorem, vitae euismod augue risus non mi. In hac habitasse platea dictumst. Donec a orci mauris. Pellentesque nec sem libero. Vestibulum fringilla neque ut est efficitur aliquet. Nulla facilisi. Fusce et ligula vitae lorem cursus aliquam. Aliquam a erat a mi bibendum molestie. Phasellus ut ex a justo dignissim scelerisque sit amet sed libero. Duis egestas, mi non dapibus hendrerit, libero nunc tincidunt orci, in dignissim ex mi a augue. Donec sed nulla in elit gravida venenatis et non augue. Pellentesque et libero quis lorem convallis viverra. Etiam fermentum sapien turpis, vel posuere velit varius ut.</p>","hi":"<p>लोरेम इप्सम डोलर सिट अमेट, कॉन्सेकट्यूर एडिपिसिंग एलीट. प्रेज़ेंट फसिलिसिस अंते उत पुरुस एलीफेंड व्हीकुला. क्रास वेल डायम एलीट. नुल्लम स्केलरिस्क, निसी सेड डिग्निस्सिम व्हीकुला, सैपियन लकुस फ्रिंजिल्ला उरना, एट रोंकस एक्स लोरेम विटे माग्ना. नाम फेर्मेंटुम, पुरुस सेड कंसक्वाट वुल्पुटेट, लोरेम सैपियन डिक्टम लोरेम, विटे एयूसमोड औगुए रीसस नॉन मी. इन हक हबितास्से प्लाटेआ डिक्टुमस्ट. डोनेक अ ओर्की मौरिस. पेल्लेंटेस्के नेक सेम लिबरो. वेस्टिबुलम फ्रिंजिल्ला नेकुए उत एस्ट एफिकितुर अलिक्वेट. नुल्ला फासिलिसि. फ्यूस्के एट लिगुला विटे लोरेम कर्सस अलिक्वाम. आलिक्वाम अ एराट अ मि बिबेंडम मोलस्टिये. फासेल्लस उत एक्स अ जस्टो डिग्निस्सिम स्केलरिस्क सिट अमेट सेड लिबरो. डुइस एगेस्टास, मि नॉन डापिबुस हेंड्रेरिट, लिबरो नुंक टिन्सीडुंट ऑर्की, इन डिग्निस्सिम एक्स मि अ औगुए. डोनेक सेड नुल्ला इन एलीट ग्राविडा विनेनेटिस एट नॉन औगुए.</p>","ar":"<p>لوريم إيبسوم دولور سيت أميت، كونسكتتور أديبيسينغ إليت. بريسنت فاسيليسيس أنتي أوت بوروس إليفند فيكولا. كراس فيل ديام إليت. نولام سكيلريسكي، نيسي سيد ديغنيسيم فيكولا، سابين لاكوس فرنجيلا أورنا، أت رونكوس إكس لوريم فيتاي ماجنا. نام فيرمينتوم، بوروس سيد كونسكووت فولووتات، لوريم سابين ديكتوم لوريم، فيتاي إويسمود أوغي ريسوس نون مي. إن هاك هابيتاس بلاتيا ديكتومست. دونيك أ أوركي موريس. بيلينتسكي نيك سيم ليبيرو. فيستيبيولوم فرنجيلا نيكوي أوت إيست إفيكيتور أليكويت. نولا فاسيليسي. فوسكي إت ليجولا فيتاي لوريم كورسوس أليكوام. أليكوام أ إيرات أ مي بيبندم مولستيي. فاسيليس أوت إكس أ جوستو ديغنيسيم سكيلريسكي سيت أميت سيد ليبيرو. دويس إيغيتاس، مي نون دابيبوس هندريريت، ليبيرو ننك تنسيدونت أوركي، إن ديغنيسيم إكس مي أ أوغ</p>"}',
                'slug' => 'general-surgery-59',
                'is_active' => 1,
                'is_featured' => 0,
                'image' => '/images/clinic_archives/66ec08b7dd74e.png',
                'location' => NULL,
                'created_at' => '2024-09-19 16:19:19',
                'updated_at' => '2024-09-19 16:19:19',
                'deleted_at' => NULL,
            ),
        ));
        \DB::table('archives')->insert(array (
            0 => 
            array (
                'id' => 60,
                'doctor_id' => NULL,
                'clinic_id' => 22,
                'archive_category_id' => 1,
                'name' => '{"en":"Pharmacology","hi":"शैक्षिक भाषण समारोह","ar":"علم البيئة"}',
                'description' => '{"en":"<p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Praesent facilisis ante ut purus eleifend vehicula. Cras vel diam elit. Nullam scelerisque, nisi sed dignissim vehicula, sapien lacus fringilla urna, at rhoncus ex lorem vitae magna. Nam fermentum, purus sed consequat vulputate, lorem sapien dictum lorem, vitae euismod augue risus non mi. In hac habitasse platea dictumst. Donec a orci mauris. Pellentesque nec sem libero. Vestibulum fringilla neque ut est efficitur aliquet. Nulla facilisi. Fusce et ligula vitae lorem cursus aliquam. Aliquam a erat a mi bibendum molestie. Phasellus ut ex a justo dignissim scelerisque sit amet sed libero. Duis egestas, mi non dapibus hendrerit, libero nunc tincidunt orci, in dignissim ex mi a augue. Donec sed nulla in elit gravida venenatis et non augue. Pellentesque et libero quis lorem convallis viverra. Etiam fermentum sapien turpis, vel posuere velit varius ut.</p>","hi":"<p>लोरेम इप्सम डोलर सिट अमेट, कॉन्सेकट्यूर एडिपिसिंग एलीट. प्रेज़ेंट फसिलिसिस अंते उत पुरुस एलीफेंड व्हीकुला. क्रास वेल डायम एलीट. नुल्लम स्केलरिस्क, निसी सेड डिग्निस्सिम व्हीकुला, सैपियन लकुस फ्रिंजिल्ला उरना, एट रोंकस एक्स लोरेम विटे माग्ना. नाम फेर्मेंटुम, पुरुस सेड कंसक्वाट वुल्पुटेट, लोरेम सैपियन डिक्टम लोरेम, विटे एयूसमोड औगुए रीसस नॉन मी. इन हक हबितास्से प्लाटेआ डिक्टुमस्ट. डोनेक अ ओर्की मौरिस. पेल्लेंटेस्के नेक सेम लिबरो. वेस्टिबुलम फ्रिंजिल्ला नेकुए उत एस्ट एफिकितुर अलिक्वेट. नुल्ला फासिलिसि. फ्यूस्के एट लिगुला विटे लोरेम कर्सस अलिक्वाम. आलिक्वाम अ एराट अ मि बिबेंडम मोलस्टिये. फासेल्लस उत एक्स अ जस्टो डिग्निस्सिम स्केलरिस्क सिट अमेट सेड लिबरो. डुइस एगेस्टास, मि नॉन डापिबुस हेंड्रेरिट, लिबरो नुंक टिन्सीडुंट ऑर्की, इन डिग्निस्सिम एक्स मि अ औगुए. डोनेक सेड नुल्ला इन एलीट ग्राविडा विनेनेटिस एट नॉन औगुए.</p>","ar":"<p>لوريم إيبسوم دولور سيت أميت، كونسكتتور أديبيسينغ إليت. بريسنت فاسيليسيس أنتي أوت بوروس إليفند فيكولا. كراس فيل ديام إليت. نولام سكيلريسكي، نيسي سيد ديغنيسيم فيكولا، سابين لاكوس فرنجيلا أورنا، أت رونكوس إكس لوريم فيتاي ماجنا. نام فيرمينتوم، بوروس سيد كونسكووت فولووتات، لوريم سابين ديكتوم لوريم، فيتاي إويسمود أوغي ريسوس نون مي. إن هاك هابيتاس بلاتيا ديكتومست. دونيك أ أوركي موريس. بيلينتسكي نيك سيم ليبيرو. فيستيبيولوم فرنجيلا نيكوي أوت إيست إفيكيتور أليكويت. نولا فاسيليسي. فوسكي إت ليجولا فيتاي لوريم كورسوس أليكوام. أليكوام أ إيرات أ مي بيبندم مولستيي. فاسيليس أوت إكس أ جوستو ديغنيسيم سكيلريسكي سيت أميت سيد ليبيرو. دويس إيغيتاس، مي نون دابيبوس هندريريت، ليبيرو ننك تنسيدونت أوركي، إن ديغنيسيم إكس مي أ أوغ</p>"}',
                'slug' => 'pharmacology-60',
                'is_active' => 1,
                'is_featured' => 0,
                'image' => '/images/clinic_archives/66ec08f35ebd5.png',
                'location' => NULL,
                'created_at' => '2024-09-19 16:20:19',
                'updated_at' => '2024-09-19 16:20:19',
                'deleted_at' => NULL,
            ),
        ));
        \DB::table('archives')->insert(array (
            0 => 
            array (
                'id' => 61,
                'doctor_id' => NULL,
                'clinic_id' => 23,
                'archive_category_id' => 1,
                'name' => '{"en":"Anatomy","hi":"औद्योगिक डिज़ाइन","ar":"التصميم الصناعي"}',
                'description' => '{"en":"<p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum. Curabitur pretium tincidunt lacus. Nulla gravida orci a odio. Nullam varius, turpis et commodo pharetra, est eros bibendum elit, nec luctus magna felis sollicitudin mauris. Integer in mauris eu nibh euismod gravida. Duis ac tellus et risus vulputate vehicula. Donec lobortis risus a elit. Etiam tempor. Ut ullamcorper, ligula eu tempor congue, eros est euismod turpis, id tincidunt sapien risus a quam. Maecenas fermentum, sem in pharetra pellentesque.</p>","hi":"<p>लोरेम इप्सम डोलर सिट अमेट, कॉन्सेक्टेचर अडिपिसिंग एलीट. सेड डो ईयूसमोड टेम्पोर इन्सीडिडुंट उत लेबोरे एट डोलोरे मैग्ना एलिक्वा. उत एनीम अद मिनिम वेनिआम, क्विस नोस्त्रुड एक्सर्सिटेशन उल्लाम्को लेबोर्स निसी उत अलीक्विप एक्स ए कोमोडो कोन्सेक्वात. डुइस औटे इरुरे डोलोर इन रेप्रिहेंडेरिट इन वोलुप्टेटे वेलिट एसे सिल्लुम डोलोरे यू फुगिअट नल्ला pariatur. एक्सेप्तेउर सिन्न्त ओककेकाट कपिडटात नोन प्रोइडेंट, सुंट इन कुल्पा क्वि ओफ्फिसिअ डेसेरुंत्त मोल्लिट एनिम इड एस्ट laborum. कुरबीतुर प्रेटियम टिंसिडुंट लाकुस. नुल्ला ग्रविधा ओर्सी अ ओडिओ. नुल्लम वारिउस, turpis एट commodo फेरेत्रा, एस्ट एरोस बिबेंदुम एलीट, नेक luctus magna felis sollicitudin mauris. इंटेगेर इन mauris यू nibh euismod gravida. डुइस अच tellus</p>","ar":"<p>لوريم ايبسوم دولار سيت أميت، كونسكتتور أديبيسشينغ إيليت. سيد دو إيوسيمود تيمبور إنسيديدونت أوت لابوري إت دولوري ماغنا أليكا. أوت إينيم أد مينيم فينيام، كويز نوسترود إكسرسيتاشيون أولامكو لابوريس نيسي أوت أليكويب إكس إيا كومودو كونسيكوات. دويس أوتي إيرور دولور إن ريبرهينديريت إن فولوبتات فيليت إيس سيليم دولور يو فوجيات نولا بارياتور. إكسسيبتور سنت أوككاكات كيوبيدتات نون برويدينت، سونت إن كولبا كي أوفيسيا ديسيريونت مولليت أنيم إد إست لابوروم. كيوريبيتور بريتيوم تينسيدونت لاكوس. نيولا غرافيدا أورسي أ أوديو. نيولام فارياس، توربيس إت كومودو فهرترا، إست إيروس بيبيندوم إيليت، نيك لوكتوس ماغنا فيليس سولليتشيتودين ماوريس. إنتيغر إن ماوريس يو نيبه إيوسيمود غرافيدا. دويس أك تيلوس إت ريزيز فلفوتا فيهيكول</p>"}',
                'slug' => 'anatomy-61',
                'is_active' => 1,
                'is_featured' => 0,
                'image' => '/images/clinic_archives/66ed7294a3f76.png',
                'location' => NULL,
                'created_at' => '2024-09-20 18:03:16',
                'updated_at' => '2024-09-20 18:03:16',
                'deleted_at' => NULL,
            ),
        ));
        \DB::table('archives')->insert(array (
            0 => 
            array (
                'id' => 62,
                'doctor_id' => NULL,
                'clinic_id' => 23,
                'archive_category_id' => 2,
                'name' => '{"en":"Biochemistry","hi":"औद्योगिक डिज़ाइन","ar":"التصميم الصناعي"}',
                'description' => '{"en":"<p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum. Curabitur pretium tincidunt lacus. Nulla gravida orci a odio. Nullam varius, turpis et commodo pharetra, est eros bibendum elit, nec luctus magna felis sollicitudin mauris. Integer in mauris eu nibh euismod gravida. Duis ac tellus et risus vulputate vehicula. Donec lobortis risus a elit. Etiam tempor. Ut ullamcorper, ligula eu tempor congue, eros est euismod turpis, id tincidunt sapien risus a quam. Maecenas fermentum, sem in pharetra pellentesque.</p>","hi":"<p>लोरेम इप्सम डोलर सिट अमेट, कॉन्सेक्टेचर अडिपिसिंग एलीट. सेड डो ईयूसमोड टेम्पोर इन्सीडिडुंट उत लेबोरे एट डोलोरे मैग्ना एलिक्वा. उत एनीम अद मिनिम वेनिआम, क्विस नोस्त्रुड एक्सर्सिटेशन उल्लाम्को लेबोर्स निसी उत अलीक्विप एक्स ए कोमोडो कोन्सेक्वात. डुइस औटे इरुरे डोलोर इन रेप्रिहेंडेरिट इन वोलुप्टेटे वेलिट एसे सिल्लुम डोलोरे यू फुगिअट नल्ला pariatur. एक्सेप्तेउर सिन्न्त ओककेकाट कपिडटात नोन प्रोइडेंट, सुंट इन कुल्पा क्वि ओफ्फिसिअ डेसेरुंत्त मोल्लिट एनिम इड एस्ट laborum. कुरबीतुर प्रेटियम टिंसिडुंट लाकुस. नुल्ला ग्रविधा ओर्सी अ ओडिओ. नुल्लम वारिउस, turpis एट commodo फेरेत्रा, एस्ट एरोस बिबेंदुम एलीट, नेक luctus magna felis sollicitudin mauris. इंटेगेर इन mauris यू nibh euismod gravida. डुइस अच tellus</p>","ar":"<p>لوريم ايبسوم دولار سيت أميت، كونسكتتور أديبيسشينغ إيليت. سيد دو إيوسيمود تيمبور إنسيديدونت أوت لابوري إت دولوري ماغنا أليكا. أوت إينيم أد مينيم فينيام، كويز نوسترود إكسرسيتاشيون أولامكو لابوريس نيسي أوت أليكويب إكس إيا كومودو كونسيكوات. دويس أوتي إيرور دولور إن ريبرهينديريت إن فولوبتات فيليت إيس سيليم دولور يو فوجيات نولا بارياتور. إكسسيبتور سنت أوككاكات كيوبيدتات نون برويدينت، سونت إن كولبا كي أوفيسيا ديسيريونت مولليت أنيم إد إست لابوروم. كيوريبيتور بريتيوم تينسيدونت لاكوس. نيولا غرافيدا أورسي أ أوديو. نيولام فارياس، توربيس إت كومودو فهرترا، إست إيروس بيبيندوم إيليت، نيك لوكتوس ماغنا فيليس سولليتشيتودين ماوريس. إنتيغر إن ماوريس يو نيبه إيوسيمود غرافيدا. دويس أك تيلوس إت ريزيز فلفوتا فيهيكول</p>"}',
                'slug' => 'biochemistry-62',
                'is_active' => 1,
                'is_featured' => 0,
                'image' => '/images/clinic_archives/66ed72c52a439.png',
                'location' => NULL,
                'created_at' => '2024-09-20 18:04:05',
                'updated_at' => '2024-09-20 18:04:05',
                'deleted_at' => NULL,
            ),
        ));
        \DB::table('archives')->insert(array (
            0 => 
            array (
                'id' => 63,
                'doctor_id' => NULL,
                'clinic_id' => 23,
                'archive_category_id' => 1,
                'name' => '{"en":"Pathology","hi":"औद्योगिक डिज़ाइन","ar":"فعالية الخطاب التعليمي"}',
                'description' => '{"en":"<p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum. Curabitur pretium tincidunt lacus. Nulla gravida orci a odio. Nullam varius, turpis et commodo pharetra, est eros bibendum elit, nec luctus magna felis sollicitudin mauris. Integer in mauris eu nibh euismod gravida. Duis ac tellus et risus vulputate vehicula. Donec lobortis risus a elit. Etiam tempor. Ut ullamcorper, ligula eu tempor congue, eros est euismod turpis, id tincidunt sapien risus a quam. Maecenas fermentum, sem in pharetra pellentesque.</p>","hi":"<p>लोरेम इप्सम डोलर सिट अमेट, कॉन्सेक्टेचर अडिपिसिंग एलीट. सेड डो ईयूसमोड टेम्पोर इन्सीडिडुंट उत लेबोरे एट डोलोरे मैग्ना एलिक्वा. उत एनीम अद मिनिम वेनिआम, क्विस नोस्त्रुड एक्सर्सिटेशन उल्लाम्को लेबोर्स निसी उत अलीक्विप एक्स ए कोमोडो कोन्सेक्वात. डुइस औटे इरुरे डोलोर इन रेप्रिहेंडेरिट इन वोलुप्टेटे वेलिट एसे सिल्लुम डोलोरे यू फुगिअट नल्ला pariatur. एक्सेप्तेउर सिन्न्त ओककेकाट कपिडटात नोन प्रोइडेंट, सुंट इन कुल्पा क्वि ओफ्फिसिअ डेसेरुंत्त मोल्लिट एनिम इड एस्ट laborum. कुरबीतुर प्रेटियम टिंसिडुंट लाकुस. नुल्ला ग्रविधा ओर्सी अ ओडिओ. नुल्लम वारिउस, turpis एट commodo फेरेत्रा, एस्ट एरोस बिबेंदुम एलीट, नेक luctus magna felis sollicitudin mauris. इंटेगेर इन mauris यू nibh euismod gravida. डुइस अच tellus</p>","ar":"<p>لوريم ايبسوم دولار سيت أميت، كونسكتتور أديبيسشينغ إيليت. سيد دو إيوسيمود تيمبور إنسيديدونت أوت لابوري إت دولوري ماغنا أليكا. أوت إينيم أد مينيم فينيام، كويز نوسترود إكسرسيتاشيون أولامكو لابوريس نيسي أوت أليكويب إكس إيا كومودو كونسيكوات. دويس أوتي إيرور دولور إن ريبرهينديريت إن فولوبتات فيليت إيس سيليم دولور يو فوجيات نولا بارياتور. إكسسيبتور سنت أوككاكات كيوبيدتات نون برويدينت، سونت إن كولبا كي أوفيسيا ديسيريونت مولليت أنيم إد إست لابوروم. كيوريبيتور بريتيوم تينسيدونت لاكوس. نيولا غرافيدا أورسي أ أوديو. نيولام فارياس، توربيس إت كومودو فهرترا، إست إيروس بيبيندوم إيليت، نيك لوكتوس ماغنا فيليس سولليتشيتودين ماوريس. إنتيغر إن ماوريس يو نيبه إيوسيمود غرافيدا. دويس أك تيلوس إت ريزيز فلفوتا فيهيكول</p>"}',
                'slug' => 'pathology-63',
                'is_active' => 1,
                'is_featured' => 0,
                'image' => '/images/clinic_archives/66ed72ef541c2.png',
                'location' => NULL,
                'created_at' => '2024-09-20 18:04:47',
                'updated_at' => '2024-09-20 18:04:47',
                'deleted_at' => NULL,
            ),
        ));
        \DB::table('archives')->insert(array (
            0 => 
            array (
                'id' => 64,
                'doctor_id' => NULL,
                'clinic_id' => 28,
                'archive_category_id' => 1,
                'name' => '{"en":"Anatomy","hi":"औद्योगिक डिज़ाइन","ar":"التصميم الصناعي"}',
                'description' => '{"en":"<p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Praesent facilisis ante ut purus eleifend vehicula. Cras vel diam elit. Nullam scelerisque, nisi sed dignissim vehicula, sapien lacus fringilla urna, at rhoncus ex lorem vitae magna. Nam fermentum, purus sed consequat vulputate, lorem sapien dictum lorem, vitae euismod augue risus non mi. In hac habitasse platea dictumst. Donec a orci mauris. Pellentesque nec sem libero. Vestibulum fringilla neque ut est efficitur aliquet. Nulla facilisi. Fusce et ligula vitae lorem cursus aliquam. Aliquam a erat a mi bibendum molestie. Phasellus ut ex a justo dignissim scelerisque sit amet sed libero. Duis egestas, mi non dapibus hendrerit, libero nunc tincidunt orci, in dignissim ex mi a augue. Donec sed nulla in elit gravida venenatis et non augue. Pellentesque et libero quis lorem convallis viverra. Etiam fermentum sapien turpis, vel posuere velit varius ut.</p>","hi":"<p>लोरेम इप्सम डोलर सिट अमेट, कॉन्सेकट्यूर एडिपिसिंग एलीट. प्रेज़ेंट फसिलिसिस अंते उत पुरुस एलीफेंड व्हीकुला. क्रास वेल डायम एलीट. नुल्लम स्केलरिस्क, निसी सेड डिग्निस्सिम व्हीकुला, सैपियन लकुस फ्रिंजिल्ला उरना, एट रोंकस एक्स लोरेम विटे माग्ना. नाम फेर्मेंटुम, पुरुस सेड कंसक्वाट वुल्पुटेट, लोरेम सैपियन डिक्टम लोरेम, विटे एयूसमोड औगुए रीसस नॉन मी. इन हक हबितास्से प्लाटेआ डिक्टुमस्ट. डोनेक अ ओर्की मौरिस. पेल्लेंटेस्के नेक सेम लिबरो. वेस्टिबुलम फ्रिंजिल्ला नेकुए उत एस्ट एफिकितुर अलिक्वेट. नुल्ला फासिलिसि. फ्यूस्के एट लिगुला विटे लोरेम कर्सस अलिक्वाम. आलिक्वाम अ एराट अ मि बिबेंडम मोलस्टिये. फासेल्लस उत एक्स अ जस्टो डिग्निस्सिम स्केलरिस्क सिट अमेट सेड लिबरो. डुइस एगेस्टास, मि नॉन डापिबुस हेंड्रेरिट, लिबरो नुंक टिन्सीडुंट ऑर्की, इन डिग्निस्सिम एक्स मि अ औगुए. डोनेक सेड नुल्ला इन एलीट ग्राविडा विनेनेटिस एट नॉन औगुए.</p>","ar":"<p>لوريم إيبسوم دولور سيت أميت، كونسكتتور أديبيسينغ إليت. بريسنت فاسيليسيس أنتي أوت بوروس إليفند فيكولا. كراس فيل ديام إليت. نولام سكيلريسكي، نيسي سيد ديغنيسيم فيكولا، سابين لاكوس فرنجيلا أورنا، أت رونكوس إكس لوريم فيتاي ماجنا. نام فيرمينتوم، بوروس سيد كونسكووت فولووتات، لوريم سابين ديكتوم لوريم، فيتاي إويسمود أوغي ريسوس نون مي. إن هاك هابيتاس بلاتيا ديكتومست. دونيك أ أوركي موريس. بيلينتسكي نيك سيم ليبيرو. فيستيبيولوم فرنجيلا نيكوي أوت إيست إفيكيتور أليكويت. نولا فاسيليسي. فوسكي إت ليجولا فيتاي لوريم كورسوس أليكوام. أليكوام أ إيرات أ مي بيبندم مولستيي. فاسيليس أوت إكس أ جوستو ديغنيسيم سكيلريسكي سيت أميت سيد ليبيرو. دويس إيغيتاس، مي نون دابيبوس هندريريت، ليبيرو ننك تنسيدونت أوركي، إن ديغنيسيم إكس مي أ أوغ</p>"}',
                'slug' => 'anatomy-64',
                'is_active' => 1,
                'is_featured' => 0,
                'image' => '/images/clinic_archives/66f25fee8a84e.png',
                'location' => NULL,
                'created_at' => '2024-09-24 11:45:02',
                'updated_at' => '2024-09-24 11:45:02',
                'deleted_at' => NULL,
            ),
        ));
        \DB::table('archives')->insert(array (
            0 => 
            array (
                'id' => 65,
                'doctor_id' => NULL,
                'clinic_id' => 28,
                'archive_category_id' => 2,
                'name' => '{"en":"Biochemistry","hi":"क्विज़ प्रतियोगिता","ar":"مسابقة معلومات"}',
                'description' => '{"en":"<p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Praesent facilisis ante ut purus eleifend vehicula. Cras vel diam elit. Nullam scelerisque, nisi sed dignissim vehicula, sapien lacus fringilla urna, at rhoncus ex lorem vitae magna. Nam fermentum, purus sed consequat vulputate, lorem sapien dictum lorem, vitae euismod augue risus non mi. In hac habitasse platea dictumst. Donec a orci mauris. Pellentesque nec sem libero. Vestibulum fringilla neque ut est efficitur aliquet. Nulla facilisi. Fusce et ligula vitae lorem cursus aliquam. Aliquam a erat a mi bibendum molestie. Phasellus ut ex a justo dignissim scelerisque sit amet sed libero. Duis egestas, mi non dapibus hendrerit, libero nunc tincidunt orci, in dignissim ex mi a augue. Donec sed nulla in elit gravida venenatis et non augue. Pellentesque et libero quis lorem convallis viverra. Etiam fermentum sapien turpis, vel posuere velit varius ut.</p>","hi":"<p>लोरेम इप्सम डोलर सिट अमेट, कॉन्सेकट्यूर एडिपिसिंग एलीट. प्रेज़ेंट फसिलिसिस अंते उत पुरुस एलीफेंड व्हीकुला. क्रास वेल डायम एलीट. नुल्लम स्केलरिस्क, निसी सेड डिग्निस्सिम व्हीकुला, सैपियन लकुस फ्रिंजिल्ला उरना, एट रोंकस एक्स लोरेम विटे माग्ना. नाम फेर्मेंटुम, पुरुस सेड कंसक्वाट वुल्पुटेट, लोरेम सैपियन डिक्टम लोरेम, विटे एयूसमोड औगुए रीसस नॉन मी. इन हक हबितास्से प्लाटेआ डिक्टुमस्ट. डोनेक अ ओर्की मौरिस. पेल्लेंटेस्के नेक सेम लिबरो. वेस्टिबुलम फ्रिंजिल्ला नेकुए उत एस्ट एफिकितुर अलिक्वेट. नुल्ला फासिलिसि. फ्यूस्के एट लिगुला विटे लोरेम कर्सस अलिक्वाम. आलिक्वाम अ एराट अ मि बिबेंडम मोलस्टिये. फासेल्लस उत एक्स अ जस्टो डिग्निस्सिम स्केलरिस्क सिट अमेट सेड लिबरो. डुइस एगेस्टास, मि नॉन डापिबुस हेंड्रेरिट, लिबरो नुंक टिन्सीडुंट ऑर्की, इन डिग्निस्सिम एक्स मि अ औगुए. डोनेक सेड नुल्ला इन एलीट ग्राविडा विनेनेटिस एट नॉन औगुए.</p>","ar":"<p>لوريم إيبسوم دولور سيت أميت، كونسكتتور أديبيسينغ إليت. بريسنت فاسيليسيس أنتي أوت بوروس إليفند فيكولا. كراس فيل ديام إليت. نولام سكيلريسكي، نيسي سيد ديغنيسيم فيكولا، سابين لاكوس فرنجيلا أورنا، أت رونكوس إكس لوريم فيتاي ماجنا. نام فيرمينتوم، بوروس سيد كونسكووت فولووتات، لوريم سابين ديكتوم لوريم، فيتاي إويسمود أوغي ريسوس نون مي. إن هاك هابيتاس بلاتيا ديكتومست. دونيك أ أوركي موريس. بيلينتسكي نيك سيم ليبيرو. فيستيبيولوم فرنجيلا نيكوي أوت إيست إفيكيتور أليكويت. نولا فاسيليسي. فوسكي إت ليجولا فيتاي لوريم كورسوس أليكوام. أليكوام أ إيرات أ مي بيبندم مولستيي. فاسيليس أوت إكس أ جوستو ديغنيسيم سكيلريسكي سيت أميت سيد ليبيرو. دويس إيغيتاس، مي نون دابيبوس هندريريت، ليبيرو ننك تنسيدونت أوركي، إن ديغنيسيم إكس مي أ أوغ</p>"}',
                'slug' => 'biochemistry-65',
                'is_active' => 1,
                'is_featured' => 0,
                'image' => '/images/clinic_archives/66f2602f061c6.png',
                'location' => NULL,
                'created_at' => '2024-09-24 11:46:07',
                'updated_at' => '2024-09-24 11:46:07',
                'deleted_at' => NULL,
            ),
        ));
        \DB::table('archives')->insert(array (
            0 => 
            array (
                'id' => 66,
                'doctor_id' => NULL,
                'clinic_id' => 28,
                'archive_category_id' => 2,
                'name' => '{"en":"Pathology","hi":"पारिस्थितिकी","ar":"التصميم الصناعي"}',
                'description' => '{"en":"<p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Praesent facilisis ante ut purus eleifend vehicula. Cras vel diam elit. Nullam scelerisque, nisi sed dignissim vehicula, sapien lacus fringilla urna, at rhoncus ex lorem vitae magna. Nam fermentum, purus sed consequat vulputate, lorem sapien dictum lorem, vitae euismod augue risus non mi. In hac habitasse platea dictumst. Donec a orci mauris. Pellentesque nec sem libero. Vestibulum fringilla neque ut est efficitur aliquet. Nulla facilisi. Fusce et ligula vitae lorem cursus aliquam. Aliquam a erat a mi bibendum molestie. Phasellus ut ex a justo dignissim scelerisque sit amet sed libero. Duis egestas, mi non dapibus hendrerit, libero nunc tincidunt orci, in dignissim ex mi a augue. Donec sed nulla in elit gravida venenatis et non augue. Pellentesque et libero quis lorem convallis viverra. Etiam fermentum sapien turpis, vel posuere velit varius ut.</p>","hi":"<p>लोरेम इप्सम डोलर सिट अमेट, कॉन्सेकट्यूर एडिपिसिंग एलीट. प्रेज़ेंट फसिलिसिस अंते उत पुरुस एलीफेंड व्हीकुला. क्रास वेल डायम एलीट. नुल्लम स्केलरिस्क, निसी सेड डिग्निस्सिम व्हीकुला, सैपियन लकुस फ्रिंजिल्ला उरना, एट रोंकस एक्स लोरेम विटे माग्ना. नाम फेर्मेंटुम, पुरुस सेड कंसक्वाट वुल्पुटेट, लोरेम सैपियन डिक्टम लोरेम, विटे एयूसमोड औगुए रीसस नॉन मी. इन हक हबितास्से प्लाटेआ डिक्टुमस्ट. डोनेक अ ओर्की मौरिस. पेल्लेंटेस्के नेक सेम लिबरो. वेस्टिबुलम फ्रिंजिल्ला नेकुए उत एस्ट एफिकितुर अलिक्वेट. नुल्ला फासिलिसि. फ्यूस्के एट लिगुला विटे लोरेम कर्सस अलिक्वाम. आलिक्वाम अ एराट अ मि बिबेंडम मोलस्टिये. फासेल्लस उत एक्स अ जस्टो डिग्निस्सिम स्केलरिस्क सिट अमेट सेड लिबरो. डुइस एगेस्टास, मि नॉन डापिबुस हेंड्रेरिट, लिबरो नुंक टिन्सीडुंट ऑर्की, इन डिग्निस्सिम एक्स मि अ औगुए. डोनेक सेड नुल्ला इन एलीट ग्राविडा विनेनेटिस एट नॉन औगुए.</p>","ar":"<p>لوريم إيبسوم دولور سيت أميت، كونسكتتور أديبيسينغ إليت. بريسنت فاسيليسيس أنتي أوت بوروس إليفند فيكولا. كراس فيل ديام إليت. نولام سكيلريسكي، نيسي سيد ديغنيسيم فيكولا، سابين لاكوس فرنجيلا أورنا، أت رونكوس إكس لوريم فيتاي ماجنا. نام فيرمينتوم، بوروس سيد كونسكووت فولووتات، لوريم سابين ديكتوم لوريم، فيتاي إويسمود أوغي ريسوس نون مي. إن هاك هابيتاس بلاتيا ديكتومست. دونيك أ أوركي موريس. بيلينتسكي نيك سيم ليبيرو. فيستيبيولوم فرنجيلا نيكوي أوت إيست إفيكيتور أليكويت. نولا فاسيليسي. فوسكي إت ليجولا فيتاي لوريم كورسوس أليكوام. أليكوام أ إيرات أ مي بيبندم مولستيي. فاسيليس أوت إكس أ جوستو ديغنيسيم سكيلريسكي سيت أميت سيد ليبيرو. دويس إيغيتاس، مي نون دابيبوس هندريريت، ليبيرو ننك تنسيدونت أوركي، إن ديغنيسيم إكس مي أ أوغ</p>"}',
                'slug' => 'pathology-66',
                'is_active' => 1,
                'is_featured' => 0,
                'image' => '/images/clinic_archives/66f26051ebc51.png',
                'location' => NULL,
                'created_at' => '2024-09-24 11:46:41',
                'updated_at' => '2024-09-24 11:46:41',
                'deleted_at' => NULL,
            ),
        ));
        \DB::table('archives')->insert(array (
            0 => 
            array (
                'id' => 67,
                'doctor_id' => NULL,
                'clinic_id' => 29,
                'archive_category_id' => 2,
                'name' => '{"en":"Forensic Medicine","hi":"क्विज़ प्रतियोगिता","ar":"مسابقة معلومات"}',
                'description' => '{"en":"<p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Praesent facilisis ante ut purus eleifend vehicula. Cras vel diam elit. Nullam scelerisque, nisi sed dignissim vehicula, sapien lacus fringilla urna, at rhoncus ex lorem vitae magna. Nam fermentum, purus sed consequat vulputate, lorem sapien dictum lorem, vitae euismod augue risus non mi. In hac habitasse platea dictumst. Donec a orci mauris. Pellentesque nec sem libero. Vestibulum fringilla neque ut est efficitur aliquet. Nulla facilisi. Fusce et ligula vitae lorem cursus aliquam. Aliquam a erat a mi bibendum molestie. Phasellus ut ex a justo dignissim scelerisque sit amet sed libero. Duis egestas, mi non dapibus hendrerit, libero nunc tincidunt orci, in dignissim ex mi a augue. Donec sed nulla in elit gravida venenatis et non augue. Pellentesque et libero quis lorem convallis viverra. Etiam fermentum sapien turpis, vel posuere velit varius ut.</p>","hi":"<p>लोरेम इप्सम डोलर सिट अमेट, कॉन्सेकट्यूर एडिपिसिंग एलीट. प्रेज़ेंट फसिलिसिस अंते उत पुरुस एलीफेंड व्हीकुला. क्रास वेल डायम एलीट. नुल्लम स्केलरिस्क, निसी सेड डिग्निस्सिम व्हीकुला, सैपियन लकुस फ्रिंजिल्ला उरना, एट रोंकस एक्स लोरेम विटे माग्ना. नाम फेर्मेंटुम, पुरुस सेड कंसक्वाट वुल्पुटेट, लोरेम सैपियन डिक्टम लोरेम, विटे एयूसमोड औगुए रीसस नॉन मी. इन हक हबितास्से प्लाटेआ डिक्टुमस्ट. डोनेक अ ओर्की मौरिस. पेल्लेंटेस्के नेक सेम लिबरो. वेस्टिबुलम फ्रिंजिल्ला नेकुए उत एस्ट एफिकितुर अलिक्वेट. नुल्ला फासिलिसि. फ्यूस्के एट लिगुला विटे लोरेम कर्सस अलिक्वाम. आलिक्वाम अ एराट अ मि बिबेंडम मोलस्टिये. फासेल्लस उत एक्स अ जस्टो डिग्निस्सिम स्केलरिस्क सिट अमेट सेड लिबरो. डुइस एगेस्टास, मि नॉन डापिबुस हेंड्रेरिट, लिबरो नुंक टिन्सीडुंट ऑर्की, इन डिग्निस्सिम एक्स मि अ औगुए. डोनेक सेड नुल्ला इन एलीट ग्राविडा विनेनेटिस एट नॉन औगुए.</p>","ar":"<p>لوريم إيبسوم دولور سيت أميت، كونسكتتور أديبيسينغ إليت. بريسنت فاسيليسيس أنتي أوت بوروس إليفند فيكولا. كراس فيل ديام إليت. نولام سكيلريسكي، نيسي سيد ديغنيسيم فيكولا، سابين لاكوس فرنجيلا أورنا، أت رونكوس إكس لوريم فيتاي ماجنا. نام فيرمينتوم، بوروس سيد كونسكووت فولووتات، لوريم سابين ديكتوم لوريم، فيتاي إويسمود أوغي ريسوس نون مي. إن هاك هابيتاس بلاتيا ديكتومست. دونيك أ أوركي موريس. بيلينتسكي نيك سيم ليبيرو. فيستيبيولوم فرنجيلا نيكوي أوت إيست إفيكيتور أليكويت. نولا فاسيليسي. فوسكي إت ليجولا فيتاي لوريم كورسوس أليكوام. أليكوام أ إيرات أ مي بيبندم مولستيي. فاسيليس أوت إكس أ جوستو ديغنيسيم سكيلريسكي سيت أميت سيد ليبيرو. دويس إيغيتاس، مي نون دابيبوس هندريريت، ليبيرو ننك تنسيدونت أوركي، إن ديغنيسيم إكس مي أ أوغ</p>"}',
                'slug' => 'forensic-medicine-67',
                'is_active' => 1,
                'is_featured' => 0,
                'image' => '/images/clinic_archives/66f2635b4675c.png',
                'location' => NULL,
                'created_at' => '2024-09-24 11:59:39',
                'updated_at' => '2024-09-24 11:59:39',
                'deleted_at' => NULL,
            ),
        ));
        \DB::table('archives')->insert(array (
            0 => 
            array (
                'id' => 68,
                'doctor_id' => NULL,
                'clinic_id' => 29,
                'archive_category_id' => 1,
                'name' => '{"en":"General Surgery","hi":"क्विज़ प्रतियोगिता","ar":"علم البيئة"}',
                'description' => '{"en":"<p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Praesent facilisis ante ut purus eleifend vehicula. Cras vel diam elit. Nullam scelerisque, nisi sed dignissim vehicula, sapien lacus fringilla urna, at rhoncus ex lorem vitae magna. Nam fermentum, purus sed consequat vulputate, lorem sapien dictum lorem, vitae euismod augue risus non mi. In hac habitasse platea dictumst. Donec a orci mauris. Pellentesque nec sem libero. Vestibulum fringilla neque ut est efficitur aliquet. Nulla facilisi. Fusce et ligula vitae lorem cursus aliquam. Aliquam a erat a mi bibendum molestie. Phasellus ut ex a justo dignissim scelerisque sit amet sed libero. Duis egestas, mi non dapibus hendrerit, libero nunc tincidunt orci, in dignissim ex mi a augue. Donec sed nulla in elit gravida venenatis et non augue. Pellentesque et libero quis lorem convallis viverra. Etiam fermentum sapien turpis, vel posuere velit varius ut.</p>","hi":"<p>लोरेम इप्सम डोलर सिट अमेट, कॉन्सेकट्यूर एडिपिसिंग एलीट. प्रेज़ेंट फसिलिसिस अंते उत पुरुस एलीफेंड व्हीकुला. क्रास वेल डायम एलीट. नुल्लम स्केलरिस्क, निसी सेड डिग्निस्सिम व्हीकुला, सैपियन लकुस फ्रिंजिल्ला उरना, एट रोंकस एक्स लोरेम विटे माग्ना. नाम फेर्मेंटुम, पुरुस सेड कंसक्वाट वुल्पुटेट, लोरेम सैपियन डिक्टम लोरेम, विटे एयूसमोड औगुए रीसस नॉन मी. इन हक हबितास्से प्लाटेआ डिक्टुमस्ट. डोनेक अ ओर्की मौरिस. पेल्लेंटेस्के नेक सेम लिबरो. वेस्टिबुलम फ्रिंजिल्ला नेकुए उत एस्ट एफिकितुर अलिक्वेट. नुल्ला फासिलिसि. फ्यूस्के एट लिगुला विटे लोरेम कर्सस अलिक्वाम. आलिक्वाम अ एराट अ मि बिबेंडम मोलस्टिये. फासेल्लस उत एक्स अ जस्टो डिग्निस्सिम स्केलरिस्क सिट अमेट सेड लिबरो. डुइस एगेस्टास, मि नॉन डापिबुस हेंड्रेरिट, लिबरो नुंक टिन्सीडुंट ऑर्की, इन डिग्निस्सिम एक्स मि अ औगुए. डोनेक सेड नुल्ला इन एलीट ग्राविडा विनेनेटिस एट नॉन औगुए.</p>","ar":"<p>لوريم إيبسوم دولور سيت أميت، كونسكتتور أديبيسينغ إليت. بريسنت فاسيليسيس أنتي أوت بوروس إليفند فيكولا. كراس فيل ديام إليت. نولام سكيلريسكي، نيسي سيد ديغنيسيم فيكولا، سابين لاكوس فرنجيلا أورنا، أت رونكوس إكس لوريم فيتاي ماجنا. نام فيرمينتوم، بوروس سيد كونسكووت فولووتات، لوريم سابين ديكتوم لوريم، فيتاي إويسمود أوغي ريسوس نون مي. إن هاك هابيتاس بلاتيا ديكتومست. دونيك أ أوركي موريس. بيلينتسكي نيك سيم ليبيرو. فيستيبيولوم فرنجيلا نيكوي أوت إيست إفيكيتور أليكويت. نولا فاسيليسي. فوسكي إت ليجولا فيتاي لوريم كورسوس أليكوام. أليكوام أ إيرات أ مي بيبندم مولستيي. فاسيليس أوت إكس أ جوستو ديغنيسيم سكيلريسكي سيت أميت سيد ليبيرو. دويس إيغيتاس، مي نون دابيبوس هندريريت، ليبيرو ننك تنسيدونت أوركي، إن ديغنيسيم إكس مي أ أوغ</p>"}',
                'slug' => 'general-surgery-68',
                'is_active' => 1,
                'is_featured' => 0,
                'image' => '/images/clinic_archives/66f2638472bc9.png',
                'location' => NULL,
                'created_at' => '2024-09-24 12:00:20',
                'updated_at' => '2024-09-24 12:00:20',
                'deleted_at' => NULL,
            ),
        ));
        \DB::table('archives')->insert(array (
            0 => 
            array (
                'id' => 69,
                'doctor_id' => NULL,
                'clinic_id' => 29,
                'archive_category_id' => 1,
                'name' => '{"en":"Pharmacology","hi":"औद्योगिक डिज़ाइन","ar":"التصميم الصناعي"}',
                'description' => '{"en":"<p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Praesent facilisis ante ut purus eleifend vehicula. Cras vel diam elit. Nullam scelerisque, nisi sed dignissim vehicula, sapien lacus fringilla urna, at rhoncus ex lorem vitae magna. Nam fermentum, purus sed consequat vulputate, lorem sapien dictum lorem, vitae euismod augue risus non mi. In hac habitasse platea dictumst. Donec a orci mauris. Pellentesque nec sem libero. Vestibulum fringilla neque ut est efficitur aliquet. Nulla facilisi. Fusce et ligula vitae lorem cursus aliquam. Aliquam a erat a mi bibendum molestie. Phasellus ut ex a justo dignissim scelerisque sit amet sed libero. Duis egestas, mi non dapibus hendrerit, libero nunc tincidunt orci, in dignissim ex mi a augue. Donec sed nulla in elit gravida venenatis et non augue. Pellentesque et libero quis lorem convallis viverra. Etiam fermentum sapien turpis, vel posuere velit varius ut.</p>","hi":"<p>लोरेम इप्सम डोलर सिट अमेट, कॉन्सेकट्यूर एडिपिसिंग एलीट. प्रेज़ेंट फसिलिसिस अंते उत पुरुस एलीफेंड व्हीकुला. क्रास वेल डायम एलीट. नुल्लम स्केलरिस्क, निसी सेड डिग्निस्सिम व्हीकुला, सैपियन लकुस फ्रिंजिल्ला उरना, एट रोंकस एक्स लोरेम विटे माग्ना. नाम फेर्मेंटुम, पुरुस सेड कंसक्वाट वुल्पुटेट, लोरेम सैपियन डिक्टम लोरेम, विटे एयूसमोड औगुए रीसस नॉन मी. इन हक हबितास्से प्लाटेआ डिक्टुमस्ट. डोनेक अ ओर्की मौरिस. पेल्लेंटेस्के नेक सेम लिबरो. वेस्टिबुलम फ्रिंजिल्ला नेकुए उत एस्ट एफिकितुर अलिक्वेट. नुल्ला फासिलिसि. फ्यूस्के एट लिगुला विटे लोरेम कर्सस अलिक्वाम. आलिक्वाम अ एराट अ मि बिबेंडम मोलस्टिये. फासेल्लस उत एक्स अ जस्टो डिग्निस्सिम स्केलरिस्क सिट अमेट सेड लिबरो. डुइस एगेस्टास, मि नॉन डापिबुस हेंड्रेरिट, लिबरो नुंक टिन्सीडुंट ऑर्की, इन डिग्निस्सिम एक्स मि अ औगुए. डोनेक सेड नुल्ला इन एलीट ग्राविडा विनेनेटिस एट नॉन औगुए.</p>","ar":"<p>لوريم إيبسوم دولور سيت أميت، كونسكتتور أديبيسينغ إليت. بريسنت فاسيليسيس أنتي أوت بوروس إليفند فيكولا. كراس فيل ديام إليت. نولام سكيلريسكي، نيسي سيد ديغنيسيم فيكولا، سابين لاكوس فرنجيلا أورنا، أت رونكوس إكس لوريم فيتاي ماجنا. نام فيرمينتوم، بوروس سيد كونسكووت فولووتات، لوريم سابين ديكتوم لوريم، فيتاي إويسمود أوغي ريسوس نون مي. إن هاك هابيتاس بلاتيا ديكتومست. دونيك أ أوركي موريس. بيلينتسكي نيك سيم ليبيرو. فيستيبيولوم فرنجيلا نيكوي أوت إيست إفيكيتور أليكويت. نولا فاسيليسي. فوسكي إت ليجولا فيتاي لوريم كورسوس أليكوام. أليكوام أ إيرات أ مي بيبندم مولستيي. فاسيليس أوت إكس أ جوستو ديغنيسيم سكيلريسكي سيت أميت سيد ليبيرو. دويس إيغيتاس، مي نون دابيبوس هندريريت، ليبيرو ننك تنسيدونت أوركي، إن ديغنيسيم إكس مي أ أوغ</p>"}',
                'slug' => 'pharmacology-69',
                'is_active' => 1,
                'is_featured' => 0,
                'image' => '/images/clinic_archives/66f263b6e3c79.png',
                'location' => NULL,
                'created_at' => '2024-09-24 12:01:10',
                'updated_at' => '2024-09-24 12:01:10',
                'deleted_at' => NULL,
            ),
        ));
        \DB::table('archives')->insert(array (
            0 => 
            array (
                'id' => 70,
                'doctor_id' => NULL,
                'clinic_id' => 30,
                'archive_category_id' => 1,
                'name' => '{"en":"Anesthesiology","hi":"कृत्रिम बुद्धिमत्ता","ar":"فعالية الخطاب التعليمي"}',
                'description' => '{"en":"<p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Praesent facilisis ante ut purus eleifend vehicula. Cras vel diam elit. Nullam scelerisque, nisi sed dignissim vehicula, sapien lacus fringilla urna, at rhoncus ex lorem vitae magna. Nam fermentum, purus sed consequat vulputate, lorem sapien dictum lorem, vitae euismod augue risus non mi. In hac habitasse platea dictumst. Donec a orci mauris. Pellentesque nec sem libero. Vestibulum fringilla neque ut est efficitur aliquet. Nulla facilisi. Fusce et ligula vitae lorem cursus aliquam. Aliquam a erat a mi bibendum molestie. Phasellus ut ex a justo dignissim scelerisque sit amet sed libero. Duis egestas, mi non dapibus hendrerit, libero nunc tincidunt orci, in dignissim ex mi a augue. Donec sed nulla in elit gravida venenatis et non augue. Pellentesque et libero quis lorem convallis viverra. Etiam fermentum sapien turpis, vel posuere velit varius ut.</p>","hi":"<p>लोरेम इप्सम डोलर सिट अमेट, कॉन्सेकट्यूर एडिपिसिंग एलीट. प्रेज़ेंट फसिलिसिस अंते उत पुरुस एलीफेंड व्हीकुला. क्रास वेल डायम एलीट. नुल्लम स्केलरिस्क, निसी सेड डिग्निस्सिम व्हीकुला, सैपियन लकुस फ्रिंजिल्ला उरना, एट रोंकस एक्स लोरेम विटे माग्ना. नाम फेर्मेंटुम, पुरुस सेड कंसक्वाट वुल्पुटेट, लोरेम सैपियन डिक्टम लोरेम, विटे एयूसमोड औगुए रीसस नॉन मी. इन हक हबितास्से प्लाटेआ डिक्टुमस्ट. डोनेक अ ओर्की मौरिस. पेल्लेंटेस्के नेक सेम लिबरो. वेस्टिबुलम फ्रिंजिल्ला नेकुए उत एस्ट एफिकितुर अलिक्वेट. नुल्ला फासिलिसि. फ्यूस्के एट लिगुला विटे लोरेम कर्सस अलिक्वाम. आलिक्वाम अ एराट अ मि बिबेंडम मोलस्टिये. फासेल्लस उत एक्स अ जस्टो डिग्निस्सिम स्केलरिस्क सिट अमेट सेड लिबरो. डुइस एगेस्टास, मि नॉन डापिबुस हेंड्रेरिट, लिबरो नुंक टिन्सीडुंट ऑर्की, इन डिग्निस्सिम एक्स मि अ औगुए. डोनेक सेड नुल्ला इन एलीट ग्राविडा विनेनेटिस एट नॉन औगुए.</p>","ar":"<p>لوريم إيبسوم دولور سيت أميت، كونسكتتور أديبيسينغ إليت. بريسنت فاسيليسيس أنتي أوت بوروس إليفند فيكولا. كراس فيل ديام إليت. نولام سكيلريسكي، نيسي سيد ديغنيسيم فيكولا، سابين لاكوس فرنجيلا أورنا، أت رونكوس إكس لوريم فيتاي ماجنا. نام فيرمينتوم، بوروس سيد كونسكووت فولووتات، لوريم سابين ديكتوم لوريم، فيتاي إويسمود أوغي ريسوس نون مي. إن هاك هابيتاس بلاتيا ديكتومست. دونيك أ أوركي موريس. بيلينتسكي نيك سيم ليبيرو. فيستيبيولوم فرنجيلا نيكوي أوت إيست إفيكيتور أليكويت. نولا فاسيليسي. فوسكي إت ليجولا فيتاي لوريم كورسوس أليكوام. أليكوام أ إيرات أ مي بيبندم مولستيي. فاسيليس أوت إكس أ جوستو ديغنيسيم سكيلريسكي سيت أميت سيد ليبيرو. دويس إيغيتاس، مي نون دابيبوس هندريريت، ليبيرو ننك تنسيدونت أوركي، إن ديغنيسيم إكس مي أ أوغ</p>"}',
                'slug' => 'anesthesiology-70',
                'is_active' => 1,
                'is_featured' => 0,
                'image' => '/images/clinic_archives/66f267a0c8759.png',
                'location' => NULL,
                'created_at' => '2024-09-24 12:17:52',
                'updated_at' => '2024-09-24 12:17:52',
                'deleted_at' => NULL,
            ),
        ));
        \DB::table('archives')->insert(array (
            0 => 
            array (
                'id' => 71,
                'doctor_id' => NULL,
                'clinic_id' => 30,
                'archive_category_id' => 1,
                'name' => '{"en":"Dermatology","hi":"क्विज़ प्रतियोगिता","ar":"علم البيئة"}',
                'description' => '{"en":"<p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Praesent facilisis ante ut purus eleifend vehicula. Cras vel diam elit. Nullam scelerisque, nisi sed dignissim vehicula, sapien lacus fringilla urna, at rhoncus ex lorem vitae magna. Nam fermentum, purus sed consequat vulputate, lorem sapien dictum lorem, vitae euismod augue risus non mi. In hac habitasse platea dictumst. Donec a orci mauris. Pellentesque nec sem libero. Vestibulum fringilla neque ut est efficitur aliquet. Nulla facilisi. Fusce et ligula vitae lorem cursus aliquam. Aliquam a erat a mi bibendum molestie. Phasellus ut ex a justo dignissim scelerisque sit amet sed libero. Duis egestas, mi non dapibus hendrerit, libero nunc tincidunt orci, in dignissim ex mi a augue. Donec sed nulla in elit gravida venenatis et non augue. Pellentesque et libero quis lorem convallis viverra. Etiam fermentum sapien turpis, vel posuere velit varius ut.</p>","hi":"<p>लोरेम इप्सम डोलर सिट अमेट, कॉन्सेकट्यूर एडिपिसिंग एलीट. प्रेज़ेंट फसिलिसिस अंते उत पुरुस एलीफेंड व्हीकुला. क्रास वेल डायम एलीट. नुल्लम स्केलरिस्क, निसी सेड डिग्निस्सिम व्हीकुला, सैपियन लकुस फ्रिंजिल्ला उरना, एट रोंकस एक्स लोरेम विटे माग्ना. नाम फेर्मेंटुम, पुरुस सेड कंसक्वाट वुल्पुटेट, लोरेम सैपियन डिक्टम लोरेम, विटे एयूसमोड औगुए रीसस नॉन मी. इन हक हबितास्से प्लाटेआ डिक्टुमस्ट. डोनेक अ ओर्की मौरिस. पेल्लेंटेस्के नेक सेम लिबरो. वेस्टिबुलम फ्रिंजिल्ला नेकुए उत एस्ट एफिकितुर अलिक्वेट. नुल्ला फासिलिसि. फ्यूस्के एट लिगुला विटे लोरेम कर्सस अलिक्वाम. आलिक्वाम अ एराट अ मि बिबेंडम मोलस्टिये. फासेल्लस उत एक्स अ जस्टो डिग्निस्सिम स्केलरिस्क सिट अमेट सेड लिबरो. डुइस एगेस्टास, मि नॉन डापिबुस हेंड्रेरिट, लिबरो नुंक टिन्सीडुंट ऑर्की, इन डिग्निस्सिम एक्स मि अ औगुए. डोनेक सेड नुल्ला इन एलीट ग्राविडा विनेनेटिस एट नॉन औगुए.</p>","ar":"<p>لوريم إيبسوم دولور سيت أميت، كونسكتتور أديبيسينغ إليت. بريسنت فاسيليسيس أنتي أوت بوروس إليفند فيكولا. كراس فيل ديام إليت. نولام سكيلريسكي، نيسي سيد ديغنيسيم فيكولا، سابين لاكوس فرنجيلا أورنا، أت رونكوس إكس لوريم فيتاي ماجنا. نام فيرمينتوم، بوروس سيد كونسكووت فولووتات، لوريم سابين ديكتوم لوريم، فيتاي إويسمود أوغي ريسوس نون مي. إن هاك هابيتاس بلاتيا ديكتومست. دونيك أ أوركي موريس. بيلينتسكي نيك سيم ليبيرو. فيستيبيولوم فرنجيلا نيكوي أوت إيست إفيكيتور أليكويت. نولا فاسيليسي. فوسكي إت ليجولا فيتاي لوريم كورسوس أليكوام. أليكوام أ إيرات أ مي بيبندم مولستيي. فاسيليس أوت إكس أ جوستو ديغنيسيم سكيلريسكي سيت أميت سيد ليبيرو. دويس إيغيتاس، مي نون دابيبوس هندريريت، ليبيرو ننك تنسيدونت أوركي، إن ديغنيسيم إكس مي أ أوغ</p>"}',
                'slug' => 'dermatology-71',
                'is_active' => 1,
                'is_featured' => 0,
                'image' => '/images/clinic_archives/66f267d13739b.png',
                'location' => NULL,
                'created_at' => '2024-09-24 12:18:41',
                'updated_at' => '2024-09-24 12:18:41',
                'deleted_at' => NULL,
            ),
        ));
        \DB::table('archives')->insert(array (
            0 => 
            array (
                'id' => 72,
                'doctor_id' => NULL,
                'clinic_id' => 30,
                'archive_category_id' => 1,
                'name' => '{"en":"Ophthalmology","hi":"क्विज़ प्रतियोगिता","ar":"علم البيئة"}',
                'description' => '{"en":"<p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Praesent facilisis ante ut purus eleifend vehicula. Cras vel diam elit. Nullam scelerisque, nisi sed dignissim vehicula, sapien lacus fringilla urna, at rhoncus ex lorem vitae magna. Nam fermentum, purus sed consequat vulputate, lorem sapien dictum lorem, vitae euismod augue risus non mi. In hac habitasse platea dictumst. Donec a orci mauris. Pellentesque nec sem libero. Vestibulum fringilla neque ut est efficitur aliquet. Nulla facilisi. Fusce et ligula vitae lorem cursus aliquam. Aliquam a erat a mi bibendum molestie. Phasellus ut ex a justo dignissim scelerisque sit amet sed libero. Duis egestas, mi non dapibus hendrerit, libero nunc tincidunt orci, in dignissim ex mi a augue. Donec sed nulla in elit gravida venenatis et non augue. Pellentesque et libero quis lorem convallis viverra. Etiam fermentum sapien turpis, vel posuere velit varius ut.</p>","hi":"<p>लोरेम इप्सम डोलर सिट अमेट, कॉन्सेकट्यूर एडिपिसिंग एलीट. प्रेज़ेंट फसिलिसिस अंते उत पुरुस एलीफेंड व्हीकुला. क्रास वेल डायम एलीट. नुल्लम स्केलरिस्क, निसी सेड डिग्निस्सिम व्हीकुला, सैपियन लकुस फ्रिंजिल्ला उरना, एट रोंकस एक्स लोरेम विटे माग्ना. नाम फेर्मेंटुम, पुरुस सेड कंसक्वाट वुल्पुटेट, लोरेम सैपियन डिक्टम लोरेम, विटे एयूसमोड औगुए रीसस नॉन मी. इन हक हबितास्से प्लाटेआ डिक्टुमस्ट. डोनेक अ ओर्की मौरिस. पेल्लेंटेस्के नेक सेम लिबरो. वेस्टिबुलम फ्रिंजिल्ला नेकुए उत एस्ट एफिकितुर अलिक्वेट. नुल्ला फासिलिसि. फ्यूस्के एट लिगुला विटे लोरेम कर्सस अलिक्वाम. आलिक्वाम अ एराट अ मि बिबेंडम मोलस्टिये. फासेल्लस उत एक्स अ जस्टो डिग्निस्सिम स्केलरिस्क सिट अमेट सेड लिबरो. डुइस एगेस्टास, मि नॉन डापिबुस हेंड्रेरिट, लिबरो नुंक टिन्सीडुंट ऑर्की, इन डिग्निस्सिम एक्स मि अ औगुए. डोनेक सेड नुल्ला इन एलीट ग्राविडा विनेनेटिस एट नॉन औगुए.</p>","ar":"<p>لوريم إيبسوم دولور سيت أميت، كونسكتتور أديبيسينغ إليت. بريسنت فاسيليسيس أنتي أوت بوروس إليفند فيكولا. كراس فيل ديام إليت. نولام سكيلريسكي، نيسي سيد ديغنيسيم فيكولا، سابين لاكوس فرنجيلا أورنا، أت رونكوس إكس لوريم فيتاي ماجنا. نام فيرمينتوم، بوروس سيد كونسكووت فولووتات، لوريم سابين ديكتوم لوريم، فيتاي إويسمود أوغي ريسوس نون مي. إن هاك هابيتاس بلاتيا ديكتومست. دونيك أ أوركي موريس. بيلينتسكي نيك سيم ليبيرو. فيستيبيولوم فرنجيلا نيكوي أوت إيست إفيكيتور أليكويت. نولا فاسيليسي. فوسكي إت ليجولا فيتاي لوريم كورسوس أليكوام. أليكوام أ إيرات أ مي بيبندم مولستيي. فاسيليس أوت إكس أ جوستو ديغنيسيم سكيلريسكي سيت أميت سيد ليبيرو. دويس إيغيتاس، مي نون دابيبوس هندريريت، ليبيرو ننك تنسيدونت أوركي، إن ديغنيسيم إكس مي أ أوغ</p>"}',
                'slug' => 'ophthalmology-72',
                'is_active' => 1,
                'is_featured' => 0,
                'image' => '/images/clinic_archives/66f267f88e5cb.png',
                'location' => NULL,
                'created_at' => '2024-09-24 12:19:20',
                'updated_at' => '2024-09-24 12:19:20',
                'deleted_at' => NULL,
            ),
        ));
        \DB::table('archives')->insert(array (
            0 => 
            array (
                'id' => 73,
                'doctor_id' => 83,
                'clinic_id' => NULL,
                'archive_category_id' => 1,
                'name' => '{"en":"fdxgdsf","hi":"sdfgsdfg","ar":"fsdgsfd"}',
                'description' => '{"en":"gsdfgd","hi":"sdfgsfd","ar":"gsdfgsd"}',
                'slug' => 'fdxgdsf-73',
                'is_active' => 1,
                'is_featured' => 0,
                'image' => '/images/doctor_archives/66f50f9b01285.png',
                'location' => NULL,
                'created_at' => '2024-09-26 12:39:07',
                'updated_at' => '2024-09-26 12:39:07',
                'deleted_at' => NULL,
            ),
        ));
        
        
    }
}