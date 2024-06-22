<!DOCTYPE html>
<html lang="en">
<head>

    @include('frontend.layouts.meta')
    <title>@yield('title') - {{ Str::title(general_setting('site_title'))}} </title>
    @include('frontend.layouts.css')
    @stack('styles')

</head>
<body class="hold-transition dark-mode sidebar-mini layout-fixed layout-navbar-fixed layout-footer-fixed">
<div class="wrapper">
  <!-- Preloader -->
  {{-- <div class="preloader flex-column justify-content-center align-items-center">
    <img class="animation__wobble" src="dist/img/AdminLTELogo.png" alt="AdminLTELogo" height="60" width="60">
  </div> --}}

    <!-- Navbar -->
    @include('frontend.layouts.nav')
    <!-- /.navbar -->

    <!-- Main Sidebar Container -->
    @include('frontend.layouts.sidebar')

    <!-- Content Wrapper. Contains page content -->
    @include('frontend.layouts.content_wrap')
  <!-- /.content-wrapper -->

    @include('frontend.layouts.theme')
    <!-- Main Footer -->
    <x-backend.modal_donation></x-backend.modal_donation>



    @include('common.footer')
    </div>

    <!-- ./wrapper -->
    @include('frontend.layouts.js')
    <x-tostar></x-tostar>
    @stack('scripts')
</body>
</html>
