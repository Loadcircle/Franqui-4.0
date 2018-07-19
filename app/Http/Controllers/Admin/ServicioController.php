<?php

namespace App\Http\Controllers\Admin;

use App\Servicio;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

use App\Http\Requests\ServicioStoreRequest;
use App\Http\Requests\ServicioUpdateRequest;

class ServicioController extends Controller
{
    public function __construct()
    {
        $this->middleware('permission:servicios.index')      ->only('index');
        $this->middleware('permission:servicios.create')     ->only(['create', 'store']);
        $this->middleware('permission:servicios.show')       ->only('show');
        $this->middleware('permission:servicios.edit')       ->only(['edit', 'update']);
        $this->middleware('permission:servicios.destroy')    ->only('destroy');
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $servicios = Servicio::paginate();
        return view('admin.servicio.index', compact('servicios'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.servicio.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(ServicioStoreRequest $request)
    {
        $servicios = Servicio::create($request->all());

        return redirect()->route('servicios.index')->with('info', 'Servicio creado con exito');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Servicio  $servicio
     * @return \Illuminate\Http\Response
     */
    public function show(Servicio $servicio)
    {
        return view('admin.servicio.show', compact('servicio'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Servicio  $servicio
     * @return \Illuminate\Http\Response
     */
    public function edit(Servicio $servicio)
    {
        return view('admin.servicio.edit', compact('servicio'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Servicio  $servicio
     * @return \Illuminate\Http\Response
     */
    public function update(ServicioUpdateRequest $request, Servicio $servicio)
    {
        $servicio->update($request->all());

        return redirect()->route('servicios.index')->with('info', 'Servicio actualizado con éxito');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Servicio  $servicio
     * @return \Illuminate\Http\Response
     */
    public function destroy(Servicio $servicio)
    {
        $servicio->delete();
        
        return back()->with('info', 'Eliminado correctamente');
    }
}
