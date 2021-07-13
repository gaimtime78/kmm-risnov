<?php

namespace App\Exports;

use App\Models\Agenda;
use Illuminate\Contracts\View\View;
use Maatwebsite\Excel\Concerns\FromView;

class AgendasExport implements FromView
{
    public function view(): View
    {
        return view('admin.agenda.export', [
            'agendas' => Agenda::all()
        ]);
    }
}
