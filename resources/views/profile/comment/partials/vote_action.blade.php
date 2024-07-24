{!! Str::markdown($comment->comments)!!}

<hr>
{{--  profile comment action  --}}
<div class="text-center ">
    <div class="mb-2">
        <div>
            Date: {{ $comment->created_at->format('d-m-Y h:i:s A') }}
        </div>
    </div>
    <div class="d-flex flex-wrap justify-content-center btn-group">
        <button class="btn btn-outline-primary {{ $comment?->vote?->upvote == 1 ? 'active' : '' }}" onclick="vote('upvote', {{ $comment->id }}, {{ $comment->post_id }} )">
            <i class="fa fa-arrow-up" aria-hidden="true"> &nbsp;&nbsp;<span class="upvote{{ $comment->id }}" >{{ $comment->upvote }}</span></i>Upvote
        </button>
        <button  class="btn btn-outline-secondary {{ $comment?->vote?->downvote == 1 ? 'active' : '' }}" onclick="vote('downvote', {{ $comment->id }}, {{ $comment->post_id }})">
            <i class="fa fa-arrow-down" aria-hidden="true">&nbsp;&nbsp;<span class="downvote{{ $comment->id }}">{{ $comment->downvote }}</span></i>Downvote
        </button>
        @if(auth()->user() && auth()->user()->id == $comment->user_id)
             <button  class="btn btn-outline-danger delete"   data-target="#modal_setup_delete"
                 data-action="{{ route('users.comment.delete', $comment->id) }}" data-method="delete">
                <i class="fa fa-trash" aria-hidden="true"></i>Delete
            </button>
        @endif
</div>
