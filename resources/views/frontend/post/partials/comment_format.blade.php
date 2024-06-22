@php
    $i=0;
@endphp
@foreach ($comments as $comment)
@php
    $i++;
@endphp
@if($i%general_setting('post_center_showup_after') == 0)
    @component('components.frontend.ads', ['where'=>'post_center_showup'])@endcomponent
@endif
<x-frontend.card>
    <div class="d-flex align-items-center justify-content-between mb-3">
        <a href="{{ $comment?->users?->username != null ? route('user.index',$comment?->users?->username) : '#' }}" class="d-flex align-items-center  text-light" style="gap: 10px">
            <div>
                <img style="width: 60px; height:60px; border-radius:10%; object-fit:cover" src="{{dynamic_asset($comment?->users?->uploads?->id)}}" alt="s">
            </div>
            <div>
                <div class="font-weight-bold" style="font-size: 18px">
                    {{Str::title($comment?->users?->name ?? "Anonymous")}}
                </div>
                <div>
                    {{Str::title($comment?->users?->tagline ?? 'Loading . . .')}}
                </div>
            </div>
        </a>
        <div class="d-flex justify-content-end flex-column" style="gap: 7px">
            <div>
                @if(date($comment?->users?->created_at) > Carbon\Carbon::now())
                    New Users
                @else
                    Old Users
                @endif
            </div>
            <div style="font-size: 13px">
                <span class="px-2 py-1 bg-secondary rounded"><i class="fas fa-comment"></i> 50</span>
            </div>
        </div>
    </div>
{{-- {{ var_dump($comment?->vote) }} --}}
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

