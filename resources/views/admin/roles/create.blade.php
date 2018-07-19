@extends('layouts.app')
@section('content')
<div class="container">
    {!! Form::open(['route' => ['roles.store']]) !!}
        @include('admin.roles.partials.form')
    {!! Form::close() !!}
</div>

@endsection