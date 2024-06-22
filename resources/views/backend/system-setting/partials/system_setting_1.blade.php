<div class="card">
    <div class="card-header">
        <h5>
            General Basic Setting
        </h5>
    </div>
    {{-- {{ dd($general_setting) }} --}}
    <div class="card-body">
        <form class="row" action="{{ route('admin.system-setting.update', $category) }}" enctype="multipart/form-data" method="POST">
            @csrf
            @method('post')
            <div class="col-md-4">
                <label for="site_title">Site Title</label>
                <input class="form-control" placeholder="Site Title" @isset($general_setting['site_title']) value="{{ $general_setting['site_title']}}" @endisset type="text" name="site_title"  id="site_title">
            </div>
            <div class="col-md-4">
                <label for="copyright">Site Copyright</label>
                <input class="form-control" placeholder="Site Copyright" @isset($general_setting['copyright']) value="{{ $general_setting['copyright'] }}" @endisset type="text" name="copyright"  id="copyright">
            </div>
            <div class="col-md-4">
                <label for="site_title">Site Logo</label>
                <input class="form-control" placeholder="Site Logo"  type="file" name="site_logo"  id="site_logo">

                @isset($general_setting['site_logo'])
                 <img width="30" src="{{ dynamic_asset($general_setting['site_logo']) }}" alt="">  @endisset
            </div>
            <div class="col-md-4">
                <label for="dark_logo">Dark Logo</label>
                <input class="form-control" placeholder="dark Logo" type="file" name="dark_logo"  id="dark_logo">
                @isset($general_setting['dark_logo'])
                     <img width="30" src="{{ dynamic_asset($general_setting['dark_logo']) }}" alt="">
                @endisset
            </div>

            <div class="col-md-4">
                <label for="fav_logo">Fav Icon</label>
                <input class="form-control" placeholder="Fav Icon" type="file" name="fav_logo"  id="fav_logo">
                @isset($general_setting['fav_logo'])
                <img width="30" src="{{ dynamic_asset($general_setting['fav_logo']) }}" alt="">
           @endisset
            </div>

            <div class="col-12">
                <button class="btn btn-primary" type="submit"><i class="fa-solid fa-floppy-disk"></i>Save</button>
            </div>
        </form>
    </div>
</div>

