@extends('layouts.app')
@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-12">
            <h1>Roles</h1>
            @can('roles.create')
            <a href="{{ route('roles.create') }}" class="btn btn-primary float-right my-3">Crear</a>
            @endcan
            <table class="table table-striped table-hover text-center">
                <thead>
                    <tr>
                        <th>ID</th>
                        <th>Nombre</th>
                        <th>Acción</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($roles as $rol)
                        <tr>
                            <th>{{$rol->id}}</th>
                            <th>{{$rol->name}}</th>
                            <th>
                            @can('roles.show')
                            <a href="{{ route('roles.show', $rol->id) }}" class="btn btn-sm btn-success">
                                Ver    
                            </a>
                            @endcan
                            @can('roles.edit')
                            <a href="{{ route('roles.edit', $rol->id) }}" class="btn btn-sm btn-warning">
                                Editar    
                            </a>
                            @endcan
                            @can('roles.destroy')
                            {!! Form::open(['route' => ['roles.destroy', $rol->id],
                            'method' => 'DELETE', 'style' => 'display: inline']) !!}
                            <button class="btn btn-sm btn-danger"> Eliminar </button>
                            {!! Form::close() !!}
                            @endcan
                            </th>
                        </tr>
                    @endforeach
                </tbody>
            </table>
            {{ $roles->render() }}
        </div>
    </div>
</div>
@endsection