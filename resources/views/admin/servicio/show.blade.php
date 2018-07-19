@extends('layouts.app')
@section('content')
<div class="container">
    <h3>Detalles de la empresa {{$servicio->name}}</h3>
    <ul class="list-group">
        <li class="list-group-item"><strong>Nombre:</strong> {{$servicio->name}}</li>
        <li class="list-group-item"><strong>Url:</strong> {{$servicio->slug}}</li>
        <li class="list-group-item"><strong>Estado:</strong>
            @if ($servicio->status == 1)
                Activa
            @else
                Inactiva
            @endif
        </li>
        <li class="list-group-item"><strong>Fecha de creacion:</strong> {{$servicio->created_at}}</li>
        <li class="list-group-item"><strong>Ultima Actualización:</strong> {{$servicio->updated_at}}</li>
        <li class="list-group-item"><strong>Actualizado por:</strong> {{$servicio->maker->name}}</li>
        <li class="list-group-item"><strong>Modulos:</strong>
        @if (count($servicio->modulos) > 0)
            <ul>
                @foreach ($servicio->modulos as $modulos)            
                    <li>{{$modulos->name}}</li>
                @endforeach
            </ul>
        @else
            No posee modulos            
        @endif
        </li>
        
    </ul>
    <a class="btn btn-sm btn-danger my-3 float-right" style="color: white;" href="{{ route('servicios.index') }}">Volver</a>
@endsection