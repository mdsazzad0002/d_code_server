<select name="category" class="form-control select2 mb-2" id="">
    <option value="">-- Select Category --</option>
    @foreach ($category as $items)
        <option @if($items->id == $subcategory->category_id) selected  @endif value="{{ $items->id }}">{{ $items->name }}</option>
    @endforeach
</select>
<br>
<br>

<input type="text" name="name" value="{{ $subcategory->name }}" class="form-control mb-2" placeholder="Category Name">
<input type="file" name="photo" class="form-control mb-2" placeholder="Category Name">
<img style="width: 100px" src="{{ dynamic_asset($subcategory->uploads_id) }}" alt="">
<br>
<br>
<textarea name="description" placeholder="Description" class="form-control mb-2" id="" cols="30" rows="5">{{ $subcategory->description }}</textarea>
<input type="text" name="keywords" id="keywords" class="form-control mb-2" placeholder="Keywords saparate by comma">
<select class="form-control select2 mb-2" name="status" id="status">

    <option @if($subcategory->status == 1 ) selected @endif value="1">Active</option>
    <option @if($subcategory->status == 0 ) selected @endif value="0">InActive</option>

</select>

