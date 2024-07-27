@section('sidebar')
    @foreach ($post_list_menu as $post_items)
    <li class="nav-item">
        <a href="{{ route('post.index',[$category, $subcategory, $post_items->slug]) }}" class="nav-link
            @if($post_items->slug == $view_post->slug)
                active
            @endif
            ">
            <i class="nav-icon fas fa-code"></i>
        <p>
        {{Str::title($post_items->tilte)}}
        </p>
        </a>
    </li>
    @endforeach
@endsection

<div class="post_details_extra_deasign">

@if ($view_post)


<x-frontend.card>


    @include('frontend.summary.summery_view')

    <div class="row flex-column flex-md-row">

        <div class="col-md-12">
            @include('frontend.details.partials.post_short_info')
            <div class="my-3">
                {!! Str::markdown($view_post->details) !!}
            </div>
        </div>

    </div>
</x-frontend.card>
@else
<x-404></x-404>
@endif

<div class="comment_list_current_post"></div>
<div class="comment_data"></div>

</div>

<x-frontend.card>
    <h3 class="d-flex flex-wrap align-items-end">Write a Associte Comment <div class="text-warning mb-1 ml-2 h6">Markdown Editor</div></h3>
    <form action="" id="post_details_editor">
        @csrf
        <input type="number" name="post_id" value="{{ $view_post->id }}" hidden>
        <textarea name="details" Placeholder="Details" id="details_comment" class="form-control mb-2"  cols="30" rows="10"></textarea>
        <button type="submit" class="float-right btn btn-primary"><i class="fas fa-comment"></i> Comment Submit</button>
    </form>
</x-frontend.card>







