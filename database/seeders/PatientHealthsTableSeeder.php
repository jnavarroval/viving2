<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;

class PatientHealthsTableSeeder extends Seeder
{

    /**
     * Auto generated seed file
     *
     * @return void
     */
    public function run()
    {
        

        \DB::table('patient_healths')->delete();
        
        \DB::table('patient_healths')->insert(array (
            0 => 
            array (
                'id' => 1,
                'patient_id' => NULL,
                'name' => '{"en":"Infected","hi":"कृत्रिम बुद्धिम","ar":"مسابقة"}',
                'description' => '{"en":"<p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Nulla facilisi. Ut aliquet, nisi sit amet fermentum, velit sapien ultricies arcu, ac blandit mauris turpis euismod nunc.</p>","hi":"<p>लोरम इप्सम डोलर सिट अमेट, कॉन्सेक्टेचुर अदिपिस्किंग एलीट। नुल्ला फासिलिसी। उत अलिक्वेट, निसि सिट अमेट फेरमेंटम, वेलिट सापिएन उल्ट्रिसीस आर्कू, एक ब्लैंडिट mauris turpis euismod nunc.</p>","ar":"<p>لوريم ايبسوم دولار سيت أميت، كونسيكتيتور أديبيسكنغ إيليت. نولا فاسيليسي. ات أليكيت، نيسي سيت أميت فيرمينتوم، فيليت سابيين التريسيز أركو، أك بلاندي</p>"}',
                'image' => NULL,
                'value' => NULL,
                'is_active' => 1,
                'created_at' => '2024-08-19 15:05:54',
                'updated_at' => '2024-10-04 17:26:17',
                'deleted_at' => NULL,
            ),
            1 => 
            array (
                'id' => 2,
                'patient_id' => NULL,
                'name' => '{"en":"Feverd","hi":"पारिस्थित","ar":"الذكاء ال"}',
                'description' => '{"en":"<p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Nulla facilisi. Ut aliquet, nisi sit amet fermentum, velit sapien ultricies arcu, ac blandit mauris turpis euismod nunc.</p>","hi":"<p>लोरम इप्सम डोलर सिट अमेट, कॉन्सेक्टेचुर अदिपिस्किंग एलीट। नुल्ला फासिलिसी। उत अलिक्वेट, निसि सिट अमेट फेरमेंटम, वेलिट सापिएन उल्ट्रिसीस आर्कू, एक ब्लैंडिट mauris turpis euismod nunc.</p>","ar":"<p>لوريم ايبسوم دولار سيت أميت، كونسيكتيتور أديبيسكنغ إيليت. نولا فاسيليسي. ات أليكيت، نيسي سيت أميت فيرمينتوم، فيليت سابيين التريسيز أركو، أك بلاندي</p>"}',
                'image' => NULL,
                'value' => NULL,
                'is_active' => 1,
                'created_at' => '2024-08-19 15:05:54',
                'updated_at' => '2024-10-04 17:25:49',
                'deleted_at' => NULL,
            ),
            2 => 
            array (
                'id' => 3,
                'patient_id' => NULL,
                'name' => '{"en":"Body Temperature","hi":"क्विज़ प्रतियोगिता","ar":"فعالية الخطاب التعليمي"}',
                'description' => '{"en":"<p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Nulla facilisi. Ut aliquet, nisi sit amet fermentum, velit sapien ultricies arcu, ac blandit mauris turpis euismod nunc.</p>","hi":"<p>लोरम इप्सम डोलर सिट अमेट, कॉन्सेक्टेचुर अदिपिस्किंग एलीट। नुल्ला फासिलिसी। उत अलिक्वेट, निसि सिट अमेट फेरमेंटम, वेलिट सापिएन उल्ट्रिसीस आर्कू, एक ब्लैंडिट mauris turpis euismod nunc.</p>","ar":"<p>لوريم ايبسوم دولار سيت أميت، كونسيكتيتور أديبيسكنغ إيليت. نولا فاسيليسي. ات أليكيت، نيسي سيت أميت فيرمينتوم، فيليت سابيين التريسيز أركو، أك بلاندي</p>"}',
                'image' => NULL,
                'value' => NULL,
                'is_active' => 1,
                'created_at' => '2024-08-19 15:05:54',
                'updated_at' => '2024-10-04 17:25:38',
                'deleted_at' => NULL,
            ),
            3 => 
            array (
                'id' => 4,
                'patient_id' => NULL,
                'name' => '{"en":"Heart Rate","hi":"पारिस्थितिकी","ar":"التصميم الصناعي"}',
                'description' => '{"en":"<p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Nulla facilisi. Ut aliquet, nisi sit amet fermentum, velit sapien ultricies arcu, ac blandit mauris turpis euismod nunc.</p>","hi":"<p>लोरम इप्सम डोलर सिट अमेट, कॉन्सेक्टेचुर अदिपिस्किंग एलीट। नुल्ला फासिलिसी। उत अलिक्वेट, निसि सिट अमेट फेरमेंटम, वेलिट सापिएन उल्ट्रिसीस आर्कू, एक ब्लैंडिट mauris turpis euismod nunc.</p>","ar":"<p>لوريم ايبسوم دولار سيت أميت، كونسيكتيتور أديبيسكنغ إيليت. نولا فاسيليسي. ات أليكيت، نيسي سيت أميت فيرمينتوم، فيليت سابيين التريسيز أركو، أك بلاندي</p>"}',
                'image' => NULL,
                'value' => NULL,
                'is_active' => 1,
                'created_at' => '2024-08-19 15:05:54',
                'updated_at' => '2024-10-04 17:26:05',
                'deleted_at' => NULL,
            ),
            4 => 
            array (
                'id' => 5,
                'patient_id' => NULL,
                'name' => '{"en":"Blood Pressure","hi":"क्विज़ प्रतियोगिता","ar":"الذكاء الاصطناعي"}',
                'description' => '{"en":"<p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Nulla facilisi. Ut aliquet, nisi sit amet fermentum, velit sapien ultricies arcu, ac blandit mauris turpis euismod nunc.</p>","hi":"<p>लोरम इप्सम डोलर सिट अमेट, कॉन्सेक्टेचुर अदिपिस्किंग एलीट। नुल्ला फासिलिसी। उत अलिक्वेट, निसि सिट अमेट फेरमेंटम, वेलिट सापिएन उल्ट्रिसीस आर्कू, एक ब्लैंडिट mauris turpis euismod nunc.</p>","ar":"<p>لوريم ايبسوم دولار سيت أميت، كونسيكتيتور أديبيسكنغ إيليت. نولا فاسيليسي. ات أليكيت، نيسي سيت أميت فيرمينتوم، فيليت سابيين التريسيز أركو، أك بلاندي</p>"}',
                'image' => NULL,
                'value' => NULL,
                'is_active' => 1,
                'created_at' => '2024-08-19 15:05:54',
                'updated_at' => '2024-10-04 17:25:24',
                'deleted_at' => NULL,
            ),
        ));
        
        
    }
}