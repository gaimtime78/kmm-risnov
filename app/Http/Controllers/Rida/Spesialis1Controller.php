<?php

namespace App\Http\Controllers\Rida;

use Illuminate\Support\Facades\Storage;
use App\Http\Controllers\Controller;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\PenelitiPengabdiSpesialis1;
use App\Exports\PenelitiPengabdiSpesialis1\PenelitiPengabdiSpesialis1sExport;
use App\Imports\PenelitiPengabdiSpesialis1\PenelitiPengabdiSpesialis1sImport;
use Maatwebsite\Excel\Facades\Excel;

class Spesialis1Controller extends Controller
{
    public function index()
    {
        // $penelitipengabdispesialis1 = PenelitiPengabdiSpesialis1::distinct()->get('fakultas', 'id');
        $penelitipengabdispesialis1 = PenelitiPengabdiSpesialis1::where('fakultas', 'Fakultas Kedokteran')->orWhere('fakultas', 'Fakultas Ilmu Sosial dan Politik')->orWhere('fakultas','Universitas Sebelas Maret')->distinct()->get('fakultas', 'id');
        $nama_table = PenelitiPengabdiSpesialis1::select('nama_table')->distinct()->get('nama_table', 'id');

        return view('admin.penelitipengabdispesialis1.index', ['penelitipengabdispesialis1' => $penelitipengabdispesialis1, 'nama_table'=> $nama_table]);
    }

    public function pilihperiode($fakultas)
    {
        $nama_fakultas  = $fakultas;
        $data = PenelitiPengabdiSpesialis1::select('periode', 'tahun_input', 'sumber_data')->distinct()->where('fakultas', $nama_fakultas)->get('periode', 'tahun_input', 'sumber_data');

        return view('admin.penelitipengabdispesialis1.pilihperiode', ['data' => $data, 'nama_fakultas' => $nama_fakultas]);
    }


    public function details($nama_fakultas, $periode, $tahun_input)
    {
        $fakultas = $nama_fakultas;
        $penelitipengabdispesialis1 = PenelitiPengabdiSpesialis1::where([['fakultas', $fakultas], ['periode', $periode], ['tahun_input', $tahun_input]])->get();

        $sum25sd35_jumlah   = PenelitiPengabdiSpesialis1::where('fakultas', $fakultas)->sum('usia25sd35_jumlah');
        $sum36sd45_jumlah   = PenelitiPengabdiSpesialis1::where('fakultas', $fakultas)->sum('usia36sd45_jumlah');
        $sum46sd55_jumlah   = PenelitiPengabdiSpesialis1::where('fakultas', $fakultas)->sum('usia46sd55_jumlah');
        $sum56sd65_jumlah   = PenelitiPengabdiSpesialis1::where('fakultas', $fakultas)->sum('usia56sd65_jumlah');
        $sum66sd75_jumlah   = PenelitiPengabdiSpesialis1::where('fakultas', $fakultas)->sum('usia66sd75_jumlah');
        $sum75_jumlah   = PenelitiPengabdiSpesialis1::where('fakultas', $fakultas)->sum('usia75_jumlah');

        $total              = PenelitiPengabdiSpesialis1::where('fakultas', $fakultas)->sum('total');

        $totalsemua          = PenelitiPengabdiSpesialis1::where([['fakultas', 'Universitas Sebelas Maret'], ['periode', $periode]])->sum('total');
        $totalpercent               = $total / $totalsemua * 100;

        return view('admin.penelitipengabdispesialis1.details', [
            'penelitipengabdispesialis1' => $penelitipengabdispesialis1, 'fakultas' => $fakultas,
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
        return view('admin/penelitipengabdispesialis1/add');
    }

    public function store(Request $request)
    {
        return redirect()->route('admin.penelitipengabdispesialis1.index');
    }

    public function edit(Request $request, $id)
    {
        $penelitipengabdispesialis1 = PenelitiPengabdiSpesialis1::find($id);
        return view('admin/penelitipengabdispesialis1/edit', compact('penelitipengabdispesialis1'));
    }

    public function update(Request $request, $nama_fakultas, $periode, $tahun_input, $sumber_data)
    {
        $penelitipengabdispesialis1 = PenelitiPengabdiSpesialis1::where([['fakultas', $nama_fakultas], ['periode', $periode], ['tahun_input', $tahun_input], ['sumber_data', $sumber_data]])->get();
        foreach ($penelitipengabdispesialis1 as $peneliti) {
            $peneliti->periode = $request->periode;
            $peneliti->tahun_input = $request->tahun_input;
            $peneliti->sumber_data = $request->sumber_data;
            $peneliti->save();
        }

        return redirect()->route('admin.penelitipengabdispesialis1.pilihperiode', $nama_fakultas);
    }

    public function delete($nama_fakultas, $periode, $tahun_input)
    {
        $penelitipengabdispesialis1 = PenelitiPengabdiSpesialis1::where([['fakultas', $nama_fakultas], ['periode', $periode], ['tahun_input', $tahun_input]])->get();
        foreach ($penelitipengabdispesialis1 as $peneliti) {
            $peneliti->delete();
        }

        return redirect()->route('admin.penelitipengabdispesialis1.index')
            ->with($this->status(0, 'sukses', 'Data Berhasil Dihapus!'));
    }

    public function export()
    {
        return Excel::download(new PenelitiPengabdiSpesialis1Export, 'penelitipengabdispesialis1.xlsx');
    }

    public function import(Request $request)
    {
        $file = $request->file("penelitipengabdispesialis1");
        if ($file !== null) {
            Excel::import(new PenelitiPengabdiSpesialis1sImport, $file);
        }

        PenelitiPengabdiSpesialis1::where('periode', 'kosong')
            ->update(['periode' => $request->periode, 'tahun_input' => $request->tahun, 'sumber_data' => $request->sumber_data, 'nama_table' => $request->nama_table]);

        return redirect()->route('admin.penelitipengabdispesialis1.index');
    }

    public function updateRow(Request $request, $id)
    {
        $peneliti = PenelitiPengabdiSpesialis1::find($id);
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

        return redirect(route('admin.penelitipengabdispesialis1.details', [$fakultas, $periode, $tahun]));
    }
}
