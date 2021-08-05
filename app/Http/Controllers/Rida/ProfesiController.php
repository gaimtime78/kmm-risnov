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
        $data = PenelitiPengabdiProfesi::select('periode', 'tahun_input')->distinct()->where('fakultas', $nama_fakultas)->get('periode', 'tahun_input');
        
        return view('admin.penelitipengabdimagister.pilihperiode', ['data' => $data, 'nama_fakultas' => $nama_fakultas]);
    }

    
    public function details($nama_fakultas, $periode, $tahun_input)
    {
        $fakultas = $nama_fakultas;
        $penelitipengabdiprofesi = PenelitiPengabdiProfesi::where([['fakultas', $fakultas],['periode', $periode], ['tahun_input', $tahun_input]])->get();

        $sum25_35L              = PenelitiPengabdiProfesi::where('fakultas', $fakultas)->sum('usia25sd35_L');
        $sum25_35P              = PenelitiPengabdiProfesi::where('fakultas', $fakultas)->sum('usia25sd35_P');
        $sum25sd35_jumlah   = PenelitiPengabdiProfesi::where('fakultas', $fakultas)->sum('usia25sd35_jumlah');

        
        $sum36_45L              = PenelitiPengabdiProfesi::where('fakultas', $fakultas)->sum('usia36sd45_L');
        $sum36_45P              = PenelitiPengabdiProfesi::where('fakultas', $fakultas)->sum('usia36sd45_P');
        $sum36sd45_jumlah   = PenelitiPengabdiProfesi::where('fakultas', $fakultas)->sum('usia36sd45_jumlah');

        $sum46_55L              = PenelitiPengabdiProfesi::where('fakultas', $fakultas)->sum('usia46sd55_L');
        $sum46_55P              = PenelitiPengabdiProfesi::where('fakultas', $fakultas)->sum('usia46sd55_P');
        $sum46sd55_jumlah   = PenelitiPengabdiProfesi::where('fakultas', $fakultas)->sum('usia46sd55_jumlah');

        $sum56_65L              = PenelitiPengabdiProfesi::where('fakultas', $fakultas)->sum('usia56sd65_L');
        $sum56_65P              = PenelitiPengabdiProfesi::where('fakultas', $fakultas)->sum('usia56sd65_P');
        $sum56sd65_jumlah   = PenelitiPengabdiProfesi::where('fakultas', $fakultas)->sum('usia56sd65_jumlah');

        $sum66_75L              = PenelitiPengabdiProfesi::where('fakultas', $fakultas)->sum('usia66sd75_L');
        $sum66_75P              = PenelitiPengabdiProfesi::where('fakultas', $fakultas)->sum('usia66sd75_P');
        $sum66sd75_jumlah   = PenelitiPengabdiProfesi::where('fakultas', $fakultas)->sum('usia66sd75_jumlah');

        $sum75L              = PenelitiPengabdiProfesi::where('fakultas', $fakultas)->sum('usia75_L');
        $sum75P              = PenelitiPengabdiProfesi::where('fakultas', $fakultas)->sum('usia75_P');
        $sum75_jumlah   = PenelitiPengabdiProfesi::where('fakultas', $fakultas)->sum('usia75_jumlah');

        $total              = PenelitiPengabdiProfesi::where('fakultas', $fakultas)->sum('total');
        // $sum_total   = PenelitiPengabdi::where('fakultas', $fakultas)->sum('total');

        return view('admin.penelitipengabdiprofesi.details', ['penelitipengabdiprofesi' => $penelitipengabdiprofesi, 'fakultas' => $fakultas, 
                    'sum25_35L' => $sum25_35L, 'sum25_35P' => $sum25_35P, 'sum25sd35_jumlah' => $sum25sd35_jumlah ,   
                    'sum36_45L' => $sum36_45L, 'sum36_45P' => $sum36_45P, 'sum36sd45_jumlah' => $sum36sd45_jumlah ,
                    'sum46_55L' => $sum46_55L, 'sum46_55P' => $sum46_55P, 'sum46sd55_jumlah' => $sum46sd55_jumlah,   
                    'sum56_65L' => $sum56_65L, 'sum56_65P' => $sum56_65P, 'sum56sd65_jumlah' => $sum56sd65_jumlah,   
                    'sum66_75L' => $sum66_75L, 'sum66_75P' => $sum66_75P, 'sum66sd75_jumlah' => $sum66sd75_jumlah,   
                    'sum75L' => $sum75L, 'sum75P' => $sum75P, 'sum75_jumlah' => $sum75_jumlah,   
                    'total' => $total,  
                    
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

    public function update(Request $request, $id)
    {
        $penelitipengabdiprofesi = PenelitiPengabdiProfesi::find($id);
        return redirect()->route('admin.penelitipengabdiprofesi.index');
    }

    public function delete($id)
    {
        $penelitipengabdiprofesi = PenelitiPengabdiProfesi::findOrFail($id);
        $penelitipengabdiprofesi->delete();

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
                ->update(['periode' => $request->periode, 'tahun_input' => $request->tahun]);

        return redirect()->route('admin.penelitipengabdiprofesi.index');
    }
}
