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
