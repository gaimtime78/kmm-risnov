<?php

namespace App\Exports;

use App\Models\AkreditasiPusdi;
use Maatwebsite\Excel\Concerns\FromCollection;
use Maatwebsite\Excel\Concerns\WithHeadings;

class AkreditasiPusdiExport implements FromCollection, WithHeadings
{
    protected $pusat_studi, $tahun;

    public function __construct($pusat_studi, $tahun)
    {
        $this->pusat_studi = $pusat_studi;
        $this->tahun = $tahun;
    }
    /**
    * @return \Illuminate\Support\Collection
    */
    public function collection()
    {
        return AkreditasiPusdi::select('pusat_studi', 'tahun_input', 'periode', 'sumber_data', 'akreditasi')->where('tahun_input', $this->tahun)->get();
    }

    public function headings(): array
    {
        return ["Pusat Studi", "Tahun", "Periode", "Sumber Data", "Status Akreditasi"];
    }
}
