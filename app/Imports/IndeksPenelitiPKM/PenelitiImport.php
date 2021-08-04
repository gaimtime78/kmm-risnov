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
          'percent0' => round($rows[$i][2], 3) * 100,
          'jumlah1' => $rows[$i][3],
          'percent1' => round($rows[$i][4], 3) * 100,
          'jumlah2' => $rows[$i][5],
          'percent2' => round($rows[$i][6], 3) * 100,
          'jumlah3' => $rows[$i][7],
          'percent3' => round($rows[$i][8], 3) * 100,
          'jumlah4' => $rows[$i][9],
          'percent4' => round($rows[$i][10], 3) * 100,
          'jumlah5' => $rows[$i][11],
          'percent5' => round($rows[$i][12], 3) * 100,
          'jumlah6' => $rows[$i][13],
          'percent6' => round($rows[$i][14], 3) * 100,
          'jumlah7' => $rows[$i][15],
          'percent7' => round($rows[$i][16], 3) * 100,
          'jumlah8' => $rows[$i][17],
          'percent8' => round($rows[$i][18], 3) * 100,
          'jumlah9' => $rows[$i][19],
          'percent9' => round($rows[$i][20], 3) * 100,
          'jumlah10' => $rows[$i][21],
          'percent10' => round($rows[$i][22], 3) * 100,
          'jumlah11' => $rows[$i][23],
          'percent11' => round($rows[$i][24], 3) * 100,
          'jumlah12' => $rows[$i][25],
          'percent12' => round($rows[$i][26], 3) * 100,
          'jumlah13' => $rows[$i][27],
          'percent13' => round($rows[$i][28], 3) * 100,
          'jumlah14' => $rows[$i][29],
          'percent14' => round($rows[$i][30], 3) * 100,
          'jumlah15' => $rows[$i][31],
          'percent15' => round($rows[$i][32], 3) * 100,
          'jumlah16' => $rows[$i][33],
          'percent16' => round($rows[$i][34], 3) * 100,
          'jumlah17' => $rows[$i][35],
          'percent17' => round($rows[$i][36], 3) * 100,
          'jumlah18' => $rows[$i][37],
          'percent18' => round($rows[$i][38], 3) * 100,
          'jumlah19' => $rows[$i][39],
          'percent19' => round($rows[$i][40], 3) * 100,
          'jumlah20' => $rows[$i][41],
          'percent20' => round($rows[$i][42], 3) * 100,
          'jumlahtotal' => $rows[$i][43],
          'percenttotal' => round($rows[$i][44], 3) * 100,
          'user_id' => Auth::user()->id
        ]);
      }
    }
    IndeksPenelitiPKM::insert($data);
  }
}