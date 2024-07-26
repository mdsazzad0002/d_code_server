<!-- If you want to use the popup integration, -->
@if (general_setting('sandbox_status')=='on')
<x-backend.modal_donation></x-backend.modal_donation>



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
