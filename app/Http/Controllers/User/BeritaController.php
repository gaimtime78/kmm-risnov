<?php

namespace App\Http\Controllers\User;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Post;

class BeritaController extends Controller
{
    public function index(){
        $post = Post::where('active', 1)->whereHas('category', function($v){
            $v->where('category', 'Berita Terkini');
        })->paginate(9);
        return view('user.berita', ['post' => $post]);
    }
}
