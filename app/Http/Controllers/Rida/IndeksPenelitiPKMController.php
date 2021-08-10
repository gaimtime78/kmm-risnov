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
        $percent0    = round((float)$jml0/$jmltotalfak*100);
        $jml1        = IndeksPenelitiPKM::where([['periode', $periode], ['tahun_input', $tahun_input]])->sum('jumlah1');
        $percent1    = round((float)$jml1/$jmltotalfak*100);
        $jml2        = IndeksPenelitiPKM::where([['periode', $periode], ['tahun_input', $tahun_input]])->sum('jumlah2');
        $percent2    = round((float)$jml2/$jmltotalfak*100);
        $jml3        = IndeksPenelitiPKM::where([['periode', $periode], ['tahun_input', $tahun_input]])->sum('jumlah3');
        $percent3    = round((float)$jml3/$jmltotalfak*100);
        $jml4        = IndeksPenelitiPKM::where([['periode', $periode], ['tahun_input', $tahun_input]])->sum('jumlah4');
        $percent4    = round((float)$jml4/$jmltotalfak*100);
        $jml5        = IndeksPenelitiPKM::where([['periode', $periode], ['tahun_input', $tahun_input]])->sum('jumlah5');
        $percent5    = round((float)$jml5/$jmltotalfak*100);
        $jml6        = IndeksPenelitiPKM::where([['periode', $periode], ['tahun_input', $tahun_input]])->sum('jumlah6');
        $percent6    = round((float)$jml6/$jmltotalfak*100);
        $jml7        = IndeksPenelitiPKM::where([['periode', $periode], ['tahun_input', $tahun_input]])->sum('jumlah7');
        $percent7    = round((float)$jml7/$jmltotalfak*100);
        $jml8        = IndeksPenelitiPKM::where([['periode', $periode], ['tahun_input', $tahun_input]])->sum('jumlah8');
        $percent8    = round((float)$jml8/$jmltotalfak*100);
        $jml9        = IndeksPenelitiPKM::where([['periode', $periode], ['tahun_input', $tahun_input]])->sum('jumlah9');
        $percent9    = round((float)$jml9/$jmltotalfak*100);
        $jml10        = IndeksPenelitiPKM::where([['periode', $periode], ['tahun_input', $tahun_input]])->sum('jumlah10');
        $percent10    = round((float)$jml10/$jmltotalfak*100);

        $jml11        = IndeksPenelitiPKM::where([['periode', $periode], ['tahun_input', $tahun_input]])->sum('jumlah11');
        $percent11    = round((float)$jml11/$jmltotalfak*100);
        $jml12        = IndeksPenelitiPKM::where([['periode', $periode], ['tahun_input', $tahun_input]])->sum('jumlah12');
        $percent12    = round((float)$jml12/$jmltotalfak*100);
        $jml13        = IndeksPenelitiPKM::where([['periode', $periode], ['tahun_input', $tahun_input]])->sum('jumlah13');
        $percent13    = round((float)$jml13/$jmltotalfak*100);
        $jml14        = IndeksPenelitiPKM::where([['periode', $periode], ['tahun_input', $tahun_input]])->sum('jumlah14');
        $percent14    = round((float)$jml14/$jmltotalfak*100);
        $jml15        = IndeksPenelitiPKM::where([['periode', $periode], ['tahun_input', $tahun_input]])->sum('jumlah15');
        $percent15    = round((float)$jml15/$jmltotalfak*100);
        $jml16        = IndeksPenelitiPKM::where([['periode', $periode], ['tahun_input', $tahun_input]])->sum('jumlah16');
        $percent16    = round((float)$jml16/$jmltotalfak*100);
        $jml17        = IndeksPenelitiPKM::where([['periode', $periode], ['tahun_input', $tahun_input]])->sum('jumlah17');
        $percent17    = round((float)$jml17/$jmltotalfak*100);
        $jml18        = IndeksPenelitiPKM::where([['periode', $periode], ['tahun_input', $tahun_input]])->sum('jumlah18');
        $percent18    = round((float)$jml18/$jmltotalfak*100);
        $jml19        = IndeksPenelitiPKM::where([['periode', $periode], ['tahun_input', $tahun_input]])->sum('jumlah19');
        $percent19    = round((float)$jml19/$jmltotalfak*100);
        $jml20        = IndeksPenelitiPKM::where([['periode', $periode], ['tahun_input', $tahun_input]])->sum('jumlah20');
        $percent20    = round((float)$jml20/$jmltotalfak*100);
        $percenttotal    = IndeksPenelitiPKM::where([['periode', $periode], ['tahun_input', $tahun_input]])->sum('percenttotal');
        $percenttotalfak = round((float)$percenttotal);
        //    dd($jml0);
        // $sum_total   = PenelitiPengabdi::where('fakultas', $fakultas)->sum('total');

        return view('admin.indekspenelitipkm.details', ['indekspenelitipkm' => $indekspenelitipkm,  'jmltotalfak' => $jmltotalfak,
                    'jumlah0' => $jml0, 'percent0' => $percent0,
                    'jumlah1' => $jml1, 'percent1' => $percent1,
                    'jumlah2' => $jml2, 'percent2' => $percent2,
                    'jumlah3' => $jml3, 'percent3' => $percent3,
                    'jumlah4' => $jml4, 'percent4' => $percent4,
                    'jumlah5' => $jml5, 'percent5' => $percent5,
                    'jumlah6' => $jml6, 'percent6' => $percent6,
                    'jumlah7' => $jml7, 'percent7' => $percent7,
                    'jumlah8' => $jml8, 'percent8' => $percent8,
                    'jumlah9' => $jml9, 'percent9' => $percent9,
                    'jumlah10' => $jml10, 'percent10' => $percent10,

                    'jumlah11' => $jml11, 'percent11' => $percent11,
                    'jumlah12' => $jml12, 'percent12' => $percent12,
                    'jumlah13' => $jml13, 'percent13' => $percent13,
                    'jumlah14' => $jml14, 'percent14' => $percent14,
                    'jumlah15' => $jml15, 'percent15' => $percent15,
                    'jumlah16' => $jml16, 'percent16' => $percent16,
                    'jumlah17' => $jml17, 'percent17' => $percent17,
                    'jumlah18' => $jml18, 'percent18' => $percent18,
                    'jumlah19' => $jml19, 'percent19' => $percent19,
                    'jumlah20' => $jml20, 'percent20' => $percent20,
                    'percenttotalfak' => $percenttotalfak,
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
