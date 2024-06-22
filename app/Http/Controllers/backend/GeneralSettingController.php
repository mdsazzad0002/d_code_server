<?php

namespace App\Http\Controllers\backend;

use App\Http\Controllers\Controller;
use App\Models\GeneralSetting;
use Illuminate\Http\Request;

class GeneralSettingController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index($category)
    {
        // return $category;
        $general_setting = GeneralSetting::where('category', $category)->pluck( 'title', 'key')->toArray();
        return view('backend.system-setting.index', compact('general_setting', 'category'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        toastr()->error('Permission Deneid', 'Congrats');
        return back();
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        toastr()->error('Permission Deneid', 'Congrats');
        return back();
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        toastr()->error('Permission Deneid', 'Congrats');
        return back();
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        toastr()->error('Permission Deneid', 'Congrats');
        return back();
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, $category)
    {
   $data_array =  $request->except('_token', '_method');

        foreach ($data_array as $key => $value) {
            if ($value != '' || $value != null) {

                 $find =  GeneralSetting::where('key', $key)->where('category', $category)->get()->first();

                if ($find !=null || $find != '' || $find != false) {
                    if (str_contains($key, 'logo')) {
                        $value = uploads($request->file($key), $find->title);
                        // dd($value);
                    }
                    $find->key = $key;
                    $find->title  = $value;
                    $find->category = $category;
                    $find->save();
                } else {

                    $find = new GeneralSetting;
                    if (str_contains($key, 'logo')) {
                        $value = uploads($request->file($key));
                    }
                    $find->key = $key;
                    $find->title  = $value;
                    $find->category = $category;
                    $find->save();
                    // return 876;
                }
            }
        }
        toastr()->success('Successfully Setting Updated!', 'Congrats');
        return back();
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        toastr()->error('Permission Deneid', 'Congrats');
        return back();
    }
}
