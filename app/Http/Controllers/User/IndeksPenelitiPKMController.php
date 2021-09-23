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
    public function pilih_periode_doktor($fakultas, $tahun){
      $fakultas  = $fakultas;
      $tahun  = $tahun;
      $data = UsiaProduktifDoktoral::select('periode', 'tahun_input', 'sumber_data')->distinct()->where('fakultas', $fakultas)->where('tahun_input', $tahun)->get('periode', 'tahun_input', 'sumber_data');
      $nama_table = UsiaProduktifDoktoral::select("nama_table")->distinct()->get();
      
      
      return view('user.rida.pilih_periode',[ "name" => "Tenaga Pendidik Doktor", 'nama_table'=> $nama_table, 'data' => $data, 'fakultas' => $fakultas, 'tahun' => $tahun]);
      
    }
  
    public function detail_doktor($fakultas, $tahun, $periode){
      $fakultas  = $fakultas;
      $tahun  = $tahun;

      $data = UsiaProduktifDoktoral::where([['fakultas', $fakultas], ['periode', $periode], ['tahun_input', $tahun]])->get();

        $sum25sd35_L       = UsiaProduktifDoktoral::where([['fakultas', $fakultas], ['periode', $periode]])->sum('usia25sd35_L');
        $sum25sd35_P       = UsiaProduktifDoktoral::where([['fakultas', $fakultas], ['periode', $periode]])->sum('usia25sd35_P');
        $sum25sd35_jumlah  = UsiaProduktifDoktoral::where([['fakultas', $fakultas], ['periode', $periode]])->sum('usia25sd35_jumlah');

        $sum36sd45_L       = UsiaProduktifDoktoral::where([['fakultas', $fakultas], ['periode', $periode]])->sum('usia36sd45_L');
        $sum36sd45_P       = UsiaProduktifDoktoral::where([['fakultas', $fakultas], ['periode', $periode]])->sum('usia36sd45_P');
        $sum36sd45_jumlah  = UsiaProduktifDoktoral::where([['fakultas', $fakultas], ['periode', $periode]])->sum('usia36sd45_jumlah');

        $sum46sd55_L       = UsiaProduktifDoktoral::where([['fakultas', $fakultas], ['periode', $periode]])->sum('usia46sd55_L');
        $sum46sd55_P       = UsiaProduktifDoktoral::where([['fakultas', $fakultas], ['periode', $periode]])->sum('usia46sd55_P');
        $sum46sd55_jumlah  = UsiaProduktifDoktoral::where([['fakultas', $fakultas], ['periode', $periode]])->sum('usia46sd55_jumlah');

        $sum56sd65_L       = UsiaProduktifDoktoral::where([['fakultas', $fakultas], ['periode', $periode]])->sum('usia56sd65_L');
        $sum56sd65_P       = UsiaProduktifDoktoral::where([['fakultas', $fakultas], ['periode', $periode]])->sum('usia56sd65_P');
        $sum56sd65_jumlah  = UsiaProduktifDoktoral::where([['fakultas', $fakultas], ['periode', $periode]])->sum('usia56sd65_jumlah');
        
        $sum66sd75_L       = UsiaProduktifDoktoral::where([['fakultas', $fakultas], ['periode', $periode]])->sum('usia66sd75_L');
        $sum66sd75_P       = UsiaProduktifDoktoral::where([['fakultas', $fakultas], ['periode', $periode]])->sum('usia66sd75_P');
        $sum66sd75_jumlah  = UsiaProduktifDoktoral::where([['fakultas', $fakultas], ['periode', $periode]])->sum('usia66sd75_jumlah');
        
        $sum75_L       = UsiaProduktifDoktoral::where([['fakultas', $fakultas], ['periode', $periode]])->sum('usia75_L');
        $sum75_P       = UsiaProduktifDoktoral::where([['fakultas', $fakultas], ['periode', $periode]])->sum('usia75_P');
        $sum75_jumlah  = UsiaProduktifDoktoral::where([['fakultas', $fakultas], ['periode', $periode]])->sum('usia75_jumlah');

        $total                  = UsiaProduktifDoktoral::where([['fakultas', $fakultas], ['periode', $periode]])->sum('total');
        $totalsemua             = UsiaProduktifDoktoral::where([['fakultas', 'Universitas Sebelas Maret'], ['periode', $periode]])->sum('total');
        $totalpercent               = $total / $totalsemua * 100;
        $total25_35percent               = $sum25sd35_jumlah / $totalsemua * 100;
        $total36_45percent               = $sum36sd45_jumlah / $totalsemua * 100;
        $total46_55percent               = $sum46sd55_jumlah / $totalsemua * 100;
        $total56_65percent               = $sum56sd65_jumlah / $totalsemua * 100;
        $total66_75percent               = $sum66sd75_jumlah / $totalsemua * 100;
        $total75percent               = $sum75_jumlah / $totalsemua * 100;
        $nama_table = UsiaProduktifDoktoral::select("nama_table")->distinct()->get();

        $list_sumber = UsiaProduktifDoktoral::select("periode", "sumber_data")->distinct()->where("fakultas", $fakultas)->where("tahun_input", $tahun)->get();
      
      
      return view('user.rida.detail',[
        'nama_table'=> $nama_table,
        'name' => 'Tenaga Pendidik Doktor', 'tahun' => $tahun , 'periode'=>$periode, 'data' => $data, 'fakultas' => $fakultas, 
            'sum25sd35_L'=>$sum25sd35_L,'sum25sd35_P'=>$sum25sd35_P, 'sum25sd35_jumlah' => $sum25sd35_jumlah,
            'sum36sd45_L'=>$sum25sd35_L,'sum36sd45_P'=>$sum36sd45_P, 'sum36sd45_jumlah' => $sum36sd45_jumlah,
            'sum46sd55_L'=>$sum25sd35_L,'sum46sd55_P'=>$sum46sd55_P, 'sum46sd55_jumlah' => $sum46sd55_jumlah,
            'sum56sd65_L'=>$sum56sd65_L,'sum56sd65_P'=>$sum56sd65_P, 'sum56sd65_jumlah' => $sum56sd65_jumlah,
            'sum66sd75_L'=>$sum66sd75_L,'sum66sd75_P'=>$sum66sd75_P, 'sum66sd75_jumlah' => $sum66sd75_jumlah,
            'sum75_L'=>$sum75_L,'sum75_P'=>$sum75_P, 'sum75_jumlah' => $sum75_jumlah,
            'total' => $total,  'totalpercent' => $totalpercent, 'totalsemua' => $totalsemua,  "list_sumber" => $list_sumber,
            'total25_35percent' => $total25_35percent,
            'total36_45percent' => $total36_45percent,
            'total46_55percent' => $total46_55percent,
            'total56_65percent' => $total56_65percent,
            'total66_75percent' => $total66_75percent,
            'total75percent' => $total75percent,
       ]);
      
    }
    

    public function export_doktor($fakultas, $tahun) {
      return Excel::download(new DoktoralExport($fakultas, $tahun), 'Usia Produktif Doktoral.xlsx');
    }
}
