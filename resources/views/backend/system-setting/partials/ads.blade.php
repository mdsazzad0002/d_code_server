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
                <label for="top_showup">Top ADS</label>
                <textarea class="form-control" placeholder="Top ADS" name="top_showup" type="text" id="top_showup">@isset($general_setting['top_showup']){{$general_setting['top_showup']}} @endisset </textarea>
            </div>
            <div class="col-md-4 mb-2">
                <label for="footer_showup">Footer ADS</label>
                <textarea class="form-control" placeholder="Footer ADS" name="footer_showup" type="text" id="footer_showup">@isset($general_setting['footer_showup']){{$general_setting['footer_showup']}} @endisset </textarea>
            </div>
            <div class="col-md-4 mb-2">
                <label for="post_center_showup">Post Center ADS</label>
                <textarea class="form-control" placeholder="Content Center ADS" name="post_center_showup"  type="text" id="post_center_showup">@isset($general_setting['post_center_showup']) {{$general_setting['post_center_showup']}} @endisset</textarea>
            </div>

            <div class="col-md-4 mb-2">
                <label for="sidebar_showup">Sidebar ADS</label>
                <textarea class="form-control" placeholder="Sidebar ADS" name="sidebar_showup"  type="text" id="sidebar_showup">@isset($general_setting['sidebar_showup']){{ $general_setting['sidebar_showup']}} @endisset</textarea>
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
