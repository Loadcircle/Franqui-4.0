@extends('layouts.app')
@section('content')
<div class="container">
    <h3>Detalles del modulo {{$modulo->name}}</h3>
    <ul class="list-group">
        <li class="list-group-item"><strong>Nombre:</strong> {{$modulo->name}}</li>        
        <li class="list-group-item"><strong>Servicio:</strong> {{$modulo->servicio->name}}</li>
        <li class="list-group-item"><strong>Url:</strong> {{$modulo->slug}}</li>
        <li class="list-group-item"><strong>Estado:</strong>
            @if ($modulo->status == 1)
                Activa
            @else
                Inactiva
            @endif
        </li>
        <li class="list-group-item"><strong>Fecha de creacion:</strong> {{$modulo->created_at}}</li>  

        <li class="list-group-item"><strong>Sub Modulos:</strong> 
        @if (count($modulo->hijos) > 0)      
        <ul>
                @foreach ($modulo->hijos as $mod)            
                    <li>{{$mod->name}}</li>
                @endforeach
        </ul>
        @else
            No posee sub modulos
        @endif
        </li>

        <li class="list-group-item"><strong>Fecha de creacion:</strong> {{$modulo->created_at}}</li>
        <li class="list-group-item"><strong>Ultima Actualización:</strong> {{$modulo->updated_at}}</li>
        <li class="list-group-item"><strong>Actualizado por:</strong> {{$modulo->maker->name}}</li>
    </ul>
    <a class="btn btn-sm btn-danger my-3 float-right" style="color: white;" href="{{ route('modulos.index') }}">Volver</a>
@endsection