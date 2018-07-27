@extends('layouts.app')
@section('content')
<div class="container">
    <h3>Detalles de la empresa {{$empresa->name}}</h3>
    @if (isset($empresa->logo) && !empty($empresa->logo))
    <img class="img-fluid my-2" style="max-width: 200px" src="{{asset('').$empresa->logo}}" alt="">        
    @endif
    <ul class="list-group">
        <li class="list-group-item"><strong>Razon Social:</strong> {{$empresa->razon_social}}</li>
        <li class="list-group-item"><strong>Nombre:</strong> {{$empresa->name}}</li>
        <li class="list-group-item"><strong>Estado:</strong>
            @if ($empresa->status == 1)
                Activa
            @else
                Inactiva
            @endif
        </li>
        <li class="list-group-item"><strong>Fecha de creacion:</strong> {{$empresa->created_at}}</li>
        <li class="list-group-item"><strong>Ultima Actualización:</strong> {{$empresa->updated_at}}</li>
        <li class="list-group-item"><strong>Actualizado por:</strong> {{$empresa->maker->name}}</li>
    </ul>
    <a class="btn btn-sm btn-danger my-3 float-right" style="color: white;" href="{{ route('empresas.index') }}">Volver</a>
@endsection