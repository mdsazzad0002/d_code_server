@extends('frontend.layouts.master')
@section('title', 'News Feed')


@section('content')
    @include('frontend.feed.create')
    @include('frontend.feed.post')
@stop







