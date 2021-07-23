<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\PenelitiPengabdi;
use App\Exports\PenelitiPengabdiExport;
use App\Imports\PenelitiPengabdisImport;
use Maatwebsite\Excel\Facades\Excel;

class RidaController extends Controller
{
    public function index()
    {
        $penelitipengabdi = PenelitiPengabdi::where('jenjang', 'Doktor' )->get();
        
        return view('admin.penelitipengabdi.index', ['penelitipengabdi' => $penelitipengabdi]);
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

    public function update(Request $request, $id)
    {
        $penelitipengabdi = PenelitiPengabdi::find($id);
        return redirect()->route('admin.penelitipengabdi.index');
    }

    public function delete($id)
    {
        $penelitipengabdi = PenelitiPengabdi::findOrFail($id);
        $penelitipengabdi->delete();

        return redirect()->route('admin.penelitipengabdi.index')
            ->with($this->status(0, 'sukses', 'Data Berhasil Dihapus!'));
    }

    public function export()
    {
        return Excel::download(new PenelitiPengabdiExport, 'penelitipengabdi.xlsx');
    }

    public function import(Request $request)
    {
        $file = $request->file("penelitipengabdi");
        if ($file !== null) {
            Excel::import(new PenelitiPengabdisImport, $file);
        }
        return redirect()->route('admin.penelitipengabdi.index');
    }
}
