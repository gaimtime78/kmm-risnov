<?php

namespace App\Http\Controllers;

use App\Models\Category;
use Illuminate\Http\Request;

class CategoryController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $category = Category::get();
        return view('category/index', ['category' => $category]);
    }

    public function add(){
        return view('category/add');
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create(Request $request)
    {
        $request->validate([
            'category' => 'required',
        ]);
        
        $cekCategory = Category::create([
            'category' => $request->category,
            'created_at' => now()
        ]);
        $status = $this->status($cekCategory, 'Category berhasil ditambahkan!', 'Category gagal ditambahkan!');
        return redirect()->route('admin.category.index')->with($status);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
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
        $new = $request->newCategory;
        $time = now();
        $cekCategory = Category::where('id', $id)
                        ->update(['category' => $new, 'updated_at' => $time]);
        $status = $this->status($cekCategory, 'Category berhasil diubah!', 'Category gagal diubah!');
        return redirect()->route('admin.category.index')->with($status);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function delete($id)
    {
        $category = Category::findOrFail($id);
        $category->delete();

        return redirect()->route('admin.category.index')
                         ->with($this->status(0,'sukses','Data Berhasil Dihapus!'));
    }
}
