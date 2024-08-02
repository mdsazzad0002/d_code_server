<input type="text" name="name" value="{{ $category->name }}" class="form-control mb-2" placeholder="Category Name">


<textarea name="description" placeholder="Description" class="form-control mb-2" id="" cols="30" rows="5">{{ $category->description }}</textarea>

<input type="text" name="keywords" value="{{ $category->keywords }}" class="form-control mb-2" placeholder="Keywords saparate by comma">

<input type="file" name="photo" class="form-control mb-2" placeholder="Category Name">
<img style="width: 100px" src="{{ dynamic_asset($category->uploads_id) }}" alt="">
<br>
<select class="form-control select2  mt-2" name="status"   id="status">
    <option @if($category->status == 1 ) selected @endif value="1">Active</option>
    <option @if($category->status == 0 ) selected @endif value="0">Inactive</option>
</select>
