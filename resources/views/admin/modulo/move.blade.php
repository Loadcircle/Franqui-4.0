@extends('layouts.app')
@section('content')
<div class="container">
    <h1>Mover Modulo {{$modulo->name}}</h1>
        {!! Form::model($modulo, ['route' => ['modulos.saveMove', $modulo->id], 'method' => 'POST']) !!}
            @include('admin.modulo.partials.moveform')
        {!! Form::close() !!}
@endsection