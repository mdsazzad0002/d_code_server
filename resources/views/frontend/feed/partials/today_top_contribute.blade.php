<x-frontend.card>
    <div class="mb-1 mt-0">Top Contributor</div>
<div class=" overflow-auto">
    @foreach ($contribute_data as $contribute)
    <a href="{{ route('users.index', $contribute->username) }}" style=" display:inline-block">
        <img class="w-100 h-100 lazy" style="object-fit: cover" data-src="{{ $contribute->upload_file }}" alt="">
        <div class="holder_name" style="border-radius: 4px;">
            {{ Str::limit($contribute->name, 9, '...') }}
        </div>
    </a>
    @endforeach

</div>

</x-frontend.card>
<style>
    .overflow-auto{
        overflow: auto;
        white-space: nowrap;
    }
    .overflow-auto a{
        margin-right: 8px;
        height: 100px;
        width: 80px;
        position: relative;

    }
    .overflow-auto a img{
        border-radius: 5px;
        background-position: center center;
    }
    .overflow-auto a .holder_name{
        position: absolute;
        left: 0;
        right: 0;
        bottom: 0;
        width: 100%;
        overflow: hidden;
        background: gray;
        color: white;
        padding: 2px 5px;
        padding: 2px 5px;
    font-size: 15px;
    }
</style>
