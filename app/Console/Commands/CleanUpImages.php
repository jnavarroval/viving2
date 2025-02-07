<?php

namespace App\Console\Commands;

use App\Models\Clinic;
use Illuminate\Console\Command;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Schema;
class CleanUpImages extends Command
{
    protected $signature = 'cleanup:images';
    protected $description = 'Delete unused images from the public folder';

    public function __construct()
    {
        parent::__construct();
    }

    public function handle()
    {
        $tables = [
            'clinics' => 'clinics',
            'clinic_main_categories' => 'clinic_main_categories',
            'clinic_categories' => 'clinics_categories',
            'broadcasts' => 'clinics_broadcasts',
            'broadcasts' => 'clinic_broadcasts',
            'certifications' => 'clinics_certifications',
            'certifications' => 'clinic_certifications',
            'events' => 'clinics_events',
            'events' => 'clinic_events',
            'archives' => 'clinics_archives',
            'archives' => 'clinic_archives',
            'posts' => 'clinics_posts',
            'posts' => 'clinic_posts',
            'podcasts' => 'clinics_podcasts',
            'podcasts' => 'clinic_podcasts',

            'broadcast_categories' => 'broadcast_categories',
            'broadcasts' => 'broadcasts',
            'archive_categories' => 'archive_categories',
            'archives' => 'archives',
            'podcast_categories' => 'podcast_categories',
            'podcasts' => 'podcasts',
            'event_categories' => 'event_categories',
            'events' => 'events',
            'blog_categories' => 'blog_categories',

            'faq_categories' => 'faq_categories',
            'doctors' => 'doctors',
            'patients' => 'patients',
            'cities' => 'cities',

            'broadcasts' => 'doctor_broadcasts',
            'archives' => 'doctor_archives',
            'certifications' => 'doctor_certifications',
            'events' => 'doctor_events',
            'company_pages' => 'company_pages',
            'doctor_main_categories' => 'doctor_main_categories',
            'posts' => 'doctor_posts',
            'doctor_categories' => 'doctor_categories',
            'doctor_educations' => 'doctor_educations',
            'doctor_experiences' => 'doctor_experiences',
            'doctor_main_categories' => 'doctor_main_categories',
            'doctor_reviews' => 'doctor_reviews',
            'podcasts' => 'doctor_podcasts',
        ];

        foreach ($tables as $table => $imageColumn) {
            if (Schema::hasTable($table)) {
                $this->cleanUpTableImages($table, $imageColumn);
            } else {
                $this->warn("Table {$table} does not exist.");
            }
        }


        $this->info('Unused images have been deleted successfully.');
    }

    private function cleanUpTableImages($table,$folder)
    {
        $folders = [
            'public/images/' . strtolower($folder),
            'public/files/' . strtolower($folder)
        ];

        foreach ($folders as $folder) {
        if (!File::exists($folder)) {
            $this->warn("Folder {$folder} does not exist.");
            continue;
        }

        $imageColumn = 'image'; // Change this to your actual image column name
        $imagesInUse = DB::table($table)->pluck($imageColumn)->toArray();
        $allImages = File::files($folder);

        foreach ($allImages as $image) {
            $imagePath = $image->getPathname();
            $relativePath = str_replace('public/', '/', $imagePath);
            if (!in_array($relativePath, $imagesInUse)) {
                File::delete($imagePath);

                $this->info("Deleted unused image: {$relativePath}");
            }
        }
    }
}
}
