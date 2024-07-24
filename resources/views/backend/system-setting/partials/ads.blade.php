<div class="card">
    <div class="card-header">
        <h5>
            Ads Settings
        </h5>
    </div>
    {{-- {{ dd($general_setting) }} --}}
    <div class="card-body">
        <form class="row" action="{{ route('admin.system-setting.update', $category) }}" enctype="multipart/form-data"
            method="POST">
            @csrf
            @method('post')


            <div class="col-md-4 mb-2">
                <label for="home_showup">Home Page</label>
                <textarea class="form-control" placeholder="Home Page" name="home_showup" type="text" id="home_showup">@isset($general_setting['home_showup']){{$general_setting['home_showup']}}@endisset</textarea>
            </div>

            <div class="col-md-4 mb-2">
                <label for="category_showup">Category Page</label>
                <textarea class="form-control" placeholder="Category Page" name="category_showup" type="text" id="category_showup">@isset($general_setting['category_showup']){{$general_setting['category_showup']}}@endisset</textarea>
            </div>
            <div class="col-md-4 mb-2">
                <label for="details_showup">Details Page</label>
                <textarea class="form-control" placeholder="Details Page" name="details_showup" type="text" id="details_showup">@isset($general_setting['details_showup']){{$general_setting['details_showup']}}@endisset</textarea>
            </div>

            <div class="col-md-4 mb-2">
                <label for="page_top_showup">Page Top</label>
                <textarea class="form-control" placeholder="Page Top" name="page_top_showup" type="text" id="page_top_showup">@isset($general_setting['page_top_showup']){{$general_setting['page_top_showup']}}@endisset</textarea>
            </div>


            <div class="col-md-4 mb-2">
                <label for="footer_showup">Footer ADS</label>
                <textarea class="form-control" placeholder="Footer ADS" name="footer_showup" type="text" id="footer_showup">@isset($general_setting['footer_showup']){{$general_setting['footer_showup']}} @endisset </textarea>
            </div>
   



            <div class="col-md-4 mb-2">
                <label for="post_center_showup_after">Post center Ads Show Before</label>
                <input class="form-control" placeholder="Show After" @isset($general_setting['post_center_showup_after'])value="{{ $general_setting['post_center_showup_after']}}" @endisset name="post_center_showup_after"  type="number" id="post_center_showup_after"></input>
            </div>



            <div class="col-md-4 mb-2">
                <label for="system_showup">System ADS</label>

                <div class="switch">
                    <input type="checkbox" checked hidden value="off" name="system_showup" id="">
                    <input class="form-check-textarea" name="system_showup"
                       @isset($general_setting['system_showup'])
                        @if($general_setting['system_showup']=='on' ) checked @endif @endisset type="checkbox"
                        id="system_showup">
                    <label class="form-check-label" for="system_showup"></label>
                </div>

            </div>

            <div class="col-12">
                <button class="btn btn-primary" type="submit"><i class="fa-solid fa-floppy-disk"></i>Save</button>
            </div>
        </form>
    </div>
</div>
