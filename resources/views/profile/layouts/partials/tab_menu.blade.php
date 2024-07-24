<ul class="nav nav-tabs">
    {{-- Overview Menu --}}
    <li class="nav-item">
        <a class="nav-link d-flex align-items-center gap-2qq {{ Route::is('users.index', $user->username) ? 'active': '' }}" href="{{ route('users.index', $user->username) }}">
            <svg fill="#eeb" aria-hidden="true" height="16" viewBox="0 0 16 16" version="1.1" width="16" data-view-component="true" class="octicon octicon-book UnderlineNav-octicon">
                <path d="M0 1.75A.75.75 0 0 1 .75 1h4.253c1.227 0 2.317.59 3 1.501A3.743 3.743 0 0 1 11.006 1h4.245a.75.75 0 0 1 .75.75v10.5a.75.75 0 0 1-.75.75h-4.507a2.25 2.25 0 0 0-1.591.659l-.622.621a.75.75 0 0 1-1.06 0l-.622-.621A2.25 2.25 0 0 0 5.258 13H.75a.75.75 0 0 1-.75-.75Zm7.251 10.324.004-5.073-.002-2.253A2.25 2.25 0 0 0 5.003 2.5H1.5v9h3.757a3.75 3.75 0 0 1 1.994.574ZM8.755 4.75l-.004 7.322a3.752 3.752 0 0 1 1.992-.572H14.5v-9h-3.495a2.25 2.25 0 0 0-2.25 2.25Z"></path>
            </svg>
           &nbsp; Overview
        </a>
    </li>
    {{-- End Overview Menu --}}

    {{-- Comment Menu --}}
    <li class="nav-item">
        <a class="nav-link  {{ Route::is('users.comment', $user->username) ? 'active': '' }}" href="{{ route('users.comment', $user->username) }}"><i class="fa fa-comments"></i>Comment <span class="badge bg-primary">{{ $user->contribute->comment ?? 0 }}</span></a>
    </li>
    {{--End Comment Menu --}}

    {{-- Votes Menu --}}
    <li class="nav-item">
        <a class="nav-link
      {{ Route::is('users.vote', $user->username) ? 'active': '' }}" href="{{ route('users.vote', $user->username) }}"><i class="fa fa-id-card" aria-hidden="true"></i>Votes <span class="badge bg-primary">{{ ($user->contribute->upvote ?? 0) + ($user->contribute->downvote ?? 0) }}</span></a>
    </li>
    {{-- End Menu --}}

    {{-- Posts Menu --}}
    <li class="nav-item">
        <a class="nav-link
       {{ Route::is('users.post', $user->username) ? 'active': '' }}" href="{{ route('users.post', $user->username) }}"><i class="fa-solid fa-rss"></i>Posts <span class="badge bg-primary">{{ $user->contribute->post ?? 0 }}</span></a>
    </li>
    @if(auth()->user() && auth()->user()->id == $user->id)
    <li class="nav-item ml-auto">
        {{-- <div class="text-center mt-2 ">  --}}
        <!-- Button trigger modal -->
        <button type="button" class="btn btn-primary form markdown" data-toggle="modal" data-target="#modal_setup" data-title="Post Create" data-action="{{ route('user-post.post.store') }}" data-socuce="{{ route('user-post.post.create') }}" data-method="post">
            <i class="fa fa-plus"></i> Add New Post</button>

        {{-- </div>  --}}
    </li>
    {{-- End post Menu --}}
    @endif
</ul>
