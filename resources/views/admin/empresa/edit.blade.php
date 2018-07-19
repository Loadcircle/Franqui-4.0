@extends('layouts.app')
@section('content')
<div class="container">
        {!! Form::model($empresa, ['route' => ['empresas.update', $empresa->id], 'method' => 'PUT', 'files' => true , 'enctype' => 'multipart/form-data']) !!}
            @include('admin.empresa.partials.form')
        {!! Form::close() !!}
@endsection