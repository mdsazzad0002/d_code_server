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
}
