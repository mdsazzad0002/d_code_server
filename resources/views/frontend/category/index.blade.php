@extends('frontend.layouts.master')
@section('title', Str::title($category->name))
@section('content')

@include('frontend.category.partials.subcategory_list')

@stop


















