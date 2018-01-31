<div class="panel panel-default">
    <div class="panel-body">
        <ul class="list-group">
            @forelse($day->exercises as $exercise)
                <li class="list-group-item">
                    <div class="exercise-text-container">
                        <div class="regular-text">{{ $exercise->name}}</div>

                        <div class="text-left btn-group" role="group">
                            <a type="button" class="btn btn-default exercise-name-switcher">
                                <span class="glyphicon glyphicon-edit" aria-hidden="true"></span>
                            </a>

                            <form action="{{ route('plans.days.exercises.destroy', [$plan->id, $day->id, $exercise->id] ) }}"
                                  method="post" class="form-inline btn-group">
                                <input type="hidden" class="btn" name="_method" value="delete"/>
                                {{ csrf_field() }}
                                <button class="btn btn-danger">
                                    <span class="glyphicon glyphicon-remove" aria-hidden="true"></span>
                                </button>
                            </form>
                        </div>
                    </div>

                    <div class="exercise-input-container">
                        <form action="{{route('plans.days.exercises.update', [$plan->id, $day->id, $exercise->id] )}}"
                              method="post">
                            <div class="input-group col-md-6">
                                {{ csrf_field() }}
                                <input type="hidden" name="_method" value="put"/>

                                <input type="text" class="form-control disabled-enter" name="name"
                                       value="{{ $exercise->name }}">
                                <a class="btn input-group-addon btn-success exercise-name-submitter">
                                    <span class="input-group-text glyphicon glyphicon-ok" aria-hidden="true"></span>
                                </a>
                            </div>
                        </form>
                    </div>
                </li>
            @empty
                <li class="list-group-item">No exercises in this day.</li>
            @endforelse
        </ul>

        <hr/>

        <a class="btn btn-success btn-secondary" data-toggle="modal" data-target="#add-exercise-modal-{{ $day->id }}">
            <i class="glyphicon glyphicon-plus"></i> Add Exercise
        </a>
        @include('plans.exercises.add-modal')

    </div>

</div>

