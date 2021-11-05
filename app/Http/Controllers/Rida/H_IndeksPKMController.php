<?php

namespace App\Http\Controllers\Rida;

use Illuminate\Support\Facades\Storage;
use App\Http\Controllers\Controller;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\H_Indeks_PKM;
use App\Exports\H_Indeks_PKM\H_Indeks_PKMsExport;
use App\Imports\H_Indeks_PKM\H_Indeks_PKMsImport;
use Maatwebsite\Excel\Facades\Excel;

class H_IndeksPKMController extends Controller
{
    public function index()
    {
        dd("hai");
        // $indekspenelitipkm = H_Indeks_PKM::select('periode', 'tahun_input','sumber_data')->distinct()->get('periode', 'id','sumber_data');
        // $nama_table = H_Indeks_PKM::select('nama_table')->distinct()->get('nama_table', 'id');

        // return view('admin.h_indeks_pkm.index', ['indekspenelitipkm' => $indekspenelitipkm, 'nama_table'=> $nama_table]);
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


    public function updateNamaTable(Request $request, $nama_table)
    {
        $penelitipengabdi = IndeksPenelitiPKM::where([['nama_table', $nama_table]])->get();
        
        foreach ($penelitipengabdi as $peneliti) {
            $peneliti->nama_table = $request->nama_table;
            $peneliti->save();
        }

        return redirect(route('admin.indekspenelitipkm.index'));
    }

    
    public function details(Request $request, $periode, $tahun_input)
    {
        $data = $periode;
        // dd($data);
        $tahun = $tahun_input;
        $indekspenelitipkm = IndeksPenelitiPKM::where([['periode', $periode], ['tahun_input', $tahun_input]])->get();
        // dd($data);
        $jmltotalfak    = IndeksPenelitiPKM::select('fakultas')->where([['periode', $periode], ['tahun_input', $tahun_input]])->sum('jumlahtotal');
        $jml0        = IndeksPenelitiPKM::where([['periode', $periode], ['tahun_input', $tahun_input]])->sum('jumlah0');
        // dd($indekspenelitipkm);
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
        $jml21        = IndeksPenelitiPKM::where([['periode', $periode], ['tahun_input', $tahun_input]])->sum('jumlah21');
        $percent21    = round((float)$jml21/$jmltotalfak*100);
        $jml22        = IndeksPenelitiPKM::where([['periode', $periode], ['tahun_input', $tahun_input]])->sum('jumlah22');
        $percent22    = round((float)$jml22/$jmltotalfak*100);
        $percenttotal    = IndeksPenelitiPKM::where([['periode', $periode], ['tahun_input', $tahun_input]])->sum('percenttotal');
        $percenttotalfak = round((float)$percenttotal);
        //    dd($jml0);
        // $sum_total   = PenelitiPengabdi::where('fakultas', $fakultas)->sum('total');

        return view('admin.indekspenelitipkm.details', ['indekspenelitipkm' => $indekspenelitipkm,  
                    'jmltotalfak' => $jmltotalfak,
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
                    'jumlah21' => $jml21, 'percent21' => $percent21,
                    'jumlah22' => $jml22, 'percent22' => $percent22,
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

    public function update(Request $request, $periode, $tahun_input, $sumber_data)
    {
        $indekspenelitipkm = IndeksPenelitiPKM::where([['periode', $periode], ['tahun_input', $tahun_input]])->get();
        // dd($indekspenelitipkm);
        foreach ($indekspenelitipkm as $peneliti) {
            $peneliti->periode = $request->periode;
            $peneliti->tahun_input = $request->tahun_input;
            $peneliti->sumber_data = $request->sumber_data;
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

    public function updateRow(Request $request, $id)
    {
        $peneliti = IndeksPenelitiPKM::find($id);
        $fakultas = $peneliti->fakultas;
        $periode = $peneliti->periode;
        $tahun = $peneliti->tahun_input;

        $jml0       = $request->jumlah0;
        $percent0   = $request->percent0;
        
        $jml1       = $request->jumlah1;
        $percent1   = $request->percent1;
        
        $jml2 = $request->jumlah2;
        $percent2 = $request->percent2;
        
        $jml3 = $request->jumlah3;
        $percent3 = $request->percent3;
        
        $jml4 = $request->jumlah4;
        $percent4 = $request->percent4;
        
        $jml5 = $request->jumlah5;
        $percent5 = $request->percent5;
        
        $jml6 = $request->jumlah6;
        $percent6 = $request->percent6;
        
        $jml7 = $request->jumlah7;
        $percent7 = $request->percent7;
        
        $jml8 = $request->jumlah8;
        $percent8 = $request->percent8;
        
        $jml9 = $request->jumlah9;
        $percent9 = $request->percent9;
        
        $jml10 = $request->jumlah10;
        $percent10 = $request->percent10;
        
        $jml11 = $request->jumlah11;
        $percent11 = $request->percent11;

        $jml12 = $request->jumlah12;
        $percent12 = $request->percent12;
        
        $jml13 = $request->jumlah13;
        $percent13 = $request->percent13;
        
        $jml14 = $request->jumlah14;
        $percent14 = $request->percent14;
        
        $jml15 = $request->jumlah15;
        $percent15 = $request->percent15;
        
        $jml16 = $request->jumlah16;
        $percent16 = $request->percent16;
        
        $jml17 = $request->jumlah17;
        $percent17 = $request->percent17;
        
        $jml18 = $request->jumlah18;
        $percent18 = $request->percent18;
        
        $jml19 = $request->jumlah19;
        $percent19 = $request->percent19;
        
        $jml20 = $request->jumlah20;
        $percent20 = $request->percent20;
        
        $jml21 = $request->jumlah21;
        $percent21 = $request->percent21;
        
        $peneliti->jumlah0 = $jml0;
        $peneliti->percent0 = $percent0;
        $peneliti->jumlah1 = $jml1;
        $peneliti->percent1 = $percent1;
        $peneliti->jumlah2 = $jml2;
        $peneliti->percent2 = $percent2;
        $peneliti->jumlah3 = $jml3;
        $peneliti->percent3 = $percent3;
        $peneliti->jumlah4 = $jml4;
        $peneliti->percent4 = $percent4;
        $peneliti->jumlah5 = $jml5;
        $peneliti->percent5 = $percent5;
        $peneliti->jumlah6 = $jml6;
        $peneliti->percent6 = $percent6;
        $peneliti->jumlah7 = $jml7;
        $peneliti->percent7 = $percent7;
        $peneliti->jumlah8 = $jml8;
        $peneliti->percent8 = $percent8;

        $peneliti->jumlah9 = $jml9;
        $peneliti->percent0 = $percent9;
        $peneliti->jumlah10 = $jml10;
        $peneliti->percent10 = $percent10;
        $peneliti->jumlah11 = $jml11;
        $peneliti->percent11 = $percent11;
        $peneliti->jumlah12 = $jml12;
        $peneliti->percent12 = $percent12;
        $peneliti->jumlah13 = $jml13;
        $peneliti->percent13 = $percent13;
        $peneliti->jumlah14 = $jml14;
        $peneliti->percent14 = $percent14;
        $peneliti->jumlah15 = $jml15;
        $peneliti->percent15 = $percent15;
        $peneliti->jumlah16 = $jml16;
        $peneliti->percent16 = $percent16;
        $peneliti->jumlah17 = $jml17;
        $peneliti->percent17 = $percent17;
        $peneliti->jumlah18 = $jml18;
        $peneliti->percent18 = $percent18;

        $peneliti->jumlah19 = $jml19;
        $peneliti->percent19 = $percent19;
        $peneliti->jumlah20 = $jml20;
        $peneliti->percent20 = $percent20;
        $peneliti->jumlah21 = $jml21;
        $peneliti->percent21 = $percent21;
       

        
        $peneliti->jumlahtotal = $jml0 + $jml1 + $jml2 + $jml3 + $jml4 + $jml5 + $jml6 + $jml7 + $jml8 + $jml9 + $jml10 + $jml11 +
                                 $jml12 + $jml13 + $jml14 + $jml15 + $jml16 + $jml17 + $jml18 + $jml19 + $jml20 + $jml21;
        $peneliti->save();

        return redirect(route('admin.indekspenelitipkm.details', [$fakultas, $periode, $tahun]));
    }
}
