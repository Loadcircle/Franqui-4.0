@extends('layouts.app')
@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">Lista de clientes</div>
                <div class="card-body">
                    @if (session('status'))
                        <div class="alert alert-success" role="alert">
                            {{ session('status') }}
                        </div>
                    @endif
                    @if (empty(count($notificaciones_h)) && empty(count($notificaciones_m)) && empty(count($notificaciones_r)))
                        <h3 class="text-center">No hay notificaciones</h3>                        
                    @endif
                        <ul class="list-group"> 
                        @if (!empty($notificaciones_r))
                            @foreach ($notificaciones_r as $not)
                            <li class="list-group-item">
                                Se ha 
                                    <strong>
                                        @if ($not->type == 1)
                                            Agendado
                                        @elseif ($not->type == 2)
                                            Reprogramado
                                        @endif
                                    </strong>
                                una reunion con
                                @if (!empty($not->responsable->name))
                                <strong>{{$not->responsable->name}}</strong>
                                @endif                   
                                para el dia <strong>{{$not->dia}}</strong>
                            </li>                    
                            @endforeach
                        @endif     
                        @if (!empty($notificaciones_h))
                            @foreach ($notificaciones_h as $not)
                            <li class="list-group-item">
                                Se ha 
                                    <strong>
                                        @if ($not->type == 1)
                                            Cargado
                                        @elseif ($not->type == 2)
                                            Editado
                                        @elseif ($not->type == 3)
                                            Eliminado
                                        @endif
                                    </strong>
                                un documento en la herramienta 
                                @if (!empty($not->pertenece_h->name))
                                <strong>{{$not->pertenece_h->name}}</strong>
                                @endif                   
                                Por <strong>{{$not->maker->name}}</strong>
                            </li>                    
                            @endforeach
                        @endif     
                        @if (!empty($notificaciones_m))
                            @foreach ($notificaciones_m as $not)
                            <li class="list-group-item">
                                Se ha 
                                    <strong>
                                        @if ($not->type == 1)
                                            Cargado
                                        @elseif ($not->type == 2)
                                            Editado
                                        @elseif ($not->type == 3)
                                            Eliminado
                                        @endif
                                    </strong>
                                un documento en el modulo 
                                @if (!empty($not->pertenece_m->name))
                                <strong>{{$not->pertenece_m->name}}</strong>
                                @endif                   
                                Por <strong>{{$not->maker->name}}</strong>
                            </li>                    
                            @endforeach
                        @endif    
                        </ul>            
                </div>
            </div>
        </div>
    </div>
</div>
@endsection