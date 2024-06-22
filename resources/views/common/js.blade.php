<script>
//       function vote(type, comments_id){
//        $.ajax({
//            type:'get',
//            url:'{{ route('comment.update') }}',
//            data:{
//                comment_id :comments_id,
//                type :type,
//            },

//            success:function(data){
//              $('.'+type+comments_id).html(data);
//            }
//        })
//    }

function vote(type, comments_id, post_id){
        $.ajax({
            type:'get',
            url:'{{ route('comment.update') }}',
            data:{
                comment_id :comments_id,
                type :type,
                post_id: post_id,
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

            //   if(type == 'upvote'){
            //     // $('.'+type+comments_id).parents('button').classList.remove('active');

            //   }else{
            //     $('.'+type+comments_id).parents('button').addClass("active");
            //   }

            }
        })
    }

</script>
