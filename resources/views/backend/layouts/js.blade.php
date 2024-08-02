<script src="{{static_asset('backend/')}}/js/vendor/jquery-2.2.4.min.js"></script>
<!-- bootstrap 4 js -->
<script src="{{static_asset('backend/')}}/js/popper.min.js"></script>
<script src="{{static_asset('backend/')}}/js/bootstrap.min.js"></script>
<script src="{{static_asset('backend/')}}/js/owl.carousel.min.js"></script>
<script src="{{static_asset('backend/')}}/js/metisMenu.min.js"></script>
<script src="{{static_asset('backend/')}}/js/jquery.slimscroll.min.js"></script>
<script src="{{static_asset('backend/')}}/js/jquery.slicknav.min.js"></script>

<script src="{{static_asset('plugins/')}}/select2/js/select2.full.min.js"></script>
<script src="{{static_asset('plugins/')}}/sweetalert2/sweetalert2.all.min.js"></script>

<script src="{{static_asset('plugins/')}}/prism/prism.js"></script>
<!-- Start datatable js -->
<script src="{{static_asset('plugins/')}}/datatables/jquery.dataTables.js"></script>
<script src="{{static_asset('plugins/')}}/datatables/jquery.dataTables.min.js"></script>
<script src="{{static_asset('plugins/')}}/datatables/dataTables.bootstrap4.min.js"></script>

<!-- others plugins -->
<script src="{{static_asset('backend/')}}/js/plugins.js"></script>
<script src="{{static_asset('backend/')}}/js/scripts.js"></script>

<x-ajax_data_modal></x-ajax_data_modal>
@include('common.js')
@stack('scripts')

@if (session()->has('message'))
<div class="alert alert-success">
    {{ session('message') }}
</div>
@endif
