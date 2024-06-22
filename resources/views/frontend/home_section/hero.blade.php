@if(count($banner) != 0)
<x-frontend.card>
<div class="owl-carousel owl-theme">
    @foreach ($banner as $items)
        <a href="{{ $items->url }}">
            <img class="owl-lazy" data-src="{{ dynamic_asset($items->uploads_id) }}" data-src-retina="{{ dynamic_asset($items->id) }}" alt="">
        </a>
    @endforeach
</div>
</x-frontend.card>
@endif
