@extends('layouts.app')
@section('content')
<div class="container">
    <h3>Detalles de reunion con {{$cita->citado->name}}</h3>
    <ul class="list-group">
        <li class="list-group-item"><strong>Asesor:</strong> {{$cita->responsable->name}}</li>
        <li class="list-group-item"><strong>Asunto:</strong> {{$cita->asunto}}</li>
        <li class="list-group-item"><strong>Lugar:</strong> {{$cita->lugar}}</li>
        <li class="list-group-item"><strong>Comentario:</strong> {{$cita->comentario}}</li>
        <li class="list-group-item"><strong>Hora de inicio:</strong> {{$cita->inicio}}</li>
        <li class="list-group-item"><strong>Hora de finalización:</strong> {{$cita->fin}}</li>
        <li class="list-group-item"><strong>Estado:</strong>
            @if ($cita->status == 1)
                Pendiente
            @elseif ($cita->status == 2)
                Concretada
            @elseif ($cita->status == 3)
                Cancelada
            @endif
        </li>
        <li class="list-group-item"><strong>Actualizado por:</strong> {{$cita->maker->name}}</li>
    </ul>
    <a class="btn btn-sm btn-danger my-3 float-right" style="color: white;" href="{{ route('agendas.index') }}">Volver</a>
@endsection