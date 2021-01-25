<!-- Edit Product Image Modal-->
<div class="modal fade" id="editImageModal" tabindex="-1" role="dialog" aria-labelledby="editImageModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="editImageModalLabel">Edit Product <span id="edit-name"></span></h5>
                <button class="close" type="button" data-dismiss="modal" aria-label="Close">
                <span aria-hidden="true">×</span>
                </button>
            </div>
            <form id="edit-image-form" method="post" enctype="multipart/form-data">
                @csrf
                @method('PUT')    
                <div class="modal-body">
                    <input type="file" class="form-control-file" id="image" name="image">
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