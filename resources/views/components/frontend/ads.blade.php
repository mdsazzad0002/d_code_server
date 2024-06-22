@if(!empty($where) && general_setting('system_showup')=='on')
    @if($where != 'sidebar_showup')
        <x-frontend.card>
            @if(!empty(general_setting($where)))
                 {!! general_setting('top_showup') !!}
            @endif
        </x-frontend-card>
    @else
    <div class="my-2">
         @if(!empty(general_setting($where)))
            {!! general_setting('top_showup') !!}
        @endif
    </div>

    @endif
@endif
