<?php

namespace App\Http\Controllers\Rida;

use Illuminate\Support\Facades\Storage;
use App\Http\Controllers\Controller;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\PenelitiPengabdiSpesialisKonsultan;
use App\Exports\PenelitiPengabdiSpesialisKonsultan\PenelitiPengabdiSpesialisKonsultansExport;
use App\Imports\PenelitiPengabdiSpesialisKonsultan\PenelitiPengabdiSpesialisKonsultansImport;
use Maatwebsite\Excel\Facades\Excel;

class SpesialisKonsultanController extends Controller
{
    public function index()
    {
        // $penelitipengabdispesialiskonsultan = PenelitiPengabdiSpesialisKonsultan::distinct()->get('fakultas', 'id');
        $penelitipengabdispesialiskonsultan = PenelitiPengabdiSpesialisKonsultan::where('fakultas', 'Fakultas Kedokteran')->distinct()->get('fakultas', 'id');
        
        return view('admin.penelitipengabdispesialiskonsultan.index', ['penelitipengabdispesialiskonsultan' => $penelitipengabdispesialiskonsultan]);
    }

    public function pilihperiode($fakultas)
    {
        $nama_fakultas  = $fakultas;
        $data = PenelitiPengabdiSpesialisKonsultan::select('periode', 'tahun_input', 'sumber_data')->distinct()->where('fakultas', $nama_fakultas)->get('periode', 'tahun_input', 'sumber_data');
        
        return view('admin.penelitipengabdispesialiskonsultan.pilihperiode', ['data' => $data, 'nama_fakultas' => $nama_fakultas]);
    }

    
    public function details($nama_fakultas, $periode, $tahun_input)
    {
        $fakultas = $nama_fakultas;
        $penelitipengabdispesialiskonsultan = PenelitiPengabdiSpesialisKonsultan::where([['fakultas', $fakultas],['periode', $periode], ['tahun_input', $tahun_input]])->get();

        $sum25sd35_jumlah   = PenelitiPengabdiSpesialisKonsultan::where('fakultas', $fakultas)->sum('usia25sd35_jumlah');
        $sum36sd45_jumlah   = PenelitiPengabdiSpesialisKonsultan::where('fakultas', $fakultas)->sum('usia36sd45_jumlah');
        $sum46sd55_jumlah   = PenelitiPengabdiSpesialisKonsultan::where('fakultas', $fakultas)->sum('usia46sd55_jumlah');
        $sum56sd65_jumlah   = PenelitiPengabdiSpesialisKonsultan::where('fakultas', $fakultas)->sum('usia56sd65_jumlah');
        $sum66sd75_jumlah   = PenelitiPengabdiSpesialisKonsultan::where('fakultas', $fakultas)->sum('usia66sd75_jumlah');
        $sum75_jumlah   = PenelitiPengabdiSpesialisKonsultan::where('fakultas', $fakultas)->sum('usia75_jumlah');

        $total              = PenelitiPengabdiSpesialisKonsultan::where('fakultas', $fakultas)->sum('total');
        $totalsemua          = PenelitiPengabdiSpesialisKonsultan::where([['fakultas', 'Universitas Sebelas Maret'],['periode', $periode]])->sum('total');
        $totalpercent               = $total/$totalsemua*100;

        return view('admin.penelitipengabdispesialiskonsultan.details', ['penelitipengabdispesialiskonsultan' => $penelitipengabdispesialiskonsultan, 'fakultas' => $fakultas, 
                    'sum25sd35_jumlah' => $sum25sd35_jumlah ,   
                    'sum36sd45_jumlah' => $sum36sd45_jumlah ,
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
        return view('admin/penelitipengabdispesialiskonsultan/add');
    }

    public function store(Request $request)
    {
        return redirect()->route('admin.penelitipengabdispesialiskonsultan.index');
    }

    public function edit(Request $request, $id)
    {
        $penelitipengabdispesialiskonsultan = PenelitiPengabdiSpesialisKonsultan::find($id);
        return view('admin/penelitipengabdispesialiskonsultan/edit', compact('penelitipengabdispesialiskonsultan'));
    }

    public function update(Request $request, $nama_fakultas, $periode, $tahun_input, $sumber_data)
    {
        $penelitipengabdispesialiskonsultan = PenelitiPengabdiSpesialisKonsultan::where([['fakultas', $nama_fakultas],['periode', $periode], ['tahun_input', $tahun_input], ['sumber_data', $sumber_data]])->get();
        foreach ($penelitipengabdispesialiskonsultan as $peneliti) {
            $peneliti->periode = $request->periode;
            $peneliti->tahun_input = $request->tahun_input;
            $peneliti->sumber_data = $request->sumber_data;
            $peneliti->save();
        }

        return redirect()->route('admin.penelitipengabdispesialiskonsultan.pilihperiode' , $nama_fakultas);
    }

    public function delete($nama_fakultas, $periode, $tahun_input)
    {
        $penelitipengabdispesialiskonsultan = PenelitiPengabdiSpesialisKonsultan::where([['fakultas', $nama_fakultas],['periode', $periode], ['tahun_input', $tahun_input]])->get();
        foreach ($penelitipengabdispesialiskonsultan as $peneliti) {
            $peneliti->delete();
        }

        return redirect()->route('admin.penelitipengabdispesialiskonsultan.index')
            ->with($this->status(0, 'sukses', 'Data Berhasil Dihapus!'));
    }

    public function export()
    {
        return Excel::download(new PenelitiPengabdiSpesialisKonsultanExport, 'penelitipengabdispesialiskonsultan.xlsx');
    }

    public function import(Request $request)
    {
        $file = $request->file("penelitipengabdispesialiskonsultan");
        if ($file !== null) {
            Excel::import(new PenelitiPengabdiSpesialisKonsultansImport, $file);
        }
       
        PenelitiPengabdiSpesialisKonsultan::where('periode', 'kosong')
                ->update(['periode' => $request->periode, 'tahun_input' => $request->tahun, 'sumber_data' => $request->sumber_data]);

        return redirect()->route('admin.penelitipengabdispesialiskonsultan.index');
    }
}
