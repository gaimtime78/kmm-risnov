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
        $tahun_input = ResearchGroup::select('tahun_input')->distinct()->get('tahun_input');
        $research = ResearchGroup::select('fakultas','tahun1')->distinct()->groupBy()->get('fakultas','tahun1');
// dd($research);
        return view('admin.researchgroup.details', ['research' => $research, 'tahun_input' => $tahun_input]);    
    }
}
