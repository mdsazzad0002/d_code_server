<?php

namespace App\Http\Controllers;

use App\Models\comment;
use App\Models\post;
use App\Models\User;
use App\Models\Vote;
use Illuminate\Http\Request;

class ViewProfileController extends Controller
{
    public function index($id){
        if($id != null && !empty($id)){
             $user = User::where('username', $id)->get()->first();
            if($user){
                $posts = post::where('user_id', $user->id)->limit(3)->get();
                return view('profile.profile', compact('posts', 'user'));
            }else{
                return abort(404,'Page Not Found');
            }
        }else{
            return abort(404,'Page Not Found');
        }

    }
    public function comment($id){
        if($id != null && !empty($id)){
             $user = User::where('username', $id)->get()->first();
            if($user){
                $comments = comment::where('user_id',  $user?->id)->paginate(30);
                return view('profile.comment.index', compact('comments','user'));

            }else{
                return abort(404,'Page Not Found');
            }
        }else{
            return abort(404,'Page Not Found');
        }

    }
    public function vote($id){
        if($id != null && !empty($id)){
             $user = User::where('username', $id)->get()->first();
            if($user){
                $votes = Vote::where('user_id', $user->id)->paginate(15);
                return view('profile.vote.index', compact('votes','user'));

            }else{
                return abort(404,'Page Not Found');
            }
        }else{
            return abort(404,'Page Not Found');
        }

    }
    public function post($id){
        if($id != null && !empty($id)){
             $user = User::where('username', $id)->get()->first();
            if($user){
                $posts = post::where('user_id', $user->id)->paginate(30);
                return view('profile.post.index', compact('posts','user'));

            }else{
                return abort(404,'Page Not Found');
            }
        }else{
            return abort(404,'Page Not Found');
        }

    }

}
