@extends('layouts.app')
@section('content')
<div class="container">
<h1>Control de Accesos</h1>

    <table class="table table-striped table-hover text-center">
        <thead>
            <tr>
                <th>Nombre</th>
                <th>Empresa</th>
                <th>Ultima Conexión</th>
                <th>Acciones</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($accesos as $acceso)
            <tr>
                <th>{{ $acceso->u_name }}</th>
                <th>{{ $acceso->e_name }}</th>
                <th>{{ $acceso->created_at }}</th>
                <th>                    
                    <a href="{{ route('accesos.show', ['id' => $acceso->user_id]) }}" class="btn btn-sm btn-info">
                        Ver Historial   
                    </a>
                </th>
            </tr>
            
            @endforeach
        </tbody>
    </table>
    {{ $accesos->render() }}
@endsection