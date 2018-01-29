<div class="modal fade" id="add-user-modal" tabindex="-1" role="dialog"
     aria-labelledby="addUserModal">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <form action="{{route('users.store')}}" method="post">
                {{ csrf_field() }}
                <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                    <h4 class="modal-title">Add User</h4>
                </div>
                <div class="modal-body">
                    <div class="form-group row">
                        <label for="first_name" class="col-sm-3 col-form-label">First Name</label>
                        <div class="col-sm-9">
                            <input name="first_name" type="text" class="form-control-plaintext" id="first_name"
                                   placeholder="first name here">
                        </div>
                    </div>
                    <div class="form-group row">
                        <label for="last_name" class="col-sm-3 col-form-label">Last Name</label>
                        <div class="col-sm-9">
                            <input name="last_name" type="text" class="form-control-plaintext" id="last_name"
                                   placeholder="last name here">
                        </div>
                    </div>
                    <div class="form-group row">
                        <label for="email" class="col-sm-3 col-form-label">E-mail</label>
                        <div class="col-sm-9">
                            <input name="email" type="text" class="form-control-plaintext" id="email"
                                   placeholder="email here">
                        </div>
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                    <button type="button" class="btn btn-primary submit-button">Save changes</button>
                </div>
            </form>
        </div>
    </div>
</div>
