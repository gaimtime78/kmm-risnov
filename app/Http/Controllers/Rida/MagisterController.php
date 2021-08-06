<?php

namespace App\Http\Controllers\Rida;

use Illuminate\Support\Facades\Storage;
use App\Http\Controllers\Controller;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\PenelitiPengabdiMagister;
use App\Exports\PenelitiPengabdiMagister\PenelitiPengabdiMagistersExport;
use App\Imports\PenelitiPengabdiMagister\PenelitiPengabdiMagistersImport;
use Maatwebsite\Excel\Facades\Excel;

class MagisterController extends Controller
{
    public function index()
    {
        $penelitipengabdimagister = PenelitiPengabdiMagister::distinct()->get('fakultas', 'id');
        
        return view('admin.penelitipengabdimagister.index', ['penelitipengabdimagister' => $penelitipengabdimagister]);
    }

    public function pilihperiode($fakultas)
    {
        $nama_fakultas  = $fakultas;
        $data = PenelitiPengabdiMagister::select('periode', 'tahun_input')->distinct()->where('fakultas', $nama_fakultas)->get('periode', 'tahun_input');
        
        return view('admin.penelitipengabdimagister.pilihperiode', ['data' => $data, 'nama_fakultas' => $nama_fakultas]);
    }

    
    public function details($nama_fakultas, $periode, $tahun_input)
    {
        $fakultas = $nama_fakultas;
        $penelitipengabdimagister = PenelitiPengabdiMagister::where([['fakultas', $fakultas],['periode', $periode], ['tahun_input', $tahun_input]])->get();

        $sum25_35L              = PenelitiPengabdiMagister::where('fakultas', $fakultas)->sum('usia25sd35_L');
        $sum25_35P              = PenelitiPengabdiMagister::where('fakultas', $fakultas)->sum('usia25sd35_P');
        $sum25sd35_jumlah   = PenelitiPengabdiMagister::where('fakultas', $fakultas)->sum('usia25sd35_jumlah');

        
        $sum36_45L              = PenelitiPengabdiMagister::where('fakultas', $fakultas)->sum('usia36sd45_L');
        $sum36_45P              = PenelitiPengabdiMagister::where('fakultas', $fakultas)->sum('usia36sd45_P');
        $sum36sd45_jumlah   = PenelitiPengabdiMagister::where('fakultas', $fakultas)->sum('usia36sd45_jumlah');

        $sum46_55L              = PenelitiPengabdiMagister::where('fakultas', $fakultas)->sum('usia46sd55_L');
        $sum46_55P              = PenelitiPengabdiMagister::where('fakultas', $fakultas)->sum('usia46sd55_P');
        $sum46sd55_jumlah   = PenelitiPengabdiMagister::where('fakultas', $fakultas)->sum('usia46sd55_jumlah');

        $sum56_65L              = PenelitiPengabdiMagister::where('fakultas', $fakultas)->sum('usia56sd65_L');
        $sum56_65P              = PenelitiPengabdiMagister::where('fakultas', $fakultas)->sum('usia56sd65_P');
        $sum56sd65_jumlah   = PenelitiPengabdiMagister::where('fakultas', $fakultas)->sum('usia56sd65_jumlah');

        $sum66_75L              = PenelitiPengabdiMagister::where('fakultas', $fakultas)->sum('usia66sd75_L');
        $sum66_75P              = PenelitiPengabdiMagister::where('fakultas', $fakultas)->sum('usia66sd75_P');
        $sum66sd75_jumlah   = PenelitiPengabdiMagister::where('fakultas', $fakultas)->sum('usia66sd75_jumlah');

        $sum75L              = PenelitiPengabdiMagister::where('fakultas', $fakultas)->sum('usia75_L');
        $sum75P              = PenelitiPengabdiMagister::where('fakultas', $fakultas)->sum('usia75_P');
        $sum75_jumlah   = PenelitiPengabdiMagister::where('fakultas', $fakultas)->sum('usia75_jumlah');

        $total              = PenelitiPengabdiMagister::where('fakultas', $fakultas)->sum('total');
        // $sum_total   = PenelitiPengabdi::where('fakultas', $fakultas)->sum('total');

        return view('admin.penelitipengabdimagister.details', ['penelitipengabdimagister' => $penelitipengabdimagister, 'fakultas' => $fakultas, 
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
        return view('admin/penelitipengabdimagister/add');
    }

    public function store(Request $request)
    {
        return redirect()->route('admin.penelitipengabdimagister.index');
    }

    public function edit(Request $request, $id)
    {
        $penelitipengabdimagister = PenelitiPengabdiMagister::find($id);
        return view('admin/penelitipengabdimagister/edit', compact('penelitipengabdimagister'));
    }

    public function update(Request $request, $nama_fakultas, $periode, $tahun_input)
    {
        $penelitipengabdimagister = PenelitiPengabdiMagister::where([['fakultas', $nama_fakultas],['periode', $periode], ['tahun_input', $tahun_input]])->get();;
        foreach ($penelitipengabdimagister as $peneliti) {
            $peneliti->periode = $request->periode;
            $peneliti->tahun_input = $request->tahun_input;
            $peneliti->save();
        }

        return redirect()->route('admin.penelitipengabdimagister.pilihperiode' , $nama_fakultas);
    }

    public function delete($nama_fakultas, $periode, $tahun_input)
    {
        $penelitipengabdimagister = PenelitiPengabdiMagister::where([['fakultas', $nama_fakultas],['periode', $periode], ['tahun_input', $tahun_input]])->get();
        foreach ($penelitipengabdimagister as $peneliti) {
            $peneliti->delete();
        }

        return redirect()->route('admin.penelitipengabdimagister.index')
            ->with($this->status(0, 'sukses', 'Data Berhasil Dihapus!'));
    }

    public function export()
    {
        return Excel::download(new PenelitiPengabdiMagistersExport, 'penelitipengabdimagister.xlsx');
    }

    public function import(Request $request)
    {
        $file = $request->file("penelitipengabdimagister");
        if ($file !== null) {
            Excel::import(new PenelitiPengabdiMagistersImport, $file);
        }
       
        PenelitiPengabdiMagister::where('periode', 'kosong')
                ->update(['periode' => $request->periode, 'tahun_input' => $request->tahun, 'sumber_data' => $request->sumber_data]);

        return redirect()->route('admin.penelitipengabdimagister.index');
    }
}
