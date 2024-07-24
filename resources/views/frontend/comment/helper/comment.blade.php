@include('frontend.summary.summery_view', ['view_post'=>$comment])

{!! Str::markdown($comment->comments) !!}

@if($comment?->vote != null)
    @php
        $vote_type_vote_upvote = $comment?->vote?->upvote;
        $vote_type_vote_downvote = $comment?->vote?->downvote;
    @endphp
@else
    @php
         $vote_type_vote_upvote = vote_cookie($comment->id) == 'upvote' ? 1 : 0;
         $vote_type_vote_downvote = vote_cookie($comment->id)  == 'downvote' ? 1 : 0;
    @endphp
@endif

<div class="mt-2">
    <div class="d-flex align-items-center btn-group">
        <button class="btn btn-outline-primary {{ $vote_type_vote_upvote == 1 ? 'active' : '' }}" onclick="vote('upvote', {{ $comment->id }}, {{ $comment->post_id }} )">
            <i class="fa fa-arrow-up" aria-hidden="true"> &nbsp;&nbsp;<span class="upvote{{ $comment->id }}">{{ $comment->upvote }}</span></i> &nbsp;&nbsp;&nbsp;Upvote
        </button>
        <button class="btn btn-outline-secondary {{ $vote_type_vote_downvote == 1  ? 'active' : '' }}" onclick="vote('downvote', {{ $comment->id }}, {{ $comment->post_id }})">
            <i class="fa fa-arrow-down" aria-hidden="true">&nbsp;&nbsp;<span class="downvote{{ $comment->id }}">{{ $comment->downvote }}</span></i>&nbsp;&nbsp;&nbsp; Downvote
        </button>
    </div>
</div>
