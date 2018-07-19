@extends('layouts.app')
@section('content')
<div class="container">
        {!! Form::model($empresa, ['route' => ['empresas.saveasignar', $empresa->id], 'method' => 'POST']) !!}
            @include('admin.empresa.partials.asignar')
        {!! Form::close() !!}
@endsection