<nav class="main-header navbar navbar-expand navbar-dark">
    <!-- Left navbar links -->
    <ul class="navbar-nav">
        <li class="nav-item">
            <a class="nav-link" data-widget="pushmenu" href="#" role="button"><i class="fas fa-bars"></i></a>
        </li>


        <li class="nav-item d-none d-sm-inline-block">
            <a href="{{ route('home') }}" class="nav-link">Feed</a>
        </li>
        <li class="nav-item d-none d-sm-inline-block">
            <a href="{{ route('home.category') }}" class="nav-link">Category</a>
        </li>




    </ul>

    <!-- Right navbar links -->
    <ul class="navbar-nav ml-auto">


        <li class="nav-item">
            <a class="nav-link docSearch_byModel_own" data-toggle="modal" data-target="#docSearch_byModel_own">
                <i class="fas fa-search"></i>
            </a>
        </li>

        @if (general_setting('sandbox_status')=='on')
        <li class="nav-item">
            <a class="nav-link" href="#" data-toggle="modal" data-target="#modal_setup_donation" role="button">
                <i class="fa-solid fa-circle-dollar-to-slot"></i>
            </a>
        </li>
        @endif

        <li class="nav-item">
            <button type="button" class="btn btn-link text-light  form markdown" data-toggle="modal" data-target="#modal_setup" data-title="Post Create" data-action="{{ route('user-post.post.store') }}" data-socuce="{{ route('user-post.post.create') }}" data-method="post">
                <i class="fa fa-plus"></i> Post</button>
        </li>
        <li class="nav-item">
            <a class="nav-link" data-widget="fullscreen" href="#" role="button">
                <i class="fas fa-expand-arrows-alt"></i>
            </a>
        </li>
        <li class="nav-item">
            <a class="nav-link" hidden data-widget="control-sidebar" data-slide="true" href="#" role="button">
                <i class="fas fa-th-large"></i>
            </a>
        </li>
        @include('common.login_&_registration')
    </ul>
</nav>
@include('common.modal_login_registration')
