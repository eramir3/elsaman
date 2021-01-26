<!-- Delete User Modal-->
<div class="modal fade" id="deleteUserModal" tabindex="-1" role="dialog" aria-labelledby="deleteUserModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="deleteUserModalLabel">Delete User</h5>
                <button class="close" type="button" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">×</span>
                </button>
            </div>
            <form id="delete-user-form" method="post">
                @csrf
                @method('DELETE')    
                <div class="modal-body">
                    Do you want to delete user <span></span>? 
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