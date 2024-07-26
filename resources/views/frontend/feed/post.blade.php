 @foreach ($posts_data_format_feed as $view_post)
 <div class="col-12 col-xxl-6">
    <div class="shadow px-3 py-2 bg-dark mb-3 ">
        @include('frontend.summary.summery_view')
        <a  href="{{ route('post.single',$view_post->slug) }}">
            <h3 class="font-weight-bold text-success"> # {{ Str::title($view_post->tilte) }}</h3>
             @include('frontend.details.partials.post_short_info')
            <span class="text-info">See More</span>
        </a>

    </div>
 </div>

@endforeach
