@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card text-center">
                <h3 class="card-header">Welcome {{ucfirst(Auth::user()->name)}}</h3>

                <div class="card-body">
                   <a href="{{route('cinema.index')}}" class="btn btn-success">Click to create or add cinema</a>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
