<input type="text" name="url" value="{{ $banner->url }}" class="form-control mb-2" placeholder="banner url">
<input type="file" name="banner" class="form-control mb-2" placeholder="banner Name">
<img style="width: 100px" src="{{ dynamic_asset($banner->uploads_id) }}" alt="">
<br>
<br>
<select class="form-control select2 mt-5 mb-2" name="status" placeholder="banner" id="post_banner">

    <option @if($banner->status == 1 ) selected @endif value="1">Active</option>
    <option @if($banner->status == 0 ) selected @endif value="0">InActive</option>

</select>
