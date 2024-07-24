<?php

namespace App\Http\Controllers\profile;

use App\Http\Controllers\Controller;
use App\Models\comment;
use App\Models\Vote;
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

    public function comment_delete(Request $request, $id){
        // return $request;
        $comment = comment::find($id);
        if($comment){
            $comment_user_id = $comment->user_id;
            $vote = Vote::where('comment_id', $comment->id)->delete();
            if($vote){
                $comment->delete();
                if(contribute_report_update($comment_user_id, 'comment') == false){
                    return 'Something is wrong';
                }
                if(contribute_report_update($comment_user_id, 'vote') == false){
                    return 'Something is wrong';
                }
            }


        }

        return back();

    }
}
