@extends('layouts.main')

@section('title', 'Virtuagym Assessment - Home')

@section('content')
    <div class="container">
        <div class="btn-group">
            <h1 id="plan-title">
                Plan #{{ $plan->id }}: {{$plan->name}}

                <button type="button" class="btn btn-default" id="button-plan-name-switcher">
                    <span class="glyphicon glyphicon-edit" aria-hidden="true"></span>
                </button>
            </h1>

            <form action="{{ route('plans.update', $plan->id) }}" class="navbar-form navbar-left" method="post" id="plan-name-form">
                {{ csrf_field() }}
                <input type="hidden" name="_method" value="put"/>

                <div class="form-group">
                    <input type="text" class="form-control" placeholder="New name" value="{{ $plan->name }}" name='name'
                           id="plan-name-input">
                </div>
                <button type="button" class="btn btn-success" id="plan-name-form-submitter">
                    <span class="glyphicon glyphicon-ok" aria-hidden="true"></span>
                </button>
            </form>
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

@section('js')
    @parent
    <script src="/js/specifics/plan-show.js"></script>
@endsection
