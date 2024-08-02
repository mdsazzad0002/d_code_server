<?php

namespace App\Http\Controllers\backend;
use App\Models\category;
use App\Models\subcategory;
use Illuminate\Support\Str;
use Illuminate\Http\Request;
use Yajra\DataTables\DataTables;
use Illuminate\Support\Collection;
use App\Http\Controllers\Controller;

class CategoryController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(Request $request)
    {
        if($request->ajax()){
            $categorys = category::query();
            return DataTables::of($categorys)
                ->addColumn('action', function ($row) {
                    $action = '';

                    $action .= '<button type="button" class="btn btn-primary form" data-toggle="modal" data-target="#modal_setup"  data-title="Category Edit"  data-action="'. route('admin.category.update', $row->id) .'"   data-socuce="'. route('admin.category.edit', $row->id ) .'"  data-method="put" > <i class="fa fa-eye" aria-hidden="true"></i> Edit</button>  ';


                    $action .= '<button type="button" class="btn btn-danger delete"  data-target="#modal_setup_delete"  data-action="'. route('admin.category.destroy', $row->id) .'" data-method="delete" >  <i class="fa fa-trash"></i> Delete</button>';
                    return  $action;
            })
            ->addColumn('image', function ($row) {
                return '<img src="'.dynamic_asset($row->uploads_id).'" />';
            })
            ->rawColumns(['action', 'image'])
            ->make(true);
        }
        return view('backend.category.category.index');
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
            $category->keywords = $request->keywords;
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
        // return $request->all();
        $request->validate(['name'=>'required']);

        $slug = Str::slug($request->name, '-');

        $category_find = Category::where('slug', $slug)->count();
        if($category_find <= 1){
            $category->update(
                [
                    $category->name = $request->name,
                    $category->description = $request->description,
                    $category->slug = $slug,
                    $category->status = $request->status,
                    $category->keywords = $request->keywords,


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
