<?php

namespace App\Exports\SuperAdmin;

use Maatwebsite\Excel\Concerns\FromArray;
use Maatwebsite\Excel\Concerns\WithHeadings;

class ClinicCategoriesExport implements FromArray, WithHeadings
{
    /**
     * @return \Illuminate\Support\Collection
     */
    protected $clinic_categories;
    public function __construct($clinic_categories)
    {
        $this->clinic_categories = $clinic_categories;
    }
    public function array(): array
    {
        $data = [];
        foreach ($this->clinic_categories as $clinic_category) {
            $single = [$clinic_category->id, $clinic_category->name, $clinic_category->description, $clinic_category->is_active, $clinic_category->slug, date_format($clinic_category->created_at, 'd-m-Y')];
            $data[] = $single;
        }
        return $data;
    }
    public function headings(): array
    {
        return ["id", "name", "description", "is_active", "slug", "created_at"];
    }
}
