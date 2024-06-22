@extends('backend.layouts.master')
@section('title','Sub Category')

@section('content')
    <div class="card border">
        <div class="card-header d-flex justify-content-between ">
            <h5>Sub Category</h5>

            <!-- Button trigger modal -->
            <button type="button" class="btn btn-primary form"
             data-toggle="modal"
             data-target="#modal_setup"
             data-title="Sub Category Create"
             data-action="{{ route('admin.subcategory.store') }}"
             data-socuce="{{ route('admin.subcategory.create') }}"
             data-method="post"
             >
             <i class="fa fa-plus"></i> Add New</button>

        </div>
        <div class="card-body">
            <table class="table table-striped table-hover">
                <x-t_head>
                    <tr>
                        <th>###</th>
                        <th>Category</th>
                        <th>Sub Category</th>
                        <th>Image</th>
                        <th>Date</th>
                        <th>Action</th>
                    </tr>
                </x-t_head>
                <tbody>
                    @php
                         $i=1;
                    @endphp
                    @foreach ($subcategory as $items)
                    <tr>
                        {{-- {{ dd($category->uploads) }} --}}
                        <td>{{ $i++ }}</td>
                        <td> {{ $items?->categoryname }}</td>
                        <td> {{ $items?->name }}</td>
                        <td> <img style="width:50px" src="{{ dynamic_asset($items->uploads_id) }}" alt=""></td>
                        <td> {{ $items->created_at }}</td>
                        <td><button type="button" class="btn btn-primary form"
                            data-toggle="modal"
                            data-target="#modal_setup"
                            data-title="Category Edit"
                            data-action="{{ route('admin.subcategory.update', $items->id) }}"
                            data-socuce="{{ route('admin.subcategory.edit', $items->id ) }}"
                            data-method="put"
                            >
                            <i class="fa fa-eye" aria-hidden="true"></i> Edit</button>
                            <button type="button" class="btn btn-danger delete"
                            data-target="#modal_setup_delete"
                            data-action="{{ route('admin.subcategory.destroy', $items->id) }}"
                             data-method="delete"
                            >
                              <i class="fa fa-trash"></i> Delete</button>

                            </td>
                    </tr>
                    @endforeach
                </tbody>
            </table>
            <div>
                {{ $subcategory->links() }}
            </div>
        </div>
    </div>
@endsection
