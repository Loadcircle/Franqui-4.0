@extends('layouts.app')
@section('content')
<div class="container">
        {!! Form::model($documento, ['route' => ['doc_modulos.update', $documento->id], 'method' => 'PUT', 'files' => true , 'enctype' => 'multipart/form-data']) !!}
            @include('admin.modulo_documento.partials.form')
        {!! Form::close() !!}
@endsection