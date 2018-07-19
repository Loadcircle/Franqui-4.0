<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Acceso;
use App\User;

class AccesosController extends Controller
{
    public function index()
    {
        $accesos = Acceso::orderBy('accesos.created_at', 'desc')
                           ->LeftJoin('users', 'users.id', 'accesos.user_id')
                           ->LeftJoin('empresas', 'empresas.id', 'users.empresa_id')
                           ->select('users.name as u_name','users.id as u_id' ,'empresas.name as e_name', 'accesos.*')
                           ->paginate();

        return view('admin.acceso.index', compact('accesos'));
    }
    public function show($id)
    {
        $accesos = Acceso::where('user_id', '=', $id)->paginate();
        $usuario = User::find($id);
        return view('admin.acceso.show', compact('accesos', 'usuario'));
    }
}
