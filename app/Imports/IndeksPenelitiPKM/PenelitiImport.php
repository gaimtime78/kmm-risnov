<?php

namespace App\Imports\IndeksPenelitiPKM;

use Illuminate\Support\Facades\Auth;
use App\Models\IndeksPenelitiPKM;
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
    $data = [];
    $currFakultas = '';
    for($i=6;$i<count($rows);$i++){
      if($rows[$i][0] === 'J U M L A H'){
        break;
      }
      if($rows[$i][0] !== null){
        $currFakultas = $rows[$i][0];
      }
      if($rows[$i][0] !== 'JUMLAH'){
        array_push($data, [
          'fakultas' => $currFakultas,
          'periode' => $this->periode,
          'tahun_input' => $this->tahun_input,
          'jumlah0' => $rows[$i][1],
          'percent0' => $rows[$i][2],
          'jumlah1' => $rows[$i][3],
          'percent1' => $rows[$i][4],
          'jumlah2' => $rows[$i][5],
          'percent2' => $rows[$i][6],
          'jumlah3' => $rows[$i][7],
          'percent3' => $rows[$i][8],
          'jumlah4' => $rows[$i][9],
          'percent4' => $rows[$i][10],
          'jumlah5' => $rows[$i][11],
          'percent5' => $rows[$i][12],
          'jumlah6' => $rows[$i][13],
          'percent6' => $rows[$i][14],
          'jumlah7' => $rows[$i][15],
          'percent7' => $rows[$i][16],
          'jumlah8' => $rows[$i][17],
          'percent8' => $rows[$i][18],
          'jumlah9' => $rows[$i][19],
          'percent9' => $rows[$i][20],
          'jumlah10' => $rows[$i][21],
          'percent10' => $rows[$i][22],
          'jumlah11' => $rows[$i][23],
          'percent11' => $rows[$i][24],
          'jumlah12' => $rows[$i][25],
          'percent12' => $rows[$i][26],
          'jumlah13' => $rows[$i][27],
          'percent13' => $rows[$i][28],
          'jumlah14' => $rows[$i][29],
          'percent14' => $rows[$i][30],
          'jumlah15' => $rows[$i][31],
          'percent15' => $rows[$i][32],
          'jumlah16' => $rows[$i][33],
          'percent16' => $rows[$i][34],
          'jumlah17' => $rows[$i][35],
          'percent17' => $rows[$i][36],
          'jumlah18' => $rows[$i][37],
          'percent18' => $rows[$i][38],
          'jumlah19' => $rows[$i][39],
          'percent19' => $rows[$i][40],
          'jumlah20' => $rows[$i][41],
          'percent20' => $rows[$i][42],
          'jumlahtotal' => $rows[$i][43],
          'percenttotal' => $rows[$i][44],
          'user_id' => Auth::user()->id
        ]);
      }
    }
    IndeksPenelitiPKM::insert($data);
  }
}