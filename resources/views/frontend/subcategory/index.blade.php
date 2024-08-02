@extends('frontend.layouts.master')
@section('title', $find_subcategory->name)
@section('short_description', $find_subcategory->description)
@section('og_image', dynamic_asset($find_subcategory->uploads_id))
@section('keywords', $find_subcategory->keywords)

@section('content')
<div class="row">
    <div class="col-xl-8">
        @include('frontend.subcategory.partials.all_post')
    </div>
    <div class="col-xl-4">
        <div class="position_sticky_footer_side">
            <x-footer_category></x-footer_category>
        </div>
    </div>
</div>
@stop



















