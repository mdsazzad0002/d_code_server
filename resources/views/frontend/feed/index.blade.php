@extends('frontend.layouts.master')

{{--  Require all for seo  --}}
@section('title', 'News Feed')
@section('short_description', 'Well organized and easy to understand Web building tutorials with lots of examples of how to use HTML, CSS, JavaScript, SQL, Python, PHP, Bootstrap, Java, XML and more.')
@section('og_image', static_asset('uploads/BANNER_DATA.jpg'))
@section('keywords', 'HTML, Python, CSS, SQL, JavaScript, How to, PHP, Java, C, C++, C#, jQuery, Bootstrap, Colors, W3.CSS, XML, MySQL, Icons, NodeJS, React, Graphics, Angular, R, AI, Git, Data Science, Code Game, Tutorials, Programming, Web Development, Training, Learning, Quiz, Exercises, Courses, Lessons, References, Examples, Learn to code, Source code, Demos, Tips, Website')



{{--  Require all for seo  --}}

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
