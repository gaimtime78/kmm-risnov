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

    
    public function details(Request $request)
    {
       
        $indekspenelitipkm = IndeksPenelitiPKM::get();

       
        // $sum_total   = PenelitiPengabdi::where('fakultas', $fakultas)->sum('total');

        return view('admin.indekspenelitipkm.details', ['indekspenelitipkm' => $indekspenelitipkm, 
                    
                    
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
