<?php

namespace App\Http\Controllers\User;
use App\Http\Controllers;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

use App\Exports\Rida\IndeksPenelitiPKMsExport;

use Maatwebsite\Excel\Facades\Excel;

use App\Models\IndeksPenelitiPKM;
use App\Models\H_Indeks_PKM;
use Illuminate\Support\Facades\DB;


class IndeksPenelitiPKMController extends Controller
{
    public function index(){

      return view('user.rida.index', ['data' => "iki data"]);
    }
    public function indekspkm(Request $request){
      $list_tahun = H_Indeks_PKM::select("tahun_input")->distinct()->orderBy("tahun_input", "asc")->get();
      $tahun = $list_tahun[0]->tahun_input;
      $list_fakultas = ['FIB', 'FKIP', 'FEB', 'FH', 'FISIP', 'FK', 'FP', 'FT', 'FMIPA', 'FSRD', 'FKOR', 'SV', 'PASCASARJANA'];
      $nama_table = H_Indeks_PKM::select("nama_table")->distinct()->get();
      if(!$list_tahun->isEmpty()){
        if($request->has('fakultas') && $request->input("fakultas") !== "all") {
          /**
           * jika tidak default / udah di filter
           */
          $fakultas = $request->input("fakultas");
          $tahun = $request->input("tahun"); 
          $data = H_Indeks_PKM::select('h_index', strtolower($fakultas) . '_jumlah')->where("tahun_input", $tahun)->orderBy("periode", "asc")->get();
          // dd($data->toArray());
          return view('user.rida.grafik-indeksPKM', [
            'nama_table'=> $nama_table,
            "name"=> "Tenaga Pendidik Doktor",
            "data" => $data, "list_tahun" => $list_tahun, 
            "list_fakultas" => $list_fakultas, "fakultas" => strtolower($fakultas), "tahun" => $tahun 
          ]);
        } else { 
          $data = H_Indeks_PKM::where("tahun_input", $tahun)->orderBy("periode", "asc")->get();
          // dd(json_encode($data));
          return view('user.rida.grafik-indeksPKM', [
            'nama_table'=> $nama_table,
            "name"=> "Tenaga Pendidik Doktor",
            "data" => $data, "list_tahun" => $list_tahun, 
            "list_fakultas" => $list_fakultas, 'fakultas' => "all", "tahun" => $tahun
          ]);
        }
      }
      return view('user.rida.grafik', [
        "name"=> "Tenaga Pendidik Doktor",
        "data" => [], "list_sumber" => [], "list_tahun" => [], 'nama_table'=> $nama_table,
        "list_fakultas" => [], "fakultas" => "", "tahun" => "" 
      ]);
      
    }
    
    //detail rida grafik 23
    public function pilih_periode_indekspkm($fakultas, $tahun){

      
      // $indekspenelitipkm = H_Indeks_PKM::get();
      //   $total_indekspenelitipkm = H_Indeks_PKM::select(DB::raw('sum(fib_jumlah) as fib,sum(fkip_jumlah) as fkip,sum(feb_jumlah) as feb,sum(fh_jumlah) as fh, sum(fisip_jumlah) as fisip,sum(fk_jumlah) as fk, sum(fp_jumlah) as fp, sum(ft_jumlah) as ft, sum(fmipa_jumlah) as fmipa, sum(fsrd_jumlah) as fsrd, sum(fkor_jumlah) as fkor, sum(sv_jumlah) as sv, sum(pascasarjana_jumlah) as pascasarjana, sum(total_jumlah) as total'))
      //       ->get();
      //   $table = $indekspenelitipkm->toArray();
      //   $table_total = $total_indekspenelitipkm->toArray()[0];
      //   dd($table, $table_total);

      $fakultas  = $fakultas;
      $tahun  = $tahun;
      $data = H_Indeks_PKM::select('periode', 'tahun_input', 'sumber_data')->distinct()->where('tahun_input', $tahun)->get('periode', 'tahun_input', 'sumber_data');
      $nama_table = H_Indeks_PKM::select("nama_table")->distinct()->get();
      
      // dd($data);
      
      return view('user.rida.pilih_periode',[ "name" => "H-Indeks_PKM", 'nama_table'=> $nama_table, 'data' => $data, 'fakultas' => $fakultas, 'tahun' => $tahun]);
      
    }
  
    public function detail_indekspkm($fakultas, $tahun, $periode){
      $nama_table = H_Indeks_PKM::select("nama_table")->distinct()->get();
      $list_sumber = H_Indeks_PKM::select("periode", "sumber_data")->distinct()->where("periode", $periode)->where("tahun_input", $tahun)->get();
      $indekspenelitipkm = H_Indeks_PKM::where([['periode', $periode], ['tahun_input', $tahun]])->get();
      $total_indekspenelitipkm = H_Indeks_PKM::where([['periode', $periode], ['tahun_input', $tahun]])
          ->select(DB::raw('sum(fib_jumlah) as fib,sum(fkip_jumlah) as fkip,sum(feb_jumlah) as feb,sum(fh_jumlah) as fh, sum(fisip_jumlah) as fisip,sum(fk_jumlah) as fk, sum(fp_jumlah) as fp, sum(ft_jumlah) as ft, sum(fmipa_jumlah) as fmipa, sum(fsrd_jumlah) as fsrd, sum(fkor_jumlah) as fkor, sum(sv_jumlah) as sv, sum(pascasarjana_jumlah) as pascasarjana, sum(total_jumlah) as total'))
          ->get();
      $table = $indekspenelitipkm->toArray();
      $table_total = $total_indekspenelitipkm->toArray()[0];
      // dd($table, $table_total);
        return view('user.rida.detail-h-indeks_pkm', [
        'table' => $table,
        'table_total' => $table_total,
        'name' => 'H-Indeks_PKM',
        'tahun' => $tahun,
        'periode'=>$periode,
        'fakultas' => $fakultas, 
        'nama_table' => $nama_table, 
        'list_sumber' => $list_sumber, 
      ]);
    }
    

    public function export($tahun) {
      
      // $indekspenelitipkm = H_Indeks_PKM::where([['tahun_input', $tahun]])->get();
      // $total_indekspenelitipkm = H_Indeks_PKM::where([['tahun_input', $tahun]])
      //     ->select(DB::raw('sum(fib_jumlah) as fib,sum(fkip_jumlah) as fkip,sum(feb_jumlah) as feb,sum(fh_jumlah) as fh, sum(fisip_jumlah) as fisip,sum(fk_jumlah) as fk, sum(fp_jumlah) as fp, sum(ft_jumlah) as ft, sum(fmipa_jumlah) as fmipa, sum(fsrd_jumlah) as fsrd, sum(fkor_jumlah) as fkor, sum(sv_jumlah) as sv, sum(pascasarjana_jumlah) as pascasarjana, sum(total_jumlah) as total'))
      //     ->get();
      // $table = $indekspenelitipkm->toArray();
      // $table_total = $total_indekspenelitipkm->toArray()[0];
      // dd($table, $table_total);
      // $excel = new IndeksPenelitiPKMsExport($table);
      
      return Excel::download(new IndeksPenelitiPKMsExport($tahun), 'Indeks Peneliti PKM.xlsx');
      
      // return Excel::download(new SarjanaExport($fakultas, $tahun), 'KETERLIBATAN DALAM KEGIATAN PENELITIAN DAN PENGABDIAN SARJANA.xlsx');
      // return Excel::download(new DoktoralExport($fakultas, $tahun), 'Usia Produktif Doktoral.xlsx');
    }
}
