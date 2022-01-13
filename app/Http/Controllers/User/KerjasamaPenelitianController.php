<?php

namespace App\Http\Controllers\User;

use Illuminate\Support\Facades\Storage;
use App\Http\Controllers\Controller;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\KerjasamaPenelitian;
use App\Exports\KerjasamaPenelitian\ResearchGroupExport;
use Maatwebsite\Excel\Facades\Excel;
use Illuminate\Support\Facades\DB;

class KerjasamaPenelitianController extends Controller
{
    public function index(Request $request){
        $list_tahun = KerjasamaPenelitian::select("tahun_input")->distinct()->orderBy("tahun_input", "asc")->get();
        $pusat_studi = KerjasamaPenelitian::select('pusat_studi')->first();
        if (!$list_tahun->isEmpty()) {
            $latest_tahun = $list_tahun[0]->tahun_input;
            $pusat_studi = $pusat_studi['pusat_studi'];
            $tahun = $latest_tahun;
            if ($request->has("pusat_studi")) {
                $pusat_studi = $request->input("pusat_studi");
            }
            if ($request->has("tahun")) {
                $tahun = $request->input("tahun");
            }
            $data = KerjasamaPenelitian::where("pusat_studi", $pusat_studi)->orderBy('tahun_input', 'ASC')->get();
            $list_pusat_studi = KerjasamaPenelitian::select("pusat_studi")->distinct()->where("tahun_input", $tahun)->get();
            $list_sumber = KerjasamaPenelitian::select("periode", "sumber_data")->distinct()->where("pusat_studi", $pusat_studi)->orderBy('tahun_input', 'ASC')->get();
            $nama_table = KerjasamaPenelitian::select("nama_table")->distinct()->get();
  
            // dd($data, $list_pusat_studi, $list_sumber);
            return view('user.rida.grafik-kerjasamapenelitian', [

                "name" => "grafik-kerjasamapenelitian",
                "data" => $data, "list_sumber" => $list_sumber, "list_tahun" => $list_tahun,
                "list_pusat_studi" => $list_pusat_studi, "pusat_studi" => $pusat_studi, "tahun" => $tahun, "nama_table" => $nama_table, 
            ]);
        }
    }


    public function detail(Request $pusat_studi, $tahun_input){
        $nama_table = KerjasamaPenelitian::select('nama_table')->distinct()->get('nama_table', 'id');
        $periode_dum = KerjasamaPenelitian::select('periode')->get()->pluck('periode');
        if(count($periode_dum) >= 5){
            $start_periode = $periode_dum[count($periode_dum) - 5];
        }else{
            $start_periode = $periode_dum[0];
        }
        $periode_input = KerjasamaPenelitian::select('periode', 'tahun_input')->distinct()->where('periode', '>=', $start_periode)->orderBy('tahun_input', 'ASC')->get()->pluck('periode');
        
        $periode_tahun = KerjasamaPenelitian::select('tahun_input')->distinct()->where('periode', '=', $start_periode)->orderBy('tahun_input', 'ASC')->get();
        // dd($periode_tahun);
        $kerjasamaPenelitian = KerjasamaPenelitian::select('pusat_studi','tahun_input','tahun1','periode')->where('periode', '>=', $start_periode)->get();
        $research = [];
        $spanArr = [];
        $researchHeader = [];
        foreach($periode_input as $item){
            $listPeriode = KerjasamaPenelitian::select('periode')->distinct()->where('periode', '>=', $item)->get();
            $jumlahPeriode = count($listPeriode);
            array_push($spanArr, $jumlahPeriode);
        }
        // dd($kerjasamaPenelitian);
        foreach($kerjasamaPenelitian as $item){
            if(empty($research[$item->pusat_studi])){
                $research[$item->pusat_studi]['pusat_studi'] = $item->pusat_studi;
            }
            if(empty($research[$item->pusat_studi]['data'])){
                $research[$item->pusat_studi]['data'] = [$item->tahun1];
            }else{
                array_push($research[$item->pusat_studi]['data'], $item->tahun1);
            }        
        }
        // dd($research, $periode_tahun, $periode_input, $spanArr);
        return view('user.kerjasamapenelitian.detailsSkemaFakultas-5tahun', ['research' => $research, 'spanArr' => $spanArr, 'periode_tahun' => $periode_tahun, 'periode_input'=>$periode_input, 'nama_table'=>$nama_table]);

    }

    // public function grafik(Request $request){
    //     $list_tahun = KerjasamaPenelitian::select("tahun_input")->distinct()->orderBy("tahun_input", "asc")->get();
    //     $pusat_studi = KerjasamaPenelitian::select('pusat_studi')->first();
    //     if (!$list_tahun->isEmpty()) {
    //         $latest_tahun = $list_tahun[0]->tahun_input;
    //         $pusat_studi = $pusat_studi['pusat_studi'];
    //         $tahun = $latest_tahun;
    //         if ($request->has("pusat_studi")) {
    //             $pusat_studi = $request->input("pusat_studi");
    //         }
    //         if ($request->has("tahun")) {
    //             $tahun = $request->input("tahun");
    //         }
    //         $data = KerjasamaPenelitian::where("pusat_studi", $pusat_studi)->orderBy('tahun_input', 'ASC')->get();
    //         $list_pusat_studi = KerjasamaPenelitian::select("pusat_studi")->distinct()->where("tahun_input", $tahun)->get();
    //         $list_sumber = KerjasamaPenelitian::select("periode", "sumber_data")->distinct()->where("pusat_studi", $pusat_studi)->orderBy('tahun_input', 'ASC')->get();
    //         $nama_table = KerjasamaPenelitian::select("nama_table")->distinct()->get();
  
    //         dd($data, $list_pusat_studi, $list_sumber);
    //         return view('user.rida.grafik-kerjasamapenelitian', [

    //             "name" => "grafik-kerjasamapenelitian",
    //             "data" => $data, "list_sumber" => $list_sumber, "list_tahun" => $list_tahun,
    //             "list_pusat_studi" => $list_pusat_studi, "pusat_studi" => $pusat_studi, "tahun" => $tahun, "nama_table" => $nama_table, 
    //         ]);
    //     }
    // }


}