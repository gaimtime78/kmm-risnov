<?php

namespace App\Imports\PenelitiPengabdiMagister;

use Illuminate\Support\Facades\Auth;
use App\Models\PenelitiPengabdiMagister;
use Maatwebsite\Excel\Concerns\ToArray;
use Maatwebsite\Excel\Concerns\WithCalculatedFormulas;

class PenelitiImport implements ToArray, WithCalculatedFormulas
{

  public function  __construct($periode, $tahun){
    $this->periode = $periode;
    $this->tahun_input = $tahun;
  }

  public function array(array $rows){
    // dd($this->periode);
    // $mapperSheet = ['Magister'];
    $tabel = $rows[0][0];
    $tabelIndex = explode(" ", $tabel)[1]*1;
    $jenjang = 'Magister';
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
          '25sd35_L' => $rows[$i][2],
          '25sd35_P' => $rows[$i][3],
          '25sd35_jumlah' => $rows[$i][4],
          '36sd45_L' => $rows[$i][5],
          '36sd45_P' => $rows[$i][6],
          '36sd45_jumlah' => $rows[$i][7],
          '46sd55_L' => $rows[$i][8],
          '46sd55_P' => $rows[$i][9],
          '46sd55_jumlah' => $rows[$i][10],
          '56sd65_L' => $rows[$i][11],
          '56sd65_P' => $rows[$i][12],
          '56sd65_jumlah' => $rows[$i][13],
          '66sd75_L' => $rows[$i][14],
          '66sd75_P' => $rows[$i][15],
          '66sd75_jumlah' => $rows[$i][16],
          '75_L' => $rows[$i][17],
          '75_P' => $rows[$i][18],
          '75_jumlah' => $rows[$i][19],
          'total' => $rows[$i][20],
          'user_id' => Auth::user()->id
        ]);
      }
    }
    PenelitiPengabdiMagister::insert($data);
  }
}