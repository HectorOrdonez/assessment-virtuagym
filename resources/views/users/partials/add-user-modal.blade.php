<div class="modal fade" id="add-user-modal" tabindex="-1" role="dialog"
     aria-labelledby="addUserModal">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
                <h4 class="modal-title">Add User</h4>
            </div>
            <div class="modal-body">
                <form url="{{route('users.store')}}" method="post">
                    {{ csrf_field() }}

                    <label for="user_name">User Name</label>
                    <input type="text" />
                </form>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                <button type="button" class="btn btn-primary submit-button">Save changes</button>
            </div>
        </div>
    </div>
</div>
