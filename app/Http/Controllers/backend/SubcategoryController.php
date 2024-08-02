<?php

namespace App\Http\Controllers\backend;
use App\Models\post;
use App\Models\category;
use App\Models\subcategory;
use Illuminate\Support\Str;
use Illuminate\Http\Request;
use Yajra\DataTables\DataTables;
use App\Http\Controllers\Controller;

class SubcategoryController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(Request $request)
    {
        // return subcategory::all();
        if($request->ajax()){
            $categorys = subcategory::query();
            return DataTables::of($categorys)
                ->addColumn('action', function ($row) {
                    $action = '';

                    $action .= '<button type="button" class="btn btn-primary form" data-toggle="modal" data-target="#modal_setup"  data-title="Category Edit"  data-action="'. route('admin.category.update', $row->id) .'"   data-socuce="'. route('admin.subcategory.edit', $row->id ) .'"  data-method="put" > <i class="fa fa-eye" aria-hidden="true"></i> Edit</button>  ';


                    $action .= '<button type="button" class="btn btn-danger delete"  data-target="#modal_setup_delete"  data-action="'. route('admin.subcategory.destroy', $row->id) .'" data-method="delete" >  <i class="fa fa-trash"></i> Delete</button>';
                    return  $action;
            })
            // ->addColumn('category', function($row){
            //     return $row->
            // })
            ->addColumn('image', function ($row) {
                return '<img src="'.dynamic_asset($row->uploads_id).'" />';
            })
            ->rawColumns(['action', 'image'])
            ->make(true);
        }


        return view('backend.category.subcategory.index');
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
            $subcategory->keywords = $request->keywords;
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
            $subcategory->keywords = $request->keywords;
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
        // return $subcategory;
        $post = post::where('subcategory_id', $subcategory->id)->count();
        if($post != 0){
            toastr()->error('This Sub category under post '.  $post , 'Oops!');
        }else{
            if($subcategory != null){
                asset_unlink($subcategory->uploads_id);
                $subcategory->delete();
                toastr()->success('Successfully Deleted Sub Category!', 'Congrats');
            }else{
                toastr()->error('Something is wrong' , 'Oops!');

            }
        }
        return redirect()->route('admin.subcategory.index');




    }
}
