@extends('profile.layouts.master')

@section('title',$user->name)
@section('short_description', $user->tagline)
@section('og_image', dynamic_asset($user->uploads_id))
@section('keywords', $user->keywords)
@section('content')


@section('content')
<x-card.card>

    @include('profile.layouts.partials.markdown_details')

    {!! $user->details?->details ? Str::markdown($user->details?->details): '🤣 '. $user->name .' ❤ Welcome to '.
    general_setting('site_title')!!}
</x-card.card>


<div id="paginated_content">
    @include('profile.post.partials.post')
</div>

@include('profile.profile_partials.post_report')
@include('profile.profile_partials.comment_report')
@include('profile.profile_partials.vote_report')
<script src="{{ static_asset('plugins/apexcharts/apexcharts.js') }}"></script>
@endsection



