
<div class="card @isset($class)
{{ $class }}
@endisset">
    @isset($title)
        @isset($tag)
            <{{ $tag }}
            @else
           <h4
            @endisset

            @isset($href)
                href="{{ $href }}"
            @endisset
         class="card-header">
            {{ $title }}

        @isset($tag)
        </{{ $tag }}>
        @else
        </h4>
        @endisset
    @endisset

    <div class="card-body">
        {{ $slot }}
    </div>

    @isset($footer)
        <div class="card-footer">
            {{ $footer }}
        </div>
    @endisset


</div>

