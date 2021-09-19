<?php

namespace App\Imports\UsiaProduktif\SP_1K;

use Maatwebsite\Excel\Concerns\WithMultipleSheets;

class UsiaProduktifSP_1KsImport implements WithMultipleSheets 
{
    /**
    * @param array $row
    *
    * @return \Illuminate\Database\Eloquent\Model|null
    */

    public function sheets(): array
    {
        return [
            new PenelitiImport('kosong', 'kosong', 'kosong', '(--Klik Tombol Edit Nama Table untuk Merubah Nama Table--)'),
            // new PenelitiImport('Periode 2', '2020'),
            // new PenelitiImport('Periode 3', '2020'),
            // new PenelitiImport('Periode 4', '2020'),
            // new PenelitiImport('Periode 5', '2020'),
            // new PenelitiImport('Periode 6', '2020'),
        ];
    }
}
