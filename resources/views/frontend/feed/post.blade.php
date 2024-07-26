{{--  <img src="https://ik.imagekit.io/demo/img/image1.jpeg?tr=w-400,h-300" />
<img src="https://ik.imagekit.io/demo/img/image2.jpeg?tr=w-400,h-300" />
<img src="https://ik.imagekit.io/demo/img/image3.jpg?tr=w-400,h-300" />
<img class="lazy" data-src="https://ik.imagekit.io/demo/img/image4.jpeg?tr=w-400,h-300" />
<img class="lazy" data-src="https://ik.imagekit.io/demo/img/image5.jpeg?tr=w-400,h-300" />
<img class="lazy" data-src="https://ik.imagekit.io/demo/img/image6.jpeg?tr=w-400,h-300" />
<img class="lazy" data-src="https://ik.imagekit.io/demo/img/image7.jpeg?tr=w-400,h-300" />
<img class="lazy" data-src="https://ik.imagekit.io/demo/img/image8.jpeg?tr=w-400,h-300" />
<img class="lazy" data-src="https://ik.imagekit.io/demo/img/image9.jpeg?tr=w-400,h-300" />
<img class="lazy" data-src="https://ik.imagekit.io/demo/img/image10.jpeg?tr=w-400,h-300" />  --}}

 @foreach ($posts_data_format_feed as $view_post)
    <div class="shadow px-3 py-2 bg-dark mb-3">
        @include('frontend.summary.summery_view')
        <a  href="{{ route('post.single',$view_post->slug) }}">
             @include('frontend.details.partials.post_short_info')
             <span>See More</span>
        </a>
    </div>
@endforeach
