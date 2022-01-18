<?php

namespace App\Exports\Rida;

use App\Models\H_Indeks_PKM;

use Maatwebsite\Excel\Concerns\FromCollection;
use Maatwebsite\Excel\Concerns\WithHeadings;

class IndeksPenelitiPKMsExport implements FromCollection, WithHeadings
{
    protected $tahun;
    public function __construct($tahun)
    {
        $this->tahun = $tahun;
    }

    /**
    * @return \Illuminate\Support\Collection
    */
    public function collection()
    {
        return H_Indeks_PKM::select('h_index', 'fib_jumlah', 'fib_percent', 'fkip_jumlah', 'fkip_percent', 'feb_jumlah', 'feb_percent',  'fh_jumlah', 'fh_percent', 'fisip_jumlah', 'fisip_percent',  'fk_jumlah' ,'fk_percent', 'fp_jumlah' ,'fp_percent', 'ft_jumlah', 'ft_percent', 'fmipa_jumlah', 'fmipa_percent', 'fsrd_jumlah', 'fsrd_percent', 'fkor_jumlah', 'fkor_percent', 'sv_jumlah', 'sv_percent', 'pascasarjana_jumlah', 'pascasarjana_percent', 'total_jumlah', 'total_percent')->where('tahun_input', $this->tahun)->get(); 
    }

    public function headings(): array
    {
        return ["H-Indeks", "FIB (Jumlah)", "FIB (Percent)",
        "FKIP (Jumlah)", "FKIP (Percent)",
        "FEB (Jumlah)", "FEB (Percent)",
        "FH (Jumlah)", "FH (Percent)",
        "FISIP (Jumlah)", "FISIP (Percent)",
        "FK (Jumlah)", "FK (Percent)",
        "FP (Jumlah)", "FP (Percent)",
        "FT (Jumlah)", "FT (Percent)",
        "FMIPA (Jumlah)", "FMIPA (Percent)",
        "FSRD (Jumlah)", "FSRD (Percent)",
        "FKOR (Jumlah)", "FKOR (Percent)",
        "SV (Jumlah)", "SV (Percent)",
        "PASCASARJANA (Jumlah)", "PASCASARJANA (Percent)",
        "Total (Jumlah)", "Total (Percent)",];
    }
}
