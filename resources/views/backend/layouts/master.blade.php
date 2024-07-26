<!doctype html>
<html class="no-js" lang="en">

<head>
    <title>@yield('title') - {{ Str::title(general_setting('site_title'))}} </title>

   @include('backend.layouts.meta')
   @include('backend.layouts.css')
</head>

<body>
    <!--[if lt IE 8]>
            <p class="browserupgrade">You are using an <strong>outdated</strong> browser. Please <a href="http://browsehappy.com/">upgrade your browser</a> to improve your experience.</p>
        <![endif]-->
    <!-- preloader area start -->
    {{-- <div id="preloader">
        <div class="loader"></div>
    </div> --}}
    <!-- preloader area end -->
    <!-- page container area start -->
    <div class="page-container">
        <!-- sidebar menu area start -->
      @include('backend.layouts.sidebar')
        <!-- sidebar menu area end -->
        <!-- main content area start -->
        <div class="main-content">
            <!-- header area start -->
        @include('backend.layouts.nav')
            <!-- header area end -->

            <!-- page title area end -->
            <div class="main-content-inner pt-3">
                @yield('content')
            </div>
        </div>
        <!-- main content area end -->
        <!-- footer area start-->
        <x-backend.modal_view></x-backend.modal_view>
        <x-modal></x-modal>
        <x-backend.modal_delete></x-backend.modal_delete>

       @include('backend.layouts.footer')
        <!-- footer area end-->
    </div>
    <!-- page container area end -->
    <!-- offset area start -->
    @include('backend.layouts.offset_area')
    <!-- offset area end -->
    <!-- jquery latest version -->

    @include('backend.layouts.js')
    <x-tostar></x-tostar>
</body>

</html>
