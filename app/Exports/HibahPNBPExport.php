<?php

namespace App\Exports;

use App\Models\HibahPNBP;
use Maatwebsite\Excel\Concerns\FromCollection;
use Maatwebsite\Excel\Concerns\WithHeadings;

class HibahPNBPExport implements FromCollection, WithHeadings
{
    protected $fakultas, $tahun;

    public function __construct($fakultas, $tahun)
    {
        $this->fakultas = $fakultas;
        $this->tahun = $tahun;
    }
    /**
    * @return \Illuminate\Support\Collection
    */
    public function collection()
    {
        return HibahPNBP::select('fakultas', 'tahun_input', 'periode', 'sumber_data', 'usulan_lanjutan', 'usulan_baru', 'diterima')->where('fakultas', $this->fakultas)->where('tahun_input', $this->tahun)->get();
    }

    public function headings(): array
    {
        return ["Fakultas", "Tahun", "Periode", "Sumber Data", "Usulan Lanjutan", "Usulan Baru", "Diterima"];
    }
}
