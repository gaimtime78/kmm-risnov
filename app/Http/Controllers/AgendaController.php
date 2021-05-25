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

    public function create()
    {
        return view('admin/agenda/add');
    }

    public function store(Request $request)
    {
        $customizedTitle = date("Ymd") . '-' . str_replace(' ', '-', $request->title);
        $url = url('id/agenda/' . $customizedTitle);
        $request->validate([
            'date' => 'required',
            'title' => 'required',
        ]);

        $file = $request->file("thumbnail");
        $filename = time() . "_" . $file->getClientOriginalName();
        $tujuan_upload = 'upload/agenda';
        $file->move(public_path() . "/" . $tujuan_upload, $filename);

        $agenda = Agenda::create([
            'date' => $request->date,
            'time' => $request->time,
            'title' => $request->title,
            'thumbnail' => $filename,
            'description' => $request->description,
            'url' => $url,
			'show_thumbnail' => $request->show_thumbnail === 'on'?true:false,
        ]);
        $status = $this->status($agenda, 'Agenda berhasil ditambahkan!', 'Agenda gagal ditambahkan!');
        return redirect()->route('admin.agenda.index')->with($status);
    }

    public function edit(Request $request, $id)
    {
        $agenda = Agenda::find($id);
        return view('admin/agenda/edit', compact('agenda'));
    }

    public function update(Request $request, $id)
    {
        $agenda = Agenda::find($id);
        $time = now();
        $customizedTitle = date("Ymd") . '-' . str_replace(' ', '-', $request->title);
        $url = url('id/agenda/' . $customizedTitle);
        $dataUpdate = [
                'date' => $request->date,
                'time' => $request->time,
                'title' => $request->title,
                'url' => $url,
                'description' => $request->description,
                'show_thumbnail' => $request->show_thumbnail === 'on'?true:false,
            ];
        $file = $request->file("thumbnail");
        if ($file !== null) {
            $filename = time() . "_" . $file->getClientOriginalName();
            $tujuan_upload = 'upload/agenda';
            $file->move(public_path() . "/" . $tujuan_upload, $filename);
            $dataUpdate['thumbnail'] = $filename;
        }
        $status = $this->status($agenda->update($dataUpdate), 'Agenda berhasil diubah!', 'Agenda gagal diubah!');
        return redirect()->route('admin.agenda.index')->with($status);
    }

    public function delete($id)
    {
        $agenda = Agenda::findOrFail($id);
        $agenda->delete();

        return redirect()->route('admin.agenda.index')
            ->with($this->status(0, 'sukses', 'Data Berhasil Dihapus!'));
    }
}
