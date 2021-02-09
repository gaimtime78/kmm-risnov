<?php

namespace App\Http\Controllers\Posts;

use App\Models\Posts;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class PostsController extends Controller
{
    public function index() 
    {
        dd('awkoaw');
    }

    public function add() 
    {
        return view('posts/add');
    }

    public function create(Request $request) 
    {
        $request->validate([
            'title' => 'required|min:5',
            'text' => 'required|min:5',
            'img'  => 'mimes:jpeg,jpg,png|max:500',
            'date' => 'required|date_format:Y-m-d'
        ]);
        
        $filename = $request->file('img')->store('posts');
        
        Posts::create([
            'id' => uniqid(),
            'title' => $request->title,
            'user_id' => 1,
            'text' => $request->text,
            'img' => $filename,
            'created_at' => $request->date
        ]);

        dd('done');
        
    }
}
