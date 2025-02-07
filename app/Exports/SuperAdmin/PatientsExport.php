<?php

namespace App\Exports\SuperAdmin;

use Maatwebsite\Excel\Concerns\FromArray;
use Maatwebsite\Excel\Concerns\WithHeadings;

class PatientsExport implements FromArray, WithHeadings
{
    /**
     * @return \Illuminate\Support\Collection
     */
    protected $patients;
    public function __construct($patients)
    {
        $this->patients = $patients;
    }
    public function array(): array
    {
        $data = [];
        foreach ($this->patients as $patient) {
            $single = [$patient->id, $patient->name, $patient->description, $patient->is_active, date_format($patient->created_at, 'd-m-Y')];
            $data[] = $single;
        }
        return $data;
    }
    public function headings(): array
    {
        return ["id", "name", "description", "is_active", "created_at"];
    }
}
