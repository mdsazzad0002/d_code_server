
<!-- REQUIRED SCRIPTS -->
<!-- jQuery -->
<script src="{{ static_asset('plugins/jquery/jquery.min.js')}}"></script>
<!-- Bootstrap -->
<script src="{{ static_asset('plugins/bootstrap/js/bootstrap.bundle.min.js')}}"></script>
<!-- overlayScrollbars -->
<script src="{{ static_asset('plugins/overlayScrollbars/js/jquery.overlayScrollbars.min.js')}}"></script>
<!-- AdminLTE App -->
<script src="{{ static_asset('frontend/js/adminlte.js')}}"></script>

<!-- PAGE PLUGINS -->
<!-- jQuery Mapael -->
<script src="{{ static_asset('plugins/jquery-mousewheel/jquery.mousewheel.js')}}"></script>
<script src="{{ static_asset('plugins/raphael/raphael.min.js')}}"></script>
<script src="{{ static_asset('plugins/jquery-mapael/jquery.mapael.min.js')}}"></script>
<script src="{{ static_asset('plugins/jquery-mapael/maps/usa_states.min.js')}}"></script>
<!-- ChartJS -->
<script src="{{ static_asset('plugins/chart.js/Chart.min.js')}}"></script>

<!-- AdminLTE for demo purposes -->
<script src="{{ static_asset('frontend/js/demo.js')}}"></script>
<!-- AdminLTE dashboard demo (This is only for demo purposes) -->
<script src="{{ static_asset('frontend/dist/js/pages/dashboard2.js')}}"></script>

<link rel="stylesheet" href="{{static_asset('plugins/')}}/prism/prism.css">
<script src="{{static_asset('plugins/')}}/prism/prism.js"></script>


{{-- payment --}}


<!-- If you want to use the popup integration, -->
@if (general_setting('sandbox_status')=='on')

<script>
// $('#sslczPayBtn').click(function(){
    var obj = {};
    $("#modal_setup_donation :input").change(function() {
        obj.cus_name = $('#modal_setup_donation #name').val();
        obj.cus_phone = $('#modal_setup_donation  #phone').val();
        obj.cus_email = $('#modal_setup_donation  #email').val();
        obj.cus_addr1 = $('#modal_setup_donation  #address').val();
        obj.amount = $('#modal_setup_donation  #amount').val();
    });
    obj.cus_name = $('#modal_setup_donation #name').val();
    obj.cus_phone = $('#modal_setup_donation  #phone').val();
    obj.cus_email = $('#modal_setup_donation  #email').val();
    obj.cus_addr1 = $('#modal_setup_donation  #address').val();
    obj.amount = $('#modal_setup_donation  #amount').val();

    $('#sslczPayBtn').prop('postdata', obj);
// })


    (function (window, document) {
        var loader = function () {

            var script = document.createElement("script"), tag = document.getElementsByTagName("script")[0];
            @if (general_setting('sandbox_mode')=='on')
                script.src = "https://sandbox.sslcommerz.com/embed.min.js?" + Math.random().toString(36).substring(7); // USE THIS FOR SANDBOX
            @else
                script.src = "https://seamless-epay.sslcommerz.com/embed.min.js?" + Math.random().toString(36).substring(7); // USE THIS FOR LIVE
            @endif
            tag.parentNode.insertBefore(script, tag);
        };

        window.addEventListener ? window.addEventListener("load", loader, false) : window.attachEvent("onload", loader);
    })(window, document);


</script>

@endif

<script>


    // Function to vertically center the active link within its list item
function verticallyCenterActiveLink() {
  // Get all list items and active links
  var sidebar = document.querySelector('.sidebar .os-viewport-native-scrollbars-invisible');
    var activeLink = document.querySelector('#nav_left_sidebar a.active');

    if (activeLink && sidebar) {
      // Calculate the position of the active link relative to the sidebar
      var linkTop = activeLink.getBoundingClientRect().top - sidebar.getBoundingClientRect().top;
      var linkHeight = activeLink.offsetHeight;
      var containerHeight = sidebar.clientHeight;
      var scrollPosition = linkTop - (containerHeight / 2) + (linkHeight / 2);

      // Scroll the sidebar to center the active link
      sidebar.scrollTop = scrollPosition;
    }
    }

// Call the function when the page loads and whenever it's resized
$(document).ready(function() {
    window.onload = window.onresize = verticallyCenterActiveLink;
})

</script>




@include('common.js')


