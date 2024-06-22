<x-frontend.card>
    <h3 class="mb-3">View More Topics</h3>
    @php
    // dd($category);
        $catgory_list_footer = category_subcategory($category, 30);
    @endphp
    {{-- @foreach ($catgory_list_footer as $items )

        <a href="{{ route('category.index', $items->slug) }}" class="p-2 m-2 shadow rounded text-white">{{Str::title($items->name) }}</a>

    @endforeach --}}
    <div class="row">
        @foreach ($catgory_list_footer as $items )
            <div class=" col-md-4 col-xl-3 mb-2 p-2 ">
                <div class="card mb-0">
                    <div class="card-body">
                        <a href="{{ route('category.index', $items->slug) }}" class="p-2 m-2 shadow rounded text-white">{{Str::title($items->name) }}</a>

                    </div>
                </div>

            </div>

        @endforeach
    </div>
</x-frontend.card>

