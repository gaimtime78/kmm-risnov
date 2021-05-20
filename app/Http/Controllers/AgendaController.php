<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Agenda;

class AgendaController extends Controller
{
    public function index()
    {
        $agenda = Agenda::get();
        // dd("cehck");
        return view('admin.agenda.index', ['agenda' => $agenda]);
    }

    public function create(){
        return view('admin/agenda/add');
    }

    public function store(Request $request)
    {
        $request->validate([
            'date' => 'required',
            'title' => 'required',
        ]);

        $agenda = Agenda::create([
            'date' => $request->date,
            'time' => $request->time,
            'title' => $request->title
        ]);
        $status = $this->status($agenda, 'Agenda berhasil ditambahkan!', 'Agenda gagal ditambahkan!');
        return redirect()->route('admin.agenda.index')->with($status);
    }

    public function update(Request $request, $id)
    {
        $time = now();
        $cekAgenda = Agenda::where('id', $id)
                        ->update([
                            'date' => $request->date,
                            'time' => $request->time,
                            'title' => $request->title
                        ]);
        $status = $this->status($cekAgenda, 'Agenda berhasil diubah!', 'Agenda gagal diubah!');
        return redirect()->route('admin.agenda.index')->with($status);
    }

    public function delete($id)
    {
        $agenda = Agenda::findOrFail($id);
        $agenda->delete();

        return redirect()->route('admin.agenda.index')
                         ->with($this->status(0,'sukses','Data Berhasil Dihapus!'));
    }

}
