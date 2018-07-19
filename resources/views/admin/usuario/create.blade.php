@extends('layouts.app')
@section('content')
<div class="container">
        {!! Form::open(['route' => ['usuarios.store'] ]) !!}
            @include('admin.usuario.partials.form')
        {!! Form::close() !!}
@endsection