@extends('layouts.main')

@section('title', 'Virtuagym Assessment - Home')

@section('content')
    <div class="container">
        <div class="row">
            <div class="col-md-5 col-md-offset-1">
                <div class="panel panel-default">
                    <div class="panel-heading">Plans</div>

                    <div class="panel-body" id="main-list-plans">
                        @forelse($plans as $plan)
                            <div class="main-list-item">
                                {{ "Plan #{$plan->id}: {$plan->name}" }}

                                <form action="{{ route('plans.destroy', $plan->id ) }}" method="post" class="form-inline">
                                    <input type="hidden" name="_method" value="delete"/>
                                    {{ csrf_field() }}
                                    <button class="btn btn-danger btn-sm">
                                        <span class="glyphicon glyphicon-remove" aria-hidden="true"></span>
                                    </button>
                                </form>
                            </div>
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
                                        <button type="button" class="btn btn-danger">
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
                </div>
            </div>
        </div>
    </div>

    @include('plans.partials.add-plan-modal')
    @include('users.partials.add-user-modal')
@endsection
