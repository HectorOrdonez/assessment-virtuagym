@extends('layouts.main')

@section('title', 'Virtuagym Assessment - Home')

@section('content')
    <div class="container">
        <div class="row">
            <div class="col-md-5 col-md-offset-1">
                <div class="panel panel-default">
                    <div class="panel-heading">Plans</div>

                    <div class="panel-body">
                        @forelse($plans as $plan)
                            <p>{{ "Plan #{$plan->id}: {$plan->name}" }}</p>
                        @empty
                            No plans at the moment.
                        @endforelse

                        <a class="btn btn-success btn-secondary" data-toggle="modal" data-target="#add-plan-modal">
                            <i class="glyphicon glyphicon-plus"></i> Add Plan
                        </a>
                    </div>
                </div>
            </div>
            <div class="col-md-5">
                <div class="panel panel-default">
                    <div class="panel-heading">Users</div>

                    <div class="panel-body">
                        @forelse($users as $user)
                            <p>{{ "User #{$user->id}: {$user->name}" }}</p>
                        @empty
                            No users at the moment.
                        @endforelse
                        <a class="btn btn-success btn-secondary" data-toggle="modal" data-target="#add-user-modal">
                            <i class="glyphicon glyphicon-plus"></i> Add User
                        </a>
                    </div>
                </div>
            </div>
        </div>
    </div>

    @include('plans.partials.add-plan-modal')
    @include('users.partials.add-user-modal')
@endsection
