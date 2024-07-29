@extends('backend.layouts.master')
@section('title','Post')

@section('content')
    <div class="card border">
        <div class="card-header d-flex justify-content-between ">
            <h5>Post</h5>

            <!-- Button trigger modal -->
            <button type="button" class="btn btn-primary form markdown"
             data-toggle="modal"
             data-target="#modal_setup"
             data-title="Post Create"
             data-action="{{ route('admin.post.store') }}"
             data-socuce="{{ route('admin.post.create') }}"
             data-method="post"
             >
             <i class="fa fa-plus"></i> Add New</button>

        </div>
        <div class="card-body">
            <table class="table table-striped table-hover">
                <x-t_head>
                    <tr>
                        <th>SI NO</th>
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
                    @foreach ($post_all as $items)
                    <tr>
                        {{-- {{ dd($category->uploads) }} --}}
                        <td>{{ $i++ }}</td>
                        <td> {{ $items->tilte }}</td>
                        <td> <img style="width:50px" src="{{ dynamic_asset($items->uploads_id) }}" alt=""></td>
                        <td> {{ $items->created_at->format('d-m-Y h:s:i A') }}</td>
                        <td>
                            <button type="button" class="btn btn-primary form markdown"
                                data-toggle="modal"
                                data-target="#modal_setup"
                                data-title="Post Edit"
                                data-action="{{ route('admin.post.update', $items->id) }}"
                                data-socuce="{{ route('admin.post.edit', $items->id ) }}"
                                data-method="put"
                                >
                                <i class="fa fa-pencil-square-o" aria-hidden="true"></i> Edit
                            </button>

                            <button type="button" class="btn btn-primary view lg_view"
                                data-toggle="modal"
                                data-target="#modal_setup_view"
                                data-title="View"
                                data-socuce="{{ route('admin.post.show', $items->id ) }}"
                                data-method="get">
                                <i class="fa fa-eye" aria-hidden="true"></i> View
                            </button>

                            <button type="button" class="btn btn-primary view lg_view"
                                data-toggle="modal"
                                data-target="#modal_setup_view"
                                data-title="Comment - {{ $items->tilte }}"
                                data-socuce="{{ route('admin.post.comment', $items->id ) }}"
                                data-method="get">
                                <i class="fas fa-comment" aria-hidden="true"></i> Comments
                            </button>

                            <button type="button" class="btn btn-danger delete"
                            data-target="#modal_setup_delete"
                            data-action="{{ route('admin.post.destroy', $items->id) }}"
                             data-method="delete"
                            >
                              <i class="fa fa-trash"></i> Delete</button>

                            </td>


                    </td>
                    </tr>
                    @endforeach
                </tbody>
            </table>
            <div>
                {{-- {{ $post_all->appends($request)->links() }} --}}
            </div>
        </div>
    </div>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/simplemde/latest/simplemde.min.css">
<script src="https://cdn.jsdelivr.net/simplemde/latest/simplemde.min.js"></script>

    <link rel="stylesheet" href="{{static_asset('plugins/')}}/markdown/simplemde.min.css">
    <script src="{{static_asset('plugins/')}}/markdown/simplemde.min.js"></script>

    <link rel="stylesheet" href="{{static_asset('plugins/')}}/prism/prism.css">
    <script src="{{static_asset('plugins/')}}/prism/prism.js"></script>

@endsection
{{--  
@push('scripts')

@endpush  --}}
