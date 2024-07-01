
@section('sidebar')
    @foreach ($sub_category_list as $items)
    <li class="nav-item">
        <a href="{{ route('subcategory.index',  [$category, $items->slug]) }}" class="nav-link
            @if($items->slug == $find_subcategory->slug)
                active
            @endif
            ">
            <i class="nav-icon fas fa-code"></i>
        <p>
        {{Str::title($items->name)}}
        </p>
        </a>
    </li>
    @endforeach
@endsection


@php
    $i =0 ;
@endphp
@forelse ($posts as $items )

@php
    $i++;
    $post_after = general_setting('post_center_showup_after') ?? false;
@endphp
@if( $post_after && $i %  $post_after == 0)
    @component('components.frontend.ads', ['where'=>'post_center_showup'])@endcomponent
@endif
<x-frontend.card>
    <div class="row flex-column flex-md-row">
        <div class="col-md-6">
            <h4 class="font-weight-bold d-md-none">{{ Str::title($items->tilte) }}</h4>
            <img class="w-100" src="{{ dynamic_asset($items->uploads_id) }}" alt="">
        </div>
        <div class="col-md-6 d-flex align-items-start justify-content-center flex-column py-2">
            <h1 class="font-weight-bold d-none d-md-block">{{ Str::title($items->tilte) }}</h1>
            <div>
            {{ $items->short_details }}
        </div>

        <div class="mt-2">
            Last Updated: {{ $items->updated_at->format('d-m-Y h:s:i A') }}
        </div>
            <a class="btn btn-primary rounded-pill p-2 px-4 mt-2" href="{{ route('post.index',[$category ,$subcategory, $items->slug]) }}">See Example</a>
        </div>

    </div>
</x-frontend.card>


@empty
    <x-404></x-404>
@endforelse

{{ $posts->links() }}
