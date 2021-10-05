<?php

namespace App\Http\Controllers\Rida;

use App\Http\Controllers\Controller;
use App\Imports\RekapSkemaPNBP\RekapSkemaPNBPImport;
use App\Models\RekapSkemaPNBP;
use Illuminate\Http\Request;
use Maatwebsite\Excel\Facades\Excel;

class RekapSkemaPNBPController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $rekap_skemapnbp = RekapSkemaPNBP::select('periode', 'tahun_input', 'sumber_data')->distinct()->get('periode', 'tahun_input', 'sumber_data');
        $nama_table = RekapSkemaPNBP::select('nama_table')->distinct()->get('nama_table', 'id');

        return view('admin.rekap_skemapnbp.index', compact('rekap_skemapnbp'), ['nama_table'=> $nama_table] );
    }

    public function updateNamaTable(Request $request, $nama_table)
    {
        $rekap_skemapnbp = RekapSkemaPNBP::where([['nama_table', $nama_table]])->get();
        
        foreach ($rekap_skemapnbp as $peneliti) {
            $peneliti->nama_table = $request->nama_table;
            $peneliti->save();
        }

        return redirect(route('admin.rekap_skemapnbp.index'));
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
        $file = $request->file("rekap_skemapnbp");
        $periode = $request->periode;
        $tahun = $request->tahun;
        $sumber_data = $request->sumber_data;
        if ($file !== null) {
            Excel::import(new RekapSkemaPNBPImport, $file);
        }

        RekapSkemaPNBP::where('periode', 'kosong')
            ->update(['periode' => $request->periode, 'tahun_input' => $request->tahun, 'sumber_data' => $sumber_data]);

        return redirect()->route('admin.rekap_skemapnbp.index');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\HibahPNBP  $hibahPNBP
     * @return \Illuminate\Http\Response
     */
    public function details($periode, $tahun_input)
    {
        $rekap_skemapnbp = RekapSkemaPNBP::select('jenis_skema', 'jumlah', 'id')->distinct()->where('periode', $periode)->where('tahun_input', $tahun_input)->get();
        $total = [
            'jumlah' => $rekap_skemapnbp->sum('jumlah'),
        ];
        $tahun = $tahun_input;
        $nama_table = RekapSkemaPNBP::select('nama_table')->distinct()->get('nama_table', 'id');

        return view('admin.rekap_skemapnbp.details', ["nama_table"=>$nama_table, "data"=>$rekap_skemapnbp, "periode"=>$periode, "tahun"=>$tahun_input]);
    }
    
    public function detailsSkema5Tahun()
    {
        $data = RekapSkemaPNBP::select('periode','skema', 'tahun_input','sumber_data')->distinct()->get('periode','skema', 'tahun_input','sumber_data');
        return view('admin.rekap_skemapnbp.details-5tahun',compact('data'));
    }

    public function detailsSkemaFakultas5Tahun($skema)
    {
        // dd($skema);
        $tahun_input_dum = RekapSkemaPNBP::select('tahun_input')->distinct()->get()->pluck('tahun_input');
        if(count($tahun_input_dum) >= 5){
            $start_tahun = $tahun_input_dum[count($tahun_input_dum) - 5];
        }else{
            $start_tahun = $tahun_input_dum[0];
        }
        $tahun_input = RekapSkemaPNBP::select('tahun_input')->distinct()->where('tahun_input', '>=', $start_tahun)->get()->pluck('tahun_input');

        $periode = RekapSkemaPNBP::select('periode', 'tahun_input')->distinct()->where('tahun_input', '>=', $start_tahun)->get();
        // dd($periode);
        $jenisPnbp = RekapSkemaPNBP::select('fakultas','tahun_input','jumlah','periode')->where('tahun_input', '>=', $start_tahun)->where('skema', $skema)->get();
        $research = [];
        $spanArr = [];
        $researchHeader = [];
        foreach($tahun_input as $item){
            $listPeriode = SkemaPNBP::select('periode')->distinct()->where('tahun_input', '>=', $item)->get();
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
        return view('admin.rekap_skemapnbp.detailsSkemaFakultas-5tahun', ['research' => $research, 'spanArr' => $spanArr, 'tahun_input' => $tahun_input, 'periode_input'=>$periode]);
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\HibahPNBP  $hibahPNBP
     * @return \Illuminate\Http\Response
     */
    public function detailsSkema($skema, $periode, $tahun_input)
    {
        $rekap_skemapnbp = RekapSkemaPNBP::where('periode', $periode)->where('tahun_input', $tahun_input)->where('skema', $skema)->get();
        $total = [
            'jumlah' => $rekap_skemapnbp->sum('jumlah'),
        ];
        $tahun = $tahun_input;
        return view('admin.rekap_skemapnbp.details-skema', compact('skemapnbp', 'tahun', 'periode', 'skema', 'total'));
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
        $skema = RekapSkemaPNBP::where('periode', $request->dbPeriode)->where('tahun_input', $request->dbtahun_input)->where('sumber_data', $request->dbsumber_data);
		$dataUpdate = [
			'periode' => $request->periode,
			'tahun_input' => $request->tahun_input,
            'sumber_data' => $request->sumber_data,
		];
		if($skema->update($dataUpdate)){
            $message = "Skema PNBP berhasil diupdate";
            return redirect()->route('admin.rekap_skemapnbp.index');
        }else{
            return redirect()->route('admin.rekap_skemapnbp.index')->with('message', 'error');
        }
    }

    public function deletePeriode(Request $request)
    {
        // dd($request->all());
        $skema = RekapSkemaPNBP::where('periode', $request->dbPeriode)->where('tahun_input', $request->dbtahun_input);
		if($skema->delete()){
            $message = "Skema PNBP berhasil dihapus";
            return redirect()->route('admin.rekap_skemapnbp.index');
        }else{
            return redirect()->route('admin.rekap_skemapnbp.index')->with('message', 'error');
        }
    }

    public function editJumlah(Request $request)
    {
        $skema = RekapSkemaPNBP::find($request->id);
        RekapSkemaPNBP::where('id', $skema)->update(['jenis_skema' => $request->jenis_skema]);
        
		$dataUpdate = [
            'jenis_skema' => $request->jenis_skema,
			'jumlah' => $request->jumlah,
		];
        // dd($skema);

        // RekapSkemaPNBP::where('periode', 'kosong')
        //     ->update(['periode' => $request->periode, 'tahun_input' => $request->tahun, 'sumber_data' => $sumber_data]);

		if($skema->update($dataUpdate)){
            $message = "Skema PNBP berhasil diupdate";
            // $skemapnbp = SkemaPNBP::where('periode', $skema->periode)->where('tahun_input', $skema->tahun_input)->where('skema', $skema->skema)->get();
            return redirect()->route('admin.rekap_skemapnbp.details', [ 'periode' => $skema->periode, 'tahun_input' => $skema->tahun_input]);
            // return redirect()->route('admin.skemapnbp.details-skema');
        }else{
            return redirect()->route('admin.rekap_skemapnbp.details', [ 'periode' => $skema->periode, 'tahun_input' => $skema->tahun_input]);
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
