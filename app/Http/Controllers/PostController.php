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
		$file = $request->file("thumbnail");
		$filename = time()."_".$file->getClientOriginalName();
		$tujuan_upload = 'upload/post';
		$file->move(public_path()."/".$tujuan_upload,$filename);
		
		$post = new Post([
			'title' => $request->title,
			'content' => $request->content,
			'thumbnail' => $filename,
			'active' => $request->active === 'on'?true:false,
			'show_thumbnail' => $request->show_thumbnail === 'on'?true:false,
			'overview' => $request->overview,
			'published_at' => $request->published_at,
			'user_id' => Auth::id(),
			'created_at' => now(),
		]);
		if($post->save()){
			$post->category()->sync($request->category);
		}
		return redirect(route('admin.post.index'))->with('message', 'berhasil');
	}

	public function edit ($id) {
		$post = Post::find($id);
		return view('admin.post.edit', ['post' => $post, 'category' => Category::all()]);
	}

	public function update (Request $request, $id){
		$post = Post::find($id);
		$dataUpdate = [
			'title' => $request->title,
			'content' => $request->content,
			'overview' => $request->overview,
			'show_thumbnail' => $request->show_thumbnail === 'on'?true:false,
			'active' => $request->active === 'on'?true:false,
			'published_at' => $request->published_at,
		];
		$file = $request->file("thumbnail");
		if($file !== null){
			$filename = time()."_".$file->getClientOriginalName();
			$tujuan_upload = 'upload/post';
			$file->move(public_path()."/".$tujuan_upload,$filename);
			$dataUpdate['thumbnail'] = $filename;
		}
		
		$post->update($dataUpdate);
		$post->category()->sync($request->category);
		$message = "Post " . $dataUpdate['title'] . " berhasil diupdate";

		return redirect(route('admin.post.index'))->with('message', $message);

	}

	public function detail(Request $request, $slug){
		$post = POST::where('title',str_replace('-', ' ', $slug))->where('active', true)->first();
		if($post){
			return view('user.detail-berita',['post' => $post]);
		}
		return abort(404);
	}
}
