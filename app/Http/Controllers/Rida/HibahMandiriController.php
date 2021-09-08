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
        
        return view('admin.hibahmandiri.index', ['hibah' => $hibah]);
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
    
    public function details($nama_fakultas, $periode, $tahun_input)
    {
        $fakultas = $nama_fakultas;

        $sum2018_usulan = HibahMandiri::where([['fakultas', $fakultas], ['periode', $periode]])->sum('2018_usulan');
        $sum2018_diterima = HibahMandiri::where([['fakultas', $fakultas], ['periode', $periode]])->sum('2018_diterima');

        $sum2019_usulan = HibahMandiri::where([['fakultas', $fakultas], ['periode', $periode]])->sum('2019_usulan');
        $sum2019_diterima = HibahMandiri::where([['fakultas', $fakultas], ['periode', $periode]])->sum('2019_diterima');

        $sum2020_usulan = HibahMandiri::where([['fakultas', $fakultas], ['periode', $periode]])->sum('2020_usulan');
        $sum2020_diterima = HibahMandiri::where([['fakultas', $fakultas], ['periode', $periode]])->sum('2020_diterima');

        $sum2021_usulan = HibahMandiri::where([['fakultas', $fakultas], ['periode', $periode]])->sum('2021_usulan');
        $sum2021_diterima = HibahMandiri::where([['fakultas', $fakultas], ['periode', $periode]])->sum('2021_diterima');
        


        return view('admin.hibahmandiri.details', [
            'fakultas' => $fakultas,
            '2018_usulan' => $sum2018_usulan,
            '2018_diterima' => $sum2018_diterima,
            '2019_usulan' => $sum2019_usulan,
            '2019_diterima' => $sum2019_diterima,
            '2020_usulan' => $sum2020_usulan,
            '2020_diterima' => $sum2020_diterima,
            '2021_usulan' => $sum2021_usulan,
            '2021_diterima' => $sum2021_diterima,


            // 'sum25_35L' => $sum25_35L, 'sum25_35P' => $sum25_35P, 'sumusia25sd35_jumlah' => $sumusia25sd35_jumlah   
            // 'sum25_35L' => $sum25_35L, 'sum25_35P' => $sum25_35P, 'sumusia25sd35_jumlah' => $sumusia25sd35_jumlah   
            // 'sum25_35L' => $sum25_35L, 'sum25_35P' => $sum25_35P, 'sumusia25sd35_jumlah' => $sumusia25sd35_jumlah   

        ]);
         
    }
}
