@php
    $i=0;
@endphp
@foreach ($comments as $comment)
@php
    $i++;
    $ads_lavel= general_setting('post_center_showup_after') ??false;
@endphp
@if(  $ads_lavel && $i%  $ads_lavel == 0)
    @component('components.frontend.ads', ['where'=>'post_center_showup'])@endcomponent
@endif
<x-frontend.card>

            @include('frontend.post.partials.summery_view', ['view_post'=>$comment])
      


    {!!  Str::markdown($comment->comments) !!}
    <div class="mt-2">
        <div class="d-flex align-items-center btn-group">
            <button class="btn btn-outline-primary {{ $comment?->vote?->upvote == 1 || vote_cookie($comment->id) =='upvote' ? 'active' : '' }}" onclick="vote('upvote', {{ $comment->id }}, {{ $comment->post_id }} )">
                <i class="fa fa-arrow-up" aria-hidden="true"> &nbsp;&nbsp;<span class="upvote{{ $comment->id }}" >{{ $comment->upvote }}</span></i> &nbsp;&nbsp;&nbsp;Upvote
            </button>
            <button  class="btn btn-outline-secondary {{ $comment?->vote?->downvote == 1 || vote_cookie($comment->id)== 'downvote'  ? 'active' : '' }}" onclick="vote('downvote', {{ $comment->id }}, {{ $comment->post_id }})">
                <i class="fa fa-arrow-down" aria-hidden="true">&nbsp;&nbsp;<span class="downvote{{ $comment->id }}">{{ $comment->downvote }}</span></i>&nbsp;&nbsp;&nbsp; Downvote
            </button>
        </div>
    </div>
</x-frontend.card>
@endforeach


