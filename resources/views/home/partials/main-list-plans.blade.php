<div class="panel-body" id="main-list-plans">
    @forelse($plans as $plan)
        <div class="main-list-item">
            {{ "Plan #{$plan->id}: {$plan->name}" }}

            <div class="btn-group" role="group">
                {{-- First button --}}
                <a href="{{ route('plans.show', $plan->id) }}" type="button" class="btn btn-default">
                    <span class="glyphicon glyphicon-edit" aria-hidden="true"></span>
                </a>

                {{-- Second button needs fake sibling to left --}}
                <form action="{{ route('plans.destroy', $plan->id ) }}" method="post"
                      class="form-inline btn-group">
                    <input type="hidden" class="btn" name="_method" value="delete"/>
                    {{ csrf_field() }}
                    <button class="btn btn-danger">
                        <span class="glyphicon glyphicon-remove" aria-hidden="true"></span>
                    </button>
                </form>
            </div>
        </div>
    @empty
        No plans at the moment.
    @endforelse

    <a class="btn btn-success btn-secondary" data-toggle="modal" data-target="#add-plan-modal">
        <i class="glyphicon glyphicon-plus"></i> Add Plan
    </a>
</div>

@include('plans.partials.add-plan-modal')
