@extends('layouts.app')
@section('content')
<div class="container">
    <h3>Conexiones del usuario {{$usuario->name}}</h3>
    <ul class="list-group">
    @foreach ($accesos as $acceso)
        <li class="list-group-item">
                {{$acceso->created_at}}</li>
    @endforeach
    </ul>
    {{ $accesos->render() }}
    <a class="btn btn-sm btn-danger my-3 float-right" style="color: white;" href="{{ route('accesos.index') }}">Volver</a>
@endsection