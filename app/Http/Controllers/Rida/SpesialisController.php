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
        $penelitipengabdispesialis = PenelitiPengabdiSpesialis::distinct()->get('fakultas', 'id');
        
        return view('admin.penelitipengabdispesialis.index', ['penelitipengabdispesialis' => $penelitipengabdispesialis]);
    }

    public function pilihperiode($fakultas)
    {
        $nama_fakultas  = $fakultas;
        $data = PenelitiPengabdiSpesialis::select('periode', 'tahun_input')->distinct()->where('fakultas', $nama_fakultas)->get('periode', 'tahun_input');
        
        return view('admin.penelitipengabdispesialis.pilihperiode', ['data' => $data, 'nama_fakultas' => $nama_fakultas]);
    }

    
    public function details($nama_fakultas, $periode, $tahun_input)
    {
        $fakultas = $nama_fakultas;
        $penelitipengabdispesialis = PenelitiPengabdiSpesialis::where([['fakultas', $fakultas],['periode', $periode], ['tahun_input', $tahun_input]])->get();

        $sum25_35L              = PenelitiPengabdiSpesialis::where('fakultas', $fakultas)->sum('usia25sd35_L');
        $sum25_35P              = PenelitiPengabdiSpesialis::where('fakultas', $fakultas)->sum('usia25sd35_P');
        $sum25sd35_jumlah   = PenelitiPengabdiSpesialis::where('fakultas', $fakultas)->sum('usia25sd35_jumlah');

        
        $sum36_45L              = PenelitiPengabdiSpesialis::where('fakultas', $fakultas)->sum('usia36sd45_L');
        $sum36_45P              = PenelitiPengabdiSpesialis::where('fakultas', $fakultas)->sum('usia36sd45_P');
        $sum36sd45_jumlah   = PenelitiPengabdiSpesialis::where('fakultas', $fakultas)->sum('usia36sd45_jumlah');

        $sum46_55L              = PenelitiPengabdiSpesialis::where('fakultas', $fakultas)->sum('usia46sd55_L');
        $sum46_55P              = PenelitiPengabdiSpesialis::where('fakultas', $fakultas)->sum('usia46sd55_P');
        $sum46sd55_jumlah   = PenelitiPengabdiSpesialis::where('fakultas', $fakultas)->sum('usia46sd55_jumlah');

        $sum56_65L              = PenelitiPengabdiSpesialis::where('fakultas', $fakultas)->sum('usia56sd65_L');
        $sum56_65P              = PenelitiPengabdiSpesialis::where('fakultas', $fakultas)->sum('usia56sd65_P');
        $sum56sd65_jumlah   = PenelitiPengabdiSpesialis::where('fakultas', $fakultas)->sum('usia56sd65_jumlah');

        $sum66_75L              = PenelitiPengabdiSpesialis::where('fakultas', $fakultas)->sum('usia66sd75_L');
        $sum66_75P              = PenelitiPengabdiSpesialis::where('fakultas', $fakultas)->sum('usia66sd75_P');
        $sum66sd75_jumlah   = PenelitiPengabdiSpesialis::where('fakultas', $fakultas)->sum('usia66sd75_jumlah');

        $sum75L              = PenelitiPengabdiSpesialis::where('fakultas', $fakultas)->sum('usia75_L');
        $sum75P              = PenelitiPengabdiSpesialis::where('fakultas', $fakultas)->sum('usia75_P');
        $sum75_jumlah   = PenelitiPengabdiSpesialis::where('fakultas', $fakultas)->sum('usia75_jumlah');

        $total              = PenelitiPengabdiSpesialis::where('fakultas', $fakultas)->sum('total');
        // $sum_total   = PenelitiPengabdi::where('fakultas', $fakultas)->sum('total');

        return view('admin.penelitipengabdispesialis.details', ['penelitipengabdispesialis' => $penelitipengabdispesialis, 'fakultas' => $fakultas, 
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

    public function update(Request $request, $id)
    {
        $penelitipengabdispesialis = PenelitiPengabdiSpesialis::find($id);
        return redirect()->route('admin.penelitipengabdispesialis.index');
    }

    public function delete($id)
    {
        $penelitipengabdispesialis = PenelitiPengabdiSpesialis::findOrFail($id);
        $penelitipengabdispesialis->delete();

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
}
