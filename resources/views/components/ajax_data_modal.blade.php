<script>
    function edit_data(thi){
       var element_target = $(thi).data('target');
       $(element_target+' .modal-body').html('...');
       $(element_target+' .modal-title').html('...');
       $(element_target).attr('action','');
       $(element_target).attr('method','');

       var clicked_element = thi;

       var form_method_for = $(thi).data('method');

       $(element_target).attr('action', $(thi).data('action'));
       $(element_target+' .modal-title').html($(thi).data('title'));
       if(form_method_for=='get' || form_method_for=='GET'){
           $(element_target).attr('method', 'GET');
       }else{
           $(element_target).attr('method', 'POST');
       }


       if(form_method_for == 'post' || form_method_for == 'POST'){
           $.ajax({
               type:'get',
               url: '{{ url('/post_method_set') }}',
               success:function(data){
                   $(element_target+' .modal-body').html(data);
                   dialox_content_load(clicked_element);
               }
           })
       }else if(form_method_for == 'put' || form_method_for == 'PUT'){
           $.ajax({
               type:'get',
               url: '{{ url('/put_method_set') }}',
               success:function(data){
                   $(element_target+' .modal-body').html(data);
                   dialox_content_load(clicked_element);
               }
           })
       }
   }


     function dialox_content_load(thi){
       if(element_target){
           element_target = $(thi).data('target');
       }else{
           var element_target = $(thi).data('target');
       }
       $.ajax({
           type:'get',
           url: $(thi).data('socuce'),
           success:function(data){
               $(element_target+' .modal-body').append(data);


               if($(thi).hasClass('markdown')){
                   $(element_target+' .modal-dialog').addClass('modal-lg');
                   setTimeout(() => {
                       var simplemde = new SimpleMDE({ element: $("#details")[0] });

                   }, 500);

                   $('#category_select').on('change', function(){
                    $.ajax({
                        type:'get',
                        url:"{{ url('category_by_subcategory') }}/"+this.value,
                        success:function(data_lists){
                            $('#subcategory_list').html('');
                            $('#subcategory_list').select2({
                                data: data_lists,
                                dropdownParent: $(element_target)
                            }
                            );

                        }
                    })

                   })
               }else{
                   $(element_target+' .modal-dialog').removeClass('modal-lg');
               }

               $('.select2').select2({
                   dropdownParent: $(element_target),
                   // containerCssClass: 'form-control'
               });

           }
       });
   }



  function delete_items_js(thi){

           var element = thi;
           var element_target = $(element).data('target');
           $(element_target).attr('action', $(element).data('action'));
           $(element_target).attr('method', 'POST');
           var form_method_for = $(element).data('method');
               if(form_method_for == 'delete' || form_method_for == 'DELETE'){
               $.ajax({
                   type:'get',
                   url: '{{ url('/delete_method_set') }}',
                   success:function(data){
                       $(element_target+' .modal-body').html(data);
                       // dialox_content_load(clicked_element);
                   }
               })
           }

     swal({
         title: "Are you sure?",
         text: "You will not be able to recover this items!",
         icon: "warning",
         buttons: [
           'No, cancel it!',
           'Yes, I am sure!'
         ],
         dangerMode: true,
       }).then(function(isConfirm) {
         if (isConfirm) {
           // swal({
           //   title: 'Deleted!',
           //   text: 'Candidates are successfully !',
           //   icon: 'success'
           // }).then(function() {
               $(element_target).submit();
           // });
         } else {
           swal("Cancelled", "Your ietms is safe", "error");
         }
       });

  }




    function create_form_modal_data(this_element){
        var clicked_element = this_element;


        var element_target = $(clicked_element).data('target');
        $(element_target+' .modal-body').html('...');
        $(element_target+' .modal-title').html('...');
        $(element_target).attr('action','');
        $(element_target).attr('method','');



        var form_method_for = $(clicked_element).data('method');

        $(element_target).attr('action', $(clicked_element).data('action'));
        $(element_target+' .modal-title').html($(clicked_element).data('title'));
        if(form_method_for=='get' || form_method_for=='GET'){
            $(element_target).attr('method', 'GET');
        }else{
            $(element_target).attr('method', 'POST');
        }


        if(form_method_for == 'post' || form_method_for == 'POST'){
            $.ajax({
                type:'get',
                url: '{{ url('/post_method_set') }}',
                success:function(data){
                    $(element_target+' .modal-body').html(data);
                    dialox_content_load(clicked_element);
                }
            })
        }else if(form_method_for == 'put' || form_method_for == 'PUT'){
            $.ajax({
                type:'get',
                url: '{{ url('/put_method_set') }}',
                success:function(data){
                    $(element_target+' .modal-body').html(data);
                    dialox_content_load(clicked_element);
                }
            })
        }
    }

    function  delete_modal_data(this_element){
        var element = this_element;
        var element_target = $(element).data('target');
        $(element_target).attr('action', $(element).data('action'));
        $(element_target).attr('method', 'POST');
        var form_method_for = $(element).data('method');
            if(form_method_for == 'delete' || form_method_for == 'DELETE'){
            $.ajax({
                type:'get',
                url: '{{ url('/delete_method_set') }}',
                success:function(data){
                    $(element_target+' .modal-body').html(data);
                    // dialox_content_load(clicked_element);
                }
            })
        }

        swal({
            title: "Are you sure?",
            text: "You will not be able to recover this items!",
            icon: "warning",
            buttons: [
                'No, cancel it!',
                'Yes, I am sure!'
            ],
            dangerMode: true,
            }).then(function(isConfirm) {
            if (isConfirm) {
                $(element_target).submit();
            } else {
                swal("Cancelled", "Your ietms is safe", "error");
            }
        });
    }

    function data_view_modal(element_data){
        var element_target = $(element_data).data('target');
        $(element_target+' .modal-body').html('...');
        $(element_target+' .modal-title').html('...');
        $(element_target+' .modal-title').html($(element_data).data('title'));

        var this_element = element_data;
        $.ajax({
            type:'get',
            url: $(element_data).data('socuce'),
            success:function(data){
                $(element_target+' .modal-body').html(data);
                if($(this_element).hasClass('lg_view')){
                        $(element_target+' .modal-dialog').addClass('modal-lg');
                        Prism.highlightAll();
                    }else{
                        $(element_target+' .modal-dialog').removeClass('modal-lg');
                    }

            }
        })
    }


   $(document).ready(function(){
       //delete
       $('a.copy').on('click', function(){
           var url = $(this).attr('title');
           navigator.clipboard.writeText(url).then(function() {
           // console.log('Async: Copying to clipboard was successful!');
               swal({
                   title: 'copied!',
                   text: 'Successfully Copied!',
                   icon: 'success'
               })
           }, function(err) {
               console.error('Async: Could not copy text: ', err);
               swal({
                   title: 'copied Failed! ',
                   text: 'Something is wrong',
                   icon: 'error'
               })
           })
       })


       $("button.delete").on('click', function(){
            delete_modal_data(this)
        });


       //view
       $("button.view").on('click', function(){
        data_view_modal(this)
       })




         //create edit



   });



</script>
