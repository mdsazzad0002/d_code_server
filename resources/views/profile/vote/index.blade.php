@extends('profile.layouts.master')
@section('title',"Vote")

@section('content')
<div id="paginated_content">
    @include('profile.vote.vote_partials')
</div>

@endsection

@push('styles')
<style>

</style>
@endpush
