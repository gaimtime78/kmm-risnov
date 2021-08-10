<?php

namespace App\Http\Controllers\Rida;

use Illuminate\Support\Facades\Storage;
use App\Http\Controllers\Controller;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\Iku;
use App\Exports\Iku\IkuExport;
use App\Imports\Iku\IkusImport;
use Maatwebsite\Excel\Facades\Excel;
use Illuminate\Support\Facades\DB;


class IkuController extends Controller
{
    public function index()
    {
        $iku = Iku::select('target_capaian', 'ik')->distinct()->get('target_capaian', 'ik');
        
        return view('admin.capaian_iku.index', ['iku' => $iku]);
    }

    public function pilihperiode($target_capaian)
    {
        $target  = $target_capaian;
        $data = Iku::select('periode', 'tahun_input')->distinct()->where('target_capaian', $target_capaian)->get('periode', 'tahun_input');
        
        return view('admin.capaian_iku.pilihperiode', ['data' => $data, 'target' => $target]);
    }

    public function details($target_capaian, $periode, $tahun_input)
    {
        $fakultas = $target_capaian;
        $penelitipengabdi = PenelitiPengabdi::where([['fakultas', $fakultas],['periode', $periode], ['tahun_input', $tahun_input]])->get();

        $sum25_35L              = PenelitiPengabdi::where([['fakultas', $fakultas],['periode', $periode]])->sum('usia25sd35_L');
        $sum25_35P              = PenelitiPengabdi::where([['fakultas', $fakultas],['periode', $periode]])->sum('usia25sd35_P');
        $sum25sd35_jumlah       = PenelitiPengabdi::where([['fakultas', $fakultas],['periode', $periode]])->sum('usia25sd35_jumlah');

        
        $sum36_45L              = PenelitiPengabdi::where([['fakultas', $fakultas],['periode', $periode]])->sum('usia36sd45_L');
        $sum36_45P              = PenelitiPengabdi::where([['fakultas', $fakultas],['periode', $periode]])->sum('usia36sd45_P');
        $sum36sd45_jumlah       = PenelitiPengabdi::where([['fakultas', $fakultas],['periode', $periode]])->sum('usia36sd45_jumlah');

        $sum46_55L              = PenelitiPengabdi::where([['fakultas', $fakultas],['periode', $periode]])->sum('usia46sd55_L');
        $sum46_55P              = PenelitiPengabdi::where([['fakultas', $fakultas],['periode', $periode]])->sum('usia46sd55_P');
        $sum46sd55_jumlah       = PenelitiPengabdi::where([['fakultas', $fakultas],['periode', $periode]])->sum('usia46sd55_jumlah');

        $sum56_65L              = PenelitiPengabdi::where([['fakultas', $fakultas],['periode', $periode]])->sum('usia56sd65_L');
        $sum56_65P              = PenelitiPengabdi::where([['fakultas', $fakultas],['periode', $periode]])->sum('usia56sd65_P');
        $sum56sd65_jumlah       = PenelitiPengabdi::where([['fakultas', $fakultas],['periode', $periode]])->sum('usia56sd65_jumlah');

        $sum66_75L              = PenelitiPengabdi::where([['fakultas', $fakultas],['periode', $periode]])->sum('usia66sd75_L');
        $sum66_75P              = PenelitiPengabdi::where([['fakultas', $fakultas],['periode', $periode]])->sum('usia66sd75_P');
        $sum66sd75_jumlah       = PenelitiPengabdi::where([['fakultas', $fakultas],['periode', $periode]])->sum('usia66sd75_jumlah');

        $sum75L              = PenelitiPengabdi::where([['fakultas', $fakultas],['periode', $periode]])->sum('usia75_L');
        $sum75P              = PenelitiPengabdi::where([['fakultas', $fakultas],['periode', $periode]])->sum('usia75_P');
        $sum75_jumlah        = PenelitiPengabdi::where([['fakultas', $fakultas],['periode', $periode]])->sum('usia75_jumlah');

        $total               = PenelitiPengabdi::where([['fakultas', $fakultas],['periode', $periode]])->sum('total');

        $totalsemua          = PenelitiPengabdi::where([['fakultas', 'Universitas Sebelas Maret'],['periode', $periode]])->sum('total');
        $totalpercent               = $total/$totalsemua*100;

        // round($jml5/$jmltotalfak*100)
        // dd($totalsemua);

        return view('admin.penelitipengabdi.details', ['penelitipengabdi' => $penelitipengabdi, 'fakultas' => $fakultas, 
                    'sum25_35L' => $sum25_35L, 'sum25_35P' => $sum25_35P, 'sum25sd35_jumlah' => $sum25sd35_jumlah ,   
                    'sum36_45L' => $sum36_45L, 'sum36_45P' => $sum36_45P, 'sum36sd45_jumlah' => $sum36sd45_jumlah ,
                    'sum46_55L' => $sum46_55L, 'sum46_55P' => $sum46_55P, 'sum46sd55_jumlah' => $sum46sd55_jumlah,   
                    'sum56_65L' => $sum56_65L, 'sum56_65P' => $sum56_65P, 'sum56sd65_jumlah' => $sum56sd65_jumlah,   
                    'sum66_75L' => $sum66_75L, 'sum66_75P' => $sum66_75P, 'sum66sd75_jumlah' => $sum66sd75_jumlah,   
                    'sum75L' => $sum75L, 'sum75P' => $sum75P, 'sum75_jumlah' => $sum75_jumlah,   
                    'total' => $total,  'totalpercent' => $totalpercent, 'totalsemua' => $totalsemua,
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

    public function update(Request $request, $nama_fakultas, $periode, $tahun_input)
    {
        $penelitipengabdi = PenelitiPengabdi::where([['fakultas', $nama_fakultas],['periode', $periode], ['tahun_input', $tahun_input]])->get();
        
        foreach ($penelitipengabdi as $peneliti) {
            $peneliti->periode = $request->periode;
            $peneliti->tahun_input = $request->tahun_input;
            $peneliti->save();
        }

        return redirect()->route('admin.penelitipengabdi.pilihperiode' , $nama_fakultas);
    }

    public function delete($nama_fakultas, $periode, $tahun_input)
    {
        $penelitipengabdi = PenelitiPengabdi::where([['fakultas', $nama_fakultas],['periode', $periode], ['tahun_input', $tahun_input]])->get();
        foreach ($penelitipengabdi as $peneliti) {
            $peneliti->delete();
        }

        return redirect()->route('admin.penelitipengabdi.index')
            ->with($this->status(0, 'sukses', 'Data Berhasil Dihapus!'));
    }

    public function export()
    {
        return Excel::download(new PenelitiPengabdiExport, 'penelitipengabdi.xlsx');
    }

    public function import(Request $request)
    {
        $file = $request->file("iku");
        $periode = $request->periode;
        $tahun = $request->tahun;
        $sumber_data = $request->sumber_data;
        // dd($request);
        if ($file !== null) {
            Excel::import(new IkusImport, $file);
        }
       
        Iku::where('periode', 'kosong')
                ->update(['periode' => $periode, 'tahun_input' => $tahun, 'sumber_data' => $sumber_data]);

        return redirect()->route('admin.capaian_iku.index');
    }
}