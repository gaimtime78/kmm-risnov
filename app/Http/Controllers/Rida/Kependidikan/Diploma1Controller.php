<?php

namespace App\Http\Controllers\Rida\Kependidikan;

use Illuminate\Support\Facades\Storage;
use App\Http\Controllers\Controller;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\Kependidikan\PenelitiPengabdiDiploma1;
use App\Exports\Kependidikan\PenelitiPengabdiDiploma1\PenelitiPengabdiDiploma1Export;
use App\Imports\Kependidikan\PenelitiPengabdiDiploma1\PenelitiPengabdiDiploma1Import;
use Maatwebsite\Excel\Facades\Excel;

class Diploma1Controller extends Controller
{
    public function index()
    {
        $penelitipengabdidiploma1 = PenelitiPengabdiDiploma1::distinct()->get('fakultas', 'id');
        $nama_table = PenelitiPengabdiDiploma1::select('nama_table')->distinct()->get('nama_table', 'id');

        return view('admin.kependidikan.penelitipengabdidiploma1.index', ['penelitipengabdidiploma1' => $penelitipengabdidiploma1,  'nama_table'=> $nama_table]);
    }

    public function pilihperiode($fakultas)
    {
        $nama_fakultas  = $fakultas;
        $data = PenelitiPengabdiDiploma1::select('periode', 'tahun_input', 'sumber_data')->distinct()->where('fakultas', $nama_fakultas)->get('periode', 'tahun_input', 'sumber_data');

        return view('admin.kependidikan.penelitipengabdidiploma1.pilihperiode', ['data' => $data, 'nama_fakultas' => $nama_fakultas]);
    }


    public function details($nama_fakultas, $periode, $tahun_input)
    {
        $fakultas = $nama_fakultas;
        $penelitipengabdidiploma1 = PenelitiPengabdiDiploma1::where([['fakultas', $fakultas], ['periode', $periode], ['tahun_input', $tahun_input]])->get();

        $sum25_L           = PenelitiPengabdiDiploma1::where([['fakultas', $fakultas], ['periode', $periode]])->sum('usia25_L');
        $sum25_P           = PenelitiPengabdiDiploma1::where([['fakultas', $fakultas], ['periode', $periode]])->sum('usia25_P');
        $sum25_jumlah           = PenelitiPengabdiDiploma1::where([['fakultas', $fakultas], ['periode', $periode]])->sum('usia25_jumlah');

        $sum25sd35_L       = PenelitiPengabdiDiploma1::where([['fakultas', $fakultas], ['periode', $periode]])->sum('usia25sd35_L');
        $sum25sd35_P       = PenelitiPengabdiDiploma1::where([['fakultas', $fakultas], ['periode', $periode]])->sum('usia25sd35_P');
        $sum25sd35_jumlah       = PenelitiPengabdiDiploma1::where([['fakultas', $fakultas], ['periode', $periode]])->sum('usia25sd35_jumlah');

        $sum36sd45_L       = PenelitiPengabdiDiploma1::where([['fakultas', $fakultas], ['periode', $periode]])->sum('usia36sd45_L');
        $sum36sd45_P       = PenelitiPengabdiDiploma1::where([['fakultas', $fakultas], ['periode', $periode]])->sum('usia36sd45_P');
        $sum36sd45_jumlah       = PenelitiPengabdiDiploma1::where([['fakultas', $fakultas], ['periode', $periode]])->sum('usia36sd45_jumlah');

        $sum46sd55_L       = PenelitiPengabdiDiploma1::where([['fakultas', $fakultas], ['periode', $periode]])->sum('usia46sd55_L');
        $sum46sd55_P       = PenelitiPengabdiDiploma1::where([['fakultas', $fakultas], ['periode', $periode]])->sum('usia46sd55_P');
        $sum46sd55_jumlah       = PenelitiPengabdiDiploma1::where([['fakultas', $fakultas], ['periode', $periode]])->sum('usia46sd55_jumlah');

        $sum56sd60_L       = PenelitiPengabdiDiploma1::where([['fakultas', $fakultas], ['periode', $periode]])->sum('usia56sd60_L');
        $sum56sd60_P       = PenelitiPengabdiDiploma1::where([['fakultas', $fakultas], ['periode', $periode]])->sum('usia56sd60_P');
        $sum56sd60_jumlah       = PenelitiPengabdiDiploma1::where([['fakultas', $fakultas], ['periode', $periode]])->sum('usia56sd60_jumlah');

        $total                  = PenelitiPengabdiDiploma1::where([['fakultas', $fakultas], ['periode', $periode]])->sum('total');
        $totalsemua             = PenelitiPengabdiDiploma1::where([['fakultas', 'Universitas Sebelas Maret'], ['periode', $periode]])->sum('total');
        $totalpercent               = $total / $totalsemua * 100;
        // $sum_total   = PenelitiPengabdi::where('fakultas', $fakultas)->sum('total');

        return view('admin.kependidikan.penelitipengabdidiploma1.details', [
            'penelitipengabdidiploma1' => $penelitipengabdidiploma1, 'fakultas' => $fakultas,
            'sum25_L'=>$sum25_L,'sum25_P'=>$sum25_P, 'sum25_jumlah' => $sum25_jumlah,
            'sum25sd35_L'=>$sum25sd35_L,'sum25sd35_P'=>$sum25sd35_P, 'sum25sd35_jumlah' => $sum25sd35_jumlah,
            'sum36sd45_L'=>$sum25sd35_L,'sum36sd45_P'=>$sum36sd45_P, 'sum36sd45_jumlah' => $sum36sd45_jumlah,
            'sum46sd55_L'=>$sum25sd35_L,'sum46sd55_P'=>$sum46sd55_P, 'sum46sd55_jumlah' => $sum46sd55_jumlah,
            'sum56sd60_L'=>$sum56sd60_L,'sum56sd60_P'=>$sum56sd60_P, 'sum56sd60_jumlah' => $sum56sd60_jumlah,
            'total' => $total,  'totalpercent' => $totalpercent, 'totalsemua' => $totalsemua,

            // 'sum25_35L' => $sum25_35L, 'sum25_35P' => $sum25_35P, 'sumusia25sd35_jumlah' => $sumusia25sd35_jumlah   
            // 'sum25_35L' => $sum25_35L, 'sum25_35P' => $sum25_35P, 'sumusia25sd35_jumlah' => $sumusia25sd35_jumlah   
            // 'sum25_35L' => $sum25_35L, 'sum25_35P' => $sum25_35P, 'sumusia25sd35_jumlah' => $sumusia25sd35_jumlah   

        ]);
    }

    public function add()
    {
        return view('admin/kependidikan/penelitipengabdidiploma1/add');
    }

    public function store(Request $request)
    {
        return redirect()->route('admin.penelitipengabdikependidikandiploma1.index');
    }

    public function edit(Request $request, $id)
    {
        $penelitipengabdidiploma1 = PenelitiPengabdiDiploma1::find($id);
        return view('admin/kependidikan/penelitipengabdidiploma1/edit', compact('penelitipengabdidiploma1'));
    }

    public function update(Request $request, $nama_fakultas, $periode, $tahun_input, $sumber_data)
    {
        $penelitipengabdidiploma1 = PenelitiPengabdiDiploma1::where([['fakultas', $nama_fakultas], ['periode', $periode], ['tahun_input', $tahun_input], ['sumber_data', $sumber_data]])->get();;
        foreach ($penelitipengabdidiploma1 as $peneliti) {
            $peneliti->periode = $request->periode;
            $peneliti->tahun_input = $request->tahun_input;
            $peneliti->sumber_data = $request->sumber_data;
            $peneliti->save();
        }

        return redirect()->route('admin.penelitipengabdikependidikandiploma1.pilihperiode', $nama_fakultas);
    }

    public function delete($nama_fakultas, $periode, $tahun_input)
    {
        $penelitipengabdidiploma1 = PenelitiPengabdiDiploma1::where([['fakultas', $nama_fakultas], ['periode', $periode], ['tahun_input', $tahun_input]])->get();
        foreach ($penelitipengabdidiploma1 as $peneliti) {
            $peneliti->delete();
        }

        return redirect()->route('admin.penelitipengabdikependidikandiploma1.index')
            ->with($this->status(0, 'sukses', 'Data Berhasil Dihapus!'));
    }

    public function export()
    {
        return Excel::download(new PenelitiPengabdiDiploma1Export, 'penelitipengabdidiploma1.xlsx');
    }

    public function import(Request $request)
    {
        $file = $request->file("penelitipengabdidiploma1");
        // dd($file);
        if ($file !== null) {
            Excel::import(new PenelitiPengabdiDiploma1Import, $file);
        }

        PenelitiPengabdiDiploma1::where('periode', 'kosong')
            ->update(['periode' => $request->periode, 'tahun_input' => $request->tahun, 'sumber_data' => $request->sumber_data]);

        return redirect()->route('admin.penelitipengabdikependidikandiploma1.index');
    }

    public function updateRow(Request $request, $id)
    {
        $peneliti = PenelitiPengabdiDiploma1::find($id);
        $fakultas = $peneliti->fakultas;
        $periode = $peneliti->periode;
        $tahun = $peneliti->tahun_input;

        $usia25_L = $request->usia25_L;
        $usia25_P = $request->usia25_P;
        
        $usia25sd35_L = $request->usia25sd35_L;
        $usia25sd35_P = $request->usia25sd35_P;

        $usia36sd45_L = $request->usia36sd45_L;
        $usia36sd45_P = $request->usia36sd45_P;


        $usia46sd55_L = $request->usia46sd55_L;
        $usia46sd55_P = $request->usia46sd55_P;


        $usia56sd60_L = $request->usia56sd60_L;
        $usia56sd60_P = $request->usia56sd60_P;


        $peneliti->usia25_L = $usia25_L;
        $peneliti->usia25_P = $usia25_P;
        $peneliti->usia25_jumlah = $usia25_L + $usia25_P;

        $peneliti->usia25sd35_L = $usia25sd35_L;
        $peneliti->usia25sd35_P = $usia25sd35_P;
        $peneliti->usia25sd35_jumlah = $usia25sd35_L + $usia25sd35_P;

        $peneliti->usia36sd45_L = $usia36sd45_L;
        $peneliti->usia36sd45_P = $usia36sd45_P;
        $peneliti->usia36sd45_jumlah = $usia36sd45_L + $usia36sd45_P;

        $peneliti->usia46sd55_L = $usia46sd55_L;
        $peneliti->usia46sd55_P = $usia46sd55_P;
        $peneliti->usia46sd55_jumlah = $usia46sd55_L+ $usia46sd55_P;


        $peneliti->usia56sd60_L = $usia56sd60_L;
        $peneliti->usia56sd60_P = $usia56sd60_P;
        $peneliti->usia56sd60_jumlah = $usia56sd60_L + $usia56sd60_P;

        $peneliti->total =  $peneliti->usia25_jumlah +  $peneliti->usia25sd35_jumlah + $peneliti->usia36sd45_jumlah + $peneliti->usia46sd55_jumlah + $peneliti->usia56sd60_jumlah;
        $peneliti->save();

        return redirect(route('admin.penelitipengabdikependidikandiploma1.details', [$fakultas, $periode, $tahun]));
    }

    public function updateNamaTable(Request $request, $nama_table)
    {
        $penelitipengabdi = PenelitiPengabdiDiploma1::where([['nama_table', $nama_table]])->get();
        
        foreach ($penelitipengabdi as $peneliti) {
            $peneliti->nama_table = $request->nama_table;
            $peneliti->save();
        }

        return redirect(route('admin.penelitipengabdikependidikandiploma1.index'));
    }
}
