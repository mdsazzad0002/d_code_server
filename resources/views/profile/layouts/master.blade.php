<!doctype html>
<html lang="en">
  <head>
    @include('frontend.layouts.partials.meta')
    <link rel="icon" href="{{general_setting('fav_logo')}}">

    @include('profile.layouts.css')
    <title>@yield('title') - {{ Str::title(general_setting('site_title'))}} </title>
  </head>
  <body>


    @include('profile.layouts.nav')

    {{--  view show   --}}
    @if(! Route::is('login') && !Route::is('register') && !Route::is('verify') && !Route::is('password.*') )
        @include('profile.layouts.inter_nav')
        @include('profile.layouts.footer')
    @else
    <div class="py-5">
        @yield('content')
    </div>
    @endif
    {{--  view show   --}}





{{--  footer copyright with text  --}}
    <div class="container">
        <hr>
        @include('common.footer')
        <hr>
    </div>
{{-- end footer copyright with text  --}}
<script>
    $("button.form").on('click', function(){
 create_form_modal_data(this)
});

</script>

  </body>
</html>






