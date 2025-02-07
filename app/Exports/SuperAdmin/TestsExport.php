<?php

namespace App\Exports\SuperAdmin;

use Maatwebsite\Excel\Concerns\FromArray;
use Maatwebsite\Excel\Concerns\WithHeadings;

class TestsExport implements FromArray, WithHeadings
{
    /**
     * @return \Illuminate\Support\Collection
     */
    protected $diseases;
    public function __construct($diseases)
    {
        $this->diseases = $diseases;
    }
    public function array(): array
    {
        $data = [];
        foreach ($this->diseases as $disease) {
            $single = [$disease->id, $disease->name, $disease->description, $disease->is_active, date_format($disease->created_at, 'd-m-Y')];
            $data[] = $single;
        }
        return $data;
    }
    public function headings(): array
    {
        return ["id", "name", "description", "is_active", "created_at"];
    }
}
