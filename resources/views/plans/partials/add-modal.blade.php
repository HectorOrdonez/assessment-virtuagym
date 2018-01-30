<div class="modal fade" id="add-plan-modal" tabindex="-1" role="dialog"
     aria-labelledby="addPlanModal">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <form action="{{route('plans.store')}}" method="post">
                {{ csrf_field() }}
                <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                    <h4 class="modal-title">Add plan</h4>
                </div>
                <div class="modal-body">
                    <div class="form-group row">
                        <label for="name" class="col-sm-2 col-form-label">Name</label>
                        <div class="col-sm-10">
                            <input name="name" type="text" class="form-control-plaintext" id="name" placeholder="your plan name">
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
