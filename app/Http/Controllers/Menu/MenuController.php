<?php

namespace App\Http\Controllers\Menu;

use Illuminate\Support\Facades\Storage;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Menu;
use App\Models\Page;
use Illuminate\Support\Arr;

class MenuController extends Controller
{
    public function index() 
    {
        $menu = Menu::get();
        return view('admin/menu/index', ['menu' => $menu]);
    }

    public function add() 
    {
        $page = Page::select('id','title')->get();
        $menu = Menu::all();
        return view('admin/menu/add',['page' => $page, 'menu' => $menu]);
    }

    public function create(Request $request) 
    {
        $request->validate([
            'menu' => 'required',
            // 'sub_menu' => 'required',
            'url' => 'required',
            'icon'  => 'required|mimes:jpeg,jpg,png|max:500' 
        ]);

        $filename = Storage::disk('public')->putFile('menu', $request->file('icon'));
        
        Menu::create([
            'menu' => $request->menu,
            'sub_menu' => $request->sub_menu,
            'url' => $request->url,
            'icon' => $filename,
            'created_at' => now(),
            'page_id' => isset($request->page_id) ? $request->page_id : null
        ]);

        return redirect()->route('admin.menu.index')->with($this->status(0,'sukses','Data Berhasil Ditambahkan!'));
    }

    public function edit($id = NULL) 
    {
        $menu = Menu::findOrFail($id);
        $data = Menu::get();
        $page = Page::select('id','title')->get();
        return view('admin/menu/edit', ['data'=> $data, 'menu' => $menu,'page' => $page]);
    }

    public function update(Request $request) 
    {
        $request->validate([
            'menu' => 'required',
            'url' => 'required',
            'old_icon' => 'required',
            'new_icon'  => 'mimes:jpeg,jpg,png|max:500' 
        ]);

        $menu = Menu::findOrFail($request->id);
        $menu->page_id = isset($request->page_id) ? $request->page_id : null;
        $menu->sub_menu = isset($request->sub_menu) ? implode (",", $request->sub_menu) : null;
        $menu->menu = $request->menu;
        $menu->url = $request->url;
        $menu->updated_at = now();

        if(isset($request->new_icon)) {
            $filename = Storage::disk('public')->putFile('menu', $request->file('new_icon'));
            unlink(public_path('uploads/'.$request->old_icon));
            $menu->icon = $filename;
        }
        $menu->save();

        return redirect()->route('admin.menu.index')
                         ->with($this->status(0,'sukses','Data Berhasil Diubah!'));
    }

    public function delete($id = NULL) {
        $menu = Menu::findOrFail($id);
        $edit_menu = Menu::select('id','sub_menu')->where('sub_menu','like',"%$id%")->get();
        foreach ($edit_menu as $sub) {
            foreach ($new_sub = explode(',', $sub->sub_menu) as $item) {
                if($item == $id) {
                    $index = array_search($item,$new_sub);
                    if($index !== FALSE){
                        unset($new_sub[$index]);
                    }
                }
            }

            if($sub->sub_menu != implode (",", $new_sub)) {
                $sub->sub_menu = implode (",", $new_sub);
                $sub->save();
            }
        }
        $menu->delete();

        return redirect()->route('admin.menu.index')
                         ->with($this->status(0,'sukses','Data Berhasil Dihapus!'));
    }
}
