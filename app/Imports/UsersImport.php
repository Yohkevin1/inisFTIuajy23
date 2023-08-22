<?php
  
namespace App\Imports;
  
use App\Models\MahasiswaBaru;
use Maatwebsite\Excel\Concerns\ToModel;
use Maatwebsite\Excel\Concerns\WithHeadingRow;
use Hash;
  
class UsersImport implements ToModel, WithHeadingRow
{
    /**
    * @param array $row
    *
    * @return \Illuminate\Database\Eloquent\Model|null
    */
    public function model(array $row)
    {
        return new MahasiswaBaru([
            'nama'     => $row['nama'],
            'npm'    => $row['npm'], 
            'kelompok'    => $row['kelompok'], 
            'status_lulus' => $row['status_lulus']
        ]);
    }
}