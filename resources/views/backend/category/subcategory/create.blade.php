<select name="category" class="form-control select2 mb-2" id="">
    <option value="">-- Select Category --</option>
    @foreach ($category as $items)
        <option value="{{ $items->id }}">{{ $items->name }}</option>
    @endforeach
</select>
<br>
<br>

<textarea name="description" placeholder="Description" class="form-control mb-2" id="" cols="30" rows="5"></textarea>

<input type="text" name="name" class="form-control mb-2" placeholder="Category Name">
<input type="text" name="keywords" id="keywords" class="form-control mb-2" placeholder="Keywords saparate by comma">
<input type="file" required name="photo" class="form-control" placeholder="Category Name">
