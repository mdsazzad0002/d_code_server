<h3 class="mb-2">{{ Str::title($post->tilte) }}</h3>
<img src="{{ dynamic_asset($post->uploads_id) }}" class="w-100" alt="">
</br>
<p>{{ $post->short_details }}</p>

{!! Str::markdown($post->details) !!}
{{-- <br> --}}
{{-- {{ $post }} --}}
