<div class="dropdown">
    <button class="btn btn-success dropdown-toggle" type="button" id="assign-new-user-dropdown" data-toggle="dropdown"
            aria-haspopup="true" aria-expanded="true">
        Assign a new user
        <span class="caret"></span>
    </button>
    <ul class="dropdown-menu" aria-labelledby="assign-new-user-dropdown">
        @foreach($availableUsers as $user)
            <li><a href="#">{{ $user->full_name }}</a></li>
        @endforeach
    </ul>
</div>
