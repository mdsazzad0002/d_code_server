<!doctype html>
<html lang="en">
  <head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <link rel="icon" href="{{general_setting('fav_logo')}}">

    @include('profile.layouts.css')
    <title>@yield('title') - {{ Str::title(general_setting('site_title'))}} </title>
  </head>
  <body>
    @include('profile.layouts.nav')
    @if(! Route::is('login') && !Route::is('register') && !Route::is('verify') && !Route::is('password.*') )
        @include('profile.layouts.inter_nav')
        @include('profile.layouts.footer')
    @else
    <div class="py-5">

        @yield('content')
    </div>
    @endif


        <div class="container"><!-- Button trigger modal -->
            <hr>
            @include('common.footer')
            <hr>
        </div>


    <!-- Optional JavaScript -->
    <!-- jQuery first, then Popper.js, then Bootstrap JS -->
      <!-- footer area start-->
      <x-backend.modal_view></x-backend.modal_view>
      <x-backend.modal></x-backend.modal>
      <x-backend.modal_delete></x-backend.modal_delete>
      <x-tostar></x-tostar>
    @include('profile.layouts.js')
  </body>
</html>






