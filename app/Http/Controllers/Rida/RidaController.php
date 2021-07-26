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

class RidaController extends Controller
{
    public function index()
    {
        $penelitipengabdi = PenelitiPengabdi::distinct()->get('fakultas', 'id');
        
        return view('admin.penelitipengabdi.index', ['penelitipengabdi' => $penelitipengabdi]);
    }

    public function details(Request $request, $fakultas)
    {
        $nama_fakultas = $fakultas;
        $penelitipengabdi = PenelitiPengabdi::distinct()->where('fakultas', $fakultas)->get();

        $sum25_35L              = PenelitiPengabdi::where('fakultas', $fakultas)->sum('usia25sd35_L');
        $sum25_35P              = PenelitiPengabdi::where('fakultas', $fakultas)->sum('usia25sd35_P');
        $sum25sd35_jumlah   = PenelitiPengabdi::where('fakultas', $fakultas)->sum('usia25sd35_jumlah');

        
        $sum36_45L              = PenelitiPengabdi::where('fakultas', $fakultas)->sum('usia36sd45_L');
        $sum36_45P              = PenelitiPengabdi::where('fakultas', $fakultas)->sum('usia36sd45_P');
        $sum36sd45_jumlah   = PenelitiPengabdi::where('fakultas', $fakultas)->sum('usia36sd45_jumlah');

        return view('admin.penelitipengabdi.details', ['penelitipengabdi' => $penelitipengabdi, 'fakultas' => $fakultas, 
                    'sum25_35L' => $sum25_35L, 'sum25_35P' => $sum25_35P, 'sum25sd35_jumlah' => $sum25sd35_jumlah ,   
                    'sum36_45L' => $sum36_45L, 'sum36_45P' => $sum36_45P, 'sum36sd45_jumlah' => $sum36sd45_jumlah ,

                    // 'sum25_35L' => $sum25_35L, 'sum25_35P' => $sum25_35P, 'sumusia25sd35_jumlah' => $sumusia25sd35_jumlah   
                    // 'sum25_35L' => $sum25_35L, 'sum25_35P' => $sum25_35P, 'sumusia25sd35_jumlah' => $sumusia25sd35_jumlah   
                    // 'sum25_35L' => $sum25_35L, 'sum25_35P' => $sum25_35P, 'sumusia25sd35_jumlah' => $sumusia25sd35_jumlah   
                    // 'sum25_35L' => $sum25_35L, 'sum25_35P' => $sum25_35P, 'sumusia25sd35_jumlah' => $sumusia25sd35_jumlah   
                    
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
        if ($file !== null) {
            Excel::import(new PenelitiPengabdisImport, $file);
        }
        return redirect()->route('admin.penelitipengabdi.index');
    }
}
