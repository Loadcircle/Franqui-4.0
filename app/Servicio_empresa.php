<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Servicio_empresa extends Model
{
    protected $fillable = [
        'empresa_id', 'servicio_id'
    ];

    public function servicio(){
        return $this->belongsTo(Servicio::class);
    }
    public function empresa(){
        return $this->belongsTo(Empresa::class);
    }

}
