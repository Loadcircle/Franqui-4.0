<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Auth;

class Documento extends Model
{
    protected $fillable = [
        'name', 'file', 'maker_id', 'status'
    ];
    
    public function herramienta_documentos()
    {
        return $this->belongsToMany(Herramienta_documento::class);
    }

    public function herramienta($herramienta_id, $documento_id, $empresa_id, $status)
    {            
        Herramienta_documento::create(array_merge(['herramienta_id' => $herramienta_id, 
        'documento_id' => $documento_id,
        'empresa_id' => $empresa_id,
        'status' => $status]));        
    }

    public function modulo($modulo_id, $documento_id, $empresa_id, $status)
    {            
        Modulo_documento::create(array_merge(['modulo_id' => $modulo_id, 
        'documento_id' => $documento_id,
        'empresa_id' => $empresa_id,
        'status' => $status]));        
    }
    
    public function maker(){
        return $this->belongsTo(User::class, 'maker_id', 'id');
    }
    public function empresa(){
        return $this->belongsTo(Empresa::class, 'empresa_id', 'id');
    }
    public function pertenece_h(){
        return $this->belongsTo(Herramienta::class, 'herramienta_id', 'id');
    }
    public function pertenece_m(){
        return $this->belongsTo(Modulo::class, 'modulo_id', 'id');
    }
    public function comentario(){
        return $this->hasOne(Comentario::class);
    }

    public function newCreate($id, $section, $empresa){
        Notification::create(['documento_id' => $id, 
        'agenda_id' => null, 
        'type' => 1, 
        'section' => $section,
        'empresa_id' => $empresa,
        'maker_id' => Auth::user()->id,
        ]);      
    }
    public function newEdit($id, $section, $empresa){
        Notification::create(['documento_id' => $id, 
        'agenda_id' => null, 
        'type' => 2, 
        'section' => $section,
        'empresa_id' => $empresa,
        'maker_id' => Auth::user()->id,
        ]);      
    }
    public function newDelete($id, $section, $empresa){
        Notification::create(['documento_id' => $id, 
        'agenda_id' => null, 
        'type' => 3, 
        'section' => $section,
        'empresa_id' => $empresa,
        'maker_id' => Auth::user()->id,
        ]);      
    }
}
