<?php

namespace App\Http\Controllers\profile;

use App\Http\Controllers\Controller;
use App\Models\post;
use App\Models\ProfileDetail;
use App\Models\SocialLink;
use App\Models\User;
use Illuminate\Http\Request;

class profileController extends Controller
{
    public function index() {
        $user = auth()->user();
        $posts = post::where('user_id', auth()->user()?->id)->limit(3)->orderBy('id','desc')->get();
        return view('profile.profile',compact('posts','user'));
    }


    public function profile_pic_change(Request $request){
        // return $request;


        if($request->file('image')){
            $user = User::find(auth()->user()->id);
            $user->upload_id = uploads($request->file('image'), $user->upload_id);
            $user->save();
        }
        return back();
    }

    public function basic_info_update(Request $request){
        // return $request;
        $request->validate([
            'name'=>'required',
            'username'=>'required',
            'tagline'=>'required',
        ]);

        $user = User::find(auth()->user()->id);
        if($user){
            $user->username = $request->username;
            $user->tagline = $request->tagline;
            $user->name = $request->name;
            $user->save();
        }
        return back();

    }

    public function username_check(Request $request){
        $username = user::where('username', $request->username)->whereNot('id', auth()->user()->id)->count();
        if($username== 0){
            return true;
        }else{
            return false;
        }

    }


    public function quick_link_update(Request $request){
        $request = $request->except(['_token']);

        foreach($request['icon'] as $key => $icon){
            if(isset($request['id'][$key])){
                $find = SocialLink::find($request['id'][$key]);
                if(!$find){
                    $find = new SocialLink;
                }
            }else{
                $find = new SocialLink;
            }
            $find->icon =$request['icon'][$key];
            $find->type =$request['type'][$key];
            $find->link =$request['url'][$key];
            $find->user_id = auth()?->user()?->id ?? 0;

            $find->save();
        }
        return back();

    }

    public function quick_link_delete(Request $request){
        if(auth()?->user()){
            $find_link = SocialLink::find($request->id);
            if( $find_link){
                if($find_link->user_id == auth()?->user()?->id){

                    $find_link->delete();
                    return true;
                }
                return false;
            }
            return false;
        }
        return false;
    }



    public function profile_details_edit(Request $request, $id){

        if(auth()->user() && $id){
            if(auth()->user()->username == $id){
                $profile_details = '';
                $user_id = $id;
                $profile_details = ProfileDetail::where('user_id', $id)->get()->first();
                return view('profile.profile_partials.details_edit', compact('profile_details','user_id'));

            }else{
                return 'Plaease try again';
            }
        }
    }
    public function profile_details_update(Request $request,$id){
        $request->validate([
            'details'=>'required',
        ]);

        // return $request->details;

        if(auth()->user() && auth()->user()->username == $id){

            $profile_details = ProfileDetail::where('user_id',auth()->user()->id)->get()->first();
            if($profile_details){

            }else{
                $profile_details = new ProfileDetail;
            }
            $profile_details->details = $request->details;
            $profile_details->user_id = auth()->user()->id;
            $profile_details->save();

            return back();
        }else{
            return 'Please try again';
        }
    }





}
