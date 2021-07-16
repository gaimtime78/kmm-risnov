<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\Rida;
use App\Exports\RidasExport;
use App\Imports\RidasImport;
use Maatwebsite\Excel\Facades\Excel;

class RidaController extends Controller
{
    public function index()
    {
        $rida = Rida::where('id', Auth::id())->get();
        // dd("check");
        return view('admin.rida.index', ['rida' => $rida]);
    }

    public function add()
    {
        return view('admin/rida/add');
    }

    public function store(Request $request)
    {
        return redirect()->route('admin.rida.index');
    }

    public function edit(Request $request, $id)
    {
        $rida = Rida::find($id);
        return view('admin/rida/edit', compact('rida'));
    }

    public function update(Request $request, $id)
    {
        $rida = Rida::find($id);
        return redirect()->route('admin.rida.index');
    }

    public function delete($id)
    {
        $rida = Rida::findOrFail($id);
        $rida->delete();

        return redirect()->route('admin.rida.index')
            ->with($this->status(0, 'sukses', 'Data Berhasil Dihapus!'));
    }

    public function export()
    {
        return Excel::download(new RidasExport, 'rida.xlsx');
    }

    public function import(Request $request)
    {
        $file = $request->file("rida");
        if ($file !== null) {
            Excel::import(new RidasImport, $file);
        }
        return redirect()->route('admin.rida.index');
    }
}
