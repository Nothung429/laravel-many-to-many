@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="card">
            <div class="card-header">
                <h1>{{$category->name}}</h1>
            </div>
            <div class="card-body">
                <div>
                    <h2>Hello Laravel</h2>
                </div>
            </div>
        </div>
    </div>
@endsection