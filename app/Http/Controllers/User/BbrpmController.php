<?php

namespace App\Http\Controllers\User;

use App\Http\Controllers\Controller;
use App\Models\Menu;
use Illuminate\Http\Request;
use App\Models\Post;

class BbrpmController extends Controller
{
    public function index(){
        return view('user.bbrpm');
    }
    public function ruang(){
        return view('user.ruang');
    }

}
