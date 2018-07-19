<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\User;
use App\Empresa;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;
use Illuminate\Validation\Rule;
use Caffeinated\Shinobi\Models\Role;
use Illuminate\Support\Facades\DB;

use App\Http\Requests\UsuarioStoreRequest;
use App\Http\Requests\UsuarioUpdateRequest;

class UsuarioController extends Controller
{
    public function __construct()
    {
        $this->middleware('permission:usuarios.index')      ->only('index');
        $this->middleware('permission:usuarios.create')     ->only(['create', 'store']);
        $this->middleware('permission:usuarios.show')       ->only('show');
        $this->middleware('permission:usuarios.edit')       ->only(['edit', 'update']);
        $this->middleware('permission:usuarios.destroy')    ->only('destroy');
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $users = User::orderBy('id', 'DESC')
                    ->leftJoin('empresas', 'empresas.id', '=', 'users.empresa_id')
                    ->leftJoin('role_user', 'role_user.user_id', '=', 'users.id')
                    ->leftJoin('roles', 'roles.id', '=', 'role_user.role_id')
                    ->select('users.*', 'empresas.name as e_name', 'roles.name as r_name')
                    ->get();

        return view('admin.usuario.index', compact('users'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $empresas   = Empresa::pluck('name', 'id');  
        $roles      = Role::pluck('name', 'id');
        return view('admin.usuario.create', compact('empresas', 'roles'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(UsuarioStoreRequest $request)
    {
        $password = Hash::make($request->password);

        $usuarios = User::create($request->all());

        $usuarios->fill(['password' => $password])->save();
        
        $usuarios->roles()->sync($request->get('roles'));

        return redirect()->route('usuarios.index')->with('info', 'Usuario asignado con exito');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $usuario = User::leftJoin('role_user', 'role_user.user_id', '=', 'users.id')
                        ->leftJoin('roles', 'roles.id', '=', 'role_user.role_id')
                        ->select('users.*', 'roles.name as r_name')
                        ->find($id);
        return view('admin.usuario.show', compact('usuario'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $roles      = Role::pluck('name', 'id');
        $empresas   = Empresa::pluck('name', 'id');  
        $usuario    = User::find($id);     
        $val = '';
        
        return view('admin.usuario.edit', compact('usuario', 'empresas', 'val', 'roles'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $data = $request->validate([
            'name' => ['required','string','max:255'],
            'email' => [
                'required','string','email','max:255',
                Rule::unique('users')->ignore($id),
            ],
        ]);

        $content = User::find($id);

        $content->fill([
            'name' => $request->name, 
            'email' => $request->email,
            'empresa_id' => $request->empresa_id
            ])->save();

        $content->roles()->sync($request->get('roles'));

        return redirect()->route('usuarios.index')->with('info', 'Información actualizada con exito');
        
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        User::find($id)->delete();
        
        return back()->with('info', 'Eliminado correctamente');
    }
}
