<?php

namespace App\Http\Controllers;

use App\Models\Banner;
use Carbon\Carbon;
use Illuminate\Http\Request;

class BannerController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $banner = Banner::all();
        return view('admin/banner/index', compact('banner'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin/banner/create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $data['filenames'] = array();
        $data['content_type']  = $request->get('content_type');
        $fileUpload = $request->file('content');
        $destination = public_path('banners/');
        $ordered_number = 1;
            foreach ($fileUpload as $item) {
                $filename = Carbon::now()->timestamp . '_' . $ordered_number . '.' . $item->getClientOriginalExtension();
                $data['filenames'][] = $filename;
                $item->move($destination, $filename);
                $ordered_number++;
            }

        $banner = new Banner([
            'content_type' => $data['content_type'],
            'filenames' => json_encode($data['filenames'])
        ]);

        $banner->save();

        $message = "Banner berhasil diupload";

        return redirect(route('admin.banner.index'))->with('message', $message);

        // dd($data);
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Banner  $banner
     * @return \Illuminate\Http\Response
     */
    public function show(Banner $banner)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Banner  $banner
     * @return \Illuminate\Http\Response
     */
    public function edit(Banner $banner)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Banner  $banner
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Banner $banner)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Banner  $banner
     * @return \Illuminate\Http\Response
     */
    public function destroy(Banner $banner)
    {
        //
    }
}
