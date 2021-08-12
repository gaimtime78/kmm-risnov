<?php

namespace App\Http\Controllers\Rida;

use Illuminate\Support\Facades\Storage;
use App\Http\Controllers\Controller;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\PenelitiPengabdiProfesi;
use App\Exports\PenelitiPengabdiProfesi\PenelitiPengabdiProfesisExport;
use App\Imports\PenelitiPengabdiProfesi\PenelitiPengabdiProfesisImport;
use Maatwebsite\Excel\Facades\Excel;

class ProfesiController extends Controller
{
    public function index()
    {
        $penelitipengabdiprofesi = PenelitiPengabdiProfesi::distinct()->get('fakultas', 'id');

        return view('admin.penelitipengabdiprofesi.index', ['penelitipengabdiprofesi' => $penelitipengabdiprofesi]);
    }

    public function pilihperiode($fakultas)
    {
        $nama_fakultas  = $fakultas;
        $data = PenelitiPengabdiProfesi::select('periode', 'sumber_data', 'tahun_input')->distinct()->where('fakultas', $nama_fakultas)->get('periode', 'sumber_data', 'tahun_input');

        return view('admin.penelitipengabdiprofesi.pilihperiode', ['data' => $data, 'nama_fakultas' => $nama_fakultas]);
    }


    public function details($nama_fakultas, $periode, $tahun_input)
    {
        $fakultas = $nama_fakultas;
        $penelitipengabdiprofesi = PenelitiPengabdiProfesi::where([['fakultas', $fakultas], ['periode', $periode], ['tahun_input', $tahun_input]])->get();

        $sum25sd35_jumlah   = PenelitiPengabdiProfesi::where('fakultas', $fakultas)->sum('usia25sd35_jumlah');
        $sum36sd45_jumlah   = PenelitiPengabdiProfesi::where('fakultas', $fakultas)->sum('usia36sd45_jumlah');
        $sum46sd55_jumlah   = PenelitiPengabdiProfesi::where('fakultas', $fakultas)->sum('usia46sd55_jumlah');
        $sum56sd65_jumlah   = PenelitiPengabdiProfesi::where('fakultas', $fakultas)->sum('usia56sd65_jumlah');
        $sum66sd75_jumlah   = PenelitiPengabdiProfesi::where('fakultas', $fakultas)->sum('usia66sd75_jumlah');
        $sum75_jumlah   = PenelitiPengabdiProfesi::where('fakultas', $fakultas)->sum('usia75_jumlah');
        $total              = PenelitiPengabdiProfesi::where('fakultas', $fakultas)->sum('total');

        $totalsemua          = PenelitiPengabdiProfesi::where([['fakultas', 'Universitas Sebelas Maret'], ['periode', $periode]])->sum('total');
        $totalpercent               = $total / $totalsemua * 100;

        // $sum_total   = PenelitiPengabdi::where('fakultas', $fakultas)->sum('total');

        return view('admin.penelitipengabdiprofesi.details', [
            'penelitipengabdiprofesi' => $penelitipengabdiprofesi, 'fakultas' => $fakultas,
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
        return view('admin/penelitipengabdiprofesi/add');
    }

    public function store(Request $request)
    {
        return redirect()->route('admin.penelitipengabdiprofesi.index');
    }

    public function edit(Request $request, $id)
    {
        $penelitipengabdiprofesi = PenelitiPengabdiProfesi::find($id);
        return view('admin/penelitipengabdiprofesi/edit', compact('penelitipengabdiprofesi'));
    }

    public function update(Request $request, $nama_fakultas, $periode, $tahun_input)
    {
        $penelitipengabdiprofesi = PenelitiPengabdiProfesi::where([['fakultas', $nama_fakultas], ['periode', $periode], ['tahun_input', $tahun_input]])->get();
        foreach ($penelitipengabdiprofesi as $peneliti) {
            $peneliti->periode = $request->periode;
            $peneliti->tahun_input = $request->tahun_input;
            $peneliti->save();
        }

        return redirect()->route('admin.penelitipengabdiprofesi.pilihperiode', $nama_fakultas);
    }


    public function delete($nama_fakultas, $periode, $tahun_input)
    {
        $penelitipengabdiprofesi = PenelitiPengabdiProfesi::where([['fakultas', $nama_fakultas], ['periode', $periode], ['tahun_input', $tahun_input]])->get();
        foreach ($penelitipengabdiprofesi as $peneliti) {
            $peneliti->delete();
        }

        return redirect()->route('admin.penelitipengabdiprofesi.index')
            ->with($this->status(0, 'sukses', 'Data Berhasil Dihapus!'));
    }

    public function export()
    {
        return Excel::download(new PenelitiPengabdiProfesisExport, 'penelitipengabdiprofesi.xlsx');
    }

    public function import(Request $request)
    {
        $file = $request->file("penelitipengabdiprofesi");
        if ($file !== null) {
            Excel::import(new PenelitiPengabdiProfesisImport, $file);
        }

        PenelitiPengabdiProfesi::where('periode', 'kosong')
            ->update(['periode' => $request->periode, 'tahun_input' => $request->tahun, 'sumber_data' => $request->sumber_data]);

        return redirect()->route('admin.penelitipengabdiprofesi.index');
    }

    public function updateRow(Request $request, $id)
    {
        $peneliti = PenelitiPengabdiProfesi::find($id);
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

        return redirect(route('admin.penelitipengabdiprofesi.details', [$fakultas, $periode, $tahun]));
    }
}
