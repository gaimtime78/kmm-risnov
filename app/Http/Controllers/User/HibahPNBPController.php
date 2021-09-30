<?php

namespace App\Http\Controllers\User;

use App\Exports\HibahPNBPExport;
use App\Http\Controllers\Controller;
use App\Models\HibahPNBP;
use Illuminate\Http\Request;
use Maatwebsite\Excel\Facades\Excel;

class HibahPNBPController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        $list_tahun = HibahPNBP::select("tahun_input")->distinct()->orderBy("tahun_input", "asc")->get();
        $fakultas = HibahPNBP::select('fakultas')->first();
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
            $data = HibahPNBP::where("fakultas", $fakultas)->where("tahun_input", $tahun)->get();
            $list_fakultas = HibahPNBP::select("fakultas")->distinct()->where("tahun_input", $tahun)->get();
            $list_sumber = HibahPNBP::select("periode", "sumber_data")->distinct()->where("fakultas", $fakultas)->where("tahun_input", $tahun)->get();
            $nama_table = HibahPNBP::select("nama_table")->distinct()->get();
            // dd($list_sumber);
            return view('user.rida.grafikpnbp', [

                "name" => "hibah-pnbp",
                "data" => $data, "list_sumber" => $list_sumber, "list_tahun" => $list_tahun,
                "list_fakultas" => $list_fakultas, "fakultas" => $fakultas, "tahun" => $tahun, "nama_table" => $nama_table
            ]);
        }

        return view('user.rida.grafikpnbp', [
            "name" => "hibah-pnbp",
            "data" => [], "list_sumber" => [], "list_tahun" => [],
            "list_fakultas" => [], "fakultas" => "", "tahun" => ""
        ]);
    }

    public function export($fakultas, $tahun)
    {
        return Excel::download(new HibahPNBPExport($fakultas, $tahun), 'HibahPNBP.xlsx');
    }

    public function periode($fakultas)
    {
        $fakultas  = $fakultas;
        $tahun_input_dum = HibahPNBP::select('tahun_input')->distinct()->orderBy('tahun_input')->get()->pluck('tahun_input');
        if(count($tahun_input_dum) >= 5){
            $start_tahun = $tahun_input_dum[count($tahun_input_dum) - 5];
        }else{
            $start_tahun = $tahun_input_dum[0];
        }
        
        $tahun_input = HibahPNBP::select('tahun_input')->distinct()->where('tahun_input', '>=', $start_tahun)->orderBy('tahun_input', 'ASC')->get()->pluck('tahun_input');
        $dataHibah = HibahPNBP::where("fakultas", $fakultas)->where('tahun_input', '>=', $start_tahun)->get();
        $nama_table = HibahPNBP::select("nama_table")->distinct()->get();
        $hibah = [];
        foreach($dataHibah as $item){
            if(empty($hibah[$item->fakultas])){
                $hibah[$item->fakultas]['fakultas'] = $item->fakultas;
            }
            // $hibah[$item->fakultas]['data'][$item->tahun_input] = $item->usulan_lanjutan ;
            $hibah[$item->fakultas]['data'][$item->tahun_input] = [(string)$item->usulan_lanjutan , (string)$item->usulan_baru , (string)$item->diterima];
        // dd($hibah[$item->fakultas]['data'][$item->tahun_input]);
        }
        
        return view('user.rida.detail-hibahPNBP', ['hibah' => $hibah, 'tahun_input' => $tahun_input, 'nama_table' => $nama_table, 'fakultas' => $fakultas]);    
    }
}
