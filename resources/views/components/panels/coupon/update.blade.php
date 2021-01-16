<!-- Update Coupon Modal-->
<div class="modal fade" id="updateCouponModal" tabindex="-1" role="dialog" aria-labelledby="updateCouponModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="updateCouponModalLabel">Update Coupon</h5>
        <button class="close" type="button" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">×</span>
        </button>
      </div>
      <form id="update-coupon-form" method="post">
        @csrf
        @method('PUT')
        <div class="modal-body">
          <div class="form-group row">
            <label for="name" class="col-md-3 col-form-label text-md-right">{{ __('Name') }}</label>
            <div class="col-md-6">
              <input id="update-name" type="text" class="form-control" name="name" required autofocus>
            </div>
          </div>
          <div class="form-group row">
            <label for="discount" class="col-md-3 col-form-label text-md-right">{{ __('Discount (%)') }}</label>
            <div class="col-md-6">
              <input id="update-discount" type="number" max="100" min="0" class="form-control" name="discount" required autofocus>
            </div>
          </div>
        </div>
        <div class="modal-footer">
          <button class="btn btn-secondary btn-sm" type="button" data-dismiss="modal">Cancel</button>
          <button class="btn btn-primary btn-sm" type="submit">
            {{ __('Update') }}
          </button>
        </div>
      </form>
    </div>
  </div>
</div>