<?php

namespace App\Http\Controllers\Rida;

use Illuminate\Support\Facades\Storage;
use App\Http\Controllers\Controller;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\AkreditasiPusdi;
use App\Exports\AkreditasiPusdi\AkreditasiPusdiExport;
use App\Imports\AkreditasiPusdi\AkreditasiPusdiImport;
use Maatwebsite\Excel\Facades\Excel;
use Illuminate\Support\Facades\DB;

class AkreditasiPusdiController extends Controller
{
    //
    public function index(){
        $akreditasi_pusdi = AkreditasiPusdi::select('periode', 'tahun_input','sumber_data')->distinct()->orderBy('tahun_input', 'ASC')->get('periode','tahun_input','sumber_data');
        $nama_table  = AkreditasiPusdi::select('nama_table')->distinct()->get('nama_table');
        
        return view('admin.akreditasipusdi.index', ['akreditasi_pusdi' => $akreditasi_pusdi, 'nama_table' => $nama_table]);
    }

    public function updateNamaTable(Request $request, $nama_table)
    {
        $akreditasi_pusat_studi = AkreditasiPusdi::where([['nama_table', $nama_table]])->get();
        
        foreach ($akreditasi_pusat_studi as $akreditasi_pusdi) {
            $akreditasi_pusdi->nama_table = $request->nama_table;
            $akreditasi_pusdi->save();
        }

        return redirect(route('admin.akreditasipusdi.index'));
    }

    public function update(Request $request, $periode, $tahun_input, $sumber_data )
    {
        $akreditasi_pusat_studi = AkreditasiPusdi::where([['periode', $periode], ['tahun_input', $tahun_input], ['sumber_data', $sumber_data]])->get();

        foreach ($akreditasi_pusat_studi as $akreditasi_pusdi) {
            $akreditasi_pusdi->periode = $request->periode;
            $akreditasi_pusdi->tahun_input = $request->tahun_input;
            $akreditasi_pusdi->sumber_data = $request->sumber_data;
            $akreditasi_pusdi->save();
        }

        return redirect()->route('admin.akreditasipusdi.index');
    }

    public function delete($periode, $tahun_input)
    {
        $akreditasi_pusat_studi = AkreditasiPusdi::where([['periode', $periode], ['tahun_input', $tahun_input]])->get();
        foreach ($akreditasi_pusat_studi as $akreditasi_pusdi) {
            $akreditasi_pusdi->delete();
        }

        return redirect()->route('admin.akreditasipusdi.index')
            ->with($this->status(0, 'sukses', 'Data Berhasil Dihapus!'));
    }
    
    public function import(Request $request)
    {
        $file = $request->file("akreditasipusdi");
        $periode = $request->periode;
        $tahun = $request->tahun;
        $sumber_data = $request->sumber_data;
        if ($file !== null) {
            Excel::import(new AkreditasiPusdiImport, $file);
        }


        AkreditasiPusdi::where('periode', 'kosong' )
        ->update(['periode' => $request->periode, 'tahun_input' => $request->tahun, 'sumber_data' => $sumber_data]);

        return redirect()->route('admin.akreditasipusdi.index');
    }

    public function details($periode, $tahun_input)
    {
        $nama_table  = AkreditasiPusdi::select('nama_table')->distinct()->get('nama_table');
        $akreditasi_pusdi = AkreditasiPusdi::where('periode', $periode)->where('tahun_input', $tahun_input)->get();
        // $akreditasi = $akreditasi;
        $tahun = $tahun_input;
        return view('admin.akreditasipusdi.details', compact('akreditasi_pusdi', 'tahun', 'nama_table'));
    }


    public function editAkreditasi(Request $request)
    {
      
        
        $akreditasi = AkreditasiPusdi::find($request->id);
		$dataUpdate = [
			'pusat_studi' => $request->pusat_studi,
			'akreditasi' => $request->akreditasi,
            
		];
        
		if($akreditasi->update($dataUpdate)){
            $message = "Berhasil diupdate";
            
            return redirect()->route('admin.akreditasipusdi.details', ['akreditasi' => $akreditasi->akreditasi, 'periode' => $akreditasi->periode, 'tahun_input' => $akreditasi->tahun_input]);
            
        }else{
            return redirect()->route('admin.akreditasipusdi.details', ['akreditasi' => $akreditasi->akreditasi, 'periode' => $akreditasi->periode, 'tahun_input' => $akreditasi->tahun_input]);
        }
    }
}
