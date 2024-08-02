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

            <table class="table table-border table-striped table-hover" id="users_table">
                <thead>
                    <tr>
                        <th>Name</th>
                        <th>Email</th>
                        <th>Username</th>
                        <th>Status</th>
                        <th>Date</th>
                        <th>Action</th>
                    </tr>
                </thead>
            </table>
        </div>
    </div>
@endsection


@push('scripts')
<script>
    $(document).ready(function() {
        $('#users_table').DataTable({
            processing: true,
            serverSide: true,
            ajax: '',
            columns: [
                { data: 'name', name: 'name' },
                { data: 'email', name: 'email' },
                { data: 'username', name: 'username' },
                { data: 'status_name', name: 'status' },
                { data: 'created_at', name: 'created_at' },
                { data: 'action', name: 'action',  orderable: false, searchable: false },
            ],
            drawCallback: function(settings) {
                $("button.form").on('click', function(){
                    create_form_modal_data(this)
                 });
                 $("button.delete").on('click', function(){
                    delete_modal_data(this)
                });
                //view
                $("button.view").on('click', function(){
                    data_view_modal(this)
                })
            }
        });
    });


</script>
@endpush

