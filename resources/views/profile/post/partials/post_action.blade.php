<div class="btn-group float-right ml-2 mb-1">
    <button type="button" class="btn btn-secondary view lg_view" data-toggle="modal" data-target="#modal_setup_view" data-title="View" data-socuce="{{ route('user-post.post.show', $post->id ) }}" data-method="get">
        <i class="fa fa-eye" aria-hidden="true"></i> View
    </button>

    @if(auth()->user() && auth()->user()->id == $post->user_id)
    <button type="button" class="btn btn-secondary dropdown-toggle dropdown-toggle-split" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
        <span class="sr-only">Toggle Dropdown</span>
    </button>

    <div class="dropdown-menu dropdown-menu-right bg-dark">
        <button type="button" class="dropdown-item form markdown" data-toggle="modal" data-target="#modal_setup" data-title="Post Edit" data-action="{{ route('user-post.post.update', $post->id) }}" data-socuce="{{ route('user-post.post.edit', $post->id ) }}" data-method="put">
            <i class="fa fa-pencil-square-o" aria-hidden="true"></i> Edit</button>

        <button type="button" class="dropdown-item view lg_view" data-toggle="modal" data-target="#modal_setup_view" data-title="Comment - {{ $post->tilte }}" data-socuce="{{ route('user-post.post.comment', $post->id ) }}" data-method="get">
            <i class="fas fa-comment" aria-hidden="true"></i> Comments</button>
      

        <button type="button" class="dropdown-item bg-danger text-light delete"
                data-target="#modal_setup_delete"
                data-action="{{ route('users.post.delete', [auth()->user()->id, $post->id]) }}"
                data-method="delete"
        >
        <i class="fa fa-trash"></i> Delete</button>
    </div>
    @endif

</div>
