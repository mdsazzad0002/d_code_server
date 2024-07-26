<?php

namespace App\Http\Controllers\frontend;
use App\Models\category;
use App\Http\Controllers\Controller;
use App\Models\Banner;
use App\Models\post;
use Illuminate\Http\Request;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {

        $banner = Banner::where('status', 1)->get();
        $category = category::where('status', 1)->paginate(15);
        return view('frontend.home.index', compact('category', 'banner'));
    }


    public function get_data_search(Request $request){
        // return $request;
        if(isset($request->query_data)){
            return post::where('status', 1)
                    ->where('tilte','LIKE','%'. $request->query_data.'%')
                    ->orWhere('short_details' ,'LIKE','%'.$request->query_data.'%')
                    ->orWhere('details','LIKE','%'.$request->query_data.'%')
                    ->limit(15)
                    ->get();
        }else{
            return '';
        }
    }
}
