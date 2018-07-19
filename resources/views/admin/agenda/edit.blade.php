@extends('layouts.app')
@section('content')
<div class="container">
        {!! Form::model($cita, ['route' => ['agendas.update', $cita->id], 'method' => 'PUT', 'files' => true , 'enctype' => 'multipart/form-data']) !!}
            @include('admin.agenda.partials.form')
        {!! Form::close() !!}
        <a class="btn btn-sm btn-danger my-3 float-right" style="color: white;" href="{{ route('agendas.index') }}">Volver</a>
@endsection