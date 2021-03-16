<?php

namespace App\Http\Controllers\User;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Post;
use View;

class HomeController extends Controller
{
    public function index(){
        $data['post'] = Post::where('active', 1)->whereHas('category', function($v){
            $v->where('category','!=', 'Berita Terkini');
        })->orderBy('created_at','DESC')->paginate(3);

        $data['gallery'] = Post::where('active', 1)->whereHas('category', function($v){
            $v->where('category','=', 'Gallery');
        })->orderBy('created_at','DESC')->paginate(6);
        return view('user.home', $data);
    }

    public function get_gallery() {
        $gallery = Post::where('active', 1)->whereHas('category', function($v){
            $v->where('category','=', 'Gallery');
        })->orderBy('created_at','DESC')->paginate(6);
        
        $data = View::make('user.view.gallery', ['gallery' => $gallery])->render();
        return response()->json($data);
    }
}
