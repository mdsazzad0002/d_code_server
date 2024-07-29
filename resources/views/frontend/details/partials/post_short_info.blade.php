
<img class="w-100 lazy" data-src="{{ dynamic_asset($view_post->uploads_id) }}" alt="">
<div class="my-2">
    <a class="tag_data" href="{{ route('subcategory_by_id.index', [$view_post->subcategory->id, $view_post->subcategory->slug]) }}"><i class="fa-solid fa-tags"></i> {{$view_post->subcategory->name ?? '' }}</a>
    <a class="tag_data" href="{{ route('category.index', [@$view_post->category->slug]) }}"><i class="fa-solid fa-tags"></i> {{$view_post->category->name ?? '' }}</a>
</div>
<div class="line-climb-3">
    {{ $view_post->short_details }}
</div>


