@extends('profile.layouts.master')
@section('title',"Comments")

@section('content')
<div id="paginated_content">
    @include('profile.partials.comment')
</div>

@endsection

@push('styles')
<style>

</style>
@endpush
