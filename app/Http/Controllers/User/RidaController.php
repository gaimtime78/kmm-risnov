<?php

namespace App\Http\Controllers\User;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\PenelitiPengabdi;

class RidaController extends Controller
{
    public function index(){

      return view('user.rida.index', ['data' => "iki data"]);
    }
    public function doktoral(Request $request){
      $list_tahun = PenelitiPengabdi::select("tahun_input")->distinct()->orderBy("tahun_input", "asc")->get();
      $latest_tahun = $list_tahun[0]->tahun_input;

      $fakultas = "Universitas Sebelas Maret";
      $tahun = $latest_tahun;
      if($request->has("fakultas")){
        $fakultas = $request->input("fakultas");
      }
      if($request->has("tahun")){
        $tahun = $request->input("tahun");      
      }
      $data = PenelitiPengabdi::where("fakultas", $fakultas)->where("tahun_input", $tahun)->get();
      $list_fakultas = PenelitiPengabdi::select("fakultas")->distinct()->where("tahun_input", $tahun)->get();
      $list_sumber = PenelitiPengabdi::select("periode", "sumber_data")->distinct()->where("fakultas", $fakultas)->where("tahun_input", $tahun)->get();
      // dd($list_sumber);
      return view('user.rida.doktoral', [
        "data" => $data, "list_sumber" => $list_sumber, "list_tahun" => $list_tahun, 
        "list_fakultas" => $list_fakultas, "fakultas" => $fakultas, "tahun" => $tahun 
      ]);
    }
}
