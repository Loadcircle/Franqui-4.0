@extends('layouts.app')
@section('content')
<div class="container">
    <h1>Lista de Servicios</h1>
    @can('servicios.create') 
    <a href="{{ route('servicios.create') }}" class="btn btn-primary float-right my-3">Crear</a>
    @endcan 
        <table class="table table-striped table-hover text-center">
            <thead>
                <tr>
                    <th>ID</th>
                    <th>Nombre</th>
                    <th>Modulos</th>
                    <th>Estado</th>
                    <th>Acción</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($servicios as $serv)
                <tr>                    
                    <th>{{ $serv->id }}</th>
                    <th>{{ $serv->name }}</th>
                    <th>
                        @if (count($serv->modulos) > 0)
                        <ul>
                            @foreach ($serv->modulos as $modulos)            
                                <li>{{$modulos->name}}</li>
                            @endforeach
                        </ul>
                        @else
                        No posee modulos
                        @endif
                    </th>
                    <th>
                        @if ($serv->status == 1)
                            Activa
                        @else
                            Inactiva
                        @endif
                    </th>
                    <th>
                        @can('servicios.show') 
                        <a href="{{ route('servicios.show', $serv->id) }}" class="btn btn-sm btn-success">
                            Ver    
                        </a>
                        @endcan
                        @can('servicios.edit') 
                        <a href="{{ route('servicios.edit', $serv->id) }}" class="btn btn-sm btn-warning">
                            Editar    
                        </a>   
                        @endcan   
                        @can('servicios.destroy')                   
                        <a href="#" data-toggle="modal" data-target=".eliminar{{$serv->id}}" class="btn btn-sm btn-danger">Eliminar</a>  
                        @endcan
                    </th>
                </tr>
                
                <div style="margin-top: 10%" class="modal fade eliminar{{$serv->id}}" tabindex="-1" role="dialog" aria-labelledby="mySmallModalLabel" aria-hidden="true">
                    <div class="modal-dialog modal-sm">

                        @if (count($serv->modulos) > 0)            
                            <h3 class="text-center" style="color: white; text-shadow: 2px 2px 2px black;">El servicio <strong>{{$serv->name}}</strong> posee modulos creados, porfavor eliminar o reasignar los modulos antes de eliminar el servicio</h3>
                        @else
                            <h3 class="text-center" style="color: white; text-shadow: 2px 2px 2px black;">¿Esta seguro que deseea eliminar el servicio <strong>{{$serv->name}}</strong>?</h3>
                            <h5 class="text-center" style="color: white; text-shadow: 2px 2px 2px black;">Todos los modulos y documentos relacionados con el servicio seran eliminados</h3>
                            <div class="modal-content" style="background: transparent; border: none;">     
                            {!! Form::open(['route' => ['servicios.destroy', $serv->id],
                            'method' => 'DELETE']) !!}
                            <button class="btn btn-sm btn-danger"> Eliminar </button>
                            {!! Form::close() !!}
                            <button class="btn btn-sm btn-primary my-3 text-center" data-dismiss="modal">
                                  Cancelar
                            </button>
                          </div>
                        @endif
                    </div>
                </div>
                @endforeach
            </tbody>
        </table>
        {{ $servicios->render() }}
</div>
@endsection