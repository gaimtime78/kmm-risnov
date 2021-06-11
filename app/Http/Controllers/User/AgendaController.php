<?php

namespace App\Http\Controllers\User;

use App\Http\Controllers\Controller;
use App\Models\Agenda;
use App\Models\Menu;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class AgendaController extends Controller
{
    public function index(){
        $allMenu = Menu::with('page')->get();

		$menuname = Menu::pluck('menu');

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
		$menus = $mn;

        return view('user.agenda', ['menus' => $menus]);
    }

    public function getAgendas()
    {
        $agendas = Agenda::get(['title',DB::raw("CONCAT(date,' ',time) AS start"), 'url', 'title AS description']);
        return $agendas->toJson();
    }

    public function detail($slug)
    {
        $url = url('agenda/' . $slug);
        $agenda = Agenda::where('url',$url)->first();
        return view('user.detail-agenda', compact('agenda'));
    }
}
