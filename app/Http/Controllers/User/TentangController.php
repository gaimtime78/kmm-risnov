<?php

namespace App\Http\Controllers\User;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class TentangController extends Controller
{ 
    //
    public function sambutan(){
        return view ('user.tentang.sambutan');
    }

    public function visiMisi(){
        return view ('user.tentang.visiMisi');
    }

    public function tugasFungsi(){
        return view ('user.tentang.tugasFungsi');
    }

    public function rencanaStrategis(){
        return view ('user.tentang.rencanaStrategis');
    }

    public function profilBiro(){
        return view ('user.tentang.profilBiro');
    }
}
