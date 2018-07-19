@extends('layouts.app')
@section('content')
<div class="container">
        {!! Form::open(['route' => ['smodulos.store','pmodulo' => $pmodulo]]) !!}
            @include('admin.submodulo.partials.form')
        {!! Form::close() !!}
@endsection