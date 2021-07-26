<?php

namespace App\Imports;

use Maatwebsite\Excel\Concerns\WithMultipleSheets;

class PenelitiPengabdisImport implements WithMultipleSheets 
{
    /**
    * @param array $row
    *
    * @return \Illuminate\Database\Eloquent\Model|null
    */

    public function sheets(): array
    {
        return [
            new PenelitiImport('Periode 1', '2020'),
            // new PenelitiImport('Periode 2', '2020'),
            // new PenelitiImport('Periode 3', '2020'),
            // new PenelitiImport('Periode 4', '2020'),
            // new PenelitiImport('Periode 5', '2020'),
            // new PenelitiImport('Periode 6', '2020'),
        ];
    }
}
