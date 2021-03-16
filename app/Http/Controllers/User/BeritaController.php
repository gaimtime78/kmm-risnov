<?php

namespace App\Http\Controllers\User;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Post;
use App\Models\Category;

class BeritaController extends Controller
{
    public function index(){
        $post = Post::where('active', 1)->whereHas('category', function($v){
            $v->where('category', 'Berita Terkini');
        })->orderBy('published_at','DESC')->paginate(9);
        $latest = Post::where('active', 1)->whereHas('category', function($v){
            $v->where('category','!=', 'Berita Terkini');
        })->orderBy('published_at','DESC')->paginate(3);
        $category = Category::get();
        return view('user.berita', ['post' => $post,'latest' => $latest, 'category' => $category]);
    }
}
