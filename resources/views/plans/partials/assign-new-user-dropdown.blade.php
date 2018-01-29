@if($availableUsers->count() > 0)
    <div class="dropdown">
        <button class="btn btn-success dropdown-toggle" type="button" id="assign-new-user-dropdown"
                data-toggle="dropdown"
                aria-haspopup="true" aria-expanded="true">
            Assign a new user
            <span class="caret"></span>
        </button>
        <ul class="dropdown-menu" aria-labelledby="assign-new-user-dropdown" id="assign-new-user-list">
            @foreach($availableUsers as $user)
                <li>
                    <form action="{{ route('plans.users.store', $plan->id) }}" method="post">
                        {{ csrf_field() }}

                        <input type="hidden" name="user_id" value="{{ $user->id }}"/>

                        <a class='submit-button' href="#">{{ $user->full_name }}</a>
                    </form>
                </li>
            @endforeach
        </ul>
    </div>
@endif
