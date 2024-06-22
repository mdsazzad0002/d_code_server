<input type="text" name="name" value="{{ $category->name }}" class="form-control mb-2" placeholder="Category Name">
<input type="file" name="photo" class="form-control mb-2" placeholder="Category Name">
<img style="width: 100px" src="{{ dynamic_asset($category->uploads_id) }}" alt="">
<br>
<br>
<textarea name="description" placeholder="Description" class="form-control mb-2" id="" cols="30" rows="5">{{ $category->description }}</textarea>
<select class="form-control select2 mt-5 mb-2" name="subcategory" placeholder="Sub Category" id="post_category">

    <option @if($category->status == 1 ) selected @endif value="1">Active</option>
    <option @if($category->status == 0 ) selected @endif value="0">InActive</option>

</select>
