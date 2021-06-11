<?php

namespace App\Http\Controllers\User;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Post;
use App\Models\Category;
use App\Models\Menu;

class BeritaController extends Controller
{
    public function index()
    {
        $post = Post::where('active', 1)->whereHas('category', function ($v) {
            $v->where('category', 'Berita Terkini');
        })->orderBy('published_at', 'DESC')->paginate(6);
        $latest = Post::where('active', 1)->whereHas('category', function ($v) {
            $v->where('category', '!=', 'Berita Terkini');
        })->orderBy('published_at', 'DESC')->paginate(3);
        $category = Category::get();

        $allMenu = Menu::with('page')->get();
        $menuname = Menu::pluck('menu');
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

        $menus = $mn;

        return view('user.berita', ['post' => $post,'latest' => $latest, 'category' => $category, 'menus' => $menus]);
    }
}
