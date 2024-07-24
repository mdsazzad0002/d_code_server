{!! Str::markdown($vote?->comment?->comments ?? '')!!}

<hr>
<div class="mb-2 text-center">
        <div>
            Date: {{ $vote->updated_at->format('d-m-Y h:i:s A') }}
        </div>
    </div>

<div class="btn-group d-flex align-items justify-content-center flex-wrap">

    <button class="btn btn-outline-primary {{ $vote?->upvote == 1 ? 'active' : '' }}" onclick="vote('upvote', {{ $vote->comment_id }}, {{ $vote->post_id }} )">
        <i class="fa fa-arrow-up" aria-hidden="true"> &nbsp;&nbsp;<span class="upvote{{ $vote->comment_id }}">{{ $vote->comment->upvote }}</span></i> &nbsp;&nbsp;&nbsp;Upvote
    </button>

    <button class="btn btn-outline-secondary {{ $vote?->downvote == 1 ? 'active' : '' }}" onclick="vote('downvote', {{ $vote->comment_id }}, {{ $vote->post_id }})">
        <i class="fa fa-arrow-down" aria-hidden="true">&nbsp;&nbsp;<span class="downvote{{ $vote->comment_id }}">{{ $vote->comment->downvote }}</span></i>&nbsp;&nbsp;&nbsp; Downvote
    </button>
</div>
