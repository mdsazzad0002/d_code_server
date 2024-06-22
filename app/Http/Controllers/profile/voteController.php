<?php

namespace App\Http\Controllers\profile;

use App\Http\Controllers\Controller;
use App\Models\Vote;
use Illuminate\Http\Request;

class voteController extends Controller
{
    public function index(Request $request){

        $user = Auth()?->user();
        $votes = Vote::where('user_id', Auth()?->user()?->id)->paginate(15);
        if($request->page){

            return view('profile.vote.vote_partials', compact('votes', 'user'));
        }else{

            return view('profile.vote.index', compact('votes', 'user'));
        }
    }
}
