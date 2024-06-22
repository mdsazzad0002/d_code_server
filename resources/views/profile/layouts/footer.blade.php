
<!-- Button trigger modal -->

  <!-- Modal -->
  <form action="{{ route('profile.basic_info_update.index') }}" class="modal fade" id="profile_edit" tabindex="-1" aria-labelledby="profile_edit" aria-hidden="true" method="post">
    @csrf
    <div class="modal-dialog">
      <div class="modal-content bg-dark">
        <div class="modal-header">
          <h5 class="modal-title" id="profile_edit"><i class="bi bi-pencil-square"></i>{{ $user->name }}</h5>
          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
          </button>
        </div>
        <div class="modal-body">
          <input type="text" placeholder="Enter your name" value="{{ $user->name }}" class="form-control bg-dark text-white mb-2" name="name" id="">

          <input type="text" placeholder="Enter your tagline" value="{{ $user->tagline }}"  class="form-control bg-dark text-white mb-2" name="tagline" id="">

          <input type="username" placeholder="Enter your username" value="{{ $user->username }}"  class="form-control bg-dark text-white mb-2" name="username" id="username_check">
        </div>
        <div class="modal-footer">
          <button type="button" class="btn btn-secondary" data-dismiss="modal"><i class="fa-solid fa-xmark"></i>Close</button>
          <button type="submit" disabled class="btn btn-success" ><i class="bi bi-floppy2-fill"></i>Save changes</button>
        </div>
      </div>
    </div>
  </form>





<!-- Button trigger modal -->

  <!-- Modal -->
  <!-- Modal quick link update -->
  <form action="{{ route('profile.quick_link_update.index') }}" class="modal fade" id="quick_link_update_1212" tabindex="-1" aria-labelledby="quick_link_update_1212" aria-hidden="true" method="post">
    @csrf
    <div class="modal-dialog modal-lg">
      <div class="modal-content bg-dark">
        <div class="modal-header">
          <h5 class="modal-title" ><i class="bi bi-pencil-square"></i>{{ $user->name }} Social</h5>
          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
          </button>
        </div>
        <div class="modal-body">
            <div class="items">
                @foreach ($user->social as $items)
                {{-- <div>
                    <a class="d-inline-block" href="{{ $items->link }}"><i class="{{ $items->icon }}"></i>{{ $items->type }}</a>
                </div> --}}

                <div required="" class="sub_items d-flex gap-2 mb-2">
                    <input  value="{{ $items->id }}" required="" placeholder="id" hidden  type="text" class="form-control bg-dark text-white" name="id[]">
                    <input  value="{{ $items->icon }}"required="" placeholder="icon class" type="text" class="form-control bg-dark text-white" name="icon[]">
                    <input value="{{ $items->type }}" required="" placeholder="like facebook" type="text" class="form-control bg-dark text-white" name="type[]">
                    <input value="{{ $items->link }}" required="" placeholder="url like https://dengrweb.com" type="url" class="form-control bg-dark text-white" name="url[]">
                    <div class="subitems_cluse_btn" onclick="remove_parents({{ $items->id }}, this)">
                        <i class="fa-solid fa-xmark"></i>
                    </div>
                </div>

                @endforeach

            </div>
            NB: Icon referace
            <a target="_blank" href="https://icons.getbootstrap.com/">Bootstrap icon</a>
            <a target="_blank" href="https://fontawesome.com/icons">FontAwesome icon</a>
            <a target="_blank" href="https://icofont.com/">icofont icon</a>
        </div>
        <button type="button" class="btn btn-secondary float-right d-inline-block" onclick="social_element_add(this)">+ Add New</button>
        <div class="modal-footer">
          <button type="button" class="btn btn-secondary" data-dismiss="modal"><i class="fa-solid fa-xmark"></i>Close</button>
          <button type="submit"  class="btn btn-success" ><i class="bi bi-floppy2-fill"></i>Save changes</button>
        </div>
      </div>
    </div>
  </form>




  <!-- User Report -->
  <!-- Modal -->

  @if(auth()?->user())
  <form action="{{ route('profile.report.store') }}" class="modal fade" id="report_user_modal" tabindex="-1" aria-labelledby="report_user_modal" aria-hidden="true" method="post">
    @csrf
    <div class="modal-dialog ">
      <div class="modal-content bg-dark">
        <div class="modal-header">
            <h5 class="modal-title" id="report_user_modal"><i class="fa fa-bug" aria-hidden="true"></i> Report Aganiest  From {{ $user->name }}</h5>   <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
          </button>
        </div>
        <div class="modal-body">
            <input hidden class="form-control bg-dark text-light mb-2" type="text" value="{{ $user->id }} " name="user_id">
            <input hidden class="form-control bg-dark text-light mb-2" type="text" value="{{ auth()->user()?->id }}" name="reporter_id">
            <textarea name="details" placeholder="Enter Details Aganiest user" id="" cols="30" rows="10" class="form-control bg-dark text-light"></textarea>
        </div>

        <div class="modal-footer">
          <button type="button" class="btn btn-secondary" data-dismiss="modal"><i class="fa-solid fa-xmark"></i>Close</button>
          <button type="submit"  class="btn btn-success" ><i class="bi bi-floppy2-fill"></i>Save changes</button>
        </div>
      </div>
    </div>
  </form>
  @endif








  <!-- Modal -->
  <form action="{{ route('profile.quick_link_update.index') }}" class="modal fade" id="markdown_editor_details" tabindex="-1" aria-labelledby="report_user_modal" aria-hidden="true" method="post">
    @csrf
    <div class="modal-dialog modal-lg">
      <div class="modal-content bg-dark">
        <div class="modal-header">
            <h5 class="modal-title" id="report_user_modal"><i class="fa fa-sqkuire-edit" aria-hidden="true"></i>Edit Readme.md</h5>   <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
          </button>
        </div>
        <div class="modal-body">
            Loading ...
        </div>
        <div class="modal-footer">
          <button type="button" class="btn btn-secondary" data-dismiss="modal"><i class="fa-solid fa-xmark"></i>Close</button>
          <button type="submit"  class="btn btn-success" ><i class="bi bi-floppy2-fill"></i>Save changes</button>
        </div>
      </div>
    </div>
  </form>





