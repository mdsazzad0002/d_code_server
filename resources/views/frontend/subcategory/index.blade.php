@extends('frontend.layouts.master')
@section('title', $find_subcategory->name)

@section('content')
<div class="row">
    <div class="col-xl-8">
        @include('frontend.subcategory.partials.all_post')
    </div>
    <div class="col-xl-4">
        <x-footer_category></x-footer_category>
    </div>
</div>
@stop



















