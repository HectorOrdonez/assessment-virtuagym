<div class="panel-body" id="main-list-users">
    @forelse($users as $user)
        <div class="main-list-item">
            {{ "User #{$user->id}: {$user->full_name}" }}

            <div class="btn-group" role="group">
                {{-- First button --}}
                <button type="button" class="btn btn-default"  data-toggle="modal" data-target="#edit-user-modal-{{ $user->id }}">
                    <span class="glyphicon glyphicon-edit" aria-hidden="true"></span>
                </button>
                @include('users.partials.edit-user-modal', ['user' => $user])

                {{-- Second button needs fake sibling to left --}}
                <form action="{{ route('users.destroy', $user->id ) }}" method="post"
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
        No users at the moment.
    @endforelse

    <a class="btn btn-success btn-secondary" data-toggle="modal" data-target="#add-user-modal">
        <i class="glyphicon glyphicon-plus"></i> Add User
    </a>
</div>

@include('users.partials.add-user-modal')
