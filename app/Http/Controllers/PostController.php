<?php

namespace App\Http\Controllers;

use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Storage;

use App\Models\Post;
use App\Models\Category;

class PostController extends Controller
{
	public function index(){
		$data = Post::all();
		return view('admin.post.index', ['data' => $data]);
	}

	public function create(){
		return view('admin.post.create', ['category' => Category::all()]);
	}

	public function store(Request $request){
		// dd($request->active);

		$filename = Storage::disk('public')->putFile('post', $request->file('thumbnail'));
		// dd($request->title);
		
		$post = new Post([
			'title' => $request->title,
			'content' => $request->content,
			'thumbnail' => $filename,
			'active' => $request->active === 'on'?true:false,
			'user_id' => Auth::id(),
			'created_at' => now(),
		]);
		if($post->save()){
			$post->category()->sync($request->category);
		}
		return redirect(route('admin.post.index'))->with('message', 'berhasil');
		
	}
	// public function index()
	// {
	// 	$data = DB::table('post')
	// 		->orderBy('created_at', 'DESC')
	// 		->get();
	// 	return view('admin.post.index', ['data' => $data]);
	// }

	// public function store(Request $request)
	// {
	// 	$request->validate([
	// 		'title' => 'required'
	// 	]);
	// 	DB::table('post')
	// 		->insert([
	// 			'title' => $request->input('title'),
	// 			'content' => $request->input('content'),
	// 			'user_id' => Auth::id(),
	// 			'created_at' => Carbon::now(),
	// 			'updated_at' => Carbon::now(),
	// 		]);
	// 	return redirect()->route('admin.post.index');
	// }

	// public function edit($postId)
	// {
	// 	$data = DB::table('post')
	// 		->where('id', '=', $postId)
	// 		->limit(1)
	// 		->get();
	// 	return view('admin.post.edit', ['data' => $data[0]]);
	// }

	// public function update(Request $request, $postId)
	// {
	// 	$request->validate([
	// 		'title' => 'required'
	// 	]);
	// 	DB::table('post')
	// 		->where('id', '=', $postId)
	// 		->update([
	// 			'title' => $request->input('title'),
	// 			'content' => $request->input('content'),
	// 			'user_id' => Auth::id(),
	// 			'updated_at' => Carbon::now(),
	// 		]);
	// 	return redirect()->route('admin.post.index');
	// }

	// public function delete(Request $request, $postId)
	// {
	// 	DB::table('post')
	// 		->delete($postId);
	// 	return redirect()->route('admin.post.index');
	// }
}
