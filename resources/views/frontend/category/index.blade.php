@extends('frontend.layouts.master')

@section('title', Str::title($category->name))
@section('short_description', $category->description)
@section('og_image', dynamic_asset($category->upload_id))
@section('keywords', $category->keywords)

@section('content')

@include('frontend.category.partials.subcategory_list')

@stop


















