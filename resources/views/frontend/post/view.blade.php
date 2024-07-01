@extends('frontend.layouts.master')
@section('title', Str::title($view_post->tilte))
@section('content')





@include('frontend.post.partials.view')

<x-footer_category></x-footer_category>




@stop

@push('scripts')
<script src="{{ static_asset('plugins/owlcarousel/owl.carousel.min.js') }}?v={{ $asset_version }}"></script>
<script>
    $('.owl-carousel').owlCarousel({
        items:1,
        lazyLoad:true,
        loop:true,
        margin:10,
        autoplay:true,
        dots:false
    });



</script>
<link rel="stylesheet" href="{{static_asset('plugins/')}}/markdown/simplemde.min.css"/>

<script src="{{static_asset('plugins/')}}/markdown/simplemde.min.js"></script>
<script>
        var simplemde = new SimpleMDE({ element: $("#details")[0] });
</script>
<style>
    #post_details_editor:has(>.editor-toolbar.fullscreen){
        position: relative;
        z-index: 99999;
    }

    .editor-toolbar a{
        color: #fff !important;
    }
    .editor-toolbar a.active, .editor-toolbar a:hover{
        background: transparent !important;
    }
    .editor-toolbar.fullscreen{
        background: #616161;

    }
</style>

<script>
    $('#post_details_editor').on('submit', function(e){
        e.preventDefault();
        var formData = $('#post_details_editor').serialize();;
        $.ajax({
            type:'post',
            url:'{{ route('comment.post') }}',
            data:
                formData,

            success:function(data){
                {{--  console.log(data);  --}}
                toastr["success"](`Comments Added successfully`)
                $('.comment_data').append(data);
                Prism.highlightAll();
            }
        })
    })


    $(document).ready(function() {
        $.ajax({
            type:'get',
            url:'{{ route('comment.index') }}',
            data:{
                post_id :{{ $view_post->id }},
            },

            success:function(data){
                // console.log(data);
                $('.comment_list_current_post').append(data);
                Prism.highlightAll();
            }
        })
    });



</script>
@endpush

@push('styles')
<meta name="description" content="{{  $view_post->short_details}}">
<link rel="stylesheet"
    href="{{ static_asset('plugins/owlcarousel/assets/owl.carousel.css') }}?v={{ $asset_version }}" />
@endpush
