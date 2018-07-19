<?php

namespace App\Http\Controllers\Admin;

use App\Modulo;
use App\Servicio;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

use App\Http\Requests\ModuloStoreRequest;
use App\Http\Requests\ModuloUpdateRequest;

class ModuloController extends Controller
{
    public function __construct()
    {
        $this->middleware('permission:modulos.index')      ->only('index');
        $this->middleware('permission:modulos.create')     ->only(['create', 'store']);
        $this->middleware('permission:modulos.show')       ->only('show');
        $this->middleware('permission:modulos.edit')       ->only(['edit', 'update']);
        $this->middleware('permission:modulos.move')       ->only('move');
        $this->middleware('permission:modulos.destroy')    ->only('destroy');
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $modulos = Modulo::whereNull('padre_id')->orderBy('id', 'desc')->paginate();                    
        
        return view('admin.modulo.index', compact('modulos'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $servicios = Servicio::pluck('name', 'id');
        return view('admin.modulo.create', compact('servicios'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(ModuloStoreRequest $request)
    {
        $modulos = Modulo::create($request->all());

        return redirect()->route('modulos.index')->with('info', 'Modulo creado con exito');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Modulo  $modulo
     * @return \Illuminate\Http\Response
     */
    public function show(Modulo $modulo)
    {
        return view('admin.modulo.show', compact('modulo'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Modulo  $modulo
     * @return \Illuminate\Http\Response
     */
    public function edit(Modulo $modulo)
    {
        $servicios = Servicio::pluck('name', 'id');
        return view('admin.modulo.edit', compact('modulo', 'servicios'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Modulo  $modulo
     * @return \Illuminate\Http\Response
     */
    public function update(ModuloUpdateRequest $request, Modulo $modulo)
    {
        $modulo->update($request->all());

        return redirect()->route('modulos.index')->with('info', 'Modulo actualizado con éxito');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Modulo  $modulo
     * @return \Illuminate\Http\Response
     */
    public function destroy(Modulo $modulo)
    {
        $modulo->delete();
        
        return back()->with('info', 'Eliminado correctamente');
    }

    public function move(Modulo $modulo)
    {
        $padres = Modulo::where('id', '!=', $modulo->id)->pluck('name', 'id');

        return view('admin.modulo.move', compact('modulo', 'padres'));
    }
    
    public function saveMove(Request $request, Modulo $modulo)
    {
        $nuevoid = Modulo::hijo($modulo->id,$request->padre_id);

        if($nuevoid!=0){
            $ModuloHijo=Modulo::find($nuevoid);

            $ModuloHijo->fill(['padre_id' => $modulo->padre_id, 'servicio_id' => $modulo->servicio_id])->save();
        }
        $modulo->fill(['padre_id' => $request->padre_id, 'servicio_id' => null])->save();

        return redirect()->route('modulos.index')->with('info', 'Modulo actualizado con éxito');
    }
}
