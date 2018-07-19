@extends('layouts.app')
@section('content')
<div class="container">
        {!! Form::open(['route' => ['herramientas.store']]) !!}
            @include('admin.herramienta.partials.form')
        {!! Form::close() !!}
@endsection