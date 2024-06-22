@forelse ($votes as $vote)
{{-- {{ $vote }} --}}
    <x-frontend.card_link title="Title : {{ $vote?->post?->tilte }}" tag="a" class="h4" href="{{ route('post.single',$vote?->post->slug ) }}">
        {{-- {{ $vote?->comment?->comments }} --}}
        {!! Str::markdown($vote?->comment?->comments)!!}
        @if(auth()?->user()?->id == $user->id)


        <button class="btn btn-outline-primary {{ $vote?->upvote == 1 ? 'active' : '' }}" onclick="vote('upvote', {{ $vote->comment_id }}, {{ $vote->post_id }} )">
            <i class="fa fa-arrow-up" aria-hidden="true"> &nbsp;&nbsp;<span class="upvote{{ $vote->comment_id }}" >{{ $vote->comment->upvote }}</span></i> &nbsp;&nbsp;&nbsp;Upvote
        </button>

        <button  class="btn btn-outline-secondary {{ $vote?->downvote == 1 ? 'active' : '' }}" onclick="vote('downvote', {{ $vote->comment_id }}, {{ $vote->post_id }})">
            <i class="fa fa-arrow-down" aria-hidden="true">&nbsp;&nbsp;<span class="downvote{{ $vote->comment_id }}">{{ $vote->comment->downvote }}</span></i>&nbsp;&nbsp;&nbsp; Downvote
        </button>
        @else
            <div>
                <button class="btn btn-outline-primary {{ $vote?->upvote == 1 ? 'active' : '' }}" >
                    <i class="fa fa-arrow-up" aria-hidden="true"> &nbsp;&nbsp;<span class="upvote{{ $vote->comment_id }}" >{{ $vote->comment->upvote }}</span></i> &nbsp;&nbsp;&nbsp;Upvote
                </button>

                <button  class="btn btn-outline-secondary {{ $vote?->downvote == 1 ? 'active' : '' }}">
                    <i class="fa fa-arrow-down" aria-hidden="true">&nbsp;&nbsp;<span class="downvote{{ $vote->comment_id }}">{{ $vote->comment->downvote }}</span></i>&nbsp;&nbsp;&nbsp; Downvote
                </button>
            </div>
        @endif
    </x-frontend.card_link>
@empty
<x-frontend.card>
    <div class="text-center mt-2">
        No Vote Found.
        <br>
        <hr>
        <a class="btn btn-primary" href="{{ route('home') }}"><i class="bi bi-box-arrow-up-right"></i>&nbsp;Visit Post</a>
    </div>
</x-frontend.card>
@endforelse

{{ $votes->links() }}

@include('common.paginated_ajax')

