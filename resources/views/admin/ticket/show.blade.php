@extends('layouts.app')
@section('content')
<div class="container">
    <h5>Historial del ticket N° <strong>{{$tickets->ticket}}</strong></h5>
    <h5>Empresa: <strong>{{$tickets->empresa->name}}</strong></h5>
    <h5>Asunto: <strong>{{$tickets->asunto}}</strong></h5>
    <h5>Estado: 
        @if ($tickets->status == 1)
            Pendiente
        @elseif ($tickets->status == 2)
            Ticket Cerrado
        @endif
    </h5>
    @foreach ($tickets->mensaje as $mensaje)
    <ul class="list-group">
        <li class="list-group-item"><strong>{{$mensaje->created_at}}</strong> </li>
        <li class="list-group-item"><strong>Comentario:</strong> {{$mensaje->mensaje}}</li>
        <li class="list-group-item"><strong>Envia:</strong> {{$mensaje->maker->name}}</li>
    </ul>        
    @endforeach

    <a class="btn btn-sm btn-danger my-3 float-right" style="color: white;" href="{{ route('tickets.index') }}">Volver</a>
    <br><br>
    {!! Form::open(['route' => ['tickets.store'], 'method' => 'POST']) !!}
    @include('admin.ticket.partials.form')
    {!! Form::close() !!}
    
@endsection