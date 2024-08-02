<x-frontend.card title="View More Categories">

    @php
        $catgory_list_footer = category_head(30);
    @endphp
    <div class="row">
        @foreach ($catgory_list_footer as $items )
            <div class=" col-md-4 col-xl-12 mb-2 p-2 " >
                <div class="card mb-0">
                    <div class="card-body">
                        <a href="{{ route('category.index', $items->slug) }}" class=" text-black w-full">{{Str::title($items->name) }}</a>
                    </div>
                </div>

            </div>

        @endforeach
    </div>
</x-frontend.card>
