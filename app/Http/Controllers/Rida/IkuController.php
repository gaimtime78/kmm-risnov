<?php

namespace App\Http\Controllers\Rida;

use Illuminate\Support\Facades\Storage;
use App\Http\Controllers\Controller;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\Iku;
use App\Exports\Iku\IkuExport;
use App\Imports\Iku\IkusImport;
use Maatwebsite\Excel\Facades\Excel;
use Illuminate\Support\Facades\DB;


class IkuController extends Controller
{
    public function index()
    {
        $iku = Iku::select('target_capaian', 'ik')->distinct()->get('target_capaian', 'ik');
        
        return view('admin.capaian_iku.index', ['iku' => $iku]);
    }

    public function pilihperiode($target_capaian)
    {
        $target  = $target_capaian;
        $data = Iku::select('periode', 'tahun_input', 'sumber_data')->distinct()->where('target_capaian', $target_capaian)->get('periode', 'tahun_input', 'sumber_data');
        
        return view('admin.capaian_iku.pilihperiode', ['data' => $data, 'target' => $target]);
    }

    public function details($target_capaian, $periode, $tahun_input)
    {
        // $target = $target_capaian;
        // $iku = Iku::where([['target', $target],['periode', $periode], ['tahun_input', $tahun_input]])->get();
        $iku = Iku::where([['target_capaian', $target_capaian],['periode', $periode],['tahun_input', $tahun_input]])->get();

        $target     = Iku::where([['target_capaian', $target_capaian],['periode', $periode]])->sum('target');
        $capaian    = Iku::where([['target_capaian', $target_capaian],['periode', $periode]])->sum('capaian');

        return view('admin.capaian_iku.details', ['target_capaian' => $target_capaian, 
        'target' => $target, 'iku' => $iku, 
                    
                    ]);
    }

    public function add()
    {
        return view('admin/capaian_iku/add');
    }

    public function store(Request $request)
    {
        return redirect()->route('admin.capaian_iku.index');
    }

    public function edit(Request $request, $id)
    {
        $iku = Iku::find($id);
        return view('admin/capaian_iku/edit', compact('iku'));
    }

    public function update(Request $request, $target, $periode, $tahun_input, $sumber_data)
    {
        $iku = Iku::where([['periode', $periode], ['tahun_input', $tahun_input], ['sumber_data', $sumber_data]])->get();
        // dd($target_capaian);
        foreach ($iku as $ik) {
            $ik->periode = $request->periode;
            $ik->tahun_input = $request->tahun_input;
            $ik->sumber_data = $request->sumber_data;
            $ik->save();
        }
        // $target_capaian = Iku::where(['target_capaian'])->get();

        return redirect()->route('admin.capaian_iku.pilihperiode' , $target );
    }

    public function delete($target, $periode, $tahun_input)
    {
        $iku = Iku::where([['target_capaian', $target],['periode', $periode], ['tahun_input', $tahun_input]])->get();
        foreach ($iku as $ik) {
            $ik->delete();
        }

        return redirect()->route('admin.capaian_iku.index')
            ->with($this->status(0, 'sukses', 'Data Berhasil Dihapus!'));
    }

    public function export()
    {
        return Excel::download(new PenelitiPengabdiExport, 'penelitipengabdi.xlsx');
    }

    public function import(Request $request)
    {
        $file = $request->file("iku");
        $periode = $request->periode;
        $tahun = $request->tahun;
        $sumber_data = $request->sumber_data;
        // dd($request);
        if ($file !== null) {
            Excel::import(new IkusImport, $file);
        }
       
        Iku::where('periode', 'kosong')
                ->update(['periode' => $periode, 'tahun_input' => $tahun, 'sumber_data' => $sumber_data]);

        return redirect()->route('admin.capaian_iku.index');
    }
}