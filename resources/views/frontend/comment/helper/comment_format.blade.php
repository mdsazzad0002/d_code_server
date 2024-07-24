@php
    $i=0;
@endphp
@foreach ($comments as $comment)
    @php
        $i++;
        $ads_lavel= general_setting('post_center_showup_after') ?? 100;
    @endphp
    @if( $ads_lavel && $i% $ads_lavel == 0)
        @component('components.frontend.ads', ['where'=>'details_showup'])@endcomponent
    @endif

    <x-frontend.card>
        @include('frontend.comment.helper.comment')
    </x-frontend.card>

@endforeach
