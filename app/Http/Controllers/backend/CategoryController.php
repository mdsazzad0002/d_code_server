<?php

namespace App\Http\Controllers\backend;
use App\Http\Controllers\Controller;
use App\Models\category;
use App\Models\subcategory;
use Illuminate\Http\Request;
use Illuminate\Support\Str;
use Illuminate\Support\Collection;
class CategoryController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $categorys = category::paginate(20);
        return view('backend.category.category.index', compact('categorys'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        // return false;
        return view('backend.category.category.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate(['name'=>'required']);
        $slug = Str::slug($request->name, '-');

        $category_find = Category::where('slug', $slug)->count();
        if($category_find == 0){
            $category = new category;
            $category->name = $request->name;
            $category->slug = $slug;
            $category->description = $request->description;
            if($request->file('photo')){
                $category->uploads_id = uploads($request->file('photo'));
            }
            $category->save();

            toastr()->success('Successfully Created Category!', 'Congrats');
        }else{
            toastr()->error('Oops! Category Already Exists!', 'Oops!');
        }

        return redirect()->route('admin.category.index');
    }

    /**
     * Display the specified resource.
     */
    public function show(category $category)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(category $category)
    {
        // return $category;
        return view('backend.category.category.edit', compact('category'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, category $category)
    {
        $request->validate(['name'=>'required']);

        $slug = Str::slug($request->name, '-');

        $category_find = Category::where('slug', $slug)->count();
        if($category_find <= 1){
            $category->update(
                [
                    $category->name = $request->name,
                    $category->description = $request->description,
                    $category->slug = $slug,

                ]
            );

            if($request->file('photo')){
                $category->uploads_id = uploads($request->file('photo'), $category->uploads_id);
                $category->save();
            }

            toastr()->success('Successfully Updated Category!', 'Congrats');
        }else{
            toastr()->error('Oops! Category Already Exists!', 'Oops!');
        }
        // return $category->id;
        return redirect()->route('admin.category.index');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(category $category)
    {
        $subcategory = subcategory::where('category_id', $category->id)->count();
        if($subcategory != 0){
            toastr()->error('This category under subcategory', 'Oops!');
        }else{
            asset_unlink($category->uploads_id);
            $category->delete();
            toastr()->success('Successfully Deleted Category!', 'Congrats');
        }
        return redirect()->route('admin.category.index');
    }
}
