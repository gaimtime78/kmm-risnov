<?php

namespace App\Imports\KerjasamaPenelitian;

use Illuminate\Support\Facades\Auth;
use App\Models\KerjasamaPenelitian;
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
    $data = [];
    $currStudi = '';
    $currTahunResearch = '';

    for($i=6;$i<count($rows);$i++){
      if($rows[$i][1] === 'J U M L A H'){
        break;
      }
      if($rows[$i][0] !== null){
        $currStudi = $rows[$i][1];
      }
      if($rows[$i][0] !== null){
        $currTahunResearch = $rows[$i-2][1];
      }
      // dd($currTahunResearch);
      if($rows[$i][0] !== 'JUMLAH'){
        array_push($data, [
          'pusat_studi' => $currStudi,
          'periode' => $this->periode,
          'tahun_input' => $this->tahun_input,
          'sumber_data' => $this->sumber_data,
          'tahun1' => $rows[$i][2],
          // 'tahun2' => $rows[$i][2],
          // 'tahun3' => $rows[$i][3],
          // 'tahun4' => $rows[$i][4],
          // 'tahun5' => $rows[$i][5],
          
          'user_id' => Auth::user()->id
        ]);
      }
    }
    // dd($data);
    KerjasamaPenelitian::insert($data);
    
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