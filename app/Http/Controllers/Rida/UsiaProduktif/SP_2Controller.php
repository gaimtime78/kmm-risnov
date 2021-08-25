<?php

namespace App\Http\Controllers\Rida\UsiaProduktif;

use Illuminate\Support\Facades\Storage;
use App\Http\Controllers\Controller;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\UsiaProduktif\UsiaProduktifSP_2;
use App\Exports\UsiaProduktif\SP_2\UsiaProduktifSP_2sExport;
use App\Imports\UsiaProduktif\SP_2\UsiaProduktifSP_2sImport;
use Maatwebsite\Excel\Facades\Excel;

class SP_2Controller extends Controller
{
    public function index()
    {
        $usiaproduktifsp_2 = UsiaProduktifSP_2::where('fakultas', 'Fakultas Kedokteran')->distinct()->get('fakultas', 'id');

        return view('admin.usiaproduktif.penelitipengabdisp_2.index', ['usiaproduktifsp_2' => $usiaproduktifsp_2]);
    }

    public function pilihperiode($fakultas)
    {
        $nama_fakultas  = $fakultas;
        $data = UsiaProduktifSP_2::select('periode', 'tahun_input', 'sumber_data')->distinct()->where('fakultas', $nama_fakultas)->get('periode', 'tahun_input', 'sumber_data');

        return view('admin.usiaproduktif.penelitipengabdisp_2.pilihperiode', ['data' => $data, 'nama_fakultas' => $nama_fakultas]);
    }


    public function details($nama_fakultas, $periode, $tahun_input)
    {
        $fakultas = $nama_fakultas;
        $usiaproduktifsp_2 = UsiaProduktifSP_2::where([['fakultas', $fakultas], ['periode', $periode], ['tahun_input', $tahun_input]])->get();

        $sum25sd35_L       = UsiaProduktifSP_2::where([['fakultas', $fakultas], ['periode', $periode]])->sum('usia25sd35_L');
        $sum25sd35_P       = UsiaProduktifSP_2::where([['fakultas', $fakultas], ['periode', $periode]])->sum('usia25sd35_P');
        $sum25sd35_jumlah  = UsiaProduktifSP_2::where([['fakultas', $fakultas], ['periode', $periode]])->sum('usia25sd35_jumlah');

        $sum36sd45_L       = UsiaProduktifSP_2::where([['fakultas', $fakultas], ['periode', $periode]])->sum('usia36sd45_L');
        $sum36sd45_P       = UsiaProduktifSP_2::where([['fakultas', $fakultas], ['periode', $periode]])->sum('usia36sd45_P');
        $sum36sd45_jumlah  = UsiaProduktifSP_2::where([['fakultas', $fakultas], ['periode', $periode]])->sum('usia36sd45_jumlah');

        $sum46sd55_L       = UsiaProduktifSP_2::where([['fakultas', $fakultas], ['periode', $periode]])->sum('usia46sd55_L');
        $sum46sd55_P       = UsiaProduktifSP_2::where([['fakultas', $fakultas], ['periode', $periode]])->sum('usia46sd55_P');
        $sum46sd55_jumlah  = UsiaProduktifSP_2::where([['fakultas', $fakultas], ['periode', $periode]])->sum('usia46sd55_jumlah');

        $sum56sd65_L       = UsiaProduktifSP_2::where([['fakultas', $fakultas], ['periode', $periode]])->sum('usia56sd65_L');
        $sum56sd65_P       = UsiaProduktifSP_2::where([['fakultas', $fakultas], ['periode', $periode]])->sum('usia56sd65_P');
        $sum56sd65_jumlah  = UsiaProduktifSP_2::where([['fakultas', $fakultas], ['periode', $periode]])->sum('usia56sd65_jumlah');
        
        $sum66sd75_L       = UsiaProduktifSP_2::where([['fakultas', $fakultas], ['periode', $periode]])->sum('usia66sd75_L');
        $sum66sd75_P       = UsiaProduktifSP_2::where([['fakultas', $fakultas], ['periode', $periode]])->sum('usia66sd75_P');
        $sum66sd75_jumlah  = UsiaProduktifSP_2::where([['fakultas', $fakultas], ['periode', $periode]])->sum('usia66sd75_jumlah');
        
        $sum75_L       = UsiaProduktifSP_2::where([['fakultas', $fakultas], ['periode', $periode]])->sum('usia75_L');
        $sum75_P       = UsiaProduktifSP_2::where([['fakultas', $fakultas], ['periode', $periode]])->sum('usia75_P');
        $sum75_jumlah  = UsiaProduktifSP_2::where([['fakultas', $fakultas], ['periode', $periode]])->sum('usia75_jumlah');

        $total                  = UsiaProduktifSP_2::where([['fakultas', $fakultas], ['periode', $periode]])->sum('total');
        $totalsemua             = UsiaProduktifSP_2::where([['fakultas', 'Universitas Sebelas Maret'], ['periode', $periode]])->sum('total');
        $totalpercent               = $total / $totalsemua * 100;
        // $sum_total   = PenelitiPengabdi::where('fakultas', $fakultas)->sum('total');

        return view('admin.usiaproduktif.penelitipengabdisp_2.details', [
            'usiaproduktifsp_2' => $usiaproduktifsp_2, 'fakultas' => $fakultas,
            'sum25sd35_L'=>$sum25sd35_L,'sum25sd35_P'=>$sum25sd35_P, 'sum25sd35_jumlah' => $sum25sd35_jumlah,
            'sum36sd45_L'=>$sum25sd35_L,'sum36sd45_P'=>$sum36sd45_P, 'sum36sd45_jumlah' => $sum36sd45_jumlah,
            'sum46sd55_L'=>$sum25sd35_L,'sum46sd55_P'=>$sum46sd55_P, 'sum46sd55_jumlah' => $sum46sd55_jumlah,
            'sum56sd65_L'=>$sum56sd65_L,'sum56sd65_P'=>$sum56sd65_P, 'sum56sd65_jumlah' => $sum56sd65_jumlah,
            'sum66sd75_L'=>$sum66sd75_L,'sum66sd75_P'=>$sum66sd75_P, 'sum66sd75_jumlah' => $sum66sd75_jumlah,
            'sum75_L'=>$sum75_L,'sum75_P'=>$sum75_P, 'sum75_jumlah' => $sum75_jumlah,
            'total' => $total,  'totalpercent' => $totalpercent, 'totalsemua' => $totalsemua,

            // 'sum25_35L' => $sum25_35L, 'sum25_35P' => $sum25_35P, 'sumusia25sd35_jumlah' => $sumusia25sd35_jumlah   
            // 'sum25_35L' => $sum25_35L, 'sum25_35P' => $sum25_35P, 'sumusia25sd35_jumlah' => $sumusia25sd35_jumlah   
            // 'sum25_35L' => $sum25_35L, 'sum25_35P' => $sum25_35P, 'sumusia25sd35_jumlah' => $sumusia25sd35_jumlah   

        ]);
    }

    public function add()
    {
        return view('admin/usiaproduktif/penelitipengabdisp_2/add');
    }

    public function store(Request $request)
    {
        return redirect()->route('admin.usiaproduktifsp_2.index');
    }

    public function edit(Request $request, $id)
    {
        $usiaproduktifsp_2 = UsiaProduktifSP_2::find($id);
        return view('admin/usiaproduktif/penelitipengabdisp_2/edit', compact('penelitipengabdimagister'));
    }

    public function update(Request $request, $nama_fakultas, $periode, $tahun_input, $sumber_data)
    {
        $usiaproduktifsp_2 = UsiaProduktifSP_2::where([['fakultas', $nama_fakultas], ['periode', $periode], ['tahun_input', $tahun_input], ['sumber_data', $sumber_data]])->get();;
        foreach ($usiaproduktifsp_2 as $peneliti) {
            $peneliti->periode = $request->periode;
            $peneliti->tahun_input = $request->tahun_input;
            $peneliti->sumber_data = $request->sumber_data;
            $peneliti->save();
        }

        return redirect()->route('admin.usiaproduktifsp_2.pilihperiode', $nama_fakultas);
    }

    public function delete($nama_fakultas, $periode, $tahun_input)
    {
        $usiaproduktifsp_2 = UsiaProduktifSP_2::where([['fakultas', $nama_fakultas], ['periode', $periode], ['tahun_input', $tahun_input]])->get();
        foreach ($usiaproduktifsp_2 as $peneliti) {
            $peneliti->delete();
        }

        return redirect()->route('admin.usiaproduktifsp_2.index')
            ->with($this->status(0, 'sukses', 'Data Berhasil Dihapus!'));
    }

    public function export()
    {
        return Excel::download(new UsiaProduktifSP_2sExport, 'penelitipengabdimagister.xlsx');
    }

    public function import(Request $request)
    {
        $file = $request->file("usiaproduktifsp_2");
        // dd($file);
        if ($file !== null) {
            Excel::import(new UsiaProduktifSP_2sImport, $file);
        }

        UsiaProduktifSP_2::where('periode', 'kosong')
            ->update(['periode' => $request->periode, 'tahun_input' => $request->tahun, 'sumber_data' => $request->sumber_data]);

        return redirect()->route('admin.usiaproduktifsp_2.index');
    }

    public function updateRow(Request $request, $id)
    {
        $peneliti = UsiaProduktifSP_2::find($id);
        // dd($peneliti);
        $fakultas = $peneliti->fakultas;
        $periode = $peneliti->periode;
        $tahun = $peneliti->tahun_input;

        
        $usia25sd35_L = $request->usia25sd35_L;
        $usia25sd35_P = $request->usia25sd35_P;

        $usia36sd45_L = $request->usia36sd45_L;
        $usia36sd45_P = $request->usia36sd45_P;


        $usia46sd55_L = $request->usia46sd55_L;
        $usia46sd55_P = $request->usia46sd55_P;


        $usia56sd65_L = $request->usia56sd65_L;
        $usia56sd65_P = $request->usia56sd65_P;
        
        $usia66sd75_L = $request->usia66sd75_L;
        $usia66sd75_P = $request->usia66sd75_P;

        $usia75_L = $request->usia75_L;
        $usia75_P = $request->usia75_P;
        
       
        $peneliti->usia25sd35_L = $usia25sd35_L;
        $peneliti->usia25sd35_P = $usia25sd35_P;
        $peneliti->usia25sd35_jumlah = $usia25sd35_L + $usia25sd35_P;

        $peneliti->usia36sd45_L = $usia36sd45_L;
        $peneliti->usia36sd45_P = $usia36sd45_P;
        $peneliti->usia36sd45_jumlah = $usia36sd45_L + $usia36sd45_P;

        $peneliti->usia46sd55_L = $usia46sd55_L;
        $peneliti->usia46sd55_P = $usia46sd55_P;
        $peneliti->usia46sd55_jumlah = $usia46sd55_L+ $usia46sd55_P;


        $peneliti->usia56sd65_L = $usia56sd65_L;
        $peneliti->usia56sd65_P = $usia56sd65_P;
        $peneliti->usia56sd65_jumlah = $usia56sd65_L + $usia56sd65_P;
       
        $peneliti->usia66sd75_L = $usia66sd75_L;
        $peneliti->usia66sd75_P = $usia66sd75_P;
        $peneliti->usia66sd75_jumlah = $usia66sd75_L + $usia66sd75_P;

        $peneliti->usia75_L = $usia75_L;
        $peneliti->usia75_P = $usia75_P;
        $peneliti->usia75_jumlah = $usia75_L + $usia75_P;

       
        $peneliti->total =  $peneliti->usia75_jumlah +  $peneliti->usia25sd35_jumlah + $peneliti->usia36sd45_jumlah + $peneliti->usia46sd55_jumlah + $peneliti->usia56sd65_jumlah + $peneliti->usia66sd75_jumlah;
        $peneliti->save();

        return redirect(route('admin.usiaproduktifsp_2.details', [$fakultas, $periode, $tahun]));
    }
}
