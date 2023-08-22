<?php

namespace App\Exports;

use App\Models\MahasiswaBaru;
use Maatwebsite\Excel\Concerns\FromCollection;
use Maatwebsite\Excel\Concerns\WithHeadings;

class UsersExport implements FromCollection, WithHeadings
{
    /**
     * @return \Illuminate\Support\Collection
     */
    public function collection()
    {
        return MahasiswaBaru::select("id", "nama", "npm", "kelompok", "status_lulus")->get();
    }

    /**
     * Write code on Method
     *
     * @return response()
     */
    public function headings(): array
    {
        return ["id", "nama", "npm", "kelompok", "status_lulus"];
    }
}
