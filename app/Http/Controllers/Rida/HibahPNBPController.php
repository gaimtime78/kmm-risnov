<?php

namespace App\Http\Controllers\Rida;

use App\Http\Controllers\Controller;
use App\Imports\HibahPNBP\HibahPNBPImport;
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
    public function index()
    {
        $hibahpnbps = HibahPNBP::select('periode', 'tahun_input', 'sumber_data')->distinct()->get('periode', 'tahun_input', 'sumber_data');
        $nama_table = HibahPNBP::select('nama_table')->distinct()->get('nama_table', 'id');

        return view('admin.hibahpnbp.index', ['hibahpnbps' => $hibahpnbps, 'nama_table'=> $nama_table]);
    }

    public function updateNamaTable(Request $request, $nama_table)
    {
        $penelitipengabdi = HibahPNBP::where([['nama_table', $nama_table]])->get();
        
        foreach ($penelitipengabdi as $peneliti) {
            $peneliti->nama_table = $request->nama_table;
            $peneliti->save();
        }

        return redirect(route('admin.hibahpnbp.index'));
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
        $file = $request->file("hibahpnbp");
        $periode = $request->periode;
        $tahun = $request->tahun;
        $sumber_data = $request->sumber_data;
        if ($file !== null) {
            Excel::import(new HibahPNBPImport, $file);
        }

        HibahPNBP::where('periode', 'kosong')
            ->update(['periode' => $request->periode, 'tahun_input' => $request->tahun, 'sumber_data' => $sumber_data]);

        return redirect()->route('admin.hibahpnbp.index');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\HibahPNBP  $hibahPNBP
     * @return \Illuminate\Http\Response
     */
    public function details($periode, $tahun_input)
    {
        $hibahpnbps = HibahPNBP::where('periode', $periode)->where('tahun_input', $tahun_input)->get();
        $total = [
            'usulan_lanjutan' => $hibahpnbps->sum('usulan_lanjutan'),
            'usulan_baru' => $hibahpnbps->sum('usulan_baru'),
            'diterima' => $hibahpnbps->sum('diterima')
        ];
        $tahun = $tahun_input;
        return view('admin.hibahpnbp.details', compact('hibahpnbps', 'tahun', 'total'));
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
    // public function update(Request $request, HibahPNBP $hibahPNBP)
    // {
    //     //

    // }

    public function update(Request $request, $periode, $tahun_input, $sumber_data)
    {
        $hibahpnbps = HibahPNBP::where([['periode', $periode], ['tahun_input', $tahun_input], ['sumber_data', $sumber_data]])->get();
        foreach ($hibahpnbps as $peneliti) {
            $peneliti->periode = $request->periode;
            $peneliti->tahun_input = $request->tahun_input;
            $peneliti->sumber_data = $request->sumber_data;
            $peneliti->save();
        }

        return redirect()->route('admin.hibahpnbp.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\HibahPNBP  $hibahPNBP
     * @return \Illuminate\Http\Response
     */
    public function delete($periode, $tahun_input)
    {
        HibahPNBP::where('periode', $periode)->where('tahun_input', $tahun_input)->delete();
        return redirect()->route('admin.hibahpnbp.index');
    }
}
