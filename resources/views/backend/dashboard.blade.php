@extends('backend.layouts.master')
@section('title', 'Dashboard')
@section('content')
<div class="row">
    <div class="col-md-4 col-lg-3 col-sm-6">
        <x-frontend.card footer="Total Post" class="border text-center mb-3">
           <h1>
               {{ $post }}
            </h1>
        </x-frontend.card>
    </div>
    <div class="col-md-4 col-lg-3 col-sm-6">
        <x-frontend.card footer="Comments" class="border text-center mb-3">
           <h1>
               {{ $comments }}
            </h1>
        </x-frontend.card>
    </div>
    <div class="col-md-4 col-lg-3 col-sm-6">
        <x-frontend.card footer="Sub Category" class="border text-center mb-3">
           <h1>
               {{ $subcategory }}
            </h1>
        </x-frontend.card>
    </div>
    <div class="col-md-4 col-lg-3 col-sm-6">
        <x-frontend.card footer="Category" class="border text-center mb-3">
           <h1>
               {{ $category }}
            </h1>
        </x-frontend.card>
    </div>
    <div class="col-md-4 col-lg-3 col-sm-6">
        <x-frontend.card footer="Donations" class="border text-center mb-3">
           <h1>
               {{ $payment }}
            </h1>
        </x-frontend.card>
    </div>
    <div class="col-md-4 col-lg-3 col-sm-6">
        <x-frontend.card footer="Banner" class="border text-center mb-3">
           <h1>
               {{ $banner }}
            </h1>
        </x-frontend.card>
    </div>
    <div class="col-md-4 col-lg-3 col-sm-6">
        <x-frontend.card footer="Admin" class="border text-center mb-3">
           <h1>
               {{ $admin }}
            </h1>
        </x-frontend.card>
    </div>
    <div class="col-md-4 col-lg-3 col-sm-6">
        <x-frontend.card footer="Uploaded" class="border text-center mb-3">
           <h1>
               {{ $uploads }}
            </h1>
        </x-frontend.card>
    </div>

    <div class="col-md-4 col-lg-3 col-sm-6">
        <x-frontend.card footer="Donation Display" class="bg-light text-dark border text-center mb-3
        " tag="a" href="{{ route('admin.system-setting.index', 2) }}">
           <h1>
               {{ general_setting('sandbox_status') }}
            </h1>
        </x-frontend.card>
    </div>
    <div class="col-md-4 col-lg-3 col-sm-6">
        <x-frontend.card footer="ADS Display" class="bg-light text-dark border text-center mb-3" tag="a" href="{{ route('admin.system-setting.index', 3) }}">
           <h1>
               {{ general_setting('system_showup') }}
            </h1>
        </x-frontend.card>
    </div>

</div>

@endsection


