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
        $research = ResearchGroup::select('periode', 'tahun_input','sumber_data')->distinct()->orderBy('tahun_input', 'ASC')->get('periode','tahun_input','sumber_data');
        $nama_table  = ResearchGroup::select('nama_table')->distinct()->get('nama_table');
        
        return view('admin.researchgroup.index', ['research' => $research, 'nama_table' => $nama_table]);
    }

    public function updateNamaTable(Request $request, $nama_table)
    {
        $penelitipengabdi = ResearchGroup::where([['nama_table', $nama_table]])->get();
        
        foreach ($penelitipengabdi as $peneliti) {
            $peneliti->nama_table = $request->nama_table;
            $peneliti->save();
        }

        return redirect(route('admin.researchgroup.index'));
    }

    public function update(Request $request, $periode, $tahun_input, $sumber_data )
    {
        $penelitipengabdi = ResearchGroup::where([['periode', $periode], ['tahun_input', $tahun_input], ['sumber_data', $sumber_data]])->get();

        foreach ($penelitipengabdi as $peneliti) {
            $peneliti->periode = $request->periode;
            $peneliti->tahun_input = $request->tahun_input;
            $peneliti->sumber_data = $request->sumber_data;
            $peneliti->save();
        }

        return redirect()->route('admin.researchgroup.index');
    }

    public function delete($periode, $tahun_input)
    {
        $penelitipengabdi = ResearchGroup::where([['periode', $periode], ['tahun_input', $tahun_input]])->get();
        foreach ($penelitipengabdi as $peneliti) {
            $peneliti->delete();
        }

        return redirect()->route('admin.researchgroup.index')
            ->with($this->status(0, 'sukses', 'Data Berhasil Dihapus!'));
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


        ResearchGroup::where('periode', 'kosong' )
        ->update(['periode' => $request->periode, 'tahun_input' => $request->tahun, 'sumber_data' => $sumber_data]);

        return redirect()->route('admin.researchgroup.index');
    }

    // public function details(Request $request)
    // {
    //     $tahun_input_dum = ResearchGroup::select('tahun_input')->distinct()->orderBy('tahun_input', 'ASC')->get()->pluck('tahun_input');
    //     if(count($tahun_input_dum) >= 5){
    //         $start_tahun = $tahun_input_dum[count($tahun_input_dum) - 5];
    //     }else{
    //         $start_tahun = $tahun_input_dum[0];
    //     }
    //     $tahun_input = ResearchGroup::select('tahun_input')->distinct()->where('tahun_input', '>=', $start_tahun)->orderBy('tahun_input', 'ASC')->get()->pluck('tahun_input');
    //     $researchData = ResearchGroup::select('fakultas','tahun_input','tahun1')->where('tahun_input', '>=', $start_tahun)->orderBy('tahun_input', 'ASC')->get();
    //     $research = [];
    //     $nama_table  = ResearchGroup::select('nama_table')->distinct()->get('nama_table');

    //     $arrJumlah = array_fill(0, count($tahun_input), 0);
    //     // dd($arrJumlah);
    //     foreach ($researchData as $item){
    //         foreach($tahun_input as $key => $th){
    //             if($th === $item->tahun_input){
    //                 $arrJumlah[$key] += $item->tahun1;
    //             }
    //         }
    //     }
    //     // dd($arrJumlah);

    //     foreach($researchData as $item){
    //         if(empty($research[$item->fakultas])){
    //             $research[$item->fakultas]['fakultas'] = $item->fakultas;
    //         }
    //         $research[$item->fakultas]['data'][$item->tahun_input] = $item->tahun1;
    //     }
    //     return view('admin.researchgroup.details', ['research' => $research, 'tahun_input' => $tahun_input, 'nama_table' => $nama_table, 'arrJumlah' => $arrJumlah]);    
    // }

    public function perolehan(Request $request)
    {
        $tahun_input_dum = ResearchGroup::select('tahun_input')->distinct()->orderBy('tahun_input', 'ASC')->get()->pluck('tahun_input');
        if(count($tahun_input_dum) >= 5){
            $start_tahun = $tahun_input_dum[count($tahun_input_dum) - 5];
        }else{
            $start_tahun = $tahun_input_dum[0];
        }
        $tahun_input = ResearchGroup::select('tahun_input')->distinct()->where('tahun_input', '>=', $start_tahun)->orderBy('tahun_input', 'ASC')->get()->pluck('tahun_input');
        $researchData = ResearchGroup::select('fakultas','tahun_input','tahun1')->where('tahun_input', '>=', $start_tahun)->orderBy('tahun_input', 'ASC')->get();
        $research = [];
        $nama_table  = ResearchGroup::select('nama_table')->distinct()->get('nama_table');

        $arrJumlah = array_fill(0, count($tahun_input), 0);
        // dd($arrJumlah);
        foreach ($researchData as $item){
            foreach($tahun_input as $key => $th){
                if($th === $item->tahun_input){
                    $arrJumlah[$key] += $item->tahun1;
                }
            }
        }
        // dd($arrJumlah);

        foreach($researchData as $item){
            if(empty($research[$item->fakultas])){
                $research[$item->fakultas]['fakultas'] = $item->fakultas;
            }
            $research[$item->fakultas]['data'][$item->tahun_input] = $item->tahun1;
        }
        return view('admin.researchgroup.perolehan', ['research' => $research, 'tahun_input' => $tahun_input, 'nama_table' => $nama_table, 'arrJumlah' => $arrJumlah]);
    }

    public function details($periode, $tahun_input)
    {
        $nama_table  = ResearchGroup::select('nama_table')->distinct()->get('nama_table');
        $researchgroups = ResearchGroup::where('periode', $periode)->where('tahun_input', $tahun_input)->get();
        $jumlah = [
            'jumlah' => $researchgroups->sum('tahun1'),
            
        ];
        $tahun = $tahun_input;
        return view('admin.researchgroup.details', compact('researchgroups', 'tahun', 'jumlah', 'nama_table'));
    }


    public function editJumlah(Request $request)
    {
      
        
        $research = ResearchGroup::find($request->id);
		$dataUpdate = [
			'fakultas' => $request->fakultas,
			'tahun1' => $request->tahun1,
            
		];
        
		if($research->update($dataUpdate)){
            $message = "Berhasil diupdate";
            
            return redirect()->route('admin.researchgroup.details', ['research' => $research->research, 'periode' => $research->periode, 'tahun_input' => $research->tahun_input]);
            
        }else{
            return redirect()->route('admin.researchgroup.details', ['research' => $research->research, 'periode' => $research->periode, 'tahun_input' => $research->tahun_input]);
        }
    }

    public function export($fakultas, $tahun)
    {
        $researchgroup = ResearchGroup::get();
        $table = new ExcelExport($researchgroup->toArray());

        return Excel::download($table, 'ResearchGroup.xlsx');
        // return Excel::download(new ResearchGroupExport($fakultas, $tahun), 'ResearchGroup.xlsx');
    }

}
