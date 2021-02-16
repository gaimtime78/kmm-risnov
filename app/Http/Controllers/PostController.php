<?php

namespace App\Http\Controllers;

use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

class PostController extends Controller
{
	public function index()
	{
		$data = DB::table('post')
			->orderBy('created_at', 'DESC')
			->get();
		return view('admin.post.index', ['data' => $data]);
	}

	public function category($categoryId)
	{
		$data = DB::table('post')
			->orderBy('created_at', 'DESC')
			->where('category_id', '=', $categoryId)
			->get();
		return view('admin.post.category', ['data' => $data]);
	}

	public function create()
	{
		return view('admin.post.create');
	}

	public function store(Request $request)
	{
		DB::table('post')
			->insert([
				'title' => $request->input('title'),
				'content' => $request->input('content'),
				'user_id' => Auth::id(),
				'created_at' => Carbon::now(),
				'updated_at' => Carbon::now(),
			]);
		return redirect()->route('admin.post.index');
	}

	public function edit($postId)
	{
		$data = DB::table('post')
			->where('id', '=', $postId)
			->limit(1)
			->get();
		return view('admin.post.edit', ['data' => $data[0]]);
	}

	public function update(Request $request, $postId)
	{
		DB::table('post')
			->where('id', '=', $postId)
			->update([
				'title' => $request->input('title'),
				'content' => $request->input('content'),
				'user_id' => Auth::id(),
				'updated_at' => Carbon::now(),
			]);
		return redirect()->route('admin.post.index');
	}

	public function delete(Request $request, $postId)
	{
		DB::table('post')
			->delete($postId);
		return redirect()->route('admin.post.index');
	}
}
