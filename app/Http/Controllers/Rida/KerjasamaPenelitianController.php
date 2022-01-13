<?php

namespace App\Http\Controllers\Rida;

use Illuminate\Support\Facades\Storage;
use App\Http\Controllers\Controller;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Exports\KerjasamaPenelitian\ResearchGroupExport;
use App\Imports\KerjasamaPenelitian\KerjasamaPenelitianImport;
use App\Models\KerjasamaPenelitian;
use Maatwebsite\Excel\Facades\Excel;
use Illuminate\Support\Facades\DB;

class KerjasamaPenelitianController extends Controller
{
    //
    public function index(){
        $kerjasama = KerjasamaPenelitian::select('periode', 'tahun_input','sumber_data')->distinct()->orderBy('periode', 'ASC')->get('periode','tahun_input','sumber_data');
        $nama_table = KerjasamaPenelitian::select('nama_table')->distinct()->get('nama_table', 'id');

        
        return view('admin.kerjasamapenelitian.index', ['kerjasama' => $kerjasama, 'nama_table'=> $nama_table]);
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
        $kerjasamaData = KerjasamaPenelitian::select('id','pusat_studi','tahun_input','tahun1')->where('tahun_input', '>=', $start_tahun)->get();
        $nama_table = KerjasamaPenelitian::select('nama_table')->distinct()->get('nama_table', 'id');
        $kerjasama = [];
        foreach($kerjasamaData as $item){
            if(empty($kerjasama[$item->pusat_studi])){
                $kerjasama[$item->pusat_studi]['pusat_studi'] = $item->pusat_studi;
            }
            $kerjasama[$item->pusat_studi]['data'][$item->tahun_input] = $item->tahun1;
        }
        return view('admin.kerjasamapenelitian.details', ['kerjasama' => $kerjasama, 'tahun_input' => $tahun_input, 'nama_table'=> $nama_table]);    
    }

    public function updateNamaTable(Request $request, $nama_table)
    {
        $kerjasamaPenelitian = KerjasamaPenelitian::where([['nama_table', $nama_table]])->get();
        
        foreach ($kerjasamaPenelitian as $kerjasama) {
            $kerjasama->nama_table = $request->nama_table;
            $kerjasama->save();
        }

        return redirect(route('admin.kerjasamapenelitian.index'));
    }

    public function update(Request $request, $periode, $tahun_input, $sumber_data){
        $kerjasamaPenelitian = KerjasamaPenelitian:: where([['periode', $periode], ['tahun_input', $tahun_input]])->get();
        foreach( $kerjasamaPenelitian as $kerjasama){
            $kerjasama->periode = $request->periode;
            $kerjasama->tahun_input = $request->tahun_input;
            $kerjasama->sumber_data = $request->sumber_data;
            $kerjasama->save();
        }
        // dd($kerjasamaPenelitian);
        return redirect()->route('admin.kerjasamapenelitian.index');
    }

    public function delete($periode, $tahun_input)
    {
        $kerjasamaPenelitian = KerjasamaPenelitian::where([['periode', $periode], ['tahun_input', $tahun_input]])->get();
        foreach ($kerjasamaPenelitian as $kerjasama) {
            $kerjasama->delete();
        }
        return redirect()->route('admin.kerjasamapenelitian.index')
            ->with($this->status(0, 'sukses', 'Data Berhasil Dihapus!'));
    }
    public function limaedisi(Request $request)
    {
                
        // $data = KerjasamaPenelitian::select('periode','pusat_studi', 'tahun_input','sumber_data')->get('periode','pusat_studi', 'tahun_input','sumber_data');
        // dd($data);
        // return view('admin.kerjasamapenelitian.details-5tahun',compact('data'));
        $nama_table = KerjasamaPenelitian::select('nama_table')->distinct()->get('nama_table', 'id');
        $periode_dum = KerjasamaPenelitian::select('periode')->get()->pluck('periode');
        if(count($periode_dum) >= 5){
            $start_periode = $periode_dum[count($periode_dum) - 5];
        }else{
            $start_periode = $periode_dum[0];
        }
        $periode_input = KerjasamaPenelitian::select('periode', 'tahun_input')->distinct()->where('periode', '>=', $start_periode)->orderBy('tahun_input', 'ASC')->get()->pluck('periode');
        
        $periode_tahun = KerjasamaPenelitian::select('tahun_input')->distinct()->where('periode', '=', $start_periode)->orderBy('tahun_input', 'ASC')->get();
        // dd($periode_tahun);
        $kerjasamaPenelitian = KerjasamaPenelitian::select('pusat_studi','tahun_input','tahun1','periode')->where('periode', '>=', $start_periode)->get();
        $research = [];
        $spanArr = [];
        $researchHeader = [];
        foreach($periode_input as $item){
            $listPeriode = KerjasamaPenelitian::select('periode')->distinct()->where('periode', '>=', $item)->get();
            $jumlahPeriode = count($listPeriode);
            array_push($spanArr, $jumlahPeriode);
        }
        // dd($kerjasamaPenelitian);
        foreach($kerjasamaPenelitian as $item){
            if(empty($research[$item->pusat_studi])){
                $research[$item->pusat_studi]['pusat_studi'] = $item->pusat_studi;
            }
            if(empty($research[$item->pusat_studi]['data'])){
                $research[$item->pusat_studi]['data'] = [$item->tahun1];
            }else{
                array_push($research[$item->pusat_studi]['data'], $item->tahun1);
            }        
        }
        // dd($research, $periode_tahun, $periode_input, $spanArr);
        return view('admin.kerjasamapenelitian.detailsSkemaFakultas-5tahun', ['research' => $research, 'spanArr' => $spanArr, 'periode_tahun' => $periode_tahun, 'periode_input'=>$periode_input, 'nama_table'=>$nama_table]);

    }
}
