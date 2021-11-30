<?php

namespace App\Http\Controllers\User;

use App\Http\Controllers\Controller;
use App\Models\Menu;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
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

        $playlist_selected = DB::table('video_playlists')
            ->where('activated', '=', true)
            ->orderBy('id', 'ASC')
            ->get();
        $data['videoIds'] = $playlist_selected[0]->video_ids;
        // $data['gallery'] = Post::where('active', 1)->whereHas('category', function($v){
        //     $v->where('category','=', 'Gallery');
        // })->orderBy('created_at','DESC')->limit(6)->get();
        $allPost = Post::where('active', 1)->orderBy('created_at','DESC')->get();
        $allPic = [];
        $allMenu = Menu::with('page')->get();
        foreach ($allPost as $key => $value) {
            // dd($value->video_url);
            $video_urls = preg_split("/[\s,]+/", $value->video_url);
            $urls = array();
            foreach ($video_urls as $url) {
                $pattern = '/(https?\:\/\/)?(www\.youtube\.com|youtube\.com|youtu\.?be)\/watch\?v=/';
                $replacement = '${1}${2}/embed/';
                $embed_url = preg_replace($pattern, $replacement, $url);
                array_push($allVideo, $embed_url);
            }
            foreach($value->gallery as $k => $v){
                array_push($allPic, $v->file);
            }
        }
        
        $menuname = Menu::pluck('menu');

        $data['gallery'] = $allPic;
        $data['allVideo'] = [];
        $data['allPost'] = $allPost;
        $data['allMenu'] = $allMenu;
        $data['menuName'] = array_unique($menuname->toArray());
        $unique = array_values($data['menuName']);
        $max = count($data['menuName']);
        $mn = [];
        for ($i=0; $i < $max; $i++) { 
            $mn[$i]['menu'] = $unique[$i];
            $mn[$i]['page'] = $allMenu[$i]->page;
            $mn[$i]['icon'] = $allMenu[$i]['icon'];
            $mn[$i]['sub_menu'] = [];
            $mn[$i]['url'] = [];
            for ($j=0; $j < count($allMenu); $j++) { 
                if ($mn[$i]['menu'] == $allMenu[$j]['menu']) {
                    array_push($mn[$i]['sub_menu'], $allMenu[$j]['sub_menu']) ;
                    array_push($mn[$i]['url'], $allMenu[$j]['url']) ;
                } 
            }

        }
        $data['menus'] = $mn;
        // dd($data);
        return view('user.home', $data);
    }
    public function ruang(){
        return view('user.ruang');
    }

}
