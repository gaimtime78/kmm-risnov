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
        if ($request->get('status') != null) {
            $data['status'] = 1;
        } else {
            $data['status'] = 0;
        }
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
            'filenames' => json_encode($data['filenames']),
            'status' => $data['status']
        ]);

        $banner->save();

        $message = "Banner berhasil dibuat";

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
    public function edit($id)
    {
        $banner = Banner::find($id);
        return view('admin.banner.edit', compact('banner'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Banner  $banner
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $banner = Banner::find($id);

        $data['filenames'] = array();
        $data['content_type']  = $request->get('content_type');
        if ($request->get('status') != null) {
            $data['status'] = 1;
        } else {
            $data['status'] = 0;
        }
        $fileUpload = $request->file('content');
        $destination = public_path('banners/');
        if ($fileUpload) {
            $ordered_number = 1;
            foreach ($fileUpload as $item) {
                $filename = Carbon::now()->timestamp . '_' . $ordered_number . '.' . $item->getClientOriginalExtension();
                $data['filenames'][] = $filename;
                $item->move($destination, $filename);
                $ordered_number++;
            }

            $banner->update([
                'content_type' => $data['content_type'],
                'filenames' => json_encode($data['filenames']),
                'status' => $data['status']
            ]);

        } else {
            $banner->update([
                'content_type' => $data['content_type'],
                'status' => $data['status']
            ]);
        }

        $message = "Banner berhasil diupdate";

        return redirect(route('admin.banner.index'))->with('message', $message);

        // dd($data);

    }

    public function updateStatus(Request $request, $id)
    {
        $banner = Banner::find($id);
        $data['status'] = $request->get('status');
        $data['banner'] = Banner::where('status',1)->count();
        if ($data['status'] != null) {
            $banner->update([
                'status' => 0
            ]);
            $message = "Berhasil menonaktifkan banner";
            return redirect(route('admin.banner.index'))->with('message', $message);
        } else {
            if ($data['banner'] >= 1) {
                $message = "Mohon nonaktifkan banner lain";
                return redirect(route('admin.banner.index'))->with('message', $message);
            } else {
                $banner->update([
                    'status' => 1
                ]);
                $message = "Berhasil mengaktifkan banner";
                return redirect(route('admin.banner.index'))->with('message', $message);
            }
        }

        // dd($data);
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
