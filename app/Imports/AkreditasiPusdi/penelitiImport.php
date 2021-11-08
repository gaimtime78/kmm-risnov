<?php

namespace App\Imports\AkreditasiPusdi;

use Illuminate\Support\Facades\Auth;
use App\Models\AkreditasiPusdi;
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
    // dd($this->periode);
    // $mapperSheet = ['Magister'];
    $tabel = $rows[0][0];
    $data = [];
    $currPusdi = '';
    $currTahunAkreditasi = '';

    $tahun_input_dum = AkreditasiPusdi::select('tahun_input', 'periode')->distinct()->orderBy('tahun_input', 'ASC')->get();
    // dd($tahun_input_dum);
    $arrAddUnit = [];

    for($i=4;$i<count($rows);$i++){
      if($rows[$i][0] === null){
        break;
      }
      if($rows[$i][0] !== null){
        $currPusdi = $rows[$i][1];
        foreach($tahun_input_dum as $th){
          $check = AkreditasiPusdi::select('pusat_studi')->where('pusat_studi', $currPusdi)
          ->where('tahun_input', $th->tahun_input)
          ->where('periode', $th->periode)->get();
          if($check->count() <= 0){
            $getDataKosong = AkreditasiPusdi::select('sumber_data', 'nama_table')->where('tahun_input', $th->tahun_input)
            ->where('periode', $th->periode)->first();
            array_push($arrAddUnit,[
              'pusat_studi' => $currPusdi,
              'tahun_input' => $th->tahun_input,
              'periode' => $th->periode,
              'sumber_data' => $getDataKosong->sumber_data,
              'nama_table' => $getDataKosong->nama_table,
              'akreditasi' => 0,
              'user_id' => Auth::user()->id
            ]);
          } //currPusdi !== database
        }
      }
      if($rows[$i][0] !== null){
        $currTahunAkreditasi = $rows[$i-2][1];
      }
      // dd($currTahunResearch);
      if($rows[$i][0] !== 'STATUS AKREDITASI'){
        array_push($data, [
          'pusat_studi' => $currPusdi,
          'periode' => $this->periode,
          'tahun_input' => $this->tahun_input,
          'sumber_data' => $this->sumber_data,
          'nama_table' => $this->nama_table,
          'akreditasi' => $rows[$i][3],
          'user_id' => Auth::user()->id
        ]);
      }
    }
                  //  dd($data);         
    AkreditasiPusdi::insert($data);
    AkreditasiPusdi::insert($arrAddUnit);
    
    // $colomn = $rows[4][0];
    // $data2 = [];
    // $currTahunAkreditasi = '';
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