<?php

namespace App\Exports;

use App\Models\ResearchGroup;
use Maatwebsite\Excel\Concerns\FromCollection;
use Maatwebsite\Excel\Concerns\WithHeadings;

class ResearchGroupExport implements FromCollection, WithHeadings
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
        return ResearchGroup::select('fakultas', 'tahun_input', 'periode', 'sumber_data', 'tahun1')->where('tahun_input', $this->tahun)->get();
    }

    public function headings(): array
    {
        return ["Fakultas", "Tahun", "Periode", "Sumber Data", "Usulan"];
    }
}
