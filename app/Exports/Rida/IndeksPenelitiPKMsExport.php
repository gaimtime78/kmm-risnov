<?php

// namespace App\Exports;

// use Maatwebsite\Excel\Concerns\FromArray;

// class IndeksPenelitiPKMsExport implements FromArray
// {
//     protected $table;

//     public function __construct(array $table)
//     {
//         $this->table = $table;
//     }

//     public function array(): array
//     {
//         return $this->table;
//     }
// }

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
        // dd($tahun);
    }

    /**
    * @return \Illuminate\Support\Collection
    */
    public function collection()
    {
        // $data = H_Indeks_PKM::select('h_index', 'fib_jumlah', 'fib_percent', 'fkip_jumlah', 'fkip_percent', 'feb_jumlah', 'feb_percent',  'fh_jumlah', 'fh_percent', 'fisip_jumlah', 'fisip_percent',  'fk_jumlah' ,'fk_percent', 'fp_jumlah' ,'fp_percent', 'ft_jumlah', 'ft_percent', 'fmipa_jumlah', 'fmipa_percent', 'fsrd_jumlah', 'fsrd_percent', 'fkor_jumlah', 'fkor_percent', 'sv_jumlah', 'sv_percent', 'pascasarjana_jumlah', 'pascasarjana_percent', 'total_jumlah', 'total_percent')->where('tahun_input', $this->tahun)->get(); 
        // dd($data);
        return H_Indeks_PKM::select('h_index', 'fib_jumlah', 'fib_percent', 'fkip_jumlah', 'fkip_percent', 'feb_jumlah', 'feb_percent',  'fh_jumlah', 'fh_percent', 'fisip_jumlah', 'fisip_percent',  'fk_jumlah' ,'fk_percent', 'fp_jumlah' ,'fp_percent', 'ft_jumlah', 'ft_percent', 'fmipa_jumlah', 'fmipa_percent', 'fsrd_jumlah', 'fsrd_percent', 'fkor_jumlah', 'fkor_percent', 'sv_jumlah', 'sv_percent', 'pascasarjana_jumlah', 'pascasarjana_percent', 'total_jumlah', 'total_percent')->where('tahun_input', $this->tahun)->get(); 
    }

    public function headings(): array
    {
        return ["H-Indeks", "FIB", "FKIP", "FEB", "FH", "FISIP", "FK", "FP", "FT", "FMIPA", "FSRD", " FKOR", "SV", "Pasca", "Jumlah"];
    }
}
