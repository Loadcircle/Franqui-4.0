@extends('layouts.app')
@section('content')
<div class="container">
        {!! Form::open(['route' => ['servicios.store']]) !!}
            @include('admin.servicio.partials.form')
        {!! Form::close() !!}
@endsection