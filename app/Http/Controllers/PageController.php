<?php

namespace App\Http\Controllers;

use App\Models\Page;
use Faker\Provider\ar_JO\Company;
use Illuminate\Http\Request;
use Illuminate\Support\Str;

class PageController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $pages = Page::all();
        return view('page/index', compact('pages'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin/page/create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $data['title']  = $request->get('title');
        $data['content'] = $request->get('content');
        $data['slug'] = Str::slug($data['title'], '-');
        $data['useAsPost'] = $request->get('useAsPost');

        $page = new Page([
            'title' => $data['title'],
            'content' => $data['content'],
            'slug' => $data['slug'],
            'use_post' => $data['useAsPost']
        ]);

        $page->save();

        $message = "Laman " . $data['title'] . " berhasil dibuat";

        return redirect(route('admin.page.index'))->with('message', $message);
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Page  $page
     * @return \Illuminate\Http\Response
     */
    public function blog($slug)
    {
        $page = Page::where('slug', $slug)->first();
        return view('page.blog', compact('page'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Page  $page
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $page = Page::find($id);
        return view('page.edit', compact('page'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Page  $page
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $page = Page::find($id);
        
        $data['title']  = $request->get('title');
        $data['content'] = $request->get('content');
        $data['slug'] = Str::slug($data['title'], '-');
        $data['useAsPost'] = $request->get('useAsPost');

        $page->update([
            'title' => $data['title'],
            'content' => $data['content'],
            'slug' => $data['slug'],
            'use_post' => $data['useAsPost']
        ]);

        $message = "Laman " . $data['title'] . " berhasil diupdate";

        return redirect(route('admin.page.index'))->with('message', $message);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Page  $page
     * @return \Illuminate\Http\Response
     */
    public function delete($id)
    {
        $page = Page::findOrFail($id);
        $page->delete();
        $message = "Laman " . $page['title'] . " berhasil dihapus";
        return redirect(route('admin.page.index'))->with('message', $message);
    }
}
