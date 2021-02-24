<?php

namespace App\Http\Controllers\User;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Menu;

class DashboardController extends Controller
{
    public function index(){
        return view('dashboard');
    }


    //belom jadi
    public function get_menu() 
    {

        $menu = Menu::select('id','menu','sub_menu')->get();
        $head = array();
        foreach ($menu as $row) {
            $status = true;
            foreach ($menu as $row2) {
                $sub_menu = explode(',',$row2->sub_menu);
                if(in_array($row->id, $sub_menu)) {
                    $status = false;
                }
            }
            if($status) {
                array_push($head, ['menu' => $row->menu,'sub_menu' => $row->sub_menu]);
            }
        }

        $head = $this->check_sub_menu($head,$menu);

        return response()->json($head);
    }

    public function check_sub_menu($head, $menu) {
        foreach ($head as $key => $value) {
            if($value['sub_menu']) {
                $sub = explode(',',$value['sub_menu']);
                $head[$key]['sub_menu'] = array();
                foreach ($sub as $key2 => $value2) {
                    foreach ($menu as $item) {
                        if($item['id'] == $value2) {
                            array_push($head[$key]['sub_menu'], ['menu' => $item->menu,'sub_menu' => $item->sub_menu]);
                            if($item->sub_menu) {
                                $head[$key]['sub_menu'] = $this->check_sub_menu($head[$key]['sub_menu'], $menu);
                            }
                        }
                    }
                }
            }
        }
        return $head;
    }
}
