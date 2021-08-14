<?php

namespace App\Http\Controllers\User;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\PenelitiPengabdi;

class RidaController extends Controller
{
    public function index(){

      return view('user.rida.index', ['data' => "iki data"]);
    }
    public function doktoral(){

      return view('user.rida.doktoral', ['data' => "iki data"]);
    }
}
