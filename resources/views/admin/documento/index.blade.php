@extends('layouts.app')
@section('content')
<div class="container">
    <h1>Documentos de la herramienta {{$herramienta->name}}</h1>

    @can('herramientas.create') 
    <a href="{{ route('doc_herramientas.create', $id) }}" class="btn btn-primary float-right my-3">Cargar Documento</a>
    @endcan 
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
                        <a href="{{ route('doc_herramientas.show', $documento->id) }}" class="btn btn-sm btn-success">
                            Ver    
                        </a>
                        @endcan
                        @can('herramientas.edit') 
                        <a href="{{ route('doc_herramientas.edit', $documento->id) }}" class="btn btn-sm btn-warning">
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
                        {!! Form::open(['route' => ['doc_herramientas.destroy', $documento->id],
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