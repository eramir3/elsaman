<!-- Delete Product Image Modal-->
<div class="modal fade" id="deleteImageModal" tabindex="-1" role="dialog" aria-labelledby="deleteImageModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="deleteImageModalLabel">Delete Product <span id="delete-name"></span></h5>
                <button class="close" type="button" data-dismiss="modal" aria-label="Close">
                <span aria-hidden="true">×</span>
                </button>
            </div>
            <form id="delete-image-form" method="post" enctype="multipart/form-data">
                @csrf
                @method('DELETE')    
                <div class="modal-body">
                    Do you want to delete this image? 
                </div>
                <div class="modal-footer">
                <button class="btn btn-secondary btn-sm" type="button" data-dismiss="modal">Cancel</button>
                <button class="btn btn-danger btn-sm" type="submit">
                    {{ __('Delete') }}
                </button>
                </div>
            </form>
        </div>
    </div>
</div>