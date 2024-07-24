@forelse ($comments as $comment)
    <x-frontend.card_link title="Title : {{ $comment?->post->tilte }}" tag="a" class="h4" href="{{ route('post.single',$comment?->post->slug ) }}">

        {{--  profile comment action  --}}
            @include('profile.comment.partials.vote_action')
        {{--  end profile comment action  --}}

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

