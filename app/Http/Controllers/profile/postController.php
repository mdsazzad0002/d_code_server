<?php

namespace App\Http\Controllers\profile;

use App\Http\Controllers\Controller;
use App\Models\post;
use Illuminate\Http\Request;

class postController extends Controller
{
    public function index(){
        $user = Auth()->user();
        $posts = post::where('user_id', auth()->user()?->id)->paginate(30);
        return view('profile.post.index', compact('posts','user'));
    }



}
