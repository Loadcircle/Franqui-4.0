@extends('layouts.cliente')
@section('content')
@foreach ($servicios as $servicio)
    {{$servicio->name}}
        <ul>
            @foreach ($servicio->modulos as $modulos)
                <li>{{$modulos->name}}      
                    @foreach ($modulos->documentos as $documentos)
                        <a href="{{ asset('/').$documentos->documentos->file}}">{{$documentos->documentos->name}}</a>
                    @endforeach    
                    <ul>
                    @foreach ($modulos->hijos as $submodulos)
                        <li>
                            {{$submodulos->name}}
                               
                                @foreach ($submodulos->documentos as $documentos)
                                <a href="{{ asset('/').$documentos->documentos->file}}">{{$documentos->documentos->name}}</a>
                            @endforeach    
                            <ul>
                                    @if (count($submodulos->hijos) > 0)
                                        @foreach ($submodulos->hijos as $shijos)
                                        <li> 
                                            {{$shijos->name}}
                                            
                                @foreach ($shijos->documentos as $documentos)
                                <a href="{{ asset('/').$documentos->documentos->file}}">{{$documentos->documentos->name}}</a>
                            @endforeach    
                                                <ul>
                                                        @if (count($shijos->hijos) > 0)
                                                        <li>
                                                                @foreach ($shijos->hijos as $otros)
                                                                    {{$otros->name}}
                                                                    @foreach ($otros->documentos as $documentos)
                                                                    <a href="{{ asset('/').$documentos->documentos->file}}">{{$documentos->documentos->name}}</a>
                                                                @endforeach    
                                                                @endforeach
                                                            </li>
                                                        @endif

                                                </ul>
                                        </li>
                                           
                                        @endforeach
                                    @endif
                            </ul>
                        </li>
                    @endforeach                
                    </ul>
                </li>
            @endforeach
        </ul> 
        <br><br> <hr>
@endforeach

@endsection