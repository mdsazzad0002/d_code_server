@if(!empty($where) && general_setting('system_showup')=='on')
    @if($where == 'sidebar_showup')

            @if(!empty(general_setting($where)))
                 {!! general_setting('sidebar_showup') !!}
            @endif

    @else
        <x-frontend.card>
            @if(!empty(general_setting($where)))
                {!! general_setting($where) !!}
            @endif
        </x-frontend-card>
    @endif
@endif
