<div class="row">

    <a href="{{ route('users.index',$view_post?->users?->username ?? '#') }}" class="mb-3 col-12 col-sm-7 col-md-6  d-flex align-items-center  text-light" style="gap: 10px">
        <div>
            <img style="width: 60px; height:60px; border-radius:10%; object-fit:cover" class="lazy" data-src="{{dynamic_asset($view_post?->users?->uploads?->id)}}" alt="s">
        </div>
        <div>

            <div style="line-height:normal">
                <span class="font-weight-bold" style="font-size: 18px">
                    {{Str::title($view_post?->users?->name ?? "Anonymous")}}
                </span>
                <br>
                {{Str::title($view_post?->users?->tagline ?? 'Tagline Loading . . .')}}<br>
                ⨀<span class="text-info">{{ $view_post->updated_at->format('d  M  Y h:sA') }}</span>
            </div>
        </div>
    </a>

    <div class="col-12 col-sm-5 col-md-6 d-none  d-sm-flex justify-content-end flex-column mb-3 " style="gap: 3px">
        <div class="text-sm-right">
            @if(date($view_post?->users?->created_at) >= Carbon\Carbon::now()->subMonths(3))
            New Users
            @else
            Old Users
            @endif
        </div>
        <div class="text-sm-right" style="font-size: 13px;">
            <div>
                <div class="d-flex   gap-2  justify-content-sm-end gap-2">
                    {{--  <div class="mb-2">  --}}
                        <a href="{{ route('users.post',$view_post?->users?->username ?? '#') }}" class="px-2 py-1 bg-secondary rounded" title="Total Posts"><i class="fa-solid fa-newspaper"></i> &nbsp;{{ $view_post?->users?->contribute->post ?? 0 }}</a>

                        <a href="{{ route('users.comment',$view_post?->users?->username ?? '#') }}" class="px-2 py-1 bg-secondary rounded" title="Total Comments"><i class="fas fa-comment"></i> &nbsp;{{ $view_post?->users?->contribute->comment ?? 0 }}</a>
                    {{--  </div>
                    <div class=" mb-2">  --}}

                        <a href="{{ route('users.vote',$view_post?->users?->username ?? '#') }}" class="px-2 py-1 bg-secondary rounded" title="Total Upvote"><i class="fa-duotone fa-arrow-up"></i> &nbsp;{{ $view_post?->users?->contribute->upvote ?? 0 }}</a>

                        <a href="{{ route('users.vote',$view_post?->users?->username ?? '#') }}" class="px-2 py-1 bg-secondary rounded" title="Total Downvote"><i class="fa-duotone fa-arrow-down"></i> &nbsp;{{ $view_post?->users?->contribute->downvote ?? 0 }}</a>
                    {{--  </div>  --}}
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
