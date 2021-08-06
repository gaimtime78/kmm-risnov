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
        $data = PenelitiPengabdi::select('periode', 'tahun_input')->distinct()->where('fakultas', $nama_fakultas)->get('periode', 'tahun_input');
        
        return view('admin.penelitipengabdi.pilihperiode', ['data' => $data, 'nama_fakultas' => $nama_fakultas]);
    }

    public function details($nama_fakultas, $periode, $tahun_input)
    {
        $fakultas = $nama_fakultas;
        $penelitipengabdi = PenelitiPengabdi::where([['fakultas', $fakultas],['periode', $periode], ['tahun_input', $tahun_input]])->get();

        $sum25_35L              = PenelitiPengabdi::where('fakultas', $fakultas)->sum('usia25sd35_L');
        $sum25_35P              = PenelitiPengabdi::where('fakultas', $fakultas)->sum('usia25sd35_P');
        $sum25sd35_jumlah       = PenelitiPengabdi::where('fakultas', $fakultas)->sum('usia25sd35_jumlah');

        
        $sum36_45L              = PenelitiPengabdi::where('fakultas', $fakultas)->sum('usia36sd45_L');
        $sum36_45P              = PenelitiPengabdi::where('fakultas', $fakultas)->sum('usia36sd45_P');
        $sum36sd45_jumlah       = PenelitiPengabdi::where('fakultas', $fakultas)->sum('usia36sd45_jumlah');

        $sum46_55L              = PenelitiPengabdi::where('fakultas', $fakultas)->sum('usia46sd55_L');
        $sum46_55P              = PenelitiPengabdi::where('fakultas', $fakultas)->sum('usia46sd55_P');
        $sum46sd55_jumlah       = PenelitiPengabdi::where('fakultas', $fakultas)->sum('usia46sd55_jumlah');

        $sum56_65L              = PenelitiPengabdi::where('fakultas', $fakultas)->sum('usia56sd65_L');
        $sum56_65P              = PenelitiPengabdi::where('fakultas', $fakultas)->sum('usia56sd65_P');
        $sum56sd65_jumlah       = PenelitiPengabdi::where('fakultas', $fakultas)->sum('usia56sd65_jumlah');

        $sum66_75L              = PenelitiPengabdi::where('fakultas', $fakultas)->sum('usia66sd75_L');
        $sum66_75P              = PenelitiPengabdi::where('fakultas', $fakultas)->sum('usia66sd75_P');
        $sum66sd75_jumlah       = PenelitiPengabdi::where('fakultas', $fakultas)->sum('usia66sd75_jumlah');

        $sum75L              = PenelitiPengabdi::where('fakultas', $fakultas)->sum('usia75_L');
        $sum75P              = PenelitiPengabdi::where('fakultas', $fakultas)->sum('usia75_P');
        $sum75_jumlah        = PenelitiPengabdi::where('fakultas', $fakultas)->sum('usia75_jumlah');

        $total               = PenelitiPengabdi::where('fakultas', $fakultas)->sum('total');

        return view('admin.penelitipengabdi.details', ['penelitipengabdi' => $penelitipengabdi, 'fakultas' => $fakultas, 
                    'sum25_35L' => $sum25_35L, 'sum25_35P' => $sum25_35P, 'sum25sd35_jumlah' => $sum25sd35_jumlah ,   
                    'sum36_45L' => $sum36_45L, 'sum36_45P' => $sum36_45P, 'sum36sd45_jumlah' => $sum36sd45_jumlah ,
                    'sum46_55L' => $sum46_55L, 'sum46_55P' => $sum46_55P, 'sum46sd55_jumlah' => $sum46sd55_jumlah,   
                    'sum56_65L' => $sum56_65L, 'sum56_65P' => $sum56_65P, 'sum56sd65_jumlah' => $sum56sd65_jumlah,   
                    'sum66_75L' => $sum66_75L, 'sum66_75P' => $sum66_75P, 'sum66sd75_jumlah' => $sum66sd75_jumlah,   
                    'sum75L' => $sum75L, 'sum75P' => $sum75P, 'sum75_jumlah' => $sum75_jumlah,   
                    'total' => $total,  
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

    public function update(Request $request, $id)
    {
        $penelitipengabdi = PenelitiPengabdi::find($id);
        return redirect()->route('admin.penelitipengabdi.index');
    }

    public function delete($id)
    {
        $penelitipengabdi = PenelitiPengabdi::findOrFail($id);
        $penelitipengabdi->delete();

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