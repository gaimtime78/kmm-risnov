<?php

namespace App\Exports\Rida\Kependidikan;

use App\Models\Kependidikan\PenelitiPengabdiDiploma3;
use Maatwebsite\Excel\Concerns\FromCollection;
use Maatwebsite\Excel\Concerns\WithHeadings;

class D3Export implements FromCollection, WithHeadings
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
        return PenelitiPengabdiDiploma3::select('fakultas', 'status', 'jenjang', 'periode', 'tahun_input', 'sumber_data', 'usia25sd35_L', 'usia25sd35_P', 'usia25sd35_jumlah', 'usia36sd45_L', 'usia36sd45_P', 'usia36sd45_jumlah', 'usia46sd55_L', 'usia46sd55_P', 'usia46sd55_jumlah', 'usia56sd60_L', 'usia56sd60_P', 'usia56sd60_jumlah', 'total')->where('fakultas', $this->fakultas)->where('tahun_input', $this->tahun)->get(); 
    }

    public function headings(): array
    {
        return ["Fakultas", "Status", "Jenjang", "Periode", "Tahun", "Sumber Data", "25 sd 35 L", "25 sd 35 P", "Jumlah", "36 sd 45 L", "36 sd 45 P", "Jumlah", "46 sd 55 L", "46 sd 55 P", "Jumlah", "56 sd 60 L", "56 sd 60 P", "Jumlah", "Total"];
    }
}
