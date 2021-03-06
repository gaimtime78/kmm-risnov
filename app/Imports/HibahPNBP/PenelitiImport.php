<?php

namespace App\Imports\HibahPNBP;

use Illuminate\Support\Facades\Auth;
use App\Models\HibahPNBP;
use Maatwebsite\Excel\Concerns\ToArray;
use Maatwebsite\Excel\Concerns\WithCalculatedFormulas;

class PenelitiImport implements ToArray, WithCalculatedFormulas
{

    public function  __construct($periode, $tahun, $sumber_data, $nama_table)
    {
        $this->periode = $periode;
        $this->tahun_input = $tahun;
        $this->sumber_data = $sumber_data;
        $this->nama_table = $nama_table;
    }

    public function array(array $rows)
    {
        // dd($this->periode);
        // $mapperSheet = ['Magister'];
        $tabel = $rows[0][0];
        $data = [];
        $currFakultas = '';
        $currTahunResearch = '';

        for ($i = 7; $i < count($rows); $i++) {
            if ($rows[$i][0] === 'J U M L A H') {
                break;
            }
            if ($rows[$i][0] !== null) {
                $currFakultas = $rows[$i][0];
            }
            if ($rows[$i][0] !== null) {
                $currTahunResearch = $rows[$i - 2][1];
            }
            // dd($currTahunResearch);
            if ($rows[$i][0] !== 'JUMLAH') {
                array_push($data, [
                    'fakultas' => $currFakultas,
                    'periode' => $this->periode,
                    'tahun_input' => $this->tahun_input,
                    'sumber_data' => $this->sumber_data,
                    'nama_table' => $this->nama_table,
                    'usulan_lanjutan' => $rows[$i][1],
                    'usulan_baru' => $rows[$i][2],
                    'diterima' => $rows[$i][3],
                    // 'tahun2' => $rows[$i][2],
                    // 'tahun3' => $rows[$i][3],
                    // 'tahun4' => $rows[$i][4],
                    // 'tahun5' => $rows[$i][5],

                    'user_id' => Auth::user()->id
                ]);
            }
        }
        // dd($data);
        HibahPNBP::insert($data);

        // $colomn = $rows[4][0];
        // $data2 = [];
        // $currTahunResearch = '';
        // for($i=4;$i<count($rows);$i++){
        //   if($rows[$i][4] !== null){
        //     array_push($data2, [
        //       'a' => $rows[$i-2][1],
        //       'b' => $rows[$i-2][2],
        //       'c' => $rows[$i-2][3],
        //       'd' => $rows[$i-2][4],
        //       'e' => $rows[$i-2][5],
        //     ]);
        //   }
        // }
        // dd($data2);
        // // dd()

    }
}
