@extends('layouts.app')
@section('content')
<div class="container">
    <h3>Detalles del documento {{$documento->name}}</h3>

    <ul class="list-group">
        <li class="list-group-item"><strong>Nombre:</strong> {{$documento->name}}</li>     
        <li class="list-group-item"><strong>Empresa:</strong> {{$documento->empresa->name}}</li> 
        <li class="list-group-item"><strong>Herramienta:</strong> {{$documento->pertenece_h->name}}</li>   
        @if (isset($documento->comentario->comentario))
            <li class="list-group-item"><strong>Comentario:</strong> {{$documento->comentario->comentario}}</li>       
        @endif   
        {{--  <li class="list-group-item"><strong>Comentario:</strong> {{$documento->comentario->comentario}}</li>     --}}
        <li class="list-group-item"><strong>Estado:</strong>
            @if ($documento->status == 1)
                Activa
            @else
                Inactiva
            @endif
        </li>
        <li class="list-group-item"><strong>Fecha de creacion:</strong> {{$documento->created_at}}</li>
        <li class="list-group-item"><strong>Ultima Actualización:</strong> {{$documento->updated_at}}</li>
        <li class="list-group-item"><strong>Actualizado por:</strong> {{$documento->maker->name}}</li> 
        <li class="list-group-item"><strong>Descargar:</strong><a href="{{ asset('').$documento->file }}"> Descargar</a></li>
    </ul>
    <a class="btn btn-sm btn-danger my-3 float-right" style="color: white;" href="{{ route('doc_herramientas.index', $documento->herramienta_id) }}">Volver</a>
@endsection