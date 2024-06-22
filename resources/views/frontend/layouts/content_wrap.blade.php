<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    @if(general_setting('system_showup') == 'on')
    <div class="content-header pb-0">
      <div class="container-fluid">
        <div class="row">
          <div class="col-sm-12">
            @component('components.frontend.ads', ['where'=>'top_showup'])@endcomponent
          </div><!-- /.col -->
        </div><!-- /.row -->
      </div><!-- /.container-fluid -->
    </div>
    @else
    <div class="pb-2"></div>
    @endif
    <!-- /.content-header -->

    <!-- Main content -->
    <section class="content">
      <div class="container-fluid">
          <x-frontend.search_modal></x-frontend.search_modal>
          <div class="card">
            <div class="card-body p-0">
                <div class="d-flex align-items-center justify-content-start">
                    <div class="card m-0 mr-3">
                        <div class="card-body">
                            <i class="fas fa-code font-weight-bold"></i>
                        </div>
                    </div>
                    <div class="h3 mb-0">
                       @yield('title')
                    </div>
                  </div>
            </div>
          </div>



        @yield('content')
      </div><!--/. container-fluid -->
    </section>
    <!-- /.content -->

    @if(general_setting('system_showup')=='on')
    <div class="content-header pb-0">
        <div class="container-fluid">
          <div class="row">
            <div class="col-sm-12">
              @component('components.frontend.ads', ['where'=>'footer_showup'])@endcomponent
            </div><!-- /.col -->
          </div><!-- /.row -->
        </div><!-- /.container-fluid -->
      </div>
      @endif
      <!-- /.content-header -->
  </div>

