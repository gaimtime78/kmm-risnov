<?php

namespace App\Imports\UsiaProduktif\Magister;

use Maatwebsite\Excel\Concerns\WithMultipleSheets;

class UsiaProduktifMagistersImport implements WithMultipleSheets 
{
    /**
    * @param array $row
    *
    * @return \Illuminate\Database\Eloquent\Model|null
    */

    public function sheets(): array
    {
        return [
            new PenelitiImport('kosong', 'kosong', 'kosong'),
            // new PenelitiImport('Periode 2', '2020'),
            // new PenelitiImport('Periode 3', '2020'),
            // new PenelitiImport('Periode 4', '2020'),
            // new PenelitiImport('Periode 5', '2020'),
            // new PenelitiImport('Periode 6', '2020'),
        ];
    }
}
