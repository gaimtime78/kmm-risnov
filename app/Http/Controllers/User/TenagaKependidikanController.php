<?php

namespace App\Http\Controllers\User;

use App\Exports\Rida\Kependidikan\D1Export;
use App\Exports\Rida\Kependidikan\D2Export;
use App\Exports\Rida\Kependidikan\D3Export;
use App\Exports\Rida\Kependidikan\D4Export;
use App\Exports\Rida\Kependidikan\MagisterExport;
use App\Exports\Rida\Kependidikan\ProfesiExport;
use App\Exports\Rida\Kependidikan\SarjanaExport;
use App\Exports\Rida\Kependidikan\SDExport;
use App\Exports\Rida\Kependidikan\SLTAExport;
use App\Exports\Rida\Kependidikan\SLTPExport;
use App\Exports\Rida\Kependidikan\Spesialis1Export;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Kependidikan\PenelitiPengabdiSpesialis1;
use App\Models\Kependidikan\PenelitiPengabdiMagister;
use App\Models\Kependidikan\PenelitiPengabdiProfesi;
use App\Models\Kependidikan\PenelitiPengabdiSarjana;
use App\Models\Kependidikan\PenelitiPengabdiDiploma4;
use App\Models\Kependidikan\PenelitiPengabdiDiploma3;
use App\Models\Kependidikan\PenelitiPengabdiDiploma2;
use App\Models\Kependidikan\PenelitiPengabdiDiploma1;
use App\Models\Kependidikan\PenelitiPengabdiSlta;
use App\Models\Kependidikan\PenelitiPengabdiSltp;
use App\Models\Kependidikan\PenelitiPengabdiSd;
use Maatwebsite\Excel\Facades\Excel;

class TenagaKependidikanController extends Controller
{
    public function index(){

      return view('user.rida.index', ['data' => "iki data"]);
    }

    public function spesialis1(Request $request){
        $list_tahun = PenelitiPengabdiSpesialis1::select("tahun_input")->distinct()->orderBy("tahun_input", "asc")->get();
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
          $data = PenelitiPengabdiSpesialis1::where("fakultas", $fakultas)->where("tahun_input", $tahun)->orderBy("periode")->get();
          $list_fakultas = PenelitiPengabdiSpesialis1::select("fakultas")->distinct()->where("tahun_input", $tahun)->get();
          $list_sumber = PenelitiPengabdiSpesialis1::select("periode", "sumber_data")->distinct()->where("fakultas", $fakultas)->where("tahun_input", $tahun)->get();
          $nama_table = PenelitiPengabdiSpesialis1::select("nama_table")->distinct()->get();

        //   dd($data);
          return view('user.rida.grafik', [
            "name"=> "Tenaga Kependidikan Spesialis 1",
            "data" => $data, "list_sumber" => $list_sumber, "list_tahun" => $list_tahun, 'nama_table'=> $nama_table,
            "list_fakultas" => $list_fakultas, "fakultas" => $fakultas, "tahun" => $tahun
          ]);
        }
        return view('user.rida.grafik', [
          "name"=> "Tenaga Kependidikan Spesialis 1",
          "data" => [], "list_sumber" => [], "list_tahun" => [], 'nama_table'=> $nama_table,
          "list_fakultas" => [], "fakultas" => "", "tahun" => ""
        ]);

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
        $data = PenelitiPengabdiMagister::where("fakultas", $fakultas)->where("tahun_input", $tahun)->orderBy("periode")->get();
        $list_fakultas = PenelitiPengabdiMagister::select("fakultas")->distinct()->where("tahun_input", $tahun)->get();
        $list_sumber = PenelitiPengabdiMagister::select("periode", "sumber_data")->distinct()->where("fakultas", $fakultas)->where("tahun_input", $tahun)->get();
        $nama_table = PenelitiPengabdiMagister::select("nama_table")->distinct()->get();

        // dd($list_sumber);
        return view('user.rida.grafik', [
          "name"=> "Tenaga Kependidikan Magister",
          "data" => $data, "list_sumber" => $list_sumber, "list_tahun" => $list_tahun, 'nama_table'=> $nama_table,
          "list_fakultas" => $list_fakultas, "fakultas" => $fakultas, "tahun" => $tahun
        ]);
      }
      return view('user.rida.grafik', [
        "name"=> "Tenaga Kependidikan Magister",
        "data" => [], "list_sumber" => [], "list_tahun" => [], 'nama_table'=> $nama_table,
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
        $data = PenelitiPengabdiProfesi::where("fakultas", $fakultas)->where("tahun_input", $tahun)->orderBy("periode")->get();
        $list_fakultas = PenelitiPengabdiProfesi::select("fakultas")->distinct()->where("tahun_input", $tahun)->get();
        $list_sumber = PenelitiPengabdiProfesi::select("periode", "sumber_data")->distinct()->where("fakultas", $fakultas)->where("tahun_input", $tahun)->get();
        // dd($list_sumber);
        $nama_table = PenelitiPengabdiProfesi::select("nama_table")->distinct()->get();
        return view('user.rida.grafik', [
          "name"=> "Tenaga Kependidikan Profesi",
          "data" => $data, "list_sumber" => $list_sumber, "list_tahun" => $list_tahun, 'nama_table'=> $nama_table,
          "list_fakultas" => $list_fakultas, "fakultas" => $fakultas, "tahun" => $tahun
        ]);
      }
      return view('user.rida.grafik', [
        "name"=> "Tenaga Kependidikan Profesi",
        "data" => [], "list_sumber" => [], "list_tahun" => [], 'nama_table'=> $nama_table,
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
        $data = PenelitiPengabdiSarjana::where("fakultas", $fakultas)->where("tahun_input", $tahun)->orderBy("periode")->get();
        $list_fakultas = PenelitiPengabdiSarjana::select("fakultas")->distinct()->where("tahun_input", $tahun)->get();
        $list_sumber = PenelitiPengabdiSarjana::select("periode", "sumber_data")->distinct()->where("fakultas", $fakultas)->where("tahun_input", $tahun)->get();
        $nama_table = PenelitiPengabdiSarjana::select("nama_table")->distinct()->get();
        // dd($list_sumber);
        return view('user.rida.grafik', [
          "name"=> "Tenaga Kependidikan Sarjana",
          "data" => $data, "list_sumber" => $list_sumber, "list_tahun" => $list_tahun, 'nama_table'=> $nama_table,
          "list_fakultas" => $list_fakultas, "fakultas" => $fakultas, "tahun" => $tahun
        ]);
      }
      return view('user.rida.grafik', [
        "name"=> "Tenaga Kependidikan Sarjana",
        "data" => [], "list_sumber" => [], "list_tahun" => [], 'nama_table'=> $nama_table,
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
        $data = PenelitiPengabdiDiploma4::where("fakultas", $fakultas)->where("tahun_input", $tahun)->orderBy("periode")->get();
        $list_fakultas = PenelitiPengabdiDiploma4::select("fakultas")->distinct()->where("tahun_input", $tahun)->get();
        $list_sumber = PenelitiPengabdiDiploma4::select("periode", "sumber_data")->distinct()->where("fakultas", $fakultas)->where("tahun_input", $tahun)->get();
        $nama_table = PenelitiPengabdiDiploma4::select("nama_table")->distinct()->get();
        // dd($list_sumber);
        return view('user.rida.grafik', [
          "name"=> "Tenaga Kependidikan D4",
          "data" => $data, "list_sumber" => $list_sumber, "list_tahun" => $list_tahun, 'nama_table'=> $nama_table,
          "list_fakultas" => $list_fakultas, "fakultas" => $fakultas, "tahun" => $tahun
        ]);
      }
      return view('user.rida.grafik', [
        "name"=> "Tenaga Kependidikan D4",
        "data" => [], "list_sumber" => [], "list_tahun" => [], 'nama_table'=> $nama_table,
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
        $data = PenelitiPengabdiDiploma3::where("fakultas", $fakultas)->where("tahun_input", $tahun)->orderBy("periode")->get();
        $list_fakultas = PenelitiPengabdiDiploma3::select("fakultas")->distinct()->where("tahun_input", $tahun)->get();
        $list_sumber = PenelitiPengabdiDiploma3::select("periode", "sumber_data")->distinct()->where("fakultas", $fakultas)->where("tahun_input", $tahun)->get();
        $nama_table = PenelitiPengabdiDiploma3::select("nama_table")->distinct()->get();
        // dd($list_sumber);
        return view('user.rida.grafik', [
          "name"=> "Tenaga Kependidikan D3",
          "data" => $data, "list_sumber" => $list_sumber, "list_tahun" => $list_tahun, 'nama_table'=> $nama_table,
          "list_fakultas" => $list_fakultas, "fakultas" => $fakultas, "tahun" => $tahun
        ]);
      }
      return view('user.rida.grafik', [
        "name"=> "Tenaga Kependidikan D3",
        "data" => [], "list_sumber" => [], "list_tahun" => [], 'nama_table'=> $nama_table,
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
        $data = PenelitiPengabdiDiploma2::where("fakultas", $fakultas)->where("tahun_input", $tahun)->orderBy("periode")->get();
        $list_fakultas = PenelitiPengabdiDiploma2::select("fakultas")->distinct()->where("tahun_input", $tahun)->get();
        $list_sumber = PenelitiPengabdiDiploma2::select("periode", "sumber_data")->distinct()->where("fakultas", $fakultas)->where("tahun_input", $tahun)->get();
        $nama_table = PenelitiPengabdiDiploma2::select("nama_table")->distinct()->get();
        // dd($list_sumber);
        return view('user.rida.grafik', [
          "name"=> "Tenaga Kependidikan D2",
          "data" => $data, "list_sumber" => $list_sumber, "list_tahun" => $list_tahun, 'nama_table'=> $nama_table,
          "list_fakultas" => $list_fakultas, "fakultas" => $fakultas, "tahun" => $tahun
        ]);
      }
      return view('user.rida.grafik', [
        "name"=> "Tenaga Kependidikan D2",
        "data" => [], "list_sumber" => [], "list_tahun" => [], 'nama_table'=> $nama_table,
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
        $data = PenelitiPengabdiDiploma1::where("fakultas", $fakultas)->where("tahun_input", $tahun)->orderBy("periode")->get();
        $list_fakultas = PenelitiPengabdiDiploma1::select("fakultas")->distinct()->where("tahun_input", $tahun)->get();
        $list_sumber = PenelitiPengabdiDiploma1::select("periode", "sumber_data")->distinct()->where("fakultas", $fakultas)->where("tahun_input", $tahun)->get();
        $nama_table = PenelitiPengabdiDiploma1::select("nama_table")->distinct()->get();
        // dd($list_sumber);
        return view('user.rida.grafik', [
          "name"=> "Tenaga Kependidikan D1",'nama_table'=> $nama_table,
          "data" => $data, "list_sumber" => $list_sumber, "list_tahun" => $list_tahun,
          "list_fakultas" => $list_fakultas, "fakultas" => $fakultas, "tahun" => $tahun
        ]);
      }
      return view('user.rida.grafik', [
        "name"=> "Tenaga Kependidikan D1",'nama_table'=> $nama_table,
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
        $data = PenelitiPengabdiSlta::where("fakultas", $fakultas)->where("tahun_input", $tahun)->orderBy("periode")->get();
        $list_fakultas = PenelitiPengabdiSlta::select("fakultas")->distinct()->where("tahun_input", $tahun)->get();
        $list_sumber = PenelitiPengabdiSlta::select("periode", "sumber_data")->distinct()->where("fakultas", $fakultas)->where("tahun_input", $tahun)->get();
        $nama_table = PenelitiPengabdiSlta::select("nama_table")->distinct()->get();
        // dd($list_sumber);
        return view('user.rida.grafik', [
          "name"=> "Tenaga Kependidikan SLTA",
          "data" => $data, "list_sumber" => $list_sumber, "list_tahun" => $list_tahun, 'nama_table'=> $nama_table,
          "list_fakultas" => $list_fakultas, "fakultas" => $fakultas, "tahun" => $tahun
        ]);
      }
      return view('user.rida.grafik', [
        "name"=> "Tenaga Kependidikan SLTA",
        "data" => [], "list_sumber" => [], "list_tahun" => [], 'nama_table'=> $nama_table,
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
        $data = PenelitiPengabdiSltp::where("fakultas", $fakultas)->where("tahun_input", $tahun)->orderBy("periode")->get();
        $list_fakultas = PenelitiPengabdiSltp::select("fakultas")->distinct()->where("tahun_input", $tahun)->get();
        $list_sumber = PenelitiPengabdiSltp::select("periode", "sumber_data")->distinct()->where("fakultas", $fakultas)->where("tahun_input", $tahun)->get();
        $nama_table = PenelitiPengabdiSltp::select("nama_table")->distinct()->get();
        // dd($list_sumber);
        return view('user.rida.grafik', [
          "name"=> "Tenaga Kependidikan SLTP",
          "data" => $data, "list_sumber" => $list_sumber, "list_tahun" => $list_tahun, 'nama_table'=> $nama_table,
          "list_fakultas" => $list_fakultas, "fakultas" => $fakultas, "tahun" => $tahun
        ]);
      }
      return view('user.rida.grafik', [
        "name"=> "Tenaga Kependidikan SLTP",'nama_table'=> $nama_table,
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
        $data = PenelitiPengabdiSd::where("fakultas", $fakultas)->where("tahun_input", $tahun)->orderBy("periode")->get();
        $list_fakultas = PenelitiPengabdiSd::select("fakultas")->distinct()->where("tahun_input", $tahun)->get();
        $list_sumber = PenelitiPengabdiSd::select("periode", "sumber_data")->distinct()->where("fakultas", $fakultas)->where("tahun_input", $tahun)->get();
        $nama_table = PenelitiPengabdiSd::select("nama_table")->distinct()->get();
        // dd($list_sumber);
        return view('user.rida.grafik', [
          "name"=> "Tenaga Kependidikan SD", 'nama_table'=> $nama_table,
          "data" => $data, "list_sumber" => $list_sumber, "list_tahun" => $list_tahun,
          "list_fakultas" => $list_fakultas, "fakultas" => $fakultas, "tahun" => $tahun
        ]);
      }
      return view('user.rida.grafik', [
        "name"=> "Tenaga Kependidikan SD", 'nama_table'=> $nama_table,
        "data" => [], "list_sumber" => [], "list_tahun" => [],
        "list_fakultas" => [], "fakultas" => "", "tahun" => ""
      ]);

    }

    public function pilih_periode_spesialis1($fakultas, $tahun){
        $fakultas  = $fakultas;
        $tahun  = $tahun;
        $data = PenelitiPengabdiSpesialis1::select('periode', 'tahun_input', 'sumber_data')->distinct()->where('fakultas', $fakultas)->where('tahun_input', $tahun)->orderBy('periode')->get('periode', 'tahun_input', 'sumber_data');
        $nama_table = PenelitiPengabdiSpesialis1::select("nama_table")->distinct()->get();

        return view('user.rida.pilih_periode',[ "name" => "Tenaga Kependidikan Spesialis 1", 'nama_table'=> $nama_table, 'data' => $data, 'fakultas' => $fakultas, 'tahun' => $tahun]);

      }

    public function pilih_periode_magister($fakultas, $tahun){
      $fakultas  = $fakultas;
      $tahun  = $tahun;
      $data = PenelitiPengabdiMagister::select('periode', 'tahun_input', 'sumber_data')->distinct()->where('fakultas', $fakultas)->where('tahun_input', $tahun)->orderBy('periode')->get('periode', 'tahun_input', 'sumber_data');
      $nama_table = PenelitiPengabdiMagister::select("nama_table")->distinct()->get();

      return view('user.rida.pilih_periode',[ "name" => "Tenaga Kependidikan Magister", 'nama_table'=> $nama_table, 'data' => $data, 'fakultas' => $fakultas, 'tahun' => $tahun]);

    }
    public function pilih_periode_profesi($fakultas, $tahun){
      $fakultas  = $fakultas;
      $tahun  = $tahun;
      $data = PenelitiPengabdiProfesi::select('periode', 'tahun_input', 'sumber_data')->distinct()->where('fakultas', $fakultas)->where('tahun_input', $tahun)->orderBy('periode')->get('periode', 'tahun_input', 'sumber_data');
      $nama_table = PenelitiPengabdiProfesi::select("nama_table")->distinct()->get();

      return view('user.rida.pilih_periode',[ "name" => "Tenaga Kependidikan Profesi", 'nama_table'=> $nama_table, 'data' => $data, 'fakultas' => $fakultas, 'tahun' => $tahun]);

    }
    public function pilih_periode_sarjana($fakultas, $tahun){
      $fakultas  = $fakultas;
      $tahun  = $tahun;
      $data = PenelitiPengabdiSarjana::select('periode', 'tahun_input', 'sumber_data')->distinct()->where('fakultas', $fakultas)->where('tahun_input', $tahun)->orderBy('periode')->get('periode', 'tahun_input', 'sumber_data');
      $nama_table = PenelitiPengabdiSarjana::select("nama_table")->distinct()->get();

      return view('user.rida.pilih_periode',[ "name" => "Tenaga Kependidikan Sarjana", 'nama_table'=> $nama_table,'data' => $data, 'fakultas' => $fakultas, 'tahun' => $tahun]);

    }
    public function pilih_periode_d4($fakultas, $tahun){
      $fakultas  = $fakultas;
      $tahun  = $tahun;
      $data = PenelitiPengabdiDiploma4::select('periode', 'tahun_input', 'sumber_data')->distinct()->where('fakultas', $fakultas)->where('tahun_input', $tahun)->orderBy('periode')->get('periode', 'tahun_input', 'sumber_data');
      $nama_table = PenelitiPengabdiDiploma4::select("nama_table")->distinct()->get();

      return view('user.rida.pilih_periode',[ "name" => "Tenaga Kependidikan D4", 'nama_table'=> $nama_table, 'data' => $data, 'fakultas' => $fakultas, 'tahun' => $tahun]);

    }
    public function pilih_periode_d3($fakultas, $tahun){
      $fakultas  = $fakultas;
      $tahun  = $tahun;
      $data = PenelitiPengabdiDiploma3::select('periode', 'tahun_input', 'sumber_data')->distinct()->where('fakultas', $fakultas)->where('tahun_input', $tahun)->orderBy('periode')->get('periode', 'tahun_input', 'sumber_data');
      $nama_table = PenelitiPengabdiDiploma3::select("nama_table")->distinct()->get();

      return view('user.rida.pilih_periode',[ "name" => "Tenaga Kependidikan D3", 'nama_table'=> $nama_table, 'data' => $data, 'fakultas' => $fakultas, 'tahun' => $tahun]);

    }
    public function pilih_periode_d2($fakultas, $tahun){
      $fakultas  = $fakultas;
      $tahun  = $tahun;
      $data = PenelitiPengabdiDiploma2::select('periode', 'tahun_input', 'sumber_data')->distinct()->where('fakultas', $fakultas)->where('tahun_input', $tahun)->get('periode', 'tahun_input', 'sumber_data');
      $nama_table = PenelitiPengabdiDiploma2::select("nama_table")->distinct()->get();

      return view('user.rida.pilih_periode',[ "name" => "Tenaga Kependidikan D2", 'nama_table'=> $nama_table, 'data' => $data, 'fakultas' => $fakultas, 'tahun' => $tahun]);

    }
    public function pilih_periode_d1($fakultas, $tahun){
      $fakultas  = $fakultas;
      $tahun  = $tahun;
      $data = PenelitiPengabdiDiploma1::select('periode', 'tahun_input', 'sumber_data')->distinct()->where('fakultas', $fakultas)->where('tahun_input', $tahun)->orderBy('periode')->get('periode', 'tahun_input', 'sumber_data');
      $nama_table = PenelitiPengabdiDiploma1::select("nama_table")->distinct()->get();

      return view('user.rida.pilih_periode',[ "name" => "Tenaga Kependidikan D1", 'nama_table'=> $nama_table, 'data' => $data, 'fakultas' => $fakultas, 'tahun' => $tahun]);

    }
    public function pilih_periode_slta($fakultas, $tahun){
      $fakultas  = $fakultas;
      $tahun  = $tahun;
      $data = PenelitiPengabdiSlta::select('periode', 'tahun_input', 'sumber_data')->distinct()->where('fakultas', $fakultas)->where('tahun_input', $tahun)->orderBy('periode')->get('periode', 'tahun_input', 'sumber_data');
      $nama_table = PenelitiPengabdiSlta::select("nama_table")->distinct()->get();

      return view('user.rida.pilih_periode',[ "name" => "Tenaga Kependidikan SLTA", 'nama_table'=> $nama_table, 'data' => $data, 'fakultas' => $fakultas, 'tahun' => $tahun]);

    }
    public function pilih_periode_sltp($fakultas, $tahun){
      $fakultas  = $fakultas;
      $tahun  = $tahun;
      $data = PenelitiPengabdiSltp::select('periode', 'tahun_input', 'sumber_data')->distinct()->where('fakultas', $fakultas)->where('tahun_input', $tahun)->orderBy('periode')->get('periode', 'tahun_input', 'sumber_data');
      $nama_table = PenelitiPengabdiSltp::select("nama_table")->distinct()->get();

      return view('user.rida.pilih_periode',[ "name" => "Tenaga Kependidikan SLTP", 'nama_table'=> $nama_table, 'data' => $data, 'fakultas' => $fakultas, 'tahun' => $tahun]);

    }
    public function pilih_periode_sd($fakultas, $tahun){
      $fakultas  = $fakultas;
      $tahun  = $tahun;
      $data = PenelitiPengabdiSd::select('periode', 'tahun_input', 'sumber_data')->distinct()->where('fakultas', $fakultas)->where('tahun_input', $tahun)->orderBy('periode')->get('periode', 'tahun_input', 'sumber_data');
      $nama_table = PenelitiPengabdiSd::select("nama_table")->distinct()->get();

      return view('user.rida.pilih_periode',[ "name" => "Tenaga Kependidikan SD", 'nama_table'=> $nama_table, 'data' => $data, 'fakultas' => $fakultas, 'tahun' => $tahun]);

    }

    public function detail_spesialis1($fakultas, $tahun, $periode){
        $fakultas  = $fakultas;
        $tahun  = $tahun;

        $data = PenelitiPengabdiSpesialis1::where([['fakultas', $fakultas], ['periode', $periode], ['tahun_input', $tahun]])->get();

        $sum25_L           = PenelitiPengabdiSpesialis1::where([['fakultas', $fakultas], ['periode', $periode]])->sum('usia25_L');
        $sum25_P           = PenelitiPengabdiSpesialis1::where([['fakultas', $fakultas], ['periode', $periode]])->sum('usia25_P');
        $sum25_jumlah           = PenelitiPengabdiSpesialis1::where([['fakultas', $fakultas], ['periode', $periode]])->sum('usia25_jumlah');

        $sum25sd35_L       = PenelitiPengabdiSpesialis1::where([['fakultas', $fakultas], ['periode', $periode]])->sum('usia25sd35_L');
        $sum25sd35_P       = PenelitiPengabdiSpesialis1::where([['fakultas', $fakultas], ['periode', $periode]])->sum('usia25sd35_P');
        $sum25sd35_jumlah       = PenelitiPengabdiSpesialis1::where([['fakultas', $fakultas], ['periode', $periode]])->sum('usia25sd35_jumlah');

        $sum36sd45_L       = PenelitiPengabdiSpesialis1::where([['fakultas', $fakultas], ['periode', $periode]])->sum('usia36sd45_L');
        $sum36sd45_P       = PenelitiPengabdiSpesialis1::where([['fakultas', $fakultas], ['periode', $periode]])->sum('usia36sd45_P');
        $sum36sd45_jumlah       = PenelitiPengabdiSpesialis1::where([['fakultas', $fakultas], ['periode', $periode]])->sum('usia36sd45_jumlah');

        $sum46sd55_L       = PenelitiPengabdiSpesialis1::where([['fakultas', $fakultas], ['periode', $periode]])->sum('usia46sd55_L');
        $sum46sd55_P       = PenelitiPengabdiSpesialis1::where([['fakultas', $fakultas], ['periode', $periode]])->sum('usia46sd55_P');
        $sum46sd55_jumlah       = PenelitiPengabdiSpesialis1::where([['fakultas', $fakultas], ['periode', $periode]])->sum('usia46sd55_jumlah');

        $sum56sd60_L       = PenelitiPengabdiSpesialis1::where([['fakultas', $fakultas], ['periode', $periode]])->sum('usia56sd60_L');
        $sum56sd60_P       = PenelitiPengabdiSpesialis1::where([['fakultas', $fakultas], ['periode', $periode]])->sum('usia56sd60_P');
        $sum56sd60_jumlah       = PenelitiPengabdiSpesialis1::where([['fakultas', $fakultas], ['periode', $periode]])->sum('usia56sd60_jumlah');

        $total                  = PenelitiPengabdiSpesialis1::where([['fakultas', $fakultas], ['periode', $periode]])->sum('total');
        $totalsemua             = PenelitiPengabdiSpesialis1::where([['fakultas',  $fakultas], ['periode', $periode]])->sum('total');
        $totalpercent               = $total / $totalsemua * 100;
        $nama_table = PenelitiPengabdiSpesialis1::select("nama_table")->distinct()->get();

        $list_sumber = PenelitiPengabdiSpesialis1::select("periode", "sumber_data")->distinct()->where("periode", $periode)->where("fakultas", $fakultas)->where("tahun_input", $tahun)->orderBy("periode")->get();
        return view('user.rida.detail-kependidikan',[
          'name' => 'Tenaga Kependidikan Spesialis 1', 'tahun' => $tahun , 'periode'=>$periode, 'data' => $data, 'fakultas' => $fakultas, 'nama_table'=> $nama_table,
          'sum25_L'=>$sum25_L,'sum25_P'=>$sum25_P, 'sum25_jumlah' => $sum25_jumlah,
          'sum25sd35_L'=>$sum25sd35_L,'sum25sd35_P'=>$sum25sd35_P, 'sum25sd35_jumlah' => $sum25sd35_jumlah,
          'sum36sd45_L'=>$sum36sd45_L,'sum36sd45_P'=>$sum36sd45_P, 'sum36sd45_jumlah' => $sum36sd45_jumlah,
          'sum46sd55_L'=>$sum46sd55_L,'sum46sd55_P'=>$sum46sd55_P, 'sum46sd55_jumlah' => $sum46sd55_jumlah,
          'sum56sd60_L'=>$sum56sd60_L,'sum56sd60_P'=>$sum56sd60_P, 'sum56sd60_jumlah' => $sum56sd60_jumlah,
          'total' => $total,  'totalpercent' => $totalpercent, 'totalsemua' => $totalsemua,"list_sumber" => $list_sumber,
        ]);

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
      $totalsemua             = PenelitiPengabdiMagister::where([['fakultas',  $fakultas], ['periode', $periode]])->sum('total');
      $totalpercent               = $total / $totalsemua * 100;
      $nama_table = PenelitiPengabdiMagister::select("nama_table")->distinct()->get();

      $list_sumber = PenelitiPengabdiMagister::select("periode", "sumber_data")->distinct()->where("periode", $periode)->where("fakultas", $fakultas)->where("tahun_input", $tahun)->orderBy("periode")->get();
      return view('user.rida.detail-kependidikan',[
        'name' => 'Tenaga Kependidikan Magister', 'tahun' => $tahun , 'periode'=>$periode, 'data' => $data, 'fakultas' => $fakultas, 'nama_table'=> $nama_table,
        'sum25_L'=>$sum25_L,'sum25_P'=>$sum25_P, 'sum25_jumlah' => $sum25_jumlah,
        'sum25sd35_L'=>$sum25sd35_L,'sum25sd35_P'=>$sum25sd35_P, 'sum25sd35_jumlah' => $sum25sd35_jumlah,
        'sum36sd45_L'=>$sum36sd45_L,'sum36sd45_P'=>$sum36sd45_P, 'sum36sd45_jumlah' => $sum36sd45_jumlah,
        'sum46sd55_L'=>$sum46sd55_L,'sum46sd55_P'=>$sum46sd55_P, 'sum46sd55_jumlah' => $sum46sd55_jumlah,
        'sum56sd60_L'=>$sum56sd60_L,'sum56sd60_P'=>$sum56sd60_P, 'sum56sd60_jumlah' => $sum56sd60_jumlah,
        'total' => $total,  'totalpercent' => $totalpercent, 'totalsemua' => $totalsemua,"list_sumber" => $list_sumber,
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
      $totalsemua        = PenelitiPengabdiProfesi::where([['fakultas',  $fakultas], ['periode', $periode]])->sum('total');
      $totalpercent      = $total / $totalsemua * 100;
      $nama_table = PenelitiPengabdiProfesi::select("nama_table")->distinct()->get();
      $list_sumber = PenelitiPengabdiProfesi::select("periode", "sumber_data")->distinct()->where("periode", $periode)->where("fakultas", $fakultas)->where("tahun_input", $tahun)->orderBy("periode")->get();

      return view('user.rida.detail-kependidikan',[
        "list_sumber" => $list_sumber,
        'name' => 'Tenaga Kependidikan Profesi', 'tahun' => $tahun , 'periode'=>$periode, 'data' => $data, 'fakultas' => $fakultas, 'nama_table'=> $nama_table,
        'sum25_L'=>$sum25_L,'sum25_P'=>$sum25_P, 'sum25_jumlah' => $sum25_jumlah,
        'sum25sd35_L'=>$sum25sd35_L,'sum25sd35_P'=>$sum25sd35_P, 'sum25sd35_jumlah' => $sum25sd35_jumlah,
        'sum36sd45_L'=>$sum36sd45_L,'sum36sd45_P'=>$sum36sd45_P, 'sum36sd45_jumlah' => $sum36sd45_jumlah,
        'sum46sd55_L'=>$sum46sd55_L,'sum46sd55_P'=>$sum46sd55_P, 'sum46sd55_jumlah' => $sum46sd55_jumlah,
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
      $totalsemua        = PenelitiPengabdiSarjana::where([['fakultas',  $fakultas], ['periode', $periode]])->sum('total');
      $totalpercent      = $total / $totalsemua * 100;
      $nama_table = PenelitiPengabdiSarjana::select("nama_table")->distinct()->get();
      $list_sumber = PenelitiPengabdiSarjana::select("periode", "sumber_data")->distinct()->where("fakultas", $fakultas)->where("tahun_input", $tahun)->orderBy("periode")->get();

      return view('user.rida.detail-kependidikan',[
        "list_sumber" => $list_sumber,
        'name' => 'Tenaga Kependidikan Sarjana', 'tahun' => $tahun , 'periode'=>$periode, 'data' => $data, 'fakultas' => $fakultas,
        'nama_table'=> $nama_table,
        'sum25_L'=>$sum25_L,'sum25_P'=>$sum25_P, 'sum25_jumlah' => $sum25_jumlah,
        'sum25sd35_L'=>$sum25sd35_L,'sum25sd35_P'=>$sum25sd35_P, 'sum25sd35_jumlah' => $sum25sd35_jumlah,
        'sum36sd45_L'=>$sum36sd45_L,'sum36sd45_P'=>$sum36sd45_P, 'sum36sd45_jumlah' => $sum36sd45_jumlah,
        'sum46sd55_L'=>$sum46sd55_L,'sum46sd55_P'=>$sum46sd55_P, 'sum46sd55_jumlah' => $sum46sd55_jumlah,
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
      $totalsemua        = PenelitiPengabdiDiploma4::where([['fakultas',  $fakultas], ['periode', $periode]])->sum('total');
      $totalpercent      = $total / $totalsemua * 100;
      $nama_table = PenelitiPengabdiDiploma4::select("nama_table")->distinct()->get();
      $list_sumber = PenelitiPengabdiDiploma4::select("periode", "sumber_data")->distinct()->where("periode", $periode)->where("fakultas", $fakultas)->where("tahun_input", $tahun)->orderBy("periode")->get();

      return view('user.rida.detail-kependidikan',[
        "list_sumber" => $list_sumber,
        'name' => 'Tenaga Kependidikan D4', 'tahun' => $tahun , 'periode'=>$periode, 'data' => $data, 'fakultas' => $fakultas,
        'nama_table'=> $nama_table,
        'sum25_L'=>$sum25_L,'sum25_P'=>$sum25_P, 'sum25_jumlah' => $sum25_jumlah,
        'sum25sd35_L'=>$sum25sd35_L,'sum25sd35_P'=>$sum25sd35_P, 'sum25sd35_jumlah' => $sum25sd35_jumlah,
        'sum36sd45_L'=>$sum36sd45_L,'sum36sd45_P'=>$sum36sd45_P, 'sum36sd45_jumlah' => $sum36sd45_jumlah,
        'sum46sd55_L'=>$sum46sd55_L,'sum46sd55_P'=>$sum46sd55_P, 'sum46sd55_jumlah' => $sum46sd55_jumlah,
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
      $totalsemua        = PenelitiPengabdiDiploma3::where([['fakultas',  $fakultas], ['periode', $periode]])->sum('total');
      $totalpercent      = $total / $totalsemua * 100;
      $nama_table = PenelitiPengabdiDiploma3::select("nama_table")->distinct()->get();
      $list_sumber = PenelitiPengabdiDiploma3::select("periode", "sumber_data")->distinct()->where("periode", $periode)->where("fakultas", $fakultas)->where("tahun_input", $tahun)->orderBy("periode")->get();

      return view('user.rida.detail-kependidikan',[
        "list_sumber" => $list_sumber,
        'name' => 'Tenaga Kependidikan D3', 'tahun' => $tahun , 'periode'=>$periode, 'data' => $data, 'fakultas' => $fakultas,
        'nama_table'=> $nama_table,
        'sum25_L'=>$sum25_L,'sum25_P'=>$sum25_P, 'sum25_jumlah' => $sum25_jumlah,
        'sum25sd35_L'=>$sum25sd35_L,'sum25sd35_P'=>$sum25sd35_P, 'sum25sd35_jumlah' => $sum25sd35_jumlah,
        'sum36sd45_L'=>$sum36sd45_L,'sum36sd45_P'=>$sum36sd45_P, 'sum36sd45_jumlah' => $sum36sd45_jumlah,
        'sum46sd55_L'=>$sum46sd55_L,'sum46sd55_P'=>$sum46sd55_P, 'sum46sd55_jumlah' => $sum46sd55_jumlah,
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
      $totalsemua        = PenelitiPengabdiDiploma2::where([['fakultas',  $fakultas], ['periode', $periode]])->sum('total');
      $totalpercent      = $total / $totalsemua * 100;
      $nama_table = PenelitiPengabdiDiploma2::select("nama_table")->distinct()->get();
      $list_sumber = PenelitiPengabdiDiploma2::select("periode", "sumber_data")->distinct()->where("periode", $periode)->where("fakultas", $fakultas)->where("tahun_input", $tahun)->orderBy("periode")->get();

      return view('user.rida.detail-kependidikan',[
        "list_sumber" => $list_sumber,
        'nama_table'=> $nama_table,
        'name' => 'Tenaga Kependidikan D2', 'tahun' => $tahun , 'periode'=>$periode, 'data' => $data, 'fakultas' => $fakultas,
        'sum25_L'=>$sum25_L,'sum25_P'=>$sum25_P, 'sum25_jumlah' => $sum25_jumlah,
        'sum25sd35_L'=>$sum25sd35_L,'sum25sd35_P'=>$sum25sd35_P, 'sum25sd35_jumlah' => $sum25sd35_jumlah,
        'sum36sd45_L'=>$sum36sd45_L,'sum36sd45_P'=>$sum36sd45_P, 'sum36sd45_jumlah' => $sum36sd45_jumlah,
        'sum46sd55_L'=>$sum46sd55_L,'sum46sd55_P'=>$sum46sd55_P, 'sum46sd55_jumlah' => $sum46sd55_jumlah,
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
      $totalsemua        = PenelitiPengabdiDiploma1::where([['fakultas',  $fakultas], ['periode', $periode]])->sum('total');
      $totalpercent      = $total / $totalsemua * 100;
      $nama_table = PenelitiPengabdiDiploma1::select("nama_table")->distinct()->get();
      $list_sumber = PenelitiPengabdiDiploma1::select("periode", "sumber_data")->distinct()->where("periode", $periode)->where("fakultas", $fakultas)->where("tahun_input", $tahun)->orderBy("periode")->get();

      return view('user.rida.detail-kependidikan',[
        "list_sumber" => $list_sumber,
        'nama_table'=> $nama_table,
        'name' => 'Tenaga Kependidikan D1', 'tahun' => $tahun , 'periode'=>$periode, 'data' => $data, 'fakultas' => $fakultas,
        'sum25_L'=>$sum25_L,'sum25_P'=>$sum25_P, 'sum25_jumlah' => $sum25_jumlah,
        'sum25sd35_L'=>$sum25sd35_L,'sum25sd35_P'=>$sum25sd35_P, 'sum25sd35_jumlah' => $sum25sd35_jumlah,
        'sum36sd45_L'=>$sum36sd45_L,'sum36sd45_P'=>$sum36sd45_P, 'sum36sd45_jumlah' => $sum36sd45_jumlah,
        'sum46sd55_L'=>$sum46sd55_L,'sum46sd55_P'=>$sum46sd55_P, 'sum46sd55_jumlah' => $sum46sd55_jumlah,
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

      $sum60_L       = PenelitiPengabdiSlta::where([['fakultas', $fakultas], ['periode', $periode]])->sum('usia60_L');
      $sum60_P       = PenelitiPengabdiSlta::where([['fakultas', $fakultas], ['periode', $periode]])->sum('usia60_P');
      $sum60_jumlah  = PenelitiPengabdiSlta::where([['fakultas', $fakultas], ['periode', $periode]])->sum('usia60_jumlah');

      $total             = PenelitiPengabdiSlta::where([['fakultas', $fakultas], ['periode', $periode]])->sum('total');
      $totalsemua        = PenelitiPengabdiSlta::where([['fakultas',  $fakultas], ['periode', $periode]])->sum('total');
      $totalpercent      = $total / $totalsemua * 100;

      $nama_table = PenelitiPengabdiSlta::select("nama_table")->distinct()->where("fakultas", $fakultas)->get();
      // dd($nama_table);
      $list_sumber = PenelitiPengabdiSlta::select("periode", "sumber_data")->distinct()->where("periode", $periode)->where("fakultas", $fakultas)->where("tahun_input", $tahun)->orderBy("periode")->get();

      return view('user.rida.detail-kependidikan-slta',[
        "list_sumber" => $list_sumber,
        'nama_table'=> $nama_table,
        'name' => 'Tenaga Kependidikan SLTA', 'tahun' => $tahun , 'periode'=>$periode, 'data' => $data, 'fakultas' => $fakultas,
        'sum25_L'=>$sum25_L,'sum25_P'=>$sum25_P, 'sum25_jumlah' => $sum25_jumlah,
        'sum25sd35_L'=>$sum25sd35_L,'sum25sd35_P'=>$sum25sd35_P, 'sum25sd35_jumlah' => $sum25sd35_jumlah,
        'sum36sd45_L'=>$sum36sd45_L,'sum36sd45_P'=>$sum36sd45_P, 'sum36sd45_jumlah' => $sum36sd45_jumlah,
        'sum46sd55_L'=>$sum46sd55_L,'sum46sd55_P'=>$sum46sd55_P, 'sum46sd55_jumlah' => $sum46sd55_jumlah,
        'sum56sd60_L'=>$sum56sd60_L,'sum56sd60_P'=>$sum56sd60_P, 'sum56sd60_jumlah' => $sum56sd60_jumlah,
        'sum60_L'=>$sum60_L,'sum60_P'=>$sum60_P, 'sum60_jumlah' => $sum60_jumlah,

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
      $totalsemua        = PenelitiPengabdiSltp::where([['fakultas',  $fakultas], ['periode', $periode]])->sum('total');
      $totalpercent      = $total / $totalsemua * 100;

      $nama_table = PenelitiPengabdiSltp::select("nama_table")->distinct()->where("fakultas", $fakultas)->get();
      $list_sumber = PenelitiPengabdiSltp::select("periode", "sumber_data")->distinct()->where("periode", $periode)->where("fakultas", $fakultas)->where("tahun_input", $tahun)->orderBy("periode")->get();

      return view('user.rida.detail-kependidikan',[
        "list_sumber" => $list_sumber,
        'nama_table'=> $nama_table,
        'name' => 'Tenaga Kependidikan SLTP', 'tahun' => $tahun , 'periode'=>$periode, 'data' => $data, 'fakultas' => $fakultas,
        'sum25_L'=>$sum25_L,'sum25_P'=>$sum25_P, 'sum25_jumlah' => $sum25_jumlah,
        'sum25sd35_L'=>$sum25sd35_L,'sum25sd35_P'=>$sum25sd35_P, 'sum25sd35_jumlah' => $sum25sd35_jumlah,
        'sum36sd45_L'=>$sum36sd45_L,'sum36sd45_P'=>$sum36sd45_P, 'sum36sd45_jumlah' => $sum36sd45_jumlah,
        'sum46sd55_L'=>$sum46sd55_L,'sum46sd55_P'=>$sum46sd55_P, 'sum46sd55_jumlah' => $sum46sd55_jumlah,
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
      $totalsemua        = PenelitiPengabdiSd::where([['fakultas',  $fakultas], ['periode', $periode]])->sum('total');
      $totalpercent      = $total / $totalsemua * 100;

      $nama_table = PenelitiPengabdiSd::select("nama_table")->distinct()->where("fakultas", $fakultas)->get();
      $list_sumber = PenelitiPengabdiSd::select("periode", "sumber_data")->distinct()->where("periode", $periode)->where("fakultas", $fakultas)->where("tahun_input", $tahun)->orderBy("periode")->get();

      return view('user.rida.detail-kependidikan',[
        "list_sumber" => $list_sumber,
        'nama_table'=> $nama_table,
        'name' => 'Tenaga Kependidikan SD', 'tahun' => $tahun , 'periode'=>$periode, 'data' => $data, 'fakultas' => $fakultas,
        'sum25_L'=>$sum25_L,'sum25_P'=>$sum25_P, 'sum25_jumlah' => $sum25_jumlah,
        'sum25sd35_L'=>$sum25sd35_L,'sum25sd35_P'=>$sum25sd35_P, 'sum25sd35_jumlah' => $sum25sd35_jumlah,
        'sum36sd45_L'=>$sum36sd45_L,'sum36sd45_P'=>$sum36sd45_P, 'sum36sd45_jumlah' => $sum36sd45_jumlah,
        'sum46sd55_L'=>$sum46sd55_L,'sum46sd55_P'=>$sum46sd55_P, 'sum46sd55_jumlah' => $sum46sd55_jumlah,
        'sum56sd60_L'=>$sum56sd60_L,'sum56sd60_P'=>$sum56sd60_P, 'sum56sd60_jumlah' => $sum56sd60_jumlah,
        'total' => $total,  'totalpercent' => $totalpercent, 'totalsemua' => $totalsemua,
      ]);
    }

    public function export_d1($fakultas, $tahun) {
      return Excel::download(new D1Export($fakultas, $tahun), 'Usia Produktif Kependidikan Diploma 1.xlsx');
    }

    public function export_d2($fakultas, $tahun) {
      return Excel::download(new D2Export($fakultas, $tahun), 'Usia Produktif Kependidikan Diploma 2.xlsx');
    }

    public function export_d3($fakultas, $tahun) {
      return Excel::download(new D3Export($fakultas, $tahun), 'Usia Produktif Kependidikan Diploma 3.xlsx');
    }

    public function export_d4($fakultas, $tahun) {
      return Excel::download(new D4Export($fakultas, $tahun), 'Usia Produktif Kependidikan Diploma 4.xlsx');
    }

    public function export_magister($fakultas, $tahun) {
      return Excel::download(new MagisterExport($fakultas, $tahun), 'Usia Produktif Kependidikan Magister.xlsx');
    }

    public function export_spesialis1($fakultas, $tahun) {
        return Excel::download(new Spesialis1Export($fakultas, $tahun), 'Usia Produktif Kependidikan Spesialis 1.xlsx');
      }

    public function export_profesi($fakultas, $tahun) {
      return Excel::download(new ProfesiExport($fakultas, $tahun), 'Usia Produktif Kependidikan Profesi.xlsx');
    }

    public function export_sarjana($fakultas, $tahun) {
      return Excel::download(new SarjanaExport($fakultas, $tahun), 'Usia Produktif Kependidikan Sarjana.xlsx');
    }

    public function export_sd($fakultas, $tahun) {
      return Excel::download(new SDExport($fakultas, $tahun), 'Usia Produktif Kependidikan SD.xlsx');
    }

    public function export_slta($fakultas, $tahun) {
      return Excel::download(new SLTAExport($fakultas, $tahun), 'Usia Produktif Kependidikan SLTA.xlsx');
    }

    public function export_sltp($fakultas, $tahun) {
      return Excel::download(new SLTPExport($fakultas, $tahun), 'Usia Produktif Kependidikan SLTP.xlsx');
    }
  }


