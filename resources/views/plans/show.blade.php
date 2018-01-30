@extends('layouts.main')

@section('title', 'Virtuagym Assessment - Home')

@section('content')
    <div class="container">
        <div class="page-header">
            <h1>Plan #{{ $plan->id }}: {{$plan->name}}</h1>
        </div>

        <div class="panel panel-default">
            <div class="panel-heading">Users assigned</div>
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
                        <li class="list-group-item">Nobody using this plan :(</li>
                    @endforelse
                </ul>

                @include('plans.partials.assign-new-user-dropdown')

                <hr/>

                <a href="{{ route('home') }}" class="btn btn-default">Back</a>
            </div>

        </div>
    </div>

@endsection
