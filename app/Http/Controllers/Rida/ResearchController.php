<?php

namespace App\Http\Controllers\Rida;

use Illuminate\Support\Facades\Storage;
use App\Http\Controllers\Controller;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\ResearchGroup;
use App\Exports\ResearchGroup\ResearchGroupExport;
use App\Imports\ResearchGroup\ResearchGroupsImport;
use Maatwebsite\Excel\Facades\Excel;
use Illuminate\Support\Facades\DB;

class ResearchController extends Controller
{
    //
    public function index(){
        $research = ResearchGroup::select('periode', 'tahun_input','sumber_data')->distinct()->get('periode','tahun_input','sumber_data');
        
        return view('admin.researchgroup.index', ['research' => $research]);
    }
    public function import(Request $request)
    {
        $file = $request->file("researchgroup");
        $periode = $request->periode;
        $tahun = $request->tahun;
        $sumber_data = $request->sumber_data;
        if ($file !== null) {
            Excel::import(new ResearchGroupsImport, $file);
        }

        ResearchGroup::where('periode', 'kosong')
        ->update(['periode' => $request->periode, 'tahun_input' => $request->tahun, 'sumber_data' => $sumber_data]);

        return redirect()->route('admin.researchgroup.index');
    }
    public function details(Request $request)
    {
        $tahun_input_dum = ResearchGroup::select('tahun_input')->distinct()->get()->pluck('tahun_input');
        $start_tahun = $tahun_input_dum[count($tahun_input_dum) - 1];
        $tahun_input = ResearchGroup::select('tahun_input')->distinct()->where('tahun_input', '>=', $start_tahun)->get()->pluck('tahun_input');
        $researchData = ResearchGroup::select('fakultas','tahun_input','tahun1')->where('tahun_input', '>=', $start_tahun)->get();
        $research = [];
        foreach($researchData as $item){
            if(empty($research[$item->fakultas])){
                $research[$item->fakultas]['fakultas'] = $item->fakultas;
            }
            $research[$item->fakultas]['data'][$item->tahun_input] = $item->tahun1;
        }
        return view('admin.researchgroup.details', ['research' => $research, 'tahun_input' => $tahun_input]);    
    }
}
