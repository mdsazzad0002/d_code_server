<link rel="stylesheet" href="{{static_asset('plugins/')}}/toastr/toastr.min.css">
<script src="{{static_asset('plugins/')}}/toastr/toastr.min.js"></script>
<script>
    toastr.options = {
    "closeButton": false,
    "debug": false,
    "newestOnTop": false,
    "progressBar": true,
    "positionClass": "toast-top-right",
    "preventDuplicates": false,
    "onclick": null,
    "showDuration": "300",
    "hideDuration": "1000",
    "timeOut": "5000",
    "extendedTimeOut": "1000",
    "showEasing": "swing",
    "hideEasing": "linear",
    "showMethod": "fadeIn",
    "hideMethod": "fadeOut"
    }
</script>
@if(session('error'))
    <script>
        toastr["error"](`{{ session('error') }}`)
    </script>
@elseif(session('success'))
    <script>
        toastr["success"](`{{ session('success') }}`)
    </script>
@elseif(session('info'))
    <script>
        toastr["info"](`{{ session('info') }}`)
    </script>
@elseif(session('warning'))
    <script>
        toastr["warning"](`{{ session('info') }}`)
    </script>
@endif


@if ($errors->any())
    @foreach ($errors->all() as $error)
    <script>
        toastr["error"](`{{ $error }}`)
    </script>
    @endforeach
@endif

