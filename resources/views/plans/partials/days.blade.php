<div class="panel panel-default">
    <div class="h4 panel-heading">Workout days</div>
    <div class="panel-body">
        <ul class="list-group">
            @forelse($plan->days as $day)
                <li class="list-group-item">
                    {{ $day->name}}
                    <form action="{{ route('plans.days.destroy', [$plan->id, $day->id] ) }}" method="post"
                          class="form-inline">
                        <input type="hidden" class="btn" name="_method" value="delete"/>
                        {{ csrf_field() }}
                        <button class="btn btn-danger">
                            <span class="glyphicon glyphicon-remove" aria-hidden="true"></span>
                        </button>
                    </form>
                </li>
            @empty
                <li class="list-group-item">No days in this program :(</li>
            @endforelse
        </ul>

        {{--        @include('plans.partials.assign-new-user-dropdown')--}}

        <hr/>

        <a class="btn btn-success btn-secondary" data-toggle="modal" data-target="#add-plan-day-modal">
            <i class="glyphicon glyphicon-plus"></i> Add Day
        </a>

    </div>

</div>

@include('plans.partials.add-plan-day-modal')
