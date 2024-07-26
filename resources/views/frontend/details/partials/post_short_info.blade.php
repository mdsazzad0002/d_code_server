<img class="w-100 lazy" data-src="{{ dynamic_asset($view_post->uploads_id) }}" alt="">
<div>
    {{ $view_post->short_details }}
</div>

<div class="mt-2">
    Last Updated: {{ $view_post->updated_at->format('d-M-Y h:s A') }}
</div>
