@extends('profile.layouts.master')
@section('title',"Vote")
@section('short_description', 'Your Vote Contribution')
@section('og_image', dynamic_asset($user->uploads_id))
@section('keywords', $user->keywords)

@section('content')
<div id="paginated_content">
    @include('profile.vote.partials.vote')
</div>

@endsection

@push('styles')
<style>

</style>
@endpush
