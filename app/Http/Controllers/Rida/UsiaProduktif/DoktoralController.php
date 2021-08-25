<?php

namespace App\Http\Controllers\Rida\UsiaProduktif;

use Illuminate\Support\Facades\Storage;
use App\Http\Controllers\Controller;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\UsiaProduktif\UsiaProduktifDoktoral;
use App\Exports\UsiaProduktif\Doktoral\UsiaProduktifDoktoralsExport;
use App\Imports\UsiaProduktif\Doktoral\UsiaProduktifDoktoralsImport;
use Maatwebsite\Excel\Facades\Excel;

class DoktoralController extends Controller
{
    public function index()
    {
        $usiaproduktifdoktoral = UsiaProduktifDoktoral::distinct()->get('fakultas', 'id');

        return view('admin.usiaproduktif.penelitipengabdidoktoral.index', ['usiaproduktifdoktoral' => $usiaproduktifdoktoral]);
    }

    public function pilihperiode($fakultas)
    {
        $nama_fakultas  = $fakultas;
        $data = UsiaProduktifDoktoral::select('periode', 'tahun_input', 'sumber_data')->distinct()->where('fakultas', $nama_fakultas)->get('periode', 'tahun_input', 'sumber_data');

        return view('admin.usiaproduktif.penelitipengabdidoktoral.pilihperiode', ['data' => $data, 'nama_fakultas' => $nama_fakultas]);
    }


    public function details($nama_fakultas, $periode, $tahun_input)
    {
        $fakultas = $nama_fakultas;
        $usiaproduktifdoktoral = UsiaProduktifDoktoral::where([['fakultas', $fakultas], ['periode', $periode], ['tahun_input', $tahun_input]])->get();

        $sum25sd35_L       = UsiaProduktifDoktoral::where([['fakultas', $fakultas], ['periode', $periode]])->sum('usia25sd35_L');
        $sum25sd35_P       = UsiaProduktifDoktoral::where([['fakultas', $fakultas], ['periode', $periode]])->sum('usia25sd35_P');
        $sum25sd35_jumlah  = UsiaProduktifDoktoral::where([['fakultas', $fakultas], ['periode', $periode]])->sum('usia25sd35_jumlah');

        $sum36sd45_L       = UsiaProduktifDoktoral::where([['fakultas', $fakultas], ['periode', $periode]])->sum('usia36sd45_L');
        $sum36sd45_P       = UsiaProduktifDoktoral::where([['fakultas', $fakultas], ['periode', $periode]])->sum('usia36sd45_P');
        $sum36sd45_jumlah  = UsiaProduktifDoktoral::where([['fakultas', $fakultas], ['periode', $periode]])->sum('usia36sd45_jumlah');

        $sum46sd55_L       = UsiaProduktifDoktoral::where([['fakultas', $fakultas], ['periode', $periode]])->sum('usia46sd55_L');
        $sum46sd55_P       = UsiaProduktifDoktoral::where([['fakultas', $fakultas], ['periode', $periode]])->sum('usia46sd55_P');
        $sum46sd55_jumlah  = UsiaProduktifDoktoral::where([['fakultas', $fakultas], ['periode', $periode]])->sum('usia46sd55_jumlah');

        $sum56sd65_L       = UsiaProduktifDoktoral::where([['fakultas', $fakultas], ['periode', $periode]])->sum('usia56sd65_L');
        $sum56sd65_P       = UsiaProduktifDoktoral::where([['fakultas', $fakultas], ['periode', $periode]])->sum('usia56sd65_P');
        $sum56sd65_jumlah  = UsiaProduktifDoktoral::where([['fakultas', $fakultas], ['periode', $periode]])->sum('usia56sd65_jumlah');
        
        $sum66sd75_L       = UsiaProduktifDoktoral::where([['fakultas', $fakultas], ['periode', $periode]])->sum('usia66sd75_L');
        $sum66sd75_P       = UsiaProduktifDoktoral::where([['fakultas', $fakultas], ['periode', $periode]])->sum('usia66sd75_P');
        $sum66sd75_jumlah  = UsiaProduktifDoktoral::where([['fakultas', $fakultas], ['periode', $periode]])->sum('usia66sd75_jumlah');
        
        $sum75_L       = UsiaProduktifDoktoral::where([['fakultas', $fakultas], ['periode', $periode]])->sum('usia75_L');
        $sum75_P       = UsiaProduktifDoktoral::where([['fakultas', $fakultas], ['periode', $periode]])->sum('usia75_P');
        $sum75_jumlah  = UsiaProduktifDoktoral::where([['fakultas', $fakultas], ['periode', $periode]])->sum('usia75_jumlah');

        $total                  = UsiaProduktifDoktoral::where([['fakultas', $fakultas], ['periode', $periode]])->sum('total');
        $totalsemua             = UsiaProduktifDoktoral::where([['fakultas', 'Universitas Sebelas Maret'], ['periode', $periode]])->sum('total');
        $totalpercent               = $total / $totalsemua * 100;
        // $sum_total   = PenelitiPengabdi::where('fakultas', $fakultas)->sum('total');

        return view('admin.usiaproduktif.penelitipengabdidoktoral.details', [
            'usiaproduktifdoktoral' => $usiaproduktifdoktoral, 'fakultas' => $fakultas,
            'sum25sd35_L'=>$sum25sd35_L,'sum25sd35_P'=>$sum25sd35_P, 'sum25sd35_jumlah' => $sum25sd35_jumlah,
            'sum36sd45_L'=>$sum25sd35_L,'sum36sd45_P'=>$sum36sd45_P, 'sum36sd45_jumlah' => $sum36sd45_jumlah,
            'sum46sd55_L'=>$sum25sd35_L,'sum46sd55_P'=>$sum46sd55_P, 'sum46sd55_jumlah' => $sum46sd55_jumlah,
            'sum56sd65_L'=>$sum56sd65_L,'sum56sd65_P'=>$sum56sd65_P, 'sum56sd65_jumlah' => $sum56sd65_jumlah,
            'sum66sd75_L'=>$sum66sd75_L,'sum66sd75_P'=>$sum66sd75_P, 'sum66sd75_jumlah' => $sum66sd75_jumlah,
            'sum75_L'=>$sum75_L,'sum75_P'=>$sum75_P, 'sum75_jumlah' => $sum75_jumlah,
            'total' => $total,  'totalpercent' => $totalpercent, 'totalsemua' => $totalsemua,

            // 'sum25_35L' => $sum25_35L, 'sum25_35P' => $sum25_35P, 'sumusia25sd35_jumlah' => $sumusia25sd35_jumlah   
            // 'sum25_35L' => $sum25_35L, 'sum25_35P' => $sum25_35P, 'sumusia25sd35_jumlah' => $sumusia25sd35_jumlah   
            // 'sum25_35L' => $sum25_35L, 'sum25_35P' => $sum25_35P, 'sumusia25sd35_jumlah' => $sumusia25sd35_jumlah   

        ]);
    }

    public function add()
    {
        return view('admin/usiaproduktif/penelitipengabdidoktoral/add');
    }

    public function store(Request $request)
    {
        return redirect()->route('admin.usiaproduktifdoktoral.index');
    }

    public function edit(Request $request, $id)
    {
        $usiaproduktifdoktoral = UsiaProduktifDoktoral::find($id);
        return view('admin/usiaproduktif/penelitipengabdidoktoral/edit', compact('penelitipengabdimagister'));
    }

    public function update(Request $request, $nama_fakultas, $periode, $tahun_input, $sumber_data)
    {
        $usiaproduktifdoktoral = UsiaProduktifDoktoral::where([['fakultas', $nama_fakultas], ['periode', $periode], ['tahun_input', $tahun_input], ['sumber_data', $sumber_data]])->get();;
        foreach ($usiaproduktifdoktoral as $peneliti) {
            $peneliti->periode = $request->periode;
            $peneliti->tahun_input = $request->tahun_input;
            $peneliti->sumber_data = $request->sumber_data;
            $peneliti->save();
        }

        return redirect()->route('admin.usiaproduktifdoktoral.pilihperiode', $nama_fakultas);
    }

    public function delete($nama_fakultas, $periode, $tahun_input)
    {
        $usiaproduktifdoktoral = UsiaProduktifDoktoral::where([['fakultas', $nama_fakultas], ['periode', $periode], ['tahun_input', $tahun_input]])->get();
        foreach ($usiaproduktifdoktoral as $peneliti) {
            $peneliti->delete();
        }

        return redirect()->route('admin.usiaproduktifdoktoral.index')
            ->with($this->status(0, 'sukses', 'Data Berhasil Dihapus!'));
    }

    public function export()
    {
        return Excel::download(new UsiaProduktifDoktoralsExport, 'penelitipengabdidoktoral.xlsx');
    }

    public function import(Request $request)
    {
        $file = $request->file("usiaproduktifdoktoral");
        // dd($file);
        if ($file !== null) {
            Excel::import(new UsiaProduktifDoktoralsImport, $file);
        }

        UsiaProduktifDoktoral::where('periode', 'kosong')
            ->update(['periode' => $request->periode, 'tahun_input' => $request->tahun, 'sumber_data' => $request->sumber_data]);

        return redirect()->route('admin.usiaproduktifdoktoral.index');
    }

    public function updateRow(Request $request, $id)
    {
        $peneliti = UsiaProduktifDoktoral::find($id);
        // dd($peneliti);
        $fakultas = $peneliti->fakultas;
        $periode = $peneliti->periode;
        $tahun = $peneliti->tahun_input;

        
        $usia25sd35_L = $request->usia25sd35_L;
        $usia25sd35_P = $request->usia25sd35_P;

        $usia36sd45_L = $request->usia36sd45_L;
        $usia36sd45_P = $request->usia36sd45_P;


        $usia46sd55_L = $request->usia46sd55_L;
        $usia46sd55_P = $request->usia46sd55_P;


        $usia56sd65_L = $request->usia56sd65_L;
        $usia56sd65_P = $request->usia56sd65_P;
        
        $usia66sd75_L = $request->usia66sd75_L;
        $usia66sd75_P = $request->usia66sd75_P;

        $usia75_L = $request->usia75_L;
        $usia75_P = $request->usia75_P;
        
       
        $peneliti->usia25sd35_L = $usia25sd35_L;
        $peneliti->usia25sd35_P = $usia25sd35_P;
        $peneliti->usia25sd35_jumlah = $usia25sd35_L + $usia25sd35_P;

        $peneliti->usia36sd45_L = $usia36sd45_L;
        $peneliti->usia36sd45_P = $usia36sd45_P;
        $peneliti->usia36sd45_jumlah = $usia36sd45_L + $usia36sd45_P;

        $peneliti->usia46sd55_L = $usia46sd55_L;
        $peneliti->usia46sd55_P = $usia46sd55_P;
        $peneliti->usia46sd55_jumlah = $usia46sd55_L+ $usia46sd55_P;


        $peneliti->usia56sd65_L = $usia56sd65_L;
        $peneliti->usia56sd65_P = $usia56sd65_P;
        $peneliti->usia56sd65_jumlah = $usia56sd65_L + $usia56sd65_P;
       
        $peneliti->usia66sd75_L = $usia66sd75_L;
        $peneliti->usia66sd75_P = $usia66sd75_P;
        $peneliti->usia66sd75_jumlah = $usia66sd75_L + $usia66sd75_P;

        $peneliti->usia75_L = $usia75_L;
        $peneliti->usia75_P = $usia75_P;
        $peneliti->usia75_jumlah = $usia75_L + $usia75_P;

       
        $peneliti->total =  $peneliti->usia75_jumlah +  $peneliti->usia25sd35_jumlah + $peneliti->usia36sd45_jumlah + $peneliti->usia46sd55_jumlah + $peneliti->usia56sd65_jumlah + $peneliti->usia66sd75_jumlah;
        $peneliti->save();

        return redirect(route('admin.usiaproduktifdoktoral.details', [$fakultas, $periode, $tahun]));
    }
}
