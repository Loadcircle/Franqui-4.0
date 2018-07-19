@extends('layouts.app')
@section('content')
<div class="container">
        {!! Form::model($herramienta, ['route' => ['herramientas.update', $herramienta->id], 'method' => 'PUT']) !!}
            @include('admin.herramienta.partials.form')
        {!! Form::close() !!}
@endsection