@forelse ($comments as $comment)
    <x-frontend.card_link title="Title : {{ $comment?->post->tilte }}" tag="a" class="h4" href="{{ route('post.single',$comment?->post->slug ) }}">
        {!! Str::markdown($comment->comments)!!}
        @if(auth()?->user()?->id == $user->id)


        <button class="btn btn-outline-primary {{ $comment?->vote?->upvote == 1 ? 'active' : '' }}" onclick="vote('upvote', {{ $comment->id }}, {{ $comment->post_id }} )">
            <i class="fa fa-arrow-up" aria-hidden="true"> &nbsp;&nbsp;<span class="upvote{{ $comment->id }}" >{{ $comment->upvote }}</span></i> &nbsp;&nbsp;&nbsp;Upvote
        </button>
        <button  class="btn btn-outline-secondary {{ $comment?->vote?->downvote == 1 ? 'active' : '' }}" onclick="vote('downvote', {{ $comment->id }}, {{ $comment->post_id }})">
            <i class="fa fa-arrow-down" aria-hidden="true">&nbsp;&nbsp;<span class="downvote{{ $comment->id }}">{{ $comment->downvote }}</span></i>&nbsp;&nbsp;&nbsp; Downvote
        </button>
        @endif
    </x-frontend.card_link>
@empty
<x-frontend.card_link>
    <div class="text-center mt-2">
        No Comment Found.
        <br>
        <hr>
        <a class="btn btn-primary" href="{{ route('home') }}">Visit Post</a>
    </div>
</x-frontend.card_link>
    @endforelse

{{ $comments->links() }}


@include('common.paginated_ajax')

