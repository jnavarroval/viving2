<?php

namespace App\Exports\SuperAdmin;

use Maatwebsite\Excel\Concerns\FromArray;
use Maatwebsite\Excel\Concerns\WithHeadings;

class DoctorsExport implements FromArray, WithHeadings
{
    /**
     * @return \Illuminate\Support\Collection
     */
    protected $doctors;
    public function __construct($doctors)
    {
        $this->doctors = $doctors;
    }
    public function array(): array
    {
        $data = [];
        foreach ($this->doctors as $doctor) {
            $single = [$doctor->id, $doctor->name, $doctor->description, $doctor->is_active, date_format($doctor->created_at, 'd-m-Y')];
            $data[] = $single;
        }
        return $data;
    }
    public function headings(): array
    {
        return ["id", "name", "description", "is_active", "created_at"];
    }
}
