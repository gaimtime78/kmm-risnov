<?php

namespace App\Http\Controllers;

use App\Models\Category;
use App\Models\Page;
use App\Models\Posts;
use Faker\Provider\ar_JO\Company;
use Illuminate\Http\Request;
use Illuminate\Support\Str;

use Illuminate\Support\Facades\Auth;

class PageController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $pages = Page::where('user_id', Auth::id())->get();
        return view('admin/page/index', compact('pages'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $category = Category::all();
        return view('admin/page/create', compact('category'));
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
        $data['use_post'] = $request->get('use_post');
        $data['category_id'] = $request->get('post_category');

        $page = new Page([
            'title' => $data['title'],
            'content' => $data['content'],
            'slug' => $data['slug'],
            'use_post' => $data['use_post'],
            'user_id' => Auth::id(),
            'category_id' => $data['category_id']
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
        $latestPost = Posts::where('category_id',$page->id)->latest()->take(3)->get();
        return view('page.blog', compact('page', 'latestPost'));
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
        $currentCategory = Category::find($page->category_id);
        $category = Category::all();
        return view('admin.page.edit', compact('page', 'currentCategory', 'category'));
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
        $data['use_post'] = $request->get('use_post');
        $data['category_id'] = $request->get('post_category');

        $page->update([
            'title' => $data['title'],
            'content' => $data['content'],
            'slug' => $data['slug'],
            'use_post' => $data['use_post'],
            'category_id' => $data['category_id']

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
