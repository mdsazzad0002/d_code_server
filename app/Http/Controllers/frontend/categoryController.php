<?php

namespace App\Http\Controllers\frontend;

use App\Http\Controllers\Controller;
use App\Models\category;
use App\Models\subcategory;
use Illuminate\Http\Request;

class categoryController extends Controller
{
    public function index($slug) {
        $category_slug = $category =  $slug;
        $category = category::where('status', 1)->where('slug', $slug)->get()->first();
        // return $category;
        if($category){
            $category_id = $category['id'];
            $category_list = category::where('status', 1)->get();
            $subcategory = subcategory::where('category_id', $category_id )->where('status',1)->paginate(15);
            return view('frontend.category.index', compact('category','subcategory', 'category_slug','category_list'));
        }else{
            abort(404);
        }
    }



}
