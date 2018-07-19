@extends('layouts.app')
@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-12">
            <h1>Usuarios</h1>
            @can('usuarios.create') 
            <a href="{{ route('usuarios.create') }}" class="btn btn-primary float-right my-3">Crear</a>
            @endcan
            <table class="table table-striped table-hover text-center">
                <thead>
                    <tr>
                        <th>ID</th>
                        <th>Nombre</th>
                        <th>Empresa</th>
                        <th>Rol</th>
                        <th>Acción</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($users as $us)
                        <tr>
                            <th>{{$us->id}}</th>
                            <th>{{$us->name}}</th>
                            <th>
                            @if (empty($us->e_name))
                                No Asignado
                            @else
                                {{$us->e_name}}
                            @endif
                            </th>
                            <th>
                            @if (empty($us->r_name))
                                No Asignado
                            @else
                                {{$us->r_name}}
                            @endif
                            </th>
                            <th>
                            @can('usuarios.show') 
                            <a href="{{ route('usuarios.show', $us->id) }}" class="btn btn-sm btn-success">
                                Ver    
                            </a>
                            @endcan
                            @can('usuarios.edit') 
                            <a href="{{ route('usuarios.edit', $us->id) }}" class="btn btn-sm btn-warning">
                                Editar    
                            </a>
                            @endcan
                            @can('usuarios.destroy') 
                            {!! Form::open(['route' => ['usuarios.destroy', $us->id],
                            'method' => 'DELETE', 'style' => 'display: inline']) !!}
                            <button class="btn btn-sm btn-danger"> Eliminar </button>
                            {!! Form::close() !!}
                            @endcan
                            </th>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>
</div>
@endsection