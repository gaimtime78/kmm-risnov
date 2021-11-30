<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\DB;
use Illuminate\Http\Request;

class VideoPlaylistController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        // $category = Category::get();
        // return view('category/index', ['category' => $category]);
        $video_playlists = DB::table('video_playlists')
        ->orderBy('id', 'ASC')
        ->get();
        return view('video_playlist.index', ['video_playlist' => $video_playlists]);
    }

    public function add(){
        return view('video_playlist.add');
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create(Request $request)
    {
        $request->validate([
            'playlist_name' => 'required',
            'video_ids' => 'required',
        ]);

        DB::table('video_playlists')
			->update([
				'activated' => false,
			]);
        
        $row_id = DB::table('video_playlists')
        ->insertGetId([
            'playlist_name' => $request->playlist_name,
            'video_ids' => $request->video_ids,
            'created_at' => now(),
            'updated_at' => now(),
			'activated' => true,
        ]);

        // $cekCategory = Category::create([
        //     'playlist_name' => $request->playlist_name,
        //     'created_at' => now()
        // ]);
        $status = $this->status($row_id, 'Playlist berhasil ditambahkan!', 'Playlist gagal ditambahkan!');
        return redirect()->route('admin.video_playlist.index')->with($status);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function activate(Request $request, $id)
    {
        DB::table('video_playlists')
			->update([
				'activated' => false,
			]);
        $row_id = DB::table('video_playlists')
			->where('id', '=', $id)
			->update([
				'activated' => true,
			]);
        $status = $this->status($row_id, 'Playlist berhasil diaktifkan!', 'Playlist gagal diaktifkan!');
        return redirect()->route('admin.video_playlist.index')->with($status);
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        // $new = $request->newCategory;
        // $time = now();
        // $cekCategory = Category::where('id', $id)
        //                 ->update(['category' => $new, 'updated_at' => $time]);

        $row_id = DB::table('video_playlists')
			->where('id', '=', $id)
			->update([
				'playlist_name' => $request->new_playlist_name,
                'video_ids' => $request->new_video_ids,
                'updated_at' => now(),
			]);
        $status = $this->status($row_id, 'Playlist berhasil diubah!', 'Playlist gagal diubah!');
        return redirect()->route('admin.video_playlist.index')->with($status);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function delete($id)
    {
        // $playlist = Category::findOrFail($id);
        // $category->delete();
        DB::table('video_playlists')->where('id', '=', $id)->delete();

        return redirect()->route('admin.video_playlist.index')
                         ->with($this->status(0,'sukses','Data Berhasil Dihapus!'));
    }
}
