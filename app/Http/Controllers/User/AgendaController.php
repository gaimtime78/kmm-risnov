<?php

namespace App\Http\Controllers\User;

use App\Http\Controllers\Controller;
use App\Models\Agenda;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class AgendaController extends Controller
{
    public function index(){
        return view('user.agenda');
    }

    public function getAgendas()
    {
        $agendas = Agenda::get(['title',DB::raw("CONCAT(date,' ',time) AS start")]);
        return $agendas->toJson();
    }
}
