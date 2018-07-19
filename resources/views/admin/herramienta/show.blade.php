@extends('layouts.app')
@section('content')
<div class="container">
    <h3>Detalles del Herramienta {{$herramienta->name}}</h3>
    <ul class="list-group">
        <li class="list-group-item"><strong>Nombre:</strong> {{$herramienta->name}}</li>        
        <li class="list-group-item"><strong>Servicio:</strong> {{$herramienta->servicio->name}}</li>
        <li class="list-group-item"><strong>Url:</strong> {{$herramienta->slug}}</li>
        <li class="list-group-item"><strong>Estado:</strong>
            @if ($herramienta->status == 1)
                Activa
            @else
                Inactiva
            @endif
        </li>
        <li class="list-group-item"><strong>Fecha de creacion:</strong> {{$herramienta->created_at}}</li>  

        <li class="list-group-item"><strong>Documentos:</strong> 
        {{--  @if (count($herramienta->hijos) > 0)      
        <ul>
                @foreach ($herramienta->hijos as $mod)            
                    <li>{{$mod->name}}</li>
                @endforeach
        </ul>
        @else
            No posee sub herramientas
        @endif  --}}
        </li>

        <li class="list-group-item"><strong>Fecha de creacion:</strong> {{$herramienta->created_at}}</li>
        <li class="list-group-item"><strong>Ultima Actualización:</strong> {{$herramienta->updated_at}}</li>
        <li class="list-group-item"><strong>Actualizado por:</strong> {{$herramienta->maker->name}}</li>
    </ul>
    <a class="btn btn-sm btn-danger my-3 float-right" style="color: white;" href="{{ route('herramientas.index') }}">Volver</a>
@endsection