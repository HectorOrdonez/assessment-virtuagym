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
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
