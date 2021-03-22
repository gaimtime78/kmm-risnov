<?php

namespace App\Http\Controllers\User;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Post;
use App\Models\Category;

class DokumentasiController extends Controller
{
    public function index()
    {
        return view ('user.dokumentasi');
    }
}
