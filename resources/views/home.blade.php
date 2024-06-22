@extends('frontend.layouts.master')
@section('title', 'Powered By dengrweb.com helped by Tanvir Ahmmed')
@section('content')





  @include('frontend.home_section.hero')


<x-frontend.card>
  @include('frontend.home_section.search_bar')
</x-frontend.card>

@include('frontend.home_section.dashboard_home')
{{-- <x-frontend.card>
  @include('frontend.home_section.chart')
</x-frontend.card>

<x-frontend.card>
  @include('frontend.home_section.rating_view')
</x-frontend.card> --}}




@stop

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

@push('styles')
<meta name="description" content="WEB TECHNOLOGY FROM HTML, CSS, JAVASCRIPT, PHP LARAVEL, PYTHON ETC">

  <link rel="stylesheet" href="{{ static_asset('plugins/owlcarousel/assets/owl.carousel.css') }}?v={{ $asset_version }}"/>
@endpush



















