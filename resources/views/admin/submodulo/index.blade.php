@extends('layouts.app')
@section('content')
<div class="container">
    <h1>Submodulos de {{ $modulo->name }}</h1>

    @if ($modulo->padre_id == null)
    <a href="{{ route('modulos.index') }}" class="btn btn-success float-left my-3">Volver</a>
    @else
    <a href="{{ route('smodulos',['pmodulo' => $modulo->padre->slug]) }}" class="btn btn-success float-left my-3">Volver</a>
    @endif

    @can('modulos.create') 
    <a href="{{ route('smodulos.create',['pmodulo' => $pmodulo]) }}" class="btn btn-primary float-right my-3">Crear</a>
    @endcan 
        <table class="table table-striped table-hover text-center">
            <thead>
                <tr>
                    <th>ID</th>
                    <th>Nombre</th>
                    <th>Modulo</th>
                    <th>Submodulos</th>
                    <th>Estado</th>
                    <th>Acción</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($modulos as $modulo)
                <tr>
                    <th>{{ $modulo->id }}</th>
                    <th>{{ $modulo->name }}</th>
                    <th>{{ $modulo->padre->name}}</th>
                    <th>                        
                        @if (count($modulo->hijos) > 0)
                        <ul>
                            @foreach ($modulo->hijos as $submodulos)            
                                <li>{{$submodulos->name}}</li>
                            @endforeach
                        </ul>
                        @else
                        No posee submodulos
                        @endif
                    </th>
                    <th>
                        @if ($modulo->status == 1)
                            Activo
                        @else
                            Inactivo
                        @endif
                    </th>
                    <th>
                        @can('modulos.show') 
                        <a href="{{ route('smodulos',['pmodulo' => $modulo->slug]) }}" class="btn btn-sm btn-primary">Administrar</a>
                        <a href="{{ route('smodulos.show', $modulo->slug) }}" class="btn btn-sm btn-success">
                            Ver    
                        </a>
                        @endcan
                        @can('modulos.edit') 
                        <a href="{{ route('smodulos.edit', $modulo->slug) }}" class="btn btn-sm btn-warning">
                            Editar    
                        </a>   
                        @endcan   
                        @can('modulos.move') 
                        <a href="{{ route('smodulos.move', $modulo->id) }}" class="btn btn-sm btn-info">
                            Mover    
                        </a>   
                        @endcan
                        @can('modulos.destroy')                   
                        <a href="#" data-toggle="modal" data-target=".eliminar{{$modulo->id}}" class="btn btn-sm btn-danger">Eliminar</a>  
                        @endcan
                    </th>
                </tr>
                
                <div style="margin-top: 10%" class="modal fade eliminar{{$modulo->id}}" tabindex="-1" role="dialog" aria-labelledby="mySmallModalLabel" aria-hidden="true">
                    <div class="modal-dialog modal-sm">
                        @if (count($modulo->hijos) > 0)            
                            <h3 class="text-center" style="color: white; text-shadow: 2px 2px 2px black;">El Modulo <strong>{{$modulo->name}}</strong> posee submodulos creados, porfavor eliminar o reasignar los submodulos antes de eliminar el modulo</h3>
                        @else
                        <h3 class="text-center" style="color: white; text-shadow: 2px 2px 2px black;">¿Esta seguro que deseea eliminar el Modulo <strong>{{$modulo->name}}</strong>?</h3>
                        <h5 class="text-center" style="color: white; text-shadow: 2px 2px 2px black;">Todos los submodulos y documentos relacionados con el modulo seran eliminados</h3>
                      <div class="modal-content" style="background: transparent; border: none;">     
                        {!! Form::open(['route' => ['smodulos.destroy', $modulo->id],
                        'method' => 'DELETE']) !!}
                        <button class="btn btn-sm btn-danger"> Eliminar </button>
                        {!! Form::close() !!}
                        <button class="btn btn-sm btn-primary my-3" data-dismiss="modal">
                              Cancelar
                        </button>
                      </div>
                      @endif
                    </div>
                </div>
                @endforeach
            </tbody>
        </table>
        {{ $modulos->render() }}
        <hr>

    <a href="{{ route('doc_modulos.create', $pmodulo) }}" class="btn btn-primary float-right my-3">Cargar documento</a>
    <table class="table table-striped table-hover text-center">
        <thead>
            <tr>
                <th>ID</th>
                <th>Nombre</th>
                <th>Documento</th>
                <th>empresa</th>
                <th>Estado</th>
                <th>Acción</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($documentos as $documento)
            <tr>
                <th>{{ $documento->id }}</th>
                <th>{{ $documento->name }}</th>
                <th><a href="{{ asset('').$documento->file }}">Descargar</a></th>
                <th>{{ $documento->empresa->name }}</th>
                <th>
                    @if ($documento->status == 1)
                        Activo
                    @else
                        Inactivo
                    @endif
                </th>
                <th>
                    @can('herramientas.show')             
                    <a href="{{ route('doc_modulos.show', $documento->id) }}" class="btn btn-sm btn-success">
                        Ver    
                    </a>
                    @endcan
                    @can('herramientas.edit') 
                    <a href="{{ route('doc_modulos.edit', $documento->id) }}" class="btn btn-sm btn-warning">
                        Editar    
                    </a>   
                    @endcan
                    @can('herramientas.destroy')                   
                    <a href="#" data-toggle="modal" data-target=".eliminar{{$documento->id}}" class="btn btn-sm btn-danger">Eliminar</a>  
                    @endcan
                </th>
            </tr>
            
            <div style="margin-top: 10%" class="modal fade eliminar{{$documento->id}}" tabindex="-1" role="dialog" aria-labelledby="mySmallModalLabel" aria-hidden="true">
                <div class="modal-dialog modal-sm">
                    <h3 class="text-center" style="color: white; text-shadow: 2px 2px 2px black;">¿Esta seguro que deseea eliminar el documento <strong>{{$documento->name}}</strong>?</h3>
                  <div class="modal-content" style="background: transparent; border: none;">     
                    {!! Form::open(['route' => ['doc_modulos.destroy', $documento->id],
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
</div>
@endsection