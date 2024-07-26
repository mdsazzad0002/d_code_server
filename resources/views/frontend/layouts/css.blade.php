  <!-- Google Font: Source Sans Pro -->
  <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700&display=fallback">
  <!-- Font Awesome Icons -->
  <link rel="stylesheet" href="{{ static_asset('plugins/fontawesome-free/css/all.min.css')}}">
  <!-- overlayScrollbars -->
  <link rel="stylesheet" href="{{ static_asset('plugins/overlayScrollbars/css/OverlayScrollbars.min.css')}}">
  <!-- Theme style -->
  <link rel="stylesheet" href="{{ static_asset('frontend/css/adminlte.min.css') }}">
  <link rel="stylesheet" href="{{ static_asset('frontend/css/custom.min.css') }}">

  <style>
    img.lazy {
        background: #F1F1FA;
        width: 100%;
        height: 300px;
        display: block;
        margin: 0;
        border: 0;
        animation: opacity_fade 2.5s linear infinite;
    }
    @keyframes opacity_fade {
        50% {
            opacity: 0.5;
        }
        100% {
            opacity: 1;
        }
    }


</style>
