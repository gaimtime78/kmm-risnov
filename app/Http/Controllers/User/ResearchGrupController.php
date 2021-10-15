<?php

namespace App\Http\Controllers\User;

use App\Exports\ResearchGroupExport;
use App\Http\Controllers\Controller;
use App\Models\ResearchGroup;
use Illuminate\Http\Request;
use Maatwebsite\Excel\Facades\Excel;

class ResearchGrupController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        $list_tahun = ResearchGroup::select("tahun_input")->distinct()->orderBy("tahun_input", "asc")->get();
        $fakultas = ResearchGroup::select('fakultas')->first();
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
            $data = ResearchGroup::where("fakultas", $fakultas)->orderBy('tahun_input', 'ASC')->get();
            $list_fakultas = ResearchGroup::select("fakultas")->distinct()->where("tahun_input", $tahun)->get();
            $list_sumber = ResearchGroup::select("periode", "sumber_data")->distinct()->where("fakultas", $fakultas)->orderBy('tahun_input', 'ASC')->get();
            $nama_table = ResearchGroup::select("nama_table")->distinct()->get();
            
// dd($jumlahdata);

            // dd($list_sumber);
            return view('user.rida.grafikresearch', [

                "name" => "research_group",
                "data" => $data, "list_sumber" => $list_sumber, "list_tahun" => $list_tahun,
                "list_fakultas" => $list_fakultas, "fakultas" => $fakultas, "tahun" => $tahun, "nama_table" => $nama_table, 
            ]);
        }

        return view('user.rida.grafikpnbp', [
            "name" => "research_group",
            "data" => [], "list_sumber" => [], "list_tahun" => [],
            "list_fakultas" => [], "fakultas" => "", "tahun" => ""
        ]);
    }

    public function export($fakultas, $tahun)
    {
        return Excel::download(new ResearchGroupExport($fakultas, $tahun), 'ResearchGroup.xlsx');
    }

    public function periode($fakultas)
    {
        $fakultas  = $fakultas;
        $tahun_input_dum = ResearchGroup::select('tahun_input')->distinct()->orderBy('tahun_input')->get()->pluck('tahun_input');
        if(count($tahun_input_dum) >= 5){
            $start_tahun = $tahun_input_dum[count($tahun_input_dum) - 5];
        }else{
            $start_tahun = $tahun_input_dum[0];
        }
        
        $tahun_input = ResearchGroup::select('tahun_input')->distinct()->where('tahun_input', '>=', $start_tahun)->orderBy('tahun_input', 'ASC')->get()->pluck('tahun_input');
        $dataHibah = ResearchGroup::where("fakultas", $fakultas)->where('tahun_input', '>=', $start_tahun)->get();

        // $sumHibah = HibahPNBP::where("fakultas", $fakultas)->where('tahun_input', '>=', $start_tahun)->get();
//         $sumHibah             = HibahPNBP::select()->where([['fakultas',  $fakultas], ['tahun_input', '>=',$start_tahun]])->sum('usulan_lanjutan', 'usulan_baru');
// dd($sumHibah);
        $nama_table = ResearchGroup::select("nama_table")->distinct()->get();

        $list_sumber = ResearchGroup::select("periode","tahun_input", "sumber_data")->distinct()->where("fakultas", $fakultas)->orderBy('tahun_input', 'ASC')->get();

        $hibah = [];
        foreach($dataHibah as $item){
            if(empty($hibah[$item->fakultas])){
                $hibah[$item->fakultas]['fakultas'] = $item->fakultas;
            }
            // $hibah[$item->fakultas]['data'][$item->tahun_input] = $item->usulan_lanjutan ;
            // $hibah[$item->fakultas]['data'][$item->tahun_input] = [(string)$item->usulan_lanjutan , (string)$item->usulan_baru , (string)$item->diterima];
            $hibah[$item->fakultas]['data'][$item->tahun_input] = [ (string)($item->tahun1)];
        // dd($hibah[$item->fakultas]['data'][$item->tahun_input]);
        }
        
        return view('user.rida.detail-researchgrup', ['list_sumber' => $list_sumber ,'hibah' => $hibah, 'tahun_input' => $tahun_input, 'nama_table' => $nama_table, 'fakultas' => $fakultas]);    
    }
}
