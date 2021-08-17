<?php

namespace App\Imports\Iku;

use Illuminate\Support\Facades\Auth;
use App\Models\Iku;
use Maatwebsite\Excel\Concerns\ToArray;
use Maatwebsite\Excel\Concerns\WithCalculatedFormulas;

class PenelitiImport implements ToArray, WithCalculatedFormulas
{

  public function  __construct($periode, $tahun, $sumber_data)
  {
    $this->periode = $periode;
    $this->tahun_input = $tahun;
    $this->sumber_data = $sumber_data;
  }

  public function array(array $rows)
  {
    // $mapperSheet = ['Magister'];
    $tabel = $rows[0][0];
    $tabelIndex = explode(" ", $tabel)[1] * 1;
    $data = [];
    $currIK = '';
    $currTargetCapaian = '';
    $currNo = '';

    // $currDetailCapaian = '';
    for ($i = 5; $i < count($rows); $i++) {
      if ($rows[$i][0] === 'J U M L A H') {
        break;
      }
      if ($rows[$i][0] !== null) {
        $currIK = $rows[$i][0];
      }
      if ($rows[$i][1] !== null) {
        $currTargetCapaian = $rows[$i][1];
      }
      // if($rows[$i][2] !== 'Jumlah' && $rows[$i][7] !== null){
      if ($rows[$i][7] !== null) {
        if ($rows[$i][2] !== null) {
          $currNo = $rows[$i][2];
        }
        array_push($data, [
          'periode' => $this->periode,
          'tahun_input' => $this->tahun_input,
          'sumber_data' => $this->sumber_data,
          'ik' => $currIK,
          'target_capaian' => $currTargetCapaian,
          'no' => $currNo,
          'detail_target' => $rows[$i][3],
          'satuan' => $rows[$i][4],
          'target' => $rows[$i][5],
          'capaian' => $rows[$i][6],
          'percenttotal' => round((float) $rows[$i][7], 4) * 100,
          'user_id' => Auth::user()->id
        ]);
      }
    }
    // dd($data);
    Iku::insert($data);
  }
}