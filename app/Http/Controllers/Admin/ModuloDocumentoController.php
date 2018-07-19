<?php

namespace App\Http\Controllers\Admin;

use App\Modulo_documento;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Http\Requests\DocumentosStoreRequest;
use App\Http\Requests\DocumentosUpdateRequest;
use Illuminate\Support\Facades\Storage;
use App\Documento;
use App\Empresa;
use App\Comentario;
use App\Modulo;

class ModuloDocumentoController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index($id)
    {
        // $modulo = Modulo::find($id);
        // $documentos  = Modulo_documento::orderBy('empresa_id', 'desc')
        //                                       ->join('documentos', 'documentos.id', '=', 'modulo_documentos.documento_id')
        //                                       ->select('documentos.*', 'modulo_documentos.*')
        //                                       ->where('modulo_id', '=', $id)
        //                                       ->get();
        
        // return view('admin.modulo_documento.index', compact('modulo', 'documentos', 'id'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create($slug)
    {
        $empresas = Empresa::pluck('name', 'id');
        return view('admin.modulo_documento.create', compact('id', 'empresas', 'slug'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(DocumentosStoreRequest $request, $slug)
    {
        $path = Storage::disk('public')->put('documentos', $request->file('file')); 

        $documento = Documento::create(array_merge($request->all(), ['file' => $path]));    
        
        $modulo = Modulo::where('slug', '=', $slug)->first();

        $documento->modulo($modulo->id, $documento->id, $request->empresa_id, $request->status);

        $comentario = Comentario::create(['comentario' => $request->comentario, 'documento_id' => $documento->id]);

        $documento->newCreate($documento->id, 2, $request->empresa_id);

        return redirect()->route('smodulos', $slug)->with('info', 'Documento creado con exito');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Modulo_documento  $modulo_documento
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $documento = Documento::join('modulo_documentos', 'documentos.id', '=', 'modulo_documentos.documento_id')
                            ->select('documentos.*', 'modulo_documentos.modulo_id', 'modulo_documentos.documento_id', 'modulo_documentos.empresa_id')
                            ->where('documentos.id', '=', $id)
                            ->first();

        $smodulo = Modulo::find($documento->modulo_id)->slug;
        
        return view('admin.modulo_documento.show', compact('documento', 'smodulo'));     
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Modulo_documento  $modulo_documento
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $empresas = Empresa::pluck('name', 'id');

        $documento = Documento::leftJoin('modulo_documentos', 'modulo_documentos.documento_id', '=', 'documentos.id')
                    ->leftJoin('comentarios', 'comentarios.documento_id', 'documentos.id')
                    ->where('documentos.id', '=', $id)
                    ->select('documentos.*', 'modulo_documentos.modulo_id as modulo_id', 'modulo_documentos.empresa_id as empresa_id', 'comentarios.comentario as comentario')
                    ->first();

        $modulo = Modulo::find($documento->modulo_id);
        $slug = $modulo->slug;

        return view('admin.modulo_documento.edit', compact('documento', 'empresas', 'modulo', 'slug'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Modulo_documento  $modulo_documento
     * @return \Illuminate\Http\Response
     */
    public function update(DocumentosUpdateRequest $request, $id)
    {
        $documento = Documento::find($id);
        $modulo_documento = Modulo_documento::where('documento_id', '=', $id)->first();
        $comentario = Comentario::where('documento_id', '=', $id)->first();

        if(!empty($request->file('file'))){
            Storage::disk('public')->delete($documento->file);
            $path = Storage::disk('public')->put('documentos', $request->file('file'));             
            $documento->update(array_merge($request->all(), ['file' => $path]));  
            $modulo_documento->update($request->all());
            if(!empty($request->comentario)){
                $comentario->update(['comentario' =>$request->comentario]);
            }
        }else{
            $modulo_documento->update($request->all());
            $documento->update($request->all());
            if(!empty($request->comentario)){
                $comentario->update(['comentario' =>$request->comentario]);
            }
        }
                
        $documento->newEdit($documento->id, 2, $modulo_documento->empresa_id);

        $smodulo = Modulo::find($modulo_documento->modulo_id);

        return redirect()->route('smodulos', $smodulo->slug)->with('info', 'Documento actualizado con exito');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Modulo_documento  $modulo_documento
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $documento = Documento::find($id);
        $modulo_documento = Modulo_documento::where('documento_id', '=', $id)->first();

        Storage::disk('public')->delete($documento->file);
        
        $documento->newDelete($documento->id, 2, $modulo_documento->empresa_id);

        $documento->delete();
        
        return back()->with('info', 'Eliminado correctamente');
    }
}
