<?php

namespace App\Http\Controllers\Rida;

use Illuminate\Support\Facades\Storage;
use App\Http\Controllers\Controller;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\HibahMandiri;
use App\Exports\HibahMandiri\HibahMandiriExport;
use App\Imports\HibahMandiri\HibahMandiriImport;
use Maatwebsite\Excel\Facades\Excel;
use Illuminate\Support\Facades\DB;

class HibahMandiriController extends Controller
{
    //
    public function index(){
        $hibah = HibahMandiri::select('periode', 'tahun_input','sumber_data')->distinct()->get('periode','tahun_input','sumber_data');
        $nama_table = HibahMandiri::select('nama_table')->distinct()->get();
        return view('admin.hibahmandiri.index', ['hibah' => $hibah, 'nama_table'=>$nama_table]);
    }
    public function import(Request $request)
    {
        $file = $request->file("hibahmandiri");
        $periode = $request->periode;
        $tahun = $request->tahun;
        $sumber_data = $request->sumber_data;
        if ($file !== null) {
            Excel::import(new HibahMandiriImport, $file);
        }

        HibahMandiri::where('periode', 'kosong')
        ->update(['periode' => $request->periode, 'tahun_input' => $request->tahun, 'sumber_data' => $sumber_data]);

        return redirect()->route('admin.hibahmandiri.index');
    }

    public function details($periode, $tahun_input)
    {
        $nama_table = HibahMandiri::select('nama_table', 'tahun_input', 'periode')->distinct()->where('periode', $periode)->get();
        $usulan = HibahMandiri::where([ ['periode', $periode]])->get();
        $sumUsulan = HibahMandiri::where([ ['periode', $periode]])->sum('usulan');
        $sumDiterima = HibahMandiri::where([ ['periode', $periode]])->sum('diterima');
        // dd($sum);
        return view('admin.hibahmandiri.details', [
            'usulan' => $usulan,
            'nama_table' => $nama_table,
            'sumDiterima' => $sumDiterima,
            'sumUsulan' => $sumUsulan,
        ]);

    }

    public function lima_edisi()
    {
        $nama_table = HibahMandiri::select('nama_table')->distinct()->get('nama_table', 'id');
        $periode_dum = HibahMandiri::select('periode')->distinct()->get()->pluck('periode');
        if(count($periode_dum) >= 5){
            $start_periode = $periode_dum[count($periode_dum) - 5];
        }else{
            $start_periode = $periode_dum[0];
        }
        $periode_input = HibahMandiri::select('periode', 'tahun_input')->distinct()->where('periode', '>=', $start_periode)->orderBy('tahun_input', 'ASC')->get()->pluck('periode');

        $periode_tahun = HibahMandiri::select('tahun_input')->distinct()->where('periode', '=', $start_periode)->orderBy('tahun_input', 'ASC')->get();
        // dd($periode_tahun, $periode_dum);
        $hibah_mandiri = HibahMandiri::select('fakultas','usulan', 'diterima','tahun_input','periode')->where('periode', '>=', $start_periode)->get();
        $research = [];
        $spanArr = [];
        $researchHeader = [];
        foreach($periode_input as $item){
            $listPeriode = HibahMandiri::select('periode')->distinct()->where('periode', '>=', $item)->get();
            $jumlahPeriode = count($listPeriode);
            array_push($spanArr, $jumlahPeriode);
        }

        foreach($hibah_mandiri as $item){
            if(empty($research[$item->fakultas])){
                $research[$item->fakultas]['fakultas'] = $item->fakultas;
            }
            if(empty($research[$item->fakultas]['data'])){
                $research[$item->fakultas]['data'] = [array("usulan" => $item->usulan ,"diterima" => $item->diterima)];
            }else{
                array_push($research[$item->fakultas]['data'], array("usulan" => $item->usulan ,"diterima" => $item->diterima));
            }
        }
        // dd($research);
        // dd($research, $hibah_mandiri, $periode_tahun, $periode_input);
        return view('admin.hibahmandiri.detailsHibahMandiriFakultas-5tahun',
        ['research' => $research, 'spanArr' => $spanArr,
        'periode_tahun' => $periode_tahun, 'periode_input'=>$periode_input,
        'nama_table'=>$nama_table]);

    }
    public function updateNamaTable(Request $request, $nama_table)
    {
        $hibah_mandiri = HibahMandiri::where([['nama_table', $nama_table]])->get();

        foreach ($hibah_mandiri as $hibah) {
            $hibah->nama_table = $request->nama_table;
            $hibah->save();
        }

        return redirect(route('admin.hibahmandiri.index'));
    }

    public function delete($periode, $tahun_input)
    {
        $hibah_mandiri = HibahMandiri::where([['periode', $periode], ['tahun_input', $tahun_input]])->get();
        foreach ($hibah_mandiri as $hibah) {
            $hibah->delete();
        }
        return redirect()->route('admin.hibahmandiri.index')
            ->with($this->status(0, 'sukses', 'Data Berhasil Dihapus!'));
    }

}
