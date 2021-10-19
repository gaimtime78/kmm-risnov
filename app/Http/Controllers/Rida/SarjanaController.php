<?php

namespace App\Http\Controllers\Rida;

use Illuminate\Support\Facades\Storage;
use App\Http\Controllers\Controller;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\PenelitiPengabdiSarjana;
use App\Exports\PenelitiPengabdiSarjanaExport;
use App\Imports\PenelitiPengabdiSarjana\PenelitiPengabdiSarjanasImport;
use Maatwebsite\Excel\Facades\Excel;
use Illuminate\Support\Facades\DB;


class SarjanaController extends Controller
{
    public function index()
    {
        $penelitipengabdi = PenelitiPengabdiSarjana::select('fakultas')->distinct()->get('fakultas', 'id');
        $nama_table = PenelitiPengabdiSarjana::select('nama_table')->distinct()->get('nama_table', 'id');

        return view('admin.penelitipengabdisarjana.index', ['penelitipengabdi' => $penelitipengabdi, 'nama_table'=> $nama_table]);
    }

    public function pilihperiode($fakultas)
    {
        $nama_fakultas  = $fakultas;
        $data = PenelitiPengabdiSarjana::select('periode', 'tahun_input', 'sumber_data', 'nama_table')->distinct()->where('fakultas', $nama_fakultas)->get('periode', 'tahun_input', 'sumber_data', 'nama_table');
        // dd($data);
        return view('admin.penelitipengabdisarjana.pilihperiode', ['data' => $data, 'nama_fakultas' => $nama_fakultas]);
    }

    public function details($nama_fakultas, $periode, $tahun_input)
    {
        $fakultas = $nama_fakultas;
        // dd($fakultas);
        $penelitipengabdi = PenelitiPengabdiSarjana::where([['fakultas', $fakultas], ['periode', $periode], ['tahun_input', $tahun_input]])->get();

        $sum25sd35_jumlah       = PenelitiPengabdiSarjana::where([['fakultas', $fakultas], ['periode', $periode]])->sum('usia25sd35_jumlah');
        $sum36sd45_jumlah       = PenelitiPengabdiSarjana::where([['fakultas', $fakultas], ['periode', $periode]])->sum('usia36sd45_jumlah');
        $sum46sd55_jumlah       = PenelitiPengabdiSarjana::where([['fakultas', $fakultas], ['periode', $periode]])->sum('usia46sd55_jumlah');
        $sum56sd65_jumlah       = PenelitiPengabdiSarjana::where([['fakultas', $fakultas], ['periode', $periode]])->sum('usia56sd65_jumlah');
        $sum66sd75_jumlah       = PenelitiPengabdiSarjana::where([['fakultas', $fakultas], ['periode', $periode]])->sum('usia66sd75_jumlah');
        $sum75_jumlah           = PenelitiPengabdiSarjana::where([['fakultas', $fakultas], ['periode', $periode]])->sum('usia75_jumlah');

        $total               = PenelitiPengabdiSarjana::where([['fakultas', $fakultas], ['periode', $periode]])->sum('total');

        $totalsemua          = PenelitiPengabdiSarjana::where([['fakultas', 'Universitas Sebelas Maret'], ['periode', $periode]])->sum('total');
        $totalpercent               = $total / $totalsemua * 100;

        // round($jml5/$jmltotalfak*100)
        // dd($totalsemua);

        return view('admin.penelitipengabdisarjana.details', [
            'penelitipengabdi' => $penelitipengabdi, 'fakultas' => $fakultas,
            'sum25sd35_jumlah' => $sum25sd35_jumlah,
            'sum36sd45_jumlah' => $sum36sd45_jumlah,
            'sum46sd55_jumlah' => $sum46sd55_jumlah,
            'sum56sd65_jumlah' => $sum56sd65_jumlah,
            'sum66sd75_jumlah' => $sum66sd75_jumlah,
            'sum75_jumlah' => $sum75_jumlah,
            'total' => $total,  'totalpercent' => $totalpercent, 'totalsemua' => $totalsemua,
        ]);
    }

    public function add()
    {
        return view('admin/penelitipengabdisarjana/add');
    }

    public function store(Request $request)
    {
        return redirect()->route('admin.penelitipengabdisarjana.index');
    }

    public function edit(Request $request, $id)
    {
        $penelitipengabdisarjana = PenelitiPengabdiSarjana::find($id);
        return view('admin/penelitipengabdisarjana/edit', compact('penelitipengabdisarjana'));
    }

    public function update(Request $request, $nama_fakultas, $periode, $tahun_input, $sumber_data, $nama_table)
    {
        $penelitipengabdisarjana = PenelitiPengabdiSarjana::where([['fakultas', $nama_fakultas], ['periode', $periode], ['tahun_input', $tahun_input], ['sumber_data', $sumber_data], ['nama_table', $nama_table]])->get();

        foreach ($penelitipengabdisarjana as $peneliti) {
            $peneliti->periode = $request->periode;
            $peneliti->tahun_input = $request->tahun_input;
            $peneliti->sumber_data = $request->sumber_data;
            $peneliti->save();
        }

        return redirect()->route('admin.penelitipengabdisarjana.pilihperiode', $nama_fakultas);
    }

    public function delete($nama_fakultas, $periode, $tahun_input)
    {
        $penelitipengabdisarjana = PenelitiPengabdiSarjana::where([['fakultas', $nama_fakultas], ['periode', $periode], ['tahun_input', $tahun_input]])->get();
        foreach ($penelitipengabdisarjana as $peneliti) {
            $peneliti->delete();
        }

        return redirect()->route('admin.penelitipengabdisarjana.index')
            ->with($this->status(0, 'sukses', 'Data Berhasil Dihapus!'));
    }

    public function export()
    {
        return Excel::download(new PenelitiPengabdiSarjanaExport, 'penelitipengabdisarjana.xlsx');
    }

    public function import(Request $request)
    {
        $file = $request->file("penelitipengabdisarjana");
        $periode = $request->periode;
        $tahun = $request->tahun;
        $sumber_data = $request->sumber_data;
        $nama_table = $request->nama_table;
        // dd($file);
        if ($file !== null) {
            Excel::import(new PenelitiPengabdiSarjanasImport, $file);
        }

        PenelitiPengabdiSarjana::where('periode', 'kosong')
            ->update(['nama_table'=>$nama_table, 'periode' => $periode, 'tahun_input' => $tahun, 'sumber_data' => $sumber_data]);

        return redirect()->route('admin.penelitipengabdisarjana.index');
    }

    public function updateRow(Request $request, $id)
    {
        $peneliti = PenelitiPengabdiSarjana::find($id);
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

        return redirect(route('admin.penelitipengabdisarjana.details', [$fakultas, $periode, $tahun]));
    }
    public function updateNamaTable(Request $request, $nama_table)
    {
        $penelitipengabdi = PenelitiPengabdiSarjana::where([['nama_table', $nama_table]])->get();
        
        foreach ($penelitipengabdi as $peneliti) {
            $peneliti->nama_table = $request->nama_table;
            $peneliti->save();
        }

        return redirect(route('admin.penelitipengabdisarjana.index'));
    }
}
