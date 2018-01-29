<div class="panel-body" id="main-list-plans">
    @forelse($plans as $plan)
        <div class="main-list-item">
            {{ "Plan #{$plan->id}: {$plan->name}" }}

            <form action="{{ route('plans.destroy', $plan->id ) }}" method="post" class="form-inline">
                <input type="hidden" name="_method" value="delete"/>
                {{ csrf_field() }}
                <button class="btn btn-danger btn-sm">
                    <span class="glyphicon glyphicon-remove" aria-hidden="true"></span>
                </button>
            </form>
        </div>
    @empty
        No plans at the moment.
    @endforelse

    <a class="btn btn-success btn-secondary" data-toggle="modal" data-target="#add-plan-modal">
        <i class="glyphicon glyphicon-plus"></i> Add Plan
    </a>
</div>
