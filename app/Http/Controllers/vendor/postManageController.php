<?php

namespace App\Http\Controllers\vendor;

use App\Http\Controllers\Controller;
use App\Models\comment;
use App\Models\post;
use Illuminate\Support\Str;
use App\Models\subcategory;
use Carbon\Carbon;
use Illuminate\Http\Request;

class postManageController extends Controller
{
    public function create(){
        $subcategory = subcategory::where('status', 1)->select('id','name')->get();
        return view('backend.post.partials.create', compact('subcategory'));
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
        $post->user_id = auth()?->user()?->id ?? 0;
        $post->short_details = strip_tags($request->short_details);
        $post->subcategory_id = $request->subcategory;
        if(isset($request->upload_asset_image)){
            $post->uploads_id = uploads($request->file('upload_asset_image'));
        }
        $post->status = $request->status ?? 1;
        $post->short_details = $request->short_details;
        $slug = Str::slug($request->title.Carbon::now()->toDateTimeString() ?? Carbon::now()->toDateTimeString(), '-');
        $post->slug = $slug ?? '';
        $post->save();
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
        $comments = comment::where('post_id', $id)->get();
        return view('frontend.post.partials.comment_format_admin', compact('comments'));
    }



    /**
     * Show the form for editing the specified resource.
     */
    public function edit(post $post)
    {
        $subcategory = subcategory::where('status', 1)->select('id','name')->get();
        return view('backend.post.partials.edit', compact('post','subcategory'));
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
        $post->user_id = auth()->user()->id;
        $post->short_details = strip_tags($request->short_details);
        $post->subcategory_id = $request->subcategory;
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
    public function destroy(post $post)
    {

        comment::where('post_id', $post->id)->delete();
        asset_unlink($post->uploads_id);
        $post->delete();

        return back();

    }

}
