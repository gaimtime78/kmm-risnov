<?php

namespace App\Exports\Rida\Pendidik;

use App\Models\UsiaProduktif\UsiaProduktifSP_1K;
use Maatwebsite\Excel\Concerns\FromCollection;
use Maatwebsite\Excel\Concerns\WithHeadings;

class Sp1kExport implements FromCollection, WithHeadings
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
        return UsiaProduktifSP_1K::select('fakultas', 'status', 'jenjang', 'periode', 'tahun_input', 'sumber_data', 'usia25sd35_L', 'usia25sd35_P', 'usia25sd35_jumlah', 'usia36sd45_L', 'usia36sd45_P', 'usia36sd45_jumlah', 'usia46sd55_L', 'usia46sd55_P', 'usia46sd55_jumlah', 'usia56sd65_L', 'usia56sd65_P', 'usia56sd65_jumlah', 'usia66sd75_L', 'usia66sd75_P', 'usia66sd75_jumlah', 'usia75_L', 'usia75_P', 'usia75_jumlah', 'total')->where('fakultas', $this->fakultas)->where('tahun_input', $this->tahun)->get();
    }

    public function headings(): array
    {
        return ["Fakultas", "Status", "Jenjang", "Periode", "Tahun", "Sumber Data", "25 sd 35 L", "25 sd 35 P", "Jumlah", "36 sd 45 L", "36 sd 45 P", "Jumlah", "46 sd 55 L", "46 sd 55 P", "Jumlah", "56 sd 65 L", "56 sd 65 P", "Jumlah", "66 sd 75 L", "66 sd 75 P", "Jumlah", "> 75 L", "> 75 P", "Jumlah", "Total"];
    }
}
