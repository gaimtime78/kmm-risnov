<?php

namespace App\Http\Controllers;

use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Storage;

use App\Models\Post;
use App\Models\Category;
use App\Models\Gallery;

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
		$file->move(public_path()."/".$tujuan_upload, $filename);
		
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
			$listGallery = [];
			
			foreach ($request->gallery as $key => $v) {
				$filename = time()."_".$v->getClientOriginalName();
				$tujuan_upload = 'upload/post';
				$v->move(public_path()."/".$tujuan_upload,$filename);
				$gallery = new Gallery([
					'post_id' => $post->id,
					'file' => $filename,
					'deskripsi' => $request->deskripsiGallery[$key]
				]);
				// array_push($listGallery, $gallery->id);
				$gallery->save();
			}
			// $post->gallery()->save($listGallery);
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

		//Upload Thumbnail
		$file = $request->file("thumbnail");
		if($file !== null){
			$filename = time()."_".$file->getClientOriginalName();
			$tujuan_upload = 'upload/post';
			$file->move(public_path()."/".$tujuan_upload,$filename);
			$dataUpdate['thumbnail'] = $filename;
		}
		//Upload Gallery
		if($post->update($dataUpdate)){
			$listGallery = [];
			foreach ($request->gallery as $key => $v) {
				if($v !== null){
					$filename = time()."_".$v->getClientOriginalName();
					$tujuan_upload = 'upload/post';
					$v->move(public_path()."/".$tujuan_upload,$filename);
				}
				
			}
			$post->gallery()->sync($listGallery);
		}
		
		
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

	public function search(Request $request)
	{
		$data['post'] = POST::where('title','LIKE','%'.$request->cari.'%')
		->orWhere('content','LIKE','%'.strip_tags($request->cari).'%')
		->paginate(5);
		return view('user.search', $data);
	}

	public function searchKategory(Request $request)
	{
		$data['post'] = POST::whereHas('category', function($q) use ($request){
			$q->where('category', 'LIKE', $request->category);
		})->paginate(5);
		return view('user.search', $data);
	}
}
