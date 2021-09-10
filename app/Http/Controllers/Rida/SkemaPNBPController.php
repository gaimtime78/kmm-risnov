<?php

namespace App\Http\Controllers\Rida;

use App\Http\Controllers\Controller;
use App\Imports\SkemaPNBP\SkemaPNBPImport;
use App\Models\SkemaPNBP;
use Illuminate\Http\Request;
use Maatwebsite\Excel\Facades\Excel;

class SkemaPNBPController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $skemapnbp = SkemaPNBP::select('periode', 'tahun_input', 'sumber_data')->distinct()->get('periode', 'tahun_input', 'sumber_data');
        return view('admin.skemapnbp.index', compact('skemapnbp'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function import(Request $request)
    {
        $file = $request->file("skemapnbp");
        $periode = $request->periode;
        $tahun = $request->tahun;
        $sumber_data = $request->sumber_data;
        if ($file !== null) {
            Excel::import(new SkemaPNBPImport, $file);
        }

        SkemaPNBP::where('periode', 'kosong')
            ->update(['periode' => $request->periode, 'tahun_input' => $request->tahun, 'sumber_data' => $sumber_data]);

        return redirect()->route('admin.skemapnbp.index');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\HibahPNBP  $hibahPNBP
     * @return \Illuminate\Http\Response
     */
    public function details($periode, $tahun_input)
    {
        $skemapnbp = SkemaPNBP::select('fakultas')->distinct()->where('periode', $periode)->where('tahun_input', $tahun_input)->get();
        $total = [
            'jumlah' => $skemapnbp->sum('jumlah'),
        ];
        $tahun = $tahun_input;
        return view('admin.skemapnbp.details', ["data"=>$skemapnbp, "periode"=>$periode, "tahun"=>$tahun_input]);
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\HibahPNBP  $hibahPNBP
     * @return \Illuminate\Http\Response
     */
    public function detailsSkema($fakultas, $periode, $tahun_input)
    {
        $skemapnbp = SkemaPNBP::where('periode', $periode)->where('tahun_input', $tahun_input)->where('fakultas', $fakultas)->get();
        $total = [
            'jumlah' => $skemapnbp->sum('jumlah'),
        ];
        $tahun = $tahun_input;
        return view('admin.skemapnbp.details-skema', compact('skemapnbp', 'tahun', 'periode', 'fakultas', 'total'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\HibahPNBP  $hibahPNBP
     * @return \Illuminate\Http\Response
     */
    public function edit(HibahPNBP $hibahPNBP)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\HibahPNBP  $hibahPNBP
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, HibahPNBP $hibahPNBP)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\HibahPNBP  $hibahPNBP
     * @return \Illuminate\Http\Response
     */
    public function destroy(HibahPNBP $hibahPNBP)
    {
        //
    }
}
