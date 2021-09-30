<?php

namespace App\Http\Controllers\Rida;

use App\Http\Controllers\Controller;
use App\Imports\SkemaNonPNBP\SkemaNonPNBPImport;
use App\Models\SkemaNonPNBP;
use Illuminate\Http\Request;
use Maatwebsite\Excel\Facades\Excel;

class SkemaNonPNBPController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $skemanonpnbp = SkemaNonPNBP::select('periode', 'tahun_input', 'sumber_data')->distinct()->get('periode', 'tahun_input', 'sumber_data');
        return view('admin.skemanonpnbp.index', compact('skemanonpnbp'));
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
        $file = $request->file("skemanonpnbp");
        $periode = $request->periode;
        $tahun = $request->tahun;
        $sumber_data = $request->sumber_data;
        if ($file !== null) {
            Excel::import(new SkemaNonPNBPImport, $file);
        }

        SkemaNonPNBP::where('periode', 'kosong')
            ->update(['periode' => $request->periode, 'tahun_input' => $request->tahun, 'sumber_data' => $sumber_data]);

        return redirect()->route('admin.skemanonpnbp.index');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\HibahPNBP  $hibahPNBP
     * @return \Illuminate\Http\Response
     */
    public function details($periode, $tahun_input)
    {
        $skemanonpnbp = SkemaNonPNBP::select('jenis')->distinct()->where('periode', $periode)->where('tahun_input', $tahun_input)->get();
        $total = [
            'jumlah' => $skemanonpnbp->sum('jumlah'),
        ];
        $tahun = $tahun_input;
        return view('admin.skemanonpnbp.details', ["data"=>$skemanonpnbp, "periode"=>$periode, "tahun"=>$tahun_input]);
    }
    
    public function detailsSkema5Tahun()
    {
        $data = SkemaNonPNBP::select('periode','jenis', 'tahun_input','sumber_data')->distinct()->get('periode','jenis', 'tahun_input','sumber_data');
        return view('admin.skemanonpnbp.details-5tahun',compact('data'));
    }

    public function detailsSkemaFakultas5Tahun($jenis)
    {
        // dd($skema);
        $tahun_input_dum = SkemaNonPNBP::select('tahun_input')->distinct()->get()->pluck('tahun_input');
        if(count($tahun_input_dum) >= 5){
            $start_tahun = $tahun_input_dum[count($tahun_input_dum) - 5];
        }else{
            $start_tahun = $tahun_input_dum[0];
        }
        $tahun_input = SkemaNonPNBP::select('tahun_input')->distinct()->where('tahun_input', '>=', $start_tahun)->get()->pluck('tahun_input');

        $periode = SkemaNonPNBP::select('periode', 'tahun_input')->distinct()->where('tahun_input', '>=', $start_tahun)->get();
        // dd($periode);
        $jenisPnbp = SkemaNonPNBP::select('fakultas','tahun_input','jumlah','periode')->where('tahun_input', '>=', $start_tahun)->where('jenis', $jenis)->get();
        $research = [];
        $spanArr = [];
        $researchHeader = [];
        foreach($tahun_input as $item){
            $listPeriode = SkemaNonPNBP::select('periode')->distinct()->where('tahun_input', '>=', $item)->get();
            $jumlahPeriode = count($listPeriode);
            array_push($spanArr, $jumlahPeriode);
        }
        // dd($jenisPnbp);
        foreach($jenisPnbp as $item){
            if(empty($research[$item->fakultas])){
                $research[$item->fakultas]['fakultas'] = $item->fakultas;
            }
            if(empty($research[$item->fakultas]['data'])){
                $research[$item->fakultas]['data'] = [$item->jumlah];
            }else{
                array_push($research[$item->fakultas]['data'], $item->jumlah);
            }        
        }
        // dd($research, $periode, $tahun_input, $spanArr);
        return view('admin.skemanonpnbp.detailsSkemaFakultas-5tahun', ['research' => $research, 'spanArr' => $spanArr, 'tahun_input' => $tahun_input, 'periode_input'=>$periode]);
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\HibahPNBP  $hibahPNBP
     * @return \Illuminate\Http\Response
     */
    public function detailsJenis($jenis, $periode, $tahun_input)
    {
        $skemanonpnbp = SkemaNonPNBP::where('periode', $periode)->where('tahun_input', $tahun_input)->where('jenis', $jenis)->get();
        $total = [
            'jumlah' => $skemanonpnbp->sum('jumlah'),
        ];
        $tahun = $tahun_input;
        $keterangan = $skemanonpnbp[0]->keterangan;
        return view('admin.skemanonpnbp.details-skema', compact('skemanonpnbp', 'tahun', 'periode', 'jenis', 'total', 'keterangan'));
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

    public function editPeriode(Request $request)
    {
        // dd($request->all());
        $skema = SkemaNonPNBP::where('periode', $request->dbPeriode)->where('tahun_input', $request->dbtahun_input)->where('sumber_data', $request->dbsumber_data);
		$dataUpdate = [
			'periode' => $request->periode,
			'tahun_input' => $request->tahun_input,
            'sumber_data' => $request->sumber_data,
		];
		if($skema->update($dataUpdate)){
            $message = "Skema Non PNBP berhasil diupdate";
            return redirect()->route('admin.skemanonpnbp.index');
        }else{
            return redirect()->route('admin.skemanonpnbp.index')->with('message', 'error');
        }
    }

    public function deletePeriode(Request $request)
    {
        // dd($request->all());
        $skema = SkemaNonPNBP::where('periode', $request->dbPeriode)->where('tahun_input', $request->dbtahun_input);
		if($skema->delete()){
            $message = "Skema PNBP berhasil dihapus";
            return redirect()->route('admin.skemanonpnbp.index');
        }else{
            return redirect()->route('admin.skemanonpnbp.index')->with('message', 'error');
        }
    }

    public function editJumlah(Request $request)
    {
        $skema = SkemaNonPNBP::find($request->id);
		$dataUpdate = [
			'fakultas' => $request->fakultas,
			'jumlah' => $request->jumlah,
		];
		if($skema->update($dataUpdate)){
            $message = "Skema Non PNBP berhasil diupdate";
            // $skemapnbp = SkemaPNBP::where('periode', $skema->periode)->where('tahun_input', $skema->tahun_input)->where('skema', $skema->skema)->get();
            return redirect()->route('admin.skemanonpnbp.details-jenis', ['jenis' => $skema->jenis, 'periode' => $skema->periode, 'tahun_input' => $skema->tahun_input]);
            // return redirect()->route('admin.skemapnbp.details-skema');
        }else{
            return redirect()->route('admin.skemanonpnbp.details-jenis', ['jenis' => $skema->jenis, 'periode' => $skema->periode, 'tahun_input' => $skema->tahun_input]);
        }
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
