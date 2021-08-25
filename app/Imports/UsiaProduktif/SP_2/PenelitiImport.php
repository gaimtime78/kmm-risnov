<?php

namespace App\Imports\UsiaProduktif\SP_2;

use Illuminate\Support\Facades\Auth;
use App\Models\UsiaProduktif\UsiaProduktifSP_2;
use Illuminate\Support\Collection;
use Maatwebsite\Excel\Concerns\ToCollection;
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
    $tabel = $rows[0][0];
    $tabelIndex = explode(" ", $tabel)[1]*1;
    $jenjang = 'Doktoral
    ';
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
          'sumber_data' => $this->sumber_data,
          'tahun_input' => $this->tahun_input,

          'usia25sd35_L' => $rows[$i][2],
          'usia25sd35_P' => $rows[$i][3],
          'usia25sd35_jumlah' => $rows[$i][4],
          
          'usia36sd45_L' => $rows[$i][5],
          'usia36sd45_P' => $rows[$i][6],
          'usia36sd45_jumlah' => $rows[$i][7],
          
          'usia46sd55_L' => $rows[$i][8],
          'usia46sd55_P' => $rows[$i][9],
          'usia46sd55_jumlah' => $rows[$i][10],
          
          'usia56sd65_L' => $rows[$i][11],
          'usia56sd65_P' => $rows[$i][12],
          'usia56sd65_jumlah' => $rows[$i][13],
          
          'usia66sd75_L' => $rows[$i][14],
          'usia66sd75_P' => $rows[$i][15],
          'usia66sd75_jumlah' => $rows[$i][16],
          
          'usia75_L' => $rows[$i][17],
          'usia75_P' => $rows[$i][18],
          'usia75_jumlah' => $rows[$i][19],

          'total' => $rows[$i][20],
          'user_id' => Auth::user()->id
        ]);
      }
    }
// dd($data);
UsiaProduktifSP_2::insert($data);
  }
}