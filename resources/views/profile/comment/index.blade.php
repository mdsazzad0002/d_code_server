@extends('profile.layouts.master')
@section('title',"Comments")

@section('content')
<div id="paginated_content">
    @include('profile.comment.partials.comment')
</div>

@endsection

