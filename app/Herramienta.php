<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Herramienta extends Model
{
    protected $fillable = [
        'name', 'slug', 'servicio_id', 'maker_id', 'status',
    ];
    
    public function maker(){
        return $this->belongsTo(User::class);
    }
    public function servicio(){
        return $this->belongsTo(Servicio::class);
    }
}
