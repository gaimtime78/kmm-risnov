<?php

namespace App\Http\Controllers\User;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Kependidikan\PenelitiPengabdiMagister;
use App\Models\Kependidikan\PenelitiPengabdiProfesi;
use App\Models\Kependidikan\PenelitiPengabdiSarjana;
use App\Models\PenelitiPengabdiSpesialis;
use App\Models\PenelitiPengabdiSpesialis1;
use App\Models\PenelitiPengabdiSpesialisKonsultan;

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
          "name"=> "sarjana",
          "data" => $data, "list_sumber" => $list_sumber, "list_tahun" => $list_tahun, 
          "list_fakultas" => $list_fakultas, "fakultas" => $fakultas, "tahun" => $tahun 
        ]);
      }
      return view('user.rida.grafik', [
        "name"=> "sarjana",
        "data" => [], "list_sumber" => [], "list_tahun" => [], 
        "list_fakultas" => [], "fakultas" => "", "tahun" => "" 
      ]);
      
    }

    public function spesialisKonsultan(Request $request){
      $list_tahun = PenelitiPengabdiSpesialisKonsultan::select("tahun_input")->distinct()->orderBy("tahun_input", "asc")->get();
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
        $data = PenelitiPengabdiSpesialisKonsultan::where("fakultas", $fakultas)->where("tahun_input", $tahun)->get();
        $list_fakultas = PenelitiPengabdiSpesialisKonsultan::select("fakultas")->distinct()->where("tahun_input", $tahun)->get();
        $list_sumber = PenelitiPengabdiSpesialisKonsultan::select("periode", "sumber_data")->distinct()->where("fakultas", $fakultas)->where("tahun_input", $tahun)->get();
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
}
