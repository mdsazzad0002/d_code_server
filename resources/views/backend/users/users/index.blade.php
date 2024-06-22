@extends('backend.layouts.master')
@section('title', 'Dashboard')
@section('content')


    <div class="card border">
        <div class="card-header d-flex justify-content-between">
            User List
            <button type="button" class="btn btn-primary form"
            data-toggle="modal"
            data-target="#modal_setup"
            data-title="Add New "
            data-action="{{ route('admin.user-list.store') }}"
            data-socuce="{{ route('admin.user-list.create' ) }}"
            data-method="post"
            >
            <i class="fa fa-plus" aria-hidden="true"></i> Add New Users
        </button>
        </div>
        <div class="card-body">

            <table class="table table-border table-striped table-hover">
                <x-t_head>
                    <tr>
                        <th>SI NO</th>
                        <th>Name</th>
                        <th>Email</th>
                        <th>Role</th>
                        <th>Status</th>
                        <th>Date</th>
                        <th>Action</th>
                    </tr>
                </x-t_head>
                    @php
                        $i=1;
                    @endphp
                    <tbody>
                        @foreach ($users as $user)
                        <tr>

                            <td>{{ $i++ }}</td>
                            <td>{{ $user->name }}</td>
                            <td>{{ $user->email }}</td>
                            <td>{{ $user->role }}</td>
                            <td>{{ $user->email_verified_at == null ? 'unverivied' : 'Verified' }}</td>
                            <td>{{ $user->created_at->format('d-M-Y h:i A') }}</td>
                            <td>
                                <button type="button" class="btn btn-primary form"
                                    data-toggle="modal"
                                    data-target="#modal_setup"
                                    data-title="User Edit"
                                    data-action="{{ route('admin.user-list.update', $user->id) }}"
                                    data-socuce="{{ route('admin.user-list.edit', $user->id ) }}"
                                    data-method="put"
                                    >
                                    <i class="fa fa-pencil-square-o" aria-hidden="true"></i> Edit
                                </button>

                                <button type="button" class="btn btn-primary view "
                                    data-toggle="modal"
                                    data-target="#modal_setup_view"
                                    data-title="View"
                                    data-socuce="{{ route('admin.user-list.show', $user->id ) }}"
                                    data-method="get">
                                    <i class="fa fa-eye" aria-hidden="true"></i> View
                                </button>



                                <button type="button" class="btn btn-danger delete"
                                data-target="#modal_setup_delete"
                                data-action="{{ route('admin.user-list.destroy', $user->id) }}"
                                 data-method="delete"
                                >
                                  <i class="fa fa-trash"></i> Delete</button>

                                </td>
                        </tr>
                            @endforeach
                    </tbody>

            </table>
        </div>
    </div>
@endsection


