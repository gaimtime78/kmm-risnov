<?php

namespace App\Exports\Rida\Peneliti_Pengabdi;

use App\Models\PenelitiPengabdiSarjana;

use Maatwebsite\Excel\Concerns\FromCollection;
use Maatwebsite\Excel\Concerns\WithHeadings;

class SarjanaExport implements FromCollection, WithHeadings
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
        return PenelitiPengabdiSarjana::select('fakultas', 'status', 'jenjang', 'periode', 'tahun_input', 'sumber_data', 'usia25sd35_jumlah',  'usia36sd45_jumlah', 'usia46sd55_jumlah', 'usia56sd65_jumlah', 'usia66sd75_jumlah',  'usia75_jumlah' ,'total')->where('fakultas', $this->fakultas)->where('tahun_input', $this->tahun)->get(); 
    }

    public function headings(): array
    {
        return ["Fakultas", "Status", "Jenjang", "Periode", "Tahun", "Sumber Data", "25 sd 35", "36 sd 45", "46 sd 55", "56 sd 65", "66 sd 75", " < 75", "Total"];
    }
}
