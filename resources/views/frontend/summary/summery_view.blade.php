<div class="row mb-3">

    <a href="{{ route('users.index',$view_post?->users?->username ?? '#') }}" class="col-8 col-md-6 d-flex align-items-center  text-light" style="gap: 10px">
        <div>
            <img style="width: 60px; height:60px; border-radius:10%; object-fit:cover" src="{{dynamic_asset($view_post?->users?->uploads?->id)}}" alt="s">
        </div>
        <div>
            <div class="font-weight-bold" style="font-size: 18px">
                {{Str::title($view_post?->users?->name ?? "Anonymous")}}
            </div>
            <div>
                {{Str::title($view_post?->users?->tagline ?? 'Tagline Loading . . .')}}
            </div>
        </div>
    </a>

    <div class="col-4 col-md-6 d-flex justify-content-end flex-column" style="gap: 7px">
        <div class="text-right">
            @if(date($view_post?->users?->created_at) >= Carbon\Carbon::now()->subMonths(3))
            New Users
            @else
            Old Users
            @endif
        </div>
        <div style="font-size: 13px; text-align:end">
            <div>
                <div class="d-flex  flex-column flex-md-row gap-2 align-items-end align-items-md-center justify-content-end gap-2">
                    <div class="mb-2">
                        <a href="{{ route('users.post',$view_post?->users?->username ?? '#') }}" class="px-2 py-1 bg-secondary rounded" title="Total Posts"><i class="fa-solid fa-newspaper"></i> &nbsp;{{ $view_post?->users?->contribute->post ?? 0 }}</a>

                        <a href="{{ route('users.comment',$view_post?->users?->username ?? '#') }}" class="px-2 py-1 bg-secondary rounded" title="Total Comments"><i class="fas fa-comment"></i> &nbsp;{{ $view_post?->users?->contribute->comment ?? 0 }}</a>
                    </div>
                    <div class=" mb-2">

                        <a href="{{ route('users.vote',$view_post?->users?->username ?? '#') }}" class="px-2 py-1 bg-secondary rounded" title="Total Upvote"><i class="fa-duotone fa-arrow-up"></i> &nbsp;{{ $view_post?->users?->contribute->upvote ?? 0 }}</a>

                        <a href="{{ route('users.vote',$view_post?->users?->username ?? '#') }}" class="px-2 py-1 bg-secondary rounded" title="Total Downvote"><i class="fa-duotone fa-arrow-down"></i> &nbsp;{{ $view_post?->users?->contribute->downvote ?? 0 }}</a>
                    </div>
                </div>


            </div>
        </div>
    </div>
</div>

<style>
    .gap-2{
        gap:4px;
    }
</style>
