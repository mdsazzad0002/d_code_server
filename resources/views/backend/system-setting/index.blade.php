@extends('backend.layouts.master')
@section('title', 'Settings')

@section('content')
    @if($category == 1)
        @include('backend.system-setting.partials.system_setting_1');
    @elseif($category == 2)
        @include('backend.system-setting.partials.system_payment');
    @elseif($category == 3)
        @include('backend.system-setting.partials.ads');
    @endif
@endsection

