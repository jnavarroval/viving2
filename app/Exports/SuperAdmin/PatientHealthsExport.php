<?php

namespace App\Exports\SuperAdmin;

use Maatwebsite\Excel\Concerns\FromArray;
use Maatwebsite\Excel\Concerns\WithHeadings;

class PatientHealthsExport implements FromArray, WithHeadings
{
    /**
     * @return \Illuminate\Support\Collection
     */
    protected $patient_healths;
    public function __construct($patient_healths)
    {
        $this->patient_healths = $patient_healths;
    }
    public function array(): array
    {
        $data = [];
        foreach ($this->patient_healths as $patient_health) {
            $single = [$patient_health->id, $patient_health->name, $patient_health->description, $patient_health->is_active, date_format($patient_health->created_at, 'd-m-Y')];
            $data[] = $single;
        }
        return $data;
    }
    public function headings(): array
    {
        return ["id", "name", "description", "is_active", "created_at"];
    }
}
