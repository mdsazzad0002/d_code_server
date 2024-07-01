<div class="d-flex align-items-center justify-content-between mb-3">
    <a href="{{ $view_post?->users?->username != null ? route('user.index',$view_post?->users?->username) : '#'
    }}" class="d-flex align-items-center  text-light" style="gap: 10px">
        <div>
            <img style="width: 60px; height:60px; border-radius:10%; object-fit:cover" src="{{dynamic_asset($view_post?->users?->uploads?->id)}}" alt="s">
        </div>
        <div>
            <div class="font-weight-bold" style="font-size: 18px">
                {{Str::title($view_post?->users?->name ?? "Anonymous")}}
            </div>
            <div>
                {{Str::title($view_post?->users?->tagline ?? 'Loading . . .')}}
            </div>
        </div>
    </a>
    <div class="d-flex justify-content-end flex-column" style="gap: 7px">
        <div class="text-right">
            @if(date($view_post?->users?->created_at) >= Carbon\Carbon::now()->subMonths(3))
            New Users
            @else
            Old Users
            @endif
        </div>
        <div style="font-size: 13px">
            <div>
                <span class="px-2 py-1 bg-secondary rounded" title="Total Posts"><i class="fa-solid fa-newspaper"></i> &nbsp;{{ $view_post?->users?->contribute->post ?? 0 }}</span>

                <span class="px-2 py-1 bg-secondary rounded" title="Total Comments"><i class="fas fa-comment"></i> &nbsp;{{ $view_post?->users?->contribute->comment ?? 0 }}</span>

                <span class="px-2 py-1 bg-secondary rounded" title="Total Upvote"><i class="fa-duotone fa-arrow-up"></i> &nbsp;{{ $view_post?->users?->contribute->upvote ?? 0 }}</span>

                <span class="px-2 py-1 bg-secondary rounded" title="Total Downvote"><i class="fa-duotone fa-arrow-down"></i> &nbsp;{{ $view_post?->users?->contribute->downvote ?? 0 }}</span>

            </div>
        </div>
    </div>
</div>
