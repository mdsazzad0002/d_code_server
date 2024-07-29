<div class="mb-3">
    <label for="title">Post Title &nbsp;&nbsp;<span class="text-danger">* </span></label>
    <input required placeholder="Title" type="text" class="form-control" name="title" id="title">
</div>

<div class="row">
    <div class="col-md-6">
        <div class="mb-3">
            <label for="category_select">Post Category &nbsp;&nbsp;<span class="text-danger">* </span></label>
            <select required class="form-control select2 mb-2" name="category" placeholder="Category" id="category_select">
                <option value="">--Select Category--</option>
                @foreach ($category as $items)
                <option value="{{ $items->id }}">{{ $items->name }}</option>
                @endforeach
            </select>
        </div>
    </div>
    <div class="col-md-6">
        <div class="mb-3">
            <label for="subcategory">Post Sub Category &nbsp;&nbsp;<span class="text-danger">* </span></label>
            <select required class="form-control select2 mb-2" name="subcategory" placeholder="Sub Category" id="subcategory_list">
                <option value="">--Select Sub Category--</option>

            </select>
        </div>
    </div>
</div>


<div class="mb-3">
    <label for="post_short_description">Short Description &nbsp;&nbsp;<span class="text-danger">* </span></label>
    <textarea required class="form-control" placeholder="Short Description" name="short_details" id="post_short_description" cols="10" rows="5"></textarea>
</div>
<div>
    <label for="details">Details &nbsp;&nbsp;<span class="text-danger">* Markdown Editor</span></label>
    <textarea  name="details" Placeholder="Details" id="details" class="form-control mb-2" cols="30" rows="10"></textarea>
</div>
<div>
    <label for="cover_image">Cover Image <span class="text-success">*</span></label>
    <input type="file" name="upload_asset_image" class="form-control" id="cover_image">
</div>
