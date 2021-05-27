<?php

namespace App\Http\Controllers\User;

use App\Http\Controllers\Controller;
use App\Models\Category;
use App\Models\Menu;
use App\Models\Page;
use Illuminate\Http\Request;

class LppmController extends Controller
{
    //
    public function index(){
        return view ('user.coming');
    }

    public function page($slug){
        $data['menu'] = Menu::with('page')->where('url', $slug)->first();
        $cat = Category::with('post')->where('id', $data['menu']->page['category_id'])->get();
        
        if (count($cat) > 1) {
            for ($i=0; $i < count($cat); $i++) { 
                $data['posts'] = $cat[$i]->post;
            }
        } else {
            $data['posts'] = [];
        }
        
        $allMenu = Menu::with('page')->get();
        $menuname = Menu::pluck('menu');

        $data['allMenu'] = $allMenu;
        $data['menuName'] = array_unique($menuname->toArray());
        $max = count($data['menuName']);
        $mn = [];
        for ($i=0; $i < $max; $i++) { 
            $mn[$i]['menu'] = $data['menuName'][$i];
            $mn[$i]['page'] = $allMenu[$i]->page;
            $mn[$i]['icon'] = $allMenu[$i]['icon'];
            $mn[$i]['sub_menu'] = [];
            $mn[$i]['url'] = [];
            for ($j=0; $j < count($allMenu); $j++) { 
                if ($mn[$i]['menu'] == $allMenu[$j]['menu']) {
                    array_push($mn[$i]['sub_menu'], $allMenu[$j]['sub_menu']) ;
                    array_push($mn[$i]['url'], $allMenu[$j]['url']) ;
                } else {
                    $mn[$i]['sub_menu'] = [];
                }
            }
        }

        $data['menus'] = $mn;

        return view('user.page', $data);
    }

    public function submenu($slug, $sub){

        $allMenu = Menu::with('page')->get();
        $menuname = Menu::pluck('menu');

        $data['allMenu'] = $allMenu;
        $data['menuName'] = array_unique($menuname->toArray());
        $max = count($data['menuName']);
        $mn = [];
        for ($i=0; $i < $max; $i++) { 
            $mn[$i]['menu'] = $data['menuName'][$i];
            $mn[$i]['page'] = $allMenu[$i]->page;
            $mn[$i]['icon'] = $allMenu[$i]['icon'];
            $mn[$i]['sub_menu'] = [];
            $mn[$i]['url'] = [];
            for ($j=0; $j < count($allMenu); $j++) { 
                if ($mn[$i]['menu'] == $allMenu[$j]['menu']) {
                    array_push($mn[$i]['sub_menu'], $allMenu[$j]['sub_menu']) ;
                    array_push($mn[$i]['url'], $allMenu[$j]['url']) ;
                } else {
                    $mn[$i]['sub_menu'] = [];
                }
            }
        }

        $data['menus'] = $mn;
        $path = 'user/'.$slug.'/'.$sub.'/index';


        return view($path, $data);
    }

}
