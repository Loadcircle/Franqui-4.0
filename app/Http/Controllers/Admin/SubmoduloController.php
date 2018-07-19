<?php

namespace App\Http\Controllers\Admin;

use App\Modulo;
use App\Documento;
use App\Modulo_documento;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class SubmoduloController extends Controller
{
    public function __construct()
    {
        $this->middleware('permission:modulos.index')      ->only('index');
        $this->middleware('permission:modulos.create')     ->only(['create', 'store']);
        $this->middleware('permission:modulos.show')       ->only('show');
        $this->middleware('permission:modulos.edit')       ->only(['edit', 'update']);
        $this->middleware('permission:modulos.destroy')    ->only('destroy');
    }

    public function index($pmodulo)
    {
        $modulo = Modulo::where('slug', '=', $pmodulo)->first();
        
        $modulos = Modulo::where('padre_id', '=', $modulo->id)->orderBy('id', 'desc')->paginate();    

        $documentos  = Documento::orderBy('id', 'desc')
                    ->join('modulo_documentos', 'documentos.id', '=', 'modulo_documentos.documento_id')
                    ->select('documentos.*', 'modulo_documentos.modulo_id', 'modulo_documentos.modulo_id', 'modulo_documentos.empresa_id')
                    ->where('modulo_id', '=', $modulo->id)
                    ->get();
        
        return view('admin.submodulo.index', compact('modulos', 'pmodulo', 'modulo', 'documentos'));
    }
    
    public function create($pmodulo)
    {
        return view('admin.submodulo.create', compact('pmodulo'));
    }

    public function store(Request $request, $pmodulo)
    {
        $modulo  = Modulo::where('slug', '=', $pmodulo)->first();
        $modulos = Modulo::create(array_merge($request->all(), ['padre_id' => $modulo->id]));

        return redirect()->route('smodulos',['pmodulo' => $pmodulo])->with('info', 'Submodulo creado con exito');
    }

    public function show($pmodulo)
    {
        $fila  = Modulo::where('slug', '=', $pmodulo)->first();

        $modulo = Modulo::find($fila->id);

        return view('admin.submodulo.show', compact('modulo', 'pmodulo'));
    }

    public function edit($pmodulo)
    {
        $fila  = Modulo::where('slug', '=', $pmodulo)->first();
        
        $modulo = Modulo::find($fila->id);

        $pmodulo = $modulo->padre->slug;

        $padres = Modulo::where('id', '!=', $modulo->id)->pluck('name', 'id');

        $val = '';

        return view('admin.submodulo.edit', compact('modulo', 'pmodulo','padres', 'val'));
    }

    public function update(Request $request, $pmodulo)
    {

        $modulo  = Modulo::where('slug', '=', $pmodulo)->first();

        $modulo->update($request->all());

        return redirect()->route('smodulos',['pmodulo' => $modulo->padre->slug])->with('info', 'Submodulo actualizado con exito');
    }

    public function destroy($id)
    {
        $modulo = Modulo::find($id);
        $modulo->delete();
        
        return back()->with('info', 'Eliminado correctamente');
    }

    public function move(Modulo $modulo)
    {
        $padres = Modulo::where('id', '!=', $modulo->id)->pluck('name', 'id');

        return view('admin.submodulo.move', compact('modulo', 'padres'));
    }
    
    public function saveMove(Request $request, Modulo $modulo)
    {
        if($request->padre_id!=null){  

            $nuevoid = Modulo::hijo($modulo->id,$request->padre_id);

            if($nuevoid!=0){
                $ModuloHijo=Modulo::find($nuevoid);
    
                $ModuloHijo->fill(['padre_id' => $modulo->padre_id, 'servicio_id' => $modulo->servicio_id])->save();
            } 

            $servicio_id = null;

        }
        else
        {
            $nuevoid = Modulo::padre2($modulo->padre_id);
            
            $ModuloHijo=Modulo::find($nuevoid);

            $servicio_id = $ModuloHijo->servicio_id;
        }

        $modulo->fill(['padre_id' => $request->padre_id, 'servicio_id' => $servicio_id])->save();

        return redirect()->route('modulos.index')->with('info', 'Modulo actualizado con éxito');
    }

}
