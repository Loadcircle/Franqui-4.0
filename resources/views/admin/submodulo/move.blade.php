@extends('layouts.app')
@section('content')
<div class="container">
    <h1>Mover Submodulo {{$modulo->name}}</h1>
        {!! Form::model($modulo, ['route' => ['smodulos.saveMove', $modulo->id], 'method' => 'POST']) !!}
            @include('admin.submodulo.partials.moveform')
        {!! Form::close() !!}
@endsection