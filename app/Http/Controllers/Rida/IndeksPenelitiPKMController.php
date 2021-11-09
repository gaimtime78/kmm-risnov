<?php

namespace App\Http\Controllers\Rida;

use Illuminate\Support\Facades\Storage;
use App\Http\Controllers\Controller;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\H_Indeks_PKM;
use App\Models\IndeksPenelitiPKM;
use App\Exports\IndeksPenelitiPKM\IndeksPenelitiPKMsExport;
use App\Imports\IndeksPenelitiPKM\IndeksPenelitiPKMsImport;
use Maatwebsite\Excel\Facades\Excel;
use Illuminate\Support\Facades\DB;

class IndeksPenelitiPKMController extends Controller
{
    public function index()
    {

        /**
         * baru
         */
        $indekspenelitipkm = H_Indeks_PKM::select('periode', 'tahun_input','sumber_data')
            ->distinct()
			->get();
        $nama_table = H_Indeks_PKM::select('nama_table')
            ->distinct()
			->get();
		// 	// ->where('konfirmasi', '=', false)
		// 	// ->orderBy('id', 'ASC')
        // dd($indekspenelitipkm->toArray());


        /**
         * lama
         */
        // $indekspenelitipkm = IndeksPenelitiPKM::select('periode', 'tahun_input','sumber_data')->distinct()->get('periode', 'id','sumber_data');
        // $nama_table = IndeksPenelitiPKM::select('nama_table')->distinct()->get('nama_table', 'id');
        // dump($nama_table->toArray());
        // dump($nama_table2->toArray());
        // return "heh";
        return view('admin.indekspenelitipkm.index', ['indekspenelitipkm' => $indekspenelitipkm, 'nama_table'=> $nama_table]);
    }

    public function updateNamaTable(Request $request, $nama_table)
    {
        $penelitipengabdi = H_Indeks_PKM::where([['nama_table', $nama_table]])->get();
        
        foreach ($penelitipengabdi as $peneliti) {
            $peneliti->nama_table = $request->nama_table;
            $peneliti->save();
        }

        return redirect(route('admin.indekspenelitipkm.index'));
    }

    
    public function details(Request $request, $periode, $tahun_input)
    {
        $indekspenelitipkm = H_Indeks_PKM::where([['periode', $periode], ['tahun_input', $tahun_input]])->get();
        $total_indekspenelitipkm = H_Indeks_PKM::where([['periode', $periode], ['tahun_input', $tahun_input]])
            ->select(DB::raw('sum(fib_jumlah) as fib,sum(fkip_jumlah) as fkip,sum(feb_jumlah) as feb,sum(fh_jumlah) as fh, sum(fisip_jumlah) as fisip,sum(fk_jumlah) as fk, sum(fp_jumlah) as fp, sum(ft_jumlah) as ft, sum(fmipa_jumlah) as fmipa, sum(fsrd_jumlah) as fsrd, sum(fkor_jumlah) as fkor, sum(sv_jumlah) as sv, sum(pascasarjana_jumlah) as pascasarjana, sum(total_jumlah) as total'))
            ->get();
        $table = $indekspenelitipkm->toArray();
        $table_total = $total_indekspenelitipkm->toArray()[0];
        return view('admin.indekspenelitipkm.details', ['table' => $table, 'table_total' => $table_total]);

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
        $indekspenelitipkm = H_Indeks_PKM::find($id);
        return view('admin/indekspenelitipkm/edit', compact('indekspenelitipkm'));
    }

    public function update(Request $request, $periode, $tahun_input, $sumber_data)
    {
        $indekspenelitipkm = H_Indeks_PKM::where([['periode', $periode], ['tahun_input', $tahun_input]])->get();
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
        $indekspenelitipkm = H_Indeks_PKM::where([['periode', $periode], ['tahun_input', $tahun_input]])->get();
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
        $excel = new IndeksPenelitiPKMsImport;
        Excel::import($excel, $request->file('indekspenelitipkm'));
        $table = $excel->getArray();
        $row = 4;
        function toPercent($val) {
            return round((float) $val, 3) * 100;
        }
        while ($table[$row][0] !== "Jumlah") {
            $inserted_data = [
                'nama_table' =>             "UNTITLED TABLE",
                'periode' =>                $request->periode,
                'tahun_input' =>            $request->tahun,
                'sumber_data' =>            $request->sumber_data,
                'user_id' =>                Auth::user()->id,

                'h_index' =>                $table[$row][0],

                'fib_jumlah' =>             $table[$row][2],
                'fkip_jumlah' =>            $table[$row][3],
                'feb_jumlah' =>             $table[$row][4],
                'fh_jumlah' =>              $table[$row][5],
                'fisip_jumlah' =>           $table[$row][6],
                'fk_jumlah' =>              $table[$row][7],
                'fp_jumlah' =>              $table[$row][8],
                'ft_jumlah' =>              $table[$row][9],
                'fmipa_jumlah' =>           $table[$row][10],
                'fsrd_jumlah' =>            $table[$row][11],
                'fkor_jumlah' =>            $table[$row][12],
                'sv_jumlah' =>              $table[$row][13],
                'pascasarjana_jumlah' =>    $table[$row][14],
                'total_jumlah' =>           $table[$row][15],
                
                'fib_percent' =>             toPercent($table[$row + 1][2]),
                'fkip_percent' =>            toPercent($table[$row + 1][3]),
                'feb_percent' =>             toPercent($table[$row + 1][4]),
                'fh_percent' =>              toPercent($table[$row + 1][5]),
                'fisip_percent' =>           toPercent($table[$row + 1][6]),
                'fk_percent' =>              toPercent($table[$row + 1][7]),
                'fp_percent' =>              toPercent($table[$row + 1][8]),
                'ft_percent' =>              toPercent($table[$row + 1][9]),
                'fmipa_percent' =>           toPercent($table[$row + 1][10]),
                'fsrd_percent' =>            toPercent($table[$row + 1][11]),
                'fkor_percent' =>            toPercent($table[$row + 1][12]),
                'sv_percent' =>              toPercent($table[$row + 1][13]),
                'pascasarjana_percent' =>    toPercent($table[$row + 1][14]),
                'total_percent' =>           toPercent($table[$row + 1][15]),
            ];
            // IndeksPenelitiPKM::insert($inserted_data);
            H_Indeks_PKM::insert($inserted_data);
            // dump($inserted_data);
            $row = $row + 2;
        }
        return redirect()->route('admin.indekspenelitipkm.index');
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
