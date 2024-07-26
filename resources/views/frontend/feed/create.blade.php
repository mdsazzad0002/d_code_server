<div class="p-1"></div>
<x-frontend.card >

    <div class="d-flex align-items-center justify-content-center gap-3">
        <div class="overflow-hidden" style="width:80px; height:80px; ">
            @if(auth()->user())
               <img class="rounded-circle   w-100 h-100 lazy" style="object-fit: cover" data-src="{{ dynamic_asset(auth()->user()->upload_id) }}" alt=""></div>
            @else
               <img class="rounded-circle  w-100 h-100 lazy" style="object-fit: cover" data-src="{{ dynamic_asset(0) }}" alt=""></div>
            @endif
        <div style="width: calc(100% - 80px);    ">
            <input class="form-control" style=" padding: 33px;
    border-radius: 41px;" type="text" placeholder="Write your mind?">
        </div>
    </div>
</x-frontend.card>

<style>
    .gap-3{
        gap: 15px;
    }
</style>
