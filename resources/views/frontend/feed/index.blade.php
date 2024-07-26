@extends('frontend.layouts.master')
@section('title', 'News Feed')
@section('sidebar')
@foreach ($category as $items)
<li class="nav-item">
    <a href="{{ route('category.index', $items->slug) }}" class="nav-link">
        <i class="nav-icon fas fa-newspaper"></i>
        <p>
            {{Str::title($items->name)}}
        </p>
    </a>
</li>
@endforeach
@endsection


@section('content')
@include('frontend.feed.create')

@include('frontend.feed.partials.today_top_contribute')




<div class="post_data_feed row">

</div>


@stop
@push('scripts')
<script>
    document.addEventListener("DOMContentLoaded", function() {
        let isRequestInProgress = false;
        let first_load_checkpoint = false;

        function data_load_feed_post() {


            if (!isRequestInProgress && (window.innerHeight + window.scrollY + 500) >= document.body.offsetHeight) {
                isRequestInProgress = true;

                const url = "{{ route('feed_load_data_post') }}"; //A local page
                const xhr = new XMLHttpRequest();

                xhr.onreadystatechange = () => {
                    if (xhr.readyState === 4) {
                        $('.post_data_feed').append(xhr.response);
                        isRequestInProgress = false; // Reset the flag after the request is complete
                        if(first_load_checkpoint==false){
                            first_load_checkpoint=true
                            lazyload();
                        }
                    }
                };

                xhr.open("GET", url, true);
                xhr.send("");
            }
        }

        data_load_feed_post();
        document.addEventListener("scroll", data_load_feed_post);
        window.addEventListener("resize", data_load_feed_post);
        window.addEventListener("orientationChange", data_load_feed_post);




    });

</script>
@endpush
