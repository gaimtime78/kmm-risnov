<?php

namespace App\Imports\Kependidikan\PenelitiPengabdiMagister;

use Illuminate\Support\Facades\Auth;
use App\Models\Kependidikan\PenelitiPengabdiMagister;
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
          'nama_table' => $this->nama_table,
          'sumber_data' => $this->sumber_data,
          'tahun_input' => $this->tahun_input,

          'usia25_L' => $rows[$i][2],
          'usia25_P' => $rows[$i][3],
          'usia25_jumlah' => $rows[$i][4],
          
          'usia25sd35_L' => $rows[$i][5],
          'usia25sd35_P' => $rows[$i][6],
          'usia25sd35_jumlah' => $rows[$i][7],
          
          'usia36sd45_L' => $rows[$i][8],
          'usia36sd45_P' => $rows[$i][9],
          'usia36sd45_jumlah' => $rows[$i][10],
          
          'usia46sd55_L' => $rows[$i][11],
          'usia46sd55_P' => $rows[$i][12],
          'usia46sd55_jumlah' => $rows[$i][13],
          
          'usia56sd60_L' => $rows[$i][14],
          'usia56sd60_P' => $rows[$i][15],
          'usia56sd60_jumlah' => $rows[$i][16],

          'total' => $rows[$i][17],
          'user_id' => Auth::user()->id
        ]);
      }
    }
// dd($data);
    PenelitiPengabdiMagister::insert($data);
  }
}