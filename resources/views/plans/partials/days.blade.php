<div class="panel panel-default">
    <div class="h4 panel-heading">Workout days</div>
    <div class="panel-body">
        <ul class="list-group">
            @forelse($plan->days as $day)
                <li class="list-group-item">
                    <div class="text-container">
                        <div class="regular-text">{{ $day->name}}</div>

                        <div class="text-left btn-group" role="group">
                            <a type="button" class="btn btn-default day-name-switcher">
                                <span class="glyphicon glyphicon-edit" aria-hidden="true"></span>
                            </a>

                            <form action="{{ route('plans.days.destroy', [$plan->id, $day->id] ) }}" method="post"
                                  class="form-inline btn-group">
                                <input type="hidden" class="btn" name="_method" value="delete"/>
                                {{ csrf_field() }}
                                <button class="btn btn-danger">
                                    <span class="glyphicon glyphicon-remove" aria-hidden="true"></span>
                                </button>
                            </form>
                        </div>
                    </div>

                    <div class="input-container">
                        <form action="{{route('plans.days.update', [$plan->id, $day->id] )}}" method="post">
                            <div class="input-group col-md-6">
                                {{ csrf_field() }}
                                <input type="hidden" name="_method" value="put"/>

                                <input type="text" class="form-control disabled-enter" name="name" value="{{ $day->name }}">
                                <a class="btn input-group-addon btn-success plan-day-name-submitter">
                                    <span class="input-group-text glyphicon glyphicon-ok" aria-hidden="true"></span>
                                </a>
                            </div>
                        </form>
                    </div>

                    <hr/>
                    @include('plans.partials.exercises')
                </li>
            @empty
                <li class="list-group-item">No days in this program :(</li>
            @endforelse
        </ul>

        <hr/>

        <a class="btn btn-success btn-secondary" data-toggle="modal" data-target="#add-plan-day-modal">
            <i class="glyphicon glyphicon-plus"></i> Add Day
        </a>

    </div>

</div>

@include('plans.partials.add-plan-day-modal')
