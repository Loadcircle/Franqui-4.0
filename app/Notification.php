<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Notification extends Model
{
    protected $fillable = [
        'documento_id', 'agenda_id', 'type', 'section', 'empresa_id', 'maker_id',
    ];

    public function maker(){
        return $this->belongsTo(User::class, 'maker_id', 'id');
    }
    
    public function pertenece_h(){
        return $this->belongsTo(Herramienta::class, 'herramienta_id', 'id');
    }
    public function pertenece_m(){
        return $this->belongsTo(Modulo::class, 'modulo_id', 'id');
    }
    public function responsable(){
        return $this->belongsTo(User::class, 'asesor', 'id');
    }
    
}
