
<style>
.bd-placeholder-img {
  font-size: 1.125rem;
  text-anchor: middle;
  -webkit-user-select: none;
  -moz-user-select: none;
  -ms-user-select: none;
  user-select: none;
}
.tingle-modal{
    z-index: 999999;
}

@media (min-width: 768px) {
  .bd-placeholder-img-lg {
      font-size: 3.5rem;
  }
}
</style><!-- Modal -->
  <form class="modal fade" id="modal_setup_donation" tabindex="-1" aria-labelledby="modal_setup" aria-hidden="true" enctype="multipart/form-data">
    <div class="modal-dialog modal-lg">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title" id="exampleModalLabel">Support Us For maintain our developer Community</h5>
          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
          </button>
        </div>
        <div class="modal-body">
            <div class="row">
                <div class="col-md-6">
                    <label for="amount">Enter Amount <span class="text-danger">*</span></label>
                    <input type="number" value="20" min="10"  class="form-control" name="amount" id="amount" required>
                </div>

                <div class="col-md-6">
                    <label for="name">Name</label>
                    <input type="text" class="form-control" name="name" id="name">
                </div>

                <div class="col-md-6">
                    <label for="address">Address</label>
                    <input type="text" class="form-control" name="address" id="address">
                </div>

                <div class="col-md-6">
                    <label for="phone">Phone</label>
                    <input type="tel" class="form-control" name="phone" id="phone">
                </div>
                <div class="col-md-6">
                    <label for="email">Email</label>
                    <input type="email" class="form-control" name="email" id="email">
                </div>

            </div>
        </div>
        <div class="modal-footer">
          <button type="button" class="btn btn-secondary" data-dismiss="modal"><i class="fa-solid fa-xmark"></i> Close</button>
          {{-- <button type="submit" class="btn btn-primary">Save changes</button> --}}
          <button class="btn btn-primary btn-lg btn-block" id="sslczPayBtn"
                token="if you have any token validation"
                postdata="your javascript arrays or objects which requires in backend"
                order="If you already have the transaction generated for current order"
                endpoint="{{ url('/pay-via-ajax') }}" > Pay Now
        </button>
        </div>
      </div>
    </div>
</form>

