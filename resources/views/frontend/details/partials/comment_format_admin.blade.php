@forelse ($comments as $comment)
<x-frontend.card>
    {!!  Str::markdown($comment->comments) !!}
    <div class="mt-2">
        <div class="d-flex align-items-center btn-group">
            <button class="btn btn-outline-primary" onclick="vote('upvote',{{ $comment->id }}, {{ $comment->post_id }} )">
                <i class="fa fa-arrow-up" aria-hidden="true"> &nbsp;&nbsp;<span class="upvote{{ $comment->id }}" >{{ $comment->upvote }}</span></i> &nbsp;&nbsp;&nbsp;Upvote
            </button>
            <button  class="btn btn-outline-secondary" onclick="vote('downvote', {{ $comment->id }}, {{ $comment->post_id }})">
                <i class="fa fa-arrow-down" aria-hidden="true">&nbsp;&nbsp;<span class="downvote{{ $comment->id }}">{{ $comment->downvote }}</span></i>&nbsp;&nbsp;&nbsp; Downvote
            </button>

            <button type="button" onclick="edit_data(this)" class="btn btn-primary form markdown"
                data-toggle="modal"
                data-target="#modal_setup"
                data-title="Edit Comment"
                data-action="{{ route('admin.post.comment_update', $comment->id) }}"
                data-socuce="{{ route('admin.post.comment_edit', $comment->id ) }}"
                data-method="put"
                >
                <i class="fa fa-pencil-square-o"  aria-hidden="true"></i> Edit
                            </button>
        <button type="button" onclick="delete_items_js(this)" class="btn btn-danger delete"
        data-target="#modal_setup_delete"
        data-action="{{ route('admin.post.comment_destroy', $comment->id) }}"
            data-method="delete"
        >
            <i class="fa fa-trash"></i> Delete</button>

        </div>
    </div>
</x-frontend.card>
@empty
    No Found Any Commnets
@endforelse

