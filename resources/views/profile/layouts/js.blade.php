
<script src="{{static_asset('backend/')}}/js/vendor/jquery-2.2.4.min.js"></script>
<!-- bootstrap 4 js -->
<script src="{{static_asset('backend/')}}/js/popper.min.js"></script>
<script src="{{static_asset('backend/')}}/js/bootstrap.min.js"></script>
<script src="{{static_asset('plugins/')}}/sweetalert2/sweetalert2.all.min.js"></script>
<script src="{{static_asset('plugins/')}}/markdown/simplemde.min.js"></script>

<script src="{{static_asset('plugins/')}}/select2/js/select2.full.min.js"></script>
<script src="{{static_asset('plugins/')}}/prism/prism.js"></script>

<script>
    $('#profile_image').change(function(){
        $(this).parents('form#profile_pic_update').submit()
    })



    $('#username_check').parents('form#profile_edit').find('button[type="submit"]').prop('disabled', false);
    $('#username_check').on('keyup',function(){
// console.log(this);
    $('#username_check').parents('form#profile_edit').find('button[type="submit"]').prop('disabled', true);
            $.ajax({
                type:'get',
                url:"{{ route('users.username_check.index') }}",
                data: {
                    username: $('#username_check').val()
                },
                success:function(data){
                    if(data == 1){
                        $('#username_check').parents('form#profile_edit').find('button[type="submit"]').prop('disabled', false);
                    }else{
                        $('#username_check').parents('form#profile_edit').find('button[type="submit"]').prop('disabled', true);
                    }
                }
            })
        })



    function social_element_add(e){
        // e.preventDefault;
        $('form#quick_link_update_1212 .items').append(`<div required="" class="sub_items d-flex gap-2 mb-2">
                <input required=""  placeholder="icon class" type="text" class="form-control bg-dark text-white" name="icon[]">
                <input required="" placeholder="like facebook" type="text" class="form-control bg-dark text-white" name="type[]">
                <input required="" placeholder="url like https://dengrweb.com" type="url" class="form-control bg-dark text-white" name="url[]">
                <div class="subitems_cluse_btn" onclick="remove_parents(0, this)">
                    <i class="fa-solid fa-xmark"></i>
                </div>
            </div>`);
    }

    function remove_parents(id, thi){
        var items = thi;
        if(id != 0){
            $.ajax({
                type:'get',
                url: '{{ route('users.quick_link_delete.index') }}',
                data:{
                    'id':id
                },
               success: function (data) {
                    if(data==1){
                        $(items).parents('.sub_items').addClass('d-none');
                        $(items).parents('.sub_items').html('');
                    }
                }

            })
        }else{
            $(items).parents('.sub_items').addClass('d-none');
            $(items).parents('.sub_items').html('');
        }
    }


</script>

<script>
    Prism.highlightAll();
    function vote(type, comments_id, post_id){
        $.ajax({
            type:'get',
            url:'{{ route('comment.update') }}',
            data:{
                'comment_id' :comments_id,
                'post_id': post_id,
                'type' :type,
            },

            success:function(data){
              $('.upvote'+comments_id).html(data.upvote);
              $('.downvote'+comments_id).html(data.downvote);

                if($('.'+type+comments_id).parents('button.active').length){
                    $('.'+type+comments_id).parents('button').removeClass("active");
                }else{
                    $('.'+type+comments_id).parents('div.btn-group').find('button').removeClass('active');
                    $('.'+type+comments_id).parents('button').addClass("active");
                }

            }
        })
    }



</script>

@include('common.paginated_ajax')
@include('common.js')
@stack('script')


