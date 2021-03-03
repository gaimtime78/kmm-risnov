<?php

namespace App\Http\Controllers\User;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Post;

class ProdukController extends Controller
{
    public function penelitian(){
        $data['judul'] = 'Produk Penelitian';
        return view('user.produk',$data);
    }

    public function pengabdian(){
        $data['judul'] = 'Produk Pengabdian';
        return view('user.produk',$data);
    }

    public function index(){
        $produk = Post::where('active', 1)->whereHas('category', function($v){
            $v->where('category', 'Produk Komersil');
        })->paginate(9);
        return view('user.berita', ['post' => $produk]);
    }
}
