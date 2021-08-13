<?php

namespace App\Http\Controllers\Rida;

use Illuminate\Support\Facades\Storage;
use App\Http\Controllers\Controller;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\PenelitiPengabdiSpesialis;
use App\Exports\PenelitiPengabdiSpesialis\PenelitiPengabdiSpesialissExport;
use App\Imports\PenelitiPengabdiSpesialis\PenelitiPengabdiSpesialissImport;
use Maatwebsite\Excel\Facades\Excel;

class SpesialisController extends Controller
{
    public function index()
    {
        // $penelitipengabdispesialis = PenelitiPengabdiSpesialis::distinct()->get('fakultas', 'id');
        $penelitipengabdispesialis = PenelitiPengabdiSpesialis::where('fakultas', 'Fakultas Kedokteran')->distinct()->get('fakultas', 'id');

        return view('admin.penelitipengabdispesialis.index', ['penelitipengabdispesialis' => $penelitipengabdispesialis]);
    }

    public function pilihperiode($fakultas)
    {
        $nama_fakultas  = $fakultas;
        $data = PenelitiPengabdiSpesialis::select('periode', 'tahun_input', 'sumber_data')->distinct()->where('fakultas', $nama_fakultas)->get('periode', 'tahun_input', 'sumber_data');

        return view('admin.penelitipengabdispesialis.pilihperiode', ['data' => $data, 'nama_fakultas' => $nama_fakultas]);
    }


    public function details($nama_fakultas, $periode, $tahun_input)
    {
        $fakultas = $nama_fakultas;
        $penelitipengabdispesialis = PenelitiPengabdiSpesialis::where([['fakultas', $fakultas], ['periode', $periode], ['tahun_input', $tahun_input]])->get();

        $sum25sd35_jumlah   = PenelitiPengabdiSpesialis::where('fakultas', $fakultas)->sum('usia25sd35_jumlah');
        $sum36sd45_jumlah   = PenelitiPengabdiSpesialis::where('fakultas', $fakultas)->sum('usia36sd45_jumlah');
        $sum46sd55_jumlah   = PenelitiPengabdiSpesialis::where('fakultas', $fakultas)->sum('usia46sd55_jumlah');
        $sum56sd65_jumlah   = PenelitiPengabdiSpesialis::where('fakultas', $fakultas)->sum('usia56sd65_jumlah');
        $sum66sd75_jumlah   = PenelitiPengabdiSpesialis::where('fakultas', $fakultas)->sum('usia66sd75_jumlah');
        $sum75_jumlah   = PenelitiPengabdiSpesialis::where('fakultas', $fakultas)->sum('usia75_jumlah');
        $total              = PenelitiPengabdiSpesialis::where('fakultas', $fakultas)->sum('total');

        $totalsemua          = PenelitiPengabdiSpesialis::where([['fakultas', 'Universitas Sebelas Maret'], ['periode', $periode]])->sum('total');
        $totalpercent               = $total / $totalsemua * 100;

        // $sum_total   = PenelitiPengabdi::where('fakultas', $fakultas)->sum('total');

        return view('admin.penelitipengabdispesialis.details', [
            'penelitipengabdispesialis' => $penelitipengabdispesialis, 'fakultas' => $fakultas,
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
        return view('admin/penelitipengabdispesialis/add');
    }

    public function store(Request $request)
    {
        return redirect()->route('admin.penelitipengabdispesialis.index');
    }

    public function edit(Request $request, $id)
    {
        $penelitipengabdispesialis = PenelitiPengabdiSpesialis::find($id);
        return view('admin/penelitipengabdispesialis/edit', compact('penelitipengabdispesialis'));
    }

    public function update(Request $request, $nama_fakultas, $periode, $tahun_input, $sumber_data)
    {
        $penelitipengabdispesialis = PenelitiPengabdiSpesialis::where([['fakultas', $nama_fakultas], ['periode', $periode], ['tahun_input', $tahun_input],  ['sumber_data', $sumber_data]])->get();
        foreach ($penelitipengabdispesialis as $peneliti) {
            $peneliti->periode = $request->periode;
            $peneliti->tahun_input = $request->tahun_input;
            $peneliti->sumber_data = $request->sumber_data;
            $peneliti->save();
        }

        return redirect()->route('admin.penelitipengabdispesialis.pilihperiode', $nama_fakultas);
    }

    public function delete($nama_fakultas, $periode, $tahun_input)
    {
        $penelitipengabdispesialis = PenelitiPengabdiSpesialis::where([['fakultas', $nama_fakultas], ['periode', $periode], ['tahun_input', $tahun_input]])->get();
        foreach ($penelitipengabdispesialis as $peneliti) {
            $peneliti->delete();
        }

        return redirect()->route('admin.penelitipengabdispesialis.index')
            ->with($this->status(0, 'sukses', 'Data Berhasil Dihapus!'));
    }

    public function export()
    {
        return Excel::download(new PenelitiPengabdiSpesialisExport, 'penelitipengabdispesialis.xlsx');
    }

    public function import(Request $request)
    {
        $file = $request->file("penelitipengabdispesialis");
        if ($file !== null) {
            Excel::import(new PenelitiPengabdiSpesialissImport, $file);
        }

        PenelitiPengabdiSpesialis::where('periode', 'kosong')
            ->update(['periode' => $request->periode, 'tahun_input' => $request->tahun, 'sumber_data' => $request->sumber_data]);

        return redirect()->route('admin.penelitipengabdispesialis.index');
    }

    public function updateRow(Request $request, $id)
    {
        $peneliti = PenelitiPengabdiSpesialis::find($id);
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

        return redirect(route('admin.penelitipengabdispesialis.details', [$fakultas, $periode, $tahun]));
    }
}
