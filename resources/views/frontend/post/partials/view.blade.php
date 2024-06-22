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

@if ($view_post)


<x-frontend.card>

    <div class="d-flex align-items-center justify-content-between mb-3">
        <a href="{{ $view_post?->users?->username != null ? route('user.index',$view_post?->users?->username) : '#' }}" class="d-flex align-items-center text-light" style="gap: 10px">
            <div>
                <img style="width: 60px; height:60px; border-radius:10%; object-fit:cover" src="{{dynamic_asset($view_post?->users?->uploads?->id)}}" alt="s">
            </div>
            <div>
                <div class="font-weight-bold" style="font-size: 18px">
                    {{Str::title($view_post?->users?->name ?? 'anonymous')}}
                </div>
                <div>
                    {{Str::title($view_post?->users?->tagline ?? 'Loading . . .')}}
                </div>
            </div>
        </a>
        <div class="d-flex justify-content-end flex-column" style="gap: 7px">
            <div>
                @if(date($view_post?->users?->created_at) > Carbon\Carbon::now())
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
    <div class="row flex-column flex-md-row">

        <div class="col-md-12">
            <img class="w-100" src="{{ dynamic_asset($view_post->uploads_id) }}" alt="">
            <br>

            <div class="mt-2">
                Last Updated: {{ $view_post->updated_at->format('d-M-Y h:s A') }}
            </div>
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


<x-frontend.card>
    <h3 class="d-flex flex-wrap align-items-end">Write a Associte Comment <div class="text-warning mb-1 ml-2 h6">Markdown Editor</div></h3>
    <form action="" id="post_details_editor">
        @csrf
        <input type="number" name="post_id" value="{{ $view_post->id }}" hidden>
        <textarea name="details" Placeholder="Details" id="details" class="form-control mb-2"  cols="30" rows="10"></textarea>
        <button type="submit" class="float-right btn btn-primary"><i class="fas fa-comment"></i> Comment Submit</button>
    </form>
</x-frontend.card>


<x-frontend.card>
    {{-- <x-subcategory_related></x-subcategory_related> --}}
        <h3 class="mb-3">View More Topics</h3>
        @php
        // dd($category);
        $catgory_list_footer = category_subcategory($category, 30);
        @endphp


        <div class="row">
            @if($catgory_list_footer!=null)

            @foreach ($catgory_list_footer as $items )
                <div class=" col-md-4 col-xl-3 mb-2 p-2 ">
                    <div class="card mb-0">
                        <div class="card-body">
                            <a href="{{ route('subcategory.index',[$category, $items->slug]) }}"
                                class=" text-black w-full">{{Str::title($items->name) }}</a>
                        </div>
                    </div>

                </div>

            @endforeach
            @endif
        </div>


    </x-frontend.card>






