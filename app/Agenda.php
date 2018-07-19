<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Auth;

class Agenda extends Model
{
    protected $fillable = [
        'lugar', 
        'asunto', 
        'comentario', 
        'dia', 
        'inicio', 
        'fin',
        'asesor',
        'cliente',
        'maker_id',
        'status',
    ];

    public function responsable()
    {
        return $this->belongsTo(User::class, 'asesor', 'id');
    }
    public function maker(){
        return $this->belongsTo(User::class, 'maker_id', 'id');
    }
    public function citado()
    {
        return $this->belongsTo(User::class, 'cliente', 'id');
    }
    
    public function newCreate($id, $empresa){
        Notification::create(['documento_id' => null, 
        'agenda_id' => $id, 
        'type' => 1, 
        'section' => 3,
        'empresa_id' => $empresa,
        'maker_id' => Auth::user()->id,
        ]);      
    }
    public function newEdit($id, $empresa){
        Notification::create(['documento_id' => null, 
        'agenda_id' => $id, 
        'type' => 2, 
        'section' => 3,
        'empresa_id' => $empresa,
        'maker_id' => Auth::user()->id,
        ]);      
    }
}
