<?php

namespace App\Imports;

use App\Models\Horoscope;
use Maatwebsite\Excel\Concerns\ToModel;

class HoroscopesImport implements ToModel
{
    /** 
    * @param array $row
    *
    * @return \Illuminate\Database\Eloquent\Model|null
    */
    public function model(array $row)
    {
        return new Horoscope([
            "horoscope" => $row[1],
            "date" => $row[2],
            "sign" => $row[3],
        ]);
    }
}
