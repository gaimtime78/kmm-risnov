<?php

namespace App\Http\Controllers\User;

use App\Http\Controllers\Controller;
use App\Models\SkemaPNBP;
use Illuminate\Http\Request;

class SkemaPNBPController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        $list_tahun = SkemaPNBP::select("tahun_input")->distinct()->orderBy("tahun_input", "desc")->get();
        $fakultas = SkemaPNBP::select('fakultas')->first();
        if (!$list_tahun->isEmpty()) {
            $latest_tahun = $list_tahun[0]->tahun_input;
            $fakultas = $fakultas['fakultas'];
            $tahun = $latest_tahun;
            if ($request->has("fakultas")) {
                $fakultas = $request->input("fakultas");
            }
            if ($request->has("tahun")) {
                $tahun = $request->input("tahun");
            }
            $data = SkemaPNBP::where("fakultas", $fakultas)->where("tahun_input", $tahun)->get();
            $list_fakultas = SkemaPNBP::select("fakultas")->distinct()->where("tahun_input", $tahun)->get();
            $list_sumber = SkemaPNBP::select("periode", "sumber_data")->distinct()->where("fakultas", $fakultas)->where("tahun_input", $tahun)->get();
            // dd($list_sumber);
            return view('user.rida.grafikskemapnbp', [
                "name" => "skema-pnbp",
                "data" => $data, "list_sumber" => $list_sumber, "list_tahun" => $list_tahun,
                "list_fakultas" => $list_fakultas, "fakultas" => $fakultas, "tahun" => $tahun
            ]);
        }

        return view('user.rida.grafikskemapnbp', [
            "name" => "skema-pnbp",
            "data" => [], "list_sumber" => [], "list_tahun" => [],
            "list_fakultas" => [], "fakultas" => "", "tahun" => ""
        ]);
    }

    public function detailsFront($fakultas, $tahun){
        $skema = SkemaPNBP::where('fakultas', $fakultas)->where('tahun_input', $tahun)->get();
        // dd($skema);
        $data = [];
        foreach($skema as $item){
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
            "data" => $data, "fakultas" => $fakultas, "tahun" => $tahun
        ]);
    }

    public function periode($fakultas, $tahun)
    {

    }
}
