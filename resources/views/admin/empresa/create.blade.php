@extends('layouts.app')
@section('content')
<div class="container">
        {!! Form::open(['route' => ['empresas.store'], 'files' => true , 'enctype' => 'multipart/form-data']) !!}
            @include('admin.empresa.partials.form')
        {!! Form::close() !!}
@endsection