@if(auth()?->user()?->id != $user->id && auth()?->user())
<div class="mb-2">
    <a class="text-light" data-toggle="modal" data-target="#report_user_modal" href="#">Report for Abouse.</a>
    
    <form action="{{ route('users.report.store') }}" class="modal fade" id="report_user_modal" tabindex="-1" aria-labelledby="report_user_modal" aria-hidden="true" method="post">
      @csrf
      <div class="modal-dialog ">
        <div class="modal-content bg-dark">
          <div class="modal-header">
              <h5 class="modal-title" id="report_user_modal"><i class="fa fa-bug" aria-hidden="true"></i> 
                Report Aganiest  From <span class="text-success">{{ $user->name }}</span>
              </h5>   
              <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                <span aria-hidden="true">&times;</span>
              </button>
          </div>
          <div class="modal-body">
              <input hidden class="form-control bg-dark text-light mb-2" type="text" value="{{ $user->id }} " name="user_id">
              <input hidden class="form-control bg-dark text-light mb-2" type="text" value="{{ auth()->user()?->id }}" name="reporter_id">
              <textarea name="details" placeholder="Enter Details Aganiest user" id="" cols="30" rows="10" class="form-control bg-dark text-light"></textarea>
          </div>
  
          <div class="modal-footer">
            <button type="button" class="btn btn-secondary" data-dismiss="modal"><i class="fa-solid fa-xmark"></i>Close</button>
            <button type="submit"  class="btn btn-success" ><i class="bi bi-floppy2-fill"></i>Save changes</button>
          </div>
        </div>
      </div>
    </form>
    
</div>
@endif
