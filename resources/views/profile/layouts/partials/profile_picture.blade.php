<form action="{{ route('users.profile_pic_change.index') }}" id="profile_pic_update" method="POST" enctype="multipart/form-data">
    @csrf
    <label for="profile_image" class="mb-3 mt-3 position-relative">
        <img src="{{ dynamic_asset($user->upload_id) }}"
            class="rounded-circle profile_image  img-fulid  mx-auto" />
            @if(auth()?->user()?->id == $user->id)
              <div class="profile_image_overlayer">
                <i class="fa fa-camera mb-2" aria-hidden="true"></i>

                <div>Change Your Profile Picture</div>
            </div>
              <input required hidden type="file" name="image" id="profile_image">
            @endif
    </label>
</form>
