@extends('backend.layouts.master')

@section('content')
    <div class="card border">
        <div class="card-header d-flex justify-content-between ">
            <h5>Banner</h5>

            <!-- Button trigger modal -->
            <button type="button" class="btn btn-primary form"
             data-toggle="modal"
             data-target="#modal_setup"
             data-title="Banner Create"
             data-action="{{ route('admin.banner.store') }}"
             data-socuce="{{ route('admin.banner.create') }}"
             data-method="post"
             >
             <i class="fa-solid fa-plus"></i> Add New</button>

        </div>
        <div class="card-body">
            <table class="table table-striped table-hover">
                <x-t_head>
                    <tr>
                        <th>###</th>
                        <th>Banner</th>
                        <th>URL</th>
                        <th>Date</th>
                        <th>Action</th>
                    </tr>
                </x-t_head>
                <tbody>
                    @php
                         $i=1;
                    @endphp
                    @foreach ($banner as $items)
                    <tr>
                        {{-- {{ dd($banner->uploads) }} --}}
                        <td>{{ $i++ }}</td>

                        <td> <img style="width:50px" src="{{ dynamic_asset($items->uploads_id) }}" alt=""></td>
                        <td> <a class="copy" href="javascript:void(0)" title="{{ $items->url }}">Copy Link</a></td>
                        <td> {{ $items->created_at }}</td>
                        <td>
                            <button type="button" class="btn btn-primary form"
                            data-toggle="modal"
                            data-target="#modal_setup"
                            data-title="banner Edit"
                            data-action="{{ route('admin.banner.update', $items->id) }}"
                            data-socuce="{{ route('admin.banner.edit', $items->id ) }}"
                            data-method="put"
                            >
                              <i class="fa-solid fa-plus"></i> Edit</button>

                            <button type="button" class="btn btn-danger delete"
                            data-target="#modal_setup_delete"
                            data-action="{{ route('admin.banner.destroy', $items->id) }}"
                             data-method="delete"
                            >
                              <i class="fa fa-trash"></i> Delete</button>

                            </td>
                    </tr>
                    @endforeach
                </tbody>
            </table>
            <div>
                {{ $banner->links() }}
            </div>
        </div>
    </div>
@endsection
