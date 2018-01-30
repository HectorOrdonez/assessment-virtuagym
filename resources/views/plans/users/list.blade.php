<div class="panel panel-default">
    <div class="h4 panel-heading">Users assigned</div>
        <div class="panel-body">
        <ul class="list-group">
            @forelse($plan->users as $user)
                <li class="list-group-item">
                    {{ $user->full_name }}
                    <form action="{{ route('plans.users.destroy', [$plan->id, $user->id] ) }}" method="post"
                          class="form-inline">
                        <input type="hidden" class="btn" name="_method" value="delete"/>
                        {{ csrf_field() }}
                        <button class="btn btn-danger">
                            <span class="glyphicon glyphicon-remove" aria-hidden="true"></span>
                        </button>
                    </form>
                </li>
            @empty
                <li class="list-group-item">Nobody using this plan.</li>
            @endforelse
        </ul>

        @include('plans.users.assign-dropdown')
    </div>

</div>
