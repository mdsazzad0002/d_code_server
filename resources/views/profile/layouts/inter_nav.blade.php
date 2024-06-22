<div class="container py-3">
  {{-- Profile Menu --}}
    <ul class="nav nav-tabs">
        {{-- Overview Menu --}}
        <li class="nav-item">
          <a class="nav-link d-flex align-items-center gap-2
          @if(auth()?->user()?->id == $user->id)
                {{ Route::is('profile.index') ? 'active': '' }}"
                href="{{ route('profile.index') }}"
            @else
                {{ Route::is('user.index', $user->username) ? 'active': '' }}"
                href="{{ route('user.index', $user->username) }}"
            @endif

          >
            <svg fill="#eeb" aria-hidden="true" height="16" viewBox="0 0 16 16" version="1.1" width="16" data-view-component="true" class="octicon octicon-book UnderlineNav-octicon">
                <path d="M0 1.75A.75.75 0 0 1 .75 1h4.253c1.227 0 2.317.59 3 1.501A3.743 3.743 0 0 1 11.006 1h4.245a.75.75 0 0 1 .75.75v10.5a.75.75 0 0 1-.75.75h-4.507a2.25 2.25 0 0 0-1.591.659l-.622.621a.75.75 0 0 1-1.06 0l-.622-.621A2.25 2.25 0 0 0 5.258 13H.75a.75.75 0 0 1-.75-.75Zm7.251 10.324.004-5.073-.002-2.253A2.25 2.25 0 0 0 5.003 2.5H1.5v9h3.757a3.75 3.75 0 0 1 1.994.574ZM8.755 4.75l-.004 7.322a3.752 3.752 0 0 1 1.992-.572H14.5v-9h-3.495a2.25 2.25 0 0 0-2.25 2.25Z"></path>
            </svg>
            Overview
        </a>
        </li>
        {{-- End Overview Menu --}}

        {{-- Comment Menu --}}
        <li class="nav-item">
          <a class="nav-link
          @if(auth()?->user()?->id == $user->id)
            {{ Route::is('profile.comment.index') ? 'active': '' }}"
            href="{{ route('profile.comment.index') }}"
        @else
            {{ Route::is('user.comment', $user->username) ? 'active': '' }}"
             href="{{ route('user.comment', $user->username) }}"
          @endif

          ><i class="fa fa-comments"></i> Comment</a>
        </li>
        {{--End Comment Menu --}}


        {{-- Votes Menu --}}
        <li class="nav-item">
          <a class="nav-link
          @if(auth()?->user()?->id == $user->id)
            {{ Route::is('profile.vote.index') ? 'active': '' }}"
            href="{{ route('profile.vote.index') }}"
          @else
          {{ Route::is('user.vote', $user->username) ? 'active': '' }}"
           href="{{ route('user.vote', $user->username) }}"
        @endif
          ><i class="fa fa-id-card" aria-hidden="true"></i> Votes</a>
        </li>
        {{-- End Menu --}}

        {{-- Posts Menu --}}
        <li class="nav-item">
          <a class="nav-link
          @if(auth()?->user()?->id == $user?->id)
          {{ Route::is('profile.post.index') ? 'active': '' }}"
           href="{{ route('profile.post.index') }}"
           @else
           {{ Route::is('user.post', $user->username) ? 'active': '' }}"
           href="{{ route('user.post', $user->username) }}"
           @endif

           >Posts</a>
        </li>
        <li class="nav-item ml-auto">
            {{--  <div class="text-center mt-2 ">  --}}
                <!-- Button trigger modal -->
                <button type="button" class="btn btn-primary form markdown"
                 data-toggle="modal"
                 data-target="#modal_setup"
                 data-title="Post Create"
                 data-action="{{ route('user-post.post.store') }}"
                 data-socuce="{{ route('user-post.post.create') }}"
                 data-method="post"
                 >
                 <i class="fa fa-plus"></i> Add New Post</button>

            {{--  </div>  --}}
        </li>
        {{-- End post Menu --}}

      </ul>
      {{-- End Profile Menu --}}


      {{--  Content --}}
      <div class="row">
      {{-- Profile Sidebar --}}
        <div class="col-md-5 col-lg-4 col-xl-3">

          {{-- Profile Picture --}}
          <form action="{{ route('profile.profile_pic_change.index') }}" id="profile_pic_update" method="POST" enctype="multipart/form-data">
                @csrf
                <label for="profile_image" class="mb-3 mt-3 position-relative">
                    <img src="{{ dynamic_asset($user->upload_id) }}"
                        class="rounded-circle profile_image  img-fulid  mx-auto" />
                        @if(auth()?->user()?->id == $user->id)
                          <div class="profile_image_overlayer">
                            <i class="fa fa-camera mb-2" aria-hidden="true"></i>

                            <div>Change Your Profile Picture</div>
                        </div>
                          <input required hidden type="file" name="image" id="profile_image">
                        @endif
                </label>
            </form>
            {{-- End Profile Picture --}}


            <div class="mb-2">
                <h4 ><i class="bi bi-card-text"></i>{{ $user->name }}</h4>
                <div class=" font-italic text-light"><i class="bi bi-bookmark-fill"></i>{{ $user->tagline ?? 'Your Tagline.' }}</div>
                <div class=" font-italic text-light"><i class="bi bi-person"></i>{{ $user->username  ?? 'Your Username.' }}</div>
               @if(auth()?->user()?->id == $user->id)
                   <button type="button" class="btn btn-secondary btn-sm my-2" data-toggle="modal" data-target="#profile_edit" >
                    <i class="bi bi-pencil-square"></i>Edit Profile </button>
               @endif
                <div class="text-light d-flex align-items-center"><i class="fa-solid fa-envelope"></i>{{ $user->email }}</div>
            </div>


            <div class="mb-2">
                @foreach ($user->social as $items)
                <div>
                    <a class="d-inline-block" href="{{ $items->link }}">{!! $items->icon ?? '<i class="bi bi-link-45deg"></i>' !!}{{ $items->type }}</a>
                </div>

                @endforeach
                @if(auth()?->user()?->id == $user->id)
                <button type="button" class="btn btn-secondary btn-sm my-2" data-toggle="modal" data-target="#quick_link_update_1212" ><i class="bi bi-pencil-square"></i>Edit Social Links </button>
@endif
            </div>
            @if(auth()?->user()?->id != $user->id && auth()?->user())
            <div class="mb-2">
                <a class="text-light" data-toggle="modal" data-target="#report_user_modal" href="#">Report for Abouse.</a>
            </div>
            @endif


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
