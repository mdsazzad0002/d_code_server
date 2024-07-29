@section('sidebar')
@foreach ($category as $items)
<li class="nav-item">
    <a href="{{ route('category.index', $items->slug) }}" class="nav-link">
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
$ads_after_data = general_setting('post_center_showup_after') ?? 100;
$ads_enabled = general_setting('system_showup');
@endphp
<div class="row">
    @forelse ($category as $items )

    @php
    $i++;
    @endphp

    @if( $ads_enabled == 'on')
    @if($i% $ads_after_data== 0)
    <div class="col-12">
        @component('components.frontend.ads', ['where'=>'home_showup'])@endcomponent
    </div>
    @endif
    @endif


    <div class="col-lg-6">
        <x-frontend.card>
            <div class="d-flex align-items-center justify-content-between">
                <h4 class="font-weight-bold "># <span class="text-success">{{ Str::title($items->name) }}</span> </h4>
                <a href="{{ route('category.index', $items->slug) }}" class="text-white font-italic">
                    {{ $items->subcategory_items }} Subcategories
                </a>
            </div>
            <div>

                <img class="w-100" src="{{ dynamic_asset($items->uploads_id) }}" alt="">
                 <div class="line-climb-3">
                    {{ $items->description }}
                </div>
                <div class="text-center">

                    <a class="btn btn-sm ml-auto btn-primary btn-block p-2 px-4 mt-2 progress-bar progress-bar-striped" href="{{ route('category.index', $items->slug) }}">See Example</a>
                </div>
            </div>

        </x-frontend.card>
    </div>




    @empty
    <div class="col-12">
        <x-404></x-404>
    </div>
    @endforelse
</div>
{{ $category->links() }}
