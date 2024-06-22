<?php

namespace App\Http\Controllers\backend;
use App\Http\Controllers\Controller;
use App\Models\comment;
use App\Models\post;
use App\Models\subcategory;
use Carbon\Carbon;
use Illuminate\Support\Str;
use Illuminate\Http\Request;

class PostController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(Request $request)
    {
        $post_all = post::where('status', 1)->orderBy('id','DESC')->paginate(20);
        return view('backend.post.index', compact('post_all', 'request'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $subcategory = subcategory::where('status', 1)->select('id','name')->get();
        return view('backend.post.partials.create', compact('subcategory'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        // return $request;
        $request->validate(
            [
                'details'=> 'required',
                'title'=> 'required',
            ]
        );

        $post = new Post;
        $post->details = $request->details;
        $post->tilte = $request->title;
        $post->user_id = auth()->user()->id;
        $post->short_details = strip_tags($request->short_details);
        $post->subcategory_id = $request->subcategory;
        if(isset($request->upload_asset_image)){
            $post->uploads_id = uploads($request->file('upload_asset_image'));
        }
        $post->status = $request->status ?? 1;
        $post->short_details = $request->short_details.Carbon::now()->toDateTimeString() ?? Carbon::now()->toDateTimeString();
        $slug = Str::slug($request->title, '-');
        $post->slug = $slug ?? '';
        $post->save();
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
    public function comment_destroy( $id)
    {

        comment::find($id)->delete();

        // $post->delete();

        return back();

    }
}
