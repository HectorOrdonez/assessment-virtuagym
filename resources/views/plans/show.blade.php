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
                @forelse($plan->users as $user)
                    <ul class="list-group">
                        <li class="list-group-item">Cras justo odio</li>
                        <li class="list-group-item">Dapibus ac facilisis in</li>
                        <li class="list-group-item">Morbi leo risus</li>
                        <li class="list-group-item">Porta ac consectetur ac</li>
                        <li class="list-group-item">Vestibulum at eros</li>
                    </ul>
                @empty
                    Nobody using this plan :(
                @endforelse

                <hr />

                @include('plans.partials.assign-new-user-dropdown')
            </div>

        </div>
    </div>

@endsection
