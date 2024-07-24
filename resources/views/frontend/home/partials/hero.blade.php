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


@push('styles')
    <link rel="stylesheet" href="{{ static_asset('plugins/owlcarousel/assets/owl.carousel.css') }}?v={{ $asset_version }}"/>
@endpush



@push('scripts')
  <script src="{{ static_asset('plugins/owlcarousel/owl.carousel.min.js') }}?v={{ $asset_version }}"></script>
  <script>
   $('.owl-carousel').owlCarousel({
        items:1,
        lazyLoad:true,
        loop:true,
        margin:10,
        autoplay:true,
        dots:false
    });
  </script>
@endpush


