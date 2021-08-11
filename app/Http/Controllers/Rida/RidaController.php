<?php

namespace App\Http\Controllers\Rida;

use Illuminate\Support\Facades\Storage;
use App\Http\Controllers\Controller;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\PenelitiPengabdi;
use App\Exports\PenelitiPengabdiExport;
use App\Imports\PenelitiPengabdisImport;
use Maatwebsite\Excel\Facades\Excel;
use Illuminate\Support\Facades\DB;


class RidaController extends Controller
{
    public function index()
    {
        $penelitipengabdi = PenelitiPengabdi::distinct()->get('fakultas', 'id');
        
        return view('admin.penelitipengabdi.index', ['penelitipengabdi' => $penelitipengabdi]);
    }

    public function pilihperiode($fakultas)
    {
        $nama_fakultas  = $fakultas;
        $data = PenelitiPengabdi::select('periode', 'tahun_input', 'sumber_data')->distinct()->where('fakultas', $nama_fakultas)->get('periode', 'tahun_input', 'sumber_data');
        // dd($data);
        return view('admin.penelitipengabdi.pilihperiode', ['data' => $data, 'nama_fakultas' => $nama_fakultas]);
    }

    public function details($nama_fakultas, $periode, $tahun_input)
    {
        $fakultas = $nama_fakultas;
        $penelitipengabdi = PenelitiPengabdi::where([['fakultas', $fakultas],['periode', $periode], ['tahun_input', $tahun_input]])->get();

        $sum25sd35_jumlah       = PenelitiPengabdi::where([['fakultas', $fakultas],['periode', $periode]])->sum('usia25sd35_jumlah');
        $sum36sd45_jumlah       = PenelitiPengabdi::where([['fakultas', $fakultas],['periode', $periode]])->sum('usia36sd45_jumlah');
        $sum46sd55_jumlah       = PenelitiPengabdi::where([['fakultas', $fakultas],['periode', $periode]])->sum('usia46sd55_jumlah');
        $sum56sd65_jumlah       = PenelitiPengabdi::where([['fakultas', $fakultas],['periode', $periode]])->sum('usia56sd65_jumlah');
        $sum66sd75_jumlah       = PenelitiPengabdi::where([['fakultas', $fakultas],['periode', $periode]])->sum('usia66sd75_jumlah');
        $sum75_jumlah           = PenelitiPengabdi::where([['fakultas', $fakultas],['periode', $periode]])->sum('usia75_jumlah');

        $total               = PenelitiPengabdi::where([['fakultas', $fakultas],['periode', $periode]])->sum('total');

        $totalsemua          = PenelitiPengabdi::where([['fakultas', 'Universitas Sebelas Maret'],['periode', $periode]])->sum('total');
        $totalpercent               = $total/$totalsemua*100;

        // round($jml5/$jmltotalfak*100)
        // dd($totalsemua);

        return view('admin.penelitipengabdi.details', ['penelitipengabdi' => $penelitipengabdi, 'fakultas' => $fakultas, 
                    'sum25sd35_jumlah' => $sum25sd35_jumlah ,   
                    'sum36sd45_jumlah' => $sum36sd45_jumlah ,
                    'sum46sd55_jumlah' => $sum46sd55_jumlah,   
                    'sum56sd65_jumlah' => $sum56sd65_jumlah,   
                    'sum66sd75_jumlah' => $sum66sd75_jumlah,   
                    'sum75_jumlah' => $sum75_jumlah,   
                    'total' => $total,  'totalpercent' => $totalpercent, 'totalsemua' => $totalsemua,
                    ]);
    }

    public function add()
    {
        return view('admin/penelitipengabdi/add');
    }

    public function store(Request $request)
    {
        return redirect()->route('admin.penelitipengabdi.index');
    }

    public function edit(Request $request, $id)
    {
        $penelitipengabdi = PenelitiPengabdi::find($id);
        return view('admin/penelitipengabdi/edit', compact('penelitipengabdi'));
    }

    public function update(Request $request, $nama_fakultas, $periode, $tahun_input, $sumber_data)
    {
        $penelitipengabdi = PenelitiPengabdi::where([['fakultas', $nama_fakultas],['periode', $periode], ['tahun_input', $tahun_input], ['sumber_data', $sumber_data]])->get();
        
        foreach ($penelitipengabdi as $peneliti) {
            $peneliti->periode = $request->periode;
            $peneliti->tahun_input = $request->tahun_input;
            $peneliti->sumber_data = $request->sumber_data;
            $peneliti->save();
        }

        return redirect()->route('admin.penelitipengabdi.pilihperiode' , $nama_fakultas);
    }

    public function delete($nama_fakultas, $periode, $tahun_input)
    {
        $penelitipengabdi = PenelitiPengabdi::where([['fakultas', $nama_fakultas],['periode', $periode], ['tahun_input', $tahun_input]])->get();
        foreach ($penelitipengabdi as $peneliti) {
            $peneliti->delete();
        }

        return redirect()->route('admin.penelitipengabdi.index')
            ->with($this->status(0, 'sukses', 'Data Berhasil Dihapus!'));
    }

    public function export()
    {
        return Excel::download(new PenelitiPengabdiExport, 'penelitipengabdi.xlsx');
    }

    public function import(Request $request)
    {
        $file = $request->file("penelitipengabdi");
        $periode = $request->periode;
        $tahun = $request->tahun;
        $sumber_data = $request->sumber_data;
        // dd($periode);
        if ($file !== null) {
            Excel::import(new PenelitiPengabdisImport, $file);
        }
       
        PenelitiPengabdi::where('periode', 'kosong')
                ->update(['periode' => $periode, 'tahun_input' => $tahun, 'sumber_data' => $sumber_data]);

        return redirect()->route('admin.penelitipengabdi.index');
    }
}