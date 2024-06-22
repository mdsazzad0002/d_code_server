@section('sidebar')
@foreach ($category_list as $items)
<li class="nav-item">
    <a href="{{ route('category.index', $items->slug) }}" class="nav-link @if($items->slug == $category_slug)
            active
        @endif">
        <i class="nav-icon fas fa-newspaper"></i>
        <p>
            {{Str::title($items->name)}}
        </p>
    </a>
</li>
@endforeach
@endsection



@php
$i = 1;
@endphp
@forelse ($subcategory as $items )
@php
$i++;
@endphp
@if(general_setting('system_showup')=='on')

@if($i%general_setting('post_center_showup_after') == 0)
@component('components.frontend.ads', ['where'=>'post_center_showup'])@endcomponent
@endif
@endif

@if($i % 2 == 0)
<x-frontend.card>
    <div class="row flex-column-reverse flex-md-row">
        <div class="col-md-6 d-flex align-items-start justify-content-center flex-column py-2">
            <h1 class="font-weight-bold d-none d-md-block">{{ Str::title($items->name) }}</h1>
            <div>
                {{ $items->description }}
            </div>
            <a class="btn btn-primary rounded-pill p-2 px-4 mt-2" href="{{ route('subcategory.index',  [$category_slug, $items->slug]) }}">See Example</a>
        </div>
        <div class="col-md-6">
            <h4 class="font-weight-bold d-md-none">{{ Str::title($items->name)}}</h4>
            <img class="w-100" src="{{ dynamic_asset($items->uploads_id) }}" alt="">
        </div>
    </div>
</x-frontend.card>
@else
<x-frontend.card>
    <div class="row flex-column-reverse flex-md-row">
        <div class="col-md-6">
            <h4 class="font-weight-bold d-md-none">{{ Str::title($items->name) }}</h1>
                <img class="w-100" src="{{ dynamic_asset($items->id) }}" alt="">
        </div>

        <div class="col-md-6 d-flex align-items-start justify-content-center flex-column py-2">
            <h1 class="font-weight-bold d-none d-md-block">{{ Str::title($items->name) }}</h1>
            <div>
                {{ $items->description }}
            </div>
            <a class="btn btn-primary rounded-pill p-2 px-4 mt-2" href="{{ route('subcategory.index', [$category_slug, $items->slug]) }}">See Example</a>
        </div>

    </div>
</x-frontend.card>
@endif

@empty
<x-404></x-404>
@endforelse

{{ $subcategory->links() }}
