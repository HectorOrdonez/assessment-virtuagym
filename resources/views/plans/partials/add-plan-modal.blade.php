<div class="modal fade" id="add-plan-modal" tabindex="-1" role="dialog"
     aria-labelledby="addPlanModal">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <form url="{{route('plans.store')}}" method="post">
                <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                    <h4 class="modal-title">Add plan</h4>
                </div>
                <div class="modal-body">
                    {{ csrf_field() }}

                    <label for="plan_name">Plan Name</label>
                    <input type="text"/>

                    <input type="submit"/>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                    <button type="button" class="btn btn-primary submit-button">Save changes</button>
                </div>
            </form>
        </div>
    </div>
</div>
