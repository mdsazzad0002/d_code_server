<?php

namespace App\Http\Controllers\backend;
use App\Http\Controllers\Controller;
use App\Models\comment;
use App\Models\post;
use App\Models\subcategory;
use Carbon\Carbon;
use Illuminate\Support\Str;
use Illuminate\Http\Request;
use Yajra\DataTables\DataTables;

class PostController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(Request $request)
    {
        if($request->ajax()){

             $post_all = post::query();
            return DataTables::of($post_all)
                ->addColumn('action', function ($row) {
                    $action = '';
                    $action .= '<button type="button" class="btn btn-primary form markdown"
                                data-toggle="modal"
                                data-target="#modal_setup"
                                data-title="Post Edit"
                                data-action="'.route('user-post.post.update', $row->id) .'"
                                data-socuce="'. route('user-post.post.edit', $row->id ) .'"
                                data-method="put"
                                >
                                <i class="fa fa-pencil-square-o" aria-hidden="true"></i> Edit
                            </button>';

                            $action .='<button type="button" class="btn btn-primary view lg_view "
                                data-toggle="modal"
                                data-target="#modal_setup_view"
                                data-title="View"
                                data-socuce="'. route('admin.post.show', $row->id ) .'"
                                data-method="get">
                                <i class="fa fa-eye" aria-hidden="true"></i> View
                            </button>';

                             $action .= '<button type="button" class="btn btn-primary view lg_view"
                                data-toggle="modal"
                                data-target="#modal_setup_view"
                                data-title="Comment - '. $row->tilte .'"
                                data-socuce="'. route('admin.post.comment', $row->id ) .'"
                                data-method="get">
                                <i class="fas fa-comment" aria-hidden="true"></i> Comments
                            </button>';

                              $action .='<button type="button" class="btn btn-danger delete"
                            data-target="#modal_setup_delete"
                            data-action="'. route('admin.post.destroy', $row->id) .'"
                             data-method="delete"
                            >
                              <i class="fa fa-trash"></i> Delete</button>';
                    return $action;
                })
                ->addColumn('image', function ($row) {
                    return '<img src="' . dynamic_asset($row->uploads_id) . '"/>';
            })
            ->rawColumns(['image','action'])
            ->make(true);


        }
        return view('backend.post.index');
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return false;
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        return false;

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
        return view('frontend.details.partials.comment_format_admin', compact('comments'));
    }



    /**
     * Show the form for editing the specified resource.
     */
    public function edit(post $post)
    {
        return false;
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
        return false;
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
