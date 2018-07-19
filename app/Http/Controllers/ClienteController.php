<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Empresa;
use App\User;
use App\Servicio;
use App\Modulo;
use App\Documento;
use Illuminate\Support\Facades\Auth;



class ClienteController extends Controller
{
    
    public function index()
    {
        //$empresa = Empresa::find();

        $servicios = Servicio::join('servicio_empresas', 'servicio_empresas.servicio_id', '=', 'servicios.id')                
                                ->join('empresas', 'empresas.id', '=', 'servicio_empresas.empresa_id')
                            ->where('empresas.id', '=', $empresa=Auth::user()->empresa->id)->
                            select('servicios.*')->get();

        return view('cliente.index', compact('servicios'));
    }
}
