<?php

namespace App\Imports\SkemaPNBP;

use Maatwebsite\Excel\Concerns\ToModel;
use Maatwebsite\Excel\Concerns\WithMultipleSheets;

class SkemaPNBPImport implements WithMultipleSheets
{
    /**
    * @param array $row
    *
    * @return \Illuminate\Database\Eloquent\Model|null
    */

    public function sheets(): array
    {
        return [
            new PenelitiImport('kosong', 'kosong', 'kosong', 'klik tombol edit nama table untuk merubah nama table'),
            // new PenelitiImport('Periode 2', '2020'),
            // new PenelitiImport('Periode 3', '2020'),
            // new PenelitiImport('Periode 4', '2020'),
            // new PenelitiImport('Periode 5', '2020'),
            // new PenelitiImport('Periode 6', '2020'),
        ];
    }
}
