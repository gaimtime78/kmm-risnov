<?php

namespace App\Http\Controllers\User;

use App\Exports\HibahPNBPExport;
use App\Http\Controllers\Controller;
use App\Models\HibahPNBP;
use Illuminate\Http\Request;
use Maatwebsite\Excel\Facades\Excel;

class HibahPNBPController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        $list_tahun = HibahPNBP::select("tahun_input")->distinct()->orderBy("tahun_input", "asc")->get();
        $fakultas = HibahPNBP::select('fakultas')->first();
        if (!$list_tahun->isEmpty()) {
            $latest_tahun = $list_tahun[0]->tahun_input;
            $fakultas = $fakultas['fakultas'];
            $tahun = $latest_tahun;
            if ($request->has("fakultas")) {
                $fakultas = $request->input("fakultas");
            }
            if ($request->has("tahun")) {
                $tahun = $request->input("tahun");
            }
            $data = HibahPNBP::where("fakultas", $fakultas)->where("tahun_input", $tahun)->get();
            $list_fakultas = HibahPNBP::select("fakultas")->distinct()->where("tahun_input", $tahun)->get();
            $list_sumber = HibahPNBP::select("periode", "sumber_data")->distinct()->where("fakultas", $fakultas)->where("tahun_input", $tahun)->get();
            // dd($list_sumber);
            return view('user.rida.grafikpnbp', [
                "name" => "hibah-pnbp",
                "data" => $data, "list_sumber" => $list_sumber, "list_tahun" => $list_tahun,
                "list_fakultas" => $list_fakultas, "fakultas" => $fakultas, "tahun" => $tahun
            ]);
        }

        return view('user.rida.grafikpnbp', [
            "name" => "hibah-pnbp",
            "data" => [], "list_sumber" => [], "list_tahun" => [],
            "list_fakultas" => [], "fakultas" => "", "tahun" => ""
        ]);
    }

    public function export($fakultas, $tahun)
    {
        return Excel::download(new HibahPNBPExport($fakultas, $tahun), 'HibahPNBP.xlsx');
    }
}
