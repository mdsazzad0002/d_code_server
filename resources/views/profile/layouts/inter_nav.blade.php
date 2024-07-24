<div class="container py-3">

    {{-- Profile Menu --}}
    @include('profile.layouts.partials.tab_menu')
    {{-- End Profile Menu --}}


    {{-- Content --}}
    <div class="row">


        {{-- Profile Sidebar --}}
        <div class="col-md-5 col-lg-4 col-xl-3">

            {{-- Profile Picture --}}
            @include('profile.layouts.partials.profile_picture')
            {{-- End Profile Picture --}}

            {{-- user Picture --}}
            @include('profile.layouts.partials.user_information')
            {{-- End user Picture --}}


            {{--  social information  --}}
            @include('profile.layouts.partials.social_information')
            {{-- end social information  --}}


            {{--  social information  --}}
            @include('profile.layouts.partials.report_user')
            {{-- end social information  --}}

        </div>
        {{-- End Profile Sidebar --}}


        {{-- Profile Content --}}
        <div class="col-md-7 col-lg-8 col-xl-9 pt-2">
            @yield('content')
        </div>
        {{-- End Profile Content --}}


    </div>
    {{-- End Content --}}
</div>
