<div class="mb-2">
    @foreach ($user->social as $items)
    <div>
        <a class="d-inline-block" href="{{ $items->link }}"><i class="{{ $items->icon ?? 'bi bi-link-45deg' }}"></i>{{ $items->type }}</a>
    </div>
    @endforeach




    @if(auth()->user() && auth()?->user()?->id == $user->id)
        <button type="button" class="btn btn-secondary btn-sm my-2" data-toggle="modal" data-target="#quick_link_update_1212"><i class="bi bi-pencil-square"></i>Edit Social Links </button>

        <!-- Modal quick link update -->
        <form action="{{ route('users.quick_link_update.index') }}" class="modal fade" id="quick_link_update_1212" tabindex="-1" aria-labelledby="quick_link_update_1212" aria-hidden="true" method="post">
          @csrf
          <div class="modal-dialog modal-lg">
            <div class="modal-content bg-dark">
              <div class="modal-header">
                <h5 class="modal-title" >
                  <i class="bi bi-pencil-square"></i>
                  <span class="text-success">{{ $user->name }}</span>
                   Social
                </h5>
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
                  <a target="_blank" class="text-primary" href="https://icons.getbootstrap.com/">Bootstrap icon</a>
                  <a target="_blank" class="text-primary" href="https://fontawesome.com/icons">FontAwesome icon</a>
                  <a target="_blank" class="text-primary" href="https://icofont.com/">icofont icon</a>
              </div>
              <button type="button" class="btn btn-secondary float-right d-inline-block" onclick="social_element_add(this)">+ Add New</button>
              <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-dismiss="modal"><i class="fa-solid fa-xmark"></i>Close</button>
                <button type="submit"  class="btn btn-success" ><i class="bi bi-floppy2-fill"></i>Save changes</button>
              </div>
            </div>
          </div>
        </form>
    @endif



</div>
