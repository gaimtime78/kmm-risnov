<?php

namespace App\Http\Controllers\Rida;

use Illuminate\Support\Facades\Storage;
use App\Http\Controllers\Controller;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\IndeksPenelitiPKM;
use App\Exports\IndeksPenelitiPKM\IndeksPenelitiPKMsExport;
use App\Imports\IndeksPenelitiPKM\IndeksPenelitiPKMsImport;
use Maatwebsite\Excel\Facades\Excel;

class IndeksPenelitiPKMController extends Controller
{
    public function index()
    {
        $indekspenelitipkm = IndeksPenelitiPKM::distinct()->get('fakultas', 'id');
        
        return view('admin.indekspenelitipkm.index', ['indekspenelitipkm' => $indekspenelitipkm]);
    }

    
    public function details(Request $request, $fakultas)
    {
        $nama_fakultas = $fakultas;
        $indekspenelitipkm = IndeksPenelitiPKM::distinct()->where('fakultas', $fakultas)->get();

        $sum25_35L              = IndeksPenelitiPKM::where('fakultas', $fakultas)->sum('usia25sd35_L');
        $sum25_35P              = IndeksPenelitiPKM::where('fakultas', $fakultas)->sum('usia25sd35_P');
        $sum25sd35_jumlah   = IndeksPenelitiPKM::where('fakultas', $fakultas)->sum('usia25sd35_jumlah');

        
        $sum36_45L              = IndeksPenelitiPKM::where('fakultas', $fakultas)->sum('usia36sd45_L');
        $sum36_45P              = IndeksPenelitiPKM::where('fakultas', $fakultas)->sum('usia36sd45_P');
        $sum36sd45_jumlah   = IndeksPenelitiPKM::where('fakultas', $fakultas)->sum('usia36sd45_jumlah');

        $sum46_55L              = IndeksPenelitiPKM::where('fakultas', $fakultas)->sum('usia46sd55_L');
        $sum46_55P              = IndeksPenelitiPKM::where('fakultas', $fakultas)->sum('usia46sd55_P');
        $sum46sd55_jumlah   = IndeksPenelitiPKM::where('fakultas', $fakultas)->sum('usia46sd55_jumlah');

        $sum56_65L              = IndeksPenelitiPKM::where('fakultas', $fakultas)->sum('usia56sd65_L');
        $sum56_65P              = IndeksPenelitiPKM::where('fakultas', $fakultas)->sum('usia56sd65_P');
        $sum56sd65_jumlah   = IndeksPenelitiPKM::where('fakultas', $fakultas)->sum('usia56sd65_jumlah');

        $sum66_75L              = IndeksPenelitiPKM::where('fakultas', $fakultas)->sum('usia66sd75_L');
        $sum66_75P              = IndeksPenelitiPKM::where('fakultas', $fakultas)->sum('usia66sd75_P');
        $sum66sd75_jumlah   = IndeksPenelitiPKM::where('fakultas', $fakultas)->sum('usia66sd75_jumlah');

        $sum75L              = IndeksPenelitiPKM::where('fakultas', $fakultas)->sum('usia75_L');
        $sum75P              = IndeksPenelitiPKM::where('fakultas', $fakultas)->sum('usia75_P');
        $sum75_jumlah   = IndeksPenelitiPKM::where('fakultas', $fakultas)->sum('usia75_jumlah');

        $total              = IndeksPenelitiPKM::where('fakultas', $fakultas)->sum('total');
        // $sum_total   = PenelitiPengabdi::where('fakultas', $fakultas)->sum('total');

        return view('admin.indekspenelitipkm.details', ['indekspenelitipkm' => $indekspenelitipkm, 'fakultas' => $fakultas, 
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
        return view('admin/indekspenelitipkm/add');
    }

    public function store(Request $request)
    {
        return redirect()->route('admin.indekspenelitipkm.index');
    }

    public function edit(Request $request, $id)
    {
        $indekspenelitipkm = IndeksPenelitiPKM::find($id);
        return view('admin/indekspenelitipkm/edit', compact('indekspenelitipkm'));
    }

    public function update(Request $request, $id)
    {
        $indekspenelitipkm = IndeksPenelitiPKM::find($id);
        return redirect()->route('admin.indekspenelitipkm.index');
    }

    public function delete($id)
    {
        $indekspenelitipkm = IndeksPenelitiPKM::findOrFail($id);
        $indekspenelitipkm->delete();

        return redirect()->route('admin.indekspenelitipkm.index')
            ->with($this->status(0, 'sukses', 'Data Berhasil Dihapus!'));
    }

    public function export()
    {
        return Excel::download(new IndeksPenelitiPKMsExport, 'indekspenelitipkm.xlsx');
    }

    public function import(Request $request)
    {
        $file = $request->file("indekspenelitipkm");
        if ($file !== null) {
            Excel::import(new IndeksPenelitiPKMsImport, $file);
        }
        return redirect()->route('admin.indekspenelitipkm.index');
    }
}
