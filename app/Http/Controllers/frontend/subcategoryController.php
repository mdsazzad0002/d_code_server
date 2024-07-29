<?php

namespace App\Http\Controllers\frontend;

use App\Models\post;
use App\Models\category;
use App\Models\subcategory;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class subcategoryController extends Controller
{



     public function index($slug, $subcategory)
    {
        $category = $slug;
        $sub_category_list = subcategory::where('status', 1)->select('name', 'slug')->get();
        $find_subcategory = subcategory::where('slug', $subcategory)->get()->first();
        if ($find_subcategory) {
            $posts = post::where('subcategory_id', $find_subcategory->id)->paginate(15);
            $category_list = category::where('status', 1)->get();
            return view('frontend.subcategory.index', compact('posts', 'category', 'subcategory', 'sub_category_list', 'find_subcategory'));
        }
    }
     public function index_subcategory($id, $slug)
    {

        // $category = $slug;
        $subcategory = $slug;
        $sub_category_list = subcategory::where('status', 1)->select('name', 'slug')->get();
        $find_subcategory = subcategory::where('slug', $slug)->where('id', $id)->get()->first();
        $category= category::find($find_subcategory->category_id)->slug;

        if ($find_subcategory) {
            $posts = post::where('subcategory_id', $find_subcategory->id)->paginate(15);
            $category_list = category::where('status', 1)->get();
            return view('frontend.subcategory.index', compact('posts', 'category', 'subcategory', 'sub_category_list', 'find_subcategory'));
        }
    }


    public function category_by_subcategory($category_id){
        return subcategory::where('category_id', $category_id)->where('status', 1)->select( 'name as text','id')->get();
    }
}
