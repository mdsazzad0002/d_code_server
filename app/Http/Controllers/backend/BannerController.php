<?php

namespace App\Http\Controllers\backend;
use App\Http\Controllers\Controller;

use App\Models\Banner;
use Illuminate\Http\Request;

class BannerController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $banner = banner::paginate(15);
        return view('backend.banner.index', compact('banner'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
       return view('backend.banner.partials.create');

    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'banner'=>'required',
            'url'=>'required'
        ]);

        $banner = new Banner;
        if($request->banner){
            $banner->uploads_id = uploads($request->file('banner'));
        }
        $banner->url = $request->url;
        $banner->status = $request->status ?? 1;
        $banner->save();
        toastr()->success('Successfully Created Banner!', 'Congrats');
        return back();
    }

    /**
     * Display the specified resource.
     */
    public function show(Banner $banner)
    {
        return abort('404', 'Page Not Found');
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Banner $banner)
    {
        return view('backend.banner.partials.edit', compact('banner'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Banner $banner)
    {
        $request->validate([
            'banner'=>'required',
            'url'=>'required'
        ]);
        if($request->banner){
            $banner->uploads_id = uploads($request->file('banner'), $banner->id);
        }
        $banner->url = $request->url;
        $banner->status = $request->status ?? 1;
        $banner->save();
        toastr()->success('Successfully Updated Banner!', 'Congrats');
        return back();
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Banner $banner)
    {
        if(asset_unlink($banner->uploads_id)){
            $banner->delete();
        }
        toastr()->success('Successfully Deleted!', 'Congrats');
        return back();
    }
}
