<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Calendar;
use Auth;
use App\Agenda;
use App\User;
use App\Http\Requests\AgendaStoreRequest;
use App\Http\Requests\AgendaUpdateRequest;

class AgendaController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */

    public function index()
    {
        $usuarios = User::pluck('name', 'id');

        $eventos = Agenda::get();
        $event_list = [];
        foreach ($eventos as $key => $eventos){
            $event_list[] = Calendar::event(
                $eventos->asunto.' || '.$eventos->lugar.' || '.$eventos->responsable->name.' || '.$eventos->comentario,
                false,
                new \DateTime($eventos->dia.$eventos->inicio),
                new \DateTime($eventos->dia.$eventos->fin)
            );
        }
        $calendar_details = Calendar::addEvents($event_list);

        $citas = Agenda::orderBy('dia', 'asc')->paginate();

        return view('admin.agenda.index', compact('calendar_details', 'usuarios', 'citas'));
    }
    
    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(AgendaStoreRequest $request)
    {
        $agenda = Agenda::create($request->all());
        $empresa = User::find($agenda->cliente);
        $agenda->newCreate($agenda->id, $empresa->empresa->id);
        return back()->with('info', 'Reunion generada correctamente');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $cita = Agenda::find($id);
        return view('admin.agenda.show', compact('cita'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $cita = Agenda::find($id);
        $usuarios = User::pluck('name', 'id');
        return view('admin.agenda.edit', compact('cita', 'usuarios'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(AgendaUpdateRequest $request, $id)
    {
        $agenda = Agenda::find($id);
        $agenda->update($request->all());
        $empresa = User::find($agenda->cliente);
        $agenda->newEdit($agenda->id, $empresa->empresa->id);

        return redirect()->route('agendas.index')->with('info', 'Reunion actualizada con éxito');        
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
