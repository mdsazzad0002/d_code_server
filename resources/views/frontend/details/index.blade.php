@extends('frontend.layouts.master')

@section('title', Str::title($view_post->tilte))
@section('short_description', $view_post->short_details)
@section('og_image', dynamic_asset($view_post->uploads_id))
@section('keywords', $view_post->keywords)


@section('content')
<div class="row">
    <div class="col-xl-8">
        @include('frontend.details.partials.view')
    </div>
    <div class="col-xl-4">
        <div class="position_sticky_footer_side">
            <x-frontend.card title="View More Topics">
                    @php
                    // dd($category);
                    $catgory_list_footer = category_subcategory($category, 30);
                    @endphp


                    <div class="row">
                        @if($catgory_list_footer!=null)

                        @foreach ($catgory_list_footer as $items )
                            <div class=" col-md-4 col-xl-12 mb-2 p-2 ">
                                <div class="card mb-0">
                                    <div class="card-body">
                                        <a href="{{ route('subcategory.index',[$category, $items->slug]) }}"
                                            class=" text-black w-full">{{Str::title($items->name) }}</a>
                                    </div>
                                </div>

                            </div>

                        @endforeach
                        @endif
                    </div>


                </x-frontend.card>
            </div>
            <div class="position_sticky_footer_side">
                <x-footer_category></x-footer_category>
             </div>
    </div>
</div>



@stop




@push('scripts')

<script src="{{static_asset('plugins/')}}/markdown/simplemde.min.js"></script>
<script>
        var simplemde = new SimpleMDE({ element: $("#details")[0] });
</script>


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
<link rel="stylesheet" href="{{static_asset('plugins/')}}/markdown/simplemde.min.css"/>
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
@endpush
