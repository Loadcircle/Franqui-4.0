@extends('layouts.app')
@section('content')
<div class="container">
    <h3>Detalles del usuario {{$usuario->name}}</h3>
    <ul class="list-group">
        <li class="list-group-item"><strong>Nombre:</strong> {{$usuario->name}}</li>
        <li class="list-group-item"><strong>Email:</strong> {{$usuario->email}}</li>
        <li class="list-group-item"><strong>Rol:</strong>
        @if (empty($usuario->r_name))
            No Asignado
        @else
            {{$usuario->r_name}}
        @endif
        </li>
        <li class="list-group-item"><strong>Empresa:</strong>
        @if (isset($usuario->empresa->name) && !empty($usuario->empresa->name))
            {{$usuario->empresa->name}}
        @else
            No asignado
        @endif 
        </li>
        <li class="list-group-item"><strong>Fecha de creacion:</strong> {{$usuario->created_at}}</li>
        <li class="list-group-item"><strong>Ultima Actualización:</strong> {{$usuario->updated_at}}</li>
        <li class="list-group-item"><strong>Actualizado por:</strong> 
        @if (isset($usuario->maker->name) && !empty($usuario->maker->name))
            {{$usuario->maker->name}}
        @else
            Creador no definido
        @endif 
        </li>
    </ul>
    <a class="btn btn-sm btn-danger my-3 float-right" style="color: white;" href="{{ route('usuarios.index') }}">Volver</a>
@endsection