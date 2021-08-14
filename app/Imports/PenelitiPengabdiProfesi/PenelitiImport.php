<?php

namespace App\Imports\PenelitiPengabdiProfesi;

use Illuminate\Support\Facades\Auth;
use App\Models\PenelitiPengabdiProfesi;
use Maatwebsite\Excel\Concerns\ToArray;
use Maatwebsite\Excel\Concerns\WithCalculatedFormulas;

class PenelitiImport implements ToArray, WithCalculatedFormulas
{

  public function  __construct($periode, $tahun, $sumber_data){
    $this->periode = $periode;
    $this->tahun_input = $tahun;
    $this->sumber_data = $sumber_data;
  }

  public function array(array $rows){
    // dd($this->periode);
    // $mapperSheet = ['Magister'];
    $tabel = $rows[0][0];
    $tabelIndex = explode(" ", $tabel)[1]*1;
    $jenjang = 'Spesialis';
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
        $currStatus = $rows[$i][1];
        array_push($data, [
          'fakultas' => $currFakultas,
          'status' => $currStatus,
          'jenjang' => $jenjang,
          'periode' => $this->periode,
          'tahun_input' => $this->tahun_input,
          'sumber_data' => $this->sumber_data,
          'usia25sd35_jumlah' => $rows[$i][2],
          'usia36sd45_jumlah' => $rows[$i][3],
          'usia46sd55_jumlah' => $rows[$i][4],
          'usia56sd65_jumlah' => $rows[$i][5],
          'usia66sd75_jumlah' => $rows[$i][6],
          'usia75_jumlah' => $rows[$i][7],
          'total' => $rows[$i][8],
          'user_id' => Auth::user()->id
        ]);
      }
    }
    PenelitiPengabdiProfesi::insert($data);
  }
}