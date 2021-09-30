<?php

namespace App\Http\Controllers\User;

use App\Http\Controllers\Controller;
use App\Models\SkemaNonPNBP;
use Illuminate\Http\Request;

class SkemaNonPNBPController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        $list_tahun = SkemaNonPNBP::select("tahun_input")->distinct()->orderBy("tahun_input", "desc")->get();
        $jenis = SkemaNonPNBP::select('jenis')->first();
        if (!$list_tahun->isEmpty()) {
            $latest_tahun = $list_tahun[0]->tahun_input;
            $jenis = $jenis['jenis'];
            $tahun = $latest_tahun;
            if ($request->has("jenis")) {
                $jenis = $request->input("jenis");
            }
            if ($request->has("tahun")) {
                $tahun = $request->input("tahun");
            }
            $data = SkemaNonPNBP::where("jenis", $jenis)->where("tahun_input", $tahun)->get();
            $list_jenis = SkemaNonPNBP::select("jenis")->distinct()->where("tahun_input", $tahun)->get();
            $list_sumber = SkemaNonPNBP::select("periode", "sumber_data")->distinct()->where("jenis", $jenis)->where("tahun_input", $tahun)->get();
            // dd($list_sumber);
            return view('user.rida.grafikskemanonpnbp', [
                "name" => "skema-non-pnbp",
                "data" => $data, "list_sumber" => $list_sumber, "list_tahun" => $list_tahun,
                "list_jenis" => $list_jenis, "jenis" => $jenis, "tahun" => $tahun
            ]);
        }

        return view('user.rida.grafikskemanonpnbp', [
            "name" => "skema-pnbp",
            "data" => [], "list_sumber" => [], "list_tahun" => [],
            "list_jenis" => [], "jenis" => "", "tahun" => ""
        ]);
    }

    public function detailsFront($jenis, $tahun){
        $fakultas = SkemaNonPNBP::where('jenis', $jenis)->where('tahun_input', $tahun)->get();
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
        return view('user.rida.detil-skema-nonpnbp', [
            "data" => $data, "jenis" => $jenis, "tahun" => $tahun
        ]);
    }

    public function periode($fakultas, $tahun)
    {

    }
}
