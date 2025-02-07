<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;

class TagsTableSeeder extends Seeder
{

    /**
     * Auto generated seed file
     *
     * @return void
     */
    public function run()
    {
        

        \DB::table('tags')->delete();
        
        \DB::table('tags')->insert(array (
            0 => 
            array (
                'id' => 1,
                'name' => '{"en":"First Episode Aired","hi":"बाल सहायता मध्यस्थता","ar":"عرض الحلقة الأولى"}',
                'description' => '{"ar":null}',
                'slug' => 'first-episode-aired-1',
                'is_active' => 1,
                'is_featured' => 0,
                'sort_order' => NULL,
                'image' => NULL,
                'created_at' => '2024-07-25 12:47:29',
                'updated_at' => '2024-07-25 12:47:29',
                'deleted_at' => NULL,
            ),
            1 => 
            array (
                'id' => 2,
                'name' => '{"en":"Pure Health","hi":"शैक्षिक भाषण समारोह","ar":"الذكاء الاصطناعي"}',
                'description' => '{"ar":null}',
                'slug' => 'pure-health-2',
                'is_active' => 1,
                'is_featured' => 0,
                'sort_order' => NULL,
                'image' => NULL,
                'created_at' => '2024-07-26 18:01:07',
                'updated_at' => '2024-10-04 17:30:14',
                'deleted_at' => NULL,
            ),
            2 => 
            array (
                'id' => 3,
                'name' => '{"en":"Care plus","hi":"औद्योगिक डिज़ाइन","ar":"علم البيئة"}',
                'description' => '{"ar":null}',
                'slug' => 'care-plus-3',
                'is_active' => 1,
                'is_featured' => 0,
                'sort_order' => NULL,
                'image' => NULL,
                'created_at' => '2024-07-26 18:01:28',
                'updated_at' => '2024-10-04 17:29:42',
                'deleted_at' => NULL,
            ),
            3 => 
            array (
                'id' => 4,
                'name' => '{"en":"Wellness","hi":"कृत्रिम बुद्धिमत्ता","ar":"مسابقة معلومات"}',
                'description' => '{"ar":null}',
                'slug' => 'wellness-4',
                'is_active' => 1,
                'is_featured' => 0,
                'sort_order' => NULL,
                'image' => NULL,
                'created_at' => '2024-07-26 18:01:41',
                'updated_at' => '2024-10-04 17:30:26',
                'deleted_at' => NULL,
            ),
            4 => 
            array (
                'id' => 5,
                'name' => '{"en":"Medi care","hi":"पारिस्थितिकी","ar":"التصميم الصناعي"}',
                'description' => '{"ar":null}',
                'slug' => 'medi-care-5',
                'is_active' => 1,
                'is_featured' => 0,
                'sort_order' => NULL,
                'image' => NULL,
                'created_at' => '2024-07-26 18:02:23',
                'updated_at' => '2024-10-04 17:30:01',
                'deleted_at' => NULL,
            ),
        ));
        
        
    }
}