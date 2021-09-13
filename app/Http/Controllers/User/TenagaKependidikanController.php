<?php

namespace App\Http\Controllers\User;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Kependidikan\PenelitiPengabdiMagister;
use App\Models\Kependidikan\PenelitiPengabdiProfesi;
use App\Models\Kependidikan\PenelitiPengabdiSarjana;
use App\Models\Kependidikan\PenelitiPengabdiDiploma4;
use App\Models\Kependidikan\PenelitiPengabdiDiploma3;
use App\Models\Kependidikan\PenelitiPengabdiDiploma2;
use App\Models\Kependidikan\PenelitiPengabdiDiploma1;
use App\Models\Kependidikan\PenelitiPengabdiSLTA;
use App\Models\Kependidikan\PenelitiPengabdiSltp;
use App\Models\Kependidikan\PenelitiPengabdiSd;

class TenagaKependidikanController extends Controller
{
    public function index(){

      return view('user.rida.index', ['data' => "iki data"]);
    }
    
    public function magister(Request $request){
      $list_tahun = PenelitiPengabdiMagister::select("tahun_input")->distinct()->orderBy("tahun_input", "asc")->get();
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
        $data = PenelitiPengabdiMagister::where("fakultas", $fakultas)->where("tahun_input", $tahun)->get();
        $list_fakultas = PenelitiPengabdiMagister::select("fakultas")->distinct()->where("tahun_input", $tahun)->get();
        $list_sumber = PenelitiPengabdiMagister::select("periode", "sumber_data")->distinct()->where("fakultas", $fakultas)->where("tahun_input", $tahun)->get();
        // dd($list_sumber);
        return view('user.rida.grafik', [
          "name"=> "Tenaga Kependidikan Magister",
          "data" => $data, "list_sumber" => $list_sumber, "list_tahun" => $list_tahun, 
          "list_fakultas" => $list_fakultas, "fakultas" => $fakultas, "tahun" => $tahun 
        ]);
      }
      return view('user.rida.grafik', [
        "name"=> "Tenaga Kependidikan Magister",
        "data" => [], "list_sumber" => [], "list_tahun" => [], 
        "list_fakultas" => [], "fakultas" => "", "tahun" => "" 
      ]);
      
    }

    public function profesi(Request $request){
      $list_tahun = PenelitiPengabdiProfesi::select("tahun_input")->distinct()->orderBy("tahun_input", "asc")->get();
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
        $data = PenelitiPengabdiProfesi::where("fakultas", $fakultas)->where("tahun_input", $tahun)->get();
        $list_fakultas = PenelitiPengabdiProfesi::select("fakultas")->distinct()->where("tahun_input", $tahun)->get();
        $list_sumber = PenelitiPengabdiProfesi::select("periode", "sumber_data")->distinct()->where("fakultas", $fakultas)->where("tahun_input", $tahun)->get();
        // dd($list_sumber);
        return view('user.rida.grafik', [
          "name"=> "Tenaga Kependidikan Profesi",
          "data" => $data, "list_sumber" => $list_sumber, "list_tahun" => $list_tahun, 
          "list_fakultas" => $list_fakultas, "fakultas" => $fakultas, "tahun" => $tahun 
        ]);
      }
      return view('user.rida.grafik', [
        "name"=> "Tenaga Kependidikan Profesi",
        "data" => [], "list_sumber" => [], "list_tahun" => [], 
        "list_fakultas" => [], "fakultas" => "", "tahun" => "" 
      ]);
      
    }

    public function sarjana(Request $request){
      $list_tahun = PenelitiPengabdiSarjana::select("tahun_input")->distinct()->orderBy("tahun_input", "asc")->get();
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
        $data = PenelitiPengabdiSarjana::where("fakultas", $fakultas)->where("tahun_input", $tahun)->get();
        $list_fakultas = PenelitiPengabdiSarjana::select("fakultas")->distinct()->where("tahun_input", $tahun)->get();
        $list_sumber = PenelitiPengabdiSarjana::select("periode", "sumber_data")->distinct()->where("fakultas", $fakultas)->where("tahun_input", $tahun)->get();
        // dd($list_sumber);
        return view('user.rida.grafik', [
          "name"=> "Tenaga Kependidikan Sarjana",
          "data" => $data, "list_sumber" => $list_sumber, "list_tahun" => $list_tahun, 
          "list_fakultas" => $list_fakultas, "fakultas" => $fakultas, "tahun" => $tahun 
        ]);
      }
      return view('user.rida.grafik', [
        "name"=> "Tenaga Kependidikan Sarjana",
        "data" => [], "list_sumber" => [], "list_tahun" => [], 
        "list_fakultas" => [], "fakultas" => "", "tahun" => "" 
      ]);
      
    }
   
    public function diploma4(Request $request){
      $list_tahun = PenelitiPengabdiDiploma4::select("tahun_input")->distinct()->orderBy("tahun_input", "asc")->get();
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
        $data = PenelitiPengabdiDiploma4::where("fakultas", $fakultas)->where("tahun_input", $tahun)->get();
        $list_fakultas = PenelitiPengabdiDiploma4::select("fakultas")->distinct()->where("tahun_input", $tahun)->get();
        $list_sumber = PenelitiPengabdiDiploma4::select("periode", "sumber_data")->distinct()->where("fakultas", $fakultas)->where("tahun_input", $tahun)->get();
        // dd($list_sumber);
        return view('user.rida.grafik', [
          "name"=> "Tenaga Kependidikan D4",
          "data" => $data, "list_sumber" => $list_sumber, "list_tahun" => $list_tahun, 
          "list_fakultas" => $list_fakultas, "fakultas" => $fakultas, "tahun" => $tahun 
        ]);
      }
      return view('user.rida.grafik', [
        "name"=> "Tenaga Kependidikan D4",
        "data" => [], "list_sumber" => [], "list_tahun" => [], 
        "list_fakultas" => [], "fakultas" => "", "tahun" => "" 
      ]);
      
    }

    public function diploma3(Request $request){
      $list_tahun = PenelitiPengabdiDiploma3::select("tahun_input")->distinct()->orderBy("tahun_input", "asc")->get();
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
        $data = PenelitiPengabdiDiploma3::where("fakultas", $fakultas)->where("tahun_input", $tahun)->get();
        $list_fakultas = PenelitiPengabdiDiploma3::select("fakultas")->distinct()->where("tahun_input", $tahun)->get();
        $list_sumber = PenelitiPengabdiDiploma3::select("periode", "sumber_data")->distinct()->where("fakultas", $fakultas)->where("tahun_input", $tahun)->get();
        // dd($list_sumber);
        return view('user.rida.grafik', [
          "name"=> "Tenaga Kependidikan D3",
          "data" => $data, "list_sumber" => $list_sumber, "list_tahun" => $list_tahun, 
          "list_fakultas" => $list_fakultas, "fakultas" => $fakultas, "tahun" => $tahun 
        ]);
      }
      return view('user.rida.grafik', [
        "name"=> "Tenaga Kependidikan D3",
        "data" => [], "list_sumber" => [], "list_tahun" => [], 
        "list_fakultas" => [], "fakultas" => "", "tahun" => "" 
      ]);
      
    }
    public function diploma2(Request $request){
      $list_tahun = PenelitiPengabdiDiploma2::select("tahun_input")->distinct()->orderBy("tahun_input", "asc")->get();
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
        $data = PenelitiPengabdiDiploma2::where("fakultas", $fakultas)->where("tahun_input", $tahun)->get();
        $list_fakultas = PenelitiPengabdiDiploma2::select("fakultas")->distinct()->where("tahun_input", $tahun)->get();
        $list_sumber = PenelitiPengabdiDiploma2::select("periode", "sumber_data")->distinct()->where("fakultas", $fakultas)->where("tahun_input", $tahun)->get();
        // dd($list_sumber);
        return view('user.rida.grafik', [
          "name"=> "Tenaga Kependidikan D2",
          "data" => $data, "list_sumber" => $list_sumber, "list_tahun" => $list_tahun, 
          "list_fakultas" => $list_fakultas, "fakultas" => $fakultas, "tahun" => $tahun 
        ]);
      }
      return view('user.rida.grafik', [
        "name"=> "Tenaga Kependidikan D2",
        "data" => [], "list_sumber" => [], "list_tahun" => [], 
        "list_fakultas" => [], "fakultas" => "", "tahun" => "" 
      ]);
      
    }
    public function diploma1(Request $request){
      $list_tahun = PenelitiPengabdiDiploma1::select("tahun_input")->distinct()->orderBy("tahun_input", "asc")->get();
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
        $data = PenelitiPengabdiDiploma1::where("fakultas", $fakultas)->where("tahun_input", $tahun)->get();
        $list_fakultas = PenelitiPengabdiDiploma1::select("fakultas")->distinct()->where("tahun_input", $tahun)->get();
        $list_sumber = PenelitiPengabdiDiploma1::select("periode", "sumber_data")->distinct()->where("fakultas", $fakultas)->where("tahun_input", $tahun)->get();
        // dd($list_sumber);
        return view('user.rida.grafik', [
          "name"=> "Tenaga Kependidikan D1",
          "data" => $data, "list_sumber" => $list_sumber, "list_tahun" => $list_tahun, 
          "list_fakultas" => $list_fakultas, "fakultas" => $fakultas, "tahun" => $tahun 
        ]);
      }
      return view('user.rida.grafik', [
        "name"=> "Tenaga Kependidikan D1",
        "data" => [], "list_sumber" => [], "list_tahun" => [], 
        "list_fakultas" => [], "fakultas" => "", "tahun" => "" 
      ]);
      
    }
    public function slta(Request $request){
      $list_tahun = PenelitiPengabdiSlta::select("tahun_input")->distinct()->orderBy("tahun_input", "asc")->get();
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
        $data = PenelitiPengabdiSlta::where("fakultas", $fakultas)->where("tahun_input", $tahun)->get();
        $list_fakultas = PenelitiPengabdiSlta::select("fakultas")->distinct()->where("tahun_input", $tahun)->get();
        $list_sumber = PenelitiPengabdiSlta::select("periode", "sumber_data")->distinct()->where("fakultas", $fakultas)->where("tahun_input", $tahun)->get();
        // dd($list_sumber);
        return view('user.rida.grafik', [
          "name"=> "Tenaga Kependidikan SLTA",
          "data" => $data, "list_sumber" => $list_sumber, "list_tahun" => $list_tahun, 
          "list_fakultas" => $list_fakultas, "fakultas" => $fakultas, "tahun" => $tahun 
        ]);
      }
      return view('user.rida.grafik', [
        "name"=> "Tenaga Kependidikan SLTA",
        "data" => [], "list_sumber" => [], "list_tahun" => [], 
        "list_fakultas" => [], "fakultas" => "", "tahun" => "" 
      ]);
      
    }
    public function sltp(Request $request){
      $list_tahun = PenelitiPengabdiSltp::select("tahun_input")->distinct()->orderBy("tahun_input", "asc")->get();
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
        $data = PenelitiPengabdiSltp::where("fakultas", $fakultas)->where("tahun_input", $tahun)->get();
        $list_fakultas = PenelitiPengabdiSltp::select("fakultas")->distinct()->where("tahun_input", $tahun)->get();
        $list_sumber = PenelitiPengabdiSltp::select("periode", "sumber_data")->distinct()->where("fakultas", $fakultas)->where("tahun_input", $tahun)->get();
        // dd($list_sumber);
        return view('user.rida.grafik', [
          "name"=> "Tenaga Kependidikan SLTP",
          "data" => $data, "list_sumber" => $list_sumber, "list_tahun" => $list_tahun, 
          "list_fakultas" => $list_fakultas, "fakultas" => $fakultas, "tahun" => $tahun 
        ]);
      }
      return view('user.rida.grafik', [
        "name"=> "Tenaga Kependidikan SLTP",
        "data" => [], "list_sumber" => [], "list_tahun" => [], 
        "list_fakultas" => [], "fakultas" => "", "tahun" => "" 
      ]);
      
    }
    public function sd(Request $request){
      $list_tahun = PenelitiPengabdiSd::select("tahun_input")->distinct()->orderBy("tahun_input", "asc")->get();
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
        $data = PenelitiPengabdiSd::where("fakultas", $fakultas)->where("tahun_input", $tahun)->get();
        $list_fakultas = PenelitiPengabdiSd::select("fakultas")->distinct()->where("tahun_input", $tahun)->get();
        $list_sumber = PenelitiPengabdiSd::select("periode", "sumber_data")->distinct()->where("fakultas", $fakultas)->where("tahun_input", $tahun)->get();
        // dd($list_sumber);
        return view('user.rida.grafik', [
          "name"=> "Tenaga Kependidikan SD",
          "data" => $data, "list_sumber" => $list_sumber, "list_tahun" => $list_tahun, 
          "list_fakultas" => $list_fakultas, "fakultas" => $fakultas, "tahun" => $tahun 
        ]);
      }
      return view('user.rida.grafik', [
        "name"=> "Tenaga Kependidikan SD",
        "data" => [], "list_sumber" => [], "list_tahun" => [], 
        "list_fakultas" => [], "fakultas" => "", "tahun" => "" 
      ]);
      
    }

    public function pilih_periode_magister($fakultas, $tahun){
      $fakultas  = $fakultas;
      $tahun  = $tahun;
      $data = PenelitiPengabdiMagister::select('periode', 'tahun_input', 'sumber_data')->distinct()->where('fakultas', $fakultas)->where('tahun_input', $tahun)->get('periode', 'tahun_input', 'sumber_data');

       return view('user.rida.pilih_periode',[ "name" => "Tenaga Kependidikan Magister", 'data' => $data, 'fakultas' => $fakultas, 'tahun' => $tahun]);
      
    }
    public function pilih_periode_profesi($fakultas, $tahun){
      $fakultas  = $fakultas;
      $tahun  = $tahun;
      $data = PenelitiPengabdiProfesi::select('periode', 'tahun_input', 'sumber_data')->distinct()->where('fakultas', $fakultas)->where('tahun_input', $tahun)->get('periode', 'tahun_input', 'sumber_data');

       return view('user.rida.pilih_periode',[ "name" => "Tenaga Kependidikan Profesi", 'data' => $data, 'fakultas' => $fakultas, 'tahun' => $tahun]);
      
    }
    public function pilih_periode_sarjana($fakultas, $tahun){
      $fakultas  = $fakultas;
      $tahun  = $tahun;
      $data = PenelitiPengabdiSarjana::select('periode', 'tahun_input', 'sumber_data')->distinct()->where('fakultas', $fakultas)->where('tahun_input', $tahun)->get('periode', 'tahun_input', 'sumber_data');

       return view('user.rida.pilih_periode',[ "name" => "Tenaga Kependidikan Sarjana", 'data' => $data, 'fakultas' => $fakultas, 'tahun' => $tahun]);
      
    }
    public function pilih_periode_d4($fakultas, $tahun){
      $fakultas  = $fakultas;
      $tahun  = $tahun;
      $data = PenelitiPengabdiDiploma4::select('periode', 'tahun_input', 'sumber_data')->distinct()->where('fakultas', $fakultas)->where('tahun_input', $tahun)->get('periode', 'tahun_input', 'sumber_data');

       return view('user.rida.pilih_periode',[ "name" => "Tenaga Kependidikan D4", 'data' => $data, 'fakultas' => $fakultas, 'tahun' => $tahun]);
      
    }
    public function pilih_periode_d3($fakultas, $tahun){
      $fakultas  = $fakultas;
      $tahun  = $tahun;
      $data = PenelitiPengabdiDiploma3::select('periode', 'tahun_input', 'sumber_data')->distinct()->where('fakultas', $fakultas)->where('tahun_input', $tahun)->get('periode', 'tahun_input', 'sumber_data');

       return view('user.rida.pilih_periode',[ "name" => "Tenaga Kependidikan D3", 'data' => $data, 'fakultas' => $fakultas, 'tahun' => $tahun]);
      
    }
    public function pilih_periode_d2($fakultas, $tahun){
      $fakultas  = $fakultas;
      $tahun  = $tahun;
      $data = PenelitiPengabdiDiploma2::select('periode', 'tahun_input', 'sumber_data')->distinct()->where('fakultas', $fakultas)->where('tahun_input', $tahun)->get('periode', 'tahun_input', 'sumber_data');

       return view('user.rida.pilih_periode',[ "name" => "Tenaga Kependidikan D2", 'data' => $data, 'fakultas' => $fakultas, 'tahun' => $tahun]);
      
    }
    public function pilih_periode_d1($fakultas, $tahun){
      $fakultas  = $fakultas;
      $tahun  = $tahun;
      $data = PenelitiPengabdiDiploma1::select('periode', 'tahun_input', 'sumber_data')->distinct()->where('fakultas', $fakultas)->where('tahun_input', $tahun)->get('periode', 'tahun_input', 'sumber_data');

       return view('user.rida.pilih_periode',[ "name" => "Tenaga Kependidikan D1", 'data' => $data, 'fakultas' => $fakultas, 'tahun' => $tahun]);
      
    }
    public function pilih_periode_slta($fakultas, $tahun){
      $fakultas  = $fakultas;
      $tahun  = $tahun;
      $data = PenelitiPengabdiSlta::select('periode', 'tahun_input', 'sumber_data')->distinct()->where('fakultas', $fakultas)->where('tahun_input', $tahun)->get('periode', 'tahun_input', 'sumber_data');

       return view('user.rida.pilih_periode',[ "name" => "Tenaga Kependidikan SLTA", 'data' => $data, 'fakultas' => $fakultas, 'tahun' => $tahun]);
      
    }
    public function pilih_periode_sltp($fakultas, $tahun){
      $fakultas  = $fakultas;
      $tahun  = $tahun;
      $data = PenelitiPengabdiSltp::select('periode', 'tahun_input', 'sumber_data')->distinct()->where('fakultas', $fakultas)->where('tahun_input', $tahun)->get('periode', 'tahun_input', 'sumber_data');

       return view('user.rida.pilih_periode',[ "name" => "Tenaga Kependidikan SLTP", 'data' => $data, 'fakultas' => $fakultas, 'tahun' => $tahun]);
      
    }
    public function pilih_periode_sd($fakultas, $tahun){
      $fakultas  = $fakultas;
      $tahun  = $tahun;
      $data = PenelitiPengabdiSd::select('periode', 'tahun_input', 'sumber_data')->distinct()->where('fakultas', $fakultas)->where('tahun_input', $tahun)->get('periode', 'tahun_input', 'sumber_data');

       return view('user.rida.pilih_periode',[ "name" => "Tenaga Kependidikan SD", 'data' => $data, 'fakultas' => $fakultas, 'tahun' => $tahun]);
      
    }

    public function detail_magister($fakultas, $tahun, $periode){
      $fakultas  = $fakultas;
      $tahun  = $tahun;

      $data = PenelitiPengabdiMagister::where([['fakultas', $fakultas], ['periode', $periode], ['tahun_input', $tahun]])->get();

      $sum25_L           = PenelitiPengabdiMagister::where([['fakultas', $fakultas], ['periode', $periode]])->sum('usia25_L');
      $sum25_P           = PenelitiPengabdiMagister::where([['fakultas', $fakultas], ['periode', $periode]])->sum('usia25_P');
      $sum25_jumlah           = PenelitiPengabdiMagister::where([['fakultas', $fakultas], ['periode', $periode]])->sum('usia25_jumlah');

      $sum25sd35_L       = PenelitiPengabdiMagister::where([['fakultas', $fakultas], ['periode', $periode]])->sum('usia25sd35_L');
      $sum25sd35_P       = PenelitiPengabdiMagister::where([['fakultas', $fakultas], ['periode', $periode]])->sum('usia25sd35_P');
      $sum25sd35_jumlah       = PenelitiPengabdiMagister::where([['fakultas', $fakultas], ['periode', $periode]])->sum('usia25sd35_jumlah');

      $sum36sd45_L       = PenelitiPengabdiMagister::where([['fakultas', $fakultas], ['periode', $periode]])->sum('usia36sd45_L');
      $sum36sd45_P       = PenelitiPengabdiMagister::where([['fakultas', $fakultas], ['periode', $periode]])->sum('usia36sd45_P');
      $sum36sd45_jumlah       = PenelitiPengabdiMagister::where([['fakultas', $fakultas], ['periode', $periode]])->sum('usia36sd45_jumlah');

      $sum46sd55_L       = PenelitiPengabdiMagister::where([['fakultas', $fakultas], ['periode', $periode]])->sum('usia46sd55_L');
      $sum46sd55_P       = PenelitiPengabdiMagister::where([['fakultas', $fakultas], ['periode', $periode]])->sum('usia46sd55_P');
      $sum46sd55_jumlah       = PenelitiPengabdiMagister::where([['fakultas', $fakultas], ['periode', $periode]])->sum('usia46sd55_jumlah');

      $sum56sd60_L       = PenelitiPengabdiMagister::where([['fakultas', $fakultas], ['periode', $periode]])->sum('usia56sd60_L');
      $sum56sd60_P       = PenelitiPengabdiMagister::where([['fakultas', $fakultas], ['periode', $periode]])->sum('usia56sd60_P');
      $sum56sd60_jumlah       = PenelitiPengabdiMagister::where([['fakultas', $fakultas], ['periode', $periode]])->sum('usia56sd60_jumlah');

      $total                  = PenelitiPengabdiMagister::where([['fakultas', $fakultas], ['periode', $periode]])->sum('total');
      $totalsemua             = PenelitiPengabdiMagister::where([['fakultas', 'Universitas Sebelas Maret'], ['periode', $periode]])->sum('total');
      $totalpercent               = $total / $totalsemua * 100;

       return view('user.rida.detail-kependidikan',[
            'name' => 'Tenaga Kependidikan Magister', 'tahun' => $tahun , 'periode'=>$periode, 'data' => $data, 'fakultas' => $fakultas, 
            'sum25_L'=>$sum25_L,'sum25_P'=>$sum25_P, 'sum25_jumlah' => $sum25_jumlah,
            'sum25sd35_L'=>$sum25sd35_L,'sum25sd35_P'=>$sum25sd35_P, 'sum25sd35_jumlah' => $sum25sd35_jumlah,
            'sum36sd45_L'=>$sum25sd35_L,'sum36sd45_P'=>$sum36sd45_P, 'sum36sd45_jumlah' => $sum36sd45_jumlah,
            'sum46sd55_L'=>$sum25sd35_L,'sum46sd55_P'=>$sum46sd55_P, 'sum46sd55_jumlah' => $sum46sd55_jumlah,
            'sum56sd60_L'=>$sum56sd60_L,'sum56sd60_P'=>$sum56sd60_P, 'sum56sd60_jumlah' => $sum56sd60_jumlah,
            'total' => $total,  'totalpercent' => $totalpercent, 'totalsemua' => $totalsemua,
       ]);
      
    }
    public function detail_profesi($fakultas, $tahun, $periode){
      $fakultas  = $fakultas;
      $tahun  = $tahun;

      $data = PenelitiPengabdiProfesi::where([['fakultas', $fakultas], ['periode', $periode], ['tahun_input', $tahun]])->get();

      $sum25_L           = PenelitiPengabdiProfesi::where([['fakultas', $fakultas], ['periode', $periode]])->sum('usia25_L');
      $sum25_P           = PenelitiPengabdiProfesi::where([['fakultas', $fakultas], ['periode', $periode]])->sum('usia25_P');
      $sum25_jumlah      = PenelitiPengabdiProfesi::where([['fakultas', $fakultas], ['periode', $periode]])->sum('usia25_jumlah');

      $sum25sd35_L       = PenelitiPengabdiProfesi::where([['fakultas', $fakultas], ['periode', $periode]])->sum('usia25sd35_L');
      $sum25sd35_P       = PenelitiPengabdiProfesi::where([['fakultas', $fakultas], ['periode', $periode]])->sum('usia25sd35_P');
      $sum25sd35_jumlah  = PenelitiPengabdiProfesi::where([['fakultas', $fakultas], ['periode', $periode]])->sum('usia25sd35_jumlah');

      $sum36sd45_L       = PenelitiPengabdiProfesi::where([['fakultas', $fakultas], ['periode', $periode]])->sum('usia36sd45_L');
      $sum36sd45_P       = PenelitiPengabdiProfesi::where([['fakultas', $fakultas], ['periode', $periode]])->sum('usia36sd45_P');
      $sum36sd45_jumlah  = PenelitiPengabdiProfesi::where([['fakultas', $fakultas], ['periode', $periode]])->sum('usia36sd45_jumlah');

      $sum46sd55_L       = PenelitiPengabdiProfesi::where([['fakultas', $fakultas], ['periode', $periode]])->sum('usia46sd55_L');
      $sum46sd55_P       = PenelitiPengabdiProfesi::where([['fakultas', $fakultas], ['periode', $periode]])->sum('usia46sd55_P');
      $sum46sd55_jumlah  = PenelitiPengabdiProfesi::where([['fakultas', $fakultas], ['periode', $periode]])->sum('usia46sd55_jumlah');

      $sum56sd60_L       = PenelitiPengabdiProfesi::where([['fakultas', $fakultas], ['periode', $periode]])->sum('usia56sd60_L');
      $sum56sd60_P       = PenelitiPengabdiProfesi::where([['fakultas', $fakultas], ['periode', $periode]])->sum('usia56sd60_P');
      $sum56sd60_jumlah  = PenelitiPengabdiProfesi::where([['fakultas', $fakultas], ['periode', $periode]])->sum('usia56sd60_jumlah');

      $total             = PenelitiPengabdiProfesi::where([['fakultas', $fakultas], ['periode', $periode]])->sum('total');
      $totalsemua        = PenelitiPengabdiProfesi::where([['fakultas', 'Universitas Sebelas Maret'], ['periode', $periode]])->sum('total');
      $totalpercent      = $total / $totalsemua * 100;

       return view('user.rida.detail-kependidikan',[
            'name' => 'Tenaga Kependidikan Profesi', 'tahun' => $tahun , 'periode'=>$periode, 'data' => $data, 'fakultas' => $fakultas, 
            'sum25_L'=>$sum25_L,'sum25_P'=>$sum25_P, 'sum25_jumlah' => $sum25_jumlah,
            'sum25sd35_L'=>$sum25sd35_L,'sum25sd35_P'=>$sum25sd35_P, 'sum25sd35_jumlah' => $sum25sd35_jumlah,
            'sum36sd45_L'=>$sum25sd35_L,'sum36sd45_P'=>$sum36sd45_P, 'sum36sd45_jumlah' => $sum36sd45_jumlah,
            'sum46sd55_L'=>$sum25sd35_L,'sum46sd55_P'=>$sum46sd55_P, 'sum46sd55_jumlah' => $sum46sd55_jumlah,
            'sum56sd60_L'=>$sum56sd60_L,'sum56sd60_P'=>$sum56sd60_P, 'sum56sd60_jumlah' => $sum56sd60_jumlah,
            'total' => $total,  'totalpercent' => $totalpercent, 'totalsemua' => $totalsemua,
       ]);
      
    }

    public function detail_sarjana($fakultas, $tahun, $periode){
      $fakultas  = $fakultas;
      $tahun  = $tahun;

      $data = PenelitiPengabdiSarjana::where([['fakultas', $fakultas], ['periode', $periode], ['tahun_input', $tahun]])->get();

      $sum25_L           = PenelitiPengabdiSarjana::where([['fakultas', $fakultas], ['periode', $periode]])->sum('usia25_L');
      $sum25_P           = PenelitiPengabdiSarjana::where([['fakultas', $fakultas], ['periode', $periode]])->sum('usia25_P');
      $sum25_jumlah      = PenelitiPengabdiSarjana::where([['fakultas', $fakultas], ['periode', $periode]])->sum('usia25_jumlah');

      $sum25sd35_L       = PenelitiPengabdiSarjana::where([['fakultas', $fakultas], ['periode', $periode]])->sum('usia25sd35_L');
      $sum25sd35_P       = PenelitiPengabdiSarjana::where([['fakultas', $fakultas], ['periode', $periode]])->sum('usia25sd35_P');
      $sum25sd35_jumlah  = PenelitiPengabdiSarjana::where([['fakultas', $fakultas], ['periode', $periode]])->sum('usia25sd35_jumlah');

      $sum36sd45_L       = PenelitiPengabdiSarjana::where([['fakultas', $fakultas], ['periode', $periode]])->sum('usia36sd45_L');
      $sum36sd45_P       = PenelitiPengabdiSarjana::where([['fakultas', $fakultas], ['periode', $periode]])->sum('usia36sd45_P');
      $sum36sd45_jumlah  = PenelitiPengabdiSarjana::where([['fakultas', $fakultas], ['periode', $periode]])->sum('usia36sd45_jumlah');

      $sum46sd55_L       = PenelitiPengabdiSarjana::where([['fakultas', $fakultas], ['periode', $periode]])->sum('usia46sd55_L');
      $sum46sd55_P       = PenelitiPengabdiSarjana::where([['fakultas', $fakultas], ['periode', $periode]])->sum('usia46sd55_P');
      $sum46sd55_jumlah  = PenelitiPengabdiSarjana::where([['fakultas', $fakultas], ['periode', $periode]])->sum('usia46sd55_jumlah');

      $sum56sd60_L       = PenelitiPengabdiSarjana::where([['fakultas', $fakultas], ['periode', $periode]])->sum('usia56sd60_L');
      $sum56sd60_P       = PenelitiPengabdiSarjana::where([['fakultas', $fakultas], ['periode', $periode]])->sum('usia56sd60_P');
      $sum56sd60_jumlah  = PenelitiPengabdiSarjana::where([['fakultas', $fakultas], ['periode', $periode]])->sum('usia56sd60_jumlah');

      $total             = PenelitiPengabdiSarjana::where([['fakultas', $fakultas], ['periode', $periode]])->sum('total');
      $totalsemua        = PenelitiPengabdiSarjana::where([['fakultas', 'Universitas Sebelas Maret'], ['periode', $periode]])->sum('total');
      $totalpercent      = $total / $totalsemua * 100;

       return view('user.rida.detail-kependidikan',[
            'name' => 'Tenaga Kependidikan Sarjana', 'tahun' => $tahun , 'periode'=>$periode, 'data' => $data, 'fakultas' => $fakultas, 
            'sum25_L'=>$sum25_L,'sum25_P'=>$sum25_P, 'sum25_jumlah' => $sum25_jumlah,
            'sum25sd35_L'=>$sum25sd35_L,'sum25sd35_P'=>$sum25sd35_P, 'sum25sd35_jumlah' => $sum25sd35_jumlah,
            'sum36sd45_L'=>$sum25sd35_L,'sum36sd45_P'=>$sum36sd45_P, 'sum36sd45_jumlah' => $sum36sd45_jumlah,
            'sum46sd55_L'=>$sum25sd35_L,'sum46sd55_P'=>$sum46sd55_P, 'sum46sd55_jumlah' => $sum46sd55_jumlah,
            'sum56sd60_L'=>$sum56sd60_L,'sum56sd60_P'=>$sum56sd60_P, 'sum56sd60_jumlah' => $sum56sd60_jumlah,
            'total' => $total,  'totalpercent' => $totalpercent, 'totalsemua' => $totalsemua,
       ]);
      
    }
    public function detail_d4($fakultas, $tahun, $periode){
      $fakultas  = $fakultas;
      $tahun  = $tahun;

      $data = PenelitiPengabdiDiploma4::where([['fakultas', $fakultas], ['periode', $periode], ['tahun_input', $tahun]])->get();

      $sum25_L           = PenelitiPengabdiDiploma4::where([['fakultas', $fakultas], ['periode', $periode]])->sum('usia25_L');
      $sum25_P           = PenelitiPengabdiDiploma4::where([['fakultas', $fakultas], ['periode', $periode]])->sum('usia25_P');
      $sum25_jumlah      = PenelitiPengabdiDiploma4::where([['fakultas', $fakultas], ['periode', $periode]])->sum('usia25_jumlah');

      $sum25sd35_L       = PenelitiPengabdiDiploma4::where([['fakultas', $fakultas], ['periode', $periode]])->sum('usia25sd35_L');
      $sum25sd35_P       = PenelitiPengabdiDiploma4::where([['fakultas', $fakultas], ['periode', $periode]])->sum('usia25sd35_P');
      $sum25sd35_jumlah  = PenelitiPengabdiDiploma4::where([['fakultas', $fakultas], ['periode', $periode]])->sum('usia25sd35_jumlah');

      $sum36sd45_L       = PenelitiPengabdiDiploma4::where([['fakultas', $fakultas], ['periode', $periode]])->sum('usia36sd45_L');
      $sum36sd45_P       = PenelitiPengabdiDiploma4::where([['fakultas', $fakultas], ['periode', $periode]])->sum('usia36sd45_P');
      $sum36sd45_jumlah  = PenelitiPengabdiDiploma4::where([['fakultas', $fakultas], ['periode', $periode]])->sum('usia36sd45_jumlah');

      $sum46sd55_L       = PenelitiPengabdiDiploma4::where([['fakultas', $fakultas], ['periode', $periode]])->sum('usia46sd55_L');
      $sum46sd55_P       = PenelitiPengabdiDiploma4::where([['fakultas', $fakultas], ['periode', $periode]])->sum('usia46sd55_P');
      $sum46sd55_jumlah  = PenelitiPengabdiDiploma4::where([['fakultas', $fakultas], ['periode', $periode]])->sum('usia46sd55_jumlah');

      $sum56sd60_L       = PenelitiPengabdiDiploma4::where([['fakultas', $fakultas], ['periode', $periode]])->sum('usia56sd60_L');
      $sum56sd60_P       = PenelitiPengabdiDiploma4::where([['fakultas', $fakultas], ['periode', $periode]])->sum('usia56sd60_P');
      $sum56sd60_jumlah  = PenelitiPengabdiDiploma4::where([['fakultas', $fakultas], ['periode', $periode]])->sum('usia56sd60_jumlah');

      $total             = PenelitiPengabdiDiploma4::where([['fakultas', $fakultas], ['periode', $periode]])->sum('total');
      $totalsemua        = PenelitiPengabdiDiploma4::where([['fakultas', 'Universitas Sebelas Maret'], ['periode', $periode]])->sum('total');
      $totalpercent      = $total / $totalsemua * 100;

       return view('user.rida.detail-kependidikan',[
            'name' => 'Tenaga Kependidikan D4', 'tahun' => $tahun , 'periode'=>$periode, 'data' => $data, 'fakultas' => $fakultas, 
            'sum25_L'=>$sum25_L,'sum25_P'=>$sum25_P, 'sum25_jumlah' => $sum25_jumlah,
            'sum25sd35_L'=>$sum25sd35_L,'sum25sd35_P'=>$sum25sd35_P, 'sum25sd35_jumlah' => $sum25sd35_jumlah,
            'sum36sd45_L'=>$sum25sd35_L,'sum36sd45_P'=>$sum36sd45_P, 'sum36sd45_jumlah' => $sum36sd45_jumlah,
            'sum46sd55_L'=>$sum25sd35_L,'sum46sd55_P'=>$sum46sd55_P, 'sum46sd55_jumlah' => $sum46sd55_jumlah,
            'sum56sd60_L'=>$sum56sd60_L,'sum56sd60_P'=>$sum56sd60_P, 'sum56sd60_jumlah' => $sum56sd60_jumlah,
            'total' => $total,  'totalpercent' => $totalpercent, 'totalsemua' => $totalsemua,
       ]);
      
    }
    public function detail_d3($fakultas, $tahun, $periode){
      $fakultas  = $fakultas;
      $tahun  = $tahun;

      $data = PenelitiPengabdiDiploma3::where([['fakultas', $fakultas], ['periode', $periode], ['tahun_input', $tahun]])->get();

      $sum25_L           = PenelitiPengabdiDiploma3::where([['fakultas', $fakultas], ['periode', $periode]])->sum('usia25_L');
      $sum25_P           = PenelitiPengabdiDiploma3::where([['fakultas', $fakultas], ['periode', $periode]])->sum('usia25_P');
      $sum25_jumlah      = PenelitiPengabdiDiploma3::where([['fakultas', $fakultas], ['periode', $periode]])->sum('usia25_jumlah');

      $sum25sd35_L       = PenelitiPengabdiDiploma3::where([['fakultas', $fakultas], ['periode', $periode]])->sum('usia25sd35_L');
      $sum25sd35_P       = PenelitiPengabdiDiploma3::where([['fakultas', $fakultas], ['periode', $periode]])->sum('usia25sd35_P');
      $sum25sd35_jumlah  = PenelitiPengabdiDiploma3::where([['fakultas', $fakultas], ['periode', $periode]])->sum('usia25sd35_jumlah');

      $sum36sd45_L       = PenelitiPengabdiDiploma3::where([['fakultas', $fakultas], ['periode', $periode]])->sum('usia36sd45_L');
      $sum36sd45_P       = PenelitiPengabdiDiploma3::where([['fakultas', $fakultas], ['periode', $periode]])->sum('usia36sd45_P');
      $sum36sd45_jumlah  = PenelitiPengabdiDiploma3::where([['fakultas', $fakultas], ['periode', $periode]])->sum('usia36sd45_jumlah');

      $sum46sd55_L       = PenelitiPengabdiDiploma3::where([['fakultas', $fakultas], ['periode', $periode]])->sum('usia46sd55_L');
      $sum46sd55_P       = PenelitiPengabdiDiploma3::where([['fakultas', $fakultas], ['periode', $periode]])->sum('usia46sd55_P');
      $sum46sd55_jumlah  = PenelitiPengabdiDiploma3::where([['fakultas', $fakultas], ['periode', $periode]])->sum('usia46sd55_jumlah');

      $sum56sd60_L       = PenelitiPengabdiDiploma3::where([['fakultas', $fakultas], ['periode', $periode]])->sum('usia56sd60_L');
      $sum56sd60_P       = PenelitiPengabdiDiploma3::where([['fakultas', $fakultas], ['periode', $periode]])->sum('usia56sd60_P');
      $sum56sd60_jumlah  = PenelitiPengabdiDiploma3::where([['fakultas', $fakultas], ['periode', $periode]])->sum('usia56sd60_jumlah');

      $total             = PenelitiPengabdiDiploma3::where([['fakultas', $fakultas], ['periode', $periode]])->sum('total');
      $totalsemua        = PenelitiPengabdiDiploma3::where([['fakultas', 'Universitas Sebelas Maret'], ['periode', $periode]])->sum('total');
      $totalpercent      = $total / $totalsemua * 100;

       return view('user.rida.detail-kependidikan',[
            'name' => 'Tenaga Kependidikan D3', 'tahun' => $tahun , 'periode'=>$periode, 'data' => $data, 'fakultas' => $fakultas, 
            'sum25_L'=>$sum25_L,'sum25_P'=>$sum25_P, 'sum25_jumlah' => $sum25_jumlah,
            'sum25sd35_L'=>$sum25sd35_L,'sum25sd35_P'=>$sum25sd35_P, 'sum25sd35_jumlah' => $sum25sd35_jumlah,
            'sum36sd45_L'=>$sum25sd35_L,'sum36sd45_P'=>$sum36sd45_P, 'sum36sd45_jumlah' => $sum36sd45_jumlah,
            'sum46sd55_L'=>$sum25sd35_L,'sum46sd55_P'=>$sum46sd55_P, 'sum46sd55_jumlah' => $sum46sd55_jumlah,
            'sum56sd60_L'=>$sum56sd60_L,'sum56sd60_P'=>$sum56sd60_P, 'sum56sd60_jumlah' => $sum56sd60_jumlah,
            'total' => $total,  'totalpercent' => $totalpercent, 'totalsemua' => $totalsemua,
       ]);
      
    }
    public function detail_d2($fakultas, $tahun, $periode){
      $fakultas  = $fakultas;
      $tahun  = $tahun;

      $data = PenelitiPengabdiDiploma2::where([['fakultas', $fakultas], ['periode', $periode], ['tahun_input', $tahun]])->get();

      $sum25_L           = PenelitiPengabdiDiploma2::where([['fakultas', $fakultas], ['periode', $periode]])->sum('usia25_L');
      $sum25_P           = PenelitiPengabdiDiploma2::where([['fakultas', $fakultas], ['periode', $periode]])->sum('usia25_P');
      $sum25_jumlah      = PenelitiPengabdiDiploma2::where([['fakultas', $fakultas], ['periode', $periode]])->sum('usia25_jumlah');

      $sum25sd35_L       = PenelitiPengabdiDiploma2::where([['fakultas', $fakultas], ['periode', $periode]])->sum('usia25sd35_L');
      $sum25sd35_P       = PenelitiPengabdiDiploma2::where([['fakultas', $fakultas], ['periode', $periode]])->sum('usia25sd35_P');
      $sum25sd35_jumlah  = PenelitiPengabdiDiploma2::where([['fakultas', $fakultas], ['periode', $periode]])->sum('usia25sd35_jumlah');

      $sum36sd45_L       = PenelitiPengabdiDiploma2::where([['fakultas', $fakultas], ['periode', $periode]])->sum('usia36sd45_L');
      $sum36sd45_P       = PenelitiPengabdiDiploma2::where([['fakultas', $fakultas], ['periode', $periode]])->sum('usia36sd45_P');
      $sum36sd45_jumlah  = PenelitiPengabdiDiploma2::where([['fakultas', $fakultas], ['periode', $periode]])->sum('usia36sd45_jumlah');

      $sum46sd55_L       = PenelitiPengabdiDiploma2::where([['fakultas', $fakultas], ['periode', $periode]])->sum('usia46sd55_L');
      $sum46sd55_P       = PenelitiPengabdiDiploma2::where([['fakultas', $fakultas], ['periode', $periode]])->sum('usia46sd55_P');
      $sum46sd55_jumlah  = PenelitiPengabdiDiploma2::where([['fakultas', $fakultas], ['periode', $periode]])->sum('usia46sd55_jumlah');

      $sum56sd60_L       = PenelitiPengabdiDiploma2::where([['fakultas', $fakultas], ['periode', $periode]])->sum('usia56sd60_L');
      $sum56sd60_P       = PenelitiPengabdiDiploma2::where([['fakultas', $fakultas], ['periode', $periode]])->sum('usia56sd60_P');
      $sum56sd60_jumlah  = PenelitiPengabdiDiploma2::where([['fakultas', $fakultas], ['periode', $periode]])->sum('usia56sd60_jumlah');

      $total             = PenelitiPengabdiDiploma2::where([['fakultas', $fakultas], ['periode', $periode]])->sum('total');
      $totalsemua        = PenelitiPengabdiDiploma2::where([['fakultas', 'Universitas Sebelas Maret'], ['periode', $periode]])->sum('total');
      $totalpercent      = $total / $totalsemua * 100;

       return view('user.rida.detail-kependidikan',[
            'name' => 'Tenaga Kependidikan D2', 'tahun' => $tahun , 'periode'=>$periode, 'data' => $data, 'fakultas' => $fakultas, 
            'sum25_L'=>$sum25_L,'sum25_P'=>$sum25_P, 'sum25_jumlah' => $sum25_jumlah,
            'sum25sd35_L'=>$sum25sd35_L,'sum25sd35_P'=>$sum25sd35_P, 'sum25sd35_jumlah' => $sum25sd35_jumlah,
            'sum36sd45_L'=>$sum25sd35_L,'sum36sd45_P'=>$sum36sd45_P, 'sum36sd45_jumlah' => $sum36sd45_jumlah,
            'sum46sd55_L'=>$sum25sd35_L,'sum46sd55_P'=>$sum46sd55_P, 'sum46sd55_jumlah' => $sum46sd55_jumlah,
            'sum56sd60_L'=>$sum56sd60_L,'sum56sd60_P'=>$sum56sd60_P, 'sum56sd60_jumlah' => $sum56sd60_jumlah,
            'total' => $total,  'totalpercent' => $totalpercent, 'totalsemua' => $totalsemua,
       ]);
      
    }
    public function detail_d1($fakultas, $tahun, $periode){
      $fakultas  = $fakultas;
      $tahun  = $tahun;

      $data = PenelitiPengabdiDiploma1::where([['fakultas', $fakultas], ['periode', $periode], ['tahun_input', $tahun]])->get();

      $sum25_L           = PenelitiPengabdiDiploma1::where([['fakultas', $fakultas], ['periode', $periode]])->sum('usia25_L');
      $sum25_P           = PenelitiPengabdiDiploma1::where([['fakultas', $fakultas], ['periode', $periode]])->sum('usia25_P');
      $sum25_jumlah      = PenelitiPengabdiDiploma1::where([['fakultas', $fakultas], ['periode', $periode]])->sum('usia25_jumlah');

      $sum25sd35_L       = PenelitiPengabdiDiploma1::where([['fakultas', $fakultas], ['periode', $periode]])->sum('usia25sd35_L');
      $sum25sd35_P       = PenelitiPengabdiDiploma1::where([['fakultas', $fakultas], ['periode', $periode]])->sum('usia25sd35_P');
      $sum25sd35_jumlah  = PenelitiPengabdiDiploma1::where([['fakultas', $fakultas], ['periode', $periode]])->sum('usia25sd35_jumlah');

      $sum36sd45_L       = PenelitiPengabdiDiploma1::where([['fakultas', $fakultas], ['periode', $periode]])->sum('usia36sd45_L');
      $sum36sd45_P       = PenelitiPengabdiDiploma1::where([['fakultas', $fakultas], ['periode', $periode]])->sum('usia36sd45_P');
      $sum36sd45_jumlah  = PenelitiPengabdiDiploma1::where([['fakultas', $fakultas], ['periode', $periode]])->sum('usia36sd45_jumlah');

      $sum46sd55_L       = PenelitiPengabdiDiploma1::where([['fakultas', $fakultas], ['periode', $periode]])->sum('usia46sd55_L');
      $sum46sd55_P       = PenelitiPengabdiDiploma1::where([['fakultas', $fakultas], ['periode', $periode]])->sum('usia46sd55_P');
      $sum46sd55_jumlah  = PenelitiPengabdiDiploma1::where([['fakultas', $fakultas], ['periode', $periode]])->sum('usia46sd55_jumlah');

      $sum56sd60_L       = PenelitiPengabdiDiploma1::where([['fakultas', $fakultas], ['periode', $periode]])->sum('usia56sd60_L');
      $sum56sd60_P       = PenelitiPengabdiDiploma1::where([['fakultas', $fakultas], ['periode', $periode]])->sum('usia56sd60_P');
      $sum56sd60_jumlah  = PenelitiPengabdiDiploma1::where([['fakultas', $fakultas], ['periode', $periode]])->sum('usia56sd60_jumlah');

      $total             = PenelitiPengabdiDiploma1::where([['fakultas', $fakultas], ['periode', $periode]])->sum('total');
      $totalsemua        = PenelitiPengabdiDiploma1::where([['fakultas', 'Universitas Sebelas Maret'], ['periode', $periode]])->sum('total');
      $totalpercent      = $total / $totalsemua * 100;

       return view('user.rida.detail-kependidikan',[
            'name' => 'Tenaga Kependidikan D1', 'tahun' => $tahun , 'periode'=>$periode, 'data' => $data, 'fakultas' => $fakultas, 
            'sum25_L'=>$sum25_L,'sum25_P'=>$sum25_P, 'sum25_jumlah' => $sum25_jumlah,
            'sum25sd35_L'=>$sum25sd35_L,'sum25sd35_P'=>$sum25sd35_P, 'sum25sd35_jumlah' => $sum25sd35_jumlah,
            'sum36sd45_L'=>$sum25sd35_L,'sum36sd45_P'=>$sum36sd45_P, 'sum36sd45_jumlah' => $sum36sd45_jumlah,
            'sum46sd55_L'=>$sum25sd35_L,'sum46sd55_P'=>$sum46sd55_P, 'sum46sd55_jumlah' => $sum46sd55_jumlah,
            'sum56sd60_L'=>$sum56sd60_L,'sum56sd60_P'=>$sum56sd60_P, 'sum56sd60_jumlah' => $sum56sd60_jumlah,
            'total' => $total,  'totalpercent' => $totalpercent, 'totalsemua' => $totalsemua,
       ]);
      
    }
    public function detail_slta($fakultas, $tahun, $periode){
      $fakultas  = $fakultas;
      $tahun  = $tahun;

      $data = PenelitiPengabdiSlta::where([['fakultas', $fakultas], ['periode', $periode], ['tahun_input', $tahun]])->get();

      $sum25_L           = PenelitiPengabdiSlta::where([['fakultas', $fakultas], ['periode', $periode]])->sum('usia25_L');
      $sum25_P           = PenelitiPengabdiSlta::where([['fakultas', $fakultas], ['periode', $periode]])->sum('usia25_P');
      $sum25_jumlah      = PenelitiPengabdiSlta::where([['fakultas', $fakultas], ['periode', $periode]])->sum('usia25_jumlah');

      $sum25sd35_L       = PenelitiPengabdiSlta::where([['fakultas', $fakultas], ['periode', $periode]])->sum('usia25sd35_L');
      $sum25sd35_P       = PenelitiPengabdiSlta::where([['fakultas', $fakultas], ['periode', $periode]])->sum('usia25sd35_P');
      $sum25sd35_jumlah  = PenelitiPengabdiSlta::where([['fakultas', $fakultas], ['periode', $periode]])->sum('usia25sd35_jumlah');

      $sum36sd45_L       = PenelitiPengabdiSlta::where([['fakultas', $fakultas], ['periode', $periode]])->sum('usia36sd45_L');
      $sum36sd45_P       = PenelitiPengabdiSlta::where([['fakultas', $fakultas], ['periode', $periode]])->sum('usia36sd45_P');
      $sum36sd45_jumlah  = PenelitiPengabdiSlta::where([['fakultas', $fakultas], ['periode', $periode]])->sum('usia36sd45_jumlah');

      $sum46sd55_L       = PenelitiPengabdiSlta::where([['fakultas', $fakultas], ['periode', $periode]])->sum('usia46sd55_L');
      $sum46sd55_P       = PenelitiPengabdiSlta::where([['fakultas', $fakultas], ['periode', $periode]])->sum('usia46sd55_P');
      $sum46sd55_jumlah  = PenelitiPengabdiSlta::where([['fakultas', $fakultas], ['periode', $periode]])->sum('usia46sd55_jumlah');

      $sum56sd60_L       = PenelitiPengabdiSlta::where([['fakultas', $fakultas], ['periode', $periode]])->sum('usia56sd60_L');
      $sum56sd60_P       = PenelitiPengabdiSlta::where([['fakultas', $fakultas], ['periode', $periode]])->sum('usia56sd60_P');
      $sum56sd60_jumlah  = PenelitiPengabdiSlta::where([['fakultas', $fakultas], ['periode', $periode]])->sum('usia56sd60_jumlah');

      $total             = PenelitiPengabdiSlta::where([['fakultas', $fakultas], ['periode', $periode]])->sum('total');
      $totalsemua        = PenelitiPengabdiSlta::where([['fakultas', 'Universitas Sebelas Maret'], ['periode', $periode]])->sum('total');
      $totalpercent      = $total / $totalsemua * 100;

       return view('user.rida.detail-kependidikan',[
            'name' => 'Tenaga Kependidikan SLTA', 'tahun' => $tahun , 'periode'=>$periode, 'data' => $data, 'fakultas' => $fakultas, 
            'sum25_L'=>$sum25_L,'sum25_P'=>$sum25_P, 'sum25_jumlah' => $sum25_jumlah,
            'sum25sd35_L'=>$sum25sd35_L,'sum25sd35_P'=>$sum25sd35_P, 'sum25sd35_jumlah' => $sum25sd35_jumlah,
            'sum36sd45_L'=>$sum25sd35_L,'sum36sd45_P'=>$sum36sd45_P, 'sum36sd45_jumlah' => $sum36sd45_jumlah,
            'sum46sd55_L'=>$sum25sd35_L,'sum46sd55_P'=>$sum46sd55_P, 'sum46sd55_jumlah' => $sum46sd55_jumlah,
            'sum56sd60_L'=>$sum56sd60_L,'sum56sd60_P'=>$sum56sd60_P, 'sum56sd60_jumlah' => $sum56sd60_jumlah,
            'total' => $total,  'totalpercent' => $totalpercent, 'totalsemua' => $totalsemua,
       ]);
      
    }
    public function detail_sltp($fakultas, $tahun, $periode){
      $fakultas  = $fakultas;
      $tahun  = $tahun;

      $data = PenelitiPengabdiSltp::where([['fakultas', $fakultas], ['periode', $periode], ['tahun_input', $tahun]])->get();

      $sum25_L           = PenelitiPengabdiSltp::where([['fakultas', $fakultas], ['periode', $periode]])->sum('usia25_L');
      $sum25_P           = PenelitiPengabdiSltp::where([['fakultas', $fakultas], ['periode', $periode]])->sum('usia25_P');
      $sum25_jumlah      = PenelitiPengabdiSltp::where([['fakultas', $fakultas], ['periode', $periode]])->sum('usia25_jumlah');

      $sum25sd35_L       = PenelitiPengabdiSltp::where([['fakultas', $fakultas], ['periode', $periode]])->sum('usia25sd35_L');
      $sum25sd35_P       = PenelitiPengabdiSltp::where([['fakultas', $fakultas], ['periode', $periode]])->sum('usia25sd35_P');
      $sum25sd35_jumlah  = PenelitiPengabdiSltp::where([['fakultas', $fakultas], ['periode', $periode]])->sum('usia25sd35_jumlah');

      $sum36sd45_L       = PenelitiPengabdiSltp::where([['fakultas', $fakultas], ['periode', $periode]])->sum('usia36sd45_L');
      $sum36sd45_P       = PenelitiPengabdiSltp::where([['fakultas', $fakultas], ['periode', $periode]])->sum('usia36sd45_P');
      $sum36sd45_jumlah  = PenelitiPengabdiSltp::where([['fakultas', $fakultas], ['periode', $periode]])->sum('usia36sd45_jumlah');

      $sum46sd55_L       = PenelitiPengabdiSltp::where([['fakultas', $fakultas], ['periode', $periode]])->sum('usia46sd55_L');
      $sum46sd55_P       = PenelitiPengabdiSltp::where([['fakultas', $fakultas], ['periode', $periode]])->sum('usia46sd55_P');
      $sum46sd55_jumlah  = PenelitiPengabdiSltp::where([['fakultas', $fakultas], ['periode', $periode]])->sum('usia46sd55_jumlah');

      $sum56sd60_L       = PenelitiPengabdiSltp::where([['fakultas', $fakultas], ['periode', $periode]])->sum('usia56sd60_L');
      $sum56sd60_P       = PenelitiPengabdiSltp::where([['fakultas', $fakultas], ['periode', $periode]])->sum('usia56sd60_P');
      $sum56sd60_jumlah  = PenelitiPengabdiSltp::where([['fakultas', $fakultas], ['periode', $periode]])->sum('usia56sd60_jumlah');

      $total             = PenelitiPengabdiSltp::where([['fakultas', $fakultas], ['periode', $periode]])->sum('total');
      $totalsemua        = PenelitiPengabdiSltp::where([['fakultas', 'Universitas Sebelas Maret'], ['periode', $periode]])->sum('total');
      $totalpercent      = $total / $totalsemua * 100;

       return view('user.rida.detail-kependidikan',[
            'name' => 'Tenaga Kependidikan SLTP', 'tahun' => $tahun , 'periode'=>$periode, 'data' => $data, 'fakultas' => $fakultas, 
            'sum25_L'=>$sum25_L,'sum25_P'=>$sum25_P, 'sum25_jumlah' => $sum25_jumlah,
            'sum25sd35_L'=>$sum25sd35_L,'sum25sd35_P'=>$sum25sd35_P, 'sum25sd35_jumlah' => $sum25sd35_jumlah,
            'sum36sd45_L'=>$sum25sd35_L,'sum36sd45_P'=>$sum36sd45_P, 'sum36sd45_jumlah' => $sum36sd45_jumlah,
            'sum46sd55_L'=>$sum25sd35_L,'sum46sd55_P'=>$sum46sd55_P, 'sum46sd55_jumlah' => $sum46sd55_jumlah,
            'sum56sd60_L'=>$sum56sd60_L,'sum56sd60_P'=>$sum56sd60_P, 'sum56sd60_jumlah' => $sum56sd60_jumlah,
            'total' => $total,  'totalpercent' => $totalpercent, 'totalsemua' => $totalsemua,
       ]);
      
    }
    public function detail_sd($fakultas, $tahun, $periode){
      $fakultas  = $fakultas;
      $tahun  = $tahun;

      $data = PenelitiPengabdiSd::where([['fakultas', $fakultas], ['periode', $periode], ['tahun_input', $tahun]])->get();

      $sum25_L           = PenelitiPengabdiSd::where([['fakultas', $fakultas], ['periode', $periode]])->sum('usia25_L');
      $sum25_P           = PenelitiPengabdiSd::where([['fakultas', $fakultas], ['periode', $periode]])->sum('usia25_P');
      $sum25_jumlah      = PenelitiPengabdiSd::where([['fakultas', $fakultas], ['periode', $periode]])->sum('usia25_jumlah');

      $sum25sd35_L       = PenelitiPengabdiSd::where([['fakultas', $fakultas], ['periode', $periode]])->sum('usia25sd35_L');
      $sum25sd35_P       = PenelitiPengabdiSd::where([['fakultas', $fakultas], ['periode', $periode]])->sum('usia25sd35_P');
      $sum25sd35_jumlah  = PenelitiPengabdiSd::where([['fakultas', $fakultas], ['periode', $periode]])->sum('usia25sd35_jumlah');

      $sum36sd45_L       = PenelitiPengabdiSd::where([['fakultas', $fakultas], ['periode', $periode]])->sum('usia36sd45_L');
      $sum36sd45_P       = PenelitiPengabdiSd::where([['fakultas', $fakultas], ['periode', $periode]])->sum('usia36sd45_P');
      $sum36sd45_jumlah  = PenelitiPengabdiSd::where([['fakultas', $fakultas], ['periode', $periode]])->sum('usia36sd45_jumlah');

      $sum46sd55_L       = PenelitiPengabdiSd::where([['fakultas', $fakultas], ['periode', $periode]])->sum('usia46sd55_L');
      $sum46sd55_P       = PenelitiPengabdiSd::where([['fakultas', $fakultas], ['periode', $periode]])->sum('usia46sd55_P');
      $sum46sd55_jumlah  = PenelitiPengabdiSd::where([['fakultas', $fakultas], ['periode', $periode]])->sum('usia46sd55_jumlah');

      $sum56sd60_L       = PenelitiPengabdiSd::where([['fakultas', $fakultas], ['periode', $periode]])->sum('usia56sd60_L');
      $sum56sd60_P       = PenelitiPengabdiSd::where([['fakultas', $fakultas], ['periode', $periode]])->sum('usia56sd60_P');
      $sum56sd60_jumlah  = PenelitiPengabdiSd::where([['fakultas', $fakultas], ['periode', $periode]])->sum('usia56sd60_jumlah');

      $total             = PenelitiPengabdiSd::where([['fakultas', $fakultas], ['periode', $periode]])->sum('total');
      $totalsemua        = PenelitiPengabdiSd::where([['fakultas', 'Universitas Sebelas Maret'], ['periode', $periode]])->sum('total');
      $totalpercent      = $total / $totalsemua * 100;

       return view('user.rida.detail-kependidikan',[
            'name' => 'Tenaga Kependidikan SD', 'tahun' => $tahun , 'periode'=>$periode, 'data' => $data, 'fakultas' => $fakultas, 
            'sum25_L'=>$sum25_L,'sum25_P'=>$sum25_P, 'sum25_jumlah' => $sum25_jumlah,
            'sum25sd35_L'=>$sum25sd35_L,'sum25sd35_P'=>$sum25sd35_P, 'sum25sd35_jumlah' => $sum25sd35_jumlah,
            'sum36sd45_L'=>$sum25sd35_L,'sum36sd45_P'=>$sum36sd45_P, 'sum36sd45_jumlah' => $sum36sd45_jumlah,
            'sum46sd55_L'=>$sum25sd35_L,'sum46sd55_P'=>$sum46sd55_P, 'sum46sd55_jumlah' => $sum46sd55_jumlah,
            'sum56sd60_L'=>$sum56sd60_L,'sum56sd60_P'=>$sum56sd60_P, 'sum56sd60_jumlah' => $sum56sd60_jumlah,
            'total' => $total,  'totalpercent' => $totalpercent, 'totalsemua' => $totalsemua,
       ]);
      
    }
}
