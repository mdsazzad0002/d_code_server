<?php

namespace App\Http\Controllers\backend;

use App\Http\Controllers\Controller;
use App\Models\Banner;
use App\Models\category;
use App\Models\comment;
use App\Models\post;
use App\Models\subcategory;
use App\Models\uploads;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class DashboardController extends Controller
{
    public function index() {
        $post= post::all()->count();
        $category = category::all()->count();
        $subcategory = subcategory::all()->count();
        $admin = User::all()->count();
        $banner = Banner::all()->count();
        $payment = DB::table('orders')->where('status', 'success')->sum('amount');
        $uploads = uploads::all()->count();
        $comments = comment::all()->count();

        return view('backend.dashboard', compact('post', 'category', 'subcategory','admin','banner','payment','uploads','comments'));
    }
}
