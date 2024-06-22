<?php

namespace App\Http\Controllers\profile;

use App\Http\Controllers\Controller;
use App\Models\comment;
use Illuminate\Http\Request;

class commentController extends Controller
{
    public function index(Request $request){
        $user = auth()->user();
        $comments = comment::where('user_id', auth()?->user()?->id)->paginate(15);
        if($request->page){
            return view('profile.comment.comment_partials', compact('comments','user'));
        }else{
            return view('profile.comment.index', compact('comments','user'));

        }

    }
}
