@extends('layouts.app')

@section('content')
    <div class="col-6">
        <div class="card" style="margin: 10px">
            <div class="card-body">
                <form action="{{ route('chuck.store') }}" method="post">
                    {{ csrf_field() }}
                    <div class="form-group">
                        <label for="title">Título</label>
                        <input type="text" value="" class="form-control" name="title" placeholder="Título">
                    </div>
                    <div class="form-group">
                        <label for="phrase">Frase</label>
                        <input type="text" value="" class="form-control" name="phrase" placeholder="Frase">
                    </div>
                    <button type="submit" class="btn btn-primary">Create</button>
                </form>
            </div>
        </div>
    </div>
@endsection