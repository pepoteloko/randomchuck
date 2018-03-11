@extends('layouts.app')

@section('content')
    <div class="col-6">
        <div class="card" style="margin: 10px">
            <div class="card-body">
                <form action="{{ route('chuck.update', ['chuck' => $chuck->id]) }}" method="post">
                    {{ method_field('PUT') }}
                    {{ csrf_field() }}
                    <div class="form-group">
                        <label for="title">Título</label>
                        <input type="text" value="{{ $chuck->title }}" class="form-control" id="title"
                               placeholder="Título">
                    </div>
                    <div class="form-group">
                        <label for="phrase">Frase</label>
                        <input type="text" value="{{ $chuck->phrase }}" class="form-control" id="phrase"
                               placeholder="Frase">
                    </div>
                    <button type="submit" class="btn btn-primary">Submit</button>
                </form>
            </div>
        </div>
    </div>
@endsection