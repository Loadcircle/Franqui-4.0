@extends('layouts.app')
@section('content')
<div class="container">
        {!! Form::model($usuario, ['route' => ['usuarios.update', $usuario->id], 'method' => 'PUT']) !!}
            @include('admin.usuario.partials.form')
        {!! Form::close() !!}
@endsection