@extends('layouts.app')

@section('content')
    @if ($errors->any())
        <div class="alert alert-danger">
            @foreach ($errors->all() as $error)
                <span>{{ $error }}</span><br/>
            @endforeach
        </div>
    @endif

    <div class="col-6">
        <div class="card" style="margin: 10px">
            <div class="card-body">
                <form action="{{ route('chuck.update', ['chuck' => $chuck->id]) }}" method="post">
                    {{ method_field('PATCH') }}
                    {{ csrf_field() }}
                    <div class="form-group">
                        <label for="title">Título</label>
                        <input type="text" value="{{ $chuck->title }}" class="form-control" name="title"
                               placeholder="Título">
                    </div>
                    <div class="form-group">
                        <label for="phrase">Frase</label>
                        <input type="text" value="{{ $chuck->phrase }}" class="form-control" name="phrase"
                               placeholder="Frase">
                    </div>
                    <button type="submit" class="btn btn-primary">Submit</button>
                </form>
            </div>
        </div>
    </div>
@endsection