@extends('layouts.app')
@section('content')
<script src="//cdnjs.cloudflare.com/ajax/libs/moment.js/2.9.0/moment.min.js"></script>
<script src="//cdnjs.cloudflare.com/ajax/libs/fullcalendar/2.2.7/fullcalendar.min.js"></script>
<link rel="stylesheet" href="//cdnjs.cloudflare.com/ajax/libs/fullcalendar/2.2.7/fullcalendar.min.css"/>
<style>
    .fc-content{
        color: white;
    }
    .crear{
        display: none;
    }
    .pendiente{
        background: #efef96;
    }
    .cancelada{
        background: #f19b9b;
    }
    .concretada{
        background: #b8ffb8;
    }
</style>
<div class="container">
    <h3>Calendario de eventos</h3>
    <button id="boton" class="btn btn-primary my-2 float-right">Agendar reunion</button>
    <div style="clear:both"></div>
    <div id="crear" class="crear">
        {!! Form::open(array('route' => 'agendas.store', 'method'=>'POST', 'files' => true)) !!}
            @include('admin.agenda.partials.form')
        {!! Form::close() !!}
    </div>
</div>
<div class="container-fluid">
    <div class="row">
        <div class="col-md-6">
            <table class="table table-hover text-center">
                <thead>
                    <tr>
                        <th>Dia</th>
                        <th>Asunto</th>
                        <th>Cliente</th>
                        <th>Acción</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($citas as $cita)
                    <tr class="{{ statusbg($cita->status) }}">
                        <th>{{$cita->dia}}</th>       
                        <th>{{$cita->asunto}}</th>    
                        <th>{{$cita->citado->name}}</th>    
                        <th>
                            @can('agendas.show') 
                            <a href="{{ route('agendas.show', $cita->id) }}" class="btn btn-sm btn-info">
                                Detalles    
                            </a>
                            @endcan
                            @can('agendas.edit') 
                            <a href="{{ route('agendas.edit', $cita->id) }}" class="btn btn-sm btn-warning">
                                Editar    
                            </a>   
                            @endcan
                        </th>   
                    </tr>                      
                    @endforeach
                </tbody>
            </table>
            {{ $citas->render() }}
            
        </div>
        <div class="col-md-6">
            <div class="card text-center">
                <div class="card-header bg-primary">
                        <h4 style="color: white;">Calendario</h4>
                </div>
                <div class="card-body">
                        {!! $calendar_details->calendar() !!}
                        {!! $calendar_details->script() !!}
                </div>
            </div>
        </div>
</div>
<script>
    document.getElementById("boton").addEventListener("click", function(){
        document.getElementById("crear").classList.toggle("crear");
    });
</script>
@endsection