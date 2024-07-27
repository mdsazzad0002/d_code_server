<?php

namespace App\Http\Controllers\frontend;

use App\Models\post;
use App\Models\User;
use App\Models\Vote;
use App\Models\comment;
use App\Models\category;
use App\Models\subcategory;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Http\Controllers\Controller;

class FeedController extends Controller
{



     public function index()
    {
        $category = category::where('status', 1)->paginate(15);
        $contribute_data = User::withCount(['votes', 'comments', 'posts'])
            ->whereHas('votes', function ($query) {
                $query->where('user_id', '!=', 0);
            })
            ->oRwhereHas('comments', function ($query) {
                $query->where('user_id', '!=', 0);
            })
            ->oRwhereHas('posts', function ($query) {
                $query->where('user_id', '!=', 0);
            })
            ->orderBy('posts_count', 'desc')
            ->orderBy('comments_count', 'desc')
            ->orderBy('votes_count', 'desc')
            ->get();




        return view('frontend.feed.index', compact('category', 'contribute_data'));
    }

    public function feed_load(){
        $posts_data_format_feed    = post::inRandomOrder()->limit(6)->get();
        return view('frontend.feed.post', compact('posts_data_format_feed'));
    }
}
