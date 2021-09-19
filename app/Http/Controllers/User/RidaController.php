<?php

namespace App\Http\Controllers\User;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\PenelitiPengabdi;
use App\Models\PenelitiPengabdiMagister;
use App\Models\PenelitiPengabdiSpesialis;
use App\Models\PenelitiPengabdiProfesi;
use App\Models\PenelitiPengabdiSpesialis1;
use App\Models\PenelitiPengabdiSpesialisKonsultan;

class RidaController extends Controller
{
    public function index(){ 
      $data  = PenelitiPengabdi::select("nama_table","jenjang")->distinct()->get("nama_table","jenjang");
      $data2  = PenelitiPengabdiMagister::select("nama_table","jenjang")->distinct()->get("nama_table","jenjang");
      $data3  = PenelitiPengabdiProfesi::select("nama_table","jenjang")->distinct()->get("nama_table","jenjang");
      $data4  = PenelitiPengabdiSpesialis::select("nama_table","jenjang")->distinct()->get("nama_table","jenjang");
      $data5  = PenelitiPengabdiSpesialis1::select("nama_table","jenjang")->distinct()->get("nama_table","jenjang");
      $data6  = PenelitiPengabdiSpesialisKonsultan::select("nama_table","jenjang")->distinct()->get("nama_table","jenjang");

      $slug   = PenelitiPengabdi::select("jenjang")->distinct()->orderBy("jenjang", "asc")->get();
      $slug2  = PenelitiPengabdiMagister::select("jenjang")->distinct()->orderBy("jenjang", "asc")->get();
      $slug3  = PenelitiPengabdiProfesi::select("jenjang")->distinct()->orderBy("jenjang", "asc")->get();
      $slug4  = PenelitiPengabdiSpesialis::select("jenjang")->distinct()->orderBy("jenjang", "asc")->get();
      $slug5  = PenelitiPengabdiSpesialis1::select("jenjang")->distinct()->orderBy("jenjang", "asc")->get();
      $slug6  = PenelitiPengabdiSpesialisKonsultan ::select("jenjang")->distinct()->orderBy("jenjang", "asc")->get();
      
     return view('user.rida.index', ["name"=> "rida-".$slug, "data" => $data, 
                  "name"=> $slug2, "data2"=>$data2,
                  "name"=> $slug3, "data3"=>$data3,
                  "name"=> $slug4, "data4"=>$data4,
                  "name"=> $slug5, "data5"=>$data5,
                  "name"=> $slug6, "data6"=>$data6,
      ]);
    }
    
    public function doktoral(Request $request, $jenjang){
      $list_tahun = PenelitiPengabdi::select("tahun_input")->distinct()->orderBy("tahun_input", "asc")->get();
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
        $data = PenelitiPengabdi::where("fakultas", $fakultas)->where("tahun_input", $tahun)->get();
        $list_fakultas = PenelitiPengabdi::select("fakultas")->distinct()->where("tahun_input", $tahun)->get();
        $list_sumber = PenelitiPengabdi::select("periode", "sumber_data")->distinct()->where("fakultas", $fakultas)->where("tahun_input", $tahun)->get();
        // dd($list_sumber);
        return view('user.rida.grafik', [
          "name"=> "Usia Produktif Doktor",
          "data" => $data, "list_sumber" => $list_sumber, "list_tahun" => $list_tahun, 
          "list_fakultas" => $list_fakultas, "fakultas" => $fakultas, "tahun" => $tahun 
        ]);
      }
      return view('user.rida.grafik', [
        "name"=> "Usia Produktif Doktor",
        "data" => [], "list_sumber" => [], "list_tahun" => [], 
        "list_fakultas" => [], "fakultas" => "", "tahun" => "" 
      ]);
      
    }

    public function pilih_periode_doktor($fakultas, $tahun){
      $fakultas  = $fakultas;
      $tahun  = $tahun;
      $data = PenelitiPengabdi::select('periode', 'tahun_input', 'sumber_data')->distinct()->where('fakultas', $fakultas)->where('tahun_input', $tahun)->get('periode', 'tahun_input', 'sumber_data');

       return view('user.rida.pilih_periode',[ "name" => "Rentang Usia Produktif Peneliti dan Pengabdi Jenjang Doktor", 'data' => $data, 'fakultas' => $fakultas, 'tahun' => $tahun]);
    }

    public function detail_doktor($fakultas, $tahun, $periode){
      $fakultas  = $fakultas;
      $tahun  = $tahun;

      $data = PenelitiPengabdi::where([['fakultas', $fakultas], ['periode', $periode], ['tahun_input', $tahun]])->get();

      $sum25sd35_jumlah       = PenelitiPengabdi::where([['fakultas', $fakultas], ['periode', $periode]])->sum('usia25sd35_jumlah');
      $sum36sd45_jumlah       = PenelitiPengabdi::where([['fakultas', $fakultas], ['periode', $periode]])->sum('usia36sd45_jumlah');
      $sum46sd55_jumlah       = PenelitiPengabdi::where([['fakultas', $fakultas], ['periode', $periode]])->sum('usia46sd55_jumlah');
      $sum56sd65_jumlah       = PenelitiPengabdi::where([['fakultas', $fakultas], ['periode', $periode]])->sum('usia56sd65_jumlah');
      $sum66sd75_jumlah       = PenelitiPengabdi::where([['fakultas', $fakultas], ['periode', $periode]])->sum('usia66sd75_jumlah');
      $sum75_jumlah           = PenelitiPengabdi::where([['fakultas', $fakultas], ['periode', $periode]])->sum('usia75_jumlah');

      $total               = PenelitiPengabdi::where([['fakultas', $fakultas], ['periode', $periode]])->sum('total');

      $totalsemua          = PenelitiPengabdi::where([['fakultas', 'Universitas Sebelas Maret'], ['periode', $periode]])->sum('total');
      $totalpercent               = $total / $totalsemua * 100;

       return view('user.rida.detail-tenaga-pendidik',[
            'name' => 'Rentang Usia Produktif Peneliti dan Pengabdi Jenjang Doktor', 'tahun' => $tahun , 'periode'=>$periode, 'data' => $data, 'fakultas' => $fakultas, 
            'sum25sd35_jumlah' => $sum25sd35_jumlah,
            'sum36sd45_jumlah' => $sum36sd45_jumlah,
            'sum46sd55_jumlah' => $sum46sd55_jumlah,
            'sum56sd65_jumlah' => $sum56sd65_jumlah,
            'sum66sd75_jumlah' => $sum66sd75_jumlah,
            'sum75_jumlah' => $sum75_jumlah,
            'total' => $total,  'totalpercent' => $totalpercent, 'totalsemua' => $totalsemua,
       ]);
      
    }

    public function magister(Request $request, $jenjang){
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
          "name"=> "Usia Produktif Magister",
          "data" => $data, "list_sumber" => $list_sumber, "list_tahun" => $list_tahun, 
          "list_fakultas" => $list_fakultas, "fakultas" => $fakultas, "tahun" => $tahun 
        ]);
      }
      return view('user.rida.grafik', [
        "name"=> "Usia Produktif Magister",
        "data" => [], "list_sumber" => [], "list_tahun" => [], 
        "list_fakultas" => [], "fakultas" => "", "tahun" => "" 
      ]);
      
    }

    public function pilih_periode_magister($fakultas, $tahun){
      $fakultas  = $fakultas;
      $tahun  = $tahun;
      $data = PenelitiPengabdiMagister::select('periode', 'tahun_input', 'sumber_data')->distinct()->where('fakultas', $fakultas)->where('tahun_input', $tahun)->get('periode', 'tahun_input', 'sumber_data');

       return view('user.rida.pilih_periode',[ "name" => "Rentang Usia Produktif Peneliti dan Pengabdi Jenjang Magister", 'data' => $data, 'fakultas' => $fakultas, 'tahun' => $tahun]);
    }

    public function detail_magister($fakultas, $tahun, $periode){
      $fakultas  = $fakultas;
      $tahun  = $tahun;

      $data = PenelitiPengabdiMagister::where([['fakultas', $fakultas], ['periode', $periode], ['tahun_input', $tahun]])->get();

      $sum25sd35_jumlah       = PenelitiPengabdiMagister::where([['fakultas', $fakultas], ['periode', $periode]])->sum('usia25sd35_jumlah');
      $sum36sd45_jumlah       = PenelitiPengabdiMagister::where([['fakultas', $fakultas], ['periode', $periode]])->sum('usia36sd45_jumlah');
      $sum46sd55_jumlah       = PenelitiPengabdiMagister::where([['fakultas', $fakultas], ['periode', $periode]])->sum('usia46sd55_jumlah');
      $sum56sd65_jumlah       = PenelitiPengabdiMagister::where([['fakultas', $fakultas], ['periode', $periode]])->sum('usia56sd65_jumlah');
      $sum66sd75_jumlah       = PenelitiPengabdiMagister::where([['fakultas', $fakultas], ['periode', $periode]])->sum('usia66sd75_jumlah');
      $sum75_jumlah           = PenelitiPengabdiMagister::where([['fakultas', $fakultas], ['periode', $periode]])->sum('usia75_jumlah');

      $total               = PenelitiPengabdiMagister::where([['fakultas', $fakultas], ['periode', $periode]])->sum('total');
      $totalsemua          = PenelitiPengabdiMagister::where([['fakultas', 'Universitas Sebelas Maret'], ['periode', $periode]])->sum('total');
      $totalpercent               = $total / $totalsemua * 100;

       return view('user.rida.detail-tenaga-pendidik',[
            'name' => 'Rentang Usia Produktif Peneliti dan Pengabdi Jenjang Magister', 'tahun' => $tahun , 'periode'=>$periode, 'data' => $data, 'fakultas' => $fakultas, 
            'sum25sd35_jumlah' => $sum25sd35_jumlah,
            'sum36sd45_jumlah' => $sum36sd45_jumlah,
            'sum46sd55_jumlah' => $sum46sd55_jumlah,
            'sum56sd65_jumlah' => $sum56sd65_jumlah,
            'sum66sd75_jumlah' => $sum66sd75_jumlah,
            'sum75_jumlah' => $sum75_jumlah,
            'total' => $total,  'totalpercent' => $totalpercent, 'totalsemua' => $totalsemua,
       ]);
      
    }

    public function spesialis2(Request $request){
      $list_tahun = PenelitiPengabdiSpesialis::select("tahun_input")->distinct()->orderBy("tahun_input", "asc")->get();
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
        $data = PenelitiPengabdiSpesialis::where("fakultas", $fakultas)->where("tahun_input", $tahun)->get();
        $list_fakultas = PenelitiPengabdiSpesialis::select("fakultas")->distinct()->where("tahun_input", $tahun)->get();
        $list_sumber = PenelitiPengabdiSpesialis::select("periode", "sumber_data")->distinct()->where("fakultas", $fakultas)->where("tahun_input", $tahun)->get();
        // dd($list_sumber);
        return view('user.rida.grafik', [
          "name"=> "Usia Produktif SP2",
          "data" => $data, "list_sumber" => $list_sumber, "list_tahun" => $list_tahun, 
          "list_fakultas" => $list_fakultas, "fakultas" => $fakultas, "tahun" => $tahun 
        ]);
      }
      return view('user.rida.grafik', [
        "name"=> "Usia Produktif SP2",
        "data" => [], "list_sumber" => [], "list_tahun" => [], 
        "list_fakultas" => [], "fakultas" => "", "tahun" => "" 
      ]);
      
    }

    public function pilih_periode_sp2($fakultas, $tahun){
      $fakultas  = $fakultas;
      $tahun  = $tahun;
      $data = PenelitiPengabdiSpesialis::select('periode', 'tahun_input', 'sumber_data')->distinct()->where('fakultas', $fakultas)->where('tahun_input', $tahun)->get('periode', 'tahun_input', 'sumber_data');

       return view('user.rida.pilih_periode',[ "name" => "Rentang Usia Produktif Peneliti dan Pengabdi Jenjang SP-2", 'data' => $data, 'fakultas' => $fakultas, 'tahun' => $tahun]);
    }

    public function detail_sp2($fakultas, $tahun, $periode){
      $fakultas  = $fakultas;
      $tahun  = $tahun;

      $data = PenelitiPengabdiSpesialis::where([['fakultas', $fakultas], ['periode', $periode], ['tahun_input', $tahun]])->get();

      $sum25sd35_jumlah       = PenelitiPengabdiSpesialis::where([['fakultas', $fakultas], ['periode', $periode]])->sum('usia25sd35_jumlah');
      $sum36sd45_jumlah       = PenelitiPengabdiSpesialis::where([['fakultas', $fakultas], ['periode', $periode]])->sum('usia36sd45_jumlah');
      $sum46sd55_jumlah       = PenelitiPengabdiSpesialis::where([['fakultas', $fakultas], ['periode', $periode]])->sum('usia46sd55_jumlah');
      $sum56sd65_jumlah       = PenelitiPengabdiSpesialis::where([['fakultas', $fakultas], ['periode', $periode]])->sum('usia56sd65_jumlah');
      $sum66sd75_jumlah       = PenelitiPengabdiSpesialis::where([['fakultas', $fakultas], ['periode', $periode]])->sum('usia66sd75_jumlah');
      $sum75_jumlah           = PenelitiPengabdiSpesialis::where([['fakultas', $fakultas], ['periode', $periode]])->sum('usia75_jumlah');
      $total                  = PenelitiPengabdiSpesialis::where([['fakultas', $fakultas], ['periode', $periode]])->sum('total');
      $totalsemua             = PenelitiPengabdiSpesialis::where([['fakultas', 'Universitas Sebelas Maret'], ['periode', $periode]])->sum('total');
      $totalpercent               = $total / $totalsemua * 100;

       return view('user.rida.detail-tenaga-pendidik',[
            'name' => 'Rentang Usia Produktif Peneliti dan Pengabdi Jenjang SP-2', 'tahun' => $tahun , 'periode'=>$periode, 'data' => $data, 'fakultas' => $fakultas, 
            'sum25sd35_jumlah' => $sum25sd35_jumlah,
            'sum36sd45_jumlah' => $sum36sd45_jumlah,
            'sum46sd55_jumlah' => $sum46sd55_jumlah,
            'sum56sd65_jumlah' => $sum56sd65_jumlah,
            'sum66sd75_jumlah' => $sum66sd75_jumlah,
            'sum75_jumlah' => $sum75_jumlah,
            'total' => $total,  'totalpercent' => $totalpercent, 'totalsemua' => $totalsemua,
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
          "name"=> "Usia Produktif Profesi",
          "data" => $data, "list_sumber" => $list_sumber, "list_tahun" => $list_tahun, 
          "list_fakultas" => $list_fakultas, "fakultas" => $fakultas, "tahun" => $tahun 
        ]);
      }
      return view('user.rida.grafik', [
        "name"=> "Usia Produktif Profesi",
        "data" => [], "list_sumber" => [], "list_tahun" => [], 
        "list_fakultas" => [], "fakultas" => "", "tahun" => "" 
      ]);
      
    }

    public function pilih_periode_profesi($fakultas, $tahun){
      $fakultas  = $fakultas;
      $tahun  = $tahun;
      $data = PenelitiPengabdiProfesi::select('periode', 'tahun_input', 'sumber_data')->distinct()->where('fakultas', $fakultas)->where('tahun_input', $tahun)->get('periode', 'tahun_input', 'sumber_data');

       return view('user.rida.pilih_periode',[ "name" => "Rentang Usia Produktif Peneliti dan Pengabdi Jenjang Profesi", 'data' => $data, 'fakultas' => $fakultas, 'tahun' => $tahun]);
    }

    public function detail_profesi($fakultas, $tahun, $periode){
      $fakultas  = $fakultas;
      $tahun  = $tahun;

      $data = PenelitiPengabdiProfesi::where([['fakultas', $fakultas], ['periode', $periode], ['tahun_input', $tahun]])->get();

      $sum25sd35_jumlah       = PenelitiPengabdiProfesi::where([['fakultas', $fakultas], ['periode', $periode]])->sum('usia25sd35_jumlah');
      $sum36sd45_jumlah       = PenelitiPengabdiProfesi::where([['fakultas', $fakultas], ['periode', $periode]])->sum('usia36sd45_jumlah');
      $sum46sd55_jumlah       = PenelitiPengabdiProfesi::where([['fakultas', $fakultas], ['periode', $periode]])->sum('usia46sd55_jumlah');
      $sum56sd65_jumlah       = PenelitiPengabdiProfesi::where([['fakultas', $fakultas], ['periode', $periode]])->sum('usia56sd65_jumlah');
      $sum66sd75_jumlah       = PenelitiPengabdiProfesi::where([['fakultas', $fakultas], ['periode', $periode]])->sum('usia66sd75_jumlah');
      $sum75_jumlah           = PenelitiPengabdiProfesi::where([['fakultas', $fakultas], ['periode', $periode]])->sum('usia75_jumlah');
      $total                  = PenelitiPengabdiProfesi::where([['fakultas', $fakultas], ['periode', $periode]])->sum('total');
      $totalsemua             = PenelitiPengabdiProfesi::where([['fakultas', 'Universitas Sebelas Maret'], ['periode', $periode]])->sum('total');
      $totalpercent               = $total / $totalsemua * 100;

       return view('user.rida.detail-tenaga-pendidik',[
            'name' => 'Rentang Usia Produktif Peneliti dan Pengabdi Jenjang Profesi', 'tahun' => $tahun , 'periode'=>$periode, 'data' => $data, 'fakultas' => $fakultas, 
            'sum25sd35_jumlah' => $sum25sd35_jumlah,
            'sum36sd45_jumlah' => $sum36sd45_jumlah,
            'sum46sd55_jumlah' => $sum46sd55_jumlah,
            'sum56sd65_jumlah' => $sum56sd65_jumlah,
            'sum66sd75_jumlah' => $sum66sd75_jumlah,
            'sum75_jumlah' => $sum75_jumlah,
            'total' => $total,  'totalpercent' => $totalpercent, 'totalsemua' => $totalsemua,
       ]);
      
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
        $data = PenelitiPengabdiSpesialis1::where("fakultas", $fakultas)->where("tahun_input", $tahun)->get();
        $list_fakultas = PenelitiPengabdiSpesialis1::select("fakultas")->distinct()->where("tahun_input", $tahun)->get();
        $list_sumber = PenelitiPengabdiSpesialis1::select("periode", "sumber_data")->distinct()->where("fakultas", $fakultas)->where("tahun_input", $tahun)->get();
        // dd($list_sumber);
        return view('user.rida.grafik', [
          "name"=> "Usia Produktif SP1",
          "data" => $data, "list_sumber" => $list_sumber, "list_tahun" => $list_tahun, 
          "list_fakultas" => $list_fakultas, "fakultas" => $fakultas, "tahun" => $tahun 
        ]);
      }
      return view('user.rida.grafik', [
        "name"=> "Usia Produktif SP1",
        "data" => [], "list_sumber" => [], "list_tahun" => [], 
        "list_fakultas" => [], "fakultas" => "", "tahun" => "" 
      ]);
      
    }


    public function pilih_periode_sp1($fakultas, $tahun){
      $fakultas  = $fakultas;
      $tahun  = $tahun;
      $data = PenelitiPengabdiSpesialis1::select('periode', 'tahun_input', 'sumber_data')->distinct()->where('fakultas', $fakultas)->where('tahun_input', $tahun)->get('periode', 'tahun_input', 'sumber_data');

       return view('user.rida.pilih_periode',[ "name" => "Rentang Usia Produktif Peneliti dan Pengabdi Jenjang SP-1", 'data' => $data, 'fakultas' => $fakultas, 'tahun' => $tahun]);
    }

    public function detail_sp1($fakultas, $tahun, $periode){
      $fakultas  = $fakultas;
      $tahun  = $tahun;

      $data = PenelitiPengabdiSpesialis1::where([['fakultas', $fakultas], ['periode', $periode], ['tahun_input', $tahun]])->get();

      $sum25sd35_jumlah       = PenelitiPengabdiSpesialis1::where([['fakultas', $fakultas], ['periode', $periode]])->sum('usia25sd35_jumlah');
      $sum36sd45_jumlah       = PenelitiPengabdiSpesialis1::where([['fakultas', $fakultas], ['periode', $periode]])->sum('usia36sd45_jumlah');
      $sum46sd55_jumlah       = PenelitiPengabdiSpesialis1::where([['fakultas', $fakultas], ['periode', $periode]])->sum('usia46sd55_jumlah');
      $sum56sd65_jumlah       = PenelitiPengabdiSpesialis1::where([['fakultas', $fakultas], ['periode', $periode]])->sum('usia56sd65_jumlah');
      $sum66sd75_jumlah       = PenelitiPengabdiSpesialis1::where([['fakultas', $fakultas], ['periode', $periode]])->sum('usia66sd75_jumlah');
      $sum75_jumlah           = PenelitiPengabdiSpesialis1::where([['fakultas', $fakultas], ['periode', $periode]])->sum('usia75_jumlah');
      $total                  = PenelitiPengabdiSpesialis1::where([['fakultas', $fakultas], ['periode', $periode]])->sum('total');
      $totalsemua             = PenelitiPengabdiSpesialis1::where([['fakultas', 'Universitas Sebelas Maret'], ['periode', $periode]])->sum('total');
      $totalpercent               = $total / $totalsemua * 100;

       return view('user.rida.detail-tenaga-pendidik',[
            'name' => 'Rentang Usia Produktif Peneliti dan Pengabdi Jenjang SP-1', 'tahun' => $tahun , 'periode'=>$periode, 'data' => $data, 'fakultas' => $fakultas, 
            'sum25sd35_jumlah' => $sum25sd35_jumlah,
            'sum36sd45_jumlah' => $sum36sd45_jumlah,
            'sum46sd55_jumlah' => $sum46sd55_jumlah,
            'sum56sd65_jumlah' => $sum56sd65_jumlah,
            'sum66sd75_jumlah' => $sum66sd75_jumlah,
            'sum75_jumlah' => $sum75_jumlah,
            'total' => $total,  'totalpercent' => $totalpercent, 'totalsemua' => $totalsemua,
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
          "name"=> "Usia Produktif SP-1(K)",
          "data" => $data, "list_sumber" => $list_sumber, "list_tahun" => $list_tahun, 
          "list_fakultas" => $list_fakultas, "fakultas" => $fakultas, "tahun" => $tahun 
        ]);
      }
      return view('user.rida.grafik', [
        "name"=> "Usia Produktif SP-1(K)",
        "data" => [], "list_sumber" => [], "list_tahun" => [], 
        "list_fakultas" => [], "fakultas" => "", "tahun" => "" 
      ]);
      
    }

    
    public function pilih_periode_sp1k($fakultas, $tahun){
      $fakultas  = $fakultas;
      $tahun  = $tahun;
      $data = PenelitiPengabdiSpesialisKonsultan::select('periode', 'tahun_input', 'sumber_data')->distinct()->where('fakultas', $fakultas)->where('tahun_input', $tahun)->get('periode', 'tahun_input', 'sumber_data');

       return view('user.rida.pilih_periode',[ "name" => "Rentang Usia Produktif Peneliti dan Pengabdi Jenjang SP-1(K)", 'data' => $data, 'fakultas' => $fakultas, 'tahun' => $tahun]);
    }

    public function detail_sp1k($fakultas, $tahun, $periode){
      $fakultas  = $fakultas;
      $tahun  = $tahun;

      $data = PenelitiPengabdiSpesialisKonsultan::where([['fakultas', $fakultas], ['periode', $periode], ['tahun_input', $tahun]])->get();

      $sum25sd35_jumlah       = PenelitiPengabdiSpesialisKonsultan::where([['fakultas', $fakultas], ['periode', $periode]])->sum('usia25sd35_jumlah');
      $sum36sd45_jumlah       = PenelitiPengabdiSpesialisKonsultan::where([['fakultas', $fakultas], ['periode', $periode]])->sum('usia36sd45_jumlah');
      $sum46sd55_jumlah       = PenelitiPengabdiSpesialisKonsultan::where([['fakultas', $fakultas], ['periode', $periode]])->sum('usia46sd55_jumlah');
      $sum56sd65_jumlah       = PenelitiPengabdiSpesialisKonsultan::where([['fakultas', $fakultas], ['periode', $periode]])->sum('usia56sd65_jumlah');
      $sum66sd75_jumlah       = PenelitiPengabdiSpesialisKonsultan::where([['fakultas', $fakultas], ['periode', $periode]])->sum('usia66sd75_jumlah');
      $sum75_jumlah           = PenelitiPengabdiSpesialisKonsultan::where([['fakultas', $fakultas], ['periode', $periode]])->sum('usia75_jumlah');
      $total                  = PenelitiPengabdiSpesialisKonsultan::where([['fakultas', $fakultas], ['periode', $periode]])->sum('total');
      $totalsemua             = PenelitiPengabdiSpesialisKonsultan::where([['fakultas', 'Universitas Sebelas Maret'], ['periode', $periode]])->sum('total');
      $totalpercent               = $total / $totalsemua * 100;

       return view('user.rida.detail-tenaga-pendidik',[
            'name' => 'Rentang Usia Produktif Peneliti dan Pengabdi Jenjang SP-1(K)', 'tahun' => $tahun , 'periode'=>$periode, 'data' => $data, 'fakultas' => $fakultas, 
            'sum25sd35_jumlah' => $sum25sd35_jumlah,
            'sum36sd45_jumlah' => $sum36sd45_jumlah,
            'sum46sd55_jumlah' => $sum46sd55_jumlah,
            'sum56sd65_jumlah' => $sum56sd65_jumlah,
            'sum66sd75_jumlah' => $sum66sd75_jumlah,
            'sum75_jumlah' => $sum75_jumlah,
            'total' => $total,  'totalpercent' => $totalpercent, 'totalsemua' => $totalsemua,
       ]);
      
    }

}
