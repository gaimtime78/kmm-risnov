<?php

namespace App\Http\Controllers\Rida;

use Illuminate\Support\Facades\Storage;
use App\Http\Controllers\Controller;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\PenelitiPengabdiMagister;
use App\Exports\PenelitiPengabdiMagister\PenelitiPengabdiMagistersExport;
use App\Imports\PenelitiPengabdiMagister\PenelitiPengabdiMagistersImport;
use Maatwebsite\Excel\Facades\Excel;

class MagisterController extends Controller
{
    public function index()
    {
        $penelitipengabdimagister = PenelitiPengabdiMagister::distinct()->get('fakultas', 'id');
        $nama_table = PenelitiPengabdiMagister::select('nama_table')->distinct()->get('nama_table', 'id');


        return view('admin.penelitipengabdimagister.index', ['penelitipengabdimagister' => $penelitipengabdimagister, 'nama_table'=> $nama_table ]);
    }

    public function pilihperiode($fakultas)
    {
        $nama_fakultas  = $fakultas;
        $data = PenelitiPengabdiMagister::select('periode', 'tahun_input', 'sumber_data')->distinct()->where('fakultas', $nama_fakultas)->get('periode', 'tahun_input', 'sumber_data');

        return view('admin.penelitipengabdimagister.pilihperiode', ['data' => $data, 'nama_fakultas' => $nama_fakultas]);
    }


    public function details($nama_fakultas, $periode, $tahun_input)
    {
        $fakultas = $nama_fakultas;
        $penelitipengabdimagister = PenelitiPengabdiMagister::where([['fakultas', $fakultas], ['periode', $periode], ['tahun_input', $tahun_input]])->get();

        $sum25sd35_jumlah       = PenelitiPengabdiMagister::where([['fakultas', $fakultas], ['periode', $periode]])->sum('usia25sd35_jumlah');


        $sum36sd45_jumlah       = PenelitiPengabdiMagister::where([['fakultas', $fakultas], ['periode', $periode]])->sum('usia36sd45_jumlah');

        $sum46sd55_jumlah       = PenelitiPengabdiMagister::where([['fakultas', $fakultas], ['periode', $periode]])->sum('usia46sd55_jumlah');

        $sum56sd65_jumlah       = PenelitiPengabdiMagister::where([['fakultas', $fakultas], ['periode', $periode]])->sum('usia56sd65_jumlah');

        $sum66sd75_jumlah       = PenelitiPengabdiMagister::where([['fakultas', $fakultas], ['periode', $periode]])->sum('usia66sd75_jumlah');

        $sum75_jumlah           = PenelitiPengabdiMagister::where([['fakultas', $fakultas], ['periode', $periode]])->sum('usia75_jumlah');

        $total                  = PenelitiPengabdiMagister::where([['fakultas', $fakultas], ['periode', $periode]])->sum('total');

        $totalsemua             = PenelitiPengabdiMagister::where([['fakultas', 'Universitas Sebelas Maret'], ['periode', $periode]])->sum('total');
        $totalpercent               = $total / $totalsemua * 100;
        // $sum_total   = PenelitiPengabdi::where('fakultas', $fakultas)->sum('total');

        return view('admin.penelitipengabdimagister.details', [
            'penelitipengabdimagister' => $penelitipengabdimagister, 'fakultas' => $fakultas,
            'sum25sd35_jumlah' => $sum25sd35_jumlah,
            'sum36sd45_jumlah' => $sum36sd45_jumlah,
            'sum46sd55_jumlah' => $sum46sd55_jumlah,
            'sum56sd65_jumlah' => $sum56sd65_jumlah,
            'sum66sd75_jumlah' => $sum66sd75_jumlah,
            'sum75_jumlah' => $sum75_jumlah,
            'total' => $total,  'totalpercent' => $totalpercent, 'totalsemua' => $totalsemua,

            // 'sum25_35L' => $sum25_35L, 'sum25_35P' => $sum25_35P, 'sumusia25sd35_jumlah' => $sumusia25sd35_jumlah   
            // 'sum25_35L' => $sum25_35L, 'sum25_35P' => $sum25_35P, 'sumusia25sd35_jumlah' => $sumusia25sd35_jumlah   
            // 'sum25_35L' => $sum25_35L, 'sum25_35P' => $sum25_35P, 'sumusia25sd35_jumlah' => $sumusia25sd35_jumlah   

        ]);
    }

    public function add()
    {
        return view('admin/penelitipengabdimagister/add');
    }

    public function store(Request $request)
    {
        return redirect()->route('admin.penelitipengabdimagister.index');
    }

    public function edit(Request $request, $id)
    {
        $penelitipengabdimagister = PenelitiPengabdiMagister::find($id);
        return view('admin/penelitipengabdimagister/edit', compact('penelitipengabdimagister'));
    }

    public function update(Request $request, $nama_fakultas, $periode, $tahun_input, $sumber_data)
    {
        $penelitipengabdimagister = PenelitiPengabdiMagister::where([['fakultas', $nama_fakultas], ['periode', $periode], ['tahun_input', $tahun_input], ['sumber_data', $sumber_data]])->get();;
        foreach ($penelitipengabdimagister as $peneliti) {
            $peneliti->periode = $request->periode;
            $peneliti->tahun_input = $request->tahun_input;
            $peneliti->sumber_data = $request->sumber_data;
            $peneliti->save();
        }

        return redirect()->route('admin.penelitipengabdimagister.pilihperiode', $nama_fakultas);
    }

    public function delete($nama_fakultas, $periode, $tahun_input)
    {
        $penelitipengabdimagister = PenelitiPengabdiMagister::where([['fakultas', $nama_fakultas], ['periode', $periode], ['tahun_input', $tahun_input]])->get();
        foreach ($penelitipengabdimagister as $peneliti) {
            $peneliti->delete();
        }

        return redirect()->route('admin.penelitipengabdimagister.index')
            ->with($this->status(0, 'sukses', 'Data Berhasil Dihapus!'));
    }

    public function export()
    {
        return Excel::download(new PenelitiPengabdiMagistersExport, 'penelitipengabdimagister.xlsx');
    }

    public function import(Request $request)
    {
        $file = $request->file("penelitipengabdimagister");
        if ($file !== null) {
            Excel::import(new PenelitiPengabdiMagistersImport, $file);
        }

        PenelitiPengabdiMagister::where('periode', 'kosong')
            ->update(['periode' => $request->periode, 'tahun_input' => $request->tahun, 'sumber_data' => $request->sumber_data, 'nama_table' => $request->nama_table]);

        return redirect()->route('admin.penelitipengabdimagister.index');
    }

    public function updateRow(Request $request, $id)
    {
        $peneliti = PenelitiPengabdiMagister::find($id);
        $fakultas = $peneliti->fakultas;
        $periode = $peneliti->periode;
        $tahun = $peneliti->tahun_input;

        $usia25sd35_jumlah = $request->usia25sd35_jumlah;
        $usia36sd45_jumlah = $request->usia36sd45_jumlah;
        $usia46sd55_jumlah = $request->usia46sd55_jumlah;
        $usia56sd65_jumlah = $request->usia56sd65_jumlah;
        $usia66sd75_jumlah = $request->usia66sd75_jumlah;
        $usia75_jumlah = $request->usia75_jumlah;

        $peneliti->usia25sd35_jumlah = $usia25sd35_jumlah;
        $peneliti->usia36sd45_jumlah = $usia36sd45_jumlah;
        $peneliti->usia46sd55_jumlah = $usia46sd55_jumlah;
        $peneliti->usia56sd65_jumlah = $usia56sd65_jumlah;
        $peneliti->usia66sd75_jumlah = $usia66sd75_jumlah;
        $peneliti->usia75_jumlah = $usia75_jumlah;
        $peneliti->total = $usia25sd35_jumlah + $usia36sd45_jumlah + $usia46sd55_jumlah + $usia56sd65_jumlah + $usia66sd75_jumlah + $usia75_jumlah;
        $peneliti->save();

        return redirect(route('admin.penelitipengabdimagister.details', [$fakultas, $periode, $tahun]));
    }

    public function updateNamaTable(Request $request, $nama_table)
    {
        $penelitipengabdi = PenelitiPengabdiMagister::where([['nama_table', $nama_table]])->get();
        
        foreach ($penelitipengabdi as $peneliti) {
            $peneliti->nama_table = $request->nama_table;
            $peneliti->save();
        }

        return redirect(route('admin.penelitipengabdimagister.index'));
    }
}
