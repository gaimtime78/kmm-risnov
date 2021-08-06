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
        $penelitipengabdispesialiskonsultan = PenelitiPengabdiSpesialisKonsultan::distinct()->get('fakultas', 'id');
        
        return view('admin.penelitipengabdispesialiskonsultan.index', ['penelitipengabdispesialiskonsultan' => $penelitipengabdispesialiskonsultan]);
    }

    public function pilihperiode($fakultas)
    {
        $nama_fakultas  = $fakultas;
        $data = PenelitiPengabdiSpesialisKonsultan::select('periode', 'tahun_input')->distinct()->where('fakultas', $nama_fakultas)->get('periode', 'tahun_input');
        
        return view('admin.penelitipengabdispesialiskonsultan.pilihperiode', ['data' => $data, 'nama_fakultas' => $nama_fakultas]);
    }

    
    public function details($nama_fakultas, $periode, $tahun_input)
    {
        $fakultas = $nama_fakultas;
        $penelitipengabdispesialiskonsultan = PenelitiPengabdiSpesialisKonsultan::where([['fakultas', $fakultas],['periode', $periode], ['tahun_input', $tahun_input]])->get();

        $sum25_35L              = PenelitiPengabdiSpesialisKonsultan::where('fakultas', $fakultas)->sum('usia25sd35_L');
        $sum25_35P              = PenelitiPengabdiSpesialisKonsultan::where('fakultas', $fakultas)->sum('usia25sd35_P');
        $sum25sd35_jumlah   = PenelitiPengabdiSpesialisKonsultan::where('fakultas', $fakultas)->sum('usia25sd35_jumlah');

        
        $sum36_45L              = PenelitiPengabdiSpesialisKonsultan::where('fakultas', $fakultas)->sum('usia36sd45_L');
        $sum36_45P              = PenelitiPengabdiSpesialisKonsultan::where('fakultas', $fakultas)->sum('usia36sd45_P');
        $sum36sd45_jumlah   = PenelitiPengabdiSpesialisKonsultan::where('fakultas', $fakultas)->sum('usia36sd45_jumlah');

        $sum46_55L              = PenelitiPengabdiSpesialisKonsultan::where('fakultas', $fakultas)->sum('usia46sd55_L');
        $sum46_55P              = PenelitiPengabdiSpesialisKonsultan::where('fakultas', $fakultas)->sum('usia46sd55_P');
        $sum46sd55_jumlah   = PenelitiPengabdiSpesialisKonsultan::where('fakultas', $fakultas)->sum('usia46sd55_jumlah');

        $sum56_65L              = PenelitiPengabdiSpesialisKonsultan::where('fakultas', $fakultas)->sum('usia56sd65_L');
        $sum56_65P              = PenelitiPengabdiSpesialisKonsultan::where('fakultas', $fakultas)->sum('usia56sd65_P');
        $sum56sd65_jumlah   = PenelitiPengabdiSpesialisKonsultan::where('fakultas', $fakultas)->sum('usia56sd65_jumlah');

        $sum66_75L              = PenelitiPengabdiSpesialisKonsultan::where('fakultas', $fakultas)->sum('usia66sd75_L');
        $sum66_75P              = PenelitiPengabdiSpesialisKonsultan::where('fakultas', $fakultas)->sum('usia66sd75_P');
        $sum66sd75_jumlah   = PenelitiPengabdiSpesialisKonsultan::where('fakultas', $fakultas)->sum('usia66sd75_jumlah');

        $sum75L              = PenelitiPengabdiSpesialisKonsultan::where('fakultas', $fakultas)->sum('usia75_L');
        $sum75P              = PenelitiPengabdiSpesialisKonsultan::where('fakultas', $fakultas)->sum('usia75_P');
        $sum75_jumlah   = PenelitiPengabdiSpesialisKonsultan::where('fakultas', $fakultas)->sum('usia75_jumlah');

        $total              = PenelitiPengabdiSpesialisKonsultan::where('fakultas', $fakultas)->sum('total');
        // $sum_total   = PenelitiPengabdi::where('fakultas', $fakultas)->sum('total');

        return view('admin.penelitipengabdispesialiskonsultan.details', ['penelitipengabdispesialiskonsultan' => $penelitipengabdispesialiskonsultan, 'fakultas' => $fakultas, 
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

    public function update(Request $request, $nama_fakultas, $periode, $tahun_input)
    {
        $penelitipengabdispesialiskonsultan = PenelitiPengabdiSpesialisKonsultan::where([['fakultas', $nama_fakultas],['periode', $periode], ['tahun_input', $tahun_input]])->get();
        foreach ($penelitipengabdispesialiskonsultan as $peneliti) {
            $peneliti->periode = $request->periode;
            $peneliti->tahun_input = $request->tahun_input;
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
