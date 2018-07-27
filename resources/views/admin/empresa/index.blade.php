@extends('layouts.app')
@section('content')
<div class="container">
    <h1>Lista de Empresas</h1>
    @can('empresas.create') 
    <a href="{{ route('empresas.create') }}" class="btn btn-primary float-right my-3">Crear</a>
    @endcan 
        <table class="table table-striped table-hover text-center">
            <thead>
                <tr>
                    <th>ID</th>
                    <th>Nombre</th>
                    <th>Razon Social</th>
                    <th>Estatus</th>
                    <th>Logo</th>
                    <th>Acción</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($empresas as $empresa)
                <tr>
                    <th>{{ $empresa->id }}</th>
                    <th>{{ $empresa->name }}</th>
                    <th>{{ $empresa->razon_social }}</th>
                    <th>
                        @if ($empresa->status == 1)
                            Activa
                        @else
                            Inactiva
                        @endif
                    </th>
                    <th>
                        <img width="50px" src="{{ asset('').$empresa->logo }}" alt="">
                    </th>
                    <th>
                        @can('empresas.show') 
                        <a href="{{ route('empresas.show', $empresa->id) }}" class="btn btn-sm btn-success">
                            Ver    
                        </a>
                        @endcan
                        @can('empresas.edit') 
                        <a href="{{ route('empresas.edit', $empresa->id) }}" class="btn btn-sm btn-warning">
                            Editar    
                        </a>   
                        <a href="{{ route('empresas.asignar', $empresa->id) }}" class="btn btn-sm btn-info">
                            Servicio    
                        </a>   
                        @endcan   
                        @can('empresas.destroy')                   
                        <a href="#" data-toggle="modal" data-target=".eliminar{{$empresa->id}}" class="btn btn-sm btn-danger">Eliminar</a>  
                        @endcan
                    </th>
                </tr>
                
                <div style="margin-top: 10%" class="modal fade eliminar{{$empresa->id}}" tabindex="-1" role="dialog" aria-labelledby="mySmallModalLabel" aria-hidden="true">
                    <div class="modal-dialog modal-sm">
                        <h3 class="text-center" style="color: white; text-shadow: 2px 2px 2px black;">¿Esta seguro que deseea eliminar la empresa <strong>{{$empresa->name}}</strong>?</h3>
                        <h5 class="text-center" style="color: white; text-shadow: 2px 2px 2px black;">Todos los registros y usuarios relacionados con la empresa seran eliminados</h3>
                      <div class="modal-content" style="background: transparent; border: none;">     
                        {!! Form::open(['route' => ['empresas.destroy', $empresa->id],
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
        {{ $empresas->render() }}
</div>
@endsection