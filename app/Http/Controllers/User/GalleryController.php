<?php

namespace App\Http\Controllers\User;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Post;

class GalleryController extends Controller
{
    public function index(){
        $gallery = Post::where('active', 1)->whereHas('category', function($v){
            $v->where('category', 'Gallery');
        })->paginate(9);
        return view('user.gallery', ['gallery' => $gallery]);
    }
}
