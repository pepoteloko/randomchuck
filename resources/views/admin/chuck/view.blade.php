@extends('layouts.app')

@section('content')
    <div class="col-6">
        <div class="card" style="margin: 10px">
            <div class="card-body">
                <h5 class="card-title">{{ $chuck->title }}</h5>
                <p class="card-text">{{ $chuck->phrase }}</p>
                <a href="{{ route('chuck.edit', ['id' => $chuck->id]) }}" class="btn btn-primary">Edit</a>
            </div>
        </div>
    </div>
@endsection