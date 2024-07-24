<div class="mb-2">
    <h4 ><i class="bi bi-card-text"></i>{{ $user->name }}</h4>
    <div class=" font-italic text-light"><i class="bi bi-bookmark-fill"></i>{{ $user->tagline ?? 'Your Tagline.' }}</div>
    <div class=" font-italic text-light"><i class="bi bi-person"></i>{{ $user->username  ?? 'Your Username.' }}</div>
   @if(auth()?->user()?->id == $user->id)
       <button type="button" class="btn btn-secondary btn-sm my-2" data-toggle="modal" data-target="#profile_edit" >
        <i class="bi bi-pencil-square"></i>Edit Profile </button>
   @endif
    <div class="text-light d-flex align-items-center"><i class="fa-solid fa-envelope"></i>{{ $user->email }}</div>
</div>






  <!-- Basic information update -->
  <form action="{{ route('users.basic_info_update.index') }}" class="modal fade" id="profile_edit" tabindex="-1" aria-labelledby="profile_edit" aria-hidden="true" method="post">
    @csrf
    <div class="modal-dialog">
      <div class="modal-content bg-dark">
        <div class="modal-header">
          <h5 class="modal-title" id="profile_edit"><i class="bi bi-pencil-square"></i>Update  <span class="text-success">{{ $user->name }}</span></h5>
          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
          </button>
        </div>
        <div class="modal-body">
          <input type="text" placeholder="Enter your name" value="{{ $user->name }}" class="form-control bg-dark text-white mb-2" name="name" id="">

          <input type="text" placeholder="Enter your tagline" value="{{ $user->tagline }}"  class="form-control bg-dark text-white mb-2" name="tagline" id="">

          <input type="username" placeholder="Enter your username" value="{{ $user->username }}"  class="form-control bg-dark text-white mb-2" name="username" id="username_check">
        </div>
        <div class="modal-footer">
          <button type="button" class="btn btn-secondary" data-dismiss="modal"><i class="fa-solid fa-xmark"></i>Close</button>
          <button type="submit" disabled class="btn btn-success" ><i class="bi bi-floppy2-fill"></i>Save changes</button>
        </div>
      </div>
    </div>
  </form>
  <!-- end Basic information update -->
