@extends('layouts.app')
@section('content')
<div class="container">
        {!! Form::model($modulo, ['route' => ['modulos.update', $modulo->id], 'method' => 'PUT']) !!}
            @include('admin.modulo.partials.form')
        {!! Form::close() !!}
@endsection