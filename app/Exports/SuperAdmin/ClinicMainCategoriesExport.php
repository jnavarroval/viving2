<?php

namespace App\Exports\SuperAdmin;

use Maatwebsite\Excel\Concerns\FromArray;
use Maatwebsite\Excel\Concerns\WithHeadings;

class ClinicMainCategoriesExport implements FromArray, WithHeadings
{
    /**
     * @return \Illuminate\Support\Collection
     */
    protected $clinic_main_categories;
    public function __construct($clinic_main_categories)
    {
        $this->clinic_main_categories = $clinic_main_categories;
    }
    public function array(): array
    {
        $data = [];
        foreach ($this->clinic_main_categories as $clinic_main_categories) {
            $single = [$clinic_main_categories->id, $clinic_main_categories->name, $clinic_main_categories->description,$clinic_main_categories->icon,$clinic_main_categories->image, $clinic_main_categories->is_active, $clinic_main_categories->slug, date_format($clinic_main_categories->created_at, 'd-m-Y')];
            $data[] = $single;
        }
        return $data;
    }
    public function headings(): array
    {
        return ["id", "name", "description","icon","image", "is_active", "slug", "created_at"];
    }
}
