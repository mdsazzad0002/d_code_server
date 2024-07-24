

@if(auth()?->user()?->id == $user->id)
    <button type="button" class="btn btn-primary btn-sm float-right form markdown"
    data-toggle="modal"
    data-target="#modal_setup"
    data-title="Details Edit"
    data-action="{{ route('users.profile_details.update', $user->username ) }}"
    data-socuce="{{ route('users.profile_details.edit', $user->username  ) }}"
    data-method="put"
    >
    <i class="fa fa-pencil-square-o" aria-hidden="true"></i> Edit
    </button>

    <form action="{{ route('users.quick_link_update.index') }}" class="modal fade" id="markdown_editor_details" tabindex="-1" aria-labelledby="report_user_modal" aria-hidden="true" method="post">
        @csrf
        <div class="modal-dialog modal-lg">
        <div class="modal-content bg-dark">
            <div class="modal-header">
                <h5 class="modal-title" id="report_user_modal"><i class="fa fa-sqkuire-edit" aria-hidden="true"></i>Edit Readme.md</h5>   <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                <span aria-hidden="true">&times;</span>
            </button>
            </div>
            <div class="modal-body">
                Loading ...
            </div>
            <div class="modal-footer">
            <button type="button" class="btn btn-secondary" data-dismiss="modal"><i class="fa-solid fa-xmark"></i>Close</button>
            <button type="submit"  class="btn btn-success" ><i class="bi bi-floppy2-fill"></i>Save changes</button>
            </div>
        </div>
        </div>
    </form>

@endif
