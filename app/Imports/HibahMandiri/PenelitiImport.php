<?php

namespace App\Imports\HibahMandiri;

use Illuminate\Support\Facades\Auth;
use App\Models\HibahMandiri;
use Maatwebsite\Excel\Concerns\ToArray;
use Maatwebsite\Excel\Concerns\WithCalculatedFormulas;

class PenelitiImport implements ToArray, WithCalculatedFormulas
{

  public function  __construct($periode, $tahun, $sumber_data, $nama_table){
    $this->periode = $periode;
    $this->tahun_input = $tahun;
    $this->sumber_data = $sumber_data;
    $this->nama_table = $nama_table;
  }

  public function array(array $rows){
    $tabel = $rows[0][0];
    // $tabelIndex = explode(" ", $tabel)[1]*1;
    $data = [];
    $currFakultas = '';
    $currStatus = '';
    for($i=6;$i<count($rows);$i++){
      if($rows[$i][0] === 'J U M L A H'){
        break;
      }
      if($rows[$i][0] !== null){
        $currFakultas = $rows[$i][0];
      }
      if($rows[$i][1] !== 'JUMLAH'){
        array_push($data, [
          'fakultas' => $currFakultas,
          'periode' => $this->periode,
          'sumber_data' => $this->sumber_data,
          'tahun_input' => $this->tahun_input,
          'nama_table' => $this->nama_table,

          'usulan' => $rows[$i][3],
          'diterima' => $rows[$i][4],

          'user_id' => Auth::user()->id
        ]);
      }
    }
// dd($data);
    HibahMandiri::insert($data);
  }
}
