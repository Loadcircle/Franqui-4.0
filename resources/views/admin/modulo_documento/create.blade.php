@extends('layouts.app')
@section('content')
<div class="container">
        {!! Form::open(['route' => ['doc_modulos.store', $slug], 'files' => true, 'enctype' => 'multipart/form-data']) !!}
            @include('admin.modulo_documento.partials.form')
        {!! Form::close() !!}    
</div>
@endsection