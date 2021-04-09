<?php

namespace App\Http\Controllers;

use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Storage;

use App\Models\Koran;

class KoranController extends Controller
{
	public function index(){
		$data = Koran::all();
		return view('admin.koran.index', ['data' => $data]);
	}

  public function create(){
		return view('admin.koran.create');
	}

	public function store(Request $request){
		
		$koran = new Koran([
			'title' => $request->title,
    		'source' => $request->source,
			'content' => $request->content,
			'active' => $request->active === 'on'?true:false,
			'published_at' => $request->published_at,
			'user_id' => Auth::id(),
			'created_at' => now(),
		]);
		if($koran->save()){
      return redirect(route('admin.koran.index'))->with('message', 'berhasil');
		}else{
      return redirect(route('admin.koran.index'))->with('message', 'gagal');
    }
	}

  public function edit ($id) {
		$koran = Koran::find($id);
		return view('admin.koran.edit', ['koran' => $koran]);
	}

  public function update (Request $request, $id){
		$koran = Koran::find($id);
		$dataUpdate = [
			'title' => $request->title,
      'source' => $request->source,
			'content' => $request->content,
			'active' => $request->active === 'on'?true:false,
			'published_at' => $request->published_at,
		];

		if($koran->update($dataUpdate)){
      $message = "Koran " . $dataUpdate['title'] . " berhasil diupdate";
		  return redirect(route('admin.koran.index'))->with('message', $message);
    }else{
		  return redirect(route('admin.koran.index'))->with('message', 'error');
    }
		
	}

	public function detail(Request $request, $slug){
		$koran = Koran::where('title',str_replace('-', ' ', $slug))->where('active', true)->first();
		if($koran){
			return view('user.detail-koran',['koran' => $koran]);
		}
		return abort(404);
	}

	public function search(Request $request)
	{
		$koran = Koran::where('title','LIKE','%'.$request->cari.'%')
		->orWhere('content','LIKE','%'.strip_tags($request->cari).'%')
		->paginate(5);
		return view('user.koran-search', ['koran' => $koran, 'searchVal' => $request->cari]);
	}
}
