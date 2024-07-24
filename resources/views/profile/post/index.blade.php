@extends('profile.layouts.master')
@section('title',"Post")
@section('content')

    <div id="paginated_content">
        @include('profile.post.partials.post')
    </div>

@endsection

@push('styles')
<style>

</style>
@endpush
