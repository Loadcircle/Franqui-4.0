@extends('layouts.app')
@section('content')
<div class="container">

    {!! Form::model($roles, ['route' => ['roles.update', $roles->id],
    'method' => 'PUT']) !!}
        @include('admin.roles.partials.form')
    {!! Form::close() !!}

</div>

@endsection