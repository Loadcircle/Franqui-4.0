@extends('layouts.app')
@section('content')
<div class="container">
    
        <h3>Detalles del Rol {{$roles->admin}}</h3>
        <ul class="list-group">
            <li class="list-group-item"><strong>Nombre:</strong> {{$roles->name}}</li>
            <li class="list-group-item"><strong>Slug</strong> {{$roles->slug}}</li>
            <li class="list-group-item"><strong>Ultima Actualización:</strong> {{$roles->updated_at}}</li>
            <li class="list-group-item"><strong>Descripción:</strong> {{$roles->description}}</li>
        </ul>
        <a class="btn btn-sm btn-danger my-3 float-right" style="color: white;" href="{{ route('roles.index') }}">Volver</a>
</div>

@endsection