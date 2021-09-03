<?php

namespace App\Http\Controllers\User;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\UsiaProduktif\UsiaProduktifDoktoral;
use App\Models\UsiaProduktif\UsiaProduktifMagister;
use App\Models\UsiaProduktif\UsiaProduktifProfesi;
use App\Models\UsiaProduktif\UsiaProduktifSP_1;
use App\Models\UsiaProduktif\UsiaProduktifSP_1k;
use App\Models\UsiaProduktif\UsiaProduktifSP_2;

use App\Models\Kependidikan\PenelitiPengabdiMagister;
use App\Models\Kependidikan\PenelitiPengabdiProfesi;

class TenagaPendidikController extends Controller
{
    public function index(){

      return view('user.rida.index', ['data' => "iki data"]);
    }
    public function doktor(Request $request){
      $list_tahun = UsiaProduktifDoktoral::select("tahun_input")->distinct()->orderBy("tahun_input", "asc")->get();
      if(!$list_tahun->isEmpty()){
        $latest_tahun = $list_tahun[0]->tahun_input;

        $fakultas = "Universitas Sebelas Maret";
        $tahun = $latest_tahun;
        if($request->has("fakultas")){
          $fakultas = $request->input("fakultas");
        }
        if($request->has("tahun")){
          $tahun = $request->input("tahun");      
        }
        $data = UsiaProduktifDoktoral::where("fakultas", $fakultas)->where("tahun_input", $tahun)->get();
        $list_fakultas = UsiaProduktifDoktoral::select("fakultas")->distinct()->where("tahun_input", $tahun)->get();
        $list_sumber = UsiaProduktifDoktoral::select("periode", "sumber_data")->distinct()->where("fakultas", $fakultas)->where("tahun_input", $tahun)->get();
        // dd($list_sumber);
        return view('user.rida.grafik', [
          "name"=> "tenaga-pendidik-doktor",
          "data" => $data, "list_sumber" => $list_sumber, "list_tahun" => $list_tahun, 
          "list_fakultas" => $list_fakultas, "fakultas" => $fakultas, "tahun" => $tahun 
        ]);
      }
      return view('user.rida.grafik', [
        "name"=> "tenaga-pendidik-doktor",
        "data" => [], "list_sumber" => [], "list_tahun" => [], 
        "list_fakultas" => [], "fakultas" => "", "tahun" => "" 
      ]);
      
    }
    public function magister(Request $request){
      $list_tahun = UsiaProduktifMagister::select("tahun_input")->distinct()->orderBy("tahun_input", "asc")->get();
      if(!$list_tahun->isEmpty()){
        $latest_tahun = $list_tahun[0]->tahun_input;

        $fakultas = "Universitas Sebelas Maret";
        $tahun = $latest_tahun;
        if($request->has("fakultas")){
          $fakultas = $request->input("fakultas");
        }
        if($request->has("tahun")){
          $tahun = $request->input("tahun");      
        }
        $data = UsiaProduktifMagister::where("fakultas", $fakultas)->where("tahun_input", $tahun)->get();
        $list_fakultas = UsiaProduktifMagister::select("fakultas")->distinct()->where("tahun_input", $tahun)->get();
        $list_sumber = UsiaProduktifMagister::select("periode", "sumber_data")->distinct()->where("fakultas", $fakultas)->where("tahun_input", $tahun)->get();
        // dd($list_sumber);
        return view('user.rida.grafik', [
          "name"=> "magister",
          "data" => $data, "list_sumber" => $list_sumber, "list_tahun" => $list_tahun, 
          "list_fakultas" => $list_fakultas, "fakultas" => $fakultas, "tahun" => $tahun 
        ]);
      }
      return view('user.rida.grafik', [
        "name"=> "magister",
        "data" => [], "list_sumber" => [], "list_tahun" => [], 
        "list_fakultas" => [], "fakultas" => "", "tahun" => "" 
      ]);
      
    }

    public function spesialis2(Request $request){
      $list_tahun = UsiaProduktifSP_2::select("tahun_input")->distinct()->orderBy("tahun_input", "asc")->get();
      if(!$list_tahun->isEmpty()){
        $latest_tahun = $list_tahun[0]->tahun_input;

        $fakultas = "Universitas Sebelas Maret";
        $tahun = $latest_tahun;
        if($request->has("fakultas")){
          $fakultas = $request->input("fakultas");
        }
        if($request->has("tahun")){
          $tahun = $request->input("tahun");      
        }
        $data = UsiaProduktifSP_2::where("fakultas", $fakultas)->where("tahun_input", $tahun)->get();
        $list_fakultas = UsiaProduktifSP_2::select("fakultas")->distinct()->where("tahun_input", $tahun)->get();
        $list_sumber = UsiaProduktifSP_2::select("periode", "sumber_data")->distinct()->where("fakultas", $fakultas)->where("tahun_input", $tahun)->get();
        // dd($list_sumber);
        return view('user.rida.grafik', [
          "name"=> "spesialis-2",
          "data" => $data, "list_sumber" => $list_sumber, "list_tahun" => $list_tahun, 
          "list_fakultas" => $list_fakultas, "fakultas" => $fakultas, "tahun" => $tahun 
        ]);
      }
      return view('user.rida.grafik', [
        "name"=> "spesialis-2",
        "data" => [], "list_sumber" => [], "list_tahun" => [], 
        "list_fakultas" => [], "fakultas" => "", "tahun" => "" 
      ]);
      
    }

    public function profesi(Request $request){
      $list_tahun = UsiaProduktifProfesi::select("tahun_input")->distinct()->orderBy("tahun_input", "asc")->get();
      if(!$list_tahun->isEmpty()){
        $latest_tahun = $list_tahun[0]->tahun_input;

        $fakultas = "Universitas Sebelas Maret";
        $tahun = $latest_tahun;
        if($request->has("fakultas")){
          $fakultas = $request->input("fakultas");
        }
        if($request->has("tahun")){
          $tahun = $request->input("tahun");      
        }
        $data = UsiaProduktifProfesi::where("fakultas", $fakultas)->where("tahun_input", $tahun)->get();
        $list_fakultas = UsiaProduktifProfesi::select("fakultas")->distinct()->where("tahun_input", $tahun)->get();
        $list_sumber = UsiaProduktifProfesi::select("periode", "sumber_data")->distinct()->where("fakultas", $fakultas)->where("tahun_input", $tahun)->get();
        // dd($list_sumber);
        return view('user.rida.grafik', [
          "name"=> "profesi",
          "data" => $data, "list_sumber" => $list_sumber, "list_tahun" => $list_tahun, 
          "list_fakultas" => $list_fakultas, "fakultas" => $fakultas, "tahun" => $tahun 
        ]);
      }
      return view('user.rida.grafik', [
        "name"=> "profesi",
        "data" => [], "list_sumber" => [], "list_tahun" => [], 
        "list_fakultas" => [], "fakultas" => "", "tahun" => "" 
      ]);
      
    }

    public function spesialis1(Request $request){
      $list_tahun = UsiaProduktifSP_1::select("tahun_input")->distinct()->orderBy("tahun_input", "asc")->get();
      if(!$list_tahun->isEmpty()){
        $latest_tahun = $list_tahun[0]->tahun_input;

        $fakultas = "Universitas Sebelas Maret";
        $tahun = $latest_tahun;
        if($request->has("fakultas")){
          $fakultas = $request->input("fakultas");
        }
        if($request->has("tahun")){
          $tahun = $request->input("tahun");      
        }
        $data = UsiaProduktifSP_1::where("fakultas", $fakultas)->where("tahun_input", $tahun)->get();
        $list_fakultas = UsiaProduktifSP_1::select("fakultas")->distinct()->where("tahun_input", $tahun)->get();
        $list_sumber = UsiaProduktifSP_1::select("periode", "sumber_data")->distinct()->where("fakultas", $fakultas)->where("tahun_input", $tahun)->get();
        // dd($list_sumber);
        return view('user.rida.grafik', [
          "name"=> "spesialis-1",
          "data" => $data, "list_sumber" => $list_sumber, "list_tahun" => $list_tahun, 
          "list_fakultas" => $list_fakultas, "fakultas" => $fakultas, "tahun" => $tahun 
        ]);
      }
      return view('user.rida.grafik', [
        "name"=> "spesialis-1",
        "data" => [], "list_sumber" => [], "list_tahun" => [], 
        "list_fakultas" => [], "fakultas" => "", "tahun" => "" 
      ]);
      
    }

    public function spesialisKonsultan(Request $request){
      $list_tahun = UsiaProduktifSP_1k::select("tahun_input")->distinct()->orderBy("tahun_input", "asc")->get();
      if(!$list_tahun->isEmpty()){
        $latest_tahun = $list_tahun[0]->tahun_input;

        $fakultas = "Universitas Sebelas Maret";
        $tahun = $latest_tahun;
        if($request->has("fakultas")){
          $fakultas = $request->input("fakultas");
        }
        if($request->has("tahun")){
          $tahun = $request->input("tahun");      
        }
        $data = UsiaProduktifSP_1k::where("fakultas", $fakultas)->where("tahun_input", $tahun)->get();
        $list_fakultas = UsiaProduktifSP_1k::select("fakultas")->distinct()->where("tahun_input", $tahun)->get();
        $list_sumber = UsiaProduktifSP_1k::select("periode", "sumber_data")->distinct()->where("fakultas", $fakultas)->where("tahun_input", $tahun)->get();
        // dd($list_sumber);
        return view('user.rida.grafik', [
          "name"=> "spesialis-konsultan",
          "data" => $data, "list_sumber" => $list_sumber, "list_tahun" => $list_tahun, 
          "list_fakultas" => $list_fakultas, "fakultas" => $fakultas, "tahun" => $tahun 
        ]);
      }
      return view('user.rida.grafik', [
        "name"=> "spesialis-konsultan",
        "data" => [], "list_sumber" => [], "list_tahun" => [], 
        "list_fakultas" => [], "fakultas" => "", "tahun" => "" 
      ]);
      
    }
//detail rida grafik 1-6
    public function pilih_periode_doktor($fakultas, $tahun){
      $fakultas  = $fakultas;
      $tahun  = $tahun;
      $data = UsiaProduktifDoktoral::select('periode', 'tahun_input', 'sumber_data')->distinct()->where('fakultas', $fakultas)->get('periode', 'tahun_input', 'sumber_data');

       return view('user.rida.pilih_periode',[ "name" => "tenaga-pendidik-doktor", 'data' => $data, 'fakultas' => $fakultas, 'tahun' => $tahun]);
      
    }
    public function pilih_periode_magister($fakultas, $tahun){
      $fakultas  = $fakultas;
      $tahun  = $tahun;
      $data = UsiaProduktifMagister::select('periode', 'tahun_input', 'sumber_data')->distinct()->where('fakultas', $fakultas)->get('periode', 'tahun_input', 'sumber_data');

       return view('user.rida.pilih_periode',[ "name" => "tenaga-pendidik-magister", 'data' => $data, 'fakultas' => $fakultas, 'tahun' => $tahun]);
      
    }
    public function pilih_periode_sp_2($fakultas, $tahun){
      $fakultas  = $fakultas;
      $tahun  = $tahun;
      $data = UsiaProduktifSP_2::select('periode', 'tahun_input', 'sumber_data')->distinct()->where('fakultas', $fakultas)->get('periode', 'tahun_input', 'sumber_data');

       return view('user.rida.pilih_periode',[ "name" => "tenaga-pendidik-spesialis-2", 'data' => $data, 'fakultas' => $fakultas, 'tahun' => $tahun]);
      
    }
    public function pilih_periode_konsultan($fakultas, $tahun){
      $fakultas  = $fakultas;
      $tahun  = $tahun;
      $data = UsiaProduktifSP_1k::select('periode', 'tahun_input', 'sumber_data')->distinct()->where('fakultas', $fakultas)->get('periode', 'tahun_input', 'sumber_data');

       return view('user.rida.pilih_periode',[ "name" => "tenaga-pendidik-spesialis-konsultan", 'data' => $data, 'fakultas' => $fakultas, 'tahun' => $tahun]);
      
    }
    public function pilih_periode_sp_1($fakultas, $tahun){
      $fakultas  = $fakultas;
      $tahun  = $tahun;
      $data = UsiaProduktifSP_1::select('periode', 'tahun_input', 'sumber_data')->distinct()->where('fakultas', $fakultas)->get('periode', 'tahun_input', 'sumber_data');

       return view('user.rida.pilih_periode',[ "name" => "tenaga-pendidik-spesialis-1", 'data' => $data, 'fakultas' => $fakultas, 'tahun' => $tahun]);
      
    }

    public function pilih_periode_profesi($fakultas, $tahun){
      $fakultas  = $fakultas;
      $tahun  = $tahun;
      $data = UsiaProduktifProfesi::select('periode', 'tahun_input', 'sumber_data')->distinct()->where('fakultas', $fakultas)->get('periode', 'tahun_input', 'sumber_data');

       return view('user.rida.pilih_periode',[ "name" => "tenaga-pendidik-profesi", 'data' => $data, 'fakultas' => $fakultas, 'tahun' => $tahun]);
      
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

       return view('user.rida.detail',[
            'name' => 'tenaga-pendidik-doktor', 'tahun' => $tahun , 'periode'=>$periode, 'data' => $data, 'fakultas' => $fakultas, 
            'sum25sd35_L'=>$sum25sd35_L,'sum25sd35_P'=>$sum25sd35_P, 'sum25sd35_jumlah' => $sum25sd35_jumlah,
            'sum36sd45_L'=>$sum25sd35_L,'sum36sd45_P'=>$sum36sd45_P, 'sum36sd45_jumlah' => $sum36sd45_jumlah,
            'sum46sd55_L'=>$sum25sd35_L,'sum46sd55_P'=>$sum46sd55_P, 'sum46sd55_jumlah' => $sum46sd55_jumlah,
            'sum56sd65_L'=>$sum56sd65_L,'sum56sd65_P'=>$sum56sd65_P, 'sum56sd65_jumlah' => $sum56sd65_jumlah,
            'sum66sd75_L'=>$sum66sd75_L,'sum66sd75_P'=>$sum66sd75_P, 'sum66sd75_jumlah' => $sum66sd75_jumlah,
            'sum75_L'=>$sum75_L,'sum75_P'=>$sum75_P, 'sum75_jumlah' => $sum75_jumlah,
            'total' => $total,  'totalpercent' => $totalpercent, 'totalsemua' => $totalsemua,
       ]);
      
    }
    public function detail_magister($fakultas, $tahun, $periode){
      $fakultas  = $fakultas;
      $tahun  = $tahun;

      $data = UsiaProduktifMagister::where([['fakultas', $fakultas], ['periode', $periode], ['tahun_input', $tahun]])->get();

        $sum25sd35_L       = UsiaProduktifMagister::where([['fakultas', $fakultas], ['periode', $periode]])->sum('usia25sd35_L');
        $sum25sd35_P       = UsiaProduktifMagister::where([['fakultas', $fakultas], ['periode', $periode]])->sum('usia25sd35_P');
        $sum25sd35_jumlah  = UsiaProduktifMagister::where([['fakultas', $fakultas], ['periode', $periode]])->sum('usia25sd35_jumlah');

        $sum36sd45_L       = UsiaProduktifMagister::where([['fakultas', $fakultas], ['periode', $periode]])->sum('usia36sd45_L');
        $sum36sd45_P       = UsiaProduktifMagister::where([['fakultas', $fakultas], ['periode', $periode]])->sum('usia36sd45_P');
        $sum36sd45_jumlah  = UsiaProduktifMagister::where([['fakultas', $fakultas], ['periode', $periode]])->sum('usia36sd45_jumlah');

        $sum46sd55_L       = UsiaProduktifMagister::where([['fakultas', $fakultas], ['periode', $periode]])->sum('usia46sd55_L');
        $sum46sd55_P       = UsiaProduktifMagister::where([['fakultas', $fakultas], ['periode', $periode]])->sum('usia46sd55_P');
        $sum46sd55_jumlah  = UsiaProduktifMagister::where([['fakultas', $fakultas], ['periode', $periode]])->sum('usia46sd55_jumlah');

        $sum56sd65_L       = UsiaProduktifMagister::where([['fakultas', $fakultas], ['periode', $periode]])->sum('usia56sd65_L');
        $sum56sd65_P       = UsiaProduktifMagister::where([['fakultas', $fakultas], ['periode', $periode]])->sum('usia56sd65_P');
        $sum56sd65_jumlah  = UsiaProduktifMagister::where([['fakultas', $fakultas], ['periode', $periode]])->sum('usia56sd65_jumlah');
        
        $sum66sd75_L       = UsiaProduktifMagister::where([['fakultas', $fakultas], ['periode', $periode]])->sum('usia66sd75_L');
        $sum66sd75_P       = UsiaProduktifMagister::where([['fakultas', $fakultas], ['periode', $periode]])->sum('usia66sd75_P');
        $sum66sd75_jumlah  = UsiaProduktifMagister::where([['fakultas', $fakultas], ['periode', $periode]])->sum('usia66sd75_jumlah');
        
        $sum75_L       = UsiaProduktifMagister::where([['fakultas', $fakultas], ['periode', $periode]])->sum('usia75_L');
        $sum75_P       = UsiaProduktifMagister::where([['fakultas', $fakultas], ['periode', $periode]])->sum('usia75_P');
        $sum75_jumlah  = UsiaProduktifMagister::where([['fakultas', $fakultas], ['periode', $periode]])->sum('usia75_jumlah');

        $total                  = UsiaProduktifMagister::where([['fakultas', $fakultas], ['periode', $periode]])->sum('total');
        $totalsemua             = UsiaProduktifMagister::where([['fakultas', 'Universitas Sebelas Maret'], ['periode', $periode]])->sum('total');
        $totalpercent               = $total / $totalsemua * 100;

       return view('user.rida.detail',[
            'name' => 'tenaga-pendidik-magister', 'tahun' => $tahun , 'periode'=>$periode, 'data' => $data, 'fakultas' => $fakultas, 
            'sum25sd35_L'=>$sum25sd35_L,'sum25sd35_P'=>$sum25sd35_P, 'sum25sd35_jumlah' => $sum25sd35_jumlah,
            'sum36sd45_L'=>$sum25sd35_L,'sum36sd45_P'=>$sum36sd45_P, 'sum36sd45_jumlah' => $sum36sd45_jumlah,
            'sum46sd55_L'=>$sum25sd35_L,'sum46sd55_P'=>$sum46sd55_P, 'sum46sd55_jumlah' => $sum46sd55_jumlah,
            'sum56sd65_L'=>$sum56sd65_L,'sum56sd65_P'=>$sum56sd65_P, 'sum56sd65_jumlah' => $sum56sd65_jumlah,
            'sum66sd75_L'=>$sum66sd75_L,'sum66sd75_P'=>$sum66sd75_P, 'sum66sd75_jumlah' => $sum66sd75_jumlah,
            'sum75_L'=>$sum75_L,'sum75_P'=>$sum75_P, 'sum75_jumlah' => $sum75_jumlah,
            'total' => $total,  'totalpercent' => $totalpercent, 'totalsemua' => $totalsemua,
       ]);
      
    }

    public function detail_sp_2($fakultas, $tahun, $periode){
      $fakultas  = $fakultas;
      $tahun  = $tahun;

      $data = UsiaProduktifSP_2::where([['fakultas', $fakultas], ['periode', $periode], ['tahun_input', $tahun]])->get();

        $sum25sd35_L       = UsiaProduktifSP_2::where([['fakultas', $fakultas], ['periode', $periode]])->sum('usia25sd35_L');
        $sum25sd35_P       = UsiaProduktifSP_2::where([['fakultas', $fakultas], ['periode', $periode]])->sum('usia25sd35_P');
        $sum25sd35_jumlah  = UsiaProduktifSP_2::where([['fakultas', $fakultas], ['periode', $periode]])->sum('usia25sd35_jumlah');

        $sum36sd45_L       = UsiaProduktifSP_2::where([['fakultas', $fakultas], ['periode', $periode]])->sum('usia36sd45_L');
        $sum36sd45_P       = UsiaProduktifSP_2::where([['fakultas', $fakultas], ['periode', $periode]])->sum('usia36sd45_P');
        $sum36sd45_jumlah  = UsiaProduktifSP_2::where([['fakultas', $fakultas], ['periode', $periode]])->sum('usia36sd45_jumlah');

        $sum46sd55_L       = UsiaProduktifSP_2::where([['fakultas', $fakultas], ['periode', $periode]])->sum('usia46sd55_L');
        $sum46sd55_P       = UsiaProduktifSP_2::where([['fakultas', $fakultas], ['periode', $periode]])->sum('usia46sd55_P');
        $sum46sd55_jumlah  = UsiaProduktifSP_2::where([['fakultas', $fakultas], ['periode', $periode]])->sum('usia46sd55_jumlah');

        $sum56sd65_L       = UsiaProduktifSP_2::where([['fakultas', $fakultas], ['periode', $periode]])->sum('usia56sd65_L');
        $sum56sd65_P       = UsiaProduktifSP_2::where([['fakultas', $fakultas], ['periode', $periode]])->sum('usia56sd65_P');
        $sum56sd65_jumlah  = UsiaProduktifSP_2::where([['fakultas', $fakultas], ['periode', $periode]])->sum('usia56sd65_jumlah');
        
        $sum66sd75_L       = UsiaProduktifSP_2::where([['fakultas', $fakultas], ['periode', $periode]])->sum('usia66sd75_L');
        $sum66sd75_P       = UsiaProduktifSP_2::where([['fakultas', $fakultas], ['periode', $periode]])->sum('usia66sd75_P');
        $sum66sd75_jumlah  = UsiaProduktifSP_2::where([['fakultas', $fakultas], ['periode', $periode]])->sum('usia66sd75_jumlah');
        
        $sum75_L       = UsiaProduktifSP_2::where([['fakultas', $fakultas], ['periode', $periode]])->sum('usia75_L');
        $sum75_P       = UsiaProduktifSP_2::where([['fakultas', $fakultas], ['periode', $periode]])->sum('usia75_P');
        $sum75_jumlah  = UsiaProduktifSP_2::where([['fakultas', $fakultas], ['periode', $periode]])->sum('usia75_jumlah');

        $total                  = UsiaProduktifSP_2::where([['fakultas', $fakultas], ['periode', $periode]])->sum('total');
        $totalsemua             = UsiaProduktifSP_2::where([['fakultas', 'Universitas Sebelas Maret'], ['periode', $periode]])->sum('total');
        $totalpercent               = $total / $totalsemua * 100;

       return view('user.rida.detail',[
            'name' => 'tenaga-pendidik-sp-2', 'tahun' => $tahun , 'periode'=>$periode, 'data' => $data, 'fakultas' => $fakultas, 
            'sum25sd35_L'=>$sum25sd35_L,'sum25sd35_P'=>$sum25sd35_P, 'sum25sd35_jumlah' => $sum25sd35_jumlah,
            'sum36sd45_L'=>$sum25sd35_L,'sum36sd45_P'=>$sum36sd45_P, 'sum36sd45_jumlah' => $sum36sd45_jumlah,
            'sum46sd55_L'=>$sum25sd35_L,'sum46sd55_P'=>$sum46sd55_P, 'sum46sd55_jumlah' => $sum46sd55_jumlah,
            'sum56sd65_L'=>$sum56sd65_L,'sum56sd65_P'=>$sum56sd65_P, 'sum56sd65_jumlah' => $sum56sd65_jumlah,
            'sum66sd75_L'=>$sum66sd75_L,'sum66sd75_P'=>$sum66sd75_P, 'sum66sd75_jumlah' => $sum66sd75_jumlah,
            'sum75_L'=>$sum75_L,'sum75_P'=>$sum75_P, 'sum75_jumlah' => $sum75_jumlah,
            'total' => $total,  'totalpercent' => $totalpercent, 'totalsemua' => $totalsemua,
       ]);
      
    }

    public function detail_konsultan($fakultas, $tahun, $periode){
      $fakultas  = $fakultas;
      $tahun  = $tahun;

      $data = UsiaProduktifSP_1k::where([['fakultas', $fakultas], ['periode', $periode], ['tahun_input', $tahun]])->get();

        $sum25sd35_L       = UsiaProduktifSP_1k::where([['fakultas', $fakultas], ['periode', $periode]])->sum('usia25sd35_L');
        $sum25sd35_P       = UsiaProduktifSP_1k::where([['fakultas', $fakultas], ['periode', $periode]])->sum('usia25sd35_P');
        $sum25sd35_jumlah  = UsiaProduktifSP_1k::where([['fakultas', $fakultas], ['periode', $periode]])->sum('usia25sd35_jumlah');

        $sum36sd45_L       = UsiaProduktifSP_1k::where([['fakultas', $fakultas], ['periode', $periode]])->sum('usia36sd45_L');
        $sum36sd45_P       = UsiaProduktifSP_1k::where([['fakultas', $fakultas], ['periode', $periode]])->sum('usia36sd45_P');
        $sum36sd45_jumlah  = UsiaProduktifSP_1k::where([['fakultas', $fakultas], ['periode', $periode]])->sum('usia36sd45_jumlah');

        $sum46sd55_L       = UsiaProduktifSP_1k::where([['fakultas', $fakultas], ['periode', $periode]])->sum('usia46sd55_L');
        $sum46sd55_P       = UsiaProduktifSP_1k::where([['fakultas', $fakultas], ['periode', $periode]])->sum('usia46sd55_P');
        $sum46sd55_jumlah  = UsiaProduktifSP_1k::where([['fakultas', $fakultas], ['periode', $periode]])->sum('usia46sd55_jumlah');

        $sum56sd65_L       = UsiaProduktifSP_1k::where([['fakultas', $fakultas], ['periode', $periode]])->sum('usia56sd65_L');
        $sum56sd65_P       = UsiaProduktifSP_1k::where([['fakultas', $fakultas], ['periode', $periode]])->sum('usia56sd65_P');
        $sum56sd65_jumlah  = UsiaProduktifSP_1k::where([['fakultas', $fakultas], ['periode', $periode]])->sum('usia56sd65_jumlah');
        
        $sum66sd75_L       = UsiaProduktifSP_1k::where([['fakultas', $fakultas], ['periode', $periode]])->sum('usia66sd75_L');
        $sum66sd75_P       = UsiaProduktifSP_1k::where([['fakultas', $fakultas], ['periode', $periode]])->sum('usia66sd75_P');
        $sum66sd75_jumlah  = UsiaProduktifSP_1k::where([['fakultas', $fakultas], ['periode', $periode]])->sum('usia66sd75_jumlah');
        
        $sum75_L       = UsiaProduktifSP_1k::where([['fakultas', $fakultas], ['periode', $periode]])->sum('usia75_L');
        $sum75_P       = UsiaProduktifSP_1k::where([['fakultas', $fakultas], ['periode', $periode]])->sum('usia75_P');
        $sum75_jumlah  = UsiaProduktifSP_1k::where([['fakultas', $fakultas], ['periode', $periode]])->sum('usia75_jumlah');

        $total                  = UsiaProduktifSP_1k::where([['fakultas', $fakultas], ['periode', $periode]])->sum('total');
        $totalsemua             = UsiaProduktifSP_1k::where([['fakultas', 'Universitas Sebelas Maret'], ['periode', $periode]])->sum('total');
        $totalpercent               = $total / $totalsemua * 100;

       return view('user.rida.detail',[
            'name' => 'Tenaga-Pendidik-SP-1(K)', 'tahun' => $tahun , 'periode'=>$periode, 'data' => $data, 'fakultas' => $fakultas, 
            'sum25sd35_L'=>$sum25sd35_L,'sum25sd35_P'=>$sum25sd35_P, 'sum25sd35_jumlah' => $sum25sd35_jumlah,
            'sum36sd45_L'=>$sum25sd35_L,'sum36sd45_P'=>$sum36sd45_P, 'sum36sd45_jumlah' => $sum36sd45_jumlah,
            'sum46sd55_L'=>$sum25sd35_L,'sum46sd55_P'=>$sum46sd55_P, 'sum46sd55_jumlah' => $sum46sd55_jumlah,
            'sum56sd65_L'=>$sum56sd65_L,'sum56sd65_P'=>$sum56sd65_P, 'sum56sd65_jumlah' => $sum56sd65_jumlah,
            'sum66sd75_L'=>$sum66sd75_L,'sum66sd75_P'=>$sum66sd75_P, 'sum66sd75_jumlah' => $sum66sd75_jumlah,
            'sum75_L'=>$sum75_L,'sum75_P'=>$sum75_P, 'sum75_jumlah' => $sum75_jumlah,
            'total' => $total,  'totalpercent' => $totalpercent, 'totalsemua' => $totalsemua,
       ]);
      
    }

    public function detail_sp_1($fakultas, $tahun, $periode){
      $fakultas  = $fakultas;
      $tahun  = $tahun;

      $data = UsiaProduktifSP_1::where([['fakultas', $fakultas], ['periode', $periode], ['tahun_input', $tahun]])->get();

        $sum25sd35_L       = UsiaProduktifSP_1::where([['fakultas', $fakultas], ['periode', $periode]])->sum('usia25sd35_L');
        $sum25sd35_P       = UsiaProduktifSP_1::where([['fakultas', $fakultas], ['periode', $periode]])->sum('usia25sd35_P');
        $sum25sd35_jumlah  = UsiaProduktifSP_1::where([['fakultas', $fakultas], ['periode', $periode]])->sum('usia25sd35_jumlah');

        $sum36sd45_L       = UsiaProduktifSP_1::where([['fakultas', $fakultas], ['periode', $periode]])->sum('usia36sd45_L');
        $sum36sd45_P       = UsiaProduktifSP_1::where([['fakultas', $fakultas], ['periode', $periode]])->sum('usia36sd45_P');
        $sum36sd45_jumlah  = UsiaProduktifSP_1::where([['fakultas', $fakultas], ['periode', $periode]])->sum('usia36sd45_jumlah');

        $sum46sd55_L       = UsiaProduktifSP_1::where([['fakultas', $fakultas], ['periode', $periode]])->sum('usia46sd55_L');
        $sum46sd55_P       = UsiaProduktifSP_1::where([['fakultas', $fakultas], ['periode', $periode]])->sum('usia46sd55_P');
        $sum46sd55_jumlah  = UsiaProduktifSP_1::where([['fakultas', $fakultas], ['periode', $periode]])->sum('usia46sd55_jumlah');

        $sum56sd65_L       = UsiaProduktifSP_1::where([['fakultas', $fakultas], ['periode', $periode]])->sum('usia56sd65_L');
        $sum56sd65_P       = UsiaProduktifSP_1::where([['fakultas', $fakultas], ['periode', $periode]])->sum('usia56sd65_P');
        $sum56sd65_jumlah  = UsiaProduktifSP_1::where([['fakultas', $fakultas], ['periode', $periode]])->sum('usia56sd65_jumlah');
        
        $sum66sd75_L       = UsiaProduktifSP_1::where([['fakultas', $fakultas], ['periode', $periode]])->sum('usia66sd75_L');
        $sum66sd75_P       = UsiaProduktifSP_1::where([['fakultas', $fakultas], ['periode', $periode]])->sum('usia66sd75_P');
        $sum66sd75_jumlah  = UsiaProduktifSP_1::where([['fakultas', $fakultas], ['periode', $periode]])->sum('usia66sd75_jumlah');
        
        $sum75_L       = UsiaProduktifSP_1::where([['fakultas', $fakultas], ['periode', $periode]])->sum('usia75_L');
        $sum75_P       = UsiaProduktifSP_1::where([['fakultas', $fakultas], ['periode', $periode]])->sum('usia75_P');
        $sum75_jumlah  = UsiaProduktifSP_1::where([['fakultas', $fakultas], ['periode', $periode]])->sum('usia75_jumlah');

        $total                  = UsiaProduktifSP_1::where([['fakultas', $fakultas], ['periode', $periode]])->sum('total');
        $totalsemua             = UsiaProduktifSP_1::where([['fakultas', 'Universitas Sebelas Maret'], ['periode', $periode]])->sum('total');
        $totalpercent               = $total / $totalsemua * 100;

       return view('user.rida.detail',[
            'name' => 'Tenaga-Pendidik-SP-1', 'tahun' => $tahun , 'periode'=>$periode, 'data' => $data, 'fakultas' => $fakultas, 
            'sum25sd35_L'=>$sum25sd35_L,'sum25sd35_P'=>$sum25sd35_P, 'sum25sd35_jumlah' => $sum25sd35_jumlah,
            'sum36sd45_L'=>$sum25sd35_L,'sum36sd45_P'=>$sum36sd45_P, 'sum36sd45_jumlah' => $sum36sd45_jumlah,
            'sum46sd55_L'=>$sum25sd35_L,'sum46sd55_P'=>$sum46sd55_P, 'sum46sd55_jumlah' => $sum46sd55_jumlah,
            'sum56sd65_L'=>$sum56sd65_L,'sum56sd65_P'=>$sum56sd65_P, 'sum56sd65_jumlah' => $sum56sd65_jumlah,
            'sum66sd75_L'=>$sum66sd75_L,'sum66sd75_P'=>$sum66sd75_P, 'sum66sd75_jumlah' => $sum66sd75_jumlah,
            'sum75_L'=>$sum75_L,'sum75_P'=>$sum75_P, 'sum75_jumlah' => $sum75_jumlah,
            'total' => $total,  'totalpercent' => $totalpercent, 'totalsemua' => $totalsemua,
       ]);
      
    }

    public function detail_profesi($fakultas, $tahun, $periode){
      $fakultas  = $fakultas;
      $tahun  = $tahun;

      $data = UsiaProduktifProfesi::where([['fakultas', $fakultas], ['periode', $periode], ['tahun_input', $tahun]])->get();

        $sum25sd35_L       = UsiaProduktifProfesi::where([['fakultas', $fakultas], ['periode', $periode]])->sum('usia25sd35_L');
        $sum25sd35_P       = UsiaProduktifProfesi::where([['fakultas', $fakultas], ['periode', $periode]])->sum('usia25sd35_P');
        $sum25sd35_jumlah  = UsiaProduktifProfesi::where([['fakultas', $fakultas], ['periode', $periode]])->sum('usia25sd35_jumlah');

        $sum36sd45_L       = UsiaProduktifProfesi::where([['fakultas', $fakultas], ['periode', $periode]])->sum('usia36sd45_L');
        $sum36sd45_P       = UsiaProduktifProfesi::where([['fakultas', $fakultas], ['periode', $periode]])->sum('usia36sd45_P');
        $sum36sd45_jumlah  = UsiaProduktifProfesi::where([['fakultas', $fakultas], ['periode', $periode]])->sum('usia36sd45_jumlah');

        $sum46sd55_L       = UsiaProduktifProfesi::where([['fakultas', $fakultas], ['periode', $periode]])->sum('usia46sd55_L');
        $sum46sd55_P       = UsiaProduktifProfesi::where([['fakultas', $fakultas], ['periode', $periode]])->sum('usia46sd55_P');
        $sum46sd55_jumlah  = UsiaProduktifProfesi::where([['fakultas', $fakultas], ['periode', $periode]])->sum('usia46sd55_jumlah');

        $sum56sd65_L       = UsiaProduktifProfesi::where([['fakultas', $fakultas], ['periode', $periode]])->sum('usia56sd65_L');
        $sum56sd65_P       = UsiaProduktifProfesi::where([['fakultas', $fakultas], ['periode', $periode]])->sum('usia56sd65_P');
        $sum56sd65_jumlah  = UsiaProduktifProfesi::where([['fakultas', $fakultas], ['periode', $periode]])->sum('usia56sd65_jumlah');
        
        $sum66sd75_L       = UsiaProduktifProfesi::where([['fakultas', $fakultas], ['periode', $periode]])->sum('usia66sd75_L');
        $sum66sd75_P       = UsiaProduktifProfesi::where([['fakultas', $fakultas], ['periode', $periode]])->sum('usia66sd75_P');
        $sum66sd75_jumlah  = UsiaProduktifProfesi::where([['fakultas', $fakultas], ['periode', $periode]])->sum('usia66sd75_jumlah');
        
        $sum75_L       = UsiaProduktifProfesi::where([['fakultas', $fakultas], ['periode', $periode]])->sum('usia75_L');
        $sum75_P       = UsiaProduktifProfesi::where([['fakultas', $fakultas], ['periode', $periode]])->sum('usia75_P');
        $sum75_jumlah  = UsiaProduktifProfesi::where([['fakultas', $fakultas], ['periode', $periode]])->sum('usia75_jumlah');

        $total                  = UsiaProduktifProfesi::where([['fakultas', $fakultas], ['periode', $periode]])->sum('total');
        $totalsemua             = UsiaProduktifProfesi::where([['fakultas', 'Universitas Sebelas Maret'], ['periode', $periode]])->sum('total');
        $totalpercent               = $total / $totalsemua * 100;

       return view('user.rida.detail',[
            'name' => 'Tenaga-Pendidik-Profesi', 'tahun' => $tahun , 'periode'=>$periode, 'data' => $data, 'fakultas' => $fakultas, 
            'sum25sd35_L'=>$sum25sd35_L,'sum25sd35_P'=>$sum25sd35_P, 'sum25sd35_jumlah' => $sum25sd35_jumlah,
            'sum36sd45_L'=>$sum25sd35_L,'sum36sd45_P'=>$sum36sd45_P, 'sum36sd45_jumlah' => $sum36sd45_jumlah,
            'sum46sd55_L'=>$sum25sd35_L,'sum46sd55_P'=>$sum46sd55_P, 'sum46sd55_jumlah' => $sum46sd55_jumlah,
            'sum56sd65_L'=>$sum56sd65_L,'sum56sd65_P'=>$sum56sd65_P, 'sum56sd65_jumlah' => $sum56sd65_jumlah,
            'sum66sd75_L'=>$sum66sd75_L,'sum66sd75_P'=>$sum66sd75_P, 'sum66sd75_jumlah' => $sum66sd75_jumlah,
            'sum75_L'=>$sum75_L,'sum75_P'=>$sum75_P, 'sum75_jumlah' => $sum75_jumlah,
            'total' => $total,  'totalpercent' => $totalpercent, 'totalsemua' => $totalsemua,
       ]);
      
    }
}
