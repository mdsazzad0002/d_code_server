<nav class="main-header navbar navbar-expand navbar-dark bg-dark">
    <!-- Left navbar links -->
    <div class="container">


    <ul class="navbar-nav ">
      <li class="nav-item">
        <a class="nav-link" data-widget="pushmenu" href="{{ route('home') }}" role="button"><img  style="height: 40px" src="{{ general_setting('site_logo')}}" alt=""></a>
      </li>
    </ul>

    <!-- Right navbar links -->
    <ul class="navbar-nav ml-auto">
      @include('common.login_&_registration')
    </ul>
</div>
</nav>


@include('common.modal_login_registration')
