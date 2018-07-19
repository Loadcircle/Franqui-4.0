@extends('layouts.app')
@section('content')
<div class="container">
        {!! Form::open(['route' => ['modulos.store']]) !!}
            @include('admin.modulo.partials.form')
        {!! Form::close() !!}
@endsection