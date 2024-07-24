<?php

namespace App\Http\Controllers\profile;

use Carbon\Carbon;

use App\Models\post;
use App\Models\User;
use App\Models\Vote;
use App\Models\comment;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Http\Controllers\Controller;

class ViewProfileController extends Controller
{
    public function index($id){
        if($id != null && !empty($id)){
             $user = User::where('username', $id)->get()->first();
            if($user){

                 $date_range = Carbon::now()->subDay(30);
                 $date_today = Carbon::now();


                // vote report  profile dashboard
                 $vote_for_report = vote::whereBetween('updated_at', [$date_range, $date_today])
                                                ->where('user_id', $user->id)
                                                ->select(DB::raw('COUNT(*) AS votes_items'),'dd')
                                                ->groupBy('dd')
                                                ->pluck( 'votes_items','dd')
                                                ->toArray();

                 $vote_array_values = json_encode(array_values($vote_for_report));
                 $vote_array_key = json_encode(array_keys($vote_for_report));


                // post report  profile dashboard
                 $post_for_report = post::whereBetween('updated_at', [$date_range, $date_today])
                                                ->where('user_id', $user->id)
                                                ->select(DB::raw('COUNT(*) AS votes_items'),'dd')
                                                ->groupBy('dd')
                                                ->pluck( 'votes_items','dd')
                                                ->toArray();

                 $post_array_values = json_encode(array_values($post_for_report));
                 $post_array_key = json_encode(array_keys($post_for_report));

                // post report  profile dashboard
                 $comment_for_report = comment::whereBetween('updated_at', [$date_range, $date_today])
                                                ->where('user_id', $user->id)
                                                ->select(DB::raw('COUNT(*) AS votes_items'),'dd')
                                                ->groupBy('dd')
                                                ->pluck( 'votes_items','dd')
                                                ->toArray();

                 $comment_array_values = json_encode(array_values($comment_for_report));
                 $comment_array_key = json_encode(array_keys($comment_for_report));







                $posts = post::where('user_id', $user->id)->limit(3)->get();
                return view('profile.profile', compact('posts', 'user','vote_array_values', 'vote_array_key','post_array_key','post_array_values','comment_array_key','comment_array_values'));
            }else{
                return abort(403,'User Not found');
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
