<?php

namespace App\Http\Controllers\vendor;

use Carbon\Carbon;
use App\Models\post;
use App\Models\Vote;
use App\Models\comment;
use App\Models\category;
use App\Models\subcategory;
use Illuminate\Support\Str;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class postManageController extends Controller
{
    public function create(){
        $category = category::where('status', 1)->select('id','name')->get();
        return view('backend.post.partials.create', compact('category'));
    }

    public function store(Request $request)
    {
        // return $request;
        $request->validate(
            [
                'details'=> 'required',
                'title'=> 'required',
                'short_details'=> 'required',
                'subcategory'=> 'required',

            ]
        );

        //   return $request;
        $post = new post();
        $post->details = $request->details;
        $post->tilte = $request->title;
        if(auth()->user()){
            $user_id = auth()->user()->id;
            $post->user_id =  $user_id;
        }else{
            $post->user_id = 0;
        }
        $post->short_details = strip_tags($request->short_details);
        $post->subcategory_id = $request->subcategory;
        $post->category_id = $request->category;
        if(isset($request->upload_asset_image)){
            $post->uploads_id = uploads($request->file('upload_asset_image'));
        }
        $post->status = $request->status ?? 1;
        $post->short_details = $request->short_details;
        $post->dd = date('d');
        $post->mm =date('m');
        $post->yyyy = date('Y');
        $slug = Str::slug($request->title.Carbon::now()->toDateTimeString() ?? Carbon::now()->toDateTimeString(), '-');
        $post->slug = $slug ?? '';
$post->keywords= $request->keywords?? '';
        $post->save();

        if(auth()->user()){
            if(contribute_report_update(auth()->user()->id, 'post') == false){
                return 'something is wrong';
            }
        }

        toastr()->success('Successfully Post  or Question Created', 'Congrats');

        return back();

    }

    /**
     * Display the specified resource.
     */
    public function show(post $post)
    {
        return view('backend.post.partials.view', compact('post'));
    }

    public function comment($id)
    {
        $comments = comment::where('post_id', $id)->paginate(100);
        return view('profile.comment.partials.comment', compact('comments'));
    }



    /**
     * Show the form for editing the specified resource.
     */
    public function edit(post $post)
    {
        $category = category::where('status', 1)->select('id','name')->get();
        return view('backend.post.partials.edit', compact('post','category'));
    }


    public function comment_edit($id)
    {
        $comment = comment::find($id);
        return view('backend.post.partials.edit_comment', compact('comment'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, post $post)
    {
        // return $request;
        $request->validate(
            [
                'details'=> 'required',
                'title'=> 'required',
                'subcategory'=>'required'
            ]
        );

        $post->details = $request->details;
        $post->tilte = $request->title;
        $post->short_details = strip_tags($request->short_details);
        $post->subcategory_id = $request->subcategory;
        $post->category_id = $request->category;
        if(isset($request->upload_asset_image)){
            $post->uploads_id = uploads($request->file('upload_asset_image'), $post->upload_id);
        }

        $post->status = $request->status ?? 1;
        $post->short_details = $request->short_details ?? '';
        $post->save();
        return back();
    }

    public function comment_update(Request $request){
        $find_comment= comment::find($request->id);
        if($find_comment){
            $find_comment->comments = $request->details;
            $find_comment->save();
        }else{
            return 'somethisn  is wrong';
        }

        return back();
    }
    /**
     * Remove the specified resource from storage.
     */
    public function destroy($id, post $post)
    {
        $user_id = $post->user_id;

        Vote::where('post_id', $post->id)->delete();
        comment::where('post_id', $post->id)->delete();
        asset_unlink($post->uploads_id);
        $post->delete();

        if(contribute_report_update($user_id, 'post') == false){
            return 'something is wrong';
        }
        return back();

    }


}

