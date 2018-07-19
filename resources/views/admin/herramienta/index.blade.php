@extends('layouts.app')
@section('content')
<div class="container">
    <h1>Lista de Herramientas</h1>
    @can('herramientas.create') 
    <a href="{{ route('herramientas.create') }}" class="btn btn-primary float-right my-3">Crear</a>
    @endcan 
        <table class="table table-striped table-hover text-center">
            <thead>
                <tr>
                    <th>ID</th>
                    <th>Nombre</th>
                    <th>Servicio</th>
                    <th>Documentos</th>
                    <th>Estado</th>
                    <th>Acción</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($herramientas as $herramienta)
                <tr>
                    <th>{{ $herramienta->id }}</th>
                    <th>{{ $herramienta->name }}</th>
                    <th>{{ $herramienta->servicio->name }}</th>
                    <th>Documentos</th>
                    <th>
                        @if ($herramienta->status == 1)
                            Activo
                        @else
                            Inactivo
                        @endif
                    </th>
                    <th>
                        @can('herramientas.show') 
                        <a href="{{ route('doc_herramientas.index', $herramienta->id) }}" class="btn btn-sm btn-primary">Administrar</a>
                        <a href="{{ route('herramientas.show', $herramienta->id) }}" class="btn btn-sm btn-success">
                            Ver    
                        </a>
                        @endcan
                        @can('herramientas.edit') 
                        <a href="{{ route('herramientas.edit', $herramienta->id) }}" class="btn btn-sm btn-warning">
                            Editar    
                        </a>   
                        @endcan
                        @can('herramientas.destroy')                   
                        <a href="#" data-toggle="modal" data-target=".eliminar{{$herramienta->id}}" class="btn btn-sm btn-danger">Eliminar</a>  
                        @endcan
                    </th>
                </tr>
                
                <div style="margin-top: 10%" class="modal fade eliminar{{$herramienta->id}}" tabindex="-1" role="dialog" aria-labelledby="mySmallModalLabel" aria-hidden="true">
                    <div class="modal-dialog modal-sm">
                        <h3 class="text-center" style="color: white; text-shadow: 2px 2px 2px black;">¿Esta seguro que deseea eliminar el Modulo <strong>{{$herramienta->name}}</strong>?</h3>
                        <h5 class="text-center" style="color: white; text-shadow: 2px 2px 2px black;">Todos los submodulos y documentos relacionados con el modulo seran eliminados</h3>
                      <div class="modal-content" style="background: transparent; border: none;">     
                        {!! Form::open(['route' => ['herramientas.destroy', $herramienta->id],
                        'method' => 'DELETE']) !!}
                        <button class="btn btn-sm btn-danger"> Eliminar </button>
                        {!! Form::close() !!}
                        <button class="btn btn-sm btn-primary my-3" data-dismiss="modal">
                              Cancelar
                        </button>
                      </div>
                    </div>
                </div>
                @endforeach
            </tbody>
        </table>
        {{ $herramientas->render() }}
</div>
@endsection