<?php

namespace App\Http\Controllers\Rida;

use Illuminate\Support\Facades\Storage;
use App\Http\Controllers\Controller;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\PenelitiPengabdiMagister;
use App\Exports\PenelitiPengabdiMagister\PenelitiPengabdiMagistersExport;
use App\Imports\PenelitiPengabdiMagister\PenelitiPengabdiMagistersImport;
use Maatwebsite\Excel\Facades\Excel;

class MagisterController extends Controller
{
    public function index()
    {
        $penelitipengabdimagister = PenelitiPengabdiMagister::distinct()->get('fakultas', 'id');
        
        return view('admin.penelitipengabdimagister.index', ['penelitipengabdimagister' => $penelitipengabdimagister]);
    }

    public function add()
    {
        return view('admin/penelitipengabdimagister/add');
    }

    public function store(Request $request)
    {
        return redirect()->route('admin.penelitipengabdimagister.index');
    }

    public function edit(Request $request, $id)
    {
        $penelitipengabdimagister = PenelitiPengabdiMagister::find($id);
        return view('admin/penelitipengabdimagister/edit', compact('penelitipengabdimagister'));
    }

    public function update(Request $request, $id)
    {
        $penelitipengabdimagister = PenelitiPengabdiMagister::find($id);
        return redirect()->route('admin.penelitipengabdimagister.index');
    }

    public function delete($id)
    {
        $penelitipengabdimagister = PenelitiPengabdiMagister::findOrFail($id);
        $penelitipengabdimagister->delete();

        return redirect()->route('admin.penelitipengabdimagister.index')
            ->with($this->status(0, 'sukses', 'Data Berhasil Dihapus!'));
    }

    public function export()
    {
        return Excel::download(new PenelitiPengabdiExport, 'penelitipengabdimagister.xlsx');
    }

    public function import(Request $request)
    {
        $file = $request->file("penelitipengabdimagister");
        if ($file !== null) {
            Excel::import(new PenelitiPengabdiMagistersImport, $file);
        }
        return redirect()->route('admin.penelitipengabdimagister.index');
    }
}
