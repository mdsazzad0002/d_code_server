<!-- Content Header (Page header) -->
@if(general_setting('system_showup') == 'on')
<div class="content-header pb-0">
  <div class="container-fluid">
    <div class="row">
      <div class="col-sm-12">
        @component('components.frontend.ads', ['where'=>'page_top_showup'])@endcomponent
      </div><!-- /.col -->
    </div><!-- /.row -->
  </div><!-- /.container-fluid -->
</div>
@else
<div class="pb-2"></div>
@endif
<!-- /.content-header -->
