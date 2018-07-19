@extends('layouts.app')
@section('content')
<div class="container">
        {!! Form::model($modulo, ['route' => ['smodulos.update', $modulo->slug], 'method' => 'PUT']) !!}
            @include('admin.submodulo.partials.form')
        {!! Form::close() !!}
@endsection