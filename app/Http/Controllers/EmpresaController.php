<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Storage;
use Caffeinated\Shinobi\Models\Permission;
use Caffeinated\Shinobi\Models\Role;
use App\Empresa;
use App\Servicio;
use App\Servicio_empresa;

use App\Http\Requests\EmpresaStoreRequest;
use App\Http\Requests\EmpresaUpdateRequest;

class EmpresaController extends Controller
{
    public function __construct()
    {
        $this->middleware('permission:empresas.index')      ->only('index');
        $this->middleware('permission:empresas.create')     ->only(['create', 'store']);
        $this->middleware('permission:empresas.show')       ->only('show');
        $this->middleware('permission:empresas.edit')       ->only(['edit', 'update']);
        $this->middleware('permission:empresas.destroy')    ->only('destroy');
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $empresas = Empresa::paginate();
        return view('admin.empresa.index', compact('empresas'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.empresa.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(EmpresaStoreRequest $request)
    {        
        if($request->file('logo')){ 

            $empresas = Empresa::create($request->all());
            
            $path = Storage::disk('public')
                ->put('logos', $request->file('logo'));  

            $empresas->fill($request->all())->save();

            $empresas->fill(['logo' => $path])->save();
                
                
            return redirect()->route('empresas.index')->with('info', 'Empresa creada con exito');  
        }else{            

            $empresas = Empresa::create($request->all());

            return redirect()->route('empresas.index')->with('info', 'Empresa creada con exito');
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Empresa  $empresa
     * @return \Illuminate\Http\Response
     */
    public function show(Empresa $empresa)
    {
        return view('admin.empresa.show', compact('empresa'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Empresa  $empresa
     * @return \Illuminate\Http\Response
     */
    public function edit(Empresa $empresa)
    {
        return view('admin.empresa.edit', compact('empresa'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Empresa  $empresa
     * @return \Illuminate\Http\Response
     */
    public function update(EmpresaUpdateRequest $request, Empresa $empresa)
    {
        if($request->file('logo')){ 
            
            Storage::disk('public')->delete($empresa->logo);

            $path = Storage::disk('public')
                ->put('logos', $request->file('logo'));  

            $empresa->fill($request->all())->save();

            $empresa->fill(['logo' => $path])->save();

            return redirect()->route('empresas.index')->with('info', 'Información actualizada con éxito');
               
        }else{                       

            $empresa->update($request->all());

            return redirect()->route('empresas.index')->with('info', 'Información actualizada con éxito');
        }
                
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Empresa  $empresa
     * @return \Illuminate\Http\Response
     */
    public function destroy(Empresa $empresa)
    {        
        Storage::disk('public')->delete($empresa->logo);
        $empresa->delete();
        
        return back()->with('info', 'Eliminado correctamente');
    }

    public function asignar($id)
    {
        $empresa = Empresa::find($id);
        $servicios = Servicio::get();
        return view('admin.empresa.asignar', compact('empresa', 'servicios'));
    }

    public function saveasignar(Request $request, $id)
    {
        $empresa = Empresa::find($id);
        $empresa->servicios()->sync($request->get('servicios'));
        return redirect()->route('empresas.index')->with('info', 'Servicio asignado con éxito');
    }
}
