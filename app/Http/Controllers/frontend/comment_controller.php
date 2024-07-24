<?php

namespace App\Http\Controllers\frontend;

use App\Models\Vote;
use App\Models\comment;
use Illuminate\Support\Str;
use Illuminate\Http\Request;
use App\Models\ContributeSummarye;
use Illuminate\Support\Facades\DB;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;

class comment_controller extends Controller
{
    public function index(Request $request){
        $request->validate(
            ['post_id' => 'required'],
        );

        $comments = comment::where('post_id', $request->post_id)->get();

        return view('frontend.comment.helper.comment_format', compact('comments'));
    }

    public function store(Request $request){
        $request->validate(
            ['details' => 'required'],
            ['post_id' => 'required'],
        );

        $comment = new comment();
        $comment->comments = $request->details;
        $comment->post_id = $request->post_id;
        $comment->dd = date('d');
        $comment->mm = date('m');
        $comment->yyyy = date('yyyy');

        $comment->user_id = Auth::user()?->id ?? 0;
        $comment->save();

        if(auth()->user()){
            if(contribute_report_update(auth()->user()->id, 'comment') == false){
                return 'Something is wrong';
            }
        }


        return view('frontend.comment.helper.comment_format_single', compact('comment'));


    }

    public function update(Request $request){


        $request->validate(
            ['comment_id' => 'required'],
            ['type' => 'required'],
        );

        $type_vote = $request->type;
        $comment = comment::find($request->comment_id);
        if($comment == null){
             return false;
        }


        if(auth()->user()){
            // when loged user
            $vote = Vote::where('user_id', auth()?->user()?->id)->where('comment_id', $request->comment_id)->get()->first();
            if($vote){
                if($vote->$type_vote == 1){
                    $vote->delete();
                    if($comment){
                        $comment->$type_vote =  $comment->$type_vote - 1;
                        $comment->save();
                    }

                }else{
                    $vote->upvote = 0;
                    $vote->downvote = 0;
                    $vote->$type_vote = 1;
                    $vote->save();

                    if($comment){
                        if($request->type == 'upvote'){
                            $comment->$type_vote =  $comment->$type_vote + 1;
                            $comment->downvote =  $comment->downvote - 1;

                        }else{
                            $comment->$type_vote =  $comment->$type_vote + 1;
                            $comment->upvote =  $comment->upvote - 1;
                        }
                    }
                    $comment->save();
                    // return true;
                }
            }else{
                $vote = new Vote;
                $vote->post_id = $request->post_id;
                $vote->upvote = 0;
                $vote->downvote = 0;
                $vote->dd = date('d');
                $vote->mm = date('m');
                $vote->yyyy = date('Y');
                $vote->$type_vote = 1;
                $vote->comment_id = $request->comment_id;
                $vote->user_id = auth()?->user()?->id ?? 0;
                $vote->save();

                // Commnet add upvote and downvote
                $comment->$type_vote =  $comment->$type_vote + 1;
                $comment->save();
            }

            if(contribute_report_update(auth()->user()->id, 'vote')==false){
                return 'Something is wrong';
            }
            // end loged user
        }else{
               // track by cookie vote systems



               // $cookie_array =array( $comment->id , $type_vote);
               if(isset($_COOKIE[$comment->id])){
                if($_COOKIE[$comment->id] == $type_vote){

                    setcookie($comment->id ,'');
                    $comment->$type_vote =  $comment->$type_vote - 1;

                }else if($_COOKIE[$comment->id] != $type_vote){


                    setcookie($comment->id , $type_vote);
                    if($type_vote == 'upvote'){
                        $comment->upvote =  $comment->upvote + 1;
                        $comment->downvote =  $comment->downvote - 1;
                    }
                    else if($type_vote == 'downvote'){
                        $comment->downvote =  $comment->downvote + 1;
                        $comment->upvote =  $comment->upvote - 1;
                    }
                    else{
                        $comment->$type_vote =  $comment->$type_vote + 1;
                        setcookie($comment->id , $type_vote);
                    }


                }
            }else{
                setcookie($comment->id , $type_vote);
                $comment->$type_vote =  $comment->$type_vote + 1;
            }

            $comment->save();

            // end vote cookie systems
        }


       return $comment;
    }



}
