<?php

namespace App\Http\Controllers\Rida;

use Illuminate\Support\Facades\Storage;
use App\Http\Controllers\Controller;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\ResearchGroup;
use App\Exports\ResearchGroup\ResearchGroupExport;
use App\Imports\KerjasamaPenelitian\KerjasamaPenelitianImport;
use App\Imports\ResearchGroup\ResearchGroupsImport;
use App\Models\KerjasamaPenelitian;
use Maatwebsite\Excel\Facades\Excel;
use Illuminate\Support\Facades\DB;

class KerjasamaPenelitianController extends Controller
{
    //
    public function index(){
        $kerjasama = KerjasamaPenelitian::select('periode', 'tahun_input','sumber_data')->distinct()->get('periode','tahun_input','sumber_data');
        
        return view('admin.kerjasamapenelitian.index', ['kerjasama' => $kerjasama]);
    }
    public function import(Request $request)
    {
        $file = $request->file("kerjasamapenelitian");
        $periode = $request->periode;
        $tahun = $request->tahun;
        $sumber_data = $request->sumber_data;
        if ($file !== null) {
            Excel::import(new KerjasamaPenelitianImport, $file);
        }

        KerjasamaPenelitian::where('periode', 'kosong')
        ->update(['periode' => $request->periode, 'tahun_input' => $request->tahun, 'sumber_data' => $sumber_data]);

        return redirect()->route('admin.kerjasamapenelitian.index');
    }
    public function details(Request $request)
    {
                
        $tahun_input_dum = KerjasamaPenelitian::select('tahun_input')->distinct()->get()->pluck('tahun_input');
        $start_tahun = $tahun_input_dum[0];
        $tahun_input = KerjasamaPenelitian::select('tahun_input')->distinct()->where('tahun_input', '>=', $start_tahun)->get()->pluck('tahun_input');
        $kerjasamaData = KerjasamaPenelitian::select('pusat_studi','tahun_input','tahun1')->where('tahun_input', '>=', $start_tahun)->get();
        $kerjasama = [];
        foreach($kerjasamaData as $item){
            if(empty($kerjasama[$item->pusat_studi])){
                $kerjasama[$item->pusat_studi]['pusat_studi'] = $item->pusat_studi;
            }
            $kerjasama[$item->pusat_studi]['data'][$item->tahun_input] = $item->tahun1;
        }
        return view('admin.kerjasamapenelitian.details', ['kerjasama' => $kerjasama, 'tahun_input' => $tahun_input]);    
    }
}
