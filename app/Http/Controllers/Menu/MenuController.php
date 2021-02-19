<?php

namespace App\Http\Controllers\Menu;

use Illuminate\Support\Facades\Storage;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Menu;


class MenuController extends Controller
{
    public function index() 
    {
        $menu = Menu::get();
        return view('menu/index', ['menu' => $menu]);
    }

    public function add() 
    {
        return view('menu/add');
    }

    public function create(Request $request) 
    {
        $request->validate([
            'menu' => 'required',
            'sub_menu' => 'required',
            'url' => 'required',
            'icon'  => 'required|mimes:jpeg,jpg,png|max:500' 
        ]);

        $filename = Storage::disk('public')->putFile('menu', $request->file('icon'));
        
        Menu::create([
            'menu' => $request->menu,
            'sub_menu' => $request->sub_menu,
            'url' => $request->url,
            'icon' => $filename,
            'created_at' => now()
        ]);

        return redirect()->route('admin.menu.index')->with($this->status(0,'sukses','Data Berhasil Ditambahkan!'));
    }

    public function edit($id = NULL) 
    {
        $menu = Menu::findOrFail($id);
        return view('menu/edit', ['menu' => $menu]);
    }

    public function update(Request $request) 
    {
        $request->validate([
            'menu' => 'required',
            'sub_menu' => 'required',
            'url' => 'required',
            'old_icon' => 'required'
        ]);

        $menu = Menu::findOrFail($request->id);
        $menu->menu = $request->menu;
        $menu->sub_menu = $request->sub_menu;
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
        $menu->delete();

        return redirect()->route('admin.menu.index')
                         ->with($this->status(0,'sukses','Data Berhasil Dihapus!'));
    }
}
