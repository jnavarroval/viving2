<?php

namespace App\Exports\SuperAdmin;

use Maatwebsite\Excel\Concerns\FromArray;
use Maatwebsite\Excel\Concerns\WithHeadings;

class ClinicsExport implements FromArray, WithHeadings
{
    /**
     * @return \Illuminate\Support\Collection
     */
    protected $clinics;
    public function __construct($clinics)
    {
        $this->clinics = $clinics;
    }
    public function array(): array
    {
        $data = [];
        foreach ($this->clinics as $clinic) {
            $single = [$clinic->id, $clinic->name, $clinic->description, $clinic->is_active, date_format($clinic->created_at, 'd-m-Y')];
            $data[] = $single;
        }
        return $data;
    }
    public function headings(): array
    {
        return ["id", "name", "description", "is_active", "created_at"];
    }
}
