<label for="title">Post Title &nbsp;&nbsp;<span class="text-danger">* </span></label>
<input placeholder="Title" type="text" class="form-control mb-2" name="title" id="title">

<label for="post_category">Post Category  &nbsp;&nbsp;<span class="text-danger">* </span></label>
<select class="form-control select2 mb-2" name="subcategory" placeholder="Sub Category" id="post_category">
    <option value="">--Select Category--</option>
    @foreach ($subcategory as $items)
        <option value="{{ $items->id }}">{{ $items->name }}</option>
    @endforeach
</select>
<br>

<label for="post_short_description">Short Description &nbsp;&nbsp;<span class="text-danger">* </span></label>
<textarea class="form-control" placeholder="Short Description" name="short_details" id="post_short_description" cols="10" rows="5"></textarea>


<br>
<label for="details">Details &nbsp;&nbsp;<span class="text-danger">* Markdown Editor</span></label>
<textarea name="details" Placeholder="Details" id="details" class="form-control mb-2"  cols="30" rows="10"></textarea>

<label for="cover_image">Cover Image</label>
<input type="file" name="upload_asset_image" class="form-control mt-2" id="cover_image">
