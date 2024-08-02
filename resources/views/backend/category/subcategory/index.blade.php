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
            <div class="card-body">
                <div class="table-rasponsive">
                    <table id="subcategory_data" class="display table table-bordered table-striped table-hover">
                        <thead>
                            <tr>
                                <th>Sub Category</th>
                                <th>Category</th>
                                <th>Image</th>
                                <th>Date</th>
                                <th>Status</th>
                                <th>Action</th>
                            </tr>
                        </thead>
                    </table>
                </div>
            </div>

        </div>
    </div>
@endsection
@push('scripts')
<script>
    $(document).ready(function() {
        $('#subcategory_data').DataTable({
            processing: true,
            serverSide: true,
            ajax: '',
            columns: [
                { data: 'name', name: 'name' },
                { data: 'category_name', name: 'category_id' },
                { data: 'image', name: 'image', orderable: false, searchable:false },
                { data: 'created_at', name: 'created_at' },
                { data: 'status_name', name: 'status' },
                { data: 'action', name: 'action',  orderable: false, searchable: false },
            ],
            drawCallback: function(settings) {
                $("button.form").on('click', function(){
                    create_form_modal_data(this)
                 });
                 $("button.delete").on('click', function(){
                    delete_modal_data(this)
                });

            }
        });
    });

</script>
@endpush
