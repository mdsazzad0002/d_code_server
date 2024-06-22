
<input placeholder="Title" type="text" class="form-control mb-2" hidden value="{{ $comment->id }}" name="id" id="title">

<br>
<textarea name="details" Placeholder="Details" id="details" class="form-control mb-2" cols="30"
    rows="10">{{ $comment->comments }}</textarea>



