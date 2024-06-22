@isset($tag) <{{ $tag }} @else <div @endisset
@isset($href) href="{{ $href }}" @endisset
@isset($style) style="{{ $style }}" @endisset
class="card @isset($class){{ $class }}@endisset">

    @isset($title) <h4 class="card-header"> {{ $title }} </h4> @endisset

    <div class="card-body">
        {{ $slot }}
    </div>

    @isset($footer) <div class="card-footer"> {{ $footer }}  </div> @endisset

@isset($tag) </{{ $tag }}>@else</div>@endisset
