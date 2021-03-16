<?php

namespace App\Http\Controllers\User;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Post;

class HomeController extends Controller
{
    public function index(){
        $data['post'] = Post::where('active', 1)->whereHas('category', function($v){
            $v->where('category','!=', 'Berita Terkini');
        })->orderBy('created_at','DESC')->paginate(3);

        $data['gallery'] = Post::where('active', 1)->whereHas('category', function($v){
            $v->where('category','=', 'Gallery');
        })->orderBy('created_at','DESC')->limit(6)->get();
        return view('user.home', $data);
    }
}
