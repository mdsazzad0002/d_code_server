<?php

namespace App\Http\Controllers\frontend;

use App\Http\Controllers\Controller;
use App\Models\category;
use App\Models\post;
use App\Models\subcategory;
use Illuminate\Http\Request;

class SubcategoryController extends Controller
{
    public function index($slug, $subcategory)
    {
        $category = $slug;
        $sub_category_list = subcategory::where('status', 1)->select('name', 'slug')->get();
        $find_subcategory = subcategory::where('slug', $subcategory)->get()->first();
        if ($find_subcategory) {
            $posts = post::where('subcategory_id', $find_subcategory->id)->paginate(15);
            $category_list = category::where('status', 1)->get();
            return view('frontend.post.index', compact('posts', 'category', 'subcategory', 'sub_category_list', 'find_subcategory'));
        }
    }

    public function view($slug, $subcategory, $view_slug)
    {
        $category = $slug;
        $subcategory_id =  subcategory::where('slug', $subcategory)->get()->first();

        if ($subcategory_id) {
            $post_list_menu =  post::where('subcategory_id', $subcategory_id->id)->select('slug', 'tilte')->get();
        } else {
            return 'something is wrong';
        }

        $view_post = post::where('slug', $view_slug)->get()->first();

        if ($view_post) {
            return view('frontend.post.view', compact('view_post', 'category', 'subcategory', 'post_list_menu','subcategory_id'));
        } else {
            abort(404);
        }
    }

    public function single_items($slug)
    {

        $view_post = post::where('slug', $slug)->get()->first();
        if ($view_post) {
            $subcategory_id =  subcategory::where('id', $view_post->subcategory_id)->get()->first();
            if ($subcategory_id) {
                $post_list_menu =  post::where('subcategory_id', $subcategory_id->id)->select('slug', 'tilte')->get();
                $subcategory = $subcategory_id->slug;
                $category = Category::where('id', $subcategory_id->category_id)->get()->first();
                if ($category) {
                    $category = $category->slug;
                    return view('frontend.post.view', compact('view_post', 'category', 'subcategory', 'post_list_menu','subcategory_id'));
                } else {
                    return abort(403, 'Category Not found');
                }
            } else {
                return abort(403, 'Sub Category Not found');
            }
        } else {
            return 'Post Not found';
        }
     abort(404);
    }
}
