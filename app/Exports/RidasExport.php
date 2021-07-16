<?php

namespace App\Exports;

use App\Models\Rida;
use Illuminate\Contracts\View\View;
use Maatwebsite\Excel\Concerns\FromView;

class RidasExport implements FromView
{
    public function view(): View
    {
        return view('admin.rida.export', [
            'ridas' => Rida::all()
        ]);
    }
}
