<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;

class TestsTableSeeder extends Seeder
{

    /**
     * Auto generated seed file
     *
     * @return void
     */
    public function run()
    {
        

        \DB::table('tests')->delete();
        
        \DB::table('tests')->insert(array (
            0 => 
            array (
                'id' => 1,
                'name' => '{"en":"Sugar test","hi":"क्विज़ प्रतियोगिता","ar":"مسابقة معلومات"}',
                'description' => '{"en":"<p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Nulla facilisi. Ut aliquet, nisi sit amet fermentum, velit sapien ultricies arcu, ac blandit mauris turpis euismod nunc.</p>","hi":"<p>लोरम इप्सम डोलर सिट अमेट, कॉन्सेक्टेचुर अदिपिस्किंग एलीट। नुल्ला फासिलिसी। उत अलिक्वेट, निसि सिट अमेट फेरमेंटम, वेलिट सापिएन उल्ट्रिसीस आर्कू, एक ब्लैंडिट mauris turpis euismod nunc.</p>","ar":"<p>لوريم ايبسوم دولار سيت أميت، كونسيكتيتور أديبيسكنغ إيليت. نولا فاسيليسي. ات أليكيت، نيسي سيت أميت فيرمينتوم، فيليت سابيين التريسيز أركو، أك بلاندي</p>"}',
                'image' => NULL,
                'is_active' => 1,
                'created_at' => '2024-08-19 14:52:25',
                'updated_at' => '2024-10-04 17:27:36',
                'deleted_at' => NULL,
            ),
            1 => 
            array (
                'id' => 2,
                'name' => '{"en":"RDT","hi":"पारिस्थि","ar":"علم"}',
                'description' => '{"en":"<p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Nulla facilisi. Ut aliquet, nisi sit amet fermentum, velit sapien ultricies arcu, ac blandit mauris turpis euismod nunc.</p>","hi":"<p>लोरम इप्सम डोलर सिट अमेट, कॉन्सेक्टेचुर अदिपिस्किंग एलीट। नुल्ला फासिलिसी। उत अलिक्वेट, निसि सिट अमेट फेरमेंटम, वेलिट सापिएन उल्ट्रिसीस आर्कू, एक ब्लैंडिट mauris turpis euismod nunc.</p>","ar":"<p>لوريم ايبسوم دولار سيت أميت، كونسيكتيتور أديبيسكنغ إيليت. نولا فاسيليسي. ات أليكيت، نيسي سيت أميت فيرمينتوم، فيليت سابيين التريسيز أركو، أك بلاندي</p>"}',
                'image' => NULL,
                'is_active' => 1,
                'created_at' => '2024-08-19 14:52:25',
                'updated_at' => '2024-10-04 17:27:23',
                'deleted_at' => NULL,
            ),
            2 => 
            array (
                'id' => 3,
                'name' => '{"en":"Angiography","hi":"पारिस्थितिकी","ar":"مسابقة معلومات"}',
                'description' => '{"en":"<p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Nulla facilisi. Ut aliquet, nisi sit amet fermentum, velit sapien ultricies arcu, ac blandit mauris turpis euismod nunc.</p>","hi":"<p>लोरम इप्सम डोलर सिट अमेट, कॉन्सेक्टेचुर अदिपिस्किंग एलीट। नुल्ला फासिलिसी। उत अलिक्वेट, निसि सिट अमेट फेरमेंटम, वेलिट सापिएन उल्ट्रिसीस आर्कू, एक ब्लैंडिट mauris turpis euismod nunc.</p>","ar":"<p>لوريم ايبسوم دولار سيت أميت، كونسيكتيتور أديبيسكنغ إيليت. نولا فاسيليسي. ات أليكيت، نيسي سيت أميت فيرمينتوم، فيليت سابيين التريسيز أركو، أك بلاندي</p>"}',
                'image' => NULL,
                'is_active' => 1,
                'created_at' => '2024-08-19 14:52:25',
                'updated_at' => '2024-10-04 17:26:44',
                'deleted_at' => NULL,
            ),
            3 => 
            array (
                'id' => 4,
                'name' => '{"en":"ECG","hi":"क्विज़ प्","ar":"التصميم"}',
                'description' => '{"en":"<p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Nulla facilisi. Ut aliquet, nisi sit amet fermentum, velit sapien ultricies arcu, ac blandit mauris turpis euismod nunc.</p>","hi":"<p>लोरम इप्सम डोलर सिट अमेट, कॉन्सेक्टेचुर अदिपिस्किंग एलीट। नुल्ला फासिलिसी। उत अलिक्वेट, निसि सिट अमेट फेरमेंटम, वेलिट सापिएन उल्ट्रिसीस आर्कू, एक ब्लैंडिट mauris turpis euismod nunc.</p>","ar":"<p>لوريم ايبسوم دولار سيت أميت، كونسيكتيتور أديبيسكنغ إيليت. نولا فاسيليسي. ات أليكيت، نيسي سيت أميت فيرمينتوم، فيليت سابيين التريسيز أركو، أك بلاندي</p>"}',
                'image' => NULL,
                'is_active' => 1,
                'created_at' => '2024-08-19 14:52:25',
                'updated_at' => '2024-10-04 17:27:12',
                'deleted_at' => NULL,
            ),
            4 => 
            array (
                'id' => 5,
                'name' => '{"en":"Blood test","hi":"पारिस्थितिकी","ar":"علم البيئة"}',
                'description' => '{"en":"<p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Nulla facilisi. Ut aliquet, nisi sit amet fermentum, velit sapien ultricies arcu, ac blandit mauris turpis euismod nunc.</p>","hi":"<p>लोरम इप्सम डोलर सिट अमेट, कॉन्सेक्टेचुर अदिपिस्किंग एलीट। नुल्ला फासिलिसी। उत अलिक्वेट, निसि सिट अमेट फेरमेंटम, वेलिट सापिएन उल्ट्रिसीस आर्कू, एक ब्लैंडिट mauris turpis euismod nunc.</p>","ar":"<p>لوريم ايبسوم دولار سيت أميت، كونسيكتيتور أديبيسكنغ إيليت. نولا فاسيليسي. ات أليكيت، نيسي سيت أميت فيرمينتوم، فيليت سابيين التريسيز أركو، أك بلاندي</p>"}',
                'image' => NULL,
                'is_active' => 1,
                'created_at' => '2024-08-19 14:52:25',
                'updated_at' => '2024-10-04 17:26:59',
                'deleted_at' => NULL,
            ),
        ));
        
        
    }
}