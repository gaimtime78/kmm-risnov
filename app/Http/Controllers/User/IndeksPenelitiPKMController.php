<?php

namespace App\Http\Controllers\User;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

use App\Exports\Rida\Pendidik\DoktoralExport;
use App\Models\IndeksPenelitiPKM;


class IndeksPenelitiPKMController extends Controller
{
    public function index(){

      return view('user.rida.index', ['data' => "iki data"]);
    }
    public function indekspkm(Request $request){
      $list_tahun = IndeksPenelitiPKM::select("tahun_input")->distinct()->orderBy("tahun_input", "asc")->get();
      if(!$list_tahun->isEmpty()){
        $latest_tahun = $list_tahun[0]->tahun_input;
        $fakultas = "Fak. Ilmu Budaya";
        $tahun = $latest_tahun;
        if($request->has("fakultas")){
          $fakultas = $request->input("fakultas");
        }
        if($request->has("tahun")){
          $tahun = $request->input("tahun");      
        }
        $data = IndeksPenelitiPKM::where("fakultas", $fakultas)->where("tahun_input", $tahun)->orderBy("periode", "asc")->get();
        $list_fakultas = IndeksPenelitiPKM::select("fakultas")->distinct()->where("tahun_input", $tahun)->get();
        $list_sumber = IndeksPenelitiPKM::select("periode", "sumber_data")->distinct()->where("fakultas", $fakultas)->where("tahun_input", $tahun)->get();
        $nama_table = IndeksPenelitiPKM::select("nama_table")->distinct()->get();
        // dd($data, $fakultas, $tahun);
        return view('user.rida.grafik-indeksPKM', [
          'nama_table'=> $nama_table,
          "name"=> "Tenaga Pendidik Doktor",
          "data" => $data, "list_sumber" => $list_sumber, "list_tahun" => $list_tahun, 
          "list_fakultas" => $list_fakultas, "fakultas" => $fakultas, "tahun" => $tahun 
        ]);
      }
      return view('user.rida.grafik', [
        "name"=> "Tenaga Pendidik Doktor",
        "data" => [], "list_sumber" => [], "list_tahun" => [], 'nama_table'=> $nama_table,
        "list_fakultas" => [], "fakultas" => "", "tahun" => "" 
      ]);
      
    }
    
    //detail rida grafik 23
    public function pilih_periode_indekspkm($fakultas, $tahun){
      $fakultas  = $fakultas;
      $tahun  = $tahun;
      $data = IndeksPenelitiPKM::select('periode', 'tahun_input', 'sumber_data')->distinct()->where('fakultas', $fakultas)->where('tahun_input', $tahun)->get('periode', 'tahun_input', 'sumber_data');
      $nama_table = IndeksPenelitiPKM::select("nama_table")->distinct()->get();
      
      
      return view('user.rida.pilih_periode',[ "name" => "H-Indeks_PKM", 'nama_table'=> $nama_table, 'data' => $data, 'fakultas' => $fakultas, 'tahun' => $tahun]);
      
    }
  
    public function detail_indekspkm($fakultas, $tahun, $periode){
      $indekspenelitipkm = IndeksPenelitiPKM::where([['periode', $periode], ['tahun_input', $tahun]])->get()->toArray();
      // dd($indekspenelitipkm);
      /**
       * RENCANA 
       * $table = [
       *      'nama_fakultas_1' => [
       *          ['jml' => 69, percent => '42.0%'], h_index 0
       *          ['jml' => 69, percent => '42.0%'], h_index 1
       *          ...
       *      ],
       *      'nama_fakultas_2' => [
       *          ['jml' => 69, percent => '42.0%']
       *      ],
       *      ...
       *  ]
       */
      $table = [];
      foreach ($indekspenelitipkm as $row) {
          $ff = $row['fakultas'];
          $table[$ff] = array();
          for ($h_index = 0; $h_index <=23; $h_index++) {                
              $h_index_data = [];
              if ($h_index < 23) {
                  $h_index_data = [
                      'jumlah' => $row['jumlah' . $h_index ],
                      'percent' => $row['percent' . $h_index ],
                  ];
              } else {
                  $h_index_data = [
                      'jumlahtotal' => $row['jumlahtotal'],
                      'percenttotal' => $row['percenttotal'],
                  ];
              }
              array_push($table[$ff], $h_index_data);
          }
      }


      $nama_table = IndeksPenelitiPKM::select("nama_table")->distinct()->get();

      $list_sumber = IndeksPenelitiPKM::select("periode", "sumber_data")->distinct()->where("periode", $periode)->where("fakultas", $fakultas)->where("tahun_input", $tahun)->get();

      return view('user.rida.detail-h-indeks_pkm', [
        'table' => $table,
        'name' => 'H-Indeks_PKM',
        'tahun' => $tahun ,
        'periode'=>$periode,
        'fakultas' => $fakultas, 
        'nama_table' => $nama_table, 
        'list_sumber' => $list_sumber, 
      ]);
      /*
      $fakultas  = $fakultas;
      $tahun_input  = $tahun;

      $data = IndeksPenelitiPKM::where([['fakultas', $fakultas], ['periode', $periode], ['tahun_input', $tahun]])->get();

       $jmltotalfak    = IndeksPenelitiPKM::select('fakultas')->where([['periode', $periode], ['tahun_input', $tahun_input]])->sum('jumlahtotal');
        $jml0        = IndeksPenelitiPKM::where([['periode', $periode], ['tahun_input', $tahun_input]])->sum('jumlah0');
        // dd($jmltotalfak);
        $percent0    = number_format((float)$jml0/$jmltotalfak*100, 0 , '.', '');
        $jml1        = IndeksPenelitiPKM::where([['periode', $periode], ['tahun_input', $tahun_input]])->sum('jumlah1');
        $percent1    = number_format((float)$jml1/$jmltotalfak*100, 1 , '.', '');
        $jml2        = IndeksPenelitiPKM::where([['periode', $periode], ['tahun_input', $tahun_input]])->sum('jumlah2');
        $percent2    = number_format((float)$jml2/$jmltotalfak*100, 1 , '.', '');
        $jml3        = IndeksPenelitiPKM::where([['periode', $periode], ['tahun_input', $tahun_input]])->sum('jumlah3');
        $percent3    = number_format((float)$jml3/$jmltotalfak*100, 1 , '.', '');
        $jml4        = IndeksPenelitiPKM::where([['periode', $periode], ['tahun_input', $tahun_input]])->sum('jumlah4');
        $percent4    = number_format((float)$jml4/$jmltotalfak*100, 1 , '.', '');
        $jml5        = IndeksPenelitiPKM::where([['periode', $periode], ['tahun_input', $tahun_input]])->sum('jumlah5');
        $percent5    = number_format((float)$jml5/$jmltotalfak*100, 1 , '.', '');
        $jml6        = IndeksPenelitiPKM::where([['periode', $periode], ['tahun_input', $tahun_input]])->sum('jumlah6');
        $percent6    = number_format((float)$jml6/$jmltotalfak*100, 1 , '.', '');
        $jml7        = IndeksPenelitiPKM::where([['periode', $periode], ['tahun_input', $tahun_input]])->sum('jumlah7');
        $percent7    = number_format((float)$jml7/$jmltotalfak*100, 1 , '.', '');
        $jml8        = IndeksPenelitiPKM::where([['periode', $periode], ['tahun_input', $tahun_input]])->sum('jumlah8');
        $percent8    = number_format((float)$jml8/$jmltotalfak*100, 1 , '.', '');
        $jml9        = IndeksPenelitiPKM::where([['periode', $periode], ['tahun_input', $tahun_input]])->sum('jumlah9');
        $percent9    = number_format((float)$jml9/$jmltotalfak*100, 1 , '.', '');
        $jml10        = IndeksPenelitiPKM::where([['periode', $periode], ['tahun_input', $tahun_input]])->sum('jumlah10');
        $percent10    = number_format((float)$jml10/$jmltotalfak*100, 1 , '.', '');

        $jml11        = IndeksPenelitiPKM::where([['periode', $periode], ['tahun_input', $tahun_input]])->sum('jumlah11');
        $percent11    = number_format((float)$jml11/$jmltotalfak*100, 1 , '.', '');
        $jml12        = IndeksPenelitiPKM::where([['periode', $periode], ['tahun_input', $tahun_input]])->sum('jumlah12');
        $percent12    = number_format((float)$jml12/$jmltotalfak*100, 1 , '.', '');
        $jml13        = IndeksPenelitiPKM::where([['periode', $periode], ['tahun_input', $tahun_input]])->sum('jumlah13');
        $percent13    = number_format((float)$jml13/$jmltotalfak*100, 1 , '.', '');
        $jml14        = IndeksPenelitiPKM::where([['periode', $periode], ['tahun_input', $tahun_input]])->sum('jumlah14');
        $percent14    = number_format((float)$jml14/$jmltotalfak*100, 1 , '.', '');
        $jml15        = IndeksPenelitiPKM::where([['periode', $periode], ['tahun_input', $tahun_input]])->sum('jumlah15');
        $percent15    = number_format((float)$jml15/$jmltotalfak*100, 1 , '.', '');
        $jml16        = IndeksPenelitiPKM::where([['periode', $periode], ['tahun_input', $tahun_input]])->sum('jumlah16');
        $percent16    = number_format((float)$jml16/$jmltotalfak*100, 1 , '.', '');
        $jml17        = IndeksPenelitiPKM::where([['periode', $periode], ['tahun_input', $tahun_input]])->sum('jumlah17');
        $percent17    = number_format((float)$jml17/$jmltotalfak*100, 1 , '.', '');
        $jml18        = IndeksPenelitiPKM::where([['periode', $periode], ['tahun_input', $tahun_input]])->sum('jumlah18');
        $percent18    = number_format((float)$jml18/$jmltotalfak*100, 1 , '.', '');
        $jml19        = IndeksPenelitiPKM::where([['periode', $periode], ['tahun_input', $tahun_input]])->sum('jumlah19');
        $percent19    = number_format((float)$jml19/$jmltotalfak*100, 1 , '.', '');
        $jml20        = IndeksPenelitiPKM::where([['periode', $periode], ['tahun_input', $tahun_input]])->sum('jumlah20');
        $percent20    = number_format((float)$jml20/$jmltotalfak*100, 1 , '.', '');
        $jml21        = IndeksPenelitiPKM::where([['periode', $periode], ['tahun_input', $tahun_input]])->sum('jumlah21');
        $percent21    = number_format((float)$jml21/$jmltotalfak*100, 1 , '.', '');
       
        $jml22        = IndeksPenelitiPKM::where([['periode', $periode], ['tahun_input', $tahun_input]])->sum('jumlah22');
        $percent22    = number_format((float)$jml22/$jmltotalfak*100, 1 , '.', '');
        $percenttotal    = IndeksPenelitiPKM::where([['periode', $periode], ['tahun_input', $tahun_input]])->sum('percenttotal');
        $percenttotalfak = round((float)$percenttotal);

        $nama_table = IndeksPenelitiPKM::select("nama_table")->distinct()->get();

        $list_sumber = IndeksPenelitiPKM::select("periode", "sumber_data")->distinct()->where("periode", $periode)->where("fakultas", $fakultas)->where("tahun_input", $tahun)->get();
      
      
      return view('user.rida.detail-h-indeks_pkm',[
        'nama_table'=> $nama_table,
        'name' => 'H-Indeks_PKM',
         'tahun' => $tahun , 'periode'=>$periode, 'data' => $data, 'fakultas' => $fakultas, 
            
                    'jmltotalfak' => $jmltotalfak,
                    'jumlah0' => $jml0, 'percent0' => $percent0,
                    'jumlah1' => $jml1, 'percent1' => $percent1,
                    'jumlah2' => $jml2, 'percent2' => $percent2,
                    'jumlah3' => $jml3, 'percent3' => $percent3,
                    'jumlah4' => $jml4, 'percent4' => $percent4,
                    'jumlah5' => $jml5, 'percent5' => $percent5,
                    'jumlah6' => $jml6, 'percent6' => $percent6,
                    'jumlah7' => $jml7, 'percent7' => $percent7,
                    'jumlah8' => $jml8, 'percent8' => $percent8,
                    'jumlah9' => $jml9, 'percent9' => $percent9,
                    'jumlah10' => $jml10, 'percent10' => $percent10,

                    'jumlah11' => $jml11, 'percent11' => $percent11,
                    'jumlah12' => $jml12, 'percent12' => $percent12,
                    'jumlah13' => $jml13, 'percent13' => $percent13,
                    'jumlah14' => $jml14, 'percent14' => $percent14,
                    'jumlah15' => $jml15, 'percent15' => $percent15,
                    'jumlah16' => $jml16, 'percent16' => $percent16,
                    'jumlah17' => $jml17, 'percent17' => $percent17,
                    'jumlah18' => $jml18, 'percent18' => $percent18,
                    'jumlah19' => $jml19, 'percent19' => $percent19,
                    'jumlah20' => $jml20, 'percent20' => $percent20,
                    'jumlah21' => $jml21, 'percent21' => $percent21,
                    'jumlah22' => $jml22, 'percent22' => $percent22,
                    'percenttotalfak' => $percenttotalfak,
                    'list_sumber' => $list_sumber,
       ]);
      */
    }
    

    public function export_doktor($fakultas, $tahun) {
      return Excel::download(new DoktoralExport($fakultas, $tahun), 'Usia Produktif Doktoral.xlsx');
    }
}
