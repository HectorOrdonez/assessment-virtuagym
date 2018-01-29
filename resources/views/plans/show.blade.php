@extends('layouts.main')

@section('title', 'Virtuagym Assessment - Home')

@section('content')
    <div class="container">
        <div class="page-header">
            <h1>Plan #{{ $plan->id }}: {{$plan->name}}</h1>
        </div>
    </div>

@endsection
