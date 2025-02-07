<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;

class DiseasesTableSeeder extends Seeder
{

    /**
     * Auto generated seed file
     *
     * @return void
     */
    public function run()
    {
        

        \DB::table('diseases')->delete();
        
        \DB::table('diseases')->insert(array (
            0 => 
            array (
                'id' => 1,
                'name' => '{"en":"Headache","hi":"औद्योगिक डिज़ाइन","ar":"مسابقة معلومات"}',
                'description' => '{"en":"<p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Nulla facilisi. Ut aliquet, nisi sit amet fermentum, velit sapien ultricies arcu, ac blandit mauris turpis euismod nunc.</p>","hi":"<p>लोरम इप्सम डोलर सिट अमेट, कॉन्सेक्टेचुर अदिपिस्किंग एलीट। नुल्ला फासिलिसी। उत अलिक्वेट, निसि सिट अमेट फेरमेंटम, वेलिट सापिएन उल्ट्रिसीस आर्कू, एक ब्लैंडिट mauris turpis euismod nunc.</p>","ar":"<p>لوريم ايبسوم دولار سيت أميت، كونسيكتيتور أديبيسكنغ إيليت. نولا فاسيليسي. ات أليكيت، نيسي سيت أميت فيرمينتوم، فيليت سابيين التريسيز أركو، أك بلاندي</p>"}',
                'image' => '/images/diseases/66fd0c5d75c6a.png',
                'is_active' => 1,
                'created_at' => '2024-08-05 19:07:04',
                'updated_at' => '2024-10-02 14:03:25',
                'deleted_at' => NULL,
            ),
            1 => 
            array (
                'id' => 2,
                'name' => '{"en":"Corona virus","hi":"क्विज़ प्रतियोगिता","ar":"مسابقة معلومات"}',
                'description' => '{"en":"<p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Nulla facilisi. Ut aliquet, nisi sit amet fermentum, velit sapien ultricies arcu, ac blandit mauris turpis euismod nunc.</p>","hi":"<p>लोरम इप्सम डोलर सिट अमेट, कॉन्सेक्टेचुर अदिपिस्किंग एलीट। नुल्ला फासिलिसी। उत अलिक्वेट, निसि सिट अमेट फेरमेंटम, वेलिट सापिएन उल्ट्रिसीस आर्कू, एक ब्लैंडिट mauris turpis euismod nunc.</p>","ar":"<p>لوريم ايبسوم دولار سيت أميت، كونسيكتيتور أديبيسكنغ إيليت. نولا فاسيليسي. ات أليكيت، نيسي سيت أميت فيرمينتوم، فيليت سابيين التريسيز أركو، أك بلاندي</p>"}',
                'image' => '/images/diseases/66fd0ecf9397d.png',
                'is_active' => 1,
                'created_at' => '2024-08-05 19:08:34',
                'updated_at' => '2024-10-02 14:13:51',
                'deleted_at' => NULL,
            ),
            2 => 
            array (
                'id' => 3,
                'name' => '{"en":"Stomach pain","hi":"कृत्रिम बुद्धिमत्ता","ar":"الذكاء الاصطناعي"}',
                'description' => '{"en":"<p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Nulla facilisi. Ut aliquet, nisi sit amet fermentum, velit sapien ultricies arcu, ac blandit mauris turpis euismod nunc.</p>","hi":"<p>लोरम इप्सम डोलर सिट अमेट, कॉन्सेक्टेचुर अदिपिस्किंग एलीट। नुल्ला फासिलिसी। उत अलिक्वेट, निसि सिट अमेट फेरमेंटम, वेलिट सापिएन उल्ट्रिसीस आर्कू, एक ब्लैंडिट mauris turpis euismod nunc.</p>","ar":"<p>لوريم ايبسوم دولار سيت أميت، كونسيكتيتور أديبيسكنغ إيليت. نولا فاسيليسي. ات أليكيت، نيسي سيت أميت فيرمينتوم، فيليت سابيين التريسيز أركو، أك بلاندي</p>"}',
                'image' => '/images/diseases/66fd0ca1b0d03.png',
                'is_active' => 1,
                'created_at' => '2024-09-25 12:09:19',
                'updated_at' => '2024-10-02 14:04:33',
                'deleted_at' => NULL,
            ),
            3 => 
            array (
                'id' => 4,
                'name' => '{"en":"Fever","hi":"पारिस्थितिकी","ar":"علم البيئة"}',
                'description' => '{"en":"<p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Nulla facilisi. Ut aliquet, nisi sit amet fermentum, velit sapien ultricies arcu, ac blandit mauris turpis euismod nunc.</p>","hi":"<p>लोरम इप्सम डोलर सिट अमेट, कॉन्सेक्टेचुर अदिपिस्किंग एलीट। नुल्ला फासिलिसी। उत अलिक्वेट, निसि सिट अमेट फेरमेंटम, वेलिट सापिएन उल्ट्रिसीस आर्कू, एक ब्लैंडिट mauris turpis euismod nunc.</p>","ar":"<p>لوريم ايبسوم دولار سيت أميت، كونسيكتيتور أديبيسكنغ إيليت. نولا فاسيليسي. ات أليكيت، نيسي سيت أميت فيرمينتوم، فيليت سابيين التريسيز أركو، أك بلاندي</p>"}',
                'image' => '/images/diseases/66fd0c2ca8440.png',
                'is_active' => 1,
                'created_at' => '2024-09-25 12:10:58',
                'updated_at' => '2024-10-02 14:02:36',
                'deleted_at' => NULL,
            ),
            4 => 
            array (
                'id' => 5,
                'name' => '{"en":"Constipation","hi":"पारिस्थितिकी","ar":"مسابقة معلومات"}',
                'description' => '{"en":"<p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Nulla facilisi. Ut aliquet, nisi sit amet fermentum, velit sapien ultricies arcu, ac blandit mauris turpis euismod nunc.</p>","hi":"<p>लोरम इप्सम डोलर सिट अमेट, कॉन्सेक्टेचुर अदिपिस्किंग एलीट। नुल्ला फासिलिसी। उत अलिक्वेट, निसि सिट अमेट फेरमेंटम, वेलिट सापिएन उल्ट्रिसीस आर्कू, एक ब्लैंडिट mauris turpis euismod nunc.</p>","ar":"<p>لوريم ايبسوم دولار سيت أميت، كونسيكتيتور أديبيسكنغ إيليت. نولا فاسيليسي. ات أليكيت، نيسي سيت أميت فيرمينتوم، فيليت سابيين التريسيز أركو، أك بلاندي</p>"}',
                'image' => '/images/diseases/66fd0ae7e6fba.png',
                'is_active' => 1,
                'created_at' => '2024-09-25 12:12:16',
                'updated_at' => '2024-10-02 13:57:11',
                'deleted_at' => NULL,
            ),
        ));
        
        
    }
}