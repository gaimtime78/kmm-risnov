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
        })->orderBy('created_at','DESC')->paginate(1);

        $data['left'] = Post::where('active', 1)->whereHas('category', function($v){
            $v->where('category','!=', 'Berita Terkini');
        })->orderBy('created_at','DESC')->paginate(6);

        // $data['gallery'] = Post::where('active', 1)->whereHas('category', function($v){
        //     $v->where('category','=', 'Gallery');
        // })->orderBy('created_at','DESC')->limit(6)->get();
        $allPost = Post::where('active', 1)->orderBy('created_at','DESC')->get();
        $allPic = [];
        foreach ($allPost as $key => $value) {
            foreach($value->gallery as $k => $v){
                array_push($allPic, $v->file);
            }
 
        }
        $data['gallery'] = $allPic;
        $data['allPost'] = $allPost;
        return view('user.home', $data);
    }
}
