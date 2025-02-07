<?php

namespace App\Exports\SuperAdmin;

use Maatwebsite\Excel\Concerns\FromArray;
use Maatwebsite\Excel\Concerns\WithHeadings;

class DoctorCategoriesExport implements FromArray, WithHeadings
{
    /**
     * @return \Illuminate\Support\Collection
     */
    protected $doctor_categories;
    public function __construct($doctor_categories)
    {
        $this->doctor_categories = $doctor_categories;
    }
    public function array(): array
    {
        $data = [];
        foreach ($this->doctor_categories as $doctor_category) {
            $single = [$doctor_category->id, $doctor_category->name, $doctor_category->description, $doctor_category->is_active, $doctor_category->slug, date_format($doctor_category->created_at, 'd-m-Y')];
            $data[] = $single;
        }
        return $data;
    }
    public function headings(): array
    {
        return ["id", "name", "description", "is_active", "slug", "created_at"];
    }
}
