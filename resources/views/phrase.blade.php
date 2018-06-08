@extends('layouts.app')

@section('content')
    <div class="jumbotron">
        <h1 class="title">
            <span style="">Chuck Dice!</span>
        </h1>
        <h2 class="phrase">{{ $phrase->phrase }}</h2>
        <p class="">{{ $phrase->title }}</p>
    </div>

    <div id="app">
    </div>
@endsection