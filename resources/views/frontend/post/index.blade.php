@extends('frontend.layouts.master')
@section('title', Str::title($find_subcategory->name))

@section('content')


@include('frontend.post.partials.all_view')


<x-footer_category></x-footer_category>


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



















