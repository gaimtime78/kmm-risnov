<?php

namespace App\Http\Controllers\User;

use App\Exports\AkreditasiPusdiExport;
use App\Http\Controllers\Controller;
use App\Models\AkreditasiPusdi;
use Illuminate\Http\Request;
use Maatwebsite\Excel\Facades\Excel;

class AkreditasiPusdiController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        $list_tahun = AkreditasiPusdi::select("tahun_input")->distinct()->orderBy("tahun_input", "asc")->get();
        $pusat_studi = AkreditasiPusdi::select('pusat_studi')->first();
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
            $data = AkreditasiPusdi::where("pusat_studi", $pusat_studi)->orderBy('tahun_input', 'ASC')->get();
            $list_pusat_studi = AkreditasiPusdi::select("pusat_studi")->distinct()->where("tahun_input", $tahun)->get();
            $list_sumber = AkreditasiPusdi::select("periode", "sumber_data")->distinct()->where("pusat_studi", $pusat_studi)->orderBy('tahun_input', 'ASC')->get();
            $akreditasi = AkreditasiPusdi::select("periode", "akreditasi")->distinct()->where("pusat_studi", $pusat_studi)->orderBy('tahun_input', 'ASC')->get();
            $nama_table = AkreditasiPusdi::select("nama_table")->distinct()->get();
            
// dd($jumlahdata);

            // dd($list_sumber);
            return view('user.rida.grafikpusdi', [

                "name" => "pusat_studi",
                "data" => $data, "list_sumber" => $list_sumber, "list_tahun" => $list_tahun,
                "list_pusat_studi" => $list_pusat_studi, "pusat_studi" => $pusat_studi, "tahun" => $tahun, "nama_table" => $nama_table, "akreditasi" => $akreditasi, 
            ]);
        }

        return view('user.rida.grafikpusdi', [
            "name" => "pusat_studi",
            "data" => [], "list_sumber" => [], "list_tahun" => [],
            "list_pusat_studi" => [], "pusat_studi" => "", "tahun" => "", "akreditasi" =>""
        ]);
    }

    public function export($pusat_studi, $tahun)
    {
        return Excel::download(new AkreditasiPusdiExport($pusat_studi, $tahun), 'AkreditasiPusatStudi.xlsx');
    }

    public function periode($pusat_studi)
    {
        $pusat_studi  = $pusat_studi;
        $tahun_input_dum = AkreditasiPusdi::select('tahun_input')->distinct()->orderBy('tahun_input')->get()->pluck('tahun_input');
        if(count($tahun_input_dum) >= 5){
            $start_tahun = $tahun_input_dum[count($tahun_input_dum) - 5];
        }else{
            $start_tahun = $tahun_input_dum[0];
        }
        
        $tahun_input = AkreditasiPusdi::select('tahun_input')->distinct()->where('tahun_input', '>=', $start_tahun)->orderBy('tahun_input', 'ASC')->get()->pluck('tahun_input');
        $dataAkreditasi = AkreditasiPusdi::where('tahun_input', '>=', $start_tahun)->get();
        $nama_table = AkreditasiPusdi::select("nama_table")->distinct()->get();

        $list_sumber = AkreditasiPusdi::select("periode","tahun_input", "sumber_data")->distinct()->where("pusat_studi", $pusat_studi)->orderBy('tahun_input', 'ASC')->get();

        $status_akreditasi = [];
        foreach($dataAkreditasi as $item){
            if(empty($status_akreditasi[$item->pusat_studi])){
                $status_akreditasi[$item->pusat_studi]['pusat_studi'] = $item->pusat_studi;
            }
            
            $status_akreditasi[$item->pusat_studi]['data'][$item->tahun_input] = [ (string)($item->akreditasi)];
        // dd($status_akreditasi[$item->pusat_studi]['data'][$item->tahun_input]);
        }
        
        return view('user.rida.detail-akreditasipusdi', ['list_sumber' => $list_sumber ,'status_akreditasi' => $status_akreditasi, 'tahun_input' => $tahun_input, 'nama_table' => $nama_table, 'pusat_studi' => $pusat_studi]);    
    }
}
