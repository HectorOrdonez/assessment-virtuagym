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

            <form action="{{ route('plans.update', $plan->id) }}" class="navbar-form navbar-left" method="post"
                  id="plan-name-form">
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

        @include('plans.users.list')

        @include('plans.days.list')

        <div class="pull-left">
            <a href="{{ route('home') }}" class="btn btn-default">Back</a>
        </div>

        <div class="pull-right">
            <form action="{{ route('plans.destroy', $plan->id) }}" method="post">
                {{ csrf_field() }}
                <input type="hidden" name="_method" value="delete "/>
                <button class="btn btn-danger">Destroy</button>
            </form>
        </div>

    </div>

@endsection

@section('js')
    @parent
    <script src="/js/specifics/plan-name.js"></script>
    <script src="/js/specifics/plan-day-name.js"></script>
    <script src="/js/specifics/exercise-name.js"></script>
@endsection
