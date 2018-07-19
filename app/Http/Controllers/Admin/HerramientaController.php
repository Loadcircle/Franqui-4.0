<?php

namespace App\Http\Controllers\Admin;

use App\Herramienta;
use App\Servicio;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class HerramientaController extends Controller
{
    public function __construct()
    {
        $this->middleware('permission:herramientas.index')      ->only('index');
        $this->middleware('permission:herramientas.create')     ->only(['create', 'store']);
        $this->middleware('permission:herramientas.show')       ->only('show');
        $this->middleware('permission:herramientas.edit')       ->only(['edit', 'update']);
        $this->middleware('permission:herramientas.move')       ->only('move');
        $this->middleware('permission:herramientas.destroy')    ->only('destroy');
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $herramientas = Herramienta::paginate();                    
        
        return view('admin.herramienta.index', compact('herramientas'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $servicios = Servicio::pluck('name', 'id');
        return view('admin.herramienta.create', compact('servicios'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $herramienta = Herramienta::create($request->all());

        return redirect()->route('herramientas.index')->with('info', 'Herramienta creada con exito');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Herramienta  $herramienta
     * @return \Illuminate\Http\Response
     */
    public function show(Herramienta $herramienta)
    {
        return view('admin.herramienta.show', compact('herramienta'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Herramienta  $herramienta
     * @return \Illuminate\Http\Response
     */
    public function edit(Herramienta $herramienta)
    {
        $servicios = Servicio::pluck('name', 'id');
        return view('admin.herramienta.edit', compact('herramienta', 'servicios'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Herramienta  $herramienta
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Herramienta $herramienta)
    {
        $herramienta->update($request->all());

        return redirect()->route('herramientas.index')->with('info', 'Herramienta actualizada con éxito');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Herramienta  $herramienta
     * @return \Illuminate\Http\Response
     */
    public function destroy(Herramienta $herramienta)
    {
        $herramienta->delete();
        
        return back()->with('info', 'Eliminado correctamente');
    }
}
