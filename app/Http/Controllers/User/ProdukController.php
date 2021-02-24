<?php

namespace App\Http\Controllers\User;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class ProdukController extends Controller
{
    public function penelitian(){
        $data['judul'] = 'Produk Penelitian';
        return view('user.produk',$data);
    }

    public function pengujian(){
        $data['judul'] = 'Produk Pengabdian';
        return view('user.produk',$data);
    }
}
