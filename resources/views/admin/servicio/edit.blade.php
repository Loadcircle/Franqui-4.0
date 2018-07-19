@extends('layouts.app')
@section('content')
<div class="container">
        {!! Form::model($servicio, ['route' => ['servicios.update', $servicio->id], 'method' => 'PUT']) !!}
            @include('admin.servicio.partials.form')
        {!! Form::close() !!}
@endsection