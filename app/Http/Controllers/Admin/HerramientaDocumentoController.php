<?php

namespace App\Http\Controllers\Admin;

use App\Herramienta_documento;
use App\Herramienta;
use App\Documento;
use App\Comentario;
use App\Empresa;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use App\Http\Controllers\Controller;
use App\Http\Requests\DocumentosStoreRequest;
use App\Http\Requests\DocumentosUpdateRequest;

class HerramientaDocumentoController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index($id)
    {
        $herramienta = Herramienta::find($id);
        $documentos  = Documento::orderBy('id', 'desc')
                                ->join('herramienta_documentos', 'documentos.id', '=', 'herramienta_documentos.documento_id')
                                ->select('documentos.*', 'herramienta_documentos.herramienta_id', 'herramienta_documentos.herramienta_id', 'herramienta_documentos.empresa_id')
                                ->where('herramienta_id', '=', $id)
                                ->get();
        
        return view('admin.documento.index', compact('herramienta', 'documentos', 'id'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create($id)
    {
        $empresas = Empresa::pluck('name', 'id');
        return view('admin.documento.create', compact('herramienta', 'documentos', 'id', 'empresas'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(DocumentosStoreRequest $request, $id)
    {                

            $path = Storage::disk('public')->put('documentos', $request->file('file')); 

            $documento = Documento::create(array_merge($request->all(), ['file' => $path]));    
            
            $documento->herramienta($id, $documento->id, $request->empresa_id, $request->status);
            
            $documento->newCreate($documento->id, 1, $request->empresa_id);

            $comentario = Comentario::create(['comentario' => $request->comentario, 'documento_id' => $documento->id]);
        return redirect()->route('doc_herramientas.index', $id)->with('info', 'Documento creado con exito');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Herramienta_documento  $herramienta_documento
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $documento = Documento::join('herramienta_documentos', 'documentos.id', '=', 'herramienta_documentos.documento_id')
                            ->select('documentos.*', 'herramienta_documentos.herramienta_id', 'herramienta_documentos.herramienta_id', 'herramienta_documentos.empresa_id')
                            ->where('documentos.id', '=', $id)
                            ->first();

        return view('admin.documento.show', compact('documento'));        
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Herramienta_documento  $herramienta_documento
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $empresas = Empresa::pluck('name', 'id');
        $documento = Documento::leftJoin('herramienta_documentos', 'herramienta_documentos.documento_id', '=', 'documentos.id')
                    ->leftJoin('comentarios', 'comentarios.documento_id', 'documentos.id')
                    ->where('documentos.id', '=', $id)
                    ->select('documentos.*', 'herramienta_documentos.herramienta_id as herramienta_id', 'herramienta_documentos.empresa_id as empresa_id', 'comentarios.comentario as comentario')
                    ->first();

        return view('admin.documento.edit', compact('documento', 'empresas'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Herramienta_documento  $herramienta_documento
     * @return \Illuminate\Http\Response
     */
    public function update(DocumentosUpdateRequest $request, $id)
    {
        $documento = Documento::find($id);
        $herramienta_documento = Herramienta_documento::where('documento_id', '=', $id)->first();
        $comentario = Comentario::where('documento_id', '=', $id)->first();

        if(!empty($request->file('file'))){
            Storage::disk('public')->delete($documento->file);
            $path = Storage::disk('public')->put('documentos', $request->file('file'));             
            $documento->update(array_merge($request->all(), ['file' => $path]));  
            $herramienta_documento->update($request->all());
            if(!empty($request->comentario)){
                $comentario->update(['comentario' =>$request->comentario]);
            }
        }else{
            $herramienta_documento->update($request->all());
            $documento->update($request->all());
            if(!empty($request->comentario)){
                $comentario->update(['comentario' =>$request->comentario]);
            }
        }
        
        $documento->newEdit($documento->id, 1, $herramienta_documento->empresa_id);
                
        return redirect()->route('doc_herramientas.index', $herramienta_documento->herramienta_id)->with('info', 'Documento creado con exito');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Herramienta_documento  $herramienta_documento
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $documento = Documento::find($id);
        $herramienta_documento = Herramienta_documento::where('documento_id', '=', $id)->first();

        Storage::disk('public')->delete($documento->file);
        
        $documento->newDelete($documento->id, 1, $herramienta_documento->empresa_id);

        $documento->delete();
        
        return back()->with('info', 'Eliminado correctamente');
    }
}
