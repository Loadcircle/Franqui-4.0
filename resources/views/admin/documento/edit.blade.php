@extends('layouts.app')
@section('content')
<div class="container">
        {!! Form::model($documento, ['route' => ['doc_herramientas.update', $documento->id], 'method' => 'PUT', 'files' => true , 'enctype' => 'multipart/form-data']) !!}
            @include('admin.documento.partials.form')
        {!! Form::close() !!}
@endsection