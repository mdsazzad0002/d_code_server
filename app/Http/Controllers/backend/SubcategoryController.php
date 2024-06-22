<?php

namespace App\Http\Controllers\backend;
use App\Http\Controllers\Controller;
use App\Models\category;
use App\Models\post;
use App\Models\subcategory;
use Illuminate\Http\Request;
use Illuminate\Support\Str;

class SubcategoryController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $subcategory = subcategory::paginate(20);
        return view('backend.category.subcategory.index', compact('subcategory'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $category = category::get();
        return view('backend.category.subcategory.create', compact('category'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'category'=> 'required',
            'name'=> 'required',
        ]);

        $slug = Str::slug($request->name, '-');
        $subcategory = subcategory::where('slug', $slug)->count();
        if($subcategory ==0){
            $subcategory = new subcategory;
            $subcategory->name = $request->name;
            $subcategory->slug = $slug;
            $subcategory->category_id = $request->category;
            $subcategory->description = $request->description;
            if($request->file('photo')){
                $subcategory->uploads_id = uploads($request->file('photo'));
            }
            $subcategory->save();
        }
        return redirect()->route('admin.subcategory.index');
    }

    /**
     * Display the specified resource.
     */
    public function show(subcategory $subcategory)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(subcategory $subcategory)
    {
        $category = category::get();
        return view('backend.category.subcategory.edit', compact('subcategory', 'category'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, subcategory $subcategory)
    {
        $request->validate([
            'category'=> 'required',
            'name'=> 'required',
        ]);

        $slug = Str::slug($request->name, '-');
        $subcategory_find = subcategory::where('slug', $slug)->count();
        if($subcategory_find <=1){
            // $subcategory = new subcategory;
            $subcategory->name = $request->name;
            $subcategory->slug = $slug;
            $subcategory->category_id = $request->category;
            $subcategory->description = $request->description;
            if($request->file('photo')){
                $subcategory->uploads_id = uploads($request->file('photo'), $subcategory->uploads_id);
            }
            $subcategory->save();
        }
        return redirect()->route('admin.subcategory.index');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(subcategory $subcategory)
    {

        $subcategory = post::where('subcategory_id', $subcategory->id)->count();
        if($subcategory != 0){
            toastr()->error('This Sub category under post', 'Oops!');
        }else{
            asset_unlink($subcategory->uploads_id);
            $subcategory->delete();
            toastr()->success('Successfully Deleted Sub Category!', 'Congrats');
        }
        return redirect()->route('admin.subcategory.index');

       
        

    }
}
