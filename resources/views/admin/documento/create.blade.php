@extends('layouts.app')
@section('content')
<div class="container">
        {!! Form::open(['route' => ['doc_herramientas.store', $id], 'files' => true, 'enctype' => 'multipart/form-data']) !!}
            @include('admin.documento.partials.form')
        {!! Form::close() !!}    
</div>
@endsection