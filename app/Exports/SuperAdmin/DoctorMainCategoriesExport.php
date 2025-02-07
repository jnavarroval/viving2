<?php

namespace App\Exports\SuperAdmin;

use Maatwebsite\Excel\Concerns\FromArray;
use Maatwebsite\Excel\Concerns\WithHeadings;

class DoctorMainCategoriesExport implements FromArray, WithHeadings
{
    /**
     * @return \Illuminate\Support\Collection
     */
    protected $doctor_main_categories;
    public function __construct($doctor_main_categories)
    {
        $this->doctor_main_categories = $doctor_main_categories;
    }
    public function array(): array
    {
        $data = [];
        foreach ($this->doctor_main_categories as $doctor_main_categories) {
            $single = [$doctor_main_categories->id, $doctor_main_categories->name, $doctor_main_categories->description,$doctor_main_categories->icon,$doctor_main_categories->image, $doctor_main_categories->is_active, $doctor_main_categories->slug, date_format($doctor_main_categories->created_at, 'd-m-Y')];
            $data[] = $single;
        }
        return $data;
    }
    public function headings(): array
    {
        return ["id", "name", "description","icon","image", "is_active", "slug", "created_at"];
    }
}
