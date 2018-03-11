@extends('layouts.app')

@section('content')
    <div class="row">
        <div class="col-12">
            <div class="card" style="margin: 10px">
                <a href="{{ route('chuck.create') }}" class="btn btn-primary">Añadir</a>
            </div>
        </div>
        @foreach($chucks as $chuck)
            <div class="col-6">
                <div class="card" style="margin: 10px">
                    <div class="card-body">
                        <h5 class="card-title">{{ $chuck->title }}</h5>
                        <p class="card-text">{{ $chuck->phrase }}</p>
                        <a href="{{ route('chuck.edit', ['id' => $chuck->id]) }}" class="btn btn-primary">Edit</a>
                        <form action="{{ route('chuck.destroy', ['id' => $chuck->id]) }}" method="post">
                            {{ csrf_field() }}
                            {{ method_field('DELETE') }}
                            <button type="submit" class="btn btn-danger">Delete</button>
                        </form>
                    </div>
                </div>
            </div>
        @endforeach
    </div>
@endsection