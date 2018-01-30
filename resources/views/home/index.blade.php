@extends('layouts.main')

@section('title', 'Virtuagym Assessment - Home')

@section('content')
    <div class="container">
        <div class="row">
            <div class="col-md-5 col-md-offset-1">
                <div class="panel panel-default">
                    <div class="panel-heading">Plans</div>

                    @include('home.partials.main-list-plans')
                </div>
            </div>
            <div class="col-md-5">
                <div class="panel panel-default">
                    <div class="panel-heading">Users</div>

                    @include('home.partials.main-list-users')
                </div>
            </div>
        </div>
    </div>
@endsection
