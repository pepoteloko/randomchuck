@extends('layouts.app')

@section('content')
<div class="panel-heading">Frases</div>

<div class="panel-body table-responsive">
    <router-view name="phrasesIndex"></router-view>
    <router-view></router-view>
</div>
@endsection