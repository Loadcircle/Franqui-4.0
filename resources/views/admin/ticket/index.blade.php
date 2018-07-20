@extends('layouts.app')
@section('content')
<style>
    .pendiente{
        background: #efef96;
    }
    .cerrado{
        background: #b8ffb8;
    }
</style>
<div class="container">
    <h3>Tickets de soporte</h3>  
    @can('tickets.create') 
    <a href="{{ route('tickets.create') }}" class="btn btn-primary float-right my-3">Crear nuevo ticket</a>
    @endcan   
    <table class="table table-hover text-center">
        <thead>
            <tr>
                <th>N° Ticket</th>
                <th>Asunto</th>
                <th>Envia</th>
                <th>Empresa</th>
                <th>Acción</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($tickets as $ticket)
            <tr class="{{statusbg($ticket->status)}}">
                <th>{{$ticket->ticket}}</th>
                <th>{{$ticket->asunto}}</th>
                <th>{{$ticket->maker->name}}</th>
                <th>{{$ticket->empresa->name}}</th>
                <th>
                    @can('tickets.show')             
                    <a href="{{ route('tickets.show', $ticket->id) }}" class="btn btn-sm btn-info">
                        Responder    
                    </a>
                    @endcan
                    @can('tickets.edit') 
                    <a href="{{ route('tickets.edit', $ticket->id) }}" class="btn btn-sm btn-warning">
                        Cambiar Status    
                    </a>   
                    @endcan
                </th>
            </tr>                
            @endforeach
        </tbody>
    </table>
</div>
@endsection