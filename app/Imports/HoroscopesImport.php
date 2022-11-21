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
            "id" => $row[A],
            "horoscope" => $row[B],
            "date" => $row[C],
            "sign" => $row[D],
        ]);
    }
}
