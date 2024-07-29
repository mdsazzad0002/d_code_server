 @foreach ($posts_data_format_feed as $view_post)
 <div class="col-12 col-xxl-6">
    <div class="shadow px-3 py-2 bg-dark mb-3 ">
        @include('frontend.summary.summery_view')
        <a  href="{{ route('post.single',$view_post->slug) }}">
            <h5 class="font-weight-bold text-success"> # {{ Str::title($view_post->tilte) }}</h5>
             @include('frontend.details.partials.post_short_info')

             <a href="{{ route('subcategory_by_id.index', [$view_post->subcategory->id, $view_post->subcategory->slug]) }}" class="btn btn-primary  progress-bar progress-bar-striped btn-block my-2">See More</a>
        </a>

    </div>
 </div>

@endforeach
