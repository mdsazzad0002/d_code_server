@forelse ($posts as $post)
<x-frontend.card_link title="Questions : {{ $post?->tilte }}" tag="a" class="h4" href="{{ route('post.single',$post->slug ) }}">
    {!! Str::markdown($post->short_details)!!}
    <div class="mt-5">
            <button type="button" class="btn btn-primary form markdown"
    data-toggle="modal"
    data-target="#modal_setup"
    data-title="Post Edit"
    data-action="{{ route('user-post.post.update', $post->id) }}"
    data-socuce="{{ route('user-post.post.edit', $post->id ) }}"
    data-method="put"
    >
    <i class="fa fa-pencil-square-o" aria-hidden="true"></i> Edit
</button>

<button type="button" class="btn btn-primary view lg_view"
    data-toggle="modal"
    data-target="#modal_setup_view"
    data-title="View"
    data-socuce="{{ route('user-post.post.show', $post->id ) }}"
    data-method="get">
    <i class="fa fa-eye" aria-hidden="true"></i> View
</button>

<button type="button" class="btn btn-primary view lg_view"
    data-toggle="modal"
    data-target="#modal_setup_view"
    data-title="Comment - {{ $post->tilte }}"
    data-socuce="{{ route('user-post.post.comment', $post->id ) }}"
    data-method="get">
    <i class="fas fa-comment" aria-hidden="true"></i> Comments
</button>

    </div>

{{-- <button type="button" class="btn btn-danger delete"
data-target="#modal_setup_delete"
data-action="{{ route('user-post.post.destroy', $items->id) }}"
 data-method="delete"
>
  <i class="fa fa-trash"></i> Delete</button> --}}
</x-frontend.card_link>


    @empty

    {{-- if not found any post or question crate one for button --}}
        <x-frontend.card>
            <div class="text-center mt-2 ">
                Not found data Asked a Question or Write a Post?
            </div>

        </x-frontend.card>
        {{-- End if not found any post or question crate one for button --}}

@endforelse
@if($posts  instanceof \Illuminate\Pagination\LengthAwarePaginator)
{{ $posts->links()}}
@endif

<x-frontend.card>

    <div class="text-center mt-2 ">
        <!-- Button trigger modal -->
        <button type="button" class="btn btn-primary form markdown"
         data-toggle="modal"
         data-target="#modal_setup"
         data-title="Post Create"
         data-action="{{ route('user-post.post.store') }}"
         data-socuce="{{ route('user-post.post.create') }}"
         data-method="post"
         >
         <i class="fa fa-plus"></i> Add New</button>

    </div>
</x-frontend.card>
