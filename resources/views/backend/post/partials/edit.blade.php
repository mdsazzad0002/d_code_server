<label for="title">Post Title</label>
<input placeholder="Title" type="text" class="form-control mb-2" value="{{ $post->tilte }}" name="title" id="title">


<div class="row">
    <div class="col-lg-4">
        <div class="mb-3">
            <label for="category_select">Post Category &nbsp;&nbsp;<span class="text-danger">* </span></label>
            <select required class="form-control select2 mb-2" name="category" placeholder="Category" id="category_select">
                <option value="">--Select Category--</option>
                @foreach ($category as $items)
                <option @if($post->category_id == $items->id ) selected @endif value="{{ $items->id }}">{{ $items->name
                    }}</option>
                @endforeach
            </select>
        </div>
    </div>
    <div class="col-lg-4">
        <div class="mb-3">
            <label for="subcategory">Post Sub Category &nbsp;&nbsp;<span class="text-danger">* </span></label>
            <select required class="form-control select2 mb-2" name="subcategory" placeholder="Sub Category" id="subcategory_list">
                <option value="">--Select Sub Category--</option>
                <option selected value="{{ @$post->subcategory_id }}">{{ @$post->subcategory->name }}</option>

            </select>
        </div>
    </div>
    <div class="col-lg-4">
        <label for="post_category">Post Status</label>
        <select class="form-control select2 mb-2" name="status" placeholder=" status" id="status">

            <option @if($post->status == 1 ) selected @endif value="1">Active</option>
            <option @if($post->status == 0 ) selected @endif value="0">InActive</option>

        </select>
    </div>
</div>
<br>

<label for="post_short_description">Short Description</label>
<textarea class="form-control" placeholder="Short Description" name="short_details" id="post_short_description"
    cols="10" rows="5">{{ $post->short_details }}</textarea>


<br>
<label for="details">Details</label>
<textarea name="details" Placeholder="Details" id="details" class="form-control mb-2" cols="30"
    rows="10">{{ $post->details }}</textarea>

<label for="cover_image">Cover Image</label>
<input type="file" name="upload_asset_image" class="form-control mt-2" id="cover_image">
<img width="100" src="{{ dynamic_asset($post->uploads_id) }}" alt="">
