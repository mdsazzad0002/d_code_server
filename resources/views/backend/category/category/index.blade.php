@extends('backend.layouts.master')
@section('title','Category')

@section('content')
    <div class="card border">
        <div class="card-header d-flex justify-content-between ">
            <h5>Category</h5>

            <!-- Button trigger modal -->
            <button type="button" class="btn btn-primary form"
             data-toggle="modal"
             data-target="#modal_setup"
             data-title="Category Create"
             data-action="{{ route('admin.category.store') }}"
             data-socuce="{{ route('admin.category.create') }}"
             data-method="post"
             >
             <i class="fa-solid fa-plus"></i> Add New</button>

        </div>
        <div class="card-body">
            <table class="table table-striped table-hover">
                <x-t_head>
                    <tr>
                        <th>###</th>
                        <th>Category</th>
                        <th>Image</th>
                        <th>Date</th>
                        <th>Action</th>
                    </tr>
                </x-t_head>
                <tbody>
                    @php
                         $i=1;
                    @endphp
                    @foreach ($categorys as $category)
                    <tr>
                        {{-- {{ dd($category->uploads) }} --}}
                        <td>{{ $i++ }}</td>
                        <td> {{ $category->name }}</td>
                        <td> <img style="width:50px" src="{{ dynamic_asset($category->uploads_id) }}" alt=""></td>
                        <td> {{ $category->created_at }}</td>
                        <td>
                            <button type="button" class="btn btn-primary form"
                            data-toggle="modal"
                            data-target="#modal_setup"
                            data-title="Category Edit"
                            data-action="{{ route('admin.category.update', $category->id) }}"
                            data-socuce="{{ route('admin.category.edit', $category->id ) }}"
                            data-method="put"
                            >
                              <i class="fa-solid fa-plus"></i> Edit</button>

                            <button type="button" class="btn btn-danger delete"
                            data-target="#modal_setup_delete"
                            data-action="{{ route('admin.category.destroy', $category->id) }}"
                             data-method="delete"
                            >
                              <i class="fa fa-trash"></i> Delete</button>

                            </td>
                    </tr>
                    @endforeach
                </tbody>
            </table>
            <div>
                {{ $categorys->links() }}
            </div>
        </div>
    </div>
@endsection
