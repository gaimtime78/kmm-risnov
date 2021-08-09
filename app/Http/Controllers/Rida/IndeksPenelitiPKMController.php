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
        $indekspenelitipkm = IndeksPenelitiPKM::select('periode', 'tahun_input')->distinct()->get('periode', 'id');
        
        return view('admin.indekspenelitipkm.index', ['indekspenelitipkm' => $indekspenelitipkm]);
    }

    
    public function details(Request $request, $periode, $tahun_input)
    {
        $data = $periode;
        $tahun = $tahun_input;
        $indekspenelitipkm = IndeksPenelitiPKM::get();
        // dd($data);
        $jmltotalfak = IndeksPenelitiPKM::select('fakultas')->where([['periode', $periode], ['tahun_input', $tahun_input]])->sum('jumlahtotal');
        $jml0        = IndeksPenelitiPKM::where([['periode', $periode], ['tahun_input', $tahun_input]])->sum('jumlah0');
        $percent0    = round($jml0/$jmltotalfak*100);
        $jml1        = IndeksPenelitiPKM::where([['periode', $periode], ['tahun_input', $tahun_input]])->sum('jumlah1');
        $percent1    = round($jml1/$jmltotalfak*100);
        $jml2        = IndeksPenelitiPKM::where([['periode', $periode], ['tahun_input', $tahun_input]])->sum('jumlah2');
        $percent2    = round($jml2/$jmltotalfak*100);
        $jml3        = IndeksPenelitiPKM::where([['periode', $periode], ['tahun_input', $tahun_input]])->sum('jumlah3');
        $percent3    = round($jml3/$jmltotalfak*100);
        $jml4        = IndeksPenelitiPKM::where([['periode', $periode], ['tahun_input', $tahun_input]])->sum('jumlah4');
        $percent4    = round($jml4/$jmltotalfak*100);
        $jml5        = IndeksPenelitiPKM::where([['periode', $periode], ['tahun_input', $tahun_input]])->sum('jumlah5');
        $percent5    = round($jml5/$jmltotalfak*100);

        //    dd($jml0);
        // $sum_total   = PenelitiPengabdi::where('fakultas', $fakultas)->sum('total');

        return view('admin.indekspenelitipkm.details', ['indekspenelitipkm' => $indekspenelitipkm,  'jmltotalfak' => $jmltotalfak,
                    'jumlah0' => $jml0, 'percent0' => $percent0,
                    'jumlah1' => $jml1, 'percent1' => $percent1,
                    'jumlah2' => $jml2, 'percent2' => $percent2,
                    'jumlah3' => $jml3, 'percent3' => $percent3,
                    'jumlah4' => $jml4, 'percent4' => $percent4,
                    'jumlah5' => $jml5, 'percent5' => $percent5,
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

    public function update(Request $request, $periode, $tahun_input)
    {
        $indekspenelitipkm = IndeksPenelitiPKM::where([['periode', $periode], ['tahun_input', $tahun_input]])->get();
        // dd($indekspenelitipkm);
        foreach ($indekspenelitipkm as $peneliti) {
            $peneliti->periode = $request->periode;
            $peneliti->tahun_input = $request->tahun_input;
            $peneliti->save();
        }

        return redirect()->route('admin.indekspenelitipkm.index');
    }

    public function delete($periode, $tahun_input)
    {
        $indekspenelitipkm = IndeksPenelitiPKM::where([['periode', $periode], ['tahun_input', $tahun_input]])->get();
        foreach ($indekspenelitipkm as $peneliti) {
            $peneliti->delete();
        }
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
        $periode = $request->periode;
        $tahun = $request->tahun;
        $sumber_data = $request->sumber_data;
        if ($file !== null) {
            Excel::import(new IndeksPenelitiPKMsImport, $file);
        }

        IndeksPenelitiPKM::where('periode', 'kosong')
        ->update(['periode' => $request->periode, 'tahun_input' => $request->tahun, 'sumber_data' => $sumber_data]);

        return redirect()->route('admin.indekspenelitipkm.index');
    }
}
