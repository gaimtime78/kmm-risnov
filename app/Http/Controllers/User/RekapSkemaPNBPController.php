<?php

namespace App\Http\Controllers\User;

use App\Http\Controllers\Controller;
use App\Models\RekapSkemaPNBP;
use Illuminate\Http\Request;

class RekapSkemaPNBPController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        $list_tahun = RekapSkemaPNBP::select("tahun_input")->distinct()->orderBy("tahun_input", "desc")->get();
        $skema = RekapSkemaPNBP::select('jenis_skema')->first();
        if (!$list_tahun->isEmpty()) {
            $latest_tahun = $list_tahun[0]->tahun_input;
            $skema = $skema['jenis_skema'];
            $tahun = $latest_tahun;
            if ($request->has("jenis_skema")) {
                $skema = $request->input("jenis_skema");
            }
            if ($request->has("tahun")) {
                $tahun = $request->input("tahun");
            }
            $data = RekapSkemaPNBP::where("jenis_skema", $skema)->where("tahun_input", $tahun)->get();
            $list_skema = RekapSkemaPNBP::select("jenis_skema")->distinct()->where("tahun_input", $tahun)->get();
            $list_sumber = RekapSkemaPNBP::select("periode", "sumber_data")->distinct()->where("jenis_skema", $skema)->where("tahun_input", $tahun)->get();
            // dd($list_sumber);
            return view('user.rida.grafik_rekap_skemapnbp', [
                "name" => "rekap-skema-pnbp",
                "data" => $data, "list_sumber" => $list_sumber, "list_tahun" => $list_tahun,
                "list_skema" => $list_skema, "skema" => $skema, "tahun" => $tahun
            ]);
        }

        return view('user.rida.grafikskemapnbp', [
            "name" => "skema-pnbp",
            "data" => [], "list_sumber" => [], "list_tahun" => [],
            "list_skema" => [], "skema" => "", "tahun" => ""
        ]);
    }

    public function detailsFront($skema, $tahun){
        $fakultas = RekapSkemaPNBP::where('skema', $skema)->where('tahun_input', $tahun)->get();
        // dd($skema);
        $data = [];
        foreach($fakultas as $item){
            $isPeriodeExist = array_filter($data, function($v) use ($item){
                if(isset($v["periode"])){
                    if($v["periode"] == $item->periode){
                        return true;
                    }
                }
                return false;
            });
            if(!$isPeriodeExist){
                array_push($data, [
                    'periode' => $item->periode,
                    'data' => [$item]
                ]);
            }else{
                $index = array_search($item->periode, array_column($data, 'periode'));
                array_push($data[$index]['data'], $item);
            }
        }
        return view('user.rida.detil-skema', [
            "data" => $data, "skema" => $skema, "tahun" => $tahun
        ]);
    }

    public function periode($jenis_skema, $tahun)
    {
        $jenis_skema  = $jenis_skema;
        $tahun  = $tahun;
        $data = RekapSkemaPNBP::select('periode', 'tahun_input', 'sumber_data')->distinct()->where('jenis_skema', $jenis_skema)->where('tahun_input', $tahun)->get('periode', 'tahun_input', 'sumber_data');
        $nama_table = RekapSkemaPNBP::select("nama_table")->distinct()->where("jenis_skema")->get();
        
        return view('user.rida.pilih_periode_rekap_skema_pnbp',[  'nama_table'=> $nama_table, 'data' => $data, 'jenis_skema' => $jenis_skema, 'tahun' => $tahun]);
        
    }

    public function detail_data_rekap_tahun($jenis_skema, $tahun, $periode){
        $jenis_skema  = $jenis_skema;
        $tahun  = $tahun;
        
        $data = RekapSkemaPNBP::where([['jenis_skema', $jenis_skema], ['periode', $periode], ['tahun_input', $tahun]])->get();
        
        $nama_table = RekapSkemaPNBP::select("nama_table")->distinct()->where("jenis_skema")->get();

        $list_sumber = RekapSkemaPNBP::select("periode", "sumber_data")->distinct()->where("jenis_skema", $jenis_skema)->where("tahun_input", $tahun)->get();
        
        return view('user.rida.detil-rekap-skema',[
            'tahun' => $tahun , 'periode'=>$periode, 'data' => $data, 'jenis_skema' => $jenis_skema, 'nama_table' => $nama_table

        ]);
    }
}
