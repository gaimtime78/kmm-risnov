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
        $penelitipengabdispesialis1 = PenelitiPengabdiSpesialis1::distinct()->get('fakultas', 'id');
        
        return view('admin.penelitipengabdispesialis1.index', ['penelitipengabdispesialis1' => $penelitipengabdispesialis1]);
    }

    
    public function details(Request $request, $fakultas)
    {
        $nama_fakultas = $fakultas;
        $penelitipengabdispesialis1 = PenelitiPengabdiSpesialis1::distinct()->where('fakultas', $fakultas)->get();

        $sum25_35L              = PenelitiPengabdiSpesialis1::where('fakultas', $fakultas)->sum('usia25sd35_L');
        $sum25_35P              = PenelitiPengabdiSpesialis1::where('fakultas', $fakultas)->sum('usia25sd35_P');
        $sum25sd35_jumlah   = PenelitiPengabdiSpesialis1::where('fakultas', $fakultas)->sum('usia25sd35_jumlah');

        
        $sum36_45L              = PenelitiPengabdiSpesialis1::where('fakultas', $fakultas)->sum('usia36sd45_L');
        $sum36_45P              = PenelitiPengabdiSpesialis1::where('fakultas', $fakultas)->sum('usia36sd45_P');
        $sum36sd45_jumlah   = PenelitiPengabdiSpesialis1::where('fakultas', $fakultas)->sum('usia36sd45_jumlah');

        $sum46_55L              = PenelitiPengabdiSpesialis1::where('fakultas', $fakultas)->sum('usia46sd55_L');
        $sum46_55P              = PenelitiPengabdiSpesialis1::where('fakultas', $fakultas)->sum('usia46sd55_P');
        $sum46sd55_jumlah   = PenelitiPengabdiSpesialis1::where('fakultas', $fakultas)->sum('usia46sd55_jumlah');

        $sum56_65L              = PenelitiPengabdiSpesialis1::where('fakultas', $fakultas)->sum('usia56sd65_L');
        $sum56_65P              = PenelitiPengabdiSpesialis1::where('fakultas', $fakultas)->sum('usia56sd65_P');
        $sum56sd65_jumlah   = PenelitiPengabdiSpesialis1::where('fakultas', $fakultas)->sum('usia56sd65_jumlah');

        $sum66_75L              = PenelitiPengabdiSpesialis1::where('fakultas', $fakultas)->sum('usia66sd75_L');
        $sum66_75P              = PenelitiPengabdiSpesialis1::where('fakultas', $fakultas)->sum('usia66sd75_P');
        $sum66sd75_jumlah   = PenelitiPengabdiSpesialis1::where('fakultas', $fakultas)->sum('usia66sd75_jumlah');

        $sum75L              = PenelitiPengabdiSpesialis1::where('fakultas', $fakultas)->sum('usia75_L');
        $sum75P              = PenelitiPengabdiSpesialis1::where('fakultas', $fakultas)->sum('usia75_P');
        $sum75_jumlah   = PenelitiPengabdiSpesialis1::where('fakultas', $fakultas)->sum('usia75_jumlah');

        $total              = PenelitiPengabdiSpesialis1::where('fakultas', $fakultas)->sum('total');
        // $sum_total   = PenelitiPengabdi::where('fakultas', $fakultas)->sum('total');

        return view('admin.penelitipengabdispesialis1.details', ['penelitipengabdispesialis1' => $penelitipengabdispesialis1, 'fakultas' => $fakultas, 
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

    public function update(Request $request, $id)
    {
        $penelitipengabdispesialis1 = PenelitiPengabdiSpesialis1::find($id);
        return redirect()->route('admin.penelitipengabdispesialis1.index');
    }

    public function delete($id)
    {
        $penelitipengabdispesialis1 = PenelitiPengabdiSpesialis1::findOrFail($id);
        $penelitipengabdispesialis1->delete();

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
        return redirect()->route('admin.penelitipengabdispesialis1.index');
    }
}
