<input hidden type="text" name="user_id" value="{{ $user_id }}">
@if(!empty($profile_details) && $profile_details!=null)
<textarea id="details" name="details" class="form-control text-light bg-dark">
    {{ $profile_details->details }}
</textarea>
@else
<textarea id="details" name="details" class="form-control text-light bg-dark">
</textarea>
@endif


