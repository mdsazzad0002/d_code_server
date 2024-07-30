@extends('profile.layouts.master')
@section('title',"Comments")
@section('short_description', 'Your Comments Contribution')
@section('og_image', dynamic_asset($user->uploads_id))
@section('keywords', $user->keywords)

@section('content')
<div id="paginated_content">
    @include('profile.comment.partials.comment')
</div>

@endsection

